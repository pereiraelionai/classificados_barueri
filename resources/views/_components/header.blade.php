        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom fundo">
        <a href="{{ route('index') }}" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <img src="{{ asset('img/logo_classificados.png') }}" style="width: 150px;"> <span class="abalone">Classificados Barueri</span>
        </a>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="#" class="nav-link px-2 fonte_header"><i class="fa-solid fa-star"></i> Sua Marca</a></li>
            <li><a href="{{ route('anuncie') }}" class="nav-link px-2 fonte_header"><i class="fa-solid fa-fire"></i> Anuncie Grátis</a></li>
            <li><a href="{{ route('minha_area') }}" class="nav-link px-2 fonte_header"><i class="fa-solid fa-box-archive"></i> Minha Área</a></li>
            <li><a href="{{ route('mensagens') }}" class="nav-link px-2 fonte_header"><i class="fa-solid fa-envelope"></i> Mensagens</a></li>
        </ul>

        @guest
        @if (Route::has('login'))
            <div class="col-md-3 text-end">
            <a href="login" class="btn btn-outline-header me-2">Login</a>
            <a href="register" class="btn btn-header">Inscreva-se </a>
            </div>
        @endif
                                
        @else
            <div class="col-md-3 text-end">
            <button type="button" class="btn btn-user dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->nome }}
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                    </form>
                    </a>
                </li>
            </ul>
            </div>
        @endguest      
        
        </header>