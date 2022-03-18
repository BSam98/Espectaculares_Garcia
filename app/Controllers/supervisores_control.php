<?php namespace App\Controllers;

class supervisores_control extends BaseController {

    protected $model;
    protected $request;

    public function _construct(){}

    public function new (){
        echo view('../Views/header.php');
        echo view('menu');
        echo view('Administrador/Usuarios/supervisores');
        echo view('../Views/piePagina.php');
    }

}