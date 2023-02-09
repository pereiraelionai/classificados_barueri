@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Mensagens</h1>
          <div class="my-3 p-3 bg-body rounded shadow-sm">
            <h2 class="pb-2 mb-0"><strong>Anúncio: </strong>{{ $anuncio[0]->titulo }}</h2>
            <h3 class="border-bottom pb-2 mb-0"><strong>Título Mensagem: </strong>{{ $mensagem[0]->titulo }}</h3>
            <div id="result_conversas">
            @foreach($conversas as $conversa)
                <div class="d-flex text-muted pt-3">
                    <div class="pb-3 mb-0 lh-sm border-bottom w-100 ml-2">
                        <div class="d-flex justify-content-between">
                        <span class="text-gray-dark"><strong>{{$conversa->nome}} @if($conversa->lida == 0 && $conversa->dest_id == $usuario)<span class="badge bg-info text-light">New</span>@endif</strong></span>   
                        </div>
                        <span class="d-block" style="tetx-weight: bold;">{{ $conversa->mensagem }}</span>
                    </div>
                </div>
            @endforeach
            </div>
            <div class="input-group mb-3 mt-4">
                <textarea type="text" class="form-control" placeholder="Digite aqui sua resposta" id="msg_resposta"></textarea>
                <button class="btn btn-outline-secondary btn-my-area-conversa" type="button" onclick="Mensagem.enviar({{ $mensagem[0]->id }}, '{{$destinatario->nome}}', {{$destinatario->id}})"><i class="fa-solid fa-paper-plane"></i></button>
            </div>
        </div>

    </div>
  </div>
@endsection
