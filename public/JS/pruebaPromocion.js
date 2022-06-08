var contador_Fila_Descuentos=0;
var contador_Fila_Pulsera = 0;
var contador_Fila_Juegos = 0;
var contador_Fila_Cortesias = 0;

var precio_Descuentos =[];
var precio_Pulsera = [];
var precio_Juegos = [];
var precio_Cortesias = []; 

var promocion_Descuentos_Atraccion_Eliminar = [];
var promocion_Pulsera_Atraccion_Eliminar = [];
var promocion_Juegos_Atraccion_Eliminar = [];

var promocion_Descuentos_Atraccion_Nuevo = [];
var promocion_Pulsera_Atraccion_Nuevo = [];
var promocion_Juegos_Atraccion_Nuevo = [];

var fechas_Descuentos = [];
var fechas_Pulsera = [];
var fechas_Juegos = [];
var fechas_Cortesias = [];

var descuentos_Atraccion = [];
var pulsera_Atraccion = [];
var juegos_Atraccion = [];

var fecha_Inicial_Descuento = '';
var fecha_Final_Descuento = '';
var precios_Descuentos_Html = '';

var fecha_Inicial_Pulsera = '';
var fecha_Final_Pulsera = '';
var precio_Pulsera_Html = '';

var fecha_Inicial_Juegos = '';
var fecha_Final_Juegos = '';

var fecha_Inicial_Creditos = '';
var fecha_Final_Creditos = '';
var precio_Creditos_Html= '';
var creditos_Html= '';

var tabla_Descuentos_Html ='';
var tabla_Pulsera_Html = '';
var tabla_Juegos_Html = '';
var tabla_Creditos_Html = '';

var fechaDescuento =[];
var fechaPulsera = [];
var fechaJuego = [];
var fechaCredito = [];

var fecha_Editada_Descuento = [];
var fecha_Editada_Pulsera = [];
var fecha_Editada_Juego = [];
var fecha_Editada_Credito = []; 

var idEvento;

/**Primer nivel, para agregar una promoción a un evento */

