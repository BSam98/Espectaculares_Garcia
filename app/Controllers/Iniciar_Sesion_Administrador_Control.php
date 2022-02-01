<?php namespace App\Controllers;

use App\Models\Iniciar_Sesion_Administrador_Model;
//use App\Models\Atracciones_Model;
use Atracciones_Model as GlobalAtracciones_Model;
use Iniciar_Sesion_Administrador_Model as GlobalIniciar_Sesion_Administrador_Model;

class Iniciar_Sesion_Administrador_Control extends BaseController {
    
    public function new (){
        return view ('Iniciar_Sesion_Administrador/Iniciar_Sesion_Administrador_View');
    }

    public function getBusqueda(){

        $model = new Iniciar_Sesion_Administrador_Model();

       // $request = \Config\Services::request();
        //$Usuario = $request->getPost('Usuario');
        //$Contraseña = $request->getPost('Contraseña');
        echo json_encode($model->findAll());
        //$model-> insert();
    }

    public function create(){
        return "";
    }
}