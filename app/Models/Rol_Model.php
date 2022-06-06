<?php 

namespace App\Models;

use CodeIgniter\Model;

class Rol_Model extends Model{

    function consultaModulos($rol){
        $db = \Config\Database::connect();
        $query = $db->query("SELECT idModulo, modulo, privilegio_Modulo FROM Modulos m, Privilegios p WHERE idModulo = privilegio_Modulo and rango_Id =" . $rol);
        $datos = $query->getResultObject();
        return $datos;     
    }

    public function listaModulos(){
        $db = \Config\Database::connect();
        $builder = $db->table('Modulos');
        $builder-> select(
            'idModulo,
             modulo'
        );
        $query = $builder->get();
        $datos = $query->getResultObject();
        return $datos;
    }

    function consultaSubM($rol, $pr){
        $db = \Config\Database::connect();
        $builder = $db->table('SubModulos');
        $builder-> select(
                'idSubM,
                 idmoduloPrin,
                 subModulo,
                 idModulo,
                 modulo,
                 tipo'
        );
        $builder->join('Modulos', 'idModulo = idmoduloPrin');
        $builder->Where('tipo',$rol);
        $builder->Where('idmoduloPrin',$pr);
        $query = $builder->get();
        $datos = $query->getResultArray();
        return $datos;  
    }

    public function privilegios(){
        $db = \Config\Database::Connect();
        $query = $db->query("SELECT idRango, Nombre, STRING_AGG(modulo, ',') as modulo
        FROM Privilegios, Modulos m, Rangos r 
        WHERE privilegio_Modulo = idModulo and idRango = rango_Id GROUP BY idRango, Nombre ");
        $datos = $query->getResultObject();
        return $datos;
    }

    function eliminarPrivilegios($rango){
        $db = \Config\Database::Connect();
        $query = $db->query("DELETE FROM Privilegios WHERE rango_Id=".$rango);
        return $query;
    }

    function agregarRango($nombreR){
        $db = \Config\Database::Connect();
        $builder = $db->table('Rangos');
        $data = ['Nombre' => $nombreR];
        if($builder->insert($data)){
            return $db->insertID();
        }else{
            return false;
        }
    }

    function consulta($sql){
        $db = \Config\Database::Connect();
        $query = $db->query($sql);
        return $query;  
    }
}