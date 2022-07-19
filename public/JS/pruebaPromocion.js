
function mostrar_Promociones_Evento(idEvento){
    div = document.getElementById('contenedor_Promociones_Evento');
    div.style.display = '';

    prin = document.getElementById('contenedor_Eventos');
    prin.style.display = 'none';

    mostrar_Promociones(idEvento);
}

function cerrar_Promociones_Evento(){
    div = document.getElementById('contenedor_Eventos');
    div.style.display = '';

    prin = document.getElementById('contenedor_Promociones_Evento');
    prin.style.display = 'none';
}


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

var option_Descuentos_Html ='';
var option_Pulsera_Html  ='';
var option_Cortesias_Html = '';

//Nuevas variables necesarias para los registros multiples, se necesitaran agregar a l mentodo de .mostrar_Promociones_Evento para que se formaten cada ves que se abre
var contadorNuevoDescuento = 0;
var contadorNuevaPulsera = 0;
var contadorNuevaCortesia = 0;

/****************************************** Primer nivel, para agregar una promoción a un evento ***********************************************************/

//Checar aqui truena
//Muestra la interfaz principal de descuentos en evento
function mostrar_Promociones(a){

    iniciarCarga();

    idEvento = a;

    var contenido_Descuentos_Html = '';
    var contenido_Pulsera_Html = '';
    var contenido_Juegos_Html = '';
    var contenido_Cortesias_Html = '';

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

    $("#cantidadPersonas0").val('');
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
    
    option_Descuentos_Html ='';
    option_Pulsera_Html = '';
    var option_Juegos_Html = '';
    option_Cortesias_Html = '';

    contadorNuevoDescuento = 0;
    contadorNuevaPulsera = 0;
    contadorNuevaCortesia = 0;

    option_Descuentos_Html ='<option value="">Seleccione una promoción</option>';
    option_Pulsera_Html = '<option value="">Seleccione una promoción</option>';
    option_Juegos_Html = '<option value="">Seleccione una promoción</option>';
    option_Cortesias_Html = '<option value="">Seleccione una promoción</option>';

    //idEvento =$(this).data('book-id');
    $("#idEventoPromociones").val(idEvento);

    
    $.ajax({
        type:"POST",
        url:'Eventos/Mostrar_Promociones',
        data:{'idEvento': idEvento} ,
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

            /*
            nombre_Descuentos_Html = '<label for="promocionesDescuentos">Nombre de la promocion</label>'+
            '<select id="descuentos0" class="form-control promocionesDescuentos">'+option_Descuentos_Html+'</select>'+
            '<br>';
            */

            /*
            nombre_Pulsera_Html = '<label for="promocionesPulsera">Nombre de la promocion</label>'+
            '<select name="pulsera0" id="pulsera0" class="form-control promocionesPulsera">'+option_Pulsera_Html+'</select>'+
            '<br>';
            */

            /*
            nombre_Juegos_Html = '<label for="promocionesPulsera">Nombre de la promocion</label>'+
            '<select id="juegos0" class="form-control promocionesJuegos">'+option_Juegos_Html+'</select>' +
            '<br>';
            */
            
            /*
            nombre_Cortesias_Html = '<label for="promocionesPulsera">Nombre de la promocion</label>'+
            '<select id="cortesias0" class="form-control promocionesCortesias">'+option_Cortesias_Html+'</select>'+
            '<br>';
            */


            contenido_Descuentos_Html = 
            '<tr id="contenedor_Descuento_Nuevo_'+contadorNuevoDescuento+'" border=2>'+
                '<td>'+
                    '<div>'+
                        '<center><label><h4>Nuevo Descuento</h4></label></center>'+
                    '</div>'+
                    '<div class="from-group" id="nombre_Descuentos_'+contadorNuevoDescuento+'">'+
                        '<label for="promocionesDescuentos">Nombre de la promocion</label>'+
                        '<select id="descuentos'+contadorNuevoDescuento+'" class="form-control promocionesDescuentos">'+option_Descuentos_Html+'</select>'+
                        '<br>'+
                    '</div>'+
                    '<div class="from-group" id="precio_Descuentos_'+contadorNuevoDescuento+'">'+
                        '<label for="cantidad">Cantidad de personas por pase</label>'+
                        '<input type="number" class="form-control" name="cantidadPersonas'+contadorNuevoDescuento+'" id="cantidadPersonas'+contadorNuevoDescuento+'" placeholder="Personas por pase" value="">'+
                        '<br>'+
                        '<label for="cantidad_Boletos">Cantidad de pases a cobrar</label>'+
                        '<input type="number" class="form-control" name="cantidad_Boletos'+contadorNuevoDescuento+'" id="cantidad_Boletos'+contadorNuevoDescuento+'" placeholder="Boletos a cobrar" value="">'+
                        '<br>'+
                    '</div>'+
                    '<div class="from-group table table-responsive">'+
                        '<table class="table table-border">'+
                            '<tbody>'+
                                '<tr>'+
                                    '<td>'+
                                        '<div class="container" id="fechas_Descuentos_'+contadorNuevoDescuento+'">'+
                                            '<center><label>Días</label></center>'+
                                            '<br>'+
                                            '<label for="inicioDescuento'+contadorNuevoDescuento+'">Hora de Inicio</label>'+
                                            '<input id="inicioDescuento'+contadorNuevoDescuento+'" class="form-control" type="datetime-local">'+
                                            '<br>'+
                                            '<label for="finDescuento'+contadorNuevoDescuento+'">Hora de Finalizacion</label>'+
                                            '<input id="finDescuento'+contadorNuevoDescuento+'" class="form-control" type="datetime-local">'+
                                            '<br>'+
                                            '<button class="btn btn-success adicionarDescuento" type="button">Agregar</button></center><br>'+
                                        '</div>'+
                                    '</td>'+
                                    '<td>'+
                                        '<div class="table-wrapper">'+
                                            '<table id="tabla_Fechas_Desuentos_'+contadorNuevoDescuento+'" class="table table-border table-hover">'+
                                                '<thead>'+
                                                    '<th style="text-align: center; vertical-align: middle;">Fecha</th>'+
                                                    '<th style="text-align: center; vertical-align: middle;">Hora Inicial</th>'+
                                                    '<th style="text-align: center; vertical-align: middle;">Hora Final</th>'+
                                                    '<th style="text-align: center; vertical-align: middle;">Eliminar</th>'+
                                                '</thead>'+
                                                '<tbody id="cuerpo_Fechas_Descuentos_'+contadorNuevoDescuento+'"></tbody>'+
                                            '</table>'+
                                        '</div>'+
                                        '<br>'+
                                        '<div class="container" id="modificar_Hora_Descuento_'+contadorNuevoDescuento+'">'+
                                        '</div>'+
                                    '</td>'+
                                '</tr>'+
                            '</tbody>'+
                        '</table>'+
                    '</div>'+
                '</td>'+
            '</tr>';

            contenido_Pulsera_Html =
            '<tr id="contenedor_Pulsera_Nueva_0" border=2>'+
                '<td>'+
                    '<div>'+
                        '<center><label><h4>Nueva Pulsera Magica</h4></label></center>'+
                    '</div>'+
                    '<div class="from-group" id="nombre_Pulsera_0">'+
                        '<label for="promocionesPulsera0">Nombre de la promocion</label>'+
                        '<select name="pulsera0" id="pulsera0" class="form-control promocionesPulsera">'+option_Pulsera_Html+'</select>'+
                        '<br>'+
                    '</div>'+
                    '<div class="from-group" id="precio_Pulseras_0">'+
                        '<label for="precio_Pulsera">Precio de la Promoción</label>'+
                        '<input type="number" class="form-control" name="precio_Pulsera_0" id="precio_Pulsera_0" placeholder="Precio Promoción" value="">'+
                        '<br>'+
                    '</div>'+
                    '<div class="from-group" id="creditos_Pulsera_0">'+
                    '</div>'+
                    '<div class="from-group table table-responsive">'+
                        '<table class="table table-border">'+
                            '<tbody>'+
                                '<tr>'+
                                    '<td>'+
                                        '<div class="container" id="fechas_Pulsera_0">'+
                                            '<center><label>Días</label>'+
                                            '<br>'+
                                            '<label for="inicioPulsera0">Hora de Inicio</label>'+
                                            '<input id="inicioPulsera0" class="form-control" type="datetime-local">'+
                                            '<br>'+
                                            '<label for="finPulsera0">Hora de Finalizacion</label>'+
                                            '<input id="finPulsera0" class="form-control" type="datetime-local">'+
                                            '<br>'+
                                            '<label for="precioPulsera0">Precio</label>'+
                                            '<input id="precioPulsera0" class="form-control" type="number" placeholder="Ingresa un precio">'+
                                            '<br>'+
                                            '<button  class="btn btn-success adicionarPulsera" type="button">Agregar</button></center><br>'+
                                        '</div>'+
                                    '</td>'+
                                    '<td>'+
                                        '<div class="table-wrapper">'+
                                            '<table id="tabla_Fechas_Pulsera_0" class="table table-border table-hover">'+
                                                '<thead>'+
                                                    '<th style="text-align: center; vertical-align: middle;">Fecha</th>'+
                                                    '<th style="text-align: center; vertical-align: middle;">Hora Inicial</th>'+
                                                    '<th style="text-align: center; vertical-align: middle;">Hora Final</th>'+
                                                    '<th style="text-align: center; vertical-align: middle;">Precio</th>'+
                                                    '<th style="text-align: center; vertical-align: middle;">Eliminar</th>'+
                                                '</thead>'+
                                                '<tbody id="cuerpo_Fechas_Pulsera_0">'+
                                                '</tbody>'+
                                            '</table>'+
                                        '</div>'+
                                        '<br>'+
                                        '<div class="container" id="modificar_Hora_Pulsera_0">'+
                                        '</div>'+
                                    '</td>'+
                                '</tr>'+
                            '</tbody>'+
                        '</table>'+
                    '</div>'+
                    '<button id="boton_Eliminar_Pulsera0" style="float: right;" class="btn btn-danger remover_Registro_Pulsera">Eliminar Registro</button>'+
                '</td>'+
            '</tr>';

            contenido_Juegos_Html =
            '<tr id="contenedor_Juego_Nuevo_0" border=2>'+
                '<td>'+
                    '<div class="from-group" id="nombre_Juegos_0">'+
                        '<label for="promocionesPulsera">Nombre de la promocion</label>'+
                        '<select id="juegos0" class="form-control promocionesJuegos">'+option_Juegos_Html+'</select>' +
                        '<br>'+
                    '</div>'+
                    '<div class="from-group" id="precio_Juegos_0">'+
                    '</div>'+
                    '<div class="from-group" id="creditos_Juegos_0">'+
                    '</div>'+
                    '<div class="from-group table table-responsive">'+
                        '<table class="table table-border">'+
                            '<tbody>'+
                                '<tr>'+
                                    '<td>'+
                                        '<div class="container" id="fechas_Juegos_0">'+
                                            '<center><label>Días</label>'+
                                            '<br>'+
                                            '<label for="inicioJuegos0">Hora de Inicio</label>'+
                                            '<input id="inicioJuegos0" class="form-control" type="datetime-local">'+
                                            '<br>'+
                                            '<label for="finJuegos0">Hora de Finalizacion</label>'+
                                            '<input id="finJuegos0" class="form-control" type="datetime-local">'+
                                            '<br>'+
                                            '<button class="btn btn-success adicionarJuegos" type="button">Agregar</button></center><br>'+
                                        '</div>'+
                                    '</td>'+
                                    '<td>'+
                                        '<div class="table-wrapper">'+
                                            '<table id="tabla_Fechas_Juegos_0" class="table table-border table-hover">'+
                                                '<thead>'+
                                                    '<th style="text-align: center; vertical-align: middle;">Fecha</th>'+
                                                    '<th style="text-align: center; vertical-align: middle;">Hora Inicial</th>'+
                                                    '<th style="text-align: center; vertical-align: middle;">Hora Final</th>'+
                                                    '<th style="text-align: center; vertical-align: middle;">Eliminar</th>'+
                                                '</thead>'+
                                                '<tbody id="cuerpo_Fechas_Juegos_0"></tbody>'+
                                            '</table>'+
                                        '</div>'+
                                        '<br>'+
                                        '<div class="container" id="modificar_Hora_Juegos_0"></div>'+
                                    '</td>'+
                                '</tr>'+
                            '</tbody>'+
                        '</table>'+
                    '</div>'+
                '</td>'+
            '</tr>';

            contenido_Cortesias_Html =
            '<tr id="contenedor_Creditos_Cortesia_0" border=2>'+
                '<td>'+
                    '<div>'+
                        '<center><label><h4>Nuevos Creditos de Cortesia</h4></label></center>'+
                    '</div>'+
                    '<div class="from-group" id="nombre_Cortesias_0">'+
                        '<label for="promocionesPulsera0">Nombre de la promocion</label>'+
                        '<select id="cortesias0" class="form-control promocionesCortesias">'+option_Cortesias_Html+'</select>'+
                        '<br>'+
                    '</div>'+
                    '<div class="from-group" id="precio_Cortesia_0">'+
                        '<label for="precio_Cortesias_0">Precio de la Promoción</label>'+
                        '<input type="number" class="form-control" name="precio_Cortesias_0" id="precio_Cortesias_0" placeholder="Precio Promoción" value="">'+
                        '<br>'+
                    '</div>'+
                    '<div class="from-group" id="creditos_Cortesia_0">'+
                        '<label for="creditos_Cortesias_0">Creditos de la promoción</label>'+
                        '<input type="number" class="form-control" name="creditos_Cortesias_0" id="creditos_Cortesias_0" placeholder="Creditos Promoción">'+
                        '<br>'+
                    '</div>'+
                    '<div class="from-group table table-responsive">'+
                        '<table class="table table-border">'+
                            '<tbody>'+
                                '<tr>'+
                                    '<td>'+
                                        '<div class="container" id="fechas_Cortesias_0">'+
                                            '<center><label>Días</label>'+
                                            '<br>'+
                                            '<label for="inicioCortesias0">Hora de Inicio</label>'+
                                            '<input id="inicioCortesias0" class="form-control" type="datetime-local">'+
                                            '<br>'+
                                            '<label for="finCortesias0">Hora de Finalizacion</label>'+
                                            '<input id="finCortesias0" class="form-control" type="datetime-local">'+
                                            '<br>'+
                                            '<label for="precioCortesias0">Precio</label>'+
                                            '<input id="precioCortesias0" class="form-control" type="number" placeholder="Ingresa un precio">'+
                                            '<br>'+
                                            '<label for="creditosI0">Creditos</label>'+
                                            '<input id="creditosI0" name="creditosI0" class="form-control" type="number" placeholder="Creditos cortesia">'+
                                            '<br>'+
                                            '<button class="btn btn-success adicionarCreditos" type="button">Agregar</button></center><br>'+
                                        '</div>'+
                                    '</td>'+
                                    '<td>'+
                                        '<div class="table-wrapper">'+
                                            '<table id="tabla_Fechas_Cortesias_0" class="table table-border table-hover">'+
                                                '<thead>'+
                                                    '<th style="text-align: center; vertical-align: middle;">Fecha</th>'+
                                                    '<th style="text-align: center; vertical-align: middle;">Hora Inicial</th>'+
                                                    '<th style="text-align: center; vertical-align: middle;">Hora Final</th>'+
                                                    '<th style="text-align: center; vertical-align: middle;">Precio</th>'+
                                                    '<th style="text-align: center; vertical-align: middle;">Creditos</th>'+
                                                    '<th style="text-align: center; vertical-align: middle;">Eliminar</th>'+
                                                '</thead>'+
                                                '<tbody id="cuerpo_Promocion_Cortesias_0"></tbody>'+
                                            '</table>'+
                                        '</div>'+
                                        '<br>'+
                                        '<div class="container" id="modificar_Hora_Cortesias_0"></div>'+
                                    '</td>'+
                                '</tr>'+
                            '</tbody>'+
                        '</table>'+
                    '</div>'+
                    '<button type="button" style="float: right;" class="btn btn-danger remover_Registro_Cortesia">Eliminar Registro</button>'+
                '</td>'+
            '</tr>';
            

            $("#tabla_Descuentos_Evento").html(tabla_Descuentos_Html);
            $("#tabla_Pulsera_Evento").html(tabla_Pulsera_Html);
            $("#tabla_Juegos_Evento").html(tabla_Juegos_Html);
            $("#tabla_Creditos_Evento").html(tabla_Creditos_Html);
           // $("#nombre_Descuentos_0").html(nombre_Descuentos_Html);
            //$("#nombre_Pulsera_0").html(nombre_Pulsera_Html);
            //$("#nombre_Juegos_0").html(nombre_Juegos_Html);
           // $("#nombre_Cortesias_0").html(nombre_Cortesias_Html);


            $("#contenedor_Nuevos_Descuentos").html(contenido_Descuentos_Html);
            $("#contenedor_Nuevas_Pulseras").html(contenido_Pulsera_Html);
            $("#contenedor_Nuevo_Juego").html(contenido_Juegos_Html);
            $("#contenedor_Creditos_Cortesia").html(contenido_Cortesias_Html);
            cerrarCarga();
        }
    });
}


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
    
    option_Descuentos_Html ='';
    option_Pulsera_Html = '';
    var option_Juegos_Html = '';
    option_Cortesias_Html = '';

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
            '<select id="descuentos0" class="form-control promocionesDescuentos">'+option_Descuentos_Html+'</select>'+
            '<br>';

            nombre_Pulsera_Html = '<label for="promocionesPulsera">Nombre de la promocion</label>'+
            '<select name="pulsera0" id="pulsera0" class="form-control promocionesPulsera">'+option_Pulsera_Html+'</select>'+
            '<br>';

            nombre_Juegos_Html = '<label for="promocionesPulsera">Nombre de la promocion</label>'+
            '<select id="juegos0" class="form-control promocionesJuegos">'+option_Juegos_Html+'</select>' +
            '<br>';
            
            nombre_Cortesias_Html = '<label for="promocionesPulsera">Nombre de la promocion</label>'+
            '<select id="cortesias0" class="form-control promocionesCortesias">'+option_Cortesias_Html+'</select>'+
            '<br>';

            $("#tabla_Descuentos_Evento").html(tabla_Descuentos_Html);
            $("#tabla_Pulsera_Evento").html(tabla_Pulsera_Html);
            $("#tabla_Juegos_Evento").html(tabla_Juegos_Html);
            $("#tabla_Creditos_Evento").html(tabla_Creditos_Html);
            $("#nombre_Descuentos_0").html(nombre_Descuentos_Html);
            $("#nombre_Pulsera_0").html(nombre_Pulsera_Html);
            $("#nombre_Juegos_0").html(nombre_Juegos_Html);
            $("#nombre_Cortesias_0").html(nombre_Cortesias_Html);
            cerrarCarga();
        }
    });
});

