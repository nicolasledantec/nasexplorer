@extends("accueil")
@section("titre", "Mon compte")

@section("corps")
@if(Session::has('success'))
  <div class="row justify-content-center align-items-center">
    <div class="col-lg-4">
      <div class="alert alert-success">
        Votre mot de passe a été changé.
      </div>
    </div>
  </div>
@endif
@error('save')
<div class="row justify-content-center align-items-center">
  <div class="col-lg-4">
    <div class="alert alert-danger">
      Erreur lors du changement de votre mot de passe.
    </div>
  </div>
</div>
@enderror
<div class="row justify-content-center align-items-center">
  <div class="col-5">
    Modification du mot de passe :
    <form method="post" action="/compte/password">
      @csrf
      <div class="row">
        <label class="col-form-label col-lg-4 text-end fw-bold">Nouveau mot de passe :</label>
        <div class="col-lg-8">
          <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
          @error('password')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>
      <div class="row">
        <label class="col-form-label col-lg-4 text-end fw-bold">Vérification mot de passe :</label>
        <div class="col-lg-8">
          <input type="password" class="form-control @error('password_verif') is-invalid @enderror" name="password_verif" required>
          @error('password_verif')
          <div class="invalid-feedback">
            Les mots de passe saisies sont différents
          </div>
          @enderror
        </div>
      </div>
      <div class="row">
        <div class="col-12 text-center">
          <button class="btn btn-primary">
            <span class="fa fa-save"></span> Changer le mot de passe
          </button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
