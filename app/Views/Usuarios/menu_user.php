<?php 
if((!isset($_SESSION['Usuario'])) || (!isset($_SESSION['idUsuario']))) {
    header('Location: http://localhost/Espectaculares_Garcia/public/');
    exit();
}else{
?>
    <div class="container">
        <?php if($_SESSION['idRango'] == '5' ){ ?><script>location.href="turno?t="+<?php echo $_SESSION['idUsuario']?>;</script><?php }?>
        <?php if($_SESSION['idRango'] == '7' ){ ?><script>location.href="Supervisar_Taquillas?t="+<?php echo $_SESSION['idUsuario']?>;</script><?php }?>
        <?php if($_SESSION['idRango'] == '8' ){ ?><script>location.href="turnoValidador?t="+<?php echo $_SESSION['idUsuario']?>;</script><?php } ?>
        <?php if($_SESSION['idRango'] == '9' ){ ?><script>location.href="sAtracciones?t="+<?php echo $_SESSION['idUsuario']?>;</script><?php }?>
        <nav class="navbar navbar-fixed-top tm_navbar negro" role="navigation">
            <a href="Menu_Principal_User"><img src = "Img/logo.png" style="width: 70px; height:70px;"/></a>
            <ul class="nav navbar-nav sf-menu">
            
                <!--li class="dropdown">
                    <a href="Menu_Principal_User" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-home" aria-hidden="true"></i>Punto de Venta</a>
                </li>
                <li class="dropdown">
                    <a href="ReporteVenta" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-signal" aria-hidden="true"></i>&nbsp;Reporte de Venta</a>
                </li>
                <li><a href=""><i class="fa fa-male" aria-hidden="true"></i>&nbsp;Supervisor</a>
                    <ul class="dropdown-submenu" id="subMenuCatalago">
                        <li><a href="" id="button"><span>Llamar al Supervisor</span></a></li>
                        <li><a href="supervisarAtraccion" id="button"><span>Supervisor Validador</span></a></li>
                    </ul>
                </li>
                <li--><!--a href=""><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Asistencia</a>
                </li-->
                <li class="dropdown">
                    <a class="navbar-brand" href="#"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;<?php echo $_SESSION['Usuario']?></a>
                        <ul class="dropdown-submenu" id="subMenuCatalago">
                            <li><a href="CerrarSesion" id="button"><span>Salir</span></a></a></li>
                        </ul>
                </li>
            </ul>
        </nav>
    </div>
<?php }?>