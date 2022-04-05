<?php
// Comenzamos a guardar todo el HTML generado en el búffer */
ob_start();
/* A partir de ahora podríamos hacer consultas SQL, generar tablas, cabeceras,
  y casi todo tipo de código HTML que será almacenado para su uso posterior */
?>
<center><img src="Img/logon.png" alt=""></center><br>
        <table width="350px">
            <tbody>
                <tr>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                </tr>
                <tr colspan="3"><label for="">Tarjeta</label></tr>
                <tr>
                    <td>Promo</td>
                    <td>1</td>
                    <td>250</td>
                </tr>
            </tbody>
        </table>