//Se encarga de seleccionar la promocion del usuario y mostrar la informacion de esa promocion
$(document).on('change','.promocionesDescuentos', function(event){
    iniciarCarga();

    //Limpia el registro de cambio 
    var id= $(this).parents('tr').attr('id').split('_')[3];

    $('#cantidadPersonas'+id).val('');
    $('#cantidad_Boletos'+id).val('');

    $("#inicioDescuento"+id).val('');
    $("#finDescuento"+id).val('');
    $("#cuerpo_Fechas_Descuentos_"+id).html('');
    $("#modificar_Hora_Descuento_"+id).html('');

    var longitud = fechas_Descuentos.length;


    var indiceRenglon;

    for(var i=0; i<longitud;i++){

        indiceRenglon = fechas_Descuentos.findIndex((objeto)=>objeto.descuento == id);

        if(indiceRenglon != -1){

            fechas_Descuentos.splice(indiceRenglon,1);
        }
    }


    var idDosxUno;

    //Almacena el numero del nuevo registro al cual seran enviados los datos

    idDosxUno = $(this).val();

    if(idDosxUno){
        const indice_Descuento = precio_Descuentos.findIndex((objeto)=>objeto.idDosxUno == idDosxUno);

       $('#cantidadPersonas'+id).val((precio_Descuentos[indice_Descuento]['Cantidad']));
       $('#cantidad_Boletos'+id).val((precio_Descuentos[indice_Descuento]['Boletos']));
    }
    
    cerrarCarga();

});

