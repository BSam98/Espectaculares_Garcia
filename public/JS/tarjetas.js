var btnAbrirPopup = document.getElementById('abrir'),
    btnCerrarPopup = document.getElementById('cerrar'),
    contenedorOculto = document.getElementById('contenedorOculto'),
    contenedorTablaLote = document.getElementById('contenedorTablaLote');



btnAbrirPopup.addEventListener('click',function(){
    contenedorOculto.classList.add('active');
});

btnCerrarPopup.addEventListener('click', function(){
    contenedorOculto.classList.remove('active');
});

$(document).on('click','.editarLote', function(){
                    
    var Lote = $(this).data('book-id');



   $(".modal-body #idLote").val(Lote['idLote']);
   $(".modal-body #Nombre").val(Lote['Nombre']);
   $(".modal-body #Material").val(Lote['Material']);
   $(".modal-body #Cantidad").val(Lote['Cantidad']);
   $(".modal-body #FolioInicial").val(Lote['FolioInicial']);
   $(".modal-body #FolioFinal").val(Lote['FolioFinal']);
   $(".modal-body #Serie").val(Lote['Serie']);
   $(".modal-body #FechaIngreso").val(Lote['FechaIngreso']);
});

$(document).on('click','.editarTarjeta', function(){
                    
    var Tarjeta = $(this).data('book-id');



    
   $(".modal-body #idUsuario").val(Tarjeta['idTarjeta']);
   $(".modal-body #UsuarioNombre").val(Tarjeta['Tarjeta']);
   $(".modal-body #UsuarioApellido").val(Tarjeta['Status']);
   $(".modal-body #NSS").val(Tarjeta['FechaActivacion']);
   $(".modal-body #Usuario").val(Tarjeta['Cliente']);
   $(".modal-body #Contraseña").val(Tarjeta['idEvento']);
});