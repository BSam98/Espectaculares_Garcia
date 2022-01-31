<?php namespace App\Controllers;

class Eventos_Control extends BaseController {
    public function new (){
        return view ('Eventos/Eventos_View');
    }

    public function create(){
        return "";
    }
}