<!DOCTYPE html>
<html lang = "es">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content = "ie=edge"/>
        <title>Promociones</title>
        
        <link href="CSS/cabecera_style.css" rel="stylesheet" type="text/css">
        <link href = "CSS/promociones_style.css" rel = "stylesheet" type="text/css">
        
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
                
                <legend>Dos x Uno</legend>

                <input type="search" name="buscarDosxUno" placeholder="Buscar Promocíon Dos x Uno">

                <input type="submit" value="Buscar">

                
                <button onClick="">Agregar</button>

                <div class="contenedorTabla">
                    
                    <!--Tabla-->
                    <table style ='table-layout:fixed; '>

                        <thead>
                            <!--Titulos de la tabla-->
                            <tr>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Calendario</th>
                                <th>Evento</th>
                            </tr>
                            <!--/Titutlos de la tabla-->

                            <tbody>
                            </tbody>

                        </thead>

                    </table>
                    <!--/Tabla-->

                </div>
            
            </fieldset>

            <fieldset>
                
                <legend>Pulsera Magica</legend>

                <input type="search" name="buscarPulseraMagica" placeholder="Buscar Promocíon Pulsera Magica">

                <input type="submit" value="Buscar">

                
                <button onClick="">Agregar</button>

                <div class="contenedorTabla">
                    
                    <!--Tabla-->
                    <table style ='table-layout:fixed; '>

                        <thead>
                            <!--Titulos de la tabla-->
                            <tr>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Calendario</th>
                                <th>Evento</th>
                            </tr>
                            <!--/Titutlos de la tabla-->

                            <tbody>
                            </tbody>

                        </thead>

                    </table>
                    <!--/Tabla-->

                </div>
            
            </fieldset>

            <fieldset>
                
                <legend>Juegos Gratis</legend>

                <input type="search" name="buscarJuegosGratis" placeholder="Buscar Promocíon Juegos Gratis">

                <input type="submit" value="Buscar">

                
                <button onClick="">Agregar</button>

                <div class="contenedorTabla">
                    
                    <!--Tabla-->
                    <table style ='table-layout:fixed; '>

                        <thead>
                            <!--Titulos de la tabla-->
                            <tr>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Calendario</th>
                                <th>Evento</th>

                            </tr>
                            <!--/Titutlos de la tabla-->

                            <tbody>
                            </tbody>

                        </thead>

                    </table>
                    <!--/Tabla-->

                </div>
            
            </fieldset>

            <fieldset>
                
                <legend>Creditos de Cortesía</legend>

                <input type="search" name="buscarAtraccion" placeholder="Buscar Atracción">

                <input type="submit" value="Buscar">

                
                <button onClick="">Agregar</button>

                <div class="contenedorTabla">
                    
                    <!--Tabla-->
                    <table style ='table-layout:fixed; '>

                        <thead>
                            <!--Titulos de la tabla-->
                            <tr>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Creditos</th>
                                <th>Eventos</th>

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