<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="../css/sb-admin-2.min.css" rel="stylesheet">
        <link href="../css/sb-admin-2.css" rel="stylesheet"><!--Esta linea la acabo de agregar, tiene el estilo del radio en tipo pago-->
        <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    </head>
    <body id="page-top" style="background-image: url('./Img/mainbg.png'); background-repeat:repeat;" onload="mueveReloj()">
        <div id="wrapper">
        <!--ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar"><br>
            <li class="nav-item active">
            </li>
        </ul-->
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">
                <!-- Main Content -->
                <div id="content">
                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                        <!-- Topbar datos Evento -->
                        <?php foreach($Turno as $d){?>
                        <a aria-expanded="false" aria-controls="collapseTwo" style="font-family: monospace; color:black; font-size:16px;">
                            <?php echo '<b>Zona:</b>&nbsp;'.$d->Nombre.'&nbsp;<b>Taquilla:</b>&nbsp;'.$d->Nombre.'&nbsp;<b>Ventanilla:</b>&nbsp;'.$d->Nombre?>
                            </a>
                        <?php }?>
                        <form name="form_reloj">
                            <input type="text" name="reloj" size="25" style="background : inherit; border:none; font-family : Arial; font-size : 14px; text-align:right;" onload="window.document.form_reloj.reloj.blur()">
                        </form>
                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <div class="topbar-divider d-none d-sm-block"></div>
                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:black; font-size:14px;">
                                    <i class="fa fa-user" aria-hidden="true"></i>&nbsp;<?php echo session('Usuario'); ?>
                                </a>
                                <!-- Dropdown - menu deslizable -->
                                <!--div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item btn btn-danger" href="CerrarSesion" id="cerrarCaja" style="font-family: monospace; font-size:14px;">
                                        &nbsp;Cerrar Turno &nbsp;<i class="fa fa-times btn btn-danger" aria-hidden="true"></i>
                                    </a>
                                </div-->
                            </li>
                        </ul>
                    </nav>
                    <!-- End of Topbar -->
                    
                    <!-- Begin Page Content -->
                    <div class="container-fluid" style="background-color: white;" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
                        <center><h3 style="color:blue;"><b>REPORTE DE VENTAS</b></h3></center>
                        <div class="row">
                            <!-- Pending Requests Card Example -->
                            <div class="col-xl-12 col-md-12 mb-12">
                                <div class="card border-left-info shadow h-100 py-2" style="background-color: LightGray;">
                                    <div class="input-group">
                                        &nbsp;&nbsp;<center><h5 class="m-0 font-weight-bold" style="color:blue;"><i class="fa fa-share" aria-hidden="true"></i>&nbsp;Devolver Tarjetas:&nbsp;&nbsp;&nbsp;</h5></center>
                                        <div class="input-group-append">
                                            <h6 style="color:black;"><b>Folio Inicial:</b>&nbsp;</h6>
                                            <input type="text" class="form-control" name="dtI" id="dtI" style="width:150px;">
                                        </div>
                                            <span class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                        <div class="input-group-append">
                                            <h6 style="color:black;"><b>Folio Final:</b>&nbsp;</h6>
                                            <input type="text" class="form-control" name="dtF" id="dtF" style="width:150px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <!-- Area Chart -->
                            <div class="col-xl-6 col-lg-6">
                                <div class="card shadow mb-5">
                                    <!-- Card Header - Dropdown -->
                                    <div class="card-header">
                                        <center><h5 style="color:blue;"><i class="fa fa-table" aria-hidden="true"></i>&nbsp;<b>TABULADOR DE EFECTIVO</b></h5></center>
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body"  style="background-color: LightGray;"> 
                                        <form action="">
                                            <input type="hidden" name="fecha" id="fecha" value="">
                                            <input type="hidden" class="form-control" name="idv" id="idv" value="<?php echo $_GET['idv']?>">
                                            <div class="chart-area table table-responsive table-wrapper">
                                                <table class="table table-responsive" style=" color: black; background-image: url('../../../Espectaculares_Garcia/public/Img/logog.png'); background-repeat:no-repeat; background-position: center;">
                                                    <tbody style="color: black;">
                                                        <tr>
                                                            <td colspan="6"><h6 style="color:red;"><b>Nota:</b> Favor de separar el Fondo de Caja</h6></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="6" style="border: none;"><center><b>&nbsp;BILLETES&nbsp;</b></center></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-group">
                                                                    <label><b>$1,000</b></label>
                                                                    <input type="number" class="form-control tabulador" min="0" name="mil" id="mil" style="width : 100px; height:30px;" min="0">
                                                                    <input type="text" id="bmil" style="display:none;">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-group"> 
                                                                    <label><b>$500</b></label>
                                                                    <input type="number" class="form-control tabulador" min="0" name="quinientos" id="quinientos" style="width : 100px; height:30px;" min="0">
                                                                    <input type="text" id="bquin" style="display:none;">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <label><b>$200</b></label>
                                                                    <input type="number" class="form-control tabulador" min="0" name="dosc" id="dosc" style="width : 100px; height:30px;" min="0">
                                                                    <input type="text" id="bdos" style="display:none;">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <label><b>$100</b></label>
                                                                    <input type="number" class="form-control tabulador" min="0" name="cien" id="cien" style="width : 100px; height:30px;" min="0">
                                                                    <input type="text" id="bcien" style="display:none;">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <label><b>$50</b></label>
                                                                    <input type="number" class="form-control tabulador" min="0" name="cincuenta" id="cincuenta" style="width : 100px; height:30px;" min="0">
                                                                    <input type="text" id="bcin" style="display:none;">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <label><b>$20</b></label>
                                                                    <input type="number" class="form-control tabulador" min="0" name="veinte" id="veinte" style="width : 100px; height:30px;" min="0">
                                                                    <input type="text" id="bvei" style="display:none;">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="6" style="border: none;"><center><b>&nbsp;MONEDAS&nbsp;</b></center></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-group">
                                                                    <label><b>$10</b></label>
                                                                    <input type="number" class="form-control tabulador" min="0" name="diez" id="diez" style="width : 100px; height:30px;">
                                                                    <input type="text" id="mdiez" style="display:none;">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <label><b>$5</b></label>
                                                                    <input type="number" class="form-control tabulador" min="0" name="cinco" id="cinco" style="width : 100px; height:30px;">
                                                                    <input type="text" id="mcinco" style="display:none;">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <label><b>$2</b></label>
                                                                    <input type="number" class="form-control tabulador" min="0" name="dos" id="dos" style="width : 100px; height:30px;">
                                                                    <input type="text" id="mdos" style="display:none;">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <label><b>$1</b></label>
                                                                    <input type="number" class="form-control tabulador" min="0" name="uno" id="uno" style="width : 100px; height:30px;">
                                                                    <input type="text" id="muno" style="display:none;">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <label><b>$0.50</b></label>
                                                                    <input type="number" class="form-control tabulador" min="0" name="cincuentac" id="cincuentac" style="width : 100px; height:30px;">
                                                                    <input type="text" id="mcincuenta" style="display:none;">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <label><b># de Voucher's</b></label>
                                                                    <input type="number" class="form-control tabulador" min="0" name="voucher" id="voucher" value="" style="width : 100px; height:30px;">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>   
                                                <center><button type="button" class="btn btn-success" id="registrar" name="registrar" value=""><i class="fa fa-check-square" aria-hidden="true"></i>&nbsp;Registrar</button></center>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <div class="card shadow mb-5"  style="background-color: LightGray;">
                                    <div class="card-header">
                                        <center><h5 style="color:blue;"><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;<b>INFORMACIÓN</b>&nbsp;</h5></center><!--a href="#detalles" type="button" data-toggle="modal">Detalles</a></h5></center-->
                                    </div>
                                    <div class="card-body" style=" color: black; background-image: url('../../../Espectaculares_Garcia/public/Img/logog.png'); background-repeat:no-repeat; background-position: center;">
                                        <input type="hidden" name="money" id="money" value="">
                                        <input type="hidden" name="vouch" id="vouch" value="">
                                        <table class="table table-responsive" style="color:black;">
                                            <tbody id="informacion">
                                            <tr>
                                                <td>
                                                    
                                                    <div class="form-group">
                                                        <h5><i class="fa fa-fax" aria-hidden="true"></i>&nbsp;Fondo de Caja:</h5>
                                                        <?php foreach($Turno as $t):?>
                                                            <input type="text" class="form-control" name="cierre" id="cierre" value="<?php echo '$'.$t->fondoCaja?>" style="background : inherit; border:none; color:black;" disabled>
                                                        <?php endforeach?>
                                                    </div>
                                                   
                                                </td>
                                            </tr>
                                            <tr id="paraBoton">
                                                <td>
                                                    <div class="alert alert-danger" role="alert" id="modalCerr" style="display:none;">
                                                        <p id="mensaje"></p>
                                                    </div>
                                                    <div class="alert alert-success" role="alert" id="alertaCorrecta" style="display:none;">
                                                        <p id="mensaje2"></p>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>      
                            </div>
                        </div>
                    </div>

    <!----------------------------------------------------------------- MODAL DETALLES ------------------------------------------------------>
                    <div class="modal fade" id="detalles" style="color:black;">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <!--center><h5><i class="fa fa-window-restore" aria-hidden="true"></i>&nbsp;Reporte de Movimientos</h5></center-->
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <form enctype="multipart/form-data" name="formularioAgregarTarjetasEvento" id="formularioAgregarTarjetasEvento">
                                        <div class="table table-responsive" style="color: black;">
                                            <center><h5><i class="fa fa-window-restore" aria-hidden="true"></i>&nbsp;Reporte de Movimientos</h5></center>
                                            <table>
                                                <thead>
                                                    <th>Transacción</th>
                                                    <th>Tarjeta</th>
                                                    <th>Producto</th>
                                                    <th>Créditos</th>
                                                    <th>Efectivo</th>
                                                    <th>Tarjeta</th>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </form>                
                                </div>                 
                            </div>
                        </div>
                    </div> 
                </div>
            </div>

            <!--**********************************Modal forzar Cierre *********************************-->
            <div class="modal fade" id="forzar_Cierre">
                        <div class="modal-dialog" >
                            <div class="modal-content">
                                <div class="modal-header" style="background-image: radial-gradient(circle at 84.09% 90.63%, #b38af8 0, #8b6ee3 25%, #5b50cc 50%, #0435b5 75%, #0021a1 100%);">
                                    <center><h6 class="modal-title" style="color:white;">Forzar Cierre de Caja</h6></center>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <form id="forzarC">
                                    <!--input type="hidden" name="idv" id="idv" value="<?php echo $_GET["idv"]?>"-->
                                        <div class="form-group">
                                            <h7><b>Usuario:</b></h7>&nbsp;
                                            <input type="text" name="usuarioFC" id="usuarioFC" required class="form-control" placeholder="Ingresa el Usuario">
                                        </div>
                                        <div class="form-group">
                                            <h7><b>Contraseña:</b></h7>
                                            <input type="password" name="contraseñaFC" id="contraseñaFC" class="form-control" placeholder="Ingresa tu contraseña">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal" name="cancelarDev" id="cancelarDev" value=""><i class="fa fa-ban" aria-hidden="true"></i>&nbsp;Cancelar</button>
                                            <button type="button" class="btn btn-success pull-left" data-dismiss="modal" name="FC" id="FC" value="">Cerrar Caja</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--**********************************Modal Forzar Cierre*********************************-->
            <!--***************************************** Alertas *************************************************-->
            <!--div class="modal fade" id="staticBackdrop" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="display:none;">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="row no-gutters fixed-center">
                        <div class="alert alert-danger fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="True">&times;</span>
                            </button>
                            <p id="mensaje"></p>
                            <center><span class="badge badge-danger" type="button" data-dismiss="modal">Aceptar</span></center>
                        </div>
                    </div>
                </div>
            </div-->

            <!--div class="modal fade" id="alertaCorrecta" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="display:none;">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="row no-gutters fixed-center">
                        <div class="alert alert-success fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="True">&times;</span>
                            </button>
                            <p id="mensaje2"></p>
                            <center><span class="badge badge-success" type="button" data-dismiss="modal">Aceptar</span></center>
                        </div>
                    </div>
                </div>
            </div-->

<!--***************************************** Alertas *************************************************-->
        </div>
        
        <script src="../vendor/jquery/jquery.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    </body>
</html>

<script src="JS/reporteVenta.js"></script>