<?php namespace App\Controllers;

use CodeIgniter\HTTP\Request;
use App\Models\Iniciar_Sesion_User_Model;


class Iniciar_Sesion_User_Control extends BaseController {

    protected $request;

    public function  _construct(){
        $this->request = \Config\Services::request();
    }

    public function inicioP(){
        $model = new Iniciar_Sesion_User_Model();
        $rango = $_GET['idT'];
        session_start([
            'use_only_cookies' => 1,
            'cookie_lifetime' => 0,
            'cookie_secure' => 1,
            'cookie_httponly' => 1
        ]);
            $data = [ 'Privilegios' => $model->consultaPrivilegios($rango)];
            //echo view('../Views/header');
            echo view('Usuarios/menu_user', $data);
           // echo view('../Views/header',$data);
           // echo view('Usuarios/iniciar_Turno');
           // echo view('../Views/piePagina');
        /*$this->load->view('templates/header',$datos);
        $this->load->view('iniciovt');
        $this->load->view('templates/footer');*/
	}

    public function getBusqueda(){
        session_start([
            'use_only_cookies' => 1,
            'cookie_lifetime' => 0,
            'cookie_secure' => 1,
            'cookie_httponly' => 1
        ]);

        $username = $_POST['usuario'];
        $password = $_POST['pass'];
        $model = new Iniciar_Sesion_User_Model();
        $datos = $model->buscarUsuarios($username,$password);
        if($datos['resultado'] == true){
            $_SESSION['idUsuario']=$datos["idUsuario"];
            $_SESSION['Nombre']=$datos['Nombre'];
            $_SESSION['CorreoE']=$datos['CorreoE'];
            $_SESSION['Usuario']=$datos['Usuario'];
            $_SESSION['Contraseña']=$datos['Contraseña'];
            $_SESSION['idRango']=$datos['idRango'];
            $_SESSION['idEvento']=$datos['idEvento'];
        }
        echo json_encode($datos);
    }
    
    public function Turno(){
        session_start([
            'use_only_cookies' => 1,
            'cookie_lifetime' => 0,
            'cookie_secure' => 1,
            'cookie_httponly' => 1
        ]);
        $model = new Iniciar_Sesion_User_Model();
        $idU = $_GET['t'];
        $data = [
            'Eventos'=>$model->Eventos($idU),
        ];
        //echo view('../Views/header');
        echo view('Usuarios/iniciar_Turno',$data);
        //echo view('../Views/piePagina');
    }

    public function turnoValidador(){
        session_start([
            'use_only_cookies' => 1,
            'cookie_lifetime' => 0,
            'cookie_secure' => 1,
            'cookie_httponly' => 1
        ]);
        $idUser = $_GET['t'];
        $model = new Iniciar_Sesion_User_Model();
        $data = [
            'Eventos'=>$model->Eventos($idUser),
        ];
        //echo view('../Views/header');
        echo view('Usuarios/Turno_Validador_View',$data);
        //echo view('../Views/piePagina.php');
    }



    public function valida(){
        session_start([
            'use_only_cookies' => 1,
            'cookie_lifetime' => 0,
            'cookie_secure' => 1,
            'cookie_httponly' => 1
        ]);
        echo view('../Views/header');
        //echo view('Usuarios/menu_user');
        echo view('Usuarios/validador');
        echo view('../Views/piePagina');
    }

    public function superTaquillas(){
        session_start([
            'use_only_cookies' => 1,
            'cookie_lifetime' => 0,
            'cookie_secure' => 1,
            'cookie_httponly' => 1
        ]);
        //echo view('../Views/header.php');
        //echo view('Usuarios/menu_user');
        //echo view('Usuarios/supervisor_atracciones');
        echo view('Usuarios/Supervisor_Taquillas/Supervisor_Taquillas_View');
        echo view('../Views/piePagina');
        //echo view('../Views/piePagina.php');
        /*echo view('../Views/header');
        echo view('Usuarios/Iniciar_Sesion_User/Menu_Principal_User');
        //echo view('Usuarios/menu_user');
        //echo view('Usuarios/validador');
        echo view('../Views/piePagina');*/
    }

    

   /* public function getBusqueda(){
        $model = new Iniciar_Sesion_User_Model();
        $username = $this->request->getPost('usuario');
        $password = $this->request->getPost('pass');
        $datosUser = $model->Where('Usuario',$username)->Where('Contraseña',$password)->first();
        if($datosUser){
            unset($datosUser['Contraseña']);
            $session = session(); 
            $session->set($datosUser); 
            return $this->__redirectAuth();
            //var_dump($datosUsuario);
            //if($session->Contraseña == $password){// la comparacion tiene que ser con el pass cifrado y la funcion verifyPassword
                //unset($datosUsuario['Contraseña']) para quitar el campo pass del arreglo
              //  echo "<script>alert('Estoy adentro del if:".$session->Contraseña."'); window.location= 'SesionAdmin'</script>"; 
            //}
        }else{
            echo "<script>alert('Usuario Incorrecto'); window.location= 'SesionUser'</script>";
        }
    }*/

    private function __redirectAuth(){
        $session = session(); 
        if($session->idRango == '5'){
            return redirect()->to('/turno')->with('mesage', 'Hola'.$session->Usuario);
        }else{
            if($session->idRango == '6'){
                return redirect()->to('/valida')->with('mesage', 'Hola'.$session->Usuario);
            }else{
                if($session->idRango == '7'){
                    return redirect()->to('/superTaquillas')->with('mesage', 'Hola'.$session->Usuario);
                }
                else{
                    if($session->idRango == '8'){
                        return redirect()->to('/turnoValidador')->with('message','Hola'.$session->Usuario);
                    }
                }
            }
            //var_dump($session->idRango);
           // return redirect()->to('/user')->with('mesage', 'Hola'.$session->Usuario);
        }
    }

    public function logout(){
            session_start();
            session_unset(); 
            session_destroy(); 
            //redirect(base_url());
            return $this->response->redirect(site_url(''));
        /*$session = session();
        //echo $session->Usuario;
        $session->destroy();
		//session()->remove('username');
		return $this->response->redirect(site_url(''));*/
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
        $model = new Iniciar_Sesion_User_Model();
        $fecha = $_POST['fecha'];
        $fondo = $_POST['fondo'];
        $ventanilla = $_POST['ventanilla'];
        $folioI = $_POST['folioi'];
        $folioF = $_POST['foliof'];
        $usuario = $_POST['idUsuario'];
        //$data = $model->insertarTurno($fecha,$fondo,$ventanilla,$usuario);
        $data2 = $model->agregarFajilla($fondo,$ventanilla,$usuario, $fecha,$folioI,$folioF);
        echo json_encode(array('respuesta'=>true,'msj'=>$data2, 'contenido' => $data2));
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