<?php namespace App\Controllers;

class Super_Atracciones_Control extends BaseController {

    protected $model;
    protected $request;

    public function _construct(){}

    public function new (){
        echo view('../Views/header.php');
        echo view('Usuarios/menu_user');
        echo view('Usuarios/super_atracciones');
        echo view('../Views/piePagina.php');
    }

}