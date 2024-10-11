<?php
require_once("modelo/conexion_bd.php");
$result = $base_datos->query("SELECT `roles`.`id`, `roles`.`nombre`, `roles`.`descripcion` FROM `tienda`.`roles`");
while ($rol = $result->fetch_assoc()) 
    echo "<option value='" . $rol["id"] . "'>" . $rol["nombre"] . "</option>";
$base_datos->close();
