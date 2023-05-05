function mostrar_Contenedor_Detalles_Ciclo(){
    div = document.getElementById('contenedor_Mostrar_Detalles_Ciclo');
    div.style.display = '';

    prin = document.getElementById('contenedor_Atracciones');
    prin.style.display = 'none';
}

function cerrar_Contenedor_Detalles_Ciclo(){
    div = document.getElementById('contenedor_Atracciones');
    div.style.display='';

    prin = document.getElementById('contenedor_Mostrar_Detalles_Ciclo');
    prin.style.display = 'none';
}

$('#fechaesperada').change(function () {
    iniciarCarga();
    $("#tabla_Atracciones_Supervisar").DataTable().destroy();
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
                '<td style="text-align: center; vertical-align: middle;">'+data.msj[i]['Nombre']+' '+data.msj[i]['Apellidos'] +'</td>'+
                '<td style="text-align: center; vertical-align: middle;">'+data.msj[i]['Atracciones']+'</td>'+
                '<td style="text-align: center; vertical-align: middle;">'+data.datos[i][0]['Cantidad_Ciclos']+'</td>'+
                '<td style="text-align: center; vertical-align: middle;">'+data.datos[i][0]['Cantidad_Creditos']+'</td>'+
                '<td style="text-align: center; vertical-align: middle;">'+data.datos[i][0]['Cantidad_Cortesias']+'</td>'+

                '<td style="text-align: center; vertical-align: middle;">'+data.datos[i][0]['Entrada_Normal']+'</td>'+
                '<td style="text-align: center; vertical-align: middle;">'+data.datos[i][0]['Entrada_Cortesia']+'</td>'+
                '<td style="text-align: center; vertical-align: middle;">'+data.datos[i][0]['Entrada_Mixta']+'</td>'+

                '<td style="text-align: center; vertical-align: middle;">'+data.datos[i][0]['Cantidad_Descuentos']+'</td>'+
                '<td style="text-align: center; vertical-align: middle;">'+data.datos[i][0]['Cantidad_Pulseras']+'</td>'+
                '<td style="text-align: center; vertical-align: middle;">'+data.datos[i][0]['Cantidad_Gratis']+'</td>'+
                '<td style="text-align: center; vertical-align: middle;">'+data.datos[i][0]['Cantidad_Personas']+'</td>'+
                //'<td style="text-align: center; vertical-align: middle;"><a href="#verDetalles" type="button" class="btn btn-success detalles_Ciclo" data-toggle="modal" data-book-id='+"'{"+'"idAperturaValidador":'+data.msj[i]['idAperturaValidador']+"}'"+' >Ver detalles</a></td>'+
                '<td style="text-align:center; vertical-align; middle"><a href="javascript:mostrar_Contenedor_Detalles_Ciclo()" style="transition-duration: 3s, 5s;" class="btn btn-outline-success detalles_Ciclo"  data-book-id='+"'{"+'"idAperturaValidador":'+data.msj[i]['idAperturaValidador']+','+'"atraccion":"'+data.msj[i]['Atracciones']+'"'+"}'"+'><i class="fa fa-eye" aria-hidden="true"></i></a></button></td>'+
                '</tr>';
            }

            $("#supervisarAtracciones").html(tabla_Html);

            $('#tabla_Atracciones_Supervisar').DataTable( {
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
        }
    });
});

$(document).on('click','.detalles_Ciclo', function(){
    iniciarCarga();
    $("#tabla_Ciclo").DataTable().destroy();
    var datos_Html='';
    var titulo_Html = '';
    var ciclo=0;
    var datos = $(this).data('book-id');

    $.ajax({
        type: "POST",
        url: 'Ver Atracciones/Mostrar_Detalles',
        data: {'idAperturaValidador':datos['idAperturaValidador']},
        dataType: 'JSON',
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            cerrarCarga();
        },
    }).done(function(data){
        if(data.respuesta){
            for(var i=0; i<data.msj.length;i++){
                titulo_Html = '<center><label><h2>Ciclos '+datos['atraccion']+'</h2></label></center>';
                ciclo = i+1;
                datos_Html += '<tr>'+
                '<td style="text-align: center; vertical-align: middle;">'+ciclo+'</td>'+
                '<td style="text-align: center; vertical-align: middle;">'+data.msj[i]['Personas']+'</td>'+
                '<td style="text-align: center; vertical-align: middle;">'+data.msj[i]['Creditos']+'</td>'+
                '<td style="text-align: center; vertical-align: middle;">'+data.msj[i]['Cortesias']+'</td>'+
                '<td style="text-align: center; vertical-align: middle;">'+data.msj[i]['entradaNormal']+'</td>'+
                '<td style="text-align: center; vertical-align: middle;">'+data.msj[i]['entradaCortesia']+'</td>'+
                '<td style="text-align: center; vertical-align: middle;">'+data.msj[i]['entradaMixta']+'</td>'+
                '<td style="text-align: center; vertical-align: middle;">'+data.msj[i]['Descuentos']+'</td>'+
                '<td style="text-align: center; vertical-align: middle;">'+data.msj[i]['PulserasMagicas']+'</td>'+
                '<td style="text-align: center; vertical-align: middle;">'+data.msj[i]['Gratis']+'</td>'+
                '<td style="text-align: center; vertical-align: middle;">'+data.msj[i]['Hora']+'</td>'+
                '</tr>';
            }

            $("#contenedor_Titutlo").html(titulo_Html);
            $("#detalles_Ciclo").html(datos_Html);
            
            $('#tabla_Ciclo').DataTable( {
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
        }
    });
});