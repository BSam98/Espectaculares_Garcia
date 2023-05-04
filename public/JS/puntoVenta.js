//var prev;
var previous=[];
let creditosC = [];
let metros = [];
let prec = [];
let precios = [];
let preciosC = [];
let promocionesCreditos=[];
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
        var evento = $('#e').val();
        var zona = $('#z').val();
        var taquilla = $('#t').val();
        var ventanilla = $('#v').val();
        var usuario = $('#u').val();
        var idventanilla = $('#idv').val();

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
                    MENSAJE2 = "Gracias por su compra";
                    $("#mensaje2").html(MENSAJE2);
                    $('#alertaCorrecta').modal('show');
                    cobrarCompra();
                    location.reload();
                }else if(totalIngresado < totalCobrar){
                    MENSAJE = "DINERO INSUFICIENTE";
                    $("#mensaje").html(MENSAJE);
                    $('#staticBackdrop').modal('show');
                    $('#efectivo').val('');
                    //(function() {cache_clear()}, 2000);
                }
            }else if(tipo == 2){//tarjeta de debito
                console.log('soy tipo'+tipo);

                var totalCobrar = $('#total').val();
                var totalIngresado = $('#mtarjeta').val();
                
                console.log('soy totalCobrar'+totalCobrar);
                console.log('soy totalIngresado'+totalIngresado);

                if(totalIngresado < totalCobrar){

                    MENSAJE = "Verifica el monto";
                    $("#mensaje").html(MENSAJE);
                    $('#staticBackdrop').modal('show');
                    setInterval(function() {cache_clear()}, 2000);
                    //location.reload();
                    
                }else{ //if(totalIngresado == totalCobrar){

                    MENSAJE2 = "Gracias por su compra";
                    $("#mensaje2").html(MENSAJE2);
                    $('#alertaCorrecta').modal('show');

                    cobrarCompra();
                    setInterval(function() {cache_clear()}, 2000);
                    //location.reload();
                }
            }else{
                //tipo 3: tarjeta de crédito
                console.log('soy tipo'+tipo);

                var totalCobrar = $('#total').val();
                var totalIngresado = $('#mtarjeta').val();
                
                console.log('soy totalCobrar'+totalCobrar);
                console.log('soy totalIngresado'+totalIngresado);

                if(totalIngresado < totalCobrar){

                    MENSAJE = "Verifica el monto";
                    $("#mensaje").html(MENSAJE);
                    $('#staticBackdrop').modal('show');
                    setInterval(function() {cache_clear()}, 2000);
                    //location.reload();
                    
                }else{ //if(totalIngresado == totalCobrar){

                    MENSAJE2 = "Gracias por su compra";
                    $("#mensaje2").html(MENSAJE2);
                    $('#alertaCorrecta').modal('show');

                    cobrarCompra();
                    setInterval(function() {cache_clear()}, 2000);
                    //location.reload();
                }
            }
        }
    });
/********************************** Cobrar Transaccion*********************************/

/********************************** Iniciar y Cerrar Carga de Pagina *********************************/
    function modal(){
        $('#modalCarga').modal('show');
    }

    function modalCerrar(){
        $('#modalCarga').modal('hide');
        /*setTimeout(function(){
            $('#modalCarga').modal('hide');}, 1000);*/
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

            var idp = $(this).attr('value');
            metros.push($(this).attr('value'));

            $('#arregloP').val(metros);
            var promocion = $(this).val();
            $.ajax({
                beforeSend:function () {//antes de cargar la info, abrimos una ventana de carga
                    modal();//funcion que abre la ventana de carga
                },
                type:"POST",
                url:"Productos",
                data:{'promocion':promocion},
                dataType: 'JSON',
                error: function(jqXHR, textStatus, errorThrown){
                    alert('Se produjo un error: a'+ errorThrown + ' ' + textStatus);
                    modalCerrar();
                },
            }).done(function(data){
                var html ='';
                for(var i = 0;i <data.msj.length; i++){
                        html += '<tr class="n" id="'+data.msj[i]['idFechaPulseraMagica']+'">'+
                                    '<td style="padding:0px;">'+data.msj[i]['Nombre']+'</td>'+
                                    '<td style="padding:0px;" id="'+data.msj[i]['Precio']+'"><input type="number" class="precioP monto" name="precioP" id="precioP" disabled  style="background : inherit; border:none; text-align:center;" class="monto" value="'+data.msj[i]['Precio']+'"></td>'+
                                    '<td style="padding:0px;"></td>'+
                                    '<td style="padding:0px;"><button type="button" id="eliminarPromoP" class="btn btn-danger eliminarPromoP" value="'+data.msj[i]["idFechaPulseraMagica"]+'"><i class="fa fa-trash" aria-hidden="true"></i></button></td>'+
                                '</tr>';
                    $("#productos").append(html);
                    prec.push({'promo':idp, 'precio':data.msj[i]['Precio']});
                }    
                sumar();
                $('#arregloPrecioP').val(JSON.stringify(prec));
                modalCerrar();
            });
        }
    });
/********************************** Agregar Promociones de Pulsera Magica *********************************/

