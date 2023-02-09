@extends('layouts.app')

@section('content')

    <div class="container">
        @include('_components.alert')
        @include('_components.menu_header')

        <div class="fundo_container p-5 rounded">
            @extends('_components.modal_inativar')

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
                @include('_components.table_inativos')
            </div>

            <div id="anuncios_favoritos" style="display: none">
                @include('_components.table_favoritos')
            </div>
                                              
            <hr>
        </div>
  </div>

@endsection
