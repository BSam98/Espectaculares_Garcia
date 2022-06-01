<fieldset id="fieldset">
    <center><h2><i class="far fa-file-pdf ml-1 text-black"></i> &nbsp;Contratos Y Pólizas</h2></center>

    <!--------------------------------------------Agregar Contrato------------------------------------------>

    <ul class="nav nav-tabs" id="nav-tab" role="tablist">
        <li role="presentation" class="active"><a href="#contrato" class="nav-link active" data-toggle="tab" aria-expanded="true" style="color: black; font-size: 15px;">Contratos</a></li>
        <li role="presentation" class=""><a href="#poliza" class="nav-link" data-toggle="tab" aria-expanded="false" style="color: black; font-size: 15px;">Pólizas</a></li>
    </ul>

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade active in" id="contrato"><br>
            <button class="btn btn-success agregarCon" id="agregar"><i class="fa fa-plus-circle" aria-hidden="true"></i>Agregar Contrato</button><br>
            <!--------------------------------------------Agregar Contrato------------------------------------------>
            <div class="container" id="agregarContrato" style="display:none"> 
                <form method="post" action="addContrato" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Ingresa el nombre del contrato</label>
                        <input type="text" class="form-control" name="nombre" id="nombre">
                    </div>
                    <div class="form-group">
                        <label>Fecha Inicio</label>
                        <input type="date" name="fechaInicio" id="fechaInicio">
                        <label>Fecha Termino</label>
                        <input type="date" name="fechaFin" id="fechaFin">
                    </div>
                    <div class="form-group">
                        <label for="file">Elige un Archivo:</label>
                        <input type="file" class="form-control" id="file" name="file" />
                    </div>
                        <input type="button" class="btn btn-success" id="submitC" value="Subir Archivo">
                        <input type="button" class="btn btn-danger" id="cancelC" value="Cancelar">
                </form>
            </div><br>
            <div class="table table-striped table-responsive" id="tablaContrato">
                <!--------------------------------------------Tabla de Contratos------------------------------------------>
                <table class="table table-bordered" id="contratos">
                    <thead>
                        <th scope="col" style="vertical-align: middle;">Contrato</th>
                        <th scope="col" style="vertical-align: middle;">Fecha de Inicio</th>
                        <th scope="col" style="vertical-align: middle;">Fecha de Termino</th>
                        <th scope="col" style="vertical-align: middle;">Opciones</th>
                    </thead>
                    <tbody>
                        <?php foreach($Contrato as $con):?>
                            <tr>
                            <td><?php echo $con->Nombre ?></td>
                                <td><?php echo $con->FechaInicio ?></td>
                                <td><?php echo $con->FechaTermino ?></td>
                                <td><button type="button" class="btn btn-outline-success verCoti" value="<?php echo $con->idContrato?>" data-toggle="modal" data-target="#ModalPDFC"><i class="fa fa-eye" aria-hidden="true"></i></button></td>
                            </tr>
                        <?php endforeach?>
                    </tbody>
                </table>
                <!--------------------------------------------Tabla de Contratos------------------------------------------>
            </div>
        </div>

        <div role="tabpanel" class="tab-pane fade" id="poliza"><br>
        
        <button class="btn btn-success agregar" id="agregar"><i class="fa fa-plus-circle" aria-hidden="true"></i>Agregar Póliza</button><br>
        <!--------------------------------------------Agregar Poliza------------------------------------------>
        <div class="container" id="agregarPoliza" style="display:none"> 
            <form method="post" action="users/fileUpload" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Ingresa el nombre de la póliza</label>
                    <input type="text" class="form-control" name="nombre" id="nombre">
                </div>
                <div class="form-group">
                    <label>Fecha Inicio</label>
                    <input type="date" name="fechaInicio" id="fechaInicio">
                    <label>Fecha Termino</label>
                    <input type="date" name="fechaFin" id="fechaFin">
                </div>
                <div class="form-group">
                    <label for="file">Elige un Archivo:</label>
                    <input type="file" class="form-control" id="file" name="file" />
                </div>
                    <input type="button" class="btn btn-success" id="submitP" value="Subir Archivo">
                    <input type="button" class="btn btn-danger" id="cancel" value="Cancelar">
            </form>
        </div><br>
            <div class="table table-responsive" id="tablaPoli">
                <!--------------------------------------------Tabla de Polizas------------------------------------------>
                <table id="polizas" class="table table-striped">
                    <thead>
                        <th>Póliza</th>
                        <th>Fecha de Inicio</th>
                        <th>Fecha de Termino</th>
                        <th>Opciones</th>
                    </thead>
                    <tbody>
                        <?php foreach($Poliza as $pol):?>
                            <tr>
                                <td><?php echo $pol->Nombre ?></td>
                                <td><?php echo $pol->FechaInicio ?></td>
                                <td><?php echo $pol->FechaTermino ?></td>
                                <td><button type="button" class="btn btn-outline-success ver" value="<?php echo $pol->idPoliza?>" data-toggle="modal" data-target="#ModalPDF"><i class="fa fa-eye" aria-hidden="true"></i></button></td>
                            </tr>
                        <?php endforeach?>
                    </tbody>
                </table>
                <!--------------------------------------------Tabla de Polizas------------------------------------------>
            </div>
        </div>
    </div>

        <!--------------------------------------------Modal VER------------------------------------------>
        <div class="modal fade" id="ModalPDF" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-fluid modal-notify modal-info" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">   
                    
                    </div>
                </div>
            </div>
        </div>
        <!--------------------------------------------Modal VER------------------------------------------>

        <!--------------------------------------------Modal VER Contratos------------------------------------------>
        <div class="modal fade" id="ModalPDFC" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-fluid modal-notify modal-info" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">   
                    
                    </div>
                </div>
            </div>
        </div>
        <!--------------------------------------------Modal VER------------------------------------------>
