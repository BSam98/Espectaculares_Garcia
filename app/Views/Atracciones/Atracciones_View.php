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
        <div class="container">
            <form method="POST" action="" enctype="multipart/form-data" name="formulario" id="formulario">
                <div class="form-group">
                    <!--label for="uni">Unidades a Cargo</label-->
                        <table class="table" id="tabla">
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
            </form>
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
                                        <th>Nombre</th>
                                        <th>Apellido Paterno</th>
                                        <th>Apellido Materno</th>
                                        <th>Direccion</th>
                                        <th>Telefono</th>
                                        <th>Fecha de Nacimiento</th>
                                    </tr>
                                    <!--/Titutlos de la tabla-->
        
                                    <tbody>
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