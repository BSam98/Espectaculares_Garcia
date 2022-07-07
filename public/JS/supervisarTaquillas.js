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

var contador1 = 0;
var contador2 = 0;

var dato1 = null;
var dato2 = null;

var voucher_Faltante = [];

/**-------------------Pinta los status de las taquillas en la pantalla principal-------------------- */
$(document).ready(function(){
    iniciarCarga();
    $("#tabla_Ventanillas").DataTable().destroy();
    var idEvento = $("#idEvento").val();
    html_Ventanillas ='';
    var html_Opciones = '';
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
                    '<td style="text-align: center; vertical-align:middle;">---</td>'+
                    '<td style="text-align: center; vertical-align:middle;">---</td>'+
                    '<td style="text-align: center; vertical-align:middle;">'+data.ventanillas_Activas_2[i]['horaApertura']+'</td>'+
                    '<td style="text-align: center; vertical-align:middle;">'+
                        '<table>'+
                            '<tbody style="vertical-aligrn: middel;">'+
                                '<tr>'+
                                    '<td>'+
                                        '<ul class="circulo">'+
                                            '<li><a href="javascript:mostrar_Contenedor_Realizar_Cierre()" type="button" class="ventanilla_Activa_Sin_Transacciones" data-toggle="" data-book-id='+"'{"+'"idAperturaVentanilla":'+data.ventanillas_Activas_2[i]['idAperturaVentanilla']+"}'"+'>Realizar Cierre</a></li>'+
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
                                            '<li><a href="javascript:mostrar_Contenedor_Realizar_Cierre()" type="button" class="ventanilla_Activa_Con_Transacciones" data-toggle="" data-book-id='+"'{"+'"idAperturaVentanilla":'+data.ventanillas_Activas_1[i]['idAperturaVentanilla']+"}'"+'>Realizar Cierre</a></li>'+
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
                    '<li><a href="#modal_Validar_Cierre_Taquilla" type="button" class="ventanilla_Inactiva_Con_Transacciones" data-toggle="modal" data-book-id='+"'{"+'"idAperturaVentanilla":'+data.ventanillas_Inactivas_1[i]['idAperturaVentanilla']+"}'"+'>Validar Cierre</a></li>'+
                    '<li><a href="#modal_Validar_Faltante_Taquilla" type="button" class="Reportar_Turno_Inactivo" data-toggle="modal" data-book-id='+"'{"+'"idAperturaVentanilla":'+data.ventanillas_Inactivas_1[i]['idAperturaVentanilla']+"}'"+'>Reportar Faltante</a></li>';
                }
                else{
                    if(data.ventanillas_Inactivas_1[i]['idStatus'] ==11){
                        html_Color ="background-color: green;";
                        html_Opciones=
                        '<li><a href="javascript:mostrar_Contenedor_Realizar_Cierre()" class="mostrar_Turno_Finalizado" type="button" data-book-id='+"'{"+'"idAperturaVentanilla":'+data.ventanillas_Inactivas_1[i]['idAperturaVentanilla']+"}'"+'>Mostrar Cierre</a></li>';
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
                    '<li><a href="#modal_Validar_Cierre_Taquilla"type="button" class="ventanilla_Inactiva_Sin_Transacciones" data-book-id='+"'{"+'"idAperturaVentanilla":'+data.ventanillas_Inactivas_2[i]['idAperturaVentanilla']+"}'"+'>Validar Cierre</a></li>'+
                    '<li><a href="#modal_Validar_Faltante_Taquilla" type="button" class="Reportar_Turno_Inactivo" data-toggle="modal" data-book-id='+"'{"+'"idAperturaVentanilla":'+data.ventanillas_Inactivas_2[i]['idAperturaVentanilla']+"}'"+'>Reportar Faltante</a></li>';

                }
                else{
                    if(data.ventanillas_Inactivas_2[i]['idStatus'] ==11){
                        html_Color ="background-color: green;";
                        html_Opciones=
                        '<li><a href="javascript:mostrar_Contenedor_Realizar_Cierre()" type="button" data-book-id='+"'{"+'"idAperturaVentanilla":'+data.ventanillas_Inactivas_2[i]['idAperturaVentanilla']+"}'"+'>Mostrar Cierre</a></li>';
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
                    '<td style="text-align: center; vertical-align:middle;">---</td>'+
                    '<td style="text-align: center; vertical-align:middle;">---</td>'+
                    '<td style="text-align: center; vertical-align:middle;">'+data.ventanillas_Activas_2[i]['horaApertura']+'</td>'+
                    '<td style="text-align: center; vertical-align:middle;">'+
                        '<table>'+
                            '<tbody style="vertical-aligrn: middel;">'+
                                '<tr>'+
                                    '<td>'+
                                        '<ul class="circulo">'+
                                            '<li><a type="button" class="ventanilla_Activa_Sin_Transacciones" data-toggle="" data-book-id='+"'{"+'"idAperturaVentanilla":'+data.ventanillas_Activas_2[i]['idAperturaVentanilla']+"}'"+'>Realizar Cierre</a></li>'+
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
                                            '<li><a href="javascript:mostrar_Contenedor_Realizar_Cierre()" type="button" class="ventanilla_Activa_Con_Transacciones" data-toggle="" data-book-id='+"'{"+'"idAperturaVentanilla":'+data.ventanillas_Activas_1[i]['idAperturaVentanilla']+"}'"+'>Realizar Cierre</a></li>'+
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
                    '<li><a href="#modal_Validar_Cierre_Taquilla" type="button" class="ventanilla_Inactiva_Con_Transacciones" data-toggle="modal" data-book-id='+"'{"+'"idAperturaVentanilla":'+data.ventanillas_Inactivas_1[i]['idAperturaVentanilla']+"}'"+'>Validar Cierre</a></li>'+
                    '<li><a href="#modal_Validar_Faltante_Taquilla" type="button" class="Reportar_Turno_Inactivo" data-toggle="modal" data-book-id='+"'{"+'"idAperturaVentanilla":'+data.ventanillas_Inactivas_1[i]['idAperturaVentanilla']+"}'"+'>Reportar Faltante</a></li>';
                }
                else{
                    if(data.ventanillas_Inactivas_1[i]['idStatus'] ==11){
                        html_Color ="background-color: green;";
                        html_Opciones=
                        '<li><a href="javascript:mostrar_Contenedor_Realizar_Cierre()" type="button" class="ventanilla_Inactiva_Con_Transacciones" data-book-id='+"'{"+'"idAperturaVentanilla":'+data.ventanillas_Inactivas_1[i]['idAperturaVentanilla']+"}'"+'>Mostrar Cierre</a></li>';
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
                    '<li><a href="#modal_Validar_Cierre_Taquilla"type="button" class="ventanilla_Inactiva_Sin_Transacciones" data-book-id='+"'{"+'"idAperturaVentanilla":'+data.ventanillas_Inactivas_2[i]['idAperturaVentanilla']+"}'"+'>Validar Cierre</a></li>'+
                    '<li><a href="#modal_Validar_Faltante_Taquilla" type="button" class="Reportar_Turno_Inactivo" data-toggle="modal" data-book-id='+"'{"+'"idAperturaVentanilla":'+data.ventanillas_Inactivas_2[i]['idAperturaVentanilla']+"}'"+'>Reportar Faltante</a></li>';
                }
                else{
                    if(data.ventanillas_Inactivas_2[i]['idStatus'] ==11){
                        html_Color ="background-color: green;";
                        html_Opciones=
                        '<li><a href="javascript:mostrar_Contenedor_Realizar_Cierre()" type="button" class="ventanilla_Inactiva_Sin_Transacciones" data-book-id='+"'{"+'"idAperturaVentanilla":'+data.ventanillas_Inactivas_2[i]['idAperturaVentanilla']+"}'"+'>Mostrar Cierre</a></li>';
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

/**-----------------Opciones para finalizar los turnos activos----------------------- */
$(document).on('click','.ventanilla_Activa_Sin_Transacciones', function(){
    iniciarCarga();

    var idAperturaVentanilla =$(this).data('book-id');
    var total_Efectivo = 0, total_Tarjeta = 0;
    var html = '', html_Pie='';

    $.ajax({
        type:'POST',
        url:'Supervisar_Taquillas/Transacciones',
        data:{'idAperturaVentanilla':idAperturaVentanilla['idAperturaVentanilla']},
        dataType:'JSON',
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            cerrarCarga();
        },
    }).done(function(data){
        if(data.respuesta){
            for(var i=0; i<data.fajillas.vacias.length;i++){
                html +=
                '<tr>'+
                    '<td style="text-align: center; vertical-align: middle;">Fajilla Sin Folios</td>'+
                    '<td style="text-align: center; vertical-align: middle;">---</td>'+
                    '<td style="text-align: center; vertical-align: middle;">---</td>'+
                    '<td style="text-align: center; vertical-align: middle;">'+data.fajillas.vacias[i]['fecha']+'</td>'+
                    '<td style="text-align: center; vertical-align: middle;"><a  class="btn btn-outline-success descripcion_Fajilla" data-book-id='+"'{"+'"idFajilla":'+data.fajillas.vacias[i]['idFajilla']+"}'"+' ><i class="fa fa-eye" aria-hidden="true"></i></a></td>'+
                '</tr>';
            }

            for(var i=0; i<data.fajillas.enteras.length;i++){
                html +=
                '<tr>'+
                    '<td style="text-align: center; vertical-align: middle;">Fajilla Agregada</td>'+
                    '<td style="text-align: center; vertical-align: middle;">---</td>'+
                    '<td style="text-align: center; vertical-align: middle;">---</td>'+
                    '<td style="text-align: center; vertical-align: middle;">'+data.fajillas.enteras[i]['fecha']+'</td>'+
                    '<td style="text-align: center; vertical-align: middle;"><a  class="btn btn-outline-success descripcion_Fajilla" data-book-id='+"'{"+'"idFajilla":'+data.fajillas.enteras[i]['idFajilla']+','+'"Defectuosas":'+data.fajillas.enteras[i]['Defectuosas']+','+'"Sobrantes":'+data.fajillas.enteras[i]['Sobrantes']+','+'"Vendidas":'+data.fajillas.enteras[i]['Vendidas'] +"}'"+' ><i class="fa fa-eye" aria-hidden="true"></i></a></td>'+
                '</tr>';
            }

            if(data.voucher.length){
                if(data.voucher[0]['Tarjeta'] === null ){
                    html +=
                    '<tr>'+
                        '<td style="text-align: center; vertical-align: middle;">Vouchers</td>'+
                        '<td style="text-align: center; vertical-align: middle;">---</td>'+
                        '<td style="text-align: center; vertical-align: middle;">---</td>'+
                        '<td style="text-align: center; vertical-align: middle;">---</td>'+
                        '<td style="text-align: center; vertical-align: middle;"><a  class="btn btn-outline-success mostrar_Vouchers" data-book-id='+"'{"+'"idAperturaVentanilla":'+idAperturaVentanilla['idAperturaVentanilla']+"}'"+' ><i class="fa fa-eye" aria-hidden="true"></i></a></td>'+
                    '</tr>';
                }
                else{
                    html +=
                    '<tr>'+
                        '<td style="text-align: center; vertical-align: middle;">Vouchers</td>'+
                        '<td style="text-align: center; vertical-align: middle;">---</td>'+
                        '<td style="text-align: center; vertical-align: middle;">'+data.voucher[0]['Tarjeta']+'</td>'+
                        '<td style="text-align: center; vertical-align: middle;">---</td>'+
                        '<td style="text-align: center; vertical-align: middle;"><a  class="btn btn-outline-success mostrar_Vouchers" data-book-id='+"'{"+'"idAperturaVentanilla":'+idAperturaVentanilla['idAperturaVentanilla']+"}'"+' ><i class="fa fa-eye" aria-hidden="true"></i></a></td>'+
                    '</tr>';
                }
            }

            for(var i=0;i<data.transacciones.length;i++){
                html +=
                '<tr>'+
                    '<td style="text-align: center; vertical-align: middle;">Transacción</td>'+
                    '<td style="text-align: center; vertical-align: middle;">'+data.transacciones[i]['Efectivo']+'</td>'+
                    '<td style="text-align: center; vertical-align: middle;">'+data.transacciones[i]['Tarjeta']+'</td>'+
                    '<td style="text-align: center; vertical-align: middle;">'+data.transacciones[i]['Fecha']+'</td>'+
                    '<td style="text-align: center; vertical-align: middle;"><a  class="btn btn-outline-success descripcion_Transaccion" data-book-id='+"'{"+'"idTransaccion":'+data.transacciones[i]['idTransaccion']+"}'"+' ><i class="fa fa-eye" aria-hidden="true"></i></a></td>'+
                '</tr>';
                total_Efectivo = total_Efectivo + Number(data.transacciones[i]['Efectivo']);
                total_Tarjeta = total_Tarjeta + Number(data.transacciones[i]['Tarjeta']);
            }
        }
        $("#detalles").html('');
        $("#pie_Informacion").html('<tr><td>Efectivo : '+total_Efectivo+'   Tarjeta: '+total_Tarjeta+' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><a href="#modal_Validar_Cierre_Taquilla" type="button" class="btn btn-success  informacion_Turno_Activo" data-toggle="modal" data-book-id='+"'{"+'"idAperturaVentanilla":'+idAperturaVentanilla['idAperturaVentanilla']+"}'"+'>Validar Turno</a> <a href="#modal_Validar_Faltante_Taquilla" type="button" class="btn btn-warning  reportar_Turno_Activo" data-toggle="modal" data-book-id='+"'{"+'"idAperturaVentanilla":'+idAperturaVentanilla['idAperturaVentanilla']+"}'"+'>Reportar Faltante</a> </td></tr>');
        $("#informacion").html(html);

        cerrarCarga();
    });
});

//
$(document).on('click', '.ventanilla_Activa_Con_Transacciones', function(){

    iniciarCarga();

    var idAperturaVentanilla =$(this).data('book-id');
    var total_Efectivo = 0, total_Tarjeta = 0;
    var html = '', html_Pie='';

    $.ajax({
        type:'POST',
        url:'Supervisar_Taquillas/Transacciones',
        data:{'idAperturaVentanilla':idAperturaVentanilla['idAperturaVentanilla']},
        dataType:'JSON',
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            cerrarCarga();
        },
    }).done(function(data){
        if(data.respuesta){
            for(var i=0; i<data.fajillas.vacias.length;i++){
                html +=
                '<tr>'+
                    '<td style="text-align: center; vertical-align: middle;">Fajilla Agregada</td>'+
                    '<td style="text-align: center; vertical-align: middle;">---</td>'+
                    '<td style="text-align: center; vertical-align: middle;">---</td>'+
                    '<td style="text-align: center; vertical-align: middle;">'+data.fajillas.vacias[i]['fecha']+'</td>'+
                    '<td style="text-align: center; vertical-align: middle;"><a  class="btn btn-outline-success descripcion_Fajilla" data-book-id='+"'{"+'"idFajilla":'+data.fajillas.vacias[i]['idFajilla']+"}'"+' ><i class="fa fa-eye" aria-hidden="true"></i></a></td>'+
                '</tr>';
            }

            for(var i=0; i<data.fajillas.enteras.length;i++){
                html +=
                '<tr>'+
                    '<td style="text-align: center; vertical-align: middle;">Fajilla Agregada</td>'+
                    '<td style="text-align: center; vertical-align: middle;">---</td>'+
                    '<td style="text-align: center; vertical-align: middle;">---</td>'+
                    '<td style="text-align: center; vertical-align: middle;">'+data.fajillas.enteras[i]['fecha']+'</td>'+
                    '<td style="text-align: center; vertical-align: middle;"><a  class="btn btn-outline-success descripcion_Fajilla" data-book-id='+"'{"+'"idFajilla":'+data.fajillas.enteras[i]['idFajilla']+','+'"Defectuosas":'+data.fajillas.enteras[i]['Defectuosas']+','+'"Sobrantes":'+data.fajillas.enteras[i]['Sobrantes']+','+'"Vendidas":'+data.fajillas.enteras[i]['Vendidas'] +"}'"+' ><i class="fa fa-eye" aria-hidden="true"></i></a></td>'+
                '</tr>';
            }

            if(data.voucher.length){
                if(data.voucher[0]['Tarjeta'] === null ){
                    html +=
                    '<tr>'+
                        '<td style="text-align: center; vertical-align: middle;">Vouchers</td>'+
                        '<td style="text-align: center; vertical-align: middle;">---</td>'+
                        '<td style="text-align: center; vertical-align: middle;">---</td>'+
                        '<td style="text-align: center; vertical-align: middle;">---</td>'+
                        '<td style="text-align: center; vertical-align: middle;"><a  class="btn btn-outline-success mostrar_Vouchers" data-book-id='+"'{"+'"idAperturaVentanilla":'+idAperturaVentanilla['idAperturaVentanilla']+"}'"+' ><i class="fa fa-eye" aria-hidden="true"></i></a></td>'+
                    '</tr>';
                }
                else{
                    html +=
                    '<tr>'+
                        '<td style="text-align: center; vertical-align: middle;">Vouchers</td>'+
                        '<td style="text-align: center; vertical-align: middle;">---</td>'+
                        '<td style="text-align: center; vertical-align: middle;">'+data.voucher[0]['Tarjeta']+'</td>'+
                        '<td style="text-align: center; vertical-align: middle;">---</td>'+
                        '<td style="text-align: center; vertical-align: middle;"><a  class="btn btn-outline-success mostrar_Vouchers" data-book-id='+"'{"+'"idAperturaVentanilla":'+idAperturaVentanilla['idAperturaVentanilla']+"}'"+' ><i class="fa fa-eye" aria-hidden="true"></i></a></td>'+
                    '</tr>';
                }
            }

            for(var i=0;i<data.transacciones.length;i++){
                html +=
                '<tr>'+
                    '<td style="text-align: center; vertical-align: middle;">Transacción</td>'+
                    '<td style="text-align: center; vertical-align: middle;">'+data.transacciones[i]['Efectivo']+'</td>'+
                    '<td style="text-align: center; vertical-align: middle;">'+data.transacciones[i]['Tarjeta']+'</td>'+
                    '<td style="text-align: center; vertical-align: middle;">'+data.transacciones[i]['Fecha']+'</td>'+
                    '<td style="text-align: center; vertical-align: middle;"><a  class="btn btn-outline-success descripcion_Transaccion" data-book-id='+"'{"+'"idTransaccion":'+data.transacciones[i]['idTransaccion']+"}'"+' ><i class="fa fa-eye" aria-hidden="true"></i></a></td>'+
                '</tr>';
                total_Efectivo = total_Efectivo + Number(data.transacciones[i]['Efectivo']);
                total_Tarjeta = total_Tarjeta + Number(data.transacciones[i]['Tarjeta']);
            }
        }
        $("#detalles").html('');
        $("#pie_Informacion").html('<tr><td>Efectivo : '+total_Efectivo+'   Tarjeta: '+total_Tarjeta+' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><a href="#modal_Validar_Cierre_Taquilla" type="button" class="btn btn-success  informacion_Turno_Activo" data-toggle="modal" data-book-id='+"'{"+'"idAperturaVentanilla":'+idAperturaVentanilla['idAperturaVentanilla']+"}'"+'>Validar Turno</a> <a href="#modal_Validar_Faltante_Taquilla" type="button" class="btn btn-warning  reportar_Turno_Activo" data-toggle="modal" data-book-id='+"'{"+'"idAperturaVentanilla":'+idAperturaVentanilla['idAperturaVentanilla']+"}'"+'>Reportar Faltante</a> </td></tr>');
        $("#informacion").html(html);

        cerrarCarga();
    });
});

$(document).on('click','.descripcion_Transaccion', function(){
    iniciarCarga();
    var idTransaccion = $(this).data('book-id');
    var html = '';

    $.ajax({
        type:'POST',
        url:'Supervisar_Taquillas/Descripcion_Transaccion',
        data:{'idTransaccion':idTransaccion['idTransaccion']},
        dataType: 'JSON',
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            cerrarCarga();
        },
    }).done(function(data){
        if(data.respuesta){
            for(var i=0;i<data.pagos.length;i++){
                html +=
                '<tr>'+
                    '<td>'+
                        '<label>Concepto: </label>'+
                        '<br>'+
                        '<label>'+data.pagos[i]['Nombre']+'</label>'+
                        '<br>'+
                        '<label>Monto: '+data.pagos[i]['Monto']+' </label>'+
                        '<br>'+
                    '</td>'+
                '</tr>';
            }
            for(var i=0;i<data.voucher.length;i++){
                html +=
                '<tr>'+
                    '<td>'+
                        '<label>'+data.voucher[i]['Nombre']+': </label>'+
                        '<br>'+
                        '<label> xxxx-xxxx-xxxx-'+data.voucher[i]['numTarjeta']+'</label>'+
                        '<br>'+
                        '<label>Numero de Aprobación: '+data.voucher[i]['numAprovacion']+'</label>'+ 
                        '<br>'+
                        '<label>Monto: '+data.voucher[i]['Monto']+'</label>'+
                        '<br>'+
                        '<label>Banco: '+data.voucher[i]['Banco']+'</label>'+
                        '<br>'+
                    '</td>'+
                '</tr>';
            }
        }
        $("#detalles").html(html);
        cerrarCarga();
    });
});

$(document).on('click','.mostrar_Vouchers', function(){
    iniciarCarga();
    var idAperturaVentanilla = $(this).data('book-id');
    var html = '';

    $.ajax({
        type:'POST',
        url:'Supervisar_Taquillas/Vouchers',
        data: {'idAperturaVentanilla':idAperturaVentanilla['idAperturaVentanilla']},
        dataType:'JSON',
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            cerrarCarga();
        },
    }).done(function(data){
        if(data.respuesta){
            for(var i = 0; i<data.voucher.length;i++){
                html +=
                '<tr>'+
                    '<td>'+
                        '<label>'+data.voucher[i]['Nombre']+': </label>'+
                        '<br>'+
                        '<label> xxxx-xxxx-xxxx-'+data.voucher[i]['numTarjeta']+'</label>'+
                        '<br>'+
                        '<label>Numero de Aprobación: '+data.voucher[i]['numAprovacion']+'</label>'+ 
                        '<br>'+
                        '<label>Monto: '+data.voucher[i]['Monto']+'</label>'+
                        '<br>'+
                        '<label>Banco: '+data.voucher[i]['Banco']+'</label>'+
                        '<br>'+
                    '</td>'+
                '</tr>';
            }
        }
        $("#detalles").html(html);
        cerrarCarga();
    });
});

$(document).on('click','.descripcion_Fajilla', function(){
    iniciarCarga();
    var datos = $(this).data('book-id');
    var html = '';

    $.ajax({
        type:'POST',
        url:'Supervisar_Taquillas/Desglose_Fajilla',
        data:{'idFajilla':datos['idFajilla']},
        dataType:'JSON',
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            cerrarCarga();
        },
    }).done(function(data){
        if(data.respuesta){
            if(data.fajilla.length){

                ultimo_Indice = data.fajilla.length - 1;
                
                html +=
                '<tr>'+
                    '<td>'+
                        '<label>Folio Inicial: '+data.fajilla[0]['Folio']+'</label>'+
                        '<br>'+
                        '<label>Folio Final: '+data.fajilla[ultimo_Indice]['Folio']+'</label>'+
                        '<br>'+
                        '<label>Tarjetas Vendidas: '+datos['Vendidas']+'</label>'+
                        '<br>'+
                        '<label>Tarjetas Sobrantes: '+datos['Sobrantes']+'</label>'+
                        '<br>'+
                        '<label>Tarjetas Defectuosas: '+datos['Defectuosas']+'</label>'+
                    '</td>'+
                '</tr>';

                for(var i =0; i<data.fajilla.length;i++){
                    html +=
                    '<tr>'+
                        '<td>'+
                            '<label>Tarjeta: '+data.fajilla[i]['Folio']+'</label>'+
                            '<br>'+
                            '<label>Status: '+data.fajilla[i]['Descripcion']+'</label>'+
                            '<br>'+
                        '</td>'+
                    '</tr>';
                }
            }
        }
        $("#detalles").html(html);
        cerrarCarga()
    });
});

$(document).on('click','.informacion_Turno_Activo', function(){
    iniciarCarga();

    contador1 = 0;
    contador2 = 0;
    
    var idAperturaVentanilla = $(this).data('book-id');

    var html_Efectivo = '', html_Voucher = '', html_Fajilla = '';

    $.ajax({
        type:'POST',
        url:'Supervisar_Taquillas/Informacion_Turno',
        data: idAperturaVentanilla,
        dataType: 'JSON',
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            cerrarCarga();
        },
    }).done(function(data){
        if(data.respuesta){
            $("#idAperturaVentanilla").val(idAperturaVentanilla['idAperturaVentanilla']);
            if(data.taquillero.efectivo.length){
                html_Efectivo =
                '<tr>'+
                    '<td>'+
                        '<label>'+
                            '<input class="seleccionar" name="efectivo" id="efectivo" type="checkbox" > Total de Efectivo: '+data.taquillero.efectivo[0]['Efectivo']+''+
                        '</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+
                        '<label>'+
                            '<input class="seleccionar" name="fondo" id="fondo" type="checkbox"> Fondo de Caja: '+data.taquillero.efectivo[0]['fondoCaja']+''+
                        '</label>'+
                        '<hr>'+
                    '</td>'+
                '</tr>'+
                '<br>';
                contador1 = 2;
            }else{
                html_Efectivo =
                '<tr>'+
                    '<td>'+
                        '<label>'+
                            '<input class="seleccionar" name="efectivo" id="efectivo" type="checkbox" > Total de Efectivo: 0'+
                        '</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+
                        '<label>'+
                            '<input class="seleccionar" name="fondo" id="fondo" type="checkbox"> Fondo de Caja: '+data.taquillero.fondoCaja[0]['fondoCaja']+''+
                        '</label>'+
                        '<hr>'+
                    '</td>'+
                '</tr>'+
                '<br>';
                contador1 = 2;
            }

            if(data.taquillero.voucher.length){
                for(var i=0; i<data.taquillero.voucher.length;i++){
                    html_Voucher +=
                    '<tr>'+
                        '<td>'+
                            '<label>'+
                                '<input class="seleccionar" name="voucher'+i+'" id="voucher'+i+'" type="checkbox" value="'+data.taquillero.voucher[i]['idTransaccionV']+'"> Numero de Aprobación:  '+data.taquillero.voucher[i]['numAprovacion']+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Monto: '+data.taquillero.voucher[i]['Monto']+''+
                            '</label>'+
                            '<hr>'+
                        '</td>'+
                    '</tr>'+
                    '<br>';
                    contador1 = contador1 + 1;
                }
            }
            else{
                html_Voucher =
                '<tr>'+
                    '<td>'+
                        '<label>No se encontraron transacciones realizadas con tarjeta</label>'+
                        '<hr>'+
                    '</td>'+
                '</tr>'+
                '<br>';
            }

            if(data.taquillero.fajilla.length){
                html_Fajilla =
                '<tr>'+
                    '<td>'+
                        '<label>'+
                            '<input class="seleccionar" name="fajilla" id="fajilla" type="checkbox" value="'+data.taquillero.fajilla[0]['idFajilla']+'"> Fajilla Sobrante,&nbsp;&nbsp;&nbsp; Folio Inicial :  '+data.taquillero.fajilla[0]['FolioInicial']+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Folio Final: '+data.taquillero.fajilla[0]['FolioFinal']+' &nbsp;&nbsp;&nbsp;&nbsp; Tarjetas Sobrantes: '+data.taquillero.fajilla[0]['Restantes']+'   '+
                        '</label>'+
                        '<hr>'+
                    '</td>'+
                '</tr>'+
                '<br>';
                contador1 = contador1 + 1;
            }
            else{
                html_Fajilla =
                '<tr>'+
                    '<td style="text-align: center; vertical-align: middle;">'+
                        '<label>No se encontraron fajillas sobrantes.</label>'+
                        '<hr>'+
                    '</td>'+
                '</tr>'+
                '<br>';
            }
        }

        $("#cuerpoEfectivo").html(html_Efectivo);
        $("#cuerpoVoucher").html(html_Voucher);
        $("#cuerpoFajilla").html(html_Fajilla);
        $("#botones").html('<button  name="z" type="button" class="btn btn-success validar_Turno_Activo">Guardar</button>   <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>');
        cerrarCarga();
    });

});

