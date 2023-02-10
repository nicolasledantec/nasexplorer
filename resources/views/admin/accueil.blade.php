@extends("accueil")
@section("titre", "Administration")

@section("corps")
  <div class="row">
    <div class="col-lg-2">
      <div class="list-group">
        <a class="list-group-item list-group-item-action active" data-bs-toggle="list" href="#paneDirectory">Répertoire</a>
        <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#list-profile">Profil</a>
        <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#list-user">Utilisateur</a>
      </div>
    </div>
    <div class="col-lg-10">
      <div class="tab-content">
        <div class="tab-pane fade show active" id="paneDirectory">
          <div class="row">
            <div class="col-lg-12">
              <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDirectory">
                <span class="fa fa-plus"></span> Ajouter un répertoire
              </button>
              <div id="listDirectory"></div>
            </div>
          </div>
          <div class="modal fade" id="modalDirectory" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Ajout d'un répertoire</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                  <form id="formDirectory">
                    <div>
                      <label class="form-label">Répertoire :</label>
                      <input class="form-control" name="path" value="">
                    </div>
                    <div>
                      <label class="form-label">Droit :</label>
                      <input class="form-control" name="right" value="1">
                    </div>
                    <div class="text-center">
                      <button class="btn btn-primary">
                        <span class="fa fa-save"></span> Sauvegarder
                      </button>
                    </div>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="list-profile">

        </div>
        <div class="tab-pane fade" id="list-user">

        </div>
      </div>
    </div>
  </div>
  <script>
    document.getElementById("formDirectory").addEventListener("submit", async function (e) {
      e.preventDefault();
      await http.postMessage("/admin/directory", new FormData(e.target), refreshDirectory);
    })

    function refreshDirectory() {
      http.getDiv("/admin/directory", document.getElementById("listDirectory"));
    }

    refreshDirectory();
  </script>
@endsection
