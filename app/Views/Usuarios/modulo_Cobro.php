<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../css/sb-admin-2.css" rel="stylesheet"><!--Esta linea la acabo de agregar, tiene el estilo del radio en tipo pago-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

</head>
<body id="page-top" style="background-image: url('./Img/mainbg.png'); background-repeat:repeat;" onload="mueveReloj()">
   <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar"><br>
            <form name="form_reloj">
                <input type="text" name="reloj" size="25" style="color:white;background : inherit; border:none; font-family : Arial; font-size : 14px; text-align:right;" onload="window.document.form_reloj.reloj.blur()">
            </form>
            <hr class="sidebar-divider">
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
                <center><b><label>RECARGAS:</label></b></center>
                    <?php foreach($Creditos as $key => $cred){ ?>
                        <button type="button" id="creditos" class="btn btn-success creditosC" style="margin:5px;" value="<?= $cred->idFechaCreditosCortesia?>"><?= $cred->Nombre?></button>
                    <?php } ?>
            </li><br>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item active">
                <center><b><label>PROMOCIONES: &nbsp;</label></b></center>
                <?php foreach($Pulsera as $key => $pu){ ?>
                    <button type="button" id="promocionn" class="btn btn-success promocionnn" onblur="actualizar()" style="margin:5px;"  value="<?= $pu->idFechaPulseraMagica?>"><?= $pu->Nombre?></button>
                <?php }?>
                <div id="log"></div>
            </li>
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
                    
                    <?php foreach($Turno as $d){?>
                        <a aria-expanded="false" aria-controls="collapseTwo" style="font-family: monospace; color:black; font-size:16px;">
                        <?php echo '<b>Zona:</b>&nbsp;'.$d->Nombre.'&nbsp;<b>Taquilla:</b>&nbsp;'.$d->Nombre.'&nbsp;<b>Ventanilla:</b>&nbsp;'.$d->Nombre?>
                        </a>
                    <?php }?>
                    
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
                                <a class="dropdown-item btn btn-danger" id="cerrarCaja" style="font-family: monospace; font-size:14px;">
                                    &nbsp;Cerrar Caja&nbsp;<i class="fa fa-times btn btn-danger" aria-hidden="true"></i>
                                </a>
                            </div>
                            <!--a class="nav-link navbar-brand" href="Ticket" target="_blank">Imprimir Ticket</a-->
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->
               
                <!-- Begin Page Content -->
                <div class="container-fluid" id="puntoVenta">
                        <!-- Tarjeta y Recarga -->
                        <form id="formPuntoVenta">
                            <input type="hidden" name="ventanillaa" id="ventanillaa" value="<?php echo $_GET["v"]?>">
                            <input type="hidden" name="idventani" id="idventani" value="<?php echo $_GET["idv"]?>">
                            <input type="hidden" name="evento" id="evento" value="<?php echo $_GET["e"]?>">
                            <input type="hidden" name="arregloP" id="arregloP" value="">
                            <input type="hidden" name="arregloPrecioP" id="arregloPrecioP" value="">
                            <input type="hidden" name="arregloC" id="arregloC" value="">
                            <input type="hidden" name="arregloPrecioC" id="arregloPrecioC" value="">
                            <input type="hidden" name="idTarjeta" id="idTarjeta" value="">
                            <input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo session('idUsuario')?>">
                            <input type="hidden" name="precioTa" id="precioTa" value="">
                            <input type="hidden" name="indice" id="indice" value="">
                            <input type="hidden" name="fecha" id="fecha" value="">
                            <div class="row">
                                <!-- Pending Requests Card Example -->
                                <div class="col-xl-12 col-md-12 mb-12">
                                    <div class="card border-left-warning shadow h-100 py-2">
                                        <div class="input-group">
                                            <div class="col-xs-4 col-sm-4">
                                                <h5 class="m-0 font-weight-bold text-primary"><i class="fa fa-credit-card" aria-hidden="true" style="margin:5px;"></i>&nbsp;Tarjeta:</h5>
                                                <input type="number" class="form-control" name="tarjetaAdd" id="tarjetaAdd" onblur="ingresarTarjeta()" autofocus>
                                            </div>
                                            <div class="col-xs-4 col-sm-4">
                                                <h5 class="m-0 font-weight-bold text-primary"><i class="fa fa-retweet" aria-hidden="true"  style="margin:5px;"></i>&nbsp;Recarga:</h5>
                                                <input class="form-control" type="number" name="recargaAdd" id="recargaAdd" onblur="ingresarRecarga()">&nbsp;
                                            </div>
                                            <!-- Optional: clear the XS cols if their content doesn't match in height -->
                                            <div class="col-xs-4 col-sm-4">
                                                <!--a href="#" id="celular" class="btn btn-success">Tarjeta Electónica</a-->  
                                                <button type="button" style="margin: 1px;" class="btn btn-danger" data-toggle="modal" data-target="#modal_Devolucion" value=""><i class="fa fa-reply-all" aria-hidden="true"></i>&nbsp;Devolucion de Tarjeta</button>
                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_Fajilla" value=""><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Agregar Fajilla</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                         <!-- Content Row -->

                            <div class="row">

                                <!-- Area Chart -->
                                <div class="col-xl-8 col-lg-7">
                                    <div class="card shadow mb-5">
                                        <!-- Card Header - Dropdown -->
                                        <div class="card-header py-4 d-flex flex-row align-items-center justify-content-between">
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
                                                            <td><div id="result"><!--label for="">Tarjeta: &nbsp;</label--><input type="number" id="tarjeta" name="tarjeta" value="" style="background : inherit; border:none; text-align:center;" disabled></td></div>
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
                                            <center><h6 class="m-0 font-weight-bold text-primary" style="vertical-align: middle ;">TIPO PAGO</h6><br></center>
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
                <button type="button" class="btn btn-success pull-left" data-dismiss="modal" name="cobrarTransaccion" id="cobrarTransaccion" value="<?php ?>">Cobrar</button>
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
                <input type="hidden" name="idv" id="idv" value="<?php echo $_GET["v"]?>">
                    <div class="form-group">
                        <label>Tarjeta</label>
                        <input type="number" name="tarjetD" id="tarjetD" class="form-control" placeholder="Ingresa la tarjeta a devolver">
                    </div>
                    <div class="form-group">
                        <label>Descripción</label>
                        <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Motivo de devolución">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal" name="devolucion" id="devolucion" value="">Devolver</button>
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
            <input type="hidden" name="fecha" id="fecha" value="">
            <input type="hidden" name="v" id="v" value="<?php echo $_GET["v"]?>">
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
</html>
<script src="JS/puntoVenta.js"></script>


