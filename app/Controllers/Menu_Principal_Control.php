<?php namespace App\Controllers;

class Menu_Principal_Control extends BaseController {
    /*public function new (){
        echo view('../Views/header');
        echo view('../Views/menu');
        echo view('Administrador/Menu_Principal_Administrador/Menu_Principal_View.php');
        echo view('../Views/piePagina');
    }*/
    public function rEvento (){
        echo view('../Views/header');
        echo view('../Views/menu');
        echo view('Administrador/Reportes/xEvento');
        echo view('../Views/piePagina');
    }
    public function uEvento(){
        echo view('../Views/header');
        echo view('../Views/menu');
        echo view('Administrador/Reportes/uEvento');
        echo view('../Views/piePagina');
    }
    public function uAtraccion(){
        echo view('../Views/header');
        echo view('../Views/menu');
        echo view('Administrador/Reportes/uAtraccion');
        echo view('../Views/piePagina');
    }

    public function create (){
        return "";
    }
}