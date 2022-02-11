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

console.log('hay algo');
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