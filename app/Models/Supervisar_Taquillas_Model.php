<?php
namespace App\Models;

use CodeIgniter\Model;

class Supervisar_Taquillas_Model extends Model{
    protected $builder;

    //Ventanillas Activas cuando tienen alguna transaccion
    public function ventanillas_Activas($idEvento){
        $db = \Config\Database::connect();

        $query = $db->query(
            "SELECT
                Apertura_Ventanilla.idStatus,
                Apertura_Ventanilla.idAperturaVentanilla,
                Ventanilla.Nombre AS Ventanillas,
                Usuarios.Nombre,
                Usuarios.Apellidos,
                Apertura_Ventanilla.horaApertura,
                SUM(CASE WHEN Cobro.idFormasPago = 1 THEN Cobro.Monto ELSE 0 END) AS Efectivo,
                SUM(CASE WHEN Cobro.idFormasPago = 2 OR Cobro.idFormasPago = 3 THEN Cobro.Monto ELSE 0 END) AS Tarjeta
            FROM
                Ventanilla
            INNER JOIN
                Taquilla
            ON
                Ventanilla.idTaquilla = Taquilla.idTaquilla
            INNER JOIN
                Zona
            ON
                Taquilla.idZona = Zona.idZona
            INNER JOIN
                Apertura_Ventanilla
            ON
                Ventanilla.idVentanilla = Apertura_Ventanilla.idVentanilla
            INNER JOIN
                Usuarios
            ON
                Apertura_Ventanilla.idUsuario = Usuarios.idUsuario
            INNER JOIN
                Fajillas
            ON
                Apertura_Ventanilla.idAperturaVentanilla = Fajillas.idAperturaVentanilla
            INNER JOIN
                Transaccion
            ON
                Fajillas.idFajilla = Transaccion.idFajilla
            INNER JOIN
                Cobro
            ON
                Transaccion.idTransaccion = Cobro.idTransaccion
            LEFT JOIN
                Cierre_Ventanilla
            ON
                Apertura_Ventanilla.idAperturaVentanilla = Cierre_Ventanilla.idAperturaVentanilla
            WHERE
                Cierre_Ventanilla.idAperturaVentanilla IS NULL
            AND
                Zona.idEvento = $idEvento
            GROUP BY
                Apertura_Ventanilla.idStatus,
                Apertura_Ventanilla.idAperturaVentanilla,
                Ventanilla.Nombre,
                Usuarios.Nombre,
                Usuarios.Apellidos,
                Apertura_Ventanilla.horaApertura;
            "
        );

        $datos = $query->getResultObject();

        return $datos;
    }



