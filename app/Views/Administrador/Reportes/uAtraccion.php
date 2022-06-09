<?php 
if((!isset($_SESSION['Usuario'])) || (!isset($_SESSION['idUsuario']))){
    header('Location: http://localhost/Espectaculares_Garcia/public/');
    exit();
}else{
?>
<fieldset id="fieldset" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" style="color:black;">
    <center><label><h2>Utilizacion por Atracción</h2></label></center>
    
    <form enctype="multipart/form-data">
        <div class="form-group">
            <label>Seleccione el evento y fecha</label>
            <br>
            <select name="" id="evento">
                <option value="">Elige un Evento</option>
                <?php foreach($Eventos as $key => $dE) : ?>
                    <option value="<?= $dE->idEvento?>"><?= $dE->Nombre?></option>
                <?php endforeach ?>
            </select>

            <input type="date" name="fechaesperada" id="fechaesperada"> 
        </div>
        <div>
        </div>
        <div class="table table-striped table-responsive contenedorTabla"><br>
            <table id="example" class="table table-bordered">
                <thead>
                    <th style="vertical-align: middle;">Atracción</th>
                    <th style="vertical-align: middle;">Entradas por Pulsera Mágica</th>
                    <th style="vertical-align: middle;">Entradas por Descuento</th>
                    <th style="vertical-align: middle;">Entradas Grátis</th>
                    <th style="vertical-align: middle;">Entradas Normales</th>
                    <th style="vertical-align: middle;">Entradas Mixta</th>
                    <th style="vertical-align: middle;">Fecha</th>  
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </form>
</fieldset><!--/Ventana de la atracción-->
<script src="JS/reporteAtraccion.js"></script>
<?php }?>