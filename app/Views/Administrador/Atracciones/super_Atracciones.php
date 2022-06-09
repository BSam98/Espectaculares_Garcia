<?php 
if((!isset($_SESSION['Usuario']))  || (!isset($_SESSION['idUsuario']))){
    header('Location: http://localhost/Espectaculares_Garcia/public/');
    exit();
}else{
?>
<fieldset id="fieldset" data-aos-anchor-placement="top-bottom" data-ais-duration="1000" style="color:black;">
    <center><h2><i class="fa fa-star" aria-hidden="true"></i>&nbsp;REPORTE DE ATRACCIONES</h2></center><hr>
    <div class="container">
        <div class="table table-responsive">
            <table>
                <tbody>
                    <tr>
                        <td>
                            <label><h5><i class="fa fa-search" aria-hidden="true"></i>Elige un Evento: </h5></label><br>
                            <select class="form-control" name="evento" id="evento" required>
                                <option>Elige un evento</option>
                                <?php foreach($Eventos as $key => $dE):?>
                                    <option value=<?= $dE->idEvento?>><?= $dE->Nombre ?></option>
                                <?php endforeach ?>
                            </select>
                        </td>
                        <td>
                            <form action="#" method="post" target="_blank">
                            <label><h5>Selecciona una Fecha</h5></label><br>
                                <input type="date" name="fechaesperada" id="fechaesperada"> 
                                <!--input type="submit" value="Enviar datos"--></p>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <hr>
        <div class="table table-striped table-responsive">
            <table id="tabla_Atracciones_Supervisar" class="tabla table-bordered">
                <thead>
                    <tr>
                        <!--th><center>Evento</center></th-->
                        <th><center>Validador</center></th>
                        <th><center>Atracción</center></th>
                        <th><center>Ciclos</center></th>
                        <th><center>Créditos</center></th>
                        <th><center>Cortesias</center></th>
                        <th><center>Descuentos</center></th>
                        <th><center>Pulseras Magicas</center></th>
                        <th><center>Juego Gratis</center></th>
                        <th><center>Pases</center></th>
                        <th>Detalles</th>
                    </tr>
                </thead>
                <tbody id ="supervisarAtracciones">
                </tbody>
            </table>
        </div>
    </div>
</fieldset>

<div class="modal fade" id="verDetalles" style="color:black;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <!--center><h5><i class="fa fa-window-restore" aria-hidden="true"></i>&nbsp;Reporte de Movimientos</h5></center-->
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" name="formularioAgregarTarjetasEvento" id="formularioAgregarTarjetasEvento">
                    <div class="table table-striped table-responsive" style="color: black;">
                        <center><h5><i class="fa fa-window-restore" aria-hidden="true"></i>&nbsp;Ciclos</h5></center>                        
                        <table id="tabla_Ciclo" class="table table-bordered">
                            <thead>
                                <tr>
                                    <!--th><center>Evento</center></th-->
                                    <th><center>Personas</center></th>
                                    <th><center>Creditos</center></th>
                                    <th><center>Cortesias</center></th>
                                    <th><center>Descuentos</center></th>
                                    <th><center>Pulseras Magicas</center></th>
                                    <th><center>Juegos Gratis</center></th>
                                    <th><center>Hora</center></th>
                                </tr>
                            </thead>
                            <tbody id="detalles_Ciclo">
                            </tbody>
                        </table>
                    </div>
                </form>                
            </div>                 
        </div>
    </div>
</div>

<script src="JS/supervisarAtracciones.js"></script>
<script src="JS/carga.js"></script>
<script>

    $(document).ready(function(){
        $("select.evento").change(function(){
            var selectedCountry = $(this).children("option:selected").val();
            alert("You have selected the country - " + selectedCountry);
        });
    });
</script>
<?php }?>