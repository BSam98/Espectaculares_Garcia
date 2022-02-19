    <!--/Contenedor Superior-->
    <fieldset id="fieldset" style="background-color: white;color:black;" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
        <center><label><h1>USUARIOS</h1></label></center>
        <a href="" type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="bi bi-plus-circle"></i>&nbsp;Nuevo Usuario</a>
        <!--button onClick="">Nuevo Usuario</button-->
        <div class="contenedorTabla"><br>
        <!--Tabla Principal-->
            <table id="example" class="table table-striped">
                <thead>
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
                </thead>
                <tbody>
                    <?php foreach ($Usuario as $key => $dU) : ?>
                        <tr>
                            <td><a href="#eUsuario" class="btn btn-warning editarUsuario" data-book-id='{"idUsuario":<?=$dU->idUsuario?>,"UsuarioNombre":"<?=$dU->UsuarioNombre?>","UsuarioApellido":"<?=$dU->UsuarioApellido?>","CorreoE":"<?=$dU->CorreoE?>","NSS":<?=$dU->NSS?>,"CURP":"<?=$dU->CURP?>","Usuario":"<?=$dU->Usuario?>","Contraseña":"<?=$dU->Contraseña?>"}' data-toggle="modal"><i class="bi bi-pencil-square btn btn-warning"></i></a></td>
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
        </div>

        <!--AGREGAR USUARIOS-->
        <div class="modal fade" id="myModal" style="color:black;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Agregar Usuarios</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form  enctype="multipart/form-data" name="formulario" id="formularioAgregarUsuario">
                            <div class="table table-striped table-responsive">
                                <table id="agregarU" class="table table-bordered">
                                    <tbody>
                                        <tr class="filaU">
                                            <td>
                                                <div class="form-group">
                                                    <label for="nombre">Nombre</label>
                                                    <input class="form-control" type="text"  id="nombre" required name="nombre[]" required placeholder="Nombre"/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="apellidos">Apellidos</label>
                                                    <input class="form-control" type="text"  id="apellidos" required name="apellidos[]" required placeholder="Apellidos"/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="correo">Correo Electrónico</label>
                                                    <input class="form-control" type="text"  id="correo" required name="correo[]"  required placeholder="Correo Electronico"/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nss">Número de Seguro Social</label>
                                                    <input class="form-control" type="number"  id="nss" name="nss[]" required placeholder="Número de Seguro Social"/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="curp">CURP</label>
                                                    <input class="form-control" type="text" id="curp" required name="curp[]" required placeholder="CURP"/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="usuario">Usuario</label>
                                                    <input class="form-control" type="text" id="usuario" required name="usuario[]" required placeholder="Usuario"/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="pass">Contraseña</label>
                                                    <input class="form-control" type="text"  id="pass" required name="pass[]" required placeholder="Contraseña"/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="rango">Rango</label>
                                                    <select name="rango" id="rango" required name="rango[]" class="form-control" type="text">
                                                        <option value="0">Elige una opción</option>
                                                            <?php foreach ($Rango as $key => $dR) : ?>
                                                                <option value = "<?= $dR->idRango?>"><?= $dR-> Nombre?></option>
                                                            <?php endforeach ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="even">Evento</label>
                                                    <select name="evento" id="evento" required name="evento[]" class="form-control" type="text">
                                                        <option value="0">Elige una opción</option>
                                                            <?php foreach ($Evento as $key => $dE) : ?>
                                                                <option value = "<?= $dE->idEvento?>"><?= $dE-> Ciudad?></option>
                                                            <?php endforeach ?>
                                                    </select>
                                                </div>
                                            </td>
                                            <td class="elimU"><input type="button"   value="-"/></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button id="addU" name="adicional" type="button" class="btn btn-warning"> + </button>
                            </div>
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button name="adicional" type="submit" class="btn btn-success" id="agregarUsuario">Agregar </button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            </div>  
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </fieldset>            
    
<!--/Contenedor Principal-->
        <?php include('editarUsuarios.php') ?>
    
<script src="JS/usuarios.js"></script>
<script>
        $(function(){
                    // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
            $("#addU").on('click', function(){
            $("#agregarU tbody tr:eq(0)").clone().removeClass('filaU').appendTo("#agregarU");
            });
            // Evento que selecciona la fila y la elimina 
            $(document).on("click",".elimU",function(){
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
