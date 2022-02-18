<?php

namespace App\Models;

use CodeIgniter\Model;

class Contratos_Model extends Model{
    protected $model;
    protected $request;

    public function construct() {
        parent::__construct();
    }
    
    //FUNCIÓN PARA INSERTAR LOS DATOS DE LA IMAGEN SUBIDA
    function subir($datos)
    {
        $db= \Config\Database::Connect();
        $builder = $db->table('Contratos');

        $builder -> insert($datos);
        return 'Funciono';

      //  return $this->db->insert('Contrato', $data);
    }
}