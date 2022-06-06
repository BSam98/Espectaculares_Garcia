    <!--/Contenedor Superior-->
    <!--TABLA PRINCIPAL-->
    <?php 
if((!isset($_SESSION['Usuario'])) || (!isset($_SESSION['idUsuario']))){
    header('Location: http://localhost/Espectaculares_Garcia/public/');
    exit();
}else{
?>
    <fieldset id="fieldset" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" style="color:black;">
            <center><h1 style="color:black;">LOTES</h1></center>
                <!--a href="" type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalT"><i class="bi bi-plus-circle"></i>&nbsp;Agregar Tarjeta</a-->

            <a href="#agregarL" type="button" class="btn btn-success datos" data-toggle="modal" data-book-id='{"nombre":"<?= $_SESSION['Usuario']?>","idUsuario":<?= $_SESSION['idUsuario']?>}'><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Agregar Lote</a>
                    
            <!--button class="btn btn-success" id="abrir"><i class="bi bi-plus-circle"></i>&nbsp;Nuevo Lote</button-->
            <div class="contenedorTabla"><br>
                <!--Tabla-->
                <!--TABLA DE LOTES-->
                <div class="table table-striped table-responsive">
                    <table id="searchL" class="table table-bordered">
                        <thead>
                            <th></th>
                            <th scope="col" style="vertical-align: middle;">Nombre</th>
                            <th scope="col" style="vertical-align: middle;">Material</th>
                            <th scope="col" style="vertical-align: middle;">Cantidad</th>
                            <th scope="col" style="vertical-align: middle;">Folio Inicial</th>
                            <th scope="col" style="vertical-align: middle;">Folio Final</th>
                            <th scope="col" style="vertical-align: middle;">Serial</th>
                            <th scope="col" style="vertical-align: middle;">Usuario</th>
                            <th scope="col" style="vertical-align: middle;">Fecha de Ingreso</th>
                            <th scope="col" style="vertical-align: middle;">Tarjetas</th>
                        </thead>
                        <tbody>
                            <?php foreach ($Lote as $key => $dL) : ?>
                                <tr>
                                    <td style="vertical-align: middle;"><a href="#eLote" class ="editarLotes"  data-book-id='{"idLote":<?= $dL->idLote?>,"Nombre":"<?= $dL->Nombre?>","Material":"<?= $dL->Material?>","Cantidad":<?= $dL->Cantidad?>,"Serie":"<?= $dL->Serie?>","Usuario":"<?= $dL->Usuario?>"}' data-toggle="modal"><i class="fa fa-paint-brush btn btn-outline-warning" aria-hidden="true"></i></a></td>
                                    <td style="vertical-align: middle;"><?= $dL->Nombre?></td>
                                    <td style="vertical-align: middle;"><?= $dL->Material?></td>
                                    <td style="vertical-align: middle;"><?= $dL->Cantidad?></td>
                                    <td style="vertical-align: middle;"><?= $dL->FolioInicial?></td>
                                    <td style="vertical-align: middle;"><?= $dL->FolioFinal?></td>
                                    <td style="vertical-align: middle;"><?= $dL->Serie?></td>
                                    <td style="vertical-align: middle;"><?= $dL->Usuario?></td>
                                    <td style="vertical-align: middle;"><?= $dL->FechaIngreso?></td>
                                    <td><a href="#verTarjetas"  class="btn btn-outline-success mostrarTarjetasLote" data-toggle="modal"  data-book-id='{"idLote":<?= $dL->idLote?>}' ><i class="fa fa-eye" aria-hidden="true"></i></a></button></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>

                <!--MODAL NUEVA TARJETA-->
            <div class="modal fade" id="myModalT"  style="background-image: url('./Img/mainbg.png');color:black;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Agregar Tarjetas</h4>
                            <button type="button" class="close" data-dismiss="modal"></button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <form enctype="multipart/form-data" name="formulario" id="formulario">
                                <div class="table table-striped table-responsive">
                                    <table id="newTarjet" class="table table-bordered">
                                        <tbody>
                                            <tr class="addTarjet">
                                                <td>
                                                    <div class="form-group">
                                                        <label for="nombre">Nombre</label>
                                                        <input class="form-control" type="text" id="nomb" required name="nomb[]" placeholder="Nombre"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="area">Código QR</label>
                                                        <input class="form-control" type="text" id="qr" required name="qr[]" placeholder="Código QR"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="renta">Folio</label>
                                                        <input class="form-control" type="number" id="folio" required name="folio[]" placeholder="Folio"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="propietario">Fecha de activación</label>
                                                        <input class="form-group" type="date" id="activa" required name="activa[]">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cma">Status</label>
                                                        <input class="form-control" type="number"  id="sta" required name="sta[]"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cmi">Tipo</label>
                                                        <input class="form-control" type="text"  id="tipo" required name="tipo[]" placeholder="Tipo"/>
                                                    </div>
                                                    <!--div class="form-group">
                                                        <label for="tiempo">Cliente</label>
                                                        <input class="form-control" type="text"  id="cli" required name="cli[]" placeholder="Cliente"/>
                                                    </div-->
                                                    <div class="form-group">
                                                        <label for="tma">Lote</label>
                                                        <input class="form-control" type="number"  id="lote" required name="lote[]" placeholder="Lote"/>
                                                    </div>
                                                    <div>
                                                        <label for="evento">Evento</label>
                                                        <select class="form-control" type="text"  id="even" required name="even[]">
                                                            <option value="0">Elige una opción</option>
                                                                    <option value = ""></option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td class="delT"><input type="button"   value="-"/></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button id="addT" name="addT" type="button" class="btn btn-warning"> + </button>
                                </div>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button name="adicional" type="submit" class="btn btn-success">Agregar </button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                </div>  
                            </form>
                        </div>
                    </div>
                </div>  
            </div>
    </fieldset>
    <?php 
        include 'editarLote.php';
        include 'editarTarjetas.php';
        include 'agregar_Lotes.php';
        include 'ver_Tarjetas.php';
    ?>

    <script src="JS/tarjetas.js"></script>
    <script src="JS/carga.js"></script>
    <script>
        $(function(){
        // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
            $("#agregar-Filas").on('click', function(){
            $("#agregarLotes tbody tr:eq(0)").clone().removeClass('filas-lote').appendTo("#agregarLotes");
            });
            // Evento que selecciona la fila y la elimina 
            $(document).on("click",".eliminar-Filasl",function(){
                var parent = $(this).parents().get(0);
            $(parent).remove();
            });
        });

        $(function(){
        // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
            $("#addT").on('click', function(){
            $("#newTarjet tbody tr:eq(0)").clone().removeClass('addTarjet').appendTo("#newTarjet");
            });
            // Evento que selecciona la fila y la elimina 
            $(document).on("click",".delT",function(){
                var parent = $(this).parents().get(0);
            $(parent).remove();
            });
        });

        $(document).ready(function() {
            $('#searchT').DataTable( {
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
                "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
            });
        });

        $(document).ready(function() {
            $('#searchL').DataTable( {
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
                "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
            });
        });
    </script>
<?php }?>