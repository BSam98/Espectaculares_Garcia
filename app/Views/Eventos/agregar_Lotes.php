<!--MODAL AGREGAR ATRACCIONES-->
<div class="modal fade" id="AgregarL" style="color:black;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar Tarjetas</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="" enctype="multipart/form-data" name="formulario" id="formulario">
                    <div class="table table-striped table-responsive">
                    <!--Tabla AGREGAR LOTES-->
                        <table class="table table-bordered" id="agregar">
                            <thead>
                            <!--Titulos de la tabla-->
                                <th scope="col" style="vertical-align: middle;">Nombre del Lote</th>
                                <th scope="col" style="vertical-align: middle;">Número de folios disponibles</th>
                                <th scope="col" style="vertical-align: middle;">Folio Inicial</th>
                                <th scope="col" style="vertical-align: middle;">Folio Final</th>
                            </thead>
                            <tbody>
                                <tr class="filas">
                                    <td>
                                        <select class="form-control" name="lote" id="lote">
                                            <option value="">Elige un Lote</option>
                                        </select>
                                    </td>
                                    <td><input type="text" class="form-control" value="" disabled></td>
                                    <td><input type="number" class="form-control" placeholder="Folio Inicial"></td>
                                    <td><input type="number" class="form-control" placeholder="Folio Final"></td>
                                    <td class="deletef"><input type="button" value="-"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <button id="addf" name="adicional" type="button" class="btn btn-warning"> + </button>
                    <button id="save" name="save" type="button" class="btn btn-success">Guardar</button>
                </form><hr>

                <!--TABLA DE LOTES-->
                <div class="table table-striped table-responsive">
                    <table id="searchL" class="table table-bordered"><!--tenia id="tablas"-->
                        <thead>
                            <th></th>
                            <th scope="col" style="vertical-align: middle;">Nombre de la tarjeta</th>
                            <th scope="col" style="vertical-align: middle;">Folio</th>
                            <th scope="col" style="vertical-align: middle;">Fecha de Activacíon</th>
                            <th scope="col" style="vertical-align: middle;">Status</th>
                            <th scope="col" style="vertical-align: middle;">Tipo</th>
                        </thead>
                        <tbody>
                            <tr class="filas">
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
                <button id="cerrar" class="btn btn-danger">Cerrar</button>
            </div>                 
        </div>
    </div>
</div>
        <!--/Contenedor del Lote-->
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
</script>