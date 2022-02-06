<?php

namespace App\Models;

use CodeIgniter\Model;

class Atracciones_Model extends Model{
    protected $builder;
    protected $table;
    protected $primaryKey = 'idAtraccion';
    protected $returnType = "array";

    protected $allowedFields = ['Nombre,Nombre','Area','CapacidadMAX','Tiempo','TiempoMAX','Renta','idPropietario','CapacidadMIN'];

    public function _construct(){
        parent :: _construct();
        //$db = \Config\Database::connect();
        //$this->table = $this->db->table('Atracciones');
        //$this->builder = $this->table;
    }

    public function listadoAtracciones(){
        /*
        $this->builder-> select(
            'Atracciones.Nombre AS Atraccion, 
            Atracciones.Area ,
            Atracciones.CapacidadMAX,
            Atracciones.Tiempo,
            Atracciones.TiempoMAX,
            Atracciones.Renta,
            Atracciones.CapacidadMIN,
            Propietario.Nombre'
        );

        $this->builder-> join(
            'Propietario',
            'Propietario.idPropietario = Atracciones.idPropietario',
            'inner'
        );

        $query = $this->builder->get()->getResultArray();

        return $query;
        */

        $db = \Config\Database::connect();
        $builder = $db->table('Atracciones');

        $builder-> select(
            'Atracciones.Nombre AS Atraccion, 
            Atracciones.Area ,
            Atracciones.CapacidadMAX,
            Atracciones.Tiempo,
            Atracciones.TiempoMAX,
            Atracciones.Renta,
            Atracciones.CapacidadMIN,
            Propietario.Nombre'
        );

        $builder-> join(
            'Propietario',
            'Propietario.idPropietario = Atracciones.idPropietario',
            'inner'
        );

        $query = $builder->get();
     
        $datos = $query->getResultObject();

        return $datos;
    }

    public function listadoPropietartios(){
        $db = \Config\Database::connect();
        $builder = $db->table('Propietario');

        $builder-> select(
            'Propietario.Nombre, 
            Propietario.ApellidoP,
            Propietario.ApellidoM,
            Propietario.Direccion,
            Propietario.Telefono,
            Propietario.FechaNacimiento'
        );

        $query = $builder->get();
    
        $datos = $query->getResultObject();

        return $datos;        
    }
}