$(document).on('change','.promocionesPulsera', function(event){
    iniciarCarga();

    var idPulseraMagica;
    
    var id = $(this).parents('tr').attr('id').split('_')[3];

    $('#precio_Pulsera_'+id).val('');

    $("#inicioPulsera"+id).val('');
    $("#finPulsera"+id).val('');
    $("#precioPulsera"+id).val('');

    $("#cuerpo_Fechas_Pulsera_" + id).html('');
    $("#modificar_Hora_Pulsera_" + id).html('');

    var longitud = fechas_Pulsera.length;

    var indiceRenglon;

    for(var i=0; i<longitud;i++){
        indiceRenglon = fechas_Pulsera.findIndex((objeto)=>objeto.pulsera == id);

        if(indiceRenglon != -1){
            fechas_Pulsera.splice(indiceRenglon,1);
        }
    }

    idPulseraMagica = $(this).val();

    if(idPulseraMagica){
        const indice_Pulsera = precio_Pulsera.findIndex((objeto)=>objeto.idPulseraMagica == idPulseraMagica);

        $("#precio_Pulsera_"+id).val(precio_Pulsera[indice_Pulsera]['Precio']);
    }

    cerrarCarga();
});

$(document).on('change','.promocionesJuegos', function(event){
    iniciarCarga();

    var id = $(this).parents('tr').attr('id').split('_')[3];

    $("#inicioJuegos"+id).val('');
    $("#finJuegos"+id).val('');

    $("#cuerpo_Fechas_Juegos_"+id).html('');
    $("#modificar_Hora_Juegos_"+id).html('');

    var longitud  = fechas_Juegos.length;
    var indiceRenglon;

    for(var i=0;i<longitud;i++){
        indiceRenglon = fechas_Juegos.findIndex((objeto)=>objeto.juego);

        if(indiceRenglon != -1){
            fechas_Juegos.splice(indiceRenglon,1);
        }
    }

    var idJuegosGratis = $(this).val();

    cerrarCarga();
});

$(document).on('change', '.promocionesCortesias', function(event){
    iniciarCarga();

    var id = $(this).parents('tr').attr('id').split('_')[3];

    $("#precio_Cortesias_"+id).val('');
    $("#creditos_Cortesias_"+id).val('');
    $("#inicioCortesias"+id).val('');
    $("#finCortesias"+id).val('');
    $("#precioCortesias"+id).val('');
    $("#CreditosI"+id).val('');
    
    $("#cuerpo_Promocion_Cortesias_"+id).html('');
    $("#modificar_Hora_Cortesias_"+id).html('');
    
    var longitud = fechas_Cortesias.length;

    var indiceRenglon;

    for(var i=0; i<longitud; i++){
        indiceRenglon = fechas_Cortesias.findIndex((objeto)=>objeto.cortesia == id);

        if(indiceRenglon != -1){
            fechas_Cortesias.splice(indiceRenglon, 1);
        }
    }

    var idCC = $(this).val();

    if(idCC){
        const indice_Cortesias = precio_Cortesias.findIndex((objeto)=>objeto.idCC == idCC);

        $("#precio_Cortesias_"+id).val(precio_Cortesias[indice_Cortesias]['Precio']);
        $("#creditos_Cortesias_"+id).val(precio_Cortesias[indice_Cortesias]['Creditos']);
    }
    cerrarCarga();
});

//Se encarga de generar un nuevo registro de la promocion en la interfaz
$("#nuevo_Registro_Promocion_Descuento").click(function(){
    contadorNuevoDescuento++;
    $(
        '<tr id="contenedor_Descuento_Nuevo_'+contadorNuevoDescuento+'" style="height:1px;" border="2" frame="above" rules="none" width="95%" cellspacing="0">'+
            '<td>'+
                '<div>'+
                    '<center><label><h4>Nuevo Descuento</h4></label></center>'+
                '</div>'+
                '<div class="from-group" id="nombre_Descuentos_'+contadorNuevoDescuento+'">'+
                    '<label for="promocionesDescuentos">Nombre de la promocion</label>'+
                    '<select id="descuentos'+contadorNuevoDescuento+'" class="form-control promocionesDescuentos">'+option_Descuentos_Html+'</select>'+
                    '<br>'+
                '</div>'+
                '<div class="from-group" id="precio_Descuentos_'+contadorNuevoDescuento+'">'+
                    '<label for="cantidad">Cantidad de personas por pase</label>'+
                    '<input type="number" class="form-control" name="cantidadPersonas'+contadorNuevoDescuento+'" id="cantidadPersonas'+contadorNuevoDescuento+'" placeholder="Personas por pase" value="">'+
                    '<br>'+
                    '<label for="cantidad_Boletos">Cantidad de pases a cobrar</label>'+
                    '<input type="number" class="form-control" name="cantidad_Boletos'+contadorNuevoDescuento+'" id="cantidad_Boletos'+contadorNuevoDescuento+'" placeholder="Boletos a cobrar" value="">'+
                    '<br>'+
                '</div>'+
                '<div class="from-group table table-responsive">'+
                    '<table class="table table-border">'+
                        '<tbody>'+
                            '<tr>'+
                                '<td>'+
                                    '<div class="container" id="fechas_Descuentos_'+contadorNuevoDescuento+'">'+
                                        '<center><label>Días</label></center>'+
                                        '<br>'+
                                        '<label for="inicioDescuento'+contadorNuevoDescuento+'">Hora de Inicio</label>'+
                                        '<input id="inicioDescuento'+contadorNuevoDescuento+'" class="form-control" type="datetime-local">'+
                                        '<br>'+
                                        '<label for="finDescuento'+contadorNuevoDescuento+'">Hora de Finalizacion</label>'+
                                        '<input id="finDescuento'+contadorNuevoDescuento+'" class="form-control" type="datetime-local">'+
                                        '<br>'+
                                        '<button class="btn btn-success adicionarDescuento" type="button">Agregar</button></center><br>'+
                                    '</div>'+
                                '</td>'+
                                '<td>'+
                                    '<div class="table-wrapper">'+
                                        '<table id="tabla_Fechas_Desuentos_'+contadorNuevoDescuento+'" class="table table-border table-hover">'+
                                            '<thead>'+
                                                '<th style="text-align: center; vertical-align: middle;">Fecha</th>'+
                                                '<th style="text-align: center; vertical-align: middle;">Hora Inicial</th>'+
                                                '<th style="text-align: center; vertical-align: middle;">Hora Final</th>'+
                                                '<th style="text-align: center; vertical-align: middle;">Eliminar</th>'+
                                            '</thead>'+
                                            '<tbody id="cuerpo_Fechas_Descuentos_'+contadorNuevoDescuento+'"></tbody>'+
                                        '</table>'+
                                    '</div>'+
                                    '<br>'+
                                    '<div class="container" id="modificar_Hora_Descuento_'+contadorNuevoDescuento+'">'+
                                    '</div>'+
                                '</td>'+
                            '</tr>'+
                        '</tbody>'+
                    '</table>'+
                '</div>'+
                '<button type="button" style="float: right;" class="btn btn-danger remover_Registro_Descuento">Eliminar Registro</button>'+
            '</td>'+
        '</tr>'
    ).clone().appendTo("#contenedor_Nuevos_Descuentos");
});

