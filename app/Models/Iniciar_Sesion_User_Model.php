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

    function Eventos(){
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
        $query = $builder->get();
    
        $datos = $query->getResultObject();

        return $datos; 
}
}
