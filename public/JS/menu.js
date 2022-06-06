$(document).on('click','.menu', function(){
    var idmP = $(this).data("id");
    var idU = $("#idRang").val();
    $.ajax({
        beforeSend:function () {//antes de cargar la info, abrimos una ventana de carga
           // inicia_carg();//funcion que abre la ventana de carga
        },
        type: 'POST',
        url: 'subMenus',
        data: {'mP':idmP},
        dataType: 'JSON',
        error(jqXHR, textStatus, errorThrown){
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
        },
    }).done(function(data){
        console.log(data.msj);
        for(var i =0 ; i< data.msj.length ; i++){
            var html='';
            html +='<a href="'+data.msj[i]["subModulo"]+'?idT='+idU+'" class="collapse-item" id="button"><span>' + data.msj[i]["subModulo"] + '</span></a>';
            $('#id'+idmP).append(html);
        }
    });
});