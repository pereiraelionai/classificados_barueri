@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="alert alert-success alert-dismissible fade show" style="display: none;" id="alert-success" role="alert">
            <div id="alerta-sucesso-cont">Teste</div>
            <a class="close-alert" onclick="Inativar.fecharAlert()"><i class="fa-solid fa-xmark"></i></a>
        </div>
        <nav class="navbar fundo_container mb-4 p-4 sticky-top">
            <div class="container-fluid">
                <a class="navbar-brand my-area"><i class="fa-solid fa-house"></i> Minha área</a>
                <div class="row justify-content-center ml-2 mt-3">
                    <div class="dropdown">
                        <button class="btn btn-outline mr-2 btn-my-area dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-box-archive"></i> Categoria
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" onclick="MinhaArea.meusAnuncios('produtos')">Produtos</a></li>
                            <li><a class="dropdown-item" onclick="MinhaArea.meusAnuncios('empregos')">Empregos</a></li>
                            <li><a class="dropdown-item" onclick="MinhaArea.meusAnuncios('servicos')">Serviços</a></li>
                        </ul>
                    </div>
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
            <h1 class="display-5" id="titulo_minha_area">Meus Anúncios (Produtos)</h1>
            <hr>
            <div id="meus_anuncios_produtos">
                @include('_components.anuncio_produto')
            </div>

            <div id="meus_anuncios_empregos" style="display: none">
                @include('_components.anuncio_empregos')
            </div>

            <div id="meus_anuncios_servicos" style="display: none">
                @include('_components.anuncio_servicos')
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
