
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
