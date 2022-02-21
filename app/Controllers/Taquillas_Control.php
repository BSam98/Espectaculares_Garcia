<?php namespace App\Controllers;

use App\Models\Taquillas_Model;



class Taquillas_Control extends BaseController {

    protected $model;
    protected $request;

    public function _construct(){}

    public function new (){
        echo view('../Views/header');
        echo view('../Views/menu');
        echo view ('Administrador/Taquillas/Taquillas_View');
        echo view('../Views/piePagina');
    }

}