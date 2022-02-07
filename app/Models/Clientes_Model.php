<?php

namespace App\Models;

use CodeIgniter\Model;

class Clientes_Model extends Model{

    protected $builder;

    public function _construct(){}

    public function listadoClientes(){

        $db = \Config\Database::connect();
        $builder = $db->table('Clientes');

        $builder-> select(
            '
            Nombre,
            ApellidoP,
            ApellidoM,
            CorreoE,
            Contraseña,
            Telefono,
            Ciudad,
            Estado,
            FechaNacimiento
            '
        );

        $query = $builder->get();
     
        $datos = $query->getResultObject();

        return $datos;
    }
}