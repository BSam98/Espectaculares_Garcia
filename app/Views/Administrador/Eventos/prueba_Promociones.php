<div class="modal fade" id="Promociones" style="color:black;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar Promociones</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" name="formulario_Agregar_Promocion_Evento" id="formulario_Agregar_Promocion_Evento">
                    <input type="hidden" id="idEventoPromociones" value="">
                    <fieldset id="fieldset">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Descuentos</a>
                                <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Pulsera Magica</a>
                                <a class="nav-link" id="nav-tres-tab" data-toggle="tab" href="#nav-tres" role="tab" aria-controls="nav-tres" aria-selected="false">Juegos Gratis</a>
                                <a class="nav-link" id="nav-cuatro-tab" data-toggle="tab" href="#nav-cuatro" role="tab" aria-controls="nav-cuatro" aria-selected="false">Creditos Cortesia</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="table table-striped table-responsive">
                                    <table class="table table-borderd" id="tabla_Descuentos">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="from-group" id="nombre_Descuentos">
                                                    </div>
                                                    <div class="from-group" id="precio_Descuentos">
                                                        <label for="cantidad">Cantidad de personas por pase</label>
                                                        <input type="number" class="form-control" name="cantidadPersonas" id="cantidadPersonas" placeholder="Personas por pase" value="">
                                                        <label for="cantidad_Boletos">Cantidad de pases a cobrar</label>
                                                        <input type="number" class="form-control" name="cantidad_Boletos" id="cantidad_Boletos" placeholder="Boletos a cobrar" value="">
                                                    </div>
                                                    <div class="from-group" id="creditos_Descuentos">
                                                    </div>
                                                    <div class="from-group table table-responsive">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <div class="container" id="fechas_Descuentos">
                                                                            <center><label>Días</label></center>
                                                                            <br>
                                                                            <label for="inicioDescuento">Hora de Inicio</label>
                                                                            <input id="inicioDescuento" class="form-control" type="datetime-local">
                                                                            <label for="finDescuento">Hora de Finalizacion</label>
                                                                            <input id="finDescuento" class="form-control" type="datetime-local">
                                                                            <br>
                                                                            <button id="adicionarDescuento" class="btn btn-success" type="button">Agregar</button></center><br>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <table id="tabla_Fechas_Desceuntos" class="table table-bordered table-hover">
                                                                            <tr>
                                                                                <th>Hora Inicio</th>
                                                                                <th>Hora Fin</th>
                                                                                <th>Eliminar</th>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <table class="table table-borderd">
                                                    <thead>
                                                        <th></th>
                                                        <th>Promocion</th>
                                                        <th>Cantidad</th>
                                                        <th>Precio</th>
                                                    </thead>
                                                </table>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <div class="table table-striped table-responsive">
                                <table class="table table-borderd" id="tabla_Pulseras">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="from-group" id="nombre_Pulsera">
                                                    </div>
                                                    <div class="from-group" id="precio_Pulseras">
                                                        <label for="precio_Pulsera">Precio de la Promoción</label>
                                                        <input type="number" class="form-control" name="precio_Cortesias" id="precio_Pulsera" placeholder="Precio Promoción" value="">
                                                    </div>
                                                    <div class="from-group" id="creditos_Pulsera">
                                                    </div>
                                                    <div class="from-group table table-responsive">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <div class="container" id="fechas_Pulsera">
                                                                            <center><label>Días</label>
                                                                            <br>
                                                                            <label for="inicioPulsera">Hora de Inicio</label>
                                                                            <input id="inicioPulsera" class="form-control" type="datetime-local">
                                                                            <label for="finPulsera">Hora de Finalizacion</label>
                                                                            <input id="finPulsera" class="form-control" type="datetime-local">
                                                                            <label for="precioPulsera">Precio</label>
                                                                            <input id="precioPulsera" class="form-control" type="number" placeholder="Ingresa un precio">
                                                                            <br>
                                                                            <button id="adicionarPulsera" class="btn btn-success" type="button">Agregar</button></center><br>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <table id="tabla_Fechas_Pulsera" class="table table-bordered table-hover">
                                                                            <tr>
                                                                                <th>Hora Inicio</th>
                                                                                <th>Hora Fin</th>
                                                                                <th>Precio</th>
                                                                                <th>Eliminar</th>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <table class="table table-borderd">
                                                    <thead>
                                                        <th></th>
                                                        <th>Promocion</th>
                                                        <th>Cantidad</th>
                                                        <th>Precio</th>
                                                        
                                                    </thead>
                                                </table>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-tres" role="tabpanel" aria-labelledby="nav-tres-tab">
                                <div class="table table-striped responsive">
                                <table class="table table-borderd" id="tabla_Juegos">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="from-group" id="nombre_Juegos">
                                                    </div>
                                                    <div class="from-group" id="precio_Juegos">
                                                    </div>
                                                    <div class="from-group" id="creditos_Juegos">
                                                    </div>
                                                    <div class="from-group table table-responsive">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <div class="container" id="fechas_Juegos">
                                                                            <center><label>Días</label>
                                                                            <br>
                                                                            <label for="inicioJuegos">Hora de Inicio</label>
                                                                            <input id="inicioJuegos" class="form-control" type="datetime-local">
                                                                            <label for="finJuegos">Hora de Finalizacion</label>
                                                                            <input id="finJuegos" class="form-control" type="datetime-local">
                                                                            <label for="precioJuegos">Precio</label>
                                                                            <input id="precioJuegos" class="form-control" type="number" placeholder="Ingresa un precio">
                                                                            <br>
                                                                            <button id="adicionarJuegos" class="btn btn-success" type="button">Agregar</button></center><br>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <table id="tabla_Fechas_Juegos" class="table table-bordered table-hover">
                                                                            <tr>
                                                                                <th>Hora Inicio</th>
                                                                                <th>Hora Fin</th>
                                                                                <th>Precio</th>
                                                                                <th>Eliminar</th>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <table class="table table-borderd">
                                                    <thead>
                                                        <th></th>
                                                        <th>Promocion</th>
                                                        <th>Cantidad</th>
                                                        <th>Precio</th>
                                                    </thead>
                                                </table>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-cuatro" role="tabpanel" aria-labelledby="nav-cuatro-tab">
                                <div class="table table-striped responsive">
                                <table class="table table-borderd" id="tabla_Cortesias">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="from-group" id="nombre_Cortesias">
                                                    </div>
                                                    <div class="from-group" id="precio_Cortesias">
                                                        <label for="precio_Promocion">Precio de la Promoción</label>
                                                        <input type="number" class="form-control" name="precio_Promocion" id="precio_Promocion" placeholder="Precio Promoción" value="">
                                                    </div>
                                                    <div class="from-group" id="creditos_Cortesias">
                                                        <label for="creditos_Promocion">Creditos de la promoción</label>
                                                        <input type="number" class="form-control" name="creditos_Promocion" id="creditos_Promocion" placeholder="Creditos Promoción">
                                                    </div>
                                                    <div class="from-group table table-responsive">
                                                        <table>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <div class="container" id="fechas_Cortesias">
                                                                            <center><label>Días</label>
                                                                            <br>
                                                                            <label for="inicioCortesias">Hora de Inicio</label>
                                                                            <input id="inicioCortesias" class="form-control" type="datetime-local">
                                                                            <label for="finCortesias">Hora de Finalizacion</label>
                                                                            <input id="finCortesias" class="form-control" type="datetime-local">
                                                                            <label for="precioCortesias">Precio</label>
                                                                            <input id="precioCortesais" class="form-control" type="number" placeholder="Ingresa un precio">
                                                                            <label for="creditosI">Creditos</label>
                                                                            <input id="creditosI" name="creditosI" class="form-control" type="number" placeholder="Creditos cortesia">
                                                                            <br>
                                                                            <button id="adicionarJuegos" class="btn btn-success" type="button">Agregar</button></center><br>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <table id="tabla_Fechas_Cortesias" class="table table-bordered table-hover">
                                                                            <tr>
                                                                                <th>Hora Inicio</th>
                                                                                <th>Hora Fin</th>
                                                                                <th>Precio</th>
                                                                                <th>Creditos</th>
                                                                                <th>Eliminar</th>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <table class="table table-borderd">
                                                    <thead>
                                                        <th></th>
                                                        <th>Promocion</th>
                                                        <th>Cantidad</th>
                                                        <th>Precio</th>
                                                        <th>Hora de Inicio</th>
                                                        <th>Hora de Termino</th>
                                                    </thead>
                                                </table>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
                <hr>
            </div>
        </div>
    </div>
</div>