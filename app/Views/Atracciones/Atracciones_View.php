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
                <!--Cabecera-->
                <!--header Class = "cabecera"-->

                    <!--img src = "Img/logo.png" alt = "logo" width = "170px"-->
                    
                        <!--Menu-->
                        <!--ul Class = "nav"-->
                            
                            <!--Menu Catalago-->
                            <!--li-->
                                <!--a href="Menu_Principal_Administrador" Size= "50px">Catalago</a-->
                                
                                <!--Sub menu de Catalago-->
                                <!--ul id="subMenuCatalago">
                                <li><a href="Atracciones">Atracciones</a></li>
                                    <li><a href="Asociados">Asociados</a></li>
                                    <li><a href="Eventos">Eventos</a></li>
                                    <li><a href="Usuarios">Usuarios</a></li>
                                    <li><a href="Promociones">Promociones</a></li>
                                    <li><a href="Tarjetas">Tarjetas</a></li>
                                    <li><a href="Clientes">Clientes</a></li>
                                </ul-->
                                
                            <!--/li-->
                            
                            <!--Menu Reportes-->
                            <!--li-->
                                <!--a href="">Reportes</a-->
                                
                                <!--Sub menu de Reportes-->
                                <!--ul id = "subMenuReportes">
                                    <li><a href="ingreso_Evento.html">Ingresos por evento</a></li>
                                    <li><a href="registro_Evento.html">Utilización por evento</a></li>
                                    <li><a href="uso_Atraccion.html">Utilizacion por atracción</a></li>
                                </ul-->

                            <!--/li-->

                            <!--Menu Taquilla-->
                            <!--li>
                                <a href="">Taquilla</a>
                            </li-->
                            
                            <!--Menu Superivosr-->
                            <!--li>
                                <a href="">Supervisor</a>
                            </li-->

                            <!--Menu Validacion-->
                            <!--li>
                                <a href="">Validacion</a>
                            </li-->
                            
                            <!--Menu Seguridad-->
                            <!--li>
                                <a href="">Seguridad</a>
                            </li-->

                        <!--/ul-->

                <!--/header-->
                <!--/Cabecera-->

            </div>
            <!--Contenedor Superior-->
    <fieldset id="fieldset">
        <legend>Agregar Atracciones</legend>
<!--MODAL AGREGAR ASOCIADO-->
<!-- The Modal -->
<div class="modal" id="myModal">
        <div class="modal-dialog modal-xxl modal-lg">
            <div class="modal-content">
<!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Agregar Atracciones</h4>
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
                                            <th scope="col">Área</th>
                                            <th scope="col">Renta</th>
                                            <th scope="col">Propietario</th>
                                            <th scope="col">Capacidad Máxima</th>
                                            <th scope="col">Capacidad Minima</th>
                                            <th scope="col">Tiempo</th>
                                            <th scope="col">Tiempo Máximo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="fila-fija">
                                            <td><input class="form-control" type="text"  id="na" required name="na[]" placeholder="Nombre"/></td>
                                            <td><input class="form-control" type="text"  id="are" required name="are[]" placeholder="Área"/></td>
                                            <td><input class="form-control" type="text"  id="ren" required name="ren[]" placeholder="Renta"/></td>
                                            <td><input class="form-control" type="text"  id="pro" required name="pro[]" placeholder="Propietario"/></td>
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

    <hr>
            <!--Ventana de la atracción--> 
    <legend>Atracciones</legend>
        <div class="container">
            <div class="row">
                <div class="col col-md-3">
                    <input class="form-control" type="search" name="buscarAtraccion" placeholder="Buscar Atracción">
                </div>
                <div class="col">
                    <input class="btn btn-warning" type="submit" value="Buscar">
                    <!--button class="btn btn-success">+ Nueva Atraccion</button-->
                    <a href="" type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Nueva Atracción</a>
                    <button class="btn btn-success" id="abrir">+ Nuevo Propietario</button>
                </div>
            </div>
        </div>
    <br>
    <div class="contenedorTabla">
    <!--Tabla-->
        <table class="table table-bordered">
            <thead>
            <!--Titulos de la tabla-->
                <tr>
                    <th></th>
                    <th>Nombre</th>
                    <th>Area</th>
                    <th>Propietario</th>
                    <th>Capacidad maxima</th>
                    <th>Capacidad minima</th>
                    <th>Duración por ciclo</th>
                    <th>Tiempo de espera</th>
                </tr><!--/Titutlos de la tabla-->
            </thead>
            <tbody>
                <?php foreach ($Atraccion as $key => $dA) : ?>
                    <tr>
                        <td><button>Editar</button></td>
                        <td><?= $dA->Atraccion ?></td>
                        <td><?= $dA->Area?></td>
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
</fieldset>
            <!--/Ventana de la atracción-->

            
            <!--Contenedor del propietario-->
            <div class = "contenedorOculto" id = "contenedorOculto">
                
                <div class="contenedorTablaPropietario" id = "contenedorTablaPropietario">
                    
                    <a href ="#" id="btn-cerrar-popup" class ="btn-cerrar-popup"></a>


                    <!--Ventana del propietario-->
                    <fieldset id="fieldset">

                    <legend>Agregar Propietario</legend>
                    
<br>
                        <div class="contenedorTabla1">

  <!--AGREGAR PROPIETARIO-->     
                   
<form method="POST" action="" enctype="multipart/form-data" name="formulario" id="formulario">
<div class="form-group">
      <!--label for="uni">Unidades a Cargo</label-->
          <table id="tabla">
              <thead class="thead-dark">
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
</form>
<button class="btn btn-success" onClick="">Agregar</button>

<hr>


<div class="container">
                        <div class="row">
                            <div class="col col-md-3">
                                <input class="form-control" type="search" name="buscarPropietario" placeholder="Buscar Atracción">
                            </div>
                            <div class="col">
                                <input class="btn btn-warning" type="submit" value="Buscar">
                                
                            </div>
                        </div>
                    </div>                            
                            <!--Tabla-->
                            <table class="table table-bordered" id="tablas">
        
                                <thead>
                                    <!--Titulos de la tabla-->
                                    <tr>
                                        <th></th>
                                        <th>Nombre</th>
                                        <th>Apellido Paterno</th>
                                        <th>Apellido Materno</th>
                                        <th>Direccion</th>
                                        <th>Telefono</th>
                                        <th>Fecha de Nacimiento</th>
                                    </tr>
                                    <!--/Titutlos de la tabla-->
        
                                    <tbody>
                                        <?php foreach ($Propietario as $key => $dP) : ?>
                                            <tr>
                                                <td><button>Editar</button></td>
                                                <td><?= $dP->Nombre ?></td>
                                                <td><?= $dP->ApellidoP?></td>
                                                <td><?= $dP->ApellidoM?></td>
                                                <td><?= $dP->Direccion?></td>
                                                <td><?= $dP->Telefono?></td>
                                                <td><?= $dP->FechaNacimiento?></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
        
                                </thead>
        
                            </table>
                            <!--/Tabla-->
                            <button class="btn btn-danger" id="cerrar">Cerrar</button>
        
                        </div>
                    
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
</script>

    </body>
    <!--/Cuerpo-->

</html>