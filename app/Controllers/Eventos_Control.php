<?php namespace App\Controllers;

use App\Models\Eventos_Model;

class Eventos_Control extends BaseController {

    protected $model;
    protected $request;
    
    public function _construct(){
       // $this->model = new Atracciones_Model();
       $this->request = \Config\Services::request();
    }

    public function new (){
        $model = new Eventos_Model();

        $datos = [
            'Eventos' => $model->listadoEventos(),
            'Lotes' => $model->listadoLotes(),
            'AtraccionesEvento' => $model->listado_Atracciones_Por_Evento()
        ];

        echo view('../Views/header');
        echo view('../Views/menu');
        echo view ('Administrador/Eventos/Eventos_View', $datos);
        echo view('../Views/piePagina');
    }

    public function agregarEvento(){
        $model = new Eventos_Model();

        $datos = [
            'Nombre' => $this->request->getVar('Nombre'),
            'Direccion' => $this->request->getVar('Direccion'),
            'Ciudad' => $this->request->getVar('Ciudad'),
            'Estado' => $this->request->getVar('Estado'),
            'FechaInicio' => $this->request->getVar('fechaInicio'),
            'FechaFinal' => $this->request->getVar('fechaFinal'),
            'Precio' => $this->request->getVar('pesos'),
            'Creditos' => $this->request->getVar('creditos'),
        ];

        $respuesta = $model->agregarEvento($datos);
        echo json_encode(array('respuesta'=>true, 'msj'=>$datos));
    }

    public function mostrarAtracciones(){
        $model = new Eventos_Model();

        $datos = [
            'idEvento' => $this->request->getVar('idEvento')
        ];

        $respuesta = $model->mostrarAtracciones($datos);
        $atracciones = $model->listadoAtracciones($datos);
        $descuentos = $model->listado_Descuentos($datos);
        $pulsera = $model->listado_Pulsera_Magica($datos);
        $juegosGratis = $model->listado_Juegos_Gratis($datos);
        $creditosCortesia = $model->listado_Creditos_Cortesia($datos);
        $contratos = $model->listadoContratos();
        $polizas = $model->listadoPolizas();
        $zonas =$model->mostrar_Zonas_Evento($datos);

        echo json_encode(
            array(
                'respuesta'=>true,
                'msj'=>$respuesta,
                'atracciones'=>$atracciones, 
                "descuentos"=>$descuentos,
                "pulsera"=>$pulsera,
                "juegosGratis"=>$juegosGratis,
                "creditosCortesia"=>$creditosCortesia,
                "contratos"=>$contratos,
                "polizas"=>$polizas,
                "zonas"=>$zonas
            ));
    }

    public function informacion_Atraccion(){
        $model = new Eventos_Model();
        
        $datos = [
            'idEvento' => $this->request->getVar('idEvento'),
            'idAtraccionEvento' => $this->request->getVar('idAtraccionEvento')
        ];

        echo json_encode(
            array(
                'respuesta'=>true,
                'msj'=> $model->informacion_Atraccion($datos),
                'Contratos' => $model->listadoContratos(),
                'Polizas' => $model->listadoPolizas(),
                'Descuentos' => $model->listado_Descuentos($datos),
                'Pulsera' => $model->listado_Pulsera_Magica($datos),
                'Juegos' => $model->listado_Juegos_Gratis($datos)
            )
        );
    }

    public function mostrar_Zonas_Evento(){
        $model = new Eventos_Model();

        $datos = [
            'idEvento' => $this->request->getVar('idEvento')
        ];

        $respuesta = $model->mostrar_Zonas_Evento($datos);

        echo json_encode(array('respuesta'=>true,'msj'=>$respuesta));
    }