$(document).on('click','.validar_Turno_Activo', function(){
    
    iniciarCarga();
    var d  = new Date();
    var fecha = d.toISOString().split('T')[0] +" "+d.toLocaleTimeString()+".000";

    if(contador1 == contador2 && contador1 !=0 && contador2 !=0){

        var idAperturaVentanilla = $("#idAperturaVentanilla").val();
        var idUsuario = $("#idUsuario").val();
                
        $.ajax({
            type:'POST',
            url: 'Supervisar_Taquillas/Cerrar_Turno_Taquilla',
            data:{'idAperturaVentanilla':idAperturaVentanilla,'idUsuario':idUsuario,'fecha':fecha},
            dataType:'JSON',
            error: function (jqXHR, textStatus, errorThrown) {
                alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
                cerrarCarga();
            },
        }).done(function(data){
            if(data.respuesta){
                cerrarCarga();
                location.reload();
            }
        });
        
    }
    else{
        alert('Favor de marcar los recuadros pendientes o reportar faltante');
        cerrarCarga();
    }
});

$(document).on('click', '.reportar_Turno_Activo', function(){
    iniciarCarga();
    voucher_Faltante = [];

    contador1 = 0;
    contador2 = 0;
    
    var idAperturaVentanilla = $(this).data('book-id');

    var html_Efectivo = '', html_Voucher = '', html_Fajilla = '';

    $.ajax({
        type:'POST',
        url:'Supervisar_Taquillas/Informacion_Turno',
        data: idAperturaVentanilla,
        dataType: 'JSON',
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            cerrarCarga();
        },
    }).done(function(data){
        if(data.respuesta){
            $("#idAperturaVentanillaFaltante").val(idAperturaVentanilla['idAperturaVentanilla']);
            if(data.taquillero.efectivo.length){
                html_Efectivo =
                '<tr>'+
                    '<td>'+
                        '<label>'+
                            '<input class="seleccionarFaltante" name="efectivoFaltante" id="efectivoFaltante" type="checkbox" > Total de Efectivo: '+data.taquillero.efectivo[0]['Efectivo']+''+
                        '</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+
                        '<label>'+
                            '<input class="seleccionarFaltante" name="fondoFaltante" id="fondoFaltante" type="checkbox"> Fondo de Caja: '+data.taquillero.efectivo[0]['fondoCaja']+''+
                        '</label>'+
                        '<hr>'+
                    '</td>'+
                '</tr>'+
                '<br>';
                contador1 = 2;
            }else{
                html_Efectivo =
                '<tr>'+
                    '<td>'+
                        '<label>'+
                            '<input class="seleccionarFaltante" name="efectivoFaltante" id="efectivoFaltante" type="checkbox" > Total de Efectivo: 0'+
                        '</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+
                        '<label>'+
                            '<input class="seleccionarFaltante" name="fondoFaltante" id="fondoFaltante" type="checkbox"> Fondo de Caja: '+data.taquillero.fondoCaja[0]['fondoCaja']+''+
                        '</label>'+
                        '<hr>'+
                    '</td>'+
                '</tr>'+
                '<br>';
                contador1 = 2;
            }

            if(data.taquillero.voucher.length){
                for(var i=0; i<data.taquillero.voucher.length;i++){
                    html_Voucher +=
                    '<tr>'+
                        '<td>'+
                            '<label>'+
                                '<input class="seleccionarFaltante" name="voucherFaltante'+i+'" id="voucherFaltante'+i+'" type="checkbox" value="'+data.taquillero.voucher[i]['idTransaccionV']+'"> Numero de Aprobación:  '+data.taquillero.voucher[i]['numAprovacion']+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Monto: '+data.taquillero.voucher[i]['Monto']+''+
                            '</label>'+
                            '<hr>'+
                        '</td>'+
                    '</tr>'+
                    '<br>';
                    contador1 = contador1 + 1;
                }
            }
            else{
                html_Voucher =
                '<tr>'+
                    '<td>'+
                        '<label>No se encontraron transacciones realizadas con tarjeta</label>'+
                        '<hr>'+
                    '</td>'+
                '</tr>'+
                '<br>';
            }

            if(data.taquillero.fajilla.length){
                html_Fajilla =
                '<tr>'+
                    '<td>'+
                        '<label>'+
                            '<input class="seleccionarFaltante" name="fajillaFaltante" id="fajillaFaltante" type="checkbox" value="'+data.taquillero.fajilla[0]['idFajilla']+'"> Fajilla Sobrante,&nbsp;&nbsp;&nbsp; Folio Inicial :  '+data.taquillero.fajilla[0]['FolioInicial']+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Folio Final: '+data.taquillero.fajilla[0]['FolioFinal']+' &nbsp;&nbsp;&nbsp;&nbsp; Tarjetas Sobrantes: '+data.taquillero.fajilla[0]['Restantes']+'   '+
                        '</label>'+
                        '<hr>'+
                    '</td>'+
                '</tr>'+
                '<br>';
                contador1 = contador1 + 1;
            }
            else{
                html_Fajilla =
                '<tr>'+
                    '<td style="text-align: center; vertical-align: middle;">'+
                        '<label>No se encontraron fajillas sobrantes.</label>'+
                        '<hr>'+
                    '</td>'+
                '</tr>'+
                '<br>';
            }
        }

        $("#cuerpoEfectivoFaltante").html(html_Efectivo);
        $("#cuerpoVoucherFaltante").html(html_Voucher);
        $("#cuerpoFajillaFaltante").html(html_Fajilla);
        $("#botonesFaltante").html('<button  name="z" type="button" class="btn btn-success validar_Faltante_Turno">Guardar</button>   <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>');
        cerrarCarga();
    });
});

