 <!--AGREGAR USUARIOS-->
 <div class="modal fade" id="usuario" style="color:black;">
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