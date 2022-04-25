<!--AGREGAR PROMOCIONES-->
<div class="modal fade" id="Promociones" style="color:black;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar Promociones</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" name="formulario_Agregar_Promocion_Evento" id="formulario_Agregar_Promocion_Evento">
                <input type="hidden" class="form-control" id = "idEventoPromocion" name = "idEventoPromocion" value="">
                    <div class ="table table-striped table-responsive">
                        <table class="table table-borderd" id="tabla_Agregar_Promociones">
                            <tbody>
                                <tr class="b-Promociones" id="0">
                                    <td>
                                        <div class="form-group">
                                            <label for="promocion_Categoria">Elige el tipo de Promoción</label>
                                            <select name="promocion_Categoria" id="promocion_Categoria" class="form-control">
                                                <option value="0">Opciones</option>
                                                <option value="1">Dos x Uno</option>
                                                <option value="2">Pulcera Mágica</option>
                                                <option value="3">Juegos Grátis</option>
                                                <option value="4">Creditos Cortesia</option>
                                            </select>
                                        </div>

                                        <div class="from-group" id="area_Nombre_Promocion">
                                        </div>

                                        <div class="form-group" id="area_Precio_Promocion">
                                        </div>

                                        <div class="form-group" id="area_Creditos_Promocion">
                                        </div>

                                        <!--TABLA DE FECHAS-->
                                        <div class=" from-group table table-responsive">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="container" id="area_Fechas_Promocion">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <table  id="mytable" class="table table-bordered table-hover ">
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!--<button id="np" name="np" type="button" class="btn btn-warning"><i class="bi bi-plus-circle"></i>&nbsp;Nuevo Registro </button>-->
                    </div>                 
                    <button type="button" class="btn btn-success" id="agregar_Promocion_Evento" name ="agregar_Promocion_Evento">Guardar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </form>
                <hr>
            </div>
        </div>
    </div>
</div>

<!--SCRIPT PARA ALMACENAR LOS DATOS DE FECHA DEL INPUT-->
<script>
    /*
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
    });

    $('#nombre2').change(function () {
        var value = document.getElementById('nombre2').value;
    }); 
    
    $('#precioes').change(function () {
        var value = document.getElementById('precioes').value;
    });        
         */   
</script>

<!--SCRIPT PARA ALMACENAR LOS DATOS DE FECHA DEL INPUT-->
<script>
    /*
    var i=0; //contador para asignar id al boton que borrara la fila
    var diaInicial=[],diaFinal=[],precio=[];

    
    $('#adicionar').click(function() {
        var nombre = document.getElementById("dateinicio").value+":00";
        var nombre2 = document.getElementById("nombre2").value+":00";
        var precioe = document.getElementById("precioes").value;

        if(precioe === ""){
            precioe = document.getElementById("precio_Promocion").value;
        }
        var fila = '<tr id="row' + i + '"><td>' + nombre + '</td><td>' + nombre2 + '</td><td>' + precioe + '</td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">Quitar</button></td></tr>'; //esto seria lo que contendria la fila
        
        diaInicial.push({"diaInicial":nombre});
        diaFinal.push({"diaFinal":nombre2});
        precio.push({"precio":precioe});
        i++;

        $('#mytable tr:first').after(fila);
        $("#adicionados").text(""); //esta instruccion limpia el div adicioandos para que no se vayan acumulando
        var nFilas = $("#mytable tr").length;
        $("#adicionados").append(nFilas - 1);
        //le resto 1 para no contar la fila del header
    });
    */

    /*
    $("#agregar_Promocion_Evento").click(function(){
        var idEvento = document.getElementById("idEventoPromocion").value;
        var tipoPromocion = document.getElementById("promocion_Categoria").value;
        var nombrePromocion = document.getElementById("nombre_Promocion").value;
        var precioPromocion = document.getElementById("precio_Promocion").value;
        $.ajax({
            type: "GET",
            url: 'Eventos/Agregar_Promocion_Evento',
            data: {"idEvento":idEvento,"tipoPromocion":tipoPromocion,"nombrePromocion":nombrePromocion,"precioPromocion":precioPromocion,"fechaInicio":diaInicial,"fechaFinal":diaFinal,"precio":precio},
            dataType: 'JSON',
            error: function (jqXHR, textStatus, errorThrown) {
                alert('Se produjo un error : a'+ errorThrown + ' '+ textStatus);
            },
        }).done(function(data){
            if(data.respuesta){
                location.reload();
            }
            else{
                alert('Ha ocurrido un error');
            }
        }
        );
    });
    */

    /*
    $(document).on('click', '.btn_remove', function() {
    var button_id = $(this).attr("id");
        //cuando da click obtenemos el id del boton
        $('#row' + button_id + '').remove(); //borra la fila
        //limpia el para que vuelva a contar las filas de la tabla
        $("#adicionados").text("");
        var nFilas = $("#mytable tr").length;
        $("#adicionados").append(nFilas - 1);
        
        diaInicial.splice(button_id,1);
        diaFinal.splice(button_id,1);
        precio.splice(button_id,1);                
    });
    */
</script>
