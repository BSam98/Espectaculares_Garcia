<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Nav Item - LOGO -->
        <li class="nav-item active">
            <div class="sidebar-brand-icon">
                <center><img src = "Img/logo.png" style="width: 70%;"/></center>
            </div><br>
        </li>
        <!--Fehca y Hora-->
        <div class="sidebar-heading">
            <div class="nowDateTime" style="font-family: monospace; text-align: center; color:white; font-size:15px;">
                <p><span id="fecha"></span><br><span id="hora"></span></p>
            </div>
        </div>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <div class="sidebar-heading" style="font-family: monospace; font-size:18px;">
            Datos del Usuario:
            <!--li class="nav-item"-->
                <a class="nav-link navbar-brand" aria-expanded="true" aria-controls="collapseTwo" style="font-family: monospace; color:white; font-size:14px;">
                    <i class="fa fa-user" aria-hidden="true"></i>&nbsp;
                    <?php echo session('Usuario');?>
                </a>
            <!--/li-->
        </div>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <!-- Heading -->
        <div class="sidebar-heading" style="font-family: monospace; font-size:18px;">
            Datos del Punto de Venta:
            <?php foreach($Turno as $d){?>
                <a class="nav-link navbar-brand" aria-expanded="true" aria-controls="collapseTwo" style="font-family: monospace; color:white; font-size:14px;">
                    <?php echo 'Evento:&nbsp;'.$d->NombreEvento.'<br>Zona:&nbsp;'.$d->NombreZona.'<br>Taquilla:&nbsp;'.$d->NombreTaquilla.'<br>Ventanilla:&nbsp;'.$d->NombreVentanilla?>
                </a>
            <?php }?>
            <center><a class="nav navbar-brand btn btn-danger" href="ReporteVenta" id="cerrarCaja" style="font-family: monospace; color:white; font-size:14px;">
                &nbsp;Cerrar Caja&nbsp;<i class="fa fa-times" aria-hidden="true"></i>
            </a></center>
        </div><br>
        <!-- Nav Item - Pages Collapse Menu -->
        
        <!--div class="sidebar-heading" style="font-size:15px;">
            Datos de la Taquilla
            <li class="nav-item">
                <a class="nav-link navbar-brand" href="ReporteVenta" id="cerrarCaja">
                    <i class="fa fa-user" aria-hidden="true"></i>&nbsp;
                    Cerrar Caja
                </a>
            </li>
        </div-->
        <!--TICKET-->
        <!--li class="nav-item">
            <a class="nav-link navbar-brand" href="Ticket" target="_blank">
                Imprimir Ticket
            </a>
        </li-->
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
        <!-- Sidebar Toggler (Sidebar) -->
        <!--div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div-->
    </ul>
    <!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column" style="overflow-x:hidden; overflow-y:hidden">
    <!-- Main Content -->
    <div id="content" class="container-fluid">
        <!-- Begin Page Content -->
            <!-- Content Row -->
        <div class="row">
            <?php date_default_timezone_set('America/Mexico_City'); $fecha = date("Y-m-d");?>
            <input type="hidden" name="fechaHoy" id="fechaHoy" value="<?php echo $fecha?>">

            <!--PUNTO DE VENTA-->
            <div class="container" style="background-color: white;" id="puntoVenta"><br><!--data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" -->
                <!--div class="row"-->
                    <form id="formPuntoVenta">
                    <input type="text" name="arregloP" id="arregloP" value="">
                    <input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo session('idUsuario')?>">
                    <?php date_default_timezone_set('America/Mexico_City'); $fecha = date("Y-m-d");?>
                        <input type="hidden" name="fechaHoy" id="fechaHoy" value="<?php echo $fecha?>">
                        <div class="input-group">
                            <div class="col-xs-6 col-sm-4">
                                <h4><i class="fa fa-credit-card" aria-hidden="true"></i>&nbsp;Tarjeta:</h4>
                                <input type="text" class="form-control" name="tarjetaAdd" id="tarjetaAdd" onblur="ingresarTarjeta()">
                            </div>
                            <div class="col-xs-6 col-sm-4">
                                <h4><i class="fa fa-retweet" aria-hidden="true"></i>&nbsp;Recarga:</h4>
                                <input class="form-control" type="number" name="recargaAdd" id="recargaAdd" onblur="ingresarRecarga()">
                            </div>
                            <!-- Optional: clear the XS cols if their content doesn't match in height -->
                            <div class="col-xs-6 col-sm-4">
                                <a href="#" id="celular" class="btn btn-success">Tarjeta Electónica</a>  
                            </div>
                        </div>

                        <!--div class="card-wrapper col-sm-4 col-md-3 col-lg-3" style="display: flex; flex-direction: column;"-->
                        <label for="">Elige una promocion</label>
                        <select name="promocionn" id="promocionn" class="form-control">
                            <option value="">Elige una promoción</option>
                                <?php foreach($Pulsera as $key => $pu){
                                        if($pu->fechaI==$fecha){?>
                                            <option value="<?= $pu->idPulseraMagica?>"><?= $pu->Nombre?></option>
                                    <?php }
                                    }?>
                        </select>
                        <input type="text" name="valorSelect" id="valorSelect" value="">
                        <div id="log"></div>
                    <!--/div>
                    <div class="card-wrapper col-sm-12 col-md-8 col-lg-8"-->
                        <div class="table table-responsive table-wrapper" style="color: black;"><br>
                            <table>
                                <thead>
                                <th style="width: 35%;"><center><i class="fa fa-bars" aria-hidden="true"></i>&nbsp;Descripcion</center></th>
                                <th style="width: 35%;"><center><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"width="30px" height="30px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
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
                                    /></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>&nbsp;Precio</center></th>
                                <th style="width: 35%;"><center><svg id="Layer_1" style="width:30px; height:30px;" version="1.1" viewBox="0 0 30 30" xml:space="preserve"><style type="text/css"> .st0{fill:#FD6A7E;} .st1{fill:#17B978;} .st2{fill:#8797EE;} .st3{fill:#41A6F9;} .st4{fill:#37E0FF;}
                                    .st5{fill:#2FD9B9;}.st6{fill:#F498BD;}.st7{fill:#FFDF1D;} .st8{fill:#C6C9CC;}</style><path class="st4" d="M24.9,24.1l-0.4-5c-0.4-4.5-2.8-7.5-6.5-10l1-6h-5l-0.8,1H11l0.6,3.2l4.4,0.6c0.4,0.1,0.6,0.4,0.6,0.7  c0,0.3-0.3,0.6-0.7,0.6l-4-0.1c-3.7,2.5-6.1,5.5-6.4,10l-0.4,5C4.5,24.3,4,24.8,4,25.5C4,26.3,4.7,27,5.5,27h19  c0.8,0,1.5-0.7,1.5-1.5C26,24.8,25.5,24.3,24.9,24.1z M11.4,17.6l2.2-0.3l1-2c0.2-0.3,0.6-0.3,0.8,0l1,2l2.2,0.3  c0.4,0.1,0.5,0.5,0.3,0.8L17.3,20l0.4,2.2c0.1,0.4-0.3,0.7-0.7,0.5l-2-1l-2,1c-0.3,0.2-0.7-0.1-0.7-0.5l0.4-2.2l-1.6-1.6  C10.9,18.1,11,17.7,11.4,17.6z"/></svg>Créditos</center></th>
                                <th style="width: 15%;"></th>
                                </thead>
                                <tbody id="productos">
                                    <tr>
                                        <td>
                                            <div id="tarjeta">
                                                <input type="number" name="tarjetaa" id="tarjetaa" value="" style="background : inherit; border:none; text-align:center;" disabled>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr id="recargaTr" style="display: none;">
                                        <td>
                                            <label name="tituloRec" id="tituloRec">Recarga</label>
                                        </td>   
                                        <td>
                                            <div id="recarga">
                                                <input type="number" class="monto" name="recargaP" value="" id="recargaP" style="background : inherit; border:none; text-align:center;" disabled>
                                            </div>
                                        </td> 
                                        <td>
                                            <div id="recargaC">
                                                <input type="number" name="recargaCred" id="recargaCred" value="" style="background : inherit; border:none; text-align:center;" disabled>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div id="promos"></div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!--/div-->

                        <div class="table table-responsive">
                            <table class="table table-bordered" style="color:black">
                                <th><svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z"/>
                                        <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"/>
                                        <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z"/>
                                        <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"/></svg>&nbsp;Forma de Pagos</th>
                                <th><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"width="30px" height="30px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
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
                                        /></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>&nbsp;Total:</th>
                                <tbody>
                                    <tr>
                                        <td style="padding-left: 30px;">
                                            <input type="radio" name="rad" value="1" style="width: 8%; height: 1.5em;">&nbsp;Efectivo <br>
                                            <input type="radio" name="rad" value="2" style="width: 8%; height: 1.5em;">&nbsp;Tarjeta de Débito <br>
                                            <input type="radio" name="rad" value="3" style="width: 8%; height: 1.5em;">&nbsp;Tarjeta de Crédito
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <label>Total: $</label>
                                                <input class="form-control" type="number" name="total" id="total" value="">
                                            </div>
                                            <div class="form-group" style="display: none;" id="efectivo" >
                                                <label>Efectivo:</label>
                                                <input type="number" class="form-control" name="efectivo" placeholder="Ingresa la cantidad">
                                            </div>
                                            <!--button class="btn btn-success float-right" onclick="myFunction()" >Cobrar</button-->
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> 
                    <!--/form-->
                <!--/div-->
                <input type="button" id="cobrar" value="Cobrar" class="btn btn-success">
                </form>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
    </div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->


<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">


<script>
    var prev;
    var previous=[];

    $("select[name=promocionn]").focus(function () {
        // Store the current value on focus, before it changes
        prev=this.value;
    }).change(function() {
        // Do soomething with the previous value after the change
        document.getElementById("log").innerHTML = "<b>Previous: </b>"+prev;
        
        previous.push(this.value);
        if (previous.length) {
            alert('Yo soy'+JSON.stringify(previous));
            $('#arregloP').val(previous);
        }
    });


//detecta la tarjeta
    $('#tarjetaAdd').change(function () {
        alert(valor_inicial = $(this).val());
        $('#tarjetaa').val(valor_inicial);
    });
//detectar recarga
    $('#recargaAdd').change(function () {
        alert(valor_recarga = $(this).val());
        const creditos = 1;
        const pesos = 0.80;
        r = (valor_recarga * creditos)/pesos;
        $('#recargaP').val(valor_recarga);
        $('#recargaCred').val(r);
        $('#recargaTr').show();
        sumar();
    });

//cambio de pagina
    $('#cerrarCaja').click(function(){
        //$('#puntoVenta').hide();
    });

    //reloj
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
    //alerta pide numero
    $('#celular').click(function(){
        swal("Ingresa el teléfono", {
            content: "input",
        })
        .then((value) => {
            //swal(`You typed: ${value}`);
            swal("Agregado correctamente", {
                icon: "success",
            });
        });
    });    
    
    //$(document).on('click','.Promo', function(){
    $(document).on('change', '#promocionn', function(){
        var fecha = '<?php echo $fecha;?>'
        //alert(fecha);
        var tarjeta = $('#tarjetaAdd').val();
        if(tarjeta == ''){
            alert('Ingresa la tarjeta por favor');
        }else{
            var promocion = $(this).val();
            $('#valorSelect').val(promocion);
            //alert(promocion);

            $.ajax({
                type:"POST",
                url:"Productos",
                data:{'promocion':promocion},
                dataType: 'JSON',
                error: function(jqXHR, textStatus, errorThrown){
                    alert('Se produjo un error: a'+ errorThrown + ' ' + textStatus);
                },
            }).done(function(data){
                var html ='';
                for(var i = 0;i<data.msj.length; i++){
                    if(data.msj[i]['fechaI']==fecha){
                        html += '<tr id="'+i+'">'+
                                    '<td style="padding:0px;">'+data.msj[i]['Nombre']+'</td>'+
                                    '<td style="padding:0px;"><input type="number" name="precioP" id="precioP" disabled  style="background : inherit; border:none; text-align:center;" class="monto" value='+data.msj[i]['Precio']+'></td>'+
                                    '<td style="padding:0px;"></td>'+
                                    '<td style="padding:0px;"><a href="#eliminarPromo'+data.msj[i]['idPulseraMagica']+'" class="eliminar" data-toggle="modal"><i class="fa fa-trash btn btn-danger" aria-hidden="true"></i></a></td>'
                                '</tr>';
                    }
                }
                //$("#productos").html(html);
                $("#productos").append(html);
                sumar();
                
            });
        }
    });
    
    

//datos formulario para cobrar
    $("#cobrar").click( function(){
        //alert($('#formPuntoVenta').serialize());
        $.ajax({
        type: "POST",
        url: "guardarVentas",
        data: $('#formPuntoVenta').serialize(),
        dataType: "JSON",
        error(jqXHR, textStatus, errorThrown){
                alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
        },
        }).done(function(data){
            console.log('Si llego');
            console.log(data.msj);
            /*    alert('Venta Satisfactoria');
                location.reload();*/
        });
    });

//tipo de pago
    function myFunction() {
        var opcion = $('input:radio[name=rad]:checked').val();
        if(opcion==1){
            var efectivo = document.getElementById('efectivo').value;
            var total = document.getElementById('total').value;
            if(efectivo >= total){
                var cambio = efectivo - total;
                $('#cambio').show().val(cambio);
                alert('Su cambio es de: ' + cambio);
            }else{
                alert('Dinero insuficiente');
            }
        }else if(opcion==2 || opcion==3){alert('Favor de Ingresar la Tarjeta');}
    }

//VALIDAR RADIOBUTTONS
        $("input[name=rad]").click(function () {   
            var opcion = $('input:radio[name=rad]:checked').val();
            if(opcion==1){
                $( "#efectivo" ).show();
            }else{
                $( "#efectivo" ).hide();
            }
        });
        
//sumar precios
    function sumar() {
        var total = 0;
        $(".monto").each(function() {
            if (isNaN(parseFloat($(this).val()))) {
            total += 0;
            } else {
            total += parseFloat($(this).val());
            }
        });
        $('#total').val(total);
    }
//sumar creditos
    function credi() {
        var total = 0;
        $(".credi").each(function() {
            if (isNaN(parseFloat($(this).val()))) {
            total += 0;
            } else {
            total += parseFloat($(this).val());
            }
        });
        $('#totalc').val(total);
    }
</script>
    