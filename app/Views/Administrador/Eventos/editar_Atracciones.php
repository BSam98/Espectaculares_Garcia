<!--EDITAR EVENTOS-->
<div class="modal fade" id="editar_Atraccion_Evento" style="color:black;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar Atraccion</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" name="formulario" id="formulario">
                    <div class="form-group" id="id_AtraccionEvento" name="id_AtraccionEvento">
                    </div>
                    <div class="form-group" id="nombre_Atraccion" name="nombre_Atraccion">
                    </div>
                    <div class="form-group">
                        <label for="creditos_Atraccion">Creditos</label>
                        <input class="form-control" type="text" name="creditos_Atraccion" id="creditos_Atraccion" value="">
                    </div>
                    <div class="form-group" id="contrato_Atraccion" name="contrato_Atraccion" value="">
                    </div>
                    <div class="form-group" id="poliza_Atraccion" name="poliza_Atraccion" value="">
                    </div>
                    <div class="form-group" id="zonas_Atraccion" name="zona_Atraccion" value="">
                    </div>
                    <div class="form-group">
                        <div class="form-group" id="promocion_Descuentos_Atraccion">
                        </div>
                        <div class="form-group" id="promocion_Pulsera_Atraccion">
                        </div>
                        <div class="form-group" id="promocion_Juegos_Gratis_Atraccion">
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button id="editar_Atraccion" name="editar_Atraccion" type="button" class="btn btn-success">Actualizar </button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>  
                </form>
            </div>
        </div>
    </div>
</div>