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
                        <select name="zona" id="zona" class="form-control">
                           
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Taquilla</label>
                        <select name="taquilla" id="taquilla" class="form-control">

                        </select>
                    </div>
                    <div class="form-group">
                        <label>Ventanilla</label>
                        <select name="ventanilla" id="ventanilla" class="form-control">
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tarjetas</label><br>
                        <div class="input-group">
                            <input type="number" name="folioi" id="folioi" class="form-control" required minlength="8" maxlength="8" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" placeholder="Folio Inicial">
                                <span class="input-group-addon">-</span>
                            <input type="number" name="foliof" id="foliof" class="form-control"  required minlength="8" maxlength="8" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" placeholder="Folio Final">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Fondo de Caja</label>
                        <input type="number" class="form-control" name="fondo" id="fondo" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)" min="1" placeholder="Ingresa la Cantidad">
                    </div>
                    <!--div class="form-group">
                        <label for="">Punto de Venta</label>
                        <select name="" id="" class="form-control">
                            <option value="">Nombre de la Taquilla</option>
                        </select>
                    </div-->
                    <input type="button" id="botonenviar" value="Iniciar Sesión" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>    
</section>

<script>
$(document).ready(function () {
    var tday = ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"];
        var tmonth = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

        function GetClock() {
            var d = new Date();
            var nday = d.getDay(),
                nmonth = d.getMonth(),
                ndate = d.getDate(),
                nyear = d.getFullYear();
            var nhour = d.getHours(),
                nmin = d.getMinutes(),
                nsec = d.getSeconds(),
                ap;

            if (nhour == 0) {
                ap = " AM";
                nhour = 12;
            } else if (nhour < 12) {
                ap = " AM";
            } else if (nhour == 12) {
                ap = " PM";
            } else if (nhour > 12) {
                ap = " PM";
                nhour -= 12;
            }

            if (nmin <= 9) nmin = "0" + nmin;
            if (nsec <= 9) nsec = "0" + nsec;

            var clocktext = "" + tday[nday] + " " + ndate + " de " + tmonth[nmonth] + " de " + nyear + ", " + nhour + ":" + nmin + ":" + nsec + ap + "";
            document.getElementById('clockbox').innerHTML = clocktext;
        }

        GetClock();
        setInterval(GetClock, 1000);

    if($("#evento").change()){
        var evento = $("#eventoId").val();
        //console.log('Evento:'+evento);
        $.ajax({
            url: "eligeZona",
            type:"POST",
            dataType:"JSON ",
            data:{'evento':evento}
            //data:{'evento':evento},
        }).done(function(data){
            console.log('Zona'+data);
            var html='';
                html+='<option value="" selected>Elige una Zona</option>';
               for(var i = 0;i<data.msj.length; i++){
                  html += '<option value="'+data.msj[i]['idZona']+'">'+data.msj[i]['Nombre']+'</option>';
               }
               $("#zona").html(html);
        });
    }
    $(document).on('change','select[name="zona"]' ,function(e) {
    //$("select").change(function() { 
            var zona = $(this).val();
            //console.log('Zona:'+zona);
            //alert(zona);
            $.ajax({
                url: "eligeTaquilla",
                type:"POST",
                dataType:"JSON ",
                data:{'zona':zona}
                //data:{'evento':evento},
            }).done(function(data) {
                console.log('taquilla'+data);
                var html='';
                    html+='<option value="" selected>Elige una Taquilla</option>';
                for(var i = 0;i<data.msj.length; i++){
                    html += '<option value="'+data.msj[i]['idTaquilla']+'">'+data.msj[i]['Nombre']+'</option>';
                }
                $("#taquilla").html(html);
            });
    });

    //$("select").change(function() {
    $(document).on('change','select[name="taquilla"]' ,function(e) {
            var taquilla = $(this).val();
            //console.log('Taquilla:'+taquilla);
            //alert('Soy taquilla'+taquilla);
            $.ajax({
                url: "eligeVentanilla",
                type:"POST",
                dataType:"JSON ",
                data:{'taquilla':taquilla}
                //data:{'evento':evento},
            }).done(function(data) {
                console.log('Ventanilla'+data);
                var html='';
                    html+='<option value="" selected>Elige una Ventanilla</option>';
                for(var i = 0;i<data.msj.length; i++){
                    html += '<option value="'+data.msj[i]['idVentanilla']+'">'+data.msj[i]['Nombre']+'</option>';
                }
                $("#ventanilla").html(html);
            });
    });
    $(document).on('change','select[name="ventanilla"]' ,function(e) {
    //$("select").change(function() { 
            var ventanilla = $(this).val();
           // console.log('Ventanilla:'+ventanilla);
            //alert('Ventanilla'+zona);
    });

    //function enviar_ajax(){
        $("#botonenviar").click( function(){
            
            //alert($('#form1').serialize());
            $.ajax({
            type: 'POST',
            url: 'datosTurno',
            data: $('#form1').serialize(),
            dataType: 'JSON',
            error(jqXHR, textStatus, errorThrown){
                alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            },
            }).done(function(data){
                console.log('soy data'+data.msj);
                //console.log('soy Data Contenido'+data.msj);
                var evento = $("#eventoId").val();
                var zona =$('#zona').val();  
                var taquilla = $('#taquilla').val();
                var ventanilla =$('#ventanilla').val();
                var usuario =$('#idUsuario').val();
                if(data.msj == true){
                    //console.log('soy Data'+data.msj);
                    alert('Error al Ingresar');
                    location.href='turno';
                }else{
                    $.ajax({
                        url:"PuntoVenta",
                        type:"POST",
                        dataType:"JSON ",
                        data:{'evento':evento, 'zona':zona, 'taquilla':taquilla, 'ventanilla':ventanilla, 'usuario':usuario}
                    }).done(function(data) {
                        console.log(data);
                        location.href ="ModuloCobro?e="+evento+"&z="+zona+"&t="+taquilla+"&v="+ventanilla+"&u="+usuario;
                        
                    });
                }
            });
        });
        
    //}

});









/*document.addEventListener("DOMContentLoaded", function(event) {
    moment.locale('es');
    var upDate = function() {
      var elFecha = document.querySelector("#fecha");
      var elHora = document.querySelector("#hora");
      var nowDate = moment(new Date());
      elHora.textContent = nowDate.format('HH:mm:ss');
      elFecha.textContent =nowDate.format('dddd DD [de] MMMM [de] YYYY ');
    }
    setInterval(upDate, 1000);
});*/
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