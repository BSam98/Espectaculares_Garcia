<!--MODAL AGREGAR ATRACCIONES-->
<div class="modal fade" id="Atracciones" style="color:black;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar Atracciones</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="" enctype="multipart/form-data" name="formulario" id="formulario">
                    <div class="table table-striped table-responsive">
                        <table id="agregarA" class="table table-bordered">
                            <tbody>
                                <tr class="agregarFilas">
                                    <td>
                                        <div class="form-group">
                                            <label for="nombreatra">Nombre de la Atracción</label>
                                            <select name="atraccion" id="atraccion" class="form-control">
                                                <option value="">Seleccionar Atracción</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="creditos">Creditos</label>
                                            <input type="text" class="form-control" name="credito" id="credito" placeholder="Créditos">
                                        </div>
                                        <div class="form-group">
                                            <label for="poliza">Promociones:</label>
                                            <input type="checkbox">2x1
                                            <input type="checkbox">gratis
                                            <input type="checkbox">xxx
                                        </div>
                                        <div class="form-group">
                                            <label for="contrato">Agregar Contrato</label>
                                            <select name="contrato" id="contrato" class="form-control">
                                                <option value="">Seleccionar Contrato</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="poliza">Agregar Poliza</label>
                                            <select name="poliza" id="poliza" class="form-control">
                                                <option value="">Seleccionar Poliza</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td class="eliminar"><input type="button" value="-"/></td>
                                </tr>
                            </tbody>
                        </table>
                        <button id="nuevor" name="adicional" type="button" class="btn btn-warning"><i class="bi bi-plus-circle"></i>&nbsp;Nuevo Registro </button>
                    </div>
                    <button name="adicional" type="submit" class="btn btn-success">Agregar </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </form>
            <hr>
                <!--TABLA DE LISTADOS-->
                <div class="table table-striped table-responsive">
                    <table id="atraccionesAdd" class="table table-bordered">
                        <thead>
                        <th></th>
                        <th>Nombre</th>
                        <th>Creditos</th>
                        <th>Promoción</th>
                        <th>Contrato</th>
                        <th>Poliza</th>
                        </thead>
                        <tbody id = "atraccionesEvento">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--MODAL AGREGAR ATRACCIONES-->

<script>
    $(function(){
                // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
        $("#nuevor").on('click', function(){
            $("#agregarA tbody tr:eq(0)").clone().removeClass('agregarFilas').appendTo("#agregarA");
        });
    // Evento que selecciona la fila y la elimina 
        $(document).on("click",".eliminar",function(){
            var parent = $(this).parents().get(0);
            $(parent).remove();
        });
    });

    $(document).ready(function() {
        $('#atraccionesAdd').DataTable( {
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

    $( function() {
        $( "#datepicker" ).datepicker({dateFormat: 'yyyy-mm-dd'});
    });
</script>