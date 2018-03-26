// JavaScript 

$(document).ready(function() {

    /**
     * 
     * Função responsavel por gerar ação atraves de um bottao ou ate mesmo imagem
     */
    $('.buttonMenu').on('click', function() {
        c = $(this).attr('c');
        f = $(this).attr('f');
        r = $(this).attr('r');
        s = $(this).attr('s');

        $.ajax({
            url: 'controlador.php',
            type: 'POST',
            data: 'r=' + r + '&c=' + c + '&f=' + f,
            success: function(result) {
                $('#' + r).html(result);
            },
            beforeSend: function() {},
            complete: function() {}
        });
    });
	

}); //FIM do documento do ready

function request(){
    valido = true;
    $('.mgs_alerta').each(function() {
        if ($(this).val() === '' || $(this).val() === null) {
            valido = false;
            alert('campos são obrigatorios!');
        } else {
          //Caso percora mais de arquivos  
        }
    });

    if(valido === true){
        $('#formDados').each(function() {
            campos = $(this).serialize();			
        });

        $.ajax({
            url: 'controlador.php',
            type: 'POST',
            data: campos,
            success: function(result) {
                $('#formDados').each (function(){
                  this.reset();
                });          
                $('#grid').html(result);
            },
            beforeSend: function() {},
            complete: function() {}
        });        
    }
}

/**
 * Função reponsavel por gerar o "Data Picker" no formulário
 */
function setDatePicker(containerElement) {
    var datePicker = $('#' + containerElement);
    datePicker.datepicker({
        showOn: "button",
        buttonImage: "img/calendar.gif",
        buttonImageOnly: true
    });
}

/**
 * Função responsavel por colocar zero a esquerda
 * @param n = valor
 * @param len = quantidade
 * @param padding = simbolo
 * @returns {String}
 */
function pad(n, len, padding) {
    var sign = '', s = n;

    if (typeof n === 'number') {
        sign = n < 0 ? '-' : '';
        s = Math.abs(n).toString();
    }

    if ((len -= s.length) > 0) {
        s = Array(len + 1).join(padding || '0') + s;
    }
    return sign + s;
}


function valorMonetario(valor, conversao) {
    switch (conversao) {
        case "1":
            valor = valor.replace(" ", "");
            valor = valor.replace(".", "");
            valor = valor.replace(",", ".");
            break;

        case "2":
            valor = valor.replace(" ", "");
            valor = valor.replace(",", "");
            valor = valor.replace(".", ",");
            break;
    }
    return valor;
}


function validarData(value) {
    var expReg = /^(([0-2]\d|[3][0-1])\/([0]\d|[1][0-2])\/[1-2][0-9]\d{2})$/;
    var msgErro = 'Formato inválido de data.';
    if ((value.match(expReg)) && (value != '')) {
        return true;
    } else {
        return false;
    }
}

