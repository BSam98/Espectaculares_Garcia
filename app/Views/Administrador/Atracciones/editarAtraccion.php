<div class="modal fade" id="eAtraccion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Editar Atracciones</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form  enctype="multipart/form-data" name="formulario" id="formularioEditarAtraccion">

                    <input type="hidden" class="form-control" id = "idAtraccion" name = "idAtraccion" value="">
                    <div class="form-group">
                        <label for="atraccion">Atracción</label>
                        <input type="text" class="form-control" id = "Atraccion" name = "Atraccion" value="">
                    </div>
                    <div class="form-group">
                        <label for="atraccion">Renta</label>
                        <input type="number" class="form-control" id = "Renta" name = "Renta" value="">
                    </div>
                    <div class="form-group">
                        <label for="area">Propietario</label>
                        <select class="form-control" type="text" name="Nombre" id="Nombre">
                            <?php foreach ($Propietario as $key => $dP) : ?>
                                <option  value="<?=$dP->idPropietario?>"><?= $dP->Nombre?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="atraccion">Capacidad Máxima</label>
                        <input type="number" class="form-control" id = "CapacidadMAX" name = "CapacidadMAX" value="">
                    </div>
                    <div class="form-group">
                        <label for="area">Capacidad Mínima</label>
                        <input type="number"  class="form-control" id = "CapacidadMIN" name = "CapacidadMIN" value="">
                    </div>
                    <div class="form-group">
                        <label for="atraccion">Tiempo</label>
                        <input type="text" class="form-control" id = "Tiempo" name = "Tiempo" value="">
                    </div>
                    <div class="form-group">
                        <label for="area">Tiempo Máximo</label>
                        <input type="text"  class="form-control" id = "TiempoMAX" name = "TiempoMAX" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" id = "actualizarAtraccion">Actualizar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
            <!-- Modal footer -->
        </div>
    </div>
</div>
