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
                            <tbody>
                                <tr class="filas-lote">
                                    <td>
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input type="text" class="form-control" id="nom" name = "nom[]" placeholder="Nombre">
                                        </div>
                                        <div class="form-group">
                                            <label>Material</label>
                                            <input type="text" class="form-control" id="mate" name = "mate[]" placeholder="Material">
                                        </div>
                                        <div class="form-group">
                                            <label>Cantidad</label>
                                            <input type="number" class="form-control" id="cant" name = "cant[]" placeholder="Cantidad">
                                        </div>
                                        <div class="form-group">
                                            <label>Folio Inicial</label>
                                            <input type="number" class="form-control" id="fi" name = "fi[]" placeholder="Folio inicial">
                                        </div>
                                        <div class="form-group">
                                            <label>FolioFinal</label>
                                            <input type="number" class="form-control" id="ff" name = "ff[]" placeholder="Folio final">
                                        </div>
                                        <div class="form-group">
                                            <label>Serial</label>
                                            <input type="text" class="form-control" id="ser" name = "ser[]" placeholder="Serie">
                                        </div>
                                        <div class="form-group">
                                            <label>Fecha de Ingreso</label>
                                            <input type="date" class="form-control" id="date" name = "date[]" placeholder="Fecha de Ingreso">
                                        </div>
                                        <div class="form-group">
                                            <label>Usuario</label>
                                            <input type="text" class="form-control" id="nombre" value="<?php echo session('Usuario')?>" readonly>
                                            <input type="hidden" class="form-control" id="user" name="user[]" value="<?php echo session('idUsuario')?>">
                                        </div>
                                    </td>
                                    <td class="eliminar-Filasl"><input type="button" value="-"></td>
                                </tr>
                            </tbody>
                        </table>
                        <button id="agregar_Filas" name="agregar-Filas" type="button" class="btn btn-warning"> + </button>
                    </div>
                    <button  name="z" type="button" class="btn btn-success" id = "z">Guardar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </form>
            </div>
        </div>
     </div>  
</div>