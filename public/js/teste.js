return false;
        }
    }
}

function ArrayUF(){

    var ufs = new Array(
        'AC', 
        'AL', 
        'AM', 
        'AP', 
        'BA', 
        'CE', 
        'DF', 
        'ES', 
        'GO', 
        'MA', 
        'MG', 
        'MS', 
        'MT', 
        'PA', 
        'PB', 
        'PE', 
        'PI', 
        'PR', 
        'RJ', 
        'RN', 
        'RO', 
        'RR', 
        'RS', 
        'SC', 
        'SE', 
        'SP', 
        'TO');

    return ufs;
}

var Select = {
    
    FillWithJSON: function (obj, json, idField, nameField){
        if (json == '')
            return;

        var objJSON = JSON.parse(json);
        var objItem = null;

        for (var i in objJSON){
            Select.AddItem(obj, objJSON[i][nameField], objJSON[i][idField]);
        }
    },
    
    AddItem: function (obj, text, value) {
        var objItem = null;
        objItem = document.createElement('option');
        objItem.setAttribute('value', value);
        objItem.appendChild(document.createTextNode(text));
        obj.appendChild(objItem);
    },
    
    Clear: function (obj) {
        if (obj.childNodes.length > 0) {
            for (var i = obj.childNodes.length - 1; i >= 0; i--) {
                obj.removeChild(obj.childNodes[i]);
            }
        }
    },
    
    Show: function (obj, id){

        for (var i = 0; i < obj.length; i++) {
            if (parseInt(id) === parseInt(obj.options[i].value)){
                obj.selectedIndex = i;
                return;
            }
        }
    },
    
    ShowText: function (obj, Text){
        
        for (var i = 0; i < obj.length; i++) {
            if (Text == obj.options[i].text)
            {
                obj.selectedIndex = i;
                return;
            }
        }
    },
    
    GetText: function (obj){
        return obj.options[obj.selectedIndex].text;
    },

    GetAttributeOption: function(obj, attribute){
        return obj.options[obj.selectedIndex].getAttribute(attribute);
    },

    SetAttributeOption: function(obj, attribute, valor){
        obj.options[obj.selectedIndex].setAttribute(attribute, valor);
    },
    
    // SetText: function (obj, text){
    //     return obj.options[obj.selectedIndex].text = text;
    // },
    
    GetOption: function (obj){
        return obj.options[obj.selectedIndex];
    }
};

function CriarDiv(id) {

    var achou = false;

    var as = document.getElementsByTagName('div');
    for (var i = 0; i < as.length; i++) {
        if (as[i].id === id) {
            achou = true;
            break;
        }
    }

    if (!achou)
        document.body.appendChild(DOM.newElement('div', id));

    return ElementoById(id);
}