$("#nuevo_Registro_Promocion_Pulsera").click(function(){
    contadorNuevaPulsera++;

    $(
        '<tr id="contenedor_Pulsera_Nueva_'+contadorNuevaPulsera+'" border=2>'+
            '<td>'+
                '<div>'+
                    '<center><label><h4>Nueva Pulsera Magica</h4></label></center>'+
                '</div>'+
                '<div class="from-group" id="nombre_Pulsera_'+contadorNuevaPulsera+'">'+
                    '<label for="promocionesPulsera'+contadorNuevaPulsera+'">Nombre de la promocion</label>'+
                    '<select name="pulsera'+contadorNuevaPulsera+'" id="pulsera'+contadorNuevaPulsera+'" class="form-control promocionesPulsera">'+option_Pulsera_Html+'</select>'+
                    '<br>'+
                '</div>'+
                '<div class="from-group" id="precio_Pulseras_'+contadorNuevaPulsera+'">'+
                    '<label for="precio_Pulsera">Precio de la Promoción</label>'+
                    '<input type="number" class="form-control" name="precio_Pulsera_'+contadorNuevaPulsera+'" id="precio_Pulsera_'+contadorNuevaPulsera+'" placeholder="Precio Promoción" value="">'+
                    '<br>'+
                '</div>'+
                '<div class="from-group" id="creditos_Pulsera_'+contadorNuevaPulsera+'">'+
                '</div>'+
                '<div class="from-group table table-responsive">'+
                    '<table class="table table-border">'+
                        '<tbody>'+
                            '<tr>'+
                                '<td>'+
                                    '<div class="container" id="fechas_Pulsera_'+contadorNuevaPulsera+'">'+
                                        '<center><label>Días</label>'+
                                        '<br>'+
                                        '<label for="inicioPulsera'+contadorNuevaPulsera+'">Hora de Inicio</label>'+
                                        '<input id="inicioPulsera'+contadorNuevaPulsera+'" class="form-control" type="datetime-local">'+
                                        '<br>'+
                                        '<label for="finPulsera'+contadorNuevaPulsera+'">Hora de Finalizacion</label>'+
                                        '<input id="finPulsera'+contadorNuevaPulsera+'" class="form-control" type="datetime-local">'+
                                        '<br>'+
                                        '<label for="precioPulsera'+contadorNuevaPulsera+'">Precio</label>'+
                                        '<input id="precioPulsera'+contadorNuevaPulsera+'" class="form-control" type="number" placeholder="Ingresa un precio">'+
                                        '<br>'+
                                        '<button  class="btn btn-success adicionarPulsera" type="button">Agregar</button></center><br>'+
                                    '</div>'+
                                '</td>'+
                                '<td>'+
                                    '<div class="table-wrapper">'+
                                        '<table id="tabla_Fechas_Pulsera_'+contadorNuevaPulsera+'" class="table table-border table-hover">'+
                                            '<thead>'+
                                                '<th style="text-align: center; vertical-align: middle;">Fecha</th>'+
                                                '<th style="text-align: center; vertical-align: middle;">Hora Inicial</th>'+
                                                '<th style="text-align: center; vertical-align: middle;">Hora Final</th>'+
                                                '<th style="text-align: center; vertical-align: middle;">Precio</th>'+
                                                '<th style="text-align: center; vertical-align: middle;">Eliminar</th>'+
                                            '</thead>'+
                                            '<tbody id="cuerpo_Fechas_Pulsera_'+contadorNuevaPulsera+'">'+
                                            '</tbody>'+
                                        '</table>'+
                                    '</div>'+
                                    '<br>'+
                                    '<div class="container" id="modificar_Hora_Pulsera_'+contadorNuevaPulsera+'">'+
                                    '</div>'+
                                '</td>'+
                            '</tr>'+
                        '</tbody>'+
                    '</table>'+
                '</div>'+
                '<button id="boton_Eliminar_Pulsera'+contadorNuevaPulsera+'" style="float: right;" class="btn btn-danger remover_Registro_Pulsera">Eliminar Registro</button>'+
            '</td>'+
        '</tr>'
    ).clone().appendTo("#contenedor_Nuevas_Pulseras");
});

$("#nuevo_Registro_Promocion_Cortesia").click(function(){
    contadorNuevaCortesia++;
    
    $(
        '<tr id="contenedor_Creditos_Cortesia_'+contadorNuevaCortesia+'" border=2>'+
            '<td>'+
                '<div>'+
                    '<center><label><h4>Nuevos Creditos de Cortesia</h4></label></center>'+
                '</div>'+
                '<div class="from-group" id="nombre_Cortesias_'+contadorNuevaCortesia+'">'+
                    '<label for="promocionesPulsera'+contadorNuevaCortesia+'">Nombre de la promocion</label>'+
                    '<select id="cortesias'+contadorNuevaCortesia+'" class="form-control promocionesCortesias">'+option_Cortesias_Html+'</select>'+
                    '<br>'+
                '</div>'+
                '<div class="from-group" id="precio_Cortesia_'+contadorNuevaCortesia+'">'+
                    '<label for="precio_Cortesias_'+contadorNuevaCortesia+'">Precio de la Promoción</label>'+
                    '<input type="number" class="form-control" name="precio_Cortesias_'+contadorNuevaCortesia+'" id="precio_Cortesias_'+contadorNuevaCortesia+'" placeholder="Precio Promoción" value="">'+
                    '<br>'+
                '</div>'+
                '<div class="from-group" id="creditos_Cortesia_'+contadorNuevaCortesia+'">'+
                    '<label for="creditos_Cortesias_'+contadorNuevaCortesia+'">Creditos de la promoción</label>'+
                    '<input type="number" class="form-control" name="creditos_Cortesias_'+contadorNuevaCortesia+'" id="creditos_Cortesias_'+contadorNuevaCortesia+'" placeholder="Creditos Promoción">'+
                    '<br>'+
                '</div>'+
                '<div class="from-group table table-responsive">'+
                    '<table class="table table-border">'+
                        '<tbody>'+
                            '<tr>'+
                                '<td>'+
                                    '<div class="container" id="fechas_Cortesias_'+contadorNuevaCortesia+'">'+
                                        '<center><label>Días</label>'+
                                        '<br>'+
                                        '<label for="inicioCortesias'+contadorNuevaCortesia+'">Hora de Inicio</label>'+
                                        '<input id="inicioCortesias'+contadorNuevaCortesia+'" class="form-control" type="datetime-local">'+
                                        '<br>'+
                                        '<label for="finCortesias'+contadorNuevaCortesia+'">Hora de Finalizacion</label>'+
                                        '<input id="finCortesias'+contadorNuevaCortesia+'" class="form-control" type="datetime-local">'+
                                        '<br>'+
                                        '<label for="precioCortesias'+contadorNuevaCortesia+'">Precio</label>'+
                                        '<input id="precioCortesias'+contadorNuevaCortesia+'" class="form-control" type="number" placeholder="Ingresa un precio">'+
                                        '<br>'+
                                        '<label for="creditosI'+contadorNuevaCortesia+'">Creditos</label>'+
                                        '<input id="creditosI'+contadorNuevaCortesia+'" name="creditosI'+contadorNuevaCortesia+'" class="form-control" type="number" placeholder="Creditos cortesia">'+
                                        '<br>'+
                                        '<button class="btn btn-success adicionarCreditos" type="button">Agregar</button></center><br>'+
                                    '</div>'+
                                '</td>'+
                                '<td>'+
                                    '<div class="table-wrapper">'+
                                        '<table id="tabla_Fechas_Cortesias_'+contadorNuevaCortesia+'" class="table table-border table-hover">'+
                                            '<thead>'+
                                                '<th style="text-align: center; vertical-align: middle;">Fecha</th>'+
                                                '<th style="text-align: center; vertical-align: middle;">Hora Inicial</th>'+
                                                '<th style="text-align: center; vertical-align: middle;">Hora Final</th>'+
                                                '<th style="text-align: center; vertical-align: middle;">Precio</th>'+
                                                '<th style="text-align: center; vertical-align: middle;">Creditos</th>'+
                                                '<th style="text-align: center; vertical-align: middle;">Eliminar</th>'+
                                            '</thead>'+
                                            '<tbody id="cuerpo_Promocion_Cortesias_'+contadorNuevaCortesia+'"></tbody>'+
                                        '</table>'+
                                    '</div>'+
                                    '<br>'+
                                    '<div class="container" id="modificar_Hora_Cortesias_'+contadorNuevaCortesia+'"></div>'+
                                '</td>'+
                            '</tr>'+
                        '</tbody>'+
                    '</table>'+
                '</div>'+
                '<button type="button" style="float: right;" class="btn btn-danger remover_Registro_Cortesia">Eliminar Registro</button>'+
            '</td>'+
        '</tr>'
    ).clone().appendTo('#contenedor_Creditos_Cortesia');
});

//Se encarga de generar los dias individuales, almacenarlos en el arreglo y pintarlos en la interfaz
$(document).on('click','.adicionarDescuento', function(){
    iniciarCarga();
    var registro_Descuento = parseInt($(this).parents('div').attr('id').split('_')[2]);

    //var registro_Descuento = $(this).parents('div').attr('id').split('_')[2];

    var opcion = $("#descuentos"+registro_Descuento).val();

    var inicioDescuento = $('#inicioDescuento'+registro_Descuento).val() +":00";
    var finDescuento =$('#finDescuento'+registro_Descuento).val()+":00";

    if(opcion != "" && inicioDescuento !=":00" && finDescuento !=":00"){

       // fechas_Descuentos.push({'FechaInicial':inicioDescuento,'FechaFinal':finDescuento,'idDosxUno':opcion,'descuento':registro_Descuento,'idEvento':idEvento});

        var fila = '';

        //
        var horaInicial = inicioDescuento.split('T')[1];
        var horaFinal = finDescuento.split('T')[1];

        var inicioEvento = new Date(inicioDescuento);

        var finEvento = new Date(finDescuento);

        var inicioDia, finDia, formato;

        var formatoFecha;
        var fecha;

        const dia_Milisegundos = 1000*60*60*24;
        const intervalo = dia_Milisegundos * 1;

        const formateadorFecha = new Intl.DateTimeFormat('fr-ca',{year:"numeric", month:"2-digit", day:"2-digit"});

        for(let i =inicioEvento; i<=finEvento; i = new Date(i.getTime() + intervalo)){
            fecha = formateadorFecha.format(i);


            inicioDia = fecha + ' '+ horaInicial;

            finDia = fecha + ' ' + horaFinal;

            //Aqui me quede implementando la opcion de borrar fechas y editar las fechas individualmente
            //fila += '<tr id="descuentos_'+contador_Fila_Descuentos+'"><td id="fecha_Descuento_'+contador_Fila_Descuentos+'"  style="text-align: center; vertical-align: middle;">'+fecha+'</td><td id="'+contador_Fila_Descuentos+'_Descuento_Hora_1" class="modificar_Hora_Descuento" style="text-align: center; vertical-align: middle;">'+horaInicial+'</td><td id="'+contador_Fila_Descuentos+'_Descuento_Hora_2" class="modificar_Hora_Descuento" style="text-align: center; vertical-align: middle;">'+horaFinal+'</td><td style="text-align: center; vertical-align: middle;"><button type="button" name="remover_Descuento" id="'+contador_Fila_Descuentos+'" class="btn btn-danger remover_Descuento">Remover</button></td></tr>';
            
            $('<tr id="descuentos_'+contador_Fila_Descuentos+'"><td id="fecha_Descuento_'+contador_Fila_Descuentos+'"  style="text-align: center; vertical-align: middle;">'+fecha+'</td><td id="'+contador_Fila_Descuentos+'_Descuento_Hora_1" class="modificar_Hora_Descuento" style="text-align: center; vertical-align: middle;">'+horaInicial+'</td><td id="'+contador_Fila_Descuentos+'_Descuento_Hora_2" class="modificar_Hora_Descuento" style="text-align: center; vertical-align: middle;">'+horaFinal+'</td><td style="text-align: center; vertical-align: middle;"><button type="button" class="btn btn-danger remover_Descuento">Remover</button></td></tr>').clone().appendTo('#cuerpo_Fechas_Descuentos_'+registro_Descuento);

            fechas_Descuentos.push({'FechaInicial':inicioDia,'FechaFinal':finDia,'idDosxUno':opcion,'idRenglon':contador_Fila_Descuentos,'descuento':registro_Descuento,'idEvento':idEvento});
            
            contador_Fila_Descuentos++;
        }
        console.log('Arreglo: ' + JSON.stringify(fechas_Descuentos));
    }
    else{
        alert('Favor de rellenar todos los campos');
    }

    /*
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
    */

    cerrarCarga();
});

