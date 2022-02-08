<!DOCTYPE html>
<html lang = "es">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content = "ie=edge"/>
        <title>Promociones</title>
        
        <link href="CSS/cabecera_style.css" rel="stylesheet" type="text/css">
        <link href = "CSS/promociones_style.css" rel = "stylesheet" type="text/css">
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
                
                <legend>Dos x Uno</legend>

                <!--input type="search" name="buscarDosxUno" placeholder="Buscar Promocíon Dos x Uno">

                <input type="submit" value="Buscar"-->
                <a href="" type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Agregar</a>
                
                <button onClick="">Agregar</button>

                <div class="contenedorTabla">
                    <br>
                    <!--Tabla-->
                    <table id="example" class="table table-bordered">

                        <thead>
                            <!--Titulos de la tabla-->
                            <tr>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Calendario</th>
                                <th>Evento</th>
                            </tr>
                            <!--/Titutlos de la tabla-->

                            <tbody>
                            </tbody>

                        </thead>

                    </table>
                    <!--/Tabla-->

                </div>
            
            </fieldset>

            <fieldset id="fieldset">
                
                <legend>Pulsera Magica</legend>

                <!--input type="search" name="buscarPulseraMagica" placeholder="Buscar Promocíon Pulsera Magica">

                <input type="submit" value="Buscar"-->

                
                <button onClick="">Agregar</button>

                <div class="contenedorTabla">
                    <br>
                    <!--Tabla-->
                    <table id="example2" class="table table-bordered">

                        <thead>
                            <!--Titulos de la tabla-->
                            <tr>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Calendario</th>
                                <th>Evento</th>
                            </tr>
                            <!--/Titutlos de la tabla-->

                            <tbody>
                            </tbody>

                        </thead>

                    </table>
                    <!--/Tabla-->

                </div>
            
            </fieldset>

            <fieldset id="fieldset">
                
                <legend>Juegos Gratis</legend>

                <!--input type="search" name="buscarJuegosGratis" placeholder="Buscar Promocíon Juegos Gratis">

                <input type="submit" value="Buscar"-->

                
                <button onClick="">Agregar</button>

                <div class="contenedorTabla">
                    <br>
                    <!--Tabla-->
                    <table id="example3" class="table table-bordered">

                        <thead>
                            <!--Titulos de la tabla-->
                            <tr>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Calendario</th>
                                <th>Evento</th>

                            </tr>
                            <!--/Titutlos de la tabla-->

                            <tbody>
                            </tbody>

                        </thead>

                    </table>
                    <!--/Tabla-->

                </div>
            
            </fieldset>

            <fieldset id="fieldset">
                
                <legend>Creditos de Cortesía</legend>

                <!--input type="search" name="buscarAtraccion" placeholder="Buscar Atracción">

                <input type="submit" value="Buscar"-->

                
                <button onClick="">Agregar</button>

                <div class="contenedorTabla">
                    <br>
                    <!--Tabla-->
                    <table id="example4" class="table table-bordered">

                        <thead>
                            <!--Titulos de la tabla-->
                            <tr>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Creditos</th>
                                <th>Eventos</th>

                            </tr>
                            <!--/Titutlos de la tabla-->

                            <tbody>
                            </tbody>

                        </thead>

                    </table>
                    <!--/Tabla-->

                </div>
            
            </fieldset>            


        </div>
        <!--/Contenedor Principal-->

    </body>
    <!--/Cuerpo-->

</html>
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

    $(document).ready(function() {
            $('#example2').DataTable( {
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
            $('#example3').DataTable( {
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
            $('#example4').DataTable( {
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