    //Ventanillas Activas cuando no tienen ninguna transaccion
    public function ventanillas_Activas_2($idEvento){
        $db = \Config\Database::connect();

        /**
         * Se utilizo esta query tan larga porque si un turno de taquillero tenia una fajilla vacia sin venta y despues agregaba una fajilla con tarjetas y vendia
         * con ella, esto haria que el turno se repitiera y se mostrara en taquillas activas con transacciones y en taquillas activas sin transacciones dado
         * que la primera fajilla vacia se encuentra sin transaccion. 
         * La query compara los turnos que tengan alguna fajilla sin transaccion y despues filtra los turnos que tengan alguna fajilla con transaccion pero que tambien
         * tengan alguna fajilla vacia
         */
        $query = $db->query(
            "SELECT
                Apertura_Ventanilla.idStatus,
                Apertura_Ventanilla.idAperturaVentanilla,
                Ventanilla.Nombre AS Ventanillas,
                Usuarios.Nombre,
                Usuarios.Apellidos,
                Apertura_Ventanilla.horaApertura
            FROM
                Ventanilla
            INNER JOIN
                Taquilla
            ON
                Ventanilla.idTaquilla = Taquilla.idTaquilla
            INNER JOIN
                Zona
            ON
                Taquilla.idZona = Zona.idZona
            INNER JOIN
                Apertura_Ventanilla
            ON
                Ventanilla.idVentanilla = Apertura_Ventanilla.idVentanilla
            INNER JOIN
                Usuarios
            ON
                Apertura_Ventanilla.idUsuario = Usuarios.idUsuario
            INNER JOIN
                Fajillas
            ON
                Apertura_Ventanilla.idAperturaVentanilla = Fajillas.idAperturaVentanilla
            LEFT JOIN
                Transaccion
            ON
                Fajillas.idFajilla = Transaccion.idFajilla
            LEFT JOIN
                Cierre_Ventanilla
            ON
                Apertura_Ventanilla.idAperturaVentanilla = Cierre_Ventanilla.idAperturaVentanilla
            WHERE
                Cierre_Ventanilla.idAperturaVentanilla IS NULL
            AND
                Transaccion.idFajilla IS NULL
            AND
                Zona.idEvento = $idEvento
            EXCEPT
            SELECT
                Apertura_Ventanilla.idStatus,
                Apertura_Ventanilla.idAperturaVentanilla,
                Ventanilla.Nombre AS Ventanillas,
                Usuarios.Nombre,
                Usuarios.Apellidos,
                Apertura_Ventanilla.horaApertura
            FROM
                Ventanilla
            INNER JOIN
                Taquilla
            ON
                Ventanilla.idTaquilla = Taquilla.idTaquilla
            INNER JOIN
                Zona
            ON
                Taquilla.idZona = Zona.idZona
            INNER JOIN
                Apertura_Ventanilla
            ON
                Ventanilla.idVentanilla = Apertura_Ventanilla.idVentanilla
            INNER JOIN
                Usuarios
            ON
                Apertura_Ventanilla.idUsuario = Usuarios.idUsuario
            INNER JOIN
                Fajillas
            ON
                Apertura_Ventanilla.idAperturaVentanilla = Fajillas.idAperturaVentanilla
            INNER JOIN
                Transaccion
            ON
                Fajillas.idFajilla = Transaccion.idFajilla
            INNER JOIN
                Cobro
            ON
                Transaccion.idTransaccion = Cobro.idTransaccion
            LEFT JOIN
                Cierre_Ventanilla
            ON
                Apertura_Ventanilla.idAperturaVentanilla = Cierre_Ventanilla.idAperturaVentanilla
            WHERE
                Cierre_Ventanilla.idAperturaVentanilla IS NULL
            AND
                Zona.idEvento = $idEvento;
        
            "
        );

        $datos = $query->getResultObject();
        
        return $datos;
    }

    public function ventanillas_Inactivas($idEvento,$fecha){
        $db = \Config\Database::connect();

        $query = $db->query(
            "SELECT
                Cierre_Ventanilla.idUsuario,
                Apertura_Ventanilla.idAperturaVentanilla,
                Apertura_Ventanilla.idStatus,
                Ventanilla.Nombre AS Ventanilla,
                Usuarios.Nombre,
                Usuarios.Apellidos,
                Cierre_Ventanilla.Efectivo,
                Cierre_Ventanilla.Boucher,
                Apertura_Ventanilla.horaApertura,
                Cierre_Ventanilla.horaCierre
            FROM
                Ventanilla
            INNER JOIN
                Apertura_Ventanilla
            ON
                Ventanilla.idVentanilla = Apertura_Ventanilla.idVentanilla
            INNER JOIN
                Cierre_Ventanilla
            ON
                Apertura_Ventanilla.idAperturaVentanilla = Cierre_Ventanilla.idAperturaVentanilla
            INNER JOIN
                Usuarios
            ON
                Apertura_Ventanilla.idUsuario = Usuarios.idUsuario
            INNER JOIN
                Taquilla
            ON
                Ventanilla.idTaquilla = Taquilla.idTaquilla
            INNER JOIN
                Zona
            ON
                Taquilla.idZona = Zona.idZona
            WHERE
                Zona.idEvento = $idEvento
            AND
                Apertura_Ventanilla.horaApertura >= '$fecha 00:00:00.000'
            AND
                Apertura_Ventanilla.horaApertura <= '$fecha 23:59:00.000'
            GROUP BY 	Cierre_Ventanilla.idUsuario,
                Apertura_Ventanilla.idAperturaVentanilla,
                Apertura_Ventanilla.idStatus,
                Ventanilla.Nombre,
                Usuarios.Nombre,
                Usuarios.Apellidos,
                Cierre_Ventanilla.Efectivo,
                Cierre_Ventanilla.Boucher,
                Apertura_Ventanilla.horaApertura,
                Cierre_Ventanilla.horaCierre
                ;
        
            "
        );

        $datos = $query->getResultObject();

        return $datos;
    }

