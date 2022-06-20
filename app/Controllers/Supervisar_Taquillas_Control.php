<?php

namespace App\Controllers;

use App\Models\Supervisar_Taquillas_Model;

class Supervisar_Taquillas_Control extends BaseController{
    protected $model;
    protected $request;

    public function _construct(){
        $this->request = \Config\Services::request();
    }


    public function ventanillas(){
        $model = new Supervisar_Taquillas_Model();

        $idEvento = $_POST['idEvento'];
        $fecha =$_POST['fecha'];

        $respuesta = $model->ventanillas_Activas($idEvento);
        $respuesta2 = $model->ventanillas_Activas_2($idEvento);
        $respuesta3 = $model->ventanillas_Inactivas($idEvento,$fecha);
        $respuesta4 = $model->ventanillas_Inactivas($idEvento, $fecha);

        echo json_encode(
            array(
                'respuesta'=>true, 
                'ventanillas_Activas_1'=>$respuesta,
                'ventanillas_Activas_2'=>$respuesta2,
                'ventanillas_Inactivas_1' =>$respuesta3,
                'ventanillas_Inactivas_2' =>$respuesta4
            )
        );
    }

    public function ventanillas_Inactivas(){
        $model = new Supervisar_Taquillas_Model();

        $idEvento = $_POST['idEvento'];
        $fecha = $_POST['fecha'];

        $respuesta = $model->ventanillas_Inactivas($idEvento,$fecha);

        echo json_encode(array('respuesta'=>true,'ventanillas'=>$respuesta));
    }
}