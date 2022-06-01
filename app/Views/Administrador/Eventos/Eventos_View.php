
    <fieldset id="fieldset" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
        <center><label><h1>EVENTOS</h1></label></center>
        <a href="#myModal" type="button" class="btn btn-success" data-toggle="modal"><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp; Nuevo Evento</a>

        <div class="table table-striped table-responsive contenedorTabla">
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
                            <td style="text-align: center; vertical-align: middle;"><?= $dE->FechaInicio?></td>
                            <td style="text-align: center; vertical-align: middle;"><?= $dE->FechaFinal?></td>
                            <td style="text-align: center; vertical-align: middle;">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            <ul class="circulo">
                                                <li><a href="#AgregarL" class ="mostrarTarjetasEvento" type="button" data-toggle="modal" data-book-id='{"idEvento":<?= $dE->idEvento?>}'>Tarjetas</a></li>
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
        
    </fieldset>

<?php
   include 'agregar_Evento.php';
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