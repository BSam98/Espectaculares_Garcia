<?php

namespace App\Models;

use CodeIgniter\Database\BaseBuilder;
use CodeIgniter\Model;

class Validador_Model extends Model {

    public function listado_Atracciones($datos){
        $db = \Config\Database::connect();
        $builder =$db->table('Atraccion_Evento');

        $builder->select(
            '
            Atraccion_Evento.idAtraccionEvento,
            Atracciones.Nombre,
            '
        );

        $builder->join(
            'Atracciones',
            'Atracciones.idAtraccion = Atraccion_Evento.idAtraccion',
            'inner'
        );

        $builder->where('Atraccion_Evento.idZona',$datos['idZona']);

        $query = $builder->get();

        $datos = $query->getResultObject();

        return $datos;
    }

    public function informacion_Turno($idAperturaValidador){

        $db = \Config\Database::connect();
        $builder= $db->table('Apertura_Validador');

        $builder->select(
            '
            Apertura_Validador.idAperturaValidador,
            Atraccion_Evento.idAtraccionEvento,
            Atraccion_Evento.Creditos,
            Atraccion_Evento.creditosCortesia,
            Atracciones.Nombre AS Atraccion,
            Atracciones.CapacidadMAX,
            Atracciones.Tiempo,
            Atracciones.TiempoMAX,
            Atracciones.CapacidadMIN
            '
        );

        $builder->join(
            'Atraccion_Evento',
            'Atraccion_Evento.idAtraccionEvento = Apertura_Validador.idAtraccionEvento',
            'inner'
        );

        $builder->join(
            'Atracciones',
            'Atracciones.idAtraccion = Atraccion_Evento.idAtraccion',
            'inner'
        );

        $builder->where('Apertura_Validador.idAperturaValidador',$idAperturaValidador);

        $query = $builder->get();

        $datos = $query->getResultObject();

        return $datos;
    }

    public function descuentos ($idAtraccionEvento, $fechaInicial, $fechaFinal){
        $db = \Config\Database::connect();

        $query = $db->query(
            "SELECT DISTINCT
                Calendario_Dos_x_Uno.idFechaDosxUno,
                Calendario_Dos_x_Uno.FechaInicial,
                Calendario_Dos_x_Uno.FechaFinal,
                Promocion_Dos_x_Uno.idDosxUno,
                Promocion_Dos_x_Uno.Nombre,
                Promocion_Dos_x_Uno.Cantidad,
                Promocion_Dos_x_Uno.Boletos
                FROM
                    Calendario_Dos_x_Uno
                INNER JOIN
                    Promocion_Dos_x_Uno
                ON
                    Calendario_Dos_x_Uno.idDosxUno = Promocion_Dos_x_Uno.idDosxUno
                INNER JOIN
                    Atracciones_Incluidas_Dos_x_Uno
                ON
                    Promocion_Dos_x_Uno.idDosxUno = Calendario_Dos_x_Uno.idDosxUno
                WHERE
                    Atracciones_Incluidas_Dos_x_Uno.idAtraccionEvento = $idAtraccionEvento
                AND
                    Calendario_Dos_x_Uno.FechaInicial <='$fechaInicial'
                AND
                    Calendario_Dos_x_Uno.FechaFinal >='$fechaFinal';
            "
        );

        $datos = $query->getResultObject();

        return $datos;
    }

    public function juegos_Gratis($idAtraccionEvento, $fechaInicial, $fechaFinal){
        $db = \Config\Database::connect();

        $query = $db->query(
            "SELECT DISTINCT
                Calendario_Juegos_Gratis.idFechaJuegosGratis,
                Calendario_Juegos_Gratis.Precio,
                Calendario_Juegos_Gratis.FechaInicial,
                Calendario_Juegos_Gratis.FechaFinal,
                Promocion_Juegos_Gratis.idJuegosGratis,
                Promocion_Juegos_Gratis.Nombre
            FROM
                Calendario_Juegos_Gratis
            INNER JOIN
                Promocion_Juegos_Gratis
            ON
                Calendario_Juegos_Gratis.idJuegosGratis = Promocion_Juegos_Gratis.idJuegosGratis
            INNER JOIN
                Atracciones_Incluidas_Juegos_Gratis
            ON
                Promocion_Juegos_Gratis.idJuegosGratis = Atracciones_Incluidas_Juegos_Gratis.idJuegosGratis
            WHERE
                Atracciones_Incluidas_Juegos_Gratis.idAtraccionEvento = $idAtraccionEvento
            AND
                Calendario_Juegos_Gratis.FechaInicial <='$fechaInicial'
            AND
                Calendario_Juegos_Gratis.FechaFinal >= '$fechaFinal';
            "
        );

        $datos = $query->getResultObject();

        return $datos;
    }

