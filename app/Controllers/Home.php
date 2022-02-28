<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
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
