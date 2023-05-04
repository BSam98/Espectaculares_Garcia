<?php namespace App\Controllers;

use CodeIgniter\HTTP\Request;
use App\Models\Iniciar_Sesion_User_Model;
use PHPUnit\Framework\Constraint\IsEmpty;

class Iniciar_Sesion_User_Control extends BaseController {

    protected $request;

    public $session=null;
    public function __construct(){
        $this->request = \Config\Services::request();
        $this->session = \Config\Services::session();
    }

    public function getBusqueda(){
        $model = new Iniciar_Sesion_User_Model();

        $username = $_POST['usuario'];
        $password = $_POST['pass'];

        $respuesta = $model->get_usuario($username,$password);
        if($respuesta['resultado'] == true){
            $rango = $respuesta['idRango'];  
            $user = $respuesta['idUsuario'];

            $dat = array('idUsuario' => $respuesta['idUsuario'],					   	
                        'nombre' => $respuesta['nombre'],
                        'correo' => $respuesta['correoE'],	
                        'idRango' => $respuesta['idRango'],
                        'pass' => $respuesta['pass'],
                        'usuario' => $respuesta['usuario'],
                        'idEvento' => $respuesta['idEvento']
                    ); 
            $this->session->set($dat);
        }else{
            $rango = '';  
            $user = '';
        }

        $data = array('respuesta'=>$respuesta,'rango'=>$rango,'user'=> $user);   
      echo json_encode($data, JSON_PRETTY_PRINT);
    }

    public function veriRol(){
        $model = new Iniciar_Sesion_User_Model();
        $respuesta = false;

        $idr = $_POST['rol'];
        $idu = $_POST['user'];

        if (null != ($this->session->get('idUsuario'))) {//tiene sesion iniciada

            /***** consulta los modulos activos por usuario *****/
            $sql = "SELECT u.idUsuario, r.nombre as rango, modulo, usuario  FROM Rangos r
                    INNER JOIN Privilegios p on(r.idRango=p.rango_Id)
                    INNER JOIN Modulos m on(p.privilegio_Modulo=m.idModulo)
                    INNER JOIN Usuarios u on(r.idRango=u.idRango)
                    WHERE u.idRango = ".$idr." and u.idUsuario =".$idu;
            $datosUser = $model->consultarBD($sql);
            $datos = $datosUser->getRowArray();
            if($datos > 0){
                $sql2 = "SELECT * FROM Apertura_Ventanilla av 
                        WHERE av.idUsuario = ".$datos['idUsuario']." and av.idStatus != 8";
                $result = $model->consultarBD($sql2);
                $datos2 = $result->getRowArray();
                if($datos2 > 0){//el turno sigue abierto 
                    $modulo ="";
                    $respuesta;
                    $us = "";
                }else{//los turnos estan cerrados
                    $respuesta = true;
                    $modulo =$datos['modulo'];
                    $us = $datos['idUsuario'];
                }
            }else{
                $modulo ="";
                $respuesta;
                $us = "";
            }
        }else{
            echo "No inicio sesion";
        }     
        
        $msj="datoscorrectos";
        $data=array('respuesta'=>$respuesta,'modulo'=>$modulo, 'us' =>$us, 'msj'=>$msj);   

        echo json_encode($data, JSON_PRETTY_PRINT);   
    }
    
    public function Turno (){
        if (null != ($this->session->get('idUsuario'))) { //not logged in
            echo "Si tengo sesion iniciada";
            $model = new Iniciar_Sesion_User_Model();
            $u = $_GET['u'];
            $sql = "SELECT e.idEvento as ide, e.nombre as nombreEv, e.Ciudad, e.Estado, e.Precio, e.Ciudad, e.PrecioTarjeta, u.Usuario, u.idUsuario, u.idRango 
                    FROM Eventos e 
                    INNER JOIN Usuarios u on(e.idEvento = u.idEvento)
                    WHERE u.idUsuario =".$u;
            $datosUser = $model->consultarBD($sql);
            echo view('../Views/header');
            echo view('Usuarios/iniciar_Turno',array('eventos' => $datosUser));
            echo view('../Views/piePagina');
        }else{
            echo "No inicio sesion";
        }
    }

    public function Zonas(){
        $model = new Iniciar_Sesion_User_Model();
        $evento = $_POST['evento'];
        $data = $model->zonasEvento($evento);
        echo json_encode(array('respuesta'=>true,'msj'=>$data));
    }

    public function Taquillas(){
        $model = new Iniciar_Sesion_User_Model();
        $zona = $_POST['zona'];
        $data = $model->taquillasZona($zona);
        echo json_encode(array('respuesta'=>true,'msj'=>$data));
    }

