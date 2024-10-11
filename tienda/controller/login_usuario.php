<?php
session_start();
require_once("modelo/conexion_bd.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["email"]) && !empty($_POST["password"])) {
        $email = $_POST["email"];
        $password = hash("sha256", $_POST["password"]);

        $select_sql = <<<SQL
        SELECT `usuarios`.`id`,`usuarios`.`nombre` FROM `tienda`.`usuarios` WHERE `usuarios`.`email` = '$email' AND `usuarios`.`password` = '$password';
        SQL;
        $result = $base_datos->query($select_sql);
        if ($user = $result->fetch_object()){
            echo "<div class='alert alert-success'>Usuario encontrado éxito</div>";
            $_SESSION["usuario"]= $user;
            header("Location:index.php");
        } else
            echo "<div class='alert alert-danger'>Usuario no encontrado</div>";
    } else
        echo "<div class='alert alert-danger'>Faltan campos por rellenar</div>";
}