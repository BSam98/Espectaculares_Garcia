<?php

namespace App\Models;

use CodeIgniter\Model;

class Reponer_Saldo_Model extends Model{
    protected $builder;

    public function movimientos_Tarjeta_Atraccion($folio){
        $db = \Config\Database::connect();
        $builder = $db->table('Movimiento');

        $builder->select(
            '
            Movimiento.idMovimiento,
            Ciclo.Hora
            '
        );

        $builder->join(
            'Ciclo',
            'Movimiento.idCiclo = Ciclo.idCiclo',
            'inner'
        );

        $idTarjeta = $db->table('Tarjetas')->select('idTarjeta')->where('Folio',$folio);
        $builder->where('Movimiento.idTarjeta',$idTarjeta);

        $query = $builder->get();

        $movimiento = $query->getResultObject();

        /**----------Descuentos-------------------------- */

        $builder = $db->table('Registro_Atraccion_Dos_x_Uno');

        $builder->select(
            '
            Registro_Atraccion_Dos_x_Uno.idRADU,
            Ciclo.Hora
            '
        );

        $builder->join(
            'Ciclo',
            'Registro_Atraccion_Dos_x_Uno.idCiclo = Ciclo.idCiclo',
            'inner'
        );

        $idTarjeta = $db->table('Tarjetas')->select('idTarjeta')->where('Folio',$folio);
        $builder->where('Registro_Atraccion_Dos_x_Uno.idTarjeta',$idTarjeta);

        $query = $builder->get();
        $descuentos = $query->getResultObject();

        /**----------------------Pulsera_Magica----------------- */

        $builder = $db->table('Registro_Atracciones_Pulsera_Magica');

        $builder->select(
            '
            Registro_Atracciones_Pulsera_Magica.idRAPM,
            Ciclo.Hora
            '
        );

        $builder->join(
            'Ciclo',
            'Registro_Atracciones_Pulsera_Magica.idCiclo = Ciclo.idCiclo',
            'inner'
        );

        $idTarjeta = $db->table('Tarjetas')->select('idTarjeta')->where('Folio',$folio);
        $builder->where('Registro_Atracciones_Pulsera_Magica.idTarjeta',$idTarjeta);

        $query = $builder->get();
        $pulsera = $query->getResultObject();

        /**-----------------------Juego Gratis---------------------- */

        $builder = $db->table('Registro_Atraccion_Juegos_Gratis');

        $builder->select(
            '
            Registro_Atraccion_Juegos_Gratis.idRAJG,
            Ciclo.Hora
            '
        );

        $builder->join(
            'Ciclo',
            'Registro_Atraccion_Juegos_Gratis.idCiclo = Ciclo.idCiclo',
            'inner'
        );

        $idTarjeta = $db->table('Tarjetas')->select('idTarjeta')->where('Folio',$folio);
        $builder->where('Registro_Atraccion_Juegos_Gratis.idTarjeta',$idTarjeta);

        $query = $builder->get();
        $gratis = $query->getResultObject();

        $datos = [
            'movimiento' => $movimiento,
            'descuentos' => $descuentos,
            'pulsera' => $pulsera,
            'gratis' => $gratis
        ];

        return $datos;
    }

    public function movimientos_Tarjeta_Taquilla($folio){
        $db = \Config\Database::connect();

        $builder = $db->table('Saldo');

        $builder->select(
            '
            Saldo.idSaldo,
            Transaccion.Fecha
            '
        );

        $builder->join(
            'Pago',
            'Saldo.idPago = Pago.idPago',
            'inner'
        );

        $builder->join(
            'Transaccion',
            'Pago.idTransaccion = Transaccion.idTransaccion',
            'inner'
        );

        $idTarjeta = $db->table('Tarjetas')->select('idTarjeta')->where('Folio',$folio);
        $builder->where('Pago.idTarjeta',$idTarjeta);

        $query = $builder->get();
        $saldo = $query->getResultObject();

        /**-----------Promocion creditos cortesia------------ */

        $builder = $db->table('Registro_Saldo_Pago_Promocion');

        $builder->select(
            '
            Registro_Saldo_Pago_Promocion.idSPP,
            Transaccion.Fecha
            '
        );

        $builder->join(
            'Pago',
            'Registro_Saldo_Pago_Promocion.idPago = Pago.idPago',
            'inner'
        );

        $builder->join(
            'Transaccion',
            'Pago.idTransaccion = Transaccion.idTransaccion',
            'inner'
        );

        $idTarjeta = $db->table('Tarjetas')->select('idTarjeta')->where('Folio',$folio);
        $builder->where('Pago.idTarjeta',$idTarjeta);


        $query = $builder->get();

        $cortesia = $query->getResultObject();

        /**----------------Compra Pulsera Magica---------------- */

        $builder = $db->table('Promo_Ventas');

        $builder->select(
            '
            Promo_Ventas.idPromoV,
            Transaccion.Fecha
            '
        );

        $builder->join(
            'Pago',
            'Promo_Ventas.pago_Id = Pago.idPago',
            'inner'
        );

        $builder->join(
            'Transaccion',
            'Promo_Ventas.idTransaccion = Transaccion.idTransaccion',
            'inner'
        );

        $idTarjeta = $db->table('Tarjetas')->select('idTarjeta')->where('Folio',$folio);
        $builder->where('Pago.idTarjeta',$idTarjeta);

        $query = $builder->get();

        $pulsera = $query->getResultObject();

        $datos = [
            'saldo'=>$saldo,
            'cortesia'=>$cortesia,
            'pulsera' =>$pulsera
        ];

        return $datos;
    }

