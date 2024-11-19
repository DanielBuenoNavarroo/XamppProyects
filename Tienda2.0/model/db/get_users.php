<?php
function getUsers($ofset)
{
    require_once "./model/db_conex.php";
    $conexion = getConexion();
    $result = $conexion->query("SELECT * FROM usuarios LIMIT 10 OFFSET $ofset");
    return $result;
}
