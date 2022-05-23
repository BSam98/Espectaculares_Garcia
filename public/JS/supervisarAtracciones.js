$('#fechaesperada').change(function () {
    iniciarCarga();

    var idEvento = ($("#evento option:selected").val());
    var fechaInicio = document.getElementById('fechaesperada').value;
    var fechaFinal  = fechaInicio + " 23:59:00.000";
    fechaInicio += " 00:00:00.000";

    $.ajax({
        type:"POST",
        url: 'Ver Atracciones/Mostrar_Atracciones',
        data: {'idEvento':idEvento,'fechaInicio':fechaInicio,'fechaFinal':fechaFinal},
        dataType: 'JSON',
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            cerrarCarga;
        },
    }).done(function(data){
        if(data.respuesta){
            console.log('Datos: ' + JSON.stringify( data.msj));
            console.log(" ");
            console.log(JSON.stringify(data.datos));
            cerrarCarga();
        }
    });
}); 