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