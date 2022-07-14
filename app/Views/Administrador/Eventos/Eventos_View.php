<?php 
if((!isset($_SESSION['Usuario'])) || (!isset($_SESSION['idUsuario']))){
    header('Location: http://localhost/Espectaculares_Garcia/public/');
    exit();
}else{
?>
<fieldset id="fieldset" enctype="multipart/form-data" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">

    <div class="table table-striped table-responsive contenedorTabla" id="contenedor_Eventos">
        <center><h1 style="color:black; ">EVENTOS</h1></center>
        <a href="javascript:mostrar_Ejemplo_Nuevo_Evento();" type="button" id="nueva_Evento" class="btn btn-success"><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp; Nuevo Evento</a>
        <br>
        <br>
        <!--Tabla-->
        <table id="example" class="table table-bordered">
            <thead>
                <!--Titulos de la tabla-->
                <th scope="col" style="text-align: center; vertical-align: middle;"></th>
                <th scope="col" style="text-align: center; vertical-align: middle;">Nombre</th>
                <th scope="col" style="text-align: center; vertical-align: middle;">Direccion</th>
                <th scope="col" style="text-align: center; vertical-align: middle;">Ciudad</th>
                <th scope="col" style="text-align: center; vertical-align: middle;">Estado</th>
                <th scope="col" style="text-align: center; vertical-align: middle;">Costo por tarjeta</th>
                <th scope="col" style="text-align: center; vertical-align: middle;">Fecha de inicio</th>
                <th scope="col" style="text-align: center; vertical-align: middle;">Fecha de termino</th>
                <th scope="col" style="text-align: center; vertical-align: middle;">Opciones</th>
                <!--th style="vertical-align: middle;">Status</th>
                <th style="vertical-align: middle;">Atracciones</th>
                <th-- style="vertical-align: middle;">Precios</th-->
                
                <!--/Titutlos de la tabla-->
            </thead>
            <tbody>
                <?php foreach ($Eventos as $key => $dE) : ?>
                    <tr>
                        <td style="text-align: center; vertical-align: middle;"><a href="#editarEvento" type="button" data-toggle="modal"><i class="fa fa-paint-brush btn btn-outline-warning" aria-hidden="true"></i></a></td>
                        <td style="text-align: center; vertical-align: middle;"><?= $dE->Nombre ?></td>
                        <td style="text-align: center; vertical-align: middle;"><?= $dE->Direccion?></td>
                        <td style="text-align: center; vertical-align: middle;"><?= $dE->Ciudad?></td>
                        <td style="text-align: center; vertical-align: middle;"><?= $dE->Estado?></td>
                        <td style="text-align: center; vertical-align: middle;"><?= $dE->PrecioTarjeta?></td>
                        <td style="text-align: center; vertical-align: middle;"><?= $dE->FechaInicio?></td>
                        <td style="text-align: center; vertical-align: middle;"><?= $dE->FechaFinal?></td>
                        <td style="vertical-align: middle;">
                            <table>
                                <tbody style="vertical-align: middle;">
                                    <tr >
                                        <td>
                                            <ul class="circulo">
                                                <li><a href="#AgregarL" class ="mostrarTarjetasEvento" type="button" data-toggle="modal" data-book-id='{"idEvento":<?= $dE->idEvento?>}'>Tarjetas</a></li>
                                                <li><a href="#tarjetas_Cortesia" class ="mostrar_Cortesias_Evento" type="button" data-toggle="modal" data-book-id='{"idEvento":<?= $dE->idEvento?>,"idUsuario":<?= $_SESSION['idUsuario']?>,"Nombre":"<?= $_SESSION['Usuario']?>"}'>Cortesías</a></li>
                                                <li><a href="#Promociones" class ="mostrar_Promociones_Evento" type="button" data-toggle="modal" data-book-id='{"idEvento":<?= $dE->idEvento?>}'>Promociones</a></li>
                                                <li><a href="#Zonas" class ="mostrar_Zonas_Evento" type="button" data-toggle="modal" data-book-id='{"idEvento":<?= $dE->idEvento?>}'>Zonas</a></li>
                                                <li><a href="#taquillas" class ="mostrar_Taquillas_Evento" type="button" data-toggle="modal" data-book-id='{"idEvento":<?= $dE->idEvento?>}'>Taquillas</a></li>
                                            </ul>
                                        </td>
                                        <td>
                                            <ul class="circulo">
                                                <li><a href="#Atracciones" class ="mostrar_Atracciones_Evento" type="button" data-toggle="modal" data-book-id='{"idEvento":<?= $dE->idEvento?>}'>Atracciones</a></li>
                                                <li><a href="#usuarios" type="button" data-toggle="modal">Usuarios</a></li>
                                                <li><a href="#Asociados" type="button" data-toggle="modal" data-book-id='{"idEvento":<?= $dE->idEvento?>}' >Asociados</a></li>
                                                <li><a href="#Asociacion" class = "mostrarAsociacionEvento" type="button" data-toggle="modal" data-book-id='{"idEvento":<?= $dE->idEvento?>}'>Asociación</a></li>
                                                <!--<li><a href="#Areas" type="button" data-toggle="modal">Asignar Áreas</a></li>-->
                                            </ul>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <!--/Tabla-->
    </div>

    <div class="contenedor_Ejemplo_Nuevo_Evento" id="contenedor_Ejemplo_Nuevo_Evento" style="color:black; display:none;">
        <!--
        <div class="input-group">
            <a href="javascript:cerrar_Ejemplo_Nuevo_Evento();" class="btn btn-danger"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Regresar</a>
        </div> 

        <center><label><h2>Nuevo Evento Ejemplo</h2></label></center>

        <div class="container-fluid">


            <div class="card shadow mb-5">

                <div class="card-header py-4 d-flex flex-row align-items-center justify-content-between">
                </div>

                <div class="card-body">
                    <div class="chart-area table table-responsive table-wrapper">
                        <table id="tabla_Ventanillas_Activas" class="table table-border" style=" color: black; background-image: url('../../../Espectaculares_Garcia/public/Img/logog.png'); background-repeat:no-repeat; background-position: center;">

                            <tbody id="body_Ventanillas_Activas">
                                <tr>
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
                                    </td>
                                    
                                    <td>
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
                                        <div class="form-group">
                                            <input type="hidden" id="id_Arreglo" name="id_Arreglo[]" value="0">
                                        </div>
                                    </td>
                                        
                                </tr>

                                <tr>
                                    <td>
                                        <div class="form-group" id="fechas_Evento">

                                            <label for="inicioEvento0">Hora de Inicio</label>
                                            <input id="inicioEvento0" class="form-control" type="datetime-local" value="">

                                            <br>
                                            <label for="finEvento0">Hora de Finalizacion</label>
                                            <input id="finEvento0" class="form-control" type="datetime-local" value="">

                                            <br>
                                            <button  class="agregar_Fecha_Evento btn btn-success" type="button">+</button>

                                        </div>
                                    </td>
                                    
                                    <td>
                                        <div class="form-group">
                                            <table id="tabla_Fechas_Evento0" class="table table-bordered table-hover">
                                                <thead>
                                                    <th style="text-align: center; vertical-align: middle;">Hora Inicial</th>
                                                    <th style="text-align: center; vertical-align: middle;">Hora Final</th>
                                                    <th style="text-align: center; vertical-align: middle;">Eliminar</th>
                                                </thead>
                                                <tbody id="cuerpo_Fechas_Evento0"></tbody>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <div class="card-footer" id="pie_Informacion"></div>
            </div>

        </div>-->
        <form enctype="multipart/form-data" name="formulario" id="formularioAgregarEvento">
            <div id="contenedor_Evento_0">
                <div class="input-group">
                    <a href="javascript:cerrar_Ejemplo_Nuevo_Evento();" class="btn btn-danger"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Regresar</a>
                </div> 

                <center><label><h2>Nuevo Evento</h2></label></center>

                <div class="table-responsive" id="contenedorEventos">

                    <table class="table table-border" style="color: black; background-image: url('../../../Espectaculares_Garcia/public/Img/logog.png'); background-repeat:no-repeat; background-position: center;">

                        <tbody id="body_Ventanillas_Activas">
                            <tr>

                                <td>
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input class="form-control" type="text" name = "Nombre[]"  id="Nombre" required placeholder="Nombre"/>
                                    </div>

                                    <div class="form-group">
                                        <label for="estado">Estado</label>
                                        <input class="form-control" type="text" name="Estado[]"  id="Estado" required placeholder="Estado"/>
                                    </div>

                                    <div class="form-group">
                                        <label for="costo_Tarjeta">Costo por tarjeta</label>
                                        <input class="form-control" type="number" name="costo_Tarjeta[]" id="costo_Tarjeta" required placeholder="Costo">
                                    </div>
                                </td>
                                
                                <td>
                                    <div class="form-group">
                                        <label for="direccion">Dirección</label>
                                        <input class="form-control" type="text" name="Direccion[]"  id="Direccion" required placeholder="Dirección"/>
                                    </div>

                                    <div class="form-group">
                                        <label for="estado">Equivalencia de pesos a creditos</label>
                                        <input class="form-control" type="number" name="pesos[]"  id="pesos" required placeholder="Pesos"/>
                                    </div>

                                    <div class="form-group">
                                        <input type="hidden" id="id_Arreglo" name="id_Arreglo[]" value="0">
                                    </div>
                                </td>

                                <td>
                                    <div class="form-group">
                                        <label for="ciudad">Ciudad</label>
                                        <input class="form-control" type="text" name="Ciudad[]"  id="Ciudad" required placeholder="Ciudad"/>
                                    </div>

                                    <div class="form-group">
                                        <label><FONT COLOR="white">''</FONT></label>
                                        <input class="form-control" type="number" name="creditos[]"  id="creditos" required placeholder="Creditos"/>
                                    </div>
                                </td>
                                    
                            </tr>

                            <tr>
                                <td id="evento_0">
                                    <div class="form-group" id="fechas_Evento">

                                        <label for="inicioEvento0">Hora de Inicio</label>
                                        <input id="inicioEvento0" class="form-control" type="datetime-local" value="">

                                        <br>
                                        <label for="finEvento0">Hora de Finalizacion</label>
                                        <input id="finEvento0" class="form-control" type="datetime-local" value="">

                                        <br>
                                        <button  class="agregar_Fecha_Evento btn btn-success" type="button">Agregar Fechas</button>

                                    </div>
                                </td>
                                <td>

                                </td>
                                
                                <td>
                                    <div class="table-wrapper">
                                        <table id="tabla_Fechas_Evento_0" class="table table-border table-hover">
                                            <thead>
                                                <th style="text-align: center; vertical-align: middle;">Fecha</th>
                                                <th style="text-align: center; vertical-align: middle;">Hora Inicial</th>
                                                <th style="text-align: center; vertical-align: middle;">Hora Final</th>
                                                <th style="text-align: center; vertical-align: middle;">Eliminar</th>
                                            </thead>
                                            <tbody id="cuerpo_Fechas_Evento_0"></tbody>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                </div>
                <button id="duplicar_Registro" name="nuevaAt" type="button" style="float: left;" class="btn btn-warning"><i class="fa fa-plus-circle"></i>&nbsp;Nuevo Registro </button>
                <button name="a" type="button" class="btn btn-success" style="float: right;" id="agregarEvento">Agregar Eventos</button>
            </div>
        </form>

    </div>

</fieldset>


<?php
    //include 'agregar_Evento.php';
    include 'horas.php';
    include 'editar_Eventos.php';
    include 'agregar_Asociados.php';
    include 'agregar_Asociacion.php';
    //include 'agregar_Promociones.php';
    include 'prueba_Promociones.php';
    include 'agregar_Atracciones.php';
    include 'creditos_Cortesia.php';
    include 'agregar_Lotes.php';
    include 'taquillas.php';
    include 'asignar_Areas.php';
    include 'agregar_Usuarios.php';
    include 'editar_Atracciones.php';
    include 'agregar_Zona.php';
    include 'editar_Promocion.php';
    include 'editar_Taquillas.php';
    include 'agregar_Cortesias.php';
?>
<script src ="JS/evento.js"></script>
<script src="JS/pruebaPromocion.js"></script>
<script src ="JS/carga.js"></script>
 
    <script>
        
    
        $(function(){
        $("#adicional").on('click', function(){
        $("#tabla tbody tr:eq(0)").clone().removeClass('fila-fija').appendTo("#tabla");
        });
        $(document).on("click",".eliminar",function(){
            var parent = $(this).parents().get(0);
        $(parent).remove();
        });
        });
        

        $(document).ready(function() {
            $('#example').DataTable( {
                "aProcessing": true,//Activamos el procesamiento del datatables
                "aServerSide": true,//Paginación y filtrado realizados por el servidor
                dom: 'Bfrtip',//Definimos los elementos del control de tabla
                buttons: [		          
                            'copyHtml5',
                            'excelHtml5',
                            'csvHtml5',
                            'pdf'
                        ],
                "bDestroy": true,
                "iDisplayLength": 15,//Paginación
                "order": false //Ordenar (columna,orden)
            });
        });

        
        $(document).ready(function(){


            $('.datepicker').datepicker({
            format: 'dd-mm-yyyy',
            todayHighlight: true,
            toggleActive: true
            });

        });
        
    </script>
<?php }?>