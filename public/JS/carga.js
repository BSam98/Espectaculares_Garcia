

function iniciarCarga(){
    $('body').loadingModal({
        position: 'auto',
        text: 'Cargando',
        color: '#98BE10',
        opacity: '0.7',
        backgroundColor: 'rgb(1,61,125)', 
        animation: 'doubleBounce'
      }); 
}

function cerrarCarga(){
    $('body').loadingModal('hide');
    $('body').loadingModal('destroy');
}