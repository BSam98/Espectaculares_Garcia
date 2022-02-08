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
<form method="POST" action="" enctype="multipart/form-data" name="formulario" id="formulario">
    <div class="table table-striped table-responsive">
        <table id="tabla" class="table table-bordered">
            <thead>
                <th>Nombre</th>
                <th>Área</th>
                <th>Renta</th>
                <th>Propietario</th>
                <th>Capacidad Máxima</th>
                <th>Capacidad Minima</th>
                <th>Tiempo</th>
                <th>Tiempo Máximo</th>
            </thead>
            <tbody>
                <tr class="fila-fija">
                    <td><input class="form-control" type="text"  id="na" required name="na[]" placeholder="Nombre"/></td>
                    <td><input class="form-control" type="text"  id="are" required name="are[]" placeholder="Área"/></td>
                    <td><input class="form-control" type="text"  id="ren" required name="ren[]" placeholder="Renta"/></td>
                    <td>
                        <select class="form-control" type="text"  id="pro" required name="pro[]">
                            <option>Coche</option>
                        </select>
                        <!--input class="form-control" type="text"  id="pro" required name="pro[]" placeholder="Propietario"/-->
                    </td>
                    <td><input class="form-control" type="text"  id="cma" required name="cma[]" placeholder="Cantidad Máxima"/></td>
                    <td><input class="form-control" type="text"  id="cmi" required name="cmi[]" placeholder="Cantidad Mínima"/></td>
                    <td><input class="form-control" type="text"  id="tim" required name="tim[]" placeholder="Tiempo"/></td>
                    <td><input class="form-control" type="text"  id="tma" required name="tma[]" placeholder="Tiempo Máximo"/></td>
                    <td class="eliminar"><input type="button"   value="-"/></td>
                </tr>
            </tbody>
        </table>
        <button id="adicional" name="adicional" type="button" class="btn btn-warning"> + </button>
    </div>
</form>
<button name="adicional" type="button" class="btn btn-success">Agregar </button>
<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
    </body>
</html>