<?php

namespace App\Models;

use CodeIgniter\Model;

class Eventos_Model extends Model{

    protected $builder;

    protected $table;
    protected $primaryKey;
    protected $returnType;

    public function listadoEventos(){
        $db = \Config\Database::connect();
        $builder = $db->table('Eventos');

        $builder-> select(
            '
            idEvento,
            Nombre, 
            Direccion,
            Ciudad,
            Estado,
            FechaInicio,
            FechaFinal,
            '
        );

        $builder->orderBy('idEvento', 'DESC');

        $query = $builder->get();
    
        $datos = $query->getResultObject();

        return $datos;        
    }

    public function listadoLotes(){
        $db = \Config\Database::connect();
        $builder = $db->table('Lotes');

        $builder-> select(
            '
            Lotes.idLote,
            Lotes.Nombre,
            '
        );

        $query = $builder->get();
     
        $datos = $query->getResultObject();

        return $datos;
    }

    public function listado_Atracciones_Por_Evento (){
        $db = \Config\Database::connect();
        $builder = $db->table('Atraccion_Evento');

        $builder-> select(
            '
            Atracciones.Nombre AS Atraccion,
            Eventos.Ciudad AS Evento,
            Contrato.Nombre AS Contrato,
            Poliza.Nombre AS Poliza,
            Atraccion_Evento.Creditos AS Creditos,
            Atraccion_Evento.creditosCortesia AS CreditosC
            '
        );

        $builder->join(
            'Atracciones',
            'Atracciones.idAtraccion = Atraccion_Evento.idAtraccion',
            'join'
        );

        $builder->join(
            'Eventos',
            'Eventos.idEvento = Atraccion_Evento.idEvento',
            'join'
        );

        $builder->join(
            'Contrato',
            'Contrato.idContrato = Atraccion_Evento.idContrato',
            'inner'
        );

        $builder->join(
            'Poliza',
            "Poliza.idPoliza = Atraccion_Evento.idPoliza"
        );
        
        $query = $builder->get();
    
        $datos = $query->getResultObject();

        return $datos;
    }

    public function listadoAtracciones($datos){
        $db= \Config\Database::Connect();
        $builder = $db->table('Atracciones');

        $builder->select(
            '
            Atracciones.idAtraccion,
            Atracciones.Nombre
            '
        );

        $subQuery = $db->table('Atraccion_Evento')->select('Atraccion_Evento.idAtraccion')->where('Atraccion_Evento.idEvento',$datos['idEvento']);

        $builder->whereNotIn('Atracciones.idAtraccion',$subQuery);

        $query = $builder->get();

        $datos = $query->getResultObject();

        return $datos;

    }

    public function listado_Promociones_Evento($datos){
        $db = \Config\Database::Connect();
        $builder = $db->table('Promocion_Dos_x_Uno');

        $builder->distinct(
            '
            Promocion_Dos_x_Uno.idDosxUno,
            Promocion_Dos_x_Uno.Nombre
            '
        );

        $builder->join(
            'Calendario_Dos_x_Uno',
            'Promocion_Dos_x_Uno.idDosxUno = Calendario_Dos_x_Uno.idDosxUno',
            'inner'
        );

        $builder->where('Calendario_Dos_x_Uno.idEvento',$datos['idEvento']);

        $query = $builder->get();

        $datos = $query->getResultObject();

        return $datos;
    }

    public function listado_Pulsera_Magica($datos){}

    public function listado_Juegos_Gratis($datos){}

    public function listadoContratos(){
        $db= \Config\Database::Connect();
        $builder = $db->table('Contrato');

        $builder->select(
            '
            idContrato,
            Nombre
            '
        );

        $query = $builder->get();

        $datos = $query->getResultObject();

        return $datos;
    }

    public function listadoPolizas(){
        $db= \Config\Database::Connect();
        $builder = $db->table('Poliza');

        $builder->select(
            '
            idPoliza,
            Nombre
            '
        );

        $query = $builder->get();

        $datos = $query->getResultObject();

        return $datos;
    }

    public function agregarEvento($datos){
        $db= \Config\Database::Connect();
        $builder = $db->table('Eventos');

        $builder -> insert($datos);

        return 'Funciono';
    
    }

