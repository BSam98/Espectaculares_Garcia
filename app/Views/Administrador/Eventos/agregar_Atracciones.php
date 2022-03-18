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
                        <table id="agregarAtracciones" class="table table-bordered">
                            <tbody>
                                <tr class="f-Atracciones">
                                    <td>
                                        <div class="form-group" id="nuevas_Atracciones">
                                            <label for ="atracciones_Nuevas">Nombre de la atracción</label>
                                            <select name="atracciones_Nuevas[]" id ="atracciones_Nuevas" class="form-control">
                                                <option value="">Seleccionar Atraccion</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="creditos">Creditos</label>
                                            <input type="text" class="form-control" name="credito[]" id="credito" placeholder="Créditos">
                                        </div>
                                        <div class="form-group" id="promocion_Descuentos">
                                        </div>
                                        <div class="form-group" id="promocion_Pulsera">
                                        </div>
                                        <div class="form-group" id="promocion_Juegos_Gratis">
                                        </div>
                                        <div class="form-group" id="nuevos_Contratos">
                                            <label for="contrato">Agregar Contrato</label>
                                            <select name="contrato[]" id="contrato" class="form-control">
                                                <option value="">Seleccionar Contrato</option>
                                            </select>
                                        </div>
                                        <div class="form-group" id="nuevas_Polizas">
                                            <label for="poliza">Agregar Poliza</label>
                                            <select name="poliza[]" id="poliza" class="form-control">
                                                <option value="">Seleccionar Poliza</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td class="eliminarAt"><input type="button" value="-"/></td>
                                </tr>
                            </tbody>
                        </table>
                        <button id="nuevaAt" name="nuevaAt" type="button" class="btn btn-warning"><i class="bi bi-plus-circle"></i>&nbsp;Nuevo Registro </button>
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
        $("#nuevaAt").on('click', function(){
            $("#agregarAtracciones tbody tr:eq(0)").clone().removeClass('f-Atracciones').appendTo("#agregarAtracciones");
        });
    // Evento que selecciona la fila y la elimina 
        $(document).on("click",".eliminarAt",function(){
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