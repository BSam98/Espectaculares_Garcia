<?php namespace App\Controllers;

class Menu_Principal_User_Control extends BaseController {
    public function new (){
        echo view('Usuarios/Iniciar_Sesion_User/Menu_Principal_User');
    }

    public function create (){
        return "";
    }
}