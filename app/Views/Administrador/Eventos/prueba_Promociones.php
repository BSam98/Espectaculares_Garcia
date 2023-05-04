<div class="modal" id="Promociones" style="color:black;">
    <div>
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Promociones</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">

                <form enctype="multipart/form-data">

                    <fieldset id="primer_Fieldset">

                        <nav>
                            <div class="nav nav-tabs" id="nav-1" role="tablist">
                                <a class="nav-link active" id="nav-primero-tab" data-toggle="tab" href="#nav-primero" role="tab" aria-controls="nav-primero" aria-selected="true">Agregar Promociones</a>
                                <a class="nav-link" id="nav-segundo-tab" data-toggle="tab" href="#nav-segundo" role="tab" aria-controls="nav-segundo" aria-selected="false">Ver Promociones</a>
                            </div>
                        </nav>

                        <div class="tab-content" id="nav-tabPrimero">

                            <div class="tab-pane fade show active" id="nav-primero" role="tabpanel" aria-labelledby="nav-primero-tab">
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
                                                        <tbody id="contenedor_Nuevos_Descuentos">
                                                            <tr id="contenedor_Descuento_Nuevo_0">
                                                                <td>
                                                                    <div class="from-group" id="nombre_Descuentos_0">
                                                                    </div>
                                                                    <div class="from-group" id="precio_Descuentos_0">
                                                                        <label for="cantidad">Cantidad de personas por pase</label>
                                                                        <input type="number" class="form-control" name="cantidadPersonas0" id="cantidadPersonas0" placeholder="Personas por pase" value="">
                                                                        <br>
                                                                        <label for="cantidad_Boletos0">Cantidad de pases a cobrar</label>
                                                                        <input type="number" class="form-control" name="cantidad_Boletos0" id="cantidad_Boletos0" placeholder="Boletos a cobrar" value="">
                                                                        <br>
                                                                    </div>
                                                                    <div class="from-group table table-responsive">
                                                                        <table class="table table-border">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                        <div class="container" id="fechas_Descuentos_0">
                                                                                            <center><label>Días</label></center>
                                                                                            <br>
                                                                                            <label for="inicioDescuento0">Hora de Inicio</label>
                                                                                            <input id="inicioDescuento0" class="form-control" type="datetime-local">
                                                                                            <br>
                                                                                            <label for="finDescuento0">Hora de Finalizacion</label>
                                                                                            <input id="finDescuento0" class="form-control" type="datetime-local">
                                                                                            <br>
                                                                                            <button class="btn btn-success adicionarDescuento" type="button">Agregar</button></center><br>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="table-wrapper">
                                                                                            <table id="tabla_Fechas_Descuentos_0" class="table table-border table-hover">
                                                                                                <thead>
                                                                                                    <th style="text-align: center; vertical-align: middle;">Fecha</th>
                                                                                                    <th style="text-align: center; vertical-align: middle;">Hora Inicial</th>
                                                                                                    <th style="text-align: center; vertical-align: middle;">Hora Final</th>
                                                                                                    <th style="text-align: center; vertical-align: middle;">Eliminar</th>
                                                                                                </thead>
                                                                                                <tbody id="cuerpo_Fechas_Descuentos_0"></tbody>
                                                                                            </table>
                                                                                        </div>
                                                                                        <br>
                                                                                        <div class="container" id="modificar_Hora_Descuento_0">
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <button id="nuevo_Registro_Promocion_Descuento" type="button" style="float: left;" class="btn btn-warning"><i class="fa fa-plus-circle"></i>&nbsp;Nuevo Registro </button>
                                            </div>

                                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                <div class="table table-striped table-responsive">
                                                    <table class="table table-borderd" id="tabla_Pulseras">
                                                        <tbody id="contenedor_Nuevas_Pulseras">
                                                            <tr id="contenedor_Pulsera_Nueva_0">
                                                                <td>
                                                                    <div class="from-group" id="nombre_Pulsera_0">
                                                                    </div>
                                                                    <div class="from-group" id="precio_Pulseras_0">
                                                                        <label for="precio_Pulsera">Precio de la Promoción</label>
                                                                        <input type="number" class="form-control" name="precio_Pulsera_0" id="precio_Pulsera_0" placeholder="Precio Promoción" value="">
                                                                        <br>
                                                                    </div>
                                                                    <div class="from-group" id="creditos_Pulsera_0">
                                                                    </div>
                                                                    <div class="from-group table table-responsive">
                                                                        <table class="table table-border">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                        <div class="container" id="fechas_Pulsera_0">
                                                                                            <center><label>Días</label>
                                                                                            <br>
                                                                                            <label for="inicioPulsera0">Hora de Inicio</label>
                                                                                            <input id="inicioPulsera0" class="form-control" type="datetime-local">
                                                                                            <br>
                                                                                            <label for="finPulsera0">Hora de Finalizacion</label>
                                                                                            <input id="finPulsera0" class="form-control" type="datetime-local">
                                                                                            <br>
                                                                                            <label for="precioPulsera0">Precio</label>
                                                                                            <input id="precioPulsera0" class="form-control" type="number" placeholder="Ingresa un precio">
                                                                                            <br>
                                                                                            <button  class="btn btn-success adicionarPulsera" type="button">Agregar</button></center><br>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="table-wrapper">
                                                                                            <table id="tabla_Fechas_Pulsera_0" class="table table-border table-hover">
                                                                                                <thead>
                                                                                                    <th style="text-align: center; vertical-align: middle;">Fecha</th>
                                                                                                    <th style="text-align: center; vertical-align: middle;">Hora Inicial</th>
                                                                                                    <th style="text-align: center; vertical-align: middle;">Hora Final</th>
                                                                                                    <th style="text-align: center; vertical-align: middle;">Precio</th>
                                                                                                    <th style="text-align: center; vertical-align: middle;">Eliminar</th>
                                                                                                </thead>
                                                                                                <tbody id="cuerpo_Fechas_Pulsera_0">
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </div>
                                                                                        <br>
                                                                                        <div class="container" id="modificar_Hora_Pulsera_0">
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <button id="nuevo_Registro_Promocion_Pulsera" type="button" style="float: left;" class="btn btn-warning"><i class="fa fa-plus-circle">&nbsp;Nuevo Registro </i></button>
                                            </div>

                                            <div class="tab-pane fade" id="nav-tres" role="tabpanel" aria-labelledby="nav-tres-tab">
                                                <div class="table table-striped responsive">
                                                    <table class="table table-borderd" id="tabla_Juegos">
                                                        <tbody id="contenedor_Nuevo_Juego">
                                                            <tr id="contenedor_Juego_Nuevo_0">
                                                                <td>
                                                                    <div class="from-group" id="nombre_Juegos_0">
                                                                    </div>
                                                                    <div class="from-group" id="precio_Juegos_0">
                                                                    </div>
                                                                    <div class="from-group" id="creditos_Juegos_0">
                                                                    </div>
                                                                    <div class="from-group table table-responsive">
                                                                        <table class="table table-border">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                        <div class="container" id="fechas_Juegos_0">
                                                                                            <center><label>Días</label>
                                                                                            <br>
                                                                                            <label for="inicioJuegos0">Hora de Inicio</label>
                                                                                            <input id="inicioJuegos0" class="form-control" type="datetime-local">
                                                                                            <br>
                                                                                            <label for="finJuegos0">Hora de Finalizacion</label>
                                                                                            <input id="finJuegos0" class="form-control" type="datetime-local">
                                                                                            <br>
                                                                                            <button class="btn btn-success adicionarJuegos" type="button">Agregar</button></center><br>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="table-wrapper">
                                                                                            <table id="tabla_Fechas_Juegos_0" class="table table-border table-hover">
                                                                                                <thead>
                                                                                                    <th style="text-align: center; vertical-align: middle;">Fecha</th>
                                                                                                    <th style="text-align: center; vertical-align: middle;">Hora Inicial</th>
                                                                                                    <th style="text-align: center; vertical-align: middle;">Hora Final</th>
                                                                                                    <th style="text-align: center; vertical-align: middle;">Eliminar</th>
                                                                                                </thead>
                                                                                                <tbody id="cuerpo_Fechas_Juegos_0"></tbody>
                                                                                            </table>
                                                                                        </div>
                                                                                        <br>
                                                                                        <div class="container" id="modificar_Hora_Juegos_0"></div>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="nav-cuatro" role="tabpanel" aria-labelledby="nav-cuatro-tab">
                                                <div class="table table-striped responsive">
                                                    <table class="table table-borderd" id="tabla_Cortesias">
                                                        <tbody id="contenedor_Creditos_Cortesia">
                                                            <tr id="contenedor_Creditos_Cortesia_0">
                                                                <td>
                                                                    <div class="from-group" id="nombre_Cortesias_0">
                                                                    </div>
                                                                    <div class="from-group" id="precio_Cortesia_0">
                                                                        <label for="precio_Cortesias_0">Precio de la Promoción</label>
                                                                        <input type="number" class="form-control" name="precio_Cortesias_0" id="precio_Cortesias_0" placeholder="Precio Promoción" value="">
                                                                        <br>
                                                                    </div>
                                                                    <div class="from-group" id="creditos_Cortesia_0">
                                                                        <label for="creditos_Cortesias_0">Creditos de la promoción</label>
                                                                        <input type="number" class="form-control" name="creditos_Cortesias_0" id="creditos_Cortesias_0" placeholder="Creditos Promoción">
                                                                        <br>
                                                                    </div>
                                                                    <div class="from-group table table-responsive">
                                                                        <table class="table table-border">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                        <div class="container" id="fechas_Cortesias_0">
                                                                                            <center><label>Días</label>
                                                                                            <br>
                                                                                            <label for="inicioCortesias0">Hora de Inicio</label>
                                                                                            <input id="inicioCortesias0" class="form-control" type="datetime-local">
                                                                                            <br>
                                                                                            <label for="finCortesias0">Hora de Finalizacion</label>
                                                                                            <input id="finCortesias0" class="form-control" type="datetime-local">
                                                                                            <br>
                                                                                            <label for="precioCortesias0">Precio</label>
                                                                                            <input id="precioCortesias0" class="form-control" type="number" placeholder="Ingresa un precio">
                                                                                            <br>
                                                                                            <label for="creditosI0">Creditos</label>
                                                                                            <input id="creditosI0" name="creditosI0" class="form-control" type="number" placeholder="Creditos cortesia">
                                                                                            <br>
                                                                                            <button class="btn btn-success adicionarCreditos" type="button">Agregar</button></center><br>
                                                                                        </div>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="table-wrapper">
                                                                                            <table id="tabla_Fechas_Cortesias_0" class="table table-border table-hover">
                                                                                                <thead>
                                                                                                    <th style="text-align: center; vertical-align: middle;">Fecha</th>
                                                                                                    <th style="text-align: center; vertical-align: middle;">Hora Inicial</th>
                                                                                                    <th style="text-align: center; vertical-align: middle;">Hora Final</th>
                                                                                                    <th style="text-align: center; vertical-align: middle;">Precio</th>
                                                                                                    <th style="text-align: center; vertical-align: middle;">Creditos</th>
                                                                                                    <th style="text-align: center; vertical-align: middle;">Eliminar</th>
                                                                                                </thead>
                                                                                                <tbody id="cuerpo_Promocion_Cortesias_0"></tbody>
                                                                                            </table>
                                                                                        </div>
                                                                                        <br>
                                                                                        <div class="container" id="modificar_Hora_Cortesias_0"></div>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <button id="nuevo_Registro_Promocion_Cortesia" type="button" style="float: left;" class="btn btn-warning"><i class="fa fa-plus-circle">&nbsp;Nuevo Registro </i></button>
                                            </div>

                                        </div>
                                    </fieldset>
                                    <button type="button" class="btn btn-danger" style="float: right;" data-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-success" style="float: right;" id="agregar_Promocion_Evento" name ="agregar_Promocion_Evento">Guardar</button>
                                </form>
                            </div>

                            <div class="tab-pane fade" id="nav-segundo" role="tabpanel" aria-labelledby="nav-segundo-tab">
                                <form enctype="multipart/form-data">
                                    
                                    <br>

                                    <fieldset>

                                        <nav>
                                            <div class="nav nav-tabs" role="tablist">
                                                <a class="nav-link active" id="nav-tabla-descuentos" data-toggle="tab" href="#tabla-descuentos" role="tab" aria-controls="tabla-descuentos" aria-selected="true">Descuentos</a>
                                                <a class="nav-link" id="nav-tabla-pulsera" data-toggle="tab" href="#tabla-pulsera" role="tab" aria-controls="tabla-pulsera" aria-selected="false">Pulsera Magica</a>
                                                <a class="nav-link" id="nav-tabla-juegos" data-toggle="tab" href="#tabla-juegos" role="tab" aria-controls="tabla-juegos" aria-selected="false">Juegos Gratis</a>
                                                <a class="nav-link" id="nav-tabla-creditos" data-toggle="tab" href="#tabla-creditos" role="tab" aria-controls="tabla-creditos" aria-selected="false">Creditos Cortesia</a>
                                            </div>
                                        </nav>

                                        <br>

                                        <div class="tab-content" id="nav-tabSegundo">

                                            <div class="tab-pane fade show active" id="tabla-descuentos" role="tabpanel" aria-labelledby="nav-tabla-descuentos">
                                                <div class="table table-striped table-responsive">
                                                    <table id="tabla_Descuento_Evento" class="table table-bordered">
                                                        <thead>
                                                            <th scope="col" style="vertical-align: middle;"></th>
                                                            <th scope="col" style="vertical-align: middle;">Promocion</th>
                                                            <th scope="col" style="vertical-align: middle;">Cantidad</th>
                                                            <th scope="col" style="vertical-align: middle;">Boletos</th>
                                                            <th scope="col" style="vertical-align: middle;">Hora Inicial</th>
                                                            <th scope="col" style="vertical-align: middle;">Hora Final</th>
                                                        </thead>
                                                        <tbody id="tabla_Descuentos_Evento">
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="tabla-pulsera" role="tabpanel" aria-labelledby="nav-tabla-pulsera">
                                                <div class="table table-striped table-responsive">
                                                    <table id="tabla_Pulseras_Evento" class="table table-bordered">
                                                        <thead>
                                                            <th></th>
                                                            <th>Promocion</th>
                                                            <th>Precio</th>
                                                            <th>Hora Inicial</th>
                                                            <th>Hora Final</th>
                                                        </thead>
                                                        <tbody id="tabla_Pulsera_Evento">
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="tabla-juegos" role="tabpanel" aria-labelledby="nav-tabla-juegos">
                                                <div class="table table-striped table-responsive">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <th></th>
                                                            <th>Promocion</th>
                                                            <th>Hora Inicial</th>
                                                            <th>Hora Final</th>
                                                        </thead>
                                                        <tbody id="tabla_Juegos_Evento">
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="tabla-creditos" role="tabpanel" aria-labelledby="nav-tabla-creditos">
                                                <div class="table table-striped table-responsive">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <th></th>
                                                            <th>Promocion</th>
                                                            <th>Precio</th>
                                                            <th>Creditos</th>
                                                            <th>Hora Inicial</th>
                                                            <th>Hora Final</th>
                                                        </thead>
                                                        <tbody id="tabla_Creditos_Evento">
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                        </div>

                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </fieldset>
                </form>
                <hr>
            </div>
        </div>
    </div>
</div>