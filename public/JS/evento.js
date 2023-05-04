
function mostrar_Ejemplo_Nuevo_Evento(){
    div = document.getElementById('contenedor_Ejemplo_Nuevo_Evento');
    div.style.display = '';

    prin = document.getElementById('contenedor_Eventos');
    prin.style.display = 'none';
}

function cerrar_Ejemplo_Nuevo_Evento(){
    div = document.getElementById('contenedor_Eventos');
    div.style.display = '';

    prin = document.getElementById('contenedor_Ejemplo_Nuevo_Evento');
    prin.style.display = 'none';
}

var contadorAtraccion=0;
var contadorTaquilla=0;
var contadorVentanilla=0;
var contadorPromociones=0;
var contadorCortesias=0;
var contadorEvento = 0;
var contadorRenglon = 0;
var precio_Promocion =[];
var fechas_Evento = [];
var string= [];
var select_Zonas_Html = '';
var option_Zonas_Html = '';
var select_Lote = '';
var opcion;
var contadorFila=0; //contador para asignar id al boton que borrara la fila
var diaInicial=[],diaFinal=[],precio=[];
var nombre_Promocion_Html='';
var option_Nombre_Html='';
var precio_Promocion_Html='';
var creditos_Promocion_Html='';
var fechas_Promocion_Html='';
var tabla_Fechas_Html='';
var creditos_Promocion=[];

var atraccion_Promocion_Descuentos = [];
var atraccion_Promocion_Pulsera = [];
var atraccion_Promocion_Juegos = [];

var promocion_Descuentos_Atraccion_Eliminar = [];
var promocion_Pulsera_Atraccion_Eliminar = [];
var promocion_Juegos_Atraccion_Eliminar = [];

var promocion_Descuentos_Atraccion_Nuevo = [];
var promocion_Pulsera_Atraccion_Nuevo = [];
var promocion_Juegos_Atraccion_Nuevo = [];

var ventanillas = [];
var taquillas = [];
var zonas = [];

var descuentos_Atraccion = [];
var pulsera_Atraccion = [];
var juegos_Atraccion = [];
var datos_Cortesia;

$("#nueva_Evento").on('click', function(){
    contadorEvento = 0;
    contadorRenglon = 0;
    fechas_Evento = [];
});

$("#agregarEvento").click(function(){
    iniciarCarga();
    var id_Arreglo = [];
    var nombre =[];
    var direccion = [];
    var ciudad = [];
    var estado = [];
    var costo = [];
    var pesos = [];
    var creditos = [];
    var fechaInicial = [];
    var fechaFinal = [];

    if(!fechas_Evento.length){
        alert('Favor de completar los campos faltantes');
        cerrarCarga();
    }else{

        dt = $("#formularioAgregarEvento").serializeArray();
    
        $.each(dt, function(i,n){
            if("id_Arreglo[]"=== n.name){
                id_Arreglo.push(n.value);
            }
            if("Nombre[]" === n.name){
                nombre.push(n.value)
            }
            if("Direccion[]" === n.name){
                direccion.push(n.value);
            }
            if("Ciudad[]"=== n.name){
                ciudad.push(n.value);
            }
            if("Estado[]" === n.name){
                estado.push(n.value);
            }
            if("costo_Tarjeta[]" === n.name){
                costo.push(n.value);
            }
            if("pesos[]" === n.name){
                pesos.push(n.value);
            }
            if("creditos[]" === n.name){
                creditos.push(n.value);
            }
        });

        console.log('idArreglo: ' + JSON.stringify(id_Arreglo));
        console.log('Nombre: ' + JSON.stringify(nombre));
        console.log('Direcion: ' + JSON.stringify(direccion));
        console.log('Ciudad: ' + JSON.stringify(ciudad));
        console.log('Estado: ' + JSON.stringify(estado));
        console.log('Costo Tarjeta: ' + JSON.stringify(costo));
        console.log('Pesos: ' + JSON.stringify(pesos));
        console.log('Creditos: ' + JSON.stringify(creditos));
        

        
    
        $.ajax({
            beforeSend: function(){
                iniciarCarga();
            },
            type: "POST",
            url: 'Eventos/Agregar_Evento',
            data: {'id':id_Arreglo,'Nombre':nombre,'Direccion':direccion,'Ciudad':ciudad,'Estado':estado,'fechas':fechas_Evento,'pesos':pesos,'creditos':creditos,'costo':costo},
            dataType: 'JSON',
            error: function (jqXHR, textStatus, errorThrown) {
                alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
                cerrarCarga();
            },
        }).done(function(data){
            if(data.respuesta){
                location.reload();
            }
            cerrarCarga();
        });

    
    }
});

$("#duplicar_Registro").click(function(){
    contadorEvento++;

    /*
    $(
        '<tr class="a-Eventos">'+
            '<td>'+
                '<div class="form-group">'+
                    '<input type="hidden" id="id_Arreglo" name="id_Arreglo[]" value="'+contadorEvento+'">'+
                '</div>'+
                '<div class="form-group">'+
                    '<label for="nombre">Nombre</label>'+
                    '<input class="form-control" type="text" name = "Nombre[]"  id="Nombre" required placeholder="Nombre"/>'+
                '</div>'+
                '<div class="form-group">'+
                    '<label for="direccion">Dirección</label>'+
                    '<input class="form-control" type="text" name="Direccion[]"  id="Direccion" required placeholder="Dirección"/>'+
                '</div>'+
                '<div class="form-group">'+
                    '<label for="ciudad">Ciudad</label>'+
                    '<input class="form-control" type="text" name="Ciudad[]"  id="Ciudad" required placeholder="Ciudad"/>'+
                '</div>'+
                '<div class="form-group">'+
                    '<label for="estado">Estado</label>'+
                    '<input class="form-control" type="text" name="Estado[]"  id="Estado" required placeholder="Estado"/>'+
                '</div>'+
                '<div class="form-group">'+
                    '<label for="costo_Tarjeta">Costo por tarjeta</label>'+
                    '<input class="form-control" type="number" name="costo_Tarjeta[]" id="costo_Tarjeta" required placeholder="Costo">'+
                '</div>'+
                '<div class="form-group">'+
                    '<label for="estado">Equivalencia de pesos a creditos</label>'+
                    '<input class="form-control" type="number" name="pesos[]"  id="pesos" required placeholder="Pesos"/>'+
                    '<br>'+
                    '<input class="form-control" type="number" name="creditos[]"  id="creditos" required placeholder="Creditos"/>'+
                '</div>'+
                '<!--TABLA DE FECHAS-->'+
                '<div class="from-group table table-responsive">'+
                    '<table class="table table-bordered">'+
                        '<tbody>'+
                            '<tr>'+
                                '<td id="evento'+contadorEvento+'">'+
                                    '<div class="container" id="fechas_Evento">'+
                                        '<center><label>Días</label></center>'+
                                        '<br>'+
                                        '<label for="inicioEvento'+contadorEvento+'">Hora de Inicio</label>'+
                                        '<input id="inicioEvento'+contadorEvento+'" class="form-control" type="datetime-local">'+
                                        '<br>'+
                                        '<label for="finEvento'+contadorEvento+'">Hora de Finalizacion</label>'+
                                        '<input id="finEvento'+contadorEvento+'" class="form-control" type="datetime-local">'+
                                        '<br>'+
                                        '<button class="agregar_Fecha_Evento btn btn-success" type="button">Añadir Fecha</button></center><br>'+
                                    '</div>'+
                                '</td>'+
                                '<td>'+
                                    '<table id="tabla_Fechas_Evento'+contadorEvento+'" class="table table-bordered table-hover">'+
                                        '<thead>'+
                                            '<th style="text-align: center; vertical-align: middle;">Hora Inicial</th>'+
                                            '<th style="text-align: center; vertical-align: middle;">Hora Final</th>'+
                                            '<th style="text-align: center; vertical-align: middle;">Eliminar</th>'+
                                        '</thead>'+
                                        '<tbody id="cuerpo_Fechas_Evento'+contadorEvento+'"></tbody>'+
                                    '</table>'+
                                '</td>'+
                            '</tr>'+
                        '</tbody>'+
                    '</table>'+
                '</div>'+
            '</td>'+
            '<td class="eliminarAt"><input type="button" value="-"/></td>'+
        '</tr>'
    ).clone().appendTo("#tabla_Evento");
    */

    
    $(
        '<div id="contenedor_Evento_'+contadorEvento+'">'+
            '<button id="boton_Evento_'+contadorEvento+'" style="float: left;" class="btn btn-danger remover_Evento">Eliminar Registro</button> <center><label><h2>Nuevo Evento</h2></label></center>'+
            '<table id="tabla_Evento_'+contadorEvento+'" class="table table-border" style='+"color: black; background-image: url('../../../Espectaculares_Garcia/public/Img/logog.png'); background-repeat:no-repeat; background-position: center;"+'>'+

                '<tbody id="body_Ventanillas_Activas">'+
                    '<tr>'+
                        '<td>'+
                            '<div class="form-group">'+
                                '<label for="nombre">Nombre</label>'+
                                '<input class="form-control" type="text" name = "Nombre[]"  id="Nombre" required placeholder="Nombre"/>'+
                            '</div>'+

                            '<div class="form-group">'+
                                '<label for="estado">Estado</label>'+
                                '<input class="form-control" type="text" name="Estado[]"  id="Estado" required placeholder="Estado"/>'+
                            '</div>'+

                            '<div class="form-group">'+
                                '<label for="costo_Tarjeta">Costo por tarjeta</label>'+
                                '<input class="form-control" type="number" name="costo_Tarjeta[]" id="costo_Tarjeta" required placeholder="Costo">'+
                            '</div>'+
                        '</td>'+
                        
                        '<td>'+
                            '<div class="form-group">'+
                                '<label for="direccion">Dirección</label>'+
                                '<input class="form-control" type="text" name="Direccion[]"  id="Direccion" required placeholder="Dirección"/>'+
                            '</div>'+

                            '<div class="form-group">'+
                                '<label for="estado">Equivalencia de pesos a creditos</label>'+
                                '<input class="form-control" type="number" name="pesos[]"  id="pesos" required placeholder="Pesos"/>'+
                            '</div>'+

                            '<div class="form-group">'+
                                '<input type="hidden" id="id_Arreglo" name="id_Arreglo[]" value="'+contadorEvento+'">'+
                            '</div>'+
                        '</td>'+

                        '<td>'+
                            '<div class="form-group">'+
                                '<label for="ciudad">Ciudad</label>'+
                                '<input class="form-control" type="text" name="Ciudad[]"  id="Ciudad" required placeholder="Ciudad"/>'+
                            '</div>'+

                            '<div class="form-group">'+
                                '<label><FONT COLOR="white">""</FONT></label>'+
                                '<input class="form-control" type="number" name="creditos[]"  id="creditos" required placeholder="Creditos"/>'+
                            '</div>'+
                        '</td>'+
                            
                    '</tr>'+

                    '<tr>'+
                        '<td id="evento_'+contadorEvento+'">'+
                            '<div class="form-group" id="fechas_Evento">'+

                                '<label for="inicioEvento'+contadorEvento+'">Hora de Inicio</label>'+
                                '<input id="inicioEvento'+contadorEvento+'" class="form-control" type="datetime-local" value="">'+

                                '<br>'+
                                '<label for="finEvento'+contadorEvento+'">Hora de Finalizacion</label>'+
                                '<input id="finEvento'+contadorEvento+'" class="form-control" type="datetime-local" value="">'+

                                '<br>'+
                                '<button  class="agregar_Fecha_Evento btn btn-success" type="button">Agregar Fechas</button>'+

                            '</div>'+
                        '</td>'+
                        '<td>'+

                        '</td>'+
                        
                        '<td>'+
                            '<div class="table-wrapper">'+
                                '<table id="tabla_Fechas_Evento_'+contadorEvento+'" class="table table-border table-hover">'+
                                    '<thead>'+
                                        '<th style="text-align: center; vertical-align: middle;">Fecha</th>'+
                                        '<th style="text-align: center; vertical-align: middle;">Hora Inicial</th>'+
                                        '<th style="text-align: center; vertical-align: middle;">Hora Final</th>'+
                                        '<th style="text-align: center; vertical-align: middle;">Eliminar</th>'+
                                    '</thead>'+
                                    '<tbody id="cuerpo_Fechas_Evento_'+contadorEvento+'"></tbody>'+
                                '</table>'+
                            '</div>'+
                        '</td>'+
                    '</tr>'+
                '</tbody>'+
            '</table>'+
            '<hr>'+
        '</div>'
    ).clone().appendTo("#contenedorEventos");
});


