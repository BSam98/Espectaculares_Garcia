<fieldset id="fieldset">
    <center><h2><i class="fa fa-star" aria-hidden="true"></i>&nbsp;VALIDAR</h2></center><hr>
    <div class="container">
        <h3>Atracción: <?php echo $informacion[0]->Atraccion?></h3>
        <div>
            <input id="TiempoMAX" type="hidden" value='<?php echo $informacion[0]->TiempoMAX ?>'>
            <input id="Creditos" type="hidden" value='<?php echo $informacion[0]->Creditos?>'>
            <input id="CapacidadMA" type="hidden" value='<?php echo $informacion[0]->CapacidadMAX?>'>
            <input id="CapacidadMi" type="hidden" value='<?php echo $informacion[0]->CapacidadMIN?>'>
            <input id="Tiempo" type="hidden" value='<?php echo $informacion[0]->Tiempo?>'>
            <input id="idAperturaValidador" type="hidden" value='<?php echo $informacion[0]->idAperturaValidador?>'>
            <input id="idAtraccionEvento" type="hidden" value='<?php echo $informacion[0]->idAtraccionEvento?>'>
        </div>
            <!-- onload function is evoke when page is load -->
        <!--countdown function is called when page is loaded -->
        <body>
            <div id="tiempos" style="font-size: 20px;">
                Tiempo de Espera:
            </div>
            <div style="font-size: 20px;">
                <input id="minutes" type="text" style="width: 30px; border: none; font-size: 20px; font-weight: bold; color: black;">minutos<font size="5"> :</font>
                <input id="seconds" type="text" style="width: 30px; border: none; font-size: 20px; font-weight: bold; color: black;">segundos
            </div>
            <button id="tiempoExtra" type="button" class="btn btn-warning my_button" value="2">Tiempo Extra</button>
            <hr>
            <div class="input-group mb-3">
                <h5>Tarjeta:&nbsp;</h5>
                    <div class="input-group-append">
                        <input autofocus type="text" class="form-control" name="tarjetaVal" id="tarjetaVal">&nbsp;
                    </div>
                    <button type="button" class="btn btn-success" id="validarTarjeta">Validar</button>               
            </div>
                 
            <div id="respuesta" class="alert alert-primary" role="alert" style="display: none;">
                
            </div>
       
    </div>
    <div>
        <button id="cerrarSesion" class="btn btn-danger" style="float:left;">Cerrar Turno</button>
    </div>
    <div>
        <button id="iniciarCiclo" class="btn btn-success" style="float:right">Iniciar Ciclo</button>
    </div>
</fieldset>
<script src="JS/validar.js">
</script>
<script src="JS/carga.js"></script>
<script>
    $(document).ready(function(){
        $('#validar').click(function(){
            $('.alert').show()
        })
        
        $().clone().append
    });
</script>