    //Ventanillas Inactivas que no tuvieron ninguna transaccion
    public function ventanillas_Inactivas_2($idEvento,$fecha){
        $db = \Config\Database::connect();
/*
        $query = $db->query(
            "SELECT
                Cierre_Ventanilla.idUsuario,
                Apertura_Ventanilla.idAperturaVentanilla,
                Apertura_Ventanilla.idStatus,
                Ventanilla.Nombre AS Ventanilla,
                Usuarios.Nombre,
                Usuarios.Apellidos,
                Cierre_Ventanilla.Efectivo,
                Cierre_Ventanilla.Boucher,
                Apertura_Ventanilla.horaApertura,
                Cierre_Ventanilla.horaCierre
            FROM
                Ventanilla
            INNER JOIN
                Apertura_Ventanilla
            ON
                Ventanilla.idVentanilla = Apertura_Ventanilla.idVentanilla
            INNER JOIN
                Cierre_Ventanilla
            ON
                Apertura_Ventanilla.idAperturaVentanilla = Cierre_Ventanilla.idAperturaVentanilla
            INNER JOIN
                Usuarios
            ON
                Apertura_Ventanilla.idUsuario = Usuarios.idUsuario
            INNER JOIN
                Fajillas
            ON
                Apertura_Ventanilla.idAperturaVentanilla = Fajillas.idAperturaVentanilla
            LEFT JOIN
                Transaccion
            ON
                Fajillas.idFajilla = Transaccion.idFajilla
            INNER JOIN
                Taquilla
            ON
                Ventanilla.idTaquilla = Taquilla.idTaquilla
            INNER JOIN
                Zona
            ON
                Taquilla.idZona = Zona.idZona
            WHERE
                Zona.idEvento = $idEvento
            AND
                Transaccion.idFajilla IS NULL
            AND
                Apertura_Ventanilla.horaApertura >= '$fecha 00:00:00.000'
            AND
                Apertura_Ventanilla.horaApertura <= '$fecha 23:59:00.000'
            GROUP BY 	Cierre_Ventanilla.idUsuario,
                Apertura_Ventanilla.idAperturaVentanilla,
                Apertura_Ventanilla.idStatus,
                Ventanilla.Nombre,
                Usuarios.Nombre,
                Usuarios.Apellidos,
                Cierre_Ventanilla.Efectivo,
                Cierre_Ventanilla.Boucher,
                Apertura_Ventanilla.horaApertura,
                Cierre_Ventanilla.horaCierre
                ;
            "
        );
*/
        $query = $db->query(
            "SELECT
                Cierre_Ventanilla.idUsuario,
                Apertura_Ventanilla.idAperturaVentanilla,
                Apertura_Ventanilla.idStatus,
                Ventanilla.Nombre AS Ventanilla,
                Usuarios.Nombre,
                Usuarios.Apellidos,
                Cierre_Ventanilla.Efectivo,
                Cierre_Ventanilla.Boucher,
                Apertura_Ventanilla.horaApertura,
                Cierre_Ventanilla.horaCierre
            FROM
                Ventanilla
            INNER JOIN
                Apertura_Ventanilla
            ON
                Ventanilla.idVentanilla = Apertura_Ventanilla.idVentanilla
            INNER JOIN
                Cierre_Ventanilla
            ON
                Apertura_Ventanilla.idAperturaVentanilla = Cierre_Ventanilla.idAperturaVentanilla
            INNER JOIN
                Usuarios
            ON
                Apertura_Ventanilla.idUsuario = Usuarios.idUsuario
            INNER JOIN
                Fajillas
            ON
                Apertura_Ventanilla.idAperturaVentanilla = Fajillas.idAperturaVentanilla
            LEFT JOIN
                Transaccion
            ON
                Fajillas.idFajilla = Transaccion.idFajilla
            INNER JOIN
                Taquilla
            ON
                Ventanilla.idTaquilla = Taquilla.idTaquilla
            INNER JOIN
                Zona
            ON
                Taquilla.idZona = Zona.idZona
            WHERE
                Zona.idEvento = $idEvento
            AND
                Transaccion.idFajilla IS NULL
            AND
                Apertura_Ventanilla.horaApertura >= '$fecha 00:00:00.000'
            AND
                Apertura_Ventanilla.horaApertura <= '$fecha 23:59:00.000'
            GROUP BY 	Cierre_Ventanilla.idUsuario,
                Apertura_Ventanilla.idAperturaVentanilla,
                Apertura_Ventanilla.idStatus,
                Ventanilla.Nombre,
                Usuarios.Nombre,
                Usuarios.Apellidos,
                Cierre_Ventanilla.Efectivo,
                Cierre_Ventanilla.Boucher,
                Apertura_Ventanilla.horaApertura,
                Cierre_Ventanilla.horaCierre
            EXCEPT
            SELECT
                Cierre_Ventanilla.idUsuario,
                Apertura_Ventanilla.idAperturaVentanilla,
                Apertura_Ventanilla.idStatus,
                Ventanilla.Nombre AS Ventanilla,
                Usuarios.Nombre,
                Usuarios.Apellidos,
                Cierre_Ventanilla.Efectivo,
                Cierre_Ventanilla.Boucher,
                Apertura_Ventanilla.horaApertura,
                Cierre_Ventanilla.horaCierre
            FROM
                Ventanilla
            INNER JOIN
                Apertura_Ventanilla
            ON
                Ventanilla.idVentanilla = Apertura_Ventanilla.idVentanilla
            INNER JOIN
                Cierre_Ventanilla
            ON
                Apertura_Ventanilla.idAperturaVentanilla = Cierre_Ventanilla.idAperturaVentanilla
            INNER JOIN
                Usuarios
            ON
                Apertura_Ventanilla.idUsuario = Usuarios.idUsuario
            INNER JOIN
                Taquilla
            ON
                Ventanilla.idTaquilla = Taquilla.idTaquilla
            INNER JOIN
                Zona
            ON
                Taquilla.idZona = Zona.idZona
            WHERE
                Zona.idEvento = $idEvento
            AND
                Apertura_Ventanilla.horaApertura >= '$fecha 00:00:00.000'
            AND
                Apertura_Ventanilla.horaApertura <= '$fecha 23:59:00.000'
            GROUP BY 	Cierre_Ventanilla.idUsuario,
                Apertura_Ventanilla.idAperturaVentanilla,
                Apertura_Ventanilla.idStatus,
                Ventanilla.Nombre,
                Usuarios.Nombre,
                Usuarios.Apellidos,
                Cierre_Ventanilla.Efectivo,
                Cierre_Ventanilla.Boucher,
                Apertura_Ventanilla.horaApertura,
                Cierre_Ventanilla.horaCierre;           
            "
        );

        $datos = $query->getResultObject();

        return $datos;
    }

