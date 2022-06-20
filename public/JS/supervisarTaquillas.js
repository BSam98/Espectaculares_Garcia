$(document).ready(function(){
    iniciarCarga();
    $("#tabla_Ventanillas").DataTable().destroy();
    var idEvento = $("#idEvento").val();
    html_Ventanillas ='';
    html_Color = '';
    var f = new Date();

    var fecha = f.toISOString().split('T')[0];
    $.ajax({
        type: 'POST',
        url: 'Supervisar_Taquillas/Ventanillas',
        data: {'idEvento':idEvento,'fecha':fecha},
        dataType:'JSON',
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            cerrarCarga();
        },
    }).done(function(data){
        if(data.respuesta){
            for(var i=0; i<data.ventanillas_Activas_2.length; i++){
                if(data.ventanillas_Activas_2[i]['idStatus'] == 8 ){
                    html_Color = "background-color: orange;";
                }
                else{
                    if(data.ventanillas_Activas_2[i]['idStatus'] == 12){
                        html_Color = "background-color: black;";
                    }
                }

                html_Ventanillas +=
                '<tr>'+
                    '<td style="'+html_Color+'"></td>'+
                    '<td style="text-align: center; vertical-align:middle;">'+data.ventanillas_Activas_2[i]['Ventanillas']+'</td>'+
                    '<td style="text-align: center; vertical-align:middle;">'+data.ventanillas_Activas_2[i]['Nombre']+ ' '+ data.ventanillas_Activas_2[i]['Apellidos']+'</td>'+
                    '<td style="text-align: center; vertical-align:middle;">0</td>'+
                    '<td style="text-align: center; vertical-align:middle;">0</td>'+
                    '<td style="text-align: center; vertical-align:middle;">'+data.ventanillas_Activas_2[i]['horaApertura']+'</td>'+
                    '<td style="text-align: center; vertical-align:middle;">'+
                        '<table>'+
                            '<tbody style="vertical-aligrn: middel;">'+
                                '<tr>'+
                                    '<td>'+
                                        '<ul class="circulo">'+
                                            '<li><a href="" type="button" class="" data-toggle="" data-book-id="">Realizar Cierre</a></li>'+
                                        '</ul>'+
                                    '</td>'+
                                '</tr>'+
                            '</tbody>'+
                        '</table>'+
                    '</td>'+
                '</tr>';
            }

            for(var i=0; i<data.ventanillas_Activas_1.length; i++){
                if(data.ventanillas_Activas_1[i]['idStatus'] == 8 ){
                    html_Color = "background-color: orange;";
                }
                else{
                    if(data.ventanillas_Activas_1[i]['idStatus'] == 12){
                        html_Color = "background-color: black;";
                    }
                }

                html_Ventanillas +=
                '<tr>'+
                    '<td style="'+html_Color+'"></td>'+
                    '<td style="text-align: center; vertical-align:middle;">'+data.ventanillas_Activas_1[i]['Ventanillas']+'</td>'+
                    '<td style="text-align: center; vertical-align:middle;">'+data.ventanillas_Activas_1[i]['Nombre']+ ' '+ data.ventanillas_Activas_1[i]['Apellidos']+'</td>'+
                    '<td style="text-align: center; vertical-align:middle;">'+data.ventanillas_Activas_1[i]['Efectivo']+'</td>'+
                    '<td style="text-align: center; vertical-align:middle;">'+data.ventanillas_Activas_1[i]['Tarjeta']+'</td>'+
                    '<td style="text-align: center; vertical-align:middle;">'+data.ventanillas_Activas_1[i]['horaApertura']+'</td>'+
                    '<td style="text-align: center; vertical-align:middle;">'+
                        '<table>'+
                            '<tbody style="vertical-aligrn: middel;">'+
                                '<tr>'+
                                    '<td>'+
                                        '<ul class="circulo">'+
                                            '<li><a href="" type="button" class="" data-toggle="" data-book-id="">Realizar Cierre</a></li>'+
                                        '</ul>'+
                                    '</td>'+
                                '</tr>'+
                            '</tbody>'+
                        '</table>'+
                    '</td>'+
                '</tr>';
            }

            for(var i=0; i<data.ventanillas_Inactivas_1.length; i++){
                if(data.ventanillas_Inactivas_1[i]['idStatus'] == 9){
                    html_Color = "background-color: red;";
                }
                else{
                    if(data.ventanillas_Inactivas_1[i]['idStatus'] ==11){
                        html_Color ="background-color: green;";
                    }
                }
    
                html_Ventanillas += 
                '<tr>'+
                    '<td style="'+html_Color+'"></td>'+
                    '<td style="text-align: center; vertical-align: middle;">'+data.ventanillas_Inactivas_1[i]['Ventanilla']+'</td>'+
                    '<td style="text-align: center; vertical-align: middle;">'+data.ventanillas_Inactivas_1[i]['Nombre']+' '+data.ventanillas_Inactivas_1[i]['Apellidos'] +'</td>'+
                    '<td style="text-align: center; vertical-align: middle;">'+data.ventanillas_Inactivas_1[i]['Efectivo']+'</td>'+
                    '<td style="text-align: center; vertical-align: middle;">'+data.ventanillas_Inactivas_1[i]['Boucher']+'</td>'+
                    '<td style="text-align: center; vertical-align: middle;">'+data.ventanillas_Inactivas_1[i]['Cantidad']+'</td>'+
                    '<td style="text-align: center; vertical-align: middle;">'+data.ventanillas_Inactivas_1[i]['horaApertura']+'</td>'+
                    '<td style="text-align: center; vertical-align: middle;">'+data.ventanillas_Inactivas_1[i]['horaCierre']+'</td>'+
                    '<td style="text-align: center; vertical-align: middle;"><a class ="btn btn-outline-success ventanillas_Inactivas" data-book-id='+"'{"+'"idAperturaVentanilla":'+data.ventanillas_Inactivas_1[i]['idAperturaVentanilla']+"}'"+'><i class="fa fa-eye" aria-hidden="true"></i></a></button></td>'
                '</tr>'
                ;
            }

            for(var i=0; i<data.ventanillas_Inactivas_2.length; i++){
                if(data.ventanillas_Inactivas_2[i]['idStatus'] == 9){
                    html_Color = "background-color: red;";
                }
                else{
                    if(data.ventanillas_Inactivas_2[i]['idStatus'] ==11){
                        html_Color ="background-color: green;";
                    }
                }
    
                html_Ventanillas += 
                '<tr>'+
                    '<td style="'+html_Color+'"></td>'+
                    '<td style="text-align: center; vertical-align: middle;">'+data.ventanillas_Inactivas_2[i]['Ventanilla']+'</td>'+
                    '<td style="text-align: center; vertical-align: middle;">'+data.ventanillas_Inactivas_2[i]['Nombre']+' '+data.ventanillas_Inactivas_2[i]['Apellidos'] +'</td>'+
                    '<td style="text-align: center; vertical-align: middle;">'+data.ventanillas_Inactivas_2[i]['Efectivo']+'</td>'+
                    '<td style="text-align: center; vertical-align: middle;">'+data.ventanillas_Inactivas_2[i]['Boucher']+'</td>'+
                    '<td style="text-align: center; vertical-align: middle;">'+data.ventanillas_Inactivas_2[i]['Cantidad']+'</td>'+
                    '<td style="text-align: center; vertical-align: middle;">'+data.ventanillas_Inactivas_2[i]['horaApertura']+'</td>'+
                    '<td style="text-align: center; vertical-align: middle;">'+data.ventanillas_Inactivas_2[i]['horaCierre']+'</td>'+
                    '<td style="text-align: center; vertical-align: middle;"><a class ="btn btn-outline-success ventanillas_Inactivas" data-book-id='+"'{"+'"idAperturaVentanilla":'+data.ventanillas_Inactivas_1[i]['idAperturaVentanilla']+"}'"+'><i class="fa fa-eye" aria-hidden="true"></i></a></button></td>'
                '</tr>'
                ;
            }

        }
        $("#body_Ventanillas").html(html_Ventanillas);
        $('#tabla_Ventanillas').DataTable( {
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
            "order": [[ 5, "desc" ]]//Ordenar (columna,orden)
        });
        cerrarCarga();
    });
});

