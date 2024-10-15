<?php
require_once "env.php";
try {
    $conexion = new PDO($dsn, $usuario_bd, $pass_bd, $options);
} catch (PDOException $e) {
    echo "Error de conexion: " . $e->getMessage();
}
