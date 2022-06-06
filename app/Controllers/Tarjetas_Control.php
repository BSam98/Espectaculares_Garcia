<?php namespace App\Controllers;
use App\Models\Tarjetas_Model;
use App\Models\Iniciar_Sesion_Administrador_Model;

class Tarjetas_Control extends BaseController {

    protected $model;
    protected $request;

    public function _construct(){
        $this->request = \Config\Services::request();
    }

    public function new (){
        session_start([
            'use_only_cookies' => 1,
            'cookie_lifetime' => 0,
            'cookie_secure' => 1,
            'cookie_httponly' => 1
        ]);
        $model2 = new Iniciar_Sesion_Administrador_Model();
        $rango = $_GET['idT'];
        $model = new Tarjetas_Model();

        $datos = [
            //'Tarjeta' => $model->listadoTarjetas(),
            'Lote' => $model->listadoLotes(),
            'Evento' => $model->listadoEvento(),
            'Usuario' => $model->listadoUsuarios(),
            'Privilegios' => $model2->consultarPrivilegiosR($rango),
        ];
        echo view('../Views/header',$datos);
        //echo view('../Views/menu');
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
        
        $Nombre = $_POST['nom'];
        $Material = $_POST['mate'];
        $Cantidad = $_POST['cant'];
        $FechaIngreso = $_POST['date'];
        $idUsuario = $_POST['user'];
        $FolioInicial = $_POST['fi'];
        $FolioFinal = $_POST['ff'];
        $Serie = $_POST['ser'];

        $num_elementos = 0;
        $cantidad = count($Nombre);

        if(1==$cantidad){
            $datos=[
                'Nombre' => $Nombre[$num_elementos],
                'Material' => $Material[$num_elementos],
                'Cantidad' => $Cantidad[$num_elementos],
                'FechaIngreso' => $FechaIngreso[$num_elementos],
                'idUsuario' => $idUsuario[$num_elementos],
                'FolioInicial' => $FolioInicial[$num_elementos],
                'FolioFinal' => $FolioFinal[$num_elementos],
                'Serie' => $Serie[$num_elementos],
            ];
            $respuesta1 = $model->insertarTarjeta($model->insertarLote($datos),$datos['Nombre'],$datos['Material'],$datos['FechaIngreso'],$datos['FolioInicial'],$datos['FolioFinal']);
        }
        else{
            while($num_elementos<$cantidad){

                $datos=[
                    'Nombre' => $Nombre[$num_elementos],
                    'Material' => $Material[$num_elementos],
                    'Cantidad' => $Cantidad[$num_elementos],
                    'FechaIngreso' => $FechaIngreso[$num_elementos],
                    'idUsuario' => $idUsuario[$num_elementos],
                    'FolioInicial' => $FolioInicial[$num_elementos],
                    'FolioFinal' => $FolioFinal[$num_elementos],
                    'Serie' => $Serie[$num_elementos],
                ];
                $respuesta1 = $model->insertarTarjeta($model->insertarLote($datos),$datos['Nombre'],$datos['Material'],$datos['FechaIngreso'],$datos['FolioInicial'],$datos['FolioFinal']);
                $num_elementos = $num_elementos +1;
            }
        }
        
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