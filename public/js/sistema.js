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
                url: "/minha_area/" + tipo,
                dataType: "html",
                data:dados,
    
                success: function(result) {

                    var json = JSON.parse(result);
                    var dados = json.dados;

                    if(tipo == 'empregos') {
                        MinhaArea.dadosAnuncioEmprego(dados);
                    } else if (tipo == 'servicos') {
                        MinhaArea.dadosAnuncioServicos(dados);
                    }
    
                }, error: function(XMLHttpRequest, textStatus, errorThrow) {
                    console.log(XMLHttpRequest);
                    console.log(textStatus);
                    console.log(errorThrow);
                }
            })
        }
    },

    dadosAnuncioEmprego: function(dados) {

        var dadosEmpregos = '';
        if(dados.length > 0) {
            for(var i = 0; i < dados.length; i++) {
                dadosEmpregos += HTML.anuncio_emprego(
                    dados[i].titulo, 
                    dados[i].descricao, 
                    dados[i].nome_regime, 
                    dados[i].salario,
                    dados[i].a_combinar,
                    dados[i].nome_empresa, 
                    dados[i].cidade, 
                    dados[i].estado,
                    dados[i].qtd_vagas,
                    dados[i].data_inicio,
                    dados[i].created_at
                );
            }
            document.getElementById('result_emprego').innerHTML = dadosEmpregos;
        } else {
            document.getElementById('result_emprego').innerHTML = HTML.sem_anuncio();
        }

    },

    dadosAnuncioServicos: function(dados) {

        var dadosServicos = '';
        if(dados.length > 0) {
            for(var i = 0; i < dados.length; i++) {
                dadosServicos += HTML.anuncio_servico(
                    dados[i].titulo,
                    dados[i].descricao,
                    dados[i].por_hora,
                    dados[i].valor
                );
            }

            document.getElementById('result_servico').innerHTML = dadosServicos;

        } else {
            document.getElementById('result_servico').innerHTML = HTML.sem_anuncio();
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

let HTML = {
    anuncio_emprego: function(titulo, descricao, regime, salario, combinar, empresa, cidade, estado, vagas, inicio, created_at) {
        
        //formatando data
        data = new Date(inicio);
        dia  = data.getDate().toString(),
        diaF = (dia.length == 1) ? '0'+dia : dia,
        mes  = (data.getMonth()+1).toString(), //+1 pois no getMonth Janeiro começa com zero.
        mesF = (mes.length == 1) ? '0'+mes : mes,
        anoF = data.getFullYear();

        data_inicio = diaF+"/"+mesF+"/"+anoF;

        //formatar data created at
        data_time = new Date(created_at);
        dia  = data_time.getDate().toString(),
        diaF = (dia.length == 1) ? '0'+dia : dia,
        mes  = (data_time.getMonth()+1).toString(), //+1 pois no getMonth Janeiro começa com zero.
        mesF = (mes.length == 1) ? '0'+mes : mes,
        anoF = data_time.getFullYear();
        hora = data_time.getHours().toString(),
        minutos = data_time.getMinutes().toString(),
        segundos = data_time.getSeconds().toString(),

        data_created_at = diaF+"/"+mesF+"/"+anoF+' '+hora+':'+minutos+':'+segundos;

        //limitando 293 caracteres na descrição
        descricao_296 = descricao.slice(0, 292) + '...';


        //definindo salario
        if(combinar) {
            salario_edit = 'a combinar'
        } else {
            salario_edit = 'R$ ' + salario
        }

        return html_anuncio_emprego = '<div class="card card_emprego mb-3">' +
                                        '<div class="row g-0">' +
                                            '<div class="col-md-8">' +
                                                '<div class="card-body">' +
                                                    '<div class="card-inner">' +
                                                        '<h5><a class="card-title" href="#">'+ titulo +'</a></h5>' +
                                                            '<p class="card-text mt-4">' +
                                                            descricao_296 +
                                                            '</p>'+
                                                            '<div class="row borda justify-content-end pr-4">'+
                                                                '<a class="link-desc" href="#">Ver descrição completa</a>' +
                                                            '</div>' +
                                    
                                                            '<div class="row borda justify-content-end pr-4">' +
                                                                '<small class="text-muted">Publicado em ' + data_created_at + '</small>' +
                                                            '</div>' +
                                                    '</div>' +
                                                    '<div class="row pr-4">' +
                                                        '<div class="col-md-3">' +
                                                            '<button class="btn btn-outline-danger mt-2" type="button"><i class="fa-regular fa-trash-can"></i> Inativar</button>'+
                                                        '</div>' +
                                                        '<div class="col-md-5 mt-2 div_view">' +
                                                            '<div class="views">' +
                                                                '<i class="fa-sharp fa-solid fa-eye"></i><span> 50</span>' +
                                                            '</div>' +
                                                        '</div>' +
                                                        '<div class="col-md-2">' +
                                                            '<h6><span class="badge bg-secondary m-2 p-2 branco">'+ regime +'</span></h6>' +
                                                        '</div>' +
                                                        '<div class="col-md-2 div_preco">' +
                                                            '<h2><span class="badge bg-light mt-2">' + salario_edit + '</span><h2>' +
                                                        '</div>' +
                                                    '</div>' +
                                                '</div>' +
                                            '</div>' +
                                            '<div class="col-md-4">' +
                                                '<div class="card_emp_direito">' +
                                                    '<div class="row">' +
                                                        '<div class="col-md-3 align-self-center"><i class="fa-solid fa-hotel"></i></div>' +
                                                        '<div class="col-md-9 title-emp align-self-center">' + empresa + '</div>' +
                                                    '</div>' +
                                                    '<div class="row">' +
                                                        '<div class="col-md-3 align-self-center"><i class="fa-regular fa-map"></i></div>' + 
                                                        '<div class="col-md-9 content-emp align-self-center">'+ cidade +', ' + estado + '</div>' +
                                                    '</div>' +
                                                    '<div class="row">' +
                                                        '<div class="col-md-3 align-self-center"><i class="fa-solid fa-pen-nib"></i></div>' +
                                                        '<div class="col-md-9 content-emp align-self-center">'+ vagas +' Vaga(s)</div>' +
                                                    '</div>' +
                                                    '<div class="row">' +
                                                        '<div class="col-md-3 align-self-center"><i class="fa-regular fa-calendar"></i></i></div>' +
                                                        '<div class="col-md-9 content-emp align-self-center">Início Previsto: '+ data_inicio +'</div>' +
                                                    '</div>'+ 
                                                '</div>' +
                                            '</div>' +
                                        '</div>' +
                                    '</div>';
    },

    anuncio_servico: function(titulo, descricao, por_hora, valor) {

        //limitando 293 caracteres na descrição
        descricao_350 = descricao.slice(0, 350) + '...';

        //lógica por hora
        
        if(por_hora) {
            tag_porHora = '<h6><span class="badge bg-info m-2 p-2 branco tag_por_hora">Por Hora</span></h6>';
            css_porHora = 'mt-neg';
        } else {
            tag_porHora ='';
            css_porHora = 'mt-2';
        }

        return html_anuncio_servico = '<div class="card card_servico mb-1">' +
                                            '<div class="card-body">' +
                                            '<h5 class="card-title"><a class="card-title" href="#">' + titulo + '</a></h5>' +
                                            '<p class="card-text">' + descricao_350 + '</p>' +
                                                '<span class="valor_servico">Valor: R$ ' + valor + tag_porHora +' </span><br>' +
                                            '<button class="btn btn-outline-danger ' + css_porHora + '" type="button"><i class="fa-regular fa-trash-can"></i> Inativar</button>' +
                                            '</div>' +
                                                '<div class="views view_servico">' +
                                                    '<i class="fa-sharp fa-solid fa-eye"></i><span> 50</span>' +
                                            '</div>' +
                                        '</div>';
    },

    sem_anuncio: function() {
        return html_sem_anuncio = '<h2 class="no-anuncio">Você não possui anúncios ainda :-(</h2>';
    }
}

let Inativar = {

    showModal: function(id_produto) {

        $('#modalInativar').modal('show');

        
    },

    anuncio_produto: function(id_produto) {

        jQuery.ajax({
            type: "POST",
            url: "/anuncio_produto/inativar/",
            dataType: "html",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{id_produto: id_produto},

            success: function(result) {

                var json = JSON.parse(result);
                var dados = json.dados;

                console.log(dados)

            }, error: function(XMLHttpRequest, textStatus, errorThrow) {
                console.log(XMLHttpRequest);
                console.log(textStatus);
                console.log(errorThrow);
            }
        })
    }
}