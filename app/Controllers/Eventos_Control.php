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

        echo view('../Views/header');
        echo view('../Views/menu');
        echo view ('Eventos/Eventos_View', $datos);
        echo view('../Views/piePagina');
    }

    public function create(){
        return "";
    }

}
