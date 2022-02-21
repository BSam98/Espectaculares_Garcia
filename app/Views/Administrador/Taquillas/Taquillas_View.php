<fieldset id="fieldset" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000">
        <center><label><h1>SUPERVISAR ATRACCIONES</h1></label></center>
        <!--a href="#myModal" type="button" class="btn btn-success" data-toggle="modal"><i class="bi bi-plus-circle"></i>&nbsp; Nuevo Evento</a-->
        <label for="">Área Asignada: Juegos Mecánicos Infantiles</label><br>

        <div class="container">
            <a href="javascript:mostrar();" class="btn btn-success">
                <img src="https://fenapo.mx/wp-content/uploads/2019/07/Captura-de-pantalla-2019-07-05-a-las-10.40.36.png" alt="" height="200px" width="250px"><br>
                Atracción 1 - Carrusel
            </a>
            <button class="btn btn-success">
                <img src="https://ddmbj.mx/sites/default/files/articles/autos-chocones.jpg" alt="" height="200px" width="250px"><br>    
                Atracción 2 - Carros Chocones
            </button>
            <button class="btn btn-success">
                <img src="https://bestonjuegosmecanicos.com.mx/wp-content/uploads/2018/07/Beston-Gusanito-Juegos-Mecanicos.jpg" alt="" height="200px" width="250px"><br>
                Atracción 3 - 
            </button>
        </div>
<hr>
        <div class="container" style="display: none;" id="supervisarAtracciones"><br>
            <form action="" method="POST" enctype="multipart/form-data">
                <table id="example" class="table table-striped">
                    <center> <h1>ATRACCIÓN 1 - CARRUSEL</h1> </center>
                    <label for="">Capacidad Máxima: </label><br>
                    <label for="">Capacidad Mínima: </label>
                    <thead>
                        <!--Titulos de la tabla-->
                        <!--FILTRAR POR PUNTOS DE VENTA-->
                        <th style="vertical-align: middle;">Ciclo Actual</th>
                        <th style="vertical-align: middle;">Personas a bordo</th>
                        <th style="vertical-align: middle;">Asientos vacios</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="vertical-align: middle;"><input type="text" name="cicloAct" id="cicloAct" placeholder="Ciclo Actual"></td>
                            <td style="vertical-align: middle;"><input type="text" name="pabordo" id=" pabordo" placeholder="Personas a Bordo"></td>
                            <td style="vertical-align: middle;"><input type="text" name="adispo" id="adispo" disabled></td>
                        </tr>
                    </tbody>
                </table>
                <a href="javascript:cerrar();" class="btn btn-success">Agregar</a>
            </form>
        </div>
        
    </fieldset>

    <script type="text/javascript">

        function mostrar() {
            div = document.getElementById('supervisarAtracciones');
            div.style.display = '';
        }

        function cerrar() {
            div = document.getElementById('supervisarAtracciones');
            div.style.display = 'none';
        }
    </script>