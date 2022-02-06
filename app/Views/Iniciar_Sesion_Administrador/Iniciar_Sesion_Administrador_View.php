<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset = "UTF-8"/>
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content = "ie=edge"/>
        <title>Inicio de Sesion</title>

        <!--Asi se asocian los estilos con html-->
        <link href="CSS/inicio_sesion_style.css" rel="stylesheet" type="text/css">


        <!--<link rel = "stylesheet" type = "text/css" href = "<?= base_url()?> /CSS/inicio_sesion_style.css">-->

</head>
<body >
        <!--Contenedor de toda la pagina-->
        <div class="contenedorPrincipal">

            <!--Contenedor Logo-->
            <div class="contenedorLogo">
                <header class="logo">
                    
                    <img src= "Img/logo.png" alt = "logo" width = "200px">
                </header>

                <form action= 'busqueda' method="post">
                    <!--Contenedor Usuario-->
                    <div class="contenedorUsuario">
                        
                        <label Class="Usuarios" for="Usuario">
                            USUARIO
                        </label>
                        <br>
                        <input Class ="inputUsario" typed = "text" id="Usuario" name="Usuario" size = "55px">
                        
                    </div>
                    <!--/Contenedor Usuario-->

                    <br>
                    
                    <!--Contenedor Contraseña-->
                    <div Class="contenedorContraseña">

                        <label class="Contraseña" for = "Contraseña">
                            CONTRASEÑA
                        </label>

                        <br>
                        
                        <input type = "password" id="Contraseña" name = "Contraseña" size ="55px">

                    </div>
                    <!--/Contenedor Contraseña-->
                    
                    <input type = "submit" value="Acceder">
                </form>
                
                <br>

                <!--Contenedor imagen hashtag-->
                <div class="contenedorHashtag">
                    <!--<img src="../../Img/hashtag.png" alt="hashtag" width="350px">-->

                    <img src = "Img/hashtag.png" alt = "hashtag" width ="350px">
                </div>
                <!--/Contenedor imagen hashtag-->

                <br>
                
                <!--Esto es de JavaScript-->
                <!--<button onClick="window.location.href='Menu_Principal_Administrador'">Acceder</button>-->                   
            
            </div>
            <!--/Contenedor Logo-->

            <div class ="primerTitutlo">
                
                <h1 class="textoTitulo">
                    SISTEMA INTEGRAL DE ACCESO
                </h1>
            </div>

            <br>
            <!--/contenedorPrincipal-->      
        </div>
    </body>
</html>