var precio_Promocion =[];

var promocion_Descuentos_Atraccion_Eliminar = [];
var promocion_Pulsera_Atraccion_Eliminar = [];
var promocion_Juegos_Atraccion_Eliminar = [];

var promocion_Descuentos_Atraccion_Nuevo = [];
var promocion_Pulsera_Atraccion_Nuevo = [];
var promocion_Juegos_Atraccion_Nuevo = [];

var descuentos_Atraccion = [];
var pulsera_Atraccion = [];
var juegos_Atraccion = [];


$(document).on('click','.mostrar_Promociones_Evento',function(){
    iniciarCarga();

    var tabla_Descuentos_Html= '';
    var tabla_Pulseras_Html = '';
    var tabla_Juegos_Html = '';
    var tabla_Cortesias_Html = '';

    var fecha_Descuentos_Html ='';
    var fecha_Pulsera_Html ='';
    var fecha_Juegos_Html = '';
    var fecha_Cortesias = '';

    var precio_Descuentos_Html='';
    var precio_Pulsera_Html = '';
    var precio_Juegos_Html = '';
    var precio_Cortesias_Html = '';


    var nombre_Descuentos_Html= '';
    var nombre_Pulsera_Html = '';
    var nombre_Juegos_Html = '';
    var nombre_Cortesias_Html = '';
    
    var option_Descuentos_Html ='';
    var option_Pulsera_Html = '';
    var option_Juegos_Html = '';
    var option_Cortesias_Html = '';
    

    var idEvento =$(this).data('book-id');
    $("#idEventoPromociones").val(idEvento['idEvento']);

    
    $.ajax({
        type:"POST",
        url:'Eventos/Mostrar_Promociones',
        dataType:'JSON',
        error: function(jqXHR, textStatus, errorThrown){
            alert('Se produjo un error: a'+ errorThrown + ' ' + textStatus);
            cerrarCarga();
        },
    }).done(function(data){
        if(data.respuesta){
            console.log('Ingresa por aca: ' + JSON.stringify(data.msj.descuentos));
            cerrarCarga();
        }
    });
    
   cerrarCarga();
});