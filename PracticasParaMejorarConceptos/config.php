<?php

function conex()
{
    $dsn = "mysql:host=localhost;dbname=gestion_tareas";
    $usuario_bd = "root";
    $pass_bd = "1a2s"; // casa
    // $pass_bd = ""; // clase
    $options = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"];
    try {
        $conexion = new PDO($dsn, $usuario_bd, $pass_bd, $options);
        return $conexion;
    } catch (PDOException $e) {
        throw $e; // Aqui hago un throw, para manejar mejor el error donde se llame a esta función.
    }
}