Modal = function (div, largura, altura, posicaoz) {

    var style = document.createElement("style");
    style.type = "text/css";
    style.innerHTML = "#divBlock" + div + " { " +
            "width:100%;" +
            "height:100%;" +
            "text-align:center;" +
            "position:fixed;" +
            "top:0px;" +
            "right:0px;" +
            "overflow:auto;" +
            "vertical-align:middle;}" +
            "#divBlockTransp" + div + " { " +
            "cursor: not-allowed; " +
            "width:100%;" +
            "height:100%;" +
            "background:#000;" +
            "text-align:center;" +
            "position:fixed;" +
            "top:0px;" +
            "right:0px;" +
            "overflow:auto;" +
            "vertical-align:middle;}" +
            " #" + div + " {" +
            "font-size:13px;" +
            "line-height:normal;" +
            "overflow:auto;" +
            "height:auto;" +
            "width:100%;" +
            "max-width:" + largura + "px;" +
            "min-height: " + altura + "px;" +
            "background:#FFFFFF;" +
            "text-align:left;" +
            "box-sizing:border-box;" +
            "position:relative;" +
            "top:50%;" +
            "left:50%;" +
            "margin-left:" + ((largura / 2) * -1) + "px;" +
            "margin-top:" + ((altura / 2) * -1) + "px;" +
            "} " +
            "@media screen and (min-height: 0px) and (max-width: " + largura + "px) {" +
            " #divClose" + div + " {" +
            "text-align:right;" +
            "position:relative;" +
            "min-height:auto;" +
            "height:38px;" +
            "top:auto;" +
            "left:auto;" +
            "right:0px;" +
            "margin-left:0px;" +
            "margin-bottom:-18px;" +
            "float:right;" +
            "margin-top:0px;" +
            "max-width:40px;" +
            "width:100%;" +
            "}" +
            " #" + div + " {" +
            "overflow:auto;" +
            "height:auto;" +
            "max-height:auto;" +
            "position:relative;" +
            "left:auto;" +
            "top:auto;" +
            "margin-left:0px;" +
            "margin-top:0px;" +
            "width:100%;" +
            "}" +
            "}" +
            "@media screen and (max-height: " + altura + "px) {" +
            " #" + div + "2 {" +
            "top:auto;" +
            "}" +
            "}";

    var achou = false;
    var linksDinamicos = document.getElementsByTagName("style");
    for (var i = 0; i < linksDinamicos.length; i++) {
        if (linksDinamicos[i].innerHTML === style.innerHTML) {
            achou = true;
            break;
        }
    }

    if (!achou) {
        var links = document.getElementsByTagName("link");
        document.getElementsByTagName('head')[0].insertBefore(style, links[0]);
    }    

    if (!isElemento('div', ElementoById('divBlockTransp' + div))) {
        this.divBlockTransp = document.createElement('div');
        this.divBlockTransp.setAttribute("id", "divBlockTransp" + div);
    }

    document.body.appendChild(this.divBlockTransp);
    this.divBlockTransp.style.visibility = 'hidden';
    this.divBlockTransp.style.zIndex = posicaoz;
    this.divBlockTransp.style.filter = 'alpha(opacity=45)';
    this.divBlockTransp.style.opacity = (45 / 100);

    if (!isElemento('div', ElementoById('divBlock' + div))) {
        this.divBlock = document.createElement('div');
        this.divBlock.setAttribute("id", "divBlock" + div);
    }

    this.divBlock.style.visibility = 'hidden';
    this.divBlock.style.zIndex = posicaoz + 1;
    document.body.appendChild(this.divBlock);

    //FECHAR MODAL
    $('#' + div + ' .modalbotaofechar').on('click', function(event) {
        document.body.style.overflow = 'visible';
        $('#divBlockTransp' + div).remove();
        $('#divBlock' + div).remove();
    });

    ElementoById(div).style.visibility = 'hidden';
    this.divBlock.appendChild(ElementoById(div));

    ElementoById(div).style.zIndex = posicaoz + 1;

    this.Realinhar = function (altura, largura) {

        this.divFechar.style.top = (altura * -1) + 'px';
        this.divFechar.style.left = (largura / 2) - 5 + "px";

        this.divFechar.setAttribute('title', 'Fechar');
        this.divFechar.setAttribute('style', 'height:37px; width:37px; left:50%; top:50%; background-repeat:no-repeat; background-image:url(assets/img/check.png); position: absolute;  margin-top:' + (((altura / 2) * -1) - 18.5) + 'px; margin-left:' + ((largura / 2) - 18.5) + 'px');
        this.divFechar.style.position = 'fixed';
        this.divFechar.style.zIndex = posicaoz + 4;

        ElementoById(div).setAttribute('style', 'margin-left:' + ((largura / 2) * -1) + 'px; margin-top:' + ((altura / 2) * -1) + 'px');

        ElementoById(div).style.minHeight = altura + "px";
        ElementoById(div).style.maxWidth = largura + "px";
        ElementoById(div).style.left = "50%";
        ElementoById(div).style.top = "50%";
        ElementoById(div).style.position = "fixed";
        ElementoById(div).style.zIndex = posicaoz + 2;
    };

    this.Abrir = function () {
        this.divBlockTransp.style.visibility = 'visible';
        this.divBlock.style.visibility = 'visible';
        ElementoById(div).style.visibility = 'visible';
        document.body.style.overflow = 'hidden';
    }

    this.Fechar = function () {
        document.body.style.overflow = 'visible';
        $('#divBlockTransp' + div).remove();
        $('#divBlock' + div).remove();
    }
}

