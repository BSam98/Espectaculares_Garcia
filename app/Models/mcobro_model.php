<?php

namespace App\Models;

use CodeIgniter\Model;

class mcobro_model extends Model{

    public function button(){
        
    }

    public function promoPulsera(){
        $db = \Config\Database::connect();
        $builder = $db->table('Promocion_Pulsera_Magica');

        $builder-> select(
            '
            Promocion_Pulsera_Magica.idPulseraMagica,
            Promocion_Pulsera_Magica.Nombre,
            Promocion_Pulsera_Magica.Precio
            '
        );

        $query = $builder->get();
     
        $datos = $query->getResultObject();

        return $datos;
    }

    public function promoMostrar($id){
        $db = \Config\Database::connect();
        $builder = $db->table('Promocion_Pulsera_Magica');

        $builder-> select(
            '
            Promocion_Pulsera_Magica.idPulseraMagica,
            Promocion_Pulsera_Magica.Nombre,
            Promocion_Pulsera_Magica.Precio
            '
        );

        $builder->where('idPulseraMagica',$id);

        $query = $builder->get();
     
        $datos = $query->getResultObject();

        return $datos;
    }

}
