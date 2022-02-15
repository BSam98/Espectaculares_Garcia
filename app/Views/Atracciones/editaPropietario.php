<div class="modal fade" id="ePropietario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Editar Propietario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form method="POST"  action="Atracciones/Editar_Propietario" enctype="multipart/form-data" name="formulario" id="formulario">
                    <input type="hidden" class="form-control" id = "idPropietario" name = "idPropietario" value="">
                        
                        <div class="form-group">
                            <label for="Nombre">Nombre</label>
                            <input type="text" class="form-control" id = "Nombre" name = "Nombre" value="">
                        </div>
                        <div class="form-group">
                            <label for="area">Apellido Paterno</label>
                            <input type="text"  class="form-control" id = "ApellidoP" name = "ApellidoP" value="">
                        </div>
                        <div class="form-groupx">
                            <label for="atraccion">Apellido Materno</label>
                            <input type="text" class="form-control" id = "ApellidoM" name = "ApellidoM" value="">
                        </div>
                        <div class="form-group">
                            <label for="atraccion">Direccion</label>
                            <input type="text" class="form-control" id = "Direccion" name = "Direccion" value="">
                        </div>
                        <div class="form-group">
                            <label for="area">Telefono</label>
                            <input type="text"  class="form-control" id = "Telefono" name = "Telefono" value="">
                        </div>
                        <div class="form-group">
                            <label for="atraccion">RFC</label>
                            <input type="text" class="form-control" id = "RFC" name = "RFC" value="">
                        </div>
                        <div class="form-group">
                            <label for="area">Fecha de Nacimiento</label>
                            <input type="text"  class="form-control" id = "FechaNacimiento" name = "FechaNacimiento" value="">
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