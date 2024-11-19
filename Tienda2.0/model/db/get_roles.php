<?php
function getRoles()
{
    require_once "./model/db_conex.php";
    $conexion = getConexion();
    $result = $conexion->query("SELECT * FROM roles");
    return $result;
}
