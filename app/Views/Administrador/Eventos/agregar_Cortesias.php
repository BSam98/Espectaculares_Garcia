<!--MODAL AGREGAR ATRACCIONES-->
<div class="modal fade" id="tarjetas_Cortesia" style="color:black;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tarjetas de Cortesía</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                    <fieldset id="primer_Fieldset_Cortesia">
                        <nav>
                            <div class="nav nav-tabs" id="nav-cortesia-1" role="tablist">
                                <a class="nav-link active" id="nav-agregar-cortesia-tab" data-toggle="tab" href="#nav-agregar-cortesia" role="tab" ari-controls="nav-agregar-cortesia" aria-selected="true">Agregar Cortesias</a>
                                <a class="nav-link" id="nav-ver-cortesia-tab" data-toggle="tab"  href="#nav-ver-cortesia" role="tab" ari-controls="nav-ver-cortesia" aria-selected="false">Ver historial</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-cortesia">
                            <div class="tab-pane fade show active" id="nav-agregar-cortesia" role="tabpanel" aria-labelledby="nav-agregar-cortesia-tab">
                                <div class="modal-body">
                                    <form enctype="multipart/form-data" name="formulario_Taquilla_Evento" id="formulario_Cortesias_Evento">
                                        <div class="table table-striped table-responsive">
                                            <table id="agregar_Cortesias" class="table table-bordered">
                                                <thead>
                                                    <th id="idCortesia" scope="col" style="vertical-align: middle;" value=""></th>
                                                </thead>
                                                <tbody id="cuerpo_agregar_Cortesias">
                                                    <tr>
                                                        <td>
                                                            <div id="lote_Cortesias0" class="form-group">
                                                            </div>
                                                            <div id="folios_Disponibles0" class="form-group">
                                                                <label for="folios_Cortesia">Folios Diposnibles</label>
                                                                <br>
                                                                <textarea id="folios_Cortesia" name="folios_Cortesia[]" cols="70",rows="70" class="form-control" readonly>
                                                                </textarea>
                                                            </div>
                                                            <div id="folios_Seleccionados0" class="form-group">
                                                                <label for="b">Folio Inicial</label>
                                                                <input id="folio_Inicial_Cortesias" name="folio_Inicial_Cortesias[]" class="form-control">
                                                                <br>
                                                                <label for="c">Folio Final</label>
                                                                <input id="folio_Final_Cortesias" name="folio_Final_Cortesias[]" class="form-control">
                                                            </div>
                                                            <div id="creditos_Otorgados0" class="form-group">
                                                                <label>Creditos a otorgar</label>
                                                                <input id="creditos_Otorgados" name="creditos_Otorgados[]" class="form-control" type="number">
                                                            </div>
                                                            <div id="descripción_Cortesias0" class="form-group">
                                                                <label>Concepto</label>
                                                                <textarea id="descripcion_Cortesias" name="descripcion_Cortesias[]" cols="10", rows="2" class="form-control"></textarea>
                                                            </div>
                                                        </td>
                                                        <td class="eliminar_Registro_Cortesias"><input type="button" value="-"/></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <button id="agregar_Registro" name="adicional" type="button" class="btn btn-warning"> + </button>
                                        <button id="guardarCortesias" name="guardarTaquilla" type="button" class="btn btn-success">Guardar</button>
                                    </form>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="nav-ver-cortesia" role="tabpanel" aria-labelledby="nav-ver-cortesia-tab">
                                <div class="modal-body">
                                    <form enctype="multipart/form-data">
                                        <!--TABLA DE LISTADOS-->
                                        <div class="table table-striped table-responsive">
                                            <table id="tabla_Tarjetas_Cortesias" class="table table-bordered">
                                                <thead>
                                                <th scope="col" style="text-align: center; vertical-align: middle;"></th>
                                                <th scope="col" style="text-align: center; vertical-align: middle;">Cantidad</th>
                                                <th scope="col" style="text-align: center; vertical-align: middle;">Folio Inicial</th>
                                                <th scope="col" style="text-align: center; vertical-align: middle;">Folio Final</th>
                                                <th scope="col" style="text-align: center; vertical-align: middle;">Usuario</th>
                                                <th scope="col" style="text-align: center; vertical-align: middle;">Fecha</th>
                                                <th scope="col" style="text-align: center; vertical-align: middle;">Descripcion</th>
                                                </thead>
                                                <tbody id = "cuerpo_tabla_tarjetas-cortesias">
                                                </tbody>
                                            </table>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </fieldset>
            </div>                 
        </div>
    </div>
</div>

