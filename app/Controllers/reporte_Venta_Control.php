<?php namespace App\Controllers;
use App\Models\reporte_Ventas_Model;

class reporte_Venta_Control extends BaseController{
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
		$model = new reporte_Ventas_Model;
		$idv = $_GET['idv'];
		$data = ['Turno'=>$model->consultarV($idv)];
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
		$fI = $_POST['devtI'];
		$fF = $_POST['devtF'];
		$efec = $_POST['efectivo'];
		$vouch = $_POST['vouch'];
		$idv = $_POST['idv'];
		$data = $model->cerrarCaja($fI,$fF, $efec, $vouch, $idv);
		echo json_encode(array('respuesta'=>true,'msj'=>$data));
	}
}	