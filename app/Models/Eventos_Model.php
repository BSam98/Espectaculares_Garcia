<?php

namespace App\Models;

use CodeIgniter\Model;

class Eventos_Model extends Model{

    public function listadoEventos(){
        $db = \Config\Database::connect();
        $builder = $db->table('Eventos');

        $builder-> select(
            'Nombre, 
            Direccion,
            Ciudad,
            Estado,
            FechaInicio,
            FechaFinal'
        );

        $query = $builder->get();
    
        $datos = $query->getResultObject();

        return $datos;        
    }

    public function listado_Atracciones_Por_Evento (){
        $db = \Config\Database::connect();
        $builder = $db->table('Atraccion_Evento');

        $builder-> select(
            '
            Atracciones.Nombre AS Atraccion,
            Eventos.Ciudad AS Evento,
            Contrato.Nombre AS Contrato,
            Poliza.Nombre AS Poliza,
            Atraccion_Evento.Creditos AS Creditos,
            Atraccion_Evento.creditosCortesia AS CreditosC
            '
        );

        $builder->join(
            'Atracciones',
            'Atracciones.idAtraccion = Atraccion_Evento.idAtraccion',
            'join'
        );

        $builder->join(
            'Eventos',
            'Eventos.idEvento = Atraccion_Evento.idEvento',
            'join'
        );

        $builder->join(
            'Contrato',
            'Contrato.idContrato = Atraccion_Evento.idContrato',
            'inner'
        );

        $builder->join(
            'Poliza',
            "Poliza.idPoliza = Atraccion_Evento.idPoliza"
        );
        
        $query = $builder->get();
    
        $datos = $query->getResultObject();

        return $datos;
    }

    public function listado_Precios_Por_Evento(){}

    public function listado_Usuarios_Por_Evento(){}
}