    public function total_Voucher($idAperturaVentanilla){
        $db = \Config\Database::connect();

        $query = $db->query(
            "SELECT
                SUM(CASE WHEN Cobro.idFormasPago = 2 OR Cobro.idFormasPago =3 THEN Cobro.Monto ELSE 0 END) AS Tarjeta
            FROM
                Apertura_Ventanilla
            INNER JOIN
                Fajillas
            ON
                Apertura_Ventanilla.idAperturaVentanilla = Fajillas.idAperturaVentanilla
            INNER JOIN
                Transaccion
            ON
                Fajillas.idFajilla = Transaccion.idFajilla
            INNER JOIN
                Cobro
            ON
                Transaccion.idTransaccion = Cobro.idTransaccion
            INNER JOIN
                Formas_Pago
            ON
                Cobro.idFormasPago = Formas_Pago.idFormasPago
            INNER JOIN
                transaccion_Voucher
            ON
                Cobro.idCobro = transaccion_Voucher.idCobro
            INNER JOIN
                Bancos
            ON
                transaccion_Voucher.idBanco = Bancos.idBanco
            WHERE
                Apertura_Ventanilla.idAperturaVentanilla = $idAperturaVentanilla;
            "
        );

        $datos = $query->getResultObject();
        
        return $datos;
    }

