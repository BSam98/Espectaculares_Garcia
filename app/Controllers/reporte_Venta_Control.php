<?php namespace App\Controllers;

class reporte_Venta_Control extends BaseController{

	/*public function index(){
        $mpdf = new \Mpdf\Mpdf();
        $html = view('Usuarios/reporte_Venta',[]);
		$mpdf->WriteHTML($html);
        $this->response->setHeader('Content-Type', 'application/pdf');
		$mpdf->Output('arjun.pdf','I');
	}*/

	public function index(){
		echo view('../Views/header.php');
		//echo view('Usuarios/menu_user');
		echo view('Usuarios/reporte_Venta');
		echo view('../Views/piePagina.php');
	}

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

}	