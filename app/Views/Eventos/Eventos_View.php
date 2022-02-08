<!DOCTYPE html>
<html lang = "es">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content = "ie=edge"/>
        <title>Eventos</title>
        
        <link href="CSS/cabecera_style.css" rel="stylesheet" type="text/css">
        <link href = "CSS/eventos_style.css" rel = "stylesheet" type="text/css">
        
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
                    <li>
                        <a href="Menu_Principal_Administrador" Size= "50px">Catalago</a>
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
        <legend>Eventos</legend>
        <a href="" type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Nuevo Evento</a>
        <!--button onClick="">Nuevo Evento</button-->

            <!--div class="container-fluid">
                
                <input type="search" name="buscarEvento" placeholder="Buscar Evento">
                <input type="submit" value="Buscar">
                
            </div-->

            <div class="contenedorTabla">
                <br>
                    <!--Tabla-->
                    <table id="example" class="table table-bordered">
                        <thead>
                            <!--Titulos de la tabla-->
                                <th style="vertical-align: middle;"></th>
                                <th style="vertical-align: middle;">Nombre</th>
                                <th style="vertical-align: middle;">Direccion</th>
                                <th style="vertical-align: middle;">Ciudad</th>
                                <th style="vertical-align: middle;">Estado</th>
                                <th style="vertical-align: middle;">Fecha de inicio</th>
                                <th style="vertical-align: middle;">Fecha de termino</th>
                                <th style="vertical-align: middle;">Status</th>
                                <th style="vertical-align: middle;">Atracciones</th>
                                <th style="vertical-align: middle;">Precios</th>
                            
                            <!--/Titutlos de la tabla-->
                            </thead>
                            <tbody>
                            <?php foreach ($Eventos as $key => $dE) : ?>
                                <tr>
                                    <td><button>Editar</button></td>
                                    <td><?= $dE->Nombre ?></td>
                                    <td><?= $dE->Direccion?></td>
                                    <td><?= $dE->Ciudad?></td>
                                    <td><?= $dE->Estado?></td>
                                    <td><?= $dE->FechaInicio?></td>
                                    <td><?= $dE->FechaFinal?></td>
                                    <td><button>Abrir</button></td>
                                    <td><button>Abrir</button></td>
                                    <td><button>Abrir</button></td>
                                </tr>
                            <?php endforeach ?>
                            </tbody>
                    </table>
                    <!--/Tabla-->
            </div>

<div class="modal" id="myModal">
    <div class="modal-dialog modal-xxl modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar Evento</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="" enctype="multipart/form-data" name="formulario" id="formulario">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input class="form-control" type="text"  id="na" required placeholder="Nombre"/>
                        </div>
                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            <input class="form-control" type="text"  id="are" required placeholder="Dirección"/>
                        </div>
                        <div class="form-group">
                            <label for="ciudad">Ciudad</label>
                            <input class="form-control" type="text"  id="ren" required placeholder="Ciudad"/>
                        </div>
                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <input class="form-control" type="text"  id="pro" required placeholder="Estado"/>
                        </div>
                        <div class="form-group">
                            <label for="fechas">Fechas</label>
                            <input class="form-control" type="date"  id="cma" required placeholder="Fechas"/> 
                            <input id="hours" type="time" name="time" value="09:00" />
                            <label for="time">To </label>
                            <input id="time" type="time" name="time" value="18:00" />
                            <br>
                                   
                        </div>
                        <div class="form-group">
                            <label for="precios">Precios</label>
                            <input class="form-control" type="text"  id="tim" required placeholder="Precio"/>
                        </div>
                        <div class="table table-striped table-responsive">
                            <table id="tabla">
                                <thead>
                                    <tr>
                                        <th scope="col">Atracciones</th>
                                        <th scope="col">Creditos</th>
                                        <th scope="col">Creditos de Cortesia</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="fila-fija">
                                        
                                    <td><input class="form-check-input" type="checkbox"  id="tma" required name="tma[]" placeholder="Atracciones"/></td>
                                        <td><input class="form-control" type="text"  id="tma" required name="tma[]" placeholder="Creditos"/></td>
                                        <td><input class="form-control" type="text"  id="tma" required name="tma[]" placeholder="Creditos Cortesia"/></td>
                                        <td class="eliminar"><input type="button"   value="-"/></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                            <button id="adicional" name="adicional" type="button" class="btn btn-warning"> + </button>
                </form>
            </div>
            <div class="modal-footer">
                <button name="adicional" type="button" class="btn btn-success">Agregar </button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>




        </fieldset>

        </div>
        <!--/Contenedor Principal-->
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