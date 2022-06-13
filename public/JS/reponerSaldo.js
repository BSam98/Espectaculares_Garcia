

$("#buscarTarjeta").on('click',function(){
    iniciarCarga();
    var folio = $("#inputTarjeta").val();
    var html = '';

    $.ajax({
        type: "POST",
        url: 'Reponer Saldo/Historial_Tarjeta',
        data: {'folio':folio},
        dataType: 'JSON',
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            cerrarCarga();
        },
    }).done(function(data){
        if(data.respuesta){

            /**----------------------Atracciones--------------------------------- */

            for(var i=0;i<data.atracciones.movimiento.length;i++){
                html += '<tr>'+
                    '<td>'+
                        '<label>Cobro Atraccion</label>'+
                    '</td>'+
                    '<td>'+
                        '<label>'+data.atracciones.movimiento[i]['Hora']+'</label>'+
                    '</td>'+
                    '<td>'+
                        '<button type="button" class="btn btn-success atraccion_Movimiento" value="'+data.atracciones.movimiento[i]['idMovimiento']+'">Mostrar</button>'+
                    '</td>'+
                '</tr>';
            }

            for(var i=0;i<data.atracciones.descuentos.length;i++){
                html += '<tr>'+
                    '<td>'+
                        '<label>Promoción Descuento</label>'+
                    '</td>'+
                    '<td>'+
                        '<label>'+data.atracciones.descuentos[i]['Hora']+'</label>'+
                    '</td>'+
                    '<td>'+
                        '<button type="button" class="btn btn-success atraccion_Descuento" value="'+data.atracciones.descuentos[i]['idRADU']+'">Mostrar</button>'+
                    '</td>'+
                '</tr>';
            }

            for(var i=0;i<data.atracciones.pulsera.length;i++){
                html += '<tr>'+
                    '<td>'+
                        '<label>Promoción Pulsera Magica</label>'+
                    '</td>'+
                    '<td>'+
                        '<label>'+data.atracciones.pulsera[i]['Hora']+'</label>'+
                    '</td>'+
                    '<td>'+
                        '<button type="button" class="btn btn-success atraccion_Pulsera" value="'+data.atracciones.pulsera[i]['idRAPM']+'">Mostrar</button>'+
                    '</td>'+
                '</tr>';
            }

            for(var i=0;i<data.atracciones.gratis.length;i++){
                html += '<tr>'+
                    '<td>'+
                        '<label>Promoción Juego Gratis</label>'+
                    '</td>'+
                    '<td>'+
                        '<label>'+data.atracciones.gratis[i]['Hora']+'</label>'+
                    '</td>'+
                    '<td>'+
                        '<button type="button" class="btn btn-success atraccion_Gratis" value="'+data.atracciones.gratis[i]['idRAJG']+'">Mostrar</button>'+
                    '</td>'+
                '</tr>';
            }

                        /**---------------------------Taquilla----------------------------------------- */

            for(var i=0;i<data.taquilla.saldo.length;i++){
                html +='<tr>'+
                    '<td>'+
                        '<label>Recarga de Saldo</label>'+
                    '</td>'+
                    '<td>'+
                        '<label>'+data.taquilla.saldo[i]['Fecha']+'</label>'+
                    '</td>'+
                    '<td>'+
                        '<button type="button" class="btn btn-success taquilla_Saldo" value="'+data.taquilla.saldo[i]['idSaldo']+'">Mostrar</button>'+
                    '</td>'+
                '</tr>';
            }

            for(var i=0;i<data.taquilla.cortesia.length;i++){
                html +='<tr>'+
                    '<td>'+
                        '<label>Recarga con cortesias</label>'+
                    '</td>'+
                    '<td>'+
                        '<label>'+data.taquilla.cortesia[i]['Fecha']+'</label>'+
                    '</td>'+
                    '<td>'+
                        '<button type="button" class="btn btn-success taquilla_Cortesia" value="'+data.taquilla.cortesia[i]['idSPP']+'">Mostrar</button>'+
                    '</td>'+
                '</tr>';
            }

            for(var i=0;i<data.taquilla.pulsera.length;i++){
                html +='<tr>'+
                    '<td>'+
                        '<label>Compra de pulsera magica</label>'+
                    '</td>'+
                    '<td>'+
                        '<label>'+data.taquilla.pulsera[i]['Fecha']+'</label>'+
                    '</td>'+
                    '<td>'+
                        '<button type="button" class="btn btn-success taquilla_Pulsera" value="'+data.taquilla.pulsera[i]['idPromoV']+'">Mostrar</button>'+
                    '</td>'+
                '</tr>';
            }



            $("#informacion").html(html);
            cerrarCarga();
        }
    });
});

