<?php namespace App\Controllers;

use App\Models\Eventos_Model;

class Eventos_Control extends BaseController {

    protected $model;
    protected $request;
    
    public function _construct(){}

    public function new (){
        $model = new Eventos_Model();

        $datos = [
            'Eventos' => $model->listadoEventos(),
            'AtraccionesEvento' => $model->listado_Atracciones_Por_Evento()
        ];
        return view ('Eventos/Eventos_View', $datos);
    }

    public function create(){
        return "";
    }
}

/*
class Eventos_Control extends BaseController {
    public function new (){
        return view ('Eventos/Eventos_View');
    }

    public function create(){
        return "";
    }
}*/