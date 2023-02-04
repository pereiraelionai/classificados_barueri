@extends('layouts.app')

@section('content')

    <div class="container">
        
          <div class="my-3 p-3 bg-body rounded shadow-sm">
            <h6 class="border-bottom pb-2 mb-0">Mensagens</h6>
            @foreach($mensagens as $mensagem)
                <div class="d-flex text-muted pt-3">
                    <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded mt-1" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>

                    <div class="pb-3 mb-0 small lh-sm border-bottom w-100 ml-2">
                        <div class="d-flex justify-content-between">
                        <strong class="text-gray-dark">{{ $mensagem->titulo }}</strong>   
                        <a href="#">Verificar</a>
                        </div>
                        <span class="d-block">{{ $mensagem->title_anuncio }}</span>
                    </div>

                </div>
            @endforeach
        </div>

    </div>
  </div>

@endsection
