<?php namespace App\Controllers;

use App\Models\Tarjetas_Model;

class Tarjetas_Control extends BaseController {

    protected $model;
    protected $request;

    public function _construct(){
        $this->request = \Config\Services::request();
    }

    public function new (){

        $model = new Tarjetas_Model();

        $datos = [
            //'Tarjeta' => $model->listadoTarjetas(),
            'Lote' => $model->listadoLotes(),
            'Evento' => $model->listadoEvento(),
            'Usuario' => $model->listadoUsuarios(),
        ];
        echo view('../Views/header');
        echo view('../Views/menu');
        echo view ('Administrador/Tarjetas/Tarjetas_View',$datos);
        echo view('../Views/piePagina');
    }

    public function listadoTarjetas(){
        $model = new Tarjetas_Model();

        $datos=[
            'idLote' => $this->request->getVar('idLote')
        ];

        $respuesta = $model->listadoTarjetas($datos);
        echo json_encode(array('respuesta'=>true,'msj'=>$respuesta));
    }

    public function insertarTarjeta(){}

    public function insertarLote(){
        $model = new Tarjetas_Model();
        $datos=[
            'Nombre' => $this->request->getVar('NombreL'),
            'Material' => $this->request->getVar('MaterialL'),
            'Cantidad' => $this->request->getVar('CantidadL'),
            'FechaIngreso' => $this->request->getVar('FechaIngresoL'),
            'idUsuario' => $this->request->getVar('UsuarioL'),
            'FolioInicial' => $this->request->getVar('FolioInicialL'),
            'FolioFinal' => $this->request->getVar('FolioFinalL'),
            'Serie' => $this->request->getVar('SerieL'),
        ];
        
        /*
        $respuesta = $model->insertarAtraccion($datos);
        return redirect()->to(base_url('Atracciones'));
        */
        //$respuesta = json_encode(array('idLote'=> $model->insertarLote($datos),'Nombre'=>$datos['Nombre'],'Material'=>$datos['Material'],'FechaActivacion'=>$datos['FechaIngreso'],'FolioInicial'=>$datos['FolioInicial'],'FolioFinal'=>$datos['FolioFinal']));
        //$respuesta1 = $model->insertarTarjeta($respuesta);
        $respuesta1 = $model->insertarTarjeta($model->insertarLote($datos),$datos['Nombre'],$datos['Material'],$datos['FechaIngreso'],$datos['FolioInicial'],$datos['FolioFinal']);
        echo json_encode(array('respuesta'=>true,'msj'=>$respuesta1));
    }

    public function actualizarLote(){
        $model = new Tarjetas_Model();
        $idLote = $_POST['idLote'];
        $datos = [
            'Nombre' => $this->request->getVar('Nombre'),
            'Material' => $this->request->getVar('Material'),
            'Cantidad' => $this->request->getVar('Cantidad'),
            'idUsuario' => $this->request->getVar('Usuario'),
            'Serie' => $this->request->getVar('Serie'),
        ];
        $respuesta = $model->actualizarLote($idLote,$datos);
        echo json_encode(array('respuesta'=>true,'msj'=>$respuesta));
    }

    public function create(){
        return "";
    }
}