<?php namespace App\Controllers;

class Usuarios_Control extends BaseController {
    public function new (){
        return view ('Usuarios/Usuarios_View');
    }

    public function create(){
        return "";
    }
}