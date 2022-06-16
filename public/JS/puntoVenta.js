//var prev;
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
                   // inicia_carg();//funcion que abre la ventana de carga
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
                    $('#tarjetD').val('');
                    $('#descripcion').val('');
                }else{
                    alert('Error al devolver: 1)No puede hacer una devolucion si la tarjeta ya esta vendida 2)No puede devolver tarjetas que no estan en su fajilla');
                    $('#tarjetD').val('');
                    $('#descripcion').val('');
                }
                //cierra_carg();
            });
    
    });

    $(document).on('click','#cancelarDev', function(){
        cache_clear();
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
                        /*<div class="alert alert-success fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="True">&times;</span>
                        </button>
                        <p id="mensaje"></p>
                        <center><span class="badge badge-success" type="button" data-dismiss="modal">Aceptar</span></center>
                    </div>*/
                        MENSAJE = "Usted no puede agregar una fajilla nueva, favor de terminar de vender la fajilla actual";
                        $("#mensaje").html(MENSAJE);
                        $('#staticBackdrop').modal('show');
                    }else{
                        MENSAJE = "Agregado correctamente";
                        $("#mensaje").html(MENSAJE);
                        $('#alertaCorrecta').modal('show');
                        //alert('Si puede agregar');
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
        $("#modal_Efectivo .modal-body #efect").html('');
        var total = $('#total').val();
        var tipo = $(this).val();
        $("#cobrarTransaccion").val(tipo);
        //alert(tipo);
        $.ajax({
                beforeSend:function () {//antes de cargar la info, abrimos una ventana de carga
                    modal();//funcion que abre la ventana de carga
                },
                url:"Tipo_Pago",//la ruta a donde enviare la info
                type:"POST",
                data:{'tipo':tipo},//toma el valor del boton seleccionado
                dataType: 'JSON',
                error: function(jqXHR, textStatus, errorThrown){
                    alert('Se produjo un error: a'+ errorThrown + ' ' + textStatus);//en caso de presentar un error, muestra el msj
                    modalCerrar();//funcion que cierra la ventana de carga
                },
            }).done(function(data){//obtiene el valor de data procesado en el controlador
                var html ='';
                var optionSelectBanco='';
                for(var i = 0;i <data.msj.Tipo.length; i++){
                    if(data.msj.Tipo[i]["idFormasPago"] == 1){
                        html +=' <tr>'+
                                    '<td colspan="5" style="border: none;">'+
                                        '<div class="input-group">'+
                                            '<div class="col-xs-2 col-sm-4">'+
                                            '<h6><b>TOTAL: $</b></h6>'+
                                            '</div>'+
                                            '<div class="col-xs-2 col-sm-6">'+
                                                '<input class="form-control" type="number" min="0" name="total2" id="total2" value="'+total+'">'+
                                            '</div>'+
                                        '</div><br>'+
                                    '</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td style="border: none;"><button class="btn btn-warning val" name="centavos" id="centavos" value=".50" style="width:70px; height:70px; margin:5px; background-image: linear-gradient(15deg, #b38af8 0, #8b6ee3 25%, #5b50cc 50%, #0435b5 75%, #0021a1 100%);"><b>$ .50</b></button></td>'+
                                    '<td style="border: none;"><button class="btn btn-warning val" name="uno" id="uno" value="1" style="width:70px; height:70px; margin:5px; background-image: linear-gradient(15deg, #b38af8 0, #8b6ee3 25%, #5b50cc 50%, #0435b5 75%, #0021a1 100%);"><b>$ 1</b></button></td>'+
                                    '<td style="border: none;"><button class="btn btn-warning val" name="dos" id="dos" value="2" style="width:70px; height:70px; margin:5px; background-image: linear-gradient(15deg, #b38af8 0, #8b6ee3 25%, #5b50cc 50%, #0435b5 75%, #0021a1 100%);"><b>$ 2</b></button></td>'+
                                    '<td style="border: none;"><button class="btn btn-warning val" name="cinco" id="cinco" value="5" style="width:70px; height:70px; margin:5px; background-image: linear-gradient(15deg, #b38af8 0, #8b6ee3 25%, #5b50cc 50%, #0435b5 75%, #0021a1 100%);"><b>$ 5</b></button></td>'+
                                    '<td style="border: none;"><button class="btn btn-warning val" name="diez" id="diez" value="10" style="width:70px; height:70px; margin:5px;background-image: linear-gradient(15deg, #b38af8 0, #8b6ee3 25%, #5b50cc 50%, #0435b5 75%, #0021a1 100%);" ><b>$ 10</b></button></td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td><button class="btn btn-success val" name="veinte" id="veinte" value="20" style="width:70px; height:70px; margin:5px; background-image: linear-gradient(15deg, #b38af8 0, #8b6ee3 25%, #5b50cc 50%, #0435b5 75%, #0021a1 100%);"><b>$ 20</b></button></td>'+
                                    '<td><button class="btn btn-success val" name="cincuenta" id="cincuenta" value="50" style="width:70px; height:70px; margin:5px; background-image: linear-gradient(15deg, #b38af8 0, #8b6ee3 25%, #5b50cc 50%, #0435b5 75%, #0021a1 100%);"><b>$ 50</b></button></td>'+
                                    '<td><button class="btn btn-success val" name="cien" id="cien" value="100" style="width:70px; height:70px; margin:5px; background-image: linear-gradient(15deg, #b38af8 0, #8b6ee3 25%, #5b50cc 50%, #0435b5 75%, #0021a1 100%);"><b>$ 100</b></button></td>'+
                                    '<td><button class="btn btn-success val" name="dosc" id="dosc" value="200" style="width:70px; height:70px; margin:5px; background-image: linear-gradient(15deg, #b38af8 0, #8b6ee3 25%, #5b50cc 50%, #0435b5 75%, #0021a1 100%);"><b>$ 200</b></button></td>'+
                                    '<td><button class="btn btn-success val" name="quin" id="quin" value="500" style="width:70px; height:70px; margin:5px; background-image: linear-gradient(15deg, #b38af8 0, #8b6ee3 25%, #5b50cc 50%, #0435b5 75%, #0021a1 100%);"><b>$ 500</b></button></td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td><button class="btn btn-success" name="mil" id="mil" value="1000" style="width:70px; height:70px; margin:5px; background-image: linear-gradient(15deg, #b38af8 0, #8b6ee3 25%, #5b50cc 50%, #0435b5 75%, #0021a1 100%);"><b>$ 1000</b></button></td>'+
                                    '<td colspan="3" style="border: none;">'+
                                        '<center><h6><b>EFECTIVO:</b></h6></center>'+
                                        '<input type="number" class="form-control" min="0" id="efectivo" name="efectivo" value="">'+
                                    '</td>'+'<td><button class="btn btn-danger borrar" name="borrar" id="borrar" value="" style="width:70px; height:70px; margin:5px;"><i class="fa fa-eraser" aria-hidden="true"></i></button></td>'+
                                '</tr>';
                    }
                    if(data.msj.Tipo[i]["idFormasPago"] == 2){

                        var comision = (total * data.msj.Tipo[i]["PorcentajeCosto"]);
                        var TotalConPorcentaje = (parseFloat(comision) + parseFloat(total));

                        for(var i= 0; i < data.msj.Bancos.length; i ++){
                            optionSelectBanco += '<option value="'+data.msj.Bancos[i]['idBanco']+'">'+data.msj.Bancos[i]['Banco']+'</option>';
                        }

                        html +='<tr>'+
                                    '<td style="border: none;">'+
                                        '<div class="form-group">'+
                                            '<center><h6><b>TARJETA</b></h6></center><hr>'+
                                            '<div class="input-group">'+
                                                '<input type="radio" name="ttarjeta" id="ttarjeta" value="Tarjeta de Crédito" style="height: 20px; width: 20px;">Tarjeta de Crédito &nbsp;&nbsp;'+
                                                '<input type="radio" name="ttarjeta" id="ttarjeta" value="Tarjeta de Débito" style="height: 20px; width: 20px;">Tarjeta de Débitos'+
                                            '</div>'+
                                        '</div>'+
                                    '</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td>'+
                                        '<div class="form-group">'+
                                            '<center><h6><b>BANCO</b></h6></center>'+
                                                '<select class="form-control bancoSelec" name="bancoSelec" id="bancoSelec">'+optionSelectBanco+'</select>'+
                                        '</div>'+
                                    '</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td>'+
                                        '<div class="input-group">'+
                                            '<div class="form-group">'+
                                                '<center><h6><b>MONTO TOTAL</b></h6></center>'+
                                                '<input type="number" min="0" onkeypress="return(event.charCode >= 48 && event.charCode <= 57)" class="form-control" value="'+total+'" required>'+
                                            '</div>'+
                                            '<div class="form-group">'+
                                                '<center><h6><b>TOTAL CON COMISION</b></h6></center>'+
                                                '<input type="number" min="0" onkeypress="return(event.charCode >= 48 && event.charCode <= 57)" class="form-control" name="mtarjeta" id="mtarjeta" value="'+TotalConPorcentaje+'" required>'+
                                            '</div>'+
                                        '</div>'+
                                    '</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td>'+
                                        '<div class="input-group">'+
                                            '<div class="form-group">'+
                                                '<center><h6><b>INGRESA LOS 4 ÚLTIMOS <br> DIGITOS DE LA TARJETA</b></h6></center>'+
                                                '<input type="number" min="4" max="4" onkeypress="return(event.charCode >= 48 && event.charCode <= 57)" class="form-control" name="dtarjeta" id="dtarjeta" value="" required>'+
                                            '</div>'+
                                            //'<span class="input-group-addon">&nbsp;&nbsp;  &nbsp;&nbsp;</span>'+
                                            '<div class="form-group">'+
                                                '<center><h6><b>INGRESA LOS DIGITOS <br> DE APROVACIÓN </b></h6></center>'+
                                                '<input type="number" onkeypress="return(event.charCode >= 48 && event.charCode <= 57)" class="form-control" name="naprov" id="naprov" value="" required>'+
                                            '</div>'+   
                                        '</div>'+   
                                    '</td>'+
                                '</tr>';
                    }
                }
                modalCerrar();
                $("#modal_Efectivo .modal-body #efect").html(html);
            });
    });
