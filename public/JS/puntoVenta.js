var prev;
var previous=[];
let creditosC = [];
let metros = [];
let prec = [];
let precios = [];
let preciosC = [];
var acumulador = 0;
var total;
let indices = [];
var tarjetaIn = 0;
let datos =[];
var conjunto = {};
let dat;
var precio =0;

let pulseraSelect = [];


/********************************** Detectar Tarjeta CODIGO ACTUALIZADO FUNCIONAL *********************************/
/*$(document).on("click", ".selectPulsera", function(e) {
    Swal.fire({
        title: "Ingresa el folio de la Tarjeta",
        input: "text",
        showCancelButton: true,
        confirmButtonText: "INGRESAR",
        cancelButtonText: "Cancelar",
    })
    .then(resultado => {
        if (resultado.value) {
            let folioTarjeta = resultado.value;
            console.log("Hola, " + folioTarjeta);
            $.ajax({
                url: "validarTarjeta",
                type: "POST",
                data: {'folioTarjeta':folioTarjeta},
                dataType: "JSON",
                success: function (data) {
                    if(data.msj == true){
                        alert(data.msj);
                        tarjetaIn = folioTarjeta;
                        idT = data.idTarjeta;
                        stat = data.estado;
                        precio = data.precio;
                        if(data.estado == 1){//pulsera nueva
                            indices.push('0');//tarjeta nueva
                            precio = data.precio;
                            $("#tarjetaAdd").val('');
                            $("#productos").append(data.contenido);
                            sumar();
                        }else{//pulsera usada
                            precio = 0;
                            $("#tarjetaAdd").val('');
                            $("#productos").append(data.contenido);
                        }
            
                        dat = {
                                "idtarjeta": tarjetaIn,
                                "status": stat,
                                "precio": precio,
                                "promoPP": "0",
                                "recarga": "0"
                                }
                        datos.push(dat);
                        //console.log(datos);
                    }else{
                        swal.fire({html:"<h3>Usted NO puede vender pulseras que no estan en su Fajilla</h3>",  icon: 'warning'});
                    }
                },
            });
        }else{
            swal.fire("ERROR AL INGRESAR");
        }
    });
});*/
/********************************** Detectar Tarjeta CODIGO ACTUALIZADO FUNCIONAL *********************************/

//seleccionar la opcion de pulseras
$(document).on("click", ".selectPulsera", function(e){
    valor = $(this).val();
    pulseraSelect.push(valor);
    $.ajax({
        url: "validarTarjeta",
        type: "POST",
        data: {'pulseras':pulseraSelect},
        dataType: "JSON",
        success: function (data) {
            if(data.respuesta == true){
                $("#productos").empty();
                $("#productos").append(data.contenido);
            }
        },
    });
});
























