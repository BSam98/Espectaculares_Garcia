<?php 
if((!isset($_SESSION['Usuario'])) || (!isset($_SESSION['idUsuario']))){
    header('Location: http://localhost/Espectaculares_Garcia/public/');
    exit();
}else{
?>
<fieldset id="fieldset" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" style="color:black;">
    <center><label><h2>Utilizacion por Atracción</h2></label></center>
    <select name="" id="">
        <option value="">Elige un Evento</option>
        <option value=""></option>
    </select>
        <div class="contenedorTabla"><br>
            <table id="example" class="table table-striped table-responsive">
                <thead>
                    <th style="vertical-align: middle;">Atracción</th>
                    <th style="vertical-align: middle;">Entradas Normales</th>
                    <th style="vertical-align: middle;">Pulsera Mágica</th>
                    <th style="vertical-align: middle;">Dos x Uno</th>
                    <th style="vertical-align: middle;">Entrada Grátis</th>
                    <th style="vertical-align: middle;">Créditos de Cortesía</th>
                    <th style="vertical-align: middle;">Fecha</th>  
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
</fieldset><!--/Ventana de la atracción-->
<?php }?>