<?php namespace App\Controllers;

use App\Models\Tarjetas_Model;

class Tarjetas_Control extends BaseController {

    protected $model;
    protected $request;

    public function _construct(){}

    public function new (){

        $model = new Tarjetas_Model();

        $datos = [
            'Tarjeta' => $model->listadoTarjetas(),
            'Lote' => $model->listadoLotes(),
            'Evento' => $model->listadoEvento(),
            'Usuario' => $model->listadoUsuarios(),
        ];
        echo view('../Views/header');
        echo view('../Views/menu');
        echo view ('Tarjetas/Tarjetas_View',$datos);
        echo view('../Views/piePagina');
    }

    public function insertarTarjeta(){}

    public function insertarLote(){
        $model = new Tarjetas_Model();
        $datos=[
            'Nombre' => $this->request->getVar('Nombre'),
            'Material' => $this->request->getVar('Material'),
            'Cantidad' => $this->request->getVar('Cantidad'),
            'FolioInicial' => $this->request->getVar('FolioInicial'),
            'FolioFinal' => $this->request->getVar('FolioFinal'),
            'Serie' => $this->request->getVar('Serie'),
            'FechaIngreso' => $this->request->getVar('FechaIngreso'),
            'idUsuario' => $this->request->getVar('Usuario'),
        ];
        
        /*
        $respuesta = $model->insertarAtraccion($datos);
        return redirect()->to(base_url('Atracciones'));
        */
        //$respuesta = $model->insertarLote($datos);
        $respuesta1 = $model->insertarTarjeta($datos);
        echo json_encode(array('respuesta'=>true,'msj'=>$respuesta1));
    }

    public function actualizarLote(){}

    public function create(){
        return "";
    }
}