//codigo funcional original 2 (Actualizado anterior)
/*$('#tarjetaAdd').change(function (){
    var folioTarjeta = $(this).val();//folio de tarjeta
    $.ajax({
        type:"POST",
        url:"validarTarjeta",
        data:{'folioTarjeta':folioTarjeta},
        dataType: 'JSON',
        error: function(jqXHR, textStatus, errorThrown){
            alert('Se produjo un error: a'+ errorThrown + ' ' + textStatus);
        },
    }).done(function(data){
        if(data.msj){
            tarjetaIn=folioTarjeta;
            idT = data.idTarjeta;
            stat = data.estado;
            precio = data.precio;
            if(data.estado == 1){
                precio = data.precio;
                $("#tarjetaAdd").val('');
                $("#productos").append(data.contenido);
                sumar();
            }else{
                precio = 0;
                $("#tarjetaAdd").val('');
                $("#productos").append(data.contenido);
            }

            dat = {
                    "idtarjeta": tarjetaIn,
                    "status": stat,
                    "precio": precio,
                    "recarga":0
                    }
            datos.push(dat);
            console.log(datos);
        }else{
            alert('Usted no puede vender tarjetas que no estan en su fajilla o que ha cancelado');
        }
    });*/

    //codigo original 1
   /* $.ajax({
            type:"POST",
            url:"validarTarjeta",
            data:{'folioTarjeta':folioTarjeta, 'ventanilla':v, 'evento':e},
            dataType: 'JSON',
            error: function(jqXHR, textStatus, errorThrown){
                alert('Se produjo un error: a'+ errorThrown + ' ' + textStatus);
            },
        }).done(function(data){
            console.log('soy data'+data.msj);
            $('#tarjeta').val(folioTarjeta);
            if(data.msj){
                for(var i = 0;i<data.msj.length; i++){
                    idTar = data.msj[i]['idTarjeta'];
                    //alert(idTar);

                    $('#idTarjeta').val(data.msj[i]['idTarjeta']);

                    if(data.msj[i]['idStatus'] == '1'){
                        /********** INSERTAR EL INDICE EN EL ARREGLO SOBRE TIPO DE PROMOCION ELEGIDA **********
                        indices.push('0');//tarjeta nueva
                        //alert('Indices' + indices);
                        $('#indice').val(indices);
                        /********** INSERTAR EL INDICE EN EL ARREGLO SOBRE TIPO DE PROMOCION ELEGIDA **********
                        $('#precioT').val(data.msj[i]['PrecioTarjeta']);
                        $('#precioTa').val(data.msj[i]['PrecioTarjeta']);
                        sumar();
                    }else{
                        /********** INSERTAR EL INDICE EN EL ARREGLO SOBRE TIPO DE PROMOCION ELEGIDA **********
                        indices.push('1');//tarjeta comprada
                        //alert('Indices' + indices);
                        $('#indice').val(indices);
                        /********** INSERTAR EL INDICE EN EL ARREGLO SOBRE TIPO DE PROMOCION ELEGIDA **********
                        $('#idTarjeta').val(data.msj[i]['idTarjeta']);
                    }
                }
            }else{
                alert('Usted no puede vender tarjetas que no estan en su fajilla o que ha cancelado');
                $('#tarjeta').val('');
                $('#idTarjeta').val('');
                location.reload();
            }
        });*/
//});
/********************************** Detectar Tarjeta *********************************/

/********************************** Detectar Recarga *********************************/
$(document).on("click", ".addRecarga", function(e) {
    Swal.fire({
        title: "Ingresa el monto a recargar",
        input: "text",
        showCancelButton: true,
        confirmButtonText: "Recargar",
        cancelButtonText: "Cancelar",
    })
    .then(resultado => {
        if (resultado.value) {
            let recarga = resultado.value;
            //if((tarjeta == '') && (tarjetaIn == '')){
            if(tarjetaIn == ''){
                swal.fire({html:"<h3>Ingrese la tarjeta</h3>",  icon: 'warning'});
            }else{
                indices.push('1');//recarga
                //estamos reemplazando (buscando) por index, el valor del array en el campo de recarga, de 0 al valor de la recarga asignado ( $('#recargaAdd').val())
                datos.map(function(dato){//se modifica el array datos
                    if(dato.idtarjeta == tarjetaIn){
                        dato.recarga = recarga;
                    }
                    return dato;
                });
                $.ajax({
                    type:"POST",
                    url:"addRecarga",
                    data:{'array': JSON.stringify(datos)},//enviamos el array datos
                    dataType: 'JSON',
                    error: function(jqXHR, textStatus, errorThrown){
                        alert('Se produjo un error: a'+ errorThrown + ' ' + textStatus);
                    },
                }).done(function(data){
                    $("#productos").html(data.contenido);
                    sumar() 
                });
            }
        }else{
            swal.fire("ERROR AL INGRESAR");
        }
    });
});

/********************************** Detectar Promo pulsera MAgica *************************/
$(document).on("click", ".pulseraMagic", function(e) {
    $idpromo = $(this).val();
    if(tarjetaIn == ''){
        swal.fire({html:"<h3>Ingrese la tarjeta</h3>",  icon: 'warning'});
    }else{
        indices.push('2');//pulsera magica
        //estamos reemplazando (buscando) por index, el valor del array en el campo de recarga, de 0 al valor de la recarga asignado ( $('#recargaAdd').val())
        datos.map(function(dato){//se modifica el array datos
            if(dato.idtarjeta == tarjetaIn){
                dato.promoPP = idpromo;
            }
            return dato;
        });
        /*$.ajax({
            type:"POST",
            url:"",
            data:{'array': JSON.stringify(datos)},//enviamos el array datos
            dataType: 'JSON',
            error: function(jqXHR, textStatus, errorThrown){
                alert('Se produjo un error: a'+ errorThrown + ' ' + textStatus);
            },
        }).done(function(data){
            $("#productos").html(data.contenido);
        });*/
    }
});


