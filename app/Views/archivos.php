<fieldset id="fieldset">
    <center><h2><i class="far fa-file-pdf ml-1 text-black"></i> &nbsp; Pólizas</h2></center>
<!-- CSRF token
   Cree un elemento oculto para almacenar el nombre del token CSRF especificado en  .env el archivo en el  name atributo y almacene el hash CSRF en el  value atributo.--> 
   <input type="hidden" class="txt_csrfname" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />

   <button class="btn btn-success agregar" id="agregar"><i class="fa fa-plus-circle" aria-hidden="true"></i>Agregar Póliza</button>
<br>
      <div class="container" id="agregarPoliza" style="display:none">
         <!-- File upload form FORMULARIO DE SUBIR ARCHIVO-->
         <form method="post" action="users/fileUpload" enctype="multipart/form-data">
            <div class="form-group">
               <label>Ingresa el nombre del archivo</label>
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
            <input type="button" class="btn btn-success" id="submit" value="Subir Archivo">
            <input type="button" class="btn btn-danger" id="cancel" value="Cancelar">
         </form>
      </div>
<br>
      <div class="container" id="mostrarPolizas">
         <div class="table table-responsive table-striped">
            <table style="color:black" id="polizas">
               <thead>
                  <th>Poliza</th>
                  <th>Fecha de Inicio</th>
                  <th>Fecha de Termino</th>
                  <th>Opciones</th>
               </thead>
               <tbody>
                  <?php foreach($Polizas as $poli):?>
                     <tr>
                        <td><?php echo $poli->Nombre?></td>
                        <td><?php echo $poli->FechaInicio?></td>
                        <td><?php echo $poli->FechaTermino?></td>
                        <td><button type="button" class="btn btn-outline-success ver" value="<?php echo $poli->idPoliza?>" data-toggle="modal" data-target="#ModalPDF"><i class="fa fa-eye" aria-hidden="true"></i></button></td>
                        <!--td><i class="fa fa-download" aria-hidden="true"></i></td-->
                     </tr>
                  <?php endforeach?>
               </tbody>
            </table>
         </div>
      </div>


<!--Modal VER-->
<div class="modal fade" id="ModalPDF" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg modal-fluid modal-notify modal-info" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">   
       
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>

</fieldset>

<!-- Script -->
<script type="text/javascript">
   $(document).ready(function(){
   //abrir modal para ver archivos PDF
         $(document).on("click",".ver", function(){
            id = $(this).val();
            alert(id);

            $.ajax({
               url: "verPoliza",
               type:"POST",
               dataType:"JSON ",
               data:{'id':id},
            }).done(function(data) {
               console.log(data.msj);
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

   //Agregar nueva poliza
         $( ".agregar" ).click(function(){
            $('#agregarPoliza').show();
            $('#agregar').hide();
            $('#mostrarPolizas').hide();
         });
   //cancelar subida de poliza
         $( "#cancel" ).click(function(){
            $('#agregarPoliza').hide();
            $('#agregar').show();
            $('#mostrarPolizas').show();
         });
   //formulario de agregar poliza
      $('#submit').click(function(){
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
                        location.reload();
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
   });
</script>