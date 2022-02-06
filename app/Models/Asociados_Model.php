<?php

namespace App\Models;

use CodeIgniter\Model;

class Asociados_Model extends Model{

    public function listadoAsociacion(){
        
        $db = \Config\Database::connect();
        $builder = $db->table('Asociacion');

        $builder-> select(
            '
            Asociacion.Nombre,
            Asociacion.Porcentaje1,
            Asociacion.Porcentaje2,
            Atracciones.Nombre AS Atraccion,
            Asociados.Nombre AS Asociado,
            Eventos.Ciudad AS Evento
            '
        );

        $builder-> join(
            'Atracciones',
            'Atracciones.idAtraccion = Asociacion.idAtraccion',
            'inner'
        );
        
        $builder->join(
            'Asociados',
            'Asociados.idAsociado = Asociacion.idAsociado',
            'inner'
        );

        $builder->join(
            'Eventos',
            'Eventos.idEvento = Asociacion.idEvento',
            'inner'
        );

        $query = $builder->get();
     
        $datos = $query->getResultObject();

        return $datos;
    }

    public function listadoAsociados(){
        $db = \Config\Database::connect();
        $builder = $db->table('Asociados');

        $builder-> select(
            '
            Nombre,
            ApellidoP,
            ApellidoM,
            Direccion,
            Telefono,
            FechaNacimiento
            '
        );

        $query = $builder->get();
     
        $datos = $query->getResultObject();

        return $datos;
    }
}