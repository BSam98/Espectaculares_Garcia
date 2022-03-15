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
    
    var html='';
    var promocion = $(this).data('book-id');

   if(promocion['Promocion']==4){
       html +='<label for="creditos_cortesia">Creditos</label>'+
       '<input class="form-control" type="number" id="creditos_cortesia" required name="creditos_cortesia[]" required placeholder="Creditos de cortesia"/>';
       $(".modal-body #promocion").val(promocion['Promocion']);
       $("#area_creditos_cortesia").html(html);
   }
   else{
    $(".modal-body #promocion").val(promocion['Promocion']);
    html +='<input class="form-control" type="hidden" id="creditos_cortesia" required name="creditos_cortesia[]" required placeholder="Creditos de cortesia" value ="0"/>';
    $("#area_creditos_cortesia").html(html);
   }

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
            if(datos['tipoPromocion']!=4){
                cabecera_Html +='<th scope="col" style="vertical-align: middle;">Evento</th>'+
                '<th scope="col" style="vertical-align: middle;">Fecha y Hora Inicial</th>'+
                '<th scope="col" style="vertical-align: middle;">Fecha y Hora Inicial</th>'+
                '<th scope="col" style="vertical-align: middle;">Precio</th>';
            }
            else{
                cabecera_Html +='<th scope="col" style="vertical-align: middle;">Evento</th>'+
                '<th scope="col" style="vertical-align: middle;">Fecha y Hora Inicial</th>'+
                '<th scope="col" style="vertical-align: middle;">Fecha y Hora Inicial</th>'+
                '<th scope="col" style="vertical-align: middle;">Precio</th>'+
                '<th scope="col" style="vertical-align: middle;">Creditos</th>';
            }
            
            switch(datos['tipoPromocion']){
                case 1:
                    for(var i = 0; i<data.msj.length;i++){
                        cuerpo_Html +='<tr>'+
                        '<td>'+data.msj[i]['Nombre']+'</td>'+
                        '<td>'+data.msj[i]['FechaInicial']+'</td>'+
                        '<td>'+data.msj[i]['FechaFinal']+'</td>'+
                        '<td>'+data.msj[i]['Precio']+'</td>'+
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