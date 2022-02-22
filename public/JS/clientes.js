$(document).on('click','.mostrarTarjetasAsociadas', function(){
                    
    var a = $(this).data('book-id');
    console.log(a);
    alert(a);
    
    $.ajax({
        type: "POST",
        url: 'Clientes/Tarjetas_Asociadas',
        data: a,
        dataType: 'JSON'
    }).done(function(data){

        var html ='';
        for(var i = 0;i<data.msj.length; i++){
            html += '<tr>'+
            '<td><a href="#editar_Cliente" class="editar" data-toggle="modal"><i class="bi bi-pencil-square btn btn-warning"></i></a></td>'+
            '<td>'+data.msj[i]['Nombre']+'</td>'+
            '<td>'+data.msj[i]['SaldoAc']+'</td>'+
            '<td>'+data.msj[i]['CreditoN']+'</td>'+
            '<td>'+data.msj[i]['CreditoC']+'</td>'+
            '<td>'+data.msj[i]['FechaR']+'</td>'+
            '<td>'+data.msj[i]['VigenciaS']+'</td>'+
            '</tr>';
        }
        
        $("#datosTarjetas").html(html);
        

    });
});