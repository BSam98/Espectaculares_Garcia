<!DOCTYPE html>
<html lang = "es">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content = "ie=edge"/>
        <title>Atracciones</title>
        <link href="CSS/cabecera_style.css" rel="stylesheet" type="text/css">
        <link href = "CSS/clientes_style.css" rel = "stylesheet" type="text/css">
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
                                <li class="dropdown">
                                    <a href="" Size= "50px" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="bi bi-pencil-square"></i>&nbsp;Reportes</a>
                                    <!--Sub menu de Reportes-->
                                        <ul class="dropdown-submenu" id = "subMenuReportes">
                                            <li><a href="ingreso_Evento.html">Ingresos por evento</a></li>
                                            <li><a href="registro_Evento.html">Utilización por evento</a></li>
                                            <li><a href="uso_Atraccion.html">Utilizacion por atracción</a></li>
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
            <!--/Contenedor Superior-->

            <!--TABLA PRINCIPAL-->
            <fieldset id="fieldset" style="background-color: white;color:black;">
                <label><h1>Clientes</h1></label>
                    <a href="" type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalT"><i class="bi bi-plus-circle"></i>&nbsp;Nuevo Cliente</a>
                
                <div class="contenedorTabla"><br>
                <!--Tabla-->
                    <table class="table table-bordered  border-primary" id="clientes">
                        <thead>
                            <th></th>
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
                        </thead>
                        <tbody>
                            <?php foreach ($Cliente as $key => $dC) : ?>
                                <tr>
                                    <td><a href="#editar_Cliente" class="editar" data-toggle="modal"><i class="bi bi-pencil-square btn btn-warning"></i></a></td>
                                    <td><?= $dC->Nombre?></td>
                                    <td><?= $dC->ApellidoP?></td>
                                    <td><?= $dC->ApellidoM?></td>
                                    <td><?= $dC->CorreoE?></td>
                                    <td><?= $dC->Contraseña?></td>
                                    <td><?= $dC->Telefono?></td>
                                    <td><?= $dC->Ciudad?></td>
                                    <td><?= $dC->Estado?></td>
                                    <td><?= $dC->FechaNacimiento?></td>
                                    <td><a href="#tarjetas_Aso" class="btn btn-warning editar" data-toggle="modal">Abrir</a></td>
                                    <td><a href="#historial_Tarjetas" class="btn btn-warning editar" data-toggle="modal">Abrir</a></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table> 
                </div>

                <!--MODAL NUEVO CLIENTE-->
                <div class="modal" id="myModalT" style="background-image: url('./Img/mainbg.png');color:black;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Agregar Clientes</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal body -->
                            <form method="POST"  action="" enctype="multipart/form-data" name="formulario" id="formulario">
                                <div class="modal-body">    
                                    <div class="table table-striped table-responsive">
                                        <table id="newCli" class="table table-bordered">
                                            <tbody>
                                                <tr class="addcli">
                                                    <td>
                                                        <div class="form-group">
                                                            <label for="name">Nombre</label>
                                                            <input class="form-control" type="text" id="nomb" required name="nomb[]" placeholder="Nombre"/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="app">Apellido Paterno</label>
                                                            <input class="form-control" type="text" id="app" required name="app[]" placeholder="Apellido Paterno"/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="apm">Apellido Materno</label>
                                                            <input class="form-control" type="text" id="apm" name="apm[]" placeholder="Apellido Materno"/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="ce">Correo Electronico</label>
                                                            <input class="form-control" type="text" id="ce" required name="ce[]" placeholder="Correo Electronico">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="contra">Contraseña</label>
                                                            <input class="form-control" type="text" id="contra" required name="contra[]" placeholder="Contraseña"/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tel">Teléfono</label>
                                                            <input class="form-control" type="number" id="tel" required name="tel[]" placeholder="Teléfono"/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="city">Ciudad</label>
                                                            <input class="form-control" type="text" id="city" required name="city[]" placeholder="Ciudad"/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="state">Estado</label>
                                                            <select class="form-control" type="text"  id="state" required name="state[]">
                                                                <option value="0">Elige una opción</option>
                                                                        <option value = ""></option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="date">Fecha de Nacimiento</label>
                                                            <input class="form-control" type="date" id="date" required name="date[]"/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="tarjeta">Tarjetas</label>
                                                            <input class="form-control" type="text" id="tarjeta" required name="tarjeta[]" placeholder="Tarjetas"/>
                                                        </div>
                                                    </td>
                                                    <td class="elim"><input type="button"   value="-"/></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <button id="agre" name="agre" type="button" class="btn btn-warning"> + </button>
                                    </div>
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button name="adicional" type="submit" class="btn btn-success">Agregar </button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                    </div>  
                            </form>
                        </div>
                    </div>  
                </div>
            </fieldset>
        </div>

        <?php 
            include 'editarCliente.php';
            include 'tarjetas_Asociadas.php';
            include 'historial.php';
        ?>
    </body>
</html>

<script>
    $(function(){
            $("#agre").on('click', function(){
            $("#newCli tbody tr:eq(0)").clone().removeClass('addCli').appendTo("#newCli");
            });
            // Evento que selecciona la fila y la elimina 
            $(document).on("click",".elim",function(){
                var parent = $(this).parents().get(0);
            $(parent).remove();
            });
        });

    $(document).ready(function() {
        $('#clientes').DataTable( {
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