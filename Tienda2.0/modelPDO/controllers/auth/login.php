<?php
require_once "./modelPDO/db_conex.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["email"]) && !empty($_POST['password'])) {
        $email = $_POST["email"];
        $password = hash("sha256", $_POST["password"]);
        $sql = "";
        $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE email = :email AND password = :password");
        $stmt->bindParam(':email', $email);
        $stmt->bindparam(':password', $password);
        if ($stmt->execute()->rowCount() > 0) {
            session_start();
            $_SESSION["user"] = $user;
            header("Location: " . $baseRoute);
        } else $message = 'Usuario o contraseña incorrectos';
    } else $message = 'Faltan campos por rellenar';
}