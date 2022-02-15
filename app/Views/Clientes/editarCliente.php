
    <!--Contenedor Principal-->
    <div Class = "contenedorPrincipal">
        
        <div class="modal fade" id="editar_Cliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="color:black;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Editar Usuarios</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <form method="POST"  action="" enctype="multipart/form-data" name="formulario" id="formulario">
                        <div class="modal-body">        
                            <div class="form-group">
                                <label for="nom">Nombre</label>
                                <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label for="apep">Apellido Paterno</label>
                                <input type="text" class="form-control" name="apep" placeholder="Apellido Paterno">
                            </div>
                            <div class="form-group">
                                <label for="apem">Apellido Materno</label>
                                <input type="text" class="form-control" name="apem" placeholder="Apellido Materno">
                            </div>
                            <div class="form-group">
                                <label for="ce">Correo Electronico</label>
                                <input type="text" class="form-control" name="coe" placeholder="Correo Electronico">
                            </div>
                            <div class="form-group">
                                <label for="tel">Teléfono</label>
                                <input type="number" class="form-control" name="tel" placeholder="Teléfono">
                            </div>
                            <div class="form-group">
                                <label for="ciu">Ciudad</label>
                                <input type="text" class="form-control" name="city" placeholder="Ciudad">
                            </div>
                            <div class="form-group">
                                <label for="est">Estado</label>
                                <input type="text" class="form-control" name="state" placeholder="Estado">
                            </div>
                            <div class="form-group">
                                <label for="fecha">Fecha de Nacimiento</label>
                                <input type="date" class="form-control" name="date">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Actualizar</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>