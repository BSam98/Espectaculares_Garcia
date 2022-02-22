<div class="modal fade" id="eLote" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Editar Lote</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form  enctype="multipart/form-data" name="formularioEditarLote" id="formularioEditarLote">
                    <div class="container-fluid">
                        <input type="hidden" class="form-control" id = "idLote" name = "idLote" value="">
                       
                        <div class="form-group">
                            <label for="Nombre">Nombre</label>
                            <input type="text" class="form-control" id = "Nombre" name = "Nombre" value="">
                        </div>
                        <div class="form-group">
                            <label for="area">Material</label>
                            <input type="text"  class="form-control" id = "Material" name = "Material" value="">
                        </div>
                        <div class="form-group">
                            <label for="atraccion">Cantidad</label>
                            <input type="number" class="form-control" id = "Cantidad" name = "Cantidad" value="">
                        </div>
                        <div class="form-group">
                            <label for="atraccion">Serie</label>
                            <input type="text" class="form-control" id = "Serie" name = "Serie" value="">
                        </div>
                        <div class="form-group">
                            <label for="area">Usuario</label>
                            <select class="form-control" type="text" name="Usuario" id="Usuario">
                                <?php foreach ($Usuario as $key => $dU) : ?>
                                    <option  value="<?=$dU->idUsuario?>"><?= $dU->UsuarioNombre?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" id = "actualizarLote">Actualizar</button>
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
