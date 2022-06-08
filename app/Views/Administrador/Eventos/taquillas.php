<!--MODAL AGREGAR ATRACCIONES-->
<div class="modal fade" id="taquillas" style="color:black;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Taquillas</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <!--<form enctype="multipart/form-data">-->
                    <fieldset>
                        <nav>
                            <div class="nav nav-tabs" id="nav-taquillas" role="tablist">
                                <a class="nav-link active" id="nav-agregar-taquillas-tab" data-toggle="tab" href="#nav-agregar-taquillas" role="tab" aria-controls="nav-agregar-taquillas" aria-select="true">Agregar Taquillas</a>
                                <a class="nav-link" id="nav-ver-taquillas-tab" data-toggle="tab" href="#nav-ver-taquillas" role="tab" aria-controls="nav-ver-taquillas" aria-selected="false">Ver Taquillas</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabTaquilla">
                            <div class="tab-pane fade show active" id="nav-agregar-taquillas" role="tabpanel" aria-labelledby="nav-agregar-taquillas-tab">
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
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-ver-taquillas" role="tabpanel" aria-labelledby="nav-ver-taquillas-tab">
                                <div class="modal-body">
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
                    </fieldset>
                <!--</form>-->
            </div>                 
        </div>
    </div>
</div>
        <!--/Contenedor del Lote-->