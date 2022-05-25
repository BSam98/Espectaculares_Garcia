<?php
namespace App\Models;

use CodeIgniter\Model;

class Prueba_Promocion_Model extends Model{
    protected $builder;

    public function mostrar_Promociones(){
        $db = \Config\Database::connect();

        $builder = $db->table('Promocion_Dos_x_Uno');
        $query = $builder->get();
        $descuentos = $query->getResultObject();

        /**----------------------------------------- */

        $builder = $db->table('Promocion_Pulsera_Magica');
        $query = $builder->get();
        $pulsera = $query->getResultObject();

        /**------------------------------------------ */

        $builder = $db->table('Promocion_Juegos_Gratis');
        $query = $builder->get();
        $juegos = $query->getResultObject();

        /**------------------------------------------ */

        $builder = $db->table('Promocion_Creditos_Cortesia');
        $query = $builder->get();
        $cortesias = $query->getResultObject();

        $datos=[
            'descuentos' => $descuentos,
            'pulsera' => $pulsera,
            'juegos' => $juegos,
            'cortesias' => $cortesias
        ];

        return $datos;
    }
}