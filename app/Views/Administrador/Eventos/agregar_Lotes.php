<!--MODAL AGREGAR ATRACCIONES-->
<div class="modal fade" id="AgregarL" style="color:black;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tarjetas</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data">
                    <fieldset>
                        <nav>
                            <div class="nav nav-tabs" id="nav-lote" role="tablist">
                                <a class="nav-link active" id="nav-agregar-lote-tab" data-toggle="tab" href="#nav-agregar-lote" role="tab" aria-controls="nav-agregar-lote" aria-selected="true">Agregar Lote</a>
                                <a class="nav-link" id="nav-ver-lotes-tab" data-toggle="tab" href="#nav-ver-lote" role="tab" aria-controls="nav-ver-lote" aria-selected="false">Ver Lotes</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabLote">
                            <div class="tab-pane fade show active" id="nav-agregar-lote" role="tabpanel" aria-labelledby="nav-agregar-lote-tab">
                                <div class="modal-body">
                                    <form enctype="multipart/form-data" name="formularioAgregarTarjetasEvento" id="formularioAgregarTarjetasEvento">
                                        <div class="table table-striped table-responsive">
                                        <!--Tabla AGREGAR LOTES-->
                                            <input type="hidden" class="form-control" id = "idEventoLote" name = "idEventoLote" value="">
                                            <table class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="form-group">
                                                                <label>Nombre del Lote</label>
                                                                <select class="form-control" name="idLote" id="idLote">
                                                                    <option value="0">Selecciona un lote</option>
                                                                    <?php foreach ($Lotes as $key => $dL) : ?>
                                                                        <option value ="<?=$dL->idLote?>"><?= $dL-> Nombre?></option>
                                                                    <?php endforeach ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Número de folios disponibles</label>
                                                                <textarea id="folios" name="folios" cols="30" rows="10" class="form-control" readonly></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Folio Inicial</label>
                                                                <input type="number" class="form-control" placeholder="Folio Inicial" id="folioInicial" name = "folioInicial">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Folio Final</label>
                                                                <input type="number" class="form-control" placeholder="Folio Final" id = "folioFinal" name = "folioFinal">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <button id="asociarTarjetas" name="asociarTarjetas" type="button" class="btn btn-success">Guardar</button>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-ver-lote" role="tabpanel" aria-labelledby="nav-ver-lote-tab">
                                <div class="modal-body">
                                    <!--TABLA DE LOTES-->
                                    <div class="table table-striped table-responsive">
                                        <table id="tabla_Tarjetas_Evento" class="table table-bordered"><!--tenia id="tablas"-->
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
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
                <button id="cerrar" class="btn btn-danger">Cerrar</button>
            </div>                 
        </div>
    </div>
</div>
 