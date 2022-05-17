var option_Propietarios_Html='';


    function mostrar() {
        div = document.getElementById('contenedorOculto');
        div.style.display = '';
        prin = document.getElementById('principal');
        prin.style.display = 'none';
    }

    function cerrar() {
        div = document.getElementById('principal');
        div.style.display = '';
        prin = document.getElementById('contenedorOculto');
        prin.style.display = 'none';

    }


/*
$(document).on('click','.agregar', function(){
    $("#formularioNuevaAtraccion").submit(function (e){
    
        $.ajax({
            type:"POST",
            url: 'Agregar_Atraccion',
            data: $("#formularioNuevaAtraccion").serialize(),
            contentType:false,
            processData: false,
            error:function(){
                alert("Se produjo un error");
            },
            succes:function(data){
                if(data.respuesta){
                    location.reload();
                }
                else{
                    alert(data.msj);
                }
            },
            
            dataType: "JSON",
            
        });
        
    });
});
*/

$("#abrir_Modal_Atracciones").click(function(){
    $.ajax({
        beforeSend: function(){
            iniciarCarga();
        },
        type: "POST",
        url: 'Listado_Propietarios',
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            cerrarCarga();
        },
        success: function (data){              
            if(data.respuesta){
                for(var i=0; i<data.msj.length;i++){
                    option_Propietarios_Html += '<option value="'+data.msj[i]['idPropietario']+'">'+data.msj[i]['Nombre']+'</option>'
                }
                cerrarCarga();
            }
        },
        dataType: 'JSON'
    });
});


$("#nueva_Atraccion").click(function(){

    $(
        '<tr class ="a-Atracciones">'+
            '<td>'+
                '<div class="form-group">'+
                    '<label for="nombre">Nombre</label>'+
                    '<input class="form-control" type="text"  id="na" required name="na[]" placeholder="Nombre"/>'+
                '</div>'+
                '<div class="form-group">'+
                    '<label for="renta">Renta</label>'+
                    '<input class="form-control" type="number"  id="ren" required name="ren[]"/>'+
                '</div>'+
                '<div class="form-group">'+
                    '<label for="propietario">Propietario</label>'+
                    '<select class="form-control" type="text"  id="pro" required name="pro[]">'+
                        '<option value="0">Seleccionar Propietario</option>'+
                        option_Propietarios_Html+
                    '</select>'+
                '</div>'+
                '<div class="form-group">'+
                    '<label for="cma">Cantidad Máxima</label>'+
                    '<input class="form-control" type="number"  id="cma" required name="cma[]"/>'+
                '</div>'+
                '<div class="form-group">'+
                    '<label for="cmi">Cantidad Mínima</label>'+
                    '<input class="form-control" type="number"  id="cmi" required name="cmi[]"/>'+
                '</div>'+
                '<div class="form-group">'+
                    '<label>Largo(m)</label>'+
                    '<input class="form-control" type="number" id="largo" required name="largo[]"/>'+
                '</div>'+
                '<div class="form-group">'+
                    '<label>Ancho(m)</label>'+
                    '<input class="form-control" type="number" id="ancho" required name="ancho[]"/>'+
                '</div>'+
                '<div class="form-group">'+
                    '<label for="tiempo">Tiempo (hh:mm:ss)</label>'+
                    '<input class="form-control" type="text"  id="tim" required name="tim[]" placeholder="Tiempo"/>'+
                '</div>'+
                '<div class="form-group">'+
                    '<label for="tma">Tiempo Máximo de Espera (hh:mm:ss)</label>'+
                    '<input class="form-control" type="text"  id="tma" required name="tma[]" placeholder="Tiempo Máximo"/>'+
                '</div>'+
            '</td>'+
            '<td class="eliminar_Atraccion"><input type ="button" value="-"></td>'+
        '</tr>'
    ).clone().appendTo("#atracciones");
});

$(document).on("click",".eliminar_Atraccion",function(){
    var parent = $(this).parents().get(0);
    $(parent).remove();
});


