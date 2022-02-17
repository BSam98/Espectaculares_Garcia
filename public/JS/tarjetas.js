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

$("#agregarLote").click(function(){
    $.ajax({
        type: "POST",
        url: 'Agregar_Lote',
        data: $("#formularioAgregarLote").serialize(),
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
        },
        success: function (data){            
            alert(data.msj);
            if(data.respuesta)
                console.log(data.dato);
        },
        dataType: 'JSON'
    });
});

$(document).on('click','.editarLote', function(){
                    
    var Lote = $(this).data('book-id');

    console.log(Lote);

   $(".modal-body #idLote").val(Lote['idLote']);
   $(".modal-body #Nombre").val(Lote['Nombre']);
   $(".modal-body #Material").val(Lote['Material']);
   $(".modal-body #Cantidad").val(Lote['Cantidad']);
   $(".modal-body #FolioInicial").val(Lote['FolioInicial']);
   $(".modal-body #FolioFinal").val(Lote['FolioFinal']);
   $(".modal-body #Serie").val(Lote['Serie']);
   $(".modal-body #FechaIngreso").val(Lote['FechaIngreso']);
   $(".modal-body #Usuario").val(Lote['Usuario']);
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