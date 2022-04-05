$("#agregarUsuario").click(function(){
    $.ajax({
        type: "POST",
        url: 'Usuarios/Agregar_Usuario',
        data: $("#formularioAgregarUsuario").serialize(),
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
        },
        success: function (data){              
            //if(data.respuesta){}
                //location.reload();
        },
        dataType: 'JSON'
    });
});

$("#actualizarUsuario").click(function(){
    $.ajax({
        type: "POST",
        url: 'Usuarios/Editar_Usuario',
        data: $("#formularioEditarUsuario").serialize(),
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
        },
        success: function (data){              
            if(data.respuesta)
                location.reload();
        },
        dataType: 'JSON'
    });
});

$(document).on('click','.rangos', function(){
    var datos = $(this).data('book-id');

    alert('Permisos: ' + datos['idRango']);
    /*
    $.ajax(
        
    ).done(

    );
    */
});

$(document).on('click','.editarUsuario', function(){
                    
    var usuario = $(this).data('book-id');



    
   $(".modal-body #idUsuario").val(usuario['idUsuario']);
   $(".modal-body #UsuarioNombre").val(usuario['UsuarioNombre']);
   $(".modal-body #UsuarioApellido").val(usuario['UsuarioApellido']);
   $(".modal-body #CorreoE").val(usuario['CorreoE']);
   $(".modal-body #NSS").val(usuario['NSS']);
   $(".modal-body #CURP").val(usuario['CURP']);
   $(".modal-body #Usuario").val(usuario['Usuario']);
   $(".modal-body #Contraseña").val(usuario['Contraseña']);
});


/**********************************EDITAR ROL*********************************/
    $(document).on('click', '.editarRol', function(){
        rango = $(this).val();//obtiene el id del boton seleccionado
        console.log(rango);
        $.ajax({
                beforeSend:function () {//antes de cargar la info, abrimos una ventana de carga
                    inicia_carg();//funcion que abre la ventana de carga
                },
                url:"privUser",//la ruta a donde enviare la info
                type:"POST",
                data:{'rango':rango},//toma el valor del boton seleccionado
                dataType: 'JSON',
                error: function(jqXHR, textStatus, errorThrown){
                    alert('Se produjo un error: a'+ errorThrown + ' ' + textStatus);//en caso de presentar un error, muestra el msj
                    cierra_carg();//funcion que cierra la ventana de carga
                },
            }).done(function(data){//obtiene el valor de data procesado en el controlador
                //console.log(data.msj.Privilegios);
                var html='';//creamos una variable
                    for(var i = 0;i<data.msj.Modulos.length; i++){//hacemos el recorrido de valores del objeto que queremos 
                        html += '<tr>'+
                                    '<td style="padding:0px;">';
                            if(data.msj.Privilegios.find(object => object.privilegio_Modulo == data.msj.Modulos[i]['idModulo'])){//buscamos el valor del objeto en el arreglo Privilegios que pasamos en data y hacemos la comparacion con el idModulo del arreglo de Modulos extraido del data
                                html += '<input class="privilegios" type="checkbox" value="'+data.msj.Modulos[i]['idModulo']+'" checked>'+data.msj.Modulos[i]['modulo'];//si la comparacion es verdadera, va a marcar el valor del dato
                            }
                            else{
                                html += '<input class="privilegios" type="checkbox" value="'+data.msj.Modulos[i]['idModulo']+'">'+data.msj.Modulos[i]['modulo'];//si la comparacion es falsa, va a mostrar el valor del dato
                            }
                            html+='</td>'+
                            '</tr>';
                    }
                $("#modal_privilegios .modal-body #privilegios").html(html);//abrimos el modal, en el apartado de body con la clase de la tabla e imprimimos nuestra variable declarada
                cierra_carg();
            });
    });

    //funcion para saber que opciones selecciono
    $(document).on('click','#agregar', function(){
        rango = $(this).val();
        //alert(rango);
        var selected = [];
        $(":checkbox[class=privilegios]").each(function() {
            if($(this).is(':checked')){
                // agregas cada elemento.
                console.log("Lo ha seleccionado");
                selected.push($(this).val());
            }else{
                console.log('Lo a desmarcado');
            }
        });
        if (selected.length) {
            //console.log("soy selected"+selected);
            $.ajax({
                type: 'POST',
                dataType: 'JSON', // importante para que 
                data: {'select':selected, 'rango':rango}, // jQuery convierta el array a JSON
                url: 'insertarP',
                success: function(data){
                    alert('Datos Guardados');
                   /* for(var i=0; i<data.msj.length; i++){
                        console.log("Datos: " + data.msj[i]['select']);
                    }*/
                }//success
            });//ajax
            alert(JSON.stringify(selected));
        }//if
        else
      alert('Debes seleccionar al menos una opción.');

    return false;

        /*if($(this).is(':checked')){
            console.log("Lo ha seleccionado");
        }else{
            console.log('Lo a desmarcado');
        }*/
    });

    //Funcion ventana Carga
    function inicia_carg(){
        $('body').loadingModal({
          position: 'auto',
          text: 'Cargando',
          color: '#98BE10',
          opacity: '0.7',
          backgroundColor: 'rgb(1,61,125)', 
          animation: 'doubleBounce'
        }); 
    }

    //funcion Ventana cierra carga
    function cierra_carg(){
        $('body').loadingModal('hide');
        $('body').loadingModal('destroy');
        console.log('adios perros');
    }
/**********************************EDITAR ROL*********************************/