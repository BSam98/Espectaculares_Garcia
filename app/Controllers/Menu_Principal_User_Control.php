<?php namespace App\Controllers;
use App\Models\mcobro_model;
use PHPUnit\Framework\Constraint\IsNull;

//$idF='';
if (isset($_GET["idF"])){
    $var = $_GET["idF"];}

class Menu_Principal_User_Control extends BaseController {
    /*public function new (){
        echo view('../Views/header.php');
        echo view('Usuarios/iniciar_Turno');
        echo view('../Views/piePagina');
    }*/
    protected $model;
    protected $request;

    public $session=null;
    public $registros=null;

    public function __construct(){
       // $this->model = new Atracciones_Model();
       $this->request = \Config\Services::request();
       $this->session = \Config\Services::session();
       $this->registros = \Config\Services::session();
    }

    public function venta (){
        echo view('../Views/header.php');
        //echo view('Usuarios/menu_user');
        //echo view('Usuarios/Iniciar_Sesion_User/Menu_Principal_User');
        echo view('../Views/piePagina');
    }

    public function ConsultaTurno(){
        $evento = $_POST['evento'];
        $zona = $_POST['zona'];
        $taquilla = $_POST['taquilla'];
        $ventanilla = $_POST['ventanilla'];
        $ventanilla = $_POST['ventanilla'];
        $usuario = $_POST['usuario'];
        $model = new mcobro_model();
        $data = $model->consultarTurno($evento,$zona,$taquilla,$ventanilla,$usuario);
        echo json_encode(array('respuesta'=>true,'msj'=>$data));
       
        /*$data = [
            'Pulsera'=>$model->promoPulsera(),
        ];

        echo view('../Views/header.php');
       //    echo view('Usuarios/menu_user');
        echo view('Usuarios/modulo_Cobro', $data);
        echo view('../Views/piePagina');*/
    }

    public function MCobro(){
        date_default_timezone_set('America/Mexico_City');
        $fecha = date("Y-m-d H:i:s");
        
        if (null != ($this->session->get('idUsuario'))) { //not logged in
            $datoss = array('idEvento' => $_GET["e"],					   	
                        'idZona' => $_GET["z"],
                        'idTaquilla' => $_GET["t"],	
                        'idAVentanilla' => $_GET["idv"],
                        'idFajilla' => $_GET["idF"],
                    ); 
        $this->registros->set($datoss);
            
            $model = new mcobro_model;

            $evento = $_GET["e"];
            $zona = $_GET['z'];
            $taquilla = $_GET['t'];
            $idApven = $_GET['idv'];
            $idF = $_GET['idF'];
            $usuario = $_GET['u'];
            
            //creditos
            $sql ="SELECT pcc.Nombre, ccc.idFechaCreditosCortesia, ccc.Creditos, 
                    (SELECT convert( varchar, ccc.FechaInicial, 120)) as fechaI, 
                    (SELECT convert(varchar, ccc.FechaFinal, 120)) as fechaF
                    FROM Promocion_Creditos_Cortesia pcc
                    INNER JOIN Calendario_Creditos_Cortesia ccc on(ccc.idCC = pcc.idCC)
                    WHERE ccc.FechaInicial <='".$fecha."' and ccc.FechaFinal >= '".$fecha."' and ccc.idEvento =".$evento;
            $queryc = $model->consultarBD($sql);

            //turno
            $sql = "SELECT e.Nombre as nombreE, z.Nombre as nombreZ, t.Nombre as nombreT, v.Nombre as nombreV ,e.PrecioTarjeta, u.Usuario
                    FROM Eventos e 
                    INNER JOIN Zona z ON(z.idEvento = e.idEvento)
                    INNER JOIN Taquilla t ON (z.idZona = t.idZona)
                    INNER JOIN Usuarios u ON(u.idEvento = e.idEvento)
                    INNER JOIN Apertura_Ventanilla av ON(av.idUsuario = u.idUsuario)
                    INNER JOIN Ventanilla v ON(v.idVentanilla = av.idVentanilla)
                    INNER JOIN Fajillas f ON(f.idAperturaVentanilla = av.idAperturaVentanilla)
                    WHERE e.idEvento = ".$evento." and z.idZona = ".$zona." and t.idTaquilla = ".$taquilla." and v.idVentanilla = ".$idApven." and av.idUsuario = ".$usuario." and f.idFajilla =".$idF." and v.idTaquilla = t.idTaquilla" ;
            $queryt = $model->consultarBD($sql);

            //pulsera
            //echo var_dump($fecha);
            $sql ="SELECT ppm.idPulseraMagica, ppm.Nombre, cpm.Precio, (SELECT convert(varchar, FechaInicial, 120)) as fechaI, 
                    (SELECT convert(varchar, FechaFinal, 120)) as fechaF, cpm.idFechaPulseraMagica 
                    FROM Promocion_Pulsera_Magica ppm 
                    INNER JOIN Calendario_Pulsera_Magica cpm ON (ppm.idPulseraMagica = cpm.idPulseraMagica) 
                    WHERE cpm.FechaInicial <= '".$fecha."' and  cpm.FechaFinal >='".$fecha."' and  cpm.idEvento =".$evento;  
            $queryp = $model->consultarBD($sql);

            //tipo pago
            $sql ="SELECT idFormasPago, Nombre, PorcentajeCosto, CostoFijo FROM Formas_Pago";
            $querytp = $model->consultarBD($sql);
            //echo view('../Views/header.php');
            echo view('Usuarios/modulo_Cobro',array('creditos'=>$queryc, 'pulsera'=>$queryp, 'turno'=>$queryt, 'tipoPago'=>$querytp));
            echo view('../Views/piePagina');
        }else{
            echo "No hay turno abierto";
        }
    }

