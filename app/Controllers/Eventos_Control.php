<?php namespace App\Controllers;

use App\Models\Eventos_Model;

class Eventos_Control extends BaseController {

    protected $model;
    protected $request;
    
    public function _construct(){
       // $this->model = new Atracciones_Model();
       $this->request = \Config\Services::request();
    }

    public function new (){
        $model = new Eventos_Model();

        $datos = [
            'Eventos' => $model->listadoEventos(),
            'Lotes' => $model->listadoLotes(),
            'AtraccionesEvento' => $model->listado_Atracciones_Por_Evento()
        ];

        echo view('../Views/header');
        echo view('../Views/menu');
        echo view ('Administrador/Eventos/Eventos_View', $datos);
        echo view('../Views/piePagina');
    }

    public function agregarEvento(){
        $model = new Eventos_Model();

        $datos = [
            'Nombre' => $this->request->getVar('Nombre'),
            'Direccion' => $this->request->getVar('Direccion'),
            'Ciudad' => $this->request->getVar('Ciudad'),
            'Estado' => $this->request->getVar('Estado'),
            'FechaInicio' => $this->request->getVar('fechaInicio'),
            'FechaFinal' => $this->request->getVar('fechaFinal'),
            'Precio' => $this->request->getVar('pesos'),
            'Creditos' => $this->request->getVar('creditos'),
        ];

        $respuesta = $model->agregarEvento($datos);
        echo json_encode(array('respuesta'=>true, 'msj'=>$datos));
    }

    public function mostrarAtracciones(){
        $model = new Eventos_Model();

        $datos = [
            'idEvento' => $this->request->getVar('idEvento')
        ];

        $respuesta = $model->mostrarAtracciones($datos);
        echo json_encode(array('respuesta'=>true,'msj'=>$respuesta));
    }

    public function mostrarTarjetas(){
        $model = new Eventos_Model();

        $datos = [
            'idEvento' => $this->request->getVar('idEvento')
        ];

        $respuesta = $model->mostrarTarjetas($datos);
        echo json_encode(array('respuesta'=>true,'msj'=>$respuesta));
    }

    public function mostrarAsociacion(){
        $model = new Eventos_Model();

        $datos = [
            'idEvento' => $this->request->getVar('idEvento')
        ];

        $respuesta = $model->mostrarAsociacion($datos);
        echo json_encode(array('respuesta'=>true,'msj'=>$respuesta));
    }

    public function mostrar_Tarjetas_Nuevas(){
        $model = new Eventos_Model();
        
        $datos = [
            'idLote' => $this->request->getVar('idLote')
        ];
        
        
        $respuesta = $model->mostrar_Tarjetas_Nuevas($datos);
        echo json_encode(array('respuesta'=>true, 'msj'=>$respuesta));
    }

    public function agregar_Tarjetas_Evento(){
        $model = new Eventos_Model();

        $datos= [
            'idEvento' => $this->request->getVar('idEvento'),
            'idLote' => $this->request->getVar('idLote'),
            'folioInicial' => $this->request->getVar('folioInicial'),
            'folioFinal' => $this->request->getVar('folioFinal')
        ];

        $respuesta = $model->agregar_Tarjetas_Evento($datos);
        echo json_encode(array('respuesta'=>true,'msj'=>$respuesta));

    }

    public function create(){
        return "";
    }

}
