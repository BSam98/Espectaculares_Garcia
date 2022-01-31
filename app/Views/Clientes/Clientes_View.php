<!DOCTYPE html>
<html lang = "es">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content = "ie=edge"/>
        <title>Clientes</title>
        
        <link href="CSS/cabecera_style.css" rel="stylesheet" type="text/css">
        <link href = "CSS/clientes_style.css" rel = "stylesheet" type="text/css">
        
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
                                    <li><a href="atracciones.html">Atracciones</a></li>
                                    <li><a href="asociados.html">Asociados</a></li>
                                    <li><a href="eventos.html">Eventos</a></li>
                                    <li><a href="usuarios.html">Usuarios</a></li>
                                    <li><a href="promociones.html">Promociones</a></li>
                                    <li><a href="tarjetas.html">Tarjetas</a></li>
                                    <li><a href="clientes.html">Clientes</a></li>
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
                
                <legend>Clientes</legend>

                <input type="search" name="buscarCliente" placeholder="Buscar Cliente">

                <input type="submit" value="Buscar">

                
                <button onClick="">Nuevo Cliente</button>

                <div class="contenedorTabla">
                    
                    <!--Tabla-->
                    <table style ='table-layout:fixed; '>

                        <thead>
                            <!--Titulos de la tabla-->
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido paterno</th>
                                <th>Apellido materno</th>
                                <th>Correo electronico</th>
                                <th>Contraseña</th>
                                <th>Telefono</th>
                                <th>Ciudad</th>
                                <th>Estado</th>
                                <th>Fecha de nacimiento</th>
                                <th>Tarjetas asociadas</th>
                                <th>Historial</th>
                            </tr>
                            <!--/Titutlos de la tabla-->

                            <tbody>
                            </tbody>

                        </thead>

                    </table>
                    <!--/Tabla-->

                </div>
            
            </fieldset>
         

        </div>
        <!--/Contenedor Principal-->

    </body>
    <!--/Cuerpo-->

</html>