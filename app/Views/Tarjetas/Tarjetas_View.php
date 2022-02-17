    <!--/Contenedor Superior-->
    <!--TABLA PRINCIPAL-->
    <fieldset id="fieldset" style="background-color: white;color:black;"> 
        <label><h1>Lotes</h1></label>
                <!--a href="" type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalT"><i class="bi bi-plus-circle"></i>&nbsp;Agregar Tarjeta</a-->
                <button class="btn btn-success" id="abrir"><i class="bi bi-plus-circle"></i>&nbsp;Nuevo Lote</button>
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
                        <th scope="col" style="vertical-align: middle;">Fecha de Ingreso</th>
                        <th scope="col" style="vertical-align: middle;">Usuario</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td><input type="text" class="form-grup" placeholder="Nombre"></td>
                            <td><input type="text" class="form-grup" placeholder="Material"></td>
                            <td><input type="number" class="form-grup" placeholder="Cantidad"></td>
                            <td><input type="number" class="form-grup" placeholder="Folio Inicial"></td>
                            <td><input type="number" class="form-grup" placeholder="Folio Final"></td>
                            <td><input type="number" class="form-grup" placeholder="Serie"></td>
                            <td><input type="date" class="form-grup" placeholder="Fecha de ingreso"></td>
                            <td>
                                <select class="form-control" type="text" id ="usuario" name ="usuario">
                                    <option value ="0">Elige una opcion</option>
                                    <?php foreach ($Usuario as $key => $dU) : ?>
                                        <option value = "<?= $dU->idUsuario?>"><?= $dU->UsuarioNombre?></option>
                                    <?php endforeach ?>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
                <!--table class="table table-bordered  border-primary" id="searchT">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nombre</th>
                            <th>Codigo QR</th>
                            <th>Folio</th>
                            <th>Fecha de Activacíon</th>
                            <th>Status</th>
                            <th>Tipo</th>
                            <th>Cliente</th>
                            <th>Lote</th>
                            <th>Evento</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($Tarjeta as $key => $dT) : ?>
                            <tr>
                                <td><a href="" class="editar" data-toggle="modal"><i class="bi bi-pencil-square btn btn-warning"></i></a></td>
                                <td><?= $dT->Tarjeta ?></td>
                                <td style="display: block; scroll-behavior: smooth; overflow-y:scroll; width:117px; height:53px"><?= $dT->QR ?></td>
                                
                                <td><?= $dT->Folio ?></td>
                                <td><?= $dT->FechaActivacion ?></td>
                                <td><?= $dT->Status ?></td>
                                <td><?= $dT->Tipo ?></td>
                                <td><?= $dT->Cliente ?></td>
                                <td><?= $dT->Lote ?></td>
                                <td><?= $dT->Ciudad ?></td>
                            </tr>
                        <?php endforeach ?>    
                    </tbody>
                </table-->
            </div>

            <!--MODAL NUEVA TARJETA-->
            <div class="modal" id="myModalT"  style="background-image: url('./Img/mainbg.png');color:black;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Agregar Tarjetas</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <form method="POST"  action="" enctype="multipart/form-data" name="formulario" id="formulario">
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

        <!--Contenedor del Lote-->
        <div class = "contenedorOculto" id = "contenedorOculto" style="background-image: url('./Img/mainbg.png'); color:black;">
            <div class="contenedorTablaLote" id = "contenedorTablaLote" style="background-image: url('./Img/mainbg.png'); color:black;">
                <a href ="#" id="btn-cerrar-popup" class ="btn-cerrar-popup"></a>
                <!--Ventana del lote-->
                    <fieldset id="fieldset">
                        <label><h2>Nuevo Lote</h2></label>
                            <div class="contenedorTabla1">
                                <form method="POST" action="" enctype="multipart/form-data" name="formulario" id="formulario">
                                    <div class="table table-striped table-responsive">
                                    <!--Tabla AGREGAR LOTES-->
                                        <table class="table table-bordered" id="agregar">
                                            <thead>
                                            <!--Titulos de la tabla-->
                                                <th scope="col" style="vertical-align: middle;">Nombre</th>
                                                <th scope="col" style="vertical-align: middle;">Material</th>
                                                <th scope="col" style="vertical-align: middle;">Cantidad</th>
                                                <th scope="col" style="vertical-align: middle;">Folio Inicial</th>
                                                <th scope="col" style="vertical-align: middle;">FolioFinal</th>
                                                <th scope="col" style="vertical-align: middle;">Serial</th>
                                                <th scope="col" style="vertical-align: middle;">Fecha de Ingreso</th>
                                                <th scope="col" style="vertical-align: middle;">Usuario</th>
                                            </thead>
                                            <tbody>
                                                <tr class="filas">
                                                    <td><input type="text" class="form-grup" placeholder="Nombre"></td>
                                                    <td><input type="text" class="form-grup" placeholder="Material"></td>
                                                    <td><input type="number" class="form-grup" placeholder="Cantidad"></td>
                                                    <td><input type="number" class="form-grup" placeholder="Folio inicial"></td>
                                                    <td><input type="number" class="form-grup" placeholder="Folio final"></td>
                                                    <td><input type="number" class="form-grup" placeholder="Serial"></td>
                                                    <td><input type="date" class="form-grup" placeholder="Fecha de Ingreso"></td>
                                                    <td><input type="text" class="form-grup" placeholder="Usuario"></td>
                                                    <td class="deletef"><input type="button" value="-"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <button id="addf" name="adicional" type="button" class="btn btn-warning"> + </button>
                                    <button id="save" name="save" type="button" class="btn btn-success">Guardar</button>
                                </form><hr>

                                <button id="cerrar" class="btn btn-danger">Cerrar</button>
                            </div>
                    </fieldset>                    
            </div>
        </div>
        <!--/Contenedor del Lote-->

<script src="JS/tarjetas.js"></script>
    <script>
        $(function(){
        // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
            $("#addf").on('click', function(){
            $("#agregar tbody tr:eq(0)").clone().removeClass('filas').appendTo("#agregar");
            });
            // Evento que selecciona la fila y la elimina 
            $(document).on("click",".deletef",function(){
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
    <?php include('editarLote.php')?>
    <?php include('editarTarjetas.php')?>