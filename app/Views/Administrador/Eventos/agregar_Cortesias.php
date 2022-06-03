<!--MODAL AGREGAR ATRACCIONES-->
<div class="modal fade" id="tarjetas_Cortesia" style="color:black;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tarjetas de Cortesía</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" name="formulario_Taquilla_Evento" id="formulario_Cortesias_Evento">
                    <div class="table table-striped table-responsive">
                        <table id="agregar_Cortesias" class="table table-bordered">
                            <thead>
                                <th scope="col" style="vertical-align: middle;"></th>
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
                <hr>
                <!--TABLA DE LISTADOS-->
                <div class="table table-striped table-responsive">
                    <table id="tablaTaquillas" class="table table-bordered">
                        <thead>
                        <th></th>
                        <th scope="col" style="text-align: center; vertical-align: middle;">Cantidad</th>
                        <th scope="col" style="text-align: center; vertical-align: middle;">Folio Inicial</th>
                        <th scope="col" style="text-align: center; vertical-align: middle;">Folio Final</th>
                        <th scope="col" style="text-align: center; vertical-align: middle;">Usuario</th>
                        <th scope="col" style="text-align: center; vertical-align: middle;">Fecha</th>
                        <th scope="col" style="text-align: center; vertical-align: middle;">Descripcion</th>
                        </thead>
                        <tbody id = "taquillasEvento">
                        </tbody>
                    </table>
                </div>
            </div>                 
        </div>
    </div>
</div>