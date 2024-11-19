<?php
function getProducts($ofset)
{
    require_once "./model/db_conex.php";
    $conexion = getConexion();
    $result = $conexion->query("SELECT * FROM productos LIMIT 10 OFFSET $ofset");
    return $result ? $result : null;
}
