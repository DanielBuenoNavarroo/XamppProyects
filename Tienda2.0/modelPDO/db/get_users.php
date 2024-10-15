<?php
function getUsers($ofset)
{
    require_once "./modelPDO/db_conex.php";
    $result = $conexion->query("SELECT * FROM usuarios LIMIT 10 OFFSET $ofset");
    return $result ? $result : null;
}
