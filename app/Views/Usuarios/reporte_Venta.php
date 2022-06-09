<?php 
if(!isset($_SESSION['Usuario'])) {
    header('Location: http://localhost/Espectaculares_Garcia/public/');
    exit();
}else{
?>

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
                                    <i class="fa fa-user" aria-hidden="true"></i>&nbsp;<?php echo $_SESSION['Usuario']; ?>
                                </a>
                                <!-- Dropdown - menu deslizable -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item btn btn-danger" href="CerrarSesion" id="cerrarCaja" style="font-family: monospace; font-size:14px;">
                                        &nbsp;Cerrar Turno &nbsp;<i class="fa fa-times btn btn-danger" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <!-- End of Topbar -->
                    
                    <!-- Begin Page Content -->
                    <div class="container-fluid" style="background-color: white;" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
                        <center><h3>REPORTE DE VENTAS</h3></center>
                        <div class="row">
                            <!-- Pending Requests Card Example -->
                            <div class="col-xl-12 col-md-12 mb-12">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="input-group">
                                    &nbsp;&nbsp;<center><h5 class="m-0 font-weight-bold"><i class="fa fa-share" aria-hidden="true"></i>&nbsp;Devolver Tarjetas:&nbsp;&nbsp;</h5></center>
                                        <label>Folio Inicial:&nbsp;</label>
                                        <div class="input-group-append">
                                            <input type="text" class="form-control" name="dtI" id="dtI" minlength="8" maxlength="8" style="width:150px;">
                                        </div>
                                        <label>Folio Final:&nbsp;</label>
                                        <div class="input-group-append">
                                            <input type="text" class="form-control" name="dtF" id="dtF" minlength="8" maxlength="8" style="width:150px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- Area Chart -->
                            <div class="col-xl-6 col-lg-6">
                                <div class="card shadow mb-5">
                                    <!-- Card Header - Dropdown -->
                                    <div class="card-header">
                                        <center><h5><i class="fa fa-table" aria-hidden="true"></i>&nbsp;Tabulador de efectivo</h5></center>
                                    </div>
                                    <!-- Card Body -->
                                    <div class="card-body"> 
                                        <form action="">
                                            <input type="hidden" name="fecha" id="fecha" value="">
                                            <input type="hidden" class="form-control" name="idv" id="idv" value="<?php echo $_GET['idv']?>">
                                            <div class="chart-area table table-responsive table-wrapper">
                                                <table class="table table-responsive" style=" color: black; background-image: url('../../../Espectaculares_Garcia/public/Img/logog.png'); background-repeat:no-repeat; background-position: center;">
                                                    <tbody style="color: black;">
                                                        <tr>
                                                            <td colspan="6"><center><b>&nbsp;Billetes&nbsp;</b></center></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-group">
                                                                    <label>$1,000</label>
                                                                    <input type="number" class="form-control tabulador" min="0" name="mil" id="mil" style="width : 100px; height:30px;" min="0">
                                                                    <input type="text" id="bmil" style="display:none;">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-group"> 
                                                                    <label>$500</label>
                                                                    <input type="number" class="form-control tabulador" min="0" name="quinientos" id="quinientos" style="width : 100px; height:30px;" min="0">
                                                                    <input type="text" id="bquin" style="display:none;">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <label>$200</label>
                                                                    <input type="number" class="form-control tabulador" min="0" name="dosc" id="dosc" style="width : 100px; height:30px;" min="0">
                                                                    <input type="text" id="bdos" style="display:none;">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <label>$100</label>
                                                                    <input type="number" class="form-control tabulador" min="0" name="cien" id="cien" style="width : 100px; height:30px;" min="0">
                                                                    <input type="text" id="bcien" style="display:none;">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <label>$50</label>
                                                                    <input type="number" class="form-control tabulador" min="0" name="cincuenta" id="cincuenta" style="width : 100px; height:30px;" min="0">
                                                                    <input type="text" id="bcin" style="display:none;">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <label>$20</label>
                                                                    <input type="number" class="form-control tabulador" min="0" name="veinte" id="veinte" style="width : 100px; height:30px;" min="0">
                                                                    <input type="text" id="bvei" style="display:none;">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                        <td colspan="6"><center><b>&nbsp;Monedas&nbsp;</b></center></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="form-group">
                                                                    <label>$10</label>
                                                                    <input type="number" class="form-control tabulador" min="0" name="diez" id="diez" style="width : 100px; height:30px;">
                                                                    <input type="text" id="mdiez" style="display:none;">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <label>$5</label>
                                                                    <input type="number" class="form-control tabulador" min="0" name="cinco" id="cinco" style="width : 100px; height:30px;">
                                                                    <input type="text" id="mcinco" style="display:none;">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <label>$2</label>
                                                                    <input type="number" class="form-control tabulador" min="0" name="dos" id="dos" style="width : 100px; height:30px;">
                                                                    <input type="text" id="mdos" style="display:none;">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <label>$1</label>
                                                                    <input type="number" class="form-control tabulador" min="0" name="uno" id="uno" style="width : 100px; height:30px;">
                                                                    <input type="text" id="muno" style="display:none;">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <label>$0.50</label>
                                                                    <input type="number" class="form-control tabulador" min="0" name="cincuentac" id="cincuentac" style="width : 100px; height:30px;">
                                                                    <input type="text" id="mcincuenta" style="display:none;">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="form-group">
                                                                    <label># de Voucher's</label>
                                                                    <input type="number" class="form-control tabulador" min="0" name="voucher" id="voucher" value="" style="width : 100px; height:30px;">
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>   
                                                <center><input type="button" class="btn btn-success" id="registrar" name="registrar" value="Registrar"></center>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <div class="card shadow mb-5">
                                    <div class="card-header">
                                        <center><h5><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;Información:&nbsp;<a href="#detalles" type="button" data-toggle="modal">Detalles</a></h5></center>
                                    </div>
                                    <div class="card-body">
                                        <input type="hidden" name="money" id="money" value="">
                                        <input type="hidden" name="vouch" id="vouch" value="">
                                        <table class="table table-responsive" style="color: black; background-image: url('../../../Espectaculares_Garcia/public/Img/logog.png'); background-repeat:no-repeat; background-position: center;">
                                            <tbody id="informacion">
                                                
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

            <!--***************************************** Alertas *************************************************-->
<div class="modal fade" id="staticBackdrop" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="display:none;">
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
</div>

<div class="modal fade" id="alertaCorrecta" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="display:none;">
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
</div>

<!--***************************************** Alertas *************************************************-->
        </div>
        
        <script src="../vendor/jquery/jquery.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    </body>
</html>

<script src="JS/reporteVenta.js"></script>
<?php } ?>