    public function mostrar_Taquillas_Evento(){
        $model = new Eventos_Model();

        $datos = [
            'idEvento' => $this->request->getVar('idEvento')
        ];

        echo json_encode(
            array(
                'respuesta'=>true,
                'Taquilla'=>$model->mostrar_Taquillas_Evento($datos),
                'Zonas'=>$model->mostrar_Zonas_Evento($datos),
                'Ventanilla'=>$model->mostrar_Ventanilla_Evento($datos)
            )
        );
    }

    public function mostrarTarjetas(){
        $model = new Eventos_Model();

        $datos = [
            'idEvento' => $this->request->getVar('idEvento')
        ];

        $respuesta = $model->mostrarTarjetas($datos);
        echo json_encode(array('respuesta'=>true,'msj'=>$respuesta));
    }

    public function mostrarAsociacion(){
        $model = new Eventos_Model();

        $datos = [
            'idEvento' => $this->request->getVar('idEvento')
        ];

        $respuesta = $model->mostrarAsociacion($datos);
        echo json_encode(array('respuesta'=>true,'msj'=>$respuesta));
    }

    public function mostrar_Tarjetas_Nuevas(){
        $model = new Eventos_Model();
        
        $datos = [
            'idLote' => $this->request->getVar('idLote')
        ];
        
        
        $respuesta = $model->mostrar_Tarjetas_Nuevas($datos);
        echo json_encode(array('respuesta'=>true, 'msj'=>$respuesta));
    }

    public function mostrar_Promociones(){
        $model = new Eventos_Model();

        $promocion = $_POST['promocion'];
        
        switch($promocion){
            case 1:
                $tabla='Promocion_Dos_x_Uno';
                $respuesta = $model->mostrar_Promociones($tabla);
                echo json_encode(array('respuesta'=>true, 'msj'=>$respuesta));
            break;

            case 2:
                $tabla='Promocion_Pulsera_Magica';
                $respuesta = $model->mostrar_Promociones($tabla);
                echo json_encode(array('respuesta'=>true, 'msj'=>$respuesta));
            break;

            case 3:
                $tabla='Promocion_Juegos_Gratis';
                $respuesta = $model->mostrar_Promociones($tabla);
                echo json_encode(array('respuesta'=>true, 'msj'=>$respuesta));
            break;

            case 4:
                $tabla='Promocion_Creditos_Cortesia';
                $respuesta = $model->mostrar_Promociones($tabla);
                echo json_encode(array('respuesta'=>true, 'msj'=>$respuesta));
            break;
        }
    }

    public function agregar_Zona_Evento(){
        $model = new Eventos_Model();

        $idEvento = $_POST['idEventoZona'];
        $nombre = $_POST['zona'];

        $num_elementos = 0;
        $cantidad = count($nombre);

        if(1 == $cantidad){
            $datos = [
                "Nombre" => $nombre[$num_elementos],
                "idEvento" => $idEvento
            ];

            $respuesta = $model->agregar_Zona_Evento($datos);
        }
        else{
            while($num_elementos < $cantidad){

                $datos = [
                    "Nombre" => $nombre[$num_elementos],
                    "idEvento" => $idEvento
                ];

                $respuesta = $model->agregar_Zona_Evento($datos);

                $num_elementos = $num_elementos + 1;
            }
        }
        echo json_encode(array('respuesta'=>$respuesta, 'msj'=>$respuesta));
    }