$(document).on('click','.agregar_Fecha_Evento', function(){

    iniciarCarga();

    var contador=$(this).parents('td').attr('id').split('_')[1];

    var fechaInicio = $('#inicioEvento'+contador).val()+":00";
    var fechaFinal = $('#finEvento'+contador).val()+":00";

    var horaInicial = fechaInicio.split('T')[1];
    var horaFinal = fechaFinal.split('T')[1];

    var inicioEvento = new Date(fechaInicio);

    var finEvento = new Date(fechaFinal);
    
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


        contadorRenglon++;
        
        fechas_Evento.push({'idEvento':contador,'idRenglon':contadorRenglon,'fechaInicial':inicioDia,'fechaFinal':finDia});


        $('<tr id="'+contadorRenglon+'"><td id="fecha_renglon_'+contadorRenglon+'" style="text-align: center; vertical-align: middle;">'+fecha+'</td><td href="#horas" data-toggle="modal" id="'+contadorRenglon+'_hora_1" class="modificar_Hora" style="text-align: center; vertical-align: middle;">'+horaInicial+'</td><td href="#horas" data-toggle="modal" id="'+contadorRenglon+'_hora_2" class="modificar_Hora" style="text-align: center; vertical-align: middle;">'+horaFinal+'</td><td style="text-align: center; vertical-align: middle;"><button type="button" name="remover_Cortesias" class="btn btn-danger remover_Fecha_Evento">Remover</button></td></tr>').clone().appendTo("#cuerpo_Fechas_Evento_"+contador);
    }

    cerrarCarga();

    /*
    contadorRenglon++; 

    var fechaInicial = $('#inicioEvento'+contador).val() + ":00";
    var fechaFinal =$('#finEvento'+contador).val() + ":00";
    alert(fechaInicial);

    fechas_Evento.push({'idEvento':contador,'idRenglon':contadorRenglon,'fechaInicial':fechaInicial,'fechaFinal':fechaFinal});

    $('<tr id="'+contadorRenglon+'"><td>'+fechaInicial+'</td><td>'+fechaFinal+'</td><td><button type="button" name="remover_Cortesias" class="btn btn-danger remover_Fecha_Evento">Remover</button></td></tr>').clone().appendTo("#cuerpo_Fechas_Evento"+contador);
    */
}
);

$(document).on('click','.modificar_Hora', function(){
    var dato1 = $(this).html();

    var idEventoArreglo =$(this).parents('table').attr('id').split('_')[3];
    var tr =$(this).parents('tr').attr('id');

    var fecha  =$("#fecha_renglon_"+tr).html();

    var posicion = $(this).attr('id').substr(-1);

    $("#modificarHora").val(dato1);
    $("#modificarEvento").val(idEventoArreglo);
    $("#modificarTr").val(tr);
    $("#posicion").val(posicion);
    $("#modificarFecha").val(fecha);

});

$(document).on('click','.modificar_Horario', function(){
    var idEventoArreglo = $("#modificarEvento").val();
    var tr = $("#modificarTr").val();
    var posicion =$("#posicion").val();
    var fecha = $("#modificarFecha").val();
    var hora = $("#modificarHora").val();

    if(posicion == 1){
        var indiceRenglon = fechas_Evento.findIndex((objeto)=>objeto.idRenglon == tr);


        fechas_Evento[indiceRenglon]['fechaInicial'] = fecha+' '+hora+':00';

        $('#'+tr+'_hora_1').html(hora+':00');
    }else{
        if(posicion==2){
            var indiceRenglon = fechas_Evento.findIndex((objeto)=>objeto.idRenglon == tr);

            fechas_Evento[indiceRenglon]['fechaFinal'] = fecha+' '+hora+':00';
    
            $('#'+tr+'_hora_2').html(hora+':00');
        }
    }
});

$(document).on('click','.remover_Fecha_Evento', function(){
    var parent=$(this).parents().get(1);

    var id=$(this).parents('tr').attr('id');
    var indiceRenglon = fechas_Evento.findIndex((objeto)=>objeto.idRenglon == id);

    fechas_Evento.splice(indiceRenglon,1);
    $(parent).remove();
});


$(document).on('click','.remover_Evento' , function(){

    iniciarCarga();

    var id= $(this).attr('id').split('_')[2];

    console.log('Arreglo Anterior: ' + JSON.stringify(fechas_Evento));
    var longitud = fechas_Evento.length;

    for(var i =0; i<longitud;i++){
        indiceRenglon = fechas_Evento.findIndex((objeto)=>objeto.idEvento == id);

        if(indiceRenglon != -1){
            fechas_Evento.splice(indiceRenglon,1);
        }
    }

    console.log('Arreglo Actual: ' + JSON.stringify(fechas_Evento));

    $('#contenedor_Evento_'+id).remove();    

    cerrarCarga();
});
/**--------------------------------------------------------------------------- */

$("#asociarTarjetas").click(function(){
    var idEvento = $("#idEventoLote").val();
    var idLote = $("#idLote option:selected").val();
    var folioInicial = $("#folioInicial").val();
    var folioFinal = $("#folioFinal").val();
    $.ajax({
        beforeSend: function(){
            iniciarCarga();
        },
        type: "POST",
        url: 'Eventos/Agregar_Tarjetas_Evento',
        data: {'idEventoLote':idEvento,'idLote':idLote,'folioInicial':folioInicial,'folioFinal':folioFinal},
        dataType: 'JSON',
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            cerrarCarga();
        },
    }).done(function(data){
        if(data.respuesta){
            //alert('function');
            cerrarCarga();
            location.reload();
        }
    }
    );
});


$(document).on('change', '#idLote', function(event) {
    const opcion = ($("#idLote option:selected").val());

    $.ajax({
        beforeSend: function(){
            iniciarCarga();
        },
        type: "POST",
        url: 'Eventos/Mostrar_Tarjetas_Nuevas',
        data: {"idLote": opcion},
        dataType: 'JSON',
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            cerrarCarga;
        },
    }).done(function(data){
        var folio = [];
        for(var i =0;i<data.msj.length;i++){
            folio[i] = data.msj[i]['Folio'];
        }
        $("#folios").val(folio);
        cerrarCarga();
    });
});

/*-------------------------------------Promociones_Evento---------------------------------------------------*/

$("#np").click(function(){
    contadorPromociones = contadorPromociones + 1;
    $(
        '<tr class="b-promociones" id="'+contadorPromociones+'">'+
            '<td>'+
                '<div class="form-group">'+
                    '<label for="promocion_Categoria">Elige el tipo de Promoción</label>'+
                    '<select name="promocion_Categoria" id="promocion_Categoria" class="option_Promocion form-control">'+
                        '<option value="0">Opciones</option>'+
                        '<option value="1">Dos x Uno</option>'+
                        '<option value="2">Pulcera Mágica</option>'+
                        '<option value="3">Juegos Grátis</option>'+
                        '<option value="4">Creditos Cortesia</option>'+
                    '</select>'+
                '</div>'+
            '</td>'+
        '</tr>'
    ).clone().appendTo("#tabla_Agregar_Promociones");
});

