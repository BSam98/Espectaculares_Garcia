<!--MODAL AGREGAR Zonas-->
<div class="modal fade" id="Zonas" style="color:black;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar Zonas</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" name="formulario_Agregar_Zonas" id="formulario_Agregar_Zonas">
                    <div class="table table-striped table-responsive">
                        <div>
                            <input type="hidden" id="idEventoZona" name="idEventoZona" value="">
                        </div>
                        <table id="agregarZonas" class="table table-bordered">
                            <tbody>
                                <tr class="f-Atracciones" id="0">
                                    <td>
                                        <div class="form-group" id="nuevas_Atracciones">
                                            <label for ="zonas">Nombre de la zona</label>
                                            <input class="form-control" type="text" id="zona" required name="zona[]"  placeholder="Nombre de la zona"/>
                                        </div>
                                    </td>
                                    <td class="eliminarAt"><input type="button" value="-"/></td>
                                </tr>

                            </tbody>
                        </table>
                        <button id="nuevaAt1" name="nuevaAt1" type="button" class="btn btn-warning"><i class="bi bi-plus-circle"></i>&nbsp;Nuevo Registro </button>
                    </div>
                    <button name="agregar_Zona" id="agregar_Zona" type="button" class="btn btn-success">Agregar </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </form>
            <hr>
                <!--TABLA DE LISTADOS-->
                <div class="table table-striped table-responsive">
                    <table id="atraccionesAdd" class="table table-bordered">
                        <thead>
                        <th scope="col" style="text-align: center; vertical-align: middle;"></th>
                        <th scope="col" style="text-align: center; vertical-align: middle;">Nombre</th>
                        </thead>
                        <tbody id = "zonas_Evento">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--MODAL AGREGAR Zonas-->


<script>
    $(function(){
        // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
            $("#nuevaAt1").on('click', function(){
            $("#agregarZonas tbody tr:eq(0)").clone().removeClass('filas').appendTo("#agregarZonas");
            });
            // Evento que selecciona la fila y la elimina 
            $(document).on("click",".eliminarAt",function(){
                var parent = $(this).parents().get(0);
            $(parent).remove();
            });
        });
</script>