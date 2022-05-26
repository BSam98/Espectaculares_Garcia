<?php

namespace App\Models;

use CodeIgniter\Model;

class Reporte_Ventas_Model extends Model{
    protected $model;
    protected $request;

    public function consultarV($idv){
        $db = \Config\Database::connect();
        $query = $db->query("SELECT av.fondoCaja, e.Nombre, z.Nombre, t.Nombre, v.Nombre
                            FROM Eventos e, Zona z, Taquilla t, Ventanilla v, Apertura_Ventanilla av, Fajillas f 
                            WHERE f.idAperturaVentanilla = ".$idv." and f.idAperturaVentanilla = av.idAperturaVentanilla 
                            and av.idVentanilla = v.idVentanilla and v.idTaquilla = t.idTaquilla and t.idZona = z.idZona and z.idZona = e.idEvento");
        if($query){
            return $query->getResultObject();
        }else{
            return false;
        }
    }



}