$("#fechaesperada").on('change',function(){
    iniciarCarga();
    $("#tabla_Ventanillas").DataTable().destroy();
    var idEvento = $("#idEvento").val();
    var fecha = $("#fechaesperada").val();

    var html_Opciones = '';
    var html_Ventanillas = '';
    var html_Color = '';

    $.ajax({
        type:'POST',
        url:'Supervisar_Taquillas/Ventanillas',
        data:{'idEvento':idEvento,'fecha':fecha},
        dataType:'JSON',
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            cerrarCarga();
        },
    }).done(function(data){
        if(data.respuesta){
            for(var i=0; i<data.ventanillas_Activas_2.length; i++){
                if(data.ventanillas_Activas_2[i]['idStatus'] == 8 ){
                    html_Color = "background-color: orange;";
                }
                else{
                    if(data.ventanillas_Activas_2[i]['idStatus'] == 12){
                        html_Color = "background-color: black;";
                    }
                }

                html_Ventanillas +=
                '<tr>'+
                    '<td style="'+html_Color+'"></td>'+
                    '<td style="text-align: center; vertical-align:middle;">'+data.ventanillas_Activas_2[i]['Ventanillas']+'</td>'+
                    '<td style="text-align: center; vertical-align:middle;">'+data.ventanillas_Activas_2[i]['Nombre']+ ' '+ data.ventanillas_Activas_2[i]['Apellidos']+'</td>'+
                    '<td style="text-align: center; vertical-align:middle;">0</td>'+
                    '<td style="text-align: center; vertical-align:middle;">0</td>'+
                    '<td style="text-align: center; vertical-align:middle;">'+data.ventanillas_Activas_2[i]['horaApertura']+'</td>'+
                    '<td style="text-align: center; vertical-align:middle;">'+
                        '<table>'+
                            '<tbody style="vertical-aligrn: middel;">'+
                                '<tr>'+
                                    '<td>'+
                                        '<ul class="circulo">'+
                                            '<li><a href="" type="button" class="" data-toggle="" data-book-id="">Realizar Cierre</a></li>'+
                                        '</ul>'+
                                    '</td>'+
                                '</tr>'+
                            '</tbody>'+
                        '</table>'+
                    '</td>'+
                '</tr>';
            }

            for(var i=0; i<data.ventanillas_Activas_1.length; i++){
                if(data.ventanillas_Activas_1[i]['idStatus'] == 8 ){
                    html_Color = "background-color: orange;";
                }
                else{
                    if(data.ventanillas_Activas_1[i]['idStatus'] == 12){
                        html_Color = "background-color: black;";
                    }
                }

                html_Ventanillas +=
                '<tr>'+
                    '<td style="'+html_Color+'"></td>'+
                    '<td style="text-align: center; vertical-align:middle;">'+data.ventanillas_Activas_1[i]['Ventanillas']+'</td>'+
                    '<td style="text-align: center; vertical-align:middle;">'+data.ventanillas_Activas_1[i]['Nombre']+ ' '+ data.ventanillas_Activas_1[i]['Apellidos']+'</td>'+
                    '<td style="text-align: center; vertical-align:middle;">'+data.ventanillas_Activas_1[i]['Efectivo']+'</td>'+
                    '<td style="text-align: center; vertical-align:middle;">'+data.ventanillas_Activas_1[i]['Tarjeta']+'</td>'+
                    '<td style="text-align: center; vertical-align:middle;">'+data.ventanillas_Activas_1[i]['horaApertura']+'</td>'+
                    '<td style="text-align: center; vertical-align:middle;">'+
                        '<table>'+
                            '<tbody style="vertical-aligrn: middel;">'+
                                '<tr>'+
                                    '<td>'+
                                        '<ul class="circulo">'+
                                            '<li><a href="" type="button" class="" data-toggle="" data-book-id="">Realizar Cierre</a></li>'+
                                        '</ul>'+
                                    '</td>'+
                                '</tr>'+
                            '</tbody>'+
                        '</table>'+
                    '</td>'+
                '</tr>';
            }

            for(var i=0; i<data.ventanillas_Inactivas_1.length; i++){
                if(data.ventanillas_Inactivas_1[i]['idStatus'] == 9){
                    html_Color = "background-color: red;";
                    html_Opciones=
                    '<li><a href="" type="button">Validar Cierre</a></li>';
                }
                else{
                    if(data.ventanillas_Inactivas_1[i]['idStatus'] ==11){
                        html_Color ="background-color: green;";
                        html_Opciones=
                        '<li><a href="" type="button">Mostrar Cierre</a></li>';
                    }
                }
    
                html_Ventanillas += 
                '<tr>'+
                    '<td style="'+html_Color+'"></td>'+
                    '<td style="text-align: center; vertical-align: middle;">'+data.ventanillas_Inactivas_1[i]['Ventanilla']+'</td>'+
                    '<td style="text-align: center; vertical-align: middle;">'+data.ventanillas_Inactivas_1[i]['Nombre']+' '+data.ventanillas_Inactivas_1[i]['Apellidos'] +'</td>'+
                    '<td style="text-align: center; vertical-align: middle;">'+data.ventanillas_Inactivas_1[i]['Efectivo']+'</td>'+
                    '<td style="text-align: center; vertical-align: middle;">'+data.ventanillas_Inactivas_1[i]['Boucher']+'</td>'+
                    '<td style="text-align: center; vertical-align: middle;">'+data.ventanillas_Inactivas_1[i]['horaApertura']+'</td>'+
                    '<td style="text-align: center; vertical-align: middle;">'+
                        '<table>'+
                            '<tbody style="vertical-aligrn: middel;">'+
                                '<tr>'+
                                    '<td>'+
                                        '<ul class="circulo">'+
                                            html_Opciones+
                                        '</ul>'+
                                    '</td>'+
                                '</tr>'+
                            '</tbody>'+
                        '</table>'+
                    '</td>'+
                '</tr>'
                ;
            }

            for(var i=0; i<data.ventanillas_Inactivas_2.length; i++){
                if(data.ventanillas_Inactivas_2[i]['idStatus'] == 9){
                    html_Color = "background-color: red;";
                    html_Opciones=
                    '<li><a href="" type="button">Validar Cierre</a></li>';
                }
                else{
                    if(data.ventanillas_Inactivas_2[i]['idStatus'] ==11){
                        html_Color ="background-color: green;";
                        html_Opciones=
                        '<li><a href="" type="button">Mostrar Cierre</a></li>';
                    }
                }
    
                html_Ventanillas += 
                '<tr>'+
                    '<td style="'+html_Color+'"></td>'+
                    '<td style="text-align: center; vertical-align: middle;">'+data.ventanillas_Inactivas_2[i]['Ventanilla']+'</td>'+
                    '<td style="text-align: center; vertical-align: middle;">'+data.ventanillas_Inactivas_2[i]['Nombre']+' '+data.ventanillas_Inactivas_2[i]['Apellidos'] +'</td>'+
                    '<td style="text-align: center; vertical-align: middle;">'+data.ventanillas_Inactivas_2[i]['Efectivo']+'</td>'+
                    '<td style="text-align: center; vertical-align: middle;">'+data.ventanillas_Inactivas_2[i]['Boucher']+'</td>'+
                    '<td style="text-align: center; vertical-align: middle;">'+data.ventanillas_Inactivas_2[i]['horaApertura']+'</td>'+
                    '<td style="text-align: center; vertical-align: middle;">'+
                        '<table>'+
                            '<tbody style="vertical-aligrn: middel;">'+
                                '<tr>'+
                                    '<td>'+
                                        '<ul class="circulo">'+
                                            html_Opciones+
                                        '</ul>'+
                                    '</td>'+
                                '</tr>'+
                            '</tbody>'+
                        '</table>'+
                    '</td>'+
                '</tr>'
                ;
            }
        }
        $("#body_Ventanillas").html(html_Ventanillas);
        $('#tabla_Ventanillas').DataTable( {
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
            "order": [[ 5, "asc" ]]//Ordenar (columna,orden)
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