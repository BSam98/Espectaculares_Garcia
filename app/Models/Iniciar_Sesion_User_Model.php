<?php

namespace App\Models;

use CodeIgniter\Model;

class Iniciar_Sesion_User_Model extends Model{

    public function obtenerUsuario($data){

        $db = \Config\Database::connect();
        $builder = $db->table('Usuarios');

       /* $builder-> select(
            '
            Usuarios.idUsuario,
            Usuarios.Nombre, 
            Usuarios.Usuario,
            Usuarios.Contraseña
            '
        );*/
        $builder->where( 'Usuario',$data['Usuario'] ,'AND','Contraseña',$data['Contraseña']);
        $query = $builder->get();
    
        $datos = $query->getResultObject();

        return $datos;
    }
  
   protected $table = 'Usuarios';
    protected $primaryKey = 'idUsuario';

    protected $returnType = 'array';
    //protected $useSoftDeletes = true;

    protected $allowedFields = ['Usuario','Contraseña'];
    
}
