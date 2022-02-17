
            <!--/Contenedor Superior-->
<!--ESTA TABLA ENTRARIA EN UN CICLO PARA HACER UNA TABLA POR PROMOCION-->
            <fieldset id="fieldset">
                <label><h2>Promocion Dos x Uno</h2></label>
                <div class="contenedorTabla">
                    <br>
                    <!--Tabla-->
                    <table id="example" class="table table-bordered">
                        <thead>
                            <!--Titulos de la tabla-->
                            <tr>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Calendario</th>
                                <th>Calendario</th>
                            </tr>
                            <!--/Titutlos de la tabla-->
                            <tbody>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tbody>
                        </thead>
                    </table>
                </div>
            </fieldset>

            <fieldset id="fieldset">
                
                <legend>Pulsera Magica</legend>
                
                <div class="contenedorTabla">
                    <br>
                    <table id="example2" class="table table-bordered">

                        <thead>
                            <!--Titulos de la tabla-->
                            <tr>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Calendario</th>
                                <th>Evento</th>
                            </tr>
                            <!--/Titutlos de la tabla-->

                            <tbody>
                            </tbody>

                        </thead>

                    </table>
                    <!--/Tabla-->

                </div>
            
            </fieldset>

            <fieldset id="fieldset">
                
                <legend>Juegos Gratis</legend>

                <!--input type="search" name="buscarJuegosGratis" placeholder="Buscar Promocíon Juegos Gratis">

                <input type="submit" value="Buscar"-->

                
                <button onClick="">Agregar</button>

                <div class="contenedorTabla">
                    <br>
                    <!--Tabla-->
                    <table id="example3" class="table table-bordered">

                        <thead>
                            <!--Titulos de la tabla-->
                            <tr>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Calendario</th>
                                <th>Evento</th>

                            </tr>
                            <!--/Titutlos de la tabla-->

                            <tbody>
                            </tbody>

                        </thead>

                    </table>
                    <!--/Tabla-->

                </div>
            
            </fieldset>

            <fieldset id="fieldset">
                <label><h2>Creditos de Cortesía</h2></label>
                <div class="contenedorTabla"><br>
                    <!--Tabla-->
                    <table id="example4" class="table table-bordered">
                        <thead>
                            <!--Titulos de la tabla-->
                            <tr>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Creditos</th>
                                <th>Eventos</th>
                            </tr>
                            <!--/Titutlos de la tabla-->
                            <tbody>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tbody>
                        </thead>
                    </table>
                    <!--/Tabla-->
                </div>
            </fieldset>            

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
                "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
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
                "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
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
                "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
            });
        });
</script>