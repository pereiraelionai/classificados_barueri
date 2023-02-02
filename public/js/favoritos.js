function favorito(produto_id, tipo_anuncio, titulo) {
    var check = document.getElementById('checkFavorito'+produto_id).checked;

    if(check) {
        document.getElementById('checkFavorito'+produto_id).checked = false;
        document.getElementById('iconFavorito'+produto_id).className = "fa-regular fa-heart";
    } else {
        document.getElementById('checkFavorito'+produto_id).checked = true;
        document.getElementById('iconFavorito'+produto_id).className = "fa-solid fa-heart format_icon_fav";
    }
    
    var dados = {}
    dados.check = check;
    dados.anuncio_id = produto_id;
    dados.tipo_anuncio = tipo_anuncio;
    dados.titulo = titulo;
    
    jQuery.ajax({
        type: "POST",
        url: "/favoritos",
        dataType: "html",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: dados,

        success: function(result) {

            var json = JSON.parse(result);
            var titulo = json.dados;

            if(json.status == 'error') {
                window.location.assign("http://127.0.0.1:8000/login");
            }
            
            if(json.status == 'success') {
                document.getElementById('alert-success').style = "display: block;"
                document.getElementById('alerta-sucesso-cont').innerHTML = "<strong>" + titulo + "</strong>" + " adicionado aos favorritos!";
                document.getElementById('alert-success').className = "alert alert-success alert-dismissible fade show";

            } else if (json.status == 'warning') {
                document.getElementById('alert-success').style = "display: block;"
                document.getElementById('alerta-sucesso-cont').innerHTML = "<strong>" + titulo + "</strong>" + " removido dos favoritos!";
                document.getElementById('alert-success').className = "alert alert-warning alert-dismissible fade show";
            }
            

        }, error: function(XMLHttpRequest) {
            console.log(XMLHttpRequest.responseText)
        }
    })
    
    
}

function fecharAlert() {
    document.getElementById('alert-success').style = "display: none;"
}