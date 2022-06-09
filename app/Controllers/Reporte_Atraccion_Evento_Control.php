<?php namespace App\Controllers;

use App\Models\Eventos_Model;
use App\Models\Iniciar_Sesion_Administrador_Model;

class Reporte_Atraccion_Evento_Control extends BaseController{
    protected $model;
    protected $request;

    public function _construct(){
        $this->request = \Config\Services::request();

    }

    public function uAtraccion(){
        session_start([
            'use_only_cookies' => 1,
            'cookie_lifetime' => 0,
            'cookie_secure' => 1,
            'cookie_httponly' => 1
        ]);
        $model = new Iniciar_Sesion_Administrador_Model();
        $model1 = new Eventos_Model();
        $rango = $_GET['idT'];
        $datos = [
            'Eventos' =>$model1->listadoEventos(),
            'Privilegios' => $model->consultarPrivilegiosR($rango),
        ];
        echo view('../Views/header',$datos);
        //echo view('../Views/menu');
        echo view('Administrador/Reportes/uAtraccion');
        echo view('../Views/piePagina');
    }
}