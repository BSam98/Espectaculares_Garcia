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

    public function listado_Descuentos($datos){
        $db = \Config\Database::Connect();
        //$builder = $db->table('Promocion_Dos_x_Uno');

        
        /*
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

        /query = $builder->get();
        
        */
        
        $query = $db->query(
            "SELECT DISTINCT 
                Promocion_Dos_x_Uno.idDosxUno, 
                Promocion_Dos_x_Uno.Nombre 
            FROM 
                Promocion_Dos_x_Uno 
            INNER JOIN 
                Calendario_Dos_x_Uno 
            ON 
                Promocion_Dos_x_Uno.idDosxUno = Calendario_Dos_x_Uno.idDosxUno 
            WHERE 
                Calendario_Dos_x_Uno.idEvento = $datos[idEvento];"
        );
        
        $datos = $query->getResultObject();

        return $datos;
    }

    public function listado_Pulsera_Magica($datos){
        $db= \Config\Database::Connect();
        /*
        $builder = $db->table('Promocion_Pulsera_Magica');

        $builder->distinct(
            '
            Promocion_Pulsera_Magica.idPulseraMagica,
            Promocion_Pulsera_Magica.Nombre
            '
        );

        $builder->join(
            'Calendario_Pulsera_Magica',
            'Promocion_Pulsera_Magica.idPulseraMagica = Calendario_Pulsera_Magica.idPulseraMagica',
            'inner'
        );

        $builder->where('Calendario_Pulsera_Magica.idEvento',$datos['idEvento']);

        $query =$builder->get();
        */
        $query = $db->query(
            "SELECT DISTINCT
                Promocion_Pulsera_Magica.idPulseraMagica,
                Promocion_Pulsera_Magica.Nombre
            FROM
                Promocion_Pulsera_Magica
            INNER JOIN
                Calendario_Pulsera_Magica
            ON
                Promocion_Pulsera_Magica.idPulseraMagica = Calendario_Pulsera_Magica.idPulseraMagica
            WHERE
                Calendario_Pulsera_Magica.idEvento = $datos[idEvento];
            "
        );

        $datos = $query->getResultObject();

        return $datos;
    }

    public function listado_Juegos_Gratis($datos){
        $db= \Config\Database::Connect();
        /*
        $builder = $db->table('Promocion_Juegos_Gratis');

        $builder->distinct(
            '
            Promocion_Juegos_Gratis.idJuegosGratis,
            Promocion_Juegos_Gratis.Nombre
            '
        );

        $builder->join(
            'Calendario_Juegos_Gratis',
            'Promocion_Juegos_Gratis.idJuegosGratis = Calendario_Juegos_Gratis.idJuegosGratis',
            'inner'
        );

        $builder->where('Calendario_Juegos_Gratis.idEvento',$datos['idEvento']);

        $query = $builder->get();
        */
        $query= $db->query(
            "SELECT DISTINCT
                Promocion_Juegos_Gratis.idJuegosGratis,
                Promocion_Juegos_Gratis.Nombre
            FROM
                Promocion_Juegos_Gratis
            INNER JOIN
                Calendario_Juegos_Gratis
            ON
                Promocion_Juegos_Gratis.idJuegosGratis = Calendario_Juegos_Gratis.idJuegosGratis
            WHERE
                Calendario_Juegos_Gratis.idEvento = $datos[idEvento];"
        );

        $datos = $query->getResultObject();

        return $datos;
    }

    public function listado_Creditos_Cortesia($datos){
        $db= \Config\Database::Connect();
        $builder = $db->table('Promocion_Creditos_Cortesia');

        $builder->distinct(
            '
            Promocion_Creditos_Cortesia.idCC,
            Promocion_Creditos_Cortesia.Nombre
            '
        );

        $builder->join(
            'Calendario_Creditos_Cortesia',
            'Promocion_Creditos_Cortesia.idCC = Calendario_Creditos_Cortesia.idCC',
            'Inner'
        );

        $builder ->where('Calendario_Creditos_Cortesia.idEvento',$datos['idEvento']);

        $query = $builder->get();

        $datos = $query->getResultObject();

        return $datos;
    }

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
            Atracciones.idAtraccion,
            Atracciones.Nombre AS Atraccion, 
            Atraccion_Evento.idAtraccionEvento,
            Atraccion_Evento.Creditos,
            Contrato.idContrato,
            Contrato.Nombre AS Contrato,
            Poliza.idPoliza, 
            Poliza.Nombre AS Poliza,
            Zona.idZona,
            Zona.Nombre AS Zona
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
        $builder->join(
            'Zona',
            'Zona.idZona = Atraccion_Evento.idZona',
            'inner'
        );

        $builder->where('Atraccion_Evento.idEvento',$datos['idEvento']);

        $query = $builder->get();
    
        $atracciones = $query->getResultObject();

        /**------------------------------------------------------- */
        $builder = $db->table('Atraccion_Evento');
        
        $builder->select(
            '
            Atraccion_Evento.idAtraccion,
            Promocion_Dos_x_Uno.Nombre
            '
        );

        $builder->join(
            'Atracciones_Incluidas_Dos_x_Uno',
            'Atracciones_Incluidas_Dos_x_Uno.idAtraccionEvento = Atraccion_Evento.idAtraccionEvento',
            'inner'
        );

        $builder->join(
            'Promocion_Dos_x_Uno',
            'Promocion_Dos_x_Uno.idDosxUno = Atracciones_Incluidas_Dos_x_Uno.idDosxUno',
            'inner'
        );

        $builder->where('Atraccion_Evento.idEvento',$datos['idEvento']);

        $query = $builder->get();

        $descuentos = $query->getResultObject();

        /**------------------------------------------------------- */
        $builder = $db->table('Atraccion_Evento');
        
        $builder->select(
            '
            Atraccion_Evento.idAtraccion,
            Promocion_Pulsera_Magica.Nombre
            '
        );

        $builder->join(
            'Atracciones_Incluidas_Pulsera_Magica',
            'Atracciones_Incluidas_Pulsera_Magica.idAtraccionEvento = Atraccion_Evento.idAtraccionEvento',
            'inner'
        );

        $builder->join(
            'Promocion_Pulsera_Magica',
            'Promocion_Pulsera_Magica.idPulseraMagica = Atracciones_Incluidas_Pulsera_Magica.idPulseraMagica',
            'inner'
        );

        $builder->where('Atraccion_Evento.idEvento',$datos['idEvento']);

        $query = $builder->get();

        $pulsera = $query->getResultObject();

        /**------------------------------------------------------- */
        $builder = $db->table('Atraccion_Evento');
        
        $builder->select(
            '
            Atraccion_Evento.idAtraccion,
            Promocion_Juegos_Gratis.Nombre
            '
        );

        $builder->join(
            'Atracciones_Incluidas_Juegos_Gratis',
            'Atracciones_Incluidas_Juegos_Gratis.idAtraccionEvento = Atraccion_Evento.idAtraccionEvento',
            'inner'
        );

        $builder->join(
            'Promocion_Juegos_Gratis',
            'Promocion_Juegos_Gratis.idJuegosGratis = Atracciones_Incluidas_Juegos_Gratis.idJuegosGratis',
            'inner'
        );

        $builder->where('Atraccion_Evento.idEvento',$datos['idEvento']);

        $query = $builder->get();

        $juegos = $query->getResultObject();

        /**------------------------------------------------------- */

        $datos = [
            'Atraccion' => $atracciones,
            'Descuentos' => $descuentos,
            'Pulsera' => $pulsera,
            'Juegos' => $juegos
        ];

        return $datos;
    }

    public function informacion_Atraccion($datos){
        $db = \Config\Database::Connect();

        $builder = $db->table('Promocion_Dos_x_Uno');

        $builder->select(
            '
            Promocion_Dos_x_Uno.idDosxUno,
            Promocion_Dos_x_Uno.Nombre
            '
        );

        $builder->join(
            'Atracciones_Incluidas_Dos_x_Uno',
            'Promocion_Dos_x_Uno.idDosxUno = Atracciones_Incluidas_Dos_x_Uno.idDosxUno',
            'inner'
        );

        $builder->join(
            'Atraccion_Evento',
            'Atracciones_Incluidas_Dos_x_Uno.idAtraccionEvento = Atraccion_Evento.idAtraccionEvento',
            'inner'
        );

        $builder->where('Atraccion_Evento.idAtraccionEvento',$datos['idAtraccionEvento']);

        $query = $builder->get();

        $descuentos = $query->getResultObject();

        /**------------------------------------------------------------------------------- */

        $builder = $db->table('Promocion_Pulsera_Magica');

        $builder->select(
            '
            Promocion_Pulsera_Magica.idPulseraMagica,
            Promocion_Pulsera_Magica.Nombre
            '
        );

        $builder->join(
            'Atracciones_Incluidas_Pulsera_Magica',
            'Atracciones_Incluidas_Pulsera_Magica.idPulseraMagica = Promocion_Pulsera_Magica.idPulseraMagica',
            'inner'
        );

        $builder->join(
            'Atraccion_Evento',
            'Atraccion_Evento.idAtraccionEvento = Atracciones_Incluidas_Pulsera_Magica.idAtraccionEvento',
            'inner'
        );

        $builder->where('Atraccion_Evento.idAtraccionEvento',$datos['idAtraccionEvento']);

        $query = $builder->get();

        $pulsera = $query->getResultObject();

        /**------------------------------------------------------------------------------------ */

        $builder = $db->table('Promocion_Juegos_Gratis');

        $builder->select(
            '
            Promocion_Juegos_Gratis.idJuegosGratis,
            Promocion_Juegos_Gratis.Nombre
            '
        );

        $builder->join(
            'Atracciones_Incluidas_Juegos_Gratis',
            'Atracciones_Incluidas_Juegos_Gratis.idJuegosGratis = Promocion_Juegos_Gratis.idJuegosGratis',
            'inner'
        );

        $builder->join(
            'Atraccion_Evento',
            'Atraccion_Evento.idAtraccionEvento = Atracciones_Incluidas_Juegos_Gratis.idAtraccionEvento',
            'inner'
        );

        $builder->where('Atraccion_Evento.idAtraccionEvento',$datos['idAtraccionEvento']);

        $query = $builder->get();

        $juegos = $query->getResultObject();

        $datos = [
            'Descuentos' => $descuentos,
            'Pulsera' => $pulsera,
            'Juegos' => $juegos
        ];

        return $datos;
    }

    public function mostrar_Zonas_Evento($datos){
        $db = \Config\Database::Connect();
        $builder = $db->table('Zona');

        $builder->select(
            '
            idZona,
            Nombre,
            idEvento
            '
        );

        $builder->where('idEvento',$datos['idEvento']);

        $query = $builder->get();

        $datos = $query->getResultObject();

        return $datos;
    }

    public function mostrar_Taquillas_Evento($datos){
        $db = \Config\Database::Connect();
        $builder =  $db->table('Zona');

        $builder->select(
            '
            Zona.idZona,
            Zona.Nombre AS Zona,
            Taquilla.idTaquilla,
            Taquilla.Nombre
            '
        );

        $builder->join(
            'Taquilla',
            'Zona.idZona = Taquilla.idZona',
            'INNER'
        );

        $builder->where('idEvento',$datos['idEvento']);

        $query = $builder->get();

        $datos = $query->getResultObject();

        return $datos;
    }

    public function mostrar_Ventanilla_Evento($datos){
        $db = \Config\Database::Connect();
        $builder = $db->table('Ventanilla');

        $builder->select(
            '
            Ventanilla.idVentanilla,
            Ventanilla.Nombre,
            Ventanilla.idTaquilla
            '
        );

        $builder->join(
            'Taquilla',
            'Ventanilla.idTaquilla = Taquilla.idTaquilla',
            'INNER'
        );

        $builder->join(
            'Zona',
            'Taquilla.idZona = Zona.idZona',
            'INNER'
        );

        $builder->where('Zona.idEvento',$datos['idEvento']);

        $query = $builder->get();

        $datos = $query->getResultObject();

        return $datos;
    }

    public function mostrarTarjetas($datos){
        $db = \Config\Database::Connect();
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
        $db = \Config\Database::Connect();
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
        $db = \Config\Database::Connect();
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

    public function agregar_Zona_Evento($datos){
        $db = \Config\Database::connect();
        $builder = $db->table('Zona');

        if($builder->insert($datos)){
            return true;
        }
        else{
            return false;
        }
    }

    public function agregar_Taquillas_Evento($datos){
        $db = \Config\Database::connect();
        $builder = $db->table('Taquilla');

        if($builder->insert($datos)){
            return $db->insertID();
        }
        else{
            return false;
        }
    }

    public function agregar_Ventanillas_Evento($datos){
        $db =\Config\Database::connect();
        $builder = $db->table('Ventanilla');

        if($builder->insert($datos)){
            return true;
        }
        else{
            return false;
        }
    }

    public function agregar_Atracciones_Evento($datos){
        $db = \Config\Database::connect();
        $builder = $db->table('Atraccion_Evento');

        if($builder->insert($datos)){
            return $db->insertID();
        }
        else{
            return false;
        }
    }

    public function agregar_Promociones_Atraccion($tabla,$datos){
        $db = \Config\Database::connect();

        $builder = $db->table($tabla);

        if($builder->insert($datos)){
            return true;
        }
        else{
            return false;
        }
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

    public function actualizar_Atraccion_Evento($datos){}

    public function listado_Precios_Por_Evento(){}

    public function listado_Usuarios_Por_Evento(){}

}