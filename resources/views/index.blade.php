@extends('layouts.html')

@section('conteudo')


  <div>
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
          <a href="login" class="btn btn-outline-header me-2">Login</a>
          <a href="register" class="btn btn-header">Inscreva-se </a>
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
                <li class="nav-item"><a class="nav-link tag" href="#"><i class="fa-solid fa-user-tie"></i></i> Empregos</a></li>
                <li class="nav-item"><a class="nav-link tag" href="#"><i class="fa-solid fa-screwdriver-wrench"></i> Serviços</a></li>
            </ul>
        </div>
    </div>

    <div class="container">
      <div id="carousel-legenda" class="carousel slide" data-bs-ride="carousel">

        <!-- Indicadores -->
        <ol class="carousel-indicators">
          <li class="active" data-bs-target="#carousel-legenda" data-bs-slide-to="0"></li>
          <li class="" data-bs-target="#carousel-legenda" data-bs-slide-to="1"></li>
          <li class="" data-bs-target="#carousel-legenda" data-bs-slide-to="2"></li>
          <li class="" data-bs-target="#carousel-legenda" data-bs-slide-to="3"></li>
        </ol>


        <div class="carousel-inner">

          <div class="carousel-item active">
            <a href="https://www.google.com.br/" target="_blank"><img src="img/imagem_1.jpeg" class="img_carousel"></a>
          </div>
          <div class="carousel-item">
            <a href="https://www.google.com.br/" target="_blank"><img src="img/imagem_2.jpeg" class="img_carousel"></a>
          </div>
          <div class="carousel-item">
            <a href="https://www.google.com.br/" target="_blank"><img src="img/imagem_3.jpeg" class="img_carousel"></a>              
          </div>
          <div class="carousel-item">
            <a href="https://www.google.com.br/" target="_blank"><img src="img/imagem_4.jpeg" class="img_carousel"></a>
          </div>          

        </div>

      </div> 
    </div>

    <div class="album py-5 bg-light">
      <div class="container">
  
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          
          @foreach($anuncio_produtos as $produto)
          <div class="col mb-3">
            <div class="card shadow-sm">
              <div id="carouselAnuncio{{ $produto->id }}" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <a href="#"><img src="img/anuncio_produtos/{{ $produto->foto_1 }}" class="foto-card"></a>
                    </div>
                    @if($produto->foto_2)
                    <div class="carousel-item">
                        <a href="#"><img src="img/anuncio_produtos/{{ $produto->foto_2 }}" class="foto-card"></a>
                    </div>
                    @endif
                    @if($produto->foto_3)
                    <div class="carousel-item">
                        <a href="#"><img src="img/anuncio_produtos/{{ $produto->foto_3 }}" class="foto-card"></a>
                    </div>
                    @endif
                    @if($produto->foto_4)
                    <div class="carousel-item">
                        <a href="#"><img src="img/anuncio_produtos/{{ $produto->foto_4 }}" class="foto-card"></a>
                    </div>
                    @endif                
                </div>
                @isset($produto->foto_2)
                <button class="carousel-control-prev" type="button" data-target="#carouselAnuncio{{ $produto->id }}" data-slide="prev">
                    <span class="icone-carousel" aria-hidden="true"><i class="fa-solid fa-angle-left"></i></span>
                </button>
                <button class="carousel-control-next" type="button" data-target="#carouselAnuncio{{ $produto->id }}" data-slide="next">
                    <span class="icone-carousel" aria-hidden="true"><i class="fa-solid fa-angle-right"></i></span>
                </button>
                @endisset
              </div> 

              <div class="card-body">
                <a href="#" class="text-card"><p class="card-text">{{ $produto->titulo }}</p></a>
                  <div class="d-flex justify-content-between align-items-center">
                    <strong class="text-muted">R$ {{ $produto->valor }}</strong>
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline btn-card"><i class="fa-regular fa-heart"></i></button>
                      <button type="button" class="btn btn-sm btn-outline btn-card"><i class="fa-regular fa-envelope"></i></button>
                    </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach

        </div>
      </div>
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

  <footer class="footer mt-auto py-3 fundo">
    <div class="container">
      <span>&copy; Classificados Barueri. Todos os direitos reservados.</span>
    </div>
  </footer>

@endsection
