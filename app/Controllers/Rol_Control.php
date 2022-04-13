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
        /*$data = [
            'Modulos' => $model->consultaModulos()
        ];*/
        echo view('../Views/header');
        echo view('../Views/menu');
        echo view('Administrador/Usuarios/rolesUsuarios');//,$data);
        echo view('../Views/piePagina');
    }

    public function MRol(){
        $rol = $_POST['rol'];
        $model =new Rol_Model();
        $data = $model->consultaModulos($rol);
        echo json_encode(array('respuesta'=>true,'msj'=>$data));
    }

    public function submodulos(){
        $model = new Rol_Model();
        $rol = $_POST['rol'];
        $privilegios = $_POST['select'];
        foreach ($privilegios as $privi){
            $pr = explode(" ", $privi);
            $data = $model->consultaSubM($rol, $pr);
        }
        //$data = $model->consultaSubM();
        echo json_encode(array('msj'=>$data));
    }

    public function agregarP(){
        $array[]='';
        $model = new Rol_Model();
        $rol = $_POST['rol'];
        $modulos = $_POST['select'];
        $submodulos = $_POST['select2'];
        foreach ($modulos as $mod){
            $modul = explode(" ", $mod);
            $data = $model->agregarM($rol, $modul);
        }
        echo json_encode(array('msj'=>$data)); 
    }
}