<?php namespace App\Controllers;
use App\Models\mcobro_model;

class Menu_Principal_User_Control extends BaseController {
    /*public function new (){
        echo view('../Views/header.php');
        echo view('Usuarios/iniciar_Turno');
        echo view('../Views/piePagina');
    }*/
    protected $model;
    protected $request;
    
    public function _construct(){
       // $this->model = new Atracciones_Model();
       $this->request = \Config\Services::request();
    }

    public function venta (){
        echo view('../Views/header.php');
        //echo view('Usuarios/menu_user');
        //echo view('Usuarios/Iniciar_Sesion_User/Menu_Principal_User');
        echo view('../Views/piePagina');
    }

    public function ConsultaTurno(){
        $evento = $_POST['evento'];
        $zona = $_POST['zona'];
        $taquilla = $_POST['taquilla'];
        $ventanilla = $_POST['ventanilla'];
        $ventanilla = $_POST['ventanilla'];
        $usuario = $_POST['usuario'];
        $model = new mcobro_model();
        $data = $model->consultarTurno($evento,$zona,$taquilla,$ventanilla,$usuario);
        echo json_encode(array('respuesta'=>true,'msj'=>$data));
       
        /*$data = [
            'Pulsera'=>$model->promoPulsera(),
        ];

        echo view('../Views/header.php');
       //    echo view('Usuarios/menu_user');
        echo view('Usuarios/modulo_Cobro', $data);
        echo view('../Views/piePagina');*/
    }

    public function Cobro(){
        session_start([
            'use_only_cookies' => 1,
            'cookie_lifetime' => 0,
            'cookie_secure' => 1,
            'cookie_httponly' => 1
        ]);
        date_default_timezone_set('America/Mexico_City');
        $fecha = date("Y-m-d H:i:s");
        $model = new mcobro_model;
        $evento = $_GET['e'];
        $zona = $_GET['z'];
        $taquilla = $_GET['t'];
        $idApven = $_GET['v'];
        $ventanilla = $_GET['idv'];
        $usuario = $_GET['u'];
        $data = [
            'Turno'=>$model->consultarTurno2($evento,$zona,$taquilla,$idApven,$ventanilla,$usuario),
            'Pulsera'=>$model->promoPulsera($fecha),
            'Creditos'=>$model->Creditos($fecha),
            'tipoPago'=>$model->formaPago(),
        ];
        
        //echo view('../Views/header.php');
        echo view('Usuarios/modulo_Cobro',$data);
        echo view('../Views/piePagina');
    }

