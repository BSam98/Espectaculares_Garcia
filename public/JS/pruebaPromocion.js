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

    option_Descuentos_Html ='<option value="">Seleccione una promoción</option>';
    option_Pulsera_Html = '<option value="">Seleccione una promoción</option>';
    option_Juegos_Html = '<option value="">Seleccione una promoción</option>';
    option_Cortesias_Html = '<option value="">Seleccione una promoción</option>';

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
            }

            for(var i=0;i<data.msj.cortesias.length;i++){
                option_Cortesias_Html +='<option value="'+data.msj.cortesias[i]['idCC']+'">'+data.msj.cortesias[i]['Nombre']+'</option>';
            }

            nombre_Descuentos_Html = '<label for="promociones">Nombre de la promocion</label>'+
            '<select name="promocionesDescuentos" id="promocionesDescuentos" class="form-control">'+option_Descuentos_Html+'</select>';

            nombre_Pulsera_Html = '<label for="promocionesPulsera">Nombre de la promocion</label>'+
            '<select name="promocionesPulsera" id="promocionesPulsera" class="form-control">'+option_Pulsera_Html+'</select>'

            nombre_Juegos_Html = '<label for="promocionesPulsera">Nombre de la promocion</label>'+
            '<select name="promocionesJuegos" id="promocionesJuegos" class="form-control">'+option_Juegos_Html+'</select>' +
            '<br>';
            
            nombre_Cortesias_Html = '<label for="promocionesPulsera">Nombre de la promocion</label>'+
            '<select name="promocionesCortesias" id="promocionesCortesias" class="form-control">'+option_Cortesias_Html+'</select>'

            $("#nombre_Descuentos").html(nombre_Descuentos_Html);
            $("#nombre_Pulsera").html(nombre_Pulsera_Html);
            $("#nombre_Juegos").html(nombre_Juegos_Html);
            $("#nombre_Cortesias").html(nombre_Cortesias_Html);

            cerrarCarga();
        }
    });
});