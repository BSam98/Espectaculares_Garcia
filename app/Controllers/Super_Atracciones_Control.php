<?php namespace App\Controllers;
use App\Models\Super_Atracciones_Model;
use App\Models\Iniciar_Sesion_Administrador_Model;

class super_Atracciones_Control extends BaseController {

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

        $model = new Super_Atracciones_Model();

        $datos = [
            'Eventos' => $model->listado_Eventos(),
            'Privilegios' => $model2->consultarPrivilegiosR($rango),
        ];

        echo view('../Views/header', $datos);
        //echo view('menu');
        echo view('Administrador/Atracciones/super_Atracciones',$datos);
        echo view('../Views/piePagina.php');
    }

    public function ciclos(){
        $model = new Super_Atracciones_Model();
        $arreglo = array();
        $num_elementos = 0;

        $idEvento = $_POST['idEvento'];
        $fechaInicial = $_POST['fechaInicio'];
        $fechaFinal = $_POST['fechaFinal'];

        $respuesta = $model->ciclos($idEvento,$fechaInicial,$fechaFinal);

        $datos = $model->cantidad_Ciclos($respuesta);
        /*
        foreach($respuesta as $key =>$dC){
            $datos = $model->cantidad_Ciclos($dC->idAperturaValidador);
            $arreglo[0]=[
                "cantidad1" =>
            ];
        }
        */

        echo json_encode(array('respuesta'=>true,'msj'=>$respuesta,'datos'=>$datos));
    }

    public function detalles(){
        $model = new Super_Atracciones_Model();
        $idAperturaValidacion = $_POST['idAperturaValidador'];

        $respuesta  = $model->detalles($idAperturaValidacion);

        echo json_encode(array('respuesta'=>true,'msj'=>$respuesta));
    }

}