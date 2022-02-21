<?php

namespace App\Models;

use CodeIgniter\Model;

class Eventos_Model extends Model{

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
            Direccion,
            Ciudad,
            Estado,
            FechaInicio,
            FechaFinal,
            '
        );

        $builder->orderBy('idEvento', 'DESC');

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

    public function agregarEvento($datos){
        $db= \Config\Database::Connect();
        $builder = $db->table('Eventos');

        $builder -> insert($datos);

        return 'Funciono';
    
    }

    public function mostrarAtracciones($datos){
        $db = \Config\Database::connect();
        $builder = $db->table('Atracciones');

        $builder->select(
            '
            Atracciones.Nombre AS Atraccion, 
            Atraccion_Evento.Creditos, 
            Contrato.Nombre AS Contrato, 
            Poliza.Nombre AS Poliza
            '
        );

        $builder->join(
            'Atraccion_Evento',
            'Atraccion_Evento.idAtraccion = Atracciones.idAtraccion',
            'inner'
        );
        $builder->join(
            'Contrato',
            'Contrato.idContrato = Atraccion_Evento.idContrato',
            'inner'
        );
        $builder->join(
            'Poliza',
            'Poliza.idPoliza = Atraccion_Evento.idPoliza',
            'inner'
        );

        $builder->where('Atraccion_Evento.idEvento',$datos['idEvento']);

        $query = $builder->get();
    
        $datos = $query->getResultObject();

        return $datos;
    }

    public function mostrarTarjetas($datos){
        $db = \Config\Database::connect();
        $builder = $db->table('Tarjetas');

        $builder->select(
            '
            Nombre,
            Folio,
            FechaActivacion,
            Status,
            Tipo
            '
        );

        $builder->where('idEvento',$datos['idEvento']);

        $query = $builder->get();
    
        $datos = $query->getResultObject();

        return $datos;
    }

    public function mostrarAsociacion($datos){
        $db = \Config\Database::connect();
        $builder = $db->table('Asociacion');

        $builder->select(
            '
            Asociacion.Nombre,
            Asociacion.Porcentaje1, 
            Asociacion.Porcentaje2,
            Propietario.Nombre AS Propietario,
            Atracciones.Nombre AS Atraccion,
            Asociados.Nombre AS Asociado
            '
        );

        $builder->join(
            'Atracciones',
            'Atracciones.idAtraccion = Asociacion.idAtraccion',
            'inner'
        );
        $builder->join(
            'Propietario',
            'Propietario.idPropietario = Atracciones.idPropietario',
            'inner'
        );
        $builder->join(
            'Asociados',
            'Asociados.idAsociado = Asociacion.idAsociado',
            'inner'
        );

        $builder->where('Asociacion.idEvento',$datos['idEvento']);

        $query = $builder->get();
    
        $datos = $query->getResultObject();

        return $datos;
    }

    public function listado_Precios_Por_Evento(){}

    public function listado_Usuarios_Por_Evento(){}
}