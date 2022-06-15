$("#fechaesperada").change(function(){
    iniciarCarga();
    $("#tabla_Taquillas_Inactivas").DataTable().destroy();

    var idEvento = $("#evento option:selected").val();
    var fecha = $("#fechaesperada").val();

    html_Taquilla = '';
    html_Color = '';

    if(idEvento == 'Elige un evento'){
        alert('Seleccione un evento por favor');
        cerrarCarga();
    }
    else{

        $.ajax({
            type: 'POST',
            url: 'Ver Taquillas/Taquillas_Inactivas',
            data: {'idEvento': idEvento, 'fecha':fecha},
            dataType: 'JSON',
            error: function (jqXHR, textStatus, errorThrown) {
                alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
                cerrarCarga;
            },
        }).done(function(data){
            if(data.respuesta){
                for(var i=0; i<data.taquillas.length; i++){
                    if(data.taquillas[i]['Ventanillas_Confirmadas'] === data.taquillas[i]['Ventanillas_Utilizadas']){
                        html_Color="background-color: green;"
                    }
                    else{
                        html_Color="background-color: red;";
                    }

                    html_Taquilla +=
                    '<tr>'+
                        '<td style="'+html_Color+'" ></td>'+
                        '<td style="text-align: center; vertical-align: middle;">'+data.taquillas[i]['Nombre']+'</td>'+
                        '<td style="text-align: center; vertical-align: middle;">'+data.taquillas[i]['Efectivo']+'</td>'+
                        '<td style="text-align: center; vertical-align: middle;">'+data.taquillas[i]['Tarjeta']+'</td>'+
                        '<td style="text-align: center; vertical-align: middle;"><a data-toggle="modal" data-target="#modal_Ventanilla_Inactiva" style="transition-duration: 3s, 5s;" class ="btn btn-outline-success ventanillas_Inactivas" data-book-id='+"'{"+'"idTaquilla":'+data.taquillas[i]['idTaquilla']+"}'"+'><i class="fa fa-eye" aria-hidden="true"></i></a></button></td>'+
                    '</tr>'
                    ;
                }
            }

            $("#body_Taquillas_Inactivas").html(html_Taquilla);
            $('#tabla_Taquillas_Inactivas').DataTable( {
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
    }
});

$(document).on('click','.ventanillas_Inactivas', function(){
    iniciarCarga();
    $("#tabla_Ventanillas_Inactivas").DataTable().destroy();
    
    var idTaquilla = $(this).data('book-id');
    var idEvento = $("#evento option:selected").val();
    var fecha = $("#fechaesperada").val();
    var html_Ventanillas = '';
    var html_Color = '';

    $.ajax({
        type:'POST',
        url:'Ver Taquillas/Ventanillas_Inactivas',
        data:{'idTaquilla':idTaquilla['idTaquilla'],'idEvento':idEvento,'fecha':fecha},
        dataType:'JSON',
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            cerrarCarga;
        },
    }).done(function(data){
        if(data.respuesta){


            if(data.resultado){
                alert('Si hay datos');
                console.log(data.resultado);
                for(var i=0; i<data.ventanillas.length;i++){
                    //alert(data.ventanillas[i]['idUsuario']);
                    console.log('id ' +  data.ventanillas[i]['idUsuario']);
                    if(data.ventanillas[i]['idUsuario'] === null){
                        html_Color = "background-color: red;";
                    }
                    else{
                        html_Color ="background-color: green;";
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
                        '<td style="text-align: center; vertical-align: middle;">'+data.ventanillas[i]['horaCierre']+'</td>'
                    '</tr>'
                    ;
                }
            }
            else{
                alert('No hay datos');
                console.log(data.resultado);
                for(var i=0; i<data.ventanillas.length;i++){
                    //alert(data.ventanillas[i]['idUsuario']);
                    console.log('id ' +  data.ventanillas[i]['idUsuario']);
                    if(data.ventanillas[i]['idUsuario'] === null){
                        html_Color = "background-color: red;";
                    }
                    else{
                        html_Color ="background-color: green;";
                    }
    
                    html_Ventanillas += 
                    '<tr>'+
                        '<td style="'+html_Color+'"></td>'+
                        '<td style="text-align: center; vertical-align: middle;">'+data.ventanillas[i]['Ventanilla']+'</td>'+
                        '<td style="text-align: center; vertical-align: middle;">'+data.ventanillas[i]['Nombre']+' '+data.ventanillas[i]['Apellidos'] +'</td>'+
                        '<td style="text-align: center; vertical-align: middle;">'+data.ventanillas[i]['Efectivo']+'</td>'+
                        '<td style="text-align: center; vertical-align: middle;">'+data.ventanillas[i]['Boucher']+'</td>'+
                        '<td style="text-align: center; vertical-align: middle;">0</td>'+
                        '<td style="text-align: center; vertical-align: middle;">'+data.ventanillas[i]['horaApertura']+'</td>'+
                        '<td style="text-align: center; vertical-align: middle;">'+data.ventanillas[i]['horaCierre']+'</td>'
                    '</tr>'
                    ;
                }
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