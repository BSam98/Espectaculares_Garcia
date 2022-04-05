<?php namespace App\Controllers;

use CodeIgniter\HTTP\Request;
use App\Models\Iniciar_Sesion_Administrador_Model;
use LengthException;
use Mpdf\Tag\Legend;

//use App\Models\Atracciones_Model;


class Iniciar_Sesion_Administrador_Control extends BaseController {

    public function  _construct(){
        $this->request = \Config\Services::request();
        $this->load->model('Iniciar_Sesion_Administrador_Model');
        //$this->model = new Iniciar_Sesion_Administrador_Model();
    }
    
    public function login(){
        
    }

    public function getBusqueda(){


        $model = new Iniciar_Sesion_Administrador_Model();

        $username = $this->request->getVar('usuario');
        $password = $this->request->getVar('pass');

        $datosUsuario = $model->Where('Usuario',$username)->Where('Contraseña',$password)->first();

        if($datosUsuario){
            unset($datosUsuario['Contraseña']);
            //var_dump($datosUsuario);
            $session = session(); 
            $session->set($datosUsuario); 
            return $this->_redirectAuth();
            //var_dump($datosUsuario);

            //if($session->Contraseña == $password){// la comparacion tiene que ser con el pass cifrado y la funcion verifyPassword
                //unset($datosUsuario['Contraseña']) para quitar el campo pass del arreglo
              //  echo "<script>alert('Estoy adentro del if:".$session->Contraseña."'); window.location= 'SesionAdmin'</script>"; 
            //}

        }else{
            echo "<script>alert('Usuario Incorrecto'); window.location= 'SesionAdmin'</script>";
        }
    }

