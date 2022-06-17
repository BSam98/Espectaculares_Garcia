$(document).ready(function(){
    iniciarCarga();
    $("#tabla_Ventanillas_Activas").DataTable().destroy();
    var idEvento = $("#idEvento").val();
    html_Ventanillas ='';
    html_Color = '';

    $.ajax({
        type: 'POST',
        url: 'Supervisar_Taquillas/Ventanillas_Activas',
        data: {'idEvento':idEvento},
        dataType:'JSON',
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            cerrarCarga();
        },
    }).done(function(data){
        if(data.respuesta){
            for(var i=0; i<data.ventanillas2.length; i++){
                if(data.ventanillas2[i]['idStatus'] == 8 ){
                    html_Color = "background-color: orange;";
                }
                else{
                    html_Color = "background-color: red;";
                }

                html_Ventanillas +=
                '<tr>'+
                    '<td style="'+html_Color+'"></td>'+
                    '<td style="text-align: center; vertical-align:middle;">'+data.ventanillas2[i]['Ventanillas']+'</td>'+
                    '<td style="text-align: center; vertical-align:middle;">'+data.ventanillas2[i]['Nombre']+ ' '+ data.ventanillas2[i]['Apellidos']+'</td>'+
                    '<td style="text-align: center; vertical-align:middle;">0</td>'+
                    '<td style="text-align: center; vertical-align:middle;">0</td>'+
                    '<td style="text-align: center; vertical-align:middle;">'+data.ventanillas2[i]['horaApertura']+'</td>'+
                    '<td style="text-align: center; vertical-align:middle;"><a  class="ventanillas_Activas" data-book-id='+"'{"+'"idAperturaVentanilla":'+data.ventanillas2[i]['idAperturaVentanilla']+"}'"+'><i class="fa fa-paint-brush btn btn-outline-warning" aria-hidden="true"></i></a></td>'+
                '</tr>';
            }

            for(var i=0; i<data.ventanillas.length; i++){
                if(data.ventanillas[i]['idStatus'] == 8 ){
                    html_Color = "background-color: orange;";
                }
                else{
                    html_Color = "background-color: red;";
                }

                html_Ventanillas +=
                '<tr>'+
                    '<td style="'+html_Color+'"></td>'+
                    '<td style="text-align: center; vertical-align:middle;">'+data.ventanillas[i]['Ventanillas']+'</td>'+
                    '<td style="text-align: center; vertical-align:middle;">'+data.ventanillas[i]['Nombre']+ ' '+ data.ventanillas[i]['Apellidos']+'</td>'+
                    '<td style="text-align: center; vertical-align:middle;">'+data.ventanillas[i]['Efectivo']+'</td>'+
                    '<td style="text-align: center; vertical-align:middle;">'+data.ventanillas[i]['Tarjeta']+'</td>'+
                    '<td style="text-align: center; vertical-align:middle;">'+data.ventanillas[i]['horaApertura']+'</td>'+
                    '<td style="text-align: center; vertical-align:middle;"><a  class="ventanillas_Activas" data-book-id='+"'{"+'"idAperturaVentanilla":'+data.ventanillas[i]['idAperturaVentanilla']+"}'"+'><i class="fa fa-paint-brush btn btn-outline-warning" aria-hidden="true"></i></a></td>'+
                '</tr>';
            }
        }
        $("#body_Ventanillas_Activas").html(html_Ventanillas);
        $('#tabla_Ventanillas_Activas').DataTable( {
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

$("#fechaesperada").on('change',function(){
    iniciarCarga();
    $("#tabla_Ventanillas_Inactivas").DataTable().destroy();
    var idEvento = $("#idEvento").val();
    var fecha = $("#fechaesperada").val();

    var html_Ventanillas = '';
    var html_Color = '';

    $.ajax({
        type:'POST',
        url:'Supervisar_Taquillas/Ventanillas_Inactivas',
        data:{'idEvento':idEvento,'fecha':fecha},
        dataType:'JSON',
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            cerrarCarga();
        },
    }).done(function(data){
        if(data.respuesta){
            for(var i=0; i<data.ventanillas.length; i++){
                if(data.ventanillas[i]['idStatus'] == 9){
                    html_Color = "background-color: red;";
                }
                else{
                    if(data.ventanillas[i]['idUsuario'] ==11){
                        html_Color ="background-color: green;";
                    }
                }
    
                html_Ventanillas += 
                '<tr>'+
                    '<td style="'+html_Color+'"></td>'+
                    '<td style="text-align: center; vertical-align: middle;">'+data.ventanillas[i]['Ventanilla']+'</td>'+
                    '<td style="text-align: center; vertical-align: middle;">'+data.ventanillas[i]['Nombre']+' '+data.ventanillas[i]['Apellidos'] +'</td>'+
                    '<td style="text-align: center; vertical-align: middle;">'+data.ventanillas[i]['Efectivo']+'</td>'+
                    '<td style="text-align: center; vertical-align: middle;">'+data.ventanillas[i]['Boucher']+'</td>'+
                    '<td style="text-align: center; vertical-align: middle;">'+data.ventanillas[i]['Cantidad']+'</td>'+
                    '<td style="text-align: center; vertical-align: middle;">'+data.ventanillas[i]['horaApertura']+'</td>'+
                    '<td style="text-align: center; vertical-align: middle;">'+data.ventanillas[i]['horaCierre']+'</td>'+
                    '<td style="text-align: center; vertical-align: middle;"><a class ="btn btn-outline-success ventanillas_Inactivas" data-book-id='+"'{"+'"idAperturaVentanilla":'+data.ventanillas[i]['idAperturaVentanilla']+"}'"+'><i class="fa fa-eye" aria-hidden="true"></i></a></button></td>'
                '</tr>'
                ;
            }
        }
        $("#body_Ventanillas_Inactivas").html(html_Ventanillas);
        $('#tabla_Ventanillas_Inactivas').DataTable( {
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

$(document).on('click','.ventanillas_Activas', function(){
    var id = $(this).data('book-id');
    
    alert('idAperturaVentanilla: ' + id['idAperturaVentanilla']);
});

$(document).on('click','.ventanillas_Inactivas',function(){
});