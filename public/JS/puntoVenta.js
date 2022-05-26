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

/***********************************DEVOLUCION DE TARJETAS ********************************************/
    $(document).on('click', '#devolucion', function(){
        $.ajax({
                beforeSend:function () {//antes de cargar la info, abrimos una ventana de carga
                  //  inicia_carg();//funcion que abre la ventana de carga
                },
                url:"devolverTarjeta",//la ruta a donde enviare la info
                type:"POST",
                data:$('#formDevolucion').serialize(),//toma el valor del boton seleccionado
                dataType: 'JSON',
                error: function(jqXHR, textStatus, errorThrown){
                    alert('Se produjo un error: a'+ errorThrown + ' ' + textStatus);//en caso de presentar un error, muestra el msj
                  //  cierra_carg();//funcion que cierra la ventana de carga
                },
            }).done(function(data){//obtiene el valor de data procesado en el controlador
                console.log(data);
                if(data.msj == true){
                    alert('La devolución se hizo correctamente');
                }else{
                    alert('Error al devolver: 1)No puede hacer una devolucion si la tarjeta ya esta vendida 2)No puede devolver tarjetas que no estan en su fajilla');
                }
               // cierra_carg();
            });
    
    });
/***********************************DEVOLUCION DE TARJETAS ********************************************/

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

/********************************** Tipo Pago*********************************/
    $(document).on('click', '.pagoEfectivo', function(){
        var total = $('#total').val();
        var tipo = $(this).val();
        //alert(tipo);
        $.ajax({
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
                var html ='';
                for(var i = 0;i <data.msj.length; i++){
                    if(data.msj[i]["idFormasPago"]==tipo){
                        html +=' <tr>'+
                                    '<td colspan="5">'+
                                        '<div class="input-group">'+
                                            '<div class="col-xs-2 col-sm-4">'+
                                            '<label>Total: $</label>'+
                                            '</div>'+
                                            '<div class="col-xs-2 col-sm-6">'+
                                                '<input class="form-control" type="number" name="total2" id="total2" value="'+total+'">'+
                                            '</div>'+
                                        '</div><br>'+
                                    '</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td><button class="btn btn-warning val" name="centavos" id="centavos" value=".50" style="width:70px; height:70px; margin:5px;">$ .50</button></td>'+
                                    '<td><button class="btn btn-warning val" name="uno" id="uno" value="1" style="width:70px; height:70px; margin:5px;">$ 1</button></td>'+
                                    '<td><button class="btn btn-warning val" name="dos" id="dos" value="2" style="width:70px; height:70px; margin:5px;">$ 2</button></td>'+
                                    '<td><button class="btn btn-warning val" name="cinco" id="cinco" value="5" style="width:70px; height:70px; margin:5px;">$ 5</button></td>'+
                                    '<td><button class="btn btn-warning val" name="diez" id="diez" value="10" style="width:70px; height:70px; margin:5px;">$ 10</button></td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td><button class="btn btn-success val" name="veinte" id="veinte" value="20" style="width:70px; height:70px; margin:5px;">$ 20</button></td>'+
                                    '<td><button class="btn btn-success val" name="cincuenta" id="cincuenta" value="50" style="width:70px; height:70px; margin:5px;">$ 50</button></td>'+
                                    '<td><button class="btn btn-success val" name="cien" id="cien" value="100" style="width:70px; height:70px; margin:5px;">$ 100</button></td>'+
                                    '<td><button class="btn btn-success val" name="dosc" id="dosc" value="200" style="width:70px; height:70px; margin:5px;">$ 200</button></td>'+
                                    '<td><button class="btn btn-success val" name="quin" id="quin" value="500" style="width:70px; height:70px; margin:5px;">$ 500</button></td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td><button class="btn btn-success" name="mil" id="mil" value="1000" style="width:70px; height:70px; margin:5px;">$ 1000</button></td>'+
                                    '<td colspan="3">'+
                                        '<center><label>Efectivo:</label></center>'+
                                        '<input type="number" class="form-control" id="efectivo" name="efectivo" value="">'+
                                    '</td>'+'<td><button class="btn btn-danger borrar" name="borrar" id="borrar" value="" style="width:70px; height:70px; margin:5px;">Borrar</button></td>'+
                                '</tr>';
                    }
                }
                $("#modal_Efectivo .modal-body #efect").html(html);

               // cierra_carg();
            });
    });
