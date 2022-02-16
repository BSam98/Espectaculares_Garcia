<!DOCTYPE html>
<html lang = "es">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content = "ie=edge"/>
        <title>Atracciones</title>
        
        <link href="CSS/cabecera_style.css" rel="stylesheet" type="text/css">
        <link href = "CSS/atracciones_style.css" rel = "stylesheet" type="text/css">
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
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    </head>
    <body>
        <!--Contenedor Principal-->
        <div Class = "contenedorPrincipal" style="background-image: url('./Img/mainbg.png');">
            <!--Contenedor Superior-->
            
            <div Class = "contenedorSuperior">
                <div class="container">
                    <nav class="navbar navbar-fixed-top tm_navbar negro" role="navigation">
                        <a class="logo" href="Menu_Principal_Administrador"><img src = "Img/logo.png"/></a>
                        <ul class="nav navbar-nav sf-menu">
                            <!--li class="active"><a href="#">Home</a></li-->
                                <!--Menu Catalago-->
                                <li class="dropdown">
                                    <a href="Menu_Principal_Administrador" Size= "50px" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><!--i class="bi bi-stars"></i--><i class="bi bi-folder-fill"></i>&nbsp;Catalago</a>
                                        <ul class="dropdown-submenu" id="subMenuCatalago">
                                            <li><a href="Tarjetas" id="button"><span>Tarjetas</span></a></li>
                                            <li><a href="Atracciones" id="button"><span>Atracciones</span></a></li>
                                            <li><a href="Tarjetas" id="button"><span>Contratos</span></a></li>
                                            <li><a href="Eventos" id="button"><span>Eventos</span></a></li>
                                            <!--li><a href="Asociados">Asociados</a></li-->
                                            <li><a href="Usuarios" id="button"><span>Usuarios</span></a></li>
                                            <li><a href="Clientes" id="button"><span>Clientes</span></a></li>
                                            <li><a href="Promociones" id="button"><span>Promociones</span></a></li>
                                        </ul>  
                                </li>
                                <!--Menu Reportes-->
                                <li class="dropdown">
                                    <a href="" Size= "50px" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="bi bi-pencil-square"></i>&nbsp;Reportes</a>
                                    <!--Sub menu de Reportes-->
                                        <ul class="dropdown-submenu" id = "subMenuReportes">
                                            <li><a href="ingreso_Evento.html" id="button"><span>Ingresos por evento</span></a></li>
                                            <li><a href="registro_Evento.html" id="button">Utilización por evento</a></li>
                                            <li><a href="uso_Atraccion.html" id="button">Utilizacion por atracción</a></li>
                                        </ul>
                                </li>
                                <!--Menu Taquilla-->
                                <li><a href=""><i class="bi bi-shop-window"></i>&nbsp;Taquilla</a></li>
                                <!--Menu Superivosr-->
                                <li><a href=""><i class="bi bi-zoom-in"></i>&nbsp;Supervisor</a></li>
                                <!--Menu Validacion-->
                                <li><a href=""><i class="bi bi-hand-thumbs-up-fill"></i>&nbsp;Validacion</a></li>
                                <!--Menu Seguridad-->
                                <li><a href=""><i class="bi bi-file-lock2"></i>&nbsp;Seguridad</a></li>
                        </ul>
                    </nav>
                </div> 
            </div>
            
            <!--Contenedor Superior-->
            <fieldset id="fieldset" style="background-color: white;color:black;">

            <!--TABLA PRINCIPAL-->

                <!--Ventana de la atracción--> 
                <label><h1>Atracciones</h1></label>
                    <a href="" type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="bi bi-plus-circle"></i>&nbsp;Nueva Atracción</a>
                    <button class="btn btn-success" id="abrir"><i class="bi bi-plus-circle"></i>&nbsp;Nuevo Propietario</button><br>
                    <div class="contenedorTabla"><br>
                        <!--Tabla-->
                        <table id="example" class="table table-bordered border-primary">
                            <thead>
                                <th style="vertical-align: middle;"></th>
                                <th style="vertical-align: middle;">NOMBRE</th>
                                <th style="vertical-align: middle;">RENTA</th>
                                <th style="vertical-align: middle;">PROPIETARIO</th>
                                <th style="vertical-align: middle;">Capacidad maxima</th>
                                <th style="vertical-align: middle;">Capacidad minima</th>
                                <th style="vertical-align: middle;">Duración por ciclo</th>
                                <th style="vertical-align: middle;">Tiempo de espera</th>   
                            </thead>
                            <tbody>
                                <?php foreach ($Atraccion as $key => $dA) : ?>
                                    <tr>
                                        <td style="vertical-align: middle;"><a href="#eAtraccion" class ="btn btn-warning editarAtraccion" data-toggle="modal" data-book-id='{"idAtraccion":<?= $dA->idAtraccion?>,"Atraccion":"<?= $dA->Atraccion?>","Renta":<?= $dA->Renta?>,"Nombre":"<?= $dA->Nombre?>","CapacidadMAX":<?= $dA->CapacidadMAX?>,"CapacidadMIN":<?= $dA->CapacidadMIN?>,"Tiempo":"<?= $dA->Tiempo?>","TiempoMAX":"<?= $dA->TiempoMAX?>"}'><i class="bi bi-pencil-square btn btn-warning"></i></a></td>
                                        <td style="vertical-align: middle;"><?= $dA->Atraccion?></td>
                                        <td style="vertical-align: middle;"><?= $dA->Renta?></td>
                                        <td style="vertical-align: middle;"><?= $dA->Nombre?></td>
                                        <td style="vertical-align: middle;"><?= $dA->CapacidadMAX?></td>
                                        <td style="vertical-align: middle;"><?= $dA->CapacidadMIN?></td>
                                        <td style="vertical-align: middle;"><?= $dA->Tiempo?></td>
                                        <td style="vertical-align: middle;"><?= $dA->TiempoMAX?></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
            </fieldset><!--/Ventana de la atracción-->

            <!--Contenedor del propietario-->
            <div class = "contenedorOculto" id = "contenedorOculto" style="background-image: url('./Img/mainbg.png'); color:black;">
                <div class="contenedorTablaPropietario" id = "contenedorTablaPropietario" style="background-image: url('./Img/mainbg.png'); color:black;">
                    <a href ="#" id="btn-cerrar-popup" class ="btn-cerrar-popup"></a>
                    <!--Ventana del propietario-->
                    <fieldset id="fieldset">
                        <label><h2>Agregar Propietario</h2></label>
                        <div class="contenedorTabla1">
                            <!--AGREGAR PROPIETARIO-->                    
                            <form method="POST" action="Agregar_Propietario" enctype="multipart/form-data" name="formulario" id="formulario">
                                    <div class="table ">
                                        <table id="tab" class="table table-bordered">
                                            <thead>
                                                <th scope="col" style="vertical-align: middle;">Nombre</th>
                                                <th scope="col" style="vertical-align: middle;">Apellido Paterno</th>
                                                <th scope="col" style="vertical-align: middle;">Apellido Materno</th>
                                                <th scope="col" style="vertical-align: middle;">Dirección</th>
                                                <th scope="col" style="vertical-align: middle;">Teléfono</th>
                                                <th scope="col" style="vertical-align: middle;">RFC</th>
                                                <th scope="col" style="vertical-align: middle;">Fecha de Nacimiento</th>
                                            </thead>
                                            <tbody>
                                                <tr class="fila-fila">
                                                    <td><input class="form-control" type="text"  id="na" required name="na[]" placeholder="Nombre"/></td>
                                                    <td><input class="form-control" type="text"  id="app" required name="app[]" placeholder="Apellido Paterno"/></td>
                                                    <td><input class="form-control" type="text"  id="apm" required name="apm[]" placeholder="Apellido Materno"/></td>
                                                    <td><input class="form-control" type="text"  id="dir" required name="dir[]" placeholder="Dirección"/></td>
                                                    <td><input class="form-control" type="number"  id="tel" required name="tel[]" placeholder="Telefono"/></td>
                                                    <td><input class="form-control" type="text"  id="rfc" required name="rfc[]" placeholder="RFC"/></td>
                                                    <td><input class="form-control" type="date"  id="dat" required name="dat[]" placeholder="Fecha de Nacimiento"/></td>
                                                    <td class="elim"><input type="button" value="-"/></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                <button id="adi" name="adicional" type="button" class="btn btn-warning"> + </button>
                                <button class="btn btn-success" typde="submit" onClick="">Agregar</button><hr>
                            </form>   
                              
                            <div class="table table-striped table-responsive ">
                                <!--Tabla-->
                                <table id="examplePro" class="table table-bordered"><!--tenia id="tablas"-->
                                    <thead>
                                        <th style="vertical-align: middle;"></th>
                                        <th style="vertical-align: middle;">Nombre</th>
                                        <th style="vertical-align: middle;">Apellido Paterno</th>
                                        <th style="vertical-align: middle;">Apellido Materno</th>
                                        <th style="vertical-align: middle;">Direccion</th>
                                        <th style="vertical-align: middle;">Telefono</th>
                                        <th style="vertical-align: middle;">RFC</th>
                                        <th style="vertical-align: middle;">Fecha de Nacimiento</th>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($Propietario as $key => $dP) : ?>
                                            <tr>
                                                <td><a href="#ePropietario" class="btn btn-warning editarPropietario" data-book-id='{"idPropietario":<?=$dP->idPropietario?>,"Nombre":"<?=$dP->Nombre?>","ApellidoP":"<?=$dP->ApellidoP?>","ApellidoM":"<?=$dP->ApellidoM?>","Direccion":"<?=$dP->Direccion?>","Telefono":"<?=$dP->Telefono?>","RFC":"<?=$dP->RFC?>","FechaNacimiento":"<?=$dP->FechaNacimiento?>"}' data-toggle="modal"><i class="bi bi-pencil-square btn btn-warning"></i></a></td>
                                                <td><?= $dP->Nombre ?></td>
                                                <td><?= $dP->ApellidoP?></td>
                                                <td><?= $dP->ApellidoM?></td>
                                                <td><?= $dP->Direccion?></td>
                                                <td><?= $dP->Telefono?></td>
                                                <td><?= $dP->RFC?></td>
                                                <td><?= $dP->FechaNacimiento?></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <button class="btn btn-danger" id="cerrar">Cerrar</button>
                    </fieldset> 
                    <!--/Ventana del propietario-->                   
                </div>
            </div>
            <!--/Contenedor del propietario-->
        </div>
        <!--/Contenedor Principal-->
       
        <?php //include('editarPropietario.php')?>
        <?php 
           include 'editarAtraccion.php' ;
           include 'nuevaAtr.php';
        ?>
    </body>
    <!--/Cuerpo-->
