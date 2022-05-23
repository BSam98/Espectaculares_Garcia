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
        date_default_timezone_set('America/Mexico_City');
        $fecha = date("Y-m-d H:i:s");
        $model = new mcobro_model;
        $evento = $_GET['e'];
        $zona = $_GET['z'];
        $taquilla = $_GET['t'];
        $ventanilla = $_GET['v'];
        $usuario = $_GET['u'];
        $data = [
            'Turno'=>$model->consultarTurno($evento,$zona,$taquilla,$ventanilla,$usuario),
            'Pulsera'=>$model->promoPulsera($fecha),
            'Creditos'=>$model->Creditos($fecha),
            'tipoPago'=>$model->formaPago(),
        ];
        
        //echo view('../Views/header.php');
        echo view('Usuarios/modulo_Cobro',$data);
        echo view('../Views/piePagina');
    }

    public function guardar_Ventas(){

        date_default_timezone_set('America/Mexico_City');
        $fecha = date("Y-m-d H:i:s");

        $model = new mcobro_model;
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

        $gtran = $model->guardarTransaccion($totalPago,$fecha,$idventanilla);
        
        for($i = 0 ; $i <= $indicar ; $i++){
            switch($indicar[$i]){
                case '0';
                    $data = $model->agregarTarjeta($idtarjeta, $gtran, $precioTa);
                    break;

                case '1';
                    //echo ;
                    break;
                
                case '2';
                   //echo ;
                    break;

                case '3';
                    //echo ;
                     break;
                
                case '4';
                   //echo ;
                    break;
            }
        }
        
        

        //$data = $model->guardarVenta($usuario, $fecha, $idtarjeta, $recarga, $gtran, $precioTa);

        //if($promocionesPrecio != '' || $recarga != ''){
            $promo = explode(",", $promocionesPrecio);//agregaria el precio de las promociones en tabla pago
            $idPromo = explode(",", $promociones);
            foreach ($promo as $p){
                $valor = intval($p);
                $data1 = $model->guardarVenta($usuario, $fecha, $idtarjeta, $recarga, $gtran, $precioTa, $valor, $idPromo, $evento);
            }
            
            /*foreach($idPromo as $pr){
                $idvalor = intval($pr);
                $data = $model->promoVendidas($data1, $idvalor, $gtran);
            }*/
       // }/*else{
            //$data = $model->guardarVenta2($usuario, $fecha, $idtarjeta, $recarga, $gtran, $precioTa, $evento);
        //}
        
        echo json_encode(array('respuesta'=>true,'msj'=>$data1));
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
        $data = $model->tipoPagos($tipo);
        echo json_encode(array('respuesta'=>true,'msj'=>$data));
    }
    
}