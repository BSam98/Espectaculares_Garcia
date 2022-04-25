<!--MODAL NUEVA ATRACCION-->
<div class="modal fade" id="myModal" style="color:black;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar Atracciones</h4>
                <button type="button" class="close" data-dismiss="modal" onclick="cerrar">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form  enctype="multipart/form-data" name="formulario" id="formularioNuevaAtraccion">
                    <div class="table table-striped table-responsive">
                        <table class ="table table-borderd" id="agregar_Atracciones">
                            <tbody>
                                <tr class ="a-Atracciones" id="0">
                                    <td>
                                        <div class="form-group">
                                            <label for="nombre">Nombre</label>
                                            <input class="form-control" type="text"  id="na" required name="na[]" placeholder="Nombre"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="renta">Renta</label>
                                            <input class="form-control" type="number"  id="ren" required name="ren[]"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="propietario">Propietario</label>
                                                <select class="form-control" type="text"  id="pro" required name="pro[]">
                                                    <option value="0">Seleccionar Propietario</option>
                                                        <?php foreach ($Propietario as $key => $dP) : ?>
                                                            <option value = "<?= $dP->idPropietario?>"><?= $dP-> Nombre?></option>
                                                        <?php endforeach ?>
                                                </select>
                                            <!--<a href="" type="button" class="btn btn-success" data-toggle="modal" data-target="#Agregar">Agregar Propietario</a>-->
                                        </div>
                                        <div class="form-group">
                                            <label for="cma">Cantidad Máxima</label>
                                            <input class="form-control" type="number"  id="cma" required name="cma[]"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="cmi">Cantidad Mínima</label>
                                            <input class="form-control" type="number"  id="cmi" required name="cmi[]"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="tiempo">Tiempo</label>
                                            <input class="form-control" type="text"  id="tim" required name="tim[]" placeholder="Tiempo"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="tma">Tiempo Máximo de Espera</label>
                                            <input class="form-control" type="text"  id="tma" required name="tma[]" placeholder="Tiempo Máximo"/>
                                        </div>
                                    </td>
                                    <td class="eliminar_Atraccion"><input type ="button" value="-"></td>
                                </tr>
                            </tbody>
                        </table>
                        <button id ="nueva_Atraccion" name ="nueva_Atraccion" type="button" class="btn btn-warning"><i class="bi bi-plus-circle"></i>&nbsp;+ </button>
                    </div>
                    <div class="modal-footer">
                        <button name="adicional" type="button" class="btn btn-success" id ="enviarAtraccion">Agregar </button>
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