var btnAbrirPopup = document.getElementById('abrir'),
    btnCerrarPopup = document.getElementById('cerrar'),
    contenedorOculto = document.getElementById('contenedorOculto'),
    contenedorTablaLote = document.getElementById('contenedorTablaLote');

    /*
$("#z").click(function(){
    $.ajax({
        type: "POST",
        url: 'Agregar_Lote',
        data: $("#formularioAgregarLote").serialize(),
        
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
        },
        
        success: function (data){         
            if(data.respuesta){
                location.reload();
            }
        },
        dataType: 'JSON'
    });
});
*/
$("#z").click(function(){
    $.ajax({
        beforeSend: function(){
            iniciarCarga();
        },
        type: "POST",
        url: 'Agregar_Lote',
        data:$("#formularioAgregarLote").serialize(),
        dataType: 'JSON',
        error: function(jqXHR, textStatus, errorThrown){
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

$("#actualizarLote").click(function(){
    $.ajax({
        beforeSend: function(){
            iniciarCarga();
        },
        type: "POST",
        url: 'Tarjetas/EditarLote',
        data: $("#formularioEditarLote").serialize(),
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            cerrarCarga();
        },
        dataType: 'JSON',
    }).done(function(data){
        if(data.respuesta){
            cerrarCarga();
            location.reload();
        }
    });
});


$(document).on('click','.mostrarTarjetasLote', function(){
    var idLote = $(this).data('book-id');
    $.ajax({
        beforeSend: function(){
            iniciarCarga();
        },
        type: "POST",
        url: 'Tarjetas/Tarjetas',
        data: idLote,
        dataType: 'JSON',
    }).done(function(data){
        var html ='';
        for(var i = 0;i<data.msj.length; i++){

            
            html += '<tr>'+
            '<td>'+data.msj[i]['Tarjeta']+'</td>'+
            '<td>'+data.msj[i]['Folio']+'</td>'+
            '<td>'+data.msj[i]['FechaActivacion']+'</td>'+
            '<td>'+data.msj[i]['Status']+'</td>'+
            '<td>'+data.msj[i]['Tipo']+'</td>'+
            '</tr>';
            
        }
        
        $("#tarjetasLote").html(html);
        cerrarCarga();
        

    });
});

$(document).on('click','.editarLotes', function(){
    iniciarCarga();
    var Lote = $(this).data('book-id');

    //console.log(Lote);

   $(".modal-body #idLote").val(Lote['idLote']);
   $(".modal-body #Nombre").val(Lote['Nombre']);
   $(".modal-body #Material").val(Lote['Material']);
   $(".modal-body #Cantidad").val(Lote['Cantidad']);
   $(".modal-body #Serie").val(Lote['Serie']);
   $(".modal-body #Usuario").val(Lote['Usuario']);
   cerrarCarga();
});

$(document).on('click','.editarTarjeta', function(){
    iniciarCarga();
                    
    var Tarjeta = $(this).data('book-id');



    
   $(".modal-body #idUsuario").val(Tarjeta['idTarjeta']);
   $(".modal-body #UsuarioNombre").val(Tarjeta['Tarjeta']);
   $(".modal-body #UsuarioApellido").val(Tarjeta['Status']);
   $(".modal-body #NSS").val(Tarjeta['FechaActivacion']);
   $(".modal-body #Usuario").val(Tarjeta['Cliente']);
   $(".modal-body #Contraseña").val(Tarjeta['idEvento']);
   cerrarCarga();
});