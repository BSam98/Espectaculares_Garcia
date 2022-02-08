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

    public function cargarDatos(){
        /*
        $db = \Config\Database::connect();
        $builder = $db->table('Atracciones');
        //AS cambia el nombre del campo con el cual se mostrara y asi no se pierdan los datos cuando dos campos
        //Tienen el mismo nombre
        $builder-> select('Atracciones.Nombre AS Atraccion, Atracciones.Area,Atracciones.CapacidadMAX,Atracciones.Tiempo,Atracciones.TiempoMAX,Atracciones.Renta,Atracciones.CapacidadMIN,Propietario.Nombre,Propietario.ApellidoP');
        $builder-> join('Propietario','Propietario.idPropietario = Atracciones.idPropietario','inner');
        $query = $builder->get();
        echo json_encode($query->getResult());
        */
        //echo $data['Atracciones'] = $this->model->listadoAtracciones();
    }

    public function create(){
        return "";
    }
}