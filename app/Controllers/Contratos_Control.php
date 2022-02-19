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

    public function guardar_archivo(){
        
        $mi_archivo = 'upload';
        $config['upload_path']='../upload/';
        $config['allowed_types']='png';
        $config['max_size']='5000';
        $config['max_width']='2000';
        $config['max_height']='2000';

        $this->load->library('upload');

        if(!$this->upload->do_upload($mi_archivo)){
            echo $this->upload->display_errors();
            return;
        }

        var_dump($this->upload->data());

    }
}