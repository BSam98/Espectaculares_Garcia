<?php

namespace App\Models;

use CodeIgniter\Model;

class ticket_Model extends Model{


    function buscarTransaccion($idTransaccion){
        $db = \Config\Database::connect();
        $query = $db->query("SELECT t.idTransaccion, t.total, t.fecha, p.idTarjeta, p.idTipoVenta, p.Monto, t2.Nombre,
                        (case when p.idTipoVenta = 0 then 'Tarjeta Nueva' when p.idTipoVenta = 1 then 'Recarga' WHEN p.idTipoVenta =2 then 'Pulsera Mágica' WHEN p.idTipoVenta =3 then 'Recarga Promoción' end) as venta,
                        (SELECT count(*) FROM Pago p WHERE idTransaccion=". $idTransaccion ." and idTipoVenta='0') as tarjetas_Nuevas,
                        (SELECT count(*) FROM Pago p WHERE idTransaccion=". $idTransaccion ." and idTipoVenta='1') as Recargas, 
                        (SELECT count(*) FROM Pago p WHERE idTransaccion=". $idTransaccion ." and idTipoVenta='2') as Promocion_Pulsera_Magica,
                        (SELECT count(*) FROM Pago p WHERE idTransaccion=". $idTransaccion ." and idTipoVenta='3') as Recarga_promo
                        FROM Transaccion t, Pago p , Tarjetas t2 
                        WHERE t.idTransaccion = p.idTransaccion and p.idTarjeta = t2.idTarjeta and t.idTransaccion = ". $idTransaccion ." GROUP BY t.idTransaccion, t.total, t.fecha, p.idTarjeta, p.idTipoVenta, p.Monto, t2.Nombre");
        $query = $query->getResultObject();
        return $query;
    }

}