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