/********************************** Tipo Pago*********************************/

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

/********************************** Detectar Tarjeta *********************************/
    $('#tarjetaAdd').change(function (){
        //console.log($(this).val());
        var valor_inicial = $(this).val();//folio de tarjeta
        var folioTarjeta = $(this).val();//folio de tarjeta
        var v = $('#ventanillaa').val();
        var e = $('#evento').val();

        $.ajax({
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
                            /********** INSERTAR EL INDICE EN EL ARREGLO SOBRE TIPO DE PROMOCION ELEGIDA **********/
                            indices.push('0');//tarjeta nueva
                            //alert('Indices' + indices);
                            $('#indice').val(indices);
                            /********** INSERTAR EL INDICE EN EL ARREGLO SOBRE TIPO DE PROMOCION ELEGIDA **********/
                            $('#precioT').val(data.msj[i]['PrecioTarjeta']);
                            $('#precioTa').val(data.msj[i]['PrecioTarjeta']);
                            sumar();
                        }else{
                            /********** INSERTAR EL INDICE EN EL ARREGLO SOBRE TIPO DE PROMOCION ELEGIDA **********/
                            indices.push('1');//tarjeta comprada
                            //alert('Indices' + indices);
                            $('#indice').val(indices);
                            /********** INSERTAR EL INDICE EN EL ARREGLO SOBRE TIPO DE PROMOCION ELEGIDA **********/
                            $('#idTarjeta').val(data.msj[i]['idTarjeta']);
                        }
                    }
                }else{
                    alert('Usted no puede vender tarjetas que no estan en su fajilla');
                    $('#tarjeta').val('');
                    $('#idTarjeta').val('');
                    location.reload();
                }
            });
    });
/********************************** Detectar Tarjeta *********************************/

/********************************** Detectar Recarga *********************************/
    $('#recargaAdd').change(function () {
        var tarjeta = $('#tarjetaAdd').val();
        if(tarjeta == ''){
            alert('Ingresa la tarjeta por favor');
            $('#recargaAdd').val('');
        }else{
            /********** INSERTAR EL INDICE EN EL ARREGLO SOBRE TIPO DE PROMOCION ELEGIDA **********/
            indices.push('2');//recarga
            //alert('Indices' + indices);
            $('#indice').val(indices);
            /********** INSERTAR EL INDICE EN EL ARREGLO SOBRE TIPO DE PROMOCION ELEGIDA **********/

            //alert(valor_recarga = $(this).val());
            valor_recarga = $(this).val();
            const creditos = 5;
            const pesos = 50;
            r = (valor_recarga * creditos)/pesos;
            $('#recargaP').val(valor_recarga);
            $('#recargaCred').val(r);
            $('#recargaTr').show();
            sumar();
        }
    });
/********************************** Detectar Recarga *********************************/

/********************************** Cambiar Pagina de Venta a Reporte *********************************/
    $(document).on('click','#cerrarCaja', function(){
        //alert($('#ventanillaa').val());
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

/********************************** Datos Formulario para Cobrar*********************************/
    //datos formulario para cobrar
    function cobrarCompra(){
        $.ajax({
        type: "POST",
        url: "guardarVentas",
        data: $('#formPuntoVenta').serialize(),
        dataType: "JSON",
        error(jqXHR, textStatus, errorThrown){
                alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
        },
        }).done(function(data){
            console.log('Si llego');
            console.log(data.msj);
        });
    }
/********************************** Datos Formulario para Cobrar *********************************/

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
    
    //sumar precios
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
        $('#total2').val(total);
    }

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