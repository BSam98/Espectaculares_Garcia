<?php namespace App\Controllers;

use App\Models\Tarjetas_Model;

class Tarjetas_Control extends BaseController {

    protected $model;
    protected $request;

    public function _construct(){}

    public function new (){

        $model = new Tarjetas_Model();

        $datos = [
            'Tarjeta' => $model->listadoTarjetas(),
            'Lote' => $model->listadoLotes()
        ];

        return view ('Tarjetas/Tarjetas_View',$datos);
    }

    public function create(){
        return "";
    }
}