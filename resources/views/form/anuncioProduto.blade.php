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
                <form class="needs-validation" method="POST" action="{{ route('anuncio_produto') }}">
                <div class="row my-4">
                    <label for="titulo" class="col-sm-2 col-form-label">Título</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="titulo" id="titulo">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="descricao" class="col-sm-2 col-form-label">Descrição</label>
                    <div class="col-sm-10">
                    <textarea class="form-control" rows="6" id="descricao" name="descricao"></textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-2"></div>
                    <div class="col-md-5">
                        <label for="categoria" class="form-label">Categoria</label>
                        <select class="form-control" id="categoria" name="categoria">
                            <option selected disabled >Selecione a categoria</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="valor" class="form-label">Valor</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">R$</span>
                            <input type="text" class="form-control" id="valor" name="valor" aria-label="Amount (to the nearest dollar)">
                        </div>
                    </div>
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
