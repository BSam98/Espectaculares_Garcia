<!--MODAL AGREGAR ATRACCIONES-->
<div class="modal fade" id="taquillas" style="color:black;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Alta Taquilla</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" name="formulario_Taquilla_Evento" id="formulario_Taquilla_Evento">
                    <div class="table table-striped table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <th scope="col" style="vertical-align: middle;"></th>
                            </thead>
                            <tbody id="agregarTaq">
                                <tr class="filas" id="0">
                                    <td>
                                        <div class="form-group" id="selectZonas">
                                        </div>
                                        <div class="form-group">

                                            <label for="">Nombre Taquilla</label>
                                            <input type="text" name="nombre_Taquilla[]" id="nombre_Taquilla" class="form-control">

                                            <table id="tablaVentanilla" class="table table-bordered">
                                                <thead>
                                                    <th style="vertical-align: middle;" colspan="2">Ventanilla</th>
                                                    <br>
                                                </thead>
                                                <tbody id="1" >
                                                        <tr>
                                                            <td colspan="2">
                                                            <button name="adicional" type="button" class="btn btn-warning ventanillas"><i class="bi bi-plus-circle"></i>&nbsp;Agregar Ventanilla</button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input type="text" name="nombre_Ventanilla[]" id="nombre_Ventanilla" placeholder="Nombre de la ventanilla">
                                                            </td>
                                                            <td class="elimAsoci"><input type="button"   value="-"/></td>
                                                        </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </td>
                                    <td class="deletef"><input type="button" value="-"></td>
                                </tr>
                            </tbody>
                        </table>
                               
                    </div>
                    <button id="addf" name="adicional" type="button" class="btn btn-warning"> + </button>
                    <button id="guardarTaquilla" name="guardarTaquilla" type="button" class="btn btn-success">Guardar</button>
                </form>
                <hr>
                <!--TABLA DE LISTADOS-->
                <div class="table table-striped table-responsive">
                    <table id="tablaTaquillas" class="table table-bordered">
                        <thead>
                        <th></th>
                        <th scope="col" style="text-align: center; vertical-align: middle;">Zona</th>
                        <th scope="col" style="text-align: center; vertical-align: middle;">Taquilla</th>
                        <th scope="col" style="text-align: center; vertical-align: middle;">Ventanilla</th>
                        </thead>
                        <tbody id = "taquillasEvento">
                        </tbody>
                    </table>
                </div>
            </div>                 
        </div>
    </div>
</div>
        <!--/Contenedor del Lote-->
<script>

    
    $(function(){
        $(document).on("click",".ventanillas",function(){

            id  = $(this).parents('tbody').attr('id');
            
            $(
                '<tr>'+
                    '<td>'+
                        '<input type="text" name ="nombre_Ventanilla[]" id="nombre_Ventanilla" placeholder="Nombre de la ventanilla">'+
                    '</td>'+
                    '<td class="elimAsoci"><input type="button" value="-"></td>'+
                '</tr>'
            ).clone().appendTo($('#'+id));

        });
        /*
        $(document).on("click",".ventanillas", function(){
            var parent = $(this).parents().get(0);

            $(parent).appendTo()
        });
        */
    });

    
</script>