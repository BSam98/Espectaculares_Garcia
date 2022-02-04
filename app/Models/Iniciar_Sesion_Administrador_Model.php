<?php

namespace App\Models;

use CodeIgniter\Model;

class Iniciar_Sesion_Administrador_Model extends Model{

    public function iniciarSesion(){
        $db = \Config\Database::connect();
        $builder = $db->table('Usuarios');

        $builder-> select('
                    Usuarios.Usuario,
                    Usuarios.Constraseña
                ');
    }
   

    protected $table = 'Usuarios';
    protected $primaryKey = 'idUsuario';

    protected $returnType = 'array';
    //protected $useSoftDeletes = true;

    protected $allowedFields = ['Usuario','Contraseña'];
}