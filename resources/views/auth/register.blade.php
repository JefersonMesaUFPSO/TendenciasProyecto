@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name') }} | {{ __('Register') }}</title>
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="{{ url('/') }}" class="h1"><b>{{ config('app.name') }}</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">{{ __('Register a new membership') }}</p>

      <form method="POST" action="{{ route('register') }}">
        @csrf

        {{-- Name --}}
        <div class="input-group mb-3">
          <input id="name" type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="{{ __('Full name') }}" required autofocus>
          <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-user"></span></div>
          </div>
        </div>
        @error('name')
          <div class="text-danger text-sm mb-2">{{ $message }}</div>
        @enderror

        {{-- Email --}}
        <div class="input-group mb-3">
          <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('Email') }}" required>
          <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-envelope"></span></div>
          </div>
        </div>
        @error('email')
          <div class="text-danger text-sm mb-2">{{ $message }}</div>
        @enderror

        {{-- Password --}}
        <div class="input-group mb-3">
          <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('Password') }}" required autocomplete="new-password">
          <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-lock"></span></div>
          </div>
        </div>
        @error('password')
          <div class="text-danger text-sm mb-2">{{ $message }}</div>
        @enderror

        {{-- Confirm Password --}}
        <div class="input-group mb-3">
          <input id="password-confirm" type="password" name="password_confirmation" class="form-control" placeholder="{{ __('Retype password') }}" required autocomplete="new-password">
          <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-lock"></span></div>
          </div>
        </div>

        {{-- Terms checkbox --}}
        <div class="row mb-3">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
                {{ __('I agree to the') }} <a href="#">{{ __('terms') }}</a>
              </label>
            </div>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">{{ __('Register') }}</button>
          </div>
        </div>
      </form>

      <a href="{{ route('login') }}" class="text-center d-block mt-3">{{ __('I already have a membership') }}</a>
    </div>
  </div>
</div>

</body>
</html>
@endsection
