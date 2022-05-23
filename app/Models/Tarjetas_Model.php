<?php

namespace App\Models;

use CodeIgniter\Model;

class Tarjetas_Model extends Model{
    protected $builder;

    public function  _construct(){}

    public function listadoTarjetas($datos){
        $db = \Config\Database::connect();
        $builder = $db->table('Tarjetas');

        $builder-> select(
            '
            Tarjetas.idTarjeta,
            Tarjetas.Nombre AS Tarjeta,
            Tarjetas.FechaActivacion,
            Status.Iniciales,
            Tarjetas.Tipo,
            Tarjetas.Folio
            '
        );

        $builder->join(
            'Lotes',
            'Lotes.idLote = Tarjetas.idLote',
            'inner'
        );

        $builder->join(
            'Status',
            'Tarjetas.idStatus = Status.idStatus',
            'inner'
        );

        $builder->where('Tarjetas.idLote',$datos['idLote']);

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
            Lotes.Material,
            Lotes.Cantidad,
            Lotes.FechaIngreso,
            Usuarios.Nombre AS Usuario,
            Lotes.FolioInicial,
            Lotes.FolioFinal,
            Lotes.Serie
            '
        );

        $builder -> join(
            'Usuarios',
            'Usuarios.idUsuario = Lotes.idUsuario',
            'inner'
        );

        $query = $builder->get();
     
        $datos = $query->getResultObject();

        return $datos;
    }

    public function listadoEvento(){
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
            FechaFinal'
        );

        $query = $builder->get();
    
        $datos = $query->getResultObject();

        return $datos;          
    }

    public function listadoUsuarios(){
        $db = \Config\Database::connect();
        $builder = $db->table('Usuarios');

        $builder-> select(
            '
            Usuarios.idUsuario,
            Usuarios.Nombre AS UsuarioNombre,
            Usuarios.Apellidos AS UsuarioApellido,
            Usuarios.CorreoE,
            Usuarios.NSS,
            Usuarios.CURP,
            Usuarios.Usuario,
            Usuarios.Contraseña,
            Rangos.Nombre,
            Eventos.Ciudad
            '
        );

        $builder-> join(
            'Rangos',
            'Rangos.idRango = Usuarios.idRango',
            'inner'
        );

        $builder-> join(
            'Eventos',
            'Eventos.idEvento = Usuarios.idEvento',
            'inner'
        );

        $query = $builder->get();
     
        $datos = $query->getResultObject();

        return $datos;
    }

    public function listadoClientes(){

        $db = \Config\Database::connect();
        $builder = $db->table('Clientes');

        $builder-> select(
            '
            Nombre,
            ApellidoP,
            ApellidoM,
            CorreoE,
            Contraseña,
            Telefono,
            Ciudad,
            Estado,
            FechaNacimiento
            '
        );

        $query = $builder->get();
     
        $datos = $query->getResultObject();

        return $datos;
    } 

    public function insertarTarjeta($idLote,$Nombre,$Material,$FechaIngreso,$folioInicial,$folioFinal){

        $db = \Config\Database::connect();
        $numeros = $folioInicial;

        for($i=$folioInicial; $i<=$folioFinal;$i++){
            
            
            $numeros = $i;
            $db->query(
                "INSERT INTO Tarjetas(Nombre, FechaActivacion,Tipo,idLote,Folio,idStatus) 
                VALUES ('Tarjeta $numeros $FechaIngreso','$FechaIngreso','$Material',$idLote,$numeros,1);
                "
            );
        }
   

        return true;
    }

    public function insertarLote($datos){
        $db= \Config\Database::Connect();

        $builder = $db->table('Lotes');

        if( $builder -> insert($datos)){
            return $db->insertID();
        }
        else{
            return False;
        }
    }

    public function actualizarLote($idLote,$datos){
        $db= \Config\Database::Connect();
        $builder = $db->table('Lotes');

        $builder->where('idLote',$idLote);
        $builder->update($datos);

        return 'Funciono';
    }

}