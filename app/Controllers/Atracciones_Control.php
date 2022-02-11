<?php namespace App\Controllers;

use App\Models\Atracciones_Model;

class Atracciones_Control extends BaseController {

    protected $model;
    protected $request;

    public function _construct(){
       // $this->model = new Atracciones_Model();
        $this->request = \Config\Services::request();
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
    
        
        $Nombre = $_POST['na'];
        $Area = $_POST['are'];
        $CapacidadMAX= $_POST['cma'];
        $Tiempo = $_POST['tim'];
        $TiempoMAX = $_POST['tma'];
        $Renta = $_POST['ren'];
        $idPropietario = $_POST['pro'];
        $CapacidadMIN = $_POST['cmi'];
        
        $num_elementos = 0;

        
        while($num_elementos<count($Nombre)){

            $datos=[
                'Nombre' => $Nombre[$num_elementos],
                'Area' => $Area[$num_elementos],
                'CapacidadMAX'=>$CapacidadMAX[$num_elementos],
                'Tiempo' => $Tiempo[$num_elementos],
                'TiempoMAX' => $TiempoMAX[$num_elementos],
                'Renta' => $Renta[$num_elementos],
                'idPropietario' => $idPropietario[$num_elementos],
                'CapacidadMIN' => $CapacidadMIN[$num_elementos],
            ];
            
            $respuesta = $model->insertarAtraccion($datos);
            
            $num_elementos = $num_elementos +1;
        }
        
        
        return redirect()->to(base_url('Atracciones'));
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

        
        while($num_elementos<count($Nombre)){

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

        return redirect()->to(base_url('Atracciones'));
    }

    public function actualizarAtraccion(){
        $model = new Atracciones_Model();

        $idAtraccion = $_POST['idAtraccion'];
        $datos=[
            'Nombre' => $this->request->getVar('Atraccion'),
            'Area' => $this->request->getVar('Area'),
            'CapacidadMAX' => $this->request->getVar('CapacidadMAX'),
            'Tiempo' => $this->request->getVar('Tiempo'),
            'TiempoMAX' => $this->request->getVar('TiempoMAX'),
            'Renta' => $this->request->getVar('Renta'),
            'idPropietario' => $this->request->getVar('propi'),
            'CapacidadMIN' => $this->request->getVar('CapacidadMIN'),
        ];
        //echo json_encode($datos);
        //echo $idAtraccion;
        $respuesta = $model->actualizarAtraccion($idAtraccion,$datos);
        return redirect()->to(base_url('Atracciones'));
    }

    public function create(){
        return "";
    }
}