/**************************************** CODIGO ORIGINAL 2(ACTUALIZADO) FUNCIONAL */
/*$('#recargaAdd').change(function () {
    var recarga = $('#recargaAdd').val();
    alert(recarga);
    if((tarjeta == '') && (tarjetaIn == '')){
        alert("Ingrese la tarjeta");
    }else{
        //estamos reemplazando (buscando) por index, el valor del array en el campo de recarga, de 0 al valor de la recarga asignado ( $('#recargaAdd').val())
        datos.map(function(dato){//se modifica el array datos
            if(dato.idtarjeta == tarjetaIn){
                dato.recarga = recarga;
            }
            return dato;
        });
        //console.log(datos)

        $.ajax({
            type:"POST",
            url:"addRecarga",
            data:{'array': JSON.stringify(datos)},//enviamos el array datos
            dataType: 'JSON',
            error: function(jqXHR, textStatus, errorThrown){
                alert('Se produjo un error: a'+ errorThrown + ' ' + textStatus);
            },
        }).done(function(data){
            $("#productos").html(data.contenido);
        });


    }*/

//////////////////////////////////    codigo original recarga
    /*var tarjeta = $('#tarjetaAdd').val();
    if(tarjeta == ''){
        alert('Ingresa la tarjeta por favor');
        $('#recargaAdd').val('');
    }else{
        /********** INSERTAR EL INDICE EN EL ARREGLO SOBRE TIPO DE PROMOCION ELEGIDA **********
        indices.push('2');//recarga
        //alert('Indices' + indices);
        $('#indice').val(indices);
        /********** INSERTAR EL INDICE EN EL ARREGLO SOBRE TIPO DE PROMOCION ELEGIDA **********

        //alert(valor_recarga = $(this).val());
        valor_recarga = $(this).val();
        const creditos = 5;
        const pesos = 50;
        r = (valor_recarga * creditos)/pesos;
        $('#recargaP').val(valor_recarga);
        $('#recargaCred').val(r);
        $('#recargaTr').show();
        sumar();
    }*/
//});
/********************************** Detectar Recarga *********************************/

/********************************** sumar precios *********************************/
function sumar() {
    var total = 0;
    $(".monto").each(function() {
        if (isNaN(parseFloat($(this).val()))) {
        total += 0;
        } else {
        total += parseFloat($(this).val());
        }
    });
    $('#total').val(total);
    //$('#total2').val(total);
}
/********************************** sumar precios *********************************/

/******************************** CANCELAR SELECCION************************************/
$(document).on('click', '.cancelar', function(){
    alert("Si doy click"+$(this).val());

});

