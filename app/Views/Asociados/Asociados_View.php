<!DOCTYPE html>
<html lang = "es">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content = "ie=edge"/>
        <title>Asociados</title>
        
        <link href="CSS/cabecera_style.css" rel="stylesheet" type="text/css">
        <link href = "CSS/asociados_style.css" rel = "stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
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
                <!--Cabecera-->
                <!--header Class = "cabecera">
                    <img src = "Img/logo.png" alt = "logo" width = "170px">
                    <ul Class = "nav">
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
                            <li>
                                <a href="">Reportes</a>
                                
                                <ul id = "subMenuReportes">
                                    <li><a href="ingreso_Evento.html">Ingresos por evento</a></li>
                                    <li><a href="registro_Evento.html">Utilización por evento</a></li>
                                    <li><a href="uso_Atraccion.html">Utilizacion por atracción</a></li>
                                </ul>

                            </li>
                            <li>
                                <a href="">Taquilla</a>
                            </li>
                            
                            <li>
                                <a href="">Supervisor</a>
                            </li>

                            <li>
                                <a href="">Validacion</a>
                            </li>
                            <li>
                                <a href="">Seguridad</a>
                            </li>

                        </ul>

                </header-->
                <!--/Cabecera-->
    </div>
            <!--/Contenedor Superior-->

    <fieldset id="fieldset">
        <div class="container-fluid">
        <legend>Asociaciones</legend>
                <!--div class="col col-md-3">
                    <input class="form-control" type="search" name="buscarAsociado" placeholder="Buscar Asociado">
                </div-->
                    <!--input  class="btn btn-warning" type="submit" value="Buscar"-->
                    <button class="btn btn-success" id="abrir">Agregar Asociación</button>
                    <!-- Button to Open the Modal -->
                    <a href="" type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Agregar Asociado</a>
        </div>
    <div class="contenedorTabla">
<br>
<!--Tabla-->
        <table id="example" class="table table-bordered display">
            <thead>
                <!--Titulos de la tabla-->
                <tr>
                    <th></th>
                    <th>Nombre</th>
                    <th>Porcentaje del propietario</th>
                    <th>Porcentaje del asociado</th>
                    <th>Asociado</th>
                    <th>Atraccion</th>
                    <th>Evento</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                foreach ($Asociacion as $key => $dA) : ?>
                    <tr>
                        <td><button>Editar</button></td>
                        <td><?= $dA->Nombre ?></td>
                        <td><?= $dA->Porcentaje1?></td>
                        <td><?= $dA->Porcentaje2?></td>
                        <td><?= $dA->Asociado?></td>
                        <td style="position: fixed;overflow-x:scroll;width: 50px;"><?= $dA->Atraccion?></td>
                        <td><?= $dA->Evento?></td>
                    </tr>
                <?php endforeach ?>   
            </tbody>
        </table>
    </div>
    </fieldset>

<!--MODAL AGREGAR ASOCIADO-->
<!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
<!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Agregar Asociado</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
<!-- Modal body -->
                <div class="modal-body">
                    <form method="POST" action="" enctype="multipart/form-data" name="formulario" id="formulario">
                        <div class="table table-striped table-responsive ">
                            <div class="form-group">
                                <table id="tabla">
                                    <thead>
                                        <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Apellido Paterno</th>
                                        <th scope="col">Apellido Materno</th>
                                        <th scope="col">Dirección</th>
                                        <th scope="col">Teléfono</th>
                                        <th scope="col">Fecha de Nacimiento</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="fila-fija">
                                            <td><input class="form-control" type="text"  id="na" required name="na[]" placeholder="Nombre"/></td>
                                            <td><input class="form-control" type="text"  id="app" required name="app[]" placeholder="Apellido Paterno"/></td>
                                            <td><input class="form-control" type="text"  id="apm" required name="apm[]" placeholder="Apellido Materno"/></td>
                                            <td><input class="form-control" type="text"  id="dir" required name="dir[]" placeholder="Dirección"/></td>
                                            <td><input class="form-control" type="number"  id="tel" required name="tel[]" placeholder="Telefono"/></td>
                                            <td><input class="form-control" type="date"  id="dat" required name="dat[]" placeholder="Fecha de Nacimiento"/></td>
                                            <td class="eliminar"><input type="button"   value="-"/></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button id="adicional" name="adicional" type="button" class="btn btn-warning"> + </button>
                            </div>
                        </div>
                    </form>
                </div>
      <!-- Modal footer -->
                <div class="modal-footer">
                    <button name="adicional" type="button" class="btn btn-success">Agregar </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!--Contenedor del propietario-->
    <div class = "contenedorOculto" id = "contenedorOculto">

        <div class="contenedorTablaAsociado" id = "contenedorTablaAsociado">

            <a href ="#" id="btn-cerrar-popup" class ="btn-cerrar-popup"></a>
            <!--legend>Agregar Asociación</legend>
                <div class="container">
                        <div class="row">
                            <div class="col col-md-4">
                                <input class="form-control" type="search" name="buscarAsociado" placeholder="Buscar Asociado">
                            </div>
                            <div class="col">
                                <input class="btn btn-warning" type="submit" value="Buscar">
                            </div>
                        </div>
                </div-->

        <!--Ventana del propietario-->
            <fieldset id="fieldset">
                <legend>Agregar Asociación</legend>
                <hr>
                <div class="contenedorTabla1" >
                <!--Tabla-->
                    <form action="">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input class="form-control" type="text"  id="name" placeholder="Nombre"/>
                        </div>
                        <div class="form-group">
                            <label for="propietario">Propietario</label>
                            <input class="form-control" type="text"  id="porce" placeholder="% del propietario"/>
                        </div>
                        <div class="form-group">
                            <label for="atraccion">Atraccion</label>
                            <input class="form-control" type="text"  id="atra" placeholder="Atracción"/>
                        </div>
                        <div class="form-group">
                            <label for="evento">Evento</label>
                            <select class="form-control" type="text"  id="eve" name="select">
                                <option value="value1">Value 1</option>
                                <option value="value2">Value 2</option>
                                <option value="value3">Value 3</option>
                            </select>
                        </div>
                        <div style="height: 100px; width: 510px; overflow-y:scroll;">
                        <table id="tablae">
                            <thead>
                            <!--Titulos de la tabla-->
                                <tr>
                                    <th>Porcentaje del asociado</th>
                                    <th>Asociado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="fila-fila">
                                    <td><input class="form-control" type="text"  id="pas" required name="pas[]" placeholder="% del asociado"/></td>
                                    <td><input class="form-control" type="text"  id="aso" required name="aso[]" placeholder="Asociado"/></td>
                                    <td class="elim"><input type="button"   value="-"/></td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                    </form>
                    <button id="adi" name="adicional" type="button" class="btn btn-warning"> + </button>
                    <!--/Tabla--><hr>
                    <button class="btn btn-success" id="cerrar">Guardar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
            </fieldset> 
<!--/Ventana del propietario-->                   
        </div>
    </div>
            <!--/Contenedor del propietario-->


        </div>
    <!--/Contenedor Principal-->
    <script src="JS/asociados.js"></script>    
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
    </script>

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
    </script>

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

    $( function() {
    $( "#datepicker" ).datepicker({dateFormat: 'yyyy-mm-dd'});
  });
</script>
    </body>


</html>