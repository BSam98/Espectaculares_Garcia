
        <!--Contenedor Principal-->
        <div Class = "contenedorPrincipal">

            <div class="modal fade" id="tarjetas_Aso" style="color:black;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Tarjetas Asociadas</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body" id ="contenedorTarjetas">
                            <div class="container">
                                <table id="example" class="table table-bordered border-primary  display">
                                    <thead>
                                            <th></th>
                                            <th>Nombre</th>
                                            <th>Saldo</th>
                                            <th>Creditos</th>
                                            <th>Creditos de Cortesia</th>
                                            <th>Fecha de Recarga</th>
                                            <th>Vigencia de Saldo</th>
                                            <th>Status</th>
                                    </thead>
                                    <!--La tabla se crea en el archivo clientes.js-->
                                    <tbody id = "datosTarjetas">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>