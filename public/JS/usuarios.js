$("#agregarUsuario").click(function(){
    $.ajax({
        beforeSend: function(){
            iniciarCarga();
        },
        type: "POST",
        url: 'Usuarios/Agregar_Usuario',
        data: $("#formularioAgregarUsuario").serialize(),
        dataType: 'JSON',
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
        },
        success: function (data){   
                     
            if(data.respuesta){
                location.reload();
            }
        },
    });
});

$("#actualizarUsuario").click(function(){
    iniciarCarga();
    $.ajax({
        type: "POST",
        url: 'Usuarios/Editar_Usuario',
        data: $("#formularioEditarUsuario").serialize(),
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            cerrarCarga();
        },
        success: function (data){              
            if(data.respuesta)
                cerrarCarga();
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