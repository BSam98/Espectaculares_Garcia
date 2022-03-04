<!--AGREGAR PROMOCIONES-->
<div class="modal fade" id="Promociones" style="color:black;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar Promociones</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="POST" action="" enctype="multipart/form-data" name="formulario" id="formulario">
                    <!--div class="table table-striped table-responsive">
                        <table id="nuevaPr" >
                            <tbody>
                                <tr class="Prom">
                                    <td-->
                                        <div class="form-group">
                                            <label for="promocion">Elige el tipo de Promoción</label>
                                            <select name="promo" id="promo" class="form-control">
                                                <option value="1">Dos x Uno</option>
                                                <option value="2">Juegos Grátis</option>
                                                <option value="3">Pulcera Mágica</option>
                                            </select><br>
                                            <label for="nombreP">Nombre de la Promoción</label>
                                            <input type="text" name="promo" id="promo" class="form-control" placeholder="Nombre de la Promocion">
                                        </div>
                                        <div class="form-group">
                                            <label for="preciopromo">Precio de la Promoción</label>
                                            <input type="text" class="form-control" name="precioPromo" id="precioPromo" placeholder="Precio Promoción">
                                        </div>
                                        <!--TABLA DE FECHAS-->
                                        <div class="table table-responsive">
                                            <table>
                                                <body>
                                                <tr>
                                                    <td>
                                                        <div class="container">
                                                            <center><label>Días</label>
                                                            <button id="adicionar" class="btn btn-success" type="button">Agregar</button></center><br>
                                                            <label for="horai">Hora de Inicio</label>
                                                            <input id="dateinicio" class="form-control" type="datetime-local">
                                                            <label for="horaf">Hora de Finalizacion</label>
                                                            <input id="nombre2" class="form-control" type="datetime-local">
                                                            <label for="precioes">Precio</label>
                                                            <input id="precioes" class="form-control" type="number" placeholder="Ingresa un precio"> 
                                                            <!--div id="adicionados"></div-->
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <table  id="mytable" class="table table-bordered table-hover ">
                                                            <tr>
                                                                <th>Hora Inicio</th>
                                                                <th>Hora Fin</th>
                                                                <th>Precio</th>
                                                                <th>Eliminar</th>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                </tr>
                                                </body>
                                            </table>
                                        </div>
                                        <!--TABLA DE FECHAS-->
                                    </td->
                                    <!--td class="eliminar"><input type="button" value="-"/></td-->
                                </tr>
                            </tbody>
                        </table> 
                        <!--button id="np" name="np" type="button" class="btn btn-warning"><i class="bi bi-plus-circle"></i>&nbsp;Nuevo Registro </button>
                    </div--><hr>
                    <button class="btn btn-success" id="cerrar">Guardar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!--SCRIPT PARA ALMACENAR LOS DATOS DE FECHA DEL INPUT-->
    <script>    
        $(function(){
                    // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
            $("#np").on('click', function(){
                $("#nuevaPr tbody tr:eq(0)").clone().removeClass('Prom').appendTo("#nuevaPr");
            });
        // Evento que selecciona la fila y la elimina 
            $(document).on("click",".eliminar",function(){
                var parent = $(this).parents().get(0);
                $(parent).remove();
            });
        });

            $('#dateinicio').change(function () {
                var value = document.getElementById('dateinicio').value;
                alert('agrego fecha' + value);
            });                     
            $('#nombre2').change(function () {
                var value = document.getElementById('nombre2').value;
                alert('agrego fecha' + value);
            }); 
            $('#precioes').change(function () {
                var value = document.getElementById('precioes').value;
                alert('precio' + value);
            });        
            
    </script>

    <script>
            $('#adicionar').click(function() {
            var nombre = document.getElementById("dateinicio").value;
            var nombre2 = document.getElementById("nombre2").value;
            var precioe = document.getElementById("precioes").value;
            var i = 1; //contador para asignar id al boton que borrara la fila
            var fila = '<tr id="row' + i + '"><td>' + nombre + '</td><td>' + nombre2 + '</td><td>' + precioe + '</td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">Quitar</button></td></tr>'; //esto seria lo que contendria la fila

            i++;

            $('#mytable tr:first').after(fila);
                $("#adicionados").text(""); //esta instruccion limpia el div adicioandos para que no se vayan acumulando
                var nFilas = $("#mytable tr").length;
                $("#adicionados").append(nFilas - 1);
                //le resto 1 para no contar la fila del header
            });
            $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
                //cuando da click obtenemos el id del boton
                $('#row' + button_id + '').remove(); //borra la fila
                //limpia el para que vuelva a contar las filas de la tabla
                $("#adicionados").text("");
                var nFilas = $("#mytable tr").length;
                $("#adicionados").append(nFilas - 1);
            });
    </script>
