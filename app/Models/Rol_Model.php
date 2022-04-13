<?php 

namespace App\Models;

use CodeIgniter\Model;

class Rol_Model extends Model{

    function consultaModulos($rol){
        $db = \Config\Database::connect();
        $builder = $db->table('Modulos');
        $builder-> select(
                'idModulo,
                 modulo,
                 tipo'
        );
        $builder->where('tipo',$rol);
        $query = $builder->get();
        $datos = $query->getResultObject();
        return $datos;     
    }

    function consultaSubM($rol, $pr){
        $db = \Config\Database::connect();
        $builder = $db->table('SubModulos');
        $builder-> select(
                'idSubM,
                 idmoduloPrin,
                 subModulo,
                 idModulo,
                 modulo,
                 tipo'
        );
        $builder->join('Modulos', 'idModulo = idmoduloPrin');
        $builder->Where('tipo',$rol);
        $builder->Where('idmoduloPrin',$pr);
        $query = $builder->get();
        $datos = $query->getResultArray();
        return $datos;  
    }

    function agregarM(){
        
    }
}