    public function agregar_Taquillas_Evento(){
        $model = new Eventos_Model();

        $zonas = $_POST['zonas'];
        $taquillas = $_POST['taquillas'];
        $ventanillas = $_POST['ventanillas'];

        $cantidad_Zonas = count($zonas);
        $cantidad_Taquillas = count($taquillas);
        $cantidad_Ventanillas = count($ventanillas);

        $indice_Zonas = 0;
        $indice_Taquillas = 0;
        $indice_Ventanillas = 0;
        

        if(1 == $cantidad_Zonas){
        }
        else{
            while($indice_Zonas < $cantidad_Zonas){
                if(1 == $cantidad_Taquillas){
                }
                else{
                    while($indice_Taquillas < $cantidad_Taquillas){
                        if($indice_Zonas == $taquillas[$indice_Taquillas]["indiceZona"]){
                            $data = [
                                "Nombre" => $taquillas[$indice_Taquillas]["Nombre"],
                                "idZona" => $zonas[$indice_Zonas]["idZona"]
                            ];

                            $idTaquilla = $model->agregar_Taquillas_Evento($data);

                            if(1 == $cantidad_Ventanillas){
                            }
                            else{
                                while($indice_Ventanillas < $cantidad_Ventanillas){
    
                                    if($indice_Taquillas == $ventanillas[$indice_Ventanillas]["indiceTaquilla"]){
                                        $data = [
                                            "Nombre" => $ventanillas[$indice_Ventanillas]["Nombre"],
                                            "idTaquilla" => $idTaquilla
                                        ];
                                        $respuesta = $model->agregar_Ventanillas_Evento($data);
                                    }
    
                                    $indice_Ventanillas = $indice_Ventanillas + 1;
                                }
                            }
                        }

                        $indice_Taquillas = $indice_Taquillas + 1;
                        $indice_Ventanillas = 0;
                    }
                }

                $indice_Zonas = $indice_Zonas + 1;
                $indice_Taquillas = 0;
                $indice_Ventanillas = 0;
            }
        }
        
        echo json_encode(array('respuesta'=>true, 'msj'=>$respuesta));
    }