$(document).on('click','.seleccionarFaltante', function(){
    var div = $(this).parents('div').attr('id');

    switch(div){
        case 'cuerpoEfectivoFaltante':

            if($(this).is(':checked')){
                var id = $(this).attr('id');
                
                switch(id){
                    case 'efectivoFaltante':
                        dato1 = $("#montoEfecitvo").clone();
                        if(!dato1.length){
                            $('<tr id="montoEfectivo"><td><label>Monto Efectivo:</label> <input type="number" id="inputEfectivoFaltante"></td></tr>').clone().appendTo('#'+div);
                            dato1 = $('#montoEfectivo').clone();
                        }
                    break;
                    case 'fondoFaltante':
                        dato2 =$("#montoFondo").clone();
                        if(!dato2.length){
                            $('<tr id="montoFondo"><td><label>Monto Fondo de Caja:</label>  <input type="number" id="inputFondoFaltante"></td></tr>').clone().appendTo('#'+div);
                            dato2 =$('#montoFondo').clone();
                        }
                    break;
                }
            }
            else{
                
                id = $(this).attr('id');
                switch(id){
                    case 'efectivoFaltante':
                        if(dato1.length){
                            dato1 = null;
                            $('#montoEfectivo').remove();
                        }
                    break;

                    case 'fondoFaltante':
                        if(dato2.length){
                            dato2 = null;
                            $('#montoFondo').remove();
                        }
                    break;
                }
            }
        break;

        case 'cuerpoVoucherFaltante':

            if($(this).is(':checked')){
                alert($(this).val());
                voucher_Faltante.push({'idTransaccionV':$(this).val()});
                console.log('Arreglo de faltante: ' + JSON.stringify(voucher_Faltante));
            }
            else{
                var indice = voucher_Faltante.findIndex((objecto)=>objecto.idTransaccionV == $(this).val());
                
                voucher_Faltante.splice(indice,1);
                
                console.log('Arreglo resultante: ' + JSON.stringify(voucher_Faltante));
            }
        break;

        case 'cuerpoFajillaFaltante':
            alert('fff');
        break;
    }
});


