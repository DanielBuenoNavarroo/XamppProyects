<?php
function getProducts($ofset)
{
    require_once "./model/db_conex.php";
    $result = $base_datos->query("SELECT * FROM `tienda`.`productos` LIMIT 10 OFFSET $ofset");
    if ($result) {
        $productos = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        $productos = false;
    }

    $base_datos->close();

    return $productos;
};
