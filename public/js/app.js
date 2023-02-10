const Message = {
  displaySuccess : function (message) {
    Message.display( "<div class='alert alert-success'>" + message + "</div>");
  },
  displayError : function (message) {
    Message.display( "<div class='alert alert-danger'>" + message + "</div>");
  },
  display : function (contenu) {
    const appMessage = document.getElementById("appMessage");
    appMessage.innerHTML = contenu;
    appMessage.style.display = "block";

    setTimeout(function () {
      appMessage.style.display = "none";
    }, 5000)
  }
}
const http = {
  getDiv : async function (url, div) {
    let response;
    try {
      response = await axios.get(url);
    }
    catch (e) {
      response = {data : "Une erreur est survenue durant la récupération des données"};
    }

    div.innerHTML = response.data;

    await importScript(div);
  },
  postMessage : async function (url, data, callback) {
    let response;

    try {
      response = await axios.post(url, data);
      if (response.data.type != "success") {
        Message.displayError(response.data.message);
        return;
      }
      Message.displaySuccess(response.data.message);
    }
    catch (e) {
      Message.displayError("Une erreur est survenue sur l'action");
      return;
    }

    callback();
  },
}

async function digestMessage(message) {
  const msgUint8 = new TextEncoder().encode(message);                   // encode comme (utf-8) Uint8Array
  const hashBuffer = await crypto.subtle.digest('sha-1', msgUint8);      // fait le condensé
  const hashArray = Array.from(new Uint8Array(hashBuffer));             // convertit le buffer en tableau d'octet
  return hashArray.map(b => b.toString(16).padStart(2, '0')).join(''); // convertit le tableau en chaîne hexadécimal
}

async function importScript(element) {
  let div = element;
  if ((typeof element === 'string' || element instanceof String)) {
    div = document.getElementById(element);
  }

  const scriptElements = div.getElementsByTagName('script');

  for (let i = 0; i < scriptElements.length; i ++) {
    const scriptElement = document.createElement('script');
    scriptElement.type = 'text/javascript';
    let sha1 = "";

    if (!scriptElements[i].src) {
      scriptElement.innerHTML = scriptElements[i].innerHTML;
      //sha1 = await digestMessage(scriptElement.innerHTML);
    } else {
      scriptElement.src = scriptElements[i].src;
      //sha1 = await digestMessage(scriptElement.src);
    }

    /*if (!list_digest.includes(sha1)) {
      list_digest.push(sha1);
    }*/

    document.head.appendChild(scriptElement);
  }
}
