<!--MODAL AGREGAR ATRACCIONES-->
<div class="modal fade" id="AgregarL" style="color:black;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar Tarjetas</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="" enctype="multipart/form-data" name="formulario" id="formulario">
                    <div class="table table-striped table-responsive">
                    <!--Tabla AGREGAR LOTES-->
                        <table class="table table-bordered">
                            <thead>
                            <!--Titulos de la tabla-->
                                <th scope="col" style="vertical-align: middle;">Nombre del Lote</th>
                                <th scope="col" style="vertical-align: middle;">Número de folios disponibles</th>
                                <th scope="col" style="vertical-align: middle;">Folio Inicial</th>
                                <th scope="col" style="vertical-align: middle;">Folio Final</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <select class="form-control" name="idLote" id="idLote">
                                            <option value="0">Selecciona un lote</option>
                                            <?php foreach ($Lotes as $key => $dL) : ?>
                                                <option value ='idLote=<?= $dL->idLote?>'><?= $dL-> Nombre?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </td>
                                    <td><input type="text" class="form-control" name="foliosDisp" id="foliosDisp" value="" disabled></td>
                                    <td><input type="number" class="form-control" name="folioI" id="folioI" placeholder="Folio Inicial"></td>
                                    <td><input type="number" class="form-control" name="folioF" id="folioF" placeholder="Folio Final"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <button id="save" name="save" type="button" class="btn btn-success">Guardar</button>
                </form><hr>

                <!--TABLA DE LOTES-->
                <div class="table table-striped table-responsive">
                    <table id="searchL" class="table table-bordered"><!--tenia id="tablas"-->
                        <thead>
                            <th></th>
                            <th scope="col" style="vertical-align: middle;">Nombre de la tarjeta</th>
                            <th scope="col" style="vertical-align: middle;">Folio</th>
                            <th scope="col" style="vertical-align: middle;">Fecha de Activacíon</th>
                            <th scope="col" style="vertical-align: middle;">Status</th>
                            <th scope="col" style="vertical-align: middle;">Tipo</th>
                        </thead>
                        <tbody id ="tarjetasEvento">
                        </tbody>
                    </table>
                </div>
                <button id="cerrar" class="btn btn-danger">Cerrar</button>
            </div>                 
        </div>
    </div>
</div>
 