    public function transacciones_Taquillero($idAperturaVentanilla){
        $db = \Config\Database::connect();

        $query = $db->query(
            "SELECT
                SUM(CASE WHEN Cobro.idFormasPago = 1 THEN Cobro.Monto ELSE 0 END) AS Efectivo,
                SUM(CASE WHEN Cobro.idFormasPago = 2  OR Cobro.idFormasPago = 3 THEN Cobro.Monto ELSE 0 END) AS Tarjeta,
                Transaccion.Fecha,
                Transaccion.idTransaccion
            FROM 
                Apertura_Ventanilla
            INNER JOIN
                Fajillas
            ON
                Apertura_Ventanilla.idAperturaVentanilla = Fajillas.idAperturaVentanilla
            INNER JOIN
                Transaccion
            ON
                Fajillas.idFajilla = Transaccion.idFajilla
            INNER JOIN
                Cobro
            ON
                Transaccion.idTransaccion = Cobro.idTransaccion
            WHERE
                Apertura_Ventanilla.idAperturaVentanilla = $idAperturaVentanilla
            GROUP BY
                Transaccion.Fecha,
                Transaccion.idTransaccion;"
        );

        $datos = $query->getResultObject();

        return $datos;
    }

    public function descripcion_Transaccion($idTransaccion){
        $db = \Config\Database::connect();

        $query = $db->query(
            "SELECT
                Pago.idPago,
                Pago.Monto,
                Tarjetas.Folio,
                TipoVenta.Nombre
            FROM
                Transaccion
            INNER JOIN
                Pago
            ON
                Transaccion.idTransaccion = Pago.idTransaccion
            INNER JOIN
                TipoVenta
            ON
                Pago.idTipoVenta = TipoVenta.idTipoVenta
            INNER JOIN 
                Tarjetas
            ON
                Pago.idTarjeta = Tarjetas.idTarjeta
            WHERE
                Transaccion.idTransaccion = $idTransaccion;
            "
        );

        $datos = $query->getResultObject();

        return $datos;
    }

    //Query que muestra todos los vouchers realizados en el turno del taquillero
    public function vouchers_Turno($idAperturaVentanilla){
        $db = \Config\Database::connect();

        $query = $db->query(
            "SELECT
                transaccion_Voucher.numTarjeta,
                transaccion_Voucher.numAprovacion,
                transaccion_Voucher.Monto,
                Bancos.Banco,
                Formas_Pago.Nombre,
                Transaccion.idTransaccion
            FROM
                Apertura_Ventanilla
            INNER JOIN
                Fajillas
            ON
                Apertura_Ventanilla.idAperturaVentanilla = Fajillas.idAperturaVentanilla
            INNER JOIN
                Transaccion
            ON
                Fajillas.idFajilla = Transaccion.idFajilla
            INNER JOIN
                Cobro
            ON
                Transaccion.idTransaccion = Cobro.idTransaccion
            INNER JOIN
                Formas_Pago
            ON
                Cobro.idFormasPago = Formas_Pago.idFormasPago
            INNER JOIN
                transaccion_Voucher
            ON
                Cobro.idCobro = transaccion_Voucher.idCobro
            INNER JOIN
                Bancos
            ON
                transaccion_Voucher.idBanco = Bancos.idBanco
            WHERE
                Formas_Pago.idFormasPago = 2 OR Formas_Pago.idFormasPago = 3
            AND
                Apertura_Ventanilla.idAperturaVentanilla = $idAperturaVentanilla;
            "
        );

        $datos  = $query->getResultObject();

        return $datos;
    }