    public function mostrarAtracciones($datos){
        $db = \Config\Database::connect();
        $builder = $db->table('Atracciones');

        $builder->select(
            '
            Atracciones.Nombre AS Atraccion, 
            Atraccion_Evento.Creditos, 
            Contrato.Nombre AS Contrato, 
            Poliza.Nombre AS Poliza
            '
        );

        $builder->join(
            'Atraccion_Evento',
            'Atraccion_Evento.idAtraccion = Atracciones.idAtraccion',
            'inner'
        );
        $builder->join(
            'Contrato',
            'Contrato.idContrato = Atraccion_Evento.idContrato',
            'inner'
        );
        $builder->join(
            'Poliza',
            'Poliza.idPoliza = Atraccion_Evento.idPoliza',
            'inner'
        );

        $builder->where('Atraccion_Evento.idEvento',$datos['idEvento']);

        $query = $builder->get();
    
        $datos = $query->getResultObject();

        return $datos;
    }

    public function mostrarTarjetas($datos){
        $db = \Config\Database::connect();
        $builder = $db->table('Tarjetas');

        $builder->select(
            '
            Nombre,
            Folio,
            FechaActivacion,
            Status,
            Tipo
            '
        );

        $builder->where('idEvento',$datos['idEvento']);

        $query = $builder->get();
    
        $datos = $query->getResultObject();

        return $datos;
    }

    public function mostrarAsociacion($datos){
        $db = \Config\Database::connect();
        $builder = $db->table('Asociacion');

        $builder->select(
            '
            Asociacion.Nombre,
            Asociacion.Porcentaje1, 
            Asociacion.Porcentaje2,
            Propietario.Nombre AS Propietario,
            Atracciones.Nombre AS Atraccion,
            Asociados.Nombre AS Asociado
            '
        );

        $builder->join(
            'Atracciones',
            'Atracciones.idAtraccion = Asociacion.idAtraccion',
            'inner'
        );
        $builder->join(
            'Propietario',
            'Propietario.idPropietario = Atracciones.idPropietario',
            'inner'
        );
        $builder->join(
            'Asociados',
            'Asociados.idAsociado = Asociacion.idAsociado',
            'inner'
        );

        $builder->where('Asociacion.idEvento',$datos['idEvento']);

        $query = $builder->get();
    
        $datos = $query->getResultObject();

        return $datos;
    }

    public function mostrar_Tarjetas_Nuevas($datos){
        $db = \Config\Database::connect();
        $builder = $db->table('Tarjetas');

        $builder->select(
            '
            Folio
            '
        );

        $builder ->where('idLote',$datos['idLote']);
        $builder->where('idEvento IS NULL');

        $query = $builder->get();
    
        $datos = $query->getResultObject();

        return $datos;
    }

    public function mostrar_Promociones($tabla){
        $db = \Config\Database::connect();
        $builder = $db->table($tabla);

        $query = $builder->get();

        $datos= $query->getResultObject();

        return $datos;
    }

    public function agregar_Tarjetas_Evento($datos){
        $db = \Config\Database::connect();

        for($i=$datos['folioInicial'];$i<=$datos['folioFinal'];$i++){

            $db->query(
                "UPDATE 
                    Tarjetas 
                SET
                    idEvento = '$datos[idEvento]'
                WHERE 
                    Folio = $i
                AND
                    idLote = '$datos[idLote]'
                ");
        }

        return 'Funciono';
    }

    public function agregar_Promociones_Evento($tipoPromocion,$datos1){
        $db = \Config\Database::Connect();
        switch($tipoPromocion){
            case 1:
                $builder = $db->table('Promocion_Dos_x_Uno');
                if( $builder -> insert($datos1)){
                    return $db->insertID();
                }
                else{
                    return false;
                }
            break;

            case 2:
                $builder = $db->table('Promocion_Juegos_Gratis');

                if($builder->insert($datos1)){
                    return $db->insertID();
                }
                else{
                    return false;
                }
            break;

            case 3:
                
                $builder = $db->table('Promocion_Pulsera_Magica');

                if($builder->insert($datos1)){
                    return $db->insertID();
                }
                else{
                    return false;
                }
                
            break;
        }
    }

    public function agregar_Calendario_Promocion($tabla,$datos){
        $db = \Config\Database::connect();

        $builder = $db->table($tabla);
        
        if($builder->insert($datos)){
            return 'Funciono';
        }
        else{
            return false;
        }
    }

    public function listado_Precios_Por_Evento(){}

    public function listado_Usuarios_Por_Evento(){}
}