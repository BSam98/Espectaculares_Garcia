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



/*
$("#agregar_Promocion_Evento").click(function(){
    $.ajax({
        type: "POST",
        url: 'Eventos/Agregar_Promocion_Evento',
        data: $("#formulario_Agregar_Promocion_Evento").serialize(),
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
*/
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

$(document).on('click','.mostrar_Promociones_Evento', function(){
    var idEvento = $(this).data('book-id');
    $("#idEventoPromocion").val(idEvento['idEvento']);
});

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