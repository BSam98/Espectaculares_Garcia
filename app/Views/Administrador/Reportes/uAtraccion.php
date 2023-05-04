<?php 
if((!isset($_SESSION['Usuario'])) || (!isset($_SESSION['idUsuario']))){
    header('Location: http://localhost/Espectaculares_Garcia/public/');
    exit();
}else{
?>
<fieldset id="fieldset" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" style="color:black;">
    <center><label><h2>&nbsp;Reporte Atracciones</h2></label></center><hr>
    
    <form enctype="multipart/form-data">
        <div class="table table-responsive">
            <table>
                <tbody>
                    <tr>
                        <td>
                            <label><h5><i class="fa fa-search" aria-hidden="true"></i>Elige un Evento: </h5></label><br>
                            <select class="form-control" name="evento" id="evento" required>
                                <option value="">Elige un Evento</option>
                                <?php foreach($Eventos as $key => $dE) : ?>
                                    <option value="<?= $dE->idEvento?>"><?= $dE->Nombre?></option>
                                <?php endforeach ?>
                            </select>
                        </td>
                        <td>
                            <form action="#" method="post" target="_blank">
                            <label><h5>Selecciona una Fecha: </h5></label><br>
                                <input type="date" name="fechaesperada" id="fechaesperada">
                                <!--input type="submit" value="Enviar datos"--></p>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <hr>
        <div>
        </div>
        <div class="table table-striped table-responsive contenedorTabla"><br>
            <table id="tabla_Reporte_Atraccion_Evento" class="table table-bordered">
                <thead>
                    <th scope="col" style="text-align: center; vertical-align: middle;">Atracción</th>
                    <th scope="col" style="text-align: center; vertical-align: middle;">Dinero</th>
                    <th scope="col" style="text-align: center; vertical-align: middle;">Entradas Normales</th>
                    <th scope="col" style="text-align: center; vertical-align: middle;">Entradas de Cortesia</th>
                    <th scope="col" style="text-align: center; vertical-align: middle;">Entradas Mixtas</th>
                    <th scope="col" style="text-align: center; vertical-align: middle;">Entradas Grátis</th>
                    <th scope="col" style="text-align: center; vertical-align: middle;">Entradas con Descuento</th>
                    <th scope="col" style="text-align: center; vertical-align: middle;">Entradas con Pulsera Mágica</th>
                    <th scope="col" style="text-align: center; vertical-align: middle;">Total de Entradas</th>
                    <th scope="col" style="text-align: center; vertical-align: middle;">Total de Ciclos</th>
                </thead>
                <tbody id="cuerpo_Reporte_Atraccion_Evento">
                </tbody>
            </table>
        </div>
    </form>
</fieldset><!--/Ventana de la atracción-->
<script src="JS/reporteAtraccion.js"></script>
<script src="JS/carga.js"></script>
<?php }?>