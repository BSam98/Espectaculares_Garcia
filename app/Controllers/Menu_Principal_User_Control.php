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
        $model = new mcobro_model;
        $evento = $_GET['e'];
        $zona = $_GET['z'];
        $taquilla = $_GET['t'];
        $ventanilla = $_GET['v'];
        $usuario = $_GET['u'];
        $data = [
            'Turno'=>$model->consultarTurno($evento,$zona,$taquilla,$ventanilla,$usuario),
            'Pulsera'=>$model->promoPulsera(),
        ];
        
        echo view('../Views/header.php');
        echo view('Usuarios/modulo_Cobro',$data);
        echo view('../Views/piePagina');
    }

    public function guardar_Ventas(){
        date_default_timezone_set('America/Mexico_City');
        $fecha = date("Y-m-d H:i:s");
        $model = new mcobro_model;
        $promociones = $_POST['arregloP'];
        //$promociones = "18,20,23";
        $usuario = $_POST['idUsuario'];
       // $fecha = $_POST['fechaHoy'];
		$tarjeta = $_POST['tarjetaAdd'];
        $recarga = $_POST['recargaAdd'];
       // $promocion = $_POST['promocionn'];
        $totalPago = $_POST['total'];
        $data = $model->guardarVenta($usuario,$fecha, $tarjeta, $recarga, $totalPago);

        $promo = explode(",",$promociones);
        foreach ($promo as $p){
            $data2 = $model->promoVendidas($data,$p);
        }

        //$data = $model->guardarVenta($usuario,$fecha, $tarjeta, $recarga, $promocion, $totalPago);
        echo json_encode(array('respuesta'=>true,'msj'=>$data2));
	}

    /*public function fetch(){
        $model = new mcobro_model;
        $data = $model->promoPulsera();
        echo json_encode(array('respuesta'=>true,'msj'=>$data));
    }*/

    public function resultados(){
        $model = new mcobro_model;
        $idPromo = $_POST['promocion'];
        $data = $model->promoMostrar($idPromo);
        echo json_encode(array('respuesta'=>true,'msj'=>$data));
    }

    public function create (){
        return "";
    }
}