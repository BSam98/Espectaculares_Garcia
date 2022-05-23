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
                        <table id="tabla_Evento" class ="table table-border">
                            <tbody>
                                <tr class="a-Eventos">
                                    <td>
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
                                            <label for="fechas">Fechas</label>
                                            <table class="table table-bordered">
                                                <th>Fecha de Inicio</th>
                                                <th>Fecha de Termino</th>
                                                <tbody>
                                                    <td>
                                                        <input class="form-control" type="date" name="fechaInicio[]"  id="fechaInicio" >
                                                    </td>
                                                    <td>
                                                        <input class="form-control" type="date" name="fechaFinal[]"  id="fechaTermino" >
                                                    </td>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="form-group">
                                            <label for="estado">Equivalencia de pesos a creditos</label>
                                            <input class="form-control" type="number" name="pesos[]"  id="pesos" required placeholder="Pesos"/>
                                            <br>
                                            <input class="form-control" type="number" name="creditos[]"  id="creditos" required placeholder="Creditos"/>
                                        </div>
                                    </td>
                                    <td class="eliminarAt"><input type="button" value="-"/></td>
                                </tr>
                            </tbody>
                        </table>
                        <button id="duplicar_Registro" name="nuevaAt" type="button" class="btn btn-warning"><i class="bi bi-plus-circle"></i>&nbsp;Nuevo Registro </button>
                    </div>
                    <div class="modal-footer">
                        <button name="a" type="submit" class="btn btn-success" id="agregarEvento">Agregar </button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>