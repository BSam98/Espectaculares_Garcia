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

    public function listadoEventos($datos){
        $db = \Config\Database::Connect();

        switch($datos['tipoPromocion']){
            case 1:
                $builder = $db->table('Calendario_Dos_x_Uno');
                $builder ->select(
                    '
                    Calendario_Dos_x_Uno.idFechaDosxUno,
                    Calendario_Dos_x_Uno.Precio,
                    Calendario_Dos_x_Uno.FechaInicial,
                    Calendario_Dos_x_Uno.FechaFinal,
                    Eventos.Nombre
                    '
                );

                //$builder ->orderBy('Calendario_Dos_x_Uno.idEvento','DES');

                $builder->join(
                    'Eventos',
                    'Eventos.idEvento = Calendario_Dos_x_Uno.idEvento',
                    'inner'
                );

                $builder ->where('Calendario_Dos_x_Uno.idDosxUno',$datos['idPromocion']);

                $query = $builder->get();

                $datos = $query->getResultObject();

                return $datos;

            break;

            case 2:
                $builder = $db->table('Calendario_Pulsera_Magica');
                $builder ->select(
                    '
                    Calendario_Pulsera_Magica.idFechaPulseraMagica,
                    Calendario_Pulsera_Magica.Precio,
                    Calendario_Pulsera_Magica.FechaInicial,
                    Calendario_Pulsera_Magica.FechaFinal,
                    Eventos.Nombre
                    '
                );

                //$builder ->orderBy('','DES');

                $builder->join(
                    'Eventos',
                    'Eventos.idEvento = Calendario_Pulsera_Magica.idEvento',
                    'inner'
                );

                $builder -> where('Calendario_Pulsera_Magica.idPulseraMagica',$datos['idPromocion']);

                $query = $builder->get();

                $datos = $query->getResultObject();

                return $datos;
            break;

            case 3:
                $builder = $db->table('Calendario_Juegos_Gratis');
                $builder ->select(
                    '
                    Calendario_Juegos_Gratis.idFechaJuegosGratis,
                    Calendario_Juegos_Gratis.Precio,
                    Calendario_Juegos_Gratis.FechaInicial,
                    Calendario_Juegos_Gratis.FechaFinal,
                    Eventos.Nombre
                    '
                );

                //$builder ->orderBy('','DES');

                $builder->join(
                    'Eventos',
                    'Eventos.idEvento = Calendario_Juegos_Gratis.idEvento',
                    'inner'
                );

                $builder -> where('Calendario_Juegos_Gratis.idJuegosGratis',$datos['idPromocion']);

                $query = $builder->get();

                $datos = $query->getResultObject();

                return $datos;
            break;

            case 4:
                $builder = $db->table('Calendario_Creditos_Cortesia');
                $builder ->select(
                    '
                    Calendario_Creditos_Cortesia.idFechaCreditosCortesia,
                    Calendario_Creditos_Cortesia.Precio,
                    Calendario_Creditos_Cortesia.Creditos,
                    Calendario_Creditos_Cortesia.FechaInicial,
                    Calendario_Creditos_Cortesia.FechaFinal,
                    Eventos.Nombre
                    '
                );

                //$builder ->orderBy('','DES');

                $builder->join(
                    'Eventos',
                    'Eventos.idEvento = Calendario_Creditos_Cortesia.idEvento',
                    'inner');

                $builder -> where('Calendario_Creditos_Cortesia.idCC',$datos['idPromocion']);

                $query = $builder->get();

                $datos = $query->getResultObject();

                return $datos;
            break;
        }
    }

    public function insertarPromocion($tabla,$datos){
        $db= \Config\Database::Connect();
        $builder =$db->table($tabla);

        $builder->insert($datos);

        return 'Funciono';
    }
}