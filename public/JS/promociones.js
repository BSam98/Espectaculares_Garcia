/*
$("#a").click(function(){
    $.ajax({
        type: "GET",
        url:'Promociones/Agregar_Promocion',
        data:$("#formularioAgregarPromocion").serialize(),
        dataType: 'JSON',
        error: function(jqXHR, textStatus, errorThrown){
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
        },
    }).done(function(data){
        if(data.respuesta){
            //location.reload();
            alert('Entro correctamente');
            alert(data.msj['nombre']);
        }
    });
});
*/
/*
$(document).on('click','#a', function(){
    $.ajax({
        type: "GET",
        url:'Promociones/Agregar_Promocion',
        data:$("#formularioAgregarPromocion").serialize(),
        dataType: 'JSON',
        error: function(jqXHR, textStatus, errorThrown){
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
        },
    }).done(function(data){
        if(data.respuesta){
            //location.reload();
            alert('Entro correctamente');
            alert(data.msj['nombre']);
        }
    });
});
*/


$(document).on('click','.agregar_promocion', function(){
    
    var creditos_Html='', cantidad_Html='', cantidad_Boletos_Html='';
    var promocion = $(this).data('book-id');

    cantidad_Boletos_Html ='<input class="form-control" type="hidden" id="cantidad_Boletos" required name="cantidad_Boletos[]" placeholder="Cantidad de boletos" value="0"/>';

    creditos_Html ='<input class="form-control" type="hidden" id="creditos_cortesia" required name="creditos_cortesia[]" placeholder="Creditos de cortesia" value ="0"/>';

    switch(promocion['Promocion']){
        case 1:
            cantidad_Html +='<label for ="cantidad">Cantidad de personas por promoción</label>'+
            '<input class="form-control" type="number" id="cantidad" required name="cantidad[]" placeholder="Cantidad de personas"/>';

            cantidad_Boletos_Html ='<label for ="cantidad_Boletos">Cantidad de boletos a cobrar</label>'+
            '<input class="form-control" type="number" id="cantidad" required name="cantidad_Boletos[]"  placeholder="Cantidad de boletos"/>';
        break;

        case 2:
            cantidad_Html +='<label fo ="cantidad">Precio</label>'+
            '<input class="form-control" type="number" id="cantidad" required name="cantidad[]"  placeholder="Precio de la promoción"/>';
        break;

        case 3:
            cantidad_Html +='<label for ="cantidad">Precio</label>'+
            '<input class="form-control" type="number" id="cantidad" required name="cantidad[]"  placeholder="Precio de la promoción"/>';
        break;

        case 4:
            cantidad_Html +='<label for ="cantidad">Precio</label>'+
            '<input class="form-control" type="number" id="cantidad" required name="cantidad[]" placeholder="Precio de la promoción"/>';
            
            creditos_Html ='<label for="creditos_cortesia">Creditos</label>'+
            '<input class="form-control" type="number" id="creditos_cortesia" required name="creditos_cortesia[]"  placeholder="Creditos de cortesia"/>';
        break;
    }

    $("#promocion").val(promocion['Promocion']);
    $(".modal-body #area_Cantidad").html(cantidad_Html);
    $(".modal-body #area_Cantidad_Boletos").html(cantidad_Boletos_Html);
    $(".modal-body #area_Creditos_Cortesia").html(creditos_Html);
});

$("#a").click(function(){
    $.ajax({
        type: "POST",
        url:'Promociones/Agregar_Promocion',
        data:$("#formularioAgregarPromocion").serialize(),
        dataType: 'JSON',
        error: function(jqXHR, textStatus, errorThrown){
            alert('Se produjo un error : a'+ errorThrown +' '+ textStatus);
        },
    }).done(function(data){
        
        if(data.respuesta){
            location.reload();
        }
        
    });
});

$(document).on('click','.verEventos', function(){
    var datos = $(this).data('book-id');
    var cabecera_Html='';
    var cuerpo_Html ='';

    $.ajax({
        type: "POST",
        url: 'Promociones/VerEventos',
        data:{"idPromocion":datos['idPromocion'],"tipoPromocion":datos['tipoPromocion']},
        dataType: 'JSON',
        error: function(jqXHR, textStatus, errorThrown){
            alert('Se produjo un erro: a' + errorThrown + ' '+ textStatus);
        },
    }).done(function (data){
        if(data.respuesta){
            cabecera_Html +='<th scope="col" style="vertical-align: middle;">Evento</th>'+
            '<th scope="col" style="vertical-align: middle;">Fecha y Hora Inicial</th>'+
            '<th scope="col" style="vertical-align: middle;">Fecha y Hora Inicial</th>'+
            '<th scope="col" style="vertical-align: middle;">Precio</th>';
            
            switch(datos['tipoPromocion']){
                case 1:
                    cabecera_Html ='<th scope="col" style="vertical-align: middle;">Evento</th>'+
                    '<th scope="col" style="vertical-align: middle;">Fecha y Hora Inicial</th>'+
                    '<th scope="col" style="vertical-align: middle;">Fecha y Hora Inicial</th>';

                    for(var i = 0; i<data.msj.length;i++){
                        cuerpo_Html +='<tr>'+
                        '<td>'+data.msj[i]['Nombre']+'</td>'+
                        '<td>'+data.msj[i]['FechaInicial']+'</td>'+
                        '<td>'+data.msj[i]['FechaFinal']+'</td>'+
                        '</tr>';
                    }
                break;

                case 2:
                    for(var i = 0; i<data.msj.length;i++){
                        cuerpo_Html +='<tr>'+
                        '<td>'+data.msj[i]['Nombre']+'</td>'+
                        '<td>'+data.msj[i]['FechaInicial']+'</td>'+
                        '<td>'+data.msj[i]['FechaFinal']+'</td>'+
                        '<td>'+data.msj[i]['Precio']+'</td>'+
                        '</tr>';
                    }
                break;
                
                case 3:
                    for(var i = 0; i<data.msj.length;i++){
                        cuerpo_Html +='<tr>'+
                        '<td>'+data.msj[i]['Nombre']+'</td>'+
                        '<td>'+data.msj[i]['FechaInicial']+'</td>'+
                        '<td>'+data.msj[i]['FechaFinal']+'</td>'+
                        '<td>'+data.msj[i]['Precio']+'</td>'+
                        '</tr>';
                    }
                break;

                case 4:
                    cabecera_Html ='<th scope="col" style="vertical-align: middle;">Evento</th>'+
                    '<th scope="col" style="vertical-align: middle;">Fecha y Hora Inicial</th>'+
                    '<th scope="col" style="vertical-align: middle;">Fecha y Hora Inicial</th>'+
                    '<th scope="col" style="vertical-align: middle;">Precio</th>'+
                    '<th scope="col" style="vertical-align: middle;">Creditos</th>';

                    for(var i = 0; i<data.msj.length;i++){
                        cuerpo_Html +='<tr>'+
                        '<td>'+data.msj[i]['Nombre']+'</td>'+
                        '<td>'+data.msj[i]['FechaInicial']+'</td>'+
                        '<td>'+data.msj[i]['FechaFinal']+'</td>'+
                        '<td>'+data.msj[i]['Precio']+'</td>'+
                        '<td>'+data.msj[i]['Creditos']+'</td>'+
                        '</tr>';
                    }
                break;
            }

            $(".modal-body #cabecera_Promocion_Evento").html(cabecera_Html);
            $(".modal-body #datos_Promocion_Evento").html(cuerpo_Html);
        }
    });
});