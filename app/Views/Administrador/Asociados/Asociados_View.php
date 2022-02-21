    <fieldset id="fieldset" style="background-color: white;color:black;">
        <label><h1>Asociaciones</h1></label>
            <button class="btn btn-success" id="abrir"><i class="bi bi-plus-circle"></i>&nbsp;Agregar Asociación</button>
            <a href="" type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="bi bi-plus-circle"></i>&nbsp;Agregar Asociado</a>
            <div class="contenedorTabla"><br>
            
            <!--Tabla-->
            <table id="example" class="table table-bordered border-primary  display">
                <thead>
                <!--Titulos de la tabla-->
                    <th></th>
                    <th>Nombre</th>
                    <th>Porcentaje del propietario</th>
                    <th>Porcentaje del asociado</th>
                    <th>Asociado</th>
                    <th>Atraccion</th>
                    <th>Evento</th>
                </thead>
                <tbody>
                    <?php foreach ($Asociacion as $key => $dA) : ?>
                        <tr>
                            <td><a href="" class="editar" data-toggle="modal"><i class="bi bi-pencil-square btn btn-warning"></i></a></td>
                            <td><?= $dA->Nombre ?></td>
                            <td><?= $dA->Porcentaje1?></td>
                            <td><?= $dA->Porcentaje2?></td>
                            <td><?= $dA->Asociado?></td>
                            <td><?= $dA->Atraccion?></td>
                            <td><?= $dA->Evento?></td>
                        </tr>
                    <?php endforeach ?>   
                </tbody>
            </table>
        </div>
    </fieldset>

    <!--MODAL AGREGAR ASOCIADO-->
    <div class="modal" id="myModal" style="background-image: url('./Img/mainbg.png');color:black;">
        <div class="modal-dialog modal-lg">
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
                            <table id="tabla" class="table table-bordered">
                                <thead>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellido Paterno</th>
                                    <th scope="col">Apellido Materno</th>
                                    <th scope="col">Dirección</th>
                                    <th scope="col">Teléfono</th>
                                    <th scope="col">Fecha de Nacimiento</th>
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
                        <button name="adicional" type="button" class="btn btn-success">Agregar </button>
                    </form>
                <hr>
                    <div class="table table-striped table-responsive ">
                        <table id="tablaAso" class="table table-bordered">
                            <thead>
                                <th style="vertical-align: middle;">Editar</th>
                                <th scope="col" style="vertical-align: middle;">Nombre</th>
                                <th scope="col" style="vertical-align: middle;">Apellido Paterno</th>
                                <th scope="col" style="vertical-align: middle;">Apellido Materno</th>
                                <th scope="col" style="vertical-align: middle;">Dirección</th>
                                <th scope="col" style="vertical-align: middle;">Teléfono</th>
                                <th scope="col" style="vertical-align: middle;">Fecha de Nacimiento</th>
                            </thead>
                            <tbody>
                                <?php foreach ($Asociados as $key => $dAS) : ?>
                                    <tr>
                                        <td><a href="" class="editar" data-toggle="modal"><i class="bi bi-pencil-square btn btn-warning"></i></a></td>
                                        <td><?= $dAS->Nombre ?></td>
                                        <td><?= $dAS->ApellidoP?></td>
                                        <td><?= $dAS->ApellidoM?></td>
                                        <td><?= $dAS->Direccion?></td>
                                        <td><?= $dAS->Telefono?></td>
                                        <td><?= $dAS->FechaNacimiento?></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
            
    <!--Contenedor del propietario-->
    <div class = "contenedorOculto" id = "contenedorOculto" style="background-image: url('./Img/mainbg.png'); color:black;">
        <div class="contenedorTablaAsociado" id = "contenedorTablaAsociado" style="background-image: url('./Img/mainbg.png'); color:black;">
            <a href ="#" id="btn-cerrar-popup" class ="btn-cerrar-popup"></a>
            <!--Ventana del propietario-->
                <fieldset id="fieldset" >
                    <div class="contenedorTabla1" >
                    <!--Tabla-->
                        <form action="">       
                            <label><h4>Agregar Asociación</h4></label>
                                <div class="table table-striped table-responsive">
                                    <table id="tabla_aso" class="table table-bordered">
                                        <tbody>
                                            <tr class="agregar_aso">
                                            <td>
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
                                                    <!--input class="form-control" type="text"  id="atra" placeholder="Atracción"/-->
                                                    <select class="form-control" type="text" id="atra" name="select">
                                                        <option value="value1">Nombre de la Atracción</option>
                                                    </select>
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
                                                    <button id="adi" name="adicional" type="button" class="btn btn-warning"><i class="bi bi-plus-circle"></i>&nbsp;Agregar Asociado</button>
                                                </div>
                                                <td class="eliminar"><input type="button" value="-"/></td>
                                            </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button id="nuevor" name="adicional" type="button" class="btn btn-warning"><i class="bi bi-plus-circle"></i>&nbsp;Nuevo Registro </button>
                                </div> 
                            </form>
                            <button class="btn btn-success" id="cerrar">Guardar</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>      
                        </div>  
                    </fieldset> 
                    <!--/Ventana del propietario-->                  
        </div>
    </div>
<!--/Contenedor del propietario-->
       
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

            $(function(){
                        // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
                $("#nuevor").on('click', function(){
                    $("#tabla_aso tbody tr:eq(0)").clone().removeClass('agregar_aso').appendTo("#tabla_aso");
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


            $(document).ready(function() {
                $('#tablaAso').DataTable( {
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
   