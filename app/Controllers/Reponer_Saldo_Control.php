<?php 

namespace App\Controllers;

use App\Models\Reponer_Saldo_Model;
use App\Models\Iniciar_Sesion_Administrador_Model;

class Reponer_Saldo_Control extends BaseController{
    protected $model;
    protected $request;

    public function _construct(){
        $this->request = \Config\Services::request();
    }

    public function new(){
        session_start([
            'use_only_cookies' => 1,
            'cookie_lifetime' => 0,
            'cookie_secure' => 1,
            'cookie_httponly' => 1
        ]);
        $model2 = new Iniciar_Sesion_Administrador_Model();
        $rango = $_GET['idT'];

        $datos = [
            'Privilegios' => $model2->consultarPrivilegiosR($rango),
        ];

        echo view('../Views/header',$datos);
        //echo view('../Views/menu');
        echo view ('Administrador/Reponer_Saldo/Reponer_Saldo_View', $datos);
        echo view('../Views/piePagina');
    }

    public function historial_Tarjeta(){
        $model = new Reponer_Saldo_Model();

        $folio = $_POST['folio'];

        $atracciones =  $model->movimientos_Tarjeta_Atraccion($folio);

        $taquilla = $model->movimientos_Tarjeta_Taquilla($folio);

        echo json_encode(array('respuesta'=>true, 'atracciones'=>$atracciones, 'taquilla'=>$taquilla));

    }

    public function detalle_Movimiento(){
        $model = new Reponer_Saldo_Model();
        $idMovimiento = $_POST['id'];

        $respuesta = $model->detalle_Movimiento($idMovimiento);

        echo json_encode(array("respuesta"=>true,'movimiento'=>$respuesta));
    }

    public function descuento_Atraccion(){
        $model = new Reponer_Saldo_Model();

        $id = $_POST['id'];

        $respuesta = $model->descuento_Atraccion($id);

        echo json_encode(array("respuesta"=>true,"descuento"=>$respuesta));

    }

    public function pulsera_Atraccion(){
        $model = new Reponer_Saldo_Model();

        $id = $_POST['id'];

        $respuesta  = $model->pulsera_Atraccion($id);

        echo json_encode(array('respuesta' =>true,'pulsera'=>$respuesta));
    }

    public function gratis_Atraccion(){
        $model = new Reponer_Saldo_Model();

        $id = $_POST['id'];

        $respuesta = $model->gratis_Atraccion($id);

        echo json_encode(array('respuesta'=>true,'gratis'=>$respuesta));
    }

    public function saldo_Taquilla(){
        $model = new Reponer_Saldo_Model();

        $id = $_POST['id'];

        $respuesta = $model->saldo_Taquilla($id);

        echo json_encode(array("respuesta"=> true,"taquilla"=>$respuesta));
    }

    public function pulsera_Taquilla(){
        $model = new Reponer_Saldo_Model();

        $id = $_POST['id'];

        $respuesta = $model->pulsera_Taquilla($id);

        echo json_encode(array('respuesta'=>true,'pulsera'=>$respuesta));
    }
}