$(document).on('click','.atraccion_Movimiento',function(){
    iniciarCarga();
    var id  = $(this).val();
    var html_Movimiento = '';
    

    $.ajax({
        type:'POST',
        url:'Reponer Saldo/Detalle_Movimiento',
        data:{'id':id},
        dataType: 'JSON',
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            cerrarCarga();
        },
    }).done(function(data){
        if(data.movimiento.length){
            html_Movimiento += '<tr>'+
                '<td>'+
                    '<label>Atraccion: '+data.movimiento[0]['Atraccion']+'</label>'+
                '</td>'+
            '</tr>'+
            '<tr>'+
                '<td>'+
                    '<label>Creditos Utilizados</label>'+
                    '<br>'+
 
                    '<label>Normales: '+data.movimiento[0]['Creditos']+"&nbsp" + '</label>'+

                    '<label>Cortesias: '+data.movimiento[0]['Cortesias']+'</label>'+
                '</td>'+
            '</tr>'+
            '<tr>'+
                '<td>'+
                    '<label>Validador: </label>'+
                    '<br>'+
                    '<label>'+data.movimiento[0]['Nombre']+ " " +data.movimiento[0]['Apellidos']+'</label>'+
                '</td>'+
            '</tr>'+
            '<tr>'+
                '<td>'+
                    '<label>Fecha: </label>'+
                    '<br>'+
                    '<label>'+data.movimiento[0]['Hora']+'</label>'+
                '</td>'+
            '</tr>'+
            '<tr>'+
                '&nbsp<td><button class="btn btn-danger">Deshacer</button>&nbsp'+
                '<button class="btn btn-warning">Modificar</button>&nbsp'+
                '<button class="btn btn-success">Cerrar</button></td>'+
            '</tr>'
            ;
        }
        $("#detalles").html(html_Movimiento);
        cerrarCarga();
    });
});

$(document).on('click','.atraccion_Descuento',function(){
    iniciarCarga();
    var id= $(this).val();
    var html_Descuento = '';

    $.ajax({
        type:'POST',
        url: 'Reponer Saldo/Descuento_Atraccion',
        data: {'id':id},
        dataType: 'JSON',
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            cerrarCarga();
        },
    }).done(function(data){
        if(data.descuento.length){
            html_Descuento += 
            '<tr>'+
                '<td>'+
                    '<label>Atraccion: '+data.descuento[0]['Atraccion']+'</label>'+
                '</td>'+
            '</tr>'+
                '<td>'+
                    '<label>Promocion Detectada: </label>'+
                    '<br>'+
                    '<label>'+data.descuento[0]['Promocion']+'</label>'+
                '</td>'+
            '<tr>'+
                '<td>'+
                    '<label>Creditos Utilizados: </label>'+
                    '<br>'+
                    '<label>Normales: '+data.descuento[0]['CantidadN']+ "&nbsp" +'</label>'+
                    '<label>Cortesias: '+data.descuento[0]['CantidadC']+'</label>'+
                '</td>'+
            '</tr>'+
                '<td>'+
                    '<label>Validador: </label>'+
                    '<br>'+
                    '<label>'+data.descuento[0]['Nombre']+ " "+ data.descuento[0]['Apellidos'] +'</label>'+
                '</td>'+
            '<tr>'+
                '<td>'+
                    '<label>Fecha: </label>'+
                    '<br>'+
                    '<label>'+data.descuento[0]['Hora']+'</label>'+
                '</td>'+
            '</tr>'+
            '<tr>'+
                '&nbsp<td><button class="btn btn-danger">Deshacer</button>&nbsp'+
                '<button class="btn btn-warning">Modificar</button>&nbsp'+
                '<button class="btn btn-success">Cerrar</button></td>'+
            '</tr>';
        }

        $("#detalles").html(html_Descuento);
        cerrarCarga();
    });
});