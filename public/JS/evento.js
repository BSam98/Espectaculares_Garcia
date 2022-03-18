var precio_Promocion =[];
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

$("#agregarEvento").click(function(){
    $.ajax({
        type: "POST",
        url: 'Eventos/Agregar_Evento',
        data: $("#formularioAgregarEvento").serialize(),
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
        },
        success: function (data){              
           if(data.respuesta)
               location.reload();
        },
        dataType: 'JSON'
    });
});


/*
$("#idLote").on('change',function(event){
    //var idLote = $("#idLote").val();
    var b = '{idLote:0}';
    console.log(b);
    alert(b);
    $.ajax({
        type: "POST",
        url: 'Eventos/Mostrar_Tarjetas_Nuevas',
        data: a,
        dataType: 'JSON'
    }).done(function(data){

        alert(data.msj);
        console.log(data.msj);
        
        var html ='';
        for(var i = 0;i<data.msj.length; i++){

            
            html += '<tr>'+
            '<td><a href="#editar_Cliente" class="editar" data-toggle="modal"><i class="bi bi-pencil-square btn btn-warning"></i></a></td>'+
            '<td>'+data.msj[i]['Atraccion']+'</td>'+
            '<td>'+data.msj[i]['Creditos']+'</td>'+
            '<td></td>'+
            '<td>'+data.msj[i]['Contrato']+'</td>'+
            '<td>'+data.msj[i]['Poliza']+'</td>'+
            '</tr>';
            
        }
        
        $("#atraccionesEvento").html(html);
        

    });
});
*/

$("#asociarTarjetas").click(function(){
    $.ajax({
        type: "POST",
        url: 'Eventos/Agregar_Tarjetas_Evento',
        data: $("#formularioAgregarTarjetasEvento").serialize(),
        dataType: 'JSON',
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
        },
    }).done(function(data){
        if(data.respuesta){
            location.reload();
        }
    }
    );
});


$(document).on('change', '#idLote', function(event) {
    const opcion = ($("#idLote option:selected").val());

    $.ajax({
        type: "POST",
        url: 'Eventos/Mostrar_Tarjetas_Nuevas',
        data: {"idLote": opcion},
        dataType: 'JSON',
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
        },
    }).done(function(data){

        alert(data.msj);
        console.log(data.msj);
        var folio = [];
        for(var i =0;i<data.msj.length;i++){
            folio[i] = JSON.stringify(data.msj[i]['Folio']);
        }
        $("#folios").val(folio.toString());
    });
});

/*------------------------------------------------------------------------------------------------*/

