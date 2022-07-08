function mostrar_Contenedor_Realizar_Cierre() {
    div = document.getElementById('contenedor_Realizar_Cierre');
    div.style.display = '';
    prin = document.getElementById('contenedor_Ventanillas');
    prin.style.display = 'none';
}

function cerra_Contenedor_Realizar_Cierre() {
    div = document.getElementById('contenedor_Ventanillas');
    div.style.display = '';
    prin = document.getElementById('contenedor_Realizar_Cierre');
    prin.style.display = 'none';
}


function mostrar_Contenedor_Ventanillas_Inactivas() {
    div = document.getElementById('contenedor_Mostrar_Ventanillas_Inactivas');
    div.style.display = '';
    prin = document.getElementById('contenedor_Ventanillas');
    prin.style.display = 'none';
}

function cerra_Contenedor_Ventanillas_Inactivas() {
    div = document.getElementById('contenedor_Ventanillas');
    div.style.display = '';
    prin = document.getElementById('contenedor_Mostrar_Ventanillas_Inactivas');
    prin.style.display = 'none';
}


$("#evento").on('change', function(){
    iniciarCarga();
    $("#tabla_Taquillas_Activas").DataTable().destroy();
    var f = new Date();
    var idEvento = $("#evento option:selected").val();
    var fecha = f.toISOString().split('T')[0];
    var html_Taquillas ='';

    if(idEvento == 'Elige un evento'){
        alert('Seleccione un evento por favor');
        cerrarCarga();
    }
    else{
        $.ajax({
            type:'POST',
            url:'Ver Taquillas/Taquillas_Activas',
            data:{'idEvento':idEvento},
            dataType: 'JSON',
            error: function (jqXHR, textStatus, errorThrown) {
                alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
                cerrarCarga;
            },
        }).done(function(data){
            if(data.respuesta){
                for(var i=0; i<data.taquillas.length;i++){
                    html_Taquillas +=
                    '<tr>'+
                        '<td style="text-align: center; vertical-align: middle;">'+data.taquillas[i]['Nombre']+'</td>'+
                        '<td style="text-align: center; vertical-align: middle;">'+data.taquillas[i]['Efectivo']+'</td>'+
                        '<td style="text-align: center; vertical-align: middle;">'+data.taquillas[i]['Tarjeta']+'</td>'+
                        '<td style="text-align: center; vertical-align: middle;"><a href="javascript:mostrar_Contenedor_Realizar_Cierre()" style="transition-duration: 3s, 5s;" class ="btn btn-outline-success ventanillas_Activas" data-book-id='+"'{"+'"idTaquilla":'+data.taquillas[i]['idTaquilla']+"}'"+'><i class="fa fa-eye" aria-hidden="true"></i></a></button></td>'+
                    '</tr>';
                }
            }
            $("#body_Taquillas_Activas").html(html_Taquillas);
            $('#tabla_Taquillas_Activas').DataTable( {
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
                        '<td style="text-align: center; vertical-align: middle;"><a href="javascript:mostrar_Contenedor_Ventanillas_Inactivas()" style="transition-duration: 3s, 5s;" class ="btn btn-outline-success ventanillas_Inactivas" data-book-id='+"'{"+'"idTaquilla":'+data.taquillas[i]['idTaquilla']+"}'"+'><i class="fa fa-eye" aria-hidden="true"></i></a></button></td>'+
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

$(document).on('click','.ventanillas_Activas', function (){
    iniciarCarga();
    //$("#tabla_Ventanillas_Activas").DataTable().destroy();
    var idTaquilla = $(this).data('book-id');
    var idEvento = $("#evento option:selected").val();
    var html_Ventanillas = '';
    
    $.ajax({
        type:'POST',
        url:'Ver Taquillas/Ventanillas_Activas',
        data:{'idEvento': idEvento,'idTaquilla':idTaquilla['idTaquilla']},
        dataType:'JSON',
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            cerrarCarga;
        },
    }).done(function(data){
        if(data.respuesta){

            for(var i=0;i<data.ventanilla1.length;i++){
                html_Ventanillas +=
                '<tr>'+
                    '<td style="text-align: center; vertical-align: middle;">'+data.ventanilla1[i]['Ventanilla']+'</td>'+
                    '<td style="text-align: center; vertical-align: middle;">'+data.ventanilla1[i]['Nombre']+ ' '+ data.ventanilla1[i]['Apellidos'] +'</td>'+
                    '<td style="text-align: center; vertical-align: middle;">0</td>'+
                    '<td style="text-align: center; vertical-align: middle;">0</td>'+
                    '<td style="text-align: center; vertical-align: middle;">'+data.ventanilla1[i]['horaApertura']+'</td>'+
                    '<td style="text-align: center; vertical-align: middle;"><a href="" style="transition-duration: 3s, 5s;" class ="btn btn-outline-success ventanillas_Activas" data-book-id='+"'{"+'"idAperturaVentanilla":'+data.ventanilla1[i]['idAperturaVentanilla']+"}'"+'><i class="fa fa-eye" aria-hidden="true"></i></a></button></td>'+
                '</tr>';
            }

            for(var i=0;i<data.ventanilla2.length;i++){
                html_Ventanillas +=
                '<tr style="text-align: center; vertical-align: middle;">'+
                    '<td style="text-align: center; vertical-align: middle;">'+data.ventanilla2[i]['Ventanilla']+'</td>'+
                    '<td style="text-align: center; vertical-align: middle;">'+data.ventanilla2[i]['Nombre']+ ' '+ data.ventanilla2[i]['Apellidos'] +'</td>'+
                    '<td style="text-align: center; vertical-align: middle;">'+data.ventanilla2[i]['Efectivo']+'</td>'+
                    '<td style="text-align: center; vertical-align: middle;">'+data.ventanilla2[i]['Tarjeta']+'</td>'+
                    '<td style="text-align: center; vertical-align: middle;">'+data.ventanilla2[i]['horaApertura']+'</td>'+
                    '<td style="text-align: center; vertical-align: middle;"><a href="" style="transition-duration: 3s, 5s;" class ="btn btn-outline-success ventanillas_Activas" data-book-id='+"'{"+'"idAperturaVentanilla":'+data.ventanilla2[i]['idAperturaVentanilla']+"}'"+'><i class="fa fa-eye" aria-hidden="true"></i></a></button></td>'+
                '</tr>';
            }
        }

        $("#body_Ventanillas_Activas").html(html_Ventanillas);
        /*
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
        */
        cerrarCarga();
    });
});

$(document).on('click','.ventanillas_Inactivas', function(){
    iniciarCarga();
    //$("#tabla_Ventanillas_Inactivas").DataTable().destroy();
    
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
                for(var i=0; i<data.ventanillas.length;i++){

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
                        '<td style="text-align: center; vertical-align: middle;">'+data.ventanillas[i]['horaApertura']+'</td>'+
                        '<td style="text-align: center; vertical-align: middle;">'+data.ventanillas[i]['horaCierre']+'</td>'+
                        '<td style="text-align: center; vertical-align: middle;"><a href="" style="transition-duration: 3s, 5s;" class ="btn btn-outline-success ventanillas_Activas" data-book-id='+"'{"+'"idAperturaVentanilla":'+data.ventanillas[i]['idAperturaVentanilla']+"}'"+'><i class="fa fa-eye" aria-hidden="true"></i></a></button></td>'+
                    '</tr>'
                    ;
                }
            }
            else{
                console.log('Aqui entro primero: ' + JSON.stringify(data.ventanillas));
                for(var i=0; i<data.ventanillas.length;i++){

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
                        '<td style="text-align: center; vertical-align: middle;">'+data.ventanillas[i]['horaApertura']+'</td>'+
                        '<td style="text-align: center; vertical-align: middle;">'+data.ventanillas[i]['horaCierre']+'</td>'+
                        '<td style="text-align: center; vertical-align: middle;"><a href="" style="transition-duration: 3s, 5s;" class ="btn btn-outline-success ventanillas_Activas" data-book-id='+"'{"+'"idAperturaVentanilla":'+data.ventanillas[i]['idAperturaVentanilla']+"}'"+'><i class="fa fa-eye" aria-hidden="true"></i></a></button></td>'+
                    '</tr>'
                    ;
                }
            }
        }

        $("#body_Ventanillas_Inactivas").html(html_Ventanillas);
        /*
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
        */
        cerrarCarga();
    });
});