<?php 

namespace App\Models;

use CodeIgniter\Model;

class Rol_Model extends Model{

    function consultaModulos(){
        $db = \Config\Database::connect();
        $builder = $db->table('Modulos');
        $builder-> select(
                'idModulo,
                 modulo'
        );
        $query = $builder->get();
        $datos = $query->getResultObject();
        return $datos;     
    }

    function consultaSubM($idModulo){
        $db = \Config\Database::connect();
        $builder = $db->table('SubModulos');
        $builder-> select(
                'idSubM,
                 idmoduloPrin,
                 subModulo'
        );
        $builder->where('idmoduloPrin',$idModulo);
        $query = $builder->get();
        $datos = $query->getResultObject();
        return $datos;  
    }
}