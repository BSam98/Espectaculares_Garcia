<!-- Page Wrapper -->
<div id="wrapper">
<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - LOGO -->
    <li class="nav-item active">
        <div class="sidebar-brand-icon">
            <center><img src = "Img/logo.png" style="width: 70%;"/></center>
        </div><br>
    </li>
    <!--Fehca y Hora-->
    <div class="sidebar-heading">
        <div class="nowDateTime" style="text-align: center; color:white; font-size:15px;">
            <p><span id="fecha"></span><br><span id="hora"></span></p>
        </div>
    </div>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Datos del Usuario
    </div>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link navbar-brand" href="#"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fa fa-user" aria-hidden="true"></i>&nbsp;
            <?php echo session('Usuario');?>
        </a>
    </li>
     <!-- Divider -->
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Datos de la Taquilla
    </div>
        <li class="nav-item">
            <a class="nav-link navbar-brand" href="CerrarSesion" id="cerrarCaja">
                <i class="fa fa-user" aria-hidden="true"></i>&nbsp;
                Cerrar
            </a>
        </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid" style="background-color: white;" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
            <!-- Content Row -->
            <div class="row">
                <div class="container">
                <center><h3>REPORTE DE VENTAS</h3></center>
                    <div class="input-group mb-3">
                        <label><h5><i class="fa fa-share" aria-hidden="true"></i>&nbsp;Devolución de tarjetas:&nbsp;&nbsp;</h5></label>
                        <div class="input-group-append">
                            <input type="number" class="form-control" name="devTarjet" id="devTarjet" disabled style="width:50%;">
                        </div>
                    </div>
                    <div class="row">
                        <!--div class="card-wrapper col-sm-12 col-md-6 col-lg-6 aos-init aos-animate"-->
                        <form action="">         
                            <div class="table table-responsive" style="color: black;">
                                <table class="table table-responsive">
                                    <th colspan="7"><center><i class="fa fa-table" aria-hidden="true"></i>&nbsp;Tabulador de efectivo:</h3>&nbsp;</center></th>
                                    <tbody style="color: black;">
                                        <tr>
                                            <td><center>Billetes</center></td>
                                            <td>
                                                <div class="form-group">
                                                    <label>$1,000</label>
                                                    <input type="number" class="form-control tabulador" name="mil" id="mil" style="width : 100px; height:30px;" min="0">
                                                    <input type="text" id="bmil" style="display:none;">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group"> 
                                                    <label>$500</label>
                                                    <input type="number" class="form-control tabulador" name="quinientos" id="quinientos" style="width : 100px; height:30px;" min="0">
                                                    <input type="text" id="bquin" style="display:none;">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label>$200</label>
                                                    <input type="number" class="form-control tabulador" name="dosc" id="dosc" style="width : 100px; height:30px;" min="0">
                                                    <input type="text" id="bdos" style="display:none;">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label>$100</label>
                                                    <input type="number" class="form-control tabulador" name="cien" id="cien" style="width : 100px; height:30px;" min="0">
                                                    <input type="text" id="bcien" style="display:none;">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label>$50</label>
                                                    <input type="number" class="form-control tabulador" name="cincuenta" id="cincuenta" style="width : 100px; height:30px;" min="0">
                                                    <input type="text" id="bcin" style="display:none;">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label>$20</label>
                                                    <input type="number" class="form-control tabulador" name="veinte" id="veinte" style="width : 100px; height:30px;" min="0">
                                                    <input type="text" id="bvei" style="display:none;">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><center>Monedas</center></td>
                                            <td>
                                            <div class="form-group">
                                                    <label>$10</label>
                                                    <input type="number" class="form-control tabulador" name="diez" id="diez" style="width : 100px; height:30px;">
                                                    <input type="text" id="mdiez" style="display:none;">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label>$5</label>
                                                    <input type="number" class="form-control tabulador" name="cinco" id="cinco" style="width : 100px; height:30px;">
                                                    <input type="text" id="mcinco" style="display:none;">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label>$2</label>
                                                    <input type="number" class="form-control tabulador" name="dos" id="dos" style="width : 100px; height:30px;">
                                                    <input type="text" id="mdos" style="display:none;">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label>$1</label>
                                                    <input type="number" class="form-control tabulador" name="uno" id="uno" style="width : 100px; height:30px;">
                                                    <input type="text" id="muno" style="display:none;">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label>$0.50</label>
                                                    <input type="number" class="form-control tabulador" name="cincuentac" id="cincuentac" style="width : 100px; height:30px;">
                                                    <input type="text" id="mcincuenta" style="display:none;">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label>Voucher</label>
                                                    <input type="number" class="form-control tabulador" name="voucher" id="voucher" style="width : 100px; height:30px;">
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <div class="container" style="color: black;">
                            <center><h4><i class="fa fa-info-circle" aria-hidden="true"></i>Información:&nbsp;<a href="#detalles" class ="" type="button" data-toggle="modal">Detalles</a></h4></center>
                            <div class="form-group">
                                <label><h5><i class="fa fa-fax" aria-hidden="true"></i>&nbsp;Caja:</h5></label>
                                <input type="number" class="form-control" name="cierre" id="cierre" style="display: none;" disabled>
                            </div><br>
                            <div class="form-group">
                                <label><h5><i class="fa fa-calculator" aria-hidden="true"></i>&nbsp;Total de Efectivo:</h5></label>
                                <input type="number" class="form-control" name="money" id="money" disabled style="display: none;">
                            </div><br>
                            <div class="form-group">
                                <label><h5><i class="fa fa-braille" aria-hidden="true"></i>&nbsp;Total Voucher:</h5></label>
                                <input type="number" class="form-control" name="vouch" id="vouch" style="display: none;" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- /.container-fluid -->
        </div>
    <!-- End of Main Content -->
    </div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->





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
 


