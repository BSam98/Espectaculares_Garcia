<fieldset id="fieldset">
    <center><h2>SUPERVISOR VALIDADOR</h2></center>
<!--nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><i class="fa fa-street-view" aria-hidden="true"></i>&nbsp;Supervisor de Atracciones</a>
    <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="fa fa-street-view" aria-hidden="true"></i>&nbsp;Supervisor Validador</a>
  </div>
</nav-->
<br>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
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
        <hr>
        <div class="table table-striped">
            <table>
                <thead>
                    <tr>
                        <th colspan="3"><center>Datos del evento</center></th>
                        <th colspan="2"><center>Datos del supervisor</center></th>
                        <th colspan="2"><center>Atracciones a Supervisar</center></th>
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