    public function detalle_Movimiento($idMovimiento){
        $db = \Config\Database::connect();

        $query = $db->query(
            "SELECT 
                Movimiento.idMovimiento,
                Atracciones.Nombre AS Atraccion,
                Usuarios.Nombre,
                Usuarios.Apellidos,
                Ciclo.Hora,
                Movimiento.Creditos,
                Movimiento.Cortesias
            FROM
                Movimiento
            INNER JOIN
                Ciclo
            ON
                Movimiento.idCiclo = Ciclo.idCiclo
            INNER JOIN
                Apertura_Validador
            ON
                Ciclo.idAperturaValidador = Apertura_Validador.idAperturaValidador
            INNER JOIN
                Usuarios
            ON
                Apertura_Validador.idUsuario = Usuarios.idUsuario
            INNER JOIN
                Atraccion_Evento
            ON
                Apertura_Validador.idAtraccionEvento = Atraccion_Evento.idAtraccionEvento
            INNER JOIN
                Atracciones
            ON
                Atraccion_Evento.idAtraccion = Atracciones.idAtraccion
            WHERE
                Movimiento.idMovimiento = $idMovimiento;
        "
        );

        $datos = $query->getResultObject();

        return $datos;
    }

    public function descuento_Atraccion($id){
        $db = \Config\Database::connect();

        $query = $db->query(
            "SELECT
                Atracciones.Nombre AS Atraccion,
                Usuarios.Nombre,
                Usuarios.Apellidos,
                Ciclo.Hora,
                Promocion_Dos_x_Uno.Nombre AS Promocion,
                Registro_Atraccion_Dos_x_Uno.CantidadN,
                Registro_Atraccion_Dos_x_Uno.CantidadC
            FROM
                Registro_Atraccion_Dos_x_Uno
            INNER JOIN
                Ciclo
            ON
                Registro_Atraccion_Dos_x_Uno.idCiclo = Ciclo.idCiclo
            INNER JOIN
                Apertura_Validador
            ON
                Ciclo.idAperturaValidador = Apertura_Validador.idAperturaValidador
            INNER JOIN
                Usuarios
            ON
                Apertura_Validador.idUsuario = Usuarios.idUsuario
            INNER JOIN
                Calendario_Dos_x_Uno
            ON 
                Registro_Atraccion_Dos_x_Uno.idFechaDosxUno = Calendario_Dos_x_Uno.idFechaDosxUno
            INNER JOIN
                Promocion_Dos_x_Uno
            ON
                Calendario_Dos_x_Uno.idDosxUno = Promocion_Dos_x_Uno.idDosxUno
            INNER JOIN
                Atraccion_Evento
            ON
                Registro_Atraccion_Dos_x_Uno.idAtraccionEvento = Atraccion_Evento.idAtraccionEvento
            INNER JOIN
                Atracciones
            ON
                Atraccion_Evento.idAtraccion = Atracciones.idAtraccion
            WHERE
                Registro_Atraccion_Dos_x_Uno.idRADU = $id;
        "
        );

        $datos = $query->getResultObject();

        return $datos;
    }

