<?php namespace App\Controllers;

class super_Atracciones_Control extends BaseController {

    protected $model;
    protected $request;

    public function _construct(){}

    public function new (){
        echo view('../Views/header.php');
        echo view('menu');
        echo view('Administrador/Atracciones/super_Atracciones');
        echo view('../Views/piePagina.php');
    }

}