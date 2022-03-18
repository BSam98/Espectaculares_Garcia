<fieldset id="fieldset">
<center><h2><i class="fa fa-street-view" aria-hidden="true"></i>&nbsp; SUPERVISOR DE VALIDACIÓN</h2></center><hr>
    <div class="container">
        <form action="">

            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="form-group">
                            <div class="input-group">
                            <label for=""><h5><i class="fa fa-home" aria-hidden="true"></i>&nbsp;Evento:&nbsp;</h5></label>
                                <select class="form-control" name="evento" id="evento" required>
                                    <option>Evento</option>
                                        <option value=""></option>
                                </select>
                            <span class="input-group-addon">&nbsp;&nbsp;</span>
                            <label for=""><h5><i class="fa fa-male" aria-hidden="true"></i>&nbsp;Supervisor:&nbsp;</h5></label>
                                <select class="form-control" name="evento" id="evento" required>
                                    <option>Supervisor</option>
                                        <option value=""></option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>           
        </form>
        <hr>
        <div class="table table-striped">
            <table>
                <thead>
                    <tr>
                        <th colspan="3"><center>Datos del evento</center></th>
                        <th colspan="2"><center>Datos del supervisor</center></th>
                        <th colspan="2"><center>Atracciones a Validar</center></th>
                    </tr>
                    <tr>
                        <th>Evento</th>
                        <th>Ciudad</th>
                        <th>Estado</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Área</th>
                        <th>Atracción</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td style="vertical-align: middle;"></td>
                            <td style="vertical-align: middle;"></td>
                            <td style="vertical-align: middle;"></td>
                            <td style="vertical-align: middle;"></td>
                            <td style="vertical-align: middle;"></td>
                            <td style="vertical-align: middle;"></td>
                            <td style="vertical-align: middle;"></td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
</fieldset>


<script>
    $(document).ready(function(){
        $("select.evento").change(function(){
            var selectedCountry = $(this).children("option:selected").val();
            alert("You have selected the country - " + selectedCountry);
        });
    });
</script>