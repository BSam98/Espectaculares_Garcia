<fieldset id="fieldset">
    <center><h2>Rol</h2></center>
    <div class="container">
        <button class="btn btn-success agregarRol" type="button" data-toggle="modal" data-target="#modal_privilegios">Agregar Rol</button>
        
    </div>

    <!--**********************************AGREGAR ROL*********************************-->
    <div class="modal fade" id="modal_privilegios">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Agregar Rol</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="form-group">
                            <label for="nombre">Nombre del Rol</label>
                            <input type="text" class="form-control" name="nombre" id="nombre">
                        </div>
                        <div class="form-group">
                            <label for="privilegios">Privilegios</label><br>
                            <div class="form-group">
                                <input type="checkbox" class="rol" name="rol1" id="rol1" value="1">Administrador
                            </div>
                            <table>
                                <tbody>
                                    <tr>
                                        <td id="modulosAdm"></td>
                                        <td id="submodulosAdm"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="form-grup">
                                <input type="checkbox" class="rol" name="rol2" id="rol2" value="2">Punto de Venta
                            </div>
                            <table id="modulosPun">
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success pull-left" data-dismiss="modal" name="agregar" id="agregar">Guardar</button>
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal" name="cerrar" id="cerrar">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************AGREGAR ROL*********************************-->
</fieldset>

