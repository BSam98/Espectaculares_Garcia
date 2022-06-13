<?php 
if((!isset($_SESSION['Usuario']))  || (!isset($_SESSION['idUsuario']))){
    header('Location: http://localhost/Espectaculares_Garcia/public/');
    exit();
}else{
?>
<fieldset id="fieldset" data-aos-anchor-placement="top-bottom" data-ais-duration="1000" style="color:black;">
    <center><h2><i class="fa fa-star" aria-hidden="true"></i>&nbsp;REPORTE DE ATRACCIONES</h2></center><hr>
    <form enctype="multipart/form-data">
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
            <table id="tabla_Atracciones_Supervisar" class="table table-bordered">
                <thead>
                    <tr>
                        <!--th><center>Evento</center></th-->
                        <th scope="col" style="text-align: center; vertical-align: middle;">Validador</th>
                        <th scope="col" style="text-align: center; vertical-align: middle;">Atracción</th>
                        <th scope="col" style="text-align: center; vertical-align: middle;">Ciclos</th>
                        <th scope="col" style="text-align: center; vertical-align: middle;">Créditos</th>
                        <th scope="col" style="text-align: center; vertical-align: middle;">Cortesias</th>
                        <th scope="col" style="text-align: center; vertical-align: middle;">Pases Normales</th>
                        <th scope="col" style="text-align: center; vertical-align: middle;">Pases de Cortesias</th>
                        <th scope="col" style="text-align: center; vertical-align: middle;">Pases Mixtos</th>
                        <th scope="col" style="text-align: center; vertical-align: middle;">Pases con Descuentos</th>
                        <th scope="col" style="text-align: center; vertical-align: middle;">Pases con Pulseras Magicas</th>
                        <th scope="col" style="text-align: center; vertical-align: middle;">Pases de Juego Gratis</th>
                        <th scope="col" style="text-align: center; vertical-align: middle;">Total de Pases</th>
                        <th scope="col" style="text-align: center; vertical-align: middle;">Detalles</th>
                    </tr>
                </thead>
                <tbody id ="supervisarAtracciones">
                </tbody>
            </table>
        </div>
    </form>
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
                                    <th scope="col" style="text-align: center; vertical-align: middle;"><center>Personas</center></th>
                                    <th scope="col" style="text-align: center; vertical-align: middle;"><center>Creditos</center></th>
                                    <th scope="col" style="text-align: center; vertical-align: middle;"><center>Cortesias</center></th>
                                    <th scope="col" style="text-align: center; vertical-align: middle;"><center>Pase Normal</center></th>
                                    <th scope="col" style="text-align: center; vertical-align: middle;"><center>Pase de Cortesia</center></th>
                                    <th scope="col" style="text-align: center; vertical-align: middle;"><center>Pase Mixto</center></th>
                                    <th scope="col" style="text-align: center; vertical-align: middle;"><center>Pase con Descuento</center></th>
                                    <th scope="col" style="text-align: center; vertical-align: middle;"><center>Pase con Pulsera Magica</center></th>
                                    <th scope="col" style="text-align: center; vertical-align: middle;"><center>Pase con Juego Gratis</center></th>
                                    <th scope="col" style="text-align: center; vertical-align: middle;"><center>Hora</center></th>
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