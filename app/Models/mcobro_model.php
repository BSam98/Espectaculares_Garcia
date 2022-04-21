<?php

namespace App\Models;

use CodeIgniter\Model;

class mcobro_model extends Model{

    public function button(){
        
    }

    public function promoPulsera(){
        $db = \Config\Database::connect();
        $builder = $db->table('Promocion_Pulsera_Magica');

        $builder-> select(
            'Promocion_Pulsera_Magica.idPulseraMagica, 
             Promocion_Pulsera_Magica.Nombre, 
             Promocion_Pulsera_Magica.Precio,
             (SELECT CAST(FechaInicial AS date)) as fechaI
            '
        );
        $builder->join('Calendario_Pulsera_Magica', 'Promocion_Pulsera_Magica.idPulseraMagica = Calendario_Pulsera_Magica.idPulseraMagica');
        $query = $builder->get();
        $datos = $query->getResultObject();
        return $datos;
    }

    public function promoMostrar($idPromo){
        $db = \Config\Database::connect();
        $builder = $db->table('Promocion_Pulsera_Magica');

        $builder-> select(
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
        return $datos;
    }

    function consultarTurno($evento,$zona, $taquilla,$ventanilla,$usuario){
        $db = \Config\Database::connect();
        $builder = $db->table('Eventos');
        $builder-> select(
            ' Eventos.Nombre as NombreEvento,
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

    function guardarVenta($usuario,$fecha, $tarjeta, $recarga, $totalPago){
        $db = \Config\Database::connect();
        $builder = $db->table('Pago');
        $builder-> select(
            'idTarjeta'
        );
        $builder->where('idTarjeta', $tarjeta);
        $query = $builder->get();
        $datos = $query->getResultObject();
        if($datos){
            $builder = $db->table('Pago');
            $data = [
                'MontoTotal' => $totalPago,
                'Folio' => $tarjeta,
                'FechaVenta' => $fecha,
                'idTransaccion' => '1',
                'idFormasPago' => $usuario,
                'idTarjeta' => $tarjeta,
                'idUsuario' => $usuario,
            ];
            //$builder->insert($data);
            if($builder->insert($data)){
                return $db->insertID();
            }
            else{
                return false;
            }
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
            $builder = $db->table('Pago');
            $data = [
                'MontoTotal' => $totalPago,
                'Folio' => $tarjeta,
                'FechaVenta' => $fecha,
                'idTransaccion' => '0',
                'idFormasPago' => $usuario,
                'idTarjeta' => $tarjeta,
                'idUsuario' => $usuario,
            ];
            //$builder->insert($data);
            if($builder->insert($data)){
                return $db->insertID();
            }
            else{
                return false;
            }
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

        function promoVendidas($dat,$promoP){
            $db = \Config\Database::connect();
            $builder = $db->table('Promo_Ventas');
            $data = [
                'pago_Id' => $dat,
                'promo_Id' => $promoP
            ];
            if($builder->insert($data)){
                return TRUE;
            }else{
                return FALSE;
            }
        }
    }

}
