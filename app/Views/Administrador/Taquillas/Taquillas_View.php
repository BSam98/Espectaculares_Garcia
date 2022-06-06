<?php 
if((!isset($_SESSION['Usuario'])) || (!isset($_SESSION['idUsuario']))){
    header('Location: http://localhost/Espectaculares_Garcia/public/');
    exit();
}else{
?>
<fieldset id="fieldset">
    <center><h2><i class="fa fa-university" aria-hidden="true"></i>SUPERVISAR TAQUILLAS</h2></center>
    <div class="container-fluid">
        <label><h5><i class="fa fa-search" aria-hidden="true"></i>Elige un Evento: </h5></label><br>
        <select class="form-control" name="evento" id="evento" required>
            <option>Elige un evento</option>
            <?php foreach ($Eventos as $key => $dE) : ?>
                <option value="<?= $dE->idEvento?>"><?= $dE->Nombre?></option>
            <?php endforeach ?>
        </select>
    </div><hr>
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Taquillas activas</a>
            <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Taquillas Inhactivas</a>
    </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <div class="table table-striped">
            <table>
                <thead>
                    <tr>
                        <!--th colspan="3"><center>Datos del evento</center></th-->
                        <th colspan="6"><center>Datos de la taquilla</center></th>
                    </tr>
                    <tr>
                        <!--th>Evento</th-->
                        <!--th>Ciudad</th-->
                        <!--th>Estado</th-->
                        <th>Taquilla</th>
                        <th>Usuario</th>
                        <th>Tarjetas Vendidas</th>
                        <th>Fondo Vendido</th>
                        <th>Fecha</th>
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
                            <td style="vertical-align: middle;"></td>
                            <td style="vertical-align: middle;"></td>
                            <td style="vertical-align: middle;"></td>
                        </tr>
                </tbody>
            </table>
        </div>
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="table table-striped">
                <table>
                    <thead>
                        <tr>
                            <!--th colspan="3"><center>Datos del evento</center></th-->
                            <th colspan="6"><center>Datos de la taquilla</center></th>
                        </tr>
                        <tr>
                            <!--th>Evento</th-->
                            <!--th>Ciudad</th-->
                            <!--th>Estado</th-->
                            <th>Taquilla</th>
                            <th>Encargado</th>
                            <th>Tarjetas asignadas</th>
                            <th>Monto establecido</th>
                            <th>Turno Iniciado</th>
                            <th>Turno Finalizado</th>
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
                                <td style="vertical-align: middle;"></td>
                                <td style="vertical-align: middle;"></td>
                                <td style="vertical-align: middle;"></td>
                            </tr>
                    </tbody>
                </table>
            </div>
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

    $(document).ready(function(){
        $('#evento').change(function(){ 
            var evento=$(this).val();
            //salert(evento);  
            $.ajax({
                url : "",
                method : "POST",
                data : {evento: evento},
                async : true,
                dataType : 'json',
                success: function(data){
                    console.log(data);
                    /*var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option value='+data[i].mencion_perito+'>'+data[i].mencion_perito+'</option>';
                    }
                    $('#sub_category').html(html);*/
                }
            });
            return false;
        }); 
    });
</script>
<?php }?>