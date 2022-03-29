<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

<div class="container" style="background-color: white;" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000"><br>
<!--hr>
    <center><h2>PUNTO DE VENTA</h2></center>
    <hr-->
    <div class="pull-right">
        <script src="https://momentjs.com/downloads/moment-with-locales.min.js"></script>
        <div class="pull-right">
            <div class="nowDateTime" style="text-align: right;">
                <p><span id="fecha"></span>
                <span id="hora"></span></p>
            </div>
        </div>
    </div>  

    <div class="row">
        <div class="col-xs-6 col-sm-4">
            <label for=""><i class="fa fa-credit-card" aria-hidden="true"></i>&nbsp;Tarjeta:</label>
            <input type="text" class="form-control" name="tarjeta" id="tarjeta" onblur="ingresarTarjeta()">
        </div>
        <div class="col-xs-6 col-sm-4">
            <label for=""><i class="fa fa-retweet" aria-hidden="true"></i>&nbsp;Recarga</label>
            <input class="form-control" type="number" name="recarga" id="recarga" placeholder="Ingrese la cantidad">
        </div>
        <!-- Optional: clear the XS cols if their content doesn't match in height -->
        <div class="col-xs-6 col-sm-4">
            <a href="#" id="celular" class="btn btn-success">Tarjeta Electónica</a>  
        </div>
    </div>