<script>
    $(document).ready(function() {
    /***********************************************   OBTIENE LOS MODULOS POR CADA PRIVILEGIO  ****************************************************/
        $( document ).on( 'click', '.rol', function(){
            if($(this).is(':checked')){
                console.log("Lo ha seleccionado");
                rol = $(this).val();
                //alert(rol);
                $.ajax({
                url:"listarModulos",//la ruta a donde enviare la info
                type:"POST",
                data:{'rol':rol},//toma el valor del boton seleccionado
                dataType: 'JSON',
                error: function(jqXHR, textStatus, errorThrown){
                    alert('Se produjo un error: a'+ errorThrown + ' ' + textStatus);//en caso de presentar un error, muestra el msj
                },
                }).done(function(data){//obtiene el valor de data procesado en el controlador
                    console.log(data);
                    //alert('Rol:'+rol);
                    var html='';//creamos una variable
                    if(rol==1){
                        for(var i = 0;i<data.msj.length; i++){//hacemos el recorrido de valores del objeto que queremos 
                            html += '<input class="privilegios" id="privilegios" name="modulo" type="checkbox" value="'+data.msj[i]['idModulo']+'">'+data.msj[i]['modulo']+'<br>';
                        }
                        $("#modulosAdm").html(html);//abrimos el modal, en el apartado de body con la clase de la tabla e imprimimos nuestra variable declarada
                    }else{
                        for(var i = 0;i<data.msj.length; i++){//hacemos el recorrido de valores del objeto que queremos 
                            html += '<input class="privilegiosventa" id="privilegiosventa" name="" type="checkbox" value="'+data.msj[i]['idModulo']+'">'+data.msj[i]['modulo'];
                        }
                    $("#modulosPun").html(html);//abrimos el modal, en el apartado de body con la clase de la tabla e imprimimos nuestra variable declarada
                    }
                });
            }else{
                console.log('Lo a desmarcado');
            }
            


            
            rol = $(this).val();
            //alert(rol+'Privilegios');

            var selected = [];

/*************************************************  OBTIENE LOS SUBMODULOS POR CADA MODULO  **************************************************/
            $(document).on('change','input[type="checkbox"]' ,function(e) {
                
                if(this.id=="privilegios") {
                    if($(this).is(':checked')){
                    
                    console.log("Lo ha seleccionado");

                    selected.push($(this).val());                    
                    
                    if (selected.length) {
                        //alert('Estoy en if selected');
                        $.ajax({
                            type: 'POST',
                            dataType: 'JSON', // importante para que 
                            data: {'select':selected, 'rol':rol}, // jQuery convierta el array a JSON
                            url: 'listaSubmodulos',
                            success: function(data){
                                console.log(data);
                                var html='';
                                for(var i=0; i < data.msj.length; i++){
                                    html += '<input class="submod" id="submod" type="checkbox" value="'+data.msj[i]['idSubM']+'">'+data.msj[i]['subModulo']+'<br>';
                                }
                                $("#submodulosAdm").append(html);
                            }//success
                        });//ajax
                        alert(JSON.stringify(selected));



                        rol = $(this).val();
                        //alert(rol+'Privilegios 2');

/***********************************   NECESITO SABER QUE MODULO CLICKEO Y QUE SUBMODULOS CLICKEO PARA GUARDAR ********************/

                        $(document).on('change','input[type="checkbox"]' ,function(e) {
                            var selected2 = [];
                            if(this.id=="submod") {
                                //alert(this.value);
                                selected2.push($(this).val());
                                if (selected2.length) {
                                   // alert('Estoy en if selected 2');
                                    $.ajax({
                                        type: 'POST',
                                        dataType: 'JSON', // importante para que 
                                        data: {'select':selected, 'select2':selected2, 'rol':rol}, // jQuery convierta el array a JSON
                                       // url: 'agregarPrivilegios',
                                    }).done(function(data){
                                        alert('Agregado Correctamente');
                                    });
                                    
                                    alert(JSON.stringify('sub modulos'+selected2));
                                }
                            }
                        });

                    }//if
                    else{
                        alert('Debes seleccionar al menos una opción.');
                    }
                }else {
                    console.log('Lo ha desmarcado');
                }
                /*if(this.id=="privilegiosventa"){
                    alert(this.value);
                    selected.push($(this).val());
                }*/
            }
            });



            
           
        });

        /*$('#rol1').change(function() {
            if(this.checked) {
               var rol = $(this).val();
                alert(rol);
                if(rol == '1'){
                    $('#modulosAdm').show();
                }
            }     
        });
        $('#rol2').change(function() {
            if(this.checked) {
               var rol = $(this).val();
                alert(rol);
                if(rol == '2'){
                    $('#modulosPun').show();
                }
            }     
        });*/
    });

    function seleccionar_Modulo(rol){
        var liga='modulosRol';
        //alert(liga+' - '+mostrar)
        $.ajax({
            beforeSend:function () {
                //inicia_carg();
            },
            url:liga,
            type:'POST',
            data:'rol='+rol,
            dataType: 'JSON',
            error: function (jqXHR, textStatus, errorThrown) {
                alert('Se produjo un error : ' + errorThrown + ' '+ textStatus);
                //cierra_carg();
            },
            success: function (data) { 
                if(liga=='modulosRol'){
                    if(rol=='1'){
                        
                        console.log(liga);
                        console.log(data);
                
                        evento_contenido(rol,'2');
                    }else if(rol=='2'){
                        
                        
                       // cierra_carg();
                    }
                }
            },
            complete: function (xhr, status){
            }
        });
    }

    $(document).ready(function() {
        $( document ).on( 'click', '.administrador', function(){
            if($(this).is(':checked')){
                // agregas cada elemento.
                console.log("Lo ha seleccionado");
                modulo = $(this).val();
                alert(modulo);
                $.ajax({
                url:"subModulos",//la ruta a donde enviare la info
                type:"POST",
                data:{'modulo':modulo},//toma el valor del boton seleccionado
                dataType: 'JSON',
                error: function(jqXHR, textStatus, errorThrown){
                    alert('Se produjo un error: a'+ errorThrown + ' ' + textStatus);//en caso de presentar un error, muestra el msj
                },
            }).done(function(data){//obtiene el valor de data procesado en el controlador
                console.log(data);
                var html='';//creamos una variable
                    for(var i = 0;i<data.msj.length; i++){//hacemos el recorrido de valores del objeto que queremos 
                        html += '<input class="privilegios" type="checkbox" value="'+data.msj[i]['idSubM']+'">'+data.msj[i]['subModulo'];
                    }
                $("#submodulos").append(html);//abrimos el modal, en el apartado de body con la clase de la tabla e imprimimos nuestra variable declarada
      
            });
            }else{
                console.log('Lo a desmarcado');
            }
        });
    });
</script>