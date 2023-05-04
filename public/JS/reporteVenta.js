var contador = 0;
var apertV ='';
var horaImprimible;
var vouch ='';
var dinero ='';
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

function suma(){}

$(document).on('click', '#registrar', function(){
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
    $('#money').val(total);
    var totalV = $('#voucher').val();
    $('#vouch').val(totalV);
    
    /*if((total != 0) || (totalV != 0)){
        $('#alertaSucc').show();
        $('#registrar').hide();
        $('#dtI').prop('disabled', true);
        $('#dtF').prop('disabled', true);
        $('#mil').prop('disabled', true);
        $('#quinientos').prop('disabled', true);
        $('#dosc').prop('disabled', true);
        $('#cien').prop('disabled', true);
        $('#cincuenta').prop('disabled', true);
        $('#veinte').prop('disabled', true);
        $('#diez').prop('disabled', true);
        $('#cinco').prop('disabled', true);
        $('#dos').prop('disabled', true);
        $('#uno').prop('disabled', true);
        $('#cincuentac').prop('disabled', true);
        $('#voucher').prop('disabled', true);
    }else{
        $('#alertaDan').show();
        $('#registrar').hide();
        $('#cerrarCaja').hide();
        $('#dtI').prop('disabled', true);
        $('#dtF').prop('disabled', true);
        $('#mil').prop('disabled', true);
        $('#quinientos').prop('disabled', true);
        $('#dosc').prop('disabled', true);
        $('#cien').prop('disabled', true);
        $('#cincuenta').prop('disabled', true);
        $('#veinte').prop('disabled', true);
        $('#diez').prop('disabled', true);
        $('#cinco').prop('disabled', true);
        $('#dos').prop('disabled', true);
        $('#uno').prop('disabled', true);
        $('#cincuentac').prop('disabled', true);
        $('#voucher').prop('disabled', true);
    }*/
    ajaxCaja();
});



function ajaxCaja(){

    var dtI = $('#dtI').val();
    var dtF = $('#dtF').val();
    var efect = $('#money').val();
    var vou = $('#vouch').val();
    var idv = $('#idv').val();
    var apertV ='';

    $.ajax({
        type:"POST",
        url:"cerrarC",
        data:{'devtI':dtI, 'devtF':dtF, 'efectivo':efect, 'vouch':vou, 'idv':idv},
        dataType: 'JSON',
        error: function(jqXHR, textStatus, errorThrown){
            alert('Se produjo un error: a'+ errorThrown + ' ' + textStatus);
        },
    }).done(function(data){
        console.log(data.msj);
        var html ='';
        for(var i = 0;i<data.msj.length; i++){
            //if((efect >= data.msj[i]['totalEfectivo']) && (vou >= data.msj[i]['totalTarjeta'])){
            if(efect < data.msj[i]['totalEfectivo'] || vou < data.msj[i]['totalTarjeta']){
                //alert("Verifica la cantidad ingresada"+data.msj[i]["totalEfectivo"]+'*'+efect+'/'+data.msj[i]["totalTarjeta"]+'*'+vou);
                $('#alertaDan').show();
                //location.reload();
                setTimeout('document.location.reload()',5000);
            }else{
                console.log(efect);
                console.log(data.msj[i]['totalEfectivo']);
                html +='<tr>'+
                            '<td>'+
                                '<div class="form-group">'+
                                    '<h5><i class="fa fa-fax" aria-hidden="true"></i>&nbsp;Fondo Inicial:</h5>'+
                                    '<input type="text" class="form-control" name="cierre" id="cierre" value="'+data.msj[i]["fondoCaja"]+'" style="background : inherit; border:none;" disabled>'+
                                '</div>'+
                            '</td>'+
                        '</tr>';
                        /*'<tr>'+
                            '<td>'+
                                '<div class="form-group">'+
                                    '<h5><i class="fa fa-calculator" aria-hidden="true"></i>&nbsp;Total de Efectivo:</h5>'+
                                    '<input type="text" class="form-control" name="dinEf" id="dinEf" value="'+data.msj[i]["totalEfectivo"]+'" disabled style="background : inherit; border:none;">'+
                                '</div>'+
                            '</td>'+
                        '</tr>'+
                        '<tr>'+
                            '<td>'+
                                '<div class="form-group">'+
                                    '<h5><i class="fa fa-braille" aria-hidden="true"></i>&nbsp;Total Voucher:</h5>'+
                                    '<input type="text" class="form-control" name="dinVouch" id="dinVouch" value="'+data.msj[i]["totalTarjeta"]+'" style="background : inherit; border:none;" disabled>'+
                                '</div>'+
                            '</td>'+
                        '</tr>'; */
                    $('#alertaSucc').show();
            }
            $("#informacion").html(html);
        }
    });
}

$(document).on('click', '#cerrarCaja', function(){
    var dtI = $('#dtI').val();
    var dtF = $('#dtF').val();
    var efect = $('#money').val();
    var vou = $('#vouch').val();
    var idv = $('#idv').val();
    $.ajax({
        type:"POST",
        url:"ForzarCierreC",
        data: $('#forzarC').serialize() + '&idAper=' + fc + '&fecha=' + horaImprimible,
        dataType: 'JSON',
        error: function(jqXHR, textStatus, errorThrown){
            alert('Se produjo un error: a'+ errorThrown + ' ' + textStatus);
        },
    }).done(function(data){
        $("#mensaje").html('');
        $("#mensaje2").html('');
        $('#alertaCorrecta').hide();
        $('#modalCerr').hide();
        if(data.msj == true){
            MENSAJE2 = "La sesion se ha cerrado correctamente";
            $("#mensaje2").html(MENSAJE2);
            $('#alertaCorrecta').show();
            window.location.href = "CerrarSesion";
        }else{
            MENSAJE = "Usted no puede forzar el cierre ya que no es un SUPERVISOR";
            $("#mensaje").html(MENSAJE);
            $('#modalCerr').show();
        }
    });
});

function cerrarTur(dinero, vouch){
    var dtI = $('#dtI').val();
    var dtF = $('#dtF').val();
    var efect = $('#money').val();
    var vou = $('#vouch').val();
    var idv = $('#idv').val();
    var fecha = $('#fecha').val();

    if((efect >= dinero) && (vou == vouch)){
        console.log(efect);
        console.log(dinero);
        console.log(vou);
        console.log(vouch);

        $.ajax({
            type:"POST",
            url:"cerrarTurno",
            data:{'dtI':dtI, 'dtF':dtF,'efectivo':efect,'vou':vou, 'idv':idv, 'fecha':fecha, 'dinero':dinero, 'vouchers':vouch},
            dataType: 'JSON',
            error: function(jqXHR, textStatus, errorThrown){
                alert('Se produjo un error: a'+ errorThrown + ' ' + textStatus);
            },
        }).done(function(data){
            console.log('Soy data '+ data.msj);
            if(data.msj == false){
                MENSAJE = "Error al cerrar el turno";
                $("#mensaje").html(MENSAJE);
                $('#modalCerr').show();
            }else{
                console.log('Soy data msj ' + data.msj);
                window.location.href = "CerrarSesion";
            }
        });
    }else{
        console.log('Error al cerrar Turno');
    }


    /*$.ajax({
        type:"POST",
        url:"cerrarTurno",
        data:{'devtI':dtI, 'devtF':dtF, 'efectivo':efect, 'vouch':vou, 'idv':idv},
        dataType: 'JSON',
        error: function(jqXHR, textStatus, errorThrown){
            alert('Se produjo un error: a'+ errorThrown + ' ' + textStatus);
        },
    }).done(function(data){

    });
    */
}