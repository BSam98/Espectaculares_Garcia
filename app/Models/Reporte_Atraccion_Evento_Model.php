<?php
namespace App\Models;

use CodeIgniter\Model;

class Reporte_Atraccion_Evento_Model extends Model{
    protected $builder;

    public function mostrar_Atracciones($idEvento, $fecha1, $fecha2){
        $db = \Config\Database::connect();

        $query = $db->query(
            "SELECT
                Atracciones.Nombre,
                COUNT(Ciclo.idCiclo) AS Cantidad_Ciclos,
                SUM(Ciclo.Personas) AS Cantidad_Personas,
                SUM(Ciclo.Creditos) AS Cantidad_Creditos,
                SUM(Ciclo.Cortesias) AS Cantidad_Cortesias,
                SUM(Ciclo.Descuentos) AS Cantidad_Descuentos,
                SUM(Ciclo.PulserasMagicas) AS Cantidad_Pulseras,
                SUM(Ciclo.Gratis) AS Cantidad_Gratis,
                SUM(Ciclo.entradaNormal) AS Entrada_Normal,
                SUM(Ciclo.entradaCortesia) AS Entrada_Cortesia,
                SUM(Ciclo.entradaMixta) AS Entrada_Mixta
            FROM
                Ciclo
            INNER JOIN
                Apertura_Validador
            ON
                Ciclo.idAperturaValidador = Apertura_Validador.idAperturaValidador
            INNER JOIN
                Atraccion_Evento
            ON
                Apertura_Validador.idAtraccionEvento = Atraccion_Evento.idAtraccionEvento
            INNER JOIN
                Atracciones
            ON
                Atraccion_Evento.idAtraccion = Atracciones.idAtraccion
            WHERE
                Atraccion_Evento.idEvento = $idEvento
            AND
                Ciclo.Hora >= '$fecha1 00:00:00.000'
            AND
                Ciclo.Hora <=  '$fecha2 23:59:00.000'
            GROUP BY
                Atracciones.Nombre;
            "
        );

        $datos = $query->getResultObject();

        return $datos;
    }

    public function datos_Evento($idEvento){

        $db = \Config\Database::connect();

        $query = $db->query(
            "SELECT
                Precio,
                Creditos
            FROM
                Eventos
            WHERE
                idEvento = $idEvento;
            "
        );

        $datos = $query->getResultObject();

        return $datos;
    }
}