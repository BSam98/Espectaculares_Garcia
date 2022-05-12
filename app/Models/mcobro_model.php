<?php

namespace App\Models;

use CodeIgniter\Model;
use phpDocumentor\Reflection\PseudoTypes\True_;

class mcobro_model extends Model{

    public function button(){
        
    }

    public function promoPulsera($fecha){
        $db = \Config\Database::connect();
        $builder = $db->table('Promocion_Pulsera_Magica');
        /*$query= $db->query(
                    "SElECT ppp.idPulseraMagica,ppp.Nombre, cpm.Precio, (SELECT convert(varchar, FechaInicial, 120)) as fechaI,
                    (SELECT convert(varchar, FechaFinal, 120)) as fechaF, cpm.idFechaPulseraMagica FROM Promocion_Pulsera_Magica ppp
                    JOIN Calendario_Pulsera_Magica cpm on (ppp.idPulseraMagica = cpm.idPulseraMagica)
                    where cpm.FechaInicial > ".$fecha." and  cpm.FechaFinal >".$fecha
        );
        $datos = $query->getResultObject();
        return $datos;*/

        $builder-> select(
            'Promocion_Pulsera_Magica.idPulseraMagica, 
             Promocion_Pulsera_Magica.Nombre, 
             Calendario_Pulsera_Magica.Precio,
             (SELECT convert(varchar, FechaInicial, 120)) as fechaI,
             (SELECT convert(varchar, FechaFinal, 120)) as fechaF,
             Calendario_Pulsera_Magica.idFechaPulseraMagica, 
            '
        );
        $builder->join('Calendario_Pulsera_Magica', 'Promocion_Pulsera_Magica.idPulseraMagica = Calendario_Pulsera_Magica.idPulseraMagica');
        $builder->where('Calendario_Pulsera_Magica.FechaInicial <=',$fecha);
        $builder->where('Calendario_Pulsera_Magica.FechaFinal >=',$fecha);
        $query = $builder->get();
        $datos = $query->getResultObject();
        return $datos;
    }

    function Creditos($fecha){
        $db= \Config\Database::Connect();
        $builder = $db->table('Promocion_Creditos_Cortesia');
        $builder-> select('
                    Calendario_Creditos_Cortesia.idFechaCreditosCortesia, 
                    Promocion_Creditos_Cortesia.Nombre, 
                    Calendario_Creditos_Cortesia.Creditos, 
                    (SELECT convert( varchar, Calendario_Creditos_Cortesia.FechaInicial, 120)) as fechaI, 
                    (SELECT convert(varchar, Calendario_Creditos_Cortesia.FechaFinal,120)) as fechaF
                    '
                    );
        $builder->join('Calendario_Creditos_Cortesia', 'Calendario_Creditos_Cortesia.idCC = Promocion_Creditos_Cortesia.idCC');
        $builder->where('Calendario_Creditos_Cortesia.FechaInicial <=',$fecha);
        $builder->where('Calendario_Creditos_Cortesia.FechaFinal >=',$fecha);
        $query = $builder->get();
        $datos = $query->getResultObject();
        return $datos;
    }

    public function promoMostrar($idPromo, $fecha){
        $db = \Config\Database::connect();
        $builder = $db->table('Promocion_Pulsera_Magica');
        $builder-> select(
            'Promocion_Pulsera_Magica.idPulseraMagica, 
             Promocion_Pulsera_Magica.Nombre, 
             Calendario_Pulsera_Magica.Precio,
             (SELECT convert(varchar, FechaInicial, 120)) as fechaI,
             (SELECT convert(varchar, FechaFinal, 120)) as fechaF,
             Calendario_Pulsera_Magica.idFechaPulseraMagica, 
            '
        );
        $builder->join('Calendario_Pulsera_Magica', 'Promocion_Pulsera_Magica.idPulseraMagica = Calendario_Pulsera_Magica.idPulseraMagica');
        $builder->where('Calendario_Pulsera_Magica.FechaInicial <=',$fecha);
        $builder->where('Calendario_Pulsera_Magica.FechaFinal >=',$fecha);
        $builder->where('Calendario_Pulsera_Magica.idFechaPulseraMagica',$idPromo);

        $query = $builder->get();
        $datos = $query->getResultObject();
        return $datos;

        /*$builder-> select(
            'Promocion_Pulsera_Magica.idPulseraMagica, 
             Promocion_Pulsera_Magica.Nombre, 
             Promocion_Pulsera_Magica.Precio,
             (SELECT CAST(FechaInicial AS date)) as fechaI
            '
        );
        $builder->join('Calendario_Pulsera_Magica', 'Promocion_Pulsera_Magica.idPulseraMagica = Calendario_Pulsera_Magica.idPulseraMagica');
        $builder->where('Promocion_Pulsera_Magica.idPulseraMagica',$idPromo);
        $query = $builder->get();
        $datos = $query->getResultObject();
        return $datos;*/
    }

