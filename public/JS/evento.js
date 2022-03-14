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
                        for(var i=0;i<data.msj.length;i++){
                            option_Nombre_Html +='<option value="'+data.msj[i]['idDosxUno']+'">"'+data.msj[i]['Nombre']+'"</option>';

                            precio_Promocion.push({'idPromocion':data.msj[i]['idDosxUno'],'Precio':data.msj[i]['Precio']});
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
    
            precio_Promocion_Html +='<label for="precio_Promocion">Precio de la Promoción</label>'+
            '<input type="number" class="form-control" name="precio_Promocion" id="precio_Promocion" placeholder="Precio Promoción" value="">';


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
    if(opcion == 4){
        $("#precio_Promocion").val(precio_Promocion[indice]['Precio']);
        $("#creditos_Promocion").val(precio_Promocion[indice]['Creditos']);
    }
    else{
        $("#precio_Promocion").val(precio_Promocion[indice]['Precio']);
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

    if(opcion != 4){
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
    }else{

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
$(document).on('click','.mostrarAtraccionesEvento', function(){
    var idEvento = $(this).data('book-id');
    $.ajax({
        type: "POST",
        url: 'Eventos/Mostrar_Atracciones',
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


