<!--div id="principal"-->
    <!--Contenedor Superior-->
<?php 
if((!isset($_SESSION['Usuario']))  || (!isset($_SESSION['idUsuario']))){
    header('Location: http://localhost/Espectaculares_Garcia/public/');
    exit();
}else{
?>
<fieldset id="fieldset" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" style="color:black;">
    <div id="principal">
    <center><h2 style="color:black;">ATRACCIONES</h2></center>
    <!--a href="" type="button" class="btn btn-success" data-toggle="modal" data-target="#agregarPropi"><i class="bi bi-plus-circle"></i>&nbsp;Nueva Atracción</a-->
    <div class="container">
        <a href="" id="abrir_Modal_Atracciones" type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" style="transition-duration: 3s, 5s;"><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Nueva Atracción</a>
        <a href="javascript:mostrar();" class="btn btn-success"><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Nuevo Propietario</a><br>
    </div> 

    <div class="contenedorTabla" style="color:black;"><br>
        <table id="example" class="table table-striped table-responsive table-bordered" style="color:black;">
            <thead>
                <th style="text-align: center; vertical-align: middle;"></th>
                <th style="text-align: center; vertical-align: middle;">Nombre</th>
                <th style="text-align: center; vertical-align: middle;">Renta</th>
                <th style="text-align: center; vertical-align: middle;">Propietario</th>
                <th style="text-align: center; vertical-align: middle;">Capacidad maxima</th>
                <th style="text-align: center; vertical-align: middle;">Capacidad minima</th>
                <th style="text-align: center; vertical-align: middle;">Largo(m)</th>
                <th style="text-align: center; vertical-align: middle;">Ancho(m)</th>
                <th style="text-align: center; vertical-align: middle;">Duración por ciclo</th>
                <th style="text-align: center; vertical-align: middle;">Tiempo de espera</th>   
            </thead>
            <tbody>
                <?php foreach ($Atraccion as $key => $dA) : ?>
                    <tr>
                        <td style="text-align: center; vertical-align: middle;"><a href="#eAtraccion" class ="btn btn-outline-warning editarAtraccion" data-toggle="modal" data-book-id='{"idAtraccion":<?= $dA->idAtraccion?>,"Atraccion":"<?= $dA->Atraccion?>","Renta":<?= $dA->Renta?>,"Nombre":"<?= $dA->Nombre?>","CapacidadMAX":<?= $dA->CapacidadMAX?>,"CapacidadMIN":<?= $dA->CapacidadMIN?>,"Tiempo":"<?= $dA->Tiempo?>","TiempoMAX":"<?= $dA->TiempoMAX?>"}'><i class="fa fa-paint-brush" aria-hidden="true"></i></a></td>
                        <td style="text-align: center; vertical-align: middle;"><?= $dA->Atraccion?></td>
                        <td style="text-align: center; vertical-align: middle;"><?= $dA->Renta?></td>
                        <td style="text-align: center; vertical-align: middle;"><?= $dA->Nombre?></td>
                        <td style="text-align: center; vertical-align: middle;"><?= $dA->CapacidadMAX?></td>
                        <td style="text-align: center; vertical-align: middle;"><?= $dA->CapacidadMIN?></td>
                        <td style="text-align: center; vertical-align: middle;"><?=$dA->Largo?></td>
                        <td style="text-align: center; vertical-align: middle;"><?=$dA->Ancho?></td>
                        <td style="text-align: center; vertical-align: middle;"><?= $dA->Tiempo?></td>
                        <td style="text-align: center; vertical-align: middle;"><?= $dA->TiempoMAX?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    </div>

    <!--Contenedor del propietario-->
    <div class = "contenedorOculto" id ="contenedorOculto" style="color:black; display:none;">
        <!--div class="contenedorTablaPropietario" id = "contenedorTablaPropietario" style="color:black;"-->  
        <div class="input-group">
        <a href ="javascript:cerrar();"><span class="badge badge-danger"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbsp;Regresar</span></a>&nbsp;&nbsp;&nbsp;
            <center><h2>Agregar Propietario</h2> </center>         
            <!--Ventana del propietario-->
        </div>
            <div class="contenedorTabla1" style="color:black;">
                    <!--AGREGAR PROPIETARIO-->                    
                    <form enctype="multipart/form-data" name="formulario" id="formularioAgregarPropietario">
                        <div class="table table-striped table-responsive">
                            <table id="tab" class="table table-bordered" style="color:black;">
                                <thead>
                                    <th scope="col" style="text-align: center; vertical-align: middle;">Nombre</th>
                                    <th scope="col" style="text-align: center; vertical-align: middle;">Apellido Paterno</th>
                                    <th scope="col" style="text-align: center; vertical-align: middle;">Apellido Materno</th>
                                    <th scope="col" style="text-align: center; vertical-align: middle;">Dirección</th>
                                    <th scope="col" style="text-align: center; vertical-align: middle;">Teléfono</th>
                                    <th scope="col" style="text-align: center; vertical-align: middle;">RFC</th>
                                    <th scope="col" style="text-align: center; vertical-align: middle;">Fecha de Nacimiento</th>
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
                        <button name="adicional" type="button" class="btn btn-success" id ="agregarPropietario">Agregar </button>
                    </form>   
                        
                    <div class="table table-striped table-responsive ">
                        <!--Tabla-->
                        <table id="examplePro" class="table table-bordered" style="color:black;"><!--tenia id="tablas"-->
                            <thead>
                                <th style="text-align: center; vertical-align: middle;"></th>
                                <th style="text-align: center; vertical-align: middle;">Nombre</th>
                                <th style="text-align: center; vertical-align: middle;">Apellido Paterno</th>
                                <th style="text-align: center; vertical-align: middle;">Apellido Materno</th>
                                <th style="text-align: center; vertical-align: middle;">Dirección</th>
                                <th style="text-align: center; vertical-align: middle;">Teléfono</th>
                                <th style="text-align: center; vertical-align: middle;">RFC</th>
                                <th style="text-align: center; vertical-align: middle;">Fecha de Nacimiento</th>
                            </thead>
                            <tbody>
                                <?php foreach ($Propietario as $key => $dP) : ?>
                                    <tr>
                                        <td style="text-align: center; vertical-align: middle;"><a href="#ePropietario" class="editarPropietario" data-book-id='{"idPropietario":<?=$dP->idPropietario?>,"Nombre":"<?=$dP->Nombre?>","ApellidoP":"<?=$dP->ApellidoP?>","ApellidoM":"<?=$dP->ApellidoM?>","Direccion":"<?=$dP->Direccion?>","Telefono":"<?=$dP->Telefono?>","RFC":"<?=$dP->RFC?>","FechaNacimiento":"<?=$dP->FechaNacimiento?>"}' data-toggle="modal"><i class="fa fa-paint-brush btn btn-outline-warning" aria-hidden="true"></i></a></td>
                                        <td style="text-align: center; vertical-align: middle;"><?= $dP->Nombre ?></td>
                                        <td style="text-align: center; vertical-align: middle;"><?= $dP->ApellidoP?></td>
                                        <td style="text-align: center; vertical-align: middle;"><?= $dP->ApellidoM?></td>
                                        <td style="text-align: center; vertical-align: middle;"><?= $dP->Direccion?></td>
                                        <td style="text-align: center; vertical-align: middle;"><?= $dP->Telefono?></td>
                                        <td style="text-align: center; vertical-align: middle;"><?= $dP->RFC?></td>
                                        <td style="text-align: center; vertical-align: middle;"><?= $dP->FechaNacimiento?></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <!--/Ventana del propietario-->                   
        <!--/div-->
    </!--div>
</fieldset>
    <!--/Contenedor del propietario-->

    <?php  //include('editarPropietario.php')?>
    <?php 
        include 'editarAtraccion.php' ;
        include 'nuevaAtr.php';
        include 'editarPropietario.php';
    ?>
<script>
    function mostrar() {
        div = document.getElementById('contenedorOculto');
        div.style.display = '';
        prin = document.getElementById('principal');
        prin.style.display = 'none';
    }

    function cerrar() {
        div = document.getElementById('principal');
        div.style.display = '';
        prin = document.getElementById('contenedorOculto');
        prin.style.display = 'none';

    }
</script>
<script src="JS/atracciones.js"></script>
<script src="JS/carga.js"></script>
<?php }?>