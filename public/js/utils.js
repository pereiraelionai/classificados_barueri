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

let Mascara = {
    setCPF: function(obj) {
        obj.maxLength = 14;
        obj.onkeypress = function (ev) {
            ev = window.event || ev;
            var keyCode = ev.keyCode || ev.which;

            if(keyCode === 9 || keyCode === 46 || keyCode === 8)
                return true;

            if(!Number.isNumber(String.fromCharCode(keyCode)))
                return false;
            
            var temp = obj.value;

            if(temp.length == 3) {
                temp += '.';
                obj.value = temp;
                return
            }

            if(temp.length == 7) {
                temp += '.';
                obj.value = temp;
                return
            }

            if(temp.length == 11) {
                temp += '-';
                obj.value = temp;
                return
            }
        }   
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
    }
}

function fecharAlert() {
    document.getElementById('alert-success').style = "display: none;"
}