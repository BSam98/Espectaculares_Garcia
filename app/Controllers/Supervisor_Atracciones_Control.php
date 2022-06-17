<?php namespace App\Controllers;
use App\Models\supervisor_Atracciones;

class Supervisor_Atracciones_Control extends BaseController {

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
        $idUser = $_GET['t'];
        $model = new supervisor_Atracciones();
        $data = $model->Eventos($idUser);
        //echo var_dump($data);

        $datos = [
                'Zonas' => $model->ZonasEve($data)
            ];

        //echo var_dump($datos);
        //echo view('../Views/header.php');
        //echo view('Usuarios/menu_user');
        echo view('Usuarios/supervisor_atracciones', $datos);
        //echo view('../Views/piePagina.php');
    }

    public function consultarAt(){
        $model = new supervisor_Atracciones();
        $id = $_POST['idZona'];
        $data = $model->consultarAtt($id);
        echo json_encode(array('respuesta'=>true,'msj'=>$data));
    }

    public function guardarDatos(){
        $model = new supervisor_Atracciones();
        $atraccion = $_POST['idAtraccion'];
        $nperso = $_POST['numPerso'];
        $usuario = $_POST['usuario'];
        $fecha = $_POST['fecha'];

        $data = $model->consultarCiclo($atraccion);

        $dato = $model->insertarDatos($data, $nperso,$usuario, $fecha);

        echo json_encode(array('respuesta'=>true,'msj'=>$dato));
    }

    /*public function agregarAtracciones(){
        $model = new supervisor_Atracciones();
        $arreglo = $_POST['arreglo'];

        $total = count($arreglo);

        echo json_encode(array('respuesta'=>true,'msj'=>$total));

    }*/

}