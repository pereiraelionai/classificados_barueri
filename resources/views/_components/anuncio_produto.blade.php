@foreach($anuncio_produtos as $produto)
<div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-4 img_anuncio">
            <a href="#"><img src="img/cel.jpeg" class="img-fluid rounded-start"></a>
        </div>
        <div class="col-md-7">
            <div class="card-body">
                <div class="card-inner">
                    <h5><a class="card-title" href="#">{{ $produto->titulo }}</a></h5>
                        <p class="card-text mt-4">
                            This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                            This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.
                        </p>
                        <div class="row borda justify-content-end pr-4">
                            <a class="link-desc" href="#">Ver descrição completa</a>
                        </div>

                        <div class="row borda justify-content-end pr-4">
                            <small class="text-muted">Publicado em 18/12 às 09:54 - cód. 1119576017</small>
                        </div>
                </div>
                <div class="row pr-4">
                    <div class="col-md-9">
                        <h6><span class="badge bg-info m-2 p-2 branco">Produtos</span></h6>
                        <h6><span class="badge bg-info m-2 p-2 branco">Eletrônicos e Celulares</span></h6>
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