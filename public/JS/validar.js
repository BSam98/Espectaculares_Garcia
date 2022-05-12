//set minutes
var mins = 2;

//calculate the seconds
var secs = mins * 60;

var minutos;

var segundos;
var btnTiempo;
var descuentos = [];
var juegosGratis = [];
var pulseraMagica = [];

//countdown function is evoked when page is loaded

$("#validarTarjeta").click(function(){
    iniciarCarga();
    var html ='';
    var folio = $("#tarjetaVal").val();
    var creditos = $("#Creditos").val();
    
    $.ajax({
        type:"POST",
        url: 'Validacion_Interfaz/Tarjeta',
        data: {'folio':folio},
        dataType: 'JSON',
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            cerrarCarga();
        },
    }).done(function(data){
        if(data.respuesta){
            if(data.msj[0]['CreditoC'] >= creditos){
                alert('Pasa por creditos de cortesia');
                html = 'Pago Generado: ' + creditos;
                $('.alert').show();
            }
            else{
                if(data.msj[0]['CreditoN']>= creditos){
                    alert('Pasa por creditos normales');
                }
            }
            cerrarCarga();
        }
    });
});

/*
if($("#tarjetaVal").change()){
    alert($("#tarjetaVal").val());

    $("#tarjetaVal").val('');

}
*/