    public function Ventanillas(){
        $model = new Iniciar_Sesion_User_Model();
        $taquilla = $_POST['taquilla'];
        $data = $model->ventanillaTaquillas($taquilla);
        echo json_encode(array('respuesta'=>true,'msj'=>$data));
    }

    public function guardarDatos(){
        $model = new Iniciar_Sesion_User_Model();
        $arrayIdtarjet = array();
        $arrayIdFajilla = array();
        $idF =0;

        if (null != ($this->session->get('idUsuario'))) { //not logged in

            $fecha = $_POST['fecha'];
            $fondo = $_POST['fondo'];
            $ventanilla = $_POST['ventanilla'];
            $folioI = $_POST['folioi'];
            $folioF = $_POST['foliof'];
            $usuario = $_POST['idUsuario'];
            $idEvento = $_POST['eventoId'];
            $bandera = 0;
            //$data2 = $model->agregarFajilla($fondo,$ventanilla,$usuario, $fecha,$folioI,$folioF);

            //la ventanilla esta disponible
            $sql = "SELECT idVentanilla, Status FROM Ventanilla WHERE idVentanilla=".$ventanilla." and Status=0";
            $datosUser = $model->consultarBD($sql);
            $datos = $datosUser->getResultArray();
            if($datos > 0){

                //VERIFICAMOS QUE EL EVENTO TENGA TARJETAS INGRESADAS Y DISPONIBLES
                $sql = "SELECT * FROM Tarjetas WHERE idEvento =".$idEvento." ";
                $query = $model->consultarBD($sql);
                if($query->getResultArray() > 0){
                    foreach($query->getResultArray() as $row){
                        array_push($arrayIdtarjet,$row['idFajilla']);//pone en un array todos los id de fajilla que ya estan registrados
                    }

                    //Obtengo el id de las tarjetas con los folios que me ingreso y los comparo con los que ya estan registrados en Fajillas
                    $sql = "SELECT idFajilla, folioInicial, folioFinal FROM Fajillas f 
                            WHERE folioInicial BETWEEN ".$folioI." and ".$folioF." OR folioFinal BETWEEN ".$folioI." and ".$folioF;
                    $query = $model->consultarBD($sql);
                    if($query->getResultArray() > 0){

                        foreach($query->getResultArray() as $row){
                                array_push($arrayIdFajilla,$row['idFajilla']);//agrega los id de fajilla en un array, de las fajillas que se tienen ingresadas en el mismo rango
                        }

                        $result = array_intersect($arrayIdtarjet, $arrayIdFajilla);//comparo los array´s para verificar si tienen un idFajilla igual
                        if($result){

                            $bandera;//ya hay datos registrados

                        }else{//no hay datos registrados

                            /*$sql = "SELECT * FROM Apertura_Ventanilla av WHERE av.idUsuario='".$usuario."' and idStatus != 8 ";
                            $query = $model->consultarBD($sql);
                            if($query->getResultArray()){*/
                                //$bandera;
                                $sql = "INSERT INTO Apertura_Ventanilla(fondoCaja, horaApertura, idUsuario ,idVentanilla, idStatus)
                                VALUES(".$fondo.",'".$fecha."', ".$usuario.", ".$ventanilla.", 8)";
                                    $datosID = $model->insertarAV($sql);//retorna el idAperturaVentanilla, agregado actualmente

                                    if($datosID){

                                        $idAperturaVent =  $datosID;//id apertura ventanilla
                                        
                                        // insertar las tarjetas a fajillas
                                        $sql="INSERT INTO Fajillas (fecha, idStatus, folioInicial, folioFinal, idAperturaVentanilla)
                                                    VALUES('$fecha','6',(SELECT idTarjeta FROM Tarjetas WHERE Folio = ".$folioI." and idEvento =".$idEvento."),(SELECT idTarjeta FROM Tarjetas WHERE Folio = ".$folioF." and idEvento =".$idEvento."),'$idAperturaVent')";
                                        $idF = $model->insertarAV($sql);

                                        if($idF){
                                            $sql ="UPDATE Ventanilla SET Status = 1 WHERE idVentanilla = ".$ventanilla;
                                            $query = $model->consultarBD($sql);
                                            if($query){
                                                $sql ="UPDATE Tarjetas SET idFajilla = ".$idF." WHERE idEvento=".$idEvento." and Folio BETWEEN ".$folioI." and ".$folioF;
                                                $query2 = $model->consultarBD($sql);
                                                if($query2){
                                                    $bandera=1;
                                                }
                                            }
                                        }else{
                                            $bandera;
                                        }
                                    }
                            /*}else{

                               $bandera
                            }*/
                        }
                    }

                }
            }


/*

            $sql = "SELECT idVentanilla, Status FROM Ventanilla WHERE idVentanilla=".$ventanilla;
            $datosUser = $model->consultarBD($sql);
            $datos = $datosUser->getResultArray();
            if($datos > 0){
                foreach($datosUser->getResultArray() as $vent){
                    if($vent['Status'] == '1'){
                        $bandera;
                    }else{
                        /***** Obtengo el id de las tarjetas con los folios que me ingreso y los comparo con los que ya estan registrados en Fajillas ******
                        $sql ="SELECT DISTINCT(folioInicial), Folio, folioFinal  from Tarjetas t, Fajillas av
                                WHERE folioInicial = (SELECT DISTINCT(idTarjeta) from Tarjetas t,Fajillas WHERE Folio = ".$folioI." and idTarjeta=folioInicial)
                                and folioFinal = (SELECT DISTINCT(idTarjeta) from Tarjetas t, Fajillas WHERE Folio  = ".$folioF." and idTarjeta=folioFinal)
                                and idTarjeta = folioInicial";
                        $datosUser = $model->consultarBD($sql);
                        //$result = $datosUser->getResultArray();
                        if($datosUser){
                            /********************************************** Ya existen datos Registrados **********************************************
                            $bandera;
                        }else{
                                /********************************************** NO existen datos Registrados **********************************************
                            $sql = "INSERT INTO Apertura_Ventanilla(fondoCaja,horaApertura,idUsuario,idVentanilla)
                                        VALUES(".$fondo.",'".$fecha."', ".$usuario.", ".$ventanilla.")";
                            $datosID = $model->insertarAV($sql);
                            if($datosID){
                            //if($builder->insert($data)){
                                $idAperturaVent =  $datosID;//id apertura ventanilla
                                // insertar las tarjetas a fajillas
                                    $sql="INSERT INTO Fajillas (fecha,idStatus,folioInicial,folioFinal,idAperturaVentanilla)
                                                VALUES('$fecha','6',(SELECT idTarjeta FROM Tarjetas WHERE Folio = $folioI),(SELECT idTarjeta FROM Tarjetas WHERE Folio = $folioF),$idAperturaVent)";
                                    $datosUser = $model->consultarBD($sql);
                                    //$result = $datosUser->getResultArray();
                                    if($datosUser){

                                        $sql ="UPDATE Ventanilla
                                                SET Status = 1
                                                WHERE idVentanilla".$ventanilla;
                                        $datosUser = $model->insertarAV($sql);
                                        $bandera=1;
                                    }else{
                                        $bandera;
                                    }
                            }        
                        }
                    }
                }
            }
            echo json_encode(array('respuesta'=>true,'msj'=>$bandera, 'contenido' => $bandera));*/
        }else{
            echo "No inicio sesion";
        }
        echo json_encode(array('respuesta'=>true,'msj'=>$bandera, 'idFaj' => $idF));
    }



