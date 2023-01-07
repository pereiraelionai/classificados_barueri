let MinhaArea = {

    meusAnuncios: function(tipo) {
        document.getElementById('anuncios_inativos').style = 'display: none'
        document.getElementById('anuncios_favoritos').style = 'display: none'
        document.getElementById('mensagens').style = 'display: none'

        switch(tipo) {
            case 'produtos':
                document.getElementById('titulo_minha_area').innerHTML = 'Meus Anúncios (Produtos)';
                document.getElementById('meus_anuncios_produtos').style = 'display: block'
                document.getElementById('meus_anuncios_empregos').style = 'display: none'
                document.getElementById('meus_anuncios_servicos').style = 'display: none'
                break;
            case 'empregos':
                document.getElementById('titulo_minha_area').innerHTML = 'Meus Anúncios (Empregos)';
                document.getElementById('meus_anuncios_produtos').style = 'display: none'
                document.getElementById('meus_anuncios_empregos').style = 'display: block'
                document.getElementById('meus_anuncios_servicos').style = 'display: none'
                break;
            case 'servicos':
                document.getElementById('titulo_minha_area').innerHTML = 'Meus Anúncios (Serviços)';
                document.getElementById('meus_anuncios_produtos').style = 'display: none'
                document.getElementById('meus_anuncios_empregos').style = 'display: none'
                document.getElementById('meus_anuncios_servicos').style = 'display: block'
                break;
        }

        if(tipo != 'produtos') {
            var dados = {}

            jQuery.ajax({
                type: "GET",
                url: "/minha_area" + tipo,
                dataType: "html",
                data:dados,
    
                success: function(result) {
    
                    console.log(result)
    
                    var json = JSON.parse(result);
                    var dados = json.dados;
    
    
                }, error: function(XMLHttpRequest, textStatus, errorThrow) {
                    console.log(XMLHttpRequest);
                    console.log(textStatus);
                    console.log(errorThrow);
                }
            })
        }
    },

    anunciosInativos: function() {
        document.getElementById('titulo_minha_area').innerHTML = 'Anúncios Inátivos';
        document.getElementById('meus_anuncios_produtos').style = 'display: none'
        document.getElementById('meus_anuncios_empregos').style = 'display: none'
        document.getElementById('meus_anuncios_servicos').style = 'display: none'
        document.getElementById('anuncios_inativos').style = 'display: block'
        document.getElementById('anuncios_favoritos').style = 'display: none'
        document.getElementById('mensagens').style = 'display: none'
    },

    favoritos: function() {
        document.getElementById('titulo_minha_area').innerHTML = 'Mensagens';
        document.getElementById('meus_anuncios_produtos').style = 'display: none'
        document.getElementById('meus_anuncios_empregos').style = 'display: none'
        document.getElementById('meus_anuncios_servicos').style = 'display: none'
        document.getElementById('anuncios_inativos').style = 'display: none'
        document.getElementById('anuncios_favoritos').style = 'display: block'
        document.getElementById('mensagens').style = 'display: none'
    },

    mensagens: function() {
        document.getElementById('titulo_minha_area').innerHTML = 'Favoritos';
        document.getElementById('meus_anuncios_produtos').style = 'display: none'
        document.getElementById('meus_anuncios_empregos').style = 'display: none'
        document.getElementById('meus_anuncios_servicos').style = 'display: none'
        document.getElementById('anuncios_inativos').style = 'display: none'
        document.getElementById('anuncios_favoritos').style = 'display: none'
        document.getElementById('mensagens').style = 'display: block'
    }
}