    public function pulsera_Atraccion($id){
        $db = \Config\Database::connect();

        $query = $db->query(
            "SELECT
                Registro_Atracciones_Pulsera_Magica.idRAPM,
                Atracciones.Nombre AS Atraccion,
                Usuarios.Nombre,
                Usuarios.Apellidos,
                Ciclo.Hora,
                Promocion_Pulsera_Magica.Nombre AS Promocion
            FROM
                Registro_Atracciones_Pulsera_Magica
            INNER JOIN
                Ciclo
            ON
                Registro_Atracciones_Pulsera_Magica.idCiclo = Ciclo.idCiclo
            INNER JOIN
                Apertura_Validador
            ON
                Ciclo.idAperturaValidador = Apertura_Validador.idAperturaValidador
            INNER JOIN
                Usuarios
            ON 
                Apertura_Validador.idUsuario = Usuarios.idUsuario
            INNER JOIN
                Calendario_Pulsera_Magica
            ON
                Registro_Atracciones_Pulsera_Magica.idFechaPulseraMagica = Calendario_Pulsera_Magica.idFechaPulseraMagica
            INNER JOIN
                Promocion_Pulsera_Magica
            ON
                Calendario_Pulsera_Magica.idPulseraMagica = Promocion_Pulsera_Magica.idPulseraMagica
            INNER JOIN
                Atraccion_Evento
            ON
                Registro_Atracciones_Pulsera_Magica.idAtraccionEvento = Atraccion_Evento.idAtraccionEvento
            INNER JOIN
                Atracciones
            ON
                Atraccion_Evento.idAtraccion = Atracciones.idAtraccion
            WHERE
                Registro_Atracciones_Pulsera_Magica.idRAPM = $id;
            "
        );

        $datos = $query->getResultObject();

        return $datos;
    }

    public function gratis_Atraccion($id){
        $db = \Config\Database::connect();

        $query = $db->query(
            "SELECT
                Registro_Atraccion_Juegos_Gratis.idRAJG,
                Atracciones.Nombre AS Atraccion,
                Usuarios.Nombre,
                Usuarios.Apellidos,
                Ciclo.Hora,
                Promocion_Juegos_Gratis.Nombre AS Promocion
            FROM
                Registro_Atraccion_Juegos_Gratis
            INNER JOIN
                Ciclo
            ON
                Registro_Atraccion_Juegos_Gratis.idCiclo = Ciclo.idCiclo
            INNER JOIN
                Apertura_Validador
            ON
                Ciclo.idAperturaValidador = Apertura_Validador.idAperturaValidador
            INNER JOIN
                Usuarios
            ON
                Apertura_Validador.idUsuario = Usuarios.idUsuario
            INNER JOIN
                Calendario_Juegos_Gratis
            ON
                Registro_Atraccion_Juegos_Gratis.idFechaJuegosGratis = Calendario_Juegos_Gratis.idFechaJuegosGratis
            INNER JOIN
                Promocion_Juegos_Gratis
            ON
                Calendario_Juegos_Gratis.idJuegosGratis = Promocion_Juegos_Gratis.idJuegosGratis
            INNER JOIN
                Atraccion_Evento
            ON
                Registro_Atraccion_Juegos_Gratis.idAtraccionEvento = Atraccion_Evento.idAtraccionEvento
            INNER JOIN
                Atracciones
            ON
                Atraccion_Evento.idAtraccion = Atracciones.idAtraccion
            WHERE
                Registro_Atraccion_Juegos_Gratis.idRAJG = $id;
            "
        );

        $datos = $query->getResultObject();

        return $datos;
    }

    public function saldo_Taquilla($id){
        $db = \Config\Database::connect();

        $query = $db->query(
            "SELECT
            Saldo.idSaldo,
            Saldo.CreditoN,
            Pago.Monto,
            Transaccion.Fecha,
            Usuarios.Nombre,
            Usuarios.Apellidos,
            Ventanilla.Nombre AS Ventanilla,
            Formas_Pago.Nombre AS Tipo
        FROM
            Saldo
        INNER JOIN
            Pago
        ON
            Saldo.idPago = Pago.idPago
        INNER JOIN
            Transaccion
        ON
            Pago.idTransaccion = Transaccion.idTransaccion
        INNER JOIN
            Cobro
        ON
            Transaccion.idTransaccion = Cobro.idTransaccion
        INNER JOIN
            Formas_Pago
        ON
            Cobro.idFormasPago = Formas_Pago.idFormasPago
        INNER JOIN
            Fajillas
        ON
            Transaccion.idFajilla = Fajillas.idFajilla
        INNER JOIN
            Apertura_Ventanilla
        ON
            Fajillas.idAperturaVentanilla = Apertura_Ventanilla.idAperturaVentanilla
        INNER JOIN
            Ventanilla
        ON
            Apertura_Ventanilla.idVentanilla = Ventanilla.idVentanilla
        INNER JOIN
            Usuarios
        ON
            Apertura_Ventanilla.idUsuario = Usuarios.idUsuario
        WHERE
            Saldo.idSaldo = $id;
            "
        );

        $datos = $query->getResultObject();

        return $datos;
    }

