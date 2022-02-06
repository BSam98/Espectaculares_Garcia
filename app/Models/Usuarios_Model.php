<?php

namespace App\Models;

use CodeIgniter\Model;

class Usuarios_Model extends Model{

    protected $builder;

    public function _construct(){}

    public function listadoUsuarios(){
        $db = \Config\Database::connect();
        $builder = $db->table('Usuarios');

        $builder-> select(
            '
            Usuarios.Nombre AS UsuarioNombre,
            Usuarios.Apellidos AS UsuarioApellido,
            Usuarios.CorreoE,
            Usuarios.NSS,
            Usuarios.CURP,
            Usuarios.Usuario,
            Usuarios.Contraseña,
            Rangos.Nombre,
            Eventos.Ciudad
            '
        );

        $builder-> join(
            'Rangos',
            'Rangos.idRango = Usuarios.idRango',
            'inner'
        );

        $builder-> join(
            'Eventos',
            'Eventos.idEvento = Usuarios.idEvento',
            'inner'
        );

        $query = $builder->get();
     
        $datos = $query->getResultObject();

        return $datos;
    }
}