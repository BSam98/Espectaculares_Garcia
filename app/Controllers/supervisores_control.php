<?php namespace App\Controllers;
use App\Models\Iniciar_Sesion_Administrador_Model;
class supervisores_control extends BaseController {

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
        $model = new Iniciar_Sesion_Administrador_Model();
        $rango = $_GET['idT'];
        $datos =[
            'Privilegios' => $model->consultarPrivilegiosR($rango),
        ];
        echo view('../Views/header',$datos);
        echo view('Administrador/Usuarios/supervisores');
        echo view('../Views/piePagina');
    }

}