$(document).on('change','#promocion_Categoria', function(event){
    var id = $(this).parents('tr').attr('id');
    
    nombre_Promocion_Html='';
    option_Nombre_Html='';
    precio_Promocion_Html='';
    creditos_Promocion_Html='';
    fechas_Promocion_Html='';
    tabla_Fechas_Html='';
    precio_Promocion =[];
    id_Promocion= [];
    contadorFila=0;
    diaInicial=[],diaFinal=[],precio=[];
    //opcion=$(this).val();
    //console.log(opcion);
    //alert(opcion);
    opcion =($("#promocion_Categoria option:selected").val());
    
    if(opcion==0){

        $(".modal-body #area_Nombre_Promocion").html(nombre_Promocion_Html);
        $(".modal-body #area_Precio_Promocion").html(precio_Promocion_Html);
        $(".modal-body #area_Creditos_Promocion").html(creditos_Promocion_Html);
    }
    else{
        $.ajax({
            beforeSend:function(){
                iniciarCarga();
            },
            type:"POST",
            url:'Eventos/Mostrar_Promociones',
            data: {'promocion':opcion},
            dataType:'JSON',
            error: function(jqXHR, textStatus, errorThrown){
                alert('Se produjo un error: a'+ errorThrown + ' ' + textStatus);
                cerrarCarga();
            },
        }).done(function(data){
            if(data.respuesta){
                option_Nombre_Html +='<option value="">Selecciona una promoción</option>';

                precio_Promocion_Html +='<label for="precio_Promocion">Precio de la Promoción</label>'+
                '<input type="number" class="form-control" name="precio_Promocion" id="precio_Promocion" placeholder="Precio Promoción" value="">';

                fechas_Promocion_Html +='<center><label>Días</label>'+
                '<br>'+
                '<label for="horai">Hora de Inicio</label>'+
                '<input id="dateinicio" class="form-control" type="datetime-local">'+
                '<label for="horaf">Hora de Finalizacion</label>'+
                '<input id="nombre2" class="form-control" type="datetime-local">'+
                '<label for="precioes">Precio</label>'+
                '<input id="precioes" class="form-control" type="number" placeholder="Ingresa un precio">'+
                '<input id="creditosI" name="creditosI" class="form-control" type="hidden" placeholder="Creditos cortesia" value="0">'+
                '<br>'+
                '<button id="adicionar" class="btn btn-success" type="button">Agregar</button></center><br>';
                
                tabla_Fechas_Html +='<tr>'+
                '<th>Hora Inicio</th>'+
                '<th>Hora Fin</th>'+
                '<th>Precio</th>'+
                '<th>Eliminar</th>'+
                '</tr>';

                switch(opcion){
                    case '1':
                        precio_Promocion_Html ='<label for="cantidad">Cantidad de personas por pase</label>'+
                        '<input type="number" class="form-control" name="cantidad" id="cantidad" placeholder="Personas por pase" value="">'+
                        '<label for="cantidad_Boletos">Cantidad de pases a cobrar</label>'+
                        '<input type="number" class="form-control" name="cantidad_Boletos" id="cantidad_Boletos" placeholder="Boletos a cobrar" value="">';

                        fechas_Promocion_Html ='<center><label>Días</label>'+
                        '<br>'+
                        '<label for="horai">Hora de Inicio</label>'+
                        '<input id="dateinicio" class="form-control" type="datetime-local">'+
                        '<label for="horaf">Hora de Finalizacion</label>'+
                        '<input id="nombre2" class="form-control" type="datetime-local">'+
                        '<input id="precioes" class="form-control" type="hidden" placeholder="Ingresa un precio" value="0">'+
                        '<input id="creditosI" name="creditosI" class="form-control" type="hidden" placeholder="Creditos cortesia" value="0">'+
                        '<br>'+
                        '<button id="adicionar" class="btn btn-success" type="button">Agregar</button></center><br>';
                        
                        tabla_Fechas_Html ='<tr>'+
                        '<th>Hora Inicio</th>'+
                        '<th>Hora Fin</th>'+
                        '<th>Eliminar</th>'+
                        '</tr>';

                        for(var i=0;i<data.msj.length;i++){

                            option_Nombre_Html +='<option value="'+data.msj[i]['idDosxUno']+'">"'+data.msj[i]['Nombre']+'"</option>';

                            precio_Promocion.push({'idPromocion':data.msj[i]['idDosxUno'],'Cantidad':data.msj[i]['Cantidad'],'Boletos':data.msj[i]['Boletos']});
                        }
                        
                    break;
    
                    case '2':
                        for(var i=0;i<data.msj.length;i++){
                            option_Nombre_Html +='<option value="'+data.msj[i]['idPulseraMagica']+'">"'+data.msj[i]['Nombre']+'"</option>';

                            precio_Promocion.push({'idPromocion':data.msj[i]['idPulseraMagica'],'Precio':data.msj[i]['Precio']});
                        }
                    break;
    
                    case '3':
                        for(var i=0;i<data.msj.length;i++){
                            option_Nombre_Html +='<option value="'+data.msj[i]['idJuegosGratis']+'">"'+data.msj[i]['Nombre']+'"</option>';

                            precio_Promocion.push({'idPromocion':data.msj[i]['idJuegosGratis'],'Precio':data.msj[i]['Precio']});
                        }
                    break;
    
                    case '4':
                        for(var i=0;i<data.msj.length;i++){
                            option_Nombre_Html +='<option value="'+data.msj[i]['idCC']+'">"'+data.msj[i]['Nombre']+'"</option>';

                            precio_Promocion.push({'idPromocion':data.msj[i]['idCC'],'Precio':data.msj[i]['Precio'],'Creditos':data.msj[i]['Creditos']});
                        }    
                        creditos_Promocion_Html +='<label for="creditos_Promocion">Creditos de la promoción</label>'+
                        '<input type="number" class="form-control" name="creditos_Promocion" id="creditos_Promocion" placeholder="Creditos Promoción">';

                        fechas_Promocion_Html ='<center><label>Días</label>'+
                        '<br>'+
                        '<label for="horai">Hora de Inicio</label>'+
                        '<input id="dateinicio" class="form-control" type="datetime-local">'+
                        '<label for="horaf">Hora de Finalizacion</label>'+
                        '<input id="nombre2" class="form-control" type="datetime-local">'+
                        '<label for="precioes">Precio</label>'+
                        '<input id="precioes" class="form-control" type="number" placeholder="Ingresa un precio">'+
                        '<label for="creditosI">Creditos</label>'+
                        '<input id="creditosI" name="creditosI" class="form-control" type="number" placeholder="Creditos cortesia">'+
                        '<br>'+
                        '<button id="adicionar" class="btn btn-success" type="button">Agregar</button></center><br>';

                        tabla_Fechas_Html ='<tr>'+
                        '<th>Hora Inicio</th>'+
                        '<th>Hora Fin</th>'+
                        '<th>Precio</th>'+
                        '<th>Creditos</th>'+
                        '<th>Eliminar</th>'+
                        '</tr>';
                    break;

                    default:
                        console.log('MINIMO ENTRAS AQUI?');
                    break;
                }
                cerrarCarga();
            }

            nombre_Promocion_Html +=
                '<label for="promociones">Nombre de la promocion</label>'+
                '<select name="promociones" id="promociones" class="form-control">'+option_Nombre_Html+'</select>';


            $(".modal-body #area_Nombre_Promocion").html(nombre_Promocion_Html);
            $(".modal-body #area_Precio_Promocion").html(precio_Promocion_Html);
            $(".modal-body #area_Creditos_Promocion").html(creditos_Promocion_Html);
            $(".modal-body #area_Fechas_Promocion").html(fechas_Promocion_Html);
            $(".modal-body #mytable").html(tabla_Fechas_Html);
                //$(".modal-body #mytable").html();

            cerrarCarga();
        });
    }
});

$(document).on('change','#promociones',function(event){
    const id = ($("#promociones option:selected").val());
    contadorFila=0;
    diaInicial=[],diaFinal=[],precio=[];

    const indice = precio_Promocion.findIndex((objeto) => objeto.idPromocion == id);

    switch(opcion){
        case '1':
            if(id !=""){
                $("#cantidad").val(precio_Promocion[indice]['Cantidad']);
                $("#cantidad_Boletos").val(precio_Promocion[indice]['Boletos']);
            }else{
                $("#cantidad").val('');
                $("#cantidad_Boletos").val('');
            }
        break;

        case '2':
            if(id !=""){
                $("#precio_Promocion").val(precio_Promocion[indice]['Precio']);
            }else{
                $("#precio_Promocion").val('');
            }
        break;

        case '3':
            if(id !=""){
                $("#precio_Promocion").val(precio_Promocion[indice]['Precio']);
            }else{
                $("#precio_Promocion").val('');
            }
        break;

        case '4':
            if(id != ""){
                $("#precio_Promocion").val(precio_Promocion[indice]['Precio']);
                $("#creditos_Promocion").val(precio_Promocion[indice]['Creditos']);
            }
            else{
                $("#precio_Promocion").val('');
                $("#creditos_Promocion").val('');
            }
        break;
    }
    if(opcion == 4){
    }
    else{
    }
    $(".modal-body #area_Fechas_Promocion").html(fechas_Promocion_Html);
    $(".modal-body #mytable").html(tabla_Fechas_Html);
});

$(document).on('click','.mostrar_Promociones_Evento', function(){
    var idEvento = $(this).data('book-id');
    $("#idEventoPromocion").val(idEvento['idEvento']);
});

$(document).on('click','#adicionar',function(evento){

    //alert("Sirve la seleccion:" + ($("#promociones option:selected").val()));

    var opcion = ($("#promocion_Categoria option:selected").val());;

    var nombre = document.getElementById("dateinicio").value+":00";
    var nombre2 = document.getElementById("nombre2").value+":00";
    var precioe = document.getElementById("precioes").value;
    var creditos = document.getElementById("creditosI").value;

    switch(opcion){
        case '1':
            if(precioe === ""){
                precioe = document.getElementById("precio_Promocion").value;
            }
            var fila = '<tr id="row' + contadorFila + '"><td>' + nombre + '</td><td>' + nombre2 + '</td><td><button type="button" name="remove" id="' + contadorFila + '" class="btn btn-danger btn_remove">Quitar</button></td></tr>'; //esto seria lo que contendria la fila
            
            diaInicial.push({"diaInicial":nombre});
            diaFinal.push({"diaFinal":nombre2});
            precio.push({"precio":precioe});
            contadorFila++;
        
            $('#mytable tr:first').after(fila);
            $("#adicionados").text(""); //esta instruccion limpia el div adicioandos para que no se vayan acumulando
            var nFilas = $("#mytable tr").length;
            $("#adicionados").append(nFilas - 1);
        break;

        case '2':
            if(precioe === ""){
                precioe = document.getElementById("precio_Promocion").value;
            }
            var fila = '<tr id="row' + contadorFila + '"><td>' + nombre + '</td><td>' + nombre2 + '</td><td>' + precioe + '</td><td><button type="button" name="remove" id="' + contadorFila + '" class="btn btn-danger btn_remove">Quitar</button></td></tr>'; //esto seria lo que contendria la fila
            
            diaInicial.push({"diaInicial":nombre});
            diaFinal.push({"diaFinal":nombre2});
            precio.push({"precio":precioe});
            contadorFila++;
        
            $('#mytable tr:first').after(fila);
            $("#adicionados").text(""); //esta instruccion limpia el div adicioandos para que no se vayan acumulando
            var nFilas = $("#mytable tr").length;
            $("#adicionados").append(nFilas - 1);
        break;

        case '3':
            if(precioe === ""){
                precioe = document.getElementById("precio_Promocion").value;
            }
            var fila = '<tr id="row' + contadorFila + '"><td>' + nombre + '</td><td>' + nombre2 + '</td><td>' + precioe + '</td><td><button type="button" name="remove" id="' + contadorFila + '" class="btn btn-danger btn_remove">Quitar</button></td></tr>'; //esto seria lo que contendria la fila
            
            diaInicial.push({"diaInicial":nombre});
            diaFinal.push({"diaFinal":nombre2});
            precio.push({"precio":precioe});
            contadorFila++;
        
            $('#mytable tr:first').after(fila);
            $("#adicionados").text(""); //esta instruccion limpia el div adicioandos para que no se vayan acumulando
            var nFilas = $("#mytable tr").length;
            $("#adicionados").append(nFilas - 1);
        break;

        case '4':
            if(precioe === ""){
                precioe = document.getElementById("precio_Promocion").value;
            }
    
            if(creditos === ""){
                creditos = document.getElementById("creditos_Promocion").value;
                console.log("Entro aqui?");
            }
            var fila = '<tr id="row' + contadorFila + '"><td>' + nombre + '</td><td>' + nombre2 + '</td><td>' + precioe + '</td><td>'+creditos+'</td><td><button type="button" name="remove" id="' + contadorFila + '" class="btn btn-danger btn_remove">Quitar</button></td></tr>'; //esto seria lo que contendria la fila
            
            diaInicial.push({"diaInicial":nombre});
            diaFinal.push({"diaFinal":nombre2});
            precio.push({"precio":precioe});
            creditos_Promocion.push({"creditos":creditos});
            contadorFila++;
        
            $('#mytable tr:first').after(fila);
            $("#adicionados").text(""); //esta instruccion limpia el div adicioandos para que no se vayan acumulando
            var nFilas = $("#mytable tr").length;
            $("#adicionados").append(nFilas - 1);
        break;
    }
});
/*
$(document).on('click','#agregar_Promocion_Evento',function(){
    var idEvento = document.getElementById("idEventoPromocion").value;
    var tipoPromocion = document.getElementById("promocion_Categoria").value;
    
    if(tipoPromocion != 4){
        $.ajax({
            beforeSend: function(){
                iniciarCarga();
            },
            type: "GET",
            url: 'Eventos/Agregar_Promocion_Evento',
            data: {"idEvento":idEvento,"tipoPromocion":tipoPromocion,"idPromocion":($("#promociones option:selected").val()),"creditos":0,"fechaInicio":diaInicial,"fechaFinal":diaFinal,"precio":precio},
            dataType: 'JSON',
            error: function (jqXHR, textStatus, errorThrown) {
                alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
                cerrarCarga();
            },
        }).done(function(data){
            if(data.respuesta){
                cerrarCarga();
                location.reload();
            }
            else{
                alert('Ha ocurrido un error');
            }
        });
    }
    else{
        $.ajax({
            beforeSend:function(){
                iniciarCarga();
            },
            type: "GET",
            url: 'Eventos/Agregar_Promocion_Evento',
            data: {"idEvento":idEvento,"tipoPromocion":tipoPromocion,"idPromocion":($("#promociones option:selected").val()),"creditos":creditos_Promocion,"fechaInicio":diaInicial,"fechaFinal":diaFinal,"precio":precio},
            dataType: 'JSON',
            error: function (jqXHR, textStatus, errorThrown) {
                alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
                cerrarCarga();
            },
        }).done(function(data){
            if(data.respuesta){
                cerrarCarga();
                location.reload();
            }
            else{
                alert('Ha ocurrido un error');
                cerrarCarga();
            }
        });
    }
});
*/

