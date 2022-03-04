<section class="container" style="background-color: white;">
<center><h2>REPORTE DE VENTAS</h2></center>

    <div class="container-fluid">

    <label>Devolución de Tarjetas:</label>
    <input type="number" class="form-control" name="devTarjet" id="devTarjet" disabled>
    <br>

        <div class="row">
            <div class="card-wrapper col-sm-12 col-md-6 col-lg-6 aos-init aos-animate">
                <h3>Tabulador de efectivo:</h3>
                <form action="">
                    <div class="table table-responsive">
                        <table>
                            <tbody>
                                <tr>
                                    <td>
                                        <label>$1,000</label>
                                        <input type="number" class="form-control tabulador" name="mil" id="mil">
                                        <label>$500</label>
                                        <input type="number" class="form-control tabulador" name="quinientos" id="quinientos">
                                        <label>$200</label>
                                        <input type="number" class="form-control tabulador" name="dosc" id="dosc">
                                        <label>$100</label>
                                        <input type="number" class="form-control tabulador" name="cien" id="cien">
                                        <label>$50</label>
                                        <input type="number" class="form-control tabulador" name="cincuenta" id="cincuenta">
                                        <label>$20</label>
                                        <input type="number" class="form-control tabulador" name="veinte" id="veinte">
                                    </td>
                                    <td>
                                        <label>$10</label>
                                        <input type="number" class="form-control tabulador" name="diez" id="diez">
                                        <label>$5</label>
                                        <input type="number" class="form-control tabulador" name="cinco" id="cinco">
                                        <label>$2</label>
                                        <input type="number" class="form-control tabulador" name="dos" id="dos">
                                        <label>$1</label>
                                        <input type="number" class="form-control tabulador" name="uno" id="uno">
                                        <label>$0.50</label>
                                        <input type="number" class="form-control tabulador" name="cincuentac" id="cincuentac">
                                        <label>Voucher</label>
                                        <input type="number" class="form-control tabulador" name="voucher" id="voucher">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <button class="btn btn-success btn-sm btn-block" type="button" id="totalDinero">Validar</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Total de Dinero:</label>
                                        <input type="number" class="form-control" name="money" id="money" disabled style="display: none;">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
            <div class="card-wrapper col-sm-12 col-md-6 col-lg-6 aos-init aos-animate">
                <h3>Información:</h3>
                <div class="form-group">
                    <label>Caja:</label>
                    <input type="number" class="form-control" name="cierre" id="cierre" style="display: none;" disabled>
                </div><br>
                <div class="form-group">
                    <label>Total de Efectivo: </label>
                    <input type="number" class="form-control" name="tefe" id="tefe" style="display: none;" disabled>
                </div><br>
                <div class="form-group">
                    <label>Total Voucher: </label>
                    <input type="number" class="form-control" name="vouch" id="vouch" style="display: none;" disabled>
                </div>
            </div>
        </div>

    </div>
</section>

<script>
    
    $('totalDinero').click(function(e){
        sumar();
    });


    function sumar() {
        var total = 0;
        $(".tabulador").each(function() {
            if (isNaN(parseFloat($(this).val()))) {
            total += 0;
            } else {
            total += parseFloat($(this).val());
            }
        });
        $('#money').show().val(total);
    }
</script>