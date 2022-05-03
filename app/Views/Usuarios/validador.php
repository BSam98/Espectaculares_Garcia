<fieldset id="fieldset">
    <center><h2><i class="fa fa-star" aria-hidden="true"></i>&nbsp;VALIDAR</h2></center><hr>
    <div class="container">
    <h3>Atracción: <?php echo $informacion[0]->Atraccion?></h3>
    <input id="tiempo" type="hidden" value='<?php echo $informacion[0]->TiempoMAX ?>'>

    <!-- onload function is evoke when page is load -->
    <!--countdown function is called when page is loaded -->
    <body">
    <div style="font-size: 20px;">
        Tiempo de Espera:
        <input id="minutes" type="text" style="width: 30px; border: none; font-size: 20px; font-weight: bold; color: black;">minutos<font size="5"> :</font>
        <input id="seconds" type="text" style="width: 30px; border: none; font-size: 20px; font-weight: bold; color: black;">segundos
    </div>
    <button type="button" class="btn btn-warning my_button" value="2">Tiempo Extra</button>
    <hr>
        <div class="input-group mb-3">
            <h5>Tarjeta:&nbsp;</h5>
                <div class="input-group-append">
                    <input type="text" class="form-control" name="tarjetaVal" id="tarjetaVal">&nbsp;
                </div>
                <button type="button" class="btn btn-success" id="validar">Validar</button>               
        </div>       
        <div class="alert alert-primary" role="alert" style="display: none;">
            Pago Generado: <br>
            Saldo Restante:
        </div>
       
    </div>
</fieldset>
<script src="JS/validar.js"></script>
<script src="JS/carga.js"></script>
<script>
    $(document).ready(function(){
        $('#validar').click(function(){
            $('.alert').show()
        })
    });
</script>