    public function agregar_Atracciones_Evento(){
        $model = new Eventos_Model();


        $atracciones = $_POST['atracciones'];
        
        $creditos = $_POST['creditos'];
        $descuentos = $_POST['descuentos'];
        $pulsera = $_POST['pulsera'];
        $juegos = $_POST['juegos_Gratis'];
        $contrato = $_POST['contrato'];
        $poliza = $_POST['poliza'];
        $zonas = $_POST['zonas'];
        $evento = $_POST['idEvento'];
        
        $num_elementos = 0;
        $cantidad = count($atracciones);

        
        if(1 == $cantidad){
            
            $datos = [
                "idAtraccion" => $atracciones[$num_elementos],
                "idEvento" => $evento,
                "idContrato" => $contrato[$num_elementos],
                "idPoliza" => $poliza[$num_elementos],
                "Creditos" => $creditos[$num_elementos],
                "creditosCortesia" => $creditos[$num_elementos],
                "idZona" => $zonas[$num_elementos],
                "statusValidador" => 0,
                "satusSupervisor" => 0,
            ];
            $respuesta = $model->agregar_Atracciones_Evento($datos);

            if("N" != $descuentos[0]){
                $num_elementos = 0;
                $cantidad_Promocion = count($descuentos);
                //$cantidad_Promocion = count($descuentos);
                $tabla = 'Atracciones_Incluidas_Dos_x_Uno';

                if(1 == $cantidad_Promocion){
                    $datos = [
                        "idAtraccionEvento" => $respuesta,
                        "idDosxUno" => $descuentos[$num_elementos]['idDosxUno']
                    ];

                    $respuesta1 = $model->agregar_Promociones_Atraccion($tabla,$datos);
                }
                else{
                    while($num_elementos < $cantidad_Promocion){

                        $datos =[
                            "idAtraccionEvento" => $respuesta,
                            "idDosxUno" => $descuentos[$num_elementos]['idDosxUno']
                        ];
    
                        $respuesta1 = $model->agregar_Promociones_Atraccion($tabla,$datos); 
    
                        $num_elementos = $num_elementos + 1;
                    }
                }
            }
            
            if("N" != $pulsera[0]){
                $num_elementos = 0;

                $cantidad_Promocion = count($pulsera);
                $tabla = 'Atracciones_Incluidas_Pulsera_Magica';

                if(1 == $cantidad_Promocion){
                    $datos = [
                        "idPulseraMagica" => $pulsera[$num_elementos]['idPulseraMagica'],
                        "idAtraccionEvento" => $respuesta
                    ];

                    $respuesta1 = $model->agregar_Promociones_Atraccion($tabla,$datos);
                }
                else{
                    while($num_elementos < $cantidad_Promocion){

                        $datos =[
                            "idPulseraMagica" => $pulsera[$num_elementos]['idPulseraMagica'],
                            "idAtraccionEvento" => $respuesta
                        ];
    
                        $respuesta1 = $model->agregar_Promociones_Atraccion($tabla,$datos); 
    
                        $num_elementos = $num_elementos + 1;
                    }
                }
            }
    
            if("N" != $juegos[0]){
                $num_elementos = 0;

                $cantidad_Promocion = count($juegos);
                $tabla = 'Atracciones_Incluidas_Juegos_Gratis';

                if(1 == $cantidad_Promocion){
                    $datos = [
                        "idJuegosGratis" => $juegos[$num_elementos]['idJuegosGratis'],
                        "idAtraccionEvento" => $respuesta
                    ];

                    $respuesta1 = $model->agregar_Promociones_Atraccion($tabla,$datos);
                }
                else{
                    while($num_elementos < $cantidad_Promocion){

                        $datos =[
                            "idJuegosGratis" => $juegos[$num_elementos]['idJuegosGratis'],
                            "idAtraccionEvento" => $respuesta
                        ];
    
                        $respuesta1 = $model->agregar_Promociones_Atraccion($tabla,$datos); 
    
                        $num_elementos = $num_elementos + 1;
                    }
                }
            }
        }
        else{

            while($num_elementos < $cantidad){
                $datos = [
                    "idAtraccion" => $atracciones[$num_elementos],
                    "idEvento" => $evento,
                    "idContrato" => $contrato[$num_elementos],
                    "idPoliza" => $poliza[$num_elementos],
                    "Creditos" => $creditos[$num_elementos],
                    "creditosCortesia" => $creditos[$num_elementos],
                    "idZona" => $zonas[$num_elementos],
                    "statusValidador" => 0,
                    "statusSupervisor" => 0,
                ];

                $respuesta = $model->agregar_Atracciones_Evento($datos);

                if("N" != $descuentos[0]){
                    $ciclo_promociones = 0;
                    $cantidad_Promocion = count($descuentos);
                    //$cantidad_Promocion = count($descuentos);
                    $tabla = 'Atracciones_Incluidas_Dos_x_Uno';
                    
                    while($ciclo_promociones < $cantidad_Promocion){
                        //Aqui va un if evaluando si el idBloque es el mismo que el $num_elementos

                        if($descuentos[$ciclo_promociones]['idBloque'] == $num_elementos){
                            $datos =[
                                "idAtraccionEvento" => $respuesta,
                                "idDosxUno" => $descuentos[$ciclo_promociones]['idDosxUno']
                            ];
                            $respuesta1 = $model->agregar_Promociones_Atraccion($tabla,$datos);
                        } 
    
                        $ciclo_promociones = $ciclo_promociones + 1;
                    }
                }
                
                if("N" != $pulsera[0]){
                    $ciclo_promociones = 0;
    
                    $cantidad_Promocion = count($pulsera);
                    $tabla = 'Atracciones_Incluidas_Pulsera_Magica';
    
                    while($ciclo_promociones < $cantidad_Promocion){

                        if($pulsera[$ciclo_promociones]['idBloque'] == $num_elementos){
                            $datos =[
                                "idPulseraMagica" => $pulsera[$ciclo_promociones]['idPulseraMagica'],
                                "idAtraccionEvento" => $respuesta
                            ];
        
                            $respuesta1 = $model->agregar_Promociones_Atraccion($tabla,$datos); 
                        }
    
                        $ciclo_promociones = $ciclo_promociones + 1;
                    }
                    
                }
        
                if("N" != $juegos[0]){
                    $ciclo_promociones = 0;
    
                    $cantidad_Promocion = count($juegos);
                    $tabla = 'Atracciones_Incluidas_Juegos_Gratis';
                    
                    while($ciclo_promociones < $cantidad_Promocion){

                        if($juegos[$ciclo_promociones]['idBloque'] == $num_elementos){
                            $datos =[
                                "idJuegosGratis" => $juegos[$ciclo_promociones]['idJuegosGratis'],
                                "idAtraccionEvento" => $respuesta
                            ];
        
                            $respuesta1 = $model->agregar_Promociones_Atraccion($tabla,$datos); 
                        }
    
                        $ciclo_promociones = $ciclo_promociones + 1;
                    }
                    
                }

                $num_elementos = $num_elementos + 1;
            }

        }
        
        echo json_encode(array('respuesta'=>true, 'msj'=>$respuesta));
    }

