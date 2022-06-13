<?php

namespace App\Models;

use CodeIgniter\Model;
use Mpdf\Tag\Select;

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

            $query7 = $db->query("SELECT idAperturaVentanilla from Fajillas f WHERE idFajilla =" . $idv);
            $res = $query7->getResultArray();

            foreach($res as $re){
                $idApVen = $re['idAperturaVentanilla'];
            }

            $builder = $db->table('Fajillas');
            $builder-> select(
                    'idFajilla, idStatus, folioInicial, folioFinal'
                );
            $builder->where('idAperturaVentanilla', $idApVen);
            $query = $builder->get();
            $datosT = $query->getResultArray();

            foreach($datosT as $d2){
                //$fajilla = $d2['idFajilla'];
                $estado = $d2['idStatus'];
                /*$folioI = $d2['folioInicial'];
                $folioF = $d2['folioFinal'];*/

                if($estado == 6){

                    if(($fI == '') && ($fF == '')){
                        return false;
                    }else{
                        $array =[];
                        $query4 = $db->query("SELECT t.idStatus, idTarjeta, (SELECT TOP 1  idTarjeta FROM Fajillas f, Tarjetas t WHERE f.idFajilla =".$idv." and idTarjeta BETWEEN folioInicial and folioFinal and t.idStatus != '0') as primero,
                                            (SELECT TOP 1 idTarjeta FROM Fajillas f, Tarjetas t WHERE f.idFajilla =".$idv." and idTarjeta BETWEEN folioInicial and folioFinal and t.idStatus != '0' ORDER BY idTarjeta  DESC) as ultimo
                                            FROM Fajillas f, Tarjetas t WHERE f.idFajilla = ".$idv." and t.idFajilla = f.idFajilla and idTarjeta BETWEEN folioInicial and folioFinal and t.idStatus != '0'");
                        $result2 = $query4->getResultArray();

                        for ($i = 0; $i < count($result2) ; $i++){

                            if(in_array($result2[$i]['primero'], $array)){
                            }else{
                                array_push($array,$result2[$i]['primero']);
                            }
                            if(in_array($result2[$i]['ultimo'], $array)){
                            }else{
                                array_push($array,$result2[$i]['ultimo']);
                            }
                        }

                        $query5 = $db->query("SELECT (SELECT DISTINCT(idTarjeta) from Tarjetas t WHERE Folio = ".$fI.") as ingresadoI,
                                            (SELECT DISTINCT(idTarjeta) from Tarjetas t WHERE Folio = ".$fF.") as ingresadoF
                                            FROM Fajillas f WHERE idFajilla =".$idv);

                        $result3 = $query5->getResultArray();

                        foreach($result3 as $rr){

                            if((in_array($rr['ingresadoI'], $array)) && (in_array($rr['ingresadoF'], $array))){
                                //echo 'Si existen';
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
                                //suma todo el dinero en efectivo y dinero en tarjeta
                                /*$query2 = $db->query("SELECT DISTINCT(f.idAperturaVentanilla), f.fecha, f.idStatus, cast(av.fondoCaja as decimal) fondoCaja,
                                                (SELECT SUM(cast(Monto as decimal)) FROM Cobro c2 JOIN Transaccion t2 on(c2.idTransaccion=t2.idTransaccion) JOIN Fajillas f2 on(t2.idFajilla  = f2.idFajilla)
                                                WHERE idFormasPago='1' and f2.idFajilla=".$idv.") as totalEfectivo,
                                                (SELECT SUM(cast(Monto as decimal)) FROM Cobro c3 JOIN Transaccion t3 on(c3.idTransaccion=t3.idTransaccion) JOIN Fajillas f3 on(t3.idFajilla  = f3.idFajilla)
                                                WHERE idFormasPago='2' and f3.idFajilla=".$idv.") as totalTarjeta
                                                FROM Fajillas f JOIN Apertura_Ventanilla av on(f.idAperturaVentanilla = av.idAperturaVentanilla)
                                                JOIN Transaccion t on(f.idFajilla  = t.idFajilla) JOIN Cobro c on(t.idTransaccion = c.idTransaccion)
                                                WHERE f.idFajilla =".$idv);*/
                                $query2 = $db->query("SELECT DISTINCT(f.idAperturaVentanilla), f.fecha, f.idStatus, cast(av.fondoCaja as decimal) fondoCaja,
                                                (SELECT SUM(cast(Monto as decimal)) FROM Cobro c2 JOIN Transaccion t2 on(c2.idTransaccion=t2.idTransaccion) JOIN Fajillas f2 on(t2.idFajilla  = f2.idFajilla)
                                                WHERE idFormasPago='1' and f2.idFajilla=".$idv.") as totalEfectivo,
                                                (SELECT COUNT(*) FROM Cobro c3 JOIN Transaccion t3 on(c3.idTransaccion=t3.idTransaccion) JOIN Fajillas f3 on(t3.idFajilla  = f3.idFajilla)
                                                WHERE idFormasPago='2' and f3.idFajilla=".$idv.") as totalTarjeta
                                                FROM Fajillas f JOIN Apertura_Ventanilla av on(f.idAperturaVentanilla = av.idAperturaVentanilla)
                                                JOIN Transaccion t on(f.idFajilla  = t.idFajilla) JOIN Cobro c on(t.idTransaccion = c.idTransaccion)
                                                WHERE f.idFajilla =".$idv);
                                $result = $query2->getResultObject();
                                if($result){
                                    return $result;
                                }
                            }else{
                                return 0 ;
                            }
                        }
                    }
                }
            } 
            
    }

    function cerrarTurno($dtI, $dtF, $efectivo, $vou, $idv, $fecha){
        $db = \Config\Database::connect();

        /***************************** Consulto el idApertura por medio de idFajilla **********************************/
        $builder = $db->table('Fajillas');
        $builder->select('idAperturaVentanilla, idStatus');
        $builder->where('idFajilla', $idv);
        $query = $builder->get();
        $datos = $query->getResultArray();

        foreach($datos as $id){
            $aperturaV = $id['idAperturaVentanilla'];
            $statusFajilla = $id['idStatus'];
        }

        $query = $db->query("SELECT (SELECT DISTINCT(idTarjeta) from Tarjetas t WHERE Folio = ".$dtI.") as ingresadoI,
                            (SELECT DISTINCT(idTarjeta) from Tarjetas t WHERE Folio = ".$dtF.") as ingresadoF,
                            (SELECT COUNT(*) FROM Tarjetas t2 WHERE Folio BETWEEN ".$dtI." and ".$dtF.") as tarjetasTotales FROM Fajillas f WHERE idFajilla =".$idv);
        $resultado = $query->getResultArray();
        foreach($resultado as $res){
            $folioInic = $res['ingresadoI'];
            $folioFin = $res['ingresadoF'];
            $tarjetasTotales = $res['tarjetasTotales'];
        }
        /*$query4 = $db->query("SELECT COUNT(*) as tarjetasTotales from Tarjetas t WHERE idTarjeta BETWEEN ". $dtI ." and ". $dtF);
        $resultado = $query4->getResultArray();
        foreach($resultado as $res){
            $tarjetasTotales = $res['tarjetasTotales'];
            echo var_dump($tarjetasTotales);
        }*/

        /************************** Libero las tarjetas sobrantes **********************/
        
        /************************** Hago el registro de cierre de Turno en la tabla Cierre_Ventanilla **********************/
        $builder = $db->table('Cierre_Ventanilla');
            $data = [
                'Efectivo' => $efectivo,
                'Boucher' => $vou,
                'horaCierre' => $fecha,
                'idAperturaVentanilla' => $aperturaV
            ];
            if($builder->insert($data)){

                $idCierreVentanilla =  $db->insertID();

                /******************************** Consulto idVentanilla *******************/
                $builder = $db->table('Apertura_Ventanilla');
                $builder -> select('idVentanilla');
                $builder -> where('idAperturaVentanilla',$aperturaV);
                $query2 = $builder->get();
                $datos2 = $query2->getResultArray();
                foreach($datos2 as $id2){
                    $idventa = $id2['idVentanilla'];
                }

                /********************* Cambio el Status de la ventanilla ********************/
                $builder = $db->table('Ventanilla');
                $builder -> select('Status');
                $builder -> where('idVentanilla', $idventa);
                $query3 = $builder->get();
                $datos3 = $query3->getResultArray();
                foreach($datos3 as $id3){
                    $estado = $id3['Status'];
                }
                    if($estado == 1){
                        $builder = $db->table('Ventanilla');
                        $data = [
                            'Status' => 0,//cambio el estado a tarjeta vendida
                        ];
                        $builder->where('idVentanilla', $idventa);

                        if($builder->update($data)){

                            //if($statusFajilla == 6){
                                $builder = $db->table('Tarjetas_Restantes');
                                $data = [
                                    'folioInicial'=> $folioInic,
                                    'folioFinal' => $folioFin,
                                    'cantidadTarjetas' => $tarjetasTotales,
                                    'idStatus' => 4,
                                    'idFajilla' => $idv,
                                    'idCierreVentanilla' => $idCierreVentanilla
                                ];
                                if($builder->insert($data)){

                                   // $idCob = $db->insertID();

                                    /*********** Aqui libero las tarjetas que quedaron para que las puedan ingresar a otra ventanilla ************/
                                    
                                    $query = $db->query("UPDATE Tarjetas set idFajilla = null WHERE idTarjeta BETWEEN ".$folioInic." and ".$folioFin);
                                    if($query){
                                        return true;
                                    }else{
                                        return false;
                                    }
                                }else{
                                    return false;
                                }
                            //}
                           // return TRUE;
                        }else{
                            return FALSE;
                        }
                    }else{
                        return FALSE;
                    }

            }          
    }

}