<?php
require_once "env.php";
$base_datos = new mysqli($host, $usuario_bd, $pass_bd, $nombre_bd);
if ($base_datos->connect_error)
    die("Error en la conexión: " . $mysqli->connect_error);
else {
}
