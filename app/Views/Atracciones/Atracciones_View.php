<!DOCTYPE html>
<html lang = "es">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content = "ie=edge"/>
        <title>Atracciones</title>
        

        <link href="CSS/cabecera_style.css" rel="stylesheet" type="text/css">
        <link href = "CSS/atracciones_style.css" rel = "stylesheet" type="text/css">
        
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

            <!--Ventana de la atracción-->
            <fieldset>
                
                <legend>Atracciones</legend>

                <input type="search" name="buscarAtraccion" placeholder="Buscar Atracción">

                <input type="submit" value="Buscar">

                <button>Nueva Atraccion</button>
                <button id="abrir">Nuevo Propietario</button>

                <div class="contenedorTabla">
                    
                    <!--Tabla-->
                    <table style ='table-layout:fixed; '>

                        <thead>
                            <!--Titulos de la tabla-->
                            <tr>
                                <th></th>
                                <th>Nombre</th>
                                <th>Area</th>
                                <th>Propietario</th>
                                <th>Capacidad maxima</th>
                                <th>Capacidad minima</th>
                                <th>Duración por ciclo</th>
                                <th>Tiempo de espera</th>
                            </tr>
                            <!--/Titutlos de la tabla-->
                        </thead>
                        <tbody>
                            <?php foreach ($Atraccion as $key => $dA) : ?>
                                <tr>
                                    <td><button>Editar</button></td>
                                    <td><?= $dA->Atraccion ?></td>
                                    <td><?= $dA->Area?></td>
                                    <td><?= $dA->Nombre?></td>
                                    <td><?= $dA->CapacidadMAX?></td>
                                    <td><?= $dA->CapacidadMIN?></td>
                                    <td><?= $dA->Tiempo?></td>
                                    <td><?= $dA->TiempoMAX?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>

                    </table>
                    <!--/Tabla-->

                </div>
            
            </fieldset>
            <!--/Ventana de la atracción-->

            
            <!--Contenedor del propietario-->
            <div class = "contenedorOculto" id = "contenedorOculto">
                
                <div class="contenedorTablaPropietario" id = "contenedorTablaPropietario">
                    
                    <a href ="#" id="btn-cerrar-popup" class ="btn-cerrar-popup"></a>


                    <!--Ventana del propietario-->
                    <fieldset>
                
                        <legend>Agregar Propietario</legend>
        
                        <input type="search" name="buscarPropietario" placeholder="Buscar Atracción">
        
                        <input type="submit" value="Buscar">
        
                        <button onClick="">Agregar</button>
                        
        
                        <div class="contenedorTabla1">
                            
                            <!--Tabla-->
                            <table style ='table-layout:fixed; '>
        
                                <thead>
                                    <!--Titulos de la tabla-->
                                    <tr>
                                        <th></th>
                                        <th>Nombre</th>
                                        <th>Apellido Paterno</th>
                                        <th>Apellido Materno</th>
                                        <th>Direccion</th>
                                        <th>Telefono</th>
                                        <th>Fecha de Nacimiento</th>
                                    </tr>
                                    <!--/Titutlos de la tabla-->

                                </thead>

                                <tbody>
                                    <?php foreach ($Propietario as $key => $dP) : ?>
                                        <tr>
                                            <td><button>Editar</button></td>
                                            <td><?= $dP->Nombre ?></td>
                                            <td><?= $dP->ApellidoP?></td>
                                            <td><?= $dP->ApellidoM?></td>
                                            <td><?= $dP->Direccion?></td>
                                            <td><?= $dP->Telefono?></td>
                                            <td><?= $dP->FechaNacimiento?></td>
                                        </tr>
                                    <?php endforeach ?>                                    
                                </tbody>
                            </table>
                            <!--/Tabla-->
                            <button id="cerrar">Guardar</button>
        
                        </div>
                    
                    </fieldset> 
                    <!--/Ventana del propietario-->                   

                </div>
            </div>
            <!--/Contenedor del propietario-->

        </div>
        <!--/Contenedor Principal-->

        <script src="JS/atracciones.js"></script>
    </body>
    <!--/Cuerpo-->

</html>