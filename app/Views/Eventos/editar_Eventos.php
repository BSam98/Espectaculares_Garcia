<!--EDITAR EVENTOS-->
<div class="modal" id="editarEvento" style="color:black;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar Evento</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="" enctype="multipart/form-data" name="formulario" id="formulario">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input class="form-control" type="text" name="nombre" id="nombre" value="">
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input class="form-control" type="text" name="direccion" id="direccion" value="">
                    </div>
                    <div class="form-group">
                        <label for="city">Ciudad</label>
                        <input class="form-control" type="text" name="city" id="city" value="">
                    </div>
                    <div class="form-group">
                        <label for="state">Estado</label>
                        <input class="form-control" type="text" name="state" id="state" value="">
                    </div>
                    <div class="form-group">
                        <label for="fi">Fecha de Inicio</label>
                        <input class="form-control" type="text" name="" id="" value="">
                    </div>
                    <div class="form-group">
                        <label for="ff">Fecha Fin</label>
                        <input class="form-control" type="text" name="" id="" value="">
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button name="adicional" type="submit" class="btn btn-success">Actualizar </button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>  
                </form>
            </div>
        </div>
    </div>
</div>