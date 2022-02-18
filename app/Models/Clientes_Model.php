<?php

namespace App\Models;

use CodeIgniter\Model;

class Clientes_Model extends Model{

    protected $builder;

    public function _construct(){}

    public function listadoClientes(){

        $db = \Config\Database::connect();
        $builder = $db->table('Clientes');

        $builder-> select(
            '
            idCliente,
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

    public function listadoTarjetas($datos){
        $db = \Config\Database::connect();
        $builder = $db->table('Tarjetas');

        $builder-> select(
            '
            Tarjetas.idTarjeta,
            Tarjetas.Nombre,
            Saldo.SaldoAc,
            Saldo.CreditoN,
            Saldo.CreditoC,
            Saldo.FechaR,
            Saldo.VigenciaS
            '
        );

        $builder->join(
            'Saldo',
            'Saldo.idTarjeta = Tarjetas.idTarjeta',
            'inner'
        );
        $builder->where('Tarjetas.idCliente',$datos['idCliente']);

        $query = $builder->get();
     
        $datos = $query->getResultObject();

        return $datos;
    }
}