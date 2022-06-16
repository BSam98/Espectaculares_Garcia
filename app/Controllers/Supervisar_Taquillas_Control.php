<?php

namespace App\Controllers;

use App\Models\Supervisar_Taquillas_Model;

class Supervisar_Taquillas_Control extends BaseController{
    protected $model;
    protected $request;

    public function _construct(){
        $this->request = \Config\Services::request();
    }


    public function ventanillas_Activas(){
        $model = new Supervisar_Taquillas_Model();

        $idEvento = $_POST['idEvento'];

        $respuesta = $model->ventanillas_Activas($idEvento);

        echo json_encode(array('respuesta'=>true, 'ventanillas'=>$respuesta));
    }

    public function ventanillas_Inactivas(){
        $model = new Supervisar_Taquillas_Model();

        $idEvento = $_POST['idEvento'];
        $fecha = $_POST['fecha'];

        $respuesta = $model->ventanillas_Inactivas($idEvento,$fecha);

        echo json_encode(array('respuesta'=>true,'ventanillas'=>$respuesta));
    }
}