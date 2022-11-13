@extends("base")
@section("titre", "Accueil")

@section("contenu")
  <div class="row">
    <div class="col-12">
      <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#">NasExplorer</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Accueil <span class="sr-only">(Actuelle)</span></a>
            </li>
            @if(Auth::user()->admin)
              <li class="nav-item">
                <a class="nav-link" href="/admin">Administration</a>
              </li>
            @endif
          </ul>
          <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                {{ Auth::user()->nom }}
              </a>
              <ul class="dropdown-menu" style="margin-left: -80px">
                <li>
                  <a class="dropdown-item" href="/compte">Mon compte</a>
                  <a class="dropdown-item" href="/deconnexion">Déconnexion</a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
  @yield("corps")
@endsection
