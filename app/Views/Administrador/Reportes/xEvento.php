<?php 
if((!isset($_SESSION['Usuario'])) || (!isset($_SESSION['idUsuario']))){
    header('Location: http://localhost/Espectaculares_Garcia/public/');
    exit();
}else{
?>
<fieldset id="fieldset" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" style="color:black;">
    <center><label><h2>Ingresos por Evento</h2></label></center>
        <div class="table table-responsive">
            <table>
                <thead>
                    <th style="vertical-align: middle;">Evento</th>
                    <th style="vertical-align: middle;">Efectivo</th>
                    <th style="vertical-align: middle;">Tarjetas</th>
                    <th style="vertical-align: middle;">Fecha</th>
                    <th style="vertical-align: middle;">Total</th>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
</fieldset><!--/Ventana de la atracción-->
<?php }?>