    /* **** CODIGO FUNCIONAL ACTUALIZADO ULTIMO 
    function validar_Tarjeta(){
        global $contenido;
        $model = new mcobro_model;
        //echo $this->registros->get('idEvento');//cree una sesion con los datos del registro, para obtener los datos mas facil

        $ide = $this->registros->get('idEvento');
        $idf = $this->registros->get('idFajilla');
        $idv = $this->registros->get('idAVentanilla');
        $idUs = $this->session->get('idUsuario');
        
        $folio = $_POST['folioTarjeta'];
        $resp = FALSE;
        $tarjet=0;
        $ini=0;
        $fin=0;
        $precioT=0;
        $status=15;

        //**************************** Obtener el id de la tarjeta por medio del folio que me esta ingresando *************************
        $sql = "SELECT t.idTarjeta, t.idStatus, e.PrecioTarjeta, e.Nombre 
                FROM Tarjetas t
                INNER JOIN Eventos e ON(e.idEvento = t.idEvento)
                WHERE t.Folio =".$folio." and t.idEvento = ".$ide;
        $queryc = $model->consultarBD($sql);
        $result = $queryc->getResultArray();
        if($result){
            foreach($queryc->getResultArray() as $t){
                $tarjet = $t['idTarjeta'];//saco el valor de id inicial
                $precioT = $t['PrecioTarjeta'];
                $status = $t['idStatus'];

                //**************************** Verifico de que idTarjeta a que idTarjeta me ingreso en el turno *************************
                $sql ="SELECT f.folioInicial, f.folioFinal, av.horaApertura, av.idVentanilla, av.idStatus 
                        FROM Fajillas f
                        INNER JOIN Apertura_Ventanilla av ON(f.idAperturaVentanilla=av.idAperturaVentanilla)
                        INNER JOIN Ventanilla v ON (av.idVentanilla = v.idVentanilla)
                        INNER JOIN Taquilla t ON(t.idTaquilla = v.idTaquilla)
                        INNER JOIN Zona z ON(z.idZona = t.idZona)
                        INNER JOIN Eventos e ON(e.idEvento = z.idEvento)
                        WHERE e.idEvento = ".$ide." and av.idVentanilla =".$idv." and f.idFajilla =".$idf." and av.idUsuario =".$idUs." and av.idStatus = 8";//turno activo
                $query2 = $model->consultarBD($sql);
                if($query2){
                    foreach($query2->getResultArray() as $id){
                        $ini = $id['folioInicial'];//saco el valor de id inicial
                        $fin = $id['folioFinal'];//saco el valor de id final
                    }
                }

                switch($status){
                    case '0':
                        //**************** Verifico si el id ingresado de la tarjeta existe en el evento ***************
                        $sql = "SELECT idTarjeta, idStatus, e.PrecioTarjeta 
                                FROM Tarjetas t
                                INNER JOIN Eventos e ON(t.idEvento = e.idEvento)
                                WHERE t.idStatus != '5' and t.idTarjeta = ".$tarjet." and e.idEvento =".$ide;
                        $query3 = $model->consultarBD($sql);
                        if($query3->getResultArray()){//si existe y la tarjeta esta comprada
                            $contenido .='<tr>
                                        <td>
                                            <div id="result">
                                                <input type="number" class="m-0 font-weight-bold text-primary" id="tarjeta" name="tarjeta" value="'.$folio.'" style="background : inherit; border:none; text-align:center;">
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <label  class=" m-0 font-weight-bold text-success">$</label> 
                                                <input type="number" class="monto m-0 font-weight-bold text-success" id="precioT" name="precioT" value="" style="background : inherit; border:none; text-align:center;">
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <input type="number" class="monto m-0 font-weight-bold text-warning" id="precarga" name="precarga" value="0" style="background : inherit; border:none; text-align:center;">
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <button type="button" class="btn btn-danger cancelar" value="'.$tarjet.'" tyle="background : inherit; border:none; text-align:center;">X</button>
                                            </div>
                                        </td>
                                    </tr>';  
                            $resp = TRUE;                          
                        }else{
                            $resp;//la pulsera no pertenece al evento
                        }
                    break;
                    case '1':
                        //**************** Verifico si el id ingresado de la tarjeta existe entre los rangos ingresados en el turno ***************
                        $sql = "SELECT idTarjeta, idStatus, e.PrecioTarjeta 
                            FROM Tarjetas t
                            INNER JOIN Eventos e ON(t.idEvento = e.idEvento)
                            WHERE t.idTarjeta BETWEEN ".$ini." and ".$fin." and t.idStatus != '5' and t.idTarjeta = ".$tarjet." and e.idEvento=".$ide;
                        $query3 = $model->consultarBD($sql);
                        if($query3->getResultArray()){//si existe
                            $contenido .='<tr>
                                        <td>
                                            <div id="result">
                                                <input type="number" class="m-0 font-weight-bold text-primary" id="tarjeta" name="tarjeta" value="'.$folio.'" style="background : inherit; border:none; text-align:center;">
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <label  class=" m-0 font-weight-bold text-success">$</label> 
                                                <input type="number" class="monto m-0 font-weight-bold text-success" id="precioT" name="precioT" value="'.$precioT.'" style="background : inherit; border:none; text-align:center;">
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <input type="number" class="monto m-0 font-weight-bold text-warning" id="precarga" name="precarga" value="0" style="background : inherit; border:none; text-align:center;">
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <button type="button" class="btn btn-danger cancelar" value="'.$tarjet.'" tyle="background : inherit; border:none; text-align:center;">X</button>
                                            </div>
                                        </td>
                                    </tr>';
                            $resp = true;
                        }else{
                            $resp;
                        }
                    break;
                    case '2':
                        //**************** Verifico si el id ingresado de la tarjeta existe en el evento ***************
                                $sql = "SELECT idTarjeta, idStatus, e.PrecioTarjeta 
                                FROM Tarjetas t
                                INNER JOIN Eventos e ON(t.idEvento = e.idEvento)
                                WHERE t.idStatus != '5' and t.idTarjeta = ".$tarjet." and e.idEvento =".$ide;
                        $query3 = $model->consultarBD($sql);
                        if($query3->getResultArray()){//si existe y la tarjeta esta comprada
                            $contenido .='<tr>
                                        <td>
                                            <div id="result">
                                                <input type="number" class="m-0 font-weight-bold text-primary" id="tarjeta" name="tarjeta" value="'.$folio.'" style="background : inherit; border:none; text-align:center;">
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <label  class=" m-0 font-weight-bold text-success">$</label> 
                                                <input type="number" class="monto m-0 font-weight-bold text-success" id="precioT" name="precioT" value="" style="background : inherit; border:none; text-align:center;">
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <input type="number" class="monto m-0 font-weight-bold text-warning" id="precarga" name="precarga" value="0" style="background : inherit; border:none; text-align:center;">
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <button type="button" class="btn btn-danger cancelar" value="'.$tarjet.'" tyle="background : inherit; border:none; text-align:center;">X</button>
                                            </div>
                                        </td>
                                    </tr>';  
                            $resp = TRUE;                          
                        }else{
                            $resp;//la pulsera no pertenece al evento
                        }
                    break;
                }
            }
        }else{
            $resp;
        }
        echo json_encode(array('msj'=>$resp, 'contenido'=>$contenido, 'estado'=>$status, 'tarjetaId'=>$tarjet, 'precio'=>$precioT));
    }*/


