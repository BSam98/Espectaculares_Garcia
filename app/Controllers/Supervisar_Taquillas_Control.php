<?php

namespace App\Controllers;

use App\Models\Supervisar_Taquillas_Model;

class Supervisar_Taquillas_Control extends BaseController{
    protected $model;
    protected $request;

    public function _construct(){
        $this->request = \Config\Services::request();
    }


    public function ventanillas(){
        $model = new Supervisar_Taquillas_Model();

        $idEvento = $_POST['idEvento'];
        $fecha =$_POST['fecha'];

        $respuesta = $model->ventanillas_Activas($idEvento);
        $respuesta2 = $model->ventanillas_Activas_2($idEvento);
        $respuesta3 = $model->ventanillas_Inactivas($idEvento,$fecha);
        $respuesta4 = $model->ventanillas_Inactivas_2($idEvento, $fecha);

        echo json_encode(
            array(
                'respuesta'=>true, 
                'ventanillas_Activas_1'=>$respuesta,
                'ventanillas_Activas_2'=>$respuesta2,
                'ventanillas_Inactivas_1' =>$respuesta3,
                'ventanillas_Inactivas_2' =>$respuesta4
            )
        );
    }

    public function transacciones_Taquillero(){
        $model = new Supervisar_Taquillas_Model();

        $idAperturaVentanilla  = $_POST['idAperturaVentanilla'];

        $respuesta = $model->transacciones_Taquillero($idAperturaVentanilla);

        $respuesta1 = $model->total_Voucher($idAperturaVentanilla);

        $respuesta2 = $model->fajillas_Turno($idAperturaVentanilla);

        echo json_encode(array('respuesta'=>true,'transacciones'=>$respuesta,'voucher'=>$respuesta1, 'fajillas'=>$respuesta2));
    }

    public function descripcion_Transaccion(){
        $model = new Supervisar_Taquillas_Model();

        $idTransaccion = $_POST['idTransaccion'];

        $respuesta = $model->descripcion_Transaccion($idTransaccion);

        $respuesta1 = $model->descripcion_Transaccion_Voucher($idTransaccion);

        echo json_encode(array('respuesta'=>true,'pagos'=>$respuesta,'voucher'=>$respuesta1));
    }

    //Metodo que obtiene los vouchers del todo el turno
    public function vouchers_Turno(){
        $model = new Supervisar_Taquillas_Model();

        $idAperturaVentanilla = $_POST['idAperturaVentanilla'];

        $respuesta = $model->vouchers_Turno($idAperturaVentanilla);

        echo json_encode(array('respuesta'=>true,'voucher'=>$respuesta));
    }

    public function desglose_Fajilla(){
        $model = new Supervisar_Taquillas_Model();

        $idFajilla  = $_POST['idFajilla'];

        $respuesta = $model->desglose_Fajilla($idFajilla);

        echo json_encode(array('respuesta'=>true,'fajilla'=>$respuesta));
    }

    public function ventanillas_Inactivas(){
        $model = new Supervisar_Taquillas_Model();

        $idEvento = $_POST['idEvento'];
        $fecha = $_POST['fecha'];

        $respuesta = $model->ventanillas_Inactivas($idEvento,$fecha);

        echo json_encode(array('respuesta'=>true,'ventanillas'=>$respuesta));
    }

    public function validacion_Taquilla(){
        $model = new Supervisar_Taquillas_Model();

        $idAperturaVentanilla = $_POST['idAperturaVentanilla'];

        $respuesta = $model->validacion_Taquilla($idAperturaVentanilla);

        echo json_encode(array('respuesta'=>true, 'taquillero'=>$respuesta));
    }

    public function actualizar_Taquilla(){
        $model = new Supervisar_Taquillas_Model();

        $idAperturaVentanilla = $_POST['idAperturaVentanilla'];
        $idUsuario = $_POST['idUsuario'];

        $respuesta = $model->actualizar_Taquilla($idAperturaVentanilla,$idUsuario);

        echo json_encode(array('respuesta'=>true, 'msj'=>$respuesta));
    }

    public function informacion_Turno(){
        $model = new Supervisar_Taquillas_Model();

        $idAperturaVentanilla = $_POST['idAperturaVentanilla'];

        $respuesta = $model->informacion_Turno($idAperturaVentanilla);

        echo json_encode(array('respuesta'=>true,'taquillero'=>$respuesta));
    }

    public function cerrar_Turno_Taquilla(){
        $model = new Supervisar_Taquillas_Model();

        $idAperturaVentanilla = $_POST['idAperturaVentanilla'];
        $idUsuario = $_POST['idUsuario'];
        $fecha = $_POST['fecha'];

        $respuesta = $model->cerrar_Turno_Taquilla($idAperturaVentanilla, $idUsuario,$fecha);

        echo json_encode(array('respuesta'=>true,'msj'=>$respuesta));
    }

    public function validar_Faltante(){
        $model = new Supervisar_Taquillas_Model();


        $fecha = $_POST['fecha'];
        $idUsuario = $_POST['idUsuario'];
        $idAperturaVentanilla = $_POST['idAperturaVentanilla'];
        $faltanteEfectivo = $_POST['faltanteEfectivo'];
        $faltanteFondo = $_POST['faltanteFondo'];
        $faltanteVoucher = $_POST['faltanteVoucher'];

        $respuesta = $model->cerrar_Turno_Taquilla($idAperturaVentanilla,$idUsuario,$fecha);
        $respuesta1 = $model->validar_Faltante($fecha,$idUsuario,$idAperturaVentanilla,$faltanteEfectivo,$faltanteFondo,$faltanteVoucher);

        echo json_encode(array('respuesta'=>true, 'msj'=>$respuesta1));
    }

    public function validar_Faltante_Turno(){
        $model = new Supervisar_Taquillas_Model();

        $fecha = $_POST['fecha'];
        $idUsuario = $_POST['idUsuario'];
        $idAperturaVentanilla = $_POST['idAperturaVentanilla'];
        $faltanteEfectivo = $_POST['faltanteEfectivo'];
        $faltanteFondo = $_POST['faltanteFondo'];
        $faltanteVoucher = $_POST['faltanteVoucher'];

        $respuesta = $model->validar_Faltante_Turno($fecha,$idUsuario,$idAperturaVentanilla,$faltanteEfectivo,$faltanteFondo,$faltanteVoucher);

        echo json_encode(array('respuesta'=>true,'msj'=>$respuesta));

    }

    public function transacciones_Finalizadas(){
        $model = new Supervisar_Taquillas_Model();

        $idAperturaVentanilla = $_POST['idAperturaVentanilla'];

        $datos  = [
            'transacciones' => $model->transacciones_Taquillero($idAperturaVentanilla),
            'voucher' => $model->total_Voucher($idAperturaVentanilla),
            'fajillas' => $model->fajillas_Turno($idAperturaVentanilla),
            'faltantes' => $model->faltantes_Turno($idAperturaVentanilla)
        ];

        $respuesta = $model->faltantes_Turno($idAperturaVentanilla);
        
        echo json_encode(array('respuesta'=>true, 'taquillero'=>$respuesta));
    }
}