</fieldset>

<!-- Script --> 
<script type="text/javascript">
    $(document).ready(function(){

   //abrir modal para ver archivos PDF Polizas
        $(document).on("click",".ver", function(){
            id = $(this).val();
            $.ajax({
               url: "verPoliza",
               type:"POST",
               dataType:"JSON ",
               data:{'id':id},
            }).done(function(data) {
               //console.log(data.msj);
               var html='';
               for(var i = 0;i<data.msj.length; i++){
                  html += '<object class="PDFdoc" width="100%" height="500px" type="application/pdf" data="'+data.msj[i]['Direccion']+'"></object>'+
                  '<div class="modal-footer justify-content-center">'+
                     '<a href="'+data.msj[i]['Direccion']+'" download="'+data.msj[i]['Nombre']+'" class="btn btn-success">Descargar Archivo</a>'+
                     '<a type="button" class="btn btn-outline-info waves-effect" data-dismiss="modal">Cerrar <i class="fas fa-times ml-1"></i></a>'+
                  '</div>';
               }
               $("#ModalPDF .modal-body").html(html);
            });
        });


    //abrir modal para ver archivos PDF Contratos
        $(document).on("click",".verCoti", function(){
            id = $(this).val();
            $.ajax({
               url: "verCotizacion",
               type:"POST",
               dataType:"JSON ",
               data:{'id':id},
            }).done(function(data) {
               //console.log(data.msj);
               var html='';
                for(var i = 0;i<data.msj.length; i++){
                    html += '<object class="PDFdoc" width="100%" height="500px" type="application/pdf" data="'+data.msj[i]['Direccion']+'"></object>'+
                            '<div class="modal-footer justify-content-center">'+
                                '<a href="'+data.msj[i]['Direccion']+'" download="'+data.msj[i]['Nombre']+'" class="btn btn-success">Descargar Archivo</a>'+
                                '<a type="button" class="btn btn-outline-info waves-effect" data-dismiss="modal">Cerrar <i class="fas fa-times ml-1"></i></a>'+
                            '</div>';
                }
               $("#ModalPDFC .modal-body").html(html);
            });
        });

    //Agregar nueva poliza
        $( ".agregar" ).click(function(){
            $('#agregarPoliza').show();
            $('.agregar').hide();
            $('#tablaPoli').hide();
        });
    //cancelar subida de poliza
        $( "#cancel" ).click(function(){
            $('#agregarPoliza').hide();
            $('.agregar').show();
            $('#tablaPoli').show();
        });

    //Agregar nuevo Contrato
        $( ".agregarCon" ).click(function(){
            $('#agregarContrato').show();
            $('.agregarCon').hide();
            $('#tablaContrato').hide();
        });
    //cancelar subida de contrato
        $( "#cancelC" ).click(function(){
            $('#agregarContrato').hide();
            $('.agregarCon').show();
            $('#tablaContrato').show();
        });

   //formulario de agregar poliza
      $('#submitP').click(function(){
         var nombre = $('#nombre').val();
         var fechai = $('#fechaInicio').val(); 
         var fechaf = $('#fechaFin').val(); 

         // Get the selected file
         var files = $('#file')[0].files;

         if(files.length >= 0){
            //pase el archivo seleccionado usando el objeto FormData. 
            var fd = new FormData();

            // Append data 
            fd.append('file',files[0]);
            fd.append('nombre',nombre);
            fd.append('fechai',fechai);
            fd.append('fechaf',fechaf);
            //  fd.append([csrfName],csrfHash);

            // AJAX request 
            $.ajax({
               url: "<?=site_url('users/fileUpload')?>",
               method: 'POST',
               data: fd,
               contentType: false,
               processData: false,
               dataType: 'JSON',
               success: function(response){
                  if(response.success == 1){  // Uploaded successfully
                     // EL ARCHIVO SE CARGO CORRECTAMENTE
                        alert('El archivo se cargo correctamente');
                        location.reload();
                     }else if(response.success == 2){ // File not uploaded
                     //EL ARCHIVO NO ESTA CARGADO
                        alert('Error al cargar el archivo');
                        location.reload();
                     }else{
                     //no es igual a 1 o 2 significa que el archivo no está validado.
                        alert('Archivo NO valido');
                       // location.reload();
                     }
                  },
                  error: function(response){
                     console.log("error : " + JSON.stringify());
                     location.reload();
                  }
               });
            }else{
               //Si el archivo no esta seleccionado imprime msj
               alert("Por favor, Elige un archivo.");
            }
      });

    //formulario de agregar contrato
    $('#submitC').click(function(){
         var nombre = $('#nombre').val();
         var fechai = $('#fechaInicio').val(); 
         var fechaf = $('#fechaFin').val(); 

         // Get the selected file
         var files = $('#file')[0].files;

         if(files.length >= 0){
            //pase el archivo seleccionado usando el objeto FormData. 
            var fd = new FormData();

            // Append data 
            fd.append('file',files[0]);
            fd.append('nombre',nombre);
            fd.append('fechai',fechai);
            fd.append('fechaf',fechaf);
            //  fd.append([csrfName],csrfHash);

            // AJAX request 
            $.ajax({
               url: "<?=site_url('addContrato')?>",
               method: 'POST',
               data: fd,
               contentType: false,
               processData: false,
               dataType: 'JSON',
               success: function(response){
                  if(response.success == 1){  // Uploaded successfully
                     // EL ARCHIVO SE CARGO CORRECTAMENTE
                        alert('El archivo se cargo correctamente');
                        //location.reload();
                     }else if(response.success == 2){ // File not uploaded
                     //EL ARCHIVO NO ESTA CARGADO
                        alert('Error al cargar el archivo');
                        //location.reload();
                     }else{
                     //no es igual a 1 o 2 significa que el archivo no está validado.
                        alert('Archivo NO valido');
                       // location.reload();
                     }
                  },
                  error: function(response){
                     console.log("error : " + JSON.stringify( ) );
                     location.reload();
                  }
               });
            }else{
               //Si el archivo no esta seleccionado imprime msj
               alert("Por favor, Elige un archivo.");
            }
      });

    //paginacion de tabla
        $('#polizas').DataTable( {
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
            //"order": [[ 0, "desc" ]]//Ordenar (columna,orden)
        });

    //Contratos de tabla
        $('#contratos').DataTable( {
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
            //"order": [[ 0, "desc" ]]//Ordenar (columna,orden)
        });
   });
</script>