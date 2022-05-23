<?php

namespace App\Models;

use CodeIgniter\Model;

class Super_Atracciones_Model extends Model{

    public function _construct(){
        parent :: _construct();
    }

    public function listado_Eventos(){
        $db = \Config\Database::connect();
        $builder = $db->table('Eventos');

        $builder->select(
            '
            idEvento,
            Nombre
            '
        );

        $query = $builder->get();

        $datos = $query->getResultObject();

        return $datos;
    }

    public function ciclos($idEvento,$fechaInicial,$fechaFinal){
        $db = \Config\Database::connect();

        /*
        $query = $db->query(
            "SELECT
                Apertura_Validador.idAperturaValidador,
                Atracciones.Nombre,
                Usuarios.Nombre,
                Usuarios.Apellidos
            FROM
                Apertura_Validador
            INNER JOIN
                Atraccion_Evento
            ON
                Apertura_Validador.idAtraccionEvento = Atraccion_Evento.idAtraccionEvento
            INNER JOIN 
                Atracciones
            ON
                Atraccion_Evento.idEvento = Atracciones.idAtraccion
            INNER JOIN
                Usuarios
            ON
                Apertura_Validador.idUsuario = Usuarios.idUsuario
            WHERE
                Atracciones.idAtraccion = $idEvento
            AND
                horaApertura >= '$fechaInicial'
            AND
                horaApertura <= '$fechaFinal';
            "
        );

        $datos = $query->getResultObject();

        return $query;
        */
        

        
        $builder = $db->table('Apertura_Validador');

        $builder->select(
            '
            Apertura_Validador.idAperturaValidador,
            Atracciones.Nombre AS Atracciones,
            Usuarios.Nombre,
            Usuarios.Apellidos
            '
        );

        $builder->join(
            'Atraccion_Evento',
            'Apertura_Validador.idAtraccionEvento = Atraccion_Evento.idAtraccionEvento',
            'inner'
        );

        $builder->join(
            'Atracciones',
            'Atraccion_Evento.idEvento = Atracciones.idAtraccion',
            'inner'
        );

        $builder->join(
            'Usuarios',
            'Apertura_Validador.idUsuario = Usuarios.idUsuario',
            'inner'
        );
        
        $builder->where('Atracciones.idAtraccion',$idEvento);

        $builder->where('Apertura_Validador.horaApertura >=',$fechaInicial);

        $builder->where('Apertura_Validador.horaApertura <=',$fechaFinal);

        $query = $builder->get();

        $datos = $query->getResultObject();

        return $datos;
        
        
    }

    public function cantidad_Ciclos($respuesta){
        $arreglo = array();
        $num_elementos = 0;

        /*
        if($cantidad === 1){
        }
        else{
            while($num_elementos<$cantidad){
                $query = $db->query(
                    "SELECT
                        SUM(Personas),
                        SUM(Creditos),
                        SUM(Cortesias),
                        SUM(Descuentos),
                        SUM(PulserasMagicas),
                    FROM
                        Ciclo
                    WHERE
                        idAperturaValidador = $respuesta[$num_elementos][idAperturaValidador];
                    "
                );

                $datos = $query->getResultObject();
                //$arreglo.array_push($datos);
                $num_elementos = $num_elementos + 1;
            }
        }
        */
        foreach($respuesta as $key => $dA){
            $db = \Config\Database::connect();
            $hola = $dA->idAperturaValidador;
            //$hola = $dA->idAtraccionEvento;
            //$hola = json_encode(array('idAtraccionEvento'=>$dA->idAperturaValidador));
            
            $query = $db->query(
                "SELECT
                    COUNT(idCiclo) AS Cantidad_Ciclos,
                    SUM(Personas) AS Cantidad_Personas,
                    SUM(Creditos) AS Cantidad_Creditos,
                    SUM(Cortesias) AS Cantidad_Cortesias,
                    SUM(Descuentos) AS Cantidad_Descuentos,
                    SUM(PulserasMagicas) AS Cantidad_Pulseras
                FROM
                    Ciclo
                WHERE
                    idAperturaValidador = 38;
                "
            );
            $datos = $query->getResultObject(); 
            //$resu = json_encode(array('$hola'=>$datos));
            $arreglo.array_push($datos);
            $num_elementos = $num_elementos + 1;
        }
        return $hola; 
    }
}