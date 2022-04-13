<?php namespace App\Controllers;

use CodeIgniter\HTTP\Request;
use App\Models\Archivos_Model;
use LengthException;
use CodeIgniter\Files\File;

class archivos_Controler extends BaseController {
    
   public function __construct(){
        $this->request = \Config\Services::request();
        //parent::__construct();
        //$this->load->helper('url');
    }
     
   public function index(){
      $model = new Archivos_Model();
      $data = [
            'Polizas' => $model->consultaPolizas(),
      ];
      
        echo view('../Views/header');
        echo view('../Views/menu');
        echo view('../Views/archivos',$data);
        echo view('../Views/piePagina');
   }
    
   public function fileUpload(){

      $data = array();

      // Read new token and assign to $data['token']
      // $data['token'] = csrf_hash();

      ## Validation
      $validation = \Config\Services::validation();

      $input = $validation->setRules([
         //Establecer validación de archivos
         'file' => 'uploaded[file]|max_size[file,1024]|ext_in[file,jpeg,jpg,docx,pdf],'
      ]);

      if ($validation->withRequest($this->request)->run() == FALSE){
      //Si el archivo no está validado, asigne una respuesta de validación
         $data['success'] = 0;
         $data['error'] = $validation->getError('file');// Error response
      }else{
         if($file = $this->request->getFile('file')) {
            if($file->isValid() && ! $file->hasMoved()) {
               // Get file name and extension
               $name = $file->getName();
               //extension de archivo
               $ext = $file->getClientExtension();

               // Get random file name
               $newName = $file->getRandomName();

               //Si el archivo está validado, lea el nombre y la extensión del archivo y cárguelo en la direccion
               // Store file in public/uploads/ folder
               $file->move('../public/uploads', $newName);

               //Ruta de archivo
               // File path to display preview
               $filepath = base_url()."/uploads/".$newName;

               // Response
               $data['success'] = 1;
               $data['message'] = 'Uploaded Successfully!';
               $data['filepath'] = $filepath;
               $data['extension'] = $ext;

               //ULTIMO QUE AGREGUE
               $model = new Archivos_Model();
               $nombre = $this->request->getPost('nombre');
               $fechai = $this->request->getPost('fechai');
               $fechaf = $this->request->getPost('fechaf');
               $data = $model->subirArchivos($filepath,$nombre,$fechai,$fechaf);

               }else{
                  // Response
               //Si el archivo no se carga, asígnelo  y envíe un mensaje a
                  $data['success'] = 2;
                  $data['message'] = 'Archivo no subido, Intentalo Nuevamente!'; 
               }
            }else{
               // Response
               $data['success'] = 2;
               $data['message'] = 'Archivo no subido, Intentalo Nuevamente!';
            }
         }
         //Retorna $dataArray en formato JSON.
         return $this->response->setJSON($data);
   }   

   public function verPolizas(){
      $idPoliza = $_POST['id'];
      $model = new Archivos_Model();
      $data = $model->consultaPoliza($idPoliza);
      echo json_encode(array('respuesta'=>true,'msj'=>$data));
   }

}
?>
