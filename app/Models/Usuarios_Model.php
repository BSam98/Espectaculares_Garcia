<?php

namespace App\Models;

use CodeIgniter\Model;

class Usuarios_Model extends Model{

    protected $builder;

    public function _construct(){}

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

    public function listadoRango(){
        $db = \Config\Database::connect();
        $builder = $db->table('Rangos');

        $builder-> select(
            '
            Rangos.idRango,
            Rangos.Nombre
            '
        );

        $query = $builder->get();
     
        $datos = $query->getResultObject();

        return $datos;
    }

    
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
            FechaFinal'
        );

        $query = $builder->get();
    
        $datos = $query->getResultObject();

        return $datos;        
    }

    public function insertarUsuario(array $datos){
        $db= \Config\Database::Connect();

        $db->query(
            "INSERT INTO Usuarios (Nombre,Apellidos,CorreoE,NSS,CURP,Usuario,Contraseña,idRango,idEvento) 
            VALUES('$datos[Nombre]','$datos[Apellidos]','$datos[CorreoE]',$datos[NSS],'$datos[CURP]','$datos[Usuario]',CAST('$datos[Contraseña]' AS VARBINARY(32)),$datos[idRango],$datos[idEvento]);");

        return 'Funciono';
    }

    public function actualizarUsuario(array $datos,$idUsuario){
        $db= \Config\Database::Connect();
        $db->query("UPDATE Usuarios SET Nombre ='$datos[Nombre]', Apellidos='$datos[Apellidos]',CorreoE='$datos[CorreoE]',NSS=$datos[NSS], CURP='$datos[CURP]',Usuario='$datos[Usuario]',Contraseña = CAST('$datos[Contraseña]' AS VARBINARY(32)), idRango = $datos[idRango],idEvento=$datos[idEvento] WHERE idUsuario = $idUsuario");
        
        return 'Funciono';
    }

    
   
}