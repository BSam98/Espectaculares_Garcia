<?php

namespace App\Models;

use CodeIgniter\Model;

class Iniciar_Sesion_User_Model extends Model{

    function consulta($datos){
        $db= \Config\Database::Connect();
        $query = $db->query(
                "SELECT * FROM Rangos"
        );
    
        $datos = $query->getResultObject();
    
        return $datos;
    }

    protected $table = 'Usuarios';
    protected $primaryKey = 'idUsuario';
    protected $returnType = 'array';
    protected $allowedFields = ['CorreoE','Usuario', 'Contraseña', 'idRango'];

    function Eventos($idUser){
        $db = \Config\Database::connect();
        $builder = $db->table('Usuarios');

        $builder-> select(
                '
                Usuarios.idUsuario, 
                Eventos.idEvento, 
                Usuarios.idEvento, 
                Eventos.Nombre,
                Eventos.Ciudad,
                Eventos.Estado, 
                Eventos.FechaInicio, 
                Eventos.FechaFinal
                '
            );
        $builder->join('Eventos', 'Usuarios.idEvento = Eventos.idEvento');
        $builder->where('Usuarios.idUsuario', $idUser);
        $query = $builder->get();
        $datos = $query->getResultObject();
        return $datos; 
    }

    function zonasEvento($evento){
        $db = \Config\Database::connect();
        $builder = $db->table('Zona');

        $builder-> select(
                'idZona,
                Nombre,
                idEvento
                '
            );
        $builder->where('idEvento', $evento);
        $query = $builder->get();
        $datos = $query->getResultObject();
        return $datos; 
    }

    function taquillasZona($zona){
        $db = \Config\Database::connect();
        $builder = $db->table('Taquilla');

        $builder-> select(
                'idTaquilla,
                Nombre,
                idZona
                '
            );
        $builder->where('idZona', $zona);
        $query = $builder->get();
        $datos = $query->getResultObject();
        return $datos; 
    }

    function ventanillaTaquillas($taquilla){
        $db = \Config\Database::connect();
        $builder = $db->table('Ventanilla');

        $builder-> select(
                'idVentanilla,
                Nombre,
                idTaquilla
                '
            );
        $builder->where('idTaquilla', $taquilla);
        $query = $builder->get();
        $datos = $query->getResultObject();
        return $datos; 
    }

    function insertarTurno($fecha,$fondo,$ventanilla,$folioI,$folioF,$usuario){
        $db = \Config\Database::connect();
        $builder = $db->table('Apertura_Ventanilla');
        $data = [
            'fondoCaja' => $fondo,
            'horaApertura' => $fecha,
            'folioInicial' => $folioI,
            'folioFinal' => $folioF,
            'idUsuario' => $usuario,
            'IdVentanilla' => $ventanilla
        ];

        
        if($builder->insert($data)){
            return true;
        }
        else{
            return false;
        }
    }

    
}
