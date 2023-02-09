@extends('layouts.app')

@section('content')
    @if(empty($mensagens[0]->titulo))
        <h2 class="no-anuncio">Você não possui mensagens ainda :-(</h2>
    @else
    <div class="container">
        
          <div class="my-3 p-3 bg-body rounded shadow-sm">
            <h3 class="border-bottom pb-2 mb-0">Mensagens</h3>
            @foreach($mensagens as $mensagem)
                <div class="d-flex text-muted pt-3">
                    <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded mt-1" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#44354a"/><text x="50%" y="50%" fill="#FFFFFF" dy=".3em"></text></svg>

                    <div class="pb-3 mb-0  lh-sm border-bottom w-100 ml-2">
                        <div class="d-flex justify-content-between">
                        <span class="text-gray-dark"><strong>Título: </strong>{{ $mensagem->titulo }} 
                        @if($mensagem->qtdByMsg > 0)
                            <span class="badge bg-warning">&nbsp {{$mensagem->qtdByMsg}} &nbsp</span>
                        @endif
                        </span> 
                        <a href="{{ route('conversa', ['id_mensagem' => $mensagem->id]) }}">Verificar</a>
                        </div>
                        <span class="d-block"><strong>Anúncio: </strong>{{ $mensagem->title_anuncio }}</span>
                    </div>

                </div>
            @endforeach
        </div>

    </div>
  </div>
  @endif

@endsection