$(document).on('click','.mostrar_Promociones_Evento',function(){
    iniciarCarga();

    fecha_Inicial_Descuento = '';
    fecha_Final_Descuento = '';
    precios_Descuentos_Html = '';

    fecha_Inicial_Pulsera = '';
    fecha_Final_Pulsera = '';
    precio_Pulsera_Html = '';

    fecha_Inicial_Juegos = '';
    fecha_Final_Juegos = '';

    fecha_Inicial_Creditos = '';
    fecha_Final_Creditos = '';
    precio_Creditos_Html= '';
    creditos_Html= '';

    tabla_Descuentos_Html = '';
    tabla_Pulsera_Html = '';
    tabla_Juegos_Html = '';
    tabla_Creditos_Html = '';

    $("#cantidadPersonas").val('');
    $("#cantidad_Boletos").val('');
    $("#inicioDescuento").val('');
    $("#finDescuentos").val('');
    contador_Fila_Descuentos = 0;
    fechas_Descuentos = [];
    $("#tabla_Fechas_Descuentos").html('<tr><th>Hora Inicial</th><th>Hora Final</th><th>Eliminar</th></tr>');

    $("#precio_Pulsera").val('');
    $("#inicioPulsera").val('');
    $("#finPulsera").val('');
    $("#precioPulsera").val('');
    contador_Fila_Pulsera = 0;
    fechas_Pulsera = [];
    $("#tabla_Fechas_Pulsera").html('<tr><th>Hora Inicial</th><th>Hora Final</th><th>Precio</th><th>Eliminar</th></tr>');

    $("#inicioJuegos").val('');
    $("#finJuegos").val('');
    contador_Fila_Juegos = 0;
    fechas_Juegos = [];
    $("#tabla_Fechas_Juegos").html('<tr><th>Hora Inicial</th><th>Hora Final</th><th>Eliminar</th></tr>');


    $("#precio_Cortesias").val('');
    $("#creditos_Cortesias").val('');
    $("#inicioCortesias").val('');
    $("#finCortesias").val('');
    $("#precioCortesias").val('');
    $("#creditosI").val('');
    contador_Fila_Cortesias = 0;
    fechas_Cortesias = [];
    $("#tabla_Fechas_Cortesias").html('<tr><th>Hora Inicial</th><th>Hora Final</th><th>Precio</th><th>Creditos</th><th>Eliminar</th></tr>');


    var nombre_Descuentos_Html= '';
    var nombre_Pulsera_Html = '';
    var nombre_Juegos_Html = '';
    var nombre_Cortesias_Html = '';
    
    var option_Descuentos_Html ='';
    var option_Pulsera_Html = '';
    var option_Juegos_Html = '';
    var option_Cortesias_Html = '';

    option_Descuentos_Html ='<option value="">Seleccione una promoción</option>';
    option_Pulsera_Html = '<option value="">Seleccione una promoción</option>';
    option_Juegos_Html = '<option value="">Seleccione una promoción</option>';
    option_Cortesias_Html = '<option value="">Seleccione una promoción</option>';

    idEvento =$(this).data('book-id');
    $("#idEventoPromociones").val(idEvento['idEvento']);

    
    $.ajax({
        type:"POST",
        url:'Eventos/Mostrar_Promociones',
        data:{'idEvento':idEvento} ,
        dataType:'JSON',
        error: function(jqXHR, textStatus, errorThrown){
            alert('Se produjo un error: a'+ errorThrown + ' ' + textStatus);
            cerrarCarga();
        },
    }).done(function(data){
        if(data.respuesta){
            for(var i=0; i<data.msj.descuentos.length;i++){
                option_Descuentos_Html += '<option value="'+data.msj.descuentos[i]['idDosxUno']+'">'+data.msj.descuentos[i]['Nombre']+'</option>';

                precio_Descuentos.push({'idDosxUno':data.msj.descuentos[i]['idDosxUno'],'Cantidad':data.msj.descuentos[i]['Cantidad'],'Boletos':data.msj.descuentos[i]['Boletos']});
            }

            for(var i=0; i<data.msj.pulsera.length;i++){
                option_Pulsera_Html += '<option value="'+data.msj.pulsera[i]['idPulseraMagica']+'">'+data.msj.pulsera[i]['Nombre']+'</option>';

                precio_Pulsera.push({'idPulseraMagica':data.msj.pulsera[i]['idPulseraMagica'],'Precio':data.msj.pulsera[i]['Precio']});
            }

            for(var i=0; i<data.msj.juegos.length;i++){
                option_Juegos_Html += '<option value="'+data.msj.juegos[i]['idJuegosGratis']+'">'+data.msj.juegos[i]['Nombre']+'</option>';

                precio_Juegos.push({'idJuegosGratis':data.msj.juegos[i]['idJuegosGratis'],'Precio':data.msj.juegos[i]['Precio']});
            }

            for(var i=0;i<data.msj.cortesias.length;i++){
                option_Cortesias_Html +='<option value="'+data.msj.cortesias[i]['idCC']+'">'+data.msj.cortesias[i]['Nombre']+'</option>';

                precio_Cortesias.push({'idCC':data.msj.cortesias[i]['idCC'],'Precio':data.msj.cortesias[i]['Precio'],'Creditos':data.msj.cortesias[i]['Creditos']});
            }

            for(var i=0; i<data.nombres.descuentos.length;i++){
                var datos_Descuentos = '';
                var arreglo = [];
                
                for(var j= 0; j<data.listado.listadoDescuentos.length;j++){
                    if(data.nombres.descuentos[i]['idDosxUno'] == data.listado.listadoDescuentos[j]['idDosxUno']){

                        fecha_Inicial_Descuento += data.listado.listadoDescuentos[j]['FechaInicial']+'<br><br>';
                        fecha_Final_Descuento += data.listado.listadoDescuentos[j]['FechaFinal']+'<br><br>';
                        
                        arreglo.push({'idFechaDosxUno':data.listado.listadoDescuentos[j]['idFechaDosxUno'],'FechaInicial':data.listado.listadoDescuentos[j]['FechaInicial'],'FechaFinal':data.listado.listadoDescuentos[j]['FechaFinal']});
                    }
                }
                datos_Descuentos = JSON.stringify(arreglo);

                tabla_Descuentos_Html += '<tr>'+
                '<td style="text-align: center; vertical-align:middle;"><a href="#editar_Descuento" class="editar_Descuentos" data-toggle="modal" data-book-id='+"'{"+'"datos":'+datos_Descuentos+','+'"Nombre":"'+data.nombres.descuentos[i]['Nombre']+'",'+'"Cantidad":'+data.nombres.descuentos[i]['Cantidad']+','+'"Boletos":'+data.nombres.descuentos[i]['Boletos']+''+"}'"+'><i class="fa fa-paint-brush btn btn-outline-warning" aria-hidden="true"></i></a></td>'+
                '<td style="text-align: center; vertical-align:middle;">'+data.nombres.descuentos[i]['Nombre']+'</td>'+
                '<td style="text-align: center; vertical-align:middle;">'+data.nombres.descuentos[i]['Cantidad']+'</td>'+
                '<td style="text-align: center; vertical-align:middle;">'+data.nombres.descuentos[i]['Boletos']+'</td>'+
                '<td>'+fecha_Inicial_Descuento+'</td>'+
                '<td>'+fecha_Final_Descuento+'</td>'+
                '</tr>';

                fecha_Inicial_Descuento = '';
                fecha_Final_Descuento = '';
            }

            for(var i=0; i<data.nombres.pulsera.length;i++){
                var datos_Pulsera = '';
                var arreglo = [];
                for(var j =0;j<data.listado.listadoPulseras.length;j++){
                    if(data.nombres.pulsera[i]['idPulseraMagica'] == data.listado.listadoPulseras[j]['idPulseraMagica']){
                        fecha_Inicial_Pulsera += data.listado.listadoPulseras[j]['FechaInicial']+ '<br><br>';
                        fecha_Final_Pulsera += data.listado.listadoPulseras[j]['FechaFinal']+ '<br><br>';
                        precio_Pulsera_Html += data.listado.listadoPulseras[j]['Precio'] + '<br><br>';
                        
                        arreglo.push({'idFechaPulseraMagica':data.listado.listadoPulseras[j]['idFechaPulseraMagica'],'Precio':data.listado.listadoPulseras[j]['Precio'],'FechaInicial':data.listado.listadoPulseras[j]['FechaInicial'],'FechaFinal':data.listado.listadoPulseras[j]['FechaFinal']});
                    }
                }
                datos_Pulsera = JSON.stringify(arreglo);
                tabla_Pulsera_Html +='<tr>'+
                '<td style="text-align: center; vertical-align:middle;"><a href="#editar_Pulsera" class="editar_Pulseras" data-toggle="modal" data-book-id='+"'{"+'"datos":'+datos_Pulsera+','+'"Nombre":"'+data.nombres.pulsera[i]['Nombre']+'"'+''+"}'"+'><i class="fa fa-paint-brush btn btn-outline-warning" aria-hidden="true"></i></a></td>'+
                '<td style="text-align: center; vertical-align:middle;">'+data.nombres.pulsera[i]['Nombre']+'</td>'+
                '<td style="text-align: center; vertical-align:middle;">'+precio_Pulsera_Html+'</td>'+
                '<td>'+fecha_Inicial_Pulsera+'</td>'+
                '<td>'+fecha_Final_Pulsera+'</td>'+
                '</tr>';

                fecha_Inicial_Pulsera = '';
                fecha_Final_Pulsera = '';
                precio_Pulsera_Html = '';
            }

            for(var i =0; i<data.nombres.juegos.length;i++){
                var datos_Juegos = [];
                var arreglo = [];
                for(var j=0;j<data.listado.listadoJuegos.length;j++){
                    if(data.nombres.juegos[i]['idJuegosGratis'] == data.listado.listadoJuegos[j]['idJuegosGratis']){
                        fecha_Inicial_Juegos += data.listado.listadoJuegos[j]['FechaInicial'] + '<br><br>';
                        fecha_Final_Juegos += data.listado.listadoJuegos[j]['FechaFinal'] + '<br><br>';
                    
                        arreglo.push({'idFechaJuegosGratis':data.listado.listadoJuegos[j]['idFechaJuegosGratis'],'FechaInicial':data.listado.listadoJuegos[j]['FechaInicial'],'FechaFinal': data.listado.listadoJuegos[j]['FechaFinal']});
                    }
                }

                datos_Juegos = JSON.stringify(arreglo);

                tabla_Juegos_Html +='<tr>'+
                '<td style="text-align: center; vertical-align:middle;"><a href="#editar_Juego" class="editar_Juegos" data-toggle="modal" data-book-id='+"'{"+'"datos":'+datos_Juegos+','+'"Nombre":"'+data.nombres.juegos[i]['Nombre']+'"'+''+"}'"+'><i class="fa fa-paint-brush btn btn-outline-warning" aria-hidden="true"></i></a></td>'+
                '<td style="text-align: center; vertical-align:middle;">'+data.nombres.juegos[i]['Nombre']+'</td>'+
                '<td>'+fecha_Inicial_Juegos+'</td>'+
                '<td>'+fecha_Final_Juegos+'</td>'+
                '</tr>';

                fecha_Inicial_Juegos = '';
                fecha_Final_Juegos = '';
            }
            
            for(var i=0;i<data.nombres.creditos.length;i++){
                var datos_Creditos = '';
                var arreglo = [];

                for(var j=0;j<data.listado.listadoCreditos.length;j++){
                    if(data.nombres.creditos[i]['idCC'] == data.listado.listadoCreditos[j]['idCC']){
                        fecha_Inicial_Creditos += data.listado.listadoCreditos[j]['FechaInicial'] +'<br><br>';
                        fecha_Final_Creditos += data.listado.listadoCreditos[j]['FechaFinal'] + '<br><br>';
                        precio_Creditos_Html += data.listado.listadoCreditos[j]['Precio'] +'<br><br>';
                        creditos_Html += data.listado.listadoCreditos[j]['Creditos'] +'<br><br>';
                        arreglo.push({'idFechaCreditosCortesia':data.listado.listadoCreditos[j]['idFechaCreditosCortesia'],'Precio':data.listado.listadoCreditos[j]['Precio'],'Creditos':data.listado.listadoCreditos[j]['Creditos'],'FechaInicial':data.listado.listadoCreditos[j]['FechaInicial'],'FechaFinal':data.listado.listadoCreditos[j]['FechaFinal']});
                    }
                }

                datos_Creditos = JSON.stringify(arreglo);

                tabla_Creditos_Html += '<tr>'+
                '<td style="text-align: center; vertical-align:middle;"><a href="#editar_Credito" class="editar_Creditos" data-toggle="modal" data-book-id='+"'{"+'"datos":'+datos_Creditos+','+'"Nombre":"'+data.nombres.creditos[i]['Nombre']+'"'+''+"}'"+'><i class="fa fa-paint-brush btn btn-outline-warning" aria-hidden="true"></i></a></td>'+
                '<td style="text-align: center; vertical-align:middle;">'+data.nombres.creditos[i]['Nombre']+'</td>'+
                '<td style="text-align: center; vertical-align:middle;">'+precio_Creditos_Html+'</td>'+
                '<td style="text-align: center; vertical-align:middle;">'+creditos_Html+'</td>'+
                '<td>'+fecha_Inicial_Creditos+'</td>'+
                '<td>'+fecha_Final_Creditos+'</td>'+
                '</tr>';


                fecha_Inicial_Creditos = '';
                fecha_Final_Creditos = '';
                precio_Creditos_Html = '';
                creditos_Html = '';
            }

            nombre_Descuentos_Html = '<label for="promocionesDescuentos">Nombre de la promocion</label>'+
            '<select name="promocionesDescuentos" id="promocionesDescuentos" class="form-control">'+option_Descuentos_Html+'</select>'+
            '<br>';

            nombre_Pulsera_Html = '<label for="promocionesPulsera">Nombre de la promocion</label>'+
            '<select name="promocionesPulsera" id="promocionesPulsera" class="form-control">'+option_Pulsera_Html+'</select>'+
            '<br>';

            nombre_Juegos_Html = '<label for="promocionesPulsera">Nombre de la promocion</label>'+
            '<select name="promocionesJuegos" id="promocionesJuegos" class="form-control">'+option_Juegos_Html+'</select>' +
            '<br>';
            
            nombre_Cortesias_Html = '<label for="promocionesPulsera">Nombre de la promocion</label>'+
            '<select name="promocionesCortesias" id="promocionesCortesias" class="form-control">'+option_Cortesias_Html+'</select>'+
            '<br>';

            $("#tabla_Descuentos_Evento").html(tabla_Descuentos_Html);
            $("#tabla_Pulsera_Evento").html(tabla_Pulsera_Html);
            $("#tabla_Juegos_Evento").html(tabla_Juegos_Html);
            $("#tabla_Creditos_Evento").html(tabla_Creditos_Html);
            $("#nombre_Descuentos").html(nombre_Descuentos_Html);
            $("#nombre_Pulsera").html(nombre_Pulsera_Html);
            $("#nombre_Juegos").html(nombre_Juegos_Html);
            $("#nombre_Cortesias").html(nombre_Cortesias_Html);
            cerrarCarga();
        }
    });
});

