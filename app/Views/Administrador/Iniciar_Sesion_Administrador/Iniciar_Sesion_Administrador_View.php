<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset = "UTF-8"/>
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content = "ie=edge"/>
        <title>Inicio de Sesion</title>
        <link href="CSS/inicio_sesion_style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="../bootstrap/bootstrap.min.css" crossorigin="anonymous">
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
        <link href="CSS/inicio_sesion_style.css" rel="stylesheet" type="text/css">
    </head>
    <body class="body">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-md-6 col-sm-6">
                    <form id="formAdmin" class="form-horizontal">
                        <center><img src="./Img/logo.png" class="logo" alt="logo"></center><br>
                            <div class="form-group col-sm-4 col-md-8 col-lg-12">
                                <label class="Usuario" for="Usuario">USUARIO</label>
                                <input class="inputUsario form-control" type="text" name="usuario" id="usuario" required placeholder="Usuario">
                            </div>
                            <div class="form-group col-sm-4 col-md-8 col-lg-12">
                                <label class="Contraseña" for="Contraseña">CONTRASEÑA</label>
                                <input class="form-control" type="password" required name="pass" placeholder="Contraseña">
                                <!-- pattern="[A-Za-z_-0-9]{1,20}"-->
                                <br>
                                <p id="sevive"># SE VIVE ESPECTACULAR</p>
                            </div>
                            <br><br>
                            <!--button class="btn btn-success botac" onClick="window.location.href='Menu_Principal_Administrador'" href='menu_Principal.html'>Acceder</button-->
                            <button class="btn btn-success" type="button" name="registrar" id="registrar">Iniciar Sesion</button>
                    </form>
                </div>
                <div class="col-xl-6 col-md-6 col-sm-6" id="textoTitulo">SISTEMA INTEGRAL DE ACCESO</div>
            </div>
        </div>
    </body>
</html>

<script>
    $(document).on('click','#registrar', function(){
     // alert($("#formularioLogin").serialize());
       $.ajax({
            type: "POST",
            url: "busqueda",
            dataType: 'JSON',
            data: $("#formAdmin").serialize(),
            success: function(data){ 
                console.log('soy data'+data.idUsuario);
                if(data.resultado == true){
                    location.href="TipoUsuario?idT="+data.idRango;              
                }else{
                    alert(data.msg);
                }
            }
        });
    });
</script>