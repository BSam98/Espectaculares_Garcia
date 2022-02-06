<?php namespace App\Controllers;

use App\Models\Clientes_Model;

class Clientes_Control extends BaseController {

    protected $model;
    protected $request;

    public function _construct(){}

    public function new (){
        $model = new Clientes_Model();

        $datos = [
            'Cliente' => $model ->listadoClientes()
        ];

        return view ('Clientes/Clientes_View',$datos);
    }

    public function create(){
        return "";
    }
}