$(document).on('click','.adicionarPulsera', function(){
    iniciarCarga();

    var registro_Pulsera = parseInt($(this).parents('div').attr('id').split('_')[2]);

    var opcion = $("#pulsera"+registro_Pulsera).val();

    var inicioPulsera =$("#inicioPulsera"+registro_Pulsera).val() +":00";
    var finPulsera =$("#finPulsera"+registro_Pulsera).val()+":00";

    var precioPulsera =$("#precioPulsera"+registro_Pulsera).val();

    if(opcion !="" && inicioPulsera != ":00" && finPulsera != ":00"){

        if(precioPulsera === ""){
            precioPulsera = $("#precio_Pulsera_"+registro_Pulsera).val();
        }

       var horaInicial =  inicioPulsera.split('T')[1];
       var horaFinal = finPulsera.split('T')[1];

       var inicioEvento = new Date(inicioPulsera);
       var finEvento = new Date(finPulsera);

       var inicioDia, finDia, fecha;

       const dia_Milisegundos = 1000*60*60*24;
       const intervalo = dia_Milisegundos * 1;

       const formateadorFecha = new Intl.DateTimeFormat('fr-ca',{year:"numeric", month:"2-digit", day:"2-digit"});

       for(let i=inicioEvento; i<=finEvento; i= new Date(i.getTime() + intervalo)){
            fecha = formateadorFecha.format(i);

            inicioDia = fecha + ' ' + horaInicial;

            finDia = fecha + ' ' + horaFinal;

            fechas_Pulsera.push({'Precio':precioPulsera,'FechaInicial':inicioDia,'FechaFinal':finDia, 'idPulseraMagica':opcion, 'idRenglon':contador_Fila_Pulsera, 'pulsera':registro_Pulsera, 'idEvento':idEvento});

            $('<tr id="pulsera_'+contador_Fila_Pulsera+'"><td id="fecha_Pulsera_'+contador_Fila_Pulsera+'" style="text-align: center; vertical-align: middle;">'+fecha+'</td><td id="'+contador_Fila_Pulsera+'_Pulsera_Hora_1" class="modificar_Hora_Pulsera" style="text-align: center; vertical-align: middle;">'+horaInicial+'</td><td id="'+contador_Fila_Pulsera+'_Pulsera_Hora_2" class="modificar_Hora_Pulsera" style="text-align: center; vertical-align: middle;">'+horaFinal+'</td><td id="'+contador_Fila_Pulsera+'_Pulsera_Precio" class="modificar_Hora_Pulsera" style="text-align: center; vertical-align: middle;">'+precioPulsera+'</td><td style="text-align: center; vertical-align: middle;"><button type="button" class="btn btn-danger remover_Pulsera">Remover</button></td></tr>').clone().appendTo("#cuerpo_Fechas_Pulsera_"+registro_Pulsera);

            contador_Fila_Pulsera++;
       }
    }
    else{
        alert('Favor de rellenar todos los campos');
    }

    cerrarCarga();

});

$(document).on('click','.adicionarJuegos', function(){
    iniciarCarga();

    var registro_Juego  = parseInt($(this).parents('div').attr('id').split('_')[2]);

    var opcion = $("#juegos"+registro_Juego).val();
    
    var inicioJuego = $("#inicioJuegos"+registro_Juego).val() + ":00";
    var finJuego = $("#finJuegos"+registro_Juego).val() + ":00";

    if(opcion != "" && inicioJuego != ":00" && finJuego != ":00"){

        var horaInicial = inicioJuego.split('T')[1];
        var horaFinal = finJuego.split('T')[1];

        var inicioEvento = new Date(inicioJuego);
        var finEvento = new Date(finJuego);

        var inicioDia, finDia, fecha;

        const dia_Milisegundos = 1000*60*60*24;
        const intervalo = dia_Milisegundos*1;

        const formateadorFecha = new Intl.DateTimeFormat('fr-ca',{year:"numeric", month:"2-digit", day:"2-digit"});

        for(let i=inicioEvento; i<=finEvento; i= new Date(i.getTime() + intervalo)){
            fecha = formateadorFecha.format(i);

            inicioDia = fecha + ' '+ horaInicial;
            finDia = fecha + ' ' + horaFinal;

            fechas_Juegos.push({'Precio':0,'FechaInicial':inicioDia,'FechaFinal':finDia,'idJuegosGratis':opcion, 'idRenglon':contador_Fila_Juegos, 'juego':registro_Juego,'idEvento':idEvento});

            $('<tr id="juegos_'+contador_Fila_Juegos+'"><td id="fecha_Juego_'+contador_Fila_Juegos+'" style="text-align: center; vertical-align: middle;">'+fecha+'</td><td id="'+contador_Fila_Juegos+'_Juego_Hora_1" class="modificar_Hora_Juego" style="text-align: center; vertical-align: middle;">'+horaInicial+'</td><td id="'+contador_Fila_Juegos+'_Juego_Hora_2" class="modificar_Hora_Juego" style="text-align: center; vertical-align: middle;">'+horaFinal+'</td><td><button style="text-align: center; vertical-align: middle;" type="button" class="btn btn-danger remover_Juegos">Remover</button></td></tr>').clone().appendTo('#cuerpo_Fechas_Juegos_'+registro_Juego);

            contador_Fila_Juegos++;
        }

    }
    else{
        alert('Favor de rellenar todos los campos');
    }

    cerrarCarga();
});

$(document).on('click', '.adicionarCreditos', function(){
    iniciarCarga();

    var registro_Cortesias = parseInt($(this).parents('div').attr('id').split('_')[2]);

    var opcion = $("#cortesias"+registro_Cortesias).val();

    var inicioCortesias = $('#inicioCortesias'+registro_Cortesias).val() + ':00';
    var finCortesias = $('#finCortesias' + registro_Cortesias).val() + ':00';

    var precio = $('#precioCortesias'+registro_Cortesias).val();
    var creditos = $('#creditosI'+registro_Cortesias).val();

    if(opcion != "" && inicioCortesias != ":00" && finCortesias != ":00"){

        if(precio === ""){
            precio = $('#precio_Cortesias_'+registro_Cortesias).val();
        }
    
        if(creditos === ""){
            creditos = $('#creditos_Cortesias_'+registro_Cortesias).val();
        }

        
        var horaInicial = inicioCortesias.split('T')[1];
        var horaFinal = finCortesias.split('T')[1];

        var inicioEvento = new Date(inicioCortesias);
        var finEvento = new Date(finCortesias);

        var inicioDia, finDia, fecha;

        const dia_Milisegundos = 1000*60*60*24;
        const intervalo = dia_Milisegundos * 1;

        const formateadorFecha = new Intl.DateTimeFormat('fr-ca',{year:"numeric", month:"2-digit", day:"2-digit"});

        for(let i=inicioEvento; i<=finEvento; i = new Date(i.getTime() + intervalo)){
            fecha = formateadorFecha.format(i);

            inicioDia = fecha + ' ' + horaInicial;
            finDia = fecha + ' ' + horaFinal;

            $('<tr id="cortesias_'+contador_Fila_Cortesias+'"><td id="fecha_Cortesia_'+contador_Fila_Cortesias+'" style="text-align: center; vertical-align: middle;">'+fecha+'</td><td id="'+contador_Fila_Cortesias+'_Cortesia_Hora_1" class="modificar_Hora_Cortesia" style="text-align: center; vertical-align: middle;">'+horaInicial+'</td><td id="'+contador_Fila_Cortesias+'_Cortesia_Hora_2" class="modificar_Hora_Cortesia" style="text-align: center; vertical-align: middle;">'+horaFinal+'</td><td id="'+contador_Fila_Cortesias+'_Precio_Cortesia" style="text-align: center; vertical-align: middle;">'+precio+'</td><td id="'+contador_Fila_Cortesias+'_Credito_Cortesia" style="text-align: center; vertical-align: middle;">'+creditos+'</td><td><button type="button" name="remover_Cortesias" class="btn btn-danger remover_Cortesias">Remover</button></td></tr>').clone().appendTo('#cuerpo_Promocion_Cortesias_'+registro_Cortesias);
            fechas_Cortesias.push({'Precio':precio, 'Creditos':creditos,'FechaInicial': inicioDia, 'FechaFinal': finDia, 'idCC':opcion, 'idRenglon': contador_Fila_Cortesias, 'cortesia':registro_Cortesias, 'idEvento':idEvento});

            contador_Fila_Cortesias++;
        }
    }
    else{
        alert('Favor de rellenar todos los campos');
    }
    cerrarCarga();
});

