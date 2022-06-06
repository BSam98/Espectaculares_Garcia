<?php namespace App\Controllers;

use App\Models\Atracciones_Model;
use App\Models\Iniciar_Sesion_Administrador_Model;

class Atracciones_Control extends BaseController {

    protected $model;
    protected $request;


    public function _construct(){
       // $this->model = new Atracciones_Model();
        $this->request = \Config\Services::request();
    }

    public function new(){
        session_start([
            'use_only_cookies' => 1,
            'cookie_lifetime' => 0,
            'cookie_secure' => 1,
            'cookie_httponly' => 1
        ]);
        $model = new Atracciones_Model();
        $model2 = new Iniciar_Sesion_Administrador_Model();
        $rango = $_GET['idT'];
        $datos =[
            'Atraccion' => $model->listadoAtracciones(),
            'Propietario' => $model->listadoPropietartios(),
            'Privilegios' => $model2->consultarPrivilegiosR($rango),
        ];

        echo view('../Views/header',$datos);
        //echo view('../Views/menu');
        //echo view('Administrador/Menu_Principal_View');
        echo view ('Administrador/Atracciones/Atracciones_View', $datos);
        echo view('../Views/piePagina');
    }

    public function mostrar_Propietarios(){
        $model = new Atracciones_Model();

        echo json_encode(array('respuesta'=>true,'msj'=>$model->listadoPropietartios()));
    }

    public function insertarAtraccion (){
        
        $model = new Atracciones_Model();

        $nombre = $_POST['na'];
        $capacidadMax = $_POST['cma'];
        $tiempo = $_POST['tim'];
        $tiempoMax = $_POST['tma'];
        $renta = $_POST['ren'];
        $idPropietario =$_POST['pro'];
        $capacidadMin = $_POST['cmi'];
        $ancho = $_POST['ancho'];
        $largo = $_POST['largo'];

        $num_elementos = 0;
        $cantidad = count($nombre);

        if(1 == $cantidad){
            $datos=[
                'Nombre' => $nombre[$num_elementos],
                'CapacidadMAX' => $capacidadMax[$num_elementos],
                'Tiempo' => $tiempo[$num_elementos],
                'TiempoMAX' => $tiempoMax[$num_elementos],
                'Renta' => $renta[$num_elementos],
                'idPropietario' => $idPropietario[$num_elementos],
                'CapacidadMIN' => $capacidadMin[$num_elementos],
                'Largo' => $largo[$num_elementos],
                'Ancho' => $ancho[$num_elementos]
            ];

            $respuesta = $model->insertarAtraccion($datos);
        }else{
            while($num_elementos<$cantidad){
                $datos=[
                    'Nombre' => $nombre[$num_elementos],
                    'CapacidadMAX' => $capacidadMax[$num_elementos],
                    'Tiempo' => $tiempo[$num_elementos],
                    'TiempoMAX' => $tiempoMax[$num_elementos],
                    'Renta' => $renta[$num_elementos],
                    'idPropietario' => $idPropietario[$num_elementos],
                    'CapacidadMIN' => $capacidadMin[$num_elementos],
                    'Largo' => $largo[$num_elementos],
                    'Ancho' => $ancho[$num_elementos]
                ];

                $respuesta = $model->insertarAtraccion($datos);
                $num_elementos = $num_elementos + 1;
            }
        }
        
        /*
        $respuesta = $model->insertarAtraccion($datos);
        return redirect()->to(base_url('Atracciones'));
        */
        echo json_encode(array('respuesta'=>true,'msj'=>$respuesta));
      
    }

    public function insertarPropietario(){
        $model = new Atracciones_Model();

        $Nombre = $_POST['na'];
        $ApellidoP = $_POST['app'];
        $ApellidoM = $_POST['apm'];
        $Direccion = $_POST['dir'];
        $Telefono = $_POST['tel'];
        $RFC = $_POST['rfc'];
        $FechaN = $_POST['dat'];

        $num_elementos = 0;
        $cantidad = count($Nombre);

        if(1==$cantidad){
            $datos=[
                'Nombre'=> $Nombre[$num_elementos],
                'ApellidoP'=> $ApellidoP[$num_elementos],
                'ApellidoM'=> $ApellidoM[$num_elementos],
                'Direccion'=> $Direccion[$num_elementos],
                'Telefono'=> $Telefono[$num_elementos],
                'FechaNacimiento'=> $FechaN[$num_elementos],
                'RFC'=> $RFC[$num_elementos],
            
            ];
            
            $respuesta = $model->insertarPropietario($datos);
            
        }
        else{
            while($num_elementos<$cantidad){

                $datos=[
                    'Nombre'=> $Nombre[$num_elementos],
                    'ApellidoP'=> $ApellidoP[$num_elementos],
                    'ApellidoM'=> $ApellidoM[$num_elementos],
                    'Direccion'=> $Direccion[$num_elementos],
                    'Telefono'=> $Telefono[$num_elementos],
                    'FechaNacimiento'=> $FechaN[$num_elementos],
                    'RFC'=> $RFC[$num_elementos],
                
                ];
                
                $respuesta = $model->insertarPropietario($datos);
                
                $num_elementos = $num_elementos +1;
            }
        }
    
        echo json_encode(array('respuesta'=>true,'msj'=>'asdasdasd'));
    }


    public function actualizarAtraccion(){
        $model = new Atracciones_Model();

        $idAtraccion = $_POST['idAtraccion'];
        //$idAtraccion = $_GET['idAtraccion'];
        $datos=[
            'Nombre' => $this->request->getVar('Atraccion'),
            'CapacidadMAX' => $this->request->getVar('CapacidadMAX'),
            'Tiempo' => $this->request->getVar('Tiempo'),
            'TiempoMAX' => $this->request->getVar('TiempoMAX'),
            'Renta' => $this->request->getVar('Renta'),
            'idPropietario' => $this->request->getVar('Nombre'),
            'CapacidadMIN' => $this->request->getVar('CapacidadMIN'),
        ];
        $respuesta = $model->actualizarAtraccion($idAtraccion,$datos);
        echo json_encode(array('respuesta'=>true,'msj'=>$respuesta));
    }

    public function actualizarPropietario(){
        $model = new Atracciones_Model();

        $idPropietario = $_POST['idPropietario'];
        $datos=[
            'Nombre' => $this->request->getVar('Nombre'),
            'ApellidoP' => $this->request->getVar('ApellidoP'),
            'ApellidoM' => $this->request->getVar('ApellidoM'),
            'Direccion' => $this->request->getVar('Direccion'),
            'Telefono' => $this->request->getVar('Telefono'),
            'FechaNacimiento' => $this->request->getVar('FechaNacimiento'),
            'RFC' => $this->request->getVar('RFC'),
        ];
        $respuesta = $model->actualizarPropietario($idPropietario,$datos);
        echo json_encode(array('respuesta'=>true,'msj'=>'asdasdasd'));
    }

    public function create(){
        return "";
    }

}