$(document).ready(function(){
    Mascara.setMoeda(document.getElementById('salario'));
    AnuncioEmprego.getRegime();
});

let AnuncioEmprego = {

    getRegime: function() {
        var dados = {}

        jQuery.ajax({
            type: "GET",
            url: "/anuncio_emprego/regime",
            dataType: "html",
            data:dados,

            success: function(result) {

                var json = JSON.parse(result);
                var dados = json.dados;

                var selectCategoria = document.getElementById('regime');
                selectCategoria.options.length = 0;

                option = new Option('Selecione o regime', '');
                option.disabled = true;
                option.selected = true;
                selectCategoria.options[selectCategoria.options.length] = option;

                if(json.status == 'success') {
                    for(var i = 0; i < dados.length; i++) {
                        
                        option = new Option(dados[i].nome_regime, dados[i].id);
                        selectCategoria.options[selectCategoria.options.length] = option;

                    }
                }

            }, error: function(XMLHttpRequest, textStatus, errorThrow) {
                console.log(XMLHttpRequest);
                console.log(textStatus);
                console.log(errorThrow);
            }
        })
    },

    editSalario: function() {

        var checkbox = document.getElementById('combinar').checked;
        var salario = document.getElementById('salario')

        if(checkbox) {
            salario.disabled = true;
            salario.value = '0,00';
        } else {
            salario.disabled = false;
        }
    }
}