$(document).on('click', '.btn_remove', function() {
    var opcion = ($("#promocion_Categoria option:selected").val());;
    var button_id = $(this).attr("id");
    //cuando da click obtenemos el id del boton
    $('#row' + button_id + '').remove(); //borra la fila
    //limpia el para que vuelva a contar las filas de la tabla
    $("#adicionados").text("");
    var nFilas = $("#mytable tr").length;
    $("#adicionados").append(nFilas - 1);

    if(opcion != 4){
        diaInicial.splice(button_id,1);
        diaFinal.splice(button_id,1);
        precio.splice(button_id,1);
    }
    else{
        diaInicial.splice(button_id,1);
        diaFinal.splice(button_id,1);
        precio.splice(button_id,1);
        creditos_Promocion.splice(button_id,1);
    }           
});


/*------------------------------Atracciones_Evento--------------------------------------------------------*/
$(document).on('click','.mostrar_Atracciones_Evento', function(){
    iniciarCarga();
    $("#atraccionesAdd").DataTable().destroy();
    atraccion_Promocion_Descuentos = [];
    atraccion_Promocion_Pulsera = [];
    atraccion_Promocion_Juegos = [];

    var idEvento = $(this).data('book-id');
    var html ='';
    var html_Promociones ='';
    var atracciones_Html='', contrato_Html='', poliza_Html=''; 
    var option_Atracciones_Html='', option_Contrato_Html='', option_Poliza_Html='',option_Zonas_Html='';

    var promociones_Html='', descuentos_Html='', pulsera_Html='', juegos_Gratis_Html='',creditos_Cortesia_Html='',zonas_Html='';

    $.ajax({
        type: "POST",
        url: 'Eventos/Mostrar_Atracciones',
        data: idEvento,
        dataType: 'JSON',
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            cerrarCarga();
        },
    }).done(function(data){
        if(data.respuesta){

            if(data.descuentos.length === 0){
                descuentos_Html ='<label for="poliza">Promociones:</label>';
            }
            else{
                for(var i = 0; i<data.descuentos.length; i++){
                    descuentos_Html +='<input type="checkbox" class="3" name="descuentos[]" id="descuentos" value="'+data.descuentos[i]['idDosxUno']+'" />'+data.descuentos[i]['Nombre']+'<br>';
                }
            }

            if(data.pulsera.length === 0){
            }
            else{
                for(var i = 0; i<data.pulsera.length; i++){
                    pulsera_Html +='<input type="checkbox" class="pulsera_Magica_2" name="pulsera[]" id="pulsera" value="'+data.pulsera[i]['idPulseraMagica']+'">'+data.pulsera[i]['Nombre']+'<br>';
                }
            }

            if(data.juegosGratis.length === 0){
            }else{
                for(var i = 0; i<data.juegosGratis.length; i++){
                    juegos_Gratis_Html+='<input type="checkbox" class="juegos_Gratis_3" name="juegos_Gratis[]" id="juegos_Gratis" value="'+data.juegosGratis[i]['idJuegosGratis']+'">'+data.juegosGratis[i]['Nombre']+'<br>';
                }
            }

            if(data.creditosCortesia.length === 0){
            }
            else{
                for(var i = 0; i<data.creditosCortesia.length; i++){}
            }
            
            for(var i = 0;i<data.msj.Atraccion.length; i++){
                html_Promociones = '';

                for(var j = 0;j<data.msj.Descuentos.length; j++){

                    if(data.msj.Atraccion[i]['idAtraccion'] == data.msj.Descuentos[j]['idAtraccion']){
                        html_Promociones += data.msj.Descuentos[j]['Nombre']+', ' ;
                    }

                }

                for(var j = 0; j<data.msj.Pulsera.length; j++){

                    if(data.msj.Atraccion[i]['idAtraccion'] == data.msj.Pulsera[j]['idAtraccion']){
                        html_Promociones += data.msj.Pulsera[j]['Nombre'] + ', ';
                    }

                }

                for(var j = 0; j<data.msj.Juegos.length; j++){

                    if(data.msj.Atraccion[i]['idAtraccion'] == data.msj.Juegos[j]['idAtraccion']){
                        html_Promociones += data.msj.Juegos[j]['Nombre'] + ', ';
                    }

                }


                html += '<tr>'+
                '<td><a href="#editar_Atraccion_Evento" class="editar_Atraccion" data-toggle="modal" data-book-id='+"'{"+'"idAtraccionEvento":'+data.msj.Atraccion[i]['idAtraccionEvento']+','+'"idAtraccion":'+data.msj.Atraccion[i]['idAtraccion']+','+'"atraccion":"'+data.msj.Atraccion[i]['Atraccion']+'",'+'"creditos":'+data.msj.Atraccion[i]['Creditos']+','+'"idContrato":'+data.msj.Atraccion[i]['idContrato']+','+'"contrato":"'+data.msj.Atraccion[i]['Contrato']+'",'+'"idPoliza":'+data.msj.Atraccion[i]['idPoliza']+','+'"poliza":"'+data.msj.Atraccion[i]['Poliza']+'",'+'"idZona":'+data.msj.Atraccion[i]['idZona']+','+'"Zona":"'+data.msj.Atraccion[i]['Zona']+'"'+"}'"+'><i class="fa fa-paint-brush btn btn-outline-warning" aria-hidden="true"></i></a></td>'+
                '<td>'+data.msj.Atraccion[i]['Atraccion']+'</td>'+
                '<td>'+data.msj.Atraccion[i]['Creditos']+'</td>'+
                '<td>'+html_Promociones+'</td>'+
                '<td>'+data.msj.Atraccion[i]['Contrato']+'</td>'+
                '<td>'+data.msj.Atraccion[i]['Poliza']+'</td>'+
                '<td>'+data.msj.Atraccion[i]['Zona']+'</td>'+
                '</tr>';
                
            }

            for(var i= 0; i<data.atracciones.length; i++){
                option_Atracciones_Html += '<option value="'+data.atracciones[i]['idAtraccion']+'">"'+data.atracciones[i]['Nombre']+'"</option>';
            }

            for(var i= 0; i<data.contratos.length; i++){
                option_Contrato_Html += '<option value="'+data.contratos[i]['idContrato']+'">"'+data.contratos[i]['Nombre']+'"</option>';
            }

            for(var i= 0; i<data.polizas.length; i++){
                option_Poliza_Html += '<option value="'+data.polizas[i]['idPoliza']+'">"'+data.polizas[i]['Nombre']+'"</option>';
            }
            
            for(var i=0; i<data.zonas.length; i++){
                option_Zonas_Html += '<option value="'+data.zonas[i]['idZona']+'">"'+data.zonas[i]['Nombre']+'"</option>'
            }

            atracciones_Html +='<label for ="atracciones_Nuevas">Nombre de la atracción</label>'+
            '<select name="atracciones_Nuevas[]" id ="atracciones_Nuevas" class="form-control">'+option_Atracciones_Html+'</select>';

            contrato_Html +='<label for="contrato">Agregar Contrato</label>'+
            '<select name="contrato[]" id="contrato" class="form-control">'+option_Contrato_Html+'</select>';

            poliza_Html +='<label for="poliza">Agregar Poliza</label>'+
            '<select name="poliza[]" id="poliza" class="form-control">'+option_Poliza_Html+'</select>';

            zonas_Html += '<label for="atraccion_Zona">Agregar Zona</label>'+
            '<select name="atraccion_Zona[]" id="atraccion_Zona" class="form-control">'+option_Zonas_Html+'</select>';
        }

        
        $("#nuevas_Atracciones").html(atracciones_Html);
        $("#nuevos_Contratos").html(contrato_Html);
        $("#nuevas_Polizas").html(poliza_Html);
        $("#nueva_Zona").html(zonas_Html);
        $("#atraccionesEvento").html(html);
        $("#promocion_Descuentos").html(descuentos_Html);
        $("#promocion_Pulsera").html(pulsera_Html);
        $("#promocion_Juegos_Gratis").html(juegos_Gratis_Html);
        $("#idEventoAtraccion").val(idEvento['idEvento']);

        $('#atraccionesAdd').DataTable( {
            "aProcessing": true,//Activamos el procesamiento del datatables
            "aServerSide": true,//Paginación y filtrado realizados por el servidor
            dom: 'Bfrtip',//Definimos los elementos del control de tabla
            buttons: [		          
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdf'
            ],
            "bDestroy": true,
            "iDisplayLength": 15,//Paginación
            "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
        });

        cerrarCarga();
    });
});

$(document).on('click','.descuentos_1',function(){

    idCheckBox = $(this).val();
    idBloque = $(this).parents('tr').attr('id');

    if($(this).is(':checked')){

        atraccion_Promocion_Descuentos.push({'idDosxUno':idCheckBox,'idBloque':idBloque});
    
    }
    else{

        atraccion_Promocion_Descuentos.forEach(function(data,index){


            if(idCheckBox === data.idDosxUno && idBloque === data.idBloque){
                atraccion_Promocion_Descuentos.splice(index,1);
            }

        });

    }
});

$(document).on('click','.pulsera_Magica_2',function(){
    idCheckBox = $(this).val();
    idBloque  = $(this).parents('tr').attr('id');

    if($(this).is(':checked')){
        atraccion_Promocion_Pulsera.push({'idPulseraMagica':idCheckBox,'idBloque':idBloque});
    }
    else{

        atraccion_Promocion_Pulsera.forEach(function(data, index){

            if(idCheckBox === data.idPulseraMagica && idBloque === data.idBloque){
                atraccion_Promocion_Pulsera.splice(index,1);
            }

        });
    }

});