/********************************** Tipo Pago*********************************/
$(document).on('click', '.pagoEfectivo', function(){
    var total = $('#total').val();
    //var tarjeta = $('#tarjetaAdd').val();
    //if((tarjeta == '') && (tarjetaIn == '')){
    if(tarjetaIn == ''){
        swal.fire({html:"<h3>Debes realizar una compra</h3>",  icon: 'warning'});
    }else{

        Swal
            .fire({
                title: "Total a Pagar: $"+total,
                text: "¿Esta segura que el monto es correcto?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: "Sí",
                cancelButtonText: "No",
            })
            .then(resultado => {
                if (resultado.value) {
                    // Hicieron click en "Sí"
                    $.ajax({
                        type: "POST",
                        url: "guardarVentas",
                        data: {'folioTarjet':tarjetaIn, 'total':total, 'datArray': JSON.stringify(datos), 'indices':JSON.stringify(indices)},
                        dataType: "JSON",
                        error(jqXHR, textStatus, errorThrown){
                                alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
                        },
                        }).done(function(data){
                            if(data.msj){
                                alert("Venta correctamente");
                            }
                        });
                } else {
                    // Dijeron que no
                    console.log("*NO se elimina la venta*");
                }
            });
    }

    //codigo original anterior
    /*$.ajax({
            beforeSend:function () {//antes de cargar la info, abrimos una ventana de carga
              //  inicia_carg();//funcion que abre la ventana de carga
            },
            url:"Tipo_Pago",//la ruta a donde enviare la info
            type:"POST",
            data:{'tipo':tipo},//toma el valor del boton seleccionado
            dataType: 'JSON',
            error: function(jqXHR, textStatus, errorThrown){
                alert('Se produjo un error: a'+ errorThrown + ' ' + textStatus);//en caso de presentar un error, muestra el msj
              //  cierra_carg();//funcion que cierra la ventana de carga
            },
        }).done(function(data){//obtiene el valor de data procesado en el controlador

        });*/
});
/********************************** Tipo Pago*********************************/

/********************************** Cobrar Transaccion *********************************/
/*$(document).on('click','#cobrarTransaccion', function(){
    var tarjeta = $('#tarjetaAdd').val();
    var tipo = $('#cobrarTransaccion').val();

    if(tarjeta == ''){
        alert('Debes realizar una compra');
        
    }else{
        if(tipo == 1){
            var totalCobrar = $('#total').val();
            var totalIngresado = $('#efectivo').val();
            if(totalIngresado > totalCobrar){
                var cambio = totalIngresado - totalCobrar;
                alert('Su cambio es de:' + cambio);
                cobrarCompra();
                location.reload();
            }else if(totalIngresado == totalCobrar){
                alert('Gracias por su compra');
                cobrarCompra();
                location.reload();
            }else if(totalIngresado < totalCobrar){
                alert('Dinero Insuficiente');
                acumulador=0;
            }
        }
        if(tipo == 2){
            var totalCobrar = $('#total').val();
            var totalIngresado = $('#mtarjeta').val();
            if(totalIngresado < totalCobrar){
                alert('Verifica el monto');
                location.reload();
            }else if(totalIngresado == totalCobrar){
                alert('Gracias por su compra');
                cobrarCompra();
                location.reload();
            }
        }
    }
});*/
/********************************** Cobrar Transaccion *********************************/

/********************************** Datos Formulario para Cobrar*********************************/
    //datos formulario para cobrar
    /*function cobrarCompra(){
        var tipo = $('#cobrarTransaccion').val();
        $.ajax({
        type: "POST",
        url: "guardarVentas",
        data: $('#formPuntoVenta').serialize() + '&tipo=' + tipo,
        dataType: "JSON",
        error(jqXHR, textStatus, errorThrown){
                alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
        },
        }).done(function(data){
            console.log('Si llego');
            console.log(data.msj);
        });
    }*/
/********************************** Datos Formulario para Cobrar *********************************/

/*********************************** AGREGAR FAJILLA ********************************************/
    $(document).on('click', '#agregarFajilla', function(){
        var fI = $('#folioI').val();
        var fF = $('#folioF').val();

        if(fI < fF){
            $.ajax({
                    beforeSend:function () {//antes de cargar la info, abrimos una ventana de carga
                    //  inicia_carg();//funcion que abre la ventana de carga
                    },
                    url:"agregarFaj",//la ruta a donde enviare la info
                    type:"POST",
                    data:$('#fajillaNueva').serialize(),//toma el valor del boton seleccionado
                    dataType: 'JSON',
                    error: function(jqXHR, textStatus, errorThrown){
                        alert('Se produjo un error: a'+ errorThrown + ' ' + textStatus);//en caso de presentar un error, muestra el msj
                    //  cierra_carg();//funcion que cierra la ventana de carga
                    },
                }).done(function(data){//obtiene el valor de data procesado en el controlador
                    console.log(data);
                    if(data.msj == false){
                        alert('Usted no puede agregar una fajilla nueva, favor de terminar de vender la fajilla actual');
                    }else{
                        alert('Si puede agregar');
                    }
                // cierra_carg();
                });
        }else{
            alert('Favor de ingresar correctamente los datos');
            $('#folioI').val('');
            $('#folioF').val('');
        }
    });
