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
        echo view('../Views/header');
        echo view('../Views/menu');
        echo view ('Administrador/Asociados/Asociados_View',$datos);
        echo view('../Views/piePagina');
    }

    public function create(){
        return "";
    }
}