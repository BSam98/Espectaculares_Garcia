<!--AGREGAR ASOCIACION-->
<div class="modal fade" id="Asociacion" style="color:black;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar Asociación</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="" enctype="multipart/form-data" name="formulario" id="formulario">
                    <div class="table table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>
                                        <label for="nombreatra">Nombre de la Atracción</label>
                                        <select name="area" id="area" class="form-control">
                                            <option value="">Atracción</option>
                                        </select>
                                    </td>&nbsp;
                                    <td>
                                        <label for="porcent">Porcentaje del Propietario</label>
                                        <input class="form-control" type="text" name="porcentajedueño" id="porcentajedueño" placeholder="Porcentaje del Propietario">
                                    </td>&nbsp;
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <table id="tablaAsoci" class="table table-bordered">
                                            <thead>
                                                <th style="vertical-align: middle;">Asociado</th>
                                                <th style="vertical-align: middle;">Porcentaje</th>
                                            </thead>
                                            <tbody>
                                                <tr class="asociacion">
                                                    <td>
                                                        <select name="area[]" id="area" class="form-control">
                                                            <option value="">Nombre del Asociado-RFC</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="porcentajeaso[]" id="porcentajeaso" placeholder="Porcentaje del Asociado">
                                                    </td>
                                                    <td class="elimAsoci"><input type="button"   value="-"/></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <button id="adiAso" name="adicional" type="button" class="btn btn-warning"><i class="bi bi-plus-circle"></i>&nbsp;Agregar Asociado</button>
                                    </td>&nbsp;
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <button name="adicional" type="submit" class="btn btn-success">Agregar </button> 
                </form>
                <hr>
                <div class="table table-striped table-responsive">
                    <table id="tA" class="table table-bordered">
                        <thead>
                            <th></th>
                            <th>Nombre</th>
                            <th>Atracción</th>
                            <th>Propietario</th>
                            <th>Porcentaje del Propietario</th>
                            <th>Asociado</th>
                            <th>Porcentaje del Asociado</th>
                        </thead>
                        <tbody id = "asociacionEvento">
                        </tbody>
                    </table>
                </div>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!--AGREGAR ASOCIACION-->
<script>
        $(function(){
                    // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
            $("#adiAso").on('click', function(){
                $("#tablaAsoci tbody tr:eq(0)").clone().removeClass('asociacion').appendTo("#tablaAsoci");
            });
            // Evento que selecciona la fila y la elimina 
            $(document).on("click",".elimAsoci",function(){
                var parent = $(this).parents().get(0);
                $(parent).remove();
            });
        });

    $(document).ready(function() {
        $('#tA').DataTable( {
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