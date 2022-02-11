<div class="modal fade" id="AddDate?id=<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Editar Atracciones</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form method="POST"  action="" enctype="multipart/form-data" name="formulario" id="formulario">
                    <div class="container-fluid">
                        <input type="hidden" class="form-control" value="<?php echo $id ?>">
                        <div class="form-group">
                            <label for="atraccion">Atracción</label>
                            <input type="text" class="form-control" value="<?php echo $dA->Atraccion?>">
                        </div>
                        <div class="form-group">
                            <label for="area">Área</label>
                            <input type="text"  class="form-control" value="<?php echo $dA->Area?>">
                        </div>
                        <div class="form-group">
                            <label for="atraccion">Renta</label>
                            <input type="text" class="form-control" value="<?php echo $dA->Renta?>">
                        </div>
                        <div class="form-group">
                            <label for="area">Propietario</label>
                            <select class="form-control" type="text"  name="propi" id="propi">
                                <?php foreach ($Propietario as $key => $dP) : ?>
                                    <option value="<?= $dA->idPropietario?>" <?php if($dA->idPropietario == $dP->idPropietario) echo 'selected';?>><?= $dP->Nombre?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="atraccion">Capacidad Máxima</label>
                            <input type="text" class="form-control" value="<?php echo $dA->CapacidadMAX?>">
                        </div>
                        <div class="form-group">
                            <label for="area">Capacidad Mínima</label>
                            <input type="text"  class="form-control" value="<?php echo $dA->CapacidadMIN?>">
                        </div>
                        <div class="form-group">
                            <label for="atraccion">Tiempo</label>
                            <input type="text" class="form-control" value="<?php echo $dA->Tiempo?>">
                        </div>
                        <div class="form-group">
                            <label for="area">Tiempo Máximo</label>
                            <input type="text"  class="form-control" value="<?php echo $dA->TiempoMAX?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Actualizar</button>
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