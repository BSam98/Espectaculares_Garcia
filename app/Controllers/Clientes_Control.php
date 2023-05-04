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
        echo view('../Views/header');
        echo view('../Views/menu');
        echo view ('Administrador/Clientes/Clientes_View',$datos);
        echo view('../Views/piePagina');
    }

    public function tarjetasAsociadas(){
        $model = new Clientes_Model();

        $datos=[
            'idCliente' => $this->request->getVar('idCliente')
        ];

        $respuesta = $model->listadoTarjetas($datos);
        echo json_encode(array('respuesta'=>true,'msj'=>$respuesta));
    }

    public function create(){
        return "";
    }
}