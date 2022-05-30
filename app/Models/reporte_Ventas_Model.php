<?php

namespace App\Models;

use CodeIgniter\Model;

class Reporte_Ventas_Model extends Model{
    protected $model;
    protected $request;

    function consultarV($idv){
        $db = \Config\Database::connect();
        $query = $db->query("SELECT av.fondoCaja, e.Nombre, z.Nombre, t.Nombre, v.Nombre
                            FROM Eventos e, Zona z, Taquilla t, Ventanilla v, Apertura_Ventanilla av, Fajillas f 
                            WHERE f.idFajilla = ".$idv." and f.idAperturaVentanilla = av.idAperturaVentanilla 
                            and av.idVentanilla = v.idVentanilla and v.idTaquilla = t.idTaquilla and t.idZona = z.idZona and z.idZona = e.idEvento");
        if($query){
            return $query->getResultObject();
        }else{
            return false;
        }
    }

    function cerrarCajas($fI,$fF, $efec, $vouch, $idv){
        $db = \Config\Database::connect();
        $builder = $db->table('Fajillas');
        $builder-> select(
                'idFajilla, idAperturaVentanilla'
            );
        $builder->where('idFajilla', $idv);
        $query = $builder->get();
        $datosV = $query->getResultArray();
        foreach($datosV as $d){
            $idApVen = $d['idAperturaVentanilla'];
        }

        $query2 = $db->query("SELECT DISTINCT(f.idAperturaVentanilla), f.fecha, f.idStatus, cast(av.fondoCaja as decimal) fondoCaja,
                            (SELECT SUM(cast(Monto as decimal)) FROM Cobro c2 JOIN Transaccion t2 on(c2.idTransaccion=t2.idTransaccion) JOIN Fajillas f2 on(t2.idFajilla  = f2.idFajilla)
                            WHERE idFormasPago='1' and f2.idFajilla=".$idv.") as totalEfectivo,
                            (SELECT SUM(cast(Monto as decimal)) FROM Cobro c3 JOIN Transaccion t3 on(c3.idTransaccion=t3.idTransaccion) JOIN Fajillas f3 on(t3.idFajilla  = f3.idFajilla)
                            WHERE idFormasPago='2' and f3.idFajilla=".$idv.") as totalTarjeta
                            FROM Fajillas f JOIN Apertura_Ventanilla av on(f.idAperturaVentanilla = av.idAperturaVentanilla)
                            JOIN Transaccion t on(f.idFajilla  = t.idFajilla) JOIN Cobro c on(t.idTransaccion = c.idTransaccion)
                            WHERE f.idFajilla =".$idv);
        $result = $query2->getResultObject();
        if($result){
            
            $builder = $db->table('Fajillas');
            $builder-> select(
                    'idFajilla, idStatus, folioInicial, folioFinal, idAperturaVentanilla'
                );
            $builder->where('idAperturaVentanilla', $idApVen);
            $query = $builder->get();
            $datosT = $query->getResultArray();
            foreach($datosT as $d2){
                $fajilla = $d2['idFajilla'];
                $estado = $d2['idStatus'];
                $folioI = $d2['folioInicial'];
                $folioF = $d2['folioFinal'];
            }


            $query3 = $db->query("Select idTarjeta, idStatus FROM Tarjetas WHERE idTarjeta BETWEEN " . $folioI . " and " . $folioF);
            $datosTT = $query3->getResultArray();
            foreach($datosTT as $d3){
                echo var_dump($d3['idTarjeta']);
                echo var_dump($d3['idStatus']);
            }

                return $result;
            }
        
        

    }

}