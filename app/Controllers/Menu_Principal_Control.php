<?php namespace App\Controllers;
use App\Models\Iniciar_Sesion_Administrador_Model;

class Menu_Principal_Control extends BaseController {
    /*public function new (){
        echo view('../Views/header');
        echo view('../Views/menu');
        echo view('Administrador/Menu_Principal_Administrador/Menu_Principal_View.php');
        echo view('../Views/piePagina');
    }*/
    public function rEvento (){
        session_start([
            'use_only_cookies' => 1,
            'cookie_lifetime' => 0,
            'cookie_secure' => 1,
            'cookie_httponly' => 1
        ]);
        $model = new Iniciar_Sesion_Administrador_Model();
        $rango = $_GET['idT'];
        $datos = [
            'Privilegios' => $model->consultarPrivilegiosR($rango),
        ];
        echo view('../Views/header',$datos);
        //echo view('../Views/menu');
        echo view('Administrador/Reportes/xEvento');
        echo view('../Views/piePagina');
    }
    public function uAtraccion(){
        session_start([
            'use_only_cookies' => 1,
            'cookie_lifetime' => 0,
            'cookie_secure' => 1,
            'cookie_httponly' => 1
        ]);
        $model = new Iniciar_Sesion_Administrador_Model();
        $rango = $_GET['idT'];
        $datos = [
            'Privilegios' => $model->consultarPrivilegiosR($rango),
        ];
        echo view('../Views/header',$datos);
        //echo view('../Views/menu');
        echo view('Administrador/Reportes/uAtraccion');
        echo view('../Views/piePagina');
    }

    public function create (){
        return "";
    }
}