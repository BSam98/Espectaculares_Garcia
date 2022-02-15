<?php namespace App\Controllers;

use App\Models\Usuarios_Model;



class Usuarios_Control extends BaseController {

    protected $model;
    protected $request;

    public function _construct(){}

    public function new (){
        $model =new Usuarios_Model();

        $datos = [
            'Usuario'=>$model->listadoUsuarios(),
            'Rango' =>$model->listadoRango(),
            'Evento' =>$model->listadoEventos(),
        ];

        return view ('Usuarios/Usuarios_View', $datos);
    }

    public function agregarUsuarios(){
        $model = new Usuarios_Model();

        $Nombre = $_POST['nombre'];
        $Apellidos = $_POST['apellidos'];
        $CorreoE= $_POST['correo'];
        $NSS = $_POST['nss'];
        $Curp = $_POST['curp'];
        $Usuario = $_POST['usuario'];
        $Contraseña = $_POST['pass'];
        $idRango = $_POST['rango'];
        $idEvento = $_POST['evento'];
        
        $num_elementos = 0;

        while($num_elementos<count($Nombre)){
            
            $datos=[
                'Nombre' =>$Nombre[$num_elementos],
                'Apellidos' =>$Apellidos[$num_elementos],
                'CorreoE' =>$CorreoE[$num_elementos],
                'NSS' =>$NSS[$num_elementos],
                'CURP' => $Curp[$num_elementos],
                'Usuario' =>$Usuario[$num_elementos],
                'Contraseña'=> $Contraseña[$num_elementos],
                'idRango' => $idRango[$num_elementos],
                'idEvento' => $idEvento[$num_elementos],
            ];

            $respuesta = $model->insertarUsuario($datos);

            return redirect()->to(base_url('Usuarios'));
        }
    }

    public function actualizarUsuario(){
        $model = new Usuarios_Model();

        $idUsuario = $_POST['idUsuario'];

        $datos=[
            'Nombre' => $this->request->getVar('UsuarioNombre'),
            'Apellidos' => $this->request->getVar('UsuarioApellido'),
            'CorreoE' => $this->request->getVar('CorreoE'),
            'NSS' => $this->request->getVar('NSS'),
            'CURP' => $this->request->getVar('CURP'),
            'Usuario' => $this->request->getVar('Usuario'),
            'Contraseña' => $this->request->getVar('Contraseña'),
            'idRango' => $this->request->getVar('idRango'),
            'idEvento' => $this->request->getVar('idEvento'),
        ];

        $respuesta = $model->actualizarUsuario($datos,$idUsuario);
        return redirect()->to(base_url('Usuarios'));
    }

    public function create(){
        return "";
    }

}