$(document).on('click','.juegos_Gratis_3', function(){

    idCheckBox = $(this).val();
    idBloque = $(this).parents('tr').attr('id');


    if($(this).is(':checked')){

        atraccion_Promocion_Juegos.push({'idJuegosGratis':idCheckBox,'idBloque':idBloque});

    }
    else{
        atraccion_Promocion_Juegos.forEach(function(data,index){

            if(idCheckBox === data.idJuegosGratis && idBloque === data.idBloque){
                atraccion_Promocion_Juegos.splice(index,1);
            }

        });
    }
});

$("#agregar_Atracciones").click(function(){

    evento = "";
    atracciones = [];
    creditos = [];
    contrato = [];
    poliza = [];
    zonas = [];
    
    evento = $("#idEventoAtraccion").val();
    datos = $("#formulario_Agregar_Atracciones").serializeArray();

    $.each(datos, function(i, dato){
        console.log('data: ' + dato.name);
        if(dato.name === "atracciones_Nuevas[]"){
            atracciones.push(dato.value);
        }
        if(dato.name === "credito[]"){
            creditos.push(dato.value);
        }
        if(dato.name === "contrato[]"){
            contrato.push(dato.value);
        }
        if(dato.name === "poliza[]"){
            poliza.push(dato.value);
        }
        if(dato.name === "atraccion_Zona[]"){
            zonas.push(dato.value);
        }
    });

    if(!atraccion_Promocion_Descuentos.length){
        atraccion_Promocion_Descuentos.push("N");
    }

    if(!atraccion_Promocion_Pulsera.length){
        atraccion_Promocion_Pulsera.push("N");
    }

    if(!atraccion_Promocion_Juegos.length){
        atraccion_Promocion_Juegos.push("N");
    }

    $.ajax({
        beforeSend: function(){
            iniciarCarga();
        },
        type: "POST",
        url: 'Eventos/Agregar_Atraccion_Evento',
        data: {'idEvento':evento,'atracciones':atracciones,'creditos':creditos,'contrato':contrato,'poliza':poliza,'zonas':zonas,'descuentos':atraccion_Promocion_Descuentos,'pulsera':atraccion_Promocion_Pulsera,'juegos_Gratis':atraccion_Promocion_Juegos},
        dataType: 'JSON',
        error: function(jqXHR, textStatus, errorThrown){
            alert('Se produjo un error: a ' + errorThrown + ' ' + textStatus + ' ' + jqXHR);
            cerrarCarga();
        },
    }).done(function(data){
        if(data.respuesta){
            cerrarCarga();
            location.reload();
        }
    });

});

$("#nuevaAt").click(function(){
    contadorAtraccion = contadorAtraccion + 1;
    $("#agregarAtracciones tbody tr:eq(0)").clone().attr('id',contadorAtraccion).removeClass('f-Atracciones').appendTo("#agregarAtracciones");
});
/**--- Aqui seguimos */
$(document).on('click','.editar_Atraccion', function(){
    var idAtraccionEvento_Html = '';
    var contrato_Seleccionado_Html ='';
    var poliza_Seleccionada_Html = '';
    var zona_Seleccionada_Html = '';
    var contratos_Html = '';
    var polizas_Html = '';
    var zonas_Html = '';
    var descuentos_Html= '';
    var pulsera_Html = '';
    var juegos_Html = '';
    var select_Contratos_Html = '';
    var select_Polizas_Html='';
    var select_Zona_Html = '';
    var nombre_Html="";
    var datos_Atraccion = $(this).data('book-id');
    var idEvento =  $("#idEventoAtraccion").val();

    promocion_Descuentos_Atraccion_Nuevo = [];
    promocion_Descuentos_Atraccion_Eliminar = [];
    promocion_Pulsera_Atraccion_Nuevo = [];
    promocion_Pulsera_Atraccion_Eliminar = [];
    promocion_Juegos_Atraccion_Nuevo = [];
    promocion_Juegos_Atraccion_Eliminar = [];

    idAtraccionEvento_Html += '<input class="form-control" type="hidden" id="idAtraccionEvento" name="idAtraccionEvento" value="'+datos_Atraccion['idAtraccionEvento']+'">';

    contrato_Seleccionado_Html = '<option value="'+datos_Atraccion['idContrato']+'">"'+datos_Atraccion['contrato']+'"</Option>';
    poliza_Seleccionada_Html = '<option value="'+datos_Atraccion['idPoliza']+'">"'+datos_Atraccion['poliza']+'"</option>';
    zona_Seleccionada_Html = '<option value="'+datos_Atraccion['idZona']+'">'+datos_Atraccion['Zona']+'</option>';


    $.ajax({
        beforeSend:function(){
            iniciarCarga();
        },
        type: "POST",
        url: 'Eventos/Editar_Atraccion_Evento',
        data: {'idAtraccionEvento':datos_Atraccion['idAtraccionEvento'],'idEvento':idEvento},
        dataType: 'JSON',
        error: function(jqXHR, textStatus, errorThrown){
            alert('Se produjo un error : a' + errorThrown + ' ' + textStatus);
            cerrarCarga();
        },
    }).done(function(data){
        
        nombre_Html += '<label for="nombre_Atraccion">Nombre</label><br>' +
        '<label id="nombre_Atraccion" name="nombre_Atraccion" value='+datos_Atraccion['idAtraccion']+'>'+datos_Atraccion['atraccion']+'</label>';
        
        for(var i=0; i<data.Contratos.length; i++){
            contratos_Html += '<option value="'+data.Contratos[i]['idContrato']+'">"'+data.Contratos[i]['Nombre']+'"</option>';
        }

        for(var i=0; i<data.Polizas.length; i++){
            polizas_Html +='<option value="'+data.Polizas[i]['idPoliza']+'">"'+data.Polizas[i]['Nombre']+'"</option>';
        }

        for(var i=0; i<data.Zonas.length;i++){
            zonas_Html +='<option value="'+data.Zonas[i]['idZona']+'">'+data.Zonas[i]['Nombre']+'</option>'
        }

        select_Contratos_Html += '<label for="contrato">Contratos</label><br>'+
        '<select class="form-control" type="text" name="contrato_Atraccion[]" id="contrato_Atraccion">'+contrato_Seleccionado_Html+''+contratos_Html+'</select>';

        select_Polizas_Html +='<label for="contrato">Polizas</label><br>'+
        '<select class="form-control" type="text" name="poliza[]" id="poliza_Atraccion">'+poliza_Seleccionada_Html+''+polizas_Html+'</select>';

        select_Zona_Html += '<label>Zonas</label>'+
        '<select class="form-control" type="text" name="zona[]" id="zona_Atraccion">'+zona_Seleccionada_Html+''+zonas_Html+'</select>';



        for(var i= 0; i<data.Descuentos.length; i++){
            
            if(data.msj.Descuentos.find(object => object.idDosxUno == data.Descuentos[i]['idDosxUno'])){
                descuentos_Html += '<input type="checkbox" checked="checked" class="descuentos_Atraccion", id="descuentosAtraccion", name="descuentosAtraccion[]", value="'+data.Descuentos[i]['idDosxUno']+'">'+data.Descuentos[i]['Nombre'];
            }
            else{
                descuentos_Html += '<input type="checkbox" class="descuentos_Atraccion", id="descuentosAtraccion", name="descuentosAtraccion[]", value="'+data.Descuentos[i]['idDosxUno']+'">'+data.Descuentos[i]['Nombre'];
            }
            
        }

        for(var i=0; i<data.Pulsera.length; i++){
            if(data.msj.Pulsera.find(object => object.idPulseraMagica == data.Pulsera[i]['idPulseraMagica'])){
                pulsera_Html += '<input type="checkbox" checked="checked" class="pulsera_Atraccion", id="pulseraAtraccion", name="pulseraAtraccion[]", value="'+data.Pulsera[i]['idPulseraMagica']+'">'+data.Pulsera[i]['Nombre'];
            }
            else{
                pulsera_Html += '<input type="checkbox" class="pulsera_Atraccion", id="pulseraAtraccion", name="pulseraAtraccion[]", value="'+data.Pulsera[i]['idPulseraMagica']+'">'+data.Pulsera[i]['Nombre'];
            }
        }

        for(var i=0; i<data.Juegos.length; i++){
            if(data.msj.Juegos.find(object => object.idJuegosGratis == data.Juegos[i]['idJuegosGratis'])){
                juegos_Html += '<input type="checkbox" checked="checked" class="juegos_Gratis_Atraccion", id="juegoAtraccion", name="juegoAtraccion[]", value="'+data.Juegos[i]['idJuegosGratis']+'">'+data.Juegos[i]['Nombre'];
            }
            else{
                juegos_Html += '<input type="checkbox" class="juegos_Gratis_Atraccion", id="juegoAtraccion", name="juegoAtraccion[]", value="'+data.Juegos[i]['idJuegosGratis']+'">'+data.Juegos[i]['Nombre'];
            }
        }

        descuentos_Atraccion = Object.values(data.msj.Descuentos);
        pulsera_Atraccion = Object.values(data.msj.Pulsera);
        juegos_Atraccion = Object.values(data.msj.Juegos);
        
        $("#nombre_Atraccion").html(nombre_Html);
        $("#promocion_Descuentos_Atraccion").html(descuentos_Html);
        $("#promocion_Pulsera_Atraccion").html(pulsera_Html);
        $("#promocion_Juegos_Gratis_Atraccion").html(juegos_Html);
        $("#contrato_Atraccion").html(select_Contratos_Html);
        $("#poliza_Atraccion").html(select_Polizas_Html);
        $("#zonas_Atraccion").html(select_Zona_Html);
        $("#id_AtraccionEvento").html(idAtraccionEvento_Html);
        $("#creditos_Atraccion").val(datos_Atraccion['creditos']);
        cerrarCarga();
    });

});

$(document).on('click','.eliminarAt', function(){
    var id_Tr = $(this).parents('tr').attr('id');
    var parent = $(this).parents().get(0);
    $(parent).remove();
});

$(document).on('click','.descuentos_Atraccion', function(){
    var idDosxUno = $(this).val();

    if($(this).is(':checked')){
        if(descuentos_Atraccion.find(object => object.idDosxUno == idDosxUno)){
            promocion_Descuentos_Atraccion_Eliminar.forEach(function(data,index){
                if(data == idDosxUno){
                    /**Si quiere mantener la promocion ya asignada a la atraccion */
                    console.log("Se elimino: " + promocion_Descuentos_Atraccion_Eliminar.splice(index,1));
                }
            });
        }
        else{
            /**Agregara una nueva promocion a una atraccion ya agregada */
            promocion_Descuentos_Atraccion_Nuevo.push(idDosxUno);
        }
        
    }
    else{
        if(descuentos_Atraccion.find(object => object.idDosxUno == idDosxUno)){
            /**Si quiere eliminar la promocion ya asignada a la atraccion */
            console.log("se Agrego: " + promocion_Descuentos_Atraccion_Eliminar.push(idDosxUno));
        }
        else{
            promocion_Descuentos_Atraccion_Nuevo.forEach(function(data, index){
                if(data == idDosxUno){
                    /**No agregara una nueva promocion a la atraccion ya agregada */
                    promocion_Descuentos_Atraccion_Nuevo.splice(index,1);
                }
            });
        }
    }
});

