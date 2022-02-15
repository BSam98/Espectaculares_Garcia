<!--AGREGAR PROPIETARIO EN PESTAÑA DE ATRACCIONES -->
<div class="modal fade" id="Agregar" style="color:black;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar Propietario</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="Agregar_Propietario" enctype="multipart/form-data" name="formulario" id="formulario">
                  <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input class="form-control" type="text"  id="na" name="na[]" placeholder="Nombre"/></td>
                    </div>    
                    <div class="form-group">
                        <label for="apep">Apellido Paterno</label>
                        <input class="form-control" type="text"  id="app" name="app[]" placeholder="Apellido Paterno"/></td>
                    </div>
                    <div class="form-group">
                        <label for="apem">Apellido Materno</label>
                        <input class="form-control" type="text"  id="apm" name="apm[]" placeholder="Apellido Materno"/></td>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input class="form-control" type="text"  id="dir" required name="dir[]" placeholder="Dirección"/></td>
                    </div>
                    <div class="form-group">
                        <label for="cel">Teléfono</label>
                        <input class="form-control" type="number"  id="tel" required name="tel[]" placeholder="Telefono"/></td>
                    </div>
                    <div class="form-group">
                        <label for="rfc">RFC</label>
                        <input class="form-control" type="text"  id="rfc" required name="rfc[]" placeholder="RFC"/></td>
                    </div>
                    <div class="form-group">
                        <label for="fechan">Fecha de Nacimiento</label>
                        <input class="form-control" type="date"  id="dat" required name="dat[]" placeholder="Fecha de Nacimiento"/></td>
                    </div>
                    <button class="btn btn-success" typde="submit" id="enlace">Agregar</button><hr>    
                </form>
            </div>
        </div>
    </div>
</div>
