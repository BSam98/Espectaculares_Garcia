//set minutes
var mins = 2;

//calculate the seconds
var secs = mins * 60;

var minutos;

var segundos;
var btnTiempo;
var btnCiclo;
var descuentos = [];
var juegosGratis = [];
var pulseraMagica = [];
var cantidadP = 0;
var cantidadC = 0;
var cantidadCC = 0;
var cantidadD= 0;
var cantidadPM = 0;
var cantidadJG = 0;
var entradaN = 0;
var entradaC = 0;
var entradaMX = 0;
var ciclo = [];
var informacionCiclo = [];


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
    var cantidad;
    var boletos;
    var hora;
    var min;
    var sec;

    var fecha = date.toISOString().split('T')[0];

    hora = date.getHours();
    min = date.getMinutes();
    sec = '00.000';

    if(hora <= 9){
        hora = "0" + hora;
    }
    if(min<=9){
        min = "0" + min;
    }

    fecha += ' '+ hora + ':' + min+ ':'+ sec;


    alert('Fehca: ' + fecha);
    var folio = $("#tarjetaVal").val();
    var creditos = parseInt( $("#Creditos").val());
    var idAtraccionEvento = $("#idAtraccionEvento").val();

    $.ajax({
        type:"POST",
        url: 'Validacion_Interfaz/Tarjeta',
        data: {'folio':folio,'fecha':fecha},
        dataType: 'JSON',
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            cerrarCarga();
        },
    }).done(function(data){

        if(data.respuesta){
            console.log(data.msj);
            var CreditoN = parseInt(data.msj[0]['CreditoN']);
            var CreditoC = parseInt(data.msj[0]['CreditoC']);
            


            for(var i=0; i<juegosGratis.length; i++){

                /**Evalua si la promocion de juegos gratis se encuentra
                 * activada en este preciso momento, si esta activada 
                 * el indice de ese registro se almacena en la variable
                 * indiceJuegos para despues realizar el registro de 
                 * la promocion en especifico
                 */
                // 9:5:1 = 09:05:10
                console.log('datos: ' + JSON.stringify(juegosGratis));
                console.log('Informacion: ' + fecha+ ' fecha inicial : ' + juegosGratis[i]['FechaInicial'] + 'Fecha Final  '  + juegosGratis[i]['FechaFinal']);
                if(fecha >= juegosGratis[i]['FechaInicial'] && fecha<=juegosGratis[i]['FechaFinal']){
                    console.log('Hay juego gratisa ctivado');
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
                    cantidadJG +=1;
                    cantidadP += 1;

                informacionCiclo.push({'indice':1,'folio':folio,'idAtraccionEvento':idAtraccionEvento,'idFechaJuegosGratis':juegosGratis[indiceJuegos]['idFechaJuegosGratis']});
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
                        cantidadP += 1;
                        cantidadPM += 1;

                    informacionCiclo.push({'indice':2,'folio':folio,'idAtraccionEvento':idAtraccionEvento,'idFechaPulseraMagica':pulseraMagica[indicePulsera]['idFechaPulseraMagica']});
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
                            cantidadD = cantidadD + 1;
                            cantidadC = cantidadC + costo;
                            cantidadP += parseInt(descuentos[indiceDescuentos]['Cantidad']);

                            informacionCiclo.push({'indice':3,'CantidadN':costo,'folio':folio,'idAtraccionEvento':idAtraccionEvento,'idFechaDosxUno':descuentos[indiceDescuentos]['idFechaDosxUno'],'CantidadC':0});
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

                                cantidadD = cantidadD +  1;
                                cantidadCC = cantidadCC + costo;
                                cantidadP += parseInt(descuentos[indiceDescuentos]['Cantidad']);

                                informacionCiclo.push({'indice':3,'CantidadN':0,'folio':folio,'idAtraccionEvento':idAtraccionEvento,'idFechaDosxUno':descuentos[indiceDescuentos]['idFechaDosxUno'],'CantidadC':costo});
                            }
                            else{
                                suma = CreditoC + CreditoN;
                                if(suma >= costo){
                                    var residuo;
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

                                    residuo = costo-CreditoN;


                                    cantidadD += 1;
                                    //cantidadC += (CreditoN - costo);
                                    cantidadC += CreditoN;
                                    cantidadCC += residuo;
                                    cantidadP += parseInt(descuentos[indiceDescuentos]['Cantidad']);

                                    informacionCiclo.push({'indice':3,'CantidadN':CreditoN,'folio':folio,'idAtraccionEvento':idAtraccionEvento,'idFechaDosxUno':+descuentos[indiceDescuentos]['idFechaDosxUno'],'CantidadC':residuo});
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
                            
                            cantidadP =cantidadP + 1;
                            cantidadC = cantidadC + creditos;
                            entradaN = entradaN + 1;

                            informacionCiclo.push({'indice':4,'Creditos':creditos,'Cortesias':0,'folio':folio});
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
                                cantidadP += 1;
                                cantidadCC += creditos;
                                entradaC = entradaC + 1;
                                informacionCiclo.push({'indice':4,'Creditos':0,'Cortesias':creditos,'folio':folio});
                            }
                            else{
                                suma = CreditoN + CreditoC;
                                if(suma >= creditos){
                                    var residuo;
                                    html='<center style="background-color:#7EFF33">'+
                                    '<label>Tarjeta: '+folio+'</label>'+
                                    '<br>'+
                                    '<label>Credito Anterior: </label>'+ suma+
                                    '<br>'+
                                    '<label>Descuento:    </label>' +creditos +
                                    '<br>'+
                                    '<label>Credito Actual:    </label>'+  (suma - creditos) +
                                    '</center>';

                                    residuo = creditos - CreditoN;

                                    cantidadP += 1;
                                    cantidadC += CreditoN;
                                    cantidadCC += residuo;
                                    entradaMX = entradaMX + 1;

                                    informacionCiclo.push({'indice':4,'Creditos':CreditoN,'Cortesias':residuo,'folio':folio});
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
    btnCiclo.disabled = true;
    mm.style.color = "black";
    ss.style.color = "black";

    $("#tiempos").html('Tiempo de Espera');

    minutos = parseInt(1) + parseInt(document.getElementById("minutes").value);
    segundos = (minutos * 60) + parseInt(document.getElementById("seconds").value);
    document.getElementById("tarjetaVal").focus();
    setTimeout('decrement()',60);
});

$('#iniciarCiclo').click(function(){
    iniciarCarga();
    var tiempo = $("#Tiempo").val();
    var idAtraccionEvento  = $("#idAtraccionEvento").val();

    var datos = tiempo.split(':');
    btnTiempo.disabled=true;
    btnCiclo.disabled=true;

    minutos = parseInt(datos[1]);
    mm.style.color = "black";
    ss.style.color = "black";
    segundos = (minutos * 60) + parseInt(datos[2]);

    $("#minutes").val(minutos);
    $("#seconds").val(segundos);

    html = 'Duración del Ciclo';
    $("#tiempos").html(html);
    setTimeout('decrement()',60);

    var idAperturaValidador = $("#idAperturaValidador").val();
    var d = new Date();

    var fecha = d.toISOString().split('T')[0] +" "+d.toLocaleTimeString()+".000";

    ciclo.push({'indice':7,'Personas':cantidadP,'Creditos':cantidadC,'Cortesias':cantidadCC,'Descuentos':cantidadD,'PulserasMagicas':cantidadPM,'Hora':fecha,'idAperturaValidador':idAperturaValidador,'Gratis': cantidadJG,'entradaNormal':entradaN,'entradaCortesia':entradaC,'entradaMixta':entradaMX});
    

    
    
    $.ajax({
        type:"POST",
        url: 'Validacion_Interfaz/Ciclo',
        data: {'ciclo':ciclo,'informacionCiclo':informacionCiclo},
        dataType: 'JSON',
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            cerrarCarga();
        },
    }).done(function(data){
        console.log('Respuesta: ' + JSON.stringify(data.msj));
        promociones(idAtraccionEvento);
        ciclo = [];
        informacionCiclo = [];
        cantidadP = 0;
        cantidadC = 0;
        cantidadCC = 0;
        cantidadD = 0;
        cantidadPM = 0;
        cantidadJG = 0;
        entradaN = 0;
        entradaC = 0;
        entradaMX = 0;
        cerrarCarga();
    });
    
});

$('#cerrarSesion').click(function(){
    var idAperturaValidador = $("#idAperturaValidador").val();
    var idAtraccionEvento = $("#idAtraccionEvento").val();

    var d = new Date();

    var fecha = d.toISOString().split('T')[0] +" "+d.toLocaleTimeString()+".000";

    $.ajax({
        beforeSend:function(){
            iniciarCarga();
        },
        type: "POST",
        url: 'Validacion_Interfaz/Cerrar_Sesion',
        data: {'fecha':fecha,'idAtraccionEvento':idAtraccionEvento,'idAperturaValidador':idAperturaValidador},
        dataType: 'JSON',
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            cerrarCarga();
        },
    }).done(function(data){
        if(data.respuesta){
            cerrarCarga();
            //window.location.href='http://espectacularesgarcia.com.mx/web/public/';
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
    btnCiclo = document.getElementById('iniciarCiclo');
    btnTiempo.disabled=true;
    btnCiclo.disabled=true;
    iniciarCarga();
    var tiempo = $("#TiempoMAX").val();
    var idAtraccionEvento = $("#idAtraccionEvento").val();
    promociones(idAtraccionEvento);

    var datos = tiempo.split(':');

    //alert(datos[2]);

    minutos = parseInt(datos[1]);

    segundos = (minutos * 60) + parseInt(datos[2]);

    //alert(segundos);

    $("#minutes").val(minutos);
    $("#seconds").val(segundos);

    setTimeout('decrement()',60);
    console.log('Hola');
});

function promociones(idAtraccionEvento){
    var d = new Date();

    var fechaInicial = d.toISOString().split('T')[0]+" "+"23:59:00.000";
    var fechaFinal = d.toISOString().split('T')[0]+" "+"00:00:00.000";

    $.ajax({
        type:"POST",
        url:'Validacion_Interfaz/Promociones',
        data: {'fechaInicial':fechaInicial,'fechaFinal':fechaFinal,'idAtraccionEvento':idAtraccionEvento},
        dataType: 'JSON',
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
        },
    }).done(function(data){
        if(data.respuesta){
            //console.log('Primera aparicion: ' + JSON.stringify(data.descuentos));
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
            alert('El tiempo se ha terminado, favor de iniciar el ciclo o añadir tiempo extra.');
            btnTiempo.disabled=false;
            btnCiclo.disabled=false;
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