<br>
    <div class="row">
        <div class="card-wrapper col-sm-4 col-md-3 col-lg-3 aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000" style="display: flex; flex-direction: column;">
            <div class="table table-responsive">
                <table>
                    <th><i class="fa fa-gift" aria-hidden="true"></i>&nbsp;Promociones</th>
                    <tbody style="height: 200px; overflow-y: auto; overflow-x: hidden; display: block;">
                        <td>
                            <?php foreach($Pulsera as $key => $pu) :?>
                                <button class="btn btn-success Promo" style="margin: 2px; padding:0px;" value="<?= $pu->idPulseraMagica?>"><?= $pu->Nombre?></button><br>
                            <?php endforeach?>  
                        </td>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-wrapper col-sm-12 col-md-8 col-lg-8 aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000" style="display: flex; flex-direction: column;">
            <div class="table table-responsive">
                <table>
                    <th style="width: 30%;"><center><i class="fa fa-bars" aria-hidden="true"></i>&nbsp;Descripcion</center></th>
                    <th style="width: 30%;"><center><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"width="30px" height="30px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
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
                    <th style="width: 30%;"><center><svg id="Layer_1" style="width:30px; height:30px;" version="1.1" viewBox="0 0 30 30" xml:space="preserve"><style type="text/css"> .st0{fill:#FD6A7E;} .st1{fill:#17B978;} .st2{fill:#8797EE;} .st3{fill:#41A6F9;} .st4{fill:#37E0FF;}
	                    .st5{fill:#2FD9B9;}.st6{fill:#F498BD;}.st7{fill:#FFDF1D;} .st8{fill:#C6C9CC;}</style><path class="st4" d="M24.9,24.1l-0.4-5c-0.4-4.5-2.8-7.5-6.5-10l1-6h-5l-0.8,1H11l0.6,3.2l4.4,0.6c0.4,0.1,0.6,0.4,0.6,0.7  c0,0.3-0.3,0.6-0.7,0.6l-4-0.1c-3.7,2.5-6.1,5.5-6.4,10l-0.4,5C4.5,24.3,4,24.8,4,25.5C4,26.3,4.7,27,5.5,27h19  c0.8,0,1.5-0.7,1.5-1.5C26,24.8,25.5,24.3,24.9,24.1z M11.4,17.6l2.2-0.3l1-2c0.2-0.3,0.6-0.3,0.8,0l1,2l2.2,0.3  c0.4,0.1,0.5,0.5,0.3,0.8L17.3,20l0.4,2.2c0.1,0.4-0.3,0.7-0.7,0.5l-2-1l-2,1c-0.3,0.2-0.7-0.1-0.7-0.5l0.4-2.2l-1.6-1.6  C10.9,18.1,11,17.7,11.4,17.6z"/></svg>Créditos</center></th>
                    <th></th>
                    <tbody id="productos">
                        <div id="promos"></div>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="table table-responsive">
            <table class="table table-bordered">
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
                                <input class="form-control" disabled type="number" name="total" id="total">
                            </div>
                            <div class="form-group" style="display: none;" id="efectivo" >
                                <label>Efectivo:</label>
                                <input type="number" class="form-control" name="efectivo" placeholder="Ingresa la cantidad">
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <button class="btn btn-success" onclick="myFunction()">Cobrar</button>
        </div> 

    </div>

    <script>
    $('#tarjeta').change(function () {
        alert(valor_inicial = $(this).val());
        $('#valor1').val(valor_inicial);
    });
    $('#recarga').change(function () {
        alert(valor_inicial = $(this).val());
        const creditos = 1;
        const pesos = 0.80;
        r = (valor_inicial * creditos)/pesos;
        $('#credito').val(r);
    });
    $(document).on('click','.Promo', function(){
        var tarjeta =$('#tarjeta').val();
        var recarga =$('#recarga').val();
        const creditos = 1;
        const pesos = 0.80;
        r = (recarga * creditos)/pesos;
        if(tarjeta==''){
            alert('Ingresa la tarjeta por favor');
        }else{

        if(recarga==''){

        }else{$('#recargaa').show();}

        var costo = $(this).val();
        alert(costo);
            $.ajax({
                type:"POST",
                url:"Productos",
                data:{'costo':costo},
                dataType: 'JSON',
                error: function(jqXHR, textStatus, errorThrown){
                    alert('Se produjo un error: a'+ errorThrown + ' ' + textStatus);
                },
            }).done(function(data){
                //console.log(data.msj);
                var html =''; var html2 ='';
                html += '<tr>'+
                        '<td colspan="3">'+tarjeta+'</td></tr>'+
                        '<tr style="display:none;" id="recargaa"><td>Recarga: </td><td>'+recarga+'</td><td>'+r+'</td></tr>';
                for(var i = 0;i<data.msj.length; i++){
                    html += '<tr><td>'+data.msj[i]['Nombre']+'</td>'+
                                '<td>'+data.msj[i]['Precio']+'</td>'+
                                '<td></td>'+
                                '<td><a href="#eliminarPromo'+data.msj[i]['idPulseraMagica']+'" class="eliminar" data-toggle="modal"><i class="fa fa-trash btn btn-danger" aria-hidden="true"></i></a></td>'
                            '</tr>';
                }
                html2 += '<tr><th>Total</th></tr>';
                //$("#promos").append(html);
                $("#promos").append(html);

            });
        }
    });
    </script>










<style>
td {
  overflow: hidden;
  white-space: nowrap;
}
th {
  background-color: #ffffff;
  padding: 0px;
  position: -webkit-sticky;
  position: sticky;
  top: 0px;
}
</style>
    
        
        
    <form action="" method="POST" enctype="multipart/form-data">
    <div>
        <table>
            <th></th>
            <th id="tarEle" style="display: none; padding-left: 30px;"><h5><i class="fa fa-credit-card" aria-hidden="true"></i>&nbsp;Tarjeta Electrónica</h5></th>
            <th id="tarjetaf" style="padding-left: 30px;"><h5><i class="fa fa-credit-card" aria-hidden="true"></i>&nbsp;Tarjeta</h5></th>
            <th style="padding-left: 30px;"><h5><i class="fa fa-retweet" aria-hidden="true"></i>&nbsp;Recargar</h5></th>
            
            <tbody>
                <tr>
                    <td>
                        <button type="button" class="btn btn-info btn-square-md" name="electronica" id="electronica"><h5>Tarjeta <br> Electronica</h5></button>
                    </td>
                    <td id="tarjetaElectron" style="display: none;padding-left: 30px;">
                        <div class="input-group mb-3">
                            <a href="#" id="tagA" class="btn btn-danger">x</a>
                                <div class="input-group-append">
                                    <input type="number" class="form-control" name="celular" placeholder="Ingrese un teléfono">
                                </div>
                        </div>
                    </td>
                    <td id="tarjetafisica" style="padding-left: 30px;">
                        <input type="text" class="form-control" name="tarjeta" id="tarjeta" onblur="ingresarTarjeta()">
                    </td>
                    <td style="padding-left: 30px;">
                        <input class="form-control" type="number" name="recarga" id="recarga" placeholder="Ingrese la cantidad">
                    </td>
                </tr>
            </tbody>
        </table>
        <hr>
    </div>
            <div class="table table-responsive" style="height: 300px; width: auto; overflow-y:scroll;">
                <table class="table">
                    <th><h5><i class="fa fa-gift" aria-hidden="true"></i>&nbsp;Promociones</h5></th>
                    <th><h5><i class="fa fa-bars" aria-hidden="true"></i>&nbsp;Descripción</h5></th>
                    <th><h5><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"width="30px" height="30px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
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
                        /></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>&nbsp;Precio</h5></th>
                    <th><h5><svg id="Layer_1" style="width:30px; height:30px;" version="1.1" viewBox="0 0 30 30" xml:space="preserve"><style type="text/css"> .st0{fill:#FD6A7E;} .st1{fill:#17B978;} .st2{fill:#8797EE;} .st3{fill:#41A6F9;} .st4{fill:#37E0FF;}
	                    .st5{fill:#2FD9B9;}.st6{fill:#F498BD;}.st7{fill:#FFDF1D;} .st8{fill:#C6C9CC;}</style><path class="st4" d="M24.9,24.1l-0.4-5c-0.4-4.5-2.8-7.5-6.5-10l1-6h-5l-0.8,1H11l0.6,3.2l4.4,0.6c0.4,0.1,0.6,0.4,0.6,0.7  c0,0.3-0.3,0.6-0.7,0.6l-4-0.1c-3.7,2.5-6.1,5.5-6.4,10l-0.4,5C4.5,24.3,4,24.8,4,25.5C4,26.3,4.7,27,5.5,27h19  c0.8,0,1.5-0.7,1.5-1.5C26,24.8,25.5,24.3,24.9,24.1z M11.4,17.6l2.2-0.3l1-2c0.2-0.3,0.6-0.3,0.8,0l1,2l2.2,0.3  c0.4,0.1,0.5,0.5,0.3,0.8L17.3,20l0.4,2.2c0.1,0.4-0.3,0.7-0.7,0.5l-2-1l-2,1c-0.3,0.2-0.7-0.1-0.7-0.5l0.4-2.2l-1.6-1.6  C10.9,18.1,11,17.7,11.4,17.6z"/></svg>Créditos</h5></th>
                    <th></th>
                    <tbody >
                        <tr>
                            <td>
                                <label class="btn btn-success" value="1000">Creditos de cortesia</label><br>
                                <label class="btn btn-success" value="200">$200 x Pulcera Magica</label><br>
                                <label class="btn btn-success" value="1000">Creditos de cortesia</label><br>
                                <label class="btn btn-success" value="200">$200 x Pulcera Magica</label><br>
                                <label class="btn btn-success" value="1000">Creditos de cortesia</label><br>
                                <label class="btn btn-success" value="200">$200 x Pulcera Magica</label><br>
                                <label class="btn btn-success" value="1000">Creditos de cortesia</label><br>
                                <label class="btn btn-success" value="200">$200 x Pulcera Magica</label><br>
                            
                            </td>
                            <td>
                                <input type="text" class="form-control" name="valor1" id="valor1" disabled style="background : inherit; border:0;"><!--NOMBRE-->
                                <input name="saldo" id="saldo" style="display: none; background : inherit; border:0;">
                                <div id="promo1-elementos"></div>
                                <div id="promo2-elementos"></div>
                                <div id="promo3-elementos"></div>
                            </td>
                            <td>
                                <br><br>
                                <input type="number" name="pesos" id="pesos" disabled style="display: none; background : inherit; border:0;" class="monto"><!--DINERO-->
                                <div id="elementos"></div>
                                <div id="elementos2"></div>
                                <div id="elementos3"></div>
                            </td>
                            <td>
                                <br><br>
                                <input disabled type="text" name="credito" id="credito" style="display: none; background : inherit; border:0;" class="credi"><!--CREDITOS-->
                                <div id="creditop1"></div>
                                <div id="creditop2"></div>
                                <div id="creditop3"></div>
                                
                            </td>
                            <td>
                                <button class="btn btn-danger" id="eliminar" style="display: none;"><i class="bi bi-trash3-fill"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        
            <div class="table table-responsive">
                <table class="table table-bordered">
                    <th><h5>
                        <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z"/>
                        <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"/>
                        <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z"/>
                        <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"/></svg>&nbsp;Forma de Pagos</h5></th>
                    <th><h5><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"width="30px" height="30px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
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
                        /></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>&nbsp;Total Pesos:</h5></th>
                    <!--th><h5><svg id="Layer_1" style="width:30px; height:30px;" version="1.1" viewBox="0 0 30 30" xml:space="preserve"><style type="text/css"> .st0{fill:#FD6A7E;} .st1{fill:#17B978;} .st2{fill:#8797EE;} .st3{fill:#41A6F9;} .st4{fill:#37E0FF;}
	                    .st5{fill:#2FD9B9;}.st6{fill:#F498BD;}.st7{fill:#FFDF1D;} .st8{fill:#C6C9CC;}</style><path class="st4" d="M24.9,24.1l-0.4-5c-0.4-4.5-2.8-7.5-6.5-10l1-6h-5l-0.8,1H11l0.6,3.2l4.4,0.6c0.4,0.1,0.6,0.4,0.6,0.7  c0,0.3-0.3,0.6-0.7,0.6l-4-0.1c-3.7,2.5-6.1,5.5-6.4,10l-0.4,5C4.5,24.3,4,24.8,4,25.5C4,26.3,4.7,27,5.5,27h19  c0.8,0,1.5-0.7,1.5-1.5C26,24.8,25.5,24.3,24.9,24.1z M11.4,17.6l2.2-0.3l1-2c0.2-0.3,0.6-0.3,0.8,0l1,2l2.2,0.3  c0.4,0.1,0.5,0.5,0.3,0.8L17.3,20l0.4,2.2c0.1,0.4-0.3,0.7-0.7,0.5l-2-1l-2,1c-0.3,0.2-0.7-0.1-0.7-0.5l0.4-2.2l-1.6-1.6  C10.9,18.1,11,17.7,11.4,17.6z"/></svg>Total Creditos</h5></th-->
                    <tbody>
                        <tr>
                            <td style="padding-left: 30px;">
                                <input type="radio" name="rad" value="1" style="width: 8%; height: 1.5em;">&nbsp;Efectivo <br>
                                <input type="radio" name="rad" value="2" style="width: 8%; height: 1.5em;">&nbsp;Tarjeta de Débito <br>
                                <input type="radio" name="rad" value="3" style="width: 8%; height: 1.5em;">&nbsp;Tarjeta de Crédito
                            </td>
                            <td>
                                <div class="form-group">
                                    <label><h5>Total: $</h5></label>
                                    <input class="form-control" disabled type="number" name="total" id="total">
                                </div>
                                <div class="form-group" style="display: none;" id="efectivo" >
                                    <label><h5>Efectivo:</h5></label>
                                    <input type="number" class="form-control" name="efectivo" placeholder="Ingresa la cantidad">
                                </div>
                            </td>
                            <!--td>
                                <input disabled type="text" name="totalc" id="totalc">
                            </td-->
                        </tr>
                    </tbody>
                </table>
            </div>
            <button class="btn btn-success" onclick="myFunction()" style="float: right;"><h2>Cobrar</h2></button>
    </form>
    <br>    
</div>

<script type="text/javascript">
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


    function archiveFunction() {
        event.preventDefault(); // prevent form submit
        var form = event.target.form; // storing the form
                swal({
        title: "Are you sure?",
        text: "But you will still be able to retrieve this file.",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, archive it!",
        cancelButtonText: "No, cancel please!",
        closeOnConfirm: false,
        closeOnCancel: false
        },
        function(isConfirm){
        if (isConfirm) {
            form.submit();          // submitting the form when user press yes
        } else {
            swal("Cancelled", "Your imaginary file is safe :)", "error");
        }
        });
    }



$('#tagA').click(function(){
    swal({
        title: '¿Cancelar tarjeta electrónica?',
        icon: "warning",
        buttons: true,
        dangerMode: true,
        html: "Some Text" +
            "<br>" +
            '<button type="button" role="button" tabindex="0" class="SwalBtn1 customSwalBtn">' + 'Button1' + '</button>' +
            '<button type="button" role="button" tabindex="0" class="SwalBtn2 customSwalBtn">' + 'Button2' + '</button>',
        showCancelButton: false,
        showConfirmButton: false
    })
    .then((willDelete) => {
            if (willDelete) {
                swal("Cancelado correctamente", {
                    icon: "success",
            });
            $("#tarjetaElectron").hide();
                $("#celular").hide();
                $("#tarEle").hide();
                $("#tarjetaf").show();
                $("#tarjetafisica").show();
            } else {
              //  swal("Your imaginary file is safe!");
            }
        });
 });
   

    $('#electronica').click(function() {
        $("#tarjetaElectron").show();
        $("#celular").show();
        $("#tarEle").show();
        $("#tarjetaf").hide();
        $("#tarjetafisica").hide();
    });

//VALIDAR RADIOBUTTONS
        $("input[name=rad]").click(function () {   
            var opcion = $('input:radio[name=rad]:checked').val();
            if(opcion==1){
                $( "#efectivo" ).show();
            }else{
                $( "#efectivo" ).hide();
            }
        });
        
    
    $("#promocion3").click(function(){ 
        let htmlE = "<label name='promo3' id='promo3' disabled style='display: none;'>$500 x 600 creditos</label>";
        let hmo = '$<input type="number" name="dpromo3" id="dpromo3" disabled style="display: none; background : inherit; border:0;" class="monto">';
        let htmlE3 = '<input type="number" name="cpromo3" id="cpromo3" class="credi" disabled style="display: none; background : inherit; border:0;">';
    $("#promo3-elementos").append(htmlE);
    $("#elementos3").append(hmo);
    $("#creditop3").append(htmlE3);
    });

    //VALOR DE LOS BOTONES
    $('label').click(function(e){
        var p = $(this).attr('value');
        if(p == 100){
            //var cred = 115;
           // $('#promo').show(); 
           // $('#promo').show().val('PROMOCION 1');
           // $('#dpromo1').val(p);
            //$('#cpromo1').val(cred);
            //$("#promo1").click(function(){
            let htmlE = "<label name='promo' id='promo'>$100 x 115 creditos</label><br>";
            let htmlE2 = '<input type="number" name="dpromo1" id="dpromo1" disabled style="background : inherit; border:0;" class="monto" value="100"><br>';
            let htmlE3 = '<input type="number" name="cpromo1" id="cpromo1" disabled class="credi" style="background : inherit; border:0;" value="115"><br>';
            $("#promo1-elementos").append(htmlE);
            $("#elementos").append(htmlE2);
            $("#creditop1").append(htmlE3);
            $( "#eliminar" ).show();
            //});
            sumar();
            credi();
        }
        if(p == 200){
            /*var cred = 230;
            $( "#eliminar" ).show();
            $('#promo2').show().val('Promoción: $200 x 260 creditos');
            $('#dpromo2').show().val(p);
            $('#cpromo2').show().val(cred);*/
            let im = "<label name='promo2' id='promo2'>$200 x 260 creditos</label><br>";
            let hmo = '<input type="number" name="dpromo2" id="dpromo2" disabled style="background : inherit; border:0;" class="monto" value="200"><br>';
            let htmlE3 = '<input type="number" name="cpromo2" id="cpromo2" class="credi" disabled style="background : inherit; border:0;" value="230"><br>';
            $("#promo2-elementos").append(im);
            $("#elementos2").append(hmo);
            $("#creditop2").append(htmlE3);
            $( "#eliminar" ).show();
            sumar();
            credi();
        }
        if(p == 500){
            var cred = 230;
            $( "#eliminar" ).show();
            $('#promo3').show().val('PROMOCION 3');
            $('#dpromo3').show().val(p);
            $('#cpromo3').show().val(cred);
            sumar();
            credi();
        }
    });

//SCRIPT PARA ALMACENAR LOS DATOS DE TARJETAS DEL INPUT

    $('#tarjeta').change(function () {
        //var value = document.getElementById('tarjeta').value;
        //alert(value);
        valor_inicial = $(this).val();
        $('#valor1').val(valor_inicial);
        //$('input[name=valor1]').val($(this).val());

    });
    
    $('#recarga').change(function () {
        /*var value = document.getElementById('recarga').value;
        alert(value);
        $('input[name=recargas]').val($(this).val());*/
        valor_inicial = $(this).val();

        const creditos = 1;
        const pesos = 0.80;
        
        r = (valor_inicial * creditos)/pesos;
        $( "#saldo" ).show().val('Saldo');
        $('#pesos').val(valor_inicial).show();
        $('#credito').val(r).show();
        $( "#eliminar" ).show();
        sumar();
        credi();
    });

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

    /*function mostrar() {
        div = document.getElementById('puntoVenta');
        div.style.display = '';
        prin = document.getElementById('menu');
        prin.style.display = 'none';
    }
*/
</script>
    