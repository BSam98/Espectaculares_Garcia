<!DOCTYPE html>
<html lang = "es">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content = "ie=edge"/>
        <title>Tarjetas</title>
        
        <link href="CSS/cabecera_style.css" rel="stylesheet" type="text/css">
        <link href = "CSS/tarjetas_style.css" rel = "stylesheet" type="text/css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
         
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css"> 
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css"> 
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    </head>
    
    <!--Cuerpo-->
    <body>

        <!--Contenedor Principal-->
        <div Class = "contenedorPrincipal">

            <!--Contenedor Superior-->
            <div Class = "contenedorSuperior">
                
            <div class="container">
                <nav class="navbar navbar-default navbar-fixed-top tm_navbar negro" role="navigation">
                    <a class="logo" href=""><img src = "Img/logo.png"/></a>
                    <ul class="nav sf-menu">
                            
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
                </nav>
            </div>

            </div>
            <!--/Contenedor Superior-->

            <fieldset id="fieldset">
                
                <legend>Tarjetas</legend>

                <input type="search" name="buscarTarjeta" placeholder="Buscar Tarjeta">

                <input type="submit" value="Buscar">

                <button onClick="">Agregar Tarjeta</button>
                <button id = "abrir">Agregar Nuevo Lote</button>

                <div class="contenedorTabla">
                    
                    <!--Tabla-->
                    <table class="table table-bordered">

                        <thead>
                            <!--Titulos de la tabla-->
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
                            <!--/Titutlos de la tabla-->
                        </thead>
                            <tbody>
                            <?php foreach ($Tarjeta as $key => $dT) : ?>
                                <tr>
                                    <td><button>Editar</button></td>
                                    <td><?= $dT->Tarjeta ?></td>
                                    <td style="position:absolute; overflow-y:scroll; width:125px; height:53px"><?= $dT->QR ?></td>
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
                    <fieldset id="fieldset">
                
                        <legend>Agregar Propietario</legend>
        
                        <input type="search" name="buscarLote" placeholder="Buscar Lote">
        
                        <input type="submit" value="Buscar">
        
                        <button onClick="">Agregar</button>
                        
        
                        <div class="contenedorTabla1">
                            
                            <!--Tabla-->
                            <table class="table table-bordered">
        
                                <thead>
                                    <!--Titulos de la tabla-->
                                    <tr>
                                        <th></th>
                                        <th>Nombre</th>
                                        <th>Material</th>
                                        <th>Cantidad</th>
                                        <th>Fecha de Ingreso</th>
                                        <th>Folio Inicial</th>
                                        <th>FolioFinal</th>
                                    </tr>
                                    <!--/Titutlos de la tabla-->
        
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
        
                                </thead>
        
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