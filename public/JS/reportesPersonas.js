$(document).ready(function(){
    iniciarCarga();
    $("#tabla_Reporte_Evento").DataTable().destroy();

    var f = new Date();
    var fecha = f.toISOString().split('T')[0];
    $("#fechaesperada").val(fecha);

    $.ajax({
        type:'POST',
        url: 'Utilizacion por Evento/Reporte',
        data: {'fecha': fecha},
        dataType: 'JSON',
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            cerrarCarga();
        },
    }).done(function(data){
        var html = '';
        for(var i = 0; i<data.msj.length;i++){
            html  += '<tr>'+
            '<td style="text-align: center; vertical-align: middle;">'+data.msj[i]['Nombre']+'</td>'+
            '<td style="text-align: center; vertical-align: middle;">'+data.msj[i]['Personas']+'</td>'+
            '<td style="text-align: center; vertical-align: middle;">'+data.msj[i]['Descuentos']+'</td>'+
            '<td style="text-align: center; vertical-align: middle;">'+data.msj[i]['Pulsera']+'</td>'+
            '<td style="text-align: center; vertical-align: middle;">'+data.msj[i]['Gratis']+'</td>'+
            '</tr>';
        }
        $("#Reporte_Evento").html(html);
        $('#tabla_Reporte_Evento').DataTable( {
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

$('#fechaesperada').change(function(){
    iniciarCarga();
    $("#tabla_Reporte_Evento").DataTable().destroy();

    var fecha = $("#fechaesperada").val();

    $.ajax({
        type:'POST',
        url: 'Utilizacion por Evento/Reporte',
        data: {'fecha': fecha},
        dataType: 'JSON',
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            cerrarCarga();
        },
    }).done(function(data){
        var html = '';
        for(var i = 0; i<data.msj.length;i++){
            html  += '<tr>'+
            '<td style="text-align: center; vertical-align: middle;">'+data.msj[i]['Nombre']+'</td>'+
            '<td style="text-align: center; vertical-align: middle;">'+data.msj[i]['Personas']+'</td>'+
            '<td style="text-align: center; vertical-align: middle;">'+data.msj[i]['Descuentos']+'</td>'+
            '<td style="text-align: center; vertical-align: middle;">'+data.msj[i]['Pulsera']+'</td>'+
            '<td style="text-align: center; vertical-align: middle;">'+data.msj[i]['Gratis']+'</td>'+
            '</tr>';
        }
        $("#Reporte_Evento").html(html);
        $('#tabla_Reporte_Evento').DataTable( {
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