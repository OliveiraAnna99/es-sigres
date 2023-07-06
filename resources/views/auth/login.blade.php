@extends('auth.layouts.templateLogin')

@section('content')

<section>
  <p class="logo"><span>Sig</span>Restaurant</p>
  <form method="POST" action="{{ route('login') }}">
    @csrf
    <input id="email" type="email" class="login-input @error('email') is-invalid @enderror" name="email"
      value="{{ old('email') }}" placeholder="E-mail" required autocomplete="email" autofocus>

    @error('email')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror

    <input id="password" type="password" class="login-input @error('password') is-invalid @enderror" name="password"
      required placeholder="Senha" autocomplete="current-password">

    @error('password')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror

    <div class="forgot-password">
      @if (Route::has('password.request'))
      <a href="{{ route('password.request') }}">
        {{ __('Esqueceu a senha?') }}
      </a>
      @endif
    </div>
    </div>
    <div class="btn-login">
      <button type="submit">Acessar</button>
    </div>
  </form>

</section>

@endsection