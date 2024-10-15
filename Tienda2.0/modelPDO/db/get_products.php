<?php
function getProducts($ofset)
{
    require_once "./modelPDO/db_conex.php";
    $result = $conexion->query("SELECT * FROM productos LIMIT 10 OFFSET $ofset");
    return $result ? $result : null;
}
