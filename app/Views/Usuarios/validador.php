<fieldset id="fieldset">
    <center><h2><i class="fa fa-star" aria-hidden="true"></i>&nbsp;VALIDAR</h2></center><hr>
    <div class="container">
    <h3>Atracción:"Nombre de la atracción"</h3>

    <script>

        $(document).ready(function(){
            $('.my_button').click(function() {
                var time = $(this).attr("value");
                var mins = 2;
                var total =  parseInt(mins)+ parseInt(time);
                alert(total);
            })
        });

        //set minutes
        var mins = 2;
  
        //calculate the seconds
        var secs = mins * 60;
  
        //countdown function is evoked when page is loaded
        function countdown() {
            setTimeout('Decrement()', 60);
        }
  
        //Decrement function decrement the value.
        function Decrement() {
            if (document.getElementById) {
                minutes = document.getElementById("minutes");
                seconds = document.getElementById("seconds");
  
                //if less than a minute remaining
                //Display only seconds value.
                if (seconds < 59) {
                    seconds.value = secs;
                }
  
                //Display both minutes and seconds
                //getminutes and getseconds is used to
                //get minutes and seconds
                else {
                    minutes.value = getminutes();
                    seconds.value = getseconds();
                }
                //when less than a minute remaining
                //colour of the minutes and seconds
                //changes to red
                if (mins < 1) {
                    minutes.style.color = "red";
                    seconds.style.color = "red";
                }
                //if seconds becomes zero,
                //then page alert time up
                if (mins < 0) {
                    alert('time up');
                    minutes.value = 0;
                    seconds.value = 0;
                }
                //if seconds > 0 then seconds is decremented
                else {
                    secs--;
                    setTimeout('Decrement()', 1000);
                }
            }
        }
  
        function getminutes() {
            //minutes is seconds divided by 60, rounded down
            mins = Math.floor(secs / 60);
            return mins;
        }
  
        function getseconds() {
            //take minutes remaining (as seconds) away 
            //from total seconds remaining
            return secs - Math.round(mins * 60);
            
        }
    </script>
<!-- onload function is evoke when page is load -->
<!--countdown function is called when page is loaded -->
  
<body onload="countdown();">
    <div style="font-size: 20px;">
        Tiempo de Espera:
        <input id="minutes" type="text" style="width: 30px; border: none; font-size: 20px; font-weight: bold; color: black;">minutos<font size="5"> :</font>
        <input id="seconds" type="text" style="width: 30px; border: none; font-size: 20px; font-weight: bold; color: black;">segundos
    </div>
    <button type="button" class="btn btn-warning my_button" value="2">Tiempo Extra</button>
<hr>
        <div class="input-group mb-3">
            <h5>Tarjeta:&nbsp;</h5>
                <div class="input-group-append">
                    <input type="text" class="form-control" name="tarjetaVal" id="tarjetaVal">&nbsp;
                </div>
                <button type="button" class="btn btn-success" id="validar">Validar</button>               
        </div>       
        <div class="alert alert-primary" role="alert" style="display: none;">
            Pago Generado: <br>
            Saldo Restante:
        </div>
       
    </div>
</fieldset>
<script>
    $(document).ready(function(){
        $('#validar').click(function(){
            $('.alert').show()
        })
    });
</script>