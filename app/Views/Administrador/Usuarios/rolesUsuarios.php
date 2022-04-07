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
                            <table>
                                <tbody>
                                    <tr>
                                        <input type="checkbox" class="administrador" name="administrador" id="administrador" value="1">Administrador
                                    </tr>
                                    <tr>
                                        <input type="checkbox" class="puntoVenta" name="puntoVenta" id="puntoVenta" value="2">Punto de Venta
                                    </tr>
                                    <?php foreach($Modulos as $key => $m):?>
                                        <tr>
                                            <td>
                                                <input type="checkbox" class="privilegios" name="privilegios" id="privilegios" value="<?php echo $m->idModulo ?>"><?php echo $m->modulo?> &nbsp;
                                            </td>
                                            <td>
                                            <table ALIGN="right">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div id="submodulos"></div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table> 
                                            </td>
                                        </tr>
                                    <?php endforeach?>
                                    
                                    
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