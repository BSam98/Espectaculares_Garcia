<!--MODAL NUEVA ATRACCION-->
<div class="modal fade" id="agregarL" style="color:black;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar Lote</h4>
                <button type="button" class="close" data-dismiss="modal" onclick="cerrar">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form  enctype="multipart/form-data" name="formulario" id="formularioNuevaAtraccion">
                    <div class="table table-striped table-responsive">
                    <!--Tabla AGREGAR LOTES-->
                        <table class="table table-bordered" id="agregar">
                            <thead>
                            <!--Titulos de la tabla-->
                                <th scope="col" style="vertical-align: middle;">Nombre</th>
                                <th scope="col" style="vertical-align: middle;">Material</th>
                                <th scope="col" style="vertical-align: middle;">Cantidad</th>
                                <th scope="col" style="vertical-align: middle;">Folio Inicial</th>
                                <th scope="col" style="vertical-align: middle;">FolioFinal</th>
                                <th scope="col" style="vertical-align: middle;">Serial</th>
                                <th scope="col" style="vertical-align: middle;">Fecha de Ingreso</th>
                                <th scope="col" style="vertical-align: middle;">Usuario</th>
                            </thead>
                            <tbody>
                                <tr class="filas">
                                    <td><input type="text" class="form-grup" id = "Nombre" name = "Nombre" placeholder="Nombre"></td>
                                    <td><input type="text" class="form-grup" id = "Material" name = "Material" placeholder="Material"></td>
                                    <td><input type="number" class="form-grup" id = "Cantidad" name = "Cantidad" placeholder="Cantidad"></td>
                                    <td><input type="number" class="form-grup" id = "FolioInicial" name = "FolioInicial" placeholder="Folio inicial"></td>
                                    <td><input type="number" class="form-grup" id = "FolioFinal" name = "FolioFinal" placeholder="Folio final"></td>
                                    <td><input type="number" class="form-grup" id = "Serie" name = "Serie" placeholder="Serie"></td>
                                    <td><input type="date" class="form-grup" id = "FechaIngreso" name = "FechaIngreso" placeholder="Fecha de Ingreso"></td>
                                    <td><input type="text" class="form-grup" id = "Usuario" name = "Usuario" placeholder="Usuario"></td>
                                    <td class="deletef"><input type="button" value="-"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <button id="addf" name="adicional" type="button" class="btn btn-warning"> + </button>
                    <button  name="save" type="submit" class="btn btn-success" id = "agregarLote">Guardar</button>
                </form>
            </div>
        </div>
     </div>  
</div>