function FecharModal(div){
    document.body.style.overflow = 'visible';
    $('#divBlockTransp' + div).remove();
    $('#divBlock' + div).remove();
}

function isElemento(tipo, id) {

    var as = document.getElementsByTagName(tipo);
    for (var i = 0; i < as.length; i++) {
        if (as[i].id == id) {
            return true;
        }
    }

    return false;
}

function FormatarValor(valor){

    var numero = valor.toFixed(2).split('.');
    numero[0] = numero[0].split(/(?=(?:...)*$)/).join('.');
    
    return numero.join(',');
}

Number.isNumber = function (text) {
    if (text.trim() === '' || isNaN(Number.getFloat(text).toString()) || Number.Filter(text, '.,') === '')
        return false;

    return true;
};

Number.Filter = function (text, others) {
    
    var numeros = "12334567890";

    if (others)
        numeros += others;

    var temp = '';

    for (var i = 0; i < text.length; i++)
        if (numeros.indexOf(text[i]) >= 0)
            temp += text[i];

    return temp;
};

Number.getFloat = function (texto) {
    
    if (Number.Filter(texto, '') === '')
        return 0.0;

    var temp = Number.Filter(texto, ",.");
    var found = false;
    var numero = '';

    for (var i = temp.length - 1; i >= 0; i--)
        if ((temp[i] === '.' || temp[i] === ',') && !found) {
            found = true;
            numero = '.' + numero;
        }
        else {
            numero = temp[i] + numero;
        }

    return parseFloat(numero);
};

Number.parseFloat = function (texto) {
    
    if (Number.Filter(texto, '') === '')
        return 0.0;

    texto = texto.toString().replace('.', '');
    texto = texto.replace();

    var temp = Number.Filter(texto, ",.");

    var found = false;
    var numero = '';

    for (var i = temp.length - 1; i >= 0; i--)
        if ((temp[i] === '.' || temp[i] === ',') && !found) {
            found = true;
            numero = '.' + numero;
        }
        else {
            numero = temp[i] + numero;
        }

    return parseFloat(numero);
};

Number.parseFloatNegativo = function (texto) {

    if (typeof texto === 'number')
        texto = texto.toString();

    if (Number.Filter(texto, '') === '')
        return 0.0;
    texto = texto.replaceAll(' ', '');
    for (var i = texto.length - 1; i >= 0; i--) {
        if ((texto[i] === '.' || texto[i] === ',')) {
            if (texto[i] === '.')
                texto = texto.replaceAll(',', '');
            else {
                texto = texto.replaceAll('.', '');
                texto = texto.replaceAll(',', '.');
            }
            break;
        }
    }
    var n = 0;
    try {
        n = parseFloat(Number.Filter(texto, "Ee+-,."));
    } catch (e) {
        console.error('Erro conversão de tipo');
    }
    ;
    return n;
}

Number.FormatarDinheiro = function (valor) {

    valor = valor.toFixed(2);
    var teste = valor.toString().split('.');

    if (teste.length === 1) {
        valor += '.00';
    }
    else {
        if (teste[1].length < 2) {
            valor += '0';
        }
    }

    valor = valor.toString().replace('.', '');

    var tmp = valor + '';
    tmp = tmp.replace(/([0-9]{2})$/g, ",$1");

    if (tmp.length > 6)
        tmp = tmp.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");

    return tmp;
};

