/********************************** Iniciar y Cerrar Carga de Pagina *********************************/
function inicia_carg(){
    $('body').loadingModal({
      position: 'auto',
      text: 'Espere un momento',
      color: '#B0AEC6',
      opacity: '0.7',
      backgroundColor: 'rgb(1,61,125)', 
      animation: 'doubleBounce'
    }); 
}

function cierra_carg(){
    $('body').loadingModal('hide');
    $('body').loadingModal('destroy');
    console.log('adios perros');
}
/********************************** Iniciar y Cerrar Carga de Pagina *********************************/
/*************************************** FECHA Y HORA************************** */
function mueveReloj(){
    
    var d = new Date();

    var month = d.getMonth()+1;
    var day = d.getDate();

    var output = d.getFullYear() + '-' +((''+month).length<2 ? '0' : '') + month + '-' +((''+day).length<2 ? '0' : '') + day;


    momentoActual = new Date()
    hora = momentoActual.getHours()
    minuto = momentoActual.getMinutes()
    segundo = momentoActual.getSeconds()

    str_segundo = new String (segundo)
    if (str_segundo.length == 1)
    segundo = "0" + segundo

    str_minuto = new String (minuto)
    if (str_minuto.length == 1)
    minuto = "0" + minuto

    str_hora = new String (hora)
    if (str_hora.length == 1)
    hora = "0" + hora

    horaImprimible = output+" "+ hora + ":" + minuto + ":" + segundo

    //console.log(output+" "+horaImprimible);

    document.form_reloj.reloj.value = horaImprimible

    setTimeout("mueveReloj()",1000);

    $('#fecha').val(horaImprimible);
}
/*************************************** FECHA Y HORA************************** */

$('#mil').change(function () {
    //$("#mil").prop('disabled', true);
    valor_inicial = $(this).val();
    r = (valor_inicial * 1000);
    $('#bmil').val(r);
});
$('#quinientos').change(function () {
    //$("#mil").prop('disabled', true);
    valor_inicial = $(this).val();
    r = (valor_inicial * 500);
    $('#bquin').val(r);
});
$('#dosc').change(function () {
    //$("#mil").prop('disabled', true);
    valor_inicial = $(this).val();
    r = (valor_inicial * 200);
    $('#bdos').val(r);
});
$('#cien').change(function () {
    //$("#mil").prop('disabled', true);
    valor_inicial = $(this).val();
    r = (valor_inicial * 100);
    $('#bcien').val(r);
});
$('#cincuenta').change(function () {
    //$("#mil").prop('disabled', true);
    valor_inicial = $(this).val();
    r = (valor_inicial * 50);
    $('#bcin').val(r);
});
$('#veinte').change(function () {
    //$("#mil").prop('disabled', true);
    valor_inicial = $(this).val();
    r = (valor_inicial * 20);
    $('#bvei').val(r);
});
$('#diez').change(function () {
    //$("#mil").prop('disabled', true);
    valor_inicial = $(this).val();
    r = (valor_inicial * 10);
    $('#mdiez').val(r);
});
$('#cinco').change(function () {
    //$("#mil").prop('disabled', true);
    valor_inicial = $(this).val();
    r = (valor_inicial * 5);
    $('#mcinco').val(r);
});
$('#dos').change(function () {
    //$("#mil").prop('disabled', true);
    valor_inicial = $(this).val();
    r = (valor_inicial * 2);
    $('#mdos').val(r);
});
$('#uno').change(function () {
    //$("#mil").prop('disabled', true);
    valor_inicial = $(this).val();
    r = (valor_inicial * 1);
    $('#muno').val(r);
}); 
$('#cincuentac').change(function () {
    //$("#mil").prop('disabled', true);
    valor_inicial = $(this).val();
    r = (valor_inicial * 0.50);
    $('#mcincuenta').val(r);
});

function suma(){
    var mil=quin=dosc=cien=cinc=veint=total=md=mc=mdos=mu=mcc=0;
        $("#bmil").each(function() {
            if (isNaN(parseFloat($(this).val()))) {
            mil += 0;
            } else {
            mil += parseFloat($(this).val());
            }
        });
        $("#bquin").each(function() {
            if (isNaN(parseFloat($(this).val()))) {
            quin += 0;
            } else {
            quin += parseFloat($(this).val());
            }
        });
        $("#bdos").each(function() {
            if (isNaN(parseFloat($(this).val()))) {
            dosc += 0;
            } else {
            dosc += parseFloat($(this).val());
            }
        });
        $("#bcien").each(function() {
            if (isNaN(parseFloat($(this).val()))) {
            cien += 0;
            } else {
            cien += parseFloat($(this).val());
            }
        });
        $("#bcin").each(function() {
            if (isNaN(parseFloat($(this).val()))) {
            cinc += 0;
            } else {
            cinc += parseFloat($(this).val());
            }
        });
        $("#bvei").each(function() {
            if (isNaN(parseFloat($(this).val()))) {
            veint += 0;
            } else {
            veint += parseFloat($(this).val());
            }
        });
        $("#mdiez").each(function() {
            if (isNaN(parseFloat($(this).val()))) {
            md += 0;
            } else {
            md += parseFloat($(this).val());
            }
        });
        $("#mcinco").each(function() {
            if (isNaN(parseFloat($(this).val()))) {
            mc += 0;
            } else {
            mc += parseFloat($(this).val());
            }
        });
        $("#mdos").each(function() {
            if (isNaN(parseFloat($(this).val()))) {
            mdos += 0;
            } else {
            mdos += parseFloat($(this).val());
            }
        });
        $("#muno").each(function() {
            if (isNaN(parseFloat($(this).val()))) {
            mu += 0;
            } else {
            mu += parseFloat($(this).val());
            }
        });
        $("#mcincuenta").each(function() {
            if (isNaN(parseFloat($(this).val()))) {
            mcc += 0;
            } else {
            mcc += parseFloat($(this).val());
            }
        });
    total=mil+quin+dosc+cien+cinc+veint+md+mc+mdos+mu+mcc;
    alert(total);
    $('#money').val('$ '+ total);
    var totalV = $('#voucher').val();
    $('#vouch').val('$' + totalV);
}

$(document).on('click', '#registrar', function(){
    suma();
});