//Se encarga de modificar las horas individuales de las fechas
$(document).on('click','.modificar_Hora_Descuento', function(){

    var hora = $(this).html();

    var idEventoArreglo =$(this).parents('table').attr('id').split('_')[3];
    var tr =$(this).parents('tr').attr('id').split('_')[1];

    var fecha  = $("#fecha_Descuento_"+tr).html();
    var horaIn = $("#"+tr+"_Descuento_Hora_1").html();
    var horaFi = $("#"+tr+"_Descuento_Hora_2").html();

    var posicion = $(this).attr('id').substr(-1);

    html =
    '<hr>'+
    '<input type="hidden" id="modificarFechaDescuento'+idEventoArreglo+'" value="'+fecha+'">'+
    '<input type="hidden" id="modificarEventoDescuento'+idEventoArreglo+'" value="'+idEventoArreglo+'">'+
    '<input type="hidden" id="modificarTrDescuento'+idEventoArreglo+'" value="'+tr+'">'+
    '<input type="hidden" id="posicionDescuento'+idEventoArreglo+'" value="'+posicion+'">'+
    '<h6 class="modal-title">Modificar: </h6> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+
    '<label for="modificarHoraInicialDescuento'+idEventoArreglo+'">Hora Inicial: </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+
    '<input id="modificarHoraInicialDescuento'+idEventoArreglo+'" value="'+horaIn+'" type="time"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+
    '<label for="modificarHoraFinalDescuento'+idEventoArreglo+'">Hora Final: </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+
    '<input id="modificarHoraFinalDescuento'+idEventoArreglo+'" value="'+horaFi+'" type="time"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+

    '<button type="button" class="btn btn-success modificar_Horario_Descuento"> Aceptar</button>';

    $('#modificar_Hora_Descuento_'+idEventoArreglo).html(html);
});

$(document).on('click','.modificar_Horario_Descuento', function(){

    var id = $(this).parents('div').attr('id').split('_')[3];

    var idEventoArreglo = $("#modificarEventoDescuento"+id).val();
    var tr = $("#modificarTrDescuento"+id).val();

    var fecha  = $("#modificarFechaDescuento"+id).val();

    var horaIn = $("#modificarHoraInicialDescuento"+id).val();
    var horaFi = $("#modificarHoraFinalDescuento"+id).val();

    if(horaIn && horaFi){
        var indiceRenglon = fechas_Descuentos.findIndex((objeto)=>objeto.idRenglon == tr);

        fechas_Descuentos[indiceRenglon]['FechaInicial'] = fecha+' '+ horaIn +':00';
        fechas_Descuentos[indiceRenglon]['FechaFinal'] = fecha+' '+ horaFi +':00';

        $("#"+tr+"_Descuento_Hora_1").html(horaIn+':00');
        $("#"+tr+"_Descuento_Hora_2").html(horaFi+':00');

        $("#modificar_Hora_Descuento_"+id).html('');
    }
    else{
        alert('Favor de agregar los horarios');
    }
});

$(document).on('click', '.modificar_Hora_Pulsera', function(){
    var hora = $(this).html();

    var idEventoArreglo = $(this).parents('table').attr('id').split('_')[3];
    var tr = $(this).parents('tr').attr('id').split('_')[1];

    var fecha = $("#fecha_Pulsera_"+tr).html();
    var horaIn = $("#"+tr+"_Pulsera_Hora_1").html();
    var horaFi = $("#"+tr+"_Pulsera_Hora_2").html();
    var precio = $("#"+tr+"_Pulsera_Precio").html();

    html =
    '<hr>'+
    '<input type="hidden" id="modificarFechaPulsera'+idEventoArreglo+'" value="'+fecha+'">'+
    '<input type="hidden" id="modificarEventoPulsera'+idEventoArreglo+'" value="'+idEventoArreglo+'">'+
    '<input type="hidden" id="modificarTrPulsera'+idEventoArreglo+'" value="'+tr+'">'+
    '<h6 class="modal-title">Modificar: </h6> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+
    '<label for="modificarHoraInicialPulsera'+idEventoArreglo+'">Hora Inicial: </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+
    '<input id="modificarHoraInicialPulsera'+idEventoArreglo+'" value="'+horaIn+'" type="time"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+
    '<label for="modificarHoraFinalPulsera'+idEventoArreglo+'">Hora Final: </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+
    '<input id="modificarHoraFinalPulsera'+idEventoArreglo+'" value="'+horaFi+'" type="time"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+
    '<label for="modificarPrecioPulsera'+idEventoArreglo+'">Precio: </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+
    '<input id="modificarPrecioPulsera'+idEventoArreglo+'" value="'+precio+'" type="numeric"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+
    '<button type="button" class="btn btn-success modificar_Horario_Pulsera"> Aceptar</button>';

    $('#modificar_Hora_Pulsera_'+idEventoArreglo).html(html);
    
});

$(document).on('click', '.modificar_Horario_Pulsera', function(){

    var id = $(this).parents('div').attr('id').split('_')[3];

    var tr = $("#modificarTrPulsera"+id).val();
    var fecha =$("#modificarFechaPulsera"+id).val();
    var horaIn = $("#modificarHoraInicialPulsera"+id).val();
    var horaFi = $("#modificarHoraFinalPulsera"+id).val();
    var precio =$("#modificarPrecioPulsera"+id).val();

    if(horaIn && horaFi && precio){
        var indiceRenglon = fechas_Pulsera.findIndex((objeto)=>objeto.idRenglon == tr);

        console.log('Registro anterior: ' + JSON.stringify(fechas_Pulsera[indiceRenglon]));

        fechas_Pulsera[indiceRenglon]['FechaInicial'] = fecha + ' '+horaIn +':00';
        fechas_Pulsera[indiceRenglon]['FechaFinal'] = fecha+ ' ' + horaFi + ':00';
        fechas_Pulsera[indiceRenglon]['Precio'] = precio;

        $("#"+tr+"_Pulsera_Hora_1").html(horaIn+':00');
        $("#"+tr+"_Pulsera_Hora_2").html(horaFi+':00');
        $("#"+tr+"_Pulsera_Precio").html(precio);

        $("#modificar_Hora_Pulsera_"+id).html('');
    }
    else{
        alert('Favor de agregar los horarios');
    }
});

$(document).on('click', ' .modificar_Hora_Juego', function(){
    var idEventoArreglo = $(this).parents('table').attr('id').split('_')[3];
    var tr = $(this).parents('tr').attr('id').split('_')[1];

    var fecha = $("#fecha_Juego_"+tr).html();
    var horaIn  = $("#"+tr+"_Juego_Hora_1").html();
    var horaFi = $("#"+tr+"_Juego_Hora_2").html();

    var posicion = $(this).attr('id').substr(-1);

    html=
    '<hr>'+
    '<input type="hidden" id="modificarFechaJuego'+idEventoArreglo+'" value="'+fecha+'">'+
    '<input type="hidden" id="modificarEventoJuego'+idEventoArreglo+'" value="'+idEventoArreglo+'">'+
    '<input type="hidden" id="modificarTrJuego'+idEventoArreglo+'" value="'+tr+'">'+
    '<h6 class="modal-title">Modificar: </h6> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+
    '<label for="modificarHoraInicialJuego'+idEventoArreglo+'">Hora Inicial: </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+
    '<input id="modificarHoraInicialJuego'+idEventoArreglo+'" value="'+horaIn+'" type="time"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+
    '<label for="modificarHoraFinalJuego'+idEventoArreglo+'">Hora Final: </label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+
    '<input id="modificarHoraFinalJuego'+idEventoArreglo+'" value="'+horaFi+'" type="time"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+

    '<button type="button" class="btn btn-success modificar_Horario_Juego"> Aceptar</button>';

    $("#modificar_Hora_Juegos_"+idEventoArreglo).html(html);
});

$(document).on('click', '.modificar_Horario_Juego', function(){
    var id = $(this).parents('div').attr('id').split('_')[3];
    console.log('Sin modificar: ' + JSON.stringify(fechas_Juegos));

    var tr = $("#modificarTrJuego"+id).val();
    var fecha = $("#modificarFechaJuego"+id).val();

    var horaIn = $("#modificarHoraInicialJuego"+id).val();
    var horaFi = $("#modificarHoraFinalJuego"+id).val();

    if(horaIn && horaFi){
        
        var indiceRenglon = fechas_Juegos.findIndex((objeto)=>objeto.idRenglon == tr);

        fechas_Juegos[indiceRenglon]['FechaInicial'] = fecha+' '+horaIn +':00';
        fechas_Juegos[indiceRenglon]['FechaFinal'] = fecha+' '+horaFi +':00';

        $("#"+tr+"_Juego_Hora_1").html(horaIn+':00');
        $("#"+tr+"_Juego_Hora_2").html(horaFi+':00');

        $("#modificar_Hora_Juegos_"+id).html('');
    }
    else{
        alert('Favor de agregar los horarios');
    }

    console.log('');
    console.log('Modificado: ' + JSON.stringify(fechas_Juegos));
});

