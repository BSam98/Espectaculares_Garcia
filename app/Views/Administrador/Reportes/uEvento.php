<fieldset id="fieldset" data-aos="fade-up" data-aos-anchor-placement="top-bottom" data-aos-duration="1000" style="background-color: white;color:black;">
    <center><label><h2>Utilizacion por Evento</h2></label></center>
    <form enctype="multipart/form-data">
        <div>
            <form action="#" method="post" target="_blank">
                <label><h5>Selecciona una Fecha:  </h5></label>
                <input type="date" name="fechaesperada" id="fechaesperada"> 
                <!--input type="submit" value="Enviar datos"--></p>
            </form>
        </div>
        <div class="table table-striped table-responsive">
                <table id="tabla_Reporte_Evento" class="table table-bordered">
                    <thead>
                        <th scope="col" style="text-align: center; vertical-align: middle;">Evento</th>
                        <th scope="col" style="text-align: center; vertical-align: middle;">Personas</th>
                        <th scope="col" style="text-align: center; vertical-align: middle;">Descuentos</th>
                        <th scope="col" style="text-align: center; vertical-align: middle;">Pulsera Mágica</th>
                        <th scope="col" style="text-align: center; vertical-align: middle;">Juegos Grátis</th>
                        <!--<th scope="col" style="text-align: center; vertical-align: middle;">Fecha</th>-->
                    </thead>
                    <tbody id="Reporte_Evento">
                    </tbody>
                </table>
        </div>
    </form>
</fieldset><!--/Ventana de la atracción-->

<script src="JS/reportesPersonas.js"></script>
<script src="JS/carga.js"></script>

