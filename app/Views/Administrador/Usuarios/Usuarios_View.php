    <!--/Contenedor Superior-->
<?php 
    if((!isset($_SESSION['Usuario'])) || (!isset($_SESSION['idUsuario']))){
        header('Location: http://localhost/Espectaculares_Garcia/public/');
        exit();
    }else{
?>
    <fieldset id="fieldset" style="color:black;" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
        <center><label><h1>USUARIOS</h1></label></center>
        <a href="" type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Nuevo Usuario</a>
        <!--button onClick="">Nuevo Usuario</button-->
        <div class="contenedorTabla"><br>
            <div class="table table-responsive">
            <!--Tabla Principal-->
                <table id="example" class="table table-striped">
                    <thead>
                        <th></th>
                        <th style="text-align: center; vertical-align: middle;">Nombre</th>
                        <th style="text-align: center; vertical-align: middle;">Apellidos</th>
                        <th style="text-align: center; vertical-align: middle;">Correo electronico</th>
                        <th style="text-align: center; vertical-align: middle;">NSS</th>
                        <th style="text-align: center; vertical-align: middle;">CURP</th>
                        <th style="text-align: center; vertical-align: middle;">Usuario</th>
                        <th style="text-align: center; vertical-align: middle;">Contraseña</th>
                        <th style="text-align: center; vertical-align: middle;">Rango</th>
                        <th style="text-align: center; vertical-align: middle;"> Evento</th>
                    </thead>
                    <tbody>
                        <?php foreach ($Usuario as $key => $dU) : ?>
                            <tr>
                                <td style="text-align: center; vertical-align: middle;"><a href="#eUsuario" class="editarUsuario" data-book-id='{"idUsuario":<?=$dU->idUsuario?>,"UsuarioNombre":"<?=$dU->UsuarioNombre?>","UsuarioApellido":"<?=$dU->UsuarioApellido?>","CorreoE":"<?=$dU->CorreoE?>","NSS":<?=$dU->NSS?>,"CURP":"<?=$dU->CURP?>","Usuario":"<?=$dU->Usuario?>","Contraseña":"<?=$dU->Contraseña?>"}' data-toggle="modal"><i class="fa fa-paint-brush btn btn-outline-warning" aria-hidden="true"></i></a></td>
                                <td style="text-align: center; vertical-align: middle;"><?= $dU->UsuarioNombre?></td>
                                <td style="text-align: center; vertical-align: middle;"><?= $dU->UsuarioApellido?></td>
                                <td style="text-align: center; vertical-align: middle;"><?= $dU->CorreoE?></td>
                                <td style="text-align: center; vertical-align: middle;"><?= $dU->NSS?></td>
                                <td style="text-align: center; vertical-align: middle;"><?= $dU->CURP?></td>
                                <td style="text-align: center; vertical-align: middle;"><?= $dU->Usuario?></td>
                                <td style="text-align: center; vertical-align: middle;"><?= $dU->Contraseña?></td>
                                <td style="text-align: center; vertical-align: middle;"><?= $dU->Nombre?></td>
                                <td style="text-align: center; vertical-align: middle;"><?= $dU->Ciudad?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>                                                             

    </fieldset>            
    
<!--/Contenedor Principal-->
    <?php 
        include 'editarUsuarios.php';
        include 'agregarUsuario.php';
    ?>
    
<script src="JS/usuarios.js"></script>
<script src="JS/carga.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable( {
            "aProcessing": true,//Activamos el procesamiento del datatables
            "aServerSide": true,//Paginación y filtrado realizados por el servidor
            dom: 'Bfrtip',//Definimos los elementos del control de tabla
            buttons: [		          
                        'copyHtml5',
                        'excelHtml5',
                        'csvHtml5',
                        'pdf'
                    ],
            "bDestroy": true,
            "iDisplayLength": 15,//Paginación
            "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
        });
    });
</script>
<?php }?>
