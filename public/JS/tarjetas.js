var btnAbrirPopup = document.getElementById('abrir'),
    btnCerrarPopup = document.getElementById('cerrar'),
    contenedorOculto = document.getElementById('contenedorOculto'),
    contenedorTablaLote = document.getElementById('contenedorTablaLote');
    
$("#z").click(function(){
    alert('Minimo entra');
    $.ajax({
        type: "POST",
        url: 'Agregar_Lote',
        data: $("#formularioAgregarLote").serialize(),
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
        },
        success: function (data){         
            alert('El id del lote es: '+data.msj);
            if(data.respuesta)
                console.log(data.msj);
        },
        dataType: 'JSON'
    });
});


$(document).on('click','.mostrarTarjetasLote', function(){
    var idLote = $(this).data('book-id');
    $.ajax({
        type: "POST",
        url: 'Tarjetas/Tarjetas',
        data: idLote,
        dataType: 'JSON'
    }).done(function(data){

        var html ='';
        for(var i = 0;i<data.msj.length; i++){

            
            html += '<tr>'+
            '<td><a href="#editar_Cliente" class="editar" data-toggle="modal"><i class="bi bi-pencil-square btn btn-warning"></i></a></td>'+
            '<td>'+data.msj[i]['Tarjeta']+'</td>'+
            '<td>'+data.msj[i]['Folio']+'</td>'+
            '<td>'+data.msj[i]['FechaActivacion']+'</td>'+
            '<td>'+data.msj[i]['Status']+'</td>'+
            '<td>'+data.msj[i]['Tipo']+'</td>'+
            '<td>'+data.msj[i]['Ciudad']+'</td>'+
            '</tr>';
            
        }
        
        $("#tarjetasLote").html(html);
        

    });
});

$(document).on('click','.editarLote', function(){
    alert('a');
                    
    var Lote = $(this).data('book-id');

    console.log(Lote);

   $(".modal-body #idLote").val(Lote['idLote']);
   $(".modal-body #Nombre").val(Lote['Nombre']);
   $(".modal-body #Material").val(Lote['Material']);
   $(".modal-body #Cantidad").val(Lote['Cantidad']);
   $(".modal-body #FolioInicial").val(Lote['FolioInicial']);
   $(".modal-body #FolioFinal").val(Lote['FolioFinal']);
   $(".modal-body #Serie").val(Lote['Serie']);
   $(".modal-body #FechaIngreso").val(Lote['FechaIngreso']);
   $(".modal-body #Usuario").val(Lote['Usuario']);
});

$(document).on('click','.editarTarjeta', function(){
                    
    var Tarjeta = $(this).data('book-id');



    
   $(".modal-body #idUsuario").val(Tarjeta['idTarjeta']);
   $(".modal-body #UsuarioNombre").val(Tarjeta['Tarjeta']);
   $(".modal-body #UsuarioApellido").val(Tarjeta['Status']);
   $(".modal-body #NSS").val(Tarjeta['FechaActivacion']);
   $(".modal-body #Usuario").val(Tarjeta['Cliente']);
   $(".modal-body #Contraseña").val(Tarjeta['idEvento']);
});