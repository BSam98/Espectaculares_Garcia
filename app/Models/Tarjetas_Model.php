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
            Tarjetas.QR,
            Tarjetas.Nombre AS Tarjeta,
            Tarjetas.FechaActivacion,
            Tarjetas.Status,
            Tarjetas.Tipo,
            Clientes.Nombre AS Cliente,
            Eventos.Ciudad,
            Tarjetas.Folio
            '
        );

        $builder-> join(
            'Clientes',
            'Clientes.idCliente = Tarjetas.idCliente',
            'inner'
        );

        $builder->join(
            'Lotes',
            'Lotes.idLote = Tarjetas.idLote',
            'inner'
        );

        $builder-> join(
            'Eventos',
            'Eventos.idEvento = Tarjetas.idEvento',
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

    public function insertarTarjeta($datos){
        $numeros =0;

            for($i=$datos['FolioInicial']; $i<=$datos['FolioFinal'];$i++){
                $numeros++;
            }
   

        return $numeros;
    }

    public function insertarLote($datos){
        $db= \Config\Database::Connect();

        /*
        $db->query(
            "INSERT INTO Lotes (
                Nombre,
                Material,
                Cantidad,
                FechaIngreso,
                idUsuario,
                FolioInicial,
                FolioFinal,
                Serie
            )
            VALUES (
                '$datos[Nombre]',
                '$datos[Material],
                $datos[Cantidad],
                '$datos[FechaIngreso]',
                $datos[idUsuario],
                $datos[FolioInicial],
                $datos[FolioFinal],
                '$datos[Serie]'
            );
            SELECT <SCOPE_IDENTITY></SCOPE_IDENTITY>
            ");

        */

        $builder = $db->table('Lotes');

        if( $builder -> insert($datos)){
            return $db->insertID();
        }
        else{
            return False;
        }
    }

}