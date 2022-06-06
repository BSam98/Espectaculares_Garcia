<?php 
if((!isset($_SESSION['Usuario'])) || (!isset($_SESSION['idUsuario']))){
    header('Location: http://localhost/Espectaculares_Garcia/public/');
    exit();
}else{
?>
<fieldset id="fieldset" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" style="color:black;">
    <center><label><h2>Utilizacion por Evento</h2></label></center>
        <div class="table table-striped table-responsive">
            <table>
                <thead>
                    <th style="vertical-align: middle;">Evento</th>
                    <th style="vertical-align: middle;">Cantidad</th>
                    <th style="vertical-align: middle;">Pulsera Mágica</th>
                    <th style="vertical-align: middle;">Dos x Uno</th>
                    <th style="vertical-align: middle;">Juegos Grátis</th>
                    <th style="vertical-align: middle;">Fecha</th>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
</fieldset><!--/Ventana de la atracción-->
<?php }?>