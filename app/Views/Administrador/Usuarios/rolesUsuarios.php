<fieldset id="fieldset">
    <center><h2>Tipos de Usuarios</h2></center>
        <button class="btn btn-success" type="button" data-toggle="modal" data-target="#modal_agregar_privilegios">Nuevo Rol</button><hr>

        <div class="table table-stripped table-responsive">
            <table>
                <th>Opciones</th>
                <th>Rol</th>
                <th>Privilegios</th>
                <tbody>
                    <?php foreach ($Privilegio as $key => $dP) : ?>
                        <tr>
                            <td><button type="button" class="btn btn-warning editarRol" id="idRang" value="<?= $dP->idRango?>" data-toggle="modal" data-target="#modal_privilegios">Editar</button></td>
                            <!--td><a href="#editar_Rol<?php echo $dP->idRango?>" class="btn btn-warning" value="<?= $dP->idRango?>" data-toggle="modal">Editar</a></td-->
                            <td><?= $dP->Nombre?></td>
                            <td><?= $dP->modulo?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

    <!--**********************************EDITAR ROL*********************************-->
    <div class="modal fade" id="modal_privilegios">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Privilegios</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                </div>
                <form id="privilegiosUsuarios">
                    <input type="hidden" name="rango" id="rango" value="">
                    <div class="modal-body">
                            <table>
                                <tbody id="privilegios">

                                </tbody>
                            </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success pull-left" data-dismiss="modal" name="editarRoles" id="editarRoles" value="<?php echo $dP->idRango?>">Guardar</button>
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal" name="cerrar" id="cerrar">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--**********************************EDITAR ROL*********************************-->
        
    <!--**********************************AGREGAR ROL*********************************-->
    <div class="modal fade" id="modal_agregar_privilegios">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Agregar Rol</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
                <form id="nuevoRol">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nombre">Nombre del Rol</label>
                            <input type="text" class="form-control" name="nombreRol" id="nombreRol">
                        </div>
                        <div class="form-group">
                            <label for="privilegios">Privilegios</label><br>
                            <table>
                                <tbody>
                                <?php foreach ($Modulos as $key => $dP) : ?>
                                    <tr>
                                        <td><input class="modulos" type="checkbox" name="modulos[]" value="<?= $dP->idModulo?>"><?= $dP->modulo?></td>
                                    </tr>
                                <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success pull-left" data-dismiss="modal" name="agregarRol" id="agregarRol">Guardar</button>
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal" name="cerrar" id="cerrar">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--**********************************AGREGAR ROL*********************************-->

</fieldset>
<script>
    /**********************************EDITAR ROL*********************************/
    $(document).on('click', '.editarRol', function(){
        var rango = $(this).val();//obtiene el id del boton seleccionado
        $('#rango').val(rango);
        $.ajax({
                beforeSend:function () {//antes de cargar la info, abrimos una ventana de carga
                 //   inicia_carg();//funcion que abre la ventana de carga
                },
                url:"privUser",//la ruta a donde enviare la info
                type:"POST",
                data:{'rango':rango},//toma el valor del boton seleccionado
                dataType: 'JSON',
                error: function(jqXHR, textStatus, errorThrown){
                    alert('Se produjo un error: a'+ errorThrown + ' ' + textStatus);//en caso de presentar un error, muestra el msj
                 //   cierra_carg();//funcion que cierra la ventana de carga
                },
            }).done(function(data){//obtiene el valor de data procesado en el controlador
                var html='';//creamos una variable
                    for(var i = 0;i<data.msj.Modulos.length; i++){//hacemos el recorrido de valores del objeto que queremos 
                        //console.log(data.msj.Privilegios[i]['privilegio_Modulo']);
                        html += '<tr>'+
                                    '<td style="padding:0px;">';
                                        if(data.msj.Privilegios.find(object => object.privilegio_Modulo == data.msj.Modulos[i]['idModulo'])){//buscamos el valor del objeto en el arreglo Privilegios que pasamos en data y hacemos la comparacion con el idModulo del arreglo de Modulos extraido del data
                                            html += '<input class="privilegios" type="checkbox" name="op[]" value="'+data.msj.Modulos[i]['idModulo']+'" checked>'+data.msj.Modulos[i]['modulo'];//si la comparacion es verdadera, va a marcar el valor del dato
                                        }
                                        else{
                                            html += '<input class="privilegios" type="checkbox" name="op[]" value="'+data.msj.Modulos[i]['idModulo']+'">'+data.msj.Modulos[i]['modulo'];//si la comparacion es falsa, va a mostrar el valor del dato
                                        }
                                html+='</td>'+
                            '</tr>';
                    }
                $("#modal_privilegios .modal-body #privilegios").html(html);//abrimos el modal, en el apartado de body con la clase de la tabla e imprimimos nuestra variable declarada
                //cierra_carg();
            });
    });

    $(document).on('click', '#editarRoles', function(){
       //alert( $('#privilegiosUsuarios').serialize());
        $.ajax({
            beforeSend:function () {//antes de cargar la info, abrimos una ventana de carga
                //inicia_carg();//funcion que abre la ventana de carga
            },
            type: 'POST',
            url: 'editarPrivilegiosUser',
            data: $('#privilegiosUsuarios').serialize(),
            dataType: 'JSON',
            error(jqXHR, textStatus, errorThrown){
                alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            },
        }).done(function(data){
            if(data.msj == true){
                alert('Actualizado Correctamente');
                location.reload();
            }else{
                alert('Error al Actualizar');
            }
        });
    });

    $(document).on('click', '#agregarRol', function(){
        //( $('#nuevoRol').serialize());
        $.ajax({
            beforeSend:function () {//antes de cargar la info, abrimos una ventana de carga
                //inicia_carg();//funcion que abre la ventana de carga
            },
            type: 'POST',
            url: 'agregarRol',
            data: $('#nuevoRol').serialize(),
            dataType: 'JSON',
            error(jqXHR, textStatus, errorThrown){
                alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            },
        }).done(function(data){
            if(data.msj == true){
                alert('Agregado Correctamente');
                location.reload();
            }else{
                alert('Error al Actualizar');
            }
        });
    });



</script>
<script src="JS/carga.js"></script>