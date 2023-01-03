<!doctype html>
<html lang="pt-br">
  <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.101.0">
        <title>Classificados Barueri | Anúncio</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/checkout/">

        
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/form-produto.css') }}" rel="stylesheet">
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
            <h2 class="display-6">Qual produto você quer anunciar?</h2>
        </div>
    </main>
    <main class="container borda">
        <div class="row g-5">
            <div class="col-md">
                <form class="needs-validation" method="POST" action="{{ route('anuncio_produto_salvar') }}" enctype="multipart/form-data" novalidate>
                    @csrf
                    <div class="row my-4">
                        <label for="titulo" class="col-sm-2 col-form-label">Título</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control {{$errors->has('titulo') ? 'is-invalid' : ''}}" name="titulo" id="titulo">
                            <small style="color: red;">{{$errors->has('titulo') ? $errors->first('titulo') : ''}}</small>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="descricao" class="col-sm-2 col-form-label">Descrição</label>
                        <div class="col-sm-10">
                        <textarea class="form-control {{$errors->has('descricao') ? 'is-invalid' : ''}}" rows="6" id="descricao" name="descricao"></textarea>
                        <small style="color: red;">{{$errors->has('descricao') ? $errors->first('descricao') : ''}}</small>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-2"></div>
                        <div class="col-md-5">
                            <label for="categoria" class="form-label">Categoria</label>
                            <select class="form-control {{$errors->has('categoria') ? 'is-invalid' : ''}}" id="categoria" name="categoria">
                                <option selected disabled >Selecione a categoria</option>
                            </select>
                            <small style="color: red;">{{$errors->has('categoria') ? $errors->first('categoria') : ''}}</small>
                        </div>
                        <div class="col-md-4">
                            <label for="valor" class="form-label">Valor</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">R$</span>
                                <input type="text" class="form-control {{$errors->has('valor') ? 'is-invalid' : ''}}" id="valor" name="valor" aria-label="Amount (to the nearest dollar)">
                                <small style="color: red;">{{$errors->has('valor') ? $errors->first('valor') : ''}}</small>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2"></div>
                        <div class="col-md-5">
                            <label for="foto_capa" class="form-label">Foto Capa</label>
                            <input type="file" class="form-control-file {{$errors->has('foto_capa') ? 'is-invalid' : ''}}" id="foto_capa" name="foto_capa">
                            <small style="color: red;">{{$errors->has('foto_capa') ? $errors->first('foto_capa') : ''}}</small>
                        </div>
                        <div class="col-md-5">
                            <label for="foto_1" class="form-label">Foto 1</label>
                            <input type="file" class="form-control-file" id="foto_1" name="foto_1">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10"></div>
                        <button class="btn btn-anuncio" type="submit">Anunciar</button>
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
