<?php

namespace App\Models;

use CodeIgniter\Model;
use Mpdf\Tag\Tr;

class Iniciar_Sesion_User_Model extends Model{


    /*function consulta($datos){
        $db= \Config\Database::Connect();
        $query = $db->query(
                "SELECT * FROM Rangos"
        );
    
        $datos = $query->getResultObject();
    
        return $datos;
    }*/
    function consultaPrivilegios($rango){
        $db= \Config\Database::Connect();
        $query = $db->query("SELECT idPrivilegio, idModulo, idRango , Nombre, modulo FROM Privilegios p, Rangos r, Modulos m
                            WHERE p.rango_Id = r.idRango and p.privilegio_Modulo = m.idModulo and r.idRango = ".$rango);
        $datos = $query->getResultObject();
        return $datos;
    }

    function buscarUsuarios($username,$password){
        $db = \Config\Database::connect();
        $builder = $db->table('Usuarios');
        $builder-> select(
            'idUsuario, Nombre, Apellidos, CorreoE, Usuario, Contraseña, idRango, idEvento'
        );
        $builder->where('Usuario', $username);
        $builder->where('Contraseña', $password);
        $query = $builder->get();
        $datos = $query->getResultArray();
        
        if($datos){
            foreach($datos as $u){
                $data = array('idUsuario'=> trim($u['idUsuario']),					   	
                                'Nombre'=> trim($u['Nombre']),
                                'Apellidos'=> trim($u['Apellidos']),	
                                'CorreoE'=> trim($u['CorreoE']),
                                'Usuario'=> trim($u['Usuario']),
                                'Contraseña'=> trim($u['Contraseña']),
                                'idRango'=> trim($u['idRango']),
                                'idEvento'=> trim($u['idEvento']),
                                'resultado'=> true
                            );
            }
        }else{
            $data = array('idUsuario'=>'',					   	
                            'Nombre'=>'',
                            'Usuario'=>'',	
                            'Contraseña'=>'',					 
                            'resultado'=>false,
                            'msg'=>'El usuario y/o la contraseña no existe, verifique sus datos por favor'
			);
        }
        return $data; 
        //echo var_dump($data);
    }

   /* protected $table = 'Usuarios';
    protected $primaryKey = 'idUsuario';
    protected $returnType = 'array';
    protected $allowedFields = ['CorreoE','Usuario', 'Contraseña', 'idRango'];*/


    function Eventos($idUser){
        $db = \Config\Database::connect();
        $builder = $db->table('Usuarios');

        $builder-> select('
                Usuarios.idUsuario, 
                Eventos.idEvento, 
                Usuarios.idEvento, 
                Eventos.Nombre,
                Eventos.Ciudad,
                Eventos.Estado, 
                Eventos.FechaInicio, 
                Eventos.FechaFinal
                '
            );
        $builder->join('Eventos', 'Usuarios.idEvento = Eventos.idEvento');
        $builder->where('Usuarios.idUsuario', $idUser);
        $query = $builder->get();
        $datos = $query->getResultObject();
        return $datos; 
    }

    function zonasEvento($evento){
        $db = \Config\Database::connect();
        $builder = $db->table('Zona');

        $builder-> select(
                'idZona,
                Nombre,
                idEvento
                '
            );
        $builder->where('idEvento', $evento);
        $query = $builder->get();
        $datos = $query->getResultObject();
        return $datos; 
    }

    function taquillasZona($zona){
        $db = \Config\Database::connect();
        $builder = $db->table('Taquilla');

        $builder-> select(
                'idTaquilla,
                Nombre,
                idZona
                '
            );
        $builder->where('idZona', $zona);
        $query = $builder->get();
        $datos = $query->getResultObject();
        return $datos; 
    }

    function ventanillaTaquillas($taquilla){
        $db = \Config\Database::connect();
        $builder = $db->table('Ventanilla');

        $builder-> select(
                'idVentanilla,
                Nombre,
                idTaquilla,
                Status
                '
            );
        $builder->where('Status !=', 1);
        $builder->where('idTaquilla', $taquilla);
        $query = $builder->get();
        $datos = $query->getResultObject();
        return $datos; 
    }

   /* function insertarTurno($fecha,$fondo,$ventanilla,$usuario){
        $db = \Config\Database::connect();
        $builder = $db->table('Apertura_Ventanilla');
        $data = [
            'fondoCaja' => $fondo,
            'horaApertura' => $fecha,
            'idUsuario' => $usuario,
            'idVentanilla' => $ventanilla,
        ];
        if($builder->insert($data)){
            return $db->insertID();
        }else{
            return false;
        }
    }
    */
    function agregarFajilla($fondo,$ventanilla,$usuario,$fecha,$folioI,$folioF){
        $db = \Config\Database::connect();
        /**************************************** VERIFICAR EL ESTATUS DE LA VENTANILLA *****************/
        $builder = $db->table('Ventanilla');
        $builder-> select(
                'idVentanilla, Status'
            );
        $builder->where('idVentanilla', $ventanilla);
        $query = $builder->get();
        $datosV = $query->getResultArray();
        foreach($datosV as $vent){
            if($vent['Status'] == '1'){
                return false;
            }else{
                /***** Obtengo el id de las tarjetas con los folios que me ingreso y los comparo con los que ya estan registrados en Fajillas ******/
                $query1= $db->query(
                                "SELECT DISTINCT(folioInicial), Folio, folioFinal  from Tarjetas t, Fajillas av
                                WHERE folioInicial = (SELECT DISTINCT(idTarjeta) from Tarjetas t,Fajillas WHERE Folio = ".$folioI." and idTarjeta=folioInicial)
                                and folioFinal = (SELECT DISTINCT(idTarjeta) from Tarjetas t, Fajillas WHERE Folio  = ".$folioF." and idTarjeta=folioFinal)
                                and idTarjeta = folioInicial"
                            );
                $result = $query1->getResult();
                if($result){
                    /********************************************** Ya existen datos Registrados **********************************************/
                    return false;
                }else{
                        /********************************************** NO existen datos Registrados **********************************************/
                        $builder = $db->table('Apertura_Ventanilla');
                        $data = [
                            'fondoCaja' => $fondo,
                            'horaApertura' => $fecha,
                            'idUsuario' => $usuario,
                            'idVentanilla' => $ventanilla,
                        ];
                        if($builder->insert($data)){
                            $idAperturaVent =  $db->insertID();//id apertura ventanilla
                            // insertar las tarjetas a fajillas
                                $query= $db->query(
                                    "INSERT INTO Fajillas (fecha,idStatus,folioInicial,folioFinal,idAperturaVentanilla)
                                            VALUES('$fecha','6',(SELECT idTarjeta FROM Tarjetas WHERE Folio = $folioI),(SELECT idTarjeta FROM Tarjetas WHERE Folio = $folioF),$idAperturaVent)"
                                );
                                if($query){
                                    $builder = $db->table('Ventanilla');
                                    $data = [
                                        //'idVentanilla' => $ventanilla,
                                        'Status' => '1',
                                    ];
                                    $builder->where('idVentanilla', $ventanilla);
                                    $builder->update($data);
                                    return $db->insertID();
                                }else{
                                    return FALSE;
                                }
                        }else{
                            return false;
                        }            
                    }
            }
        }
    }
}


