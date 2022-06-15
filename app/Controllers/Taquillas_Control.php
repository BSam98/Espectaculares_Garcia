<?php namespace App\Controllers;
use App\Models\Taquillas_Model;
use App\Models\Iniciar_Sesion_Administrador_Model;

class Taquillas_Control extends BaseController {

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
        $model = new Taquillas_Model();
        $model2 = new Iniciar_Sesion_Administrador_Model();
        $rango = $_GET['idT'];
        $datos = [
            'Eventos' => $model->listadoEventos(),
            'Privilegios' => $model2->consultarPrivilegiosR($rango),
        ];
        
        echo view('../Views/header', $datos);
       // echo view('../Views/menu');
        echo view ('Administrador/Taquillas/Taquillas_View', $datos);
        echo view('../Views/piePagina');
    }

    function listaEventos(){
        $model = new Taquillas_Model();

        $evento_id =[
                'idEvento' => $this->request->getvar('evento'),
        ];
        $data = $model->leventos($evento_id);
        echo json_encode($data);
    }

    public function taquillas_Inactivas(){
        $model = new Taquillas_Model();

        $idEvento = $_POST['idEvento'];
        $fecha = $_POST['fecha'];

        $respuesta = $model->taquillas_Inactivas($idEvento,$fecha);

        echo json_encode(array('respuesta'=>true, 'taquillas'=>$respuesta));
    }

    public function ventanillas_Inactivas(){
        $model = new Taquillas_Model();

        $idTaquilla = $_POST['idTaquilla'];
        $idEvento = $_POST['idEvento'];
        $fecha = $_POST['fecha'];

        $respuesta = $model->ventanillas_Inactivas($idTaquilla,$idEvento,$fecha);
        $valor = false;
        if(count($respuesta)){

            $valor= true;
            echo json_encode(array('respuesta'=>true,'ventanillas'=>$respuesta,'resultado'=>$valor));
        }
        else{
            $valor= false;

            $respuesta = $model->ventanillas_Inactivas_2($idTaquilla, $idEvento, $fecha);
            echo json_encode(array('respuesta'=>true,'ventanillas'=>$respuesta,'resultado'=>$valor));
        }
    }

}