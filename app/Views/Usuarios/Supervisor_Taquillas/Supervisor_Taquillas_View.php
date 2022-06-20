<?php 
if((!isset($_SESSION['Usuario'])) || (!isset($_SESSION['idUsuario']))) {
    header('Location: http://localhost/Espectaculares_Garcia/public/');
    exit();
}else{
?>

<!DOCTYPE html>
<html lang = "es">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content = "ie=edge"/>
        <title>Espectaculares García</title>
        <link href="CSS/cabecera_style.css" rel="stylesheet" type="text/css">
        <!--link href = "CSS/eventos_style.css" rel = "stylesheet" type="text/css"-->

        <link rel="stylesheet" href="../bootstrap/bootstrap.min.css" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <script src="../bootstrap/jquery.min.js"></script>
        <script src="../bootstrap/jquery.slim.min.js" crossorigin="anonymous"></script>
        <script src="../bootstrap/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="../bootstrap/jquery.dataTables.min.css"> 
        <link rel="stylesheet" href="../bootstrap/buttons.dataTables.min.css"> 
        <script src="../bootstrap/jquery-3.5.1.js"></script>
        <script src="../bootstrap/jquery.dataTables.min.js"></script>
        <script src="../bootstrap/dataTables.buttons.min.js"></script>
        <script src="../bootstrap/jszip.min.js"></script>
        <script src="../bootstrap/pdfmake.min.js"></script>
        <script src="../bootstrap/vfs_fonts.js"></script>
        <script src="../bootstrap/buttons.html5.min.js"></script>
        <script src="../bootstrap/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../bootstrap/bootstrap-icons.css">
        <link rel="stylesheet" href="../bootstrap/aos.css" />
        <script src="../bootstrap/aos.js"></script>
        <script src="../bootstrap/sweetalert.min.js"></script>
        <script src="../bootstrap/jquery.easing.min.js"></script>
        <!--link href="../bootstrap/sb-admin-2.min.css" rel="stylesheet"-->
        <script src="../bootstrap/moment-with-locales.min.js"></script>
        <script src="../bootstrap/jquery.loadingModal.js"></script>
        <link rel="stylesheet" href="../bootstrap/jquery.loadingModal.css">
        <!--link href="CSS/inicio_sesion_style.css" rel="stylesheet" type="text/css"-->
        <script src="JS/menu.js"></script>
    </head>
    <body style="background-image: url('./Img/mainbg.png'); background-repeat:repeat;">
        <nav class="navbar navbar-fixed-top tm_navbar negro" role="navigation">
            <a href="Menu_Principal_User"><img src = "Img/logo.png" style="width: 70px; height:7   0px;"/></a>
                <ul class="nav navbar-nav sf-menu">
                <li class="dropdown">
                    <a class="navbar-brand" href="#"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;<?php echo $_SESSION['Usuario']?></a>
                        <ul class="dropdown-submenu" id="subMenuCatalago">
                            <li><a href="CerrarSesion" id="button"><span>Salir</span></a></a></li>
                        </ul>
                </li>
            </ul>
        </nav>
        <fieldset id="fieldset" data-aos-anchor-placement="top-bottom" data-ais-duration="1000" style="color:black;">
        
            <div id="contenedor_Ventanillas">
                <input type="hidden" id="idEvento" value="<?php echo $_SESSION['idEvento'] ?>">
                <center><h2><i class="fa fa-university" aria-hidden="true"></i>SUPERVISAR VENTANILLAS</h2></center>
                <hr>
                <br>
                <div class="container-fluid">
                    <label><h5><i class="fa fa-search" aria-hidden="true"></i>Seleccione una fecha: </h5></label><br>
                    <input type="date" name="fechaesperada" id="fechaesperada">
                </div>
                <div class="table table-striped table-responsive">
                    <table id="tabla_Ventanillas" class="table table-border">
                        <br>
                        <thead>
                            <tr>
                                <th colspan="7"><center>Ventanillas</center></th>
                            </tr>
                            <tr>
                                <th scope="col" style="text-align: center; vertical-align:middle;">Status</th>
                                <th scope="col" style="text-align: center; vertical-align:middle;">Ventanilla</th>
                                <th scope="col" style="text-align: center; vertical-align:middle;">Taquillero</th>
                                <th scope="col" style="text-align: center; vertical-align:middle;">Efectivo</th>
                                <th scope="col" style="text-align: center; vertical-align:middle;">Tarjeta</th>
                                <th scope="col" style="text-align: center; vertical-align:middle;">Hora de Apertura</th>
                                <th scope="col" style="text-align: center; vertical-align:middle;">Opciones</th>
                            </tr>
                        </thead>
                        <tbody id="body_Ventanillas">
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="validaro_Cierre">
            </div>

        </fieldset>
    </body>
</html>
<script src="JS/carga.js"></script>
<script src="JS/supervisarTaquillas.js"></script>
<?php }?>