    public function fajillas_Turno($idAperturaVentanilla){
        $db = \Config\Database::connect();

        //Fajillas vacias
        $query = $db->query(
            "SELECT
                Fajillas.idFajilla,
                Fajillas.fecha
            FROM
                Apertura_Ventanilla
            INNER JOIN
                Fajillas
            ON
                Apertura_Ventanilla.idAperturaVentanilla = Fajillas.idAperturaVentanilla
            WHERE
                Apertura_Ventanilla.idAperturaVentanilla = $idAperturaVentanilla
            AND
                Fajillas.folioInicial IS NULL
            AND
                Fajillas.folioFinal IS NULL;
        
            "
        );

        $fajilla_Vacia = $query->getResultObject();

        $query = $db->query(
            "SELECT 
                Fajillas.idFajilla,
                Fajillas.folioInicial,
                Fajillas.folioFinal,
                Fajillas.fecha,
                SUM(CASE WHEN Tarjetas.idStatus = 5 THEN 1 ELSE 0 END) AS Defectuosas,
                SUM(CASE WHEN Tarjetas.idStatus = 1 THEN 1 ELSE 0 END) AS Sobrantes,
                SUM(CASE WHEN Tarjetas.idStatus = 0 THEN 1 ELSE 0 END) AS Vendidas
            FROM
                Apertura_Ventanilla
            INNER JOIN
                Fajillas
            ON
                Apertura_Ventanilla.idAperturaVentanilla = Fajillas.idAperturaVentanilla
            INNER JOIN
                Tarjetas
            ON
                Fajillas.idFajilla = Tarjetas.idFajilla
            WHERE
                Apertura_Ventanilla.idAperturaVentanilla = $idAperturaVentanilla
            AND
                Fajillas.folioInicial IS NOT NULL
            AND
                Fajillas.folioFinal IS NOT NULL
            GROUP BY
                Fajillas.idFajilla,
                Fajillas.folioInicial,
                Fajillas.folioFinal,
                Fajillas.fecha;
            "
        );

        $fajilla = $query->getResultObject();

        $datos = [
            'vacias' => $fajilla_Vacia,
            'enteras' => $fajilla
        ];

        return $datos;
    }

    //Vouchers dentro de una transaccion
    public function descripcion_Transaccion_Voucher($idTransaccion){
        $db = \Config\Database::connect();

        $query = $db->query(
            "SELECT
                transaccion_Voucher.numTarjeta,
                transaccion_Voucher.numAprovacion,
                transaccion_Voucher.Monto,
                Bancos.Banco,
                Formas_Pago.Nombre,
                Transaccion.idTransaccion
            FROM
                Transaccion
            INNER JOIN
                Cobro
            ON
                Transaccion.idTransaccion = Cobro.idTransaccion
            INNER JOIN
                Formas_Pago
            ON
                Cobro.idFormasPago = Formas_Pago.idFormasPago
            INNER JOIN
                transaccion_Voucher
            ON
                Cobro.idCobro = transaccion_Voucher.idCobro
            INNER JOIN
                Bancos
            ON
                transaccion_Voucher.idBanco = Bancos.idBanco
            WHERE
                Transaccion.idTransaccion = $idTransaccion;
            "
        );

        $datos = $query->getResultObject();

        return $datos;
    }

    public function desglose_Fajilla($idFajilla){
        $db = \Config\Database::connect();

        $query = $db->query(
            "SELECT
                Tarjetas.idTarjeta,
                Tarjetas.Folio,
                Status.Descripcion
            FROM
                Fajillas
            INNER JOIN
                Tarjetas
            ON
                Fajillas.idFajilla = Tarjetas.idFajilla
            INNER JOIN
                Status
            ON
                Tarjetas.idStatus = Status.idStatus
            WHERE
                Fajillas.idFajilla = $idFajilla;
            "
        );

        $datos = $query->getResultObject();

        return $datos;
    }

