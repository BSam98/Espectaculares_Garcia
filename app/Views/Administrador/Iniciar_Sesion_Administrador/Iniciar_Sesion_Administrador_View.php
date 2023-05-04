<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset = "UTF-8"/>
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content = "ie=edge"/>
        <title>Inicio de Sesion</title>
        <link href="CSS/inicio_sesion_style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="../bootstrap/bootstrap.min.css" crossorigin="anonymous">
      
        <!--<link rel = "stylesheet" type = "text/css" href = "<?= base_url()?> /CSS/inicio_sesion_style.css">-->

    </head>
    <body class="body">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-md-6 col-sm-6">
                    <form method="POST" action="busqueda" class="form-horizontal">
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
                            <button class="btn btn-success botac" type="submit" name="register" value="register">Iniciar Sesion</button>
                    </form>
                </div>
                <div class="col-xl-6 col-md-6 col-sm-6" id="textoTitulo">SISTEMA INTEGRAL DE ACCESO</div>
            </div>
        </div>
    </body>
</html>