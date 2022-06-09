<?php

namespace App\Models;

use CodeIgniter\Model;

class Reporte_Personas_Evento_Model extends Model{

    protected $builder;

    public function _construct(){
        parent:: _construct();
    }

    public function listado_Eventos($datos){
        $db = \Config\Database::connect();

        $query = $db->query(
            "SELECT
                Eventos.Nombre,
                SUM(Ciclo.Personas) AS Personas,
                SUM(Ciclo.Descuentos) AS Descuentos,
                SUM(Ciclo.PulserasMagicas) AS Pulsera,
                SUM(Ciclo.Gratis) AS Gratis
            FROM 
                Eventos
            INNER JOIN
                Atraccion_Evento
            ON
                Eventos.idEvento = Atraccion_Evento.idEvento
            INNER JOIN
                Apertura_Validador
            ON
                Atraccion_Evento.idAtraccionEvento = Apertura_Validador.idAtraccionEvento
            INNER JOIN
                Ciclo
            ON
                Apertura_Validador.idAperturaValidador = Ciclo.idAperturaValidador
            WHERE
                Ciclo.Hora >= '$datos 00:00:00.000'
            AND
                Ciclo.Hora <= '$datos 23:59:00.000'
            GROUP BY
                Eventos.Nombre;
        
            "
        );

        $datos = $query->getResultObject();

        return $datos;
    }
}