<?php namespace App\Controllers;

class Clientes_Control extends BaseController {
    public function new (){
        return view ('Clientes/Clientes_View');
    }

    public function create(){
        return "";
    }
}