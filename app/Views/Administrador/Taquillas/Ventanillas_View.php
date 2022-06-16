<!-- Modalde ventanillas activas -->
<div class="modal hide fade" id="modal_Ventanilla_Activa" style="color:black; overflow-y: scroll;" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ventanillas Activas</h4>
                <button type="button" class="close" data-dismiss="modal" onclick="cerrar">&times;</button>
            </div>
            <div class="modal-body">
                    <div class="table table-striped table-responsive">
                        <table id="tabla_Ventanillas_Activas" class="table table-border">
                            <thead>
                                <tr>
                                    <th colspan="6"><center>Ventanillas Activas</center></th>
                                </tr>
                                <tr>
                                    <th scope="col" style="text-align: center; vertical-align:middle;">Ventanilla</th>
                                    <th scope="col" style="text-align: center; vertical-align:middle;">Taquillero</th>
                                    <th scope="col" style="text-align: center; vertical-align:middle;">Efectivo</th>
                                    <th scope="col" style="text-align: center; vertical-align:middle;">Tarjeta</th>
                                    <th scope="col" style="text-align: center; vertical-align:middle;">Hora de Apertura</th>
                                </tr>
                            </thead>
                            <tbody id="body_Ventanillas_Activas">
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal de ventanillas inactivas -->
<div class="modal fade" id="modal_Ventanilla_Inactiva" style="color:black;" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ventanillas Inactivas</h4>
                <button type="button" class="close" data-dismiss="modal" onclick="cerrar">&times;</button>
            </div>
            <div class="modal-body">
                <div class="table table-striped table-responsive">
                    <table id="tabla_Ventanillas_Inactivas" class="table table-border">
                        <thead>
                            <tr>
                                <th colspan="8"><center>Ventanillas Inactivas</center></th>
                            </tr>
                            <tr>
                                <th scope="col" style="text-align: center; vertical-align:middle;">Status</th>
                                <th scope="col" style="text-align: center; vertical-align:middle;">Ventanilla</th>
                                <th scope="col" style="text-align: center; vertical-align:middle;">Taquillero</th>
                                <th scope="col" style="text-align: center; vertical-align:middle;">Efectivo Total</th>
                                <th scope="col" style="text-align: center; vertical-align:middle;">Tarjeta Total</th>
                                <th scope="col" style="text-align: center; vertical-align:middle;">Tarjetas Vendidas</th>
                                <th scope="col" style="text-align: center; vertical-align:middle;">Hora de Apertura</th>
                                <th scope="col" style="text-align: center; vertical-align:middle;">Hora de Cierre</th>
                            </tr>
                        </thead>
                        <tbody id="body_Ventanillas_Inactivas">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>