$(document).on('click', '.validar_Faltante_Turno', function(){
    iniciarCarga();

    var d = new Date();
    
    var idAperturaVentanilla = $("#idAperturaVentanillaFaltante").val();
    var idUsuario = $("#idUsuarioSupervisor").val();

    var fecha = d.toISOString().split('T')[0] +" "+d.toLocaleTimeString()+".000";

    var faltanteEfectivo = $("#inputEfectivoFaltante").val();
    var faltanteFondo = $("#inputFondoFaltante").val();

    if(faltanteEfectivo == null){
        faltanteEfectivo = 0;
    }
    if(faltanteFondo == null){
        faltanteFondo = 0;
    }
    if(!voucher_Faltante.length){
        voucher_Faltante = 0;
    }

    if(faltanteEfectivo == 0 && faltanteFondo == 0 && voucher_Faltante == 0){
        voucher_Faltante = [];
        alert('Favor de seleccionar alguna casilla para finalizar el registro del faltante');
        cerrarCarga();
    }
    else{
        
        $.ajax({
            type:'POST',
            url: 'Supervisar_Taquillas/Validar_Faltante',
            data:{'fecha':fecha,'idUsuario':idUsuario,'idAperturaVentanilla':idAperturaVentanilla,'faltanteEfectivo':faltanteEfectivo,'faltanteFondo':faltanteFondo,'faltanteVoucher':voucher_Faltante},
            dataType: 'JSON',
            error: function (jqXHR, textStatus, errorThrown) {
                alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
                cerrarCarga();
            },
        }).done(function(data){
            if(data.respuesta){
                alert('Se ha registrado los faltantes del turno');
                location.reload();
            }
            cerrarCarga();
        });
    }
});
/**----------------------------Validar Turnos Finalizados------------------------------ */

