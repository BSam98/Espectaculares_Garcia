//$(document).ready(function(){
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
        iniciarCarga();
        
        var evento = $("#eventoId").val();

        $.ajax({
            type: "POST",
            url: 'eligeZona',
            data: {'evento':evento},
            dataType: 'JSON',
            error: function(jqXHR, textStatus, errorThrown){
                alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
                cerrarCarga();
            },
        }).done(function(data){
            var html='';
            html+='<option value="opcion" selected>Elige una Zona</option>';
            for(var i = 0;i<data.msj.length; i++){
               html += '<option value="'+data.msj[i]['idZona']+'">'+data.msj[i]['Nombre']+'</option>';
            }
            $("#select_Zona").html(html);
            cerrarCarga();
        });
    }

    $(document).on("change", "#select_Zona", function(){
        var atracciones_Html='';
        var zona = ($("#select_Zona option:selected").val());

        if(zona != "opcion"){
            $.ajax({
                beforeSend: function(){
                    iniciarCarga()
                },
                type: "POST",
                url: 'Atracciones_Zona',
                data: {'idZona':zona},
                dataType: 'JSON',
                error: function(jqXHR, textStatus, errorThrown){
                    alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
                    cerrarCarga();
                },
            }).done(function(data){
                if(data.respuesta){
                    for(var i=0; i<data.msj.length; i++){
                        zona += '<option value="'+data.msj[i]['idAtraccionEvento']+'">"'+data.msj[i]['Nombre']+'"</option>' 
                    }
                    $("#atraccion").html(zona);
                    cerrarCarga();
                }
            });
        }
    });
    
    $("#iniciar_Turno_Validador").click(function(){
        var idAtraccionEvento = ($("#atraccion option:selected").val());
        var idUsuario = $("#idUsuario").val();

        var d = new Date();

        var fecha = d.toISOString().split('T')[0] +" "+d.toLocaleTimeString()+".000";
        
        
        if(idAtraccionEvento === undefined){   
            alert('Seleccione una atraccion para iniciar sesion.');
        }else{
            $.ajax({
                beforeSend: function(){
                    iniciarCarga();
                },
                type: "POST",
                url: 'Iniciar_Turno_Validador',
                data: {'fecha':fecha,'idAtraccionEvento':idAtraccionEvento,'idUsuario':idUsuario},
                dataType: 'JSON',
                error: function(jqXHR, textStatus, errorThrown){
                    alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
                    cerrarCarga();
                },
            }).done(function(data){
                if(data.respuesta){
                    cerrarCarga();
                    //window.location.replace('http://localhost/Espectaculares_Garcia/public/Validacion_Interfaz');
                    window.location.href='http://localhost/Espectaculares_Garcia/public/Validacion_Interfaz'+'?dato='+data.msj;
                }
                else{
                    alert(data.msj);
                    cerrarCarga();
                }
            });
        }
        
    });

//});