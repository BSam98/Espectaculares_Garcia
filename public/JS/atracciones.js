var btnAbrirPopup = document.getElementById('abrir'),
    btnCerrarPopup = document.getElementById('cerrar'),
    btnEditarPopup = document.getElementById(''),
    contenedorOculto = document.getElementById('contenedorOculto'),
    contenedorTablaPropietario = document.getElementById('contenedorTablaPropietario');



btnAbrirPopup.addEventListener('click',function(){
    contenedorOculto.classList.add('active');
});

btnCerrarPopup.addEventListener('click', function(){
    contenedorOculto.classList.remove('active');
});

$(document).on('click','.editarAtraccion', function(){
                    
    var a = $(this).data('book-id');



    
   $(".modal-body #idAtraccion").val(a['idAtraccion']);
   $(".modal-body #Atraccion").val(a['Atraccion']);
   $(".modal-body #Area").val(a['Area']);
   $(".modal-body #Renta").val(a['Renta']);
   $(".modal-body #Nombre").val(a['Nombre']);
   $(".modal-body #CapacidadMAX").val(a['CapacidadMAX']);
   $(".modal-body #CapacidadMIN").val(a['CapacidadMIN']);
   $(".modal-body #Tiempo").val(a['Tiempo']);
   $(".modal-body #TiempoMAX").val(a['TiempoMAX']);

});

$(document).on('click','.editarPropietario', function(){
                    
    var propietario = $(this).data('book-id');


    console.log(propietario);
    $(".modal-body #idPropietario").val(propietario['idPropietario']);
   $(".modal-body #Nombre").val(propietario['Nombre']);
   $(".modal-body #ApellidoP").val(propietario['ApellidoP']);
   $(".modal-body #ApellidoM").val(propietario['ApellidoM']);
   $(".modal-body #Direccion").val(propietario['Direccion']);
   $(".modal-body #Telefono").val(propietario['Telefono']);
   $(".modal-body #RFC").val(propietario['RFC']);
   $(".modal-body #FechaNacimiento").val(propietario['FechaNacimiento']);
});