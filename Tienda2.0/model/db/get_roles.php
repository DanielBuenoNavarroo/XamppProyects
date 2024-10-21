<?php
function getRoles()
{
    require_once "./model/db_conex.php";
    $conexion = getConnection();
    $result = $conexion->query("SELECT * FROM roles");
    return $result ? $result : null;
}
