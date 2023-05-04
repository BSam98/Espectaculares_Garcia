<?php date_default_timezone_set("America/Mexico_City"); ?>
<section style="overflow: hidden;" id="menuUser" onload="GetClock()">
    <div class="row">
        <div class="card-wrapper col-sm-12 col-md-6 col-lg-5" style="color:white;">
            <div class="container-fluid" style="margin: 25px 25px 25px 25px; text-align:center;">
                <img src="./Img/logo.png" alt="image" style="height: 50%; width:60%;">
            </div>
        </div>
        <div class="card-wrapper col-sm-12 col-md-6 col-lg-4" style="color:white;">
            <div class="container-fluid" style="margin: 25px 25px 25px 25px; text-align:center;">
                <form id="form1">
                    <!--center><h2>INICIAR TURNO</h2></!--center-->
                    <center><h2>Bienvenido: <?php echo session('Usuario');?></h2></center>
                    
                    
                    <label for="" class="reloj" id="clockbox" value=""></label>

                    <input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo session('idUsuario')?>">
                    <!--script src="https://momentjs.com/downloads/moment-with-locales.min.js"></!--script-->
                    <!--div class="nowDateTime" style="text-align: right;">
                        <p><span id="fecha"></span><span id="hora"></span></p>
                    </div-->
                    <div class="form-group">
                        <label for="">Evento</label>
                        <?php foreach($Eventos as $e):?>
                            <input type="hidden" name="eventoId" id="eventoId" value="<?php echo $e->idEvento?>">
                            <input type="text" name="evento" id="evento" value="<?php echo $e->Nombre?>" disabled>
                        <?php endforeach?>
                    </div>
                    <div class="form-group">
                        <label>Zona</label>
                        <select name="select_Zona" id="select_Zona" class="form-control">
                           
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Atraccion</label>
                        <select name="atraccion" id="atraccion" class="form-control">

                        </select>
                    </div>
                    <!--div class="form-group">
                        <label for="">Punto de Venta</label>
                        <select name="" id="" class="form-control">
                            <option value="">Nombre de la Taquilla</option>
                        </select>
                    </div-->
                    <input type="button" id="iniciar_Turno_Validador" value="Iniciar Sesión" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>    
</section>
<script src="JS/carga.js"></script>
<script src="JS/turnoValidador.js"></script>

<style>
    #menuUser{
        background-image:url(./Img/Evento.jpg);
        background-position: center center;
        background-size: cover;
        border-radius: 30px;
        background-repeat: no-repeat;
        margin: 20px;
    }
</style>