<?php
session_start([
                'use_only_cookies' => 1,
                'cookie_lifetime' => 0,
                'cookie_secure' => 1,
                'cookie_httponly' => 1
              ]);
if (!isset($_SESSION['idUsuario'])) { //not logged in
    //redirect to homepage
    //header("Location: https://www.masboletos.mx/proyecto/");
    header("http://localhost/Espectaculares_Garcia/public/");
    exit(); // NOT DIE :P
}