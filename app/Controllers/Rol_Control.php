<?php namespace App\Controllers;
use CodeIgniter\HTTP\Request;
use App\Models\Rol_Model;
use App\Models\Iniciar_Sesion_Administrador_Model;
use LengthException;
use Mpdf\Tag\Legend;

//use App\Models\Atracciones_Model;


class Rol_Control extends BaseController {

    public function  _construct(){
        $this->request = \Config\Services::request();
    }
    
    public function rol(){
        session_start([
            'use_only_cookies' => 1,
            'cookie_lifetime' => 0,
            'cookie_secure' => 1,
            'cookie_httponly' => 1
        ]);
        $model =new Rol_Model();
        $model2 = new Iniciar_Sesion_Administrador_Model();
        $rango = $_GET['idT'];
        $datos = [
            'Privilegios' => $model2->consultarPrivilegiosR($rango),
            'Privilegio' =>$model->privilegios(),
            'Modulos' =>$model->listaModulos(),
        ];
        echo view('../Views/header',$datos);
        echo view('Administrador/Usuarios/rolesUsuarios',$datos);//,$data);
        echo view('../Views/piePagina');
    }

    public function ModulRol(){
        $rol = $_POST['rango'];
        $model =new Rol_Model();
        $data = [
                'Privilegios' =>$model->consultaModulos($rol),
                'Modulos' =>$model->listaModulos(),
                ];
        echo json_encode(array('respuesta'=>true,'msj'=>$data));
    }

    public function editarPrivilegios(){
        $opciones = $_POST['op'];
        $rango = $_POST['rango'];
        $model =new Rol_Model();
        $datos = $model->eliminarPrivilegios($rango);
        if($datos){
            for($i=0;$i<count($opciones);$i++){
                $sql = "INSERT INTO Privilegios (privilegio_Modulo, rango_Id) VALUES ('".$opciones[$i]."','".$rango."')";
                $data = $model->consulta($sql);
            }
        }
        echo json_encode(array('respuesta'=>true,'msj'=>$data));
    }

    public function nuevoRol(){
        $model =new Rol_Model();
        $nombreR = $_POST['nombreRol'];
        $modulos = $_POST['modulos'];
        $insertar = $model->agregarRango($nombreR);
        if($insertar){
            for($i=0;$i<count($modulos);$i++){
                $sql = "INSERT INTO Privilegios (privilegio_Modulo, rango_Id) VALUES('".$modulos[$i]."','".$insertar."')";
                //$sql = "INSERT INTO Privilegios (privilegio_Modulo, rango_Id) VALUES ('".$opciones[$i]."','".$rango."')";
                $data = $model->consulta($sql);
            }
        }
        echo json_encode(array('respuesta'=>true,'msj'=>$data));
    }

   /* public function submodulos(){
        $model = new Rol_Model();
        $rol = $_POST['rol'];
        $privilegios = $_POST['select'];
        foreach ($privilegios as $privi){
            $pr = explode(" ", $privi);
            $data = $model->consultaSubM($rol, $pr);
        }
        //$data = $model->consultaSubM();
        echo json_encode(array('msj'=>$data));
    }*/

    /*public function agregarP(){
        $array[]='';
        $model = new Rol_Model();
        $rol = $_POST['rol'];
        $modulos = $_POST['select'];
        $submodulos = $_POST['select2'];
        foreach ($modulos as $mod){
            $modul = explode(" ", $mod);
            $data = $model->agregarM($rol, $modul);
        }
        echo json_encode(array('msj'=>$data)); 
    }*/
}