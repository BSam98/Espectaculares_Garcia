<!--AGREGAR PROMOCIONES-->
<div class="modal fade" id="Creditos" style="color:black;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Promoción Créditos de Cortesia</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="" enctype="multipart/form-data" name="formulario" id="formulario">
                    <div class="form-group">
                        <label for="nombrec">Nombre de la Promoción</label>
                        <input type="text" name="nombrec" id="nombrec" class="form-control" placeholder="Nombre de la Promoción">
                    </div>
                    <div class="form-group">
                        <label for="precioc">Precio de la Promoción</label>
                        <input type="text" class="form-control" name="precioc" id="precioc" placeholder="Precio de la Promoción">
                    </div>
                    <div class="form-group">
                        <label for="ccreditosc">Créditos de la Promoción</label>
                        <input type="text" class="form-control" name="creditosc" id="creditosc" placeholder="Créditos de la Promoción">
                    </div>
                    <div class="table table-responsive">
                        <table>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <center><label>Días</label><button id="adicionar2" class="btn btn-success" type="button">Agregar</button></center><br>
                                        <label for="horai">Hora de Inicio</label>
                                        <input id="creditosinicio" class="form-control" type="datetime-local">
                                        <label for="horaf">Hora de Finalizacion</label>
                                        <input id="creditosfin" class="form-control" type="datetime-local"> 
                                    </div>
                                </td>
                                <td>
                                    <table id="tablacreditos" class="table table-bordered table-hover ">
                                        <tr>
                                            <th>Hora Inicio</th>
                                            <th>Hora Fin</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <!--div id="adicionados"></div-->
                    </div>
                    <button class="btn btn-success" id="cerrar">Guardar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!--SCRIPT PARA ALMACENAR LOS DATOS DE FECHA DEL INPUT-->
    <script>             
        $('#creditosinicio').change(function () {
            var value = document.getElementById('creditosinicio').value;
            alert('agrego fecha' + value);
        });                     
        $('#creditosfin').change(function () {
            var value = document.getElementById('creditosfin').value;
            alert('agrego fecha' + value);
        });     
    </script>

    <script>
        $('#adicionar2').click(function() {
        var nombre = document.getElementById("creditosinicio").value;
        var nombre2 = document.getElementById("creditosfin").value;
        var i = 1; //contador para asignar id al boton que borrara la fila
        var fila = '<tr id="row' + i + '"><td>' + nombre + '</td><td>' + nombre2 + '</td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">Quitar</button></td></tr>'; //esto seria lo que contendria la fila

        i++;

        $('#tablacreditos tr:first').after(fila);
            $("#adicionados").text(""); //esta instruccion limpia el div adicioandos para que no se vayan acumulando
            var nFilas = $("#tablacreditos tr").length;
            $("#adicionados").append(nFilas - 1);
            //le resto 1 para no contar la fila del header
            document.getElementById("creditosinicio").value = "";
            document.getElementById("creditosinicio").focus();
            document.getElementById("creditosfin").value = "";
            document.getElementById("creditosfin").focus();
        });
        $(document).on('click', '.btn_remove', function() {
        var button_id = $(this).attr("id");
            //cuando da click obtenemos el id del boton
            $('#row' + button_id + '').remove(); //borra la fila
            //limpia el para que vuelva a contar las filas de la tabla
            $("#adicionados").text("");
            var nFilas = $("#tablacreditos tr").length;
            $("#adicionados").append(nFilas - 1);
        });
    </script>
