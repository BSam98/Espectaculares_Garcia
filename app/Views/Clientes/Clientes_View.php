
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
                                    <!--<td><a href="#tarjetas_Aso" class="btn btn-warning mostrarTarjetasAsociadas" data-toggle="modal" data-book-id='{"idCliente":<?= $dC->idCliente?>}' >Abrir</a></td>-->
                                    <td><a href="#tarjetas_Aso" class="btn btn-warning mostrarTarjetasAsociadas" data-toggle="modal" data-book-id='{"idCliente":<?= $dC->idCliente?>}' >Abrir</a></td>
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
       
        <?php 
            include 'editarCliente.php';
            include 'tarjetas_Asociadas.php';
            include 'historial.php';
        ?>
    <script src = "JS/clientes.js"></script>
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