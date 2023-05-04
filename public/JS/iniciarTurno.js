$(document).ready(function () {
    
    /************************************* Select de Zona ***************************************************/
    if($("#evento").change()){
        var evento = $("#eventoId").val();
        $.ajax({
            url: "eligeZona",
            type:"POST",
            dataType:"JSON ",
            data:{'evento':evento}
        }).done(function(data){
            console.log('Zona'+data);
            var html='';
                html+='<option value="" selected>Elige una Zona</option>';
               for(var i = 0;i<data.msj.length; i++){
                  html += '<option value="'+data.msj[i]['idZona']+'">'+data.msj[i]['Nombre']+'</option>';
               }
               $("#zona").html(html);
        });
    }

    /************************************** Select de Taquilla *********************************************/
    $(document).on('change','select[name="zona"]' ,function(e) {
        var zona = $(this).val();
        $.ajax({
            beforeSend:function () {//antes de cargar la info, abrimos una ventana de carga
                inicia_carg();//funcion que abre la ventana de carga
            },
            url: "eligeTaquilla",
            type:"POST",
            dataType:"JSON ",
            data:{'zona':zona}
        }).done(function(data) {
            console.log('taquilla'+data);
            var html='';
                html+='<option value="" selected>Elige una Taquilla</option>';
            for(var i = 0;i<data.msj.length; i++){
                html += '<option value="'+data.msj[i]['idTaquilla']+'">'+data.msj[i]['Nombre']+'</option>';
            }
            $("#taquilla").html(html);
            cierra_carg();
        });
    });
 
    /****************************************** Select de Ventanilla **************************************/
    $(document).on('change','select[name="taquilla"]' ,function(e) {
            var taquilla = $(this).val();
            $.ajax({
                beforeSend:function () {//antes de cargar la info, abrimos una ventana de carga
                    inicia_carg();//funcion que abre la ventana de carga
                },
                url: "eligeVentanilla",
                type:"POST",
                dataType:"JSON ",
                data:{'taquilla':taquilla},
            }).done(function(data) {
                console.log('Ventanilla'+data);
                var html='';
                    html+='<option value="" selected>Elige una Ventanilla</option>';
                for(var i = 0;i<data.msj.length; i++){
                    html += '<option value="'+data.msj[i]['idVentanilla']+'">'+data.msj[i]['Nombre']+'</option>';
                }
                $("#ventanilla").html(html);
                cierra_carg();
            });
    });


    $(document).on('change','select[name="ventanilla"]' ,function(e) {
        var ventanilla = $(this).val();
    });

    
    /************************************* Cancelar *******************************************/
    $("#cancelar").click( function(){
        location.href='CerrarSesion';
    });

    /**********************************************************************************************************/
    function inicia_carg(){
        $('body').loadingModal({
          position: 'auto',
          text: 'Espere un momento',
          color: '#B0AEC6',
          opacity: '0.7',
          backgroundColor: 'rgb(1,61,125)', 
          animation: 'doubleBounce'
        }); 
    }

    function cierra_carg(){
        $('body').loadingModal('hide');
        $('body').loadingModal('destroy');
        console.log('adios perros');
    }
});