$("#enviarAtraccion").click(function(){
    //alert($("#formularioNuevaAtraccion").serialize());
    $.ajax({
        beforeSend: function(){
            iniciarCarga();
        },
        type: "POST",
        url: 'Agregar_Atraccion',
        data: $("#formularioNuevaAtraccion").serialize(),
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

$("#agregarPropietario").click(function(){
    $.ajax({
        beforeSend: function(){
            iniciarCarga();
        },
        type: "POST",
        url: 'Agregar_Propietario',
        data: $("#formularioAgregarPropietario").serialize(),
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

$("#agregarPropietarioPorAtraccion").click(function(){
    $.ajax({
        type: "POST",
        url: 'Agregar_Propietario',
        data: $("#formularioAgregarPropietarioPorAtraccion").serialize(),
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

$("#actualizarAtraccion").click(function(){
    $.ajax({
        type: "POST",
        url: 'Atracciones/Editar_Atraccion',
        data: $("#formularioEditarAtraccion").serialize(),
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

$("#actualizarPropietario").click(function(){
    $.ajax({
        type: "POST",
        url: 'Atracciones/Editar_Propietario',
        data: $("#formularioEditarPropietario").serialize(),
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


$("#editarPropietario").click(function(){
    var propietario = $(this).data('book-id');


    console.log(propietario);
    $(".modal-body #idPropietario").val(propietario['idPropietario']);
   $(".modal-body #Nombre").val(propietario['Nombre']);
   $(".modal-body #ApellidoP").val(propietario['ApellidoP']);
   $(".modal-body #ApellidoM").val(propietario['ApellidoM']);
   $(".modal-body #Direccion").val(propietario['Direccion']);
   $(".modal-body #Telefono").val(propietario['Telefono']);
   $(".modal-body #RFC").val(propietario['RFC']);
   $(".modal-body #FechaNacimiento").val(propietario['FechaNacimiento']);
});

$(document).on('click','.editarAtraccion', function(){
                    
    var a = $(this).data('book-id');



    
   $(".modal-body #idAtraccion").val(a['idAtraccion']);
   $(".modal-body #Atraccion").val(a['Atraccion']);
   $(".modal-body #Area").val(a['Area']);
   $(".modal-body #Renta").val(a['Renta']);
   $(".modal-body #Nombre").val(a['Nombre']);
   $(".modal-body #CapacidadMAX").val(a['CapacidadMAX']);
   $(".modal-body #CapacidadMIN").val(a['CapacidadMIN']);
   $(".modal-body #Tiempo").val(a['Tiempo']);
   $(".modal-body #TiempoMAX").val(a['TiempoMAX']);

});

$(document).on('click','.editarPropietario', function(){
                    
    var propietario = $(this).data('book-id');


    console.log(propietario);
    $(".modal-body #idPropietario").val(propietario['idPropietario']);
   $(".modal-body #Nombre").val(propietario['Nombre']);
   $(".modal-body #ApellidoP").val(propietario['ApellidoP']);
   $(".modal-body #ApellidoM").val(propietario['ApellidoM']);
   $(".modal-body #Direccion").val(propietario['Direccion']);
   $(".modal-body #Telefono").val(propietario['Telefono']);
   $(".modal-body #RFC").val(propietario['RFC']);
   $(".modal-body #FechaNacimiento").val(propietario['FechaNacimiento']);
});


/******************TODO LO RELACIONADO A LAS TABLAS**********************/
$(function(){
    // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
$("#adi").on('click', function(){
$("#tab tbody tr:eq(0)").clone().removeClass('fila-fila').appendTo("#tab");
});
// Evento que selecciona la fila y la elimina 
$(document).on("click",".elim",function(){
var parent = $(this).parents().get(0);
$(parent).remove();
});
});

$(document).ready(function() {
$('#examplePro').DataTable( {
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
});

$(document).ready(function() {
$('#tab').DataTable( {
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
});

$(document).ready(function() {
$('#exampleAtr').DataTable( {
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
});

$(document).ready(function() {
$('#example').DataTable( {
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
});