<?php namespace App\Controllers;

class Menu_Principal_User_Control extends BaseController {
    public function new (){
        echo view('../Views/header.php');
        echo view('Usuarios/iniciar_Turno');
        echo view('../Views/piePagina');
    }

    public function venta (){
        echo view('../Views/header.php');
        echo view('Usuarios/menu_user');
        echo view('Usuarios/Iniciar_Sesion_User/Menu_Principal_User');
        echo view('../Views/piePagina');
    }

    public function cobrar (){
        echo view('../Views/header.php');
        echo view('Usuarios/menu_user');
        echo view('Usuarios/modulo_Cobro');
        echo view('../Views/piePagina');
    }

    public function create (){
        return "";
    }
}