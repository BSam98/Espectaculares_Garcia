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
                            <li><a href="">Taquilla</a></li>
                            <!--Menu Superivosr-->
                            <li><a href="">Supervisor</a></li>
                            <!--Menu Validacion-->
                            <li><a href="">Validacion</a></li>
                            <!--Menu Seguridad-->
                            <li><a href="">Seguridad</a></li>
                        </ul>
                    </nav>
                </div> 
            </div>
            <!--Contenedor Superior-->
            <fieldset id="fieldset">
                <!--TABLA PRINCIPAL-->
                <!--Ventana de la atracción--> 
                <legend>Atracciones</legend>
                        <!--button class="btn btn-success">+ Nueva Atraccion</button-->
                        <a href="" type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Nueva Atracción</a>
                        <button class="btn btn-success" id="abrir">+ Nuevo Propietario</button>

                <div class="contenedorTabla">
                    <br>
                    <!--Tabla-->
                    <table id="example" class="table table-bordered">
                        <thead>
                            <th style="vertical-align: middle;"></th>
                            <th style="vertical-align: middle;">Nombre</th>
                            <th style="vertical-align: middle;">Area</th>
                            <th style="vertical-align: middle;">Renta</th>
                            <th style="vertical-align: middle;">Propietario</th>
                            <th style="vertical-align: middle;">Capacidad maxima</th>
                            <th style="vertical-align: middle;">Capacidad minima</th>
                            <th style="vertical-align: middle;">Duración por ciclo</th>
                            <th style="vertical-align: middle;">Tiempo de espera</th>
                        </thead>
                        <tbody>
                            <?php foreach ($Atraccion as $key => $dA) : ?>
                                
                                

                                <tr>
                                    <td><a href="#eAtraccion" class ="editarAtraccion" data-toggle="modal" data-book-id='{"idAtraccion":<?= $dA->idAtraccion?>,"Atraccion":"<?= $dA->Atraccion?>","Area":"<?= $dA->Area?>","Renta":<?= $dA->Renta?>,"Nombre":"<?= $dA->Nombre?>","CapacidadMAX":<?= $dA->CapacidadMAX?>,"CapacidadMIN":<?= $dA->CapacidadMIN?>,"Tiempo":"<?= $dA->Tiempo?>","TiempoMAX":"<?= $dA->TiempoMAX?>"}'>Editar</a></td>
                                    <td><?= $dA->Atraccion?></td>
                                    <td><?= $dA->Area?></td>
                                    <td><?= $dA->Renta?></td>
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

                <!--MODAL NUEVA ATRACCION-->
                <div class="modal" id="myModal">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Agregar Atracciones</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                <form method="POST"  action="Agregar_Atraccion" enctype="multipart/form-data" name="formulario" id="formulario">
                                    <div class="table table-striped table-responsive">
                                        <table id="tabla" class="table table-bordered">
                                            <tbody>
                                                <tr class="fila-fija">
                                                    <td>
                                                        <div class="form-group">
                                                            <label for="nombre">Nombre</label>
                                                            <input class="form-control" type="text"  id="na" required name="na[]" placeholder="Nombre"/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="area">Área</label>
                                                            <input class="form-control" type="text"  id="are" required name="are[]" placeholder="Área"/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="renta">Renta</label>
                                                            <input class="form-control" type="number"  id="ren" required name="ren[]"/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="propietario">Propietario</label>
                                                            <select class="form-control" type="text"  id="pro" required name="pro[]">
                                                                <option value="0">Elige una opción</option>
                                                            <?php foreach ($Propietario as $key => $dP) : ?>
                                                                <option value = "<?= $dP->idPropietario?>"><?= $dP-> Nombre?></option>
                                                            <?php endforeach ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="cma">Cantidad Máxima</label>
                                                            <input class="form-control" type="number"  id="cma" required name="cma[]"/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="cmi">Cantidad Mínima</label>
                                                            <input class="form-control" type="number"  id="cmi" required name="cmi[]"/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tiempo">Tiempo</label>
                                                            <input class="form-control" type="text"  id="tim" required name="tim[]" placeholder="Tiempo"/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tma">Tiempo Máximo</label>
                                                            <input class="form-control" type="text"  id="tma" required name="tma[]" placeholder="Tiempo Máximo"/>
                                                        </div>
                                                    </td>
                                                    <td class="eliminar"><input type="button"   value="-"/></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <button id="adicional" name="adicional" type="button" class="btn btn-warning"> + </button>
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button name="adicional" type="submit" class="btn btn-success">Agregar </button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>  
                                </form>
                            </div>
                        </div>
                    </div>  
                </div>
                <!--</div>-->
            </fieldset><!--/Ventana de la atracción-->

            <!--Contenedor del propietario-->
            <div class = "contenedorOculto" id = "contenedorOculto">
                <div class="contenedorTablaPropietario" id = "contenedorTablaPropietario">
                    <a href ="#" id="btn-cerrar-popup" class ="btn-cerrar-popup"></a>
                    <!--Ventana del propietario-->
                    <fieldset id="fieldset">
                        <legend>Agregar Propietario</legend><br>
                        <div class="contenedorTabla1">
                            <!--AGREGAR PROPIETARIO-->                    
                            <form method="POST" action="Agregar_Propietario" enctype="multipart/form-data" name="formulario" id="formulario">
                                <div class="table table-striped table-responsive">
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
                                            <td><a href="#ePropietario?id=<?php echo $dP->idPropietario ?>" class="btn btn-warning editarPropietario" data-toggle="modal">Editar</a></td>
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
        <script src="JS/atracciones.js"></script>

        <script>
            $(function(){
                    // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
            $("#adicional").on('click', function(){
            $("#tabla tbody tr:eq(0)").clone().removeClass('fila-fija').appendTo("#tabla");
            });
            // Evento que selecciona la fila y la elimina 
            $(document).on("click",".eliminar",function(){
                var parent = $(this).parents().get(0);
            $(parent).remove();
            });
            });

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
    <?php include('editarAtraccion.php')?>
    </body>
    <!--/Cuerpo-->

</html>