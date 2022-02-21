<?php namespace App\Controllers;

use CodeIgniter\HTTP\Request;
use App\Models\Iniciar_Sesion_User_Model;
//use App\Models\Atracciones_Model;


class Iniciar_Sesion_User_Control extends BaseController {

    protected $request;
    //protected $model;

    public function  _construct(){
        $this->request = \Config\Services::request();
        //$this->model = new Iniciar_Sesion_Administrador_Model();
    }
    
    public function new (){
        return view ('Usuarios/Iniciar_Sesion_User/Iniciar_Sesion_User_View');
    }

    public function getBusqueda(){
        
        $Usuario = new Iniciar_Sesion_User_Model();

            $data = [
                "Usuario" => $this->request->getVar('usuario'),
                "Contraseña" => $this->request->getVar('pass')
            ];

            $datosUsuario = $Usuario->obtenerUsuario($data);
            echo json_encode($datosUsuario);

            if($datosUsuario > 0){
                $session = session();
                echo $session->set($data);

                return redirect()->to(base_url('Menu_Principal_User'));
            }else{
                echo "Error, datos no encontrados";
            }
    }

}