<?php namespace App\Controllers;

use App\Models\Contratos_Model;
use App\Models\Iniciar_Sesion_Administrador_Model;

class Contratos_Control extends BaseController {

    protected $model;
    protected $request;

    public function _construct(){
       // $this->request = \Config\Services::request();
        $this->load->model('Contratos_Model');
    }

    public function new (){
      session_start([
         'use_only_cookies' => 1,
         'cookie_lifetime' => 0,
         'cookie_secure' => 1,
         'cookie_httponly' => 1
     ]);
        $model = new Contratos_Model();
        $model2 = new Iniciar_Sesion_Administrador_Model();
        $rango = $_GET['idT'];
        $data = [
            'Contrato' => $model->consultaContrato(),
            'Poliza' => $model->consultaPoliza(),
            'Privilegios' => $model2->consultarPrivilegiosR($rango),
         ];
        echo view('../Views/header',$data);
        //echo view('../Views/menu');
        echo view ('Administrador/Contratos/Contratos_View',$data);
        echo view('../Views/piePagina');
    }

    public function verPolizas(){
        $idPoliza = $_POST['id'];
        $model = new Contratos_Model();
        $data = $model->consultaPolizaId($idPoliza);
        echo json_encode(array('respuesta'=>true,'msj'=>$data));
    }

    public function verContra(){
        $idContra = $_POST['id'];
        $model = new Contratos_Model();
        $data = $model->consultaCotraId($idContra);
        echo json_encode(array('respuesta'=>true,'msj'=>$data));
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
                 $model = new Contratos_Model();
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

    public function fileUploadContrato(){
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
                 $model = new Contratos_Model();
                 $nombre = $this->request->getPost('nombre');
                 $fechai = $this->request->getPost('fechai');
                 $fechaf = $this->request->getPost('fechaf');
                 $data = $model->subirArchivosContrato($filepath,$nombre,$fechai,$fechaf);
  
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

}