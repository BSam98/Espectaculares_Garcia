<?php namespace App\Controllers;

use App\Models\Clientes_Model;
use App\Models\Iniciar_Sesion_Administrador_Model;

class Clientes_Control extends BaseController {

    protected $model;
    protected $request;

    public function _construct(){}

    public function new (){
        session_start([
            'use_only_cookies' => 1,
            'cookie_lifetime' => 0,
            'cookie_secure' => 1,
            'cookie_httponly' => 1
        ]);
        $model = new Clientes_Model();
        $model2 = new Iniciar_Sesion_Administrador_Model();
        $rango = $_GET['idT'];
        $datos = [
            'Cliente' => $model ->listadoClientes(),
            'Privilegios' => $model2->consultarPrivilegiosR($rango),
        ];
        echo view('../Views/header', $datos);
        //echo view('../Views/menu');
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