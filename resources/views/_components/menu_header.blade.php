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
            <button class="btn btn-outline mr-2 btn-my-area" onclick="MinhaArea.mensagens()" type="submit"><i class="fa-solid fa-envelope"></i> 
                Mensagens
                @if(isset($qtdConversaNaoLida))
                    @if($qtdConversaNaoLida > 0)
                        <span class="badge text-bg-badge">{{$qtdConversaNaoLida}}</span>
                    @endif
                @endif
            </button>
        </div>
        <form class="d-flex" role="search">
            <input class="form-control mr-2" type="search" placeholder="Busca" aria-label="Search">
        </form>
    </div>
</nav>