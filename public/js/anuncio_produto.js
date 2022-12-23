$(document).ready(function(){
    Mascara.setMoeda(document.getElementById('valor'));
    AnuncioProduto.getCategoria();
});

let AnuncioProduto = {

    getCategoria: function() {
        var dados = {}

        jQuery.ajax({
            type: "GET",
            url: "/anuncio_produto/categoria",
            dataType: "html",
            data:dados,

            success: function(result) {

                var json = JSON.parse(result);
                var dados = json.dados;

                var selectCategoria = document.getElementById('categoria');
                selectCategoria.options.length = 0;

                option = new Option('Selecione a categoria', '');
                option.disabled = true;
                option.selected = true;
                selectCategoria.options[selectCategoria.options.length] = option;

                if(json.status == 'success') {
                    for(var i = 0; i < dados.length; i++) {
                        
                        option = new Option(dados[i].nome_categoria, dados[i].id);
                        selectCategoria.options[selectCategoria.options.length] = option;

                    }
                }

            }, error: function(XMLHttpRequest, textStatus, errorThrow) {
                console.log(XMLHttpRequest);
                console.log(textStatus);
                console.log(errorThrow);
            }
        })
    }
}