$(document).on('click', '.modificar_Hora_Cortesia', function(){
    
    var idEventoArreglo = $(this).parents('table').attr('id').split('_')[3]
    var tr = $(this).parents('tr').attr('id').split('_')[1];

    var fecha = $('#fecha_Cortesia_'+tr).html();
    var horaIn = $('#'+tr+'_Cortesia_Hora_1').html();
    var horaFi = $('#'+tr+'_Cortesia_Hora_2').html();
    var precio = $('#'+tr+'_Precio_Cortesia').html();
    var credito =$('#'+tr+'_Credito_Cortesia').html();

    //var posicion = $(this).attr('id').substr(-1);

    html = 
    '<hr>'+
    '<input type="hidden" id="modificarFechaCortesia'+idEventoArreglo+'" value="'+fecha+'">'+
    '<input type="hidden" id="modificarEventoCortesia'+idEventoArreglo+'" value="'+idEventoArreglo+'">'+
    '<input type="hidden" id="modificarTrCortesia'+idEventoArreglo+'" value="'+tr+'">'+
    '<h6 class="modal-title">Modificar: </h6>'+
    '<br>'+
    '<label for="modificarHoraInicialCortesia'+idEventoArreglo+'">Hora Inicial: </label> &nbsp;&nbsp;&nbsp;'+
    '<input id="modificarHoraInicialCortesia'+idEventoArreglo+'" value="'+horaIn+'" type="time"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+
    '<label for="modificarHoraFinalCortesia'+idEventoArreglo+'">Hora Final: </label> &nbsp;&nbsp;&nbsp;'+
    '<input id="modificarHoraFinalCortesia'+idEventoArreglo+'" value="'+horaFi+'" type="time">'+
    '<br>'+
    '<label for="modificarPrecioCortesia'+idEventoArreglo+'">Precio: </label> &nbsp;&nbsp;&nbsp;'+
    '<input id="modificarPrecioCortesia'+idEventoArreglo+'" value="'+precio+'" type="text" size="7"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+
    '<label for="modificarCreditoCortesia'+idEventoArreglo+'">Creditos: </label> &nbsp;&nbsp;&nbsp;'+
    '<input id="modificarCreditoCortesia'+idEventoArreglo+'" value="'+credito+'" type="text" size="7"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+

    '<button type="button" class="btn btn-success modificar_Horario_Cortesia"> Aceptar</button>';

    $('#modificar_Hora_Cortesias_'+idEventoArreglo).html(html);
});

$(document).on('click','.modificar_Horario_Cortesia', function(){

    var id = $(this).parents('div').attr('id').split('_')[3];

    var idEventoArreglo = $("#modificarEventoCortesia"+id).val();
    var tr = $("#modificarTrCortesia"+id).val();

    var fecha = $("#modificarFechaCortesia"+id).val();
    var horaIn = $("#modificarHoraInicialCortesia"+id).val();
    var horaFi = $("#modificarHoraFinalCortesia"+id).val();

    var precio = $("#modificarPrecioCortesia"+id).val();
    var credito = $("#modificarCreditoCortesia"+id).val();

    if(horaIn && horaFi && precio && credito){
        var indiceRenglon = fechas_Cortesias.findIndex((objeto)=>objeto.idRenglon == tr);

        fechas_Cortesias[indiceRenglon]['FechaInicial'] = fecha +' '+horaIn + ':00';
        fechas_Cortesias[indiceRenglon]['FechaFinal'] = fecha + ' ' + horaFi + ':00' ;

        fechas_Cortesias[indiceRenglon]['Precio'] = precio;
        fechas_Cortesias[indiceRenglon]['Creditos'] = credito;

        $("#"+tr+"_Cortesia_Hora_1").html(horaIn+':00');
        $("#"+tr+"_Cortesia_Hora_2").html(horaFi+':00');

        $("#"+tr+"_Precio_Cortesia").html(precio);
        $("#"+tr+"_Credito_Cortesia").html(credito);

        $("#modificar_Hora_Cortesias_"+id).html('');
    }
    else{
        alert('Favor de agregar los datos correspondientes.')
    }

});
//Se encarga de eliminar una fecha individual de la interfaz y del arreglo
$(document).on('click','.remover_Descuento', function(){

    var parent =  $(this).parents().get(1);

    var id = $(this).parents('tr').attr('id').split('_')[1];
    var indiceRenglon = fechas_Descuentos.findIndex((objeto)=>objeto.idRenglon == id);

    fechas_Descuentos.splice(indiceRenglon,1);

    $(parent).remove();
});

$(document).on('click','.remover_Pulsera',function(){

    var parent = $(this).parents().get(1);

    var id =$(this).parents('tr').attr('id').split('_')[1];
    var indiceRenglon = fechas_Pulsera.findIndex((objeto)=>objeto.idRenglon == id);

    fechas_Pulsera.splice(indiceRenglon, 1);

    $(parent).remove();
});

$(document).on('click','.remover_Juegos', function(){
    var parent = $(this).parents().get(1);
    
    var id =$(this).parents('tr').attr('id').split('_')[1];
    var indiceRenglon  =fechas_Juegos.findIndex((objeto)=>objeto.idRenglon ==id);

    fechas_Juegos.splice(indiceRenglon,1);

    $(parent).remove();
});

$(document).on('click','.remover_Cortesias',function(){
    var parent = $(this).parents().get(1);

    var id = $(this).parents('tr').attr('id').split('_')[1];
    var indiceRenglon = fechas_Cortesias.findIndex((objeto)=>objeto.idCC == id);

    fechas_Cortesias.splice(indiceRenglon, 1);

    $(parent).remove();
});

//Se encarga de eliminar un registro completo de la interfaz de la rpmocion y la informacion del arreglo
$(document).on('click','.remover_Registro_Descuento', function(event){
    iniciarCarga();

    var id = $(this).parents('tr').attr('id').split('_')[3];

    //alert(id);

    var indiceRenglon;
    var longitud = fechas_Descuentos.length;

    for(var i=0; i<longitud;i++){

        indiceRenglon = fechas_Descuentos.findIndex((objeto)=>objeto.descuento == id);

        if(indiceRenglon != -1){

            fechas_Descuentos.splice(indiceRenglon,1);
        }
    }

    $("#contenedor_Descuento_Nuevo_"+id).remove();
    cerrarCarga();
});

$(document).on('click','.remover_Registro_Pulsera', function(event){
    iniciarCarga();
    var id = $(this).parents('tr').attr('id').split('_')[3];

    var indiceRenglon;
    var longitud  = fechas_Pulsera.length;

    for(var i=0; i<longitud;i++){
        indiceRenglon = fechas_Pulsera.findIndex((objeto)=>objeto.pulsera == id);

        if(indiceRenglon != -1){
            fechas_Pulsera.splice(indiceRenglon,1);
        }
    }

    $("#contenedor_Pulsera_Nueva_"+id).remove();
    cerrarCarga();
});

