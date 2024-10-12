<?php

require_once "./model/db_conex.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["email"]) && !empty($_POST["password"])) {
        $email = $_POST["email"];
        $password = hash("sha256", $_POST["password"]);
        $select_sql = $base_datos->prepare("SELECT * FROM `usuarios` WHERE email = ? AND password = ? ");
        $select_sql->bind_param("ss", $email, $password);
        $select_sql->execute();
        $result = $select_sql->get_result();
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            session_start();
            $_SESSION["user"] = $user;
            header("Location: " . $baseRoute);
        } else {
            echo "<div class=" . $error_style . ">Usuario o contraseña incorrectos</div>";
        }
    } else {
        echo "<div class=" . $error_style . ">Faltan campos por rellenar</div>";
    }
}
