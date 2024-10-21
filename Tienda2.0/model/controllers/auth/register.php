<?php
require_once "./model/db_conex.php";
$conexion = getConnection();
if ($_SERVER["REQUEST_METHOD"] == "POST")
    if (!empty($_POST["nombre"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $password = hash("sha256", $_POST["password"]);
        $rol = $_POST["id_rol"];
        $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        if (!$stmt->rowCount()) {
            $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, email, password, rol_id) VALUES (:nombre, :email, :password, :rol)");
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':rol', $rol);
            if ($stmt->execute()) {
                header("Location: " . $baseRoute . 'auth?view=login');
            } else $message = 'Error al registrar el usuario';
        } else $message = 'El correo ya existe';
    } else $message = 'Faltan campos por rellenar';
