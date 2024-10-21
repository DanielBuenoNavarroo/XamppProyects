<?php
function getConnection()
{
    $dsn = "mysql:host=localhost;dbname=tienda";
    $usuario_bd = "root";
    $pass_bd = "1a2s"; // casa
    // $pass_bd = ""; // clase
    $options = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"];

    try {
        $conexion = new PDO($dsn, $usuario_bd, $pass_bd, $options);
        return $conexion;
    } catch (PDOException $e) {
        echo "Error en la conexión: " . $e->getMessage();
        return null;
    }
}
