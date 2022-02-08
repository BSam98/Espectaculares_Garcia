<form method="POST" action="" enctype="multipart/form-data" name="formulario" id="formulario">
    <div class="table table-striped table-responsive">
        <table id="tabla" class="table table-bordered">
            <thead>
                <th>Nombre</th>
                <th>Área</th>
                <th>Renta</th>
                <th>Propietario</th>
                <th>Capacidad Máxima</th>
                <th>Capacidad Minima</th>
                <th>Tiempo</th>
                <th>Tiempo Máximo</th>
            </thead>
            <tbody>
                <tr class="fila-fija">
                    <td><input class="form-control" type="text"  id="na" required name="na[]" placeholder="Nombre"/></td>
                    <td><input class="form-control" type="text"  id="are" required name="are[]" placeholder="Área"/></td>
                    <td><input class="form-control" type="text"  id="ren" required name="ren[]" placeholder="Renta"/></td>
                    <td>
                        <select class="form-control" type="text"  id="pro" required name="pro[]">
                            <option>Coche</option>
                        </select>
                        <!--input class="form-control" type="text"  id="pro" required name="pro[]" placeholder="Propietario"/-->
                    </td>
                    <td><input class="form-control" type="text"  id="cma" required name="cma[]" placeholder="Cantidad Máxima"/></td>
                    <td><input class="form-control" type="text"  id="cmi" required name="cmi[]" placeholder="Cantidad Mínima"/></td>
                    <td><input class="form-control" type="text"  id="tim" required name="tim[]" placeholder="Tiempo"/></td>
                    <td><input class="form-control" type="text"  id="tma" required name="tma[]" placeholder="Tiempo Máximo"/></td>
                    <td class="eliminar"><input type="button"   value="-"/></td>
                </tr>
            </tbody>
        </table>
        <button id="adicional" name="adicional" type="button" class="btn btn-warning"> + </button>
    </div>
</form>
<button name="adicional" type="button" class="btn btn-success">Agregar </button>
<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                