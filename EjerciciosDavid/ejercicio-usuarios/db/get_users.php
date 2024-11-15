<?php
function getUsers($ofset)
{
    require_once "conex.php";
    $conexion = getConnection();
    $result = $conexion->query("SELECT * FROM usuarios LIMIT 10 OFFSET $ofset");
    return $result;
}
