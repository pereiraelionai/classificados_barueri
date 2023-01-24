@extends('layouts.html')

@section('conteudo')

    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom fundo">
      <a href="{{ route('index') }}" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <img src="{{ asset('img/logo_classificados.png') }}" style="width: 150px;"> <span class="abalone">Classificados Barueri</span>
      </a>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="#" class="nav-link px-2 fonte_header"><i class="fa-solid fa-star"></i> Sua Marca</a></li>
        <li><a href="{{ route('anuncie') }}" class="nav-link px-2 fonte_header"><i class="fa-solid fa-fire"></i> Anuncie Grátis</a></li>
        <li><a href="{{ route('minha_area') }}" class="nav-link px-2 fonte_header"><i class="fa-solid fa-box-archive"></i> Minha Área</a></li>
        <li><a href="#" class="nav-link px-2 fonte_header"><i class="fa-solid fa-envelope"></i> Mensagens</a></li>
      </ul>

        @guest
        @if (Route::has('login'))
            <div class="col-md-3 text-end">
            <a href="{{ route('login') }}" class="btn btn-outline-header me-2">Login</a>
            <a href="{{ route('register') }}" class="btn btn-header">Inscreva-se </a>
            </div>
        @endif
                                
        @else
            <div class="col-md-3 text-end">
            <button type="button" class="btn btn-user dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->nome }}
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                    </form>
                    </a>
                </li>
            </ul>
            </div>
        @endguest      
      
    </header>

    <div class="d-flex flex-column fundo sub-header">
        <div class="col borda align-self-start">
          <form method="GET" action="{{ route('anuncios_search') }}">
            <div class="d-flex justify-content-center">
                  <input class="pesquisa" name="pesquisa" type="text" placeholder="Busque o que você procura">
                  <button class="lupa"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
          </form>
        </div>

        <div class="navbar navbar-expand-sm d-flex justify-content-center mt-3 mb-3">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('anuncios_filtro', ['filtro' => 1]) }}">Auto e Peças</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('anuncios_filtro', ['filtro' => 2]) }}">Brinquedos</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('anuncios_filtro', ['filtro' => 3]) }}">Eletrônicos e Celulares</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('anuncios_filtro', ['filtro' => 4]) }}">Eletrodomésticos</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('anuncios_filtro', ['filtro' => 5]) }}">Ferramentas</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('anuncios_filtro', ['filtro' => 6]) }}">Imóveis</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('anuncios_filtro', ['filtro' => 7]) }}">Moda</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('anuncios_filtro', ['filtro' => 8]) }}">Outros</a></li>
                <li class="nav-item"><a class="nav-link tag" href="{{ route('empregosOnly') }}"><i class="fa-solid fa-user-tie"></i></i> Empregos</a></li>
                <li class="nav-item"><a class="nav-link tag" href="{{ route('servicosOnly') }}"><i class="fa-solid fa-screwdriver-wrench"></i> Serviços</a></li>
            </ul>
        </div>
    </div>
        <div class="container">
            <nav class="navbar fundo_container my-4 p-4 sticky-top">
                <div class="container-fluid">
                    <h3 class="titulo_filtro"><i class="fa-solid fa-filter"></i> Filtro: Empregos - {{$qtd_anuncios}} anúncio(s)</h3>
                </div>
            </nav>
        </div>

    <div class="album py-4 bg-light">
      <div class="container">
  
        <div class="row row-cols-1">
          
          @foreach($servicos as $servico)
            <div class="card card_servico mb-1">
                <div class="card-body">
                    <h5 class="card-title"><a a class="card-title" href="#">{{ $servico->titulo }}</a></h5>
                    <p class="card-text">{{ substr($servico->descricao, 0, 350) }}</p>
                    <span class="valor_servico">Valor: R$ {{ $servico->valor }}
                        @if($servico->por_hora)
                            <h6><span class="badge bg-info m-2 p-2 branco tag_por_hora">Por Hora</span></h6>
                        @endif
                    </span><br>
                    @if($servico->por_hora)
                        <button class="btn btn-outline-danger mt-neg" type="button"><i class="fa-regular fa-trash-can"></i> Inativar</button>
                    @else
                        <button class="btn btn-outline-danger mt-2" type="button"><i class="fa-regular fa-trash-can"></i> Inativar</button>
                    @endif
                </div>
                <div class="views view_servico">
                    <i class="fa-sharp fa-solid fa-eye"></i><span> 50</span>
                </div>
            </div>
          @endforeach

        </div>
      </div>
    </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <div class="mt-5"> </div>
  @extends('layouts.footer')

@endsection