    public function validacion_Taquilla($idAperturaVentanilla){
        $db = \Config\Database::connect();


        $query = $db->query(
            "SELECT
                Cierre_Ventanilla.idCierreVentanilla,
                Cierre_Ventanilla.Efectivo,
                Apertura_Ventanilla.fondoCaja
            FROM
                Apertura_Ventanilla
            INNER JOIN
                Cierre_Ventanilla
            ON
                Apertura_Ventanilla.idAperturaVentanilla = Cierre_Ventanilla.idAperturaVentanilla
            WHERE
                Apertura_Ventanilla.idAperturaVentanilla = $idAperturaVentanilla;
            "
        );

        $efectivo = $query->getResultObject();

        $query = $db->query(
            "SELECT
                transaccion_Voucher.idTransaccionV,
                transaccion_Voucher.numTarjeta,
                transaccion_Voucher.numAprovacion,
                transaccion_Voucher.Monto,
                Bancos.Banco,
                Formas_Pago.Nombre,
                Transaccion.idTransaccion
            FROM
                Apertura_Ventanilla
            INNER JOIN
                Fajillas
            ON
                Apertura_Ventanilla.idAperturaVentanilla = Fajillas.idAperturaVentanilla
            INNER JOIN
                Transaccion
            ON
                Fajillas.idFajilla = Transaccion.idFajilla
            INNER JOIN
                Cobro
            ON
                Transaccion.idTransaccion = Cobro.idTransaccion
            INNER JOIN
                Formas_Pago
            ON
                Cobro.idFormasPago = Formas_Pago.idFormasPago
            INNER JOIN
                transaccion_Voucher
            ON
                Cobro.idCobro = transaccion_Voucher.idCobro
            INNER JOIN
                Bancos
            ON
                transaccion_Voucher.idBanco = Bancos.idBanco
            WHERE
                Formas_Pago.idFormasPago = 2 OR Formas_Pago.idFormasPago = 3
            AND
                Apertura_Ventanilla.idAperturaVentanilla = $idAperturaVentanilla;        
            "
        );

        $vouchers = $query->getResultObject();

        $query = $db->query(
            "SELECT
                Fajillas.idFajilla,
                Tarjetas_Restantes.cantidadTarjetas,
                (SELECT Tarjetas.Folio FROM Apertura_Ventanilla INNER JOIN Fajillas ON Apertura_Ventanilla.idAperturaVentanilla = Fajillas.idAperturaVentanilla INNER JOIN  Tarjetas ON Fajillas.folioInicial = Tarjetas.idTarjeta WHERE Fajillas.idStatus = 6 AND Apertura_Ventanilla.idAperturaVentanilla = $idAperturaVentanilla) AS FolioInicial,
                (SELECT Tarjetas.Folio FROM Apertura_Ventanilla INNER JOIN Fajillas ON Apertura_Ventanilla.idAperturaVentanilla = Fajillas.idAperturaVentanilla INNER JOIN  Tarjetas ON Fajillas.folioFinal = Tarjetas.idTarjeta WHERE Fajillas.idStatus = 6 AND Apertura_Ventanilla.idAperturaVentanilla = $idAperturaVentanilla) AS FolioFinal,
                Fajillas.fecha
            FROM
                Apertura_Ventanilla
            INNER JOIN
                Fajillas
            ON
                Apertura_Ventanilla.idAperturaVentanilla = Fajillas.idAperturaVentanilla
            INNER JOIN
                Tarjetas_Restantes
            ON
                Fajillas.idFajilla = Tarjetas_Restantes.idFajilla
            WHERE
                Fajillas.idStatus = 6
            AND
                Apertura_Ventanilla.idAperturaVentanilla = $idAperturaVentanilla;
            "
        );

        $fajilla = $query->getResultObject();


        $datos = [
            'vouchers' => $vouchers,
            'efectivo' => $efectivo,
            'fajilla' => $fajilla
        ];

        return $datos;
    }
}