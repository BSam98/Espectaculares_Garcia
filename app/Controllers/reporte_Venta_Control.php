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
		echo view('Usuarios/menu_user');
		echo view('Usuarios/reporte_Venta');
		echo view('../Views/piePagina.php');
	}
}
