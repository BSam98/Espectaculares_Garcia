<?php namespace App\Controllers;
use App\Models\supervisor_Atracciones;

class Supervisor_Atracciones_Control extends BaseController {

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
        $idUser = $_GET['t'];
        $model = new supervisor_Atracciones();
        $data = $model->Eventos($idUser);
        $datos = ['Zonas'=>$model->Zonas($data)];
       // echo view('../Views/header.php');
        //echo view('Usuarios/menu_user');
        echo view('Usuarios/supervisor_atracciones', $datos);
        //echo view('../Views/piePagina.php');
    }

}