$(document).on('click', '.pulsera_Atraccion', function(){
    var idPulseraMagica = $(this).val();

    if($(this).is(':checked')){
        if(pulsera_Atraccion.find(object => object.idPulseraMagica == idPulseraMagica)){
            promocion_Pulsera_Atraccion_Eliminar.forEach(function(data,index){
                if(data == idPulseraMagica){
                    /**Si quiere mantener la promocion ya asignada a la atraccion */
                    console.log("Se elimino: " + promocion_Pulsera_Atraccion_Eliminar.splice(index,1));
                }
            });
        }
        else{
            /**Agregara una nueva promocion a una atraccion ya agregada */
            promocion_Pulsera_Atraccion_Nuevo.push(idPulseraMagica);
        }
        
    }
    else{
        if(pulsera_Atraccion.find(object => object.idPulseraMagica == idPulseraMagica)){
            /**Si quiere eliminar la promocion ya asignada a la atraccion */
            console.log("se Agrego: " + promocion_Pulsera_Atraccion_Eliminar.push(idPulseraMagica));
        }
        else{
            promocion_Pulsera_Atraccion_Nuevo.forEach(function(data, index){
                if(data == idPulseraMagica){
                    /**No agregara una nueva promocion a la atraccion ya agregada */
                    promocion_Pulsera_Atraccion_Nuevo.splice(index,1);
                }
            });
        }
    }
});

$(document).on('click','.juegos_Gratis_Atraccion', function(){
    var idJuegosGratis = $(this).val();

    if($(this).is(':checked')){
        if(juegos_Atraccion.find(object => object.idJuegosGratis == idJuegosGratis)){
            promocion_Juegos_Atraccion_Eliminar.forEach(function(data,index){
                if(data == idJuegosGratis){
                    /**Si quiere mantener la promocion ya asignada a la atraccion */
                    console.log("Se elimino: " + promocion_Juegos_Atraccion_Eliminar.splice(index,1));
                }
            });
        }
        else{
            /**Agregara una nueva promocion a una atraccion ya agregada */
            promocion_Juegos_Atraccion_Nuevo.push(idJuegosGratis);
        }
        
    }
    else{
        if(juegos_Atraccion.find(object => object.idJuegosGratis == idJuegosGratis)){
            /**Si quiere eliminar la promocion ya asignada a la atraccion */
            console.log("se Agrego: " + promocion_Juegos_Atraccion_Eliminar.push(idJuegosGratis));
        }
        else{
            promocion_Juegos_Atraccion_Nuevo.forEach(function(data, index){
                if(data == idJuegosGratis){
                    /**No agregara una nueva promocion a la atraccion ya agregada */
                    promocion_Juegos_Atraccion_Nuevo.splice(index,1);
                }
            });
        }
    }
});

$("#editar_Atraccion").click(function(){
    iniciarCarga();
    var idAtraccionEvento = $("#idAtraccionEvento").val();
    var creditos = $("#creditos_Atraccion").val();
    var idContrato = $("#contrato_Atraccion option:selected").val();
    var idPoliza = $("#poliza_Atraccion option:selected").val();
    var idZona = $("#zona_Atraccion option:selected").val();

    if(!promocion_Descuentos_Atraccion_Nuevo.length){
        promocion_Descuentos_Atraccion_Nuevo = 0;
    }

    if(!promocion_Pulsera_Atraccion_Nuevo.length){
        promocion_Pulsera_Atraccion_Nuevo = 0;
    }

    if(!promocion_Juegos_Atraccion_Nuevo.length){
        promocion_Juegos_Atraccion_Nuevo = 0;
    }

    if(!promocion_Descuentos_Atraccion_Eliminar.length){
        promocion_Descuentos_Atraccion_Eliminar = 0;
    }

    if(!promocion_Pulsera_Atraccion_Eliminar.length){
        promocion_Pulsera_Atraccion_Eliminar = 0;
    }

    if(!promocion_Juegos_Atraccion_Eliminar.length){
        promocion_Juegos_Atraccion_Eliminar = 0;
    }

    $.ajax({
        type: "POST",
        url: 'Eventos/Editar_Atraccion',
        data: {'idAtraccionEvento':idAtraccionEvento,'creditos':creditos,'idZona':idZona,'idContrato':idContrato,'idPoliza':idPoliza,'descuentosNuevos':promocion_Descuentos_Atraccion_Nuevo,'pulserasNuevas':promocion_Pulsera_Atraccion_Nuevo,'juegosNuevos':promocion_Juegos_Atraccion_Nuevo,'eliminarDescuentos':promocion_Descuentos_Atraccion_Eliminar,'eliminarPulseras':promocion_Pulsera_Atraccion_Eliminar,'eliminarJuegos':promocion_Juegos_Atraccion_Eliminar},
        dataType: 'JSON',
        error: function(jqXHR, textStatus, errorThrown){
            alert('Se produjo un error: a'+ errorThrown + ' ' + textStatus);
            cerrarCarga();
        },
    }).done(function(data){
        if(data.respuesta){
            cerrarCarga();
            location.reload();
        }
    });
});

/*-----------------------------Tarjetas_Evento------------------------------------------------------*/

$(document).on('click','.mostrarTarjetasEvento', function(){
    $("#tabla_Tarjetas_Evento").DataTable().destroy();
    var idEvento = $(this).data('book-id');
    $.ajax({
        beforeSend: function(){
            iniciarCarga();
        },
        type: "POST",
        url: 'Eventos/Mostrar_Tarjetas',
        data: idEvento,
        dataType: 'JSON',
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            cerrarCarga();
        },
    }).done(function(data){

        var html ='';
        for(var i = 0;i<data.msj.length; i++){

            
            html += '<tr>'+
            '<td><a href="#editar_Cliente" class="editar" data-toggle="modal"><i class="fa fa-paint-brush btn btn-outline-warning" aria-hidden="true"></i></a></td>'+
            '<td>'+data.msj[i]['Nombre']+'</td>'+
            '<td>'+data.msj[i]['Folio']+'</td>'+
            '<td>'+data.msj[i]['FechaActivacion']+'</td>'+
            '<td>'+data.msj[i]['Iniciales']+'</td>'+
            '<td>'+data.msj[i]['Tipo']+'</td>'+
            '</tr>';
            
        }
        
        $("#idEventoLote").val(idEvento['idEvento']);
        $("#tarjetasEvento").html(html);
        $('#tabla_Tarjetas_Evento').DataTable( {
            "aProcessing": true,//Activamos el procesamiento del datatables
            "aServerSide": true,//Paginación y filtrado realizados por el servidor
            dom: 'Bfrtip',//Definimos los elementos del control de tabla
            buttons: [		          
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdf'
            ],
            "bDestroy": true,
            "iDisplayLength": 10,//Paginación
            "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
        });
        cerrarCarga();
    });
});
/*--------------------------Asociacion_Evento---------------------------------------------*/

$(document).on('click','.mostrarAsociacionEvento', function(){
    var idEvento = $(this).data('book-id');
    $.ajax({
        type: "POST",
        url: 'Eventos/Mostrar_Asociacion',
        data: idEvento,
        dataType: 'JSON',
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
        },
    }).done(function(data){

        var html ='';
        for(var i = 0;i<data.msj.length; i++){

            
            html += '<tr>'+
            '<td><a href="#editar_Cliente" class="editar" data-toggle="modal"><i class="bi bi-pencil-square btn btn-warning"></i></a></td>'+
            '<td>'+data.msj[i]['Nombre']+'</td>'+
            '<td>'+data.msj[i]['Atraccion']+'</td>'+
            '<td>'+data.msj[i]['Propietario']+'</td>'+
            '<td>'+data.msj[i]['Porcentaje1']+'</td>'+
            '<td>'+data.msj[i]['Asociado']+'</td>'+
            '<td>'+data.msj[i]['Porcentaje2']+'</td>'+
            '</tr>';
            
        }
        
        $("#asociacionEvento").html(html);
    });
});


/*-------------------------Zona_Evento-------------------------------------------------- */


$(document).on('click','.mostrar_Zonas_Evento', function(){
    var idEvento = $(this).data('book-id');
    var zonas_Html ='';

    $.ajax({
        beforeSend: function(){
            iniciarCarga();
        },
        type:"POST",
        url: 'Eventos/Mostrar_Zonas',
        data: idEvento,
        dataType: 'JSON',
        error(jqXHR, textStatus, errorThrown){
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            cerrarCarga();
        },
    }).done(function(data){
        if(data.respuesta){
            for(var i = 0; i<data.msj.length; i++){
                zonas_Html += '<tr>'+
                '<td style="text-align: center; vertical-align: middle;"><a href="#editar_Zona_Evento" class="editar_Zona" data-toggle="modal" data-book-id='+"'{"+'"idZona":'+data.msj[i]['idZona']+','+'"idEvento":'+data.msj[i]['idEvento']+','+'"Nombre":"'+data.msj[i]['Nombre']+'"'+"}'"+'><i class="fa fa-paint-brush btn btn-outline-warning" aria-hidden="true"></i></i></a></td>'+
                '<td style="text-align: center; vertical-align: middle;">'+data.msj[i]['Nombre']+'</td>'+
                '</tr>';
            }
        }
        $("#zonas_Evento").html(zonas_Html);
        $("#idEventoZona").val(idEvento['idEvento']);
        cerrarCarga();
    });
});

/*
$(document).on('click','#zona', function(){
    alert('Minimo Funciona :V');
});
*/

