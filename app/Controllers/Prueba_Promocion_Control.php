<?php

namespace App\Controllers;

use App\Models\Prueba_Promocion_Model;
class Prueba_Promocion_Control extends BaseController{
    protected $model;
    protected $request;

    public function _construct(){
        $this->request = \Config\Services::request();
    }

    public function mostrar_Promociones(){
        $model = new Prueba_Promocion_Model();
        

        $datos = $model->mostrar_Promociones();

        echo json_encode(array('respuesta'=>true,'msj'=>$datos));
    }
}