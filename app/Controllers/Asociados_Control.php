<?php namespace App\Controllers;

use App\Models\Asociados_Model;

class Asociados_Control extends BaseController {

    protected $model;
    protected $request;

    public function new (){
        $model = new Asociados_Model();

        $datos =[
            'Asociacion'=>$model->listadoAsociacion(),
            'Asociados' => $model->listadoAsociados()
        ];

        return view ('Asociados/Asociados_View',$datos);
    }

    public function create(){
        return "";
    }
}