<?php

namespace App\Models;

use CodeIgniter\Model;

class Taquillas_Model extends Model{

    protected $builder;

    protected $table;
    protected $primaryKey;
    protected $returnType;

    public function listadoEventos(){
        $db = \Config\Database::connect();
        $builder = $db->table('Eventos');
        $builder-> select(
            '
            idEvento,
            Nombre,
            Ciudad,
            Estado
            '
        );
        $builder->orderBy('idEvento', 'DESC');
        $query = $builder->get();
        $datos = $query->getResultObject();
        return $datos;        
    }

    function leventos($evento){

        $db = \Config\Database::connect();
        $builder = $db->table('Eventos');
        $builder-> select(
            '
            idEvento,
            Nombre,
            Ciudad,
            Estado
            '
        );
        $builder->where('idEvento', $evento);
        $query = $builder->get();
        $datos = $query->getResultObject();
        return $datos;   
        
        
        //$query = $this->db->get_where('mencion_perito', array('mencion_perito' => $especialidad_perito));
        //return $query;
    }

    public function taquillas_Inactivas($idEvento, $fecha){
        $db = \Config\Database::connect();

        $query = $db->query(
            "SELECT
                COUNT(Cierre_Ventanilla.idUsuario) AS Ventanillas_Confirmadas,
                Taquilla.idTaquilla,
                Taquilla.Nombre,
                SUM(Cierre_Ventanilla.Efectivo) AS Efectivo,
                SUM(Cierre_Ventanilla.Boucher) AS Tarjeta,
                COUNT(Apertura_Ventanilla.idAperturaVentanilla) AS Ventanillas_Utilizadas
            FROM
                Taquilla
            INNER JOIN
                Zona
            ON
                Taquilla.idZona = Zona.idZona
            INNER JOIN
                Ventanilla
            ON
                Taquilla.idTaquilla = Ventanilla.idTaquilla
            INNER JOIN
                Apertura_Ventanilla
            ON
                Ventanilla.idVentanilla = Apertura_ventanilla.idVentanilla
            INNER JOIN
                Cierre_Ventanilla
            ON
                Apertura_Ventanilla.idAperturaVentanilla = Cierre_Ventanilla.idAperturaVentanilla
            WHERE
                Zona.idEvento = $idEvento
            AND
                Apertura_Ventanilla.horaApertura >= '$fecha 00:00:00.000'
            AND
                Apertura_Ventanilla.horaApertura <= '$fecha 23:59:00.000'
            
            GROUP BY
                Taquilla.idTaquilla,Taquilla.Nombre;
            "
        );

        $datos = $query->getResultObject();

        return $datos;
    }

    //Cuando el taquillero vendio tarjetas
    public function ventanillas_Inactivas($idTaquilla,$idEvento,$fecha){
        $db  = \Config\Database::connect();

        $query = $db->query(
            "SELECT
                Cierre_Ventanilla.idUsuario,
                Apertura_Ventanilla.idAperturaVentanilla,
                Ventanilla.Nombre AS Ventanilla,
                Usuarios.Nombre,
                Usuarios.Apellidos,
                Cierre_Ventanilla.Efectivo,
                Cierre_Ventanilla.Boucher,
                COUNT(Tarjetas.idTarjeta) AS Cantidad,
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
                Fajillas
            ON
                Apertura_Ventanilla.idAperturaVentanilla = Fajillas.idAperturaVentanilla
            INNER JOIN
                Tarjetas
            ON
                Fajillas.idFajilla = Tarjetas.idFajilla
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
                Taquilla.idTaquilla = $idTaquilla
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

    //cuando el taquillero no vendio tarjetas
    public function ventanillas_Inactivas_2($idTaquilla,$idEvento,$fecha){
        $db  =\Config\Database::connect();

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
                Taquilla.idTaquilla = $idTaquilla
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