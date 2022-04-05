<?php namespace App\Controllers;

use CodeIgniter\HTTP\Request;
use App\Models\Rol_Model;
use LengthException;
use Mpdf\Tag\Legend;

//use App\Models\Atracciones_Model;


class Rol_Control extends BaseController {

    public function  _construct(){
        $this->request = \Config\Services::request();
    }
    
    public function rol(){
        $model =new Rol_Model();
        $data = [
            'Modulos' => $model->consultaModulos()
        ];
        echo view('../Views/header');
        echo view('../Views/menu');
        echo view('Administrador/Usuarios/rolesUsuarios', $data);
        echo view('../Views/piePagina');
    }

    public function submodulos(){
        $modulo = $_POST['modulo'];
        $model =new Rol_Model();
        $data = $model->consultaSubM($modulo);
        echo json_encode(array('respuesta'=>true,'msj'=>$data));
    }
}