$(document).on('change','#promocionesDescuentos', function(event){
    contador_Fila_Descuentos = 0;
    fechas_Descuentos = [];
    $("#tabla_Fechas_Descuentos").html('<tr><th>Hora Inicial</th><th>Hora Final</th><th>Eliminar</th></tr>');

    var idDosxUno = ($("#promocionesDescuentos option:selected").val());

    if(idDosxUno !=""){
        const indice_Descuento = precio_Descuentos.findIndex((objeto)=>objeto.idDosxUno ==idDosxUno);
        $("#cantidadPersonas").val(precio_Descuentos[indice_Descuento]['Cantidad']);
        $("#cantidad_Boletos").val(precio_Descuentos[indice_Descuento]['Boletos']);
    }
    else{
        $("#cantidadPersonas").val('');
        $("#cantidad_Boletos").val('');
    }
});

$(document).on('change','#promocionesPulsera', function(event){
    contador_Fila_Pulsera = 0;
    fechas_Pulsera = [];
    $("#tabla_Fechas_Pulsera").html('<tr><th>Hora Inicial</th><th>Hora Final</th><th>Precio</th><th>Eliminar</th></tr>');
    var idPulseraMagica = ($("#promocionesPulsera option:selected").val());

    if(idPulseraMagica !=""){
        const indice_Pulsera = precio_Pulsera.findIndex((objeto)=>objeto.idPulseraMagica == idPulseraMagica);

        $("#precio_Pulsera").val(precio_Pulsera[indice_Pulsera]['Precio']);
    }
    else{
        $("#precio_Pulsera").val('');
    }
});

