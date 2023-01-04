let MinhaArea = {

    meusAnuncios: function() {
        document.getElementById('titulo_minha_area').innerHTML = 'Meus Anúncios';
        document.getElementById('meus_anuncios').style = 'display: block'
        document.getElementById('anuncios_inativos').style = 'display: none'
        document.getElementById('anuncios_favoritos').style = 'display: none'
        document.getElementById('mensagens').style = 'display: none'
    },

    anunciosInativos: function() {
        document.getElementById('titulo_minha_area').innerHTML = 'Anúncios Inátivos';
        document.getElementById('meus_anuncios').style = 'display: none'
        document.getElementById('anuncios_inativos').style = 'display: block'
        document.getElementById('anuncios_favoritos').style = 'display: none'
        document.getElementById('mensagens').style = 'display: none'
    },

    favoritos: function() {
        document.getElementById('titulo_minha_area').innerHTML = 'Mensagens';
        document.getElementById('meus_anuncios').style = 'display: none'
        document.getElementById('anuncios_inativos').style = 'display: none'
        document.getElementById('anuncios_favoritos').style = 'display: block'
        document.getElementById('mensagens').style = 'display: none'
    },

    mensagens: function() {
        document.getElementById('titulo_minha_area').innerHTML = 'Favoritos';
        document.getElementById('meus_anuncios').style = 'display: none'
        document.getElementById('anuncios_inativos').style = 'display: none'
        document.getElementById('anuncios_favoritos').style = 'display: none'
        document.getElementById('mensagens').style = 'display: block'
    }
}