    function validar_Tarjeta(){
        global $contenido;
        $model = new mcobro_model;
        $pul = $_POST['pulseras'];
        $ide = $this->registros->get('idEvento');
        $precioTar =0;

        $sql ="SELECT * FROM Eventos WHERE idEvento =".$ide; 
        $queryc = $model->consultarBD($sql);
        $result = $queryc->getResultArray();
        if($result){
            foreach($result as $e){
                $precioTar += $e['PrecioTarjeta'];
            }
            $contenido .='<tr>
                            <td>
                                <div id="result">
                                    <input type="number" class="m-0 font-weight-bold text-primary" id="tarjeta" name="tarjeta" value="'.count($pul).'" style="background : inherit; border:none; text-align:center;">
                                </div>
                            </td>
                            <td>
                                <div>
                                    <label  class=" m-0 font-weight-bold text-success">$</label> 
                                    <input type="number" class="monto m-0 font-weight-bold text-success" id="precioT" name="precioT" value="'.$precioTar.'" style="background : inherit; border:none; text-align:center;">
                                </div>
                            </td>
                            <td>
                                <div>
                                    <input type="number" class="monto m-0 font-weight-bold text-warning" id="precarga" name="precarga" value="0" style="background : inherit; border:none; text-align:center;">
                                </div>
                            </td>
                            <td>
                                <div>
                                    <button type="button" class="btn btn-danger cancelar" value="" tyle="background : inherit; border:none; text-align:center;">X</button>
                                </div>
                            </td>
                        </tr>';  
                $resp = TRUE;
        }
        
        echo json_encode(array('respuesta'=>$resp,'contenido'=>$contenido));
    }

