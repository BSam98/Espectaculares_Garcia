<div class="modal fade" id="editar_Rol<?php echo $dP->idRango?>" style="color:black;" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar <?php echo $dP->Nombre?></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" name="EditarRol" id="EditarRol">
                    <label for="">Privilegios</label><br>
                 
                    <?php foreach($Modulos as $key => $idM) :?>
                            <input type="checkbox" name="priv" id="priv" value="<?php echo $idM->idModulo?>"><?php echo $idM->modulo. $idM->idModulo?><br>
                    <?php endforeach ?>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <a href="" name="enviar" class="btn btn-success" id="enviar">Agregar </a>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>  
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#enviar').click(function() {
        // defines un arreglo
        var selected = [];
        $(":checkbox[name=priv]").each(function() {
            if (this.checked) {
                // agregas cada elemento.
                selected.push($(this).val());
            }
        });
            if (selected.length) {
                console.log(selected);
                $.ajax({
                    type: 'POST',
                    dataType: 'JSON', // importante para que 
                    data: {'select':selected}, // jQuery convierta el array a JSON
                    url: 'insertarP',
                    success: function(data) {
                    alert('datos enviados');
                        
                        for(var i =0; i<data.msj.Modulos.length; i++){
                            console.log("Datos: " + data.msj.Modulos[i]['modulo']);
                        }
                    }
                });

                // esto es solo para demostrar el json,
                // con fines didacticos
                //alert(JSON.stringify(selected));

                } else
                alert('Debes seleccionar al menos una opción.');

                return false;
            });
    });




    /*$(document).on('click', '.editarRol', function(){
        alert(rango = $(this).val());
        $.ajax({
                beforeSend:function () {
                    inicia_carg();
                },
                url:"privUser",
                type:"POST",
                data:{'rango':rango},
                dataType: 'JSON',
                error: function(jqXHR, textStatus, errorThrown){
                    alert('Se produjo un error: a'+ errorThrown + ' ' + textStatus);
                    cierra_carg();
                },
            }).done(function(data){
                console.log(data);
                var html='';
                    for(var i = 0;i<data.msj.length; i++){
                        html += '<tr>'+
                                '<td style="padding:0px;">'+
                                '<input type="checkbox" value="'+data.msj[i]['idModulo']+'">'+data.msj[i]['modulo']+
                                '</td>'+
                                '</tr>';
                    }


                $("#modal_privilegios .modal-body #mmm").html(html);
                cierra_carg();
            });
    });
    function inicia_carg(){
        $('body').loadingModal({
          position: 'auto',
          text: 'Cargando',
          color: '#98BE10',
          opacity: '0.7',
          backgroundColor: 'rgb(1,61,125)', 
          animation: 'doubleBounce'
        }); 
    }

    function cierra_carg(){
        $('body').loadingModal('hide');
        $('body').loadingModal('destroy');
        console.log('adios perros');
    }*/
</script>
<style>
    body { font-family:'Open Sans';}
        #wrapper {
            text-align: center;
            padding: 30px;
        }
    </style>