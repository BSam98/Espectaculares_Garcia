$("#fechaesperada").on('change', function(){
    var idEvento = $("#evento option:selected").val();
    var fecha =$("#fechaesperada").val();

    alert('dato: ' + idEvento + '  ' + fecha);
});