</html>
<script src="JS/atracciones.js"></script>

<script>
    $(function(){
            // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
    $("#adi").on('click', function(){
    $("#tab tbody tr:eq(0)").clone().removeClass('fila-fila').appendTo("#tab");
    });
    // Evento que selecciona la fila y la elimina 
    $(document).on("click",".elim",function(){
        var parent = $(this).parents().get(0);
    $(parent).remove();
    });
    });

    $(document).ready(function() {
    $('#examplePro').DataTable( {
        "aProcessing": true,//Activamos el procesamiento del datatables
        "aServerSide": true,//Paginación y filtrado realizados por el servidor
        dom: 'Bfrtip',//Definimos los elementos del control de tabla
        buttons: [		          
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdf'
                ],
        "bDestroy": true,
        "iDisplayLength": 15,//Paginación
        "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
    });
    });

    $(document).ready(function() {
    $('#tab').DataTable( {
        "aProcessing": true,//Activamos el procesamiento del datatables
        "aServerSide": true,//Paginación y filtrado realizados por el servidor
        dom: 'Bfrtip',//Definimos los elementos del control de tabla
        buttons: [		          
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdf'
                ],
        "bDestroy": true,
        "iDisplayLength": 15,//Paginación
        "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
    });
    });

    $(document).ready(function() {
    $('#exampleAtr').DataTable( {
        "aProcessing": true,//Activamos el procesamiento del datatables
        "aServerSide": true,//Paginación y filtrado realizados por el servidor
        dom: 'Bfrtip',//Definimos los elementos del control de tabla
        buttons: [		          
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdf'
                ],
        "bDestroy": true,
        "iDisplayLength": 15,//Paginación
        "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
    });
    });

    $(document).ready(function() {
    $('#example').DataTable( {
        "aProcessing": true,//Activamos el procesamiento del datatables
        "aServerSide": true,//Paginación y filtrado realizados por el servidor
        dom: 'Bfrtip',//Definimos los elementos del control de tabla
        buttons: [		          
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdf'
                ],
        "bDestroy": true,
        "iDisplayLength": 15,//Paginación
        "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
    });
    });
    
</script>