<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../css/sb-admin-2.css" rel="stylesheet"><!--Esta linea la acabo de agregar, tiene el estilo del radio en tipo pago-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <script src="https://unpkg.com/sweetalert2@9.5.3/dist/sweetalert2.all.min.js"></script>
    
</head>
<body id="page-top" style="background-image: url('./Img/mainbg.png'); background-repeat:repeat;" onload="mueveReloj()">
   <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Barra laterial izquierda -->
        <!--ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar"><br-->
            <!--form name="form_reloj">
                <input type="text" name="reloj" size="25" style="color:white;background : inherit; border:none; font-family : Arial; font-size : 14px; text-align:right;" onload="window.document.form_reloj.reloj.blur()">
            </!--form-->
            <!--hr class="sidebar-divider"-->
        <!--ESTE ES EL LOGO QUE APARECE EN LA BARRA DE NAVEGACION IZQUIERDA-->
            <!--li class="nav-item active">
                <div class="sidebar-brand-icon">
                    <center><img src = "Img/logo.png" style="width: 50%;"/></center>
                </div><br>
            </!--li>

            <li class="nav-item active">
                <center><b><label>RECARGAS:</label></b></center>
                    <?php foreach($creditos->getResultArray() as $cred){ ?>
                        <button type="button" id="creditos" class="btn btn-success creditosC" style="margin:5px;" value="<?= $cred['idFechaCreditosCortesia']?>"><?= $cred['Nombre']?></button>
                    <?php } ?>
            </li><br>

            <hr class="sidebar-divider">

            <li class="nav-item active">
                <center><b><label>PROMOCIONES: &nbsp;</label></b></center>
                <?php
                foreach($pulsera->getResultArray() as $pu){ 
                    ?>
                    <button type="button" id="promocionn" class="btn btn-success promocionnn" onblur="actualizar()" style="margin:5px;"  value="<?php echo $pu['idPulseraMagica']?>"><?php echo  $pu['Nombre']?></button>
                <?php }?>
                <div id="log"></div>
            </li>
        </ul-->
        <!-- End of Sidebar -->

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
                    
                    <?php 
                    
                    $usuario;
                
                    foreach($turno->getResultArray() as $t){
                        $usuario=$t['Usuario'];
                        ?>
                        <a aria-expanded="false" aria-controls="collapseTwo" style="font-family: monospace; color:black; font-size:16px;">
                        <?php echo '<b>Zona:</b>&nbsp;'.$t["nombreZ"].'&nbsp;<b>Taquilla:</b>&nbsp;'.$t["nombreT"].'&nbsp;<b>Ventanilla:</b>&nbsp;'.$t["nombreV"]?>
                        </a>
                    <?php }?>
                    
                    
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <form name="form_reloj" style="color:black;">
                            <input type="text" name="reloj"  size="25" style="color:black; background : inherit; border:none; font-family : Arial; font-size : 14px; text-align:right;" onload="window.document.form_reloj.reloj.blur()">
                        </form>
                    
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:black; font-size:14px;">
                                <i class="fa fa-user" aria-hidden="true"></i>&nbsp;
                                    <?php echo $usuario;?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item btn btn-danger" id="cerrarCaja" style="font-family: monospace; font-size:14px;">
                                    &nbsp;Cerrar Caja&nbsp;<i class="fa fa-times btn btn-danger" aria-hidden="true"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <div class="container-fluid" id="puntoVenta">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 mb-12">
                                <div class="card h-100 py-2">
                                    <div class="input-group">
                                        <div class="col-xs-2 col-sm-3">
                                            <div class="card">
                                                <button type="button" class="btn btn-outline-info selectPulsera" style="margin:5px;" value="1">Pulsera
                                                    <img class="card-img-top" src="../img/mano.jpg" height="100" width="50" alt="Card image cap">
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-xs-2 col-sm-3">
                                            <?php foreach($pulsera->getResultArray() as $pu){ ?>
                                                <div class="card">
                                                    <button type="button" class="btn btn-outline-warning pulseraMagic" style="margin:5px;" value="<?php echo $pu['idPulseraMagica']?>" ><?php echo  $pu['Nombre']?>
                                                        <img class="card-img-top" src="../img/pm.jpg" height="100" width="50" alt="Card image cap">
                                                    </button>
                                                </div>
                                            <?php }?>
                                            <!--div id="log"></!--div-->
                                        </div> 
                                        <div class="col-xs-2 col-sm-3">
                                            <div class="card">
                                                <button type="button" class="btn btn-outline-success addRecarga" style="margin:5px;" value="" >Recarga
                                                    <img class="card-img-top" src="../img/recarga.jpg" height="100" width="50" alt="Card image cap">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Tarjeta y Recarga -->
                        <!--div class="row">
                            <div class="col-xl-12 col-md-12 mb-12">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="input-group">
                                        <div class="col-xs-4 col-sm-4">
                                            <h5 class="m-0 font-weight-bold text-primary"><i class="fa fa-qrcode" aria-hidden="true" style="margin:5px;"></i>&nbsp;Escanear código:</h5>
                                            <input type="number" class="form-control" name="tarjetaAdd" id="tarjetaAdd" onblur="ingresarTarjeta()" autofocus>
                                        </div>
                                        <div class="col-xs-4 col-sm-4">
                                            <h5 class="m-0 font-weight-bold text-primary"><i class="fa fa-retweet" aria-hidden="true"  style="margin:5px;"></i>&nbsp;Recarga:</h5>
                                            <input class="form-control" type="number" name="recargaAdd" id="recargaAdd" onblur="ingresarRecarga()">&nbsp;
                                        </div>
                                        <div class="col-xs-4 col-sm-4">
                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_Fajilla" value=""><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Agregar Fajilla</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </!--div-->
                        <div class="row">
                            <div class="col-xl-8 col-lg-7">
                                <div class="card shadow mb-5">
                                    <div class="card-header d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="font-weight-bold text-dark"><center><i class="fa fa-bars" aria-hidden="true"></i>&nbsp;Folio</center></h6>
                                        <h6 class="font-weight-bold text-info"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-coin" viewBox="0 0 16 16">
                                                                                            <path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9H5.5zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518l.087.02z"/>
                                                                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                                                            <path d="M8 13.5a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11zm0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/>
                                                                                            </svg>&nbsp;Precio</center></h6>
                                        <h6 class="font-weight-bold text-warning"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-coin" viewBox="0 0 16 16">
                                                                                            <path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9H5.5zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518l.087.02z"/>
                                                                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                                                            <path d="M8 13.5a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11zm0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/>
                                                                                            </svg>&nbsp;Precio P.Mágica</center></h6>
                                        <h6 class="font-weight-bold text-success"><center><i class="fa fa-cart-plus" aria-hidden="true"></i>&nbsp;Recarga</center></h6>
                                        <!--h6 class="font-weight-bold text-warning"><center><i class="fa fa-cart-plus" aria-hidden="true"></i>&nbsp;Créditos</center></!--h6-->
                                        <h6 class="font-weight-bold text-danger"><center><i class="fa fa-ban" aria-hidden="true"></i>&nbsp;Cancelar</center></h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart-area table table-responsive table-wrapper" style=" color: black; background-image: url('../../../Espectaculares_Garcia/public/Img/logog.png'); background-repeat:no-repeat; background-position: center;">
                                            <table id="compras">
                                                <tbody id="productos">
                                                    <!--tr id="recargaTr" style="display: none;">
                                                        <td>
                                                            <label name="tituloRec" id="tituloRec">Recarga</label>
                                                        </td>   
                                                        <td>
                                                            <div id="recarga">
                                                                <input type="number" class="monto" name="recargaP" value="" id="recargaP" style="background : inherit; border:none; text-align:center;" disabled>
                                                            </div>
                                                        </td> 
                                                        <td>
                                                            <div id="recargaC">
                                                                <input type="number" name="recargaCred" id="recargaCred" value="" style="background : inherit; border:none; text-align:center;" disabled>
                                                            </div>
                                                        </td>
                                                    </tr-->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-5">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <div class="input-group">
                                            <div class="col-xs-2 col-sm-4">
                                                <label>Total: $</label>
                                            </div>
                                            <div class="col-xs-2 col-sm-6">
                                                <input class="form-control" type="number" name="total" id="total" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <!--button type="button" class="btn btn-success pagoEfectivo" data-toggle="modal" data-target="#modal_Efectivo" value="">PAGAR</button-->
                                        <button type="button" class="btn btn-success pagoEfectivo" value="">PAGAR</button>
                                        <button type="button" class="btn btn-danger pagoEfectivo" data-toggle="modal" data-target="#modal_Efectivo" value="">CANCELAR VENTA</button>
                                        <!--center><h6 class="m-0 font-weight-bold text-primary" style="vertical-align: middle ;">TIPO PAGO</h6><br></!--center-->
                                         <!--button type="button" class="btn btn-warning pagoEfectivo" data-toggle="modal" data-target="#modal_Efectivo" value="<?php //echo $tipo['idFormasPago']?>"><?php //echo $tipo['Nombre']?></!--button-->
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

