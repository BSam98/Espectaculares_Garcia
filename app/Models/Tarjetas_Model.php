<?php

namespace App\Models;

use CodeIgniter\Model;

class Tarjetas_Model extends Model{
    protected $builder;

    public function  _construct(){}

    public function listadoTarjetas(){
        $db = \Config\Database::connect();
        $builder = $db->table('Tarjetas');

        $builder-> select(
            '
            Tarjetas.QR,
            Tarjetas.Nombre AS Tarjeta,
            Tarjetas.FechaActivacion,
            Tarjetas.Status,
            Tarjetas.Tipo,
            Clientes.Nombre AS Cliente,
            Lotes.Nombre AS Lote,
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

        $query = $builder->get();
     
        $datos = $query->getResultObject();

        return $datos;
    }

    public function listadoLotes(){
        $db = \Config\Database::connect();
        $builder = $db->table('Lotes');

        $builder-> select(
            '
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

}