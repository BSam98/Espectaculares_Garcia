<?php

namespace App\Controllers;

use App\Models\Prueba_Promocion_Model;
class Prueba_Promocion_Control extends BaseController{
    protected $model;
    protected $request;

    public function _construct(){
        $this->request = \Config\Services::request();
    }

    public function mostrar_Promociones(){
        $model = new Prueba_Promocion_Model();

        $idEvento = $_POST['idEvento'];
        

        $datos = $model->mostrar_Promociones();

        $listado =$model->listado_Promociones($idEvento);

        $nombre = $model->promociones_Evento($idEvento);

        echo json_encode(array('respuesta'=>true,'msj'=>$datos,'listado'=>$listado,'nombres'=> $nombre));
    }

    public function agregar_Promocion_Evento(){
        $model = new Prueba_Promocion_Model();

        $fechasDescuentos = $_POST['fechasDescuentos'];
        $fechasPulsera = $_POST['fechasPulsera'];
        $fechasJuegos = $_POST['fechasJuegos'];
        $fechasCortesias = $_POST['fechasCortesias'];

        if($fechasDescuentos !="0"){
            $tabla = 'Calendario_Dos_x_Uno';
            $num_elementos = 0;
            $cantidad = count($fechasDescuentos);
            while($num_elementos<$cantidad){
                $datos = [
                    'FechaInicial' => $fechasDescuentos[$num_elementos]['FechaInicial'],
                    'FechaFinal' => $fechasDescuentos[$num_elementos]['FechaFinal'],
                    'idDosxUno' => $fechasDescuentos[$num_elementos]['idDosxUno'],
                    'idEvento' => $fechasDescuentos[$num_elementos]['idEvento']
                ];
                $respuesta = $model->agregar_Promocion_Evento($tabla,$datos);

                $num_elementos = $num_elementos + 1;
            }
        }

        if($fechasPulsera !="0"){
            $tabla = 'Calendario_Pulsera_Magica';
            $num_elementos = 0;
            $cantidad = count($fechasPulsera);
            while($num_elementos < $cantidad){
                $datos = [
                    'Precio' => $fechasPulsera[$num_elementos]['Precio'],
                    'FechaInicial' => $fechasPulsera[$num_elementos]['FechaInicial'],
                    'FechaFinal' => $fechasPulsera[$num_elementos]['FechaFinal'],
                    'idPulseraMagica' => $fechasPulsera[$num_elementos]['idPulseraMagica'],
                    'idEvento' => $fechasPulsera[$num_elementos]['idEvento']
                ];
                $respuesta = $model->agregar_Promocion_Evento($tabla,$datos);
                $num_elementos = $num_elementos + 1;
            }
        }

        if($fechasJuegos !="0"){
            $tabla = 'Calendario_Juegos_Gratis';
            $num_elementos = 0;
            $cantidad = count($fechasJuegos);
            while($num_elementos < $cantidad){
                $datos = [
                    'Precio' => $fechasJuegos[$num_elementos]['Precio'],
                    'FechaInicial' => $fechasJuegos[$num_elementos]['FechaInicial'],
                    'FechaFinal' => $fechasJuegos[$num_elementos]['FechaFinal'],
                    'idJuegosGratis' => $fechasJuegos[$num_elementos]['idJuegosGratis'],
                    'idEvento' => $fechasJuegos[$num_elementos]['idEvento']
                ];
                $respuesta = $model->agregar_Promocion_Evento($tabla,$datos);
                $num_elementos = $num_elementos + 1;
            }
        }

        if($fechasCortesias !="0"){
            $tabla = 'Calendario_Creditos_Cortesia';
            $num_elementos = 0;
            $cantidad = count($fechasCortesias);
            while($num_elementos < $cantidad){
                $datos = [
                    'Precio' => $fechasCortesias[$num_elementos]['Precio'],
                    'Creditos' => $fechasCortesias[$num_elementos]['Creditos'],
                    'FechaInicial' => $fechasCortesias[$num_elementos]['FechaInicial'],
                    'FechaFinal' => $fechasCortesias[$num_elementos]['FechaFinal'],
                    'idCC' => $fechasCortesias[$num_elementos]['idCC'],
                    'idEvento' => $fechasCortesias[$num_elementos]['idEvento'],

                ];
                $respuesta = $model->agregar_Promocion_Evento($tabla,$datos);
                $num_elementos = $num_elementos + 1;
            }
        }

        echo json_encode(array('respuesta'=>$respuesta));
    }

    public function editar_Promocion_Evento(){
        $model = new Prueba_Promocion_Model();

        $descuentos = $_POST['descuento'];
        $pulsera = $_POST['pulsera'];
        $juego = $_POST['juego'];
        $creditos = $_POST['credito'];

        if($descuentos !="0"){
            $num_elementos = 0;
            $cantidad = count($descuentos);

            while($num_elementos<$cantidad){
                $datos = [
                    'idFechaDosxUno' => $descuentos[$num_elementos]['idFechaDosxUno'],
                    'FechaInicial' => $descuentos[$num_elementos]['FechaInicial'],
                    'FechaFinal' => $descuentos[$num_elementos]['FechaFinal']
                ];
                $respuesta = $model->editar_Descuento_Evento($datos);

                $num_elementos = $num_elementos +1;
            }
        }

        if($pulsera !="0"){
            $model = new Prueba_Promocion_Model();

            $num_elementos = 0;
            $cantidad = count($pulsera);

            while($num_elementos<$cantidad){
                $datos = [
                    'idFechaPulseraMagica' => $pulsera[$num_elementos]['idFechaPulseraMagica'],
                    'Precio' => $pulsera[$num_elementos]['Precio'],
                    'FechaInicial' => $pulsera[$num_elementos]['FechaInicial'],
                    'FechaFinal' => $pulsera[$num_elementos]['FechaFinal']
                ];

                $respuesta = $model->editar_Pulsera_Evento($datos);
                $num_elementos = $num_elementos +1;
            }

        }

        if($juego !="0"){

            $model = new Prueba_Promocion_Model();
            $num_elementos = 0;
            $cantidad = count($juego);

            while($num_elementos<$cantidad){
                $datos = [
                    'idFechaJuegosGratis' => $juego[$num_elementos]['idFechaJuegosGratis'],
                    'FechaInicial' => $juego[$num_elementos]['FechaInicial'],
                    'FechaFinal' => $juego[$num_elementos]['FechaFinal']
                ];

                $respuesta = $model->editar_Juego_Evento($datos);
                $num_elementos = $num_elementos + 1;
            }

        }

        if($creditos !="0"){
            $model = new Prueba_Promocion_Model();
            $num_elementos = 0;
            $cantidad = count($creditos);

            while($num_elementos<$cantidad){
                $datos= [
                    'idFechaCreditosCortesia' => $creditos[$num_elementos]['idFechaCreditosCortesia'],
                    'Precio' => $creditos[$num_elementos]['Precio'],
                    'Creditos' => $creditos[$num_elementos]['Creditos'],
                    'FechaInicial' => $creditos[$num_elementos]['FechaInicial'],
                    'FechaFinal' => $creditos[$num_elementos]['FechaFinal']
                ];

                $respuesta = $model->editar_Credito_Evento($datos);

                $num_elementos = $num_elementos + 1;
            }
        }

        echo json_encode(array('respuesta'=>true,'msj'=>$respuesta));
    }
}