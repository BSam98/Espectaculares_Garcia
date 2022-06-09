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

    /************************************* Boton Iniciar Sesion *******************************************/
    $("#botonenviar").click( function(){
        
        var evento = $("#eventoId").val();
        var zona =$('#zona').val();  
        var taquilla = $('#taquilla').val();
        var ventanilla =$('#ventanilla').val();
        var usuario =$('#idUsuario').val();

        $.ajax({
            beforeSend:function () {//antes de cargar la info, abrimos una ventana de carga
                inicia_carg();//funcion que abre la ventana de carga
            },
            type: 'POST',
            url: 'datosTurno',
            data: $('#form1').serialize(),
            dataType: 'JSON',
            error(jqXHR, textStatus, errorThrown){
                alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            },
        }).done(function(data){
            var idV=data.msj;
            if(data.msj == false){
                alert('No puede ingresar tarjetas ya registradas');
                location.reload();
                //location.href='turno';
                cierra_carg();
            }else{
                //console.log(data.msj);
                location.href ="ModuloCobro?e="+evento+"&z="+zona+"&t="+taquilla+"&v="+idV+"&u="+usuario+"&idv="+ventanilla;
                
                /*$.ajax({
                    beforeSend:function () {//antes de cargar la info, abrimos una ventana de carga
                        inicia_carg();//funcion que abre la ventana de carga
                    },
                    url:"PuntoVenta",
                    type:"POST",
                    dataType:"JSON ",
                    data:{'evento':evento, 'zona':zona, 'taquilla':taquilla, 'ventanilla':ventanilla, 'usuario':usuario}
                }).done(function(data){
                    console.log('si entro aqui');
                    console.log(data);
                    if(data.msj == true){
                        location.href ="ModuloCobro?e="+evento+"&z="+zona+"&t="+taquilla+"&v="+idV+"&u="+usuario+"&idv="+ventanilla;
                    }else{
                        alert('Error al ingresar');
                        location.reload();
                    }
                    cierra_carg();
                });*/
            }
        });
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