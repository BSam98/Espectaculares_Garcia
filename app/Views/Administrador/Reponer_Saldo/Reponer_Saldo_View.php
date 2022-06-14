<?php 
if((!isset($_SESSION['Usuario'])) || (!isset($_SESSION['idUsuario']))){
    header('Location: http://localhost/Espectaculares_Garcia/public/');
    exit();
}else{
?>
<fieldset id="fieldset" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" style="color:black;">
    <center><label><h2>Movimientos</h2></label></center>
                <!-- Begin Page Content -->
                <div class="container-fluid" id="puntoVenta">
                    <!-- Tarjeta y Recarga -->
                    <form id="formPuntoVenta">

                        <div class="row">
                            <!-- Pending Requests Card Example -->
                            <div class="col-xl-12 col-md-12 mb-12">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="input-group">
                                        <div class="col-xs-4 col-sm-4">
                                            <h5 class="m-0 font-weight-bold text-primary"><i class="fa fa-credit-card" aria-hidden="true" style="margin:5px;"></i>&nbsp;Tarjeta:</h5>
                                            <input type="text" class="form-control" name="inputTarjeta" id="inputTarjeta" autofocus>
                                        </div>
                                        <!-- Optional: clear the XS cols if their content doesn't match in height -->
                                        <div class="col-xs-4 col-sm-4">
                                            <!--a href="#" id="celular" class="btn btn-success">Tarjeta Electónica</a-->  
                                            <br>
                                            <button type="button" class="btn btn-success" data-toggle="modal" id="buscarTarjeta" value=""><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Buscar</button>
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
                                                    /></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>&nbsp;Fecha</center></h6>
                                        <h6 scope="col" style="text-align: center; vertical-align: middle;"><svg id="Layer_1" style="width:30px; height:30px;" version="1.1" viewBox="0 0 30 30" xml:space="preserve"><style type="text/css"> .st0{fill:#FD6A7E;} .st1{fill:#17B978;} .st2{fill:#8797EE;} .st3{fill:#41A6F9;} .st4{fill:#37E0FF;}
                                                    .st5{fill:#2FD9B9;}.st6{fill:#F498BD;}.st7{fill:#FFDF1D;} .st8{fill:#C6C9CC;}</style><path class="st4" d="M24.9,24.1l-0.4-5c-0.4-4.5-2.8-7.5-6.5-10l1-6h-5l-0.8,1H11l0.6,3.2l4.4,0.6c0.4,0.1,0.6,0.4,0.6,0.7  c0,0.3-0.3,0.6-0.7,0.6l-4-0.1c-3.7,2.5-6.1,5.5-6.4,10l-0.4,5C4.5,24.3,4,24.8,4,25.5C4,26.3,4.7,27,5.5,27h19  c0.8,0,1.5-0.7,1.5-1.5C26,24.8,25.5,24.3,24.9,24.1z M11.4,17.6l2.2-0.3l1-2c0.2-0.3,0.6-0.3,0.8,0l1,2l2.2,0.3  c0.4,0.1,0.5,0.5,0.3,0.8L17.3,20l0.4,2.2c0.1,0.4-0.3,0.7-0.7,0.5l-2-1l-2,1c-0.3,0.2-0.7-0.1-0.7-0.5l0.4-2.2l-1.6-1.6  C10.9,18.1,11,17.7,11.4,17.6z"/></svg>Detalles</h6>
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
                                                <center><h5>Desglose de Movimiento</h5></center>
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
                    </form>
                </div>
</fieldset><!--/Ventana de la atracción-->
<script src="JS/carga.js"></script>
<script src="JS/reponerSaldo.js"></script>
<?php }?>