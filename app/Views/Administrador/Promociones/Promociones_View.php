
            <!--/Contenedor Superior-->
<!--ESTA TABLA ENTRARIA EN UN CICLO PARA HACER UNA TABLA POR PROMOCION-->
            <fieldset id="fieldset" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
                <label><h2>Promocion Dos x Uno</h2></label>
                <br>
                <a href="#modal_nueva_promocion" type="button" class="btn btn-success agregar_promocion" data-toggle="modal" data-book-id='{"Promocion":1}' style="transition-duration: 3s, 5s;"><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Nueva Promoción</a>
                <div class="contenedorTabla">
                    <br>
                    <!--Tabla-->
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                        <!--Titulos de la tabla-->
                            <th style="vertical-align: middle;">Nombre</th>
                            <th style="vertical-align: middle;">Precio</th>
                            <th style="vertical-align: middle;">Eventos</th>
                        <!--/Titutlos de la tabla-->
                        </thead>
                        <tbody>
                            <?php foreach($DosxUno as $key => $dD): ?>
                                <tr>
                                    <td style="vertical-align: middle;"><?= $dD->Nombre?></td>
                                    <td style="vertical-align: middle;"><?= $dD->Precio?></td>
                                    <td style="vertical-align: middle;"><a href="#ver_Promocion_Evento"  class="btn btn-outline-success verEventos" data-toggle="modal"  data-book-id='{"idPromocion":<?=$dD->idDosxUno?>,"tipoPromocion":1}' ><i class="fa fa-eye" aria-hidden="true"></i></a></button></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </fieldset>

            <fieldset id="fieldset" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
                
                <label><h2>Pulsera Mágica</h2></label>
                <br>
                <a href="#modal_nueva_promocion" type="button" class="btn btn-success agregar_promocion" data-toggle="modal" data-book-id='{"Promocion":2}' style="transition-duration: 3s, 5s;"><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Nueva Promoción</a>
                <div class="contenedorTabla">
                    <br>
                    <table id="example2" class="table table-bordered">
                        <thead>
                        <!--Titulos de la tabla-->
                            <th style="vertical-align: middle;">Nombre</th>
                            <th style="vertical-align: middle;">Precio</th>
                            <th style="vertical-align: middle;">Eventos</th>
                        <!--/Titutlos de la tabla-->
                        </thead>
                        <tbody>
                            <?php foreach($PulseraMagica as $key => $dP): ?>
                                <tr>
                                    <td style="vertical-align: middle;"><?=$dP->Nombre?></td>
                                    <td style="vertical-align: middle;"><?=$dP->Precio?></td>
                                    <td style="vertical-align: middle;"><a href="#ver_Promocion_Evento"  class="btn btn-outline-success verEventos" data-toggle="modal"  data-book-id='{"idPromocion":<?=$dP->idPulseraMagica?>,"tipoPromocion":2}' ><i class="fa fa-eye" aria-hidden="true"></i></a></button></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <!--/Tabla-->

                </div>
            
            </fieldset>

            <fieldset id="fieldset" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
                
                <label><h2>Juegos Grátis</h2></label>
                <br>
                <a href="#modal_nueva_promocion" type="button" class="btn btn-success agregar_promocion" data-toggle="modal" data-book-id='{"Promocion":3}' style="transition-duration: 3s, 5s;"><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Nueva Promoción</a>
                <div class="contenedorTabla">
                    <br>
                    <!--Tabla-->
                    <table id="example3" class="table table-bordered">
                        <thead>
                        <!--Titulos de la tabla-->
                            <th style="vertical-align: middle;">Nombre</th>
                            <th style="vertical-align: middle;">Precio</th>
                            <th style="vertical-align: middle;">Eventos</th>
                        </thead>
                        <!--/Titutlos de la tabla-->
                        <tbody>
                            <?php foreach($JuegosGratis as $key => $dJ): ?>
                                <tr>
                                    <td style="vertical-align: middle;"><?=$dJ->Nombre?></td>
                                    <td style="vertical-align: middle;"><?=$dJ->Precio?></td>
                                    <td style="vertical-align: middle;"><a href="#ver_Promocion_Evento"  class="btn btn-outline-success verEventos" data-toggle="modal"  data-book-id='{"idPromocion":<?=$dJ->idJuegosGratis?>,"tipoPromocion":3}' ><i class="fa fa-eye" aria-hidden="true"></i></a></button></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <!--/Tabla-->
                </div>
            </fieldset>

            <fieldset id="fieldset" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
                <label><h2>Creditos de Cortesía</h2></label>
                <br>
                <a href="#modal_nueva_promocion" type="button" class="btn btn-success agregar_promocion" data-toggle="modal" data-book-id='{"Promocion":4}' style="transition-duration: 3s, 5s;"><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Nueva Promoción</a>
                <div class="contenedorTabla"><br>
                    <!--Tabla-->
                    <table id="example4" class="table table-bordered">
                        <thead>
                        <!--Titulos de la tabla-->
                            <th style="vertical-align: middle;">Nombre</th>
                            <th style="vertical-align: middle;">Precio</th>
                            <th style="vertical-align: middle;">Creditos</th>
                            <th style="vertical-align: middle;">Eventos</th>
                        </thead>
                            <!--/Titutlos de la tabla-->
                            <tbody>
                                <?php foreach($CreditosCortesia as $key => $dC): ?>
                                    <tr>
                                        <td style="vertical-align: middle;"><?=$dC->Nombre?></td>
                                        <td style="vertical-align: middle;"><?=$dC->Precio?></td>
                                        <td style="vertical-align: middle;"><?=$dC->Creditos?></td>
                                        <td style="vertical-align: middle;"><a href="#ver_Promocion_Evento"  class="btn btn-outline-success verEventos" data-toggle="modal"  data-book-id='{"idPromocion":<?=$dC->idCC?>,"tipoPromocion":4}' ><i class="fa fa-eye" aria-hidden="true"></i></a></button></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                    </table>
                    <!--/Tabla-->
                </div>
            </fieldset>    
            <?php
                include 'agregar_Promociones.php';
                include 'Promociones_Evento.php';
            ?>
            <script src="JS/promociones.js"></script>      

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
            "order": false//Ordenar (columna,orden)
        });
    });

    $(document).ready(function() {
            $('#example2').DataTable( {
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
                "order": false//Ordenar (columna,orden)
            });
        });

        $(document).ready(function() {
            $('#example3').DataTable( {
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
                "order": false//Ordenar (columna,orden)
            });
        });

        $(document).ready(function() {
            $('#example4').DataTable( {
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
                "order": false//Ordenar (columna,orden)
            });
        });
</script>