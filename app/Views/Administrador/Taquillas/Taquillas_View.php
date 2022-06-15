<?php 
if((!isset($_SESSION['Usuario'])) || (!isset($_SESSION['idUsuario']))){
    header('Location: http://localhost/Espectaculares_Garcia/public/');
    exit();
}else{
?>
<fieldset id="fieldset" data-aos-anchor-placement="top-bottom" data-ais-duration="1000" style="color:black;">
    <center><h2><i class="fa fa-university" aria-hidden="true"></i>SUPERVISAR TAQUILLAS</h2></center>
    <div class="container-fluid">
        <label><h5><i class="fa fa-search" aria-hidden="true"></i>Elige un Evento: </h5></label><br>
        <select class="form-control" name="evento" id="evento" required>
            <option>Elige un evento</option>
            <?php foreach ($Eventos as $key => $dE) : ?>
                <option value="<?= $dE->idEvento?>"><?= $dE->Nombre?></option>
            <?php endforeach ?>
        </select>
    </div>



    <hr>
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Taquillas activas</a>
            <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Taquillas Inhactivas</a>
    </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <br>
        <div class="table table-striped table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <!--th colspan="3"><center>Datos del evento</center></th-->
                        <th colspan="5"><center>Datos de la taquilla</center></th>
                    </tr>
                    <tr>
                        <!--th>Evento</th-->
                        <!--th>Ciudad</th-->
                        <!--th>Estado</th-->
                        <th scope="col" style="text-align: center; vertical-align: middle;">Taquilla</th>
                        <th scope="col" style="text-align: center; vertical-align: middle;">Supervisor</th>
                        <th scope="col" style="text-align: center; vertical-align: middle;">Efectivo</th>
                        <th scope="col" style="text-align: center; vertical-align: middle;">Tarjeta</th>
                        <th scope="col" style="text-align: center; vertical-align: middle;">Ventanillas</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <!--<td style="vertical-align: middle;"></td>
                            <td style="vertical-align: middle;"></td>
                            <td style="vertical-align: middle;"></td>
                            <td style="text-align: center; vertical-align: middle;"></td>-->
                            <td style="text-align: center; vertical-align: middle;"></td>
                            <td style="text-align: center; vertical-align: middle;"></td>
                            <td style="text-align: center; vertical-align: middle;"></td>
                            <td style="text-align: center; vertical-align: middle;"></td>
                            <td style="text-align: center; vertical-align: middle;"><a data-toggle="modal" data-target="#modal_Ventanilla_Activa" style="transition-duration: 3s, 5s;" class ="btn btn-warning">Ver</a></td>
                        </tr>
                </tbody>
            </table>
        </div>
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <br>
            <div class="container-fluid">
                <label><h6>Seleccione una Fecha</h6></label><br>
                <input type="date" name="fechaesperada" id="fechaesperada">
            </div>
            <br>
            <hr>
            <div class="table table-striped table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <!--th colspan="3"><center>Datos del evento</center></th-->
                            <th colspan="6"><center>Datos de la taquilla</center></th>
                        </tr>
                        <tr>
                            <!--th>Evento</th-->
                            <!--th>Ciudad</th-->
                            <!--th>Estado</th-->
                            <th scope="col" style="text-align: center; vertical-align: middle;">Status</th>
                            <th scope="col" style="text-align: center; vertical-align: middle;">Taquilla</th>
                            <th scope="col" style="text-align: center; vertical-align: middle;">Efectivo</th>
                            <th scope="col" style="text-align: center; vertical-align: middle;">Tarjeta</th>
                            <th scope="col" style="text-align: center; vertical-align: middle;">Ventanillas</th>
                        </tr>
                    </thead>
                    <tbody id="body_Taquillas_Inactivas">
                            <tr>
                                <!--<td style="vertical-align: middle;"></td>
                                <td style="vertical-align: middle;"></td>
                                <td style="vertical-align: middle;"></td>-->
                                <td style="text-align: center; vertical-align: middle;"></td>
                                <td style="text-align: center; vertical-align: middle;"></td>
                                <td style="text-align: center; vertical-align: middle;"></td>
                                <td style="text-align: center; vertical-align: middle;"></td>
                                <td style="text-align: center; vertical-align: middle;"></td>
                                <td style="text-align: center; vertical-align: middle;"><a data-toggle="modal" data-target="#modal_Ventanilla_Inactiva" style="transition-duration: 3s, 5s;" class ="btn btn-warning">Ver</a></td>
                            </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>    
</fieldset>
<?php
    include 'Ventanillas_View.php';
?>

<script src="JS/carga.js"></script>
<script src="JS/taquillaReporte.js"></script>
<script>
    $(document).ready(function(){
        $("select.evento").change(function(){
            var selectedCountry = $(this).children("option:selected").val();
            alert("You have selected the country - " + selectedCountry);
        });
    });


</script>
<?php }?>