$(document).on('change','#promocionesJuegos',function(event){
    contador_Fila_Juegos = 0;
    fechas_Juegos = [];
    $("#tabla_Fechas_Juegos").html('<tr><th>Hora Inicial</th><th>Hora Final</th><th>Eliminar</th></tr>');
    var idJuegosGratis =($("#promocionesJuegos option:selected").val());
});

$(document).on('change','#promocionesCortesias', function(event){
    contador_Fila_Cortesias = 0;
    fechas_Cortesias = [];

    $("#precioPulsera").val('');
    $("#tabla_Fechas_Cortesias").html('<tr><th>Hora Inicial</th><th>Hora Final</th><th>Precio</th><th>Creditos</th><th>Eliminar</th></tr>');
    var idCC =($("#promocionesCortesias option:selected").val());

    if(idCC != ""){
        const indice_Cortesias = precio_Cortesias.findIndex((objeto)=>objeto.idCC == idCC);
        $("#precio_Cortesias").val(precio_Cortesias[indice_Cortesias]['Precio']);
        $("#creditos_Cortesias").val(precio_Cortesias[indice_Cortesias]['Creditos']);
    }
    else{
        $("#precio_Cortesias").val('');
        $("#creditos_Cortesias").val('');
    }
});

$("#adicionarDescuento").click(function(){
    var opcion = ($("#promocionesDescuentos option:selected").val());

    var inicioDescuento = $("#inicioDescuento").val() + ":00";
    var finDescuento = $("#finDescuento").val() + ":00";

    if(opcion != "" && inicioDescuento !=":00" && finDescuento !=":00"){
        var fila = '<tr id="descuentos'+contador_Fila_Descuentos+'"><td>'+inicioDescuento+'</td><td>'+finDescuento+'</td><td><button type="button" name="remover_Descuento" id="'+contador_Fila_Descuentos+'" class="btn btn-danger remover_Descuento">Remover</button></td></tr>';
        contador_Fila_Descuentos++;

        $('#tabla_Fechas_Descuentos tr:first').after(fila);

        fechas_Descuentos.push({'FechaInicial':inicioDescuento,'FechaFinal':finDescuento,'idDosxUno':opcion,'idEvento':idEvento});
    }
    else{
        alert('Favor de rellenar todos los campos');
    }
});

