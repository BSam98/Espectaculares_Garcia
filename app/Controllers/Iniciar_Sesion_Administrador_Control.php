<?php namespace App\Controllers;

use CodeIgniter\HTTP\Request;
use App\Models\Iniciar_Sesion_Administrador_Model;
//use App\Models\Atracciones_Model;


class Iniciar_Sesion_Administrador_Control extends BaseController {

    public function  _construct(){
        $this->request = \Config\Services::request();
        //$this->model = new Iniciar_Sesion_Administrador_Model();
    }
    
    public function getBusqueda(){
        $session = \Config\Services::session();
        $session = session();
        $model = new Iniciar_Sesion_Administrador_Model();

		$username = $this->request->getPost('usuario');
		$password = (binary) ($this->request->getPost('pass'));

        //echo $username;
        //echo $password;
        $datos = $model->where([
                                'Usuario' => $username,
                                'Contraseña' => $password
                                ])->findAll();
        json_encode($datos);
        
        if(empty($datos)){
            echo "<script>alert('Usuario o Contraseña Incorrecta'); window.location= 'SesionAdmin'</script>"; 
           // return redirect()->to(base_url('SesionAdmin'));
        } else{
            session()->set('Usuario', $username);
            //echo 'Datos correctos';

        return redirect()->to(base_url('Menu_Principal_Administrador'));
        }
	}

    /*public function demo4()
		{
			$productModel = new ProductModel();
			$data['products'] = $productModel->where('status', 1)->orderBy('price', 'desc')->select('id, name, price')->findAll(3);
			return view('demo/index', $data);
		}
*/

    public function logout(){
        $session = \Config\Services::session();
        $session->destroy();
		//session()->remove('username');
		return $this->response->redirect(site_url(''));
	}


   /* public function new (){
        return view ('Administrador/Iniciar_Sesion_Administrador/Iniciar_Sesion_Administrador_View');
    }


    public function create(){
        return "";
    }*/
}