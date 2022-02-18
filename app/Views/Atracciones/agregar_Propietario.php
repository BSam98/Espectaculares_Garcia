<div class="modal fade" id="agregarPropi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Agregar Propietario</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form enctype="multipart/form-data" name="formulario" id="formularioAgregarPropietario">
                    <div class="table table-striped table-responsive">
                        <table id="tab" class="table table-bordered">
                            <thead>
                                <th scope="col" style="vertical-align: middle;">Nombre</th>
                                <th scope="col" style="vertical-align: middle;">Apellido Paterno</th>
                                <th scope="col" style="vertical-align: middle;">Apellido Materno</th>
                                <th scope="col" style="vertical-align: middle;">Dirección</th>
                                <th scope="col" style="vertical-align: middle;">Teléfono</th>
                                <th scope="col" style="vertical-align: middle;">RFC</th>
                                <th scope="col" style="vertical-align: middle;">Fecha de Nacimiento</th>
                            </thead>
                            <tbody>
                                <tr class="fila-fila">
                                    <td><input class="form-control" type="text"  id="na" required name="na[]" placeholder="Nombre"/></td>
                                    <td><input class="form-control" type="text"  id="app" required name="app[]" placeholder="Apellido Paterno"/></td>
                                    <td><input class="form-control" type="text"  id="apm" required name="apm[]" placeholder="Apellido Materno"/></td>
                                    <td><input class="form-control" type="text"  id="dir" required name="dir[]" placeholder="Dirección"/></td>
                                    <td><input class="form-control" type="number"  id="tel" required name="tel[]" placeholder="Telefono"/></td>
                                    <td><input class="form-control" type="text"  id="rfc" required name="rfc[]" placeholder="RFC"/></td>
                                    <td><input class="form-control" type="date"  id="dat" required name="dat[]" placeholder="Fecha de Nacimiento"/></td>
                                    <td class="elim"><input type="button" value="-"/></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                        <button id="adi" name="adicional" type="button" class="btn btn-warning"> + </button>
                        <button name="adicional" type="submit" class="btn btn-success" id ="agregarPropietario">Agregar </button>
                </form>   
                        
                <div class="table table-striped table-responsive ">
                    <!--Tabla-->
                    <table id="examplePro" class="table table-bordered"><!--tenia id="tablas"-->
                        <thead>
                            <th style="vertical-align: middle;"></th>
                            <th style="vertical-align: middle;">Nombre</th>
                            <th style="vertical-align: middle;">Apellido Paterno</th>
                            <th style="vertical-align: middle;">Apellido Materno</th>
                            <th style="vertical-align: middle;">Direccion</th>
                            <th style="vertical-align: middle;">Telefono</th>
                            <th style="vertical-align: middle;">RFC</th>
                            <th style="vertical-align: middle;">Fecha de Nacimiento</th>
                        </thead>
                        <tbody>
                            <?php foreach ($Propietario as $key => $dP) : ?>
                                <tr>
                                    <td><a href="#ePropietario" class="btn btn-warning editarPropietario" data-book-id='{"idPropietario":<?=$dP->idPropietario?>,"Nombre":"<?=$dP->Nombre?>","ApellidoP":"<?=$dP->ApellidoP?>","ApellidoM":"<?=$dP->ApellidoM?>","Direccion":"<?=$dP->Direccion?>","Telefono":"<?=$dP->Telefono?>","RFC":"<?=$dP->RFC?>","FechaNacimiento":"<?=$dP->FechaNacimiento?>"}' data-toggle="modal"><i class="bi bi-pencil-square btn btn-warning"></i></a></td>
                                    <td><?= $dP->Nombre ?></td>
                                    <td><?= $dP->ApellidoP?></td>
                                    <td><?= $dP->ApellidoM?></td>
                                    <td><?= $dP->Direccion?></td>
                                    <td><?= $dP->Telefono?></td>
                                    <td><?= $dP->RFC?></td>
                                    <td><?= $dP->FechaNacimiento?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <button class="btn btn-danger" id="cerrar">Cerrar</button>
            </div>
        </div>
    </div>
</div>

