@extends("base")
@section("titre", "Connexion")

@section("contenu")
  <div class="row justify-content-center align-items-center">
    <div class="col-lg-3 login">
      <form method="post" action="/connexion">
        @csrf
        <div class="row mb-3">
          <label class="col-form-label col-lg-4 text-end fw-bold">Login :</label>
          <div class="col-lg-8">
            <input class="form-control @error('login') is-invalid @enderror" name="login" value="{{ old('login') }}" required>
            @error('login')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
        </div>
        <div class="row mb-3">
          <label class="col-form-label col-lg-4 text-end fw-bold">Password :</label>
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
