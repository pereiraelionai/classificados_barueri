<!doctype html>
<html lang="pt-br">
  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.101.0">
        <title>Classificados Barueri | Mensagens</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/checkout/">

        
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/form.css') }}" rel="stylesheet">
        <link href="{{ asset('css/estilo.css') }}" rel="stylesheet">

        <!--JS-->
        <script src="https://code.jquery.com/jquery-3.6.2.min.js" integrity="sha256-2krYZKh//PcchRtd+H+VyyQoZ/e3EcrkxhM8ycwASPA=" crossorigin="anonymous"></script>
        <script src="{{ asset('js/utils.js') }}"></script>
        <script src="{{ asset('js/anuncio_produto.js') }}"></script>


  </head>
  <body class="bg-light">
    
    <div class="container">
    <main>
        <div class="py-5 text-start">
            <h2 class="display-6">{{ $anuncio->titulo }}</h2>
        </div>
    </main>
    <main class="container borda">
        <div class="row g-5">
            <div class="col-md">
                <form class="needs-validation" method="POST" action="{{ route('mensagem_send') }}" enctype="multipart/form-data" novalidate>
                    @csrf
                    <input type="hidden" value="{{$anuncio->tipo_anuncios_id}}" name="tipo_anuncio">
                    <input type="hidden" value="{{$anuncio->id}}" name="anuncio_id">
                    <input type="hidden" value="{{$anuncio->id_user}}" name="id_user">
                    <div class="row my-4">
                        <label for="titulo" class="col-sm-2 col-form-label">Título</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control {{$errors->has('titulo') ? 'is-invalid' : ''}}" name="titulo" id="titulo" value="{{old('titulo')}}">
                            <small style="color: red;">{{$errors->has('titulo') ? $errors->first('titulo') : ''}}</small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="mensagem" class="col-sm-2 col-form-label">Mensagem</label>
                        <div class="col-sm-10">
                        <textarea class="form-control {{$errors->has('mensagem') ? 'is-invalid' : ''}}" rows="6" id="mensagem" name="mensagem">{{old('mensagem')}}</textarea>
                        <small style="color: red;">{{$errors->has('mensagem') ? $errors->first('mensagem') : ''}}</small>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-10"></div>
                        <button class="btn btn-anuncio" type="submit">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-3 text-muted"><span>&copy; Classificados Barueri. Todos os direitos reservados.</span></p>
    </footer>
    </div>

  </body>
</html>
