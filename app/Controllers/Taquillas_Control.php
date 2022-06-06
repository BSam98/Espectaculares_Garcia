<?php namespace App\Controllers;
use App\Models\Taquillas_Model;
use App\Models\Iniciar_Sesion_Administrador_Model;

class Taquillas_Control extends BaseController {

    protected $model;
    protected $request;

    public function _construct(){}

    public function new (){
        session_start([
            'use_only_cookies' => 1,
            'cookie_lifetime' => 0,
            'cookie_secure' => 1,
            'cookie_httponly' => 1
        ]);
        $model = new Taquillas_Model();
        $model2 = new Iniciar_Sesion_Administrador_Model();
        $rango = $_GET['idT'];
        $datos = [
            'Eventos' => $model->listadoEventos(),
            'Privilegios' => $model2->consultarPrivilegiosR($rango),
        ];
        
        echo view('../Views/header', $datos);
       // echo view('../Views/menu');
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