    public function pulsera_Magica($idAtraccionEvento, $fechaInicial, $fechaFinal){
        $db = \Config\Database::connect();

        $query = $db->query(
            "SELECT DISTINCT
                Calendario_Pulsera_Magica.idFechaPulseraMagica,
                Calendario_Pulsera_Magica.Precio,
                Calendario_Pulsera_Magica.FechaInicial,
                Calendario_Pulsera_Magica.FechaFinal,
                Promocion_Pulsera_Magica.idPulseraMagica,
                Promocion_Pulsera_Magica.Nombre
            FROM
                Calendario_Pulsera_Magica
            INNER JOIN
                Promocion_Pulsera_Magica
            ON
                Calendario_Pulsera_Magica.idPulseraMagica = Promocion_Pulsera_Magica.idPulseraMagica
            INNER JOIN
                Atracciones_Incluidas_Pulsera_Magica
            ON
                Promocion_Pulsera_Magica.idPulseraMagica = Atracciones_Incluidas_Pulsera_Magica.idPulseraMagica
            WHERE
                Atracciones_Incluidas_Pulsera_Magica.idAtraccionEvento = $idAtraccionEvento
            AND
                Calendario_Pulsera_Magica.FechaInicial <='$fechaInicial'
            AND
                Calendario_Pulsera_Magica.FechaFinal >= '$fechaFinal';
            "
        );

        $datos = $query->getResultObject();

        return $datos;
    }

    public function insertar_Atraccion($datos){
        $db=\Config\Database::connect();
        $builder= $db->table('Atraccion_Evento');

        $builder->select(
            '
            statusValidador
            '
        );

        $builder->where('idAtraccionEvento',$datos['idAtraccionEvento']);

        $query = $builder->get();

        $respuesta = $query->getResultArray();

        if($respuesta[0]['statusValidador'] == 0){
            $builder= $db->table('Atraccion_Evento');

            $builder->set('statusValidador',1);
            $builder->where('idAtraccionEvento',$datos['idAtraccionEvento']);
            $builder->update();

            $builder= $db->table('Apertura_Validador');

            if($builder->insert($datos)){
                return $db->insertID();
            }
        }
        else{
            return false;
        }
    }


    public function Cerrar_Sesion($datos,$idAtraccionEvento){
        $db = \Config\Database::connect();
        $builder = $db->table('Atraccion_Evento');

        $builder->set('statusValidador',0);
        $builder->where('idAtraccionEvento',$idAtraccionEvento);

        $builder->update();

        $builder = $db->table('Cierre_Validador');

        if($builder->insert($datos)){
            return true;
        }
        else{
            return false;
        }
    }

    public function Validar_Saldo($folio){
        $db = \Config\Database::connect();
        $builder = $db->table('Saldo');
        
        $builder->select(
            '
            Saldo.idSaldo,
            Saldo.CreditoN,
            Saldo.CreditoC,
            Saldo.idTarjeta
            '
        );

        $builder->join(
            'Tarjetas',
            'Tarjetas.idTarjeta = Saldo.idTarjeta',
            'INNER'
        );

        $builder->where('Tarjetas.folio',$folio);

        $query = $builder->get();

        $datos = $query->getResultObject();

        return $datos;
    }

    public function Validar_Pulsera($folio,$fecha){
        $db = \Config\Database::connect();
        $builder = $db->table('Calendario_Pulsera_Magica');

        $builder->select(
            '
            Calendario_Pulsera_Magica.idFechaPulseraMagica
            '
        );

        $builder->join(
            'Promo_Ventas',
            'Calendario_Pulsera_Magica.idFechaPulseraMagica = Promo_Ventas.promo_Id',
            'INNER'
        );

        $builder->join(
            'Pago',
            'Promo_Ventas.pago_Id = Pago.idPago',
            'INNER'
        );

        $subQuery = $db->table('Tarjetas')->select('idTarjeta')->where('Folio',$folio);

        $builder->where('Pago.idTarjeta',$subQuery);

        $builder->where('Calendario_Pulsera_Magica.FechaInicial<=',$fecha);

        $builder->where('Calendario_Pulsera_Magica.FechaFinal>=',$fecha);

        $query= $builder->get();

        $datos = $query->getResultObject();

        return $datos;
    }
}