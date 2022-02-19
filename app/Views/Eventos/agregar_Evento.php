<!--MODAL AGREGAR EVENTO-->
<div class="modal fade" id="myModal" style="color:black;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar Evento</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="" enctype="multipart/form-data" name="formulario" id="formulario">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input class="form-control" type="text"  id="na" required placeholder="Nombre"/>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input class="form-control" type="text"  id="are" required placeholder="Dirección"/>
                    </div>
                    <div class="form-group">
                        <label for="ciudad">Ciudad</label>
                        <input class="form-control" type="text"  id="ren" required placeholder="Ciudad"/>
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <input class="form-control" type="text"  id="pro" required placeholder="Estado"/>
                    </div>
                    <div class="form-group">
                        <label for="fechas">Fechas</label>
                        <table class="table table-bordered">
                            <th>Fecha de Inicio</th>
                            <th>Fecha de Termino</th>
                            <tbody>
                                <td>
                                    <input class="form-control" type="date"  id="fechaInicio" required>
                                </td>
                                <td>
                                    <input class="form-control" type="date"  id="fechaTermino" required>
                                </td>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group">
                        <label for="estado">Equivalencia de pesos a creditos</label>
                        <input class="form-control" type="text"  id="pesos" required placeholder="Pesos"/>
                        <input class="form-control" type="text"  id="creditos" required placeholder="Creditos"/>
                    </div>
                    <div class="modal-footer">
                        <button name="adicional" type="button" class="btn btn-success">Agregar </button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>