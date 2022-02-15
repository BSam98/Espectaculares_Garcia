<!--MODAL NUEVA ATRACCION-->
<div class="modal" id="myModal" style="background-image: url('./Img/mainbg.png');color:black;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar Atracciones</h4>
                <button type="button" class="close" data-dismiss="modal" onclick="cerrar">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form method="POST"  action="Agregar_Atraccion" enctype="multipart/form-data" name="formulario" id="formulario">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input class="form-control" type="text"  id="na" required name="na" placeholder="Nombre"/>
                    </div>
                    <div class="form-group">
                        <label for="renta">Renta</label>
                        <input class="form-control" type="number"  id="ren" required name="ren"/>
                    </div>
                    <div class="form-group">
                        <label for="propietario">Propietario</label>
                            <select class="form-control" type="text"  id="pro" required name="pro">
                                <option value="0">Seleccionar Propietario</option>
                                    <?php foreach ($Propietario as $key => $dP) : ?>
                                        <option value = "<?= $dP->idPropietario?>"><?= $dP-> Nombre?></option>
                                    <?php endforeach ?>
                            </select>
                        <a href="" type="button" class="btn btn-success" data-toggle="modal" data-target="#Agregar">Agregar Propietario</a>
                    </div>
                    <div class="form-group">
                        <label for="cma">Cantidad Máxima</label>
                        <input class="form-control" type="number"  id="cma" required name="cma"/>
                    </div>
                    <div class="form-group">
                        <label for="cmi">Cantidad Mínima</label>
                        <input class="form-control" type="number"  id="cmi" required name="cmi"/>
                    </div>
                    <div class="form-group">
                        <label for="tiempo">Tiempo</label>
                        <input class="form-control" type="text"  id="tim" required name="tim" placeholder="Tiempo"/>
                    </div>
                    <div class="form-group">
                        <label for="tma">Tiempo Máximo</label>
                        <input class="form-control" type="text"  id="tma" required name="tma" placeholder="Tiempo Máximo"/>
                    </div>
                    <div class="modal-footer">
                        <button name="adicional" type="submit" class="btn btn-success">Agregar </button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>  
                </form>
            </div>
        </div>
     </div>  
</div>

<?PHP 
   include 'atraccion_Propietario.php';
?>