    public function cortesia_Taquilla($id){
        $db = \Config\Database::connect();

        $query = $db->query(
            "SELECT
                Registro_Saldo_Pago_Promocion.idSPP,
                Calendario_Creditos_Cortesia.Creditos,
                Pago.Monto,
                Transaccion.Fecha,
                Usuarios.Nombre,
                Usuarios.Apellidos,
                Ventanilla.Nombre AS Ventanilla,
                Promocion_Creditos_Cortesia.Nombre AS Promocion,
                Formas_Pago.Nombre AS Tipo
            FROM
                Registro_Saldo_Pago_Promocion
            INNER JOIN
                Calendario_Creditos_Cortesia
            ON
                Registro_Saldo_Pago_Promocion.idFechaCreditosCortesia = Calendario_Creditos_Cortesia.idFechaCreditosCortesia
            INNER JOIN
                Promocion_Creditos_Cortesia
            ON
                Calendario_Creditos_Cortesia.idCC = Promocion_Creditos_Cortesia.idCC
            INNER JOIN
                Pago
            ON
                Registro_Saldo_Pago_Promocion.idPago = Pago.idPago
            INNER JOIN
                Transaccion
            ON
                Pago.idTransaccion = Transaccion.idTransaccion
            INNER JOIN
                Cobro
            ON
                Transaccion.idTransaccion = Cobro.idTransaccion
            INNER JOIN
                Formas_Pago
            ON
                Cobro.idFormasPago = Formas_Pago.idFormasPago
            INNER JOIN
                Fajillas
            ON
                Transaccion.idFajilla = Fajillas.idFajilla
            INNER JOIN
                Apertura_Ventanilla
            ON
                Fajillas.idAperturaVentanilla = Apertura_Ventanilla.idAperturaVentanilla
            INNER JOIN
                Usuarios
            ON
                Apertura_Ventanilla.idUsuario = Usuarios.idUsuario
            INNER JOIN
                Ventanilla
            ON
                Apertura_Ventanilla.idVentanilla = Ventanilla.idVentanilla
            WHERE
                Registro_Saldo_Pago_Promocion.idSPP = $id;
            "
        );

        $datos = $query->getResultObject();

        return $datos;
    }

    public function pulsera_Taquilla($id){
        $db = \Config\Database::connect();

        $query = $db->query(
            "SELECT
                Promo_Ventas.idPromoV,
                Pago.Monto,
                Transaccion.Fecha,
                Usuarios.Nombre,
                Usuarios.Apellidos,
                Ventanilla.Nombre AS Ventanilla,
                Promocion_Pulsera_Magica.Nombre AS Promocion,
                Formas_Pago.Nombre AS Tipo
            FROM
                Promo_Ventas
            INNER JOIN
                Pago
            ON
                Promo_Ventas.pago_Id = Pago.idPago
            INNER JOIN
                Transaccion
            ON
                Pago.idTransaccion = Transaccion.idTransaccion
            INNER JOIN
                Fajillas
            ON
                Transaccion.idFajilla = Fajillas.idFajilla
            INNER JOIN
                Cobro
            ON
                Transaccion.idTransaccion = Cobro.idTransaccion
            INNER JOIN
                Formas_Pago
            ON
                Cobro.idFormasPago = Formas_Pago.idFormasPago
            INNER JOIN
                Apertura_Ventanilla
            ON
                Fajillas.idAperturaVentanilla = Apertura_Ventanilla.idAperturaVentanilla
            INNER JOIN
                Ventanilla
            ON
                Apertura_Ventanilla.idVentanilla = Ventanilla.idVentanilla
            INNER JOIN
                Usuarios
            ON
                Apertura_Ventanilla.idUsuario = Usuarios.idUsuario
            INNER JOIN
                Calendario_Pulsera_Magica
            ON
                Promo_Ventas.promo_Id = Calendario_Pulsera_Magica.idFechaPulseraMagica
            INNER JOIN
                Promocion_Pulsera_Magica
            ON
                Calendario_Pulsera_Magica.idPulseraMagica = Promocion_Pulsera_Magica.idPulseraMagica
            WHERE
                Promo_Ventas.idPromoV = $id;
            "
        );

        $datos = $query->getResultObject();

        return $datos;
    }
}