$(document).on('click', '.remover_Registro_Cortesia', function(event){
    iniciarCarga();
    
    var id = $(this).parents('tr').attr('id').split('_')[3];

    var indiceRenglon;
    var longitud = fechas_Cortesias.length;

    for(var i=0;i<longitud;i++){

        indiceRenglon = fechas_Cortesias.findIndex((objeto)=>objeto.cortesia == id);

        if(indiceRenglon != -1){
            fechas_Cortesias.splice(indiceRenglon, 1);
        }
    }

    $("#contenedor_Creditos_Cortesia_"+id).remove();
    
    cerrarCarga();
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

/**************************************************-Segundo Nivel cuando se edita una promocion en el evento ***********************************************/

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

    $('#tabla_Editar_Fechas_Descuento').html('<tr><th style="text-align: center; vertical-align: middle;">Hora Inicial</th><th style="text-align: center; vertical-align: middle;">Hora Final</th><th style="text-align: center; vertical-align: middle;">Editar</th></tr>');
    for(var i=0; i<fechas.length;i++){
        fila = '<tr id="renglon_Descuento'+contador+'"><td style="text-align: center; vertical-align: middle;">'+fechas[i]['FechaInicial']+'</td><td style="text-align: center; vertical-align: middle;">'+fechas[i]['FechaFinal']+'</td><td style="text-align: center; vertical-align: middle;" id="'+contador+'"><a id="'+fechas[i]['idFechaDosxUno']+'" class="editar_Fecha_Descuento"><i class="fa fa-paint-brush btn btn-outline-warning" aria-hidden="true"></i></a></td></tr>';
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

    $("#tabla_Editar_Fechas_Pulsera").html('<tr><th style="text-align: center; vertical-align: middle;">Hora Inicial</th><th style="text-align: center; vertical-align: middle;">Hora Final</th><th style="text-align: center; vertical-align: middle;">Precio</th><th style="text-align: center; vertical-align: middle;">Editar</th></tr>');

    for(var i=0; i<fechas.length;i++){
        fila = '<tr id="renglon_Pulsera'+contador+'"><td style="text-align: center; vertical-align: middle;" >'+fechas[i]['FechaInicial']+'</td><td style="text-align: center; vertical-align: middle;">'+fechas[i]['FechaFinal']+'</td><td style="text-align: center; vertical-align: middle;">'+fechas[i]['Precio']+'</td><td style="text-align: center; vertical-align: middle;" id="'+contador+'"><a id="'+fechas[i]['idFechaPulseraMagica']+'" class="editar_Fecha_Pulsera"><i class="fa fa-paint-brush btn btn-outline-warning" aria-hidden="true"></i></a></td></tr>';
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

    $("#tabla_Editar_Fechas_Juego").val('<tr><th style="text-align: center; vertical-align: middle;">Hora Inicial</th><th style="text-align: center; vertical-align: middle;">Hora Final</th><th style="text-align: center; vertical-align: middle;">Editar</th></tr>');

    for(var i= 0;i<fechas.length;i++){
        fila = '<tr id="renglon_Juego'+contador+'"><td style="text-align: center; vertical-align: middle;">'+fechas[i]['FechaInicial']+'</td><td style="text-align: center; vertical-align: middle;">'+fechas[i]['FechaFinal']+'</td><td style="text-align: center; vertical-align: middle;" id="'+contador+'"><a id="'+fechas[i]['idFechaJuegosGratis']+'" class="editar_Fecha_Juego"><i class="fa fa-paint-brush btn btn-outline-warning" aria-hidden="true"></i></a></td></tr>';
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

    $("#tabla_Editar_Fechas_Creditos").val('<tr><th style="text-align: center; vertical-align: middle;">Hora Inicial</th><th style="text-align: center; vertical-align: middle;">Hora Final</th><th style="text-align: center; vertical-align: middle;">Precio</th><th style="text-align: center; vertical-align: middle;">Creditos</th><th style="text-align: center; vertical-align: middle;">Eliminar</th></tr>');

    for(var i=0;i<fechas.length;i++){
        fila = '<tr id="renglon_Creditos'+contador+'"><td style="text-align: center; vertical-align: middle;">'+fechas[i]['FechaInicial']+'</td><td style="text-align: center; vertical-align: middle;">'+fechas[i]['FechaFinal']+'</td><td style="text-align: center; vertical-align: middle;">'+fechas[i]['Precio']+'</td><td style="text-align: center; vertical-align: middle;">'+fechas[i]['Creditos']+'</td><td style="text-align: center; vertical-align: middle;" id="'+contador+'"><a id="'+fechas[i]['idFechaCreditosCortesia']+'" class="editar_Fecha_Creditos"><i class="fa fa-paint-brush btn btn-outline-warning" aria-hidden="true"></i></a></td></tr>';
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

    //$("#editar_Inicio_Descuento").val(fechaDescuento[id]['FechaInicial'].replace(' ','T'));
    $("#editar_Inicio_Descuento").val(fechaDescuento[id]['FechaInicial'].replace(' ','T').split('.')[0]);
    $("#editar_Final_Descuento").val(fechaDescuento[id]['FechaFinal'].replace(' ','T').split('.')[0]);

});

$(document).on('click','.editar_Fecha_Pulsera', function(){
    var id=$(this).parents('td').attr('id');
    var idFechaPulseraMagica = $(this).attr('id');

    $("#td_Pulsera").val(id);
    $("#renglon_Pulsera").val($(this).parents('tr').attr('id'));
    $("#idFechaPulseraMagica").val(idFechaPulseraMagica);


    $("#editar_Inicio_Pulsera").val(fechaPulsera[id]['FechaInicial'].replace(' ','T').split('.')[0]);
    $("#editar_Final_Pulsera").val(fechaPulsera[id]['FechaFinal'].replace(' ', 'T').split('.')[0]);

    $("#editar_Precio_Pulsera").val(fechaPulsera[id]['Precio']);
});

$(document).on('click','.editar_Fecha_Juego',function(){
    var id = $(this).parents('td').attr('id');
    var idFechaJuegosGratis = $(this).attr('id');

    $("#td_Juego").val(id);
    $("#renglon_Juego").val($(this).parents('tr').attr('id'));
    $("#idFechaJuegosGratis").val(idFechaJuegosGratis);

    $("#editar_Inicio_Juego").val(fechaJuego[id]['FechaInicial'].replace(' ', 'T').split('.')[0]);
    $("#editar_Final_Juego").val(fechaJuego[id]['FechaFinal'].replace(' ','T').split('.')[0]);
});

$(document).on('click','.editar_Fecha_Creditos', function(){
    var id =$(this).parents('td').attr('id');
    var idFechaCreditosCortesia= $(this).attr('id');

    $("#td_Credito").val(id);
    $("#renglon_Credito").val($(this).parents('tr').attr('id'));
    $("#idFechaCreditosCortesia").val(idFechaCreditosCortesia);

    $("#editar_Inicio_Credito").val(fechaCredito[id]['FechaInicial'].replace(' ', 'T').split('.')[0]);
    $("#editar_Final_Credito").val(fechaCredito[id]['FechaFinal'].replace(' ', 'T').split('.')[0]);
    $("#editar_Precio_Credito").val(fechaCredito[id]['Precio']);
    $("#editar_Creditos").val(fechaCredito[id]['Creditos']);
});

/********************************-------------------Tercer nivel ************************************************************/

$("#editar_Horario_Descuento").on('click',function(){
    
    var td = $("#td_Descuento").val();
    var id= $("#renglon_Descuento").val();

    var inicio = $("#editar_Inicio_Descuento").val().replace('T',' ') + ":00";
    var final = $("#editar_Final_Descuento").val().replace('T', ' ') + ":00";

    //var inicio = i.replace('T', ' ');
    //var final = f.replace('T', ' ');

    //var inicio = $("#editar_Inicio_Descuento").val() + ":00";
    //var final = $("#editar_Final_Descuento").val() + ":00";
    var idFechaDosxUno = $("#idFechaDosxUno").val();

    $("#td_Descuento").val('');
    $("#renglon_Descuento").val('');
    $("#editar_Inicio_Descuento").val('');
    $("#editar_Final_Descuento").val('');
    $("#idFechaDosxUno").val('');

    $('#'+id).html('<td style="text-align: center; vertical-align: middle;">'+inicio+'</td><td style="text-align: center; vertical-align: middle;">'+final+'</td><td style="text-align: center; vertical-align: middle;" id="'+td+'"><a id="'+idFechaDosxUno+'" class="editar_Fecha_Descuento"><i class="fa fa-paint-brush btn btn-outline-warning" aria-hidden="true"></i></a></td>');
    fecha_Editada_Descuento.push({'idFechaDosxUno':idFechaDosxUno,'FechaInicial':inicio,'FechaFinal':final});
    
    //fechaDescuento.splice(id,1,{'idFechaDosxUno':idFechaDosxUno,'FechaInicial':inicio,'FechaFinal':final});
});

$("#editar_Horario_Pulsera").on('click',function(){
    var id=$("#renglon_Pulsera").val();
    var td_Pulsera = $("#td_Pulsera").val();
    var inicio =$("#editar_Inicio_Pulsera").val().replace('T', ' ') + ":00";
    var final = $("#editar_Final_Pulsera").val().replace('T', ' ') + ":00";
    var precio = $("#editar_Precio_Pulsera").val();
    var idFechaPulseraMagica = $("#idFechaPulseraMagica").val();

    $("#td_Pulsera").val('');
    $("#renglon_Pulsera").val('');
    $("#editar_Inicio_Pulsera").val('');
    $("#editar_Final_Pulsera").val('');
    $("#editar_Precio_Pulsera").val('');
    $("#idFechaPulseraMagica").val('');

    $('#'+id).html('<td style="text-align: center; vertical-align: middle;">'+inicio+'</td><td style="text-align: center; vertical-align: middle;">'+final+'</td><td style="text-align: center; vertical-align: middle;">'+precio+'</td><td style="text-align: center; vertical-align: middle;" id="'+td_Pulsera+'"><a id="'+idFechaPulseraMagica+'" class="editar_Fecha_Pulsera"><i class="fa fa-paint-brush btn btn-outline-warning" aria-hidden="true"></i></a></td>');
    fecha_Editada_Pulsera.push({'idFechaPulseraMagica':idFechaPulseraMagica,'FechaInicial':inicio,'FechaFinal':final,'Precio':precio});
    //console.log('Datos nuevos: ' + JSON.stringify(fecha_Editada_Pulsera));
});

$("#editar_Horario_Juego").on('click',function(){
    var td = $("#td_Juego").val();
    var id= $("#renglon_Juego").val();
    var inicio = $("#editar_Inicio_Juego").val().replace('T', ' ') + ":00";
    var final = $("#editar_Final_Juego").val().replace('T', ' ') + ":00";
    var idFechaJuegosGratis = $("#idFechaJuegosGratis").val();

    $("#td_Juego").val('');
    $("#renglon_Juego").val('');
    $("#editar_Inicio_Juego").val('');
    $("#editar_Final_Juego").val('');
    $("#idFechaJuegosGratis").val('');

    $('#'+id).html('<td style="text-align: center; vertical-align: middle;">'+inicio+'</td><td style="text-align: center; vertical-align: middle;">'+final+'</td><td style="text-align: center; vertical-align: middle;" id="'+td+'"><a id="'+idFechaJuegosGratis+'" class="editar_Fecha_Juego"><i class="fa fa-paint-brush btn btn-outline-warning" aria-hidden="true"></i></a></td>');

    fecha_Editada_Juego.push({'idFechaJuegosGratis':idFechaJuegosGratis,'FechaInicial':inicio,'FechaFinal':final});
});

$("#editar_Horario_Credito").on('click',function(){
    var td = $("#td_Credito").val();
    var id= $("#renglon_Credito").val();
    var inicio = $("#editar_Inicio_Credito").val().replace('T', ' ') + ":00";
    var final = $("#editar_Final_Credito").val().replace('T', ' ') + ":00";
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

    $('#'+id).html('<td style="text-align: center; vertical-align: middle;">'+inicio+'</td><td style="text-align: center; vertical-align: middle;">'+final+'</td><td style="text-align: center; vertical-align: middle;">'+precio+'</td><td style="text-align: center; vertical-align: middle;">'+credito+'</td><td style="text-align: center; vertical-align: middle;" id="'+td+'"><a id="'+idFechaCreditosCortesia+'" class="editar_Fecha_Creditos"><i class="fa fa-paint-brush btn btn-outline-warning" aria-hidden="true"></i></a></td>');

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
