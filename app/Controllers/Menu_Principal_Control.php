<?php namespace App\Controllers;

class Menu_Principal_Control extends BaseController {
    public function new (){
        return view('Menu_Principal_Administrador/Menu_Principal_View.php');
    }

    public function create (){
        return "";
    }
}