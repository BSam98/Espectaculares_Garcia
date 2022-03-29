<?php

namespace App\Controllers;
use App\Models\Iniciar_Sesion_Administrador_Model;

class Home extends BaseController
{
    public function index()
    {
        echo view('header');
        echo view('index');
        echo view('piePagina');
    }

    /*public function login(){
        $usuario = $this->request->getPost('usuario');
		$password = $this->request->getPost('pass');

        $model = new Iniciar_Sesion_Administrador_Model();

        $datosUsuario = $model->obtenerUsuario(['Usuario'=>$usuario]);

        if($usuario == $datosUsuario[0]['Usuario'] && ($password == $datosUsuario[0]['Contraseña'])){
            $data = [
                'usuario' => $datosUsuario[0]['Usuario'],
                'type' => $datosUsuario[0]['idRango']
            ];

            $session = session();
            $session->set($data);
            return redirect()->to(base_url('/inicio'))->with('mensaje', '1');
        }else{
            echo "<script>alert('Usuario o Contraseña Incorrecta'); window.location= 'SesionAdmin'</script>"; 
        }
    }
*/

    public function admin(){
        /*$mensaje = session('mensaje');
        return view('Administrador/Iniciar_Sesion_Administrador/Iniciar_Sesion_Administrador_View', ["mensaje"=>$mensaje]);*/
        return view('Administrador/Iniciar_Sesion_Administrador/Iniciar_Sesion_Administrador_View');
    }

   /* public function inicio(){
        echo view('header');
        echo view('menu');
        echo view('Administrador/Menu_Principal_Administrador/Menu_Principal_View');
        echo view('piePagina');
    }*/

    public function user(){
        return view('Usuarios/Iniciar_Sesion_User/Iniciar_Sesion_User_View');
    }
}
