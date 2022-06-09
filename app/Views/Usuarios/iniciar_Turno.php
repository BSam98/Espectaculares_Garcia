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
    <body style="background-image: url('./Img/mainbg.png'); background-repeat:repeat;" onload="mueveReloj()">
    <section style="overflow: hidden;" id="menuUser" >
        <div class="row">
            <div class="card-wrapper col-sm-12 col-md-6 col-lg-5" style="color:white;">
                <div class="container-fluid" style="margin: 25px 25px 25px 25px; text-align:center;">
                    <form name="form_reloj">
                        <input type="text" name="reloj" size="25" style="color:white; background : inherit; border:none; font-family : Arial; font-size : 14px; text-align:right;" onload="window.document.form_reloj.reloj.blur()">
                    </form>
                    <img src="./Img/logo.png" alt="image" style="height: 50%; width:60%;">
                </div>
            </div>
            <div class="card-wrapper col-sm-12 col-md-6 col-lg-4" style="color:white;">
                <div class="container-fluid" style="margin: 25px 25px 25px 25px; text-align:center;">
                    <form id="form1">
                        <center><h2>Bienvenido: <?php echo $_SESSION['Usuario'];?></h2></center>
                        <label class="reloj" id="clockbox" value=""></label>
                        <input type="hidden" name="fecha" id="fecha">
                        <input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $_SESSION['idUsuario']?>">
                        <div class="form-group">
                            <label>Evento</label>
                            <?php foreach($Eventos as $e):?>
                                <input type="hidden" name="eventoId" id="eventoId" value="<?php echo $e->idEvento?>">
                                <input type="text" name="evento" id="evento" value="<?php echo $e->Nombre?>" disabled>
                            <?php endforeach?>
                        </div>
                        <div class="form-group">
                            <label>Zona</label>
                            <select name="zona" id="zona" class="form-control"></select>
                        </div>
                        <div class="form-group">
                            <label>Taquilla</label>
                            <select name="taquilla" id="taquilla" class="form-control"></select>
                        </div>
                        <div class="form-group">
                            <label>Ventanilla</label>
                            <select name="ventanilla" id="ventanilla" class="form-control"></select>
                        </div>
                        <div class="form-group">
                            <label for="">Tarjetas</label><br>
                            <div class="input-group">
                                <input type="text" name="folioi" id="folioi" class="form-control" required min="0" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" placeholder="Folio Inicial">
                                    <span class="input-group-addon">-</span>
                                <input type="text" name="foliof" id="foliof" class="form-control"  required min="0" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" placeholder="Folio Final">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Fondo de Caja</label>
                            <input type="number" class="form-control" name="fondo" id="fondo" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" min="1" placeholder="Ingresa la Cantidad">
                        </div>
                        <input type="button" id="botonenviar" value="Iniciar Sesión" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>    
    </section>
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

<script src="JS/iniciarTurno.js"></script>

<script>
    function mueveReloj(){
        var d = new Date();
        var month = d.getMonth()+1;
        var day = d.getDate();
        var output = d.getFullYear() + '-' +((''+month).length<2 ? '0' : '') + month + '-' +((''+day).length<2 ? '0' : '') + day;
        momentoActual = new Date()
        hora = momentoActual.getHours()
        minuto = momentoActual.getMinutes()
        segundo = momentoActual.getSeconds()
        str_segundo = new String (segundo)
        if (str_segundo.length == 1)
        segundo = "0" + segundo
        str_minuto = new String (minuto)
        if (str_minuto.length == 1)
        minuto = "0" + minuto
        str_hora = new String (hora)
        if (str_hora.length == 1)
        hora = "0" + hora
        horaImprimible = output+" "+ hora + ":" + minuto + ":" + segundo
        //console.log(output+" "+horaImprimible);
        document.form_reloj.reloj.value = horaImprimible
        setTimeout("mueveReloj()",1000);
        $('#fecha').val(horaImprimible);
    }
</script>
<?php }?>