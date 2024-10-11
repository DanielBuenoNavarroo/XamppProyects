<?php
$select = <<<SQL
SELECT id FROM `tienda`.`usuarios` WHERE `email` = '$email';
SQL;

$id_user = $base_datos->query($select);

if ($id_user->num_rows > 0) {
    echo "<div class='alert alert-danger'>El correo ya existe</div>";
    $result = false;
} else {
    $result = $insert_sql->execute();
}
