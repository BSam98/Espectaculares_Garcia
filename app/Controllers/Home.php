<?php

namespace App\Controllers;
use App\Models\Iniciar_Sesion_Administrador_Model;

class Home extends BaseController
{
    public function index(){

        /*session_start([
            'use_only_cookies' => 1,
            'cookie_lifetime' => 0,
            'cookie_secure' => 1,
            'cookie_httponly' => 1
        ]);*/
            echo view('header');
            echo view('index');
            echo view('piePagina');
    }

    public function admin(){
        return view('Administrador/Iniciar_Sesion_Administrador/Iniciar_Sesion_Administrador_View');
    }

    public function user(){
        return view('Usuarios/Iniciar_Sesion_User/Iniciar_Sesion_User_View');
    }
}