$(document).on('click','.ventanilla_Inactiva_Con_Transacciones', function(){
    iniciarCarga();
    contador1 = 0;
    contador2 = 0;
    var idAperturaVentanilla = $(this).data('book-id');
    var html_Efectivo = '', html_Voucher = '', html_Fajilla = '';
    $.ajax({
        type:'POST',
        url:'Supervisar_Taquillas/Validacion_Taquilla',
        data:{'idAperturaVentanilla':idAperturaVentanilla['idAperturaVentanilla']},
        dataType: 'JSON',
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            cerrarCarga();
        },
    }).done(function(data){
        if(data.respuesta){
            $("#idAperturaVentanilla").val(idAperturaVentanilla['idAperturaVentanilla']);
            if(data.taquillero.efectivo.length){
                html_Efectivo =
                '<tr>'+
                    '<td>'+
                        '<label>'+
                            '<input class="seleccionar" name="efectivo" id="efectivo" type="checkbox" value="'+data.taquillero.efectivo[0]['idCierreVentanilla']+'"> Total de Efectivo: '+data.taquillero.efectivo[0]['Efectivo']+''+
                        '</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+
                        '<label>'+
                            '<input class="seleccionar" name="fondo" id="fondo" type="checkbox" value="'+data.taquillero.efectivo[0]['idCierreVentanilla']+'"> Fondo de Caja: '+data.taquillero.efectivo[0]['fondoCaja']+''+
                        '</label>'+
                        '<hr>'+
                    '</td>'+
                '</tr>'+
                '<br>';
                contador1 = 2;
            }

            if(data.taquillero.vouchers.length){
                for(var i=0; i<data.taquillero.vouchers.length;i++){
                    html_Voucher +=
                    '<tr>'+
                        '<td>'+
                            '<label>'+
                                '<input class="seleccionar" name="voucher'+i+'" id="voucher'+i+'" type="checkbox" value="'+data.taquillero.vouchers[i]['idTransaccionV']+'"> Numero de Aprobación:  '+data.taquillero.vouchers[i]['numAprovacion']+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Monto: '+data.taquillero.vouchers[i]['Monto']+''+
                            '</label>'+
                            '<hr>'+
                        '</td>'+
                    '</tr>'+
                    '<br>';
                    contador1 = contador1 + 1;
                }
            }
            else{
                html_Voucher =
                '<tr>'+
                    '<td>'+
                        '<label>No se encontraron transacciones realizadas con tarjeta</label>'+
                        '<hr>'+
                    '</td>'+
                '</tr>'+
                '<br>';
            }

            if(data.taquillero.fajilla.length){
                html_Fajilla =
                '<tr>'+
                    '<td>'+
                        '<label>'+
                            '<input class="seleccionar" name="fajilla" id="fajilla" type="checkbox" value="'+data.taquillero.fajilla[0]['idFajilla']+'"> Fajilla Sobrante,&nbsp;&nbsp;&nbsp; Folio Inicial :  '+data.taquillero.fajilla[0]['FolioInicial']+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Folio Final: '+data.taquillero.fajilla[0]['FolioFinal']+' &nbsp;&nbsp;&nbsp;&nbsp; Tarjetas Sobrantes: '+data.taquillero.fajilla[0]['cantidadTarjetas']+'   '+
                        '</label>'+
                        '<hr>'+
                    '</td>'+
                '</tr>'+
                '<br>';
                contador1 = contador1 + 1;
            }
            else{
                html_Fajilla =
                '<tr>'+
                    '<td style="text-align: center; vertical-align: middle;">'+
                        '<label>No se encontraron fajillas sobrantes.</label>'+
                        '<hr>'+
                    '</td>'+
                '</tr>'+
                '<br>';
            }
        }
        $("#cuerpoEfectivo").html(html_Efectivo);
        $("#cuerpoVoucher").html(html_Voucher);
        $("#cuerpoFajilla").html(html_Fajilla);
        $("#botones").html('<button  name="z" type="button" class="btn btn-success validar_Turno_Taquillero">Guardar</button>   <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>')
        cerrarCarga();
    });

    cerrarCarga();
});

