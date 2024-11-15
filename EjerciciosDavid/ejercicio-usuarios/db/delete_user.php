<?php 
function DelUsers($id)
{
    require_once "conex.php";
    $conexion = getConnection();
    $result = $conexion->query("DELETE FROM usuarios WHERE id = $id");
    return $result;
}
