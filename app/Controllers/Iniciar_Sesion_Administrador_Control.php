<?php namespace App\Controllers;

use CodeIgniter\HTTP\Request;
use App\Models\Iniciar_Sesion_Administrador_Model;
use Mpdf\Tag\Legend;

//use App\Models\Atracciones_Model;


class Iniciar_Sesion_Administrador_Control extends BaseController {

    public function  _construct(){
        $this->request = \Config\Services::request();
        $this->load->model('Iniciar_Sesion_Administrador_Model');
        //$this->model = new Iniciar_Sesion_Administrador_Model();
    }
    
    public function login(){
        
    }

    public function getBusqueda(){

        $model = new Iniciar_Sesion_Administrador_Model();

        $username = $this->request->getPost('usuario');
        $password = $this->request->getPost('pass');

        $datosUsuario = $model->Where('Usuario',$username)->Where('Contraseña',$password)->first();

        if($datosUsuario){

            unset($datosUsuario['Contraseña']);
            //var_dump($datosUsuario);
            $session = session(); 
            $session->set($datosUsuario); 
            return $this->_redirectAuth();
            //var_dump($datosUsuario);

            //if($session->Contraseña == $password){// la comparacion tiene que ser con el pass cifrado y la funcion verifyPassword
                //unset($datosUsuario['Contraseña']) para quitar el campo pass del arreglo
              //  echo "<script>alert('Estoy adentro del if:".$session->Contraseña."'); window.location= 'SesionAdmin'</script>"; 
            //}

        }else{
            echo "<script>alert('Usuario Incorrecto'); window.location= 'SesionAdmin'</script>";
        }
    }

    public function new (){
        /*if (!session()->get('isLoggedIn')){
            return redirect()->to('/SesionAdmin');
        }*/
        
        echo view('../Views/header');
        echo view('../Views/menu');
        echo view('Administrador/Menu_Principal_Administrador/Menu_Principal_View.php');
        echo view('../Views/piePagina');
    }

    private function _redirectAuth(){
        $session = session(); 
        if($session->idRango == '4'){
            return redirect()->to('/new')->with('mesage', 'Hola'.$session->Usuario);
        }else{
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