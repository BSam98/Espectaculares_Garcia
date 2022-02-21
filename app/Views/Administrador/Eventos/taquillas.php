<!--MODAL AGREGAR ATRACCIONES-->
<div class="modal fade" id="taquillas" style="color:black;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar Taquilla</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="" enctype="multipart/form-data" name="formulario" id="formulario">
                    <div class="table table-striped table-responsive">
                    <!--Tabla AGREGAR LOTES-->
                        <table class="table table-bordered" id="agregar">
                            <thead>
                            <!--Titulos de la tabla-->
                                <th scope="col" style="vertical-align: middle;">Nombre</th>
                                <th scope="col" style="vertical-align: middle;">Posición</th>
                            </thead>
                            <tbody>
                                <tr class="filas">
                                   <td><input type="text" class="form-control" placeholder="Nombre de Punto de Venta"></td>
                                    <td>
                                        <select name="" id="">
                                            <option value="" class="form-control">Elige una zona</option>
                                        </select>
                                    </td>
                                    <td class="deletef"><input type="button" value="-"></td>
                                </tr>
                            </tbody>
                        </table>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14927.529124130211!2d-100.4509066!3d20.715004349999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2smx!4v1645285339595!5m2!1ses!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                 
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
            $("#agregar tbody tr:eq(0)").clone().removeClass('filas').appendTo("#agregar");
            });
            // Evento que selecciona la fila y la elimina 
            $(document).on("click",".deletef",function(){
                var parent = $(this).parents().get(0);
            $(parent).remove();
            });
        });
</script>