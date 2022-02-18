<?php namespace App\Controllers;

use App\Models\Contratos_Model;

class Contratos_Control extends BaseController {

    protected $model;
    protected $request;

    public function _construct(){
       // $this->request = \Config\Services::request();
        $this->load->model('Contratos_Model');
    }

    public function new (){
        $model = new Contratos_Model();
        echo view('../Views/header');
        echo view('../Views/menu');
        echo view ('Contratos/Contratos_View');
        echo view('../Views/piePagina');
    }

    public function create(){
        return "";  
    }

}