/*********************************** AGREGAR FAJILLA ********************************************/

/********************************** Cobrar Transaccion *********************************/

    $(document).on('click','.val', function(){
        var valor = parseFloat($(this).val());
        acumulador = acumulador + valor;
        $('#efectivo').val(acumulador);
    });

    $(document).on('click','.borrar', function(){
        var efectivo = $("#efectivo").val("");
        acumulador = 0;
    });
    
    $(document).on('click','#cobrarTransaccion', function(){
        var tarjeta = $('#tarjetaAdd').val();
        var tipo = $('#cobrarTransaccion').val();

        if(tarjeta == ''){
            alert('Debes realizar una compra');
            
        }else{
            if(tipo == 1){
                var totalCobrar = $('#total').val();
                var totalIngresado = $('#efectivo').val();
                if(totalIngresado > totalCobrar){
                    var cambio = totalIngresado - totalCobrar;
                    alert('Su cambio es de:' + cambio);
                    cobrarCompra();
                    location.reload();
                }else if(totalIngresado == totalCobrar){
                    alert('Gracias por su compra');
                    cobrarCompra();
                    location.reload();
                }else if(totalIngresado < totalCobrar){
                    alert('Dinero Insuficiente');
                    acumulador=0;
                }
            }
            if(tipo == 2){
                var totalCobrar = $('#total').val();
                var totalIngresado = $('#mtarjeta').val();
                if(totalIngresado < totalCobrar){
                    alert('Verifica el monto');
                    location.reload();
                }else if(totalIngresado == totalCobrar){
                    alert('Gracias por su compra');
                    cobrarCompra();
                    location.reload();
                }
            }
        }
    });
/********************************** Cobrar Transaccion*********************************/

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


/********************************** Cambiar Pagina de Venta a Reporte *********************************/
    $(document).on('click','#cerrarCaja', function(){
        var idapV = $('#ventanillaa').val();
        location.href ="ReporteVenta?idv="+idapV;
    });
/********************************** Cambiar Pagina de Venta a Reporte *********************************/

    //alerta pide numero
    $('#celular').click(function(){
        swal("Ingresa el teléfono", {
            content: "input",
        })
        .then((value) => {
            swal("Agregado correctamente", {
                icon: "success",
            });
        });
    });    

/********************************** Agregar Promociones de Pulsera Magica *********************************/
    $(document).on('click', '.promocionnn', function(event){
        var acum=[];
        var fecha = '<?php echo $fecha;?>';
        var tarjeta = $('#tarjetaAdd').val();
        if(tarjeta == ''){
            alert('Ingresa la tarjeta por favor');
        }else{
            /********** INSERTAR EL INDICE EN EL ARREGLO SOBRE TIPO DE PROMOCION ELEGIDA **********/
            indices.push('3');//promo de pulsera
            //alert('Indices' + indices);
            $('#indice').val(indices);
            /********** INSERTAR EL INDICE EN EL ARREGLO SOBRE TIPO DE PROMOCION ELEGIDA **********/

            metros.push($(this).attr('value'));

            $('#arregloP').val(metros);
            var promocion = $(this).val();
            $.ajax({
                type:"POST",
                url:"Productos",
                data:{'promocion':promocion},
                dataType: 'JSON',
                error: function(jqXHR, textStatus, errorThrown){
                    alert('Se produjo un error: a'+ errorThrown + ' ' + textStatus);
                },
            }).done(function(data){
                var html ='';
                for(var i = 0;i <data.msj.length; i++){
                        html += '<tr id="'+data.msj[i]['idFechaPulseraMagica']+'">'+
                                    '<td style="padding:0px;">'+data.msj[i]['Nombre']+'</td>'+
                                    '<td style="padding:0px;"><input type="number" class="precioP monto" name="precioP" id="precioP" disabled  style="background : inherit; border:none; text-align:center;" class="monto" value="'+data.msj[i]['Precio']+'"></td>'+
                                    '<td style="padding:0px;"></td>'+
                                    '<td style="padding:0px;"><a href="#eliminarPromo'+data.msj[i]['idFechaPulseraMagica']+'" class="eliminar" data-toggle="modal"><i class="fa fa-trash btn btn-danger" aria-hidden="true"></i></a></td>'+
                                '</tr>';
                    $("#productos").append(html);
                    prec.push(data.msj[i]['Precio']);
                }    
                sumar();
                $('#arregloPrecioP').val(prec);
            });
        }
    });