/********************************** Eliminar Promociones de Pulsera Magica ********************************/
    $(document).on('click', '.eliminarPromoP', function(event){
        $(this).parent().parent().remove();
        var valoraBorrar = $(this).val();//trae el valor a eliminar
        console.log(valoraBorrar);
        var idBloque = $(this).parents('tr').attr('id');
        console.log(idBloque);
        prec.forEach(function(data,index){
            if(valoraBorrar === data.promo && idBloque === data.promo){
                prec.splice(index,1);
                console.log(prec);
                $('#arregloPrecioP').val(JSON.stringify(prec));
            }
        });

        /*var array = $('#arregloP').val();//trae el valor del array de promociones pulsera;
        let arr = array.split(',');
        var toRemove = $(this).val();//trae el valor a eliminar
        let pos = arr.indexOf(toRemove.toString()) // (pos) es la posición para abreviar
        let elementoEliminado = arr.splice(pos, 1)
        $(this).parent().parent().remove();
        $('#arregloP').val(arr);//actualizamos el valor del input
*/
        /***************** Elimina el indice que especifica que es promoP en el array principal(indice) ****************/
        var arreglo = $('#indice').val();//trae el valor del array de promociones pulsera;
        let arr3 = arreglo.split(',');
        let pos3 = arr3.indexOf('3') // (pos) es la posición para abreviar
        let elementoEliminado3 = arr3.splice(pos3, 1);
        $('#indice').val(arr3);
    });
/********************************** Eliminar Promociones de Pulsera Magica ********************************/

/********************************** Agregar Promociones de Creditos de Cortesia*********************************/
    $(document).on('click', '.creditosC', function(event){
        var tarjeta = $('#tarjetaAdd').val();
        if(tarjeta == ''){
            alert('Ingresa la tarjeta por favor');
        }else{
            /********** INSERTAR EL INDICE EN EL ARREGLO SOBRE TIPO DE PROMOCION ELEGIDA **********/
            indices.push('4');//promo de creditos
            $('#indice').val(indices);
            /********** INSERTAR EL INDICE EN EL ARREGLO SOBRE TIPO DE PROMOCION ELEGIDA **********/
            var idpromoCredit = $(this).attr('value');
            //creditosC.push($(this).attr('value'));
            //$('#arregloC').val(creditosC);
            var promocionc = $(this).val();
            $.ajax({
                beforeSend:function () {//antes de cargar la info, abrimos una ventana de carga
                    modal();//funcion que abre la ventana de carga
                },
                type:"POST",
                url:"creditosCortesia",
                data:{'promoCreditos':promocionc},
                dataType: 'JSON',
                error: function(jqXHR, textStatus, errorThrown){
                    alert('Se produjo un error: a'+ errorThrown + ' ' + textStatus);
                    modalCerrar();
                },
            }).done(function(data){
                var html ='';
                for(var i = 0;i<data.msj.length; i++){
                        html += '<tr id="'+i+'">'+
                                    '<td style="padding:0px;">'+data.msj[i]['Nombre']+'</td>'+
                                    '<td style="padding:0px;"><input type="number" name="precioC" id="precioC" disabled  style="background : inherit; border:none; text-align:center;" class="monto" value='+data.msj[i]['Precio']+'></td>'+
                                    '<td style="padding:0px;"></td>'+
                                    '<td style="padding:0px;"><button type="button" id="eliminarPromoC" class="btn btn-danger eliminarPromoC" value="'+data.msj[i]["idFechaCreditosCortesia"]+'"><i class="fa fa-trash" aria-hidden="true"></i></button>'+
                                '</tr>';
                    promocionesCreditos.push({'idpromo':idpromoCredit, 'precioC':data.msj[i]['Precio']});
                    console.log(promocionesCreditos);
                }
                $("#productos").append(html);
                sumar();
                $('#arregloPrecioC').val(JSON.stringify(promocionesCreditos));
                modalCerrar();
            });
        }
    });
/********************************** Agregar Promociones de Creditos de Cortesia *********************************/
/********************************** Eliminar Promociones de Creditos de Cortesia ********************************/
    $(document).on('click', '.eliminarPromoC', function(event){
        var array = $('#arregloC').val();//trae el valor del array de promociones pulsera;
        let arr = array.split(',');
        var toRemove = $(this).val();//trae el valor a eliminar
        let pos = arr.indexOf(toRemove.toString()) // (pos) es la posición para abreviar
        let elementoEliminado = arr.splice(pos, 1)
        /*console.log(elementoEliminado);
        console.log(pos);
        console.log(arr);*/
        $(this).parent().parent().remove();
        $('#arregloC').val(arr);//actualizamos el valor del input

        /*var data = $('#arregloC').val();//trae el valor del array de promociones pulsera
        var toRemove = $(this).val();//trae el valor a eliminar
        let arr = data.split(',');//divide la cadena de texto para regresarla como array
        arr = arr.filter(function(item){
            return item !== toRemove;//quita el valor a eliminar si existe en el array
        });
        $(this).parent().parent().remove();//eliminar las promos registradas como compra en caso de cancelar
        $('#arregloC').val(arr);//actualizamos el valor del input*/

        /***************** Elimina el indice que especifica que es promoC en el array principal(indice) ****************/
        var arreglo1 = $('#indice').val();//trae el valor del array de promociones pulsera;
        let arr1 = arreglo1.split(',');
        let pos1 = arr1.indexOf('4'); // (pos) es la posición para abreviar
        let elementoEliminado1 = arr1.splice(pos1, 1);
        $('#indice').val(arr1);
    });
/********************************** Eliminar Promociones de Creditos de Cortesia ********************************/


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
        $('#fechas').val(horaImprimible);
    }
/*************************************** FECHA Y HORA************************** */

    function actualizar(){
        setTimeout("actualizar()",1000);
    }
/**************************************** Actualizar paginas **********************************/ 
  function cache_clear() {
    window.location.reload(true);
    // window.location.reload(); use this if you do not remove cache
  }
/********************************** Cambio de Pagina ******************************************/

/***************************** Actualizar la lista de promociones *****************************/
    
       /* var refreshId =  setInterval( function(){
            console.log('si actualizo');
        $('#accordionSidebar').load('ModuloCobro?e=1&z=1&t=1&v=104&u=2&idv=1');//actualizas el div
        }, 1000 );*/

        //$(document).ready(function(){
            //setInterval(loadClima,5000);
          //  });
            