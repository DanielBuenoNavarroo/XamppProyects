<?php
require_once("modelo/conexion_bd.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["nombre"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $password = hash("sha256", $_POST["password"]);
        $rol = $_POST["id_rol"];
        $insert_sql = $base_datos->prepare("INSERT INTO `tienda`.`usuarios` (`nombre`,`email`,`password`,`rol_id`,`fecha_registro`) VALUES (?,?,?,?,NOW())");
        $insert_sql->bind_param("sssi",$nombre,$email,$password,$rol);
        require_once("comp_exis_usuario.php");

        if ($result)
            echo "<div class='alert alert-success'>Usuario agregado con éxito</div>";
    } else
        echo "<div class='alert alert-danger'>Faltan campos por rellenar</div>";
}
