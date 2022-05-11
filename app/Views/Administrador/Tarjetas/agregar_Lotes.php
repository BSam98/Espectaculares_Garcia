<!--MODAL NUEVA ATRACCION-->
<div class="modal fade" id="agregarL" style="color:black;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar Lote</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form  enctype="multipart/form-data" name="formularioAgregarLote" id="formularioAgregarLote">
                    <div class="table table-striped table-responsive">
                    <!--Tabla AGREGAR LOTES-->
                        <table class="table table-bordered" id="agregarLotes">
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
                                <tr class="filas-lote">
                                    <td><input type="text" class="form-grup" id="nom" name = "nom[]" placeholder="Nombre"></td>
                                    <td><input type="text" class="form-grup" id="mate" name = "mate[]" placeholder="Material"></td>
                                    <td><input type="number" class="form-grup" id="cant" name = "cant[]" placeholder="Cantidad"></td>
                                    <td><input type="number" class="form-grup" id="fi" name = "fi[]" placeholder="Folio inicial"></td>
                                    <td><input type="number" class="form-grup" id="ff" name = "ff[]" placeholder="Folio final"></td>
                                    <td><input type="text" class="form-grup" id="ser" name = "ser[]" placeholder="Serie"></td>
                                    <td><input type="date" class="form-grup" id="date" name = "date[]" placeholder="Fecha de Ingreso"></td>
                                    <td>
                                        <select class="form-control" type="text"  id="user" name = "user[]" required name="pro">
                                            <option value="0">Seleccionar Propietario</option>
                                            <?php foreach ($Usuario as $key => $dU) : ?>
                                                <option value = "<?= $dU->idUsuario?>"><?= $dU-> UsuarioNombre ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </td>
                                    <td class="eliminar-Filasl"><input type="button" value="-"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <button id="agregar-Filas" name="agregar-Filas" type="button" class="btn btn-warning"> + </button>
                    <button  name="z" type="button" class="btn btn-success" id = "z">Guardar</button>
                </form>
            </div>
        </div>
     </div>  
</div>