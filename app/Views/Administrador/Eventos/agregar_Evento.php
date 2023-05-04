<!--MODAL AGREGAR EVENTO-->
<div class="modal fade" id="myModal" style="color:black;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar Evento</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" name="formulario" id="formularioAgregarEvento">
                    
                    <div class="table table-striped table-responsive">
                        <table id="tabla_Evento" class ="table table-bordered">
                            <tbody>
                                <tr class="a-Eventos">
                                    <td>
                                        <div class="form-group">
                                            <input type="hidden" id="id_Arreglo" name="id_Arreglo[]" value="0">
                                        </div>
                                        <div class="form-group">
                                            <label for="nombre">Nombre</label>
                                            <input class="form-control" type="text" name = "Nombre[]"  id="Nombre" required placeholder="Nombre"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="direccion">Dirección</label>
                                            <input class="form-control" type="text" name="Direccion[]"  id="Direccion" required placeholder="Dirección"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="ciudad">Ciudad</label>
                                            <input class="form-control" type="text" name="Ciudad[]"  id="Ciudad" required placeholder="Ciudad"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="estado">Estado</label>
                                            <input class="form-control" type="text" name="Estado[]"  id="Estado" required placeholder="Estado"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="costo_Tarjeta">Costo por tarjeta</label>
                                            <input class="form-control" type="number" name="costo_Tarjeta[]" id="costo_Tarjeta" required placeholder="Costo">
                                        </div>
                                        <div class="form-group">
                                            <label for="estado">Equivalencia de pesos a creditos</label>
                                            <input class="form-control" type="number" name="pesos[]"  id="pesos" required placeholder="Pesos"/>
                                            <br>
                                            <input class="form-control" type="number" name="creditos[]"  id="creditos" required placeholder="Creditos"/>
                                        </div>
                                        <!--TABLA DE FECHAS-->
                                        <div class="form-group table table-responsive">
                                            <table class="table table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td id="evento0">
                                                            <div class="container" id="fechas_Evento">
                                                                <center><label>Días</label></center>
                                                                <br>
                                                                <label for="inicioEvento0">Hora de Inicio</label>
                                                                <input id="inicioEvento0" class="form-control" type="datetime-local" value="">
                                                                <br>
                                                                <label for="finEvento0">Hora de Finalizacion</label>
                                                                <input id="finEvento0" class="form-control" type="datetime-local" value="">
                                                                <br>
                                                                <button  class="agregar_Fecha_Evento btn btn-success" type="button">Añadir Fecha</button></center><br>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <table id="tabla_Fechas_Evento0" class="table table-bordered table-hover">
                                                                <thead>
                                                                    <th style="text-align: center; vertical-align: middle;">Hora Inicial</th>
                                                                    <th style="text-align: center; vertical-align: middle;">Hora Final</th>
                                                                    <th style="text-align: center; vertical-align: middle;">Eliminar</th>
                                                                </thead>
                                                                <tbody id="cuerpo_Fechas_Evento0"></tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </td>
                                    <td class="eliminarAt"><input type="button" value="-"/></td>
                                </tr>
                            </tbody>
                        </table>
                        <button id="duplicar_Registro" name="nuevaAt" type="button" class="btn btn-warning"><i class="bi bi-plus-circle"></i>&nbsp;Nuevo Registro </button>
                    </div>
                    <div class="modal-footer">
                        <button name="a" type="button" class="btn btn-success" id="agregarEvento">Agregar </button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>