<script>
    
    $('#cerrarCaja').on('click',function(){
        alert('Estoy en cerrar caja');
       // suma();
        //$('#money').show().val(total);
    });

    /*$('#totaldinero').click(function(){
        var mil=quin=dosc=cien=cinc=veint=total=md=mc=mdos=mu=mcc=0;
                $("#bmil").each(function() {
                    if (isNaN(parseFloat($(this).val()))) {
                    mil += 0;
                    } else {
                    mil += parseFloat($(this).val());
                    }
                });
                $("#bquin").each(function() {
                    if (isNaN(parseFloat($(this).val()))) {
                    quin += 0;
                    } else {
                    quin += parseFloat($(this).val());
                    }
                });
                $("#bdos").each(function() {
                    if (isNaN(parseFloat($(this).val()))) {
                    dosc += 0;
                    } else {
                    dosc += parseFloat($(this).val());
                    }
                });
                $("#bcien").each(function() {
                    if (isNaN(parseFloat($(this).val()))) {
                    cien += 0;
                    } else {
                    cien += parseFloat($(this).val());
                    }
                });
                $("#bcin").each(function() {
                    if (isNaN(parseFloat($(this).val()))) {
                    cinc += 0;
                    } else {
                    cinc += parseFloat($(this).val());
                    }
                });
                $("#bvei").each(function() {
                    if (isNaN(parseFloat($(this).val()))) {
                    veint += 0;
                    } else {
                    veint += parseFloat($(this).val());
                    }
                });
                $("#mdiez").each(function() {
                    if (isNaN(parseFloat($(this).val()))) {
                    md += 0;
                    } else {
                    md += parseFloat($(this).val());
                    }
                });
                $("#mcinco").each(function() {
                    if (isNaN(parseFloat($(this).val()))) {
                    mc += 0;
                    } else {
                    mc += parseFloat($(this).val());
                    }
                });
                $("#mdos").each(function() {
                    if (isNaN(parseFloat($(this).val()))) {
                    mdos += 0;
                    } else {
                    mdos += parseFloat($(this).val());
                    }
                });
                $("#muno").each(function() {
                    if (isNaN(parseFloat($(this).val()))) {
                    mu += 0;
                    } else {
                    mu += parseFloat($(this).val());
                    }
                });
                $("#mcincuenta").each(function() {
                    if (isNaN(parseFloat($(this).val()))) {
                    mcc += 0;
                    } else {
                    mcc += parseFloat($(this).val());
                    }
                });

                total=mil+quin+dosc+cien+cinc+veint+md+mc+mdos+mu+mcc;
                $('#money').show().val(total);
    })*/
    
    $('#mil').change(function () {
        //$("#mil").prop('disabled', true);
        valor_inicial = $(this).val();
        r = (valor_inicial * 1000);
        $('#bmil').val(r);
    });
    $('#quinientos').change(function () {
        //$("#mil").prop('disabled', true);
        valor_inicial = $(this).val();
        r = (valor_inicial * 500);
        $('#bquin').val(r);
    });
    $('#dosc').change(function () {
        //$("#mil").prop('disabled', true);
        valor_inicial = $(this).val();
        r = (valor_inicial * 200);
        $('#bdos').val(r);
    });
    $('#cien').change(function () {
        //$("#mil").prop('disabled', true);
        valor_inicial = $(this).val();
        r = (valor_inicial * 100);
        $('#bcien').val(r);
    });
    $('#cincuenta').change(function () {
        //$("#mil").prop('disabled', true);
        valor_inicial = $(this).val();
        r = (valor_inicial * 50);
        $('#bcin').val(r);
    });
    $('#veinte').change(function () {
        //$("#mil").prop('disabled', true);
        valor_inicial = $(this).val();
        r = (valor_inicial * 20);
        $('#bvei').val(r);
    });
    $('#diez').change(function () {
        //$("#mil").prop('disabled', true);
        valor_inicial = $(this).val();
        r = (valor_inicial * 10);
        $('#mdiez').val(r);
    });
    $('#cinco').change(function () {
        //$("#mil").prop('disabled', true);
        valor_inicial = $(this).val();
        r = (valor_inicial * 5);
        $('#mcinco').val(r);
    });
    $('#dos').change(function () {
        //$("#mil").prop('disabled', true);
        valor_inicial = $(this).val();
        r = (valor_inicial * 2);
        $('#mdos').val(r);
    });
    $('#uno').change(function () {
        //$("#mil").prop('disabled', true);
        valor_inicial = $(this).val();
        r = (valor_inicial * 1);
        $('#muno').val(r);
    }); 
    $('#cincuentac').change(function () {
        //$("#mil").prop('disabled', true);
        valor_inicial = $(this).val();
        r = (valor_inicial * 0.50);
        $('#mcincuenta').val(r);
    });

    function suma(){
        var mil=quin=dosc=cien=cinc=veint=total=md=mc=mdos=mu=mcc=0;
            $("#bmil").each(function() {
                if (isNaN(parseFloat($(this).val()))) {
                mil += 0;
                } else {
                mil += parseFloat($(this).val());
                }
            });
            $("#bquin").each(function() {
                if (isNaN(parseFloat($(this).val()))) {
                quin += 0;
                } else {
                quin += parseFloat($(this).val());
                }
            });
            $("#bdos").each(function() {
                if (isNaN(parseFloat($(this).val()))) {
                dosc += 0;
                } else {
                dosc += parseFloat($(this).val());
                }
            });
            $("#bcien").each(function() {
                if (isNaN(parseFloat($(this).val()))) {
                cien += 0;
                } else {
                cien += parseFloat($(this).val());
                }
            });
            $("#bcin").each(function() {
                if (isNaN(parseFloat($(this).val()))) {
                cinc += 0;
                } else {
                cinc += parseFloat($(this).val());
                }
            });
            $("#bvei").each(function() {
                if (isNaN(parseFloat($(this).val()))) {
                veint += 0;
                } else {
                veint += parseFloat($(this).val());
                }
            });
            $("#mdiez").each(function() {
                if (isNaN(parseFloat($(this).val()))) {
                md += 0;
                } else {
                md += parseFloat($(this).val());
                }
            });
            $("#mcinco").each(function() {
                if (isNaN(parseFloat($(this).val()))) {
                mc += 0;
                } else {
                mc += parseFloat($(this).val());
                }
            });
            $("#mdos").each(function() {
                if (isNaN(parseFloat($(this).val()))) {
                mdos += 0;
                } else {
                mdos += parseFloat($(this).val());
                }
            });
            $("#muno").each(function() {
                if (isNaN(parseFloat($(this).val()))) {
                mu += 0;
                } else {
                mu += parseFloat($(this).val());
                }
            });
            $("#mcincuenta").each(function() {
                if (isNaN(parseFloat($(this).val()))) {
                mcc += 0;
                } else {
                mcc += parseFloat($(this).val());
                }
            });
        total=mil+quin+dosc+cien+cinc+veint+md+mc+mdos+mu+mcc;
        alert(total);
    }
</script>