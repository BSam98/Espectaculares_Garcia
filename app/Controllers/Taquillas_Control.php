<?php namespace App\Controllers;

use App\Models\Taquillas_Model;



class Taquillas_Control extends BaseController {

    protected $model;
    protected $request;

    public function _construct(){}

    public function new (){

        $model = new Taquillas_Model();

        $datos = [
            'Eventos' => $model->listadoEventos()
        ];
        
        echo view('../Views/header');
        echo view('../Views/menu');
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

    public function taquillas_Activas(){
        $model = new Taquillas_Model();

        $idEvento = $_POST['idEvento'];

        $respuesta = $model->taquillas_Activas($idEvento);

        echo json_encode(array('respuesta'=>true,'taquillas'=>$respuesta));
    }

    public function ventanillas_Activas(){
        $model = new Taquillas_Model();

        $idEvento = $_POST['idEvento'];
        $idTaquilla = $_POST['idTaquilla'];

        $respuesta = $model->ventanillas_Activas($idEvento,$idTaquilla);

        $respuesta2 = $model->ventanillas_Activas_2($idEvento,$idTaquilla);
        
        echo json_encode(array('respuesta'=>true,'ventanilla1'=>$respuesta2,'ventanilla2'=>$respuesta));
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