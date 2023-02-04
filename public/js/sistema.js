$(document).ready(function(){
    MinhaArea.meusAnuncios('produtos');
});

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
                } else if(tipo == 'produtos') {
                    MinhaArea.dadosAnuncioProdutos(dados);
                }
    
            }, error: function(XMLHttpRequest, textStatus, errorThrow) {
                console.log(XMLHttpRequest);
                console.log(textStatus);
                console.log(errorThrow);
            }
        })
    },

    dadosAnuncioProdutos: function(dados) {
        var dadosProdutos = '';
        if(dados.length > 0) {
            for(var i = 0; i < dados.length; i++) {
                dadosProdutos += HTML.anuncio_produto(
                    dados[i].id,
                    dados[i].titulo,
                    dados[i].descricao,
                    dados[i].created_at,
                    dados[i].nome_categoria,
                    dados[i].tipo,
                    dados[i].valor,
                    dados[i].foto_1,
                    dados[i].foto_2,
                    dados[i].foto_3,
                    dados[i].foto_4
                );
            }
            document.getElementById('result_produtos').innerHTML = dadosProdutos;
        } else {
            document.getElementById('result_produtos').innerHTML = HTML.sem_anuncio();
        }

    },

    dadosAnuncioEmprego: function(dados) {

        var dadosEmpregos = '';
        if(dados.length > 0) {
            for(var i = 0; i < dados.length; i++) {
                dadosEmpregos += HTML.anuncio_emprego(
                    dados[i].id,
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
                    dados[i].id,
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
        Inativar.getInativos();
    },

    favoritos: function() {
        document.getElementById('titulo_minha_area').innerHTML = 'Favoritos';
        document.getElementById('meus_anuncios_produtos').style = 'display: none'
        document.getElementById('meus_anuncios_empregos').style = 'display: none'
        document.getElementById('meus_anuncios_servicos').style = 'display: none'
        document.getElementById('anuncios_inativos').style = 'display: none'
        document.getElementById('anuncios_favoritos').style = 'display: block'
        document.getElementById('mensagens').style = 'display: none'
        Favoritos.getFavoritos();
        
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
    anuncio_produto: function(id, titulo, descricao, created_at, nome_categoria, tipo, valor, foto_1, foto_2, foto_3, foto_4) {
        var foto2 = '';
        var foto3 = '';
        var foto4 = '';
        var btn_carrousel = '';

        if(foto_2) {
            foto2 = '<div class="carousel-item">' +
                            '<img src="img/anuncio_produtos/'+ foto_2 +'" class="img-fluid rounded-start" style="height: 310px;">' +
                        '</div>'
            
            btn_carrousel =  '<button class="carousel-control-prev" type="button" data-target="#carouselAnuncio'+ id +'" data-slide="prev">' +
                                '<span class="icone-carousel" aria-hidden="true"><i class="fa-solid fa-circle-left"></i></span>' +
                            '</button>' +
                            '<button class="carousel-control-next" type="button" data-target="#carouselAnuncio'+ id +'" data-slide="next">' +
                                '<span class="icone-carousel" aria-hidden="true"><i class="fa-solid fa-circle-right"></i></span>' +
                            '</button>'
        }

        if(foto_3) {
            foto3 = '<div class="carousel-item">' +
                            '<img src="img/anuncio_produtos/'+ foto_3 +'" class="img-fluid rounded-start" style="height: 310px;">' +
                        '</div>'
        }

        if(foto_4) {
            foto4 = '<div class="carousel-item">' +
                            '<img src="img/anuncio_produtos/'+ foto_4 +'" class="img-fluid rounded-start" style="height: 310px;">' +
                        '</div>'
        }         
        
        //limitando 254 caracteres na descrição
        descricao_254 = descricao.slice(0, 254) + '...';

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

        return html_anuncio_produto = '<div class="card mb-3">' +
                                        '<div class="row g-0">' +
                                            '<div class="col-md-4 img_anuncio">' +
                                                '<div id="carouselAnuncio'+ id + '" class="carousel slide" data-ride="carousel">' +
                                                    '<div class="carousel-inner">' +
                                                        '<div class="carousel-item active">' +
                                                            '<img src="img/anuncio_produtos/'+ foto_1 +'" class="img-fluid rounded-start" style="height: 310px;">' +
                                                        '</div>' +
                                                        foto2 +
                                                        foto3 +
                                                        foto4 +
                                                    '</div>' +
                                                        btn_carrousel +
                                                '</div>' +
                                            '</div>' +
                                            '<div class="col-md-7">' +
                                                '<div class="card-body">' +
                                                   '<div class="card-inner">' +
                                                        '<h5><a class="card-title" href="#">'+ titulo +'</a></h5>' +
                                                            '<p class="card-text mt-4">' +
                                                                descricao_254 +
                                                            '</p>' +
                                                            '<div class="row borda justify-content-end pr-4">' +
                                                                '<a class="link-desc" href="#">Ver descrição completa</a>' +
                                                            '</div>' +
                                    
                                                            '<div class="row borda justify-content-end pr-4">' +
                                                                '<small class="text-muted">Publicado em '+ data_created_at +' - cód. PD'+ id +'</small>' +
                                                            '</div>' +
                                                    '</div>' +
                                                    '<div class="row pr-4">' +
                                                        '<div class="col-md-9">' +
                                                            '<h6><span class="badge bg-info m-2 p-2 branco">'+ nome_categoria +'</span></h6>' +
                                                            '<h6><span class="badge bg-info m-2 p-2 branco">'+ tipo +'</span></h6>' +
                                                        '</div>' +
                                                        '<div class="col-md-3">' +
                                                            '<h2><span class="badge bg-light mt-2">R$ ' + valor + '</span><h2>' +
                                                        '</div>' +
                                                    '</div>' +
                                                    '<div class="row borda justify-content-start ml-2 mt-3">' +
                                                        '<button type="button" onclick="Inativar.showModal(\'produto\', '+ id +')" class="btn btn-outline-danger" type="button"><i class="fa-regular fa-trash-can"></i> Inativar</button>' +
                                                        '<div class="views">' +
                                                            '<i class="fa-sharp fa-solid fa-eye"></i><span> 50</span>' +
                                                        '</div>' +
                                                    '</div>' +
                                                '</div>' +
                                            '</div>' +
                                        '</div>' +
                                    '</div>';
    },

    anuncio_emprego: function(id, titulo, descricao, regime, salario, combinar, empresa, cidade, estado, vagas, inicio, created_at) {
        
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
                                                            '<button class="btn btn-outline-danger mt-2" onclick="Inativar.showModal(\'emprego\', '+ id +')" type="button"><i class="fa-regular fa-trash-can"></i> Inativar</button>'+
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

    anuncio_servico: function(id, titulo, descricao, por_hora, valor) {

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
        //#TODO: Corrigir btn inativar, o click está com problema no css
        return html_anuncio_servico = '<div class="card card_servico mb-1">' +
                                            '<div class="card-body">' +
                                            '<h5 class="card-title"><a class="card-title" href="#">' + titulo + '</a></h5>' +
                                            '<p class="card-text">' + descricao_350 + '</p>' +
                                                '<span class="valor_servico">Valor: R$ ' + valor + tag_porHora +' </span><br>' +
                                            '<button class="btn btn-outline-danger ' + css_porHora + '" type="button" onclick="Inativar.showModal(\'servico\', '+ id +')"><i class="fa-regular fa-trash-can"></i> Inativar</button>' +
                                            '</div>' +
                                                '<div class="views view_servico">' +
                                                    '<i class="fa-sharp fa-solid fa-eye" style="margin-left: 110px; margin-top: -10px;"></i><span> 50</span>' +
                                            '</div>' +
                                        '</div>';
    },

    tabela_inativos: function(id, titulo, valor, tipo_anuncio) {
        var id_table = '';
        var valor_table = '';
        
        switch (tipo_anuncio) {
            case 1:
                id_table = 'PD'+id
                break;
            case 2: 
                id_table = 'EMP'+id
                break;
            case 3:
                id_table = 'SER'+id
                break;
        }

        if(valor != null) {
            valor_table = 'R$ ' + valor;
        } else {
            valor_table = 'N.A';
        }

        return html_tabela_inativos =       '<tr class="table-light">' +
                                                '<th scope="row">'+ id_table +'</th>' +
                                                '<td colspan="3">' + titulo + '</td>' +
                                                '<td>' + valor_table + '</td>' +
                                                '<td><button class="btn btn-primary" onclick="Reativar.ativar('+ id +', '+ tipo_anuncio +')"><i class="fa-solid fa-arrows-rotate"></i> Reativar</button></td>' +
                                            '</tr>';

    },

    tabela_favoritos: function(id, titulo, valor, tipo_anuncio) {
        var id_table = '';
        var valor_table = '';
        
        switch (tipo_anuncio) {
            case 1:
                id_table = 'PD'+id
                break;
            case 2: 
                id_table = 'EMP'+id
                break;
            case 3:
                id_table = 'SER'+id
                break;
        }

        if(valor != null) {
            valor_table = 'R$ ' + valor;
        } else {
            valor_table = 'N.A';
        }

        return html_tabela_favoritos =       '<tr class="table-light">' +
                                                '<th scope="row">'+ id_table +'</th>' +
                                                '<td colspan="3">' + titulo + '</td>' +
                                                '<td>' + valor_table + '</td>' +
                                                '<td><button class="btn btn-warning" onclick="Reativar.ativar('+ id +', '+ tipo_anuncio +')"><i class="fa-solid fa-envelope"></i> Mensagem</button></td>' +
                                            '</tr>';

    },

    sem_anuncio: function() {
        return html_sem_anuncio = '<h2 class="no-anuncio">Você não possui anúncios ainda :-(</h2>';
    }
}

let Inativar = {

    showModal: function(anuncio, id) {
        Inativar.getMotivoCancelamento();
        $('#modalInativar').modal('show');

        document.getElementById('motivo').className = "form-control";
        document.getElementById('msg_motivo').innerHTML = '';
        document.getElementById('descricao_modal').value = '';

        jQuery.ajax({
            type: "GET",
            url: "/minha_area/get_"+ anuncio +"/"+id,
            dataType: "html",

            data:{id: id},

            success: function(result) {

                var json = JSON.parse(result);
                var dados = json.dados;

                document.getElementById('inativar_title').innerHTML = 'Inativar: '+ dados[0].titulo;
                document.getElementById('id_anuncio').value = id;

                if(anuncio == 'produto') {
                    document.getElementById('bt-inativar').innerHTML = '<button type="button" class="btn btn-danger" onclick="Inativar.anuncio_produto()"><i class="fa-regular fa-trash-can"></i> Inativar</button>'
                } else if (anuncio == 'emprego') {
                    document.getElementById('bt-inativar').innerHTML = '<button type="button" class="btn btn-danger" onclick="Inativar.anuncio_emprego()"><i class="fa-regular fa-trash-can"></i> Inativar</button>'
                } else if(anuncio == 'servico') {
                    document.getElementById('bt-inativar').innerHTML = '<button type="button" class="btn btn-danger" onclick="Inativar.anuncio_servico()"><i class="fa-regular fa-trash-can"></i> Inativar</button>'
                }

            }, error: function(XMLHttpRequest, textStatus, errorThrow) {
                console.log(XMLHttpRequest.responseText);
                console.log(textStatus);
                console.log(errorThrow);
            }
        })
    },

    anuncio_produto: function() {
        var dados = {};
        dados.anuncio_produtos_id = document.getElementById('id_anuncio').value;
        dados.motivo_cancelados_id = document.getElementById('motivo').value;
        dados.descricao = document.getElementById('descricao_modal').value;

        jQuery.ajax({
            type: "POST",
            url: "/anuncio_produto/inativar/",
            dataType: "html",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: dados,

            success: function(result) {

                var json = JSON.parse(result);

                if(json.error) {
                    document.getElementById('motivo').className = "form-control is-invalid";
                    document.getElementById('msg_motivo').innerHTML = json.error[0];
                }

                if(json.status = 'success') {
                    document.getElementById('alert-success').style = "display: block;"
                    $('#modalInativar').modal('hide');

                    document.getElementById('alerta-sucesso-cont').innerHTML = "<strong>" + json.dados.titulo + "</strong>" + " inativado com sucesso!";
                    MinhaArea.meusAnuncios('produtos');

                }


            }, error: function(XMLHttpRequest) {
                console.log(XMLHttpRequest.responseText)
            }
        })
    },

    anuncio_emprego: function() {
        var dados = {};
        dados.anuncio_empregos_id = document.getElementById('id_anuncio').value;
        dados.motivo_cancelados_id = document.getElementById('motivo').value;
        dados.descricao = document.getElementById('descricao_modal').value;

        jQuery.ajax({
            type: "POST",
            url: "/anuncio_emprego/inativar/",
            dataType: "html",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: dados,

            success: function(result) {

                var json = JSON.parse(result);

                if(json.error) {
                    document.getElementById('motivo').className = "form-control is-invalid";
                    document.getElementById('msg_motivo').innerHTML = json.error[0];
                }

                if(json.status = 'success') {
                    document.getElementById('alert-success').style = "display: block;"
                    $('#modalInativar').modal('hide');

                    document.getElementById('alerta-sucesso-cont').innerHTML = "<strong>" + json.dados.titulo + "</strong>" + " inativado com sucesso!";
                    MinhaArea.meusAnuncios('empregos');

                }


            }, error: function(XMLHttpRequest) {
                console.log(XMLHttpRequest.responseText)
            }
        })
    },

    anuncio_servico: function() {
        var dados = {};
        dados.anuncio_servicos_id = document.getElementById('id_anuncio').value;
        dados.motivo_cancelados_id = document.getElementById('motivo').value;
        dados.descricao = document.getElementById('descricao_modal').value;

        jQuery.ajax({
            type: "POST",
            url: "/anuncio_servico/inativar/",
            dataType: "html",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: dados,

            success: function(result) {

                var json = JSON.parse(result);

                if(json.error) {
                    document.getElementById('motivo').className = "form-control is-invalid";
                    document.getElementById('msg_motivo').innerHTML = json.error[0];
                }

                if(json.status = 'success') {
                    document.getElementById('alert-success').style = "display: block;"
                    $('#modalInativar').modal('hide');

                    document.getElementById('alerta-sucesso-cont').innerHTML = "<strong>" + json.dados.titulo + "</strong>" + " inativado com sucesso!";
                    MinhaArea.meusAnuncios('servicos');

                }


            }, error: function(XMLHttpRequest) {
                console.log(XMLHttpRequest.responseText)
            }
        })
    },

    getMotivoCancelamento: function() {
        var dados = {}

        jQuery.ajax({
            type: "GET",
            url: "/motivo_cancelados",
            dataType: "html",
            data:dados,

            success: function(result) {

                var json = JSON.parse(result);
                var dados = json.dados;
                
                var selectMotivo = document.getElementById('motivo');
                selectMotivo.options.length = 0;

                option = new Option('Selecione o motivo', '');
                option.disabled = true;
                option.selected = true;
                selectMotivo.options[selectMotivo.options.length] = option;

                if(json.status == 'success') {
                    for(var i = 0; i < dados.length; i++) {
                        
                        option = new Option(dados[i].nome_motivo_cancelado, dados[i].id);
                        selectMotivo.options[selectMotivo.options.length] = option;

                    }
                }
                

            }, error: function(XMLHttpRequest, textStatus, errorThrow) {
                console.log(XMLHttpRequest);
                console.log(textStatus);
                console.log(errorThrow);
            }
        })
    },

    getInativos: function() {
        var dados = {}

        jQuery.ajax({
            type: "GET",
            url: "/minha_area/inativos",
            dataType: "html",
            data:dados,

            success: function(result) {
                
                var json = JSON.parse(result);
                var dados = json.dados

                var dadosInativos = '';
                if(dados.length > 0) {
                    for(var i = 0; i < dados.length; i++) {
                        dadosInativos += HTML.tabela_inativos(
                            dados[i].id,
                            dados[i].titulo,
                            dados[i].valor,
                            dados[i].tipo_anuncio_id
                        );
                    }
                    document.getElementById('content-table-inativos').innerHTML = dadosInativos;
                } else {
                    document.getElementById('tabela_inativos').innerHTML = HTML.sem_anuncio();
                }
                
            }, error: function(XMLHttpRequest, textStatus, errorThrow) {
                console.log(XMLHttpRequest.responseText);
                console.log(textStatus);
                console.log(errorThrow);
            }
        })
    }
}

let Favoritos = {
    getFavoritos: function() {
        var dados = {}

        jQuery.ajax({
            type: "GET",
            url: "/minha_area/favoritos",
            dataType: "html",
            data:dados,

            success: function(result) {

                var json = JSON.parse(result);
                var dados = json.dados

                var dadosFavoritos = '';
                if(dados.length > 0) {
                    for(var i = 0; i < dados.length; i++) {
                        for(var j = 0; j < dados.length; j++) {
                            dadosFavoritos += HTML.tabela_favoritos(
                                dados[j].id,
                                dados[j].titulo,
                                dados[j].valor,
                                dados[j].tipo_anuncios_id
                            );
                        }
                        break;
                    }
                    document.getElementById('content-table-favoritos').innerHTML = dadosFavoritos;
                } else {
                    document.getElementById('tabela_favoritos').innerHTML = HTML.sem_anuncio();
                }
                
            }, error: function(XMLHttpRequest, textStatus, errorThrow) {
                console.log(XMLHttpRequest.responseText);
                console.log(textStatus);
                console.log(errorThrow);
            }
        })
    }
}