<section class="container" style="background-color: white;" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
<center><h2>REPORTE DE VENTAS</h2></center>

    <div class="container-fluid">

    <label><h2><i class="fa fa-share" aria-hidden="true"></i>&nbsp;Devolución de tarjetas:</h2></label>
    <input type="number" class="form-control" name="devTarjet" id="devTarjet" disabled>
    <br>

        <div class="row">
            <div class="card-wrapper col-sm-12 col-md-6 col-lg-6 aos-init aos-animate">
                <form action="">            
                    <div class="input-group mb-3">
                        <h3><i class="fa fa-table" aria-hidden="true"></i>&nbsp;Tabulador de efectivo:</h3>&nbsp;
                            <div class="input-group-append">
                                <a href="#" id="cerrarCaja" class="btn btn-success btn-sm btn-block rounded" type="button">CERRAR CAJA</a>
                                <!--button class="btn btn-success btn-sm btn-block rounded" type="button" id="totalDinero">CERRAR CAJA</!--button-->     
                            </div>
                    </div>
                    <div class="table table-responsive">
                            <table>
                                <tbody>
                                    <tr>
                                        <th colspan="3"><center>Billetes</center></th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <label>$1,000</label>
                                                <input type="number" class="form-control tabulador" name="mil" id="mil" style="width : 100px; height:30px;" min="0">
                                                <input type="text" id="bmil" style="display:none;">
                                            </div>
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
                                            <div class="form-group">
                                                <label>$20</label>
                                                <input type="number" class="form-control tabulador" name="veinte" id="veinte" style="width : 100px; height:30px;" min="0">
                                                <input type="text" id="bvei" style="display:none;">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="3"><center>Monedas</center></th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-group">
                                                <label>$1</label>
                                                <input type="number" class="form-control tabulador" name="uno" id="uno" style="width : 100px; height:30px;">
                                                <input type="text" id="muno" style="display:none;">
                                            </div>
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
                                            <div class="form-group">
                                                <label>$2</label>
                                                <input type="number" class="form-control tabulador" name="dos" id="dos" style="width : 100px; height:30px;">
                                                <input type="text" id="mdos" style="display:none;">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label>$0.50</label>
                                                <input type="number" class="form-control tabulador" name="cincuentac" id="cincuentac" style="width : 100px; height:30px;">
                                                <input type="text" id="mcincuenta" style="display:none;">
                                            </div>
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
            <div class="card-wrapper col-sm-12 col-md-6 col-lg-6 aos-init aos-animate">
            <center><h3><i class="fa fa-info-circle" aria-hidden="true"></i>Información:</h3></center>
                    <hr>
                <div class="form-group">
                    <label><h5><i class="fa fa-fax" aria-hidden="true"></i>&nbsp;Caja:</h5></label>
                    <input type="number" class="form-control" name="cierre" id="cierre" style="display: none;" disabled>
                </div><hr>
                <div class="form-group">
                    <label><h5><i class="fa fa-calculator" aria-hidden="true"></i>&nbsp;Total de Efectivo:</h5></label>
                    <input type="number" class="form-control" name="money" id="money" disabled style="display: none;">
                </div><hr>
                <div class="form-group">
                    <label><h5><i class="fa fa-braille" aria-hidden="true"></i>&nbsp;Total Voucher:</h5></label>
                    <input type="number" class="form-control" name="vouch" id="vouch" style="display: none;" disabled>
                </div><hr>
                <!--div class="form-group">
                    <div class="alert alert-danger" role="alert">
                    <center><h5>CUIDADO!!</h5></center><hr>
                        <p>La cantidad ingresada NO corresponde a la cantidad registrada! <br> Verifique nuevamente su cierre </p>
                    </div>
                </div-->
            </div>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="table table-responsive table-striped">
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
    </div>
</section>

<script>

$('#cerrarCaja').click(function(){
    swal({
        title: '¿Estas seguro de cerrar caja?',
        icon: "warning",
        buttons: true,
        dangerMode: false,
        html: "Some Text" +
            "<br>" +
            '<button type="button" role="button" tabindex="0" class="SwalBtn1 customSwalBtn">' + 'Button1' + '</button>' +
            '<button type="button" role="button" tabindex="0" class="SwalBtn2 customSwalBtn">' + 'Button2' + '</button>',
        showCancelButton: false,
        showConfirmButton: false
    })
    .then((willDelete) => {
            if (willDelete) {
                /*swal("Cerrada correctamente", {
                    icon: "success",
                });*/
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
            }/* else {
                
            }*/
        });
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
</script>