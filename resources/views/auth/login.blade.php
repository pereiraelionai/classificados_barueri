<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.101.0">
    <title>Classificados Barueri | Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">

    
  </head>
  <body class="text-center">
    
    <main class="form-signin w-100 m-auto">
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <a href="{{ route('index') }}"><img src="{{ asset('img/logo_classificados.png') }}" class="logo_login"></a>
        <h1 class="h3 mb-3 fw-normal">Faça seu login!</h1>

        <div class="form-floating mb-2">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"  placeholder="E-mail">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror    
        </div>
        <div class="form-floating">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Senha">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="checkbox mb-3">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

            <label class="form-check-label" for="remember">
                {{ __('Lembrar-me') }}
            </label>
        </div>
        <button class="w-100 btn btn-lg btn-login" type="submit">{{ __('Entrar') }}</button>
        
        @if (Route::has('password.request'))
            <a class="btn btn-link" style="color: rgb(84, 64, 91);" href="{{ route('password.request') }}">
                {{ __('Esqueceu a senha?') }}
            </a>
        @endif
        <p class="mt-5 mb-3 text-muted"><span>&copy; Classificados Barueri. Todos os direitos reservados.</span></p>
    </form>
    </main>
    
  </body>
</html>