var Mascara = {
    
    setMoeda: function (obj) {
        
        obj.style.textAlign = 'right';
        obj.maxLength = 15;

        if(obj.value.trim() == ''){
            obj.value = ',  ';
        }

        obj.onkeypress = function (ev) {
            ev = window.event || ev;
            var keyCode = ev.keyCode || ev.which;

            //permite a propagação do BACKSPACE mesmo
            //quando alcançado o tamanho máximo do texto
            if (keyCode !== 8)
                if (obj.value.length >= obj.maxLength)
                    return false;

            //libera as teclas BACKSPACE e TAB
            if (keyCode === 8 || keyCode === 9)
                return true;

            if (!Number.isNumber(String.fromCharCode(keyCode)))
                return false;

            var temp = Number.Filter(obj.value) + String.fromCharCode(keyCode);

            switch (temp.length)
            {
                case 0:
                    obj.value = ',  ';
                    break;

                case 1:
                    obj.value = ', ' + temp;
                    break;

                case 2:
                    obj.value = ',' + temp;
                    break;

                default:
                    temp = temp.substr(0, temp.length - 2) + ',' + temp.substr(temp.length - 2, temp.length - 1);
                    obj.value = temp;
                    break;
            }

            return false;
        };

        obj.onfocus = function () {
            if (Number.getFloat(this.value) === 0.0)
                this.value = ',  ';
        }

        obj.onkeydown = function (ev) {
            ev = window.event || ev;
            var keyCode = ev.keyCode || ev.which;

            if (keyCode != 8)
                return true;

            this.value = this.value.substr(0, this.value.length - 1);
            var temp = Number.Filter(this.value);

            switch (temp.length)
            {
                case 0:
                    this.value = ',  ';
                    break;

                case 1:
                    this.value = ', ' + temp;
                    break;

                case 2:
                    this.value = ',' + temp;
                    break;

                default:
                    temp = temp.substr(0, temp.length - 2) + ',' + temp.substr(temp.length - 2, 2);
                    this.value = temp;
                    break;
            }

            return false;
        };
    },

    setMoedaNegativo: function (obj) {

        obj.style.textAlign = 'right';
        obj.maxLength = 16;
        obj.value = ',  ';

        obj.onkeypress = function (ev) {
            ev = window.event || ev;
            var keyCode = ev.keyCode || ev.which;

            var negativo = false;

            // permite a propaga??o do BACKSPACE mesmo
            // quando alcan?ado o tamanho m?ximo do texto
            if (keyCode !== 8)
                if (obj.value.length >= obj.maxLength)
                    return false;

            // libera as teclas BACKSPACE e TAB

            if (keyCode === 8 || keyCode === 9)
                return true;

            if (document.getSelection(obj).toString() != '') {
                obj.value = ',  ';
                return true;
            }

            if (!Number.isNumber(String.fromCharCode(keyCode)) && keyCode != 45)
                return false;

            if (obj.value.indexOf('-') > -1 || keyCode == 45) {
                negativo = true;
            }

            if (keyCode == 45 && (obj.value.indexOf('-') > -1 || Number.Filter(obj.value) > 0))
                var temp = Number.Filter(obj.value);
            else
                var temp = Number.Filter(obj.value) + String.fromCharCode(keyCode);

            if (temp.indexOf('-') > -1)
                negativo = false;

            switch (temp.length)
            {
                case 0:
                    obj.value = ',  ';
                    break;

                case 1:
                    obj.value = ', ' + (negativo ? "-" : "") + temp;
                    break;

                case 2:
                    obj.value = ',' + (negativo ? "-" : "") + temp;
                    break;

                default:
                    temp = temp.substr(0, temp.length - 2) + ',' + temp.substr(temp.length - 2, temp.length - 1);
                    obj.value = (negativo ? "-" : "") + temp;
                    break;
            }

            return false;
        };

        obj.onfocus = function () {
            if (Number.getFloat(this.value) === 0.0)
                this.value = ',  ';
        }

        obj.onkeydown = function (ev) {

            ev = window.event || ev;
            var keyCode = ev.keyCode || ev.which;

            var negativo = false;

            if (obj.value.indexOf('-') > -1 || keyCode == 45) {
                negativo = true;
            }

            if (keyCode != 8)
                return true;

            this.value = this.value.substr(0, this.value.length - 1);
            var temp = Number.Filter(this.value);

            if (temp.indexOf('-') > -1)
                negativo = false;

            switch (temp.length)
            {
                case 0:
                    this.value = ',  ';
                    break;

                case 1:
                    this.value = ', ' + (negativo ? "-" : "") + temp;
                    break;

                case 2:
                    this.value = ',' + (negativo ? "-" : "") + temp;
                    break;

                default:
                    temp = temp.substr(0, temp.length - 2) + ',' + temp.substr(temp.length - 2, 2);
                    this.value = (negativo ? "-" : "") + temp;
                    break;
            }

            return false;
        }
    },

    setCNPJ: function (obj) {
        obj.maxLength = 18;
        obj.onkeypress = function (ev) {
            ev = window.event || ev;
            var keyCode = ev.keyCode || ev.which;

            if (keyCode === 9 || keyCode === 46 || keyCode === 8)
                return true;

            if (!Number.isNumber(String.fromCharCode(keyCode)))
                return false;

            var temp = obj.value;

            if (temp.length == 2){
                temp += '.';
                obj.value = temp;
                return;
            }

            if (temp.length == 6){
                temp += '.';
                obj.value = temp;
                return;
            }

            if (temp.length == 10){
                temp += '/';
                obj.value = temp;
                return;
            }

            if (temp.length == 15){
                temp += '-';
                obj.value = temp;
                return;
            }
        };
    },
    
    setCPF: function (obj) {
        obj.maxLength = 14;
        obj.onkeypress = function (ev) {
            ev = window.event || ev;
            var keyCode = ev.keyCode || ev.which;

            if (keyCode === 9 || keyCode === 46 || keyCode === 8)
                return true;

            if (!Number.isNumber(String.fromCharCode(keyCode)))
                return false;

            var temp = obj.value;

            if (temp.length == 3){
                temp += '.';
                obj.value = temp;
                return;
            }

            if (temp.length == 7){
                temp += '.';
                obj.value = temp;
                return;
            }

            if (temp.length == 11){
                temp += '-';
                obj.value = temp;
                return;
            }
        };
    },

    setNull: function (obj) {
        obj.maxLength = 60;
        obj.onkeypress = function (ev) {
        };
    },

    setCEP: function (obj) {
        obj.maxLength = 9;
        obj.onkeypress = function (ev) {
            ev = window.event || ev;
            var keyCode = ev.keyCode || ev.which;

            if (keyCode === 9 || keyCode === 46 || keyCode === 8)
                return true;

            if (!Number.isNumber(String.fromCharCode(keyCode)))
                return false;

            var temp = obj.value;

            if (temp.length == 5) {
                temp += '-';
                obj.value = temp;
                return;
            }
        };
    },

    setData: function (obj) {
        var temHora = false;

        if (arguments.length == 2)
            temHora = arguments[1];

        if (temHora)
            obj.maxLength = 16;
        else
            obj.maxLength = 10;

        obj.onblur = function () {
            this.value = Date.AjustaData(this.value);
        };

        obj.onkeypress = function (ev) {
            ev = window.event || ev;
            var keyCode = ev.keyCode || ev.which;

            if (keyCode === 9 || keyCode === 46 || keyCode === 8)
                return true;

            if (!Number.isNumber(String.fromCharCode(keyCode)))
                return false;

            var mydata = obj.value;

            if (mydata.length == 2){
                mydata += '/';
                obj.value = mydata;
                return;
            }

            if (mydata.length == 5){
                mydata += '/';
                obj.value = mydata;
                return;
            }

            if (temHora){
                if (mydata.length == 10){
                    mydata += ' ';
                    obj.value = mydata;
                    return;
                }
                if (mydata.length == 13){
                    mydata += ':';
                    obj.value = mydata;
                    return;
                }
            }
        };
    },

    setHora: function (obj, withSeconds) {
        if (withSeconds)
            obj.maxLength = 8;
        else
            obj.maxLength = 5;

        obj.onkeypress = function (ev) {
            ev = window.event || ev;
            var keyCode = ev.keyCode || ev.which;

            if (keyCode === 9 || keyCode === 46 || keyCode === 8)
                return true;

            if (!Number.isNumber(String.fromCharCode(keyCode)))
                return false;

            var temp = obj.value;

            if (temp.length == 2) {
                temp = temp + ':';
                obj.value = temp;
                return;
            }

            if (withSeconds) {
                if (temp.length == 5) {
                    temp = temp + ':';
                    obj.value = temp;
                    return;
                }
            }
        };
    },

    setCelular: function (obj) {
        obj.maxLength = 15;
        obj.onkeypress = function (ev) {
            ev = window.event || ev;
            var keyCode = ev.keyCode || ev.which;

            if (keyCode === 9 || keyCode === 46 || keyCode === 8)
                return true;

            if (!Number.isNumber(String.fromCharCode(keyCode)))
                return false;

            var temp = obj.value;

            if (temp.length == 0){
                temp += '(';
                obj.value = temp;
                return true;
            }

            if (temp.length == 3){
                temp += ') ';
                obj.value = temp;
                return true;
            }

            if (temp.length == 4){
                temp += ' ';
                obj.value = temp;
                return true;
            }

            if (temp.length >= 6) {
                if (temp.substring(5, 6) == '9') {
                    if (temp.length >= 4) {
                        if (temp.substring(0, 4) == '(11)' || temp.substring(0, 4) == '(12)' || temp.substring(0, 4) == '(13)'
                                || temp.substring(0, 4) == '(14)' || temp.substring(0, 4) == '(15)' || temp.substring(0, 4) == '(16)'
                                || temp.substring(0, 4) == '(17)' || temp.substring(0, 4) == '(18)' || temp.substring(0, 4) == '(19)'
                                || temp.substring(0, 4) == '(21)' || temp.substring(0, 4) == '(22)' || temp.substring(0, 4) == '(24)'
                                || temp.substring(0, 4) == '(27)' || temp.substring(0, 4) == '(28)') {
                            if (temp.length == 10){
                                obj.maxLength = 15;
                                temp += '-';
                                obj.value = temp;
                                return true;
                            }
                        }else {
                            
                            if (temp.length == 9){
                                obj.maxLength = 14;
                                temp += '-';
                                obj.value = temp;
                                return true;
                            }
                        }
                    }
                } else {
                    if (temp.length == 9){
                        obj.maxLength = 14;
                        temp += '-';
                        obj.value = temp;
                        return true;
                    }
                }
            }
        };
    },

    setOnlyNumbers: function (obj) {
        obj.onkeypress = function (ev) {
            ev = window.event || ev;
            var keyCode = ev.keyCode || ev.which;

            if (keyCode === 9 || keyCode === 8)
                return true;

            if(keyCode == 44 || keyCode == 46){
                return false;
            }

            if (!Number.isNumber(String.fromCharCode(keyCode)))
                return false;
        };
    },
};

