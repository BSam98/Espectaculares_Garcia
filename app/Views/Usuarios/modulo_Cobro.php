<div class="container" style="background-color: white;">
    <center><h2>PUNTO DE VENTA</h2></center>
    
    <form action="" method="POST" enctype="multipart/form-data">
        
        <div class="form-group">
        <table>
            <th>Tarjeta</th>
            <th style="padding-left: 30px;">Recargar</th>
            <th style="padding-left: 30px;">Forma de Pago</th>
            <tbody>
                <tr>
                    <td>
                        <input type="text" class="form-control" name="tarjeta" id="tarjeta" onblur="ingresarTarjeta()">
                    </td>
                    <td  style="padding-left: 30px;">
                        <input class="form-control" type="number" name="recarga" id="recarga" placeholder="Ingrese la cantidad">
                    </td>
                    <td  style="padding-left: 30px;">
                        <input type="radio" name="pago" value="1">Efectivo
                        <input type="radio" name="pago" value="2">Tarjeta de Débito
                        <input type="radio" name="pago" value="3">Tarjeta de Crédito
                    </td>
                </tr>
            </tbody>
        </table>
<hr>
        <table>
            <th>Promociones</th>
            <tbody>
                <td>
                <label class="btn btn-success" id="promo1" value="100">$100 x 115 Creditos</label>
                <label class="btn btn-success" id="promocion2" value="200">$200 x 230 Creditos</label>
                <label class="btn btn-success" id="promocion3" value="500">$500 x 600 Creditos</label>
                <label class="btn btn-success" value="50">$50 x Dos x Uno</label>
                <label class="btn btn-success" value="1000">$1000 x Juegos grátis</label>
                <label class="btn btn-success" value="200">$200 x Pulcera Magica</label>
                <!--label class="btn btn-success" id="agregar">Agregar nuevo elementos</!--label-->
                </td>
            </tbody>
        </table>
        
            <!--button class="btn btn-success">Agregar</button-->
        </div>
            <div class="table table-striped table-responsive" style="height: 300px; width: auto; overflow-y:scroll;">
                <table class="table table-striped">
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Créditos</th>
                        <th></th>
                    <tbody >
                        <tr>
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
        
        <section>
            <div class="table table-striped table-responsive">
                <table class="table table-bordered">
                    <th>Total Pesos:</th>
                    <th>Total Creditos</th>
                    <tbody>
                        <td>
                            Total: $<input disabled type="text" name="total" id="total"><br>
                            Efectivo:<input type="number" name="efectivo" id="efectivo" style="display: none;" placeholder="Ingresa la cantidad"><br>
                            <!--input type="number" name="cambio" id="cambio" disabled style="display: none;"-->
                        </td>
                        <td>
                            <input disabled type="text" name="totalc" id="totalc">
                        </td>
                    </tbody>
                </table>
            </div>
            <button class="btn btn-success" onclick="myFunction()">Cobrar</button>
        </section>
    </form>
    <br>
</div>
<script type="text/javascript">

//VALIDAR RADIOBUTTONS
        $("input[name=pago]").click(function () {   
            var opcion = $('input:radio[name=pago]:checked').val();
            if(opcion==1){
                $( "#efectivo" ).show();
            }else{
                $( "#efectivo" ).hide();
            }
        });
        
    function myFunction() {
        var opcion = $('input:radio[name=pago]:checked').val();
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