<div class="modal fade" id="eUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Editar Atracciones</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form  enctype="multipart/form-data" name="formulario1" id="formularioEditarUsuario">
                    <input type="hidden" class="form-control" id = "idUsuario" name = "idUsuario" value="">
                        <div class="form-group">
                            <label for="atraccion">Nombre</label>
                            <input type="text" class="form-control" id = "UsuarioNombre" name = "UsuarioNombre" value="">
                        </div>
                        <div class="form-group">
                            <label for="area">Apellidos</label>
                            <input type="text"  class="form-control" id = "UsuarioApellido" name = "UsuarioApellido" value="">
                        </div>
                        <div class="form-group">
                            <label for="atraccion">Correo Electronico</label>
                            <input type="text" class="form-control" id = "CorreoE" name = "CorreoE" value="">
                        </div>
                        <div class="form-group">
                            <label for="atraccion">NSS</label>
                            <input type="number" class="form-control" id = "NSS" name = "NSS" value="">
                        </div>
                        <div class="form-group">
                            <label for="area">CURP</label>
                            <input type="text"  class="form-control" id = "CURP" name = "CURP" value="">
                        </div>
                        <div class="form-group">
                            <label for="atraccion">Usuario</label>
                            <input type="text" class="form-control" id = "Usuario" name = "Usuario" value="">
                        </div>
                        <div class="form-group">
                            <label for="area">Contraseña</label>
                            <input type="text"  class="form-control" id = "Contraseña" name = "Contraseña" value="">
                        </div>
                        <div class="form-group">
                            <label for="area">Rango</label>
                            <select class="form-control" type="text" name="idRango" id="idRango">
                                <?php foreach ($Rango as $key => $dR) : ?>
                                    <option  value="<?=$dR->idRango?>"><?= $dR->Nombre?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="area">Evento</label>
                            <select class="form-control" type="text" name="idEvento" id="idEvento">
                                <?php foreach ($Evento as $key => $dE) : ?>
                                    <option  value="<?=$dE->idEvento?>"><?= $dE->Ciudad?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" id="actualizarUsuario">Actualizar</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        </div>
                </form>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
