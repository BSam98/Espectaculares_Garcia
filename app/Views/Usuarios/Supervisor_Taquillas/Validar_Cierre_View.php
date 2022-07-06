<!--MODAL VALIDAR CIERRE DE TURNO FINALIZADO-->
<div class="modal fade" id="modal_Validar_Cierre_Taquilla" style="color:black;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Validar Turno</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form  enctype="multipart/form-data" name="formularioValidarCierreTaquilla" id="formularioValidarCierreTaquilla">
                    <div>
                        <input id="idAperturaVentanilla" value="" type="hidden">
                        <input id="idUsuario" value="<?php echo $_SESSION['idUsuario'] ?>" type="hidden">
                    </div>

                    <div class="accordion" id="acordeon_Validar">

                        <div class="card">
                            <div class="card-header" id="cabezera_Efectivo">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#validarEfectivo" aria-expanded="false" aria-controls="validarEfectivo">
                                        Validar Efectivo
                                    </button>
                                </h2>
                            </div>

                            <div id="validarEfectivo" class="collapse" aria-labelledby="cabezera_Efectivo" data-parent="#acordeon_Validar">
                                <div class="card-body" id="cuerpoEfectivo">
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" id="cabezera_Voucher">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#validarVoucher" aria-expanded="false" aria-controls="validarVoucher">
                                        Validar Vouchers
                                    </button>
                                </h2>
                            </div>
                            <div id="validarVoucher" class="collapse" aria-labelledby="cabezera_Voucher" data-parent="#acordeon_Validar">
                                <div class="card-body" id="cuerpoVoucher">
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" id="headingThree cabezera_Tarjeta">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#validarTarjeta" aria-expanded="false" aria-controls="validarTarjeta">
                                        Validar Fajillas
                                    </button>
                                </h2>
                            </div>
                            <div id="validarTarjeta" class="collapse" aria-labelledby="headingThree cabezera_Tarjeta" data-parent="#acordeon_Validar">
                                <div class="card-body" id="cuerpoFajilla">
                                </div>
                            </div>
                        </div>

                    </div>
                    
                    <br>
                    <hr>

                    <div id="botones">
                        <button  name="z" type="button" class="btn btn-success validar_Turno_Taquillero">Guardar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
     </div>  
</div>

<!--Modal Validar Turno Activo-->
<!--MODAL VALIDAR CIERRE DE TURNO FINALIZADO-->
<div class="modal fade" id="modal_Validar_Faltante_Taquilla" style="color:black;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Faltante</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form  enctype="multipart/form-data" name="formularioValidarCierreTaquilla" id="formularioValidarCierreTaquilla">
                    <div>
                        <input id="idAperturaVentanillaFaltante" value="" type="hidden">
                        <input id="idUsuarioSupervisor" value="<?php echo $_SESSION['idUsuario'] ?>" type="hidden">
                    </div>

                    <div class="accordion" id="acordeon_Validar_Faltante">

                        <div class="card">
                            <div class="card-header" id="cabezera_Efectivo_Faltante">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#validarEfectivoFaltante" aria-expanded="false" aria-controls="validarEfectivoFaltante">
                                        Efectivo
                                    </button>
                                </h2>
                            </div>

                            <div id="validarEfectivoFaltante" class="collapse" aria-labelledby="cabezera_Efectivo_Faltante" data-parent="#acordeon_Validar_Faltante">
                                <div class="card-body" id="cuerpoEfectivoFaltante">
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" id="cabezera_Voucher_Faltante">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#validarVoucherFaltante" aria-expanded="false" aria-controls="validarVoucherFaltante">
                                        Vouchers
                                    </button>
                                </h2>
                            </div>
                            <div id="validarVoucherFaltante" class="collapse" aria-labelledby="cabezera_Voucher_Faltante" data-parent="#acordeon_Validar_Faltante">
                                <div class="card-body" id="cuerpoVoucherFaltante">
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" id="headingThree cabezera_Tarjeta_Faltante">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#validarTarjetaFaltante" aria-expanded="false" aria-controls="validarTarjetaFaltante">
                                        Fajilla
                                    </button>
                                </h2>
                            </div>
                            <div id="validarTarjetaFaltante" class="collapse" aria-labelledby="headingThree cabezera_Tarjeta_Faltante" data-parent="#acordeon_Validar_Faltante">
                                <div class="card-body" id="cuerpoFajillaFaltante">
                                </div>
                            </div>
                        </div>

                    </div>
                    
                    <br>
                    <hr>

                    <div id="botonesFaltante">
                        <button  name="z" type="button" class="btn btn-success validar_Turno_Taquillero">Guardar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
     </div>  
</div>
