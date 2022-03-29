<fieldset id="fieldset">
    <center><h2><i class="fa fa-star" aria-hidden="true"></i>&nbsp;REPORTE DE ATRACCIONES</h2></center><hr>
    <div class="container">
        <div class="table table-responsive">
            <table>
                <tbody>
                    <tr>
                        <td>
                            <label><h5><i class="fa fa-search" aria-hidden="true"></i>Elige un Evento: </h5></label><br>
                            <select class="form-control" name="evento" id="evento" required>
                                <option>Elige un evento</option>
                                    <option value="">Elige un Evento</option>
                            </select>
                        </td>
                        <td>
                            <form action="#" method="post" target="_blank">
                            <label><h5>Selecciona una Fecha</h5></label><br>
                                <input type="date" name="fechaesperada" id="fechaesperada"> 
                                <!--input type="submit" value="Enviar datos"--></p>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    <hr>
        <div class="table table-striped table-responsive">
            <table>
                <thead>
                    <tr>
                        <!--th><center>Evento</center></th-->
                        <th><center>Atracción</center></th>
                        <th><center>Fecha</center></th>
                        <th><center>Créditos ingresados por ciclo</center></th>
                        <!--th><center>Pases Generados</center></th-->
                        <th><center>Ciclo</center></th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td style="vertical-align: middle;"></td>
                            <td style="vertical-align: middle;"></td>
                            <td style="vertical-align: middle;"></td>
                            <td style="vertical-align: middle;"></td>
                            <td><button type="button" class="btn btn-success">Ver detalles</button></td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>

</fieldset>


<script>

    $('#fechaesperada').change(function () {
            var value = document.getElementById('fechaesperada').value;
            alert('agrego fecha' + value);
        }); 

    $(document).ready(function(){
        $("select.evento").change(function(){
            var selectedCountry = $(this).children("option:selected").val();
            alert("You have selected the country - " + selectedCountry);
        });
    });
</script>