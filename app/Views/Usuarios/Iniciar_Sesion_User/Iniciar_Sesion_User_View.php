<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset = "UTF-8"/>
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content = "ie=edge"/>
        <title>Inicio de Sesion</title>

        <!--Asi se asocian los estilos con html-->
        <link href="CSS/inicio_sesion_style.css" rel="stylesheet" type="text/css">

        <!--original -->
        <!--link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"-->

        <link rel="stylesheet" href="../bootstrap/bootstrap.min.css" crossorigin="anonymous">
        <link rel="stylesheet" href="../bootstrap/fontawesome.min.css">
        <script src="../js/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>


        <!--<link rel = "stylesheet" type = "text/css" href = "<?= base_url()?> /CSS/inicio_sesion_style.css">-->

    </head>
    <body class="body">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-md-6 col-sm-6">
                    <form id="confirmarSesion" class="form-horizontal">
                        <center><img src="./Img/logo.png" class="logo" alt="logo"></center><br>
                            <div class="form-group col-sm-4 col-md-8 col-lg-12">
                                <label class="Usuario" for="Usuario">USUARIO</label>
                                <input class="inputUsario form-control" type="text" name="usuario" id="usuario" required placeholder="Usuario">
                            </div>
                            <div class="form-group col-sm-4 col-md-8 col-lg-12">
                                <label class="Contraseña" for="Contraseña">CONTRASEÑA</label>
                                <input class="form-control" type="password" required name="pass" name="pass" placeholder="Contraseña">
                                <!-- pattern="[A-Za-z_-0-9]{1,20}"-->
                                <br>
                                <p id="sevive"># SE VIVE ESPECTACULAR</p>
                            </div>
                            <br><br>
                            <!--button class="btn btn-success botac" type="submit" name="register" value="register">Iniciar Sesion</!--button-->
                            <input type="button" class="btn btn-success botac" id="enviarDat" value="Iniciar Sesion">
                    </form>
                </div>
                <div class="col-xl-6 col-md-6 col-sm-6" id="textoTitulo">PUNTO DE VENTA</div>
            </div>
        </div>
    </body>
</html>

<script>
    //"Busuarios" 
    $(document).on('click','#enviarDat', function(){
        alert($('#confirmarSesion').serialize());
        datos = $('#confirmarSesion').serialize()
        $.ajax({
            type: "POST",
            url: 'Busuarios',
            data: datos,
            dataType: 'JSON',
            success: function(data){
                if (data){//boletero
                    var rango = data.rango;
                    var user = data.user;
                    $.ajax({
                        type: "POST",
                        url: 'CheckRol',
                        data: {'rol':rango, 'user':user},
                        dataType: 'JSON',
                        success: function(data){
                            if (data.respuesta == true){//boletero
                                alert("Sesion iniciada correctamente");
                                location.href ="http://localhost/Espectaculares_Garcia/public/"+data.modulo+"?u="+data.us;
                                //window.location.reload();
                            }else{
                                alert("Usted tiene un turno abierto, favor de cerrar el turno anterior antes de continuar");
                                window.location.reload();
                            }
                        }
                    });
                }else{
                    alert("Por favor, intente nuevamente");
                    //window.location.reload();
                }
            }
        });
    });

</script>