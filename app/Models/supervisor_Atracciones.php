<?php

namespace App\Models;

use CodeIgniter\Model;
use Mpdf\Tag\Tr;

class Supervisor_Atracciones extends Model{

    function Eventos($idUser){
        $db = \Config\Database::connect();
        $builder = $db->table('Usuarios');

        $builder-> select('
                Eventos.idEvento
                '
            );
        $builder->join('Eventos', 'Usuarios.idEvento = Eventos.idEvento');
        $builder->where('Usuarios.idUsuario', $idUser);
        $query = $builder->get();
        $datos = $query->getResultObject();
        return $datos; 
    }

    function Zonas($data){
        $db = \Config\Database::connect();
        $builder = $db->table('Zonas');

        $builder-> select('Nombre');
        $builder->where('idEvento', $data);
        $query = $builder->get();
        $datos = $query->getResultObject();
        return $datos; 
    }
}