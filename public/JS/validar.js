//set minutes
var mins = 2;

//calculate the seconds
var secs = mins * 60;

var minutos;

var segundos;

//countdown function is evoked when page is loaded

$('.my_button').click(function() {
    var time = $(this).attr("value");
    var mins = 2;
    var total =  parseInt(mins)+ parseInt(time);
    alert(total);
})

$(document).ready(function(){
    iniciarCarga();
    var tiempo = $("#tiempo").val();

    var datos = tiempo.split(':');
    console.log('Separacion: ' + datos);

    alert(datos[2]);

    minutos = parseInt(datos[1]);

    segundos = (minutos * 60) + parseInt(datos[2]);

    alert(segundos);

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
            alert('Se acabo');
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