<br>
<section style="overflow: hidden;" id="menuUser" >
    <div class="row">
        <div class="card-wrapper col-sm-12 col-md-6 col-lg-5" style="color:white;">
            <div class="container-fluid" style="margin: 25px 25px 25px 25px; text-align:center;">
                <img src="./Img/logo.png" alt="image" style="height: 50%; width:60%;">
            </div>
        </div>
        <div class="card-wrapper col-sm-12 col-md-6 col-lg-4" style="color:white;">
            <div class="container-fluid" style="margin: 25px 25px 25px 25px; text-align:center;">
                <form action="PuntoVenta" method="POST" enctype="multipart/form-data">
                    <center><h2>INICIAR TURNO</h2></center>
                    <script src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>
                        <div class="nowDateTime" style="text-align: right;">
                        <p>
                            <span id="fecha"></span><br />
                            <span id="hora"></span>
                        </p>
                        </div>
                    <div class="form-group">
                        <label for="">Evento</label>
                        <select name="" id="" class="form-control">
                            <option value="">Monterrey</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tarjetas</label><br>
                        <input type="text" name="folioi" id="folioi" class="form-control" placeholder="Folio Inicial">
                        <input type="text" name="foliof" id="foliof" class="form-control" placeholder="Folio Final">
                    </div>
                    <div class="form-group">
                        <label for="">Fondo de Caja</label>
                        <input type="number" class="form-control" name="" id="" placeholder="Ingresa la Cantidad">
                    </div>
                    <div class="form-group">
                        <label for="">Punto de Venta</label>
                        <select name="" id="" class="form-control">
                            <option value="">Nombre de la Taquilla</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success" value="Aceptar">Iniciar</button>
                </form>
            </div>
        </div>
    </div>    
</section>

<script>
    document.addEventListener("DOMContentLoaded", function(event) {
    moment.locale('es');
    var upDate = function() {
      var elFecha = document.querySelector("#fecha");
      var elHora = document.querySelector("#hora");
      var nowDate = moment(new Date());
      elHora.textContent = nowDate.format('HH:mm:ss');
      elFecha.textContent =nowDate.format('dddd DD [de] MMMM [de] YYYY ');
    }
    setInterval(upDate, 1000);
});
</script>

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