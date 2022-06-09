<?php

namespace App\Models;

use CodeIgniter\Model;
use phpDocumentor\Reflection\PseudoTypes\True_;

class mcobro_model extends Model{

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

    public function PromoCreditos($creditos, $fecha){
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
        $builder->where('Calendario_Creditos_Cortesia.FechaInicial <=',$fecha);
        $builder->where('Calendario_Creditos_Cortesia.FechaFinal >=',$fecha);
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

    // creo que ya no va
    /*function consultarTurno($evento,$zona, $taquilla,$ventanilla,$usuario){
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
    }   */ 

    function consultarTurno2($evento,$zona,$taquilla,$idApven,$ventanilla,$usuario){
        $db = \Config\Database::connect();
        /*$query =$db->query("SELECT e.Nombre, z.Nombre, t.Nombre, v.Nombre,e.PrecioTarjeta 
                            FROM Eventos e, Zona z, Taquilla t, Ventanilla v, Apertura_Ventanilla av, Fajillas f 
                            WHERE e.idEvento = ".$evento." and z.idEvento = e.idEvento and z.idZona =".$zona." and z.idZona = t.idZona and t.idTaquilla =".$taquilla." and v.idTaquilla = t.idTaquilla 
                            and v.idVentanilla = ".$ventanilla." and v.idVentanilla = av.idVentanilla and av.idUsuario =".$usuario." and f.idAperturaVentanilla = av.idAperturaVentanilla 
                            and av.idAperturaVentanilla =".$idApven);*/
        $query =$db->query("SELECT e.Nombre, z.Nombre, t.Nombre, v.Nombre,e.PrecioTarjeta 
                            FROM Eventos e, Zona z, Taquilla t, Ventanilla v, Apertura_Ventanilla av, Fajillas f 
                            WHERE e.idEvento = ".$evento." and z.idEvento = e.idEvento and z.idZona =".$zona." and z.idZona = t.idZona and t.idTaquilla =".$taquilla." and v.idTaquilla = t.idTaquilla 
                            and v.idVentanilla = ".$ventanilla." and v.idVentanilla = av.idVentanilla and av.idUsuario =".$usuario." and f.idAperturaVentanilla = av.idAperturaVentanilla 
                            and f.idFajilla =".$idApven);
        if($query){
            return $query->getResultObject();
        }
        
    }

    function guardarTransaccion($totalPago,$fecha,$v){
        $db = \Config\Database::connect();
        $builder = $db->table('Transaccion');
            $data = [
                'Total' => $totalPago,
                'Fecha' => $fecha,
                'idFajilla' => $v,
            ];
            if($builder->insert($data)){
                return $db->insertID();
            }else{
                return false;
            }
    }

    function tipoVenta($totalPago, $gtran, $tipoP){
        $db = \Config\Database::connect();
        $builder = $db->table('Cobro');
        $data = [
            'Monto' => $totalPago,
            'idFormasPago' => $tipoP,
            'idTransaccion' => $gtran
        ];
        if($builder->insert($data)){
            return true;
        }else{
            return false;
        }
    }

    function guardarVenta($usuario, $fecha, $idtarjeta, $recarga, $gtran, $precioTa, $promoP, $idPromo, $evento){// venta con promo
        $db = \Config\Database::connect();
        $builder = $db->table('Eventos');
        $builder-> select(
            'idEvento,
             Precio,
             Creditos'
        );
        $builder->where('idEvento', $evento);
        $query = $builder->get();
        $datosE = $query->getResultArray();
        foreach($datosE as $row){
            $precioCreditos = $row['Precio'];//saco el valor de id inicial
            $creditosOtorgados = $row['Creditos'];//saco el valor de id final
        }
        /****************************************************************************/
        $builder = $db->table('Pago');
        $builder-> select(
            'idTarjeta'
        );
        $builder->where('idTarjeta', $idtarjeta);
        $query = $builder->get();
        $datos = $query->getResultObject();
        if($datos){//la tarjeta esta comprada
            if($recarga != ''){
                $builder = $db->table('Pago');
                    $data = [
                        'Monto' => $recarga,
                        'idTarjeta' => $idtarjeta,
                        'idTipoVenta' => '1',
                        'idTransaccion' => $gtran,
                    ];
                    if($builder->insert($data)){//si me inserta el pago
                        $idpago = $db->insertID();
                        $creditosNormales = ($recarga * $creditosOtorgados)/$precioCreditos;//numero de creditos otorgados por recarga
                        $builder = $db->table('Saldo');// agrega a la tabla de salgo el numero de creditos otorgados a la tarjeta
                            $data = [
                                'CreditoN' => $creditosNormales,
                                'idpago' => $idpago
                            ];    
                            if($builder->insert($data)){//si me inserta el saldo
                                $builder = $db->table('Tarjetas');
                                $builder-> select(
                                    'idTarjeta, CreditoN, CreditoC, idStatus'
                                );
                                $builder->where('idTarjeta', $idtarjeta);
                                $query = $builder->get();
                                $datosRecarga = $query->getResultArray();
                                foreach($datosRecarga as $rec){
                                    $nCreditos = $rec['CreditoN'];//saco el valor de creditos normales
                                }
                                if(empty($nCreditos)){
                                    $TotalCreditos = $nCreditos + $creditosNormales;
                                    $builder = $db->table('Tarjetas');
                                    $data = [
                                        'CreditoN' => $creditosNormales,//cambio el estado a tarjeta vendida
                                    ];
                                    $builder->where('idTarjeta', $idtarjeta);
                                    if($builder->update($data)){
                                        return TRUE;
                                    }else{
                                        return FALSE;
                                    }
                                }else{
                                    $TotalCreditos = $nCreditos + $creditosNormales;
                                    $builder = $db->table('Tarjetas');
                                    $data = [
                                        'CreditoN' => $TotalCreditos,//cambio el estado a tarjeta vendida
                                    ];
                                    $builder->where('idTarjeta', $idtarjeta);
                                    if($builder->update($data)){
                                        return TRUE;
                                    }else{
                                        return FALSE;
                                    }
                                }
                            }
                    }
            }
            if($promoP != ''){
                $builder = $db->table('Pago');
                $data = [
                    'Monto' => $promoP,
                    'idTarjeta' => $idtarjeta,
                    'idTipoVenta' => '2',
                    'idTransaccion' => $gtran,
                ];
                if($builder->insert($data)){//me inserta el pago
                    $idpago =$db->insertID();
                    
                    foreach($idPromo as $pp){
                        $val = intval($pp);
                        $builder = $db->table('Promo_Ventas');
                        $data = [
                            'pago_Id' => $idpago,
                            'promo_Id' => $val,
                            'idTransaccion' => $gtran
                        ];
                        if($builder->insert($data)){
                            return $data;
                        }else{
                            return FALSE;
                        }       
                    }
                }else{
                    return FALSE;
                }
            }
           // return $datos;
        }else{
            $builder = $db->table('Pago');
            $data = [
                'Monto' => $precioTa,
                'idTarjeta' => $idtarjeta,
                'idTipoVenta' => '0',
                'idTransaccion' => $gtran,
            ];
            if($builder->insert($data)){
                $builder = $db->table('Tarjetas');
                $data = [
                    'idStatus' => '0',
                ];
                $builder->where('idTarjeta', $idtarjeta);
                $builder->update($data);
            };
            if($recarga != ''){
                $builder = $db->table('Pago');

                $data = [
                    'Monto' => $recarga,
                    'idTarjeta' => $idtarjeta,
                    'idTipoVenta' => '1',
                    'idTransaccion' => $gtran,
                ];
                if($builder->insert($data)){//si me inserta el pago
                    $idpago = $db->insertID();
                    $creditosNormales = ($recarga * $creditosOtorgados)/$precioCreditos;//numero de creditos otorgados por recarga
                    $builder = $db->table('Saldo');// agrega a la tabla de salgo el numero de creditos otorgados a la tarjeta
                        $data = [
                            'CreditoN' => $creditosNormales,
                            'idpago' => $idpago
                        ];    
                        if($builder->insert($data)){//si me inserta el saldo
                            $builder = $db->table('Tarjetas');
                            $builder-> select(
                                'idTarjeta, CreditoN, CreditoC, idStatus'
                            );
                            $builder->where('idTarjeta', $idtarjeta);
                            $query = $builder->get();
                            $datosRecarga = $query->getResultArray();
                            foreach($datosRecarga as $rec){
                                $nCreditos = $rec['CreditoN'];//saco el valor de creditos normales
                            }
                            if(empty($nCreditos)){
                                $TotalCreditos = $nCreditos + $creditosNormales;
                                $builder = $db->table('Tarjetas');
                                $data = [
                                    'CreditoN' => $creditosNormales,//cambio el estado a tarjeta vendida
                                ];
                                $builder->where('idTarjeta', $idtarjeta);
                                if($builder->update($data)){
                                    return TRUE;
                                }else{
                                    return FALSE;
                                }
                            }else{
                                $TotalCreditos = $nCreditos + $creditosNormales;
                                $builder = $db->table('Tarjetas');
                                $data = [
                                    'CreditoN' => $TotalCreditos,//cambio el estado a tarjeta vendida
                                ];
                                $builder->where('idTarjeta', $idtarjeta);
                                if($builder->update($data)){
                                    return TRUE;
                                }else{
                                    return FALSE;
                                }
                            }
                        }
                }
            }

            if($promoP != ''){
                $builder = $db->table('Pago');
                $data = [
                    'Monto' => $promoP,
                    'idTarjeta' => $idtarjeta,
                    'idTipoVenta' => '2',
                    'idTransaccion' => $gtran,
                ];
                if($builder->insert($data)){//me inserta el pago
                    $idpago =$db->insertID();
                    return $idpago;
                    //return promoVendidas($idpago, $val, $gtran);
                    foreach($idPromo as $pp){
                        $val = intval($pp);
                        $builder = $db->table('Promo_Ventas');
                        $data = [
                            'pago_Id' => $idpago,
                            'promo_Id' => $val,
                            'idTransaccion' => $gtran
                        ];
                        $builder->insert($data);
                    }
                }
            }
        }
    }

    /*function promoVendidas($data1, $idvalor, $gtran){
        $db = \Config\Database::connect();
        $builder = $db->table('Promo_Ventas');
        $data = [
            'pago_Id' => $data1,
            'promo_Id' => $idvalor,
            'idTransaccion' => $gtran
        ];
        if($builder->insert($data)){
            return TRUE;
        }else{
            return FALSE;
        }*/
                   
        /*$builder = $db->table('Promo_Ventas');
        $data = [
            'pago_Id' => $gtran,
            'promo_Id' => $promoP
        ];
        if($builder->insert($data)){
            return TRUE;
        }else{
            return FALSE;
        }*/
   // }

    function buscarTarjeta($folio, $v, $e){
        global $tarjet, $ini, $fin;
        $db = \Config\Database::connect();
        /**************************** Aqui saco el id de la tarjeta por medio del folio que me esta ingresando *************************/
        $builder = $db->table('Tarjetas');
        $builder-> select(
            'idTarjeta,
            idStatus'
        );
        $builder->where('Folio', $folio);
        $query = $builder->get();
        $datost = $query->getResultArray();
        if($datost){
            foreach($datost as $row1){
                $tarjet = $row1['idTarjeta'];//saco el valor de id inicial
                $status = $row1['idStatus'];//saco el valor de id final
            }
            /**************************** Aqui saco el id de la tarjeta por medio del folio que me esta ingresando *************************/

            /**************************** Verifico de que idTarjeta a que idTarjeta me ingreso en el turno *************************/
            $builder = $db->table('Fajillas');
            $builder-> select(
                'folioInicial,
                folioFinal'
            );
            //$builder->where('idAperturaVentanilla', $v);
            $builder->where('idFajilla', $v);
            $query = $builder->get();
            $datos2 = $query->getResultArray();
            
            foreach($datos2 as $row2){
                $ini = $row2['folioInicial'];//saco el valor de id inicial
                $fin = $row2['folioFinal'];//saco el valor de id final
            }

            /**************** Verifico si el id ingresado de la tarjeta existe entre los rangos ingresados en el turno ***************/
            $query2 = $db->query("SELECT idTarjeta, idStatus, e.PrecioTarjeta from Tarjetas t, Eventos e  WHERE t.idEvento = e.idEvento and t.idTarjeta BETWEEN " . $ini . " and " . $fin.  " and t.idStatus != '5' and t.idTarjeta = " . $tarjet);
            $datos = $query2->getResultObject();
            if($datos){
                return $datos;
            }else{
                //la tarjeta no pertenece a la tablilla
                $query3 = $db->query("SELECT idTarjeta, idStatus from Tarjetas t WHERE idStatus != '5' and idTarjeta =".$tarjet);
                $datosS = $query3->getResultArray();
                foreach($datosS as $row){
                        $estado = $row['idStatus'];
                    if($estado != '1'){
                        return $datosS;
                    }else{
                        return false; 
                    }
                }  
            }
        }else{
            return false;        
        }
    }

    function tipoPagos($tipo){
        $db = \Config\Database::connect();
        $builder = $db->table('Formas_Pago');
        $builder-> select(
            ' idFormasPago,
              Nombre,
              PorcentajeCosto,
              CostoFijo '
        );
        $builder->where('idFormasPago', $tipo);
        $query = $builder->get();
        $datos = $query->getResultObject();
        return $datos;
    }

    function guardarVenta2($usuario, $fecha, $idtarjeta, $recarga, $gtran, $precioTa, $evento){//venta sin promociones
        /**************************************** obtengo el precio y los creditos de eventos *****************************/
        $db = \Config\Database::connect();
        $builder = $db->table('Eventos');
        $builder-> select(
            'idEvento,
            Precio,
            Creditos'
        );
        $builder->where('idEvento', $evento);
        $query = $builder->get();
        $datosE = $query->getResultArray();
        foreach($datosE as $row){
            $precioCreditos = $row['Precio'];//saco el precio de cuanto va a costar el evento
            $creditosOtorgados = $row['Creditos'];//saco el valor de creditos por dinero
        }
        /******************************* busca si la tarjeta ya existe en la tabla de pagos ****************************************/

        $db = \Config\Database::connect();
        $builder = $db->table('Pago');
        $builder-> select(
            'idTarjeta'
        );
        $builder->where('idTarjeta', $idtarjeta);
        $query = $builder->get();
        $datos = $query->getResultObject();

        if($datos){//la tarjeta ya esta comprada
            if($recarga != ''){//si recarga no es cero
                $builder = $db->table('Pago');
                $data = [
                    'Monto' => $recarga,
                    'idTarjeta' => $idtarjeta,
                    'idTipoVenta' => '1',
                    'idTransaccion' => $gtran,
                ];
                if($builder->insert($data)){//si me inserta el pago
                    $idpago = $db->insertID();
                    $creditosNormales = ($recarga * $creditosOtorgados)/$precioCreditos;//numero de creditos otorgados por recarga
                    $builder = $db->table('Saldo');// agrega a la tabla de salgo el numero de creditos otorgados a la tarjeta
                        $data = [
                            'CreditoN' => $creditosNormales,
                            'idpago' => $idpago
                        ];    
                        if($builder->insert($data)){//si me inserta el saldo
                            $builder = $db->table('Tarjetas');
                            $builder-> select(
                                'idTarjeta, CreditoN, CreditoC, idStatus'
                            );
                            $builder->where('idTarjeta', $idtarjeta);
                            $query = $builder->get();
                            $datosRecarga = $query->getResultArray();
                            foreach($datosRecarga as $rec){
                                $nCreditos = $rec['CreditoN'];//saco el valor de creditos normales
                            }
                            if(empty($nCreditos)){
                                $TotalCreditos = $nCreditos + $creditosNormales;
                                $builder = $db->table('Tarjetas');
                                $data = [
                                    'CreditoN' => $creditosNormales,//cambio el estado a tarjeta vendida
                                ];
                                $builder->where('idTarjeta', $idtarjeta);
                                if($builder->update($data)){
                                    return TRUE;
                                }else{
                                    return FALSE;
                                }
                            }else{
                                $TotalCreditos = $nCreditos + $creditosNormales;
                                $builder = $db->table('Tarjetas');
                                $data = [
                                    'CreditoN' => $TotalCreditos,//cambio el estado a tarjeta vendida
                                ];
                                $builder->where('idTarjeta', $idtarjeta);
                                if($builder->update($data)){
                                    return TRUE;
                                }else{
                                    return FALSE;
                                }
                            }
                        }
                }
            }
        }else{// la tarjeta NO esta comprada
            $builder = $db->table('Pago');
            $data = [
                'Monto' => $precioTa,
                'idTarjeta' => $idtarjeta,
                'idTipoVenta' => '0',
                'idTransaccion' => $gtran,
            ];
            if($builder->insert($data)){//se inserta el pago en la tarjeta de pago
                $builder = $db->table('Tarjetas');
                $data = [
                    'idStatus' => '0',//cambio el estado a tarjeta vendida
                ];
                $builder->where('idTarjeta', $idtarjeta);
                $builder->update($data);

            };
            if($recarga != ''){//tiene una recarga
                $builder = $db->table('Pago');
                $data = [
                    'Monto' => $recarga,
                    'idTarjeta' => $idtarjeta,
                    'idTipoVenta' => '1',//tipo de venta, recarga
                    'idTransaccion' => $gtran,
                ];
                if($builder->insert($data)){//si me inserta el pago
                    $idpago = $db->insertID();

                    $creditosNormales = ($recarga * $creditosOtorgados)/$precioCreditos;//numero de creditos otorgados por recarga

                    $builder = $db->table('Saldo');// agrega a la tabla de salgo el numero de creditos otorgados a la tarjeta
                    $data = [
                        'CreditoN' => $creditosNormales,
                        'idpago' => $idpago
                    ];    
                        if($builder->insert($data)){//si me inserta el saldo
                            $builder = $db->table('Tarjetas');
                            $builder-> select(
                                'idTarjeta', 'CreditoN'
                            );
                            $builder->where('idTarjeta', $idtarjeta);
                            $query = $builder->get();
                            $datosRecarga = $query->getResultArray();
                            foreach($datosRecarga as $rec){
                                $nCreditos = $rec['CreditoN'];//saco el valor de creditos normales
                            }
                            if(empty($nCreditos)){
                                $TotalCreditos = $nCreditos + $creditosNormales;
                                $builder = $db->table('Tarjetas');
                                $data = [
                                    'CreditoN' => $creditosNormales,//cambio el estado a tarjeta vendida
                                ];
                                $builder->where('idTarjeta', $idtarjeta);
                                if($builder->update($data)){
                                    return TRUE;
                                }else{
                                    return FALSE;
                                }
                            }else{
                                $TotalCreditos = $nCreditos + $creditosNormales;
                                $builder = $db->table('Tarjetas');
                                $data = [
                                    'CreditoN' => $TotalCreditos,//cambio el estado a tarjeta vendida
                                ];
                                $builder->where('idTarjeta', $idtarjeta);
                                if($builder->update($data)){
                                    return TRUE;
                                }else{
                                    return FALSE;
                                }
                            }
                        }
                }
            }
        }
    }














    /*************************************************** AGREGAR TARJETA *********************************************/
    function agregarTarjeta($idtarjeta, $gtran, $precioTa){
        $db = \Config\Database::connect();
        $builder = $db->table('Pago');
        $data = [
            'Monto' => $precioTa,
            'idTarjeta' => $idtarjeta,
            'idTipoVenta' => '0',
            'idTransaccion' => $gtran,
        ];
        if($builder->insert($data)){//se inserta el pago en la tarjeta de pago
            $builder = $db->table('Tarjetas');
            $data = [
                'idStatus' => '0',//cambio el estado a tarjeta vendida
            ];
            $builder->where('idTarjeta', $idtarjeta);
            $builder->update($data);
        };
    }

    /*************************************************** AGREGAR RECARGA *********************************************/
    function agregarRecarga($idtarjeta, $recarga, $gtran, $precioTa, $evento){//venta sin promociones
        /**************************************** obtengo el precio y los creditos de eventos *****************************/
        $db = \Config\Database::connect();
        $builder = $db->table('Eventos');
        $builder-> select(
            'idEvento,
            Precio,
            Creditos'
        );
        $builder->where('idEvento', $evento);
        $query = $builder->get();
        $datosE = $query->getResultArray();
        foreach($datosE as $row){
            $precioCreditos = $row['Precio'];//saco el precio de cuanto va a costar el evento
            $creditosOtorgados = $row['Creditos'];//saco el valor de creditos por dinero
        }
        /******************************* busca si la tarjeta ya existe en la tabla de pagos ****************************************/
        $builder = $db->table('Pago');
        $data = [
            'Monto' => $recarga,
            'idTarjeta' => $idtarjeta,
            'idTipoVenta' => '1',
            'idTransaccion' => $gtran,
        ];
        if($builder->insert($data)){//si me inserta el pago
            $idpago = $db->insertID();
            $creditosNormales = ($recarga * $creditosOtorgados)/$precioCreditos;//numero de creditos otorgados por recarga
            $builder = $db->table('Saldo');// agrega a la tabla de salgo el numero de creditos otorgados a la tarjeta
                $data = [
                    'CreditoN' => $creditosNormales,
                    'idpago' => $idpago
                ];    
                if($builder->insert($data)){//si me inserta el saldo
                    $builder = $db->table('Tarjetas');
                    $builder-> select(
                        'idTarjeta, CreditoN, CreditoC, idStatus'
                    );
                    $builder->where('idTarjeta', $idtarjeta);
                    $query = $builder->get();
                    $datosRecarga = $query->getResultArray();
                    foreach($datosRecarga as $rec){
                        $nCreditos = $rec['CreditoN'];//saco el valor de creditos normales
                    }
                    if(empty($nCreditos)){
                        $TotalCreditos = $nCreditos + $creditosNormales;
                        $builder = $db->table('Tarjetas');
                        $data = [
                            'CreditoN' => $creditosNormales,//cambio el estado a tarjeta vendida
                        ];
                        $builder->where('idTarjeta', $idtarjeta);
                        if($builder->update($data)){
                            return TRUE;
                        }else{
                            return FALSE;
                        }
                    }else{
                        $TotalCreditos = $nCreditos + $creditosNormales;
                        $builder = $db->table('Tarjetas');
                        $data = [
                            'CreditoN' => $TotalCreditos,//cambio el estado a tarjeta vendida
                        ];
                        $builder->where('idTarjeta', $idtarjeta);
                        if($builder->update($data)){
                            return TRUE;
                        }else{
                            return FALSE;
                        }
                    }
                }
        }     
    }

    /*************************************************** AGREGAR PROMOCIONES *****************************************/
    function agregarPromocionesP($idtarjeta, $gtran, $promo){// venta con promo
        $db = \Config\Database::connect();
        $array = [];
       /* $i=0;
        while($i < $promo){*/
            foreach($promo as $p){
                //echo var_dump($p);
                $builder = $db->table('Pago');
                $data = [
                    'Monto' => $p,
                    'idTarjeta' => $idtarjeta,
                    'idTipoVenta' => '2',
                    'idTransaccion' => $gtran,
                ];
                //$builder->insert($data);
                if($builder->insert($data)){
                    $idpago =$db->insertID();
                    array_push($array, $idpago);
                    /*$idpago =$db->insertID();
                        foreach($idPromo as $ppp){
                            echo $idpago;   
                            echo var_dump($ppp);
                            $builder = $db->table('Promo_Ventas');
                            $data = [
                                'pago_Id' => $idpago,
                                'promo_Id' => $ppp,
                                'idTransaccion' => $gtran
                            ];
                            $builder->insert($data);
                        }*/
                    //return $idpago;
                }
                
            }
            //echo var_dump($array);
            return $array;
            
                //foreach($idpagoss as $pp){
                   // echo  'Soy array pagos'.$pp;
                    /*$val = intval($pp);
                    $builder = $db->table('Promo_Ventas');
                    $data = [
                        'pago_Id' => $pag,
                        'promo_Id' => $val,
                        'idTransaccion' => $gtran
                    ];
                    if($builder->insert($data)){
                        return $data;
                    }else{
                        return FALSE;
                    }    */   
                //}
           /* $i=$i+1;
            return $i;
        }*/

                /*foreach($idPromo as $pp){
                    $val = intval($pp);
                    $builder = $db->table('Promo_Ventas');
                    $data = [
                        'pago_Id' => $idpago,
                        'promo_Id' => $val,
                        'idTransaccion' => $gtran
                    ];
                    if($builder->insert($data)){
                        return $data;
                    }else{
                        return FALSE;
                    }       
                }*/
        /*$builder = $db->table('Pago');
        $data = [
            'Monto' => $promoP,
            'idTarjeta' => $idtarjeta,
            'idTipoVenta' => '2',
            'idTransaccion' => $gtran,
        ];
        if($builder->insert($data)){//me inserta el pago
            $idpago =$db->insertID();
            
            foreach($idPromo as $pp){
                $val = intval($pp);
                $builder = $db->table('Promo_Ventas');
                $data = [
                    'pago_Id' => $idpago,
                    'promo_Id' => $val,
                    'idTransaccion' => $gtran
                ];
                if($builder->insert($data)){
                    return $data;
                }else{
                    return FALSE;
                }       
            }
        }else{
            return FALSE;
        }*/
    }

    function agregarPromoV($idpay,$idPromo, $gtran){
        $db = \Config\Database::connect();
        $array =[];
        
            foreach($idpay as $p){
                //array_push($array,$p);
                //echo var_dump($p);
                if(in_array($p,$array)){

                }else{
                    array_push($array,$p);
                    foreach($idPromo as $ppp){
                        if(in_array($ppp,$array)){
                            
                        }else{
                            array_push($array,$ppp);
                            $builder = $db->table('Promo_Ventas');
                            $data = [
                                'pago_Id' => $p,//REVISAR PORQUE NO INCREMENTA EL ID DE PAGO Y SOLO ME TOMA EL PRIMERO
                                'promo_Id' => $ppp,
                                'idTransaccion' => $gtran
                            ];
                            $builder->insert($data);
                            
                        }
                    }
                }
                    
                        
                        
                        //echo $idpago;   
                        //echo var_dump($ppp);
                        /*$builder = $db->table('Promo_Ventas');
                        $data = [
                            'pago_Id' => $idpago,
                            'promo_Id' => $ppp,
                            'idTransaccion' => $gtran
                        ];
                        $builder->insert($data);*/
                    //}
            }
           // echo var_dump($array);
    }

    /*********************************************** AGREGAR PROMOCIONES CREDITOS ************************************/
    function agregarPromocionesC($idtarjeta, $gtran, $promoC, $idPromoC, $evento){// venta con promo
        $db = \Config\Database::connect();
        $builder = $db->table('Eventos');
        $builder-> select(
            'idEvento,
            Precio,
            Creditos'
        );
        $builder->where('idEvento', $evento);
        $query = $builder->get();
        $datosE = $query->getResultArray();
        foreach($datosE as $row){
            $precioCreditos = $row['Precio'];//saco el precio de cuanto va a costar el evento
            $creditosOtorgados = $row['Creditos'];//saco el valor de creditos por dinero
        }

        $builder = $db->table('Tarjetas');
        $builder-> select(
            'idTarjeta, CreditoN, CreditoC, idStatus'
        );
        $builder->where('idTarjeta', $idtarjeta);
        $query = $builder->get();
        $datosRecarga = $query->getResultArray();
        foreach($datosRecarga as $rec){
            $nCreditos = $rec['CreditoN'];//saco el valor de creditos normales
            $cCreditos = $rec['CreditoC'];//saco el valor de creditos de cortesia
        }

        $i =0;

        while($i < $promoC){
            foreach($promoC as $p){
                $builder = $db->table('Pago');
                $data = [
                    'Monto' => $p,
                    'idTarjeta' => $idtarjeta,
                    'idTipoVenta' => '3',
                    'idTransaccion' => $gtran,
                ];
                if($builder->insert($data)){
                    $idpago = $db->insertID();
                    $creditosNormales = ($p * $creditosOtorgados)/$precioCreditos;//numero de creditos otorgados por precio de la promo
                    foreach($idPromoC as $pp){
                        $val = intval($pp);
                        $builder = $db->table('Registro_Saldo_Pago_Promocion');
                        $data = [
                            'idPago' => $idpago,
                            'idFechaCreditosCortesia' => $val,
                        ];
                        if($builder->insert($data)){//si me inserta el saldo
                            $builder = $db->table('Calendario_Creditos_Cortesia');
                            $builder-> select(
                                'Creditos'
                            );
                            $builder->where('idFechaCreditosCortesia', $val);
                            $query = $builder->get();
                            $datosprom = $query->getResultArray();
                            foreach($datosprom as $rec2){
                                $creditosReg = $rec2['Creditos'];//saco el valor de creditos de cortesia
                                
                            }
                            if(empty($nCreditos) && empty($cCreditos)){
                               // echo 'Estoy vacio'.$nCreditos . '' . $cCreditos;
                                $builder = $db->table('Tarjetas');
                                $data = [
                                    'CreditoN' => $creditosNormales,//cambio el estado a tarjeta vendida
                                    'CreditoC' => $creditosReg
                                ];
                                $builder->where('idTarjeta', $idtarjeta);
                                if($builder->update($data)){
                                    return TRUE;
                                }else{
                                    return FALSE;
                                }
                            }else{
                                //echo 'no estoy vacio'.$nCreditos . 'ccred' . $cCreditos;
                                $TotalCreditos = $nCreditos + $creditosNormales;
                                $TotalCreditosC = $cCreditos + $creditosReg;
                                $builder = $db->table('Tarjetas');
                                $data = [
                                    'CreditoN' => $TotalCreditos,//cambio el estado a tarjeta vendida
                                    'CreditoC' => $TotalCreditosC
                                ];
                                $builder->where('idTarjeta', $idtarjeta);
                                $builder->update($data);
                            }
                        }

                        /*$builder = $db->table('Calendario_Creditos_Cortesia');
                        $builder-> select(
                            'Creditos'
                        );
                        $builder->where('idFechaCreditosCortesia', $val);
                        $query = $builder->get();
                        $datosprom = $query->getResultArray();
                        foreach($datosprom as $rec2){
                            $creditosReg = $rec2['Creditos'];//saco el valor de creditos de cortesia
                            
                        }
                            if(empty($cCreditos)){
                                echo 'soy de regalo'.$creditosReg;
                                $builder = $db->table('Tarjetas');
                                $data = [
                                    'CreditoC' => $creditosReg,//cambio el estado a tarjeta vendida
                                ];
                                $builder->where('idTarjeta', $idtarjeta);
                                if($builder->update($data)){
                                    echo 'Si actualizo';
                                }else{
                                    echo 'no actualizo';
                                }
                            }else{
                                $TotalCreditosC = $cCreditos + $creditosReg;
                                $builder = $db->table('Tarjetas');
                                $data = [
                                    'CreditoC' => $TotalCreditosC,//cambio el estado a tarjeta vendida
                                ];
                                $builder->where('idTarjeta', $idtarjeta);
                                $builder->update($data);
                                if($builder->update($data)){
                                    echo 'Si actualizo';
                                }else{
                                    echo 'no actualizo';
                                }
                            }*/
                    }
                }
            }
            return $data;
            $i=$i+1;
        }

        /*foreach($promoC as $p){
            $builder = $db->table('Pago');
            $data = [
                'Monto' => $p,
                'idTarjeta' => $idtarjeta,
                'idTipoVenta' => '3',
                'idTransaccion' => $gtran,
            ];
            
            if($builder->insert($data)){
                $idpago = $db->insertID();
                $creditosNormales = ($p * $creditosOtorgados)/$precioCreditos;//numero de creditos otorgados por recarga4
                foreach($idPromoC as $pp){
                    $val = intval($pp);
                    $builder = $db->table('Registro_Saldo_Pago_Promocion');
                    $data = [
                        'idPago' => $idpago,
                        'idFechaCreditosCortesia' => $val,
                    ];

                    if($builder->insert($data)){//si me inserta el saldo
                        $builder = $db->table('Tarjetas');
                        $builder-> select(
                            'idTarjeta, CreditoN, CreditoC, idStatus'
                        );
                        $builder->where('idTarjeta', $idtarjeta);
                        $query = $builder->get();
                        $datosRecarga = $query->getResultArray();
                        foreach($datosRecarga as $rec){
                            $nCreditos = $rec['CreditoN'];//saco el valor de creditos normales
                            $cCreditos = $rec['CreditoC'];//saco el valor de creditos de cortesia
                        }
                            if(empty($nCreditos)){
                                $TotalCreditos = $nCreditos + $creditosNormales;
                                $builder = $db->table('Tarjetas');
                                $data = [
                                    'CreditoN' => $creditosNormales,//cambio el estado a tarjeta vendida
                                ];
                                $builder->where('idTarjeta', $idtarjeta);
                                if($builder->update($data)){
                                    return TRUE;
                                }else{
                                    return FALSE;
                                }
                            }else{
                                $TotalCreditos = $nCreditos + $creditosNormales;
                                $builder = $db->table('Tarjetas');
                                $data = [
                                    'CreditoN' => $TotalCreditos,//cambio el estado a tarjeta vendida
                                ];
                                $builder->where('idTarjeta', $idtarjeta);
                                if($builder->update($data)){
                                    return TRUE;
                                }else{
                                    return FALSE;
                                }
                            }

                            $builder = $db->table('Calendario_Creditos_Cortesia');
                            $builder-> select(
                                'idFechaCreditosCortesia, Creditos'
                            );
                            $builder->where('idFechaCreditosCortesia', $val);
                            $query = $builder->get();
                            $datosprom = $query->getResultArray();
                            foreach($datosprom as $rec2){
                                $creditosReg = $rec2['Creditos'];//saco el valor de creditos de cortesia
                            }
                                if(empty($cCreditos)){
                                    $TotalCreditosC = $cCreditos + $creditosReg;
                                    $builder = $db->table('Tarjetas');
                                    $data = [
                                        'CreditoC' => $creditosReg,//cambio el estado a tarjeta vendida
                                    ];
                                    $builder->where('idTarjeta', $idtarjeta);
                                    if($builder->update($data)){
                                        return TRUE;
                                    }else{
                                        return FALSE;
                                    }
                                }else{
                                    $TotalCreditosC = $cCreditos + $creditosReg;
                                    $builder = $db->table('Tarjetas');
                                    $data = [
                                        'CreditoC' => $TotalCreditosC,//cambio el estado a tarjeta vendida
                                    ];
                                    $builder->where('idTarjeta', $idtarjeta);
                                    if($builder->update($data)){
                                        return TRUE;
                                    }else{
                                        return FALSE;
                                    }
                                }
                                return $data;
                    }else{
                        return FALSE;
                    }    
                }     */


                
                
                /*$idpago =$db->insertID();

                foreach($idPromoC as $pp){

                    $val = intval($pp);

                    $builder = $db->table('Registro_Saldo_Pago_Promocion');
                    $data = [
                        'idPago' => $idpago,
                        'idFechaCreditosCortesia' => $val,
                    ];

                    if($builder->insert($data)){

                        return $data;

                    }else{

                        return FALSE;

                    }    
                }*/

            //}
        //}
    }

    /*********************************************** AGREGAR FAJILLA ************************************/
    function agregarF($e, $v, $idv, $folioI, $folioF, $fecha){
        $db = \Config\Database::connect();
        /*********************************** obtener id de las tarjetas de los folios ingresador ************************/
        $query = $db->query("SELECT COUNT(*) as TarjetasTotales , (SELECT DISTINCT(idTarjeta) from Tarjetas t WHERE Folio = ".$folioI.") as foliio,
                            (SELECT DISTINCT(idTarjeta) from Tarjetas t WHERE Folio = ".$folioF.") as folioff
                            from Tarjetas t WHERE Folio BETWEEN ".$folioI." and ".$folioF);
        $idTarjetaa = $query->getResultArray();
        foreach($idTarjetaa as $tnuevas){
            $folii = $tnuevas['foliio'];
            $folff = $tnuevas['folioff'];
        }      

        /*********************************** Consultar el estado de la fajilla ************************/
        $builder = $db->table('Fajillas');
        $builder-> select(
            'folioInicial,
            folioFinal,
            idAperturaVentanilla,
            idFajilla'
        );
        $builder->where('idFajilla', $v);
        $query = $builder->get();
        $datos = $query->getResultArray();
        foreach($datos as $d){
            $folioi = $d['folioInicial'];
            $foliof = $d['folioFinal'];
            $idApVentanilla = $d['idAperturaVentanilla'];
        }

        $query = $db->query("SELECT count(*) as vendidas, (SELECT COUNT(*) from Tarjetas WHERE idStatus ='1' and idTarjeta BETWEEN ".$folioi." and ".$foliof.") as sobrantes, 
                            (SELECT COUNT(*) from Tarjetas WHERE idStatus ='5' and idTarjeta BETWEEN  ".$folioi." and ".$foliof.") as defectuosas, 
                            (SELECT COUNT(*) from Tarjetas WHERE idTarjeta BETWEEN ".$folioi." and ".$foliof.") as totalTarjetas FROM Tarjetas WHERE idStatus ='0' and idTarjeta BETWEEN ".$folioi." and ".$foliof);
        $result = $query->getResultArray();
        foreach($result as $t){
            $noVendidas = $t['sobrantes'];
            $defectuosas = $t['defectuosas'];
        }
        if($noVendidas == 0){
        /*********************************** Insertar la nueva fajilla ************************/
            $builder = $db->table('Fajillas');
            $data = [
                'idStatus' => '3'
            ];
            $builder->where('idFajilla', $v);
            if($builder->update($data)){

                $builder = $db->table('Fajillas');
                $data = [
                    'fecha' => $fecha,
                    'idStatus' => '6',
                    'folioInicial' => $folii,
                    'folioFinal'=>$folff,
                    'idAperturaVentanilla' => $idApVentanilla
                ];
                if($builder->insert($data)){
                    return true;
                }else{
                    return false;
                }
            }
        }else{
            return false;
        }
    }

    /*********************************************** DEVOLVER TARJETA ************************************/
    function devolucionTarjeta($tarjetaDev, $descripcion, $idAp){
        $db = \Config\Database::connect();
        /**************************************** Buscar id inicial y final de la ventanilla *******************************/
        $builder = $db->table('Fajillas');
        $builder-> select(
            'folioInicial,
             folioFinal,
             idAperturaVentanilla,
             idFajilla
            '
        );
        //$builder ->where('idAperturaVentanilla', $idAp);
        $builder ->where('idFajilla', $idAp);
        $query = $builder->get();
        $datos = $query->getResultArray();
        foreach($datos as $idTurno){
            $folInicialTurno = $idTurno['folioInicial'];
            $folFinalTurno = $idTurno['folioFinal'];
            $idAperturaV = $idTurno['idAperturaVentanilla'];
        }

        /******************************************* Sacar el id de la tarjeta con el folio de la tarjeta a devolver ******************/
        $builder = $db->table('Tarjetas');
        $builder-> select(
            'idTarjeta, idStatus'
        );
        $builder->where('Folio', $tarjetaDev);
        $query = $builder->get();
        $datosRecarga = $query->getResultArray();
        foreach($datosRecarga as $rec){
            $idTar = $rec['idTarjeta'];//saco el valor de idtarjeta
        }

        /********************* Verificar que la tarjeta ingresada esta dentro del rango inicial y final insertados en la ventanilla ********/
        $builder = $db->table('Tarjetas');
        $builder-> select(
            'idTarjeta, idStatus'
        );
        $builder ->where("idTarjeta BETWEEN " . $folInicialTurno . " and ". $folFinalTurno);
        $builder->where('idTarjeta', $idTar);
        $builder->where('idStatus !=', 0);
        $builder->where('idStatus !=', 5);
        $query = $builder->get();
        $datosRecarga = $query->getResultObject();
        if($datosRecarga){
            $builder = $db->table('Devolucion_Tarjetas');
            $data = [
                'idTarjeta' => $idTar,
                'idAperturaVentanilla' => $idAperturaV,
                'Descripcion' => $descripcion,
            ];
            if($builder->insert($data)){
                $builder = $db->table('Tarjetas');
                $data = [
                    'idStatus' => '5',//cambio el estado a tarjeta vendida
                ];
                $builder->where('idTarjeta', $idTar);
                if($builder->update($data)){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    /*********************************************** CONSULTAR BANCOS ************************************/
    function consultaBancos(){
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM Bancos");
        $query = $query->getResultObject();
        return $query;
    }

}