$(document).on('change','#promocion_Categoria', function(event){
    
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
    opcion =($("#promocion_Categoria option:selected").val());
    
    if(opcion==0){

        $(".modal-body #area_Nombre_Promocion").html(nombre_Promocion_Html);
        $(".modal-body #area_Precio_Promocion").html(precio_Promocion_Html);
        $(".modal-body #area_Creditos_Promocion").html(creditos_Promocion_Html);
    }
    else{
        $.ajax({
            type:"POST",
            url:'Eventos/Mostrar_Promociones',
            data: {'promocion':opcion},
            dataType:'JSON',
            error: function(jqXHR, textStatus, errorThrown){
                alert('Se produjo un error: a'+ errorThrown + ' ' + textStatus);
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
            }

            nombre_Promocion_Html +='<label for="promociones">Nombre de la promocion</label>'+
            '<select name="promociones" id="promociones" class="form-control">'+option_Nombre_Html+'</select>';

            $(".modal-body #area_Nombre_Promocion").html(nombre_Promocion_Html);
            $(".modal-body #area_Precio_Promocion").html(precio_Promocion_Html);
            $(".modal-body #area_Creditos_Promocion").html(creditos_Promocion_Html);
            $(".modal-body #area_Fechas_Promocion").html(fechas_Promocion_Html);
            $(".modal-body #mytable").html(tabla_Fechas_Html);
            //$(".modal-body #mytable").html();
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

    alert("Sirve la seleccion:" + ($("#promociones option:selected").val()));

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

$(document).on('click','#agregar_Promocion_Evento',function(){
    var idEvento = document.getElementById("idEventoPromocion").value;
    var tipoPromocion = document.getElementById("promocion_Categoria").value;
    
    if(tipoPromocion != 4){
        $.ajax({
            type: "GET",
            url: 'Eventos/Agregar_Promocion_Evento',
            data: {"idEvento":idEvento,"tipoPromocion":tipoPromocion,"idPromocion":($("#promociones option:selected").val()),"creditos":0,"fechaInicio":diaInicial,"fechaFinal":diaFinal,"precio":precio},
            dataType: 'JSON',
            error: function (jqXHR, textStatus, errorThrown) {
                alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            },
        }).done(function(data){
            if(data.respuesta){
                location.reload();
            }
            else{
                alert('Ha ocurrido un error');
            }
        });
    }
    else{
        $.ajax({
            type: "GET",
            url: 'Eventos/Agregar_Promocion_Evento',
            data: {"idEvento":idEvento,"tipoPromocion":tipoPromocion,"idPromocion":($("#promociones option:selected").val()),"creditos":creditos_Promocion,"fechaInicio":diaInicial,"fechaFinal":diaFinal,"precio":precio},
            dataType: 'JSON',
            error: function (jqXHR, textStatus, errorThrown) {
                alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            },
        }).done(function(data){
            if(data.respuesta){
                location.reload();
            }
            else{
                alert('Ha ocurrido un error');
            }
        });
    }
});

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


/*----------------------------------------------------------------------------------------------*/
$(document).on('click','.mostrar_Atracciones_Evento', function(){
    var idEvento = $(this).data('book-id');
    var html ='';
    var atracciones_Html='', contrato_Html='', poliza_Html=''; 
    var option_Atracciones_Html='', option_Contrato_Html='', option_Poliza_Html='';

    var promociones_Html='', descuentos_Html='', pulsera_Html='', juegos_Gratis_Html='',creditos_Cortesia_Html;

    $.ajax({
        type: "POST",
        url: 'Eventos/Mostrar_Atracciones',
        data: idEvento,
        dataType: 'JSON',
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
        },
    }).done(function(data){
        if(data.respuesta){
            //console.log("Promocion: " + data.promociones[0]['Nombre']);
            /*
            promociones +='<label for="poliza">Promociones:</label>'+
            '<br>'+
            '<input type="checkbox" name="promo[]" id="promo">'+data.promociones[0]['Nombre'];
            */
            //promociones +='<label for="poliza">Promociones:</label>'+
            //'<br>';

            if(data.descuentos.length === 0){
                descuentos_Html ='<label for="poliza">Promociones:</label>';
            }
            else{
                for(var i = 0; i<data.descuentos.length; i++){
                    console.log("Cantidad: " + i);
                    descuentos_Html +='<input type="checkbox" name="descuentos[]" id="'+data.descuentos[i]['idDosxUno']+'">'+data.descuentos[i]['Nombre']+'<br>';
                }
            }

            if(data.pulsera.length === 0){
            }
            else{
                for(var i = 0; i<data.pulsera.length; i++){
                    pulsera_Html +='<input type="checkbox" name="pulsera[]" id="pulsera">'+data.pulsera[i]['Nombre']+'<br>';
                }
            }

            if(data.juegosGratis.length === 0){
            }else{
                for(var i = 0; i<data.juegosGratis.length; i++){
                    juegos_Gratis_Html+='<input type="checkbox" name="juegos_Gratis[] id="juegos_Gratis">'+data.juegosGratis[i]['Nombre']+'<br>';
                }
            }

            if(data.creditosCortesia.length === 0){
            }
            else{
                for(var i = 0; i<data.creditosCortesia.length; i++){}
            }
            
            for(var i = 0;i<data.msj.length; i++){
    
                
                html += '<tr>'+
                '<td><a href="#editar_Cliente" class="editar" data-toggle="modal"><i class="bi bi-pencil-square btn btn-warning"></i></a></td>'+
                '<td>'+data.msj[i]['Atraccion']+'</td>'+
                '<td>'+data.msj[i]['Creditos']+'</td>'+
                '<td></td>'+
                '<td>'+data.msj[i]['Contrato']+'</td>'+
                '<td>'+data.msj[i]['Poliza']+'</td>'+
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

            atracciones_Html +='<label for ="atracciones_Nuevas">Nombre de la atracción</label>'+
            '<select name="atracciones_Nuevas[]" id ="atracciones_Nuevas" class="form-control">'+option_Atracciones_Html+'</select>';

            contrato_Html +='<label for="contrato">Agregar Contrato</label>'+
            '<select name="contrato[]" id="contrato" class="form-control">'+option_Contrato_Html+'</select>';

            poliza_Html +='<label for="poliza">Agregar Poliza</label>'+
            '<select name="poliza[]" id="poliza" class="form-control">'+option_Poliza_Html+'</select>';
        }

        $("#nuevas_Atracciones").html(atracciones_Html);
        $("#nuevos_Contratos").html(contrato_Html);
        $("#nuevas_Polizas").html(poliza_Html);
        $("#atraccionesEvento").html(html);
        $("#promocion_Descuentos").html(descuentos_Html);
        $("#promocion_Pulsera").html(pulsera_Html);
        $("#promocion_Juegos_Gratis").html(juegos_Gratis_Html);
    });
});

$(document).on('click','.mostrarTarjetasEvento', function(){
    var idEvento = $(this).data('book-id');
    $.ajax({
        type: "POST",
        url: 'Eventos/Mostrar_Tarjetas',
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
            '<td>'+data.msj[i]['Folio']+'</td>'+
            '<td>'+data.msj[i]['FechaActivacion']+'</td>'+
            '<td>'+data.msj[i]['Status']+'</td>'+
            '<td>'+data.msj[i]['Tipo']+'</td>'+
            '</tr>';
            
        }
        
        $("#idEventoLote").val(idEvento['idEvento']);
        $("#tarjetasEvento").html(html);

    });
});
/*----------------------------------------------------------------------------------*/

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


