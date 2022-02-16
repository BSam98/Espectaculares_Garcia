<!--AGREGAR ASOCIADOS-->
<div class="modal" id="Asociados" style="color:black;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar Asociados</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="" enctype="multipart/form-data" name="formulario" id="formulario">
                    <div class="table table-striped table-responsive ">
                        <table id="tabla" class="table table-bordered">
                            <tbody>
                                <tr class="fila-fija">
                                    <td>
                                        <div class="form-group">
                                            <label for="nombre">Nombre del Asociado</label>
                                            <input class="form-control" type="text" placeholder="Nombre del Asociado">
                                        </div>
                                        <div class="form-group">
                                            <label for="apellidoAso">Apellido Paterno</label>
                                            <input class="form-control" type="text" placeholder="Apellido Paterno">
                                        </div>
                                        <div class="form-group">
                                            <label for="apellidoMat">Apellido Materno</label>
                                            <input class="form-control" type="text" placeholder="Apellido Materno">
                                        </div>
                                        <div class="form-group">
                                            <label for="rfcAsociado">Registro Federal de Contribuyente(RFC)</label>
                                            <input class="form-control" type="text" placeholder="RFC">
                                        </div>
                                        <div class="form-group">
                                            <label for="direccionAso">Dirección del Asociado</label>
                                            <input class="form-control" type="text" placeholder="Direccion">
                                        </div>
                                        <div class="form-group">
                                            <label for="telefono">Teléfono</label>
                                            <input class="form-control" type="text" placeholder="Teléfono">
                                        </div>
                                        <div class="form-group">
                                            <label for="date">Fecha de Nacimiento</label>
                                            <input class="form-control" type="date" placeholder="Fecha de Nacimiento">
                                        </div>
                                    </td>
                                    <td class="eliminar"><input type="button" value="-"/></td>
                                </td>
                                </tr>
                            </tbody>
                        </table>
                        <button id="add" name="add" type="button" class="btn btn-warning"><i class="bi bi-plus-circle"></i>&nbsp;Nuevo Registro </button>
                    </div>
                    <button name="adicional" type="submit" class="btn btn-success">Agregar </button>
                </form>

                <hr>
                <!--TABLA DE LISTADOS-->
                <div class="table table-striped table-responsive ">
                    <table id="tablaAso" class="table table-bordered">
                        <thead>
                            <th></th>
                            <th>Nombre</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>RFC</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Fecha de Nacimiento</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!--AGREGAR ASOCIADOS-->
<script>
    $(function(){
                // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
        $("#add").on('click', function(){
            $("#tabla tbody tr:eq(0)").clone().removeClass('fila-fija').appendTo("#tabla");
        });
    // Evento que selecciona la fila y la elimina 
        $(document).on("click",".eliminar",function(){
            var parent = $(this).parents().get(0);
            $(parent).remove();
        });
    });

    $(document).ready(function() {
        $('#tablaAso').DataTable( {
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