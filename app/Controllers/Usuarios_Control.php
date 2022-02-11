<?php namespace App\Controllers;

use App\Models\Usuarios_Model;

class Usuarios_Control extends BaseController {

    protected $model;
    protected $request;

    public function _construct(){}

    public function new (){
        $model =new Usuarios_Model();

        $datos = ['Usuario'=>$model->listadoUsuarios()];

        return view ('Usuarios/Usuarios_View', $datos);
    }

    public function create(){
        return "";
    }

}