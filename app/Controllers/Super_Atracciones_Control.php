<?php namespace App\Controllers;

use App\Models\Super_Atracciones_Model;

class super_Atracciones_Control extends BaseController {

    protected $model;
    protected $request;

    public function _construct(){
        $this->request = \Config\Services::request();
    }

    public function new (){
        $model = new Super_Atracciones_Model();

        $datos = [
            'Eventos' => $model->listado_Eventos()
        ];

        echo view('../Views/header.php');
        echo view('menu');
        echo view('Administrador/Atracciones/super_Atracciones',$datos);
        echo view('../Views/piePagina.php');
    }

    public function ciclos(){
        $model = new Super_Atracciones_Model();

        $idEvento = $_POST['idEvento'];
        $fechaInicial = $_POST['fechaInicio'];
        $fechaFinal = $_POST['fechaFinal'];

        $respuesta = $model->ciclos($idEvento,$fechaInicial,$fechaFinal);

        $datos = $model->cantidad_Ciclos($respuesta);

        echo json_encode(array('respuesta'=>true,'msj'=>$respuesta,'datos'=>$datos));
    }

}