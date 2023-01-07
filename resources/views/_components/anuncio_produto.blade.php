@foreach($anuncio_produtos as $produto)
<div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-4 img_anuncio">
            <div id="carouselAnuncio{{ $produto->id }}" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/anuncio_produtos/{{ $produto->foto_1 }}" class="img-fluid rounded-start" style="height: 310px;">
                </div>
                @if($produto->foto_2)
                <div class="carousel-item">
                    <img src="img/anuncio_produtos/{{ $produto->foto_2 }}" class="img-fluid rounded-start" style="height: 310px;">
                </div>
                @endif
                @if($produto->foto_3)
                <div class="carousel-item">
                    <img src="img/anuncio_produtos/{{ $produto->foto_3 }}" class="img-fluid rounded-start" style="height: 310px;">
                </div>
                @endif
                @if($produto->foto_4)
                <div class="carousel-item">
                    <img src="img/anuncio_produtos/{{ $produto->foto_4 }}" class="img-fluid rounded-start" style="height: 310px;">
                </div>
                @endif                
            </div>
            <button class="carousel-control-prev" type="button" data-target="#carouselAnuncio{{ $produto->id }}" data-slide="prev">
                <span class="icone-carousel" aria-hidden="true"><i class="fa-solid fa-circle-left"></i></span>
            </button>
            <button class="carousel-control-next" type="button" data-target="#carouselAnuncio{{ $produto->id }}" data-slide="next">
                <span class="icone-carousel" aria-hidden="true"><i class="fa-solid fa-circle-right"></i></span>
            </button>
            </div>            
        </div>
        <div class="col-md-7">
            <div class="card-body">
                <div class="card-inner">
                    <h5><a class="card-title" href="#">{{ $produto->titulo }}</a></h5>
                        <p class="card-text mt-4">
                            {{ substr($produto->descricao, 0, 254) }}...
                        </p>
                        <div class="row borda justify-content-end pr-4">
                            <a class="link-desc" href="#">Ver descrição completa</a>
                        </div>

                        <div class="row borda justify-content-end pr-4">
                            <small class="text-muted">Publicado em {{ date( 'd/m/Y H:i:s' , strtotime($produto->created_at)) }} - cód. {{ codigoProduto($produto->id) }}</small>
                        </div>
                </div>
                <div class="row pr-4">
                    <div class="col-md-9">
                        <h6><span class="badge bg-info m-2 p-2 branco">{{ $produto->nome_categoria }}</span></h6>
                        <h6><span class="badge bg-info m-2 p-2 branco">{{ $produto->tipo }}</span></h6>
                    </div>
                    <div class="col-md-3">
                        <h2><span class="badge bg-light mt-2">R$ {{$produto->valor}}</span><h2>
                    </div>
                </div>
                <div class="row borda justify-content-start ml-2 mt-3">
                    <button class="btn btn-outline-danger" type="button"><i class="fa-regular fa-trash-can"></i> Inativar</button>
                    <div class="views">
                        <i class="fa-sharp fa-solid fa-eye"></i><span> 50</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach