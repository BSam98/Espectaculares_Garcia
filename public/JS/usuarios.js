$("#agregarUsuario").click(function(){
    $.ajax({
        beforeSend: function(){
        },
        type: "POST",
        url: 'Usuarios/Agregar_Usuario',
        data: $("#formularioAgregarUsuario").serialize(),
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
        },
        success: function (data){   
                     
            if(data.respuesta){
                location.reload();
            }
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