<?php
namespace App\Models;

use CodeIgniter\Model;

class Supervisar_Taquillas_Model extends Model{
    protected $builder;

    public function ventanillas_Activas($idEvento){
        $db = \Config\Database::connect();

        $query = $db->query(
            "SELECT
                Apertura_Ventanilla.Status,
                Apertura_Ventanilla.idAperturaVentanilla,
                Ventanilla.Nombre AS Ventanillas,
                Usuarios.Nombre,
                Usuarios.Apellidos,
                Apertura_Ventanilla.horaApertura,
                SUM(CASE WHEN Cobro.idFormasPago = 1 THEN Cobro.Monto ELSE 0 END) AS Efectivo,
                SUM(CASE WHEN Cobro.idFormasPago = 2 THEN Cobro.Monto ELSE 0 END) AS Tarjeta
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
                Apertura_Ventanilla.Status,
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

    public function ventanillas_Inactivas($idEvento,$fecha){
        $db = \Config\Database::connect();

        $query = $db->query(
            "SELECT
                Cierre_Ventanilla.idUsuario,
                Apertura_Ventanilla.idAperturaVentanilla,
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
}