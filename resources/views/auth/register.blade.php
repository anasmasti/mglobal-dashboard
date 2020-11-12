@extends('layouts.app')

@section('content')
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row flex-grow">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo">
                <img src="./images/dashboard/logo.png">
              </div>
              <h4>Nouveau ici?</h4>
              <h6 class="font-weight-light">L'inscription est facile. Cela ne prend que quelques étapes</h6>
              <form class="pt-3"  method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                  <input type="text" name="name" class="form-control form-control-lg @error('name') is-invalid @enderror" id="name" required placeholder="Nom d'utilisateur">
                  @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group">
                 <input type="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="email" required placeholder="Adresse E-mail">
                 @error('email')
                 <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
                 @enderror
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" id="password" required placeholder="Mot de passe">
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-lg" name="password_confirmation" id="password-confirm" required autocomplete="new-password" placeholder="Confirmer le mot de passe">
                  </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" > {{ __("S'inscrire") }}</button>
                </div>
                <div class="text-center mt-4 font-weight-light"> Vous avez déjà un compte? <a href="/login" class="text-primary">S'identifier</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
