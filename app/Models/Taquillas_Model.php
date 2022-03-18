<?php

namespace App\Models;

use CodeIgniter\Model;

class Taquillas_Model extends Model{

    protected $builder;

    protected $table;
    protected $primaryKey;
    protected $returnType;

    public function listadoEventos(){
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
        $builder->orderBy('idEvento', 'DESC');
        $query = $builder->get();
        $datos = $query->getResultObject();
        return $datos;        
    }

    function leventos($evento){

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
        $builder->where('idEvento', $evento);
        $query = $builder->get();
        $datos = $query->getResultObject();
        return $datos;   
        
        
        //$query = $this->db->get_where('mencion_perito', array('mencion_perito' => $especialidad_perito));
        //return $query;
    }
}