<!--**********************************Modal Efectivo*********************************-->
<!--div class="modal fade" id="modal_Efectivo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">Efectivo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <table class="table table-responsive" style="margin: 0 auto;">
                    <tbody id="efect">
                    
                    
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success pull-left" data-dismiss="modal" name="cobrarTransaccion" id="cobrarTransaccion" value="<?php ?>">Cobrar</button>
            </div>
        </div>
    </div>
</div-->
<!--**********************************Modal Efectivo*********************************-->

<!--**********************************Modal Fajilla*********************************-->
<div class="modal fade" id="modal_Fajilla">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title">Agregar Fajilla Nueva</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <form id="fajillaNueva">
            <input type="hidden" name="fecha" id="fecha" value="">
            <input type="hidden" name="v" id="v" value="<?php echo $_GET["idv"]?>">
            <input type="hidden" name="idv" id="id" value="<?php echo $_GET["idv"]?>">
            <input type="hidden" name="e" id="e" value="<?php echo $_GET["e"]?>">
            <div class="form-group">
                <label>Folio Inicial</label>
                <input type="number" class="form-control" name="folioI" id="folioI">
            </div>
            <div class="form-group">
                <label>Folio Final</label>
                <input type="number" class="form-control" name="folioF" id="folioF">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success pull-left" data-dismiss="modal" name="agregarFajilla" id="agregarFajilla" value="">Agregar</button>
            </div>
        </form>
      </div>
    </div>
    <style>
        .bd-example-modal-lg .modal-dialog{ display: table;position: relative;margin: 0 auto;top: calc(50% - 24px);}
        .bd-example-modal-lg .modal-dialog .modal-content{background-color: transparent;border: none;}
    </style>
<!--***************** MODAL DE CARGA ****************-->

    <!-- End of Page Wrapper -->
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

</body>
</html>

<script src="JS/puntoVenta.js"></script>
