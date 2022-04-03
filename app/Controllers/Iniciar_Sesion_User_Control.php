<?php namespace App\Controllers;

use CodeIgniter\HTTP\Request;
use App\Models\Iniciar_Sesion_User_Model;


class Iniciar_Sesion_User_Control extends BaseController {

    protected $request;
    //protected $model;

    public function  _construct(){
        $this->request = \Config\Services::request();
    }
    
    //public function new (){
        public function turno (){
            $model = new Iniciar_Sesion_User_Model();
            $data = [
                'Eventos'=>$model->Eventos(),
            ];
            echo view('../Views/header.php');
            echo view('Usuarios/iniciar_Turno',$data);
            echo view('../Views/piePagina');
        }
        public function valida(){
            echo view('../Views/header');
            echo view('Usuarios/menu_user');
            echo view('Usuarios/validador');
            echo view('../Views/piePagina');
        }
        public function superTaquillas(){
            echo view('../Views/header');
            echo view('Usuarios/Iniciar_Sesion_User/Menu_Principal_User');
            //echo view('Usuarios/menu_user');
            //echo view('Usuarios/validador');
            echo view('../Views/piePagina');
        }
        //return view ('Usuarios/Iniciar_Sesion_User/Iniciar_Sesion_User_View');
    //}

    public function getBusqueda(){
        
        $model = new Iniciar_Sesion_User_Model();

        $username = $this->request->getPost('usuario');
        $password = $this->request->getPost('pass');

        $datosUser = $model->Where('Usuario',$username)->Where('Contraseña',$password)->first();
        if($datosUser){

            unset($datosUser['Contraseña']);
            //var_dump($datosUsuario);
            $session = session(); 
            $session->set($datosUser); 
            return $this->__redirectAuth();
            //var_dump($datosUsuario);

            //if($session->Contraseña == $password){// la comparacion tiene que ser con el pass cifrado y la funcion verifyPassword
                //unset($datosUsuario['Contraseña']) para quitar el campo pass del arreglo
              //  echo "<script>alert('Estoy adentro del if:".$session->Contraseña."'); window.location= 'SesionAdmin'</script>"; 
            //}

        }else{
            echo "<script>alert('Usuario Incorrecto'); window.location= 'SesionAdmin'</script>";
        }
    }

    private function __redirectAuth(){
        $session = session(); 
        if($session->idRango == '5'){
            return redirect()->to('/turno')->with('mesage', 'Hola'.$session->Usuario);
        }else{
            if($session->idRango == '7'){
                return redirect()->to('/valida')->with('mesage', 'Hola'.$session->Usuario);
            }else{
                if($session->idRango == '8'){
                    return redirect()->to('/superTaquillas')->with('mesage', 'Hola'.$session->Usuario);
                }
            }
            var_dump($session->idRango);
           // return redirect()->to('/user')->with('mesage', 'Hola'.$session->Usuario);
        }
    }

    public function logout(){
        $session = session();
        //echo $session->Usuario;
        $session->destroy();
		//session()->remove('username');
		return $this->response->redirect(site_url(''));
	}
}