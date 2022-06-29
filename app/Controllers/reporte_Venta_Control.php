<?php namespace App\Controllers;
use App\Models\reporte_Ventas_Model;

class Reporte_Venta_Control extends BaseController{
	public function _construct(){
		// $this->model = new Atracciones_Model();
		$this->request = \Config\Services::request();
	 }

	/*public function index(){
        $mpdf = new \Mpdf\Mpdf();
        $html = view('Usuarios/reporte_Venta',[]);
		$mpdf->WriteHTML($html);
        $this->response->setHeader('Content-Type', 'application/pdf');
		$mpdf->Output('arjun.pdf','I');
	}*/

	public function consultarVentanilla(){
		session_start([
            'use_only_cookies' => 1,
            'cookie_lifetime' => 0,
            'cookie_secure' => 1,
            'cookie_httponly' => 1
        ]);
		$model = new reporte_Ventas_Model;
		$idv = $_GET['idv'];
		$data = [
				'Turno'=>$model->consultarV($idv),
				//'Fondo'=>$model->consultaFondo($idv),
			];
		//echo view('../Views/header.php');
		echo view('Usuarios/reporte_Venta', $data);
		//echo view('../Views/piePagina.php');
		/*$model = new reporte_Ventas_Model;
		$idv = $_POST['ventanilla'];
		$data = $model->consultarV($idv);
		echo json_encode(array('respuesta'=>true,'msj'=>$data));*/
	}

	/*public function index(){
		echo view('../Views/header.php');
		//echo view('Usuarios/menu_user');
		echo view('Usuarios/reporte_Venta');
		echo view('../Views/piePagina.php');
	}*/

	public function ticket(){
		echo view('../../factura.php');
		//$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [90, 236]]);

		//$html = view('Usuarios/factura',[]);
		//$mpdf->WriteHTML($html);
		//$this->response->setHeader('Content-Type', 'application/pdf');
		//$mpdf->Output('arjun.pdf','I'); // opens in browser
		//$mpdf->Output('arjun.pdf','D'); // it downloads the file into the user system, with give name
		//return view('welcome_message');
	}

	public function CerrarCaja(){
		$model = new reporte_Ventas_Model;
		$fI = $_POST['devtI'];//folios devueltos
		$fF = $_POST['devtF'];//folios devueltos
		$efec = $_POST['efectivo'];//efectivo entrante
		$vouch = $_POST['vouch'];//dinero en vouchers
		$idv = $_POST['idv'];//idFajilla
		$data = $model->cerrarCajas($fI,$fF, $efec, $vouch, $idv);
		echo json_encode(array('respuesta'=>true,'msj'=>$data));
	}

	public function contarIntentos(){
		$apeV = $_POST['aperturaV'];
		$contador = $_POST['contador'];
		$model = new reporte_Ventas_Model;
		$data = $model->actualizarContador($apeV, $contador);
		echo json_encode(array('respuesta'=>true,'msj'=>$data));
	}

	public function actualizarEstado(){
		$apeV = $_POST['aperturaV'];
		$model = new reporte_Ventas_Model;
		$data = $model->actualizarStatus($apeV);
		echo json_encode(array('respuesta'=>true,'msj'=>$data));
	}

	public function forzarCierrec(){
		$user = $_POST['usuarioFC'];
		$contra = $_POST['contraseñaFC'];
		$idApV = $_POST['idAper'];
		$fecha = $_POST['fecha'];
		$model = new reporte_Ventas_Model;
		$data = $model->checarDatos($user, $contra, $idApV, $fecha);
		echo json_encode(array('respuesta'=>true,'msj'=>$data));
	}

	public function cerrarTurn(){
		$model = new reporte_Ventas_Model;
		$dtI = $_POST['dtI'];
		$dtF = $_POST['dtF'];
		$efectivo = $_POST['efectivo'];
		$vou = $_POST['vou'];
		$idv = $_POST['idv'];//idFajilla
		$fecha = $_POST['fecha'];
		$dinero = $_POST['dinero'];
		$vouch = $_POST['vouchers'];
		$data = $model->cerrarTurno($dtI, $dtF, $efectivo, $vou, $idv, $fecha, $dinero, $vouch);
		echo json_encode(array('respuesta'=>true, 'msj'=>$data));
	}
}	