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
    <link href="{{ asset('css/anuncie.css') }}" rel="stylesheet">


    <!-- Icons -->
    <script src="https://kit.fontawesome.com/bb3315e9fa.js" crossorigin="anonymous"></script>
    
  </head>
  <body class="text-center">
    
    <main class="container w-100 m-auto">

        <a href="{{ route('index') }}"><img src="{{ asset('img/logo_classificados.png') }}" class="logo_anuncie"></a>
        <br><br>
        <h1 class="display-4">Escolha seu tipo de anúncio:<h1>
        <hr class="mb-5">

        <div class="row">

            <div class="col-md-4 card-anuncio">
                <a href="{{ route('anuncio_produto') }}">
                    <div class="fundo_container p-5 rounded btn-anuncio-tipo mb-2">
                        <h1 class="display-5">Produtos</h1>
                        <i class="fa-solid fa-store"></i>
                    </div>
                </a>   
            </div>

            <div class="col-md-4 card-anuncio">
                <a href="{{ route('anuncio_emprego') }}">
                    <div class="fundo_container p-5 rounded btn-anuncio-tipo mb-2">
                        <h1 class="display-5">Empregos</h1>
                        <i class="fa-sharp fa-solid fa-user-tie"></i>
                    </div>
                </a>    
            </div>    

            <div class="col-md-4 card-anuncio">
                <a href="{{ route('anuncio_servico') }}">
                    <div class="fundo_container p-5 rounded btn-anuncio-tipo mb-2">
                        <h1 class="display-5">Serviços</h1>
                        <i class="fa-solid fa-screwdriver-wrench"></i>
                    </div>
                </a>    
            </div>

        </div>       

    </main>
    
  </body>
</html>