    public function guardar_Ventas(){
        session_start([
            'use_only_cookies' => 1,
            'cookie_lifetime' => 0,
            'cookie_secure' => 1,
            'cookie_httponly' => 1
        ]);
        $model = new mcobro_model;

        $tipoT = $_POST['tipoT'];
        $select = $_POST['select'];
        $mtarjeta = $_POST['mtarjeta'];
        $dtarjeta = $_POST['dtarjeta'];
        $naprov = $_POST['naprov'];


        $tipoP = $_POST['tipo'];
        $fecha = $_POST['fecha'];
        $evento = $_POST['evento'];
        $v = $_POST["ventanillaa"];//este es el idaperturaventanilla
        $idventanilla = $_POST['idventani'];//este es el id de la ventanilla
        $promociones = $_POST['arregloP'];
        $promocionesPrecio = $_POST['arregloPrecioP'];
        $promocionesC = $_POST['arregloC'];
        $promocionesPrecioC = $_POST['arregloPrecioC'];
        $idtarjeta = $_POST['idTarjeta'];
        $usuario = $_POST['idUsuario'];
        $precioTa = $_POST['precioTa'];
		$tarjeta = $_POST['tarjetaAdd'];//tengo duda si esta iria
        $recarga = $_POST['recargaAdd'];
        $totalPago = $_POST['total'];
        $indices = $_POST['indice'];

        $indicar = explode(",", $indices);
        $primer =0;
        $array =[];
        
        $primero = reset($indicar);
        array_push($array,$primero);

        for ($i = 1; $i < count($indicar) ; $i++){ 
            if($indicar[$i] != $indicar[$i-1]){
                //array_push($array,$indicar[$i]);
                if(in_array($indicar[$i], $array)){
                    
                }else{
                    array_push($array,$indicar[$i]);
                }
            }
         }
        
        $idss = implode(",", $array);

        $ids = explode(",", $idss);

        //$gtran = $model->guardarTransaccion($totalPago,$fecha,$idventanilla);
        $gtran = $model->guardarTransaccion($totalPago,$fecha,$v);
        $idCob = $model->tipoVenta($totalPago, $gtran, $tipoP);

        
            /************************************* GUARDA LA TRANSACCION DE LOS VOUCHERS *************************************/
            //if($tipoP == 2){
                //$transaccion = $model->guardarTransaccionVouch($tipoT, $select, $mtarjeta, $dtarjeta, $naprov, $idCob);
            //}

        /******************************* Arreglos de Promociones Pulsera Magica ******************/
        $promo = explode(",", $promocionesPrecio);
        $idPromo = explode(",", $promociones);

        /******************************* Arreglos de Creditos Cortesia ******************/
        $promoC = explode(",", $promocionesPrecioC);
        $idPromoC = explode(",", $promocionesC);

        for($i = 0 ; $i < $ids ; $i++){
//poner if que evalue el tipo de cobro(tarjeta/efectivo)

            switch($ids[$i]){
                case '0';
                    $data = $model->agregarTarjeta($idtarjeta, $gtran, $precioTa);

                    if($tipoP == 2){
                        $transaccion = $model->guardarTransaccionVouch($tipoT, $select, $mtarjeta, $dtarjeta, $naprov, $idCob);
                    }

                    break;
                
                case '1';
                    if($tipoP == 2){
                        $transaccion = $model->guardarTransaccionVouch($tipoT, $select, $mtarjeta, $dtarjeta, $naprov, $idCob);
                    }
                    break;
                
                case '2';                    
                    $data = $model->agregarRecarga($idtarjeta, $recarga, $gtran, $precioTa, $evento);
                    break;

                case '3';
                    $data2 = $model->agregarPromocionesP($idtarjeta, $gtran, $promo);
                    $arrayp = implode(",", $data2);
                    $idpay = explode(",", $arrayp);
                    $data = $model->agregarPromoV($idpay,$idPromo, $gtran);
                    break;
                
                case '4';
                    $data = $model->agregarPromocionesC($idtarjeta, $gtran, $promoC, $idPromoC, $evento);
                    break;
                
            }
        }
        
        echo json_encode(array('respuesta'=>true,'msj'=>$data));
	}

    /*public function fetch(){
        $model = new mcobro_model;
        $data = $model->promoPulsera();
        echo json_encode(array('respuesta'=>true,'msj'=>$data));
    }*/

    public function resultados(){
        date_default_timezone_set('America/Mexico_City');
        $fecha = date("Y-m-d H:i:s");
        $model = new mcobro_model;
        $idPromo = $_POST['promocion'];
        $data = $model->promoMostrar($idPromo, $fecha);
        echo json_encode(array('respuesta'=>true,'msj'=>$data));
    }

    public function validar_Tarjeta(){
        $model = new mcobro_model;
        $folio = $_POST['folioTarjeta'];
        $v = $_POST['ventanilla'];
        $e = $_POST['evento'];
        $data = $model->buscarTarjeta($folio,$v,$e);
        echo json_encode(array('respuesta'=>true,'msj'=>$data));
    }

    public function creditos_Cortesia(){
        date_default_timezone_set('America/Mexico_City');
        $fecha = date("Y-m-d H:i:s");
        $model = new mcobro_model;
        $creditos = $_POST['promoCreditos'];
        $data = $model->PromoCreditos($creditos, $fecha);
        echo json_encode(array('respuesta'=>true,'msj'=>$data));
    }

    public function tipo_Pago(){
        $model = new mcobro_model;
        $tipo = $_POST['tipo'];
        $data =['Tipo' => $model->tipoPagos($tipo),
                'Bancos' => $model->consultaBancos()];
        echo json_encode(array('respuesta'=>true,'msj'=>$data));
    }

    public function agregarFajillas(){
        $model = new mcobro_model;
        $folioI = $_POST['folioI'];
        $folioF = $_POST['folioF'];
        $e = $_POST['e'];
        $v = $_POST['v'];
        $idv = $_POST['idv'];
        $fecha = $_POST['fecha'];
        $data = $model->agregarF($e, $v, $idv, $folioI, $folioF, $fecha);
        echo json_encode(array('respuesta'=>true,'msj'=>$data));
    }

    public function devolucion(){
        $model = new mcobro_model;
        $tarjetaDev = $_POST['tarjetD'];
        $descripcion = $_POST['descripcion'];
        $idAp = $_POST['idv'];
        $data = $model->devolucionTarjeta($tarjetaDev, $descripcion, $idAp);
        echo json_encode(array('respuesta'=>true,'msj'=>$data));
    }
    
}