/********************************** Agregar Promociones de Pulsera Magica *********************************/

/********************************** Agregar Promociones de Creditos de Cortesia*********************************/
    $(document).on('click', '.creditosC', function(event){
        var fecha = '<?php echo $fecha;?>';
        var tarjeta = $('#tarjetaAdd').val();
        if(tarjeta == ''){
            alert('Ingresa la tarjeta por favor');
        }else{
            /********** INSERTAR EL INDICE EN EL ARREGLO SOBRE TIPO DE PROMOCION ELEGIDA **********/
            indices.push('4');//promo de creditos
            //alert('Indices' + indices);
            $('#indice').val(indices);
            /********** INSERTAR EL INDICE EN EL ARREGLO SOBRE TIPO DE PROMOCION ELEGIDA **********/
            creditosC.push($(this).attr('value'));
            $('#arregloC').val(creditosC);
            var promocionc = $(this).val();
            $.ajax({
                type:"POST",
                url:"creditosCortesia",
                data:{'promoCreditos':promocionc},
                dataType: 'JSON',
                error: function(jqXHR, textStatus, errorThrown){
                    alert('Se produjo un error: a'+ errorThrown + ' ' + textStatus);
                },
            }).done(function(data){
                var html ='';
                for(var i = 0;i<data.msj.length; i++){
                        html += '<tr id="'+i+'">'+
                                    '<td style="padding:0px;">'+data.msj[i]['Nombre']+'</td>'+
                                    '<td style="padding:0px;"><input type="number" name="precioC" id="precioC" disabled  style="background : inherit; border:none; text-align:center;" class="monto" value='+data.msj[i]['Precio']+'></td>'+
                                    '<td style="padding:0px;"></td>'+
                                    '<td style="padding:0px;"><a href="#eliminarPromo'+data.msj[i]['idFechaCreditosCortesia']+'" class="eliminar" data-toggle="modal"><i class="fa fa-trash btn btn-danger" aria-hidden="true"></i></a></td>'+
                                '</tr>';
                }
                $("#productos").append(html);
                sumar();
                var prec = $('#precioC').val();
                preciosC.push(prec);
                $('#arregloPrecioC').val(preciosC);
            });
        }
    });
/********************************** Agregar Promociones de Creditos de Cortesia*********************************/


/********************************** Tipo de Pago Efectivo *********************************/
    function myFunction() {
        var opcion = $('input:radio[name=rad]:checked').val();
        if(opcion==1){
            var efectivo = document.getElementById('efectivo').value;
            var total = document.getElementById('total').value;
            if(efectivo >= total){
                var cambio = efectivo - total;
                $('#cambio').show().val(cambio);
                alert('Su cambio es de: ' + cambio);
            }else{
                alert('Dinero insuficiente');
            }
        }else if(opcion==2 || opcion==3){alert('Favor de Ingresar la Tarjeta');}
    }
/********************************** Tipo de Pago Efectivo *********************************/

//VALIDAR RADIOBUTTONS
    $("input[name=rad]").click(function () {   
        var opcion = $('input:radio[name=rad]:checked').val();
        if(opcion==1){
            $( "#efectivo" ).show();
        }else{
            $( "#efectivo" ).hide();
        }
    });

    //sumar creditos
    function credi() {
        var total = 0;
        $(".credi").each(function() {
            if (isNaN(parseFloat($(this).val()))) {
            total += 0;
            } else {
            total += parseFloat($(this).val());
            }
        });
        $('#totalc').val(total);
    }

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

    function actualizar(){
        setTimeout("actualizar()",1000);
    }

/********************************** Cambio de Pagina ******************************************/