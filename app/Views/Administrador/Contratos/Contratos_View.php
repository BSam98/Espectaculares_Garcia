<?php 
if((!isset($_SESSION['Usuario'])) || (!isset($_SESSION['idUsuario']))){
    header('Location: http://localhost/Espectaculares_Garcia/public/');
    exit();
}else{
?>
<fieldset id="fieldset">
    <center><h2><i class="far fa-file-pdf ml-1 text-black"></i> &nbsp;Contratos Y Pólizas</h2></center>

    <!--------------------------------------------Agregar Contrato------------------------------------------>

    <ul class="nav nav-tabs" id="nav-tab" role="tablist">
        <li role="presentation" class="active"><a href="#contrato" class="nav-link active" data-toggle="tab" aria-expanded="true" style="color: black; font-size: 15px;">Contratos</a></li>
        <li role="presentation" class=""><a href="#poliza" class="nav-link" data-toggle="tab" aria-expanded="false" style="color: black; font-size: 15px;">Pólizas</a></li>
    </ul>

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade active in" id="contrato"><br>
            <button class="btn btn-success agregarCon" id="agregar"><i class="fa fa-plus-circle" aria-hidden="true"></i>Agregar Contrato</button><br>
            <!--------------------------------------------Agregar Contrato------------------------------------------>
            <div class="container" id="agregarContrato" style="display:none"> 
                <form method="post" action="addContrato" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Ingresa el nombre del contrato</label>
                        <input type="text" class="form-control" name="nombre" id="nombre">
                    </div>
                    <div class="form-group">
                        <label>Fecha Inicio</label>
                        <input type="date" name="fechaInicio" id="fechaInicio">
                        <label>Fecha Termino</label>
                        <input type="date" name="fechaFin" id="fechaFin">
                    </div>
                    <div class="form-group">
                        <label for="file">Elige un Archivo:</label>
                        <input type="file" class="form-control" id="file" name="file" />
                    </div>
                        <input type="button" class="btn btn-success" id="submitC" value="Subir Archivo">
                        <input type="button" class="btn btn-danger" id="cancelC" value="Cancelar">
                </form>
            </div><br>
            <div class="table table-striped table-responsive" id="tablaContrato">
                <!--------------------------------------------Tabla de Contratos------------------------------------------>
                <table class="table table-bordered" id="contratos">
                    <thead>
                        <th scope="col" style="vertical-align: middle;">Contrato</th>
                        <th scope="col" style="vertical-align: middle;">Fecha de Inicio</th>
                        <th scope="col" style="vertical-align: middle;">Fecha de Termino</th>
                        <th scope="col" style="vertical-align: middle;">Opciones</th>
                    </thead>
                    <tbody>
                        <?php foreach($Contrato as $con):?>
                            <tr>
                            <td><?php echo $con->Nombre ?></td>
                                <td><?php echo $con->FechaInicio ?></td>
                                <td><?php echo $con->FechaTermino ?></td>
                                <td><button type="button" class="btn btn-outline-success verCoti" value="<?php echo $con->idContrato?>" data-toggle="modal" data-target="#ModalPDFC"><i class="fa fa-eye" aria-hidden="true"></i></button></td>
                            </tr>
                        <?php endforeach?>
                    </tbody>
                </table>
                <!--------------------------------------------Tabla de Contratos------------------------------------------>
            </div>
        </div>

        <div role="tabpanel" class="tab-pane fade" id="poliza"><br>
        
        <button class="btn btn-success agregar" id="agregar"><i class="fa fa-plus-circle" aria-hidden="true"></i>Agregar Póliza</button><br>
        <!--------------------------------------------Agregar Poliza------------------------------------------>
        <div class="container" id="agregarPoliza" style="display:none"> 
            <form method="post" action="users/fileUpload" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Ingresa el nombre de la póliza</label>
                    <input type="text" class="form-control" name="nombre" id="nombre">
                </div>
                <div class="form-group">
                    <label>Fecha Inicio</label>
                    <input type="date" name="fechaInicio" id="fechaInicio">
                    <label>Fecha Termino</label>
                    <input type="date" name="fechaFin" id="fechaFin">
                </div>
                <div class="form-group">
                    <label for="file">Elige un Archivo:</label>
                    <input type="file" class="form-control" id="file" name="file" />
                </div>
                    <input type="button" class="btn btn-success" id="submitP" value="Subir Archivo">
                    <input type="button" class="btn btn-danger" id="cancel" value="Cancelar">
            </form>
        </div><br>
            <div class="table table-responsive" id="tablaPoli">
                <!--------------------------------------------Tabla de Polizas------------------------------------------>
                <table id="polizas" class="table table-striped">
                    <thead>
                        <th>Póliza</th>
                        <th>Fecha de Inicio</th>
                        <th>Fecha de Termino</th>
                        <th>Opciones</th>
                    </thead>
                    <tbody>
                        <?php foreach($Poliza as $pol):?>
                            <tr>
                                <td><?php echo $pol->Nombre ?></td>
                                <td><?php echo $pol->FechaInicio ?></td>
                                <td><?php echo $pol->FechaTermino ?></td>
                                <td><button type="button" class="btn btn-outline-success ver" value="<?php echo $pol->idPoliza?>" data-toggle="modal" data-target="#ModalPDF"><i class="fa fa-eye" aria-hidden="true"></i></button></td>
                            </tr>
                        <?php endforeach?>
                    </tbody>
                </table>
                <!--------------------------------------------Tabla de Polizas------------------------------------------>
            </div>
        </div>
    </div>

        <!--------------------------------------------Modal VER------------------------------------------>
        <div class="modal fade" id="ModalPDF" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-fluid modal-notify modal-info" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">   
                    
                    </div>
                </div>
            </div>
        </div>
        <!--------------------------------------------Modal VER------------------------------------------>

        <!--------------------------------------------Modal VER Contratos------------------------------------------>
        <div class="modal fade" id="ModalPDFC" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-fluid modal-notify modal-info" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">   
                    
                    </div>
                </div>
            </div>
        </div>
        <!--------------------------------------------Modal VER------------------------------------------>
</fieldset>
<script src="JS/contratos.js"></script>
<?php }?>