<!DOCTYPE html>
<html lang = "es">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content = "ie=edge"/>
        <title>Tarjetas</title>
        
        <link href="CSS/cabecera_style.css" rel="stylesheet" type="text/css">
        <link href = "CSS/tarjetas_style.css" rel = "stylesheet" type="text/css">
        
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
                
                <legend>Tarjetas</legend>

                <input type="search" name="buscarTarjeta" placeholder="Buscar Tarjeta">

                <input type="submit" value="Buscar">

                <button onClick="">Agregar Tarjeta</button>
                <button id = "abrir">Agregar Nuevo Lote</button>

                <div class="contenedorTabla">
                    
                    <!--Tabla-->
                    <table style ='table-layout:fixed; '>

                        <thead>
                            <!--Titulos de la tabla-->
                            <tr>
                                <th></th>
                                <th>Nombre</th>
                                <th>Codigo QR</th>
                                <th>Folio</th>
                                <th>Fecha de Activacíon</th>
                                <th>Status</th>
                                <th>Tipo</th>
                                <th>Cliente</th>
                                <th>Lote</th>
                                <th>Evento</th>
                            </tr>
                            <!--/Titutlos de la tabla-->

                        </thead>
                        
                        <tbody>
                            <?php foreach ($Tarjeta as $key => $dT) : ?>
                                <tr>
                                    <td><button>Editar</button></td>
                                    <td><?= $dT->Tarjeta ?></td>
                                    <td><?= $dT->QR ?></td>
                                    <td><?= $dT->Folio ?></td>
                                    <td><?= $dT->FechaActivacion ?></td>
                                    <td><?= $dT->Status ?></td>
                                    <td><?= $dT->Tipo ?></td>
                                    <td><?= $dT->Cliente ?></td>
                                    <td><?= $dT->Lote ?></td>
                                    <td><?= $dT->Ciudad ?></td>
                                </tr>
                            <?php endforeach ?>                            
                        </tbody>

                    </table>
                    <!--/Tabla-->

                </div>
            
            </fieldset>
            
            <!--Contenedor del Lote-->
            <div class = "contenedorOculto" id = "contenedorOculto">
                
                <div class="contenedorTablaLote" id = "contenedorTablaLote">
                    
                    <a href ="#" id="btn-cerrar-popup" class ="btn-cerrar-popup"></a>


                    <!--Ventana del propietario-->
                    <fieldset>
                
                        <legend>Agregar Propietario</legend>
        
                        <input type="search" name="buscarLote" placeholder="Buscar Lote">
        
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
                                        <th>Material</th>
                                        <th>Cantidad</th>
                                        <th>Serie</th>
                                        <th>Folio Inicial</th>
                                        <th>FolioFinal</th>      
                                        <th>Usuario</th>                                  
                                        <th>Fecha de Ingreso</th>
                                    </tr>
                                    <!--/Titutlos de la tabla-->
        
                                </thead>

                                <tbody>
                                <?php foreach ($Lote as $key => $dL) : ?>
                                    <tr>
                                        <td><button>Editar</button></td>
                                        <td><?= $dL->Nombre?></td>
                                        <td><?= $dL->Material?></td>
                                        <td><?= $dL->Cantidad?></td>
                                        <td><?= $dL->Serie?></td>
                                        <td><?= $dL->FolioInicial?></td>
                                        <td><?= $dL->FolioFinal?></td>
                                        <td><?= $dL->Usuario?></td>
                                        <td><?= $dL->FechaIngreso?></td>
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
        <script src="JS/tarjetas.js"></script>

    </body>
    <!--/Cuerpo-->

</html>