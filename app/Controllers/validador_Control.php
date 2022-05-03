<?php namespace App\Controllers;
use App\Models\Validador_Model;

class validador_Control extends BaseController {

    protected $model;
    protected $request;

    public function _construct(){
        $this->request = \Config\Services::request();
    }

    public function listado_Atracciones(){
        $model = new Validador_Model();

        $datos = [
            'idZona' => $this->request->getVar('idZona')
        ];

        $respuesta  = $model->listado_Atracciones($datos);

        echo json_encode(array("respuesta"=>true,"msj"=>$respuesta));
    }

    public function iniciar_Turno(){
        $model = new Validador_Model();

        date_default_timezone_set('America/Mexico_City');
        $fecha = date("Y-m-d H:i:s");

        $datos = [
            'horaApertura' => $fecha,
            'idAtraccionEvento' => $this->request->getVar('idAtraccionEvento'),
            'idUsuario' => $this->request->getVar('idUsuario')
        ];

        $validacion = $model->insertar_Atraccion($datos);

        if($validacion != false){
            echo json_encode(array('respuesta'=> true,'msj'=>$validacion));
        }
        else{
            echo json_encode(array('respuesta'=> false,'msj'=>'No se encuentra disponible la atraccion, favor de contactar al supervisor.'));
        }

    }

    public function Cerrar_Sesion(){
        $model = new Validador_Model();
        
        date_default_timezone_set('America/Mexico_City');
        $fecha = date("Y-m-d H:i:s");

        $idAtraccionEvento = $_POST['idAtraccionEvento'];

        $datos = [
            'Hora' => $fecha,
            'idAperturaValidador' => $this->request->getVar('idAperturaValidador')
        ];

        $respuesta = $model->Cerrar_Sesion($datos,$idAtraccionEvento);

        if($respuesta !=false){
            echo json_encode(array('respuesta'=>true,'msj'=>'Funciono'));
        }
        else{
            echo json_encode(array('respuesta'=>false,'msj'=>'No se logro cerrar sesion, favor de comunicarse con el supervisor.'));
        }
    }



    public function new (){
        $model = new Validador_Model();

        
        $dato = $_GET['dato'];
          
        $datos  =[
            'informacion' => $model->informacion_Turno($dato)
        ];

        
        
        /*
        echo view('../Views/header.php');
        echo view('Usuarios/menu_user');
        echo view('Usuarios/validador');
        echo view('../Views/piePagina.php');
        */
        
        
        echo View('../Views/header');
        echo View('Usuarios/menu_user');
        echo View('Usuarios/validador',$datos);
        echo View('../Views/piePagina');
        
        
        /*
        echo ('<pre>');
        var_dump($datos);
        echo('</pre>');

        echo('<pre>');
        //echo $datos->Creditos;
        echo $datos[0]->informacion[0]->Creditos[0];
        echo('</pre>');
        */
    }

}