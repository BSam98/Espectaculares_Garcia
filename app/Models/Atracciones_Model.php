<?php

use CodeIgniter\Model;

class Atracciones_Model extends Model{
    protected $table ='Atracciones';
    protected $primaryKey = 'idAtraccion';
    protected $allowedFields = ['Nombre','Area','CapacidadMAX','Tiempo','TiempoMAX','Renta','idPropietario','CapacidadMIN'];
}