/********************************** Tipo Pago*********************************/

    $(document).on('change','.bancoSelec', function(){
        alert($(this).val());
    });

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
            MENSAJE = "Debes realizar una compra";
            $("#mensaje").html(MENSAJE);
            $('#staticBackdrop').modal('show');       
            setInterval(function() {cache_clear()}, 2000);
        }else{
            if(tipo == 1){
                var totalCobrar = $('#total').val();
                var totalIngresado = $('#efectivo').val();
                if(totalIngresado > totalCobrar){
                    var cambio = totalIngresado - totalCobrar;
                    MENSAJE2 = 'Su cambio es de:' + cambio;
                    $("#mensaje2").html(MENSAJE2);
                    $('#alertaCorrecta').modal('show');
                    cobrarCompra();
                    setInterval(function() {cache_clear()}, 2000);
                    //location.reload();
                }else if(totalIngresado == totalCobrar){
                    MENSAJE2 = "Gracias por su compra";
                    $("#mensaje2").html(MENSAJE2);
                    $('#alertaCorrecta').modal('show');
                    cobrarCompra();
                    setInterval(function() {cache_clear()}, 2000);
                    //location.reload();
                }else if(totalIngresado < totalCobrar){
                    MENSAJE = "DINERO INSUFICIENTE";
                    $("#mensaje").html(MENSAJE);
                    $('#staticBackdrop').modal('show');
                    $('#efectivo').val('');
                    //(function() {cache_clear()}, 2000);
                }
            }else {//if(tipo == 2){
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

/********************************** Detectar Tarjeta *********************************/
    $('#tarjetaAdd').change(function (){

        var folioTarjeta = $(this).val();//folio de tarjeta
        var v = $('#ventanillaa').val();
        var e = $('#evento').val();

        $.ajax({
            beforeSend:function () {//antes de cargar la info, abrimos una ventana de carga
               // inicia_carg();//funcion que abre la ventana de carga
               modal();
            },
            type:"POST",
            url:"validarTarjeta",
            data:{'folioTarjeta':folioTarjeta, 'ventanilla':v, 'evento':e},
            dataType: 'JSON',
            error: function(jqXHR, textStatus, errorThrown){
                alert('Se produjo un error: a'+ errorThrown + ' ' + textStatus);
                modalCerrar();
            },
            }).done(function(data){
                console.log('soy data'+data.msj);
                $('#tarjeta').val(folioTarjeta);

                if(data.msj){

                    for(var i = 0;i<data.msj.length; i++){
                        idTar = data.msj[i]['idTarjeta'];
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
                    modalCerrar();
                }else{
                    MENSAJE = "Usted no puede vender tarjetas que no estan en su fajilla o que ha cancelado";
                    $("#mensaje").html(MENSAJE);
                    $('#staticBackdrop').modal('show');
                    $('#tarjeta').val('');
                    $('#idTarjeta').val('');
                    setInterval(function() {cache_clear()}, 2000);
                    //location.reload();// acomodar para recargar en 3 segundos
                    modalCerrar();
                }
            });
    });
/********************************** Detectar Tarjeta *********************************/

/********************************** Detectar Recarga *********************************/
    $('#recargaAdd').change(function () {
        var tarjeta = $('#tarjetaAdd').val();
        if(tarjeta == ''){
            MENSAJE = "Ingresa la tarjeta por favor";
            $("#mensaje").html(MENSAJE);
            $('#staticBackdrop').modal('show');
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
            MENSAJE = "Ingresa la tarjeta por favor";
            $("#mensaje").html(MENSAJE);
            $('#staticBackdrop').modal('show');
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
                                    //'<td style="padding:0px;"><input type="button" id="eliminarPromoP" class="eliminarPromoP" value="'+data.msj[i]["idFechaPulseraMagica"]+'"><i class="fa fa-trash btn btn-danger" aria-hidden="true"></i></td>'+
                                    //'<td style="padding:0px;"><a href="#eliminarPromoP'+data.msj[i]['idFechaPulseraMagica']+'" class="eliminar" data-toggle="modal"><i class="fa fa-trash btn btn-danger" aria-hidden="true"></i></a></td>'+
                                '</tr>';
                    $("#productos").append(html);
                    prec.push(data.msj[i]['Precio']);
                }    
                sumar();
                $('#arregloPrecioP').val(prec);
                modalCerrar();
            });
        }
    });
