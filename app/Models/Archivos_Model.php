<?php

namespace App\Models;

use CodeIgniter\Model;

class Archivos_Model extends Model{
    public function _construct(){
        parent :: _construct();
    }

    function subirArchivos($filepath,$nombre,$fechai,$fechaf){
        $db = \Config\Database::connect();
        $builder = $db->table('Poliza');
        $data = [
            'Direccion' => $filepath,
            'FechaInicio'  => $fechai,
            'FechaTermino'  => $fechaf,
            'Nombre' => $nombre
        ];

        $builder->insert($data);
        return 'Insertado';
    }

    function consultaPolizas(){
        $db = \Config\Database::connect();
        $builder = $db->table('Poliza');
        $builder-> select(
                '
                 idPoliza,
                 Direccion,
                 FechaInicio,
                 FechaTermino,
                 Nombre'
        );
        $query = $builder->get();
        $datos = $query->getResultObject();
        return $datos;     
    }

    function consultaPoliza($idPoliza){
        $db = \Config\Database::connect();
        $builder = $db->table('Poliza');
        $builder-> select(
                '
                 idPoliza,
                 Direccion,
                 FechaInicio,
                 FechaTermino,
                 Nombre'
        );
        $builder->where('idPoliza',$idPoliza);
        $query = $builder->get();
        $datos = $query->getResultArray();
        return $datos;    
    }
}