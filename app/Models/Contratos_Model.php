<?php

namespace App\Models;

use CodeIgniter\Model;

class Contratos_Model extends Model{
    protected $model;
    protected $request;

    public function construct() {
        parent::__construct();
    }
    
    public function consultaContrato(){
        $db = \Config\Database::connect();
        $builder = $db->table('Contrato');
        $builder-> select(
                'idContrato,
                 Direccion,
                 FechaInicio,
                 FechaTermino,
                 Nombre'
        );
        $query = $builder->get();
        $datos = $query->getResultObject();
        return $datos;  
    }

    public function consultaPoliza(){
        $db = \Config\Database::connect();
        $builder = $db->table('Poliza');
        $builder-> select(
                'idPoliza,
                 Direccion,
                 FechaInicio,
                 FechaTermino,
                 Nombre'
        );
        $query = $builder->get();
        $datos = $query->getResultObject();
        return $datos;    
    }

    function consultaPolizaId($idPoliza){
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

    function consultaCotraId($idContra){
        $db = \Config\Database::connect();
        $builder = $db->table('Contrato');
        $builder-> select(
                '
                 idContrato,
                 Direccion,
                 FechaInicio,
                 FechaTermino,
                 Nombre'
        );
        $builder->where('idContrato',$idContra);
        $query = $builder->get();
        $datos = $query->getResultArray();
        return $datos;    
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

    function subirArchivosContrato($filepath,$nombre,$fechai,$fechaf){
        $db = \Config\Database::connect();
        $builder = $db->table('Contrato');
        $data = [
            'Direccion' => $filepath,
            'FechaInicio'  => $fechai,
            'FechaTermino'  => $fechaf,
            'Nombre' => $nombre
        ];

        $builder->insert($data);
        return 'Insertado';
    }
    
}
?>