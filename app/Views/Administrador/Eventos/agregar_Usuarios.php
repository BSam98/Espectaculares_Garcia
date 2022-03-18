<!--MODAL AGREGAR ATRACCIONES-->
<div class="modal fade" id="usuarios" style="color:black;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar Usuarios</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="" enctype="multipart/form-data" name="formulario" id="formulario">
                    <div class="table table-striped table-responsive">
                        <table id="agregarUsuarios" class="table table-bordered">
                            <thead>
                                <th>Usuario</th>
                                <th>Rol</th>
                                <th>Asignación</th>
                            </thead>
                            <tbody>
                                <tr class="usuarioss">
                                    <td>
                                        <div class="form-group">
                                            <select name="user[]" id ="user" class="form-control">
                                                <option value="">Seleccionar Usuario</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select name="rol[]" id="rol" class="form-control">
                                                <option value="">Seleccionar Rol</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                        <input type="checkbox" name="" id="">Atracción
                                        <input type="checkbox" name="" id="">Taquillas
                                        </div>
                                    </td>
                                    <td class="deletUser"><input type="button" value="-"/></td>
                                </tr>
                            </tbody>
                        </table>
                        <button id="addUSer" name="addUSer" type="button" class="btn btn-warning"><i class="bi bi-plus-circle"></i>&nbsp;Nuevo Registro </button>
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
        $("#addUSer").on('click', function(){
            $("#agregarUsuarios tbody tr:eq(0)").clone().removeClass('usuarioss').appendTo("#agregarUsuarios");
        });
    // Evento que selecciona la fila y la elimina 
        $(document).on("click",".deletUser",function(){
            var parent = $(this).parents().get(0);
            $(parent).remove();
        });
    });

    $( function() {
        $( "#datepicker" ).datepicker({dateFormat: 'yyyy-mm-dd'});
    });
</script>