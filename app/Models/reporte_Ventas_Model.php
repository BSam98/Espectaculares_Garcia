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

    /*function consultaFondo($idv){
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
    }*/

    function cerrarCajas($fI,$fF, $efec, $vouch, $idv){
        $db = \Config\Database::connect();
            /*********** Aqui obtengo el id de aperturaVentanilla con el idFajilla que tengo **********/
            $query7 = $db->query("SELECT idAperturaVentanilla FROM Fajillas f WHERE idFajilla = " . $idv);
            $res = $query7->getResultArray();
            foreach($res as $re){
                $idApVen = $re['idAperturaVentanilla'];//idAperturaVentanilla
            }

            /********** Selecciono todas las fajillas que tiene el mismo idAperturaVentanilla ***********/
            $builder = $db->table('Fajillas');
            $builder-> select(
                    'idFajilla, idStatus, folioInicial, folioFinal'
                );
            $builder->where('idAperturaVentanilla', $idApVen);
            $query = $builder->get();
            $datosT = $query->getResultArray();

            foreach($datosT as $d2){
                $fajilla = $d2['idFajilla'];//idFajilla
                $estado = $d2['idStatus'];//Status de la fajilla

                if($estado == 6){// 6 significa fajilla actual
                    
                    if(($fI == '') && ($fF == '')){//si lis folios de interfaz, me los manda vacios, que me retorne un false
                        //echo 'Si entro aqui';
                        return '';//revisar como puedo retornar true o false y retornar valores
                    }else{  
                        //echo 'No entro aqui';
                        //echo var_dump($idv);
                        $array =[];
                        /************** Consulto las tarjetas sobrantes de esa fajilla ************************/
                        $query4 = $db->query("SELECT t.idStatus, idTarjeta, (CASE WHEN t.idStatus ='1' THEN 'No vendida' WHEN t.idStatus ='5' THEN 'Devolucion' WHEN t.idStatus ='13' then 'Cancelada' end) as estado, 
                                            (SELECT TOP 1  idTarjeta FROM Fajillas f, Tarjetas t WHERE f.idFajilla =".$idv." and idTarjeta BETWEEN folioInicial and folioFinal and t.idStatus != '0' and t.idStatus !='5' and t.idStatus !='13') as primero,
                                            (SELECT TOP 1 idTarjeta FROM Fajillas f, Tarjetas t WHERE f.idFajilla =".$idv." and idTarjeta BETWEEN folioInicial and folioFinal and t.idStatus != '0' and t.idStatus !='5' and t.idStatus !='13' ORDER BY idTarjeta  DESC) as ultimo
                                            FROM Fajillas f, Tarjetas t WHERE f.idFajilla = ".$idv." and t.idFajilla = f.idFajilla and idTarjeta BETWEEN folioInicial and folioFinal and t.idStatus != '0' and t.idStatus !='5' and t.idStatus !='13'");
                        
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

                        /************* Obtengo el idTarjeta de los folios ingresados en vista ************/
                        $query5 = $db->query("SELECT (SELECT DISTINCT(idTarjeta) from Tarjetas t WHERE Folio = ".$fI.") as ingresadoI,
                                            (SELECT DISTINCT(idTarjeta) from Tarjetas t WHERE Folio = ".$fF.") as ingresadoF
                                            FROM Fajillas f WHERE idFajilla =".$idv);

                        $result3 = $query5->getResultArray();

                        foreach($result3 as $rr){
                        /************** Comparo si los id's ingresados y los consultados son iguales *************/
                            if((in_array($rr['ingresadoI'], $array)) && (in_array($rr['ingresadoF'], $array))){

                                $query2 = $db->query("SELECT DISTINCT(f.idAperturaVentanilla),intentosCierre, cast(av.fondoCaja as decimal) fondoCaja,
                                                    (SELECT SUM(cast(Monto as decimal)) FROM Cobro c2 JOIN Transaccion t2 on(c2.idTransaccion=t2.idTransaccion) JOIN Fajillas f2 on(t2.idFajilla  = f2.idFajilla)
                                                    WHERE idFormasPago='1' and f2.idAperturaVentanilla=".$idApVen.") as totalEfectivo,
                                                    (SELECT COUNT(*) FROM Cobro c3 JOIN Transaccion t3 on(c3.idTransaccion=t3.idTransaccion) JOIN Fajillas f3 on(t3.idFajilla  = f3.idFajilla)
                                                    WHERE idFormasPago BETWEEN '2' and '3' and f3.idAperturaVentanilla=".$idApVen.") as totalTarjeta
                                                    FROM Fajillas f JOIN Apertura_Ventanilla av on(f.idAperturaVentanilla = av.idAperturaVentanilla)
                                                    JOIN Transaccion t on(f.idFajilla  = t.idFajilla) JOIN Cobro c on(t.idTransaccion = c.idTransaccion)
                                                    WHERE f.idAperturaVentanilla =".$idApVen);
                                $result = $query2->getResultObject();
                                
                                if($result){
                                    return $result;
                                   // return $result;
                                }
                            }else{
                                return '';//neceito cambiar este retorno, que nom me devuelva un vacio, que me retorne un true o false o algo
                            }
                        }
                    }
                }else{
                    $query2 = $db->query("SELECT DISTINCT(f.idAperturaVentanilla),intentosCierre, cast(av.fondoCaja as decimal) fondoCaja,
                                        (SELECT SUM(cast(Monto as decimal)) FROM Cobro c2 JOIN Transaccion t2 on(c2.idTransaccion=t2.idTransaccion) JOIN Fajillas f2 on(t2.idFajilla  = f2.idFajilla)
                                        WHERE idFormasPago='1' and f2.idAperturaVentanilla=".$idApVen.") as totalEfectivo,
                                        (SELECT COUNT(*) FROM Cobro c3 JOIN Transaccion t3 on(c3.idTransaccion=t3.idTransaccion) JOIN Fajillas f3 on(t3.idFajilla  = f3.idFajilla)
                                        WHERE idFormasPago BETWEEN '2' and '3' and f3.idAperturaVentanilla=".$idApVen.") as totalTarjeta
                                        FROM Fajillas f JOIN Apertura_Ventanilla av on(f.idAperturaVentanilla = av.idAperturaVentanilla)
                                        JOIN Transaccion t on(f.idFajilla  = t.idFajilla) JOIN Cobro c on(t.idTransaccion = c.idTransaccion)
                                        WHERE f.idAperturaVentanilla =".$idApVen);
                    $result = $query2->getResultObject();
                    if($result){
                        return $result;
                    }
                }
            } 
            
    }

    function actualizarContador($apeV, $contador){
        $db = \Config\Database::connect();
        $builder = $db->table('Apertura_Ventanilla');
        $data = [
            'intentosCierre' => $contador,//cambio el estado a tarjeta vendida
        ];
        $builder->where('idAperturaVentanilla', $apeV);
        if($builder->update($data)){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    function actualizarStatus($apeV){
        $db = \Config\Database::connect();

        /********** Selecciono el idVentanilla de la tabla Apertura_Ventanilla con el idAperturaVentanilla ***********/
        $builder = $db->table('Apertura_Ventanilla');
        $builder-> select(
                'idUsuario, idVentanilla, idStatus'
            );
        $builder->where('idAperturaVentanilla', $apeV);
        $query = $builder->get();
        $datosT = $query->getResultArray();
        foreach($datosT as $d){
            $ventanilla = $d['idVentanilla'];
            $status = $d['idStatus'];
        }

        if($status == 8){
            $builder = $db->table('Apertura_Ventanilla');
            $data = [
                'idStatus' => 12,//cambio el estado a intento de Cierre
            ];
            $builder->where('idAperturaVentanilla', $apeV);
            if($builder->update($data)){
                return TRUE;
                /*$builder = $db->table('Ventanilla');
                $data = [
                    'Status' => 0,//cambio el estado a intento de Cierre
                ];
                $builder->where('idVentanilla', $ventanilla);
                if($builder->update($data)){
                    return TRUE;
                }else{
                    return FALSE;
                }*/
            }else{
                return FALSE;
            }
        }else{
            return FALSE;
        }
    }

    function checarDatos($user, $contra, $idApV, $fecha){
        $db = \Config\Database::connect();
        $query = $db->query("SELECT idUsuario, Usuario, r.Nombre FROM Usuarios u, Rangos r 
                            WHERE Usuario ='".$user."' and Contraseña ='".$contra."' and u.idRango = r.idRango and u.idRango ='7'");
        $datosTT = $query->getResultArray();
        if($datosTT){

            foreach($datosTT as $dd){
                $idUsuario = $dd['idUsuario'];
            }


            $builder = $db->table('Apertura_Ventanilla');
            $builder-> select(
                    'idAperturaVentanilla, idVentanilla'
                );
            $builder->where('idAperturaVentanilla', $idApV);
            $query1 = $builder->get();
            $datosT = $query1->getResultArray();
            foreach($datosT as $d){
                $ventanilla = $d['idVentanilla'];
            }
            
            $builder = $db->table('Ventanilla');
            $data = [
                'Status' => 0,//cambio el estado a intento de Cierre
            ];
            $builder->where('idVentanilla', $ventanilla);
            if($builder->update($data)){
                $builder = $db->table('Cierres_Forzados');
                    $data = [
                        'idUsuario' => $idUsuario,
                        'idAperturaVentanilla' => $idApV,
                        'Fecha' => $fecha
                    ];
                    if($builder->insert($data)){//me inserta el pago
                        return TRUE;
                    }else{
                        return FALSE;
                    }
            }else{
                return FALSE;
            }
        }else{
            return FALSE;
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


        if($statusFajilla == 6){


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

                            $builder = $db->table('Apertura_Ventanilla');
                            $data = [
                                'idStatus' => 9,//cambio el estado a  cierre exitoso
                            ];
                            $builder->where('idAperturaVentanilla', $aperturaV);
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
                }else{
                    return FALSE;
                }
            }          
        }else{
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

                            $builder = $db->table('Apertura_Ventanilla');
                            $data = [
                                'idStatus' => 9,//cambio el estado a  cierre exitoso
                            ];
                            $builder->where('idAperturaVentanilla', $aperturaV);
                            if($builder->update($data)){
                                return true;
                            }
                        }
                    }
            }

        }
    }

}