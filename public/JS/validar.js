//set minutes
var mins = 2;

//calculate the seconds
var secs = mins * 60;

var minutos;

var segundos;
var btnTiempo;

//countdown function is evoked when page is loaded

$('#tiempoExtra').click(function() {
    btnTiempo.disabled = true;
    mm.style.color = "black";
    ss.style.color = "black";

    minutos = parseInt(4) + parseInt(document.getElementById("minutes").value);
    segundos = (minutos * 60) + parseInt(document.getElementById("seconds").value);
    setTimeout('decrement()',60);
});

$('#cerrarSesion').click(function(){
    var idAperturaValidador = $("#idAperturaValidador").val();
    var idAtraccionEvento = $("#idAtraccionEvento").val();

    $.ajax({
        beforeSend:function(){
            iniciarCarga();
        },
        type: "POST",
        url: 'Validacion_Interfaz/Cerrar_Sesion',
        data: {'idAtraccionEvento':idAtraccionEvento,'idAperturaValidador':idAperturaValidador},
        dataType: 'JSON',
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            cerrarCarga();
        },
    }).done(function(data){
        if(data.respuesta){
            cerrarCarga();
            window.location.href='http://localhost/Espectaculares_Garcia/public/';
        }
        else{
            alert(data.msj);
            cerrarCarga();
        }
    });
});

$(document).ready(function(){
    btnTiempo  = document.getElementById('tiempoExtra');
    btnTiempo.disabled=true;
    iniciarCarga();
    var tiempo = $("#TiempoMAX").val();

    var datos = tiempo.split(':');
    console.log('Separacion: ' + datos);

    //alert(datos[2]);

    minutos = parseInt(datos[1]);

    segundos = (minutos * 60) + parseInt(datos[2]);

    //alert(segundos);

    $("#minutes").val(minutos);
    $("#seconds").val(segundos);

    setTimeout('decrement()',60);
});

function decrement(){
    cerrarCarga();
    if(document.getElementById){
        mm = document.getElementById("minutes");
        ss = document.getElementById("seconds");

        if(ss < 59){
            ss.value = segundos;
        }
        else{
            mm.value = getMinutes();
            ss.value = getSeconds();
        }

        if(minutos < 1){
            mm.style.color = "red";
            ss.style.color = "red";
        }

        if(minutos < 0){
            alert('El tiempo de espera se ha terminado, favor de iniciar el ciclo o añadir tiempo extra.');
            btnTiempo.disabled=false;
            mm.value = 0;
            ss.value = 0;
        }
        else{
            segundos--;
            setTimeout('decrement()',1000);
        }
    }
}

function getMinutes(){
    minutos = Math.floor(segundos/60);
    return minutos;
}

function getSeconds(){
    return segundos - Math.round(minutos * 60);
}