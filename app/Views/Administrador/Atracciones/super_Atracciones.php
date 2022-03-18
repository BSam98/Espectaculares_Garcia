<fieldset id="fieldset">
    <center><h2><i class="fa fa-star" aria-hidden="true"></i>&nbsp;SUPERVISAR ATRACCIONES&nbsp;<i class="fa fa-star" aria-hidden="true"></i></h2></center><hr>
    <div class="container">
        <div class="table table-striped table-responsive">
            <table>
                <thead>
                    <tr>
                        <th><center>Evento</center></th>
                        <th><center>Atracción</center></th>
                        <th><center>Fecha</center></th>
                        <th><center>Créditos Ingresados</center></th>
                        <th><center>Pases Generados</center></th>
                        <th><center>Ciclos Realizados</center></th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td style="vertical-align: middle;"></td>
                            <td style="vertical-align: middle;"></td>
                            <td style="vertical-align: middle;"></td>
                            <td style="vertical-align: middle;"></td>
                            <td style="vertical-align: middle;"></td>
                            <td style="vertical-align: middle;"></td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
</fieldset>


<script>
    $(document).ready(function(){
        $("select.evento").change(function(){
            var selectedCountry = $(this).children("option:selected").val();
            alert("You have selected the country - " + selectedCountry);
        });
    });
</script>