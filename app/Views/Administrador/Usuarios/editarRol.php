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

                 <?php 
                 // $sql2 = mysqli_query($connect,"SELECT * FROM Privilegios WHERE rango_Id =".$dP->idRango," and privilegio_id=".$idM->idModulo);
                  
                 // if (mysqli_fetch_array($sql2)) echo "checked"; ?>



                    <?php foreach($Modulos as $key => $idM) :?>
                            <input type="checkbox" name="priv[]" value="<?php $idM->idModulo?>"><?php echo $idM->modulo?><br>
                    <?php endforeach ?>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button name="adicional" type="submit" class="btn btn-success" id="agregarUsuario">Agregar </button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>  
                </form>
            </div>
        </div>
    </div>
</div>