$(document).on('change','#tarjetaVal',function(event){
    iniciarCarga();
    var html = '';
    var suma;
    var indiceJuegos;
    var indicePulsera;
    var indiceDescuentos;
    var date = new Date();
    var cantidad ;
    var boletos;

    var fecha = date.toISOString().split('T')[0];
    fecha += ' ' + date.getHours()+':'+date.getMinutes()+':'+date.getSeconds();
    fecha += '.'+'000'
    var folio = $("#tarjetaVal").val();
    var creditos = parseInt( $("#Creditos").val());

    $.ajax({
        type:"POST",
        url: 'Validacion_Interfaz/Tarjeta',
        data: {'folio':folio},
        dataType: 'JSON',
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            cerrarCarga();
        },
    }).done(function(data){

        if(data.respuesta){
            var CreditoN = parseInt(data.msj[0]['CreditoN']);
            var CreditoC = parseInt(data.msj[0]['CreditoC']);

            for(var i=0; i<juegosGratis.length; i++){

                /**Evalua si la promocion de juegos gratis se encuentra
                 * activada en este preciso momento, si esta activada 
                 * el indice de ese registro se almacena en la variable
                 * indiceJuegos para despues realizar el registro de 
                 * la promocion en especifico
                 */
                if(fecha >= juegosGratis[i]['FechaInicial'] && fecha<=juegosGratis[i]['FechaFinal']){
                    indiceJuegos = i;
                }
    
            }
    
            for(var i=0; i<pulseraMagica.length;i++){
    
                if(fecha>=pulseraMagica[i]['FechaInicial'] && fecha<=pulseraMagica[i]['FechaFinal']){
                    console.log(pulseraMagica[i]['FechaInicial']);
                    indicePulsera = i;
                }
    
            }
    
            for(var i=0; i<descuentos.length;i++){
                if(fecha>=descuentos[i]['FechaInicial'] && fecha<= descuentos[i]['FechaFinal']){
                    indiceDescuentos = i;
                    cantidad = parseInt(descuentos[i]['Cantidad']);
                    boletos = descuentos[i]['Boletos'];
                }
            }

            if(indiceJuegos != null){
                
                html='<center style="background-color:#7EFF33">'+
                        '<label>Tarjeta: '+folio+'</label>'+
                        '<br>'+
                        '<label>Pase Correcto</label>'+
                        '<br>'+
                        '<label>'+juegosGratis[indiceJuegos]['Nombre']+'</label>'+
                    '</center>';
            }
            else{
                if(indicePulsera != null && data.pulsera.length != 0){
                    
                    html='<center style="background-color:#7EFF33">'+
                            '<label>Tarjeta: '+folio+'</label>'+
                            '<br>'+
                            '<label>Pase Correcto</label>'+
                            '<br>'+
                            '<label>'+pulseraMagica[indicePulsera]['Nombre']+'</label>'+
                        '</center>';
                }
                else{
                    if(indiceDescuentos != null){
                        var costo = creditos * boletos;

                        if(CreditoN >= costo){
                            html='<center style="background-color:#7EFF33">'+
                            '<label>Tarjeta: '+folio+'</label>'+
                            '<br>'+
                            '<label>Promoción: '+descuentos[indiceDescuentos]['Nombre']+'</label>'+
                            '<br>'+
                            '<label>Credito Anterior: </label>'+ CreditoN+
                            '<br>'+
                            '<label>Descuento:    </label>' +costo +
                            '<br>'+
                            '<label>Credito Actual:    </label>'+  (CreditoN - costo) +
                            '</center>';
                        }
                        else{
                            if(CreditoC >= costo){
                                html='<center style="background-color:#7EFF33">'+
                                '<label>Tarjeta: '+folio+'</label>'+
                                '<br>'+
                                '<label>Promoción: '+descuentos[indiceDescuentos]['Nombre']+'</label>'+
                                '<br>'+
                                '<label>Credito de Cortesia Anterior: </label>'+ CreditoC+
                                '<br>'+
                                '<label>Descuento:    </label>' +costo +
                                '<br>'+
                                '<label>Credito de Cortesia Actual:    </label>'+  (CreditoC - costo) +
                                '</center>';
                            }
                            else{
                                suma = CreditoC + CreditoN;
                                if(suma >= costo){
                                    html='<center style="background-color:#7EFF33">'+
                                    '<label>Tarjeta: '+folio+'</label>'+
                                    '<br>'+
                                    '<label>Promoción: '+descuentos[indiceDescuentos]['Nombre']+'</label>'+
                                    '<br>'+
                                    '<label>Credito Anterior: </label>'+ suma+
                                    '<br>'+
                                    '<label>Descuento:    </label>' +costo +
                                    '<br>'+
                                    '<label>Credito Actual:    </label>'+  (suma - costo) +
                                    '</center>';
                                }
                            }
                        }
                    }
                    else{
                        if((CreditoN >= creditos)){
                            html ='<center style="background-color:#7EFF33">'+
                                    '<label>Tarjeta: '+folio+'</label>'+
                                    '<br>'+
                                    '<label>Pase Correcto</label>'+
                                    '<br>'+
                                    '<label>Credito Anterior: </label>'+ CreditoN+
                                    '<br>'+
                                    '<label>Descuento:    </label>' +creditos +
                                    '<br>'+
                                    '<label>Credito Actual:    </label>'+  (CreditoN - creditos) +
                                    '</center>';
                        }
                        else{
                            if(CreditoC >= creditos){
                                html='<center style="background-color:#7EFF33">'+
                                        '<label>Tarjeta: '+folio+'</label>'+
                                        '<br>'+
                                        '<label>Pase Correcto</label>'+
                                        '<br>'+
                                        '<label>Credito de Cortesia Anterior: </label>'+ CreditoC+
                                        '<br>'+
                                        '<label>Descuento: </label>' +creditos +
                                        '<br>'+
                                        '<label>Credito de Cortesia Actual: </label>'+  (CreditoC - creditos)+
                                    '</center>';
                            }
                            else{
                                suma = CreditoN + CreditoC;
                                if(suma >= creditos){

                                    html='<center style="background-color:#7EFF33">'+
                                    '<label>Tarjeta: '+folio+'</label>'+
                                    '<br>'+
                                    '<label>Credito Anterior: </label>'+ suma+
                                    '<br>'+
                                    '<label>Descuento:    </label>' +creditos +
                                    '<br>'+
                                    '<label>Credito Actual:    </label>'+  (suma - creditos) +
                                    '</center>';
                                }
                                else{
                                    
                                    html='<center style="background-color:#FF3333">'+
                                            '<label>Tarjeta: '+folio+'</label>'+
                                            '<br>'+
                                            '<label>Credito Insuficiente</label>'+
                                            '<br>'+
                                            '<label>Descuento: </label>'+ creditos +
                                            '<br>'+
                                            '<label>Credito Actual: </label>'+ data.msj[0]['CreditoN']+
                                        '</center>';
                                }
                            }
                        }
                    }
                }
            }
        }
        cerrarCarga();
        document.getElementById("tarjetaVal").value = "";
        $('.alert').show();
        $('#respuesta').html(html);
    });
});