    public function agregar_Tarjetas_Evento(){
        $model = new Eventos_Model();

        $datos= [
            'idEvento' => $this->request->getVar('idEventoLote'),
            'idLote' => $this->request->getVar('idLote'),
            'folioInicial' => $this->request->getVar('folioInicial'),
            'folioFinal' => $this->request->getVar('folioFinal')
        ];

        $respuesta = $model->agregar_Tarjetas_Evento($datos);
        echo json_encode(array('respuesta'=>true,'msj'=>$respuesta));


    }

    public function agregar_Promocion_Evento(){

        $model = new Eventos_Model();

        $tipoPromocion = $_GET['tipoPromocion'];
        
        $fechaInicio = $_GET['fechaInicio'];
        $fechaFinal = $_GET['fechaFinal'];
        $precio = $_GET['precio'];
        $idEvento = $_GET['idEvento'];
        $idPromocion = $_GET['idPromocion'];
        $creditos = $_GET['creditos'];
        
        $num_elementos =0;
        $cantidad = count($fechaInicio);

        switch($tipoPromocion){
            case 1:
                $tabla = 'Calendario_Dos_x_Uno';
                if(1==$cantidad){
                    $datos = [
                        "FechaInicial" => $fechaInicio[$num_elementos],
                        "FechaFinal" => $fechaFinal[$num_elementos],
                        "idDosxUno" => $idPromocion,
                        "idEvento" => $idEvento
                    ];

                    $respuesta1 = $model->agregar_Calendario_Promocion($tabla,$datos);
                }
                else{
                    while($num_elementos<$cantidad){
                        $datos = [
                            "FechaInicial" => $fechaInicio[$num_elementos],
                            "FechaFinal" => $fechaFinal[$num_elementos],
                            "idDosxUno" => $idPromocion,
                            "idEvento" => $idEvento
                        ];

                        $respuesta1 = $model->agregar_Calendario_Promocion($tabla,$datos);
                        $num_elementos = $num_elementos +1;
                    }
                }
                if($respuesta1 != false){
                    echo json_encode(array('respuesta'=>true,'msj'=>$respuesta1));
                }
                else{
                    echo json_encode(array('respuesta'=>false,'msj'=>$respuesta1));
                }
            break;

            case 2:
                $tabla = 'Calendario_Pulsera_Magica';
                if(1==$cantidad){
                    $datos = [
                        "Precio" => $precio[$num_elementos],
                        "FechaInicial" => $fechaInicio[$num_elementos],
                        "FechaFinal" => $fechaFinal[$num_elementos],
                        "idPulseraMagica" => $idPromocion,
                        "idEvento" => $idEvento
                    ];
                    $respuesta1 = $model->agregar_Calendario_Promocion($tabla,$datos);
                }
                else{
                    while($num_elementos<$cantidad){
                        $datos = [
                            "Precio" => $precio[$num_elementos],
                            "FechaInicial" => $fechaInicio[$num_elementos],
                            "FechaFinal" => $fechaFinal[$num_elementos],
                            "idPulseraMagica" => $idPromocion,
                            "idEvento" => $idEvento
                        ];
                        $respuesta1 = $model->agregar_Calendario_Promocion($tabla,$datos);
                        $num_elementos = $num_elementos +1;
                    }
                }
                if($respuesta1 != false){
                    echo json_encode(array('respuesta'=>true,'msj'=>$respuesta1));
                }
                else{
                    echo json_encode(array('respuesta'=>false,'msj'=>$respuesta1));
                }
            break;

            case 3:
                $tabla = 'Calendario_Juegos_Gratis';
                if(1==$cantidad){
                    $datos = [
                        "Precio" => $precio[$num_elementos],
                        "FechaInicial" => $fechaInicio[$num_elementos],
                        "FechaFinal" => $fechaFinal[$num_elementos],
                        "idJuegosGratis" => $idPromocion,
                        "idEvento" => $idEvento
                    ];
                    $respuesta1 = $model->agregar_Calendario_Promocion($tabla,$datos);
                }
                else{
                    while($num_elementos<$cantidad){
                        $datos = [
                            "Precio" => $precio[$num_elementos],
                            "FechaInicial" => $fechaInicio[$num_elementos],
                            "FechaFinal" => $fechaFinal[$num_elementos],
                            "idJuegosGratis" => $idPromocion,
                            "idEvento" => $idEvento
                        ];
                        $respuesta1 = $model->agregar_Calendario_Promocion($tabla,$datos);
                        $num_elementos = $num_elementos +1;
                    }
                }
                if($respuesta1 != false){
                    echo json_encode(array('respuesta'=>true,'msj'=>$respuesta1));
                }
                else{
                    echo json_encode(array('respuesta'=>false,'msj'=>$respuesta1));
                }
            break;

            case 4:
                $tabla = 'Calendario_Creditos_Cortesia';
                if(1==$cantidad){
                    $datos = [
                        "Precio" => $precio[$num_elementos],
                        "Creditos" => $creditos[$num_elementos],
                        "FechaInicial" => $fechaInicio[$num_elementos],
                        "FechaFinal" => $fechaFinal[$num_elementos],
                        "idCC" => $idPromocion,
                        "idEvento" =>$idEvento
                    ];
                    $respuesta1 = $model->agregar_Calendario_Promocion($tabla,$datos);
                }
                else{
                    while($num_elementos<$cantidad){
                        $datos = [
                            "Precio" => $precio[$num_elementos],
                            "Creditos" => $creditos[$num_elementos],
                            "FechaInicial" => $fechaInicio[$num_elementos],
                            "FechaFinal" => $fechaFinal[$num_elementos],
                            "idCC" => $idPromocion,
                            "idEvento" =>$idEvento
                        ];
                        $respuesta1 = $model->agregar_Calendario_Promocion($tabla,$datos);
                        $num_elementos = $num_elementos +1;
                    }
                }
                if($respuesta1 != false){
                    echo json_encode(array('respuesta'=>true,'msj'=>$respuesta1));
                }
                else{
                    echo json_encode(array('respuesta'=>false,'msj'=>$respuesta1));
                }
            break;
        }
    }

    public function actualizar_Atraccion(){
        $idAtraccionEvento = $_POST['idAtraccionEvento'];
        $creditos = $_POST['creditos'];
        $idContrato = $_POST['idContrato'];
        $idPoliza = $_POST['idPoliza'];
        $descuentosNuevos = $_POST['descuentosNuevos'];
        $pulserasNuevas = $_POST['pulserasNuevas'];
        $juegosNuevos = $_POST['juegosNuevos'];
        $eliminarDescuentos = $_POST['eliminarDescuentos'];
        $eliminarPulseras = $_POST['eliminarPulseras'];
        $eliminarJuegos = $_POST['eliminarJuegos'];

        $datos = [
            'idContrato' => $idContrato,
            'idPoliza' => $idPoliza,
            'Creditos' => $creditos,
        ];
    }

    public function create(){
        return "";
    }
}
