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
        public function Turno (){
            $session = session();
            $idUser = $session->idUsuario;
            $model = new Iniciar_Sesion_User_Model();

            $data = [
                'Eventos'=>$model->Eventos($idUser),
            ];

            echo view('../Views/header');
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
            echo view('../Views/header.php');
            echo view('Usuarios/menu_user');
            echo view('Usuarios/supervisor_atracciones');
            echo view('../Views/piePagina.php');
            /*echo view('../Views/header');
            echo view('Usuarios/Iniciar_Sesion_User/Menu_Principal_User');
            //echo view('Usuarios/menu_user');
            //echo view('Usuarios/validador');
            echo view('../Views/piePagina');*/
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
        echo ('entra 1');
        $session = session(); 
        if($session->idRango == '5'){
            echo ('entra 2');
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

    public function Zonas(){
        $model = new Iniciar_Sesion_User_Model();
        $evento = $_POST['evento'];
        $data = $model->zonasEvento($evento);
        echo json_encode(array('respuesta'=>true,'msj'=>$data));
    }

    public function Taquillas(){
        $model = new Iniciar_Sesion_User_Model();
        $zona = $_POST['zona'];
        $data = $model->taquillasZona($zona);
        echo json_encode(array('respuesta'=>true,'msj'=>$data));
    }
    public function Ventanillas(){
        $model = new Iniciar_Sesion_User_Model();
        $taquilla = $_POST['taquilla'];
        $data = $model->ventanillaTaquillas($taquilla);
        echo json_encode(array('respuesta'=>true,'msj'=>$data));
    }

    public function guardarDatos(){
        date_default_timezone_set('America/Mexico_City');
        $fecha = date("Y-m-d H:i:s");

        $fondo = $_POST['fondo'];
        $ventanilla = $_POST['ventanilla'];
        $folioI = $_POST['folioi'];
        $folioF = $_POST['foliof'];
        $usuario = $_POST['idUsuario'];
        //$evento = $_POST['eventoId'];
        $model = new Iniciar_Sesion_User_Model();
        $data = $model->insertarTurno($fecha,$fondo,$ventanilla,$folioI,$folioF,$usuario);
        //$data['result'] = $data1->getResultArray();
        /*$respuesta=true;
        $msj='datoscorrectos';*/
        //$data=array('respuesta'=>$respuesta,'contenido'=>$data,'msj'=>$msj);
        //echo json_encode($data);
        echo json_encode(array('respuesta'=>true,'msj'=>$data));
    }

    /*public function consultaDatosT(){
        $evento = $_POST['evento'];
        $zona = $_POST['zona'];
        $taquilla = $_POST['taquilla'];
        $ventanilla = $_POST['ventanilla'];
        $usuario = $_POST['usuario'];
        $model = new Iniciar_Sesion_User_Model();
        $data = $model->consultarTurno($evento,$zona,$taquilla,$ventanilla,$usuario);
        echo json_encode(array('respuesta'=>true,'msj'=>$data));
    }*/
}