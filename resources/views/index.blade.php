@extends('layouts.html')

@section('conteudo')


  <div>
    @include('_components.header')
    <!--
    #TODO: Criar um component para esse trecho de código
    -->
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

        @include('_components.alert')
  
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
                    <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">       


                        {{-- Criando lógica para setar o btn favorito --}}
                        @php
                          $icone = 'fa-regular fa-heart';
                          $checked = '';
                        @endphp
                        @foreach($favoritos as $favorito)
                          @if(isset($favorito[0]->id))
                              @php
                                if($favorito[0]->anuncio_id == $produto->id) {
                                  $icone = 'fa-solid fa-heart format_icon_fav';
                                  $checked = 'checked';
                                }
                              @endphp
                          @endif                       
                        @endforeach


                      <input type="checkbox" class="btn-check" id="checkFavorito{{$produto->id}}" autocomplete="off" style="display: none;" {{$checked}}>
                      <label class="btn btn-sm btn-outline btn-card" for="checkFavorito" style="border-radius: 3px 0px 0px 3px;" onclick="favorito({{$produto->id}}, {{$produto->tipo_anuncios_id}}, '{{$produto->titulo}}')"><i id="iconFavorito{{$produto->id}}" class="{{$icone}}"></i></label> 
                      
                      <a href="{{ route('mensagem_form', ['id_anuncio' => $produto->id, 'tipo_anuncio' => $produto->tipo_anuncios_id]) }}" class="btn btn-sm btn-outline btn-card btn-msg-height" for="btncheck2" onMouseOver="formatarBtnMsgProdHover({{$produto->id}})" onMouseOut="formatarBtnMsgProdNoHover({{$produto->id}})"><i class="fa-regular fa-envelope"></i></a>
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
