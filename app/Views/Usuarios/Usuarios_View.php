<!DOCTYPE html>
<html lang = "es">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content = "ie=edge"/>
        <title>Usuarios</title>
        
        <link href="CSS/cabecera_style.css" rel="stylesheet" type="text/css">
        <link href = "CSS/usuarios_style.css" rel = "stylesheet" type="text/css">
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
                
                <legend>Usuarios</legend>
                <a href="" type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Nuevo Usuario</a>
                <!--button onClick="">Nuevo Usuario</button-->

                <div class="contenedorTabla">
                    <br>
                    <!--Tabla Principal-->
                    <table id="example" class="table table-bordered">
                        <thead>
                            <!--Titulos de la tabla-->
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
                            <!--/Titutlos de la tabla-->
                        </thead>

                        <tbody>
                            <?php foreach ($Usuario as $key => $dU) : ?>
                                <tr>
                                    <td><button>Editar</button></td>
                                    <td><?= $dU->UsuarioNombre?></td>
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
            
                <div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar Atracciones</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="" enctype="multipart/form-data" name="formulario" id="formulario">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input class="form-control" type="text"  id="na" required placeholder="Nombre"/>
                        </div>
                        <div class="form-group">
                            <label for="direccion">Apellidos</label>
                            <input class="form-control" type="text"  id="are" required placeholder="Apellidos"/>
                        </div>
                        <div class="form-group">
                            <label for="ciudad">Correo Electronico</label>
                            <input class="form-control" type="text"  id="ren" required placeholder="Correo Electronico"/>
                        </div>
                        <div class="form-group">
                            <label for="estado">Número de Seguro Social</label>
                            <input class="form-control" type="text"  id="pro" required placeholder="Número de Seguro Social"/>
                        </div>
                        <div class="form-group">
                            <label for="usuarios">CURP</label>
                            <input class="form-control" type="text"  id="tma" required placeholder="CURP"/>
                        </div>
                        <div class="form-group">
                            <label for="status">Usuario</label>
                            <input class="form-control" type="text"  id="tim" required placeholder="Usuario"/>
                        </div>
                        <div class="form-group">
                            <label for="status">Contraseña</label>
                            <input class="form-control" type="text"  id="tim" required placeholder="Contraseña"/>
                        </div>
                        <div class="form-group">
                            <label for="status">Rango</label>
                            <input class="form-control" type="text"  id="tim" required placeholder="Rango"/>
                        </div>
                        <div class="form-group">
                            <label for="status">Evento</label>
                            <input class="form-control" type="text"  id="tim" required placeholder="Evento"/>
                        </div>
                </form>
            </div>
            <div class="modal-footer">
                <button name="adicional" type="button" class="btn btn-success">Agregar </button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
            </fieldset>            

        </div>
        <!--/Contenedor Principal-->

        <script>
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

    </body>
    <!--/Cuerpo-->

</html>