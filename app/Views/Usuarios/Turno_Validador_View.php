<?php 
if((!isset($_SESSION['Usuario'])) || (!isset($_SESSION['Usuario']))) {
    header('Location: http://localhost/Espectaculares_Garcia/public/');
    exit();
}else{
?>
<?php date_default_timezone_set("America/Mexico_City"); ?>
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
<section style="overflow: hidden;" id="menuUser" onload="GetClock()">
    <div class="row">
        <div class="card-wrapper col-sm-12 col-md-6 col-lg-5" style="color:white;">
            <div class="container-fluid" style="margin: 25px 25px 25px 25px; text-align:center;">
                <img src="./Img/logo.png" alt="image" style="height: 50%; width:60%;">
            </div>
        </div>
        <div class="card-wrapper col-sm-12 col-md-6 col-lg-4" style="color:white;">
            <div class="container-fluid" style="margin: 25px 25px 25px 25px; text-align:center;">
                <form id="form1">
                    <!--center><h2>INICIAR TURNO</h2></!--center-->
                    <center><h2>Bienvenido: <?php echo $_SESSION['Usuario'];?></h2></center>
                    
                    
                    <label for="" class="reloj" id="clockbox" value=""></label>

                    <input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $_SESSION['idUsuario']?>">
                    <!--script src="https://momentjs.com/downloads/moment-with-locales.min.js"></!--script-->
                    <!--div class="nowDateTime" style="text-align: right;">
                        <p><span id="fecha"></span><span id="hora"></span></p>
                    </div-->
                    <div class="form-group">
                        <label for="">Evento</label>
                        <?php foreach($Eventos as $e):?>
                            <input type="hidden" name="eventoId" id="eventoId" value="<?php echo $e->idEvento?>">
                            <input type="text" name="evento" id="evento" value="<?php echo $e->Nombre?>" disabled>
                        <?php endforeach?>
                    </div>
                    <div class="form-group">
                        <label>Zona</label>
                        <select name="select_Zona" id="select_Zona" class="form-control">
                           
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Atraccion</label>
                        <select name="atraccion" id="atraccion" class="form-control">

                        </select>
                    </div>
                    <!--div class="form-group">
                        <label for="">Punto de Venta</label>
                        <select name="" id="" class="form-control">
                            <option value="">Nombre de la Taquilla</option>
                        </select>
                    </div-->
                    <input type="button" id="iniciar_Turno_Validador" value="Iniciar Sesión" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>    
</section>
<script src="JS/carga.js"></script>
<script src="JS/turnoValidador.js"></script>
</body>
</html>
<style>
    #menuUser{
        background-image:url(./Img/Evento.jpg);
        background-position: center center;
        background-size: cover;
        border-radius: 30px;
        background-repeat: no-repeat;
        margin: 20px;
    }
</style>
<?php }?>