Date.FormatDDMMYYYY = function (data, getHours) {
    
    var dia = data.getDate();

    if (dia < 10)
        dia = '0' + dia;

    var mes = data.getMonth() + 1;

    if (mes < 10)
        mes = '0' + mes;

    var temp = dia + '/' + mes + '/' + data.getFullYear();

    if (getHours) {
        var hora = data.getHours();

        if (hora < 10)
            hora = '0' + hora;

        var minutos = data.getMinutes();

        if (minutos < 10)
            minutos = '0' + minutos;

        var segundos = data.getSeconds();

        if (segundos < 10)
            segundos = '0' + segundos;

        temp += ' ' + hora + ':' + minutos + ':' + segundos;
    }

    return temp;
};

Date.GetDate = function (getHours) {
    return Date.FormatDDMMYYYY(new Date(), getHours);
};

function getLinhaGrid(elemento) {
    return gridObjetoLinha(elemento);
}

function gridObjetoLinha(elemento) {
    var pai = elemento.parentNode;
    var i = 1;

    while (pai.tagName.toString().toUpperCase().replace(/'/g, "").replace(/"/g, "") !== 'TR') {
        pai = pai.parentNode;
        i++;
        if (i > 5) {
            return '';
        }
    }

    return pai.rowIndex - 1;
}

Date.AjustaData = function (data) {
    
    if (Date.isDate(data))
        return data;

    if (data.length != 8 && data.length != 10)
        return data;

    var temp = data;

    var dia = temp.substr(0, 2);
    var mes = temp.substr(3, 2);
    var ano = '';

    if (temp.length == 8)
    {
        ano = temp.substr(6, 2);

        if (parseInt(ano) > 29)
            ano = '19' + ano;
        else
            ano = '20' + ano;

        temp = dia + '/' + mes + '/' + ano;
    }
    else
        ano = data.substr(6, 4);

    if (!Date.isDate(temp))
    {
        if (parseInt(dia) > 28)
            temp = --dia + '/' + mes + '/' + ano;

        if (!Date.isDate(temp))
            temp = --dia + '/' + mes + '/' + ano;

        if (!Date.isDate(temp))
            temp = --dia + '/' + mes + '/' + ano;
    }

    if (Date.isDate(temp))
        return temp;
    else
        return data;
};

Date.isDate = function (data) {
    
    if (data.length < 10)
        return false;

    if (Number.Filter(data) === '')
        return false;

    var dia = parseInt(data.substr(0, 2));
    var mes = parseInt(data.substr(3, 2));
    var ano = parseInt(data.substr(6, 4));

    if (dia < 1 || dia > 31)
        return false;

    if (mes < 1 || mes > 12)
        return false;

    if ((mes === 2 || mes === 4 || mes === 6 || mes === 9 || mes === 11) && dia > 30)
        return false;

    var bissexto = false;

    if (ano % 4 === 0 && (ano % 400 === 0 || ano % 100 !== 0))
        bissexto = true;

    if (!bissexto && mes === 2 && dia > 28)
        return false;

    if (bissexto && mes === 2 && dia > 29)
        return false;

    return true;
};

function SetarMultiSelect(elemento){

    $('#' + elemento).multiSelect({
        afterInit: function(ms){

            var that = this,
            $selectableSearch = that.$selectableUl.prev(),
            $selectionSearch = that.$selectionUl.prev(),
            selectableSearchString = '#'+that.$container.attr('id')+' .ms-elem-selectable:not(.ms-selected)',
            selectionSearchString = '#'+that.$container.attr('id')+' .ms-elem-selection.ms-selected';

            that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
            .on('keydown', function(e){
                if (e.which === 40){
                    that.$selectableUl.focus();
                    return false;
                }
            });

            that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
            .on('keydown', function(e){
                if (e.which == 40){
                    that.$selectionUl.focus();
                    return false;
                }
            });
        },
        afterSelect: function(){
            this.qs1.cache();
            this.qs2.cache();
        },
        afterDeselect: function(){
            this.qs1.cache();
            this.qs2.cache();
        }
    });
}

var Hora = {

    validarHorario: function (hora) {

        /*
        *Valida horas
        */
        
        var n = hora.indexOf(':');
        var ok = true;

        if(hora != ''){

            //Valida se não tem o ":"
            if(n == -1){
                ok = false;
            }

            var horas = hora.substring(0, 2);
            var minutos = hora.substring(3, 5);

            //Valida horas e minutos
            if((horas < 00) || (horas > 23) || (minutos < 00) || (minutos > 59)){
                ok = false;
            }
        }

        return ok;
    },

    parseTime: function(time){

        /*
        *Converte uma hora para número inteiro
        */

        var h = time.split(':');
        return parseInt(h[0]) * 60 + parseInt(h[1]);
    },

    numberToTime: function(numero){

        /*
        *Converte um numero inteiro para hora
        */

        var hora = Math.floor(numero / 60);
        var minutos = numero % 60;

        if(hora < 10){
            hora = '0' + hora;
        }
        
        if(minutos < 10){
            minutos = '0' + minutos;
        }

        return hora + ':' + minutos;
    },

    curtime: function(withSeconds){

        var data = new Date();
        var hora = data.getHours();
        var minutos = data.getMinutes();

        if(minutos < 10){
            minutos = '0' + minutos;
        }

        var horario = hora + ':' + minutos;

        if(withSeconds){
            var segundos = data.getSeconds();
            horario += ':' + segundos;
        }

        return horario;
    },

    numberHoursToNumberDays: function(numberHours){

        /*
        *Converte numero de horas para quantidade de dias
        */

        return Math.floor(numberHours / 24);
    },

    removeSecondsFromTime: function(time){

        if(time.length < 8)
            return time;
        else
            return time.substr(0, 5);
    }
}

var DataHora = {

    getMesByNome: function(nome){

        /*
        *Busca o numero do mês baseado no nome
        */

        var arrayMesNome = ['', 'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
        var arrayMes = ['', '01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];

        for(var i = 0; i < arrayMesNome.length; i++){

            if(nome.toUpperCase() == arrayMesNome[i].toUpperCase()){
                return arrayMes[i];
                break;
            }
        }
    }, 

    parseDate: function(data){
        var d = data.split(/\D+/);
        return new Date(d[2], --d[1], d[0]);
    },

    toDataBr: function(dataUs){

        /*
        *Converte datas americanas para datas brasileiras
        *Recebe uma data (2020-08-17 ou 2020/08/17)
        */

        var c = null;

        if(dataUs.indexOf('-') > 0){
            var c = '-';
        }else if(dataUs.indexOf('/') > 0){
            var c = '/';
        }

        if(c != null){
            var aux = dataUs.split(c, 4);
            var ano = aux[0];
            var mes = aux[1];
            var dia = aux[2];

            var dataBr = dia + '/' + mes + '/' + ano;
        }

        return dataBr;
    },

    toDataUs: function(dataBr){

        /*
        *Converte data BR para US
        */

        var c = null;

        if(dataBr.indexOf('-') > 0){
            var c = '-';
        }else if(dataBr.indexOf('/') > 0){
            var c = '/';
        }

        if(c != null){
            var aux = dataBr.split(c, 4);
            var ano = aux[2];
            var mes = aux[1];
            var dia = aux[0];

            var dataUs = ano + '-' + mes + '-' + dia;
        }

        return dataUs;
    },

    toDataUsWithTime: function(datetime, seconds){

        var c = null;

        if(datetime.indexOf('-') > 0){
            var c = '-';
        }else if(datetime.indexOf('/') > 0){
            var c = '/';
        }

        if(c != null){
            
            var time = datetime.split(" ")[1];
            var aux = datetime.split(c, 4);
            var ano = aux[2].replace(time, "").trim();
            var mes = aux[1];
            var dia = aux[0];

            var dataUs = ano + '-' + mes + '-' + dia;

            if(!seconds)
                dataUs += " " + time.substr(0,5);
            else
                dataUs += " " + time;
        }

        return dataUs;
    },

    getDiffBetweenDates: function(date1, date2){

        const diffTime = Math.abs(date2 - date1);
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

        return diffDays;
    },

    getDiffBetweenDateTime: function(dateWithTime1, dateWithTime2){

        /*
        *Calcula e retorna a diiferença entre duas horas
        *Recebe duas datas com as horas
        *Formato das datas = Tue Oct 13 2020 08:00:00 GMT-0300 (Horário Padrão de Brasília)
        */

        var diff = (dateWithTime2.getTime() - dateWithTime1.getTime()) / 1000;
        diff /= (60 * 60);

        return Math.abs(Math.round(diff));
    },

    curdate: function(separador){

        /*
        *Retorna data atual
        */

        separador = separador.trim();

        if(separador != '-' && separador != '/'){
            return '';
        }

        var dataJs = new Date();
        var dia = dataJs.getDate();

        if(dia < 10){
            dia = '0' + dia;
        }

        var mes = (dataJs.getMonth() + 1);

        if(mes < 10){
            mes = '0' + mes;
        }

        var ano = dataJs.getFullYear();

        if(separador == '/'){
            var hoje = dia + separador + mes + separador + ano;
        }else{
            var hoje = ano + separador + mes + separador + dia;
        }

        return hoje;
    }
}

var Crypt = {

    base64_encode: function(str){
        return btoa(str);
    },

    base64_decode: function(str){
        return atob(str);
    },

    credCrypt: function(str){

        var resultEncode = null;

        $.ajax({
            async: false,
            type: "GET",            
            url: '/../../../painel/crypt.php?code=' + str,
            dataType: "html",
            data: {},
            beforeSend: function(){
            },
            success: function (result) {
                resultEncode = result;

            }, error: function(result){
                console.log(result);
                return false;
            }
        });

        return resultEncode;
    },

    credDeCrypt: function(str){

        var resultDecode = null;

        $.ajax({
            async: false,
            type: "GET",            
            url: '/../../../painel/crypt.php?decode=' + str,
            dataType: "html",
            data: {},
            beforeSend: function(){
            },
            success: function (result) {
                resultDecode = result;

            }, error: function(result){
                console.log(result);
                return false;
            }
        });

        return resultDecode;
    },
}