    public function promoCreditos($creditos, $fecha){
        $db = \Config\Database::connect();
        $builder = $db->table('Promocion_Creditos_Cortesia');
        $builder-> select(
            'Promocion_Creditos_Cortesia.idCC, 
            Promocion_Creditos_Cortesia.Nombre, 
            Calendario_Creditos_Cortesia.Precio,
            (SELECT convert(varchar, FechaInicial, 120)) as fechaI,
            (SELECT convert(varchar, FechaFinal, 120)) as fechaF,
            Calendario_Creditos_Cortesia.idFechaCreditosCortesia, 
            '
        );
        $builder->join('Calendario_Creditos_Cortesia', 'Calendario_Creditos_Cortesia.idCC = Promocion_Creditos_Cortesia.idCC');
        $builder->where('Calendario_Creditos_Cortesia.FechaInicial >',$fecha);
        $builder->where('Calendario_Creditos_Cortesia.FechaFinal >',$fecha);
        $builder->where('Calendario_Creditos_Cortesia.idFechaCreditosCortesia',$creditos);

        $query = $builder->get();
        $datos = $query->getResultObject();
        return $datos;
    }

    function formaPago(){
        $db = \Config\Database::connect();
        $builder = $db->table('Formas_Pago');
        $builder-> select(
            ' idFormasPago,
              Nombre,
              PorcentajeCosto,
              CostoFijo
            '
        );
        $query = $builder->get();
        $datos = $query->getResultObject();
        return $datos;
    }

    function consultarTurno($evento,$zona, $taquilla,$ventanilla,$usuario){
        $db = \Config\Database::connect();
        $builder = $db->table('Eventos');
        $builder-> select(
            ' Eventos.Nombre as NombreEvento,
              Eventos.PrecioTarjeta,
              Zona.Nombre as NombreZona,
              Taquilla.Nombre as NombreTaquilla,
              Ventanilla.Nombre as NombreVentanilla, 
              Ventanilla.idVentanilla,
              Apertura_Ventanilla.idUsuario 
            '
        );
        $builder->join('Zona', 'Eventos.idEvento = Zona.idEvento');
        $builder->join('Taquilla', 'Zona.idZona = Taquilla.idZona');
        $builder->join('Ventanilla', 'Taquilla.idTaquilla = Ventanilla.idTaquilla');
        $builder->join('Apertura_Ventanilla', 'Ventanilla.idVentanilla = Apertura_Ventanilla.idVentanilla');
        $builder->where('Eventos.idEvento', $evento);
        $builder->where('Zona.idZona', $zona);
        $builder->where('Taquilla.idTaquilla', $taquilla);
        $builder->where('Ventanilla.idVentanilla', $ventanilla);
        $builder->where('Apertura_Ventanilla.idUsuario', $usuario);
        $query = $builder->get();
        $datos = $query->getResultObject();
        return $datos; 
    }    

    function guardarTransaccion($totalPago,$fecha,$v){
        $db = \Config\Database::connect();
        $builder = $db->table('Transaccion');
            $data = [
                'Total' => $totalPago,
                'Fecha' => $fecha,
                'idVentanilla' => $v,
            ];
            //$builder->insert($data);
            if($builder->insert($data)){
                return $db->insertID();
            }else{
                return false;
            }
    }


