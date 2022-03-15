<!--AGREGAR ASOCIACION-->
<div class="modal fade" id="Areas" style="color:black;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar Asociación</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="" enctype="multipart/form-data" name="formulario" id="formulario">
                    <div class="form-group">
                        <label for="">Elige un Usuario</label>
                        <select name="" id="" class="form-control">
                            <option value="">Pedrito</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Elige una Área</label>
                        <select name="select" id="mi_lista" class="form-control">
                            <option value="">Elige una opción</option>
                            <option value="1" id="val">Juegos mecánicos infantiles</option>
                            <option value="2">Juegos mecánicos extremos</option>
                        </select> 
                    </div>
                    <div class="form-group" id="infantiles" style="display: none;">
                        <input type="checkbox" value="1">Carruseles<br>
                        <input type="checkbox" value="2">Carros Chocones<br>
                        <input type="checkbox" value="3">Trénes Eléctricos<br>
                        <input type="checkbox" value="4">Juegos Autocontrolados<br>
                        <input type="checkbox" value="5">El Gusanito<br>
                        <input type="checkbox" value="6">Montaña Rusa para niños<br>
                    </div>
                    <div class="form-group" id="extremos" style="display: none;">
                        <input type="checkbox" value="1">Montaña Rusa<br>
                        <input type="checkbox" value="2">Rueda de la Fortuna<br>
                        <input type="checkbox" value="3">Torre de Caída<br>
                        <input type="checkbox" value="4">Slingshot<br>
                        <input type="checkbox" value="5">Barco Pirata<br>
                        <input type="checkbox" value="6">Sillas Voladoras<br>
                    </div>
                    <button class="btn btn-success">Agregar</button>
                </form>
                <div class="contenedorTabla">
                    <br>
                    <!--Tabla-->
                    <table id="example" class="table table-striped">
                        <thead>
                            <!--Titulos de la tabla-->
                            <!--FILTRAR POR PUNTOS DE VENTA-->
                            <th></th>
                            <th style="vertical-align: middle;">Usuario</th>
                            <th style="vertical-align: middle;">Área Asignada</th>
                            <th style="vertical-align: middle;">Atracciones a cargo</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="vertical-align: middle;"><a href="#editarEvento" type="button" data-toggle="modal"><i class="bi bi-pencil-square btn btn-warning"></i></a></td>
                                <td style="vertical-align: middle;"></td>
                                <td style="vertical-align: middle;"></td>
                                <td style="vertical-align: middle;"></td>
                            </tr>
                        </tbody>
                    </table>
                    <!--/Tabla-->
                </div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d239005.83634601292!2d-100.5536337860111!3d20.60984612657324!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2smx!4v1647380145756!5m2!1ses-419!2smx" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    $(document).on('change', '#mi_lista', function(event) {
    const opcion = ($("#mi_lista option:selected").val());
    //alert(opcion);
        if(opcion === '1'){
            alert("Es la opcion 1");
            $('#infantiles').show();
            $('#extremos').hide();
        }else{
            alert("Es la opcion 2");
            $('#infantiles').hide();
            $('#extremos').show();
        }
    });
</script>