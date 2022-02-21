<?php namespace App\Controllers;

use CodeIgniter\HTTP\Request;
use App\Models\Iniciar_Sesion_Administrador_Model;
//use App\Models\Atracciones_Model;


class Iniciar_Sesion_Administrador_Control extends BaseController {

    protected $request;
    //protected $model;

    public function  _construct(){
        $this->request = \Config\Services::request();
        //$this->model = new Iniciar_Sesion_Administrador_Model();
    }
    
    public function new (){
        return view ('Administrador/Iniciar_Sesion_Administrador/Iniciar_Sesion_Administrador_View');
    }

    public function getBusqueda(){
        
        $Usuario = new Iniciar_Sesion_Administrador_Model();
        
       // $usuario = $this->request->getPost('usuario');
       // $password = $this->request->getPost('pass');

        
      //  echo json_encode($datosUsuario);
       // if(count($datosUsuario) > 0){

            $data = [
                "Usuario" => $this->request->getVar('usuario'),
                "Contraseña" => $this->request->getVar('pass')
            ];

            $datosUsuario = $Usuario->obtenerUsuario($data);
            echo json_encode($datosUsuario);

            if($datosUsuario > 0){
                $session = session();
                echo $session->set($data);

                return redirect()->to(base_url('Menu_Principal_Administrador'));
            }else{
                echo "Error, datos no encontrados";
            }
  //  }


   /* public function getBusqueda(){
        $session = \Config\Services::session();
        $model = new Iniciar_Sesion_Administrador_Model();
        $Usuario = $this->request->getVar('usuario');
        $Contraseña = (binary) ($this->request->getVar('pass'));
        $respuesta =$model->where( 'usuario',$Usuario ,'AND','pass',$Contraseña)->findAll();
        echo json_encode($respuesta);
        
        if(empty($respuesta)){
            echo 'Datos incorrectos';
        } else{
            echo 'Datos correctos';
            return redirect()->to(base_url('Menu_Principal_Administrador'));
        }
    }
*/
    }

    public function create(){
        return "";
    }
}