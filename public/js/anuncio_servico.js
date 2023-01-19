$(document).ready(function(){
    Mascara.setMoeda(document.getElementById('valor'));
});

let AnuncioServico = {
    editValor: function() {
        var checkbox = document.getElementById('combinar').checked;
        var valor = document.getElementById('valor')

        if(checkbox) {
            valor.disabled = true;
            valor.value = '0,00';
        } else {
            valor.disabled = false;
        }
    }
}