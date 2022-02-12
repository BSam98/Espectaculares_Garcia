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