$("#agregar_Zona").click(function(){
    
    $.ajax({
        beforeSend: function(){
            iniciarCarga();
        },
        type:"POST",
        url: 'Eventos/Agregar_Zona',
        data: $("#formulario_Agregar_Zonas").serialize(),
        dataType: 'JSON',
        error(jqXHR, textStatus, errorThrown){
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

/**--------------------------Taquillas Evento------------------------------------------- */

$(document).on('click','.mostrar_Taquillas_Evento', function(){
    $("#tablaTaquillas").DataTable().destroy();
    var idEvento = $(this).data('book-id');
    option_Zonas_Html = '';
    select_Zonas_Html = '';
    var tabla_Taquilla_Html = '';
    var ventanillas_Html = '';
    contadorTaquilla = 0;
    contadorVentanilla = 0;

    $.ajax({
        beforeSend: function(){
            iniciarCarga();
        },
        type: "POST",
        url: 'Eventos/Mostrar_Taquillas',
        data: idEvento,
        dataType: 'JSON',
        error(jqXHR, textStatus, errorThrown){
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);7
            cerrarCarga();
        },
    }).done(function(data){
        if(data.respuesta){
            for(var i=0; i<data.Zonas.length; i++){
                option_Zonas_Html += '<option value="'+data.Zonas[i]['idZona']+'">"'+data.Zonas[i]['Nombre']+'"</option>';
            }

            for(var i=0; i<data.Taquilla.length; i++){
                var arreglo = [];
                var datos_Ventanilla = '';

                for(var j=0; j<data.Ventanilla.length; j++){
                    if(data.Taquilla[i]['idTaquilla'] == data.Ventanilla[j]['idTaquilla']){
                        ventanillas_Html += data.Ventanilla[j]['Nombre']+', ';
                        arreglo.push({'idVentanilla':data.Ventanilla[j]['idVentanilla'],'Nombre':data.Ventanilla[j]['Nombre']});
                    }
                }

                datos_Ventanilla = JSON.stringify(arreglo);

                tabla_Taquilla_Html +='<tr>'+
                '<td style="text-align: center; vertical-align: middle;"><a href="#modal_Editar_Taquillas" class="editar_Taquillas" data-toggle="modal" data-book-id='+"'{"+'"datos":'+datos_Ventanilla+','+'"idTaquilla":'+data.Taquilla[i]['idTaquilla']+','+'"Nombre":"'+data.Taquilla[i]['Nombre']+'",'+'"idZona":'+data.Taquilla[i]['idZona']+','+'"Zona":"'+data.Taquilla[i]['Zona']+'",'+'"idEvento":'+JSON.stringify(idEvento)+''+"}'"+'><i class="fa fa-paint-brush btn btn-outline-warning" aria-hidden="true"></i></a></td>'+
                '<td style="text-align: center; vertical-align: middle;">'+data.Taquilla[i]['Zona']+'</td>'+
                '<td style="text-align: center; vertical-align: middle;">'+data.Taquilla[i]['Nombre']+'</td>'+
                '<td style="text-align: center; vertical-align: middle;">'+ventanillas_Html+'</td>'+
                '</tr>';
                ventanillas_Html ='';
            }
        }

        select_Zonas_Html += '<label for="selectZona">Selecciona la zona</label>'+
        '<select class="form-control" type="text" name ="selectZona[]" id="selectZona">'+option_Zonas_Html+'</select>';

        $("#agregarTaq").html(
            '<tr class="filas" id=0>'+
            '<td>'+
                '<div class="form-group" id="selectZonas">'+
                '</div>'+
                '<div class ="form-group">'+
                    '<label for="">Nombre Taquilla</label>'+
                    '<input type="text" name="nombre_Taquilla[]" id="nombre_Taquilla" class="form-control">'+

                    '<table id="tablaVentanilla" class="table table-bordered">'+
                        '<thead>'+
                            '<th style="vertical-align: middle;" colspan="2">Ventanilla</th>'+
                            '<br>'+
                        '</thead>'+
                        '<tbody id=a1>'+
                            '<tr>'+
                                '<td colspan="2">'+
                                '<button name="adicional" type="button" class="btn btn-warning ventanillas"><i class="bi bi-plus-circle"></i>&nbsp;Agregar Ventanilla</button>'+
                                '</td>'+
                            '</tr>'+
                            '<tr>'+
                                '<td>'+
                                    '<input type="text" name="nombre_Ventanilla[]" id="nombre_Ventanilla" placeholder="Nombre de la ventanilla">'+
                                '</td>'+
                                '<td class="elimAsoci"><input type="button"   value="-"/></td>'+
                            '</tr>'+
                        '</tbody>'+
                    '</table>'+
                '</div>'+
            '</td>'+
            '<td class="deletef"><input type="button" value="-"></td>'+
        '</tr>' 
        );
        $("#selectZonas").html(select_Zonas_Html);
        $("#taquillasEvento").html(tabla_Taquilla_Html);

        $('#tablaTaquillas').DataTable( {
            "aProcessing": true,//Activamos el procesamiento del datatables
            "aServerSide": true,//Paginación y filtrado realizados por el servidor
            dom: 'Bfrtip',//Definimos los elementos del control de tabla
            buttons: [		          
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdf'
            ],
            "bDestroy": true,
            "iDisplayLength": 15,//Paginación
            "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
        });
        cerrarCarga();
    });
});

/*
$("#addf").on('click',function(){
    contadorTaquilla = contadorTaquilla + 1;
    $("#agregarTaq tbody tr:eq(0)").clone().attr('id',contadorTaquilla).appendTo("#agregarTaq");
});
*/


$("#addf").on('click',function(){
    iniciarCarga();
    contadorTaquilla = contadorTaquilla + 2;
    contadorVentanilla = contadorTaquilla + 1;
    $(
        '<tr class="filas" id="'+contadorTaquilla+'">'+
            '<td>'+
                '<div class="form-group" id="selectZonas">'+
                    select_Zonas_Html +
                '</div>'+
                '<div class ="form-group">'+
                    '<label for="">Nombre Taquilla</label>'+
                    '<input type="text" name="nombre_Taquilla[]" id="nombre_Taquilla" class="form-control">'+

                    '<table id="tablaVentanilla" class="table table-bordered">'+
                        '<thead>'+
                            '<th style="vertical-align: middle;" colspan="2">Ventanilla</th>'+
                            '<br>'+
                        '</thead>'+
                        '<tbody id=a'+contadorVentanilla+'>'+
                            '<tr>'+
                                '<td colspan="2">'+
                                '<button name="adicional" type="button" class="btn btn-warning ventanillas"><i class="bi bi-plus-circle"></i>&nbsp;Agregar Ventanilla</button>'+
                                '</td>'+
                            '</tr>'+
                            '<tr>'+
                                '<td>'+
                                    '<input type="text" name="nombre_Ventanilla[]" id="nombre_Ventanilla" placeholder="Nombre de la ventanilla">'+
                                '</td>'+
                                '<td class="elimAsoci"><input type="button"   value="-"/></td>'+
                            '</tr>'+
                        '</tbody>'+
                    '</table>'+
                '</div>'+
            '</td>'+
            '<td class="deletef"><input type="button" value="-"></td>'+
        '</tr>' 
    ).clone().appendTo("#agregarTaq");
    cerrarCarga();
});

$(document).on("click",".deletef",function(){
    var parent = $(this).parents().get(0);
$(parent).remove();
});

$(document).on('click','.ventanillas', function(){
    var id  = $(this).parents('tbody').attr('id');
    $(
    '<tr>'+
        '<td>'+
            '<input type="text" name ="nombre_Ventanilla[]" id="nombre_Ventanilla" placeholder="Nombre de la ventanilla">'+
        '</td>'+
        '<td class="elimAsoci"><input type="button" value="-"></td>'+
    '</tr>'
    ).clone().appendTo($('#'+id));
});

$("#guardarTaquilla").click(function(){
    iniciarCarga();
    var indice = -1;
    var indice2 = -1;


    $.each(($("#formulario_Taquilla_Evento").serializeArray()),function(i,n){
        
        if("selectZona[]" === n.name){
            indice = indice + 1;
            zonas.push({"idZona":n.value});
        }
        if("nombre_Taquilla[]" === n.name){
            indice2 = indice2 + 1;
            taquillas.push({"Nombre":n.value,"indiceZona":indice});
        }
        if("nombre_Ventanilla[]" === n.name){
            ventanillas.push({"Nombre":n.value,"indiceTaquilla": indice2});
        }
    });
    
    $.ajax({
        type: "POST",
        url: 'Eventos/Agregar_Taquillas_Evento',
        data: {"zonas":zonas,"taquillas":taquillas,"ventanillas":ventanillas},
        dataType: 'JSON',
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            cerrarCarga();
        },
    }).done(function(data){
        
        if(data.msj){
            cerrarCarga();
            location.reload();
        }
        
    });
    
});


$(document).on('click','.editar_Taquillas', function(){

    datos = $(this).data('book-id');
    var ventanillas = datos['datos'];
    var html = '';
    var opt = '';
    var select= '';

    opt = '<option value="'+datos['idZona']+'">'+datos['Zona']+'</option>';
    $.ajax({
        beforeSend: function(){
            iniciarCarga();
        },
        type:"POST",
        url: 'Eventos/Mostrar_Zonas',
        data: datos['idEvento'],
        dataType: 'JSON',
        error(jqXHR, textStatus, errorThrown){
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            cerrarCarga();
        },
    }).done(function(data){
        if(data.respuesta){
            for(var i = 0; i<data.msj.length; i++){
                opt +='<option value="'+data.msj[i]['idZona']+'">'+data.msj[i]['Nombre']+'</option>';
            }
            html =
            '<tr>'+
                '<td colspan="2">'+
                    '<button name="adicional" type="button" class="btn btn-warning nueva_Ventanilla"><i class="bi bi-plus-circle"></i>&nbsp;Agregar Ventanilla</button>'+
                '</td>'+
            '</tr>';
        
            for(var i=0;i<ventanillas.length;i++){
                html += '<tr>'+
                '<td>'+
                    '<input value="'+ventanillas[i]['idVentanilla']+'" type="hidden" name="editar_idVentanilla[]" id="editar_idVentanilla">'+
                    '<input value="'+ventanillas[i]['Nombre']+'" type="text" name ="editar_Nombre_Ventanilla[]" id="editar_Nombre_Ventanilla" placeholder="Nombre de la ventanilla">'+
                '</td>'+
                '<td class=""></td>'+
            '</tr>';
            }

            select = '<label for="selectZona">Selecciona la zona</label>'+
            '<select class="form-control" type="text" name ="editar_Zona_Taquilla[]" id="editar_Zona_Taquilla">'+opt+'</select>';
            $("#editar_Select_Zona").html(select);
            $("#editar_Nombre_Taquilla").val(datos['Nombre']);
            $("#editar_Tabla_Ventanilla").html(html);
        }
        cerrarCarga();
    });
});

$(document).on('click','.nueva_Ventanilla', function(){
    var id  = $(this).parents('tbody').attr('id');
            
    $(
        '<tr>'+
            '<td>'+
                '<input type="text" name ="nuevo_Nombre_Ventanilla[]" id="nuevo_Nombre_Ventanilla" placeholder="Nombre de la ventanilla">'+
            '</td>'+
            '<td class="elimAsoci"><input type="button" value="-"></td>'+
        '</tr>'
    ).clone().appendTo($('#'+id));
});

$("#guardar_Taquilla_Editada").on('click',function(){
    iniciarCarga();
    var editar_Taquilla = [];
    var editar_Ventanilla= [];
    var nuevas_Ventanillas =[];
    var idVentanilla;
    var idZona;
    var Nombre;

    $.each(($("#formulario_Taquilla_Editada").serializeArray()),function(i,n){
        if("editar_Zona_Taquilla[]" === n.name){
            idZona = n.value;
        }
        if("editar_Nombre_Taquilla[]" === n.name){
            editar_Taquilla.push({'idTaquilla': datos['idTaquilla'],'Nombre':n.value,'idZona':idZona});
        }

        if("editar_idVentanilla[]" === n.name){
            idVentanilla = n.value;
        }

        if("editar_Nombre_Ventanilla[]" === n.name){
            editar_Ventanilla.push({'idVentanilla':idVentanilla,'Nombre':n.value});
        }

        if("nuevo_Nombre_Ventanilla[]" === n.name){
            nuevas_Ventanillas.push({'idTaquilla': datos['idTaquilla'],'Nombre':n.value});
        }
    });

    if(!nuevas_Ventanillas.length){
        nuevas_Ventanillas = 0;
    }

    $.ajax({
        type:"POST",
        url: 'Eventos/Editar_Taquillas',
        data:{'taquilla':editar_Taquilla,'ventanillas':editar_Ventanilla,'nuevos':nuevas_Ventanillas},
        dataType: 'JSON',
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

/**----------------------------Tarjetas Cortesia------------------------------------------------ */
$(document).on('click','.mostrar_Cortesias_Evento', function(){
    iniciarCarga();
    datos_Cortesia = $(this).data('book-id');
    $("#tabla_Tarjetas_Cortesias").DataTable().destroy();
    var d = new Date();

    $("#cuerpo_agregar_Cortesias").html(
        '<tr>'+
        '<td>'+
            '<div id="lote_Cortesias0" class="form-group">'+
            '</div>'+
            '<div id="folios_Disponibles0" class="form-group">'+
                '<label for="folios_Cortesia">Folios Diposnibles</label>'+
                '<br>'+
                '<textarea id="folios_Cortesia" name="folios_Cortesia[]" cols="70" rows="10" class="form-control" readonly>'+
                '</textarea>'+
            '</div>'+
            '<div id="folios_Seleccionados0" class="form-group">'+
                '<label for="b">Folio Inicial</label>'+
                '<input id="folio_Inicial_Cortesias" name="folio_Inicial_Cortesias[]" class="form-control">'+
                '<br>'+
                '<label for="c">Folio Final</label>'+
                '<input id="folio_Final_Cortesias" name="folio_Final_Cortesias[]" class="form-control">'+
            '</div>'+
            '<div id="creditos_Otorgados0" class="form-group">'+
                '<label>Creditos a otorgar</label>'+
                '<input id="creditos_Otorgados" name="creditos_Otorgados[]" class="form-control" type="number">'+
            '</div>'+
            '<div id="descripción_Cortesias0" >'+
                '<label>Concepto</label>'+
                '<textarea id="descripcion_Cortesias" name="descripcion_Cortesias[]" cols="10", rows="2" class="form-control"></textarea>'+
            '</div>'+
            '<div id="usuario_Cortesias0">'+
                '<label>Usuario</label>'+
                '<input id="nombre_cortesia" name="nombre_cortesia[]" type="text" value="'+datos_Cortesia['Nombre']+'" class="form-control" readonly>'+
                '<input type="hidden" id="idUsuario" name="idUsuario[]" type="text" value="'+datos_Cortesia['idUsuario']+'" class="form-control">'+
            '</div>'+
            '<div id="fecha_Cortesias0">'+
                '<input type="hidden" id="fecha_cortesia" name="fecha_cortesia[]" value="'+d.toISOString().split('T')[0]+" "+d.toLocaleTimeString()+".000"+'" class="form-control">'+
            '</div>'+
            '<div id="idEvento0">'+
                '<input type="hidden" id="idEvento_Cortesia" name="idEvento_Cortesia[]" value="'+datos_Cortesia['idEvento']+'" class="form-control">'+
            '</div>'+
        '</td>'+
        '<td class="eliminar_Registro_Cortesias"><input type="button" value="-"/></td>'+
    '</tr>'
    );
    contadorCortesias=0;
    select_Lote ='';
    var option_Lote = '';
    var html_cortesias = '';
    $("#idEventoCortesia").val(datos_Cortesia['idEvento']);

    option_Lote = '<option>Lotes</option>';

    $.ajax({
        type:'POST',
        url: 'Eventos/Lotes_Cortesias',
        data: {'idEvento':datos_Cortesia['idEvento']},
        dataType: 'JSON',
        error(jqXHR, textStatus, errorThrown){
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            cerrarCarga();
        },
    }).done(function(data){
        if(data.respuesta){

            for(var i=0;i<data.datos.length;i++){
                html_cortesias += '<tr>'+
                '<td style="text-align: center; vertical-align: middle;"><a href="" class="" data-toggle="modal" data-book-id=""><i class="fa fa-paint-brush btn btn-outline-warning" aria-hidden="true"></i></a></td>'+
                '<td style="text-align: center; vertical-align: middle;">'+data.datos[i]['Cantidad']+'</td>'+
                '<td style="text-align: center; vertical-align: middle;">'+data.datos[i]['Folio_Inicial']+'</td>'+
                '<td style="text-align: center; vertical-align: middle;">'+data.datos[i]['Folio_Final']+'</td>'+
                '<td style="text-align: center; vertical-align: middle;">'+data.datos[i]['Nombre'] + " " +data.datos[i]['Apellidos'] +'</td>'+
                '<td style="text-align: center; vertical-align: middle;">'+data.datos[i]['Fecha']+'</td>'+
                '<td style="text-align: center; vertical-align: middle;">'+data.datos[i]['Descripcion']+'</td>'+
                '</tr>';
                
            }
            for(var i=0; i<data.msj.length;i++){
                option_Lote +='<option value="'+data.msj[i]['idLote']+'">'+data.msj[i]['Nombre']+'</option>'
            }
            select_Lote ='<label>Seleccione un lote disponible</label>'+ 
            '<select id="lote_Cortesia" name="lote_Cortesia[]" class="lote_Cortesias form-control">'+option_Lote+'</select>'
            

            $("#lote_Cortesias0").html(select_Lote);
            
            $("#cuerpo_tabla_tarjetas-cortesias").html(html_cortesias);

            $('#tabla_Tarjetas_Cortesias').DataTable( {
                "aProcessing": true,//Activamos el procesamiento del datatables
                "aServerSide": true,//Paginación y filtrado realizados por el servidor
                dom: 'Bfrtip',//Definimos los elementos del control de tabla
                buttons: [		          
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdf'
                ],
                "bDestroy": true,
                "iDisplayLength": 10,//Paginación
                "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
            });


            cerrarCarga();
        }
    });
    
});


$('#agregar_Registro').on('click', function(){
    contadorCortesias++;
    var d = new Date();
    $(
        '<tr>'+
            '<td>'+
                '<div id="lote_Cortesias'+contadorCortesias+'" class="form-group">'+
                    select_Lote+
                '</div>'+
                '<div id="folios_Disponibles'+contadorCortesias+'" class="form-group">'+
                    '<label for="folios_Cortesia">Folios Diposnibles</label>'+
                    '<br>'+
                    '<textarea id="folios_Cortesia" name="folios_Cortesia[]" cols="30" rows="10" class="form-control" readonly>'+
                    '</textarea>'+
                '</div>'+
                '<div id="folios_Seleccionados'+contadorCortesias+'" class="form-group">'+
                    '<label for="b">Folio Inicial</label>'+
                    '<input id="folio_Inicial_Cortesias" name="folio_Inicial_Cortesias[]" class="form-control">'+
                    '<br>'+
                    '<label for="c">Folio Final</label>'+
                    '<input id="folio_Final_Cortesias" name="folio_Final_Cortesias[]" class="form-control">'+
                '</div>'+
                '<div id="creditos_Otorgados'+contadorCortesias+'" class="form-group">'+
                    '<label>Creditos a otorgar</label>'+
                    '<input id="creditos_Otorgados" name="creditos_Otorgados[]" class="form-control" type="number">'+
                '</div>'+
                '<div id="descripción_Cortesias'+contadorCortesias+'" class="form-group">'+
                    '<label>Concepto</label>'+
                    '<textarea id="descripcion_Cortesias" name="descripcion_Cortesias[]" cols="10", rows="2" class="form-control"></textarea>'+
                '</div>'+
                '<div id="usuario_Cortesias'+contadorCortesias+'">'+
                    '<label>Usuario</label>'+
                    '<input id="nombre_cortesia" name="nombre_cortesia[]" type="text" value="'+datos_Cortesia['Nombre']+'" class="form-control" readonly>'+
                    '<input type="hidden" id="idUsuario" name="idUsuario[]" type="text" value="'+datos_Cortesia['idUsuario']+'" class="form-control">'+
                '</div>'+
                '<div id="fecha_Cortesias'+contadorCortesias+'">'+
                    '<input type="hidden" id="fecha_cortesia" name="fecha_cortesia[]" value="'+d.toISOString().split('T')[0]+" "+d.toLocaleTimeString()+".000"+'" class="form-control">'+
                '</div>'+
                '<div id="idEvento'+contadorCortesias+'">'+
                    '<input type="hidden" id="idEvento_Cortesia" name="idEvento_Cortesia[]" value="'+datos_Cortesia['idEvento']+'" class="form-control">'+
                '</div>'+
            '</td>'+
            '<td class="eliminar_Registro_Cortesias"><input type="button" value="-"/></td>'+
        '</tr>'
    ).clone().appendTo("#agregar_Cortesias");
});

$(document).on('change','.lote_Cortesias', function(){
    var lote = $(this).val();
    var id = $(this).parents('div').attr('id').substr(-1);

    if(lote != "Lotes"){
        $.ajax({
            beforSend: function(){
                iniciarCarga();
            },
            type:'POST',
            url:'Eventos/Tarjetas_Cortesias',
            data:{'idLote':lote,'idEvento':datos_Cortesia['idEvento']},
            dataType:'JSON',
            error(jqXHR, textStatus, errorThrown){
                alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
                cerrarCarga();
            }
        }).done(function(data){
            if(data.respuesta){
                string= [];
                for(var i=0; i<data.msj.length;i++){
                    string[i] = data.msj[i]['Folio'];
                }
                $('#folios_Disponibles'+id).html('<label for="folios_Cortesia">Folios Disponibles</label><br><textarea id="folios_Cortesia" name="folios_Cortesia" cols="30" rows="10" class="form-control" readonly>'+string+'</textarea>');
                cerrarCarga();
            }
        });
    }
});

$(document).on('click','.eliminar_Registro_Cortesias', function(){
    var parent = $(this).parents().get(0);
    $(parent).remove();
});

$("#guardarCortesias").on('click',function(){
    iniciarCarga();
    var d = new Date();

    var idUsuario = $("#idUsuarioCortesia").val();
    var idEvento = $("#idEventoCortesia").val();
    
    var fecha = d.toISOString().split('T')[0] + " " + d.toLocaleTimeString() + ".000";
    
    $.ajax({
        type:'POST',
        url:'Eventos/Agregar_Cortesias',
        data: $("#formulario_Cortesias_Evento").serialize(),
        dataType: 'JSON',
        error(jqXHR, textStatus, errorThrown){
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            cerrarCarga();
        }
    }).done(function(data){
        if(data.respuesta){
            location.reload();
            
            cerrarCarga(); 
        }
        else{
            alert('Favor de verificar los rangos de los folios, folio inicial: ' + JSON.stringify(data.folioInicial) + ' folio final: ' +JSON.stringify( data.folioFinal));
            cerrarCarga();
        }
    });
    
});