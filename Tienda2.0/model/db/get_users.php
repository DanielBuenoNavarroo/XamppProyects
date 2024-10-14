<?php
function getUsers($ofset)
{
    require_once "./model/db_conex.php";
    $result = $base_datos->query("SELECT * FROM `tienda`.`usuarios` LIMIT 10 OFFSET $ofset");
    if ($result) {
        $users = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        $users = false;
    }

    $base_datos->close();

    return $users;
}

function getUsersPDO() {
    
}
