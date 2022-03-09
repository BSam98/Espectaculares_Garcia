<?php
namespace App\Models;

use CodeIgniter\Model;

class Promociones_Model extends Model{
    protected $builder;

    public function _construct(){
        parent :: _construct();
    }

    public function listadoDosxUno(){
        $db= \Config\Database::Connect();
        $builder =$db->table('Promocion_Dos_x_Uno');
        $builder->select(
            '
            idDosxUno,
            Nombre,
            Precio
            '
        );

        $builder ->orderBy('idDosxUno','DESC');

        $query = $builder->get();

        $datos = $query->getResultObject();

        return $datos;
    }

    public function listadoPulsera(){
        $db= \Config\Database::Connect();
        $builder =$db->table('Promocion_Pulsera_Magica');
        $builder->select(
            '
            idPulseraMagica,
            Nombre,
            Precio
            '
        );

        $builder ->orderBy('idPulseraMagica','DESC');

        $query = $builder->get();

        $datos = $query->getResultObject();

        return $datos;
    }

    public function listadoJuegosGratis(){
        $db= \Config\Database::Connect();
        $builder =$db->table('Promocion_Juegos_Gratis');
        $builder->select(
            '
            idJuegosGratis,
            Nombre,
            Precio
            '
        );

        $builder ->orderBy('idJuegosGratis','DESC');

        $query = $builder->get();

        $datos = $query->getResultObject();

        return $datos;
    }

    public function listadoCreditosCortesia(){
        $db= \Config\Database::Connect();
        $builder =$db->table('Promocion_Creditos_Cortesia');
        $builder->select(
            '
            idCC,
            Nombre,
            Precio,
            Creditos
            '
        );

        $builder ->orderBy('idCC','DESC');

        $query = $builder->get();

        $datos = $query->getResultObject();

        return $datos;
    }

    public function insertarPromocion($tabla,$datos){
        $db= \Config\Database::Connect();
        $builder =$db->table($tabla);

        $builder->insert($datos);

        return 'Funciono';
    }
}