    public function new (){
        /*if (!session()->get('isLoggedIn')){
            return redirect()->to('/SesionAdmin');
        }*/
        $model = new Iniciar_Sesion_Administrador_Model();
        $session = session(); 
        $rango = $session->idRango;
        //echo $rango;
        $datos = [
            'Privilegios' => $model->seleccionarPriv($rango),
            'Modulos' => $model->modulos(),
        ];
        /*foreach($datos['Privilegios'] as $p):
            $id = $p->privilegio_Modulo;
            $data = [
                'Modulos' => $model->modulos($id),
            ];
        endforeach;*/
        
        $priv = array();

        echo'
        <div Class = "contenedorSuperior">
        <div class="container">
            <nav class="navbar navbar-fixed-top tm_navbar negro" role="navigation">
                <a class="logo" href="Menu_Principal_Administrador"><img src = "Img/logo.png"/></a>
                <ul class="nav navbar-nav sf-menu">
                    <!--li class="active"><a href="#">Home</a></li-->
                    <!--Menu Catalago-->';

        foreach($datos['Privilegios'] as $p):
            $id = $p->privilegio_Modulo;
            $data = [
                'Modulos' => $model->modulos($id),
            ];
    
            if($id==1){
                echo '
                <li class="dropdown">
                 <a href="Menu_Principal_Administrador" Size= "50px" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-folder-open" aria-hidden="true"></i> &nbsp;Catalago</a>
                    <ul class="dropdown-submenu" id="subMenuCatalago">
                        <li><a href="Atracciones" id="button"><span>Atracciones</span></a></li>
                        <li><a href="Tarjetas" id="button"><span>Lotes</span></a></li>
                        <li><a href="Eventos" id="button"><span>Eventos</span></a></li>
                        <li><a href="Promociones" id="button"><span>Promociones</span></a></li>
                        <li><a href="Usuarios" id="button"><span>Usuarios</span></a></li>
                        <li><a href="Clientes" id="button"><span>Clientes</span></a></li>
                        <!--li><a href="Contratos" id="button"><span>Contratos y Polizas</span></a></li-->
                    </ul>
                </li>';            
            }
            if($id==2){
                echo '
                    <li class="dropdown">
                    <a href="" Size= "50px" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-signal" aria-hidden="true"></i>&nbsp;Reportes</a>
                        <ul class="dropdown-submenu" id = "subMenuReportes">
                            <li><a href="ingresoxEvento" id="button"><span>Ingresos por evento</span></a></li>
                            <li><a href="utilXevento" id="button"><span>Utilización por evento</span></a></li>
                            <li><a href="utilAtraccion" id="button"><span>Utilizacion por atracción</span></a></li>
                        </ul>
                </li>';            
            }
            if($id==3){
                echo '
                    <li><a href=""><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Supervisar</a>
                        <ul class="dropdown-submenu" id="subMenuCatalago">
                            <li><a href="SuperTaquillas" id="button"><!--i class="fa fa-home" aria-hidden="true"></i--><span>Taquillas</span></a></li>
                            <li><a href="superAtracciones" id="button"><span>Atracciones</span></a></li>
                            <li><a href="supervisores" id="button"><span>Supervisores</span></a></li>
                        </ul>
                    </li>';            
            }
            if($id==4){
                echo '
                    <li><a href=""><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Validacion</a>
                        <ul class="dropdown-submenu" id="subMenuCatalago">
                            <li><a href="" id="button"><span>Reponer Saldo</span></a></li>
                        </ul>
                    </li>';            
            }
            if($id==5){
                echo '
                    <li><a href=""><i class="fa fa-lock" aria-hidden="true"></i>&nbsp;Seguridad</a></li>';            
            }
        endforeach;
        
        echo '
                <li class="dropdown">
                    <a class="navbar-brand" href="#"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;'.session('Usuario').'</a>
                        <ul class="dropdown-submenu" id="subMenuCatalago">
                            <li><a href="CerrarSesion" id="button"><span>Salir</span></a></a></li>
                        </ul>
                </li>
                </ul>
                </nav>
            </div> 
        </div>';


        /*foreach($data['Modulos'] as $m):
            echo'<div Class = "contenedorSuperior">
            <div class="container">
                <nav class="navbar navbar-fixed-top tm_navbar negro" role="navigation">
                    <a class="logo" href="Menu_Principal_Administrador"><img src = "Img/logo.png"/></a>
                    <ul class="nav navbar-nav sf-menu">
                        <!--li class="active"><a href="#">Home</a></li-->
                        <!--Menu Catalago-->';
                        if($m->idModulo==1){
                            echo '
                            <li class="dropdown">
                            <a href="Menu_Principal_Administrador" Size= "50px" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-folder-open" aria-hidden="true"></i> &nbsp;Catalago</a>
                                <ul class="dropdown-submenu" id="subMenuCatalago">
                                    <li><a href="Atracciones" id="button"><span>Atracciones</span></a></li>
                                    <li><a href="Tarjetas" id="button"><span>Lotes</span></a></li>
                                    <!--li><a href="Asociados" id="button"><span>Asociados</span></a></li-->
                                    <li><a href="Eventos" id="button"><span>Eventos</span></a></li>
                                    <li><a href="Promociones" id="button"><span>Promociones</span></a></li>
                                    <li><a href="Usuarios" id="button"><span>Usuarios</span></a></li>
                                    <li><a href="Clientes" id="button"><span>Clientes</span></a></li>
                                    <!--li><a href="Contratos" id="button"><span>Contratos y Polizas</span></a></li-->
                                </ul>  
                        </li>';            
                        }
                        if($m->idModulo==2){
                            echo '
                                <li class="dropdown">
                                <a href="" Size= "50px" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-signal" aria-hidden="true"></i>&nbsp;Reportes</a>
                                
                                    <ul class="dropdown-submenu" id = "subMenuReportes">
                                        <li><a href="ingreso_Evento.html" id="button"><span>Ingresos por evento</span></a></li>
                                        <li><a href="registro_Evento.html" id="button"><span>Utilización por evento</span></a></li>
                                        <li><a href="uso_Atraccion.html" id="button"><span>Utilizacion por atracción</span></a></li>
                                    </ul>
                            </li>';            
                        }
                        if($m->idModulo==3){
                            echo '
                                <li><a href=""><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Supervisar</a>
                                    <ul class="dropdown-submenu" id="subMenuCatalago">
                                        <li><a href="SuperTaquillas" id="button"><!--i class="fa fa-home" aria-hidden="true"></i--><span>Taquillas</span></a></li>
                                        <li><a href="superAtracciones" id="button"><span>Atracciones</span></a></li>
                                        <li><a href="supervisores" id="button"><span>Supervisores</span></a></li>
                                    </ul>
                                </li>';            
                        }
                        echo ' </ul>
                        </nav>
                    </div> 
                </div>';
        endforeach;*/

        /*in_array(1, $priv)?$_SESION['Catalogo']=1:$_SESION['Catalogo']=0;
        in_array(2, $priv)?$_SESION['Reportes']=1:$_SESION['Reportes']=0;
        in_array(3, $priv)?$_SESION['Supervisar']=1:$_SESION['Supervisar']=0;
        in_array(4, $priv)?$_SESION['Validacion']=1:$_SESION['Validacion']=0;
        in_array(5, $priv)?$_SESION['Seguridad']=1:$_SESION['Seguridad']=0;
        in_array(6, $priv)?$_SESION['Atracciones']=1:$_SESION['Atracciones']=0;
        in_array(7, $priv)?$_SESION['Lotes']=1:$_SESION['Lotes']=0;
        in_array(8, $priv)?$_SESION['Eventos']=1:$_SESION['Eventos']=0;
        in_array(9, $priv)?$_SESION['Promociones']=1:$_SESION['Promociones']=0;
        in_array(10, $priv)?$_SESION['Usuarios']=1:$_SESION['Usuarios']=0;
        in_array(11, $priv)?$_SESION['Taquillass']=1:$_SESION['Taquillass']=0;
        in_array(12, $priv)?$_SESION['Atraccioness']=1:$_SESION['Atraccioness']=0;
        in_array(13, $priv)?$_SESION['Supervisoress']=1:$_SESION['Supervisoress']=0;*/
        
        echo view('../Views/header');
        //echo view('../Views/menu',$datos);
        echo view('Administrador/Menu_Principal_Administrador/Menu_Principal_View');
        echo view('../Views/piePagina');
    }

    private function _redirectAuth(){
        $session = session(); 
        if($session->idRango == '5'){
            return redirect()->to('/new')->with('mesage', 'Hola'.$session->Usuario);
        }else{
            return redirect()->to('/new')->with('mesage', 'Hola'.$session->Usuario);
            
            //var_dump($session->idRango);
           // return redirect()->to('/user')->with('mesage', 'Hola'.$session->Usuario);
        }
    }

    private function privilegios(){
        
           // return redirect()->to('/user')->with('mesage', 'Hola'.$session->Usuario);
    }

    public function logout(){
        $session = session();
        //echo $session->Usuario;
        $session->destroy();
		//session()->remove('username');
		return $this->response->redirect(site_url(''));
	}


}