$(document).on('click','.ventanilla_Inactiva_Sin_Transacciones', function(){
    var idAperturaVentanilla =$(this).data('book-id');

    $.ajax({
        type:'POST',
        url:'',
        data:{'idAperturaVentanilla':idAperturaVentanilla['idAperturaVentanilla']},
        dataType: 'JSON',
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            cerrarCarga();
        },
    }).done(function(data){
        if(data.respuesta){
        }
        cerrarCarga();
    });
});

$(document).on('click', '.seleccionar', function(){
    if($(this).is(':checked')){
        contador2 += 1; 
    }
    else{
        contador2 -=1; 
    }
});

$(document).on('click','.validar_Turno_Taquillero', function(){
    iniciarCarga();
    if(contador1 == contador2 && contador1 !=0 && contador2 !=0){
        var idAperturaVentanilla = $("#idAperturaVentanilla").val();
        var idUsuario = $("#idUsuario").val();
                
        $.ajax({
            type:'POST',
            url: 'Supervisar_Taquillas/Actualizar_Taquilla',
            data:{'idAperturaVentanilla':idAperturaVentanilla,'idUsuario':idUsuario},
            dataType:'JSON',
            error: function (jqXHR, textStatus, errorThrown) {
                alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
                cerrarCarga();
            },
        }).done(function(data){
            if(data.respuesta){
                location.reload();
            }
            cerrarCarga();
        });
        
    }
    else{
        alert('Favor de marcar los recuadros pendientes o reportar faltante');
        cerrarCarga();
    }
});

