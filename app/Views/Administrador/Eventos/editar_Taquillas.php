<div class="modal fade" id="modal_Editar_Taquillas" style="color:black;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar Taquilla</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" name="formulario_Taquilla_Editada" id="formulario_Taquilla_Editada">
                    <div class="table table-striped table-responsive">
                        <table class="table table-borderd" id="agregarTaq">
                            <thead>
                                <th scope="col" style="vertical-align: middle;">Nombre</th>
                            </thead>
                            <tbody>
                                
                                <tr class="filas" id="0">
                                    <td>
                                        <div class="form-group" id="editar_Select_Zona">
                                        </div>
                                        <div class="form-group">

                                            <label for="">Nombre Taquilla</label>
                                            <input type="text" name="editar_Nombre_Taquilla[]" id="editar_Nombre_Taquilla" class="form-control">

                                            <table id="tablaVentanilla" class="table table-bordered">
                                                <thead>
                                                    <th style="vertical-align: middle;" colspan="2">Ventanilla</th>
                                                    <br>
                                                </thead>
                                                <tbody id="editar_Tabla_Ventanilla" >
                                                        <tr>
                                                            <td colspan="2">
                                                            <button name="adicional" type="button" class="btn btn-warning nueva_Ventanilla"><i class="bi bi-plus-circle"></i>&nbsp;Agregar Ventanilla</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input type="text" name="nombre_Ventanilla[]" id="nombre_Ventanilla" placeholder="Nombre de la ventanilla">
                                                            </td>
                                                            <td class="elimAsoci"><input type="button"   value="-"/></td>
                                                        </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <button id="guardar_Taquilla_Editada" name="guardar_Taquilla_Editada" type="button" class="btn btn-success">Guardar</button>
                </form>
                <hr>
            </div>                 
        </div>
    </div>
</div>