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
                        <th><center>Ciclos</center></th>
                        <th><center>Créditos ingresados</center></th>
                        <th><center>Pases Generados</center></th>
                        <th>Detalles</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td style="vertical-align: middle;"></td>
                            <td style="vertical-align: middle;"></td>
                            <td style="vertical-align: middle;"></td>
                            <td style="vertical-align: middle;"></td>
                            <td style="vertical-align: middle;"></td>
                            <td><a href="#verDetalles" type="button" class="btn btn-success" data-toggle="modal">Ver detalles</a></td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
</fieldset>

<div class="modal fade" id="verDetalles" style="color:black;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <!--center><h5><i class="fa fa-window-restore" aria-hidden="true"></i>&nbsp;Reporte de Movimientos</h5></center-->
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" name="formularioAgregarTarjetasEvento" id="formularioAgregarTarjetasEvento">
                    <div class="table table-responsive" style="color: black;">
                        <center><h5><i class="fa fa-window-restore" aria-hidden="true"></i>&nbsp;Reporte de Atracción</h5></center>                        
                        <table>
                            <thead>
                                <tr>
                                    <!--th><center>Evento</center></th-->
                                    <th><center>Atracción</center></th>
                                    <th><center>Fecha</center></th>
                                    <th><center>Ciclo</center></th>
                                    <th><center>Créditos ingresados por ciclo</center></th>
                                    <th><center>Pases Generados por ciclo</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td style="vertical-align: middle;"></td>
                                        <td style="vertical-align: middle;"></td>
                                        <td style="vertical-align: middle;"></td>
                                        <td style="vertical-align: middle;"></td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>
                </form>                
            </div>                 
        </div>
    </div>
</div>


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