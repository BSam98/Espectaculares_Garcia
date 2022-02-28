<?php

namespace App\Models;

use CodeIgniter\Model;

class Iniciar_Sesion_Administrador_Model extends Model{
    
        protected $table = 'Usuarios';
    
        protected $primaryKey = 'idUsuario';
    
        protected $returnType = 'array';
    
        protected $allowedFields = ['idUsuario','Usuario', 'Contraseña'];
}