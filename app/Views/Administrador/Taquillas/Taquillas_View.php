<?php 
if((!isset($_SESSION['Usuario'])) || (!isset($_SESSION['idUsuario']))){
    header('Location: http://localhost/Espectaculares_Garcia/public/');
    exit();
}else{
?>
<fieldset id="fieldset" data-aos-anchor-placement="top-bottom" data-ais-duration="1000" style="color:black;">
    <center><h2><i class="fa fa-university" aria-hidden="true"></i>SUPERVISAR TAQUILLAS</h2></center>

    <div id="contenedor_Ventanillas">
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
                <table id="tabla_Taquillas_Activas" class="table table-border">
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
                            <th scope="col" style="text-align: center; vertical-align: middle;">Efectivo</th>
                            <th scope="col" style="text-align: center; vertical-align: middle;">Tarjeta</th>
                            <th scope="col" style="text-align: center; vertical-align: middle;">Ventanillas</th>
                        </tr>
                    </thead>
                    <tbody id="body_Taquillas_Activas">
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
                    <table id="tabla_Taquillas_Inactivas" class="table table-border">
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <div class="contenedor_Realizar_Cierre" id="contenedor_Realizar_Cierre" style="color:black; display:none;">
        <div class="input-group">
            <a href="javascript:cerra_Contenedor_Realizar_Cierre();" class="btn btn-danger"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Regresar</a>
        </div> 
        <center><label><h2>Ventanillas Activas</h2></label></center>
        <!-- Content Row -->

        <div class="container-fluid">

            <!-- Area Chart -->
            <!--<div class="col-xl-8 col-lg-7">-->
                <div class="card shadow mb-5">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-4 d-flex flex-row align-items-center justify-content-between">
                        <h6 scope="col" style="text-align: center; vertical-align: middle;"><i class="fa fa-bars" aria-hidden="true"></i>&nbsp;Ventanilla</h6>
                        <h6 scope="col" style="text-align: center; vertical-align: middle;"><i class="fa fa-bars" aria-hidden="true"></i>&nbsp;Taquillero</h6>
                        <h6 scope="col" style="text-align: center; vertical-align: middle;"><i class="fa fa-bars" aria-hidden="true"></i>&nbsp;Efectivo</h6>
                        <h6 scope="col" style="text-align: center; vertical-align: middle;"><i class="fa fa-bars" aria-hidden="true"></i>&nbsp;Tarjeta</h6>
                        <h6 scope="col" style="text-align: center; vertical-align: middle;"><i class="fa fa-bars" aria-hidden="true"></i>&nbsp;Hora de Apertura</h6>
                        <h6 scope="col" style="text-align: center; vertical-align: middle;"><i aria-hidden="true"></i>&nbsp;</h6>
                        <!--<h6 scope="col" style="text-align: center; vertical-align: middle;"><i  aria-hidden="true"></i>&nbsp;</h6>-->
                        <h6 class="m-0 font-weight-bold text-primary"></h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area table table-responsive table-wrapper">
                            <table id="tabla_Ventanillas_Activas" class="table table-border" style=" color: black; background-image: url('../../../Espectaculares_Garcia/public/Img/logog.png'); background-repeat:no-repeat; background-position: center;">
                                <!--thead>
                                <th style="width: 15%;"></th>
                                </thead-->

                                <tbody id="body_Ventanillas_Activas">
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer" id="pie_Informacion"></div>
                </div>
                <!--button type="button" id="cobrar" class="btn btn-success cobrar" data-toggle="modal" data-target="#modal_Cobrar">Cobrar</    button-->
            <!--</div>-->
        </div>
    </div>




    <div class="contenedor_Mostrar_Ventanillas_Inactivas" id="contenedor_Mostrar_Ventanillas_Inactivas" style="color:black; display:none;">
        <div class="input-group">
            <a href="javascript:cerra_Contenedor_Ventanillas_Inactivas();" class="btn btn-danger"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Regresar</a>
        </div> 
        <center><label><h2>Ventanillas Inactivas</h2></label></center>
        <!-- Content Row -->

        <div class="container-fluid">

            <!-- Area Chart -->
            <!--<div class="col-xl-8 col-lg-7">-->
                <div class="card shadow mb-5">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-4 d-flex flex-row align-items-center justify-content-between">
                        <h6 scope="col" style="text-align: center; vertical-align: middle;"><i class="fa fa-bars" aria-hidden="true"></i>&nbsp;Status</h6>
                        <h6 scope="col" style="text-align: center; vertical-align: middle;"><i class="fa fa-bars" aria-hidden="true"></i>&nbsp;Ventanilla</h6>
                        <h6 scope="col" style="text-align: center; vertical-align: middle;"><i class="fa fa-bars" aria-hidden="true"></i>&nbsp;Taquillero</h6>
                        <h6 scope="col" style="text-align: center; vertical-align: middle;"><i class="fa fa-bars" aria-hidden="true"></i>&nbsp;Efectivo Total</h6>
                        <h6 scope="col" style="text-align: center; vertical-align: middle;"><i class="fa fa-bars" aria-hidden="true"></i>&nbsp;Tarjeta Total</h6>
                        <h6 scope="col" style="text-align: center; vertical-align: middle;"><i class="fa fa-bars" aria-hidden="true"></i>&nbsp;Taquillero</h6>
                        <h6 scope="col" style="text-align: center; vertical-align: middle;"><i class="fa fa-bars" aria-hidden="true"></i>&nbsp;Taquillero</h6>
                        <h6 scope="col" style="text-align: center; vertical-align: middle;"><i class="fa fa-bars" aria-hidden="true"></i>&nbsp;Taquillero</h6>
                        <h6 scope="col" style="text-align: center; vertical-align: middle;"><i aria-hidden="true"></i>&nbsp;</h6>
                        <!--<h6 scope="col" style="text-align: center; vertical-align: middle;"><i  aria-hidden="true"></i>&nbsp;</h6>-->
                        <h6 class="m-0 font-weight-bold text-primary"></h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-area table table-responsive table-wrapper">
                            <table id="tabla_Ventanillas_Inactivas" class="table table-border"style=" color: black; background-image: url('../../../Espectaculares_Garcia/public/Img/logog.png'); background-repeat:no-repeat; background-position: center;">

                                <tbody id="body_Ventanillas_Inactivas">
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer" id="pie_Informacion"></div>
                </div>
                <!--button type="button" id="cobrar" class="btn btn-success cobrar" data-toggle="modal" data-target="#modal_Cobrar">Cobrar</    button-->
            <!--</div>-->
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