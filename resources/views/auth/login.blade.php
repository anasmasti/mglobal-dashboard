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
              <h4>Salut! Commençons</h4>
              <h6 class="font-weight-light">Connectez-vous pour continuer.</h6>
              <form class="pt-3" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                  <input type="email" id="email" name="email" type="email" placeholder="Adresse E-mail" class="form-control form-control-lg @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group">
                  <input type="password" placeholder="Mot de passe"  id="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                 @enderror
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" type="submit" > {{ __("S'identifier") }}</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input"> Gardez-moi connecté </label>
                  </div>
                  @if (Route::has('password.request'))
                  <a href="{{ route('password.request') }}" class="auth-link text-black">{{ __('Mot de passe oublié?') }}</a>
                  @endif
                </div>
                <div class="text-center mt-4 font-weight-light"> Vous n'avez pas de compte? <a href="{{ route('register') }}" class="text-primary">Créer</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