        //$datos = $query->getResultObject();

        
       
        /*
        $builder = $db->table('Apertura_Ventanilla');
        $data = [
            'fondoCaja' => $fondo,
            'horaApertura' => $fecha,
            'folioInicial' => $folioI,
            'folioFinal' => $folioF,
            'idUsuario' => $usuario,
            'idVentanilla' => $ventanilla
        ];
        if($builder->insert($data)){
            return TRUE;
        }else{
            return FALSE;
        }
        */
    

    /*function consultarTurno($evento,$zona, $taquilla,$ventanilla,$usuario){
        $db = \Config\Database::connect();
        $builder = $db->table('Eventos');
        $builder-> select(
            ' Zona.Nombre,
              Taquilla.Nombre,
              Ventanilla.Nombre, 
              Ventanilla.idVentanilla,
              Apertura_Ventanilla.idUsuario 
            '
        );
    $builder->join('Zona', 'Eventos.idEvento = Zona.idEvento');
    $builder->join('Taquilla', 'Zona.idZona = Taquilla.idZona');
    $builder->join('Ventanilla', 'Taquilla.idTaquilla = Ventanilla.idTaquilla');
    $builder->join('Apertura_Ventanilla', 'Ventanilla.idVentanilla = Apertura_Ventanilla.idVentanilla');
    $builder->where('Eventos.idEvento', $evento);
    $builder->where('Zona.idZona', $zona);
    $builder->where('Taquilla.idTaquilla', $taquilla);
    $builder->where('Ventanilla.idVentanilla', $ventanilla);
    $builder->where('Apertura_Ventanilla.idUsuario', $usuario);
    $query = $builder->get();
    $datos = $query->getResultObject();
    return $datos; 
    }    */

