@extends("base")
@section("titre", "Connexion")

@section("contenu")
  <div class="row justify-content-center align-items-center">
    <div class="col-lg-4 login">
      <form>
        <div class="row mb-3">
          <label class="col-form-label col-lg-4 text-start fw-bold">Login :</label>
          <div class="col-lg-8">
            <input class="form-control" name="login">
          </div>
        </div>
        <div class="row mb-3">
          <label class="col-form-label col-lg-4 text-start fw-bold">Password :</label>
          <div class="col-lg-8">
            <input type="password" class="form-control" name="password">
          </div>
        </div>
        <div class="row">
          <div class="col-12 text-center">
            <button class="btn btn-primary">
              <span class="fa fa-sign-in"></span> Connexion
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
