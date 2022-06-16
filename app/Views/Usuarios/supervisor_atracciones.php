<?php 
if((!isset($_SESSION['Usuario'])) || (!isset($_SESSION['idUsuario']))) {
    header('Location: http://localhost/Espectaculares_Garcia/public/');
    exit();
}else{
?>

<!DOCTYPE html>
<html lang = "es">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content = "ie=edge"/>
        <title>Espectaculares García</title>
        <link href="CSS/cabecera_style.css" rel="stylesheet" type="text/css">
        <!--link href = "CSS/eventos_style.css" rel = "stylesheet" type="text/css"-->

        <link rel="stylesheet" href="../bootstrap/bootstrap.min.css" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <script src="../bootstrap/jquery.min.js"></script>
        <script src="../bootstrap/jquery.slim.min.js" crossorigin="anonymous"></script>
        <script src="../bootstrap/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="../bootstrap/jquery.dataTables.min.css"> 
        <link rel="stylesheet" href="../bootstrap/buttons.dataTables.min.css"> 
        <script src="../bootstrap/jquery-3.5.1.js"></script>
        <script src="../bootstrap/jquery.dataTables.min.js"></script>
        <script src="../bootstrap/dataTables.buttons.min.js"></script>
        <script src="../bootstrap/jszip.min.js"></script>
        <script src="../bootstrap/pdfmake.min.js"></script>
        <script src="../bootstrap/vfs_fonts.js"></script>
        <script src="../bootstrap/buttons.html5.min.js"></script>
        <script src="../bootstrap/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../bootstrap/bootstrap-icons.css">
        <link rel="stylesheet" href="../bootstrap/aos.css" />
        <script src="../bootstrap/aos.js"></script>
        <script src="../bootstrap/sweetalert.min.js"></script>
        <script src="../bootstrap/jquery.easing.min.js"></script>
        <!--link href="../bootstrap/sb-admin-2.min.css" rel="stylesheet"-->
        <script src="../bootstrap/moment-with-locales.min.js"></script>
        <script src="../bootstrap/jquery.loadingModal.js"></script>
        <link rel="stylesheet" href="../bootstrap/jquery.loadingModal.css">
        <!--link href="CSS/inicio_sesion_style.css" rel="stylesheet" type="text/css"-->
        <script src="JS/menu.js"></script>
    </head>
    <body style="background-image: url('./Img/mainbg.png'); background-repeat:repeat;">
        <nav class="navbar navbar-fixed-top tm_navbar negro" role="navigation">
            <a href="Menu_Principal_User"><img src = "Img/logo.png" style="width: 70px; height:7   0px;"/></a>
                <ul class="nav navbar-nav sf-menu">
                <li class="dropdown">
                    <a class="navbar-brand" href="#"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;<?php echo $_SESSION['Usuario']?></a>
                        <ul class="dropdown-submenu" id="subMenuCatalago">
                            <li><a href="CerrarSesion" id="button"><span>Salir</span></a></a></li>
                        </ul>
                </li>
            </ul>
        </nav>
        
        <div class="container-fluid" style="background-color: white;">
            <center><h4><b>ATRACCIONES A SUPERVISAR</b></h4></center>
                <form id="guardarSelect">
                    <select name="listarZonas" id="listarZonas" class="form-control">
                        <option value="">Elige una zona</option>
                        <?php foreach($Zonas as $z){?>
                            <option value="<?php echo $z->idZona?>"><?php echo $z->nZona?></option>
                        <?php }?>
                    </select><br>
                    <div id="opcionesAtracciones"><br> </div>
                    <br>
                    <!--button type="button" class="btn btn-danger">Cancelar</button-->
                    <!--button type="button" class="btn btn-success guardarSel" name="guardarSel" id="guardarSel">Continuar</button-->
                </form>           
        </div>

        <!--********************** Modal para pedir los datos **************************-->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="guardarDAtracc">
                        <input type="hidden" name="usuario" id="usuario" value="<?php echo $_GET['t']?>">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Ingresa el número de personas:</label>
                                <input type="text" class="form-control" name="nperson" id="nperson">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="badge badge-danger" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="badge badge-success guardarDatos" >Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--********************** Modal para pedir los datos **************************-->


        <!--***************** MODAL DE CARGA ****************-->
        <div class="modal fade bd-example-modal-lg" id="modalCarga" data-backdrop="static" data-keyboard="false" tabindex="-1">
            <div class="modal-dialog modal-sm">
                <div class="modal-content" style="width: 48px">
                    <span class="fa fa-spinner fa-spin fa-3x"></span>
                </div>
            </div>
        </div>
        <style>
            .bd-example-modal-lg .modal-dialog{display: table; position: relative; margin: 0 auto; top: calc(50% - 24px);}
            .bd-example-modal-lg .modal-dialog .modal-content{background-color: transparent; border: none;}
        </style>
        <!--***************** MODAL DE CARGA ****************-->
    </body>
</html>

<script type="text/javascript">
    var nombreA ='';
    var idA='';
    var fecha ='';

    $(document).on('change', '#listarZonas', function(event) {
        mueveReloj();
        var id = $("#listarZonas option:selected").val();

        $.ajax({
            beforeSend:function () {//antes de cargar la info, abrimos una ventana de carga
                modal();//funcion que abre la ventana de carga
            },
            type: 'POST',
            url: 'consultarAtracc',
            data:{'idZona':id},
            dataType: 'JSON',
            error(jqXHR, textStatus, errorThrown){
                alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
                modalCerrar();
            },
        }).done(function(data){
            $("#opcionesAtracciones").html('');
            console.log(data);
            var html='';
            for(var i = 0;i<data.msj.length; i++){
                nombreA = data.msj[i]["Nombre"];
                //tiempo = data.msj[i]["Tiempo"];
                html +='<button type="button" id="atracSelect" class="btn btn-outline-primary atracSelect" data-toggle="modal" data-target="#modal_Devolucion" style="margin:5px;" value="'+data.msj[i]["idAtraccion"]+'">'+
                            '<img src="https://fenapo.mx/wp-content/uploads/2019/07/Captura-de-pantalla-2019-07-05-a-las-10.40.36.png" alt="" height="200px" width="250px"><br>'+
                            '' + data.msj[i]["Nombre"] + ''+
                        '</button>';
            }
            
            
            $("#opcionesAtracciones").html(html);
            modalCerrar();
        });
        //$('#servicioSelecionado').val($("#servicio option:selected").text());
    });



    var hora= '00:01:00';

    // Dividir en partes
    var parts = hora.split(':');

    // Calcular minutos (horas * 60 + minutos)
    var minutos = parseInt(parts[0]) * 60 + parseInt(parts[1]);
    var segundos = minutos * 60 + parseInt(parts[2]);

    var medios = segundos/2;

    var mitadM = parseInt(medios);

    var mitadMm = mitadM/2;
    var mm = parseInt(mitadMm);

    window.onload = updateClock;
    totalTime = segundos;

    function updateClock(){

        //$('#countdown').innerHTML = totalTime;

        if(totalTime == 0){
            //$('#reloj').html(totalTime).css("color", "black");
            console.log('juego terminado');

        //}else if((totalTime <= mitadM) && (mitadM < mm)){
        }else if((totalTime <= mitadM)){
            //$('#reloj').html(totalTime).css("color", "yellow");
            $('.bcolor').css("background", "yellow");
            $('.atracSelect').css("background", "yellow");
            console.log(totalTime -= 1);
            setTimeout("updateClock()",1000);

        //}else if((totalTime <= mm) && (mm <= 0) ){
        }else if(totalTime < mm ){            
           // $('#reloj').html(totalTime).css("color", "red");
            $('.bcolor').css("background", "red");
            $('.atracSelect').css("background", "red");
            console.log(totalTime -= 1);
            setTimeout("updateClock()",1000);

        }else{
            //$('#reloj').html(totalTime).css("color", "green");
            $('.bcolor').css("background", "green");
            $('.atracSelect').css("background", "green");
            console.log(totalTime -= 1);
            setTimeout("updateClock()",1000);

        }




        /*if(totalTime == mdeios){
            console.log('si entro');
            console.log(totalTime -= 1);
            setTimeout("updateClock()",1000);
        }else{
            console.log(totalTime -= 1);
            setTimeout("updateClock()",1000);
        }*/

        /*if(totalTime == 0){
            alert('Final');
        }else{
            console.log(totalTime -= 1);
            setTimeout("updateClock()",1000);
        }*/
    }








    $(document).on('click', '.atracSelect', function(){
        idA = $(this).val();
        console.log(nombreA+idA);
        $('#exampleModalCenter').modal('show');
    });

    $(document).on('click', '.guardarDatos', function(){
        var c = $('#nperson').val();
        var usuario = $('#usuario').val();
        //alert(fecha);
        $.ajax({
            beforeSend:function () {//antes de cargar la info, abrimos una ventana de carga
                //inicia_carg();//funcion que abre la ventana de carga
            },
            type: 'POST',
            url: 'guardarDat',
            data:{'idAtraccion':idA, 'numPerso':c, 'usuario':usuario, 'fecha':fecha},
            dataType: 'JSON',
            error(jqXHR, textStatus, errorThrown){
                alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            },
        }).done(function(data){
            console.log(data);
            if(data.msj == true){
                alert('Agregado Correctamente');
                $('#exampleModalCenter').hide();
                //location.reload();
            }else{

            }
        });
    });

    /********************************** Iniciar y Cerrar Carga de Pagina *********************************/
    function modal(){$('#modalCarga').modal('show');}

    function modalCerrar(){$('#modalCarga').modal('hide');}
    /********************************** Iniciar y Cerrar Carga de Pagina *********************************/

    /********************************** Fecha y Hora *****************************************************/
    function mueveReloj(){
        var d = new Date();
        var month = d.getMonth()+1;
        var day = d.getDate();
        var output = d.getFullYear() + '-' +((''+month).length<2 ? '0' : '') + month + '-' +((''+day).length<2 ? '0' : '') + day;
        momentoActual = new Date()
        hora = momentoActual.getHours()
        minuto = momentoActual.getMinutes()
        segundo = momentoActual.getSeconds()
        str_segundo = new String (segundo)
        if (str_segundo.length == 1)
        segundo = "0" + segundo
        str_minuto = new String (minuto)
        if (str_minuto.length == 1)
        minuto = "0" + minuto
        str_hora = new String (hora)
        if (str_hora.length == 1)
        hora = "0" + hora
        horaImprimible = output+" "+ hora + ":" + minuto + ":" + segundo
        //console.log(output+" "+horaImprimible);
        //document.form_reloj.reloj.value = horaImprimible
        setTimeout("mueveReloj()",1000);
       // $('#fecha').val(horaImprimible);
       fecha = horaImprimible;
       //console.log(fecha);
    }
    /********************************** Fecha y Hora *****************************************************/

    //dato a convertir
   // console.log('soy tiempo'+tiempo);
    


var arreglo = [];

   /*$('#tAtt').on('click','tr',function(){
        var dato = $(this).attr('id');//obtiene el id del tr
        //console.log(dato);

        var idAtr = $('.atta').val();
        arreglo.push({'idZona':dato,'idAtraccion':idAtr});
        console.log(arreglo);
    });*/


// si funciona
    /*$(document).on('click','.attra',function(){
        
        idAttrra= $(this).val();
        //console.log(idAttrra);
        idZona = $(this).parents('tr').attr('id');

        if($(this).is(':checked')){
            arreglo.push({'idZona':idZona,'idAtraccion':idAttrra});
        }else{
            arreglo.forEach(function(data,index){
                if(idZona === data.idZona && idAttrra === data.idAtraccion){
                    arreglo.splice(index,1);
                }
            });
        }
        console.log(arreglo);
    });*/



//si funciona
    /*$(document).on('click', '.guardarSel', function(){
        $.ajax({
            beforeSend:function () {//antes de cargar la info, abrimos una ventana de carga
                //inicia_carg();//funcion que abre la ventana de carga
            },
            type: 'POST',
            url: 'agregarAttSupervisar',
            data:{'arreglo':arreglo},
            dataType: 'JSON',
            error(jqXHR, textStatus, errorThrown){
                alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            },
        }).done(function(data){
            console.log(data);
        });
    });*/

    </script>

<?php }?>