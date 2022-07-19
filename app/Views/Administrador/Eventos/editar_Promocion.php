<div class="modal" id="editar_Descuento" style="color:black;">
    <div>
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
                        <table class="table table-border">
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="container" id="fechas_Descuentos">
                                            <center><label>Días</label></center>
                                            <input id="td_Descuento" type="hidden" value="">
                                            <input id="renglon_Descuento" type="hidden" value="">
                                            <input id="idFechaDosxUno" type="hidden" value="">
                                            <br>
                                            <label for="editar_Inicio_Descuento">Hora de Inicio</label>
                                            <input id="editar_Inicio_Descuento" class="form-control" type="datetime-local">
                                            <br>
                                            <label for="editar_Fin_Descuento">Hora de Finalizacion</label>
                                            <input id="editar_Final_Descuento" class="form-control" type="datetime-local">
                                            <br>
                                            <button id="editar_Horario_Descuento" class="btn btn-success" type="button">Modificar</button></center><br>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="table-wrapper">
                                            <table id="tabla_Editar_Fechas_Descuento" class="table table-border table-hover">
                                                <tr>
                                                    <th style="text-align: center; vertical-align: middle;">Hora Inicial</th>
                                                    <th style="text-align: center; vertical-align: middle;">Hora Final</th>
                                                    <th style="text-align: center; vertical-align: middle;">Editar</th>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button  id="enviar_Modificaciones" name="enviar" type="button" class="btn btn-succes actualizar_Fechas_Promocion">Actualizar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="editar_Pulsera" style="color:black;">
    <div>
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
                        <table class="table table-border">
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="container" id="fechas_Pulsera">
                                            <center><label>Días</label></center>
                                            <input id="td_Pulsera" type="hidden" value="">
                                            <input id="renglon_Pulsera" type="hidden" value="">
                                            <input id="idFechaPulseraMagica" type="hidden" value="">
                                            <br>
                                            <label for="inicioPulsera">Hora de Inicio</label>
                                            <input id="editar_Inicio_Pulsera" class="form-control" type="datetime-local">
                                            <br>
                                            <label for="finPulsera">Hora de Finalizacion</label>
                                            <input id="editar_Final_Pulsera" class="form-control" type="datetime-local">
                                            <br>
                                            <label for="precioPulsera">Precio</label>
                                            <input id="editar_Precio_Pulsera" class="form-control" type="number" placeholder="Ingresa un precio">
                                            <br>
                                            <button id="editar_Horario_Pulsera" class="btn btn-success" type="button">Modificar</button></center><br>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="table table-wrapper">
                                            <table id="tabla_Editar_Fechas_Pulsera" class="table table-border table-hover">
                                                <tr>
                                                    <th style="text-align: center; vertical-align: middle;">Hora Inicial</th>
                                                    <th style="text-align: center; vertical-align: middle;">Hora Final</th>
                                                    <th style="text-align: center; vertical-align: middle;">Precio</th>
                                                    <th style="text-align: center; vertical-align: middle;">Editar</th>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button name="enviar" type="button" class="btn btn-succes actualizar_Fechas_Promocion">Actualizar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="editar_Juego" style="color:black;">
    <div>
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
                        <table class="table table-border">
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="container" id="fechas_Juegos">
                                            <center><label>Días</label></center>
                                            <input id="td_Juego" type="hidden"  value="">
                                            <input id="renglon_Juego" type="hidden"  value="">
                                            <input id="idFechaJuegosGratis" type="hidden" value="">
                                            <br>
                                            <label for="">Hora de Inicio</label>
                                            <input id="editar_Inicio_Juego" class="form-control" type="datetime-local">
                                            <br>
                                            <label for="finJuegos">Hora de Finalizacion</label>
                                            <input id="editar_Final_Juego" class="form-control" type="datetime-local">
                                            <br>
                                            <button id="editar_Horario_Juego" class="btn btn-success" type="button">Modificar</button></center><br>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="table-wrapper">
                                            <table id="tabla_Editar_Fechas_Juego" class="table table-border table-hover">
                                                <tr>
                                                    <th style="text-align: center; vertical-align: middle;">Hora Inicial</th>
                                                    <th style="text-align: center; vertical-align: middle;">Hora Final</th>
                                                    <th style="text-align: center; vertical-align: middle;">Editar</th>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button name="enviar" type="button" class="btn btn-succes actualizar_Fechas_Promocion">Actualizar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="editar_Credito" style="color:black;">
    <div>
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar Creditos de Cortesia</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" name="formulario_Editar_Descuento" id="formulario_Editar_Descuento">
                    <div class="from-group" id="nombre_Cortesias">
                        <label>Nombre de la promoción</label>
                        <input id="nombre_Editado_Creditos" type="text" class="form-control" readonly>
                        <br>
                    </div>
                    <div class="from-group" id="precio_Cortesia">
                    </div>
                    <div class="from-group" id="creditos_Cortesia">
                    </div>
                    <div class="from-group table table-responsive">
                        <table class="table table-border">
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="container" id="fechas_Cortesias">
                                            <center><label>Días</label></center>
                                            <input id="td_Credito" type="hidden" value="">
                                            <input id="renglon_Credito" type="hidden"  value="">
                                            <input id="idFechaCreditosCortesia" type="hidden" value="">
                                            <br>
                                            <label for="inicioCortesias">Hora de Inicio</label>
                                            <input id="editar_Inicio_Credito" class="form-control" type="datetime-local">
                                            <br>
                                            <label for="finCortesias">Hora de Finalizacion</label>
                                            <input id="editar_Final_Credito" class="form-control" type="datetime-local">
                                            <br>
                                            <label for="precioCortesias">Precio</label>
                                            <input id="editar_Precio_Credito" class="form-control" type="number" placeholder="Ingresa un precio">
                                            <br>
                                            <label for="creditosI">Creditos</label>
                                            <input id="editar_Creditos" name="creditosI" class="form-control" type="number" placeholder="Creditos cortesia">
                                            <br>
                                            <button id="editar_Horario_Credito" class="btn btn-success" type="button">Agregar</button></center><br>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="table-wrapper">
                                            <table id="tabla_Editar_Fechas_Creditos" class="table table-border table-hover">
                                                <tr>
                                                    <th style="text-align: center; vertical-align: middle;">Hora Inicial</th>
                                                    <th style="text-align: center; vertical-align: middle;">Hora Final</th>
                                                    <th style="text-align: center; vertical-align: middle;">Precio</th>
                                                    <th style="text-align: center; vertical-align: middle;">Creditos</th>
                                                    <th style="text-align: center; vertical-align: middle;">Eliminar</th>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button name="enviar" type="button" class="btn btn-succes actualizar_Fechas_Promocion">Actualizar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>