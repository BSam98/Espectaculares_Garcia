<?php namespace App\Controllers;
use CodeIgniter\HTTP\Request;
use App\Models\Iniciar_Sesion_Administrador_Model;

class Iniciar_Sesion_Administrador_Control extends BaseController {
    protected $request;
    //protected $model;

    public function  _construct(){
        $this->request = \Config\Services::request();
        //$this->model = new Iniciar_Sesion_Administrador_Model();
    }
    
    public function new (){
        return view ('Iniciar_Sesion_Administrador/Iniciar_Sesion_Administrador_View');
    }

    public function getBusqueda(){

        $model = new Iniciar_Sesion_Administrador_Model();
        $Usuario = $this->request->getVar('usuario');
        $Contraseña = (binary) ($this->request->getVar('pass'));
        //$respuesta = $this->model->where('Usuario',$Usuario ,'AND','Contraseña',$Contraseña)->findAll();
        $respuesta =$model->where( 'usuario',$Usuario ,'AND','pass',$Contraseña)->findAll();
        echo json_encode($respuesta);
        
        if(empty($respuesta)){
            echo 'Datos incorrectos';
        } else{
            echo 'Datos correctos';
            return redirect()->to(base_url('Menu_Principal_Administrador'));
        }
    }

    public function create(){
        return "";
    }
}