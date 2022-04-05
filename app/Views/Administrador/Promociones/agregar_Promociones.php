 <!--MODAL AGREGAR PROMOCIÓN-->
 <div class="modal fade" id="modal_nueva_promocion" style="color:black;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar Promoción</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" name="formularioAgregarPromocion" id="formularioAgregarPromocion">
                    <table id="agregar-User" class="table table-responsive table-striped">
                        <tbody>
                            <tr class="fila-User">
                                <td>
                                    <input class="form-control" type ="hidden" id="promocion" name ="promocion" value = ""/>
                                    <div class="form-group">
                                        <label for="nombre_promocion">Nombre</label>
                                        <input class="form-control" type="text" id="nombre_promocion" required name="nombre_promocion[]" placeholder="Nombre de la promoción"/>
                                    </div>
                                    <div class="form-group" id="area_Cantidad">
                                    </div>
                                    <div class="from-group" id="area_Cantidad_Boletos">
                                    </div>
                                    <div class="form-group" id="area_Creditos_Cortesia">
                                    </div>
                                </td>
                                <td class="del-U"><input type="button" value="-"/></td>
                            </tr>
                        </tbody>
                    </table>
                    <button id="ad-Us" name="ad-Us" type="button" class="btn btn-warning"> + </button>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button name="a" type="button" class="btn btn-success" id="a">Agregar </button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>  
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(function(){
                    // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
        $("#ad-Us").on('click', function(){
        $("#agregar-User tbody tr:eq(0)").clone().removeClass('fila-User').appendTo("#agregar-User");
        });
        // Evento que selecciona la fila y la elimina 
        $(document).on("click",".del-U",function(){
            var parent = $(this).parents().get(0);
        $(parent).remove();
        });
    });
</script>