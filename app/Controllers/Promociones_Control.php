<?php namespace App\Controllers;

class Promociones_Control extends BaseController {
    public function new (){
        echo view('../Views/header');
        echo view('../Views/menu');
        echo view ('Administrador/Promociones/Promociones_View');
        echo view('../Views/piePagina');
    }

    public function create(){
        return "";
    }
}