$("#adicionarPulsera").click(function(){
    var opcion = ($("#promocionesPulsera option:selected").val());

    var inicioPulsera = $("#inicioPulsera").val() + ":00";
    var finPulsera = $("#finPulsera").val() + ":00";
    var precioPulsera = $("#precioPulsera").val();

    if(opcion != "" && inicioPulsera !=":00" && finPulsera != ":00"){

        if(precioPulsera === ""){
            precioPulsera = $("#precio_Pulsera").val();
        }

        var fila = '<tr id="pulsera'+contador_Fila_Pulsera+'"><td>'+inicioPulsera+'</td><td>'+finPulsera+'</td><td>'+precioPulsera+'</td><td><button type="button" name="remover_Pulsera" id="'+contador_Fila_Pulsera+'" class="btn btn-danger remover_Pulsera">Remover</button></td></tr>';
        contador_Fila_Pulsera++;

        $("#tabla_Fechas_Pulsera tr:first").after(fila);
        fechas_Pulsera.push({'Precio':precioPulsera,'FechaInicial':inicioPulsera,'FechaFinal':finPulsera,'idPulseraMagica':opcion,'idEvento':idEvento});
    }
    else{
        alert('Favor de rellenar todos los campos');
    }
});

$("#adicionarJuegos").click(function(){
    var opcion = ($("#promocionesJuegos option:selected").val());

    var inicioJuegos = $("#inicioJuegos").val() + ":00";
    var finJuegos = $("#finJuegos").val() + ":00";

    if(opcion !="" && inicioJuegos !=":00" && finJuegos != ":00"){
        var fila = '<tr id="juegos'+contador_Fila_Juegos+'"><td>'+inicioJuegos+'</td><td>'+finJuegos+'</td><td><button type="button" name="remover_Juegos" id="'+contador_Fila_Juegos+'" class="btn btn-danger remover_Juegos">Remover</button></td></tr>';
        contador_Fila_Juegos++;

        $("#tabla_Fechas_Juegos tr:first").after(fila);
        fechas_Juegos.push({'Precio':0,'FechaInicial':inicioJuegos,'FechaFinal':finJuegos,'idJuegosGratis':opcion,'idEvento':idEvento});
    }
    else{
        alert('Favor de rellenar todos los campos');
    }
});

$("#adicionarCreditos").click(function(){
    var opcion = ($("#promocionesCortesias option:selected").val());
    var inicioCortesias = $("#inicioCortesias").val() + ":00";
    var finCortesias = $("#finCortesias").val() +":00";
    var precioCortesias = $("#precioCortesias").val();
    var creditos =$("#creditosI").val();

    if(opcion != "" && inicioCortesias != ":00" && finCortesias != ":00"){
        if(precioCortesias === ""){
            precioCortesias = $("#precio_Cortesias").val();
        }
        if(creditos === ""){
            creditos = $("#creditos_Cortesias").val();
        }

        var fila = '<tr id="cortesias'+contador_Fila_Cortesias+'"><td>'+inicioCortesias+'</td><td>'+finCortesias+'</td><td>'+precioCortesias+'</td><td>'+creditos+'</td><td><button type="button" name="remover_Cortesias" id="'+contador_Fila_Cortesias+'" class="btn btn-danger remover_Cortesias">Remover</button></td></tr>';
        contador_Fila_Cortesias++;

        $("#tabla_Fechas_Cortesias tr:first").after(fila);
        fechas_Cortesias.push({'Precio':precioCortesias,'Creditos':creditos,'FechaInicial':inicioCortesias,'FechaFinal':finCortesias,'idCC':opcion,'idEvento':idEvento});
    }
    else{
        alert('Favor de rellenar todos los campos');
    }
});


$(document).on('click','.remover_Descuento', function(){
    var opcion = ($("#promocionesDescuentos option:selected").val());
    var button_id = $(this).attr("id");

    $('#descuentos'+button_id+'').remove();

    fechas_Descuentos.splice(button_id,1);
});

$(document).on('click','.remover_Pulsera',function(){
    var opcion=($("#promocionesPulsera option:selected").val());

    var button_id =$(this).attr("id");

    $('#pulsera'+button_id+'').remove();

    fechas_Pulsera.splice(button_id,1);
});

$(document).on('click','.remover_Juegos', function(){
    var opcion = ($("#promocionesJuegos option:selected").val());
    var button_id = $(this).attr("id");

    $('#juegos'+button_id+'').remove();

    fechas_Juegos.splice(button_id,1);
});

$(document).on('click','.remover_Cortesias',function(){
    var opcion = ($("#promocionesCortesias option:selected").val());
    var button_id = $(this).attr("id");
    $('#cortesias'+button_id+'').remove();

    fechas_Cortesias.splice(button_id,1);
});

$("#agregar_Promocion_Evento").click(function(){
    iniciarCarga();
    
    if(!fechas_Descuentos.length){
        fechas_Descuentos = 0;
    }

    if(!fechas_Pulsera.length){
        fechas_Pulsera = 0;
    }

    if(!fechas_Juegos.length){
        fechas_Juegos = 0;
    }

    if(!fechas_Cortesias.length){
        fechas_Cortesias = 0;
    }
    
   $.ajax({
        type:"POST",
        url:'Eventos/Agregar_Promocion_Evento',
        data:{'fechasDescuentos':fechas_Descuentos,'fechasPulsera':fechas_Pulsera,'fechasJuegos':fechas_Juegos,'fechasCortesias':fechas_Cortesias},
        dataType: 'JSON',
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            cerrarCarga();
        },
   }).done(function(data){
       if(data.respuesta){

        console.log(JSON.stringify(data));
        location.reload();
       }

       cerrarCarga();
   });
});

