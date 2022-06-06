<?php 
namespace App\Controllers;
use App\Models\Usuarios_Model;
use App\Models\Iniciar_Sesion_Administrador_Model;


class Usuarios_Control extends BaseController {

    protected $model;
    protected $request;

    public function _construct(){}

    public function new (){
        session_start([
            'use_only_cookies' => 1,
            'cookie_lifetime' => 0,
            'cookie_secure' => 1,
            'cookie_httponly' => 1
        ]);
        $model =new Usuarios_Model();
        $model2 = new Iniciar_Sesion_Administrador_Model();
        $rango = $_GET['idT'];
        $datos = [
            'Usuario'=>$model->listadoUsuarios(),
            'Rango' =>$model->listadoRango(),
            'Evento' =>$model->listadoEventos(),
            //'Modulos' =>$model->listaModulos(),
            'Privilegios' => $model2->consultarPrivilegiosR($rango),
            //'Rango' => $model->privMod($rol),
        ];
        echo view('../Views/header', $datos);
        //echo view('../Views/menu');
        echo view ('Administrador/Usuarios/Usuarios_View', $datos);
        echo view('../Views/piePagina');
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
        $contador = count($Nombre);
       
        if(1==$contador){
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
        }
        else{
            while($num_elementos<$contador){
            
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
                $num_elementos = $num_elementos + 1;
                //echo json_encode($datos);
            }
        }
        echo json_encode(array('respuesta'=>true,'msj'=>'asdasdasd'));
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
        echo json_encode(array('respuesta'=>true,'msj'=>'asdasdasd'));
    }

    /*public function privilegiosUsuarios(){
        $model = new Usuarios_Model();
        $rol = $_POST['rango'];
        $data = [
            'Modulos'=>$model->listaModulos(),
            'Privilegios'=>$model->privMod($rol)
        ];
        //echo json_encode(array('respuesta'=>true,'msj'=>$data));

        echo json_encode(array('respuesta'=>true,'msj'=>$data));
    }*/

    /*public function insertarPriv(){
        $model = new Usuarios_Model();
        $rol = $_POST['rango'];
        $privilegios = $_POST['select'];
        
        foreach ($privilegios as $privi){
            $pr = explode(" ", $privi);
            $data =$model->insertarPriv($rol, $pr);
        }
         ;
      //  $data = json_decode($rol, true); // true es para recibir un array en $datA
        //echo $data; 
        echo json_encode(array('msj'=>$data));
    }*/

    public function create(){
        return "";
    }

}