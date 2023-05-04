<?php namespace App\Controllers;

use App\Models\Eventos\Model;
use App\Models\Reporte_Personas_Evento_Model;
use App\Models\Iniciar_Sesion_Administrador_Model;

class Reporte_Personas_Evento_Control extends BaseController{
    protected $model;
    protected $request;

    public function _construct(){
        $this->request = \Config\Services::request();
    }

    public function uEvento(){
        session_start([
            'use_only_cookies' => 1,
            'cookie_lifetime' => 0,
            'cookie_secure' => 1,
            'cookie_httponly' => 1
        ]);
        $model = new Iniciar_Sesion_Administrador_Model();
        $rango = $_GET['idT'];
        $datos = [
            'Privilegios' => $model->consultarPrivilegiosR($rango),
        ];
        echo view('../Views/header',$datos);
        //echo view('../Views/menu');
        echo view('Administrador/Reportes/uEvento');
        echo view('../Views/piePagina');
    }

    public function listado_Eventos(){
        $model = new Reporte_Personas_Evento_Model();

        $fecha = $_POST['fecha'];

        $respuesta = $model->listado_Eventos($fecha);

        echo json_encode(array('respuesta'=>true,'msj'=>$respuesta));
    }
}