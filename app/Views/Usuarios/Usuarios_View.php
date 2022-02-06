<!DOCTYPE html>
<html lang = "es">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content = "ie=edge"/>
        <title>Usuarios</title>
        
        <link href="CSS/cabecera_style.css" rel="stylesheet" type="text/css">
        <link href = "CSS/usuarios_style.css" rel = "stylesheet" type="text/css">
        
    </head>
    
    <!--Cuerpo-->
    <body>

        <!--Contenedor Principal-->
        <div Class = "contenedorPrincipal">

            <!--Contenedor Superior-->
            <div Class = "contenedorSuperior">
                
                <!--Cabecera-->
                <header Class = "cabecera">

                    <img src = "Img/logo.png" alt = "logo" width = "170px">
                    
                        <!--Menu-->
                        <ul Class = "nav">
                            
                            <!--Menu Catalago-->
                            <li>
                                <a href="Menu_Principal_Administrador" Size= "50px">Catalago</a>
                                
                                <!--Sub menu de Catalago-->
                                <ul id="subMenuCatalago">
                                    <li><a href="Atracciones">Atracciones</a></li>
                                    <li><a href="Asociados">Asociados</a></li>
                                    <li><a href="Eventos">Eventos</a></li>
                                    <li><a href="Usuarios">Usuarios</a></li>
                                    <li><a href="Promociones">Promociones</a></li>
                                    <li><a href="Tarjetas">Tarjetas</a></li>
                                    <li><a href="Clientes">Clientes</a></li>
                                </ul>
                                
                            </li>
                            
                            <!--Menu Reportes-->
                            <li>
                                <a href="">Reportes</a>
                                
                                <!--Sub menu de Reportes-->
                                <ul id = "subMenuReportes">
                                    <li><a href="ingreso_Evento.html">Ingresos por evento</a></li>
                                    <li><a href="registro_Evento.html">Utilización por evento</a></li>
                                    <li><a href="uso_Atraccion.html">Utilizacion por atracción</a></li>
                                </ul>

                            </li>

                            <!--Menu Taquilla-->
                            <li>
                                <a href="">Taquilla</a>
                            </li>
                            
                            <!--Menu Superivosr-->
                            <li>
                                <a href="">Supervisor</a>
                            </li>

                            <!--Menu Validacion-->
                            <li>
                                <a href="">Validacion</a>
                            </li>
                            
                            <!--Menu Seguridad-->
                            <li>
                                <a href="">Seguridad</a>
                            </li>

                        </ul>

                </header>
                <!--/Cabecera-->

            </div>
            <!--/Contenedor Superior-->

            <fieldset>
                
                <legend>Usuarios</legend>

                <input type="search" name="buscarUsuario" placeholder="Buscar Usuario">

                <input type="submit" value="Buscar">

                <button onClick="">Nuevo Usuario</button>

                <div class="contenedorTabla">
                    
                    <!--Tabla-->
                    <table style ='table-layout:fixed; '>

                        <thead>
                            <!--Titulos de la tabla-->
                            <tr>
                                <th></th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Correo electronico</th>
                                <th>NSS</th>
                                <th>CURP</th>
                                <th>Usuario</th>
                                <th>Contraseña</th>
                                <th>Rango</th>
                                <th>Evento</th>
                            </tr>
                            <!--/Titutlos de la tabla-->

                        </thead>

                        <tbody>
                            <?php foreach ($Usuario as $key => $dU) : ?>
                                    <tr>
                                        <td><button>Editar</button></td>
                                        <td><?= $dU->UsuarioNombre ?></td>
                                        <td><?= $dU->UsuarioApellido?></td>
                                        <td><?= $dU->CorreoE?></td>
                                        <td><?= $dU->NSS?></td>
                                        <td><?= $dU->CURP?></td>
                                        <td><?= $dU->Usuario?></td>
                                        <td><?= $dU->Contraseña?></td>
                                        <td><?= $dU->Nombre?></td>
                                        <td><?= $dU->Ciudad?></td>
                                    </tr>
                            <?php endforeach ?>
                        </tbody>

                    </table>
                    <!--/Tabla-->

                </div>
            
            </fieldset>            

        </div>
        <!--/Contenedor Principal-->

    </body>
    <!--/Cuerpo-->

</html>