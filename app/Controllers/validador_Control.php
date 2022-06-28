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

        $datos = [
            'horaApertura' => $this->request->getVar('fecha'),
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
        $fecha = $_POST['fecha'];

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

    public function Validar_Saldo(){
        $model = new Validador_Model();
        $folio = $_POST['folio'];

        $fecha = $_POST['fecha'];

        $respuesta = $model->Validar_Saldo($folio);
        $pulsera = $model->Validar_Pulsera($folio,$fecha);

        echo json_encode(array('respuesta'=>true,'msj'=>$respuesta,'pulsera'=>$pulsera));
    }

    public function Promociones(){
        $model = new Validador_Model();

        $fechaInicial = $_POST['fechaInicial'];
    
        $fechaFinal = $_POST['fechaFinal'];

        $idAtraccionEvento = $_POST['idAtraccionEvento'];
        /*
        $datos =[
            'descuentos' => $model->descuentos($idAtraccionEvento, $fechaInicial, $fechaFinal),
            'juegosGratis' => $model->juegos_Gratis($idAtraccionEvento, $fechaInicial, $fechaFinal),
            'pulseraMagica' => $model->pulsera_Magica($idAtraccionEvento, $fechaInicial, $fechaFinal)
        ];
        */
        echo json_encode(
            array(
                'respuesta'=>true, 
                'descuentos'=> $model->descuentos($idAtraccionEvento, $fechaInicial, $fechaFinal),
                'juegosGratis' => $model->juegos_Gratis($idAtraccionEvento, $fechaInicial, $fechaFinal),
                'pulseraMagica' => $model->pulsera_Magica($idAtraccionEvento, $fechaInicial, $fechaFinal)
            )
        );
    }

    public function Insertar_Ciclo(){
        $model = new Validador_Model();

        $ciclo = $_POST['ciclo'];
        $datosCiclo = $_POST['informacionCiclo'];
        $num_elementos = 0;
        $cantidad = count($datosCiclo);
        $resultados = '';

        $datos = [
            'Personas' => $ciclo[0]['Personas'],
            'Creditos' => $ciclo[0]['Creditos'],
            'Cortesias' => $ciclo[0]['Cortesias'],
            'Descuentos' => $ciclo[0]['Descuentos'],
            'PulserasMagicas' => $ciclo[0]['PulserasMagicas'],
            'Hora' => $ciclo[0]['Hora'],
            'idAperturaValidador' => $ciclo[0]['idAperturaValidador'],
            'Gratis' => $ciclo[0]['Gratis'],
            'entradaNormal' => $ciclo[0]['entradaNormal'],
            'entradaCortesia' => $ciclo[0]['entradaCortesia'],
            'entradaMixta' => $ciclo[0]['entradaMixta']
        ];

        $idCiclo = $model->Insertar_Ciclo($datos);

        if($cantidad === 1){
            switch($datosCiclo[$num_elementos]['indice']){
                case '1':
                    $datos = [
                        'Folio' => $datosCiclo[$num_elementos]['folio'],
                        'idAtraccionEvento' => $datosCiclo[$num_elementos]['idAtraccionEvento'],
                        'idFechaJuegosGratis' => $datosCiclo[$num_elementos]['idFechaJuegosGratis'],
                        'idCiclo' => $idCiclo
                    ];

                    $respuesta = $model->Registro_Juegos_Gratis($datos);
                break;
                case '2':
                    //$resultados += ' Pulsera Magica';
                    $datos = [
                        'Folio' => $datosCiclo[$num_elementos]['folio'],
                        'idAtraccionEvento'  => $datosCiclo[$num_elementos]['idAtraccionEvento'],
                        'idFechaPulseraMagica' => $datosCiclo[$num_elementos]['idFechaPulseraMagica'],
                        'idCiclo' => $idCiclo
                    ];

                    $respuesta = $model->Registro_Pulsera_Magica($datos);
                break;
                case '3':
                    //$resultados += ' Desucentos';
                    $datos = [
                        'CantidadN' => $datosCiclo[$num_elementos]['CantidadN'],
                        'Folio' => $datosCiclo[$num_elementos]['folio'],
                        'idAtraccionEvento' => $datosCiclo[$num_elementos]['idAtraccionEvento'],
                        'idFechaDosxUno' => $datosCiclo[$num_elementos]['idFechaDosxUno'],
                        'CantidadC' => $datosCiclo[$num_elementos]['CantidadC'],
                        'idCiclo' => $idCiclo
                    ];

                    $respuesta = $model->Registro_Atraccion_Dos_x_Uno($datos);
                break;
                case '4':
                    //$resultados += 'Creditos Normales';

                    $datos = [
                        'Creditos' => $datosCiclo[$num_elementos]['Creditos'],
                        'Cortesias' => $datosCiclo[$num_elementos]['Cortesias'],
                        'idCiclo' => $idCiclo,
                        'Folio' => $datosCiclo[$num_elementos]['folio']
                    ];

                    $respuesta = $model->Registro_Movimiento($datos);
                break;
            }
        }
        else{
            while($num_elementos<$cantidad){
                switch($datosCiclo[$num_elementos]['indice']){
                    case '1':
                        $datos = [
                            'Folio' => $datosCiclo[$num_elementos]['folio'],
                            'idAtraccionEvento' => $datosCiclo[$num_elementos]['idAtraccionEvento'],
                            'idFechaJuegosGratis' => $datosCiclo[$num_elementos]['idFechaJuegosGratis'],
                            'idCiclo' => $idCiclo
                        ];

                        $respuesta = $model->Registro_Juegos_Gratis($datos);
                    break;
                    case '2':
                        //$resultados += ' Pulsera Magica';
                        $datos = [
                            'Folio' => $datosCiclo[$num_elementos]['folio'],
                            'idAtraccionEvento'  => $datosCiclo[$num_elementos]['idAtraccionEvento'],
                            'idFechaPulseraMagica' => $datosCiclo[$num_elementos]['idFechaPulseraMagica'],
                            'idCiclo' => $idCiclo
                        ];

                        $respuesta = $model->Registro_Pulsera_Magica($datos);
                    break;
                    case '3':
                        //$resultados += ' Desucentos';
                        $datos = [
                            'CantidadN' => $datosCiclo[$num_elementos]['CantidadN'],
                            'Folio' => $datosCiclo[$num_elementos]['folio'],
                            'idAtraccionEvento' => $datosCiclo[$num_elementos]['idAtraccionEvento'],
                            'idFechaDosxUno' => $datosCiclo[$num_elementos]['idFechaDosxUno'],
                            'CantidadC' => $datosCiclo[$num_elementos]['CantidadC'],
                            'idCiclo' => $idCiclo
                        ];

                        $respuesta = $model->Registro_Atraccion_Dos_x_Uno($datos);
                    break;
                    case '4':
                        //$resultados += 'Creditos Normales';

                        $datos = [
                            'Creditos' => $datosCiclo[$num_elementos]['Creditos'],
                            'Cortesias' => $datosCiclo[$num_elementos]['Cortesias'],
                            'idCiclo' => $idCiclo,
                            'Folio' => $datosCiclo[$num_elementos]['folio']
                        ];

                        $respuesta = $model->Registro_Movimiento($datos);
                    break;
                }
                $num_elementos = $num_elementos + 1;
            }
        }
        echo json_encode(array('respuesta'=>true,'msj'=>$resultados));
    }

    public function new (){
        session_start([
            'use_only_cookies' => 1,
            'cookie_lifetime' => 0,
            'cookie_secure' => 1,
            'cookie_httponly' => 1
        ]);
        $model = new Validador_Model();

        //$fechaInicial = date("Y-m-d");
        //$fechaFinal = date("Y-m-d");

        //$fecha =$fechaInicial.' 23:59:00.000';
        
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
        
        
        //echo View('../Views/header');
        //echo View('Usuarios/menu_user');
        echo View('Usuarios/validador',$datos);
       // echo View('../Views/piePagina');
        
        
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