$(document).on('click','.Reportar_Turno_Inactivo', function(){
    iniciarCarga();
    voucher_Faltante = [];

    contador1 = 0;
    contador2 = 0;
    
    var idAperturaVentanilla = $(this).data('book-id');

    var html_Efectivo = '', html_Voucher = '', html_Fajilla = '';

    $.ajax({
        type:'POST',
        url:'Supervisar_Taquillas/Informacion_Turno',
        data: idAperturaVentanilla,
        dataType: 'JSON',
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            cerrarCarga();
        },
    }).done(function(data){
        if(data.respuesta){
            $("#idAperturaVentanillaFaltante").val(idAperturaVentanilla['idAperturaVentanilla']);
            if(data.taquillero.efectivo.length){
                html_Efectivo =
                '<tr>'+
                    '<td>'+
                        '<label>'+
                            '<input class="seleccionarFaltante" name="efectivoFaltante" id="efectivoFaltante" type="checkbox" > Total de Efectivo: '+data.taquillero.efectivo[0]['Efectivo']+''+
                        '</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+
                        '<label>'+
                            '<input class="seleccionarFaltante" name="fondoFaltante" id="fondoFaltante" type="checkbox"> Fondo de Caja: '+data.taquillero.efectivo[0]['fondoCaja']+''+
                        '</label>'+
                        '<hr>'+
                    '</td>'+
                '</tr>'+
                '<br>';
                contador1 = 2;
            }else{
                html_Efectivo =
                '<tr>'+
                    '<td>'+
                        '<label>'+
                            '<input class="seleccionarFaltante" name="efectivoFaltante" id="efectivoFaltante" type="checkbox" > Total de Efectivo: 0'+
                        '</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+
                        '<label>'+
                            '<input class="seleccionarFaltante" name="fondoFaltante" id="fondoFaltante" type="checkbox"> Fondo de Caja: '+data.taquillero.fondoCaja[0]['fondoCaja']+''+
                        '</label>'+
                        '<hr>'+
                    '</td>'+
                '</tr>'+
                '<br>';
                contador1 = 2;
            }

            if(data.taquillero.voucher.length){
                for(var i=0; i<data.taquillero.voucher.length;i++){
                    html_Voucher +=
                    '<tr>'+
                        '<td>'+
                            '<label>'+
                                '<input class="seleccionarFaltante" name="voucherFaltante'+i+'" id="voucherFaltante'+i+'" type="checkbox" value="'+data.taquillero.voucher[i]['idTransaccionV']+'"> Numero de Aprobación:  '+data.taquillero.voucher[i]['numAprovacion']+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Monto: '+data.taquillero.voucher[i]['Monto']+''+
                            '</label>'+
                            '<hr>'+
                        '</td>'+
                    '</tr>'+
                    '<br>';
                    contador1 = contador1 + 1;
                }
            }
            else{
                html_Voucher =
                '<tr>'+
                    '<td>'+
                        '<label>No se encontraron transacciones realizadas con tarjeta</label>'+
                        '<hr>'+
                    '</td>'+
                '</tr>'+
                '<br>';
            }

            if(data.taquillero.fajilla.length){
                html_Fajilla =
                '<tr>'+
                    '<td>'+
                        '<label>'+
                            '<input class="seleccionarFaltante" name="fajillaFaltante" id="fajillaFaltante" type="checkbox" value="'+data.taquillero.fajilla[0]['idFajilla']+'"> Fajilla Sobrante,&nbsp;&nbsp;&nbsp; Folio Inicial :  '+data.taquillero.fajilla[0]['FolioInicial']+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Folio Final: '+data.taquillero.fajilla[0]['FolioFinal']+' &nbsp;&nbsp;&nbsp;&nbsp; Tarjetas Sobrantes: '+data.taquillero.fajilla[0]['Restantes']+'   '+
                        '</label>'+
                        '<hr>'+
                    '</td>'+
                '</tr>'+
                '<br>';
                contador1 = contador1 + 1;
            }
            else{
                html_Fajilla =
                '<tr>'+
                    '<td style="text-align: center; vertical-align: middle;">'+
                        '<label>No se encontraron fajillas sobrantes.</label>'+
                        '<hr>'+
                    '</td>'+
                '</tr>'+
                '<br>';
            }
        }

        $("#cuerpoEfectivoFaltante").html(html_Efectivo);
        $("#cuerpoVoucherFaltante").html(html_Voucher);
        $("#cuerpoFajillaFaltante").html(html_Fajilla);
        $("#botonesFaltante").html('<button  name="z" type="button" class="btn btn-success validar_Faltante_Turno_Inactivo">Guardar</button>   <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>');
        cerrarCarga();
    });
});