/**-Segundo Nivel cuando se edita una promocion en el evento */

$(document).on('click','.editar_Descuentos', function(){
    iniciarCarga();
    fechaDescuento = [];
    fecha_Editada_Descuento = [];
    $("#td_Descuento").val('')
    $("#editar_Inicio_Descuento").val('');
    $("#editar_Final_Descuento").val('');
    $("#renglon_Descuento").val('');
    $("#idFechaDosxUno").val('');

    var datos = $(this).data('book-id');
    var fechas = datos['datos'];

    var fechas_Html='';
    var fila='';
    var contador = 0;

    $('#tabla_Editar_Fechas_Descuento').html('<tr><th>Hora Inicial</th><th>Hora Final</th><th>Editar</th></tr>');
    for(var i=0; i<fechas.length;i++){
        fila = '<tr id="renglon_Descuento'+contador+'"><td>'+fechas[i]['FechaInicial']+'</td><td>'+fechas[i]['FechaFinal']+'</td><td id="'+contador+'"><a id="'+fechas[i]['idFechaDosxUno']+'" class="editar_Fecha_Descuento"><i class="fa fa-paint-brush btn btn-outline-warning" aria-hidden="true"></i></a></td></tr>';
        //$("#renglon_Descuento").val('renglon_Descuento'+contador);
        fechaDescuento.push({'idFechaDosxUno':fechas[i]['idFechaDosxUno'],'FechaInicial':fechas[i]['FechaInicial'],'FechaFinal':fechas[i]['FechaFinal']});
        contador++;

        $('#tabla_Editar_Fechas_Descuento tr:first').after(fila);

    }

    $("#nombre_Editado_Descuento").val(datos['Nombre']);
    $("#cantidad_Editada_Descuentos").val(datos['Cantidad']);
    $("#boletos_Editada_Descuentos").val(datos['Boletos']);
    cerrarCarga();
});

$(document).on('click','.editar_Pulseras',function(){
    iniciarCarga();
    fechaPulsera = [];
    fecha_Editada_Pulsera = [];
    $("#td_Pulsera").val('');
    $("#renglon_Pulsera").val('');
    $("#idFechaPulseraMagica").val('');
    $("#editar_Inicio_Pulsera").val('');
    $("#editar_Final_Pulsera").val('');
    $("#editar_Precio_Pulsera").val('');

    var datos = $(this).data('book-id');
    var fechas = datos['datos'];
    var fila = '';
    var contador= 0;

    $("#tabla_Editar_Fechas_Pulsera").html('<tr><th>Hora Inicial</th><th>Hora Final</th><th>Precio</th><th>Editar</th></tr>');

    for(var i=0; i<fechas.length;i++){
        fila = '<tr id="renglon_Pulsera'+contador+'"><td>'+fechas[i]['FechaInicial']+'</td><td>'+fechas[i]['FechaFinal']+'</td><td>'+fechas[i]['Precio']+'</td><td id="'+contador+'"><a id="'+fechas[i]['idFechaPulseraMagica']+'" class="editar_Fecha_Pulsera"><i class="fa fa-paint-brush btn btn-outline-warning" aria-hidden="true"></i></a></td></tr>';
        fechaPulsera.push({'idFechaPulseraMagica':fechas[i]['idFechaPulseraMagica'],'FechaInicial':fechas[i]['FechaInicial'],'FechaFinal':fechas[i]['FechaFinal'],'Precio':fechas[i]['Precio']});
        contador++;

        $("#tabla_Editar_Fechas_Pulsera tr:first").after(fila);
    }

    $("#nombre_Editado_Pulsera").val(datos['Nombre']);
    cerrarCarga();
});

$(document).on('click','.editar_Juegos',function(){
    iniciarCarga();
    fechaJuego = [];
    fecha_Editada_Juego = [];

    $("#td_Juego").val('');
    $("#editar_Inicio_Juego").val('');
    $("#editar_Final_Juego").val('');
    $("#renglon_Juego").val('');
    $("#idFechaJuegosGratis").val('');

    var datos = $(this).data('book-id');
    var fechas = datos['datos'];
    var fila='';
    var contador= 0;

    $("#tabla_Editar_Fechas_Juego").val('<tr><th>Hora Inicial</th><th>Hora Final</th><th>Editar</th></tr>');

    for(var i= 0;i<fechas.length;i++){
        fila = '<tr id="renglon_Juego'+contador+'"><td>'+fechas[i]['FechaInicial']+'</td><td>'+fechas[i]['FechaFinal']+'</td><td id="'+contador+'"><a id="'+fechas[i]['idFechaJuegosGratis']+'" class="editar_Fecha_Juego"><i class="fa fa-paint-brush btn btn-outline-warning" aria-hidden="true"></i></a></td></tr>';
        fechaJuego.push({'idFechaJuegosGratis':fechas[i]['idFechaJuegosGratis'],'FechaInicial':fechas[i]['FechaInicial'],'FechaFinal':fechas[i]['FechaFinal']});
        contador++;

        $("#tabla_Editar_Fechas_Juego tr:first").after(fila);
    }

    $("#nombre_Editado_Juego").val(datos['Nombre']);

    cerrarCarga();
});

