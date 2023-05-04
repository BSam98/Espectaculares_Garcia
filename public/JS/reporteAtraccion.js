$("#fechaesperada").on('change', function(){
    iniciarCarga();
    var html = '';
    var creditos;
    var precio;
    var subTotal;
    var total;
    var idEvento = $("#evento option:selected").val();
    var fecha =$("#fechaesperada").val();


    $("#tabla_Reporte_Atraccion_Evento").DataTable().destroy();
    $.ajax({
        type:'POST',
        url: 'Utilizacion por Atracción/Reporte',
        data: {'idEvento': idEvento,'fecha':fecha},
        dataType: 'JSON',
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            cerrarCarga();
        }
    }).done(function(data){
        if(data.respuesta){
            creditos = data.evento[0]['Creditos'];
            precio = data.evento[0]['Precio'];
            console.log('creditos: ' + creditos + ' ' + 'precio: ' + precio);

            //console.log('datos: ' + JSON.stringify(data.msj));
            for(var i=0; i<data.msj.length;i++){
                subTotal = data.msj[i]['Cantidad_Creditos'] * precio;
                console.log('Sub total: ' + subTotal);
                total = subTotal / creditos;
                console.log('Total: ' + total);
                html += '<tr>'+
                '<td style="text-align: center; vertical-align: middle;">'+data.msj[i]['Nombre']+'</td>'+
                '<td style="text-align: center; vertical-align: middle;">'+total+'</td>'+
                '<td style="text-align: center; vertical-align: middle;">'+data.msj[i]['Entrada_Normal']+'</td>'+
                '<td style="text-align: center; vertical-align: middle;">'+data.msj[i]['Entrada_Cortesia']+'</td>'+
                '<td style="text-align: center; vertical-align: middle;">'+data.msj[i]['Entrada_Mixta']+'</td>'+
                '<td style="text-align: center; vertical-align: middle;">'+data.msj[i]['Cantidad_Gratis']+'</td>'+
                '<td style="text-align: center; vertical-align: middle;">'+data.msj[i]['Cantidad_Descuentos']+'</td>'+
                '<td style="text-align: center; vertical-align: middle;">'+data.msj[i]['Cantidad_Pulseras']+'</td>'+
                '<td style="text-align: center; vertical-align: middle;">'+data.msj[i]['Cantidad_Personas']+'</td>'+
                '<td style="text-align: center; vertical-align: middle;">'+data.msj[i]['Cantidad_Ciclos']+'</td>'+
                '</tr>'; 
            }
            $("#cuerpo_Reporte_Atraccion_Evento").html(html);
            
            $('#tabla_Reporte_Atraccion_Evento').DataTable( {
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