$(document).on('click','.validar_Faltante_Turno_Inactivo',function(){
    iniciarCarga();

    var d = new Date();
    
    var idAperturaVentanilla = $("#idAperturaVentanillaFaltante").val();
    var idUsuario = $("#idUsuarioSupervisor").val();

    var fecha = d.toISOString().split('T')[0] +" "+d.toLocaleTimeString()+".000";

    var faltanteEfectivo = $("#inputEfectivoFaltante").val();
    var faltanteFondo = $("#inputFondoFaltante").val();

    if(faltanteEfectivo == null){
        faltanteEfectivo = 0;
    }
    if(faltanteFondo == null){
        faltanteFondo = 0;
    }
    if(!voucher_Faltante.length){
        voucher_Faltante = 0;
    }

    if(faltanteEfectivo == 0 && faltanteFondo == 0 && voucher_Faltante == 0){
        voucher_Faltante = [];
        alert('Favor de seleccionar alguna casilla para validar el turno con faltante');
        cerrarCarga();
    }
    else{
        
        $.ajax({
            type:'POST',
            url: 'Supervisar_Taquillas/Validar_Faltante_Turno_Inactivo',
            data:{'fecha':fecha,'idUsuario':idUsuario,'idAperturaVentanilla':idAperturaVentanilla,'faltanteEfectivo':faltanteEfectivo,'faltanteFondo':faltanteFondo,'faltanteVoucher':voucher_Faltante},
            dataType: 'JSON',
            error: function (jqXHR, textStatus, errorThrown) {
                alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
                cerrarCarga();
            },
        }).done(function(data){
            if(data.respuesta){
                alert('Se ha registrado los faltantes del turno');
                location.reload();
            }
            cerrarCarga();
        });
    }
});


/**--------------------------Mostrar turno finalizado-------------------------------- */

$(document).on('click', '.mostrar_Turno_Finalizado', function(){
    alert('Funcionaaaaaa');

    iniciarCarga();

    var idAperturaVentanilla =$(this).data('book-id');
    var total_Efectivo = 0, total_Tarjeta = 0;
    var html = '', html_Pie='';

    $.ajax({
        type:'POST',
        url:'Supervisar_Taquillas/Transacciones_Finalizadas',
        data:{'idAperturaVentanilla':idAperturaVentanilla['idAperturaVentanilla']},
        dataType:'JSON',
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            cerrarCarga();
        },
    }).done(function(data){
        if(data.respuesta){
            for(var i=0; i<data.fajillas.vacias.length;i++){
                html +=
                '<tr>'+
                    '<td style="text-align: center; vertical-align: middle;">Fajilla Agregada</td>'+
                    '<td style="text-align: center; vertical-align: middle;">---</td>'+
                    '<td style="text-align: center; vertical-align: middle;">---</td>'+
                    '<td style="text-align: center; vertical-align: middle;">'+data.fajillas.vacias[i]['fecha']+'</td>'+
                    '<td style="text-align: center; vertical-align: middle;"><a  class="btn btn-outline-success descripcion_Fajilla" data-book-id='+"'{"+'"idFajilla":'+data.fajillas.vacias[i]['idFajilla']+"}'"+' ><i class="fa fa-eye" aria-hidden="true"></i></a></td>'+
                '</tr>';
            }

            for(var i=0; i<data.fajillas.enteras.length;i++){
                html +=
                '<tr>'+
                    '<td style="text-align: center; vertical-align: middle;">Fajilla Agregada</td>'+
                    '<td style="text-align: center; vertical-align: middle;">---</td>'+
                    '<td style="text-align: center; vertical-align: middle;">---</td>'+
                    '<td style="text-align: center; vertical-align: middle;">'+data.fajillas.enteras[i]['fecha']+'</td>'+
                    '<td style="text-align: center; vertical-align: middle;"><a  class="btn btn-outline-success descripcion_Fajilla" data-book-id='+"'{"+'"idFajilla":'+data.fajillas.enteras[i]['idFajilla']+','+'"Defectuosas":'+data.fajillas.enteras[i]['Defectuosas']+','+'"Sobrantes":'+data.fajillas.enteras[i]['Sobrantes']+','+'"Vendidas":'+data.fajillas.enteras[i]['Vendidas'] +"}'"+' ><i class="fa fa-eye" aria-hidden="true"></i></a></td>'+
                '</tr>';
            }

            if(data.voucher.length){
                if(data.voucher[0]['Tarjeta'] === null ){
                    html +=
                    '<tr>'+
                        '<td style="text-align: center; vertical-align: middle;">Vouchers</td>'+
                        '<td style="text-align: center; vertical-align: middle;">---</td>'+
                        '<td style="text-align: center; vertical-align: middle;">---</td>'+
                        '<td style="text-align: center; vertical-align: middle;">---</td>'+
                        '<td style="text-align: center; vertical-align: middle;"><a  class="btn btn-outline-success mostrar_Vouchers" data-book-id='+"'{"+'"idAperturaVentanilla":'+idAperturaVentanilla['idAperturaVentanilla']+"}'"+' ><i class="fa fa-eye" aria-hidden="true"></i></a></td>'+
                    '</tr>';
                }
                else{
                    html +=
                    '<tr>'+
                        '<td style="text-align: center; vertical-align: middle;">Vouchers</td>'+
                        '<td style="text-align: center; vertical-align: middle;">---</td>'+
                        '<td style="text-align: center; vertical-align: middle;">'+data.voucher[0]['Tarjeta']+'</td>'+
                        '<td style="text-align: center; vertical-align: middle;">---</td>'+
                        '<td style="text-align: center; vertical-align: middle;"><a  class="btn btn-outline-success mostrar_Vouchers" data-book-id='+"'{"+'"idAperturaVentanilla":'+idAperturaVentanilla['idAperturaVentanilla']+"}'"+' ><i class="fa fa-eye" aria-hidden="true"></i></a></td>'+
                    '</tr>';
                }
            }

            for(var i=0;i<data.transacciones.length;i++){
                html +=
                '<tr>'+
                    '<td style="text-align: center; vertical-align: middle;">Transacción</td>'+
                    '<td style="text-align: center; vertical-align: middle;">'+data.transacciones[i]['Efectivo']+'</td>'+
                    '<td style="text-align: center; vertical-align: middle;">'+data.transacciones[i]['Tarjeta']+'</td>'+
                    '<td style="text-align: center; vertical-align: middle;">'+data.transacciones[i]['Fecha']+'</td>'+
                    '<td style="text-align: center; vertical-align: middle;"><a  class="btn btn-outline-success descripcion_Transaccion" data-book-id='+"'{"+'"idTransaccion":'+data.transacciones[i]['idTransaccion']+"}'"+' ><i class="fa fa-eye" aria-hidden="true"></i></a></td>'+
                '</tr>';
                total_Efectivo = total_Efectivo + Number(data.transacciones[i]['Efectivo']);
                total_Tarjeta = total_Tarjeta + Number(data.transacciones[i]['Tarjeta']);
            }
        }
        $("#detalles").html('');
        $("#pie_Informacion").html('<tr><td>Efectivo : '+total_Efectivo+'   Tarjeta: '+total_Tarjeta+' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><a href="#modal_Validar_Cierre_Taquilla" type="button" class="btn btn-success  informacion_Turno_Activo" data-toggle="modal" data-book-id='+"'{"+'"idAperturaVentanilla":'+idAperturaVentanilla['idAperturaVentanilla']+"}'"+'>Validar Turno</a> <a href="#modal_Validar_Faltante_Taquilla" type="button" class="btn btn-warning  reportar_Turno_Activo" data-toggle="modal" data-book-id='+"'{"+'"idAperturaVentanilla":'+idAperturaVentanilla['idAperturaVentanilla']+"}'"+'>Reportar Faltante</a> </td></tr>');
        $("#informacion").html(html);

        cerrarCarga();
    });
});