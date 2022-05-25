$('#fechaesperada').change(function () {
    iniciarCarga();
    var tabla_Html= '';

    var idEvento = ($("#evento option:selected").val());
    var fechaInicio = document.getElementById('fechaesperada').value;
    var fechaFinal  = fechaInicio + " 23:59:00.000";
    fechaInicio += " 00:00:00.000";

    $.ajax({
        type:"POST",
        url: 'Ver Atracciones/Mostrar_Atracciones',
        data: {'idEvento':idEvento,'fechaInicio':fechaInicio,'fechaFinal':fechaFinal},
        dataType: 'JSON',
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            cerrarCarga;
        },
    }).done(function(data){
        if(data.respuesta){
            console.log(JSON.stringify(data.msj));
            for(var i=0; i<data.msj.length; i++){
                tabla_Html += '<tr>'+
                '<td style="vertical-align: middle;">'+data.msj[i]['Nombre']+' '+data.msj[i]['Apellidos'] +'</td>'+
                '<td style="vertical-align: middle;">'+data.msj[i]['Atracciones']+'</td>'+
                '<td style="vertical-align: middle;">'+data.datos[i][0]['Cantidad_Ciclos']+'</td>'+
                '<td style="vertical-align: middle;">'+data.datos[i][0]['Cantidad_Creditos']+'</td>'+
                '<td style="vertical-align: middle;">'+data.datos[i][0]['Cantidad_Cortesias']+'</td>'+
                '<td style="vertical-align: middle;">'+data.datos[i][0]['Cantidad_Descuentos']+'</td>'+
                '<td style="vertical-align: middle;">'+data.datos[i][0]['Cantidad_Pulseras']+'</td>'+
                '<td style="vertical-align: middle;">'+data.datos[i][0]['Cantidad_Personas']+'</td>'+
                '<td><a href="#verDetalles" type="button" class="btn btn-success detalles_Ciclo" data-toggle="modal" data-book-id='+"'{"+'"idAperturaValidador":'+data.msj[i]['idAperturaValidador']+"}'"+' >Ver detalles</a></td>'+
                '</tr>';
            }

            $("#supervisarAtracciones").html(tabla_Html);
            cerrarCarga();
        }
    });
});

$(document).on('click','.detalles_Ciclo', function(){
    iniciarCarga();
    var datos_Html='';
    var $idAperturaValidacion = $(this).data('book-id');

    $.ajax({
        type: "POST",
        url: 'Ver Atracciones/Mostrar_Detalles',
        data: $idAperturaValidacion,
        dataType: 'JSON',
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            cerrarCarga();
        },
    }).done(function(data){
        if(data.respuesta){
            for(var i=0; i<data.msj.length;i++){
                datos_Html += '<tr>'+
                '<td style="vertical-align: middle;">'+data.msj[i]['Personas']+'</td>'+
                '<td style="vertical-align: middle;">'+data.msj[i]['Creditos']+'</td>'+
                '<td style="vertical-align: middle;">'+data.msj[i]['Cortesias']+'</td>'+
                '<td style="vertical-align: middle;">'+data.msj[i]['Descuentos']+'</td>'+
                '<td style="vertical-align: middle;">'+data.msj[i]['PulserasMagicas']+'</td>'+
                '<td style="vertical-align: middle;">'+data.msj[i]['Hora']+'</td>'+
                '</tr>';
            }

            $("#detalles_Ciclo").html(datos_Html);
            cerrarCarga();
        }
    });
});