<?php namespace App\Controllers;

class Menu_Principal_User_Control extends BaseController {
    public function new (){
        echo view('../Views/header.php');
        echo view('Usuarios/Iniciar_Sesion_User/Menu_Principal_User');
        echo view('../Views/piePagina');
    }

    public function create (){
        return "";
    }
}