$(document).on('click','.editar_Creditos',function(){
    iniciarCarga();
    fechaCredito = [];
    fecha_Editada_Credito = [];

    $("#td_Credito").val('')
    $("#editar_Inicio_Credito").val('');
    $("#editar_Final_Credito").val('');
    $("#renglon_Credito").val('');
    $("#idFechaCreditosCortesia").val('');
    $("#editar_Precio_Credito").val('');
    $("#editar_Credito").val('');

    var datos = $(this).data('book-id');
    var fechas = datos['datos'];

    var fila='';
    var contador = 0;

    $("#tabla_Editar_Fechas_Creditos").val('<tr><th>Hora Inicial</th><th>Hora Final</th><th>Precio</th><th>Creditos</th><th>Eliminar</th></tr>');

    for(var i=0;i<fechas.length;i++){
        fila = '<tr id="renglon_Creditos'+contador+'"><td>'+fechas[i]['FechaInicial']+'</td><td>'+fechas[i]['FechaFinal']+'</td><td>'+fechas[i]['Precio']+'</td><td>'+fechas[i]['Creditos']+'</td><td id="'+contador+'"><a id="'+fechas[i]['idFechaCreditosCortesia']+'" class="editar_Fecha_Creditos"><i class="fa fa-paint-brush btn btn-outline-warning" aria-hidden="true"></i></a></td></tr>';
        fechaCredito.push({'idFechaCreditosCortesia':fechas[i]['idFechaCreditosCortesia'],'FechaInicial':fechas[i]['FechaInicial'],'FechaFinal':fechas[i]['FechaFinal'],'Precio':fechas[i]['Precio'],'Creditos':fechas[i]['Creditos']});
        contador++;
        $("#tabla_Editar_Fechas_Creditos tr:first").after(fila);
    }

    $("#nombre_Editado_Creditos").val(datos['Nombre']);

    cerrarCarga();
});

$(document).on('click','.editar_Fecha_Descuento',function(){
    var id = $(this).parents('td').attr('id');
    var idFechaDosxUno = $(this).attr('id');

    $("#td_Descuento").val(id);
    $("#renglon_Descuento").val($(this).parents('tr').attr('id'));
    $("#idFechaDosxUno").val(idFechaDosxUno);

    $("#editar_Inicio_Descuento").val(fechaDescuento[id]['FechaInicial'].replace(' ','T'));
    $("#editar_Final_Descuento").val(fechaDescuento[id]['FechaFinal'].replace(' ','T'));

});

$(document).on('click','.editar_Fecha_Pulsera', function(){
    var id=$(this).parents('td').attr('id');
    var idFechaPulseraMagica = $(this).attr('id');

    $("#td_Pulsera").val(id);
    $("#renglon_Pulsera").val($(this).parents('tr').attr('id'));
    $("#idFechaPulseraMagica").val(idFechaPulseraMagica);


    $("#editar_Inicio_Pulsera").val(fechaPulsera[id]['FechaInicial'].replace(' ','T'));
    $("#editar_Final_Pulsera").val(fechaPulsera[id]['FechaFinal'].replace(' ', 'T'));

    $("#editar_Precio_Pulsera").val(fechaPulsera[id]['Precio']);
});

$(document).on('click','.editar_Fecha_Juego',function(){
    var id = $(this).parents('td').attr('id');
    var idFechaJuegosGratis = $(this).attr('id');

    $("#td_Juego").val(id);
    $("#renglon_Juego").val($(this).parents('tr').attr('id'));
    $("#idFechaJuegosGratis").val(idFechaJuegosGratis);

    $("#editar_Inicio_Juego").val(fechaJuego[id]['FechaInicial'].replace(' ', 'T'));
    $("#editar_Final_Juego").val(fechaJuego[id]['FechaFinal'].replace(' ','T'));
});

$(document).on('click','.editar_Fecha_Creditos', function(){
    var id =$(this).parents('td').attr('id');
    var idFechaCreditosCortesia= $(this).attr('id');

    $("#td_Credito").val(id);
    $("#renglon_Credito").val($(this).parents('tr').attr('id'));
    $("#idFechaCreditosCortesia").val(idFechaCreditosCortesia);

    $("#editar_Inicio_Credito").val(fechaCredito[id]['FechaInicial'].replace(' ', 'T'));
    $("#editar_Final_Credito").val(fechaCredito[id]['FechaFinal'].replace(' ', 'T'));
    $("#editar_Precio_Credito").val(fechaCredito[id]['Precio']);
    $("#editar_Creditos").val(fechaCredito[id]['Creditos']);
});

/**-------------------Tercer nivel */

$("#editar_Horario_Descuento").on('click',function(){
    var td = $("#td_Descuento").val();
    var id= $("#renglon_Descuento").val();
    var inicio = $("#editar_Inicio_Descuento").val() + ":00";
    var final = $("#editar_Final_Descuento").val() + ":00";
    var idFechaDosxUno = $("#idFechaDosxUno").val();

    $("#td_Descuento").val('');
    $("#renglon_Descuento").val('');
    $("#editar_Inicio_Descuento").val('');
    $("#editar_Final_Descuento").val('');
    $("#idFechaDosxUno").val('');

    $('#'+id).html('<td>'+inicio+'</td><td>'+final+'</td><td id="'+td+'"><a id="'+idFechaDosxUno+'" class="editar_Fecha_Descuento"><i class="fa fa-paint-brush btn btn-outline-warning" aria-hidden="true"></i></a></td>');
    fecha_Editada_Descuento.push({'idFechaDosxUno':idFechaDosxUno,'FechaInicial':inicio,'FechaFinal':final});
    
    //fechaDescuento.splice(id,1,{'idFechaDosxUno':idFechaDosxUno,'FechaInicial':inicio,'FechaFinal':final});
});

