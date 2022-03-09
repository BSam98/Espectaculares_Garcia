<?php namespace App\Controllers;

use App\Models\Promociones_Model;

class Promociones_Control extends BaseController {

    protected $model;
    protected $request;

    public function _construct(){
        $this->request = \Config\Services::request();
    }

    public function new (){
        $model =new Promociones_Model();

        $datos = [
            'DosxUno' => $model->listadoDosxUno(),
            'PulseraMagica'  => $model->listadoPulsera(),
            'JuegosGratis' => $model->listadoJuegosGratis(),
            'CreditosCortesia' => $model->listadoCreditosCortesia()
        ];

        echo view('../Views/header');
        echo view('../Views/menu');
        echo view ('Administrador/Promociones/Promociones_View', $datos);
        echo view('../Views/piePagina');
    }

    public function create(){
        return "";
    }

    public function agregar_Promocion(){

        $model = new Promociones_Model();

        $promocion = $_POST['promocion'];
        $nombre =$_POST['nombre_promocion'];
        $precio = $_POST['precio_promocion'];
        $creditos = $_POST['creditos_cortesia'];

        $num_elementos = 0;
        $cantidad= count($nombre);
        
        if(1==$cantidad){
            switch($promocion){
                case 1:
                    $tabla = 'Promocion_Dos_x_Uno';
                    $datos = [
                        'Nombre' => $nombre[$num_elementos],
                        'Precio' => $precio[$num_elementos]
                    ];

                    $respuesta  = $model->insertarPromocion($tabla,$datos);
                    echo json_encode(array('respuesta'=>true,'msj'=>$respuesta));
                break;

                case 2:
                    $tabla = 'Promocion_Pulsera_Magica';
                    $datos = [
                        'Nombre' => $nombre[$num_elementos],
                        'Precio' => $precio[$num_elementos]
                    ];

                    $respuesta = $model->insertarPromocion($tabla,$datos);
                    echo json_encode(array('respuesta'=>true,'msj'=>$respuesta));
                break;

                case 3:
                    $tabla = 'Promocion_Juegos_Gratis';
                    $datos = [
                        'Nombre' => $nombre[$num_elementos],
                        'Precio' => $precio[$num_elementos]
                    ];

                    $respuesta = $model->insertarPromocion($tabla,$datos);
                    echo json_encode(array('respuesta'=>true,'msj'=>$respuesta));
                break;

                case 4:
                    $tabla = 'Promocion_Creditos_Cortesia';
                    $datos = [
                        'Nombre' => $nombre[$num_elementos],
                        'Precio' => $precio[$num_elementos],
                        'Creditos' =>$creditos[$num_elementos]
                    ];

                    $respuesta = $model->insertarPromocion($tabla,$datos);
                    echo json_encode(array('respuesta'=>true,'msj'=>$respuesta));
                break;
            }
        }
        else{
            switch($promocion){
                case 1:
                    $tabla = 'Promocion_Dos_x_Uno';
                    while($num_elementos<$cantidad){
                        $datos = [
                            'Nombre' => $nombre[$num_elementos],
                            'Precio' => $precio[$num_elementos]
                        ];
    
                        $respuesta  = $model->insertarPromocion($tabla,$datos);
                        $num_elementos = $num_elementos +1;
                    }
                break;

                case 2:
                    $tabla = 'Promocion_Pulsera_Magica';
                    while($num_elementos<$cantidad){
                        $datos = [
                            'Nombre' => $nombre[$num_elementos],
                            'Precio' => $precio[$num_elementos]
                        ];
    
                        $respuesta  = $model->insertarPromocion($tabla,$datos);
                        $num_elementos = $num_elementos +1;
                    }
                break;

                case 3:
                    $tabla = 'Promocion_Juegos_Gratis';
                    while($num_elementos<$cantidad){
                        $datos = [
                            'Nombre' => $nombre[$num_elementos],
                            'Precio' => $precio[$num_elementos]
                        ];
    
                        $respuesta  = $model->insertarPromocion($tabla,$datos);
                        $num_elementos = $num_elementos +1;
                    }
                break;

                case 4:
                    $tabla = 'Promocion_Creditos_Cortesia';
                    while($num_elementos<$cantidad){
                        $datos = [
                            'Nombre' => $nombre[$num_elementos],
                            'Precio' => $precio[$num_elementos],
                            'Creditos' => $creditos[$num_elementos]
                        ];
    
                        $respuesta  = $model->insertarPromocion($tabla,$datos);
                        $num_elementos = $num_elementos +1;
                    }
                break;
            }
            echo json_encode(array('respuesta'=>true,'msj'=>$respuesta));
        }
        
    }
}