    function guardarVenta($usuario, $fecha, $tarjeta, $recarga, $totalPago, $gtran){
        $db = \Config\Database::connect();
        $builder = $db->table('Pago');
        $builder-> select(
            'idTarjeta'
        );
        $builder->where('idTarjeta', $tarjeta);
        $query = $builder->get();
        $datos = $query->getResultObject();
        if($datos){
            //recarga
            $builder = $db->table('Pago');
            $data = [
                'Monto' => $totalPago,
                'idTarjeta' => $tarjeta,
                'idTipoVenta' => '1',
                'idTransaccion' => $gtran,
            ];
            //$builder->insert($data);
           /* if($builder->insert($data)){
                return $db->insertID();
            }
            else{
                return false;
            }*/
            //$idPago =  $db->insertID(); 
            $builder = $db->table('Saldo');
            $data = [
                'SaldoAc' => $recarga,
                'CreditoN' => 0,
                'CreditoC' => 0,
                'FechaR' => $fecha,
                'VigenciaS' => '',
                'idTarjeta' => $tarjeta,
            ];
            $builder->insert($data);
            return TRUE;
        }else{
            //tarjeta nueva
            $builder = $db->table('Pago');
            $data = [
                'Monto' => $totalPago,
                'idTarjeta' => $tarjeta,
                'idTipoVenta' => '0',
                'idTransaccion' => $gtran,
            ];
            //$builder->insert($data);
            /*if($builder->insert($data)){
                return $db->insertID();
            }
            else{
                return false;
            }*/
            $builder = $db->table('Saldo');
            $data = [
                'SaldoAc' => $recarga,
                'CreditoN' => 0,
                'CreditoC' => 0,
                'FechaR' => $fecha,
                'VigenciaS' => '',
                'idTarjeta' => $tarjeta,
            ];
            $builder->insert($data);
            return TRUE;
        }
    }

    function promoVendidas($gtran,$promoP){
        $db = \Config\Database::connect();
        $builder = $db->table('Promo_Ventas');
        $data = [
            'pago_Id' => $gtran,
            'promo_Id' => $promoP
        ];
        if($builder->insert($data)){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    function buscarTarjeta($folio, $v, $e){
        $db = \Config\Database::connect();
        /**************************** Aqui saco el id de la tarjeta por medio del folio que me esta ingresando *************************/
        $builder = $db->table('Tarjetas');
        $builder-> select(
            'idTarjeta,
            Status
           
            '
        );
        //$builder->join('Eventos', 'Eventos.idEvento = Tarjetas.idEvento');
        $builder->where('Folio', $folio);
        $query = $builder->get();
        $datost = $query->getResultArray();
        //$tarjet = implode($datost[0]);//obtengo el id
        foreach($datost as $row1){
            $tarjet = $row1['idTarjeta'];//saco el valor de id inicial
            $status = $row1['Status'];//saco el valor de id final
        }
        /**************************** Aqui saco el id de la tarjeta por medio del folio que me esta ingresando *************************/

        /**************************** Verifico de que idTarjeta a que idTarjeta me ingreso en el turno *************************/
        $builder = $db->table('Apertura_Ventanilla');
        $builder-> select(
            'folioInicial,
                folioFinal
            '
        );
        $builder->where('idVentanilla', $v);
        $query = $builder->get();
        $datos2 = $query->getResultArray();
        
        foreach($datos2 as $row2){
                $ini = $row2['folioInicial'];//saco el valor de id inicial
                $fin = $row2['folioFinal'];//saco el valor de id final
        }
        /**************************** Verifico de que idTarjeta a que idTarjeta me ingreso en el turno *************************/
        
        /**************** Verifico si el id ingresado de la tarjeta existe entre los rangos ingresados en el turno ***************/
        $builder = $db->table('Tarjetas');
        $builder-> select(
            'idTarjeta,
             Status,
             Eventos.PrecioTarjeta
            '
        );
        $builder->join('Eventos', 'Eventos.idEvento = Tarjetas.idEvento');
        $builder ->where("idTarjeta BETWEEN ".$ini." and ".$fin);
        $builder ->where('idTarjeta', $tarjet);
        $query = $builder->get();
        $datos = $query->getResultArray();
        if($datos){
            return $datos;
        }else{
            //la tarjeta no pertenece a la tablilla
            $builder = $db->table('Tarjetas');
            $builder-> select(
                'idTarjeta,
                Status'
            );
            $builder->where('idTarjeta', $tarjet);
            $query = $builder->get();
            $datosS = $query->getResultObject();
            foreach($datosS as $row){
                $estado =$row->Status;
                if($estado == 'N'){
                    return $estado;
                }else{
                    return $estado;
                }
            }  
        }
        /**************** Verifico si el id ingresado de la tarjeta existe entre los rangos ingresados en el turno ***************/
    }

    function tipoPagos($tipo){
    $db = \Config\Database::connect();
    $builder = $db->table('Formas_Pago');
        $builder-> select(
            ' idFormasPago,
              Nombre,
              PorcentajeCosto,
              CostoFijo
            '
        );
        $builder->where('idFormasPago', $tipo);
        $query = $builder->get();
        $datos = $query->getResultObject();
        return $datos;
    }
}