    public function valida(){
        echo view('../Views/header');
        echo view('Usuarios/menu_user');
        echo view('Usuarios/validador');
        echo view('../Views/piePagina');
    }

    public function superTaquillas(){
        session_start([
            'use_only_cookies' => 1,
            'cookie_lifetime' => 0,
            'cookie_secure' => 1,
            'cookie_httponly' => 1
        ]);
        //echo view('../Views/header.php');
        //echo view('Usuarios/menu_user');
        //echo view('Usuarios/supervisor_atracciones');
        echo view('Usuarios/Supervisor_Taquillas/Supervisor_Taquillas_View');
        echo view('../Views/piePagina');
        //echo view('../Views/piePagina.php');
        /*echo view('../Views/header');
        echo view('Usuarios/Iniciar_Sesion_User/Menu_Principal_User');
        //echo view('Usuarios/menu_user');
        //echo view('Usuarios/validador');
        echo view('../Views/piePagina');*/
    }

    public function turnoValidador(){
        $session = session();
        $idUser = $session->idUsuario;
        $model = new Iniciar_Sesion_User_Model();
        $data = [
            'Eventos'=>$model->Eventos($idUser),
        ];
        echo view('../Views/header');
        echo view('Usuarios/Turno_Validador_View',$data);
        echo view('../Views/piePagina.php');
    }

    
    public function logout(){
        $dat = array('idUsuario','nombre','correo','idRango','pass','usuario','idEvento'); 
        $this->session->unset_userdata($dat);
        $this->session->sess_destroy();
        return $this->response->redirect(site_url(''));
	}

}