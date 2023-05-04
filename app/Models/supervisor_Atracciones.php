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
        $datos = $query->getResultArray();
        return $datos; 
    }

    function ZonasEve($data){
        $db = \Config\Database::connect();
            /*$query = $db->query("SELECT DISTINCT(z.idZona),  z.Nombre as nZona, a.Nombre as nAtraccion, a.idAtraccion FROM Atraccion_Evento ae, Eventos e, Atracciones a, Zona z
                                WHERE a.idAtraccion = ae.idAtraccion and ae.idEvento = e.idEvento and ae.idZona = z.idZona and a.idAtraccion = ae.idAtraccion and e.idEvento =".$data[0]['idEvento']);*/

            /*$query = $db->query("SELECT z.idZona, z.Nombre as nZona, a.Nombre as nAtraccion FROM Atraccion_Evento ae, Eventos e, Atracciones a, Zona z
                                WHERE a.idAtraccion = ae.idAtraccion and ae.idEvento = e.idEvento and ae.idZona = z.idZona and a.idAtraccion = ae.idAtraccion 
                                and e.idEvento =".$data[0]['idEvento']." GROUP BY z.idZona, z.Nombre, a.Nombre");*/

            $query = $db->query("SELECT z.idZona, z.Nombre as nZona, e.idEvento from Zona z, Eventos e where e.idEvento = z.idEvento and e.idEvento =".$data[0]['idEvento']);

        $datos = $query->getResultObject();
        return $datos; 
    }

    function consultarAtt($id){
        $db = \Config\Database::connect();
        $query = $db->query("SELECT a.idAtraccion, a.Nombre, a.Tiempo FROM Atracciones a, Zona z, Atraccion_Evento ae
                                WHERE z.idZona = ae.idZona and a.idAtraccion = ae.idAtraccion and z.idZona =".$id);
        $datos = $query->getResultObject();
        return $datos; 
    }

    function consultarCiclo($atraccion){
        $db = \Config\Database::connect();
        /*$query = $db->query("SELECT c.idCiclo, c.idAperturaValidador, av.idAtraccionEvento, c.Status
                            FROM Ciclo c, Apertura_Validador av, Atraccion_Evento ae
                            WHERE c.idAperturaValidador = av.idAperturaValidador and av.idAtraccionEvento = ae.idAtraccion and av.idAtraccionEvento =".$atraccion."
                            and c.Status ='1' ORDER BY idCiclo DESC;");*/
        $query = $db->query("SELECT c.idCiclo, c.idAperturaValidador, av.idAtraccionEvento, a.Tiempo, c.Status
                            FROM Ciclo c, Apertura_Validador av, Atraccion_Evento ae, Atracciones a 
                            WHERE c.idAperturaValidador = av.idAperturaValidador and av.idAtraccionEvento = ae.idAtraccion and av.idAtraccionEvento =".$atraccion."
                            and c.Status ='1' and a.idAtraccion = ae.idAtraccion ORDER BY idCiclo DESC");
        $datos = $query->getResultArray();
        return $datos; 
    }

    function insertarDatos($data, $nperso,$usuario, $fecha){
        $db = \Config\Database::connect();
        $query = $db->query("INSERT INTO registro_Superv_Atraccion (idCiclo, fecha, idUsuario, numPersonas) 
                                            VALUES ('".$data[0]['idCiclo']."', '".$fecha."', '".$usuario."', '".$nperso."')");
        if($query){
            return true;
        }else{
            return false;
        }
    }
}