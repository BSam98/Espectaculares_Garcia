<?php namespace App\Controllers;
use App\Models\ticket_Model;

class ticket_Control extends BaseController{

	/*public function index(){
        $mpdf = new \Mpdf\Mpdf();
        $html = view('Usuarios/reporte_Venta',[]);
		$mpdf->WriteHTML($html);
        $this->response->setHeader('Content-Type', 'application/pdf');
		$mpdf->Output('arjun.pdf','I');
	}*/

	public function ticket(){
        $model =new ticket_Model();

        $idTransaccion = 372;
        $data = $model->buscarTransaccion($idTransaccion);

		//$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [90, 236]]);
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8',
            'format' => [90, 236], 'margin_left' => 5, 'margin_right' => 5, 'margin_top' => 0, 
            'margin_bottom' => 0, 'margin_header' => 0, 'margin_footer' => 0,]);

        $html='<div style="background-image: url("../../../Espectaculares_Garcia/public/Img/logog.png"); background-repeat:no-repeat; background-position: center;">
                <table width="350px">
                    <tbody>';
                    foreach($data as $d){   
                        $html.='<tr>
                            <td colspan="2"><center><label><b>Tarjeta:</b>'.$d->Nombre.'</label></center></td>
                            <td><label><b>Fecha: </b>'.$d->fecha.'</label></td>
                        </tr>
                        <tr>
                            <th>Descripción</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                        </tr>
                        <tr>
                            <td>'.$d->venta.'</td>
                            <td>'.$d->tarjetas_Nuevas.'</td>
                            <td>'.$d->Monto.'</td>
                        </tr>';
                        $html.='<tr>
                            <td><label><b>Total: '.$d->total.'</b></label></td>
                        </tr>';
                    }
                    $html.='</tbody>
                </table>
                </div>';


		//$html = view('ticket_Vista',[]);
		$mpdf->WriteHTML($html);
		$this->response->setHeader('Content-Type', 'application/pdf');
		$mpdf->Output('arjun.pdf','I'); // opens in browser
        }

}