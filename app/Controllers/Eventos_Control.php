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

    public function mostrar_Promociones(){
        $model = new Eventos_Model();

        $promocion = $_POST['promocion'];
        
        switch($promocion){
            case 1:
                $tabla='Promocion_Dos_x_Uno';
                $respuesta = $model->mostrar_Promociones($tabla);
                echo json_encode(array('respuesta'=>true, 'msj'=>$respuesta));
            break;

            case 2:
                $tabla='Promocion_Pulsera_Magica';
                $respuesta = $model->mostrar_Promociones($tabla);
                echo json_encode(array('respuesta'=>true, 'msj'=>$respuesta));
            break;

            case 3:
                $tabla='Promocion_Juegos_Gratis';
                $respuesta = $model->mostrar_Promociones($tabla);
                echo json_encode(array('respuesta'=>true, 'msj'=>$respuesta));
            break;

            case 4:
                $tabla='Promocion_Creditos_Cortesia';
                $respuesta = $model->mostrar_Promociones($tabla);
                echo json_encode(array('respuesta'=>true, 'msj'=>$respuesta));
            break;
        }
    }

    public function agregar_Tarjetas_Evento(){
        $model = new Eventos_Model();

        $datos= [
            'idEvento' => $this->request->getVar('idEventoLote'),
            'idLote' => $this->request->getVar('idLote'),
            'folioInicial' => $this->request->getVar('folioInicial'),
            'folioFinal' => $this->request->getVar('folioFinal')
        ];

        $respuesta = $model->agregar_Tarjetas_Evento($datos);
        echo json_encode(array('respuesta'=>true,'msj'=>$respuesta));


    }

    public function agregar_Promocion_Evento(){

        $model = new Eventos_Model();

        $tipoPromocion = $_GET['tipoPromocion'];
        
        $fechaInicio = $_GET['fechaInicio'];
        $fechaFinal = $_GET['fechaFinal'];
        $precio = $_GET['precio'];
        $idEvento = $_GET['idEvento'];
        $idPromocion = $_GET['idPromocion'];
        $creditos = $_GET['creditos'];
        
        $num_elementos =0;
        $cantidad = count($fechaInicio);

        switch($tipoPromocion){
            case 1:
                $tabla = 'Calendario_Dos_x_Uno';
                if(1==$cantidad){
                    $datos = [
                        "Precio" => $precio[$num_elementos],
                        "FechaInicial" => $fechaInicio[$num_elementos],
                        "FechaFinal" => $fechaFinal[$num_elementos],
                        "idDosxUno" => $idPromocion,
                    ];

                    $respuesta1 = $model->agregar_Calendario_Promocion($tabla,$datos);
                }
                else{
                    while($num_elementos<$cantidad){
                        $datos = [
                            "Precio" => $precio[$num_elementos],
                            "FechaInicial" => $fechaInicio[$num_elementos],
                            "FechaFinal" => $fechaFinal[$num_elementos],
                            "idDosxUno" => $idPromocion,
                            "idEvento" => $idEvento
                        ];

                        $respuesta1 = $model->agregar_Calendario_Promocion($tabla,$datos);
                        $num_elementos = $num_elementos +1;
                    }
                }
                if($respuesta1 != false){
                    echo json_encode(array('respuesta'=>true,'msj'=>$respuesta1));
                }
                else{
                    echo json_encode(array('respuesta'=>false,'msj'=>$respuesta1));
                }
            break;

            case 2:
                $tabla = 'Calendario_Pulsera_Magica';
                if(1==$cantidad){
                    $datos = [
                        "Precio" => $precio[$num_elementos],
                        "FechaInicial" => $fechaInicio[$num_elementos],
                        "FechaFinal" => $fechaFinal[$num_elementos],
                        "idPulseraMagica" => $idPromocion,
                        "idEvento" => $idEvento
                    ];
                    $respuesta1 = $model->agregar_Calendario_Promocion($tabla,$datos);
                }
                else{
                    while($num_elementos<$cantidad){
                        $datos = [
                            "Precio" => $precio[$num_elementos],
                            "FechaInicial" => $fechaInicio[$num_elementos],
                            "FechaFinal" => $fechaFinal[$num_elementos],
                            "idPulseraMagica" => $idPromocion,
                            "idEvento" => $idEvento
                        ];
                        $respuesta1 = $model->agregar_Calendario_Promocion($tabla,$datos);
                        $num_elementos = $num_elementos +1;
                    }
                }
                if($respuesta1 != false){
                    echo json_encode(array('respuesta'=>true,'msj'=>$respuesta1));
                }
                else{
                    echo json_encode(array('respuesta'=>false,'msj'=>$respuesta1));
                }
            break;

            case 3:
                $tabla = 'Calendario_Juegos_Gratis';
                if(1==$cantidad){
                    $datos = [
                        "Precio" => $precio[$num_elementos],
                        "FechaInicial" => $fechaInicio[$num_elementos],
                        "FechaFinal" => $fechaFinal[$num_elementos],
                        "idJuegosGratis" => $idPromocion,
                        "idEvento" => $idEvento
                    ];
                    $respuesta1 = $model->agregar_Calendario_Promocion($tabla,$datos);
                }
                else{
                    while($num_elementos<$cantidad){
                        $datos = [
                            "Precio" => $precio[$num_elementos],
                            "FechaInicial" => $fechaInicio[$num_elementos],
                            "FechaFinal" => $fechaFinal[$num_elementos],
                            "idJuegosGratis" => $idPromocion,
                            "idEvento" => $idEvento
                        ];
                        $respuesta1 = $model->agregar_Calendario_Promocion($tabla,$datos);
                        $num_elementos = $num_elementos +1;
                    }
                }
                if($respuesta1 != false){
                    echo json_encode(array('respuesta'=>true,'msj'=>$respuesta1));
                }
                else{
                    echo json_encode(array('respuesta'=>false,'msj'=>$respuesta1));
                }
            break;

            case 4:
                $tabla = 'Calendario_Creditos_Cortesia';
                if(1==$cantidad){
                    $datos = [
                        "Precio" => $precio[$num_elementos],
                        "Creditos" => $creditos[$num_elementos],
                        "FechaInicial" => $fechaInicio[$num_elementos],
                        "FechaFinal" => $fechaFinal[$num_elementos],
                        "idCC" => $idPromocion,
                        "idEvento" =>$idEvento
                    ];
                    $respuesta1 = $model->agregar_Calendario_Promocion($tabla,$datos);
                }
                else{
                    while($num_elementos<$cantidad){
                        $datos = [
                            "Precio" => $precio[$num_elementos],
                            "Creditos" => $creditos[$num_elementos],
                            "FechaInicial" => $fechaInicio[$num_elementos],
                            "FechaFinal" => $fechaFinal[$num_elementos],
                            "idCC" => $idPromocion,
                            "idEvento" =>$idEvento
                        ];
                        $respuesta1 = $model->agregar_Calendario_Promocion($tabla,$datos);
                        $num_elementos = $num_elementos +1;
                    }
                }
                if($respuesta1 != false){
                    echo json_encode(array('respuesta'=>true,'msj'=>$respuesta1));
                }
                else{
                    echo json_encode(array('respuesta'=>false,'msj'=>$respuesta1));
                }
            break;
        }
    }

    public function create(){
        return "";
    }

}
