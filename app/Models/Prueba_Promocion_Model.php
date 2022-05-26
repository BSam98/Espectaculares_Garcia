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

    public function listado_Promociones($idEvento){
        $db = \Config\Database::connect();

        $builder = $db->table('Calendario_Dos_x_Uno');

        $builder->where('idEvento',$idEvento);

        $query = $builder->get();

        $descuentos = $query->getResultObject();

        /**----------------------------------------------------- */

        $builder =$db->table('Calendario_Pulsera_Magica');

        $builder->where('idEvento',$idEvento);
        $query = $builder->get();
        $pulsera = $query->getResultObject();

        /**------------------------------------------------------ */

        $builder =$db->table('Calendario_Juegos_Gratis');

        $builder->where('idEvento',$idEvento);
        $query = $builder->get();
        $juegos = $query->getResultObject();

        /**------------------------------------------------------- */

        $builder =$db->table('Calendario_Creditos_Cortesia');

        $builder->where('idEvento',$idEvento);
        $query = $builder->get();
        $cortesias = $query->getResultObject();

        $datos = [
            'listadoDescuentos' => $descuentos,
            'listadoPulseras' => $pulsera,
            'listadoJuegos' => $juegos,
            'listadoCreditos' => $cortesias

        ];

        return $datos;
    }

    public function promociones_Evento($idEvento){
        $db = \Config\Database::connect();

        $query = $db->query(
            "SELECT DISTINCT
                Promocion_Dos_x_Uno.idDosxUno,
                Promocion_Dos_x_Uno.Nombre,
                Promocion_Dos_x_Uno.Cantidad,
                Promocion_Dos_x_Uno.Boletos
            FROM
                Promocion_Dos_x_Uno
            INNER JOIN	
                Calendario_Dos_x_Uno
            ON
                Promocion_Dos_x_Uno.idDosxUno = Calendario_Dos_x_Uno.idDosxUno
            WHERE
                Calendario_Dos_x_Uno.idEvento = $idEvento[idEvento];"
        );

        $descuentos = $query->getResultObject();

        
        $query = $db->query(
            "SELECT DISTINCT
                Promocion_Pulsera_Magica.idPulseraMagica,
                Promocion_Pulsera_Magica.Nombre
            FROM
                Promocion_Pulsera_Magica
            INNER JOIN
                Calendario_Pulsera_Magica
            ON
                Promocion_Pulsera_Magica.idPulseraMagica = Calendario_Pulsera_Magica.idPulseraMagica
            WHERE
                Calendario_Pulsera_Magica.idEvento = $idEvento[idEvento];
            "
        );

        $pulsera = $query->getResultObject(); 

        $query =$db->query(
            "SELECT DISTINCT
                Promocion_Juegos_Gratis.idJuegosGratis,
                Promocion_Juegos_Gratis.Nombre
            FROM
                Promocion_Juegos_Gratis
            INNER JOIN
                Calendario_Juegos_Gratis
            ON
                Promocion_Juegos_Gratis.idJuegosGratis = Calendario_Juegos_Gratis.idJuegosGratis
            WHERE
                Calendario_Juegos_Gratis.idEvento = $idEvento[idEvento];
            "
        );

        $juegos =$query->getResultObject();

        $query = $db->query(
            "SELECT DISTINCT
                Promocion_Creditos_Cortesia.idCC,
                Promocion_Creditos_Cortesia.Nombre
            FROM
                Promocion_Creditos_Cortesia
            INNER JOIN
                Calendario_Creditos_Cortesia
            ON
                Promocion_Creditos_Cortesia.idCC = Calendario_Creditos_Cortesia.idCC
            WHERE
                Calendario_Creditos_Cortesia.idEvento = $idEvento[idEvento];
            "
        );

        $creditos = $query->getResultObject();
        

        
        $datos = [
            'descuentos' => $descuentos,
            'pulsera' => $pulsera,
            'juegos' => $juegos,
            'creditos' => $creditos
        ];
        

        return $datos;
    }

    public function agregar_Promocion_Evento($tabla, $datos){
        $db = \Config\Database::connect();

        $builder= $db->table($tabla);

        if($builder->insert($datos)){
            return $db->insertID();
        }
        else{
            return false;
        }
    }
}