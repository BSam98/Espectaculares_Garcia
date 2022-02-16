<?php namespace App\Controllers;

use App\Models\Atracciones_Model;

class Atracciones_Control extends BaseController {

    protected $model;
    protected $request;


    public function _construct(){
       // $this->model = new Atracciones_Model();
        $this->request = \Config\Services::request();
    }

    public function index(){
        $model = new Atracciones_Model();

        //$datos["Atraccion"] = $model->listadoAtracciones();
        $datos =[
            'Atraccion' => $model->listadoAtracciones(),
            'Propietario' => $model->listadoPropietartios()
        ];

        return view ('Atracciones/Atracciones_View', $datos);
    }
    public function new (){
        $model = new Atracciones_Model();

        //$datos["Atraccion"] = $model->listadoAtracciones();
        $datos =[
            'Atraccion' => $model->listadoAtracciones(),
            'Propietario' => $model->listadoPropietartios()
        ];

        return view ('Atracciones/Atracciones_View', $datos);
    }

    public function insertarAtraccion (){
        
        $model = new Atracciones_Model();
        $datos=[
            'Nombre' => $this->request->getVar('na'),
            'CapacidadMAX' => $this->request->getVar('cma'),
            'Tiempo' => $this->request->getVar('tim'),
            'TiempoMAX' => $this->request->getVar('tma'),
            'Renta' => $this->request->getVar('ren'),
            'idPropietario' => $this->request->getVar('pro'),
            'CapacidadMIN' => $this->request->getVar('cmi'),
        ];
        
        /*
        $respuesta = $model->insertarAtraccion($datos);
        return redirect()->to(base_url('Atracciones'));
        */
        $respuesta = $model->insertarAtraccion($datos);
        echo json_encode(array('respuesta'=>true,'msj'=>'asdasdasd'));
      
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
            while($num_elementos<=$cantidad){

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
        echo json_encode(array('respuesta'=>true,'msj'=>'actualizar modelo'));
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
     /*public function menu(){
        return view ('menu').view('Atracciones/Atracciones_View');
    }*/
}