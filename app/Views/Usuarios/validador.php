
<?php date_default_timezone_set("America/Mexico_City"); ?>
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
                            <li><button id="cerrarSesion" class="btn btn-danger"><span>Cerrar Turno</span></button></li>
                            <!--button id="cerrarSesion" class="btn btn-danger" style="float:left;">Cerrar Turno</!--button-->
                        </ul>
                </li>
            </ul>
    </nav>
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
            <!--body-->
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
            <button id="iniciarCiclo" class="btn btn-success" style="float:right">Iniciar Ciclo</button>
        </div>
    </fieldset>
    <script src="JS/validar.js"></script>
    <script src="JS/carga.js"></script>

    <script>
        $(document).ready(function(){
            $('#validar').click(function(){
                $('.alert').show()
            })
            
            $().clone().append
        });
    </script>
</body>
</html>
<?php }?>