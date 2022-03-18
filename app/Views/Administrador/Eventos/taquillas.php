<!--MODAL AGREGAR ATRACCIONES-->
<div class="modal fade" id="taquillas" style="color:black;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Alta Taquilla</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="" enctype="multipart/form-data" name="formulario" id="formulario">
                    <div class="table table-striped table-responsive">
                        <table class="table table-bordered" id="agregarTaq">
                            <thead>
                                <th scope="col" style="vertical-align: middle;">Nombre</th>
                                <th scope="col" style="vertical-align: middle;">Posición</th>
                            </thead>
                            <tbody>
                                <tr class="filas">
                                    <td>
                                        <div class="form-group">
                                            <label for="">Nombre Taquilla</label>
                                            <input type="text" name="" id="" class="form-control">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <label for="">Área</label>
                                            <input type="text" name="" id="" class="form-control">
                                        </div>
                                    </td>
                                    <td class="deletef"><input type="button" value="-"></td>
                                </tr>
                            </tbody>
                        </table>
                               
                    </div>
                    <button id="addf" name="adicional" type="button" class="btn btn-warning"> + </button>
                    <button id="save" name="save" type="button" class="btn btn-success">Guardar</button>
                </form><hr>
            </div>                 
        </div>
    </div>
</div>
        <!--/Contenedor del Lote-->
<script>
    $(function(){
        // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
            $("#addf").on('click', function(){
            $("#agregarTaq tbody tr:eq(0)").clone().removeClass('filas').appendTo("#agregarTaq");
            });
            // Evento que selecciona la fila y la elimina 
            $(document).on("click",".deletef",function(){
                var parent = $(this).parents().get(0);
            $(parent).remove();
            });
        });
</script>