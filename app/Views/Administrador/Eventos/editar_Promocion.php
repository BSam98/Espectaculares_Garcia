<div class="modal fade" id="editar_Descuento" style="color:black;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar Descuento</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" name="formulario_Editar_Descuento" id="formulario_Editar_Descuento">
                    <div class="from-group" id="nombre_Descuentos">
                        <label for="promocionesDescuentos">Nombre de la promocion</label>
                        <input id="nombre_Editado_Descuento" type="text" class="form-control" readonly>
                        <br>
                    </div>
                    <div class="from-group" id="precio_Descuentos">
                        <label for="cantidad">Cantidad de personas por pase</label>
                        <input type="number" class="form-control" name="cantidadPersonas" id="cantidad_Editada_Descuentos" placeholder="Personas por pase" value="" readonly>
                        <br>
                        <label for="cantidad_Boletos">Cantidad de pases a cobrar</label>
                        <input type="number" class="form-control" name="cantidad_Boletos" id="boletos_Editada_Descuentos" placeholder="Boletos a cobrar" value="" readonly>
                        <br>
                    </div>
                    <div class="from-group table table-responsive">
                        <table>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="container" id="fechas_Descuentos">
                                            <center><label>Días</label></center>
                                            <br>
                                            <label for="editar_Inicio_Descuento">Hora de Inicio</label>
                                            <input id="editar_Inicio_Descuento" class="form-control" type="datetime-local">
                                            <br>
                                            <label for="editar_Fin_Descuento">Hora de Finalizacion</label>
                                            <input id="editar_Final_Descuento" class="form-control" type="datetime-local">
                                            <br>
                                            <button id="adicionarDescuento" class="btn btn-success" type="button">Agregar</button></center><br>
                                        </div>
                                    </td>
                                    <td>
                                        <table id="tabla_Editar_Fechas_Descuento" class="table table-bordered table-hover">
                                            <tr>
                                                <th>Hora Inicial</th>
                                                <th>Hora Final</th>
                                                <th>Editar</th>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button name="enviar" type="button" class="btn btn-succes">Actualizar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editar_Pulsera" style="color:black;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar Pulsera Magica</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" name="formulario_Editar_Descuento" id="formulario_Editar_Descuento">
                    <div class="from-group" id="nombre_Pulsera">
                        <label>Nombre de la promoción</label>
                        <input id="nombre_Editado_Pulsera" type="text" class="form-control" readonly>
                        <br>
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
                                            <input id="editar_Inicio_Pulsera" class="form-control" type="datetime-local">
                                            <br>
                                            <label for="finPulsera">Hora de Finalizacion</label>
                                            <input id="editar_Fin_Pulsera" class="form-control" type="datetime-local">
                                            <br>
                                            <label for="precioPulsera">Precio</label>
                                            <input id="editar_Precio_Pulsera" class="form-control" type="number" placeholder="Ingresa un precio">
                                            <br>
                                            <button id="adicionarPulsera" class="btn btn-success" type="button">Agregar</button></center><br>
                                        </div>
                                    </td>
                                    <td>
                                        <table id="tabla_Editar_Fechas_Pulsera" class="table table-bordered table-hover">
                                            <tr>
                                                <th>Hora Inicial</th>
                                                <th>Hora Final</th>
                                                <th>Precio</th>
                                                <th>Editar</th>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button name="enviar" type="button" class="btn btn-succes">Actualizar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editar_Juego" style="color:black;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar Juegos Gratis</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" name="formulario_Editar_Descuento" id="formulario_Editar_Descuento">
                    <div class="from-group" id="nombre_Juegos">
                        <label>Nombre de la Promoción</label>
                        <input id="nombre_Editado_Juego" text="" class="form-control" readonly>
                        <br>
                    </div>
                    <div class="from-group" id="precio_Juegos">
                    </div>
                    <div class="from-group table table-responsive">
                        <table>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="container" id="fechas_Juegos">
                                            <center><label>Días</label>
                                            <br>
                                            <label for="">Hora de Inicio</label>
                                            <input id="editar_Inicio_Juego" class="form-control" type="datetime-local">
                                            <br>
                                            <label for="finJuegos">Hora de Finalizacion</label>
                                            <input id="editar_Final_Juego" class="form-control" type="datetime-local">
                                            <br>
                                            <button id="adicionarJuegos" class="btn btn-success" type="button">Agregar</button></center><br>
                                        </div>
                                    </td>
                                    <td>
                                        <table id="tabla_Editar_Fechas_Juego" class="table table-bordered table-hover">
                                            <tr>
                                                <th>Hora Inicial</th>
                                                <th>Hora Final</th>
                                                <th>Editar</th>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button name="enviar" type="button" class="btn btn-succes">Actualizar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editar_Credito" style="color:black;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar Creditos de Cortesia</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" name="formulario_Editar_Descuento" id="formulario_Editar_Descuento">
                    <div class="from-group" id="nombre_Cortesias">
                        <label>Nombre de la promoción</label>
                        <input type="" class="form-control">
                        <br>
                    </div>
                    <div class="from-group" id="precio_Cortesia">
                        <label for="precio_Cortesias">Precio de la Promoción</label>
                        <input type="number" class="form-control" name="precio_Cortesias" id="precio_Cortesias" placeholder="Precio Promoción" value="">
                        <br>
                    </div>
                    <div class="from-group" id="creditos_Cortesia">
                        <label for="creditos_Cortesias">Creditos de la promoción</label>
                        <input type="number" class="form-control" name="creditos_Cortesias" id="creditos_Cortesias" placeholder="Creditos Promoción">
                        <br>
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
                                            <br>
                                            <label for="finCortesias">Hora de Finalizacion</label>
                                            <input id="finCortesias" class="form-control" type="datetime-local">
                                            <br>
                                            <label for="precioCortesias">Precio</label>
                                            <input id="precioCortesias" class="form-control" type="number" placeholder="Ingresa un precio">
                                            <br>
                                            <label for="creditosI">Creditos</label>
                                            <input id="creditosI" name="creditosI" class="form-control" type="number" placeholder="Creditos cortesia">
                                            <br>
                                            <button id="adicionarCreditos" class="btn btn-success" type="button">Agregar</button></center><br>
                                        </div>
                                    </td>
                                    <td>
                                        <table id="tabla_Fechas_Cortesias" class="table table-bordered table-hover">
                                            <tr>
                                                <th>Hora Inicial</th>
                                                <th>Hora Final</th>
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
                    <div class="modal-footer">
                        <button name="enviar" type="button" class="btn btn-succes">Actualizar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>