$("#editar_Horario_Pulsera").on('click',function(){
    var id=$("#renglon_Pulsera").val();
    var td_Pulsera = $("#td_Pulsera").val();
    var inicio =$("#editar_Inicio_Pulsera").val() + ":00";
    var final = $("#editar_Final_Pulsera").val() + ":00";
    var precio = $("#editar_Precio_Pulsera").val();
    var idFechaPulseraMagica = $("#idFechaPulseraMagica").val();

    $("#td_Pulsera").val('');
    $("#renglon_Pulsera").val('');
    $("#editar_Inicio_Pulsera").val('');
    $("#editar_Final_Pulsera").val('');
    $("#editar_Precio_Pulsera").val('');
    $("#idFechaPulseraMagica").val('');

    $('#'+id).html('<td>'+inicio+'</td><td>'+final+'</td><td>'+precio+'</td><td id="'+td_Pulsera+'"><a id="'+idFechaPulseraMagica+'" class="editar_Fecha_Pulsera"><i class="fa fa-paint-brush btn btn-outline-warning" aria-hidden="true"></i></a></td>');
    fecha_Editada_Pulsera.push({'idFechaPulseraMagica':idFechaPulseraMagica,'FechaInicial':inicio,'FechaFinal':final,'Precio':precio});
    //console.log('Datos nuevos: ' + JSON.stringify(fecha_Editada_Pulsera));
});

$("#editar_Horario_Juego").on('click',function(){
    var td = $("#td_Juego").val();
    var id= $("#renglon_Juego").val();
    var inicio = $("#editar_Inicio_Juego").val() + ":00";
    var final = $("#editar_Final_Juego").val() + ":00";
    var idFechaJuegosGratis = $("#idFechaJuegosGratis").val();

    $("#td_Juego").val('');
    $("#renglon_Juego").val('');
    $("#editar_Inicio_Juego").val('');
    $("#editar_Final_Juego").val('');
    $("#idFechaJuegosGratis").val('');

    $('#'+id).html('<td>'+inicio+'</td><td>'+final+'</td><td id="'+td+'"><a id="'+idFechaJuegosGratis+'" class="editar_Fecha_Juego"><i class="fa fa-paint-brush btn btn-outline-warning" aria-hidden="true"></i></a></td>');

    fecha_Editada_Juego.push({'idFechaJuegosGratis':idFechaJuegosGratis,'FechaInicial':inicio,'FechaFinal':final});
});

$("#editar_Horario_Credito").on('click',function(){
    var td = $("#td_Credito").val();
    var id= $("#renglon_Credito").val();
    var inicio = $("#editar_Inicio_Credito").val() + ":00";
    var final = $("#editar_Final_Credito").val() + ":00";
    var precio = $("#editar_Precio_Credito").val();
    var credito =$("#editar_Creditos").val()
    var idFechaCreditosCortesia = $("#idFechaCreditosCortesia").val();

    $("#td_Credito").val('');
    $("#renglon_Credito").val('');
    $("#editar_Inicio_Credito").val('');
    $("#editar_Final_Credito").val('');
    $("#editar_Precio_Credito").val('');
    $("#editar_Creditos").val('')
    $("#idFechaCreditosCortesia").val('');

    $('#'+id).html('<td>'+inicio+'</td><td>'+final+'</td><td>'+precio+'</td><td>'+credito+'</td><td id="'+td+'"><a id="'+idFechaCreditosCortesia+'" class="editar_Fecha_Creditos"><i class="fa fa-paint-brush btn btn-outline-warning" aria-hidden="true"></i></a></td>');

    fecha_Editada_Credito.push({'idFechaCreditosCortesia':idFechaCreditosCortesia,'FechaInicial':inicio,'FechaFinal':final,'Precio':precio,'Creditos':credito});

    //console.log('Datos: ' + JSON.stringify(fecha_Editada_Credito));
});

$(document).on('click','.actualizar_Fechas_Promocion', function(){
    iniciarCarga();

    if(!fecha_Editada_Descuento.length){
        fecha_Editada_Descuento = 0;
    }
    if(!fecha_Editada_Pulsera.length){
        fecha_Editada_Pulsera = 0;
    }
    if(!fecha_Editada_Juego.length){
        fecha_Editada_Juego = 0;
    }
    if(!fecha_Editada_Credito.length){
        fecha_Editada_Credito = 0;
    }

    console.log('pulsera ' + JSON.stringify(fecha_Editada_Pulsera));

    $.ajax({
        type:"POST",
        url: 'Eventos/Editar_Promocion_Evento',
        data: {'descuento':fecha_Editada_Descuento,'pulsera':fecha_Editada_Pulsera,'juego':fecha_Editada_Juego,'credito':fecha_Editada_Credito},
        dataType:'JSON',
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            cerrarCarga();
        },
    }).done(function(data){
        if(data.respuesta){
            cerrarCarga();
            location.reload();
        }
    });
});