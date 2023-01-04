@extends('layouts.app')

@section('content')

    <div class="container">

        <nav class="navbar fundo_container mb-4 p-4 sticky-top">
            <div class="container-fluid">
                <a class="navbar-brand my-area"><i class="fa-solid fa-house"></i> Minha área</a>
                <div class="row justify-content-center ml-2 mt-3">
                    <button class="btn btn-outline mr-2 btn-my-area" onclick="MinhaArea.meusAnuncios()" type="submit"><i class="fa-solid fa-box-archive"></i> Meus Anúncios</button>
                    <button class="btn btn-outline mr-2 btn-my-area" onclick="MinhaArea.anunciosInativos()" type="submit"><i class="fa-sharp fa-solid fa-trash"></i> Anúncios Inátivos</button>
                    <button class="btn btn-outline mr-2 btn-my-area" onclick="MinhaArea.favoritos()" type="submit"><i class="fa-solid fa-heart"></i>Anúncios Favoritos</button>
                    <button class="btn btn-outline mr-2 btn-my-area" onclick="MinhaArea.mensagens()" type="submit"><i class="fa-solid fa-envelope"></i> Mensagens</button>
                </div>
                <form class="d-flex" role="search">
                    <input class="form-control mr-2" type="search" placeholder="Busca" aria-label="Search">
                </form>
            </div>
        </nav>


        <div class="fundo_container p-5 rounded">
            <h1 class="display-5" id="titulo_minha_area">Meus Anúncios</h1>
            <hr>
            <div id="meus_anuncios">
                @include('_components.anuncio_produto')
            </div>

            <div id="anuncios_inativos" style="display: none">
                Anuncios Inativos
            </div>

            <div id="anuncios_favoritos" style="display: none">
                Anuncios Favoritos
            </div>

            <div id="mensagens" style="display: none">
                Mensagens
            </div>                                    
            <hr>
        </div>
  </div>

@endsection
