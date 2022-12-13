@extends('layouts.html')

@section('conteudo')


  <div>
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom fundo">
      <a href="{{ route('index') }}" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <img src="{{ asset('img/logo_classificados.png') }}" style="width: 150px;"> <span class="abalone">Classificados Barueri</span>
      </a>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="#" class="nav-link px-2 fonte_header"><i class="fa-solid fa-star"></i> Sua Marca</a></li>
        <li><a href="#" class="nav-link px-2 fonte_header"><i class="fa-solid fa-fire"></i> Anuncie Grátis</a></li>
        <li><a href="#" class="nav-link px-2 fonte_header"><i class="fa-solid fa-box-archive"></i> Meus Anúncios</a></li>
        <li><a href="#" class="nav-link px-2 fonte_header"><i class="fa-solid fa-envelope"></i> Mensagens</a></li>
      </ul>

      <div class="col-md-3 text-end">
        <a href="login" class="btn btn-outline-header me-2">Login</a>
        <a href="register" class="btn btn-header">Inscreva-se </a>
      </div>
      
    </header>

    <div class="d-flex flex-column fundo sub-header">
        <div class="col borda align-self-start">
            <div class="d-flex justify-content-center">
                <input class="pesquisa" type="text" placeholder="Busque o que você procura">
                <a href="#" class="lupa"><i class="fa-solid fa-magnifying-glass"></i></a>
            </div>
        </div>

        <div class="navbar navbar-expand-sm d-flex justify-content-center mt-3 mb-3">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="#">Auto e Peças</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Brinquedos</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Eletrônicos e Celulares</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Eletrodomésticos</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Ferramentas</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Imóveis</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Moda</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Outros</a></li>
                <li class="nav-item"><a class="nav-link tag" href="#"><i class="fa-solid fa-screwdriver-wrench"></i> Serviços</a></li>
                <li class="nav-item"><a class="nav-link tag" href="#"><i class="fa-solid fa-user-tie"></i></i> Empregos</a></li>
            </ul>
        </div>
    </div>

    <div class="container">
      <div id="carousel-legenda" class="carousel slide" data-bs-ride="carousel">

        <!-- Indicadores -->
        <ol class="carousel-indicators">
          <li class="active" data-bs-target="#carousel-legenda" data-bs-slide-to="0"></li>
          <li class="" data-bs-target="#carousel-legenda" data-bs-slide-to="1"></li>
          <li class="" data-bs-target="#carousel-legenda" data-bs-slide-to="2"></li>
          <li class="" data-bs-target="#carousel-legenda" data-bs-slide-to="3"></li>
        </ol>


        <div class="carousel-inner">

          <div class="carousel-item active">
            <a href="https://www.google.com.br/" target="_blank"><img src="img/imagem_1.jpeg" class="img_carousel"></a>
          </div>
          <div class="carousel-item">
            <a href="https://www.google.com.br/" target="_blank"><img src="img/imagem_2.jpeg" class="img_carousel"></a>
          </div>
          <div class="carousel-item">
            <a href="https://www.google.com.br/" target="_blank"><img src="img/imagem_3.jpeg" class="img_carousel"></a>              
          </div>
          <div class="carousel-item">
            <a href="https://www.google.com.br/" target="_blank"><img src="img/imagem_4.jpeg" class="img_carousel"></a>
          </div>          

        </div>

      </div> 
    </div>

    <div class="album py-5 bg-light">
      <div class="container">
  
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

          <div class="col mb-3">
            <div class="card shadow-sm">
              <img src="img/cel.jpeg" height="225">              
  
              <div class="card-body">
                <a href="#"><p class="card-text">Samsung Galaxy Note 10 256Gb Usado Perfeito Usado Perfeito Usado Perfeito Usado</p></a>
                <div class="d-flex justify-content-between align-items-center">
                  <strong class="text-muted mt-3">R$ 1.730,00</strong>
                </div>
              </div>
            </div>
          </div>

          <div class="col mb-3">
            <div class="card shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
  
              <div class="card-body">
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                  </div>
                  <small class="text-muted">9 mins</small>
                </div>
              </div>
            </div>
          </div>
          <div class="col mb-3">
            <div class="card shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
  
              <div class="card-body">
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                  </div>
                  <small class="text-muted">9 mins</small>
                </div>
              </div>
            </div>
          </div>
  
          <div class="col mb-3">
            <div class="card shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
  
              <div class="card-body">
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                  </div>
                  <small class="text-muted">9 mins</small>
                </div>
              </div>
            </div>
          </div>
          <div class="col mb-3">
            <div class="card shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
  
              <div class="card-body">
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                  </div>
                  <small class="text-muted">9 mins</small>
                </div>
              </div>
            </div>
          </div>
          <div class="col mb-3">
            <div class="card shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
  
              <div class="card-body">
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                  </div>
                  <small class="text-muted">9 mins</small>
                </div>
              </div>
            </div>
          </div>
  
          <div class="col mb-3">
            <div class="card shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
  
              <div class="card-body">
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                  </div>
                  <small class="text-muted">9 mins</small>
                </div>
              </div>
            </div>
          </div>
          <div class="col mb-3">
            <div class="card shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
  
              <div class="card-body">
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                  </div>
                  <small class="text-muted">9 mins</small>
                </div>
              </div>
            </div>
          </div>
          <div class="col mb-3">
            <div class="card shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
  
              <div class="card-body">
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                  </div>
                  <small class="text-muted">9 mins</small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>


@endsection
