let Mensagem = {
    enviar: function(id_mensagem, nome, id_destinatario) {
        var dados = {}
        dados.msg = document.getElementById('msg_resposta').value;
        dados.id_mensagem = id_mensagem
        dados.id_destinatario = id_destinatario;

        jQuery.ajax({
            type: "POST",
            url: "/mensagens/enviar_resposta/",
            dataType: "html",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: dados,

            success: function(result) {
                
                var json = JSON.parse(result);
                var dados = json.dados


                if(json.status = 'success') {
                    html = '<div class="d-flex text-muted pt-3">' +
                                '<div class="pb-3 mb-0 lh-sm border-bottom w-100 ml-2">' +
                                    '<div class="d-flex justify-content-between">' +
                                    '<span class="text-gray-dark"><strong> '+ nome +' </strong></span>' +
                                    '</div>' +
                                    '<span class="d-block">'+ dados.mensagem +'</span>' +
                                '</div>' +
                            '</div>';

                    $('#result_conversas').append(html)

                    document.getElementById('msg_resposta').value="";

                }

            }, error: function(XMLHttpRequest) {
                console.log(XMLHttpRequest.responseText)
            }
        })
    }
}