/********************************** Agregar Promociones de Pulsera Magica *********************************/

/********************************** Eliminar Promociones de Pulsera Magica ********************************/
    $(document).on('click', '.eliminarPromoP', function(event){
        var array = $('#arregloP').val();//trae el valor del array de promociones pulsera;
        let arr = array.split(',');
        var toRemove = $(this).val();//trae el valor a eliminar
        let pos = arr.indexOf(toRemove.toString()) // (pos) es la posición para abreviar
        let elementoEliminado = arr.splice(pos, 1)
        /*console.log(elementoEliminado);
        console.log(pos);
        console.log(arr);*/
        $(this).parent().parent().remove();
        $('#arregloP').val(arr);//actualizamos el valor del input


        /*let pos2 = arr2.indexOf(toRemove2.toString()) // (pos) es la posición para abreviar
        let elementoEliminado2 = arr2.splice(pos2, 1)
        console.log(elementoEliminado2);
        console.log(pos2);
        console.log(arr2);
        $(this).parent().parent().remove();
        $('#arregloPrecioP').val(arr2);*/

        /*var data = $('#arregloP').val();//trae el valor del array de promociones pulsera
        var toRemove = $(this).val();//trae el valor a eliminar
        let arr = data.split(',');//divide la cadena de texto para regresarla como array
        arr = arr.filter(function(item){
            return item !== toRemove;//quita el valor a eliminar si existe en el array
        });
        $(this).parent().parent().remove();//eliminar las promos registradas como compra en caso de cancelar
        $('#arregloP').val(arr);//actualizamos el valor del input*/

        /***************** Elimina el indice que especifica que es promoP en el array principal(indice) ****************/
        var arreglo = $('#indice').val();//trae el valor del array de promociones pulsera;
        let arr3 = arreglo.split(',');
        let pos3 = arr3.indexOf('3') // (pos) es la posición para abreviar
        let elementoEliminado3 = arr3.splice(pos3, 1)
        /*console.log(elementoEliminado3);
        console.log(pos3);
        console.log(arr3);*/
        $('#indice').val(arr3);
    });
