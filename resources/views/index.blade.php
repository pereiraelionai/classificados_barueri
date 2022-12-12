@extends('layouts.html')

@section('conteudo')


  <div>
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom fundo">
      <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <img src="img/logo_classificados.png" style="width: 150px;"> <span class="abalone">Classificados Barueri</span>
      </a>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="#" class="nav-link px-2 fonte_header"><i class="fa-solid fa-star"></i> Destaque-se</a></li>
        <li><a href="#" class="nav-link px-2 fonte_header"><i class="fa-solid fa-box-archive"></i> Meus Anúncios</a></li>
        <li><a href="#" class="nav-link px-2 fonte_header"><i class="fa-solid fa-envelope"></i> Mensagens</a></li>
      </ul>

      <div class="col-md-3 text-end">
        <button type="button" class="btn btn-outline-header me-2">Login</button>
        <button type="button" class="btn btn-header">Inscreva-se </button>
      </div>
      
    </header>

    <div class="d-flex flex-column fundo sub-header">
        <div class="col borda align-self-start">
            <div class="d-flex justify-content-center">
                <input class="pesquisa" type="text" placeholder="Busque o que você procura">
                <a href="#" class="lupa"><i class="fa-solid fa-magnifying-glass"></i></a>
            </div>
        </div>

        <div class="navbar navbar-expand-sm d-flex justify-content-center mt-3 mb-3">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#">Auto e Peças</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Brinquedos</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Eletrônicos e Celulares</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Eletrodomésticos</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Ferramentas</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Imóveis</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Moda</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Outros</a></li>
                <li class="nav-item"><a class="nav-link tag" href="#"><i class="fa-solid fa-screwdriver-wrench"></i> Serviços</a></li>
                <li class="nav-item"><a class="nav-link tag" href="#"><i class="fa-solid fa-user-tie"></i></i> Empregos</a></li>
            </ul>
        </div>
    </div>

  </div>

@endsection
