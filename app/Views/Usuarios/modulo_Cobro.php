<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../css/sb-admin-2.css" rel="stylesheet"><!--Esta linea la acabo de agregar, tiene el estilo del radio en tipo pago-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

</head>
<body id="page-top" style="background-image: url('./Img/mainbg.png'); background-repeat:repeat;" onblur="mueveReloj()">
<form name="form_reloj">
    <input type="text" name="reloj" size="40" style="background-color : Black; color : White; font-family : Verdana, Arial, Helvetica; font-size : 8pt; text-align : center;" onfocus="window.document.form_reloj.reloj.blur()">
</form>
    <?php date_default_timezone_set('America/Mexico_City'); $fecha = date("Y-m-d H:i:s");?>
    <input type="hidden" name="fechaHoy" id="fechaHoy" value="<?php echo $fecha?>">
   <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar"><br>
<!--ESTE ES EL LOGO QUE APARECE EN LA BARRA DE NAVEGACION IZQUIERDA-->
        <!--li class="nav-item active">
            <div class="sidebar-brand-icon">
                <center><img src = "Img/logo.png" style="width: 50%;"/></center>
            </div><br>
        </li-->

            <!-- Divider -->
            <!--hr class="sidebar-divider my-0"-->

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <center><label>RECARGAS:</label></center>
                <!--a class="nav-link" href="index.html"><span>RECARGAS:</span></a-->
                <div>
                    <?php foreach($Creditos as $key => $cred){?>
                        <button type="button" id="creditos" class="btn btn-success creditosC" style="margin:5px;" value="<?= $cred->idFechaCreditosCortesia?>"><?= $cred->Nombre?></button>
                    <?php }?>
                </div>
            </li><br>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item active">
                <label for="">PROMOCIONES: &nbsp;</label>
                <?php foreach($Pulsera as $key => $pu){
                        //if($pu->fechaI==$fecha){?>
                            <button type="button" id="promocionn" class="btn btn-success promocionnn" value="<?= $pu->idFechaPulseraMagica?>"><?= $pu->Nombre?></button>
                    <?php //}
                    }?>
                        <div id="log"></div>
                <!--input type="number" name="valorSelect" id="valorSelect" value=""-->
                <div id="log"></div>
            </li>
            <!-- Heading -->
            <!--div class="sidebar-heading">
                Interface
            </div-->

            <!-- Nav Item - Utilities Collapse Menu -->
            <!--li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Utilities</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="utilities-color.html">Colors</a>
                        <a class="collapse-item" href="utilities-border.html">Borders</a>
                        <a class="collapse-item" href="utilities-animation.html">Animations</a>
                        <a class="collapse-item" href="utilities-other.html">Other</a>
                    </div>
                </div>
            </li-->
        </ul>
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
                    
                    <div class="">
                        <?php foreach($Turno as $d){?>
                            <a class="col-xl-2 col-md-6 mb-4" aria-expanded="false" aria-controls="collapseTwo" style="font-family: monospace; color:black; font-size:16px;">
                                <?php echo '<b>Zona:</b>&nbsp;'.$d->NombreZona.'&nbsp;<b>Taquilla:</b>&nbsp;'.$d->NombreTaquilla.'&nbsp;<b>Ventanilla:</b>&nbsp;'.$d->NombreVentanilla?>
                            </a>
                        <?php }?>
                    </div>
                    
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:black; font-size:14px;">
                                <i class="fa fa-user" aria-hidden="true"></i>&nbsp;
                                    <?php echo session('Usuario'); ?>
                            </a>
                            <!-- Dropdown - menu deslizable -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item btn btn-danger" href="ReporteVenta" id="cerrarCaja" style="font-family: monospace; font-size:14px;">
                                    &nbsp;Cerrar Caja&nbsp;<i class="fa fa-times btn btn-danger" aria-hidden="true"></i>
                                </a>
                            </div>
                            <a class="nav-link navbar-brand" href="Ticket" target="_blank">Imprimir Ticket</a>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                        <!-- Tarjeta y Recarga -->
                        <form id="formPuntoVenta">
                            <input type="hidden" name="ventanillaa" id="ventanillaa" value="<?php echo $_GET["v"]?>">
                            <input type="hidden" name="idventani" id="idventani" value="<?php echo $_GET["idv"]?>">
                            <input type="hidden" name="evento" id="evento" value="<?php echo $_GET["e"]?>">
                            <input type="text" name="arregloP" id="arregloP" value="">
                            <input type="hidden" name="arregloPrecioP" id="arregloPrecioP" value="">
                            <input type="hidden" name="arregloC" id="arregloC" value="">
                            <input type="hidden" name="arregloPrecioC" id="arregloPrecioC" value="">
                            <input type="hidden" name="idTarjeta" id="idTarjeta" value="">
                            <input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo session('idUsuario')?>">
                            <input type="hidden" name="precioTa" id="precioTa" value="">
                            <input type="hidden" name="indice" id="indice" value="">
                            <input type="text" name="fecha" id="fecha" value="">
                            <div class="row">
                                <!-- Pending Requests Card Example -->
                                <div class="col-xl-12 col-md-12 mb-12">
                                    <div class="card border-left-warning shadow h-100 py-2">
                                        <div class="input-group">
                                            <div class="col-xs-4 col-sm-4">
                                                <h5 class="m-0 font-weight-bold text-primary"><i class="fa fa-credit-card" aria-hidden="true" style="margin:5px;"></i>&nbsp;Tarjeta:</h5>
                                                <input type="text" class="form-control" name="tarjetaAdd" id="tarjetaAdd" onblur="ingresarTarjeta()" autofocus>
                                            </div>
                                            <div class="col-xs-4 col-sm-4">
                                                <h5 class="m-0 font-weight-bold text-primary"><i class="fa fa-retweet" aria-hidden="true"  style="margin:5px;"></i>&nbsp;Recarga:</h5>
                                                <input class="form-control" type="number" name="recargaAdd" id="recargaAdd" onblur="ingresarRecarga()">&nbsp;
                                            </div>
                                            <!-- Optional: clear the XS cols if their content doesn't match in height -->
                                            <div class="col-xs-4 col-sm-4">
                                                <!--a href="#" id="celular" class="btn btn-success">Tarjeta Electónica</a-->  
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal_Devolucion" value="">Devolucion de Tarjeta</button>
                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_Fajilla" value="">Agregar Fajilla</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                         <!-- Content Row -->

                            <div class="row">

                                <!-- Area Chart -->
                                <div class="col-xl-8 col-lg-7">
                                    <div class="card shadow mb-4">
                                        <!-- Card Header - Dropdown -->
                                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h6><center><i class="fa fa-bars" aria-hidden="true"></i>&nbsp;Descripcion</center></h6>
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
                                                        /></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>&nbsp;Precio</center></h6>
                                            <h6><center><svg id="Layer_1" style="width:30px; height:30px;" version="1.1" viewBox="0 0 30 30" xml:space="preserve"><style type="text/css"> .st0{fill:#FD6A7E;} .st1{fill:#17B978;} .st2{fill:#8797EE;} .st3{fill:#41A6F9;} .st4{fill:#37E0FF;}
                                                        .st5{fill:#2FD9B9;}.st6{fill:#F498BD;}.st7{fill:#FFDF1D;} .st8{fill:#C6C9CC;}</style><path class="st4" d="M24.9,24.1l-0.4-5c-0.4-4.5-2.8-7.5-6.5-10l1-6h-5l-0.8,1H11l0.6,3.2l4.4,0.6c0.4,0.1,0.6,0.4,0.6,0.7  c0,0.3-0.3,0.6-0.7,0.6l-4-0.1c-3.7,2.5-6.1,5.5-6.4,10l-0.4,5C4.5,24.3,4,24.8,4,25.5C4,26.3,4.7,27,5.5,27h19  c0.8,0,1.5-0.7,1.5-1.5C26,24.8,25.5,24.3,24.9,24.1z M11.4,17.6l2.2-0.3l1-2c0.2-0.3,0.6-0.3,0.8,0l1,2l2.2,0.3  c0.4,0.1,0.5,0.5,0.3,0.8L17.3,20l0.4,2.2c0.1,0.4-0.3,0.7-0.7,0.5l-2-1l-2,1c-0.3,0.2-0.7-0.1-0.7-0.5l0.4-2.2l-1.6-1.6  C10.9,18.1,11,17.7,11.4,17.6z"/></svg>Créditos</center></h6>
                                            <h6 class="m-0 font-weight-bold text-primary"></h6>
                                        </div>
                                        <!-- Card Body -->
                                        <div class="card-body">
                                            <div class="chart-area table table-responsive table-wrapper" style=" color: black; background-image: url('../../../Espectaculares_Garcia/public/Img/logog.png'); background-repeat:no-repeat; background-position: center;">
                                                <table id="compras">
                                                    <!--thead>
                                                    <th style="width: 15%;"></th>
                                                    </thead-->
                                                    <tbody id="productos">
                                                        <tr>
                                                            <td><div id="result"><label for="">Tarjeta: &nbsp;</label><input type="number" id="tarjeta" name="tarjeta" value="" style="background : inherit; border:none; text-align:center;" disabled></td></div>
                                                            <td><input type="number" class="monto" id="precioT" name="precioT" value="" style="background : inherit; border:none; text-align:center;" disabled></td>
                                                        </tr>
                                                        <tr id="recargaTr" style="display: none;">
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
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!--button type="button" id="cobrar" class="btn btn-success cobrar" data-toggle="modal" data-target="#modal_Cobrar">Cobrar</    button-->
                                </div>

                                <!-- Pie Chart -->
                                <div class="col-xl-4 col-lg-5">
                                    <div class="card shadow mb-4">
                                        <!-- Card Header - Dropdown -->
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
                                        <!-- Card Body -->
                                        <div class="card-body">
                                            <h6 class="m-0 font-weight-bold text-primary" style="vertical-align: middle ;">Tipo Pago</h6><br>
                                            <?php foreach($tipoPago as $tipo):?>
                                                <button type="button" class="btn btn-warning pagoEfectivo" data-toggle="modal" data-target="#modal_Efectivo" value="<?php echo $tipo->idFormasPago?>"><?php echo $tipo->Nombre?></button>
                                            <?php endforeach ?>
                                            <!--div id="container">
                                                <ul class="donate-now">
                                                    <li>
                                                        <input type="radio" id="rad1" value="1" class="pagoEfectivo" name="rad" />
                                                        <label for="rad1">Efectivo</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="rad2" value="2" class="pagoTarjeta" name="rad" />
                                                        <label for="rad2">Tarjeta de Crédito</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" id="rad3" value="3" name="rad"/>
                                                        <label for="rad3">Tarjeta de Débito</label>
                                                    </li>
                                                </ul>
                                            </div-->
                                            <!--table class="table table-responsive">
                                                <thead>
                                                    <th colspan="3"><h6 class="m-0 font-weight-bold text-primary" style="vertical-align: middle ;">Tipo Pago</h6></th>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <button type="button" class="btn btn-warning pagoEfectivo" data-toggle="modal" data-target="#modal_Efectivo" value="1">Efectivo</button>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-warning pagoTerjeta" data-toggle="modal" data-target="#modal_Tarjeta" value="2">Tarjeta</button>
                                                        </td>
                                                        <td>
                                                            
                                                            <div class="form-group" style="display: none;" id="efectivo" >
                                                                
                                                                <label>Efectivo:</label>
                                                                <input type="number" class="form-control" name="efectivo" placeholder="Ingresa la cantidad">
                                                            </div>
                                                            <button class="btn btn-success float-right" onclick="myFunction()" >Cobrar</button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->
    </div>

<!--**********************************Modal Efectivo*********************************-->
<div class="modal fade" id="modal_Efectivo">
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
        <button type="button" class="btn btn-success pull-left" data-dismiss="modal" name="cobrarTransaccion" id="cobrarTransaccion" value="">Cobrar</button>
      </div>
    </div>
  </div>
</div>
<!--**********************************Modal Efectivo*********************************-->

<!--**********************************Modal Devolver Tarjeta*********************************-->
<div class="modal fade" id="modal_Devolucion">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Devolución de Tarjeta</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form id="formDevolucion" action="">
                    <div class="form-group">
                        <label>Tarjeta</label>
                        <input type="number" name="tarjeta" id="tarjeta" class="form-control" placeholder="Ingresa la tarjeta a devolver">
                    </div>
                    <div class="form-group">
                        <label>Descripción</label>
                        <input type="text" name="tarjeta" id="tarjeta" class="form-control" placeholder="Motivo de devolución">
                    </div>
                    <div class="form-group">
                        <label>Tarjeta Nueva</label>
                        <input type="number" name="tarjeta" id="tarjeta" class="form-control" placeholder="Ingresa la nueva tarjeta asignada">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning pull-left" data-dismiss="modal" name="devolucion" id="devolucion" value="">Devolver</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--**********************************Modal Devolver Tarjeta*********************************-->

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
  </div>
</div>
<!--**********************************Modal Fajilla*********************************-->

    <!--******************************************** MODAL DE COBRAR ESTE CREO QUE YA NO SE USARA(ES EL MODAL QUE SE ABRIA CUANDO DABA CLICK EN BOTON COBRAR) ****************************************-->
<!--div class="modal fade" id="modal_Cobrar">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title">
            <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z"/>
            <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"/>
            <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z"/>
            <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"/></svg>&nbsp;Forma de pago</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered" style="color:black">
            <th>Forma de Pagos</th>
            <th><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"width="30px" height="30px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
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
                    /></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>&nbsp;Total:</th>
            <tbody>
                <tr>
                    <td style="padding-left: 30px;">
                        <input type="radio" name="rad" value="1" style="width: 8%; height: 1.5em;">&nbsp;Efectivo <br>
                        <input type="radio" name="rad" value="2" style="width: 8%; height: 1.5em;">&nbsp;Tarjeta de Débito <br>
                        <input type="radio" name="rad" value="3" style="width: 8%; height: 1.5em;">&nbsp;Tarjeta de Crédito
                    </td>
                    <td>
                        <div class="form-group">
                            <label>Total: $</label>
                            <input class="form-control" type="number" name="total" id="total" value="">
                        </div>
                        <div class="form-group" style="display: none;" id="efectivo" >
                            <label>Efectivo:</label>
                            <input type="number" class="form-control" name="efectivo" placeholder="Ingresa la cantidad">
                        </div>
                        <!--button class="btn btn-success float-right" onclick="myFunction()" >Cobrar</button-->
                    <!--/td>
                </tr>
            </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success pull-left" data-dismiss="modal" name="agregar" id="agregar" value="">Cobrar</button>
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal" name="cerrar" id="cerrar">Cerrar</button>
      </div>
    </div>
  </div>
</div-->

    <!-- End of Page Wrapper -->
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

</body>


<script>

var prev;
var previous=[];
let creditosC = [];
let metros = [];
let prec = [];
let precios = [];
let preciosC = [];
var acumulador = 0;
var total;
let indices = [];



/***********************************DEVOLUCION DE TARJETAS ********************************************/
$(document).on('click', '#devolucion', function(){
        console.log('Estoy aqui');
        alert($('#formDevolucion').serialize());
        $.ajax({
                beforeSend:function () {//antes de cargar la info, abrimos una ventana de carga
                  //  inicia_carg();//funcion que abre la ventana de carga
                },
                url:"",//la ruta a donde enviare la info
                type:"POST",
                data:{'tipo':tipo},//toma el valor del boton seleccionado
                dataType: 'JSON',
                error: function(jqXHR, textStatus, errorThrown){
                    alert('Se produjo un error: a'+ errorThrown + ' ' + textStatus);//en caso de presentar un error, muestra el msj
                  //  cierra_carg();//funcion que cierra la ventana de carga
                },
            }).done(function(data){//obtiene el valor de data procesado en el controlador
               // cierra_carg();
            });
    
});
/***********************************DEVOLUCION DE TARJETAS ********************************************/

/*********************************** AGREGAR FAJILLA ********************************************/
$(document).on('click', '#agregarFajilla', function(){
    console.log('Estoy aqui');
    alert($('#fajillaNueva').serialize());
        $.ajax({
                beforeSend:function () {//antes de cargar la info, abrimos una ventana de carga
                  //  inicia_carg();//funcion que abre la ventana de carga
                },
                url:"",//la ruta a donde enviare la info
                type:"POST",
                data:{'tipo':tipo},//toma el valor del boton seleccionado
                dataType: 'JSON',
                error: function(jqXHR, textStatus, errorThrown){
                    alert('Se produjo un error: a'+ errorThrown + ' ' + textStatus);//en caso de presentar un error, muestra el msj
                  //  cierra_carg();//funcion que cierra la ventana de carga
                },
            }).done(function(data){//obtiene el valor de data procesado en el controlador
               // cierra_carg();
            });
    });
/*********************************** AGREGAR FAJILLA ********************************************/

/********************************** Tipo Pago*********************************/
$(document).on('click', '.pagoEfectivo', function(){
        var total = $('#total').val();
        var tipo = $(this).val();
        alert(tipo);
        $.ajax({
                beforeSend:function () {//antes de cargar la info, abrimos una ventana de carga
                  //  inicia_carg();//funcion que abre la ventana de carga
                },
                url:"Tipo_Pago",//la ruta a donde enviare la info
                type:"POST",
                data:{'tipo':tipo},//toma el valor del boton seleccionado
                dataType: 'JSON',
                error: function(jqXHR, textStatus, errorThrown){
                    alert('Se produjo un error: a'+ errorThrown + ' ' + textStatus);//en caso de presentar un error, muestra el msj
                  //  cierra_carg();//funcion que cierra la ventana de carga
                },
            }).done(function(data){//obtiene el valor de data procesado en el controlador
                var html ='';
                for(var i = 0;i <data.msj.length; i++){
                    if(data.msj[i]["idFormasPago"]==tipo){
                        html +=' <tr>'+
                                    '<td colspan="5">'+
                                        '<div class="input-group">'+
                                            '<div class="col-xs-2 col-sm-4">'+
                                            '<label>Total: $</label>'+
                                            '</div>'+
                                            '<div class="col-xs-2 col-sm-6">'+
                                                '<input class="form-control" type="number" name="total2" id="total2" value="'+total+'">'+
                                            '</div>'+
                                        '</div><br>'+
                                    '</td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td><button class="btn btn-warning val" name="centavos" id="centavos" value=".50" style="width:70px; height:70px; margin:5px;">$ .50</button></td>'+
                                    '<td><button class="btn btn-warning val" name="uno" id="uno" value="1" style="width:70px; height:70px; margin:5px;">$ 1</button></td>'+
                                    '<td><button class="btn btn-warning val" name="dos" id="dos" value="2" style="width:70px; height:70px; margin:5px;">$ 2</button></td>'+
                                    '<td><button class="btn btn-warning val" name="cinco" id="cinco" value="5" style="width:70px; height:70px; margin:5px;">$ 5</button></td>'+
                                    '<td><button class="btn btn-warning val" name="diez" id="diez" value="10" style="width:70px; height:70px; margin:5px;">$ 10</button></td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td><button class="btn btn-success val" name="veinte" id="veinte" value="20" style="width:70px; height:70px; margin:5px;">$ 20</button></td>'+
                                    '<td><button class="btn btn-success val" name="cincuenta" id="cincuenta" value="50" style="width:70px; height:70px; margin:5px;">$ 50</button></td>'+
                                    '<td><button class="btn btn-success val" name="cien" id="cien" value="100" style="width:70px; height:70px; margin:5px;">$ 100</button></td>'+
                                    '<td><button class="btn btn-success val" name="dosc" id="dosc" value="200" style="width:70px; height:70px; margin:5px;">$ 200</button></td>'+
                                    '<td><button class="btn btn-success val" name="quin" id="quin" value="500" style="width:70px; height:70px; margin:5px;">$ 500</button></td>'+
                                '</tr>'+
                                '<tr>'+
                                    '<td><button class="btn btn-success" name="mil" id="mil" value="1000" style="width:70px; height:70px; margin:5px;">$ 1000</button></td>'+
                                    '<td colspan="3">'+
                                        '<center><label>Efectivo:</label></center>'+
                                        '<input type="number" class="form-control" id="efectivo" name="efectivo" value="">'+
                                    '</td>'+'<td><button class="btn btn-danger borrar" name="borrar" id="borrar" value="" style="width:70px; height:70px; margin:5px;">Borrar</button></td>'+
                                '</tr>';
                    }
                }
                $("#modal_Efectivo .modal-body #efect").html(html);

               // cierra_carg();
            });
    });
/********************************** Tipo Pago*********************************/

/********************************** Cobrar Transaccion *********************************/

    $(document).on('click','.val', function(){
        var valor = parseFloat($(this).val());
        acumulador = acumulador + valor;
        $('#efectivo').val(acumulador);
        //alert('Soy acumulador'+acumulador);
        //alert('soy valor'+valor);
    });

    //console.log(data);
    $(document).on('click','.borrar', function(){
        var efectivo = $("#efectivo").val("");
        acumulador = 0;
        //alert("Soy borrar" + efectivo + "acumulador"+ acumulador);
        //$(".screen").html("");
    });
    

$(document).on('click','#cobrarTransaccion', function(){
    var totalCobrar = $('#total').val();
    var totalIngresado = $('#efectivo').val();
    if(totalIngresado > totalCobrar){
        var cambio = totalIngresado - totalCobrar;
        alert('Su cambio es de:' + cambio);
        cobrarCompra();
    }else if(totalIngresado == totalCobrar){
        alert('Gracias por su compra');
        cobrarCompra();
    }else if(totalIngresado < totalCobrar){
        alert('Dinero Insuficiente');
        acumulador=0;
    }
});
/********************************** Cobrar Transaccion*********************************/
    //Funcion ventana Carga
    function inicia_carg(){
        $('body').loadingModal({
          position: 'auto',
          text: 'Cargando',
          color: '#98BE10',
          opacity: '0.7',
          backgroundColor: 'rgb(1,61,125)', 
          animation: 'doubleBounce'
        }); 
    }

    //funcion Ventana cierra carga
    function cierra_carg(){
        $('body').loadingModal('hide');
        $('body').loadingModal('destroy');
        console.log('adios perros');
    }

/* $("#tarjetaAdd").focus(function() {
    prev=this.value;    
}).change(function() {
    document.getElementById("tarjetaa").innerHTML = "<b>Previous: </b>"+prev;
    previous.push(this.value);
    if (previous.length) {
        alert('Yo soy'+(previous));
        $('#tarjetasss').val(previous);
    }
});*/

//detecta la tarjeta
/*$(document).ready(function(){
var cont = 0;
$("#tarjetaAdd").on("change", function(){
    if(cont > 1){
        var v = $(this).val();
        var inp = '<td><input id="tarjeta1" name="tarjeta1" value="'+v+'" style="background : inherit; border:none; text-align:center;" disabled></td><td id="productos">'+promociones();+'</td></tr>';
        $("#result").append(inp);
    }else{
        var v1 = $(this).val();
        var inp1 = '<tr id="'+v1+'"><td><input id="tarjeta1" name="tarjeta1" value="'+v1+'" style="background : inherit; border:none; text-align:center;" disabled></td><td id="productos">'+promociones();+'</td></tr>';
        $("#result").append(inp1);
        alert("Soy contador"+cont);
    }
    
    cont=cont+1;
});
});*/
    $('#tarjetaAdd').change(function (){
        //console.log($(this).val());
        var valor_inicial = $(this).val();//folio de tarjeta
        var folioTarjeta = $(this).val();//folio de tarjeta
        var v = $('#ventanillaa').val();
        var e = $('#evento').val();

        alert(v);
        $.ajax({
                type:"POST",
                url:"validarTarjeta",
                data:{'folioTarjeta':folioTarjeta, 'ventanilla':v, 'evento':e},
                dataType: 'JSON',
                error: function(jqXHR, textStatus, errorThrown){
                    alert('Se produjo un error: a'+ errorThrown + ' ' + textStatus);
                },
            }).done(function(data){
                console.log('soy data'+data.msj);
                $('#tarjeta').val(folioTarjeta);
                if(data.msj){
                    for(var i = 0;i<data.msj.length; i++){
                        idTar = data.msj[i]['idTarjeta'];
                        alert(idTar);

                        $('#idTarjeta').val(data.msj[i]['idTarjeta']);

                        if(data.msj[i]['idStatus'] == '1'){
                            /********** INSERTAR EL INDICE EN EL ARREGLO SOBRE TIPO DE PROMOCION ELEGIDA **********/
                            indices.push('0');//tarjeta nueva
                            alert('Indices' + indices);
                            $('#indice').val(indices);
                            /********** INSERTAR EL INDICE EN EL ARREGLO SOBRE TIPO DE PROMOCION ELEGIDA **********/
                            $('#precioT').val(data.msj[i]['PrecioTarjeta']);
                                $('#precioTa').val(data.msj[i]['PrecioTarjeta']);
                                sumar();
                        }else{
                            /********** INSERTAR EL INDICE EN EL ARREGLO SOBRE TIPO DE PROMOCION ELEGIDA **********/
                            indices.push('1');//tarjeta comprada
                            alert('Indices' + indices);
                            $('#indice').val(indices);
                            /********** INSERTAR EL INDICE EN EL ARREGLO SOBRE TIPO DE PROMOCION ELEGIDA **********/
                            $('#idTarjeta').val(data.msj[i]['idTarjeta']);
                        }
                    }
                }else{
                    alert('Usted no puede vender tarjetas que no estan en su fajilla');
                    $('#tarjeta').val('');
                    $('#idTarjeta').val('');
                    location.reload();
                }
            });
    });

//detectar recarga
$('#recargaAdd').change(function () {
    var tarjeta = $('#tarjetaAdd').val();
    if(tarjeta == ''){
        alert('Ingresa la tarjeta por favor');
        $('#recargaAdd').val('');
    }else{
        /********** INSERTAR EL INDICE EN EL ARREGLO SOBRE TIPO DE PROMOCION ELEGIDA **********/
        indices.push('2');//recarga
        alert('Indices' + indices);
        $('#indice').val(indices);
        /********** INSERTAR EL INDICE EN EL ARREGLO SOBRE TIPO DE PROMOCION ELEGIDA **********/

        alert(valor_recarga = $(this).val());
        const creditos = 1;
        const pesos = 0.80;
        r = (valor_recarga * creditos)/pesos;
        $('#recargaP').val(valor_recarga);
        $('#recargaCred').val(r);
        $('#recargaTr').show();
        sumar();
    }
});

//cambio de pagina
$('#cerrarCaja').click(function(){
    //$('#puntoVenta').hide();
});


//alerta pide numero
$('#celular').click(function(){
    swal("Ingresa el teléfono", {
        content: "input",
    })
    .then((value) => {
        //swal(`You typed: ${value}`);
        swal("Agregado correctamente", {
            icon: "success",
        });
    });
});    

//$(document).on('click','.Promo', function(){
//function promociones(){

// promociones pulsera magica
$(document).on('click', '.promocionnn', function(event){
    
    var acum=[];
    var fecha = '<?php echo $fecha;?>';
    var tarjeta = $('#tarjetaAdd').val();
    if(tarjeta == ''){
        alert('Ingresa la tarjeta por favor');
    }else{
        /********** INSERTAR EL INDICE EN EL ARREGLO SOBRE TIPO DE PROMOCION ELEGIDA **********/
        indices.push('3');//promo de pulsera
        alert('Indices' + indices);
        $('#indice').val(indices);
        /********** INSERTAR EL INDICE EN EL ARREGLO SOBRE TIPO DE PROMOCION ELEGIDA **********/

        metros.push($(this).attr('value'));
        //console.log("Soy metros"+metros);

        $('#arregloP').val(metros);
        var promocion = $(this).val();
        //$('#valorSelect').val(promocion);
        alert('soy promocion' + promocion);

        $.ajax({
            type:"POST",
            url:"Productos",
            data:{'promocion':promocion},
            dataType: 'JSON',
            error: function(jqXHR, textStatus, errorThrown){
                alert('Se produjo un error: a'+ errorThrown + ' ' + textStatus);
            },
        }).done(function(data){
            var html ='';
            for(var i = 0;i <data.msj.length; i++){
                    html += '<tr id="'+data.msj[i]['idFechaPulseraMagica']+'">'+
                                '<td style="padding:0px;">'+data.msj[i]['Nombre']+'</td>'+
                                '<td style="padding:0px;"><input type="number" class="precioP monto" name="precioP" id="precioP" disabled  style="background : inherit; border:none; text-align:center;" class="monto" value="'+data.msj[i]['Precio']+'"></td>'+
                                '<td style="padding:0px;"></td>'+
                                '<td style="padding:0px;"><a href="#eliminarPromo'+data.msj[i]['idFechaPulseraMagica']+'" class="eliminar" data-toggle="modal"><i class="fa fa-trash btn btn-danger" aria-hidden="true"></i></a></td>'+
                            '</tr>';
                $("#productos").append(html);
                //$("#precioPRomo").val(data.msj[i]['Precio']);
                prec.push(data.msj[i]['Precio']);
            }    
            sumar();
            $('#arregloPrecioP').val(prec);
            
        });
    }

});

//promociones creditos cortesia(RECARGA)
//function promociones(){
$(document).on('click', '.creditosC', function(event){
    var fecha = '<?php echo $fecha;?>';
    var tarjeta = $('#tarjetaAdd').val();
    if(tarjeta == ''){
        alert('Ingresa la tarjeta por favor');
    }else{

        /********** INSERTAR EL INDICE EN EL ARREGLO SOBRE TIPO DE PROMOCION ELEGIDA **********/
        indices.push('4');//promo de creditos
        alert('Indices' + indices);
        $('#indice').val(indices);
        /********** INSERTAR EL INDICE EN EL ARREGLO SOBRE TIPO DE PROMOCION ELEGIDA **********/

        creditosC.push($(this).attr('value'));
        console.log("Soy creditosC"+creditosC);

        $('#arregloC').val(creditosC);
        var promocionc = $(this).val();
        alert(promocionc);

        $.ajax({
            type:"POST",
            url:"creditosCortesia",
            data:{'promoCreditos':promocionc},
            dataType: 'JSON',
            error: function(jqXHR, textStatus, errorThrown){
                alert('Se produjo un error: a'+ errorThrown + ' ' + textStatus);
            },
        }).done(function(data){
            var html ='';
            for(var i = 0;i<data.msj.length; i++){
                //if(data.msj[i]['fechaI']==fecha){
                    html += '<tr id="'+i+'">'+
                                '<td style="padding:0px;">'+data.msj[i]['Nombre']+'</td>'+
                                '<td style="padding:0px;"><input type="number" name="precioC" id="precioC" disabled  style="background : inherit; border:none; text-align:center;" class="monto" value='+data.msj[i]['Precio']+'></td>'+
                                '<td style="padding:0px;"></td>'+
                                '<td style="padding:0px;"><a href="#eliminarPromo'+data.msj[i]['idFechaCreditosCortesia']+'" class="eliminar" data-toggle="modal"><i class="fa fa-trash btn btn-danger" aria-hidden="true"></i></a></td>'+
                            '</tr>';
                //}
            }
            $("#productos").append(html);
            sumar();
            var prec = $('#precioC').val();
            preciosC.push(prec);
            $('#arregloPrecioC').val(preciosC);
            alert(preciosC);
        });
    }
});


//datos formulario para cobrar
function cobrarCompra(){
    alert($('#formPuntoVenta').serialize());
    /*$.ajax({
    type: "POST",
    url: "guardarVentas",
    data: $('#formPuntoVenta').serialize(),
    dataType: "JSON",
    error(jqXHR, textStatus, errorThrown){
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
    },
    }).done(function(data){
        console.log('Si llego');
        console.log(data.msj);
        //    alert('Venta Satisfactoria');
        //  location.reload();
    });*/
}
/***********************************************ESTO CREO QUE YA TAMPOCO SERVIRA************************************/
//$("#cobrar").click( function(){
  //  alert($('#formPuntoVenta').serialize());
  /*  $.ajax({
    type: "POST",
    url: "guardarVentas",
    data: $('#formPuntoVenta').serialize(),
    dataType: "JSON",
    error(jqXHR, textStatus, errorThrown){
            alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
    },
    }).done(function(data){
        console.log('Si llego');
        console.log(data.msj);
        //    alert('Venta Satisfactoria');
        //  location.reload();
    });*/
//});
/***********************************************ESTO CREO QUE YA TAMPOCO SERVIRA************************************/

//tipo de pago
    function myFunction() {
        var opcion = $('input:radio[name=rad]:checked').val();
        if(opcion==1){
            var efectivo = document.getElementById('efectivo').value;
            var total = document.getElementById('total').value;
            if(efectivo >= total){
                var cambio = efectivo - total;
                $('#cambio').show().val(cambio);
                alert('Su cambio es de: ' + cambio);
            }else{
                alert('Dinero insuficiente');
            }
        }else if(opcion==2 || opcion==3){alert('Favor de Ingresar la Tarjeta');}
    }

//VALIDAR RADIOBUTTONS
    $("input[name=rad]").click(function () {   
        var opcion = $('input:radio[name=rad]:checked').val();
        if(opcion==1){
            $( "#efectivo" ).show();
        }else{
            $( "#efectivo" ).hide();
        }
    });
    
    //sumar precios
    function sumar() {
        var total = 0;
        $(".monto").each(function() {
            if (isNaN(parseFloat($(this).val()))) {
            total += 0;
            } else {
            total += parseFloat($(this).val());
            }
        });
        $('#total').val(total);
        $('#total2').val(total);
    }

    //sumar creditos
    function credi() {
        var total = 0;
        $(".credi").each(function() {
            if (isNaN(parseFloat($(this).val()))) {
            total += 0;
            } else {
            total += parseFloat($(this).val());
            }
        });
        $('#totalc').val(total);
    }

    /*************************************** FECHA Y HORA************************** */
    function mueveReloj(){
    
        var d = new Date();

        var month = d.getMonth()+1;
        var day = d.getDate();

        var output = d.getFullYear() + '-' +((''+month).length<2 ? '0' : '') + month + '-' +((''+day).length<2 ? '0' : '') + day;


        momentoActual = new Date()
        hora = momentoActual.getHours()
        minuto = momentoActual.getMinutes()
        segundo = momentoActual.getSeconds()

        str_segundo = new String (segundo)
        if (str_segundo.length == 1)
        segundo = "0" + segundo

        str_minuto = new String (minuto)
        if (str_minuto.length == 1)
        minuto = "0" + minuto

        str_hora = new String (hora)
        if (str_hora.length == 1)
        hora = "0" + hora

        horaImprimible = output+" "+ hora + ":" + minuto + ":" + segundo

        //console.log(output+" "+horaImprimible);

        document.form_reloj.reloj.value = horaImprimible

        setTimeout("mueveReloj()",1000);

        $('#fecha').val(horaImprimible);
    }

</script>
