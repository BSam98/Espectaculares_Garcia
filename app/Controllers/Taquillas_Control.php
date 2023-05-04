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



}