$('#tiempoExtra').click(function() {
    console.log('Tercer Prueba: ' + JSON.stringify(descuentos));
    btnTiempo.disabled = true;
    mm.style.color = "black";
    ss.style.color = "black";

    minutos = parseInt(4) + parseInt(document.getElementById("minutes").value);
    segundos = (minutos * 60) + parseInt(document.getElementById("seconds").value);
    document.getElementById("tarjetaVal").focus();
    setTimeout('decrement()',60);
});

$('#cerrarSesion').click(function(){
    var idAperturaValidador = $("#idAperturaValidador").val();
    var idAtraccionEvento = $("#idAtraccionEvento").val();

    $.ajax({
        beforeSend:function(){
            iniciarCarga();
        },
        type: "POST",
        url: 'Validacion_Interfaz/Cerrar_Sesion',
        data: {'idAtraccionEvento':idAtraccionEvento,'idAperturaValidador':idAperturaValidador},
        dataType: 'JSON',
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            cerrarCarga();
        },
    }).done(function(data){
        if(data.respuesta){
            cerrarCarga();
            window.location.href='http://localhost/Espectaculares_Garcia/public/';
        }
        else{
            alert(data.msj);
            cerrarCarga();
        }
    });
});

$(document).ready(function(){
    btnTiempo  = document.getElementById('tiempoExtra');
    btnTiempo.disabled=true;
    iniciarCarga();
    var tiempo = $("#TiempoMAX").val();
    var idAtraccionEvento = $("#idAtraccionEvento").val();
    promociones(idAtraccionEvento);

    console.log('Arreglo:  ' + descuentos);
    var datos = tiempo.split(':');
    console.log('Separacion: ' + datos);

    //alert(datos[2]);

    minutos = parseInt(datos[1]);

    segundos = (minutos * 60) + parseInt(datos[2]);

    //alert(segundos);

    $("#minutes").val(minutos);
    $("#seconds").val(segundos);

    setTimeout('decrement()',60);
});

function promociones(idAtraccionEvento){
    $.ajax({
        type:"POST",
        url:'Validacion_Interfaz/Promociones',
        data: {'idAtraccionEvento':idAtraccionEvento},
        dataType: 'JSON',
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
        },
    }).done(function(data){
        if(data.respuesta){
            console.log('Primera aparicion: ' + JSON.stringify(data.descuentos));
            descuentos = data.descuentos;
            juegosGratis = data.juegosGratis;
            pulseraMagica = data.pulseraMagica;
        }
    });
}

function decrement(){
    cerrarCarga();
    if(document.getElementById){
        mm = document.getElementById("minutes");
        ss = document.getElementById("seconds");

        if(ss < 59){
            ss.value = segundos;
        }
        else{
            mm.value = getMinutes();
            ss.value = getSeconds();
        }

        if(minutos < 1){
            mm.style.color = "red";
            ss.style.color = "red";
        }

        if(minutos < 0){
            alert('El tiempo de espera se ha terminado, favor de iniciar el ciclo o añadir tiempo extra.');
            btnTiempo.disabled=false;
            mm.value = 0;
            ss.value = 0;
        }
        else{
            segundos--;
            setTimeout('decrement()',1000);
        }
    }
}

function getMinutes(){
    minutos = Math.floor(segundos/60);
    return minutos;
}

function getSeconds(){
    return segundos - Math.round(minutos * 60);
}