<?php

namespace App\Models;

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
}