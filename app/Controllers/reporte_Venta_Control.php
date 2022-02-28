<?php namespace App\Controllers;

class reporte_Venta_Control extends BaseController{

	public function index(){
        $mpdf = new \Mpdf\Mpdf();
        $html = view('Usuarios/reporte_Venta',[]);
		$mpdf->WriteHTML($html);
        $this->response->setHeader('Content-Type', 'application/pdf');
		$mpdf->Output('arjun.pdf','I');
		/*$mpdf = new \Mpdf\Mpdf();
		$html = view('Usuarios/reporte_Venta',[]);
		$mpdf->WriteHTML($html);
		$this->response->setHeader('Content-Type', 'application/pdf');
		$mpdf->Output('arjun.pdf','I'); */
		
	}
}
