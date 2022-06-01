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
var nombre;
var idUsuario;
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

$(".datos").click(function(){
    var datos = $(this).data('book-id');
    
    nombre = datos['nombre'];
    idUsuario = datos['idUsuario'];
});

$("#agregar_Filas").click(function(){
    $(
        '<tr class="filas-lote">'+
            '<td>'+
                '<div class="form-group">'+
                    '<label>Nombre</label>'+
                    '<input type="text" class="form-control" id="nom" name = "nom[]" placeholder="Nombre">'+
                '</div>'+
                '<div class="form-group">'+
                    '<label>Material</label>'+
                    '<input type="text" class="form-control" id="mate" name = "mate[]" placeholder="Material">'+
                '</div>'+
                '<div class="form-group">'+
                    '<label>Cantidad</label>'+
                    '<input type="number" class="form-control" id="cant" name = "cant[]" placeholder="Cantidad">'+
                '</div>'+
                '<div class="form-group">'+
                    '<label>Folio Inicial</label>'+
                    '<input type="number" class="form-control" id="fi" name = "fi[]" placeholder="Folio inicial">'+
                '</div>'+
                '<div class="form-group">'+
                    '<label>FolioFinal</label>'+
                    '<input type="number" class="form-control" id="ff" name = "ff[]" placeholder="Folio final">'+
                '</div>'+
                '<div class="form-group">'+
                    '<label>Serial</label>'+
                    '<input type="text" class="form-control" id="ser" name = "ser[]" placeholder="Serie">'+
                '</div>'+
                '<div class="form-group">'+
                    '<label>Fecha de Ingreso</label>'+
                    '<input type="date" class="form-control" id="date" name = "date[]" placeholder="Fecha de Ingreso">'+
                '</div>'+
                '<div class="form-group">'+
                    '<label>Usuario</label>'+
                    '<input type="text" class="form-control" id="nombre" value="'+nombre+'" readonly>'+
                    '<input type="hidden" class="form-control" id="user" name="user[]" value="'+idUsuario+'">'+
                '</div>'+
            '</td>'+
            '<td class="eliminar-Filasl"><input type="button" value="-"></td>'+
        '</tr>'
    ).clone().appendTo("#agregarLotes");
});


$(document).on('click','.mostrarTarjetasLote', function(){
    var idLote = $(this).data('book-id');
    $("#newTarjet1").DataTable().destroy();
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
            '<td style="vertical-align: middle;">'+data.msj[i]['Tarjeta']+'</td>'+
            '<td style="vertical-align: middle;">'+data.msj[i]['Folio']+'</td>'+
            '<td style="vertical-align: middle;">'+data.msj[i]['FechaActivacion']+'</td>'+
            '<td style="vertical-align: middle;">'+data.msj[i]['Iniciales']+'</td>'+
            '<td style="vertical-align: middle;">'+data.msj[i]['Tipo']+'</td>'+
            '</tr>';
            
        }
        $("#tarjetasLote").html(html);
        $('#newTarjet1').DataTable( {
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