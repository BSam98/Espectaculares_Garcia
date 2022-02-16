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
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    </head>
    <body>
        <!--Contenedor Principal-->
        <div Class = "contenedorPrincipal">
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
                                            <li><a href="Atracciones" id="button"><span>Atracciones</span></a></li>
                                            <li><a href="Asociados" id="button"><span>Asociados</span></a></li>
                                            <li><a href="Eventos" id="button"><span>Eventos</span></a></li>
                                            <li><a href="Usuarios" id="button"><span>Usuarios</span></a></li>
                                            <li><a href="Promociones" id="button"><span>Promociones</span></a></li>
                                            <li><a href="Tarjetas" id="button"><span>Tarjetas</span></a></li>
                                            <li><a href="Clientes" id="button"><span>Clientes</span></a></li>
                                        </ul>  
                                </li>
                                <!--Menu Reportes-->
                                <li class="dropdown">
                                    <a href="" Size= "50px" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="bi bi-pencil-square"></i>&nbsp;Reportes</a>
                                    <!--Sub menu de Reportes-->
                                        <ul class="dropdown-submenu" id = "subMenuReportes">
                                            <li><a href="ingreso_Evento.html" id="button"><span>Ingresos por evento</span></a></li>
                                            <li><a href="registro_Evento.html" id="button"><span>Utilización por evento</span></a></li>
                                            <li><a href="uso_Atraccion.html" id="button"><span>Utilizacion por atracción</span></a></li>
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

            <fieldset id="fieldset">
                <label><h1>Eventos</h1></label>
                <a href="#myModal" type="button" class="btn btn-success" data-toggle="modal"><i class="bi bi-plus-circle"></i>&nbsp; Nuevo Evento</a>

                <div class="contenedorTabla">
                    <br>
                    <!--Tabla-->
                    <table id="example" class="table table-bordered  border-primary">
                        <thead>
                            <!--Titulos de la tabla-->
                            <th style="vertical-align: middle;"></th>
                            <th style="vertical-align: middle;">Nombre</th>
                            <th style="vertical-align: middle;">Direccion</th>
                            <th style="vertical-align: middle;">Ciudad</th>
                            <th style="vertical-align: middle;">Estado</th>
                            <th style="vertical-align: middle;">Fecha de inicio</th>
                            <th style="vertical-align: middle;">Fecha de termino</th>
                            <th>Opciones</th>
                            <!--th style="vertical-align: middle;">Status</th>
                            <th style="vertical-align: middle;">Atracciones</th>
                            <th-- style="vertical-align: middle;">Precios</th-->
                            
                            <!--/Titutlos de la tabla-->
                        </thead>
                        <tbody>
                            <?php foreach ($Eventos as $key => $dE) : ?>
                                <tr>
                                    <td style="vertical-align: middle;"><a href="#editarEvento" type="button" data-toggle="modal"><i class="bi bi-pencil-square btn btn-warning"></i></a></td>
                                    <td style="vertical-align: middle;"><?= $dE->Nombre ?></td>
                                    <td style="vertical-align: middle;"><?= $dE->Direccion?></td>
                                    <td style="vertical-align: middle;"><?= $dE->Ciudad?></td>
                                    <td style="vertical-align: middle;"><?= $dE->Estado?></td>
                                    <td style="vertical-align: middle;"><?= $dE->FechaInicio?></td>
                                    <td style="vertical-align: middle;"><?= $dE->FechaFinal?></td>
                                    <td style="vertical-align: middle;">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <ul class="circulo">
                                                        <li><a href="#AgregarL" type="button" data-toggle="modal">Tarjetas</a></li>
                                                        <li><a href="#Atracciones" type="button" data-toggle="modal">Atracciones</a></li>
                                                        <li><a href="#Asociados" type="button" data-toggle="modal">Asociados</a></li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul class="circulo">
                                                        <li><a href="#Asociacion" type="button" data-toggle="modal">Asociación</a></li>
                                                        <li><a href="#Promociones" type="button" data-toggle="modal">Promociones</a></li>
                                                        <li><a href="#Creditos" type="button" data-toggle="modal">Créditos de Cortesia</a></li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                        
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <!--/Tabla-->
                </div>
                
            </fieldset>
        </div>
        <!--/Contenedor Principal-->
    </body>
    <!--/Cuerpo-->
</html>

<?php
    include 'agregar_Evento.php';
    include 'editar_Eventos.php';
    include 'agregar_Asociados.php';
    include 'agregar_Asociacion.php';
    include 'agregar_Promociones.php';
    include 'agregar_Atracciones.php';
    include 'creditos_Cortesia.php';
    include 'agregar_Lotes.php';
?>
    <script>
        $(function(){
                    // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
            $("#adi").on('click', function(){
                $("#tablae tbody tr:eq(0)").clone().removeClass('fila-fila').appendTo("#tablae");
            });
        // Evento que selecciona la fila y la elimina 
            $(document).on("click",".elim",function(){
                var parent = $(this).parents().get(0);
                $(parent).remove();
            });
        });

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


        $(document).ready(function(){

            $('.datepicker').datepicker({
            format: 'dd-mm-yyyy',
            todayHighlight: true,
            toggleActive: true
            });

        });
    </script>