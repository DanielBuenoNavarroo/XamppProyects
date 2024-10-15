<?php
function getRoles()
{
    require_once "./modelPDO/db_conex.php";
    $result = $conexion->query("SELECT * FROM roles");
    return $result ? $result : null;
}
