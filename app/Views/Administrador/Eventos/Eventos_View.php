
    <fieldset id="fieldset" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
        <center><label><h1>EVENTOS</h1></label></center>
        <a href="#myModal" type="button" class="btn btn-success" data-toggle="modal"><i class="bi bi-plus-circle"></i>&nbsp; Nuevo Evento</a>

        <div class="contenedorTabla">
            <br>
            <!--Tabla-->
            <table id="example" class="table table-striped">
                <thead>
                    <!--Titulos de la tabla-->
                    <th style="vertical-align: middle;"></th>
                    <th style="vertical-align: middle;">Nombre</th>
                    <th style="vertical-align: middle;">Direccion</th>
                    <th style="vertical-align: middle;">Ciudad</th>
                    <th style="vertical-align: middle;">Estado</th>
                    <th style="vertical-align: middle;">Fecha de inicio</th>
                    <th style="vertical-align: middle;">Fecha de termino</th>
                    <th>Opciones</th>
                    <!--th style="vertical-align: middle;">Status</th>
                    <th style="vertical-align: middle;">Atracciones</th>
                    <th-- style="vertical-align: middle;">Precios</th-->
                    
                    <!--/Titutlos de la tabla-->
                </thead>
                <tbody>
                    <?php foreach ($Eventos as $key => $dE) : ?>
                        <tr>
                            <td style="vertical-align: middle;"><a href="#editarEvento" type="button" data-toggle="modal"><i class="bi bi-pencil-square btn btn-warning"></i></a></td>
                            <td style="vertical-align: middle;"><?= $dE->Nombre ?></td>
                            <td style="vertical-align: middle;"><?= $dE->Direccion?></td>
                            <td style="vertical-align: middle;"><?= $dE->Ciudad?></td>
                            <td style="vertical-align: middle;"><?= $dE->Estado?></td>
                            <td style="vertical-align: middle;"><?= $dE->FechaInicio?></td>
                            <td style="vertical-align: middle;"><?= $dE->FechaFinal?></td>
                            <td style="vertical-align: middle;">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            <ul class="circulo">
                                                <li><a href="#AgregarL" class ="mostrarTarjetasEvento" type="button" data-toggle="modal" data-book-id='{"idEvento":<?= $dE->idEvento?>}' >Tarjetas</a></li>
                                                <li><a href="#Atracciones" class ="mostrarAtraccionesEvento" type="button" data-toggle="modal" data-book-id='{"idEvento":<?= $dE->idEvento?>}'>Atracciones</a></li>
                                                <li><a href="#Asociados" type="button" data-toggle="modal" data-book-id='{"idEvento":<?= $dE->idEvento?>}' >Asociados</a></li>
                                                <li><a href="#taquillas" type="button" data-toggle="modal">Taquillas</a></li>
                                            </ul>
                                        </td>
                                        <td>
                                            <ul class="circulo">
                                                <li><a href="#Asociacion" class = "mostrarAsociacionEvento" type="button" data-toggle="modal" data-book-id='{"idEvento":<?= $dE->idEvento?>}'>Asociación</a></li>
                                                <li><a href="#Promociones" type="button" data-toggle="modal" data-book-id='{"idEvento":<?= $dE->idEvento?>}'>Promociones</a></li>
                                                <li><a href="#Creditos" type="button" data-toggle="modal" data-book-id='{"idEvento":<?= $dE->idEvento?>}'>Créditos de Cortesia</a></li>
                                                <li><a href="#Areas" type="button" data-toggle="modal">Asignar Áreas</a></li>
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
    include 'agregar_Promociones.php';
    include 'agregar_Atracciones.php';
    include 'creditos_Cortesia.php';
    include 'agregar_Lotes.php';
    include 'taquillas.php';
    include 'asignar_Areas.php';
?>
<script src ="JS/evento.js"></script>
 
    <script>
        $(function(){
                    // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
            $("#adi").on('click', function(){
                $("#tablae tbody tr:eq(0)").clone().removeClass('fila-fila').appendTo("#tablae");
            });
        // Evento que selecciona la fila y la elimina 
            $(document).on("click",".elim",function(){
                var parent = $(this).parents().get(0);
                $(parent).remove();
            });
        });
    
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