/********************************** Eliminar Promociones de Pulsera Magica ********************************/

/********************************** Agregar Promociones de Creditos de Cortesia*********************************/
    $(document).on('click', '.creditosC', function(event){
        var fecha = '<?php echo $fecha;?>';
        var tarjeta = $('#tarjetaAdd').val();
        if(tarjeta == ''){
            MENSAJE = "Ingresa la tarjeta por favor";
            $("#mensaje").html(MENSAJE);
            $('#staticBackdrop').modal('show');
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
                                    //'<td style="padding:0px;"><a href="#eliminarPromo'+data.msj[i]['idFechaCreditosCortesia']+'" class="eliminar" data-toggle="modal"><i class="fa fa-trash btn btn-danger" aria-hidden="true"></i></a></td>'+
                                '</tr>';
                }
                $("#productos").append(html);
                sumar();
                var prec = $('#precioC').val();
                preciosC.push(prec);
                $('#arregloPrecioC').val(preciosC);
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

/********************************** Datos Formulario para Cobrar*********************************/
    //datos formulario para cobrar
    function cobrarCompra(){
        var tipoT = $('#ttarjeta').val();
        var select = $('select').val();
        var mtarjeta = $('#mtarjeta').val();
        var dtarjeta = $('#dtarjeta').val();
        var naprov = $('#naprov').val();

       // alert(tipoT + ' ' + select + ' ' + mtarjeta + ' ' + dtarjeta + ' ' + naprov + ' ' + $('#formPuntoVenta').serialize());

        var tarjeta = $('#tarjetaAdd').val();
        if(tarjeta == ''){
            MENSAJE = "Ingresa la tarjeta por favor";
            $("#mensaje").html(MENSAJE);
            $('#staticBackdrop').modal('show');
        }else{
            var tipo = $('#cobrarTransaccion').val();
            $.ajax({
                beforeSend:function () {//antes de cargar la info, abrimos una ventana de carga
                    modal();//funcion que abre la ventana de carga
                },
                type: "POST",
                url: "guardarVentas",
                data: $('#formPuntoVenta').serialize() + '&tipo=' + tipo + '&tipoT=' + tipoT + '&select=' + select + '&mtarjeta=' + mtarjeta + '&dtarjeta=' + dtarjeta + '&naprov=' + naprov ,
                dataType: "JSON",
                error(jqXHR, textStatus, errorThrown){
                    alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
                    modalCerrar();
                },
            }).done(function(data){
                console.log('Si llego');
                console.log(data.msj);
                modalCerrar();
            });
        }
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
    function sumar(){
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
            