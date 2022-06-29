<?php namespace App\Controllers;
use App\Models\ticket_Model;

class ticket_Control extends BaseController{

	public function ticket(){
        $model =new ticket_Model();

        $idTransaccion = $_GET['transaccion'];

        $data = $model->buscarTransaccion($idTransaccion);

		//$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [90, 236]]);
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8',
            'format' => [80, 236], 'margin_left' => 5, 'margin_right' => 5, 'margin_top' => 0, 
            'margin_bottom' => 0, 'margin_header' => 0, 'margin_footer' => 0,]);
                                                                    /* Arriba | Derecha | Abajo | Izquierda */
        $html='<div class="table table-responsive">
                <img src="Img/logon.png" width="150" height="150" style="margin: 0px 20px 15px 60px;">
                <table width="350px">
                    <tbody>';

                        $html.='<tr>c
                                    <th>Descripción</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                </tr>';
                    foreach($data as $d){   
                        $html.='<tr>';
                            $html.='<td><labe>'.$d->venta.'</labe></td>
                                    <td><label>1</label></td>
                                    <td><label>'.$d->Monto.'</label></td>';
                        $html.='</tr>';
                        /* $html.='<tr>';
                            switch($d->venta){
                                case 'Tarjeta Nueva':
                                    $html.='<td><labe>'.$d->venta.'</labe></td>
                                            <td><label>'.$d->tarjetas_Nuevas.'</label></td>
                                            <td><label>'.$d->Monto.'</label></td>';
                                break;
                                case 'Recarga':
                                    $html.='<td><labe>'.$d->venta.'</labe></td>
                                            <td><label>'.$d->Recargas.'</label></td>
                                            <td><label>'.$d->Monto.'</label></td>';
                                break;
                                case 'Pulsera Mágica':
                                    $html.='<td><labe>'.$d->venta.'</labe></td>
                                            <td><label>'.$d->Promocion_Pulsera_Magica.'</label></td>
                                            <td><label>'.$d->Monto.'</label></td>';
                                break;
                                case 'Recarga Promoción':
                                    $html.='<td><labe>'.$d->venta.'</labe></td>
                                            <td><label>'.$d->Recarga_promo.'</label></td>
                                            <td><label>'.$d->Monto.'</label></td>';
                                break;
                            }
                        */
                            $html .='</tr>';
                                $tarjeta = $d->Nombre;
                                $fecha = $d->fecha;
                                $total = $d->total;
                    }
                    $html.='<tr>
                                <td colspan="3"><br>
                                    <label><b>Tarjeta:</b>&nbsp;'.$tarjeta.'</label>
                                </td>
                            </tr>';
                    $html.='<tr>
                                <td colspan="3"><label><b>Fecha:</b>&nbsp;'.$fecha.'</label></td>
                            </tr>';
                    $html.='<tr>
                                <td colspan="3"><hr><div class="container"><center><label><b>Total:$ '.$total.'</b></label></center></div></td>
                            </tr>';
                    $html.='</tbody>
                </table>
                </div>';


		//$html = view('ticket_Vista',[]);
		$mpdf->WriteHTML($html);
		$this->response->setHeader('Content-Type', 'application/pdf');
		$mpdf->Output('EspectacularesGarcia.pdf','I'); // opens in browser
        }

}