    function agregarRecarga(){
        global $contenido;
        $model = new mcobro_model;
        $ide = $this->registros->get('idEvento');
        $idf = $this->registros->get('idFajilla');
        $status ='';

        $data = json_decode($_POST['array'], true);
            
            foreach ($data as $key => $d){
                $sql = "SELECT t.idTarjeta, t.idStatus
                        FROM Tarjetas t
                        INNER JOIN Eventos e ON(e.idEvento = t.idEvento)
                        WHERE t.Folio =".$d['idtarjeta']." and t.idEvento = ".$ide." and t.idFajilla=".$idf;
                $queryc = $model->consultarBD($sql);
                $result = $queryc->getResultArray();
                if($result){
                    foreach($queryc->getResultArray() as $t){
                        $status = $t['idStatus'];
                    }
                }
                if($status == 0){//la tarjeta esta vendida
                    $contenido .='<tr>
                                    <td>
                                        <div id="result">
                                            <input type="number" class="m-0 font-weight-bold text-primary" id="tarjeta" name="tarjeta" value="'.$d['idtarjeta'].'" style="background : inherit; border:none; text-align:center;">
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <label  class=" m-0 font-weight-bold text-success">$</label>
                                        <input type="number" class="monto m-0 font-weight-bold text-success" id="precioT" name="precioT" value="0" style="background : inherit; border:none; text-align:center;">
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <input type="number" class="monto  m-0 font-weight-bold text-warning" id="precarga" name="precarga" value="'.$d['recarga'].'" style="background : inherit; border:none; text-align:center;">
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <button type="button" class="btn btn-danger cancelar" value="'.$d['idtarjeta'].'" tyle="background : inherit; border:none; text-align:center;">X</button>
                                    </div>
                                </td>
                            </tr>';
                }else if($status == 1){//la tarjeta es nueva
                    $contenido .='<tr>
                                    <td>
                                        <div id="result">
                                            <input type="number" class="m-0 font-weight-bold text-primary" id="tarjeta" name="tarjeta" value="'.$d['idtarjeta'].'" style="background : inherit; border:none; text-align:center;">
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <label  class=" m-0 font-weight-bold text-success">$</label>
                                        <input type="number" class="monto m-0 font-weight-bold text-success" id="precioT" name="precioT" value="'.$d['precio'].'" style="background : inherit; border:none; text-align:center;">
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <input type="number" class="monto  m-0 font-weight-bold text-warning" id="precarga" name="precarga" value="'.$d['recarga'].'" style="background : inherit; border:none; text-align:center;">
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <button type="button" class="btn btn-danger cancelar" value="'.$d['idtarjeta'].'" tyle="background : inherit; border:none; text-align:center;">X</button>
                                    </div>
                                </td>
                            </tr>';
                }
            }

            echo json_encode(array('respuesta'=>true,'contenido'=>$contenido));
    
    }

    public function guardar_Ventas(){
        $model = new mcobro_model;
        date_default_timezone_set('America/Mexico_City');

        $tarjetaId =0;
        $resp = FALSE;
        $idTar=0;
        $precio=0;
        $fecha = date("Y-m-d H:i:s");
        $idF = $this->registros->get('idFajilla');
        $idE = $this->registros->get('idEvento');
        $folio = $_POST['folioTarjet'];
        $indicess = json_decode($_POST['indices'], true);
        $total = $_POST['total'];
        $datosJson = json_decode($_POST['datArray'], true);
        /*foreach ($datosJson as $key => $d){
            echo var_dump($d['idtarjeta']);
        }*/

        for($i = 0 ; $i < count($indicess) ; $i++){
            switch($indicess[$i]){
                case '0';//tarjeta nueva
                    //recorremos el array $datosJson para obtener los datos ingresados en el array
                    foreach ($datosJson as $key => $d){
                        //obtenemos el id de la tarjeta con el folio ingresado en el array datosJson campo ['idtarjeta']
                        $sql ="SELECT idTarjeta FROM Tarjetas WHERE Folio =".$d['idtarjeta']." and idEvento =".$idE;
                        $queryy = $model->consultarBD($sql);
                        $result = $queryy->getResultArray();
                        if($result){//si se cumple la consulta, entonces:
                            foreach($result as $tarj){
                                $idTar = $tarj['idTarjeta'];//guardamos en una variable el id
                            }

                            //insertamos en la tabla transaccion los datos correspondientes
                            $sql ="INSERT INTO Transaccion (Total, Fecha, idFajilla) VALUES ($total,'$fecha', $idF)";
                            $query = $model->insertarAV($sql);//retorna el id registrado
                            if($query){//si se inserta, entonces:

                                /*if($d['recarga'] !=0 ){//si ingreso la recarga estando la tarjeta nueva
                                    $sql = "INSERT INTO Pago (Monto, idTarjeta, idTipoVenta, idTransaccion) 
                                        VALUES (".$d['precio'].", ".$idTar.",0 , $query), (".$d['recarga'].", ".$idTar.",1 , $query)";
                                    $queryP = $model->consultarBD($sql);
                                    if($queryP){
                                        $sql = "INSERT INTO Cobro (Monto, idFormasPago, idTransaccion) 
                                                VALUES(".$total.", 1 , $query)";
                                        $queryC = $model->consultarBD($sql);
                                        if($queryC){
                                            //actualizamos el status de la tarjeta en la tabla Tarjetas
                                            $sql = "UPDATE Tarjetas set idStatus = 0 WHERE idEvento = ".$idE." and idTarjeta =".$idTar;
                                            $queryU = $model->consultarBD($sql);
                                            if($queryU)
                                            $resp=TRUE;
                                        }
                                    }
                                }else{//solo se vendio la tarjeta*/
                                    //insertamos el la tabla de pago los datos correspondientes a la venta
                                    $sql = "INSERT INTO Pago (Monto, idTarjeta, idTipoVenta, idTransaccion) 
                                            VALUES(".$d['precio'].", ".$idTar.",0 , $query)";
                                    $queryP = $model->consultarBD($sql);
                                    if($queryP){
                                        $sql = "INSERT INTO Cobro (Monto, idFormasPago, idTransaccion) 
                                                VALUES(".$total.", 1 , $query)";
                                        $queryC = $model->consultarBD($sql);
                                        if($queryC){
                                            //actualizamos el status de la tarjeta en la tabla Tarjetas
                                            $sql = "UPDATE Tarjetas set idStatus = 0 WHERE idEvento = ".$idE." and idTarjeta =".$idTar;
                                            $queryU = $model->consultarBD($sql);
                                            if($queryU)
                                            $resp=TRUE;
                                        }
                                    }
                                //}
                            }
                        }
                    }
                break;
                case '1':
                    foreach($datosJson as $key => $d){
                        $sql ="SELECT idTarjeta FROM Tarjetas WHERE Folio =".$d['idtarjeta']." and idEvento =".$idE;
                        $queryy = $model->consultarBD($sql);
                        $result = $queryy->getResultArray();
                        if($result){//si se cumple la consulta, entonces:
                            foreach($result as $tarj){
                                $idTar = $tarj['idTarjeta'];//guardamos en una variable el id
                            }

                            //se vendio la tarjeta antes
                            $sql = "SELECT t.idTransaccion as transaccionID FROM Transaccion t
                                    INNER JOIN Pago p ON(t.idTransaccion = p.idTransaccion) WHERE idTarjeta = ".$idTar." and idFajilla = ".$idF." and idTipoVenta = 0";
                            $queryT = $model->consultarBD($sql);
                            $results = $queryT->getResultArray();
                            if($results){
                                foreach($results as $r){
                                    $idTran = $r['transaccionID'];//guardamos en una variable el id
                                }

                                $sql = "INSERT INTO Pago (Monto, idTarjeta, idTipoVenta, idTransaccion) 
                                        VALUES(".$d['recarga'].", ".$idTar.", 1 , $idTran)";
                                $queryP = $model->consultarBD($sql);
                                if($queryP){
                                    $sql = "INSERT INTO Cobro (Monto, idFormasPago, idTransaccion) 
                                            VALUES(".$total.", 1 , $idTran)";
                                    $queryC = $model->consultarBD($sql);
                                    if($queryC){
                                        $resp = true;
                                    }
                                }

                            }else{
                                $sql ="INSERT INTO Transaccion (Total, Fecha, idFajilla) VALUES ($total,'$fecha', $idF)";
                                $query = $model->insertarAV($sql);//retorna el id registrado
                                if($query){
                                    $sql = "INSERT INTO Pago (Monto, idTarjeta, idTipoVenta, idTransaccion) 
                                            VALUES(".$d['recarga'].", ".$idTar.", 1 , $query)";
                                    $queryP = $model->consultarBD($sql);
                                    if($queryP){

                                        $sql = "SELECT t.idTransaccion as transaccionID FROM Transaccion t
                                                INNER JOIN Pago p ON(t.idTransaccion = p.idTransaccion) WHERE idTarjeta = ".$idTar." and idFajilla = ".$idF." and idTipoVenta = 0";
                                        $queryT = $model->consultarBD($sql);
                                        $results = $queryT->getResultArray();
                                        if($results){
                                            foreach($results as $r){
                                                $idTran = $r['transaccionID'];//guardamos en una variable el id
                                            }
                                        }

                                        $sql = "INSERT INTO Cobro (Monto, idFormasPago, idTransaccion) 
                                                VALUES(".$total.", 1 , $query)";
                                        $queryC = $model->consultarBD($sql);
                                        if($queryC){
                                            $resp = true;
                                        }
                                    }
                                }else{
                                    $resp;
                                }
                            }
                        }
                    }
                break;
            }
        }

        


        /*
        for($i = 0 ; $i < count($indicess) ; $i++){
            //echo var_dump("Si entro a for".$indicess[$i]);
            switch($indicess[$i]){
                case '0';//tarjeta nueva
                //echo var_dump("Estoy en caso 0");
                        //$sql ="INSERT INTO Transaccion (Total, Fecha, idFajilla) VALUES ($total,'$fecha', $idF)";
                        //$query = $model->insertarAV($sql);//retorna el id registrado
                        //if($query){
                            $sql ="SELECT idTarjeta FROM Tarjetas WHERE Folio =".$folio." and idEvento =".$idE;
                            $query = $model->consultarBD($sql);
                            if($query){
                                //echo "Si entro a query";
                                foreach($query->getResultArray() as $t){
                                    //echo "Si entro fore 1";
                                    $idTar = $t['idtarjeta'];
                                    $precio = $t['precio'];
                                }

                                

                                foreach ($datosJson as $d){
                                    echo var_dump("Si entro fore 2");
                                    echo var_dump($d['idtarjeta'] ." / ". $idTar);
                                    if($d['idtarjeta'] == $idTar){

                                        $sql = "INSERT INTO Pago (Monto, idTarjeta, idTipoVenta, idTransaccion) 
                                                VALUES(".$precio.", (SELECT idTarjeta FROM Tarjetas WHERE Folio=".$folio." and idEvento =".$idE."),0 , $query)";
                                        $queryP = $model->consultarBD($sql);
                                        if($queryP){
                                            $sql = "UPDATE Tarjetas set idStatus = 0 WHERE idEvento = ".$idE." and idTarjeta = (SELECT idTarjeta FROM Tarjetas WHERE Folio=".$folio." and idEvento =".$idE.")";
                                            $queryP = $model->consultarBD($sql);
                                            if($queryP)
                                            $resp=TRUE;
                                        }
                                    }
                                }
                            }
                        //}else{
                          //  $resp;
                        //}
                break;
                case '1';//recarga
                        $sql ="INSERT INTO Transaccion (Total, Fecha, idFajilla) VALUES ($total,'$fecha', $idF)";
                        $query = $model->insertarAV($sql);//retorna el id registrado

                        if($query){
                            $sql ="SELECT idTarjeta FROM Tarjetas WHERE Folio =".$folio." and idEvento =".$idE;
                            $query = $model->consultarBD($sql);
                            if($query->getResultArray()){
                                foreach ($dataa as $key => $d){
                                    if($d['idtarjeta'] == $query['idTarjeta']){
                                        $sql = "INSERT INTO Pago (Monto, idTarjeta, idTipoVenta, idTransaccion) 
                                                VALUES(".$d['recarga'].", (SELECT idTarjeta FROM Tarjetas WHERE Folio=".$folio." and idEvento =".$idE."), 1 , $query)";
                                        $queryP = $model->consultarBD($sql);
                                        if($queryP){
                                            $resp = true;
                                        }
                                    }
                                }
                            }
                        }else{
                            $resp;
                        }
                break;
                case '2';//pulsera Magica
                        $sql ="INSERT INTO Transaccion (Total, Fecha, idFajilla) VALUES ($total,'$fecha', $idF)";
                        $query = $model->insertarAV($sql);//retorna el id registrado

                        if($query){
                            $sql ="SELECT idTarjeta FROM Tarjetas WHERE Folio =".$folio." and idEvento =".$idE;
                            $query = $model->consultarBD($sql);
                            if($query->getResultArray()){
                                foreach ($dataa as $key => $d){
                                    if($d['idtarjeta'] == $query['idTarjeta']){
                                        $sql ="SELECT * FROM Calendario_Pulsera_Magica WHERE idPulseraMagica = ".$d['promoPP']." and idEvento =".$idE;
                                        $queryP = $model->consultarBD($sql);
                                        if($queryP->getResultArray()){
                                            $sql = "INSERT INTO Pago (Monto, idTarjeta, idTipoVenta, idTransaccion) 
                                                VALUES(".$queryP['Precio'].", (SELECT idTarjeta FROM Tarjetas WHERE Folio=".$folio." and idEvento =".$idE."), 2 , $query)";
                                            $queryP = $model->consultarBD($sql);
                                            if($queryP){
                                                $resp = true;
                                            }
                                        }else{
                                            $resp;
                                        }
                                    }
                                }
                            }
                        }else{
                            $resp;
                        }
                break;
            };
        }*/

        echo json_encode(array('respuesta'=>true,'msj'=>$resp));






        /* $evento = $_POST['evento'];
        $idventanilla = $_POST['idventani'];//este es el id de la ventanilla
        $promociones = $_POST['arregloP'];
        $promocionesPrecio = $_POST['arregloPrecioP'];
        $promocionesC = $_POST['arregloC'];
        $promocionesPrecioC = $_POST['arregloPrecioC'];
        $idtarjeta = $_POST['idTarjeta'];
        $usuario = $_POST['idUsuario'];
		$tarjeta = $_POST['tarjetaAdd'];//tengo duda si esta iria
        $recarga = $_POST['recargaAdd'];
        $totalPago = $_POST['total'];
        $indices = $_POST['indice'];*/

        /********************************* Guardamos la transaccion *******************************************/
       /* $sql ="INSERT INTO Transaccion (Total, Fecha, idFajilla) VALUES($total,'$fecha', $idF)";
        $query = $model->insertarAV($sql);//retorna el id registrado
 
        $sql = "INSERT INTO Pago (Monto, idTarjeta, idTipoVenta, idTransaccion) 
                VALUES($total, (SELECT idTarjeta FROM Tarjetas WHERE Folio=".$FolioTarjeta." and idEvento =".$idE."), 1, $query)";
        $queryP = $model->consultarBD($sql);
        if($queryP){
            $sql = "UPDATE Tarjetas set idStatus = 0 WHERE idEvento = ".$idE." and idTarjeta = (SELECT idTarjeta FROM Tarjetas WHERE Folio=".$FolioTarjeta." and idEvento =".$idE.")";
            $queryP = $model->consultarBD($sql);
            if($queryP)
            $resp=TRUE;
        }
        echo json_encode(array('respuesta'=>true,'msj'=>$resp));*/
    }


    //esta es la linea original
    public function guardar_Ventas2(){
        $model = new mcobro_model;

        $select = $_POST['select'];
        $mtarjeta = $_POST['mtarjeta'];
        $dtarjeta = $_POST['dtarjeta'];
        $naprov = $_POST['naprov'];

        $tipoP = $_POST['tipo'];

        $fecha = $_POST['fecha'];
        $evento = $_POST['evento'];
        $v = $_POST["ventanillaa"];//este es el idaperturaventanilla
        $idventanilla = $_POST['idventani'];//este es el id de la ventanilla
        //$promociones = $_POST['arregloP'];
        //$promocionesPrecio = $_POST['arregloPrecioP'];
        //$promocionesC = $_POST['arregloC'];
        $promocionesPrecioC = json_decode($_POST['arregloPrecioC']);
        $idtarjeta = $_POST['idTarjeta'];
        $usuario = $_POST['idUsuario'];
        $precioTa = $_POST['precioTa'];
		$tarjeta = $_POST['tarjetaAdd'];//tengo duda si esta iria
        $recarga = $_POST['recargaAdd'];
        $totalPago = $_POST['total'];
        $indices = $_POST['indice'];

        //echo var_dump($promocionesPrecio);
        $prueba = json_decode($_POST['arregloPrecioP']);
        //echo var_dump($prueba);
        //$contar = count($prueba);
        //echo var_dump($contar);

        //este es el que voy a usar
        /*foreach($prueba as $fila) {
            echo 'yo soy promo'.$fila->promo;
            echo ' yo soy precio'.$fila->precio;
        }*/

        $indicar = explode(",", $indices);
        $primer =0;
        $array =[];
        
        $primero = reset($indicar);
        array_push($array,$primero);

        for ($i = 1; $i < count($indicar) ; $i++){ 
            if($indicar[$i] != $indicar[$i-1]){
                //array_push($array,$indicar[$i]);
                if(in_array($indicar[$i], $array)){
                    
                }else{
                    array_push($array,$indicar[$i]);
                }
            }
         }
        
        $idss = implode(",", $array);

        $ids = explode(",", $idss);

        //$gtran = $model->guardarTransaccion($totalPago,$fecha,$idventanilla);
        $gtran = $model->guardarTransaccion($totalPago,$fecha,$v);
        $idCob = $model->tipoVenta($totalPago, $gtran, $tipoP);


        /******************************* Arreglos de Promociones Pulsera Magica ******************/
        //$promo = explode(",", $promocionesPrecio);
        //$idPromo = explode(",", $promociones);

        /******************************* Arreglos de Creditos Cortesia ******************/
        //$promoC = explode(",", $promocionesPrecioC);
        //$idPromoC = explode(",", $promocionesC);

        //for($i = 0 ; $i < $ids ; $i++){
        foreach ($ids as $data) {
            //echo var_dump($data);
            //poner if que evalue el tipo de cobro(tarjeta/efectivo)
            //switch($ids[$i]){
            switch($data){
                case 0;
                //echo "estoy en caso 0";
                    $data = $model->agregarTarjeta($idtarjeta, $gtran, $precioTa);
                    break;
                
                case '1';
                    
                    break;
                
                case '2';
                   $data = $model->agregarRecarga($idtarjeta, $recarga, $gtran, $precioTa, $evento);
                    break;

                    if(($tipoP == 2) || ($tipoP == 3)){
                        $transaccion = $model->guardarTransaccionVouch($idCob, $select, $mtarjeta, $dtarjeta, $naprov, $tipoP);
                    }
                break;
                
                case 1;
                //echo "estoy en caso 1";
                    if(($tipoP == 2) || ($tipoP == 3)){
                        $transaccion = $model->guardarTransaccionVouch($idCob, $select, $mtarjeta, $dtarjeta, $naprov, $tipoP);
                    }
                break;
                
                case 2;  
                //echo "estoy en caso 2";                  
                    $data = $model->agregarRecarga($idtarjeta, $recarga, $gtran, $precioTa, $evento);
                 break;

                case 3;
                //echo "estoy en caso 3";
                    $data = $model->agregarPpulsera($idtarjeta, $gtran, $prueba);

                    /*$data2 = $model->agregarPromocionesP($idtarjeta, $gtran, $promo);
                    $arrayp = implode(",", $data2);
                    $idpay = explode(",", $arrayp);
                    $data = $model->agregarPromoV($idpay,$idPromo, $gtran);*/
                break;
                
                case 4;
                //echo "estoy en caso 4";
                   // $data = $model->agregarPromocionesC($idtarjeta, $gtran, $promoC, $idPromoC, $evento);
                   $data = $model->agregarPromoCreditos($idtarjeta, $gtran, $evento, $promocionesPrecioC);
                break;
                default:
                    echo "No se declaro";
            }
        }
        
        echo json_encode(array('respuesta'=>true,'msj'=>$data, 'valor'=>$gtran));
	}

    public function tipo_Pago(){
        $model = new mcobro_model;
        $tipo = $_POST['tipo'];
        $data = $model->tipoPagos($tipo);
        echo json_encode(array('respuesta'=>true,'msj'=>$data));
    }

    /*public function fetch(){
        $model = new mcobro_model;
        $data = $model->promoPulsera();
        echo json_encode(array('respuesta'=>true,'msj'=>$data));
    }*/

    public function resultados(){
        date_default_timezone_set('America/Mexico_City');
        $fecha = date("Y-m-d H:i:s");
        $model = new mcobro_model;
        $idPromo = $_POST['promocion'];
        $data = $model->promoMostrar($idPromo, $fecha);
        echo json_encode(array('respuesta'=>true,'msj'=>$data));
    }

    

    public function creditos_Cortesia(){
        date_default_timezone_set('America/Mexico_City');
        $fecha = date("Y-m-d H:i:s");
        $model = new mcobro_model;
        $creditos = $_POST['promoCreditos'];
        $data = $model->PromoCreditos($creditos, $fecha);
        echo json_encode(array('respuesta'=>true,'msj'=>$data));
    }

    public function agregarFajillas(){
        $model = new mcobro_model;
        $folioI = $_POST['folioI'];
        $folioF = $_POST['folioF'];
        $e = $_POST['e'];
        $v = $_POST['v'];
        $idv = $_POST['idv'];
        $fecha = $_POST['fechas'];
        $data = $model->agregarF($e, $v, $idv, $folioI, $folioF, $fecha);
        echo json_encode(array('respuesta'=>true,'msj'=>$data));
    }

    public function devolucion(){
        $model = new mcobro_model;
        $tarjetaDev = $_POST['tarjetD'];
        $descripcion = $_POST['descripcion'];
        $idAp = $_POST['idv'];
        $data = $model->devolucionTarjeta($tarjetaDev, $descripcion, $idAp);
        echo json_encode(array('respuesta'=>true,'msj'=>$data));
    }
    
}