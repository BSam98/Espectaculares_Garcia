<?php 
if((!isset($_SESSION['Usuario'])) || (!isset($_SESSION['idUsuario']))) {
    header('Location: http://localhost/Espectaculares_Garcia/public/');
    exit();
}else{
?>

<!DOCTYPE html>
<html lang = "es">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content = "ie=edge"/>
        <title>Espectaculares García</title>
        <link href="CSS/cabecera_style.css" rel="stylesheet" type="text/css">
        <!--link href = "CSS/eventos_style.css" rel = "stylesheet" type="text/css"-->

        <link rel="stylesheet" href="../bootstrap/bootstrap.min.css" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <script src="../bootstrap/jquery.min.js"></script>
        <script src="../bootstrap/jquery.slim.min.js" crossorigin="anonymous"></script>
        <script src="../bootstrap/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="../bootstrap/jquery.dataTables.min.css"> 
        <link rel="stylesheet" href="../bootstrap/buttons.dataTables.min.css"> 
        <script src="../bootstrap/jquery-3.5.1.js"></script>
        <script src="../bootstrap/jquery.dataTables.min.js"></script>
        <script src="../bootstrap/dataTables.buttons.min.js"></script>
        <script src="../bootstrap/jszip.min.js"></script>
        <script src="../bootstrap/pdfmake.min.js"></script>
        <script src="../bootstrap/vfs_fonts.js"></script>
        <script src="../bootstrap/buttons.html5.min.js"></script>
        <script src="../bootstrap/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../bootstrap/bootstrap-icons.css">
        <link rel="stylesheet" href="../bootstrap/aos.css" />
        <script src="../bootstrap/aos.js"></script>
        <script src="../bootstrap/sweetalert.min.js"></script>
        <script src="../bootstrap/jquery.easing.min.js"></script>
        <!--link href="../bootstrap/sb-admin-2.min.css" rel="stylesheet"-->
        <script src="../bootstrap/moment-with-locales.min.js"></script>
        <script src="../bootstrap/jquery.loadingModal.js"></script>
        <link rel="stylesheet" href="../bootstrap/jquery.loadingModal.css">
        <!--link href="CSS/inicio_sesion_style.css" rel="stylesheet" type="text/css"-->
        <script src="JS/menu.js"></script>
    </head>
    <body style="background-image: url('./Img/mainbg.png'); background-repeat:repeat;">
        <nav class="navbar navbar-fixed-top tm_navbar negro" role="navigation">
            <a href="Menu_Principal_User"><img src = "Img/logo.png" style="width: 70px; height:7   0px;"/></a>
                <ul class="nav navbar-nav sf-menu">
                <li class="dropdown">
                    <a class="navbar-brand" href="#"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;<?php echo $_SESSION['Usuario']?></a>
                        <ul class="dropdown-submenu" id="subMenuCatalago">
                            <li><a href="CerrarSesion" id="button"><span>Salir</span></a></a></li>
                        </ul>
                </li>
            </ul>
        </nav>
        <fieldset id="fieldset" data-aos-anchor-placement="top-bottom" data-ais-duration="1000" style="color:black;">
        
            <div id="contenedor_Ventanillas">
                <input type="hidden" id="idEvento" value="<?php echo $_SESSION['idEvento'] ?>">
                <center><h2><i class="fa fa-university" aria-hidden="true"></i>SUPERVISAR VENTANILLAS</h2></center>
                <hr>
                <br>
                <div class="container-fluid">
                    <label><h5><i class="fa fa-search" aria-hidden="true"></i>Seleccione una fecha: </h5></label><br>
                    <input type="date" name="fechaesperada" id="fechaesperada">
                </div>
                <div class="table table-striped table-responsive">
                    <table id="tabla_Ventanillas" class="table table-border">
                        <br>
                        <thead>
                            <tr>
                                <th colspan="7"><center>Ventanillas</center></th>
                            </tr>
                            <tr>
                                <th scope="col" style="text-align: center; vertical-align:middle;">Status</th>
                                <th scope="col" style="text-align: center; vertical-align:middle;">Ventanilla</th>
                                <th scope="col" style="text-align: center; vertical-align:middle;">Taquillero</th>
                                <th scope="col" style="text-align: center; vertical-align:middle;">Efectivo</th>
                                <th scope="col" style="text-align: center; vertical-align:middle;">Tarjeta</th>
                                <th scope="col" style="text-align: center; vertical-align:middle;">Hora de Apertura</th>
                                <th scope="col" style="text-align: center; vertical-align:middle;">Opciones</th>
                            </tr>
                        </thead>
                        <tbody id="body_Ventanillas">
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="contenedor_Realizar_Cierre" id="contenedor_Realizar_Cierre" style="color:black; display:none;">
                <div class="input-group">
                    <a href="javascript:cerra_Contenedor_Realizar_Cierre();" class="btn btn-danger"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Regresar</a>
                </div> 
                <center><label><h2>Movimientos</h2></label></center>
                <!-- Content Row -->

                <div class="row">

                    <!-- Area Chart -->
                    <div class="col-xl-8 col-lg-7">
                        <div class="card shadow mb-5">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-4 d-flex flex-row align-items-center justify-content-between">
                                <h6 scope="col" style="text-align: center; vertical-align: middle;"><i class="fa fa-bars" aria-hidden="true"></i>&nbsp;Concepto</h6>
                                <h6><center><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"width="30px" height="30px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                            <g><path d="M256,0C114.625,0,0,114.625,0,256s114.625,256,256,256s256-114.625,256-256S397.375,0,256,0z M256,480
                                            C132.5,480,32,379.5,32,256S132.5,32,256,32s224,100.5,224,224S379.5,480,256,480z M335.562,265.844
                                            c6.095,10.313,9.156,22.344,9.156,36.125c0,21.156-6.312,38.781-18.906,52.875c-12.594,14.125-30.78,22.438-54.562,24.938V416
                                            h-30.313v-36.031c-39.656-4.062-64.188-27.125-73.656-69.125l46.875-12.219c4.344,26.406,18.719,39.594,43.125,39.594
                                            c11.406,0,19.844-2.812,25.219-8.469s8.062-12.469,8.062-20.469c0-8.281-2.688-14.563-8.062-18.813
                                            c-5.375-4.28-17.344-9.688-35.875-16.25c-16.656-5.78-29.688-11.469-39.063-17.155c-9.375-5.625-17-13.531-22.844-23.688
                                            c-5.844-10.188-8.781-22.063-8.781-35.563c0-17.719,5.25-33.688,15.688-47.875c10.438-14.156,26.875-22.813,49.313-25.969V96
                                            h30.313v27.969c33.875,4.063,55.813,23.219,65.781,57.5l-41.75,17.125c-8.156-23.5-20.72-35.25-37.781-35.25
                                            c-8.563,0-15.438,2.625-20.594,7.875c-5.188,5.25-7.781,11.625-7.781,19.094c0,7.625,2.5,13.469,7.5,17.563
                                            c4.969,4.063,15.688,9.094,32.063,15.125c18,6.563,32.125,12.781,42.344,18.625C321.281,247.469,329.438,255.563,335.562,265.844z"
                                            /></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>&nbsp;Efectivo</center></h6>
                                <h6 scope="col" style="text-align: center; vertical-align: middle;"><i class="fa fa-credit-card" aria-hidden="true"></i>&nbsp;Tarjeta</h6>
                                <h6 scope="col" style="text-align: center; vertical-align: middle;"><i class="fa fa-clock" aria-hidden="true"></i>&nbsp;Hora</h6>
                                <h6 scope="col" style="text-align: center; vertical-align: middle;"><i  aria-hidden="true"></i>&nbsp;</h6>
                                <h6 scope="col" style="text-align: center; vertical-align: middle;"><i  aria-hidden="true"></i>&nbsp;</h6>
                                <!--<h6 scope="col" style="text-align: center; vertical-align: middle;"><i  aria-hidden="true"></i>&nbsp;</h6>-->
                                <h6 class="m-0 font-weight-bold text-primary"></h6>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="chart-area table table-responsive table-wrapper" style=" color: black; background-image: url('../../../Espectaculares_Garcia/public/Img/logog.png'); background-repeat:no-repeat; background-position: center;">
                                    <table id="compras" class="table table-border">
                                        <!--thead>
                                        <th style="width: 15%;"></th>
                                        </thead-->
                                        <tbody id="informacion">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer" id="pie_Informacion"></div>
                        </div>
                        <!--button type="button" id="cobrar" class="btn btn-success cobrar" data-toggle="modal" data-target="#modal_Cobrar">Cobrar</    button-->
                    </div>

                    <!-- Pie Chart -->
                    <div class="col-xl-4 col-lg-5">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <!--<div class="input-group">-->
                                    <!--<div class="col-xs-2 col-sm-4">-->
                                        <center><h5>Total</h5></center>
                                    <!--</div>-->
                                <!--</div>-->
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="table  table-responsive">
                                    <table class="table table-border">
                                        <tbody id="detalles"></tbody>
                                    </table>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </fieldset>
    </body>
</html>
<script src="JS/carga.js"></script>
<script src="JS/supervisarTaquillas.js"></script>
<?php }?>