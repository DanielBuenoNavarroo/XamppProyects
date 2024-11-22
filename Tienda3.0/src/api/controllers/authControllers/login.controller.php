<?php
require_once "./src/db.php";

try {
    $conexion = getConexion();
    $message = "";
    $status = 0;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $input = json_decode(file_get_contents("php://input"));

        $email = $input->email ?? "";
        $password = $input->password ?? "";

        if (!empty($email) && !empty($password)) {
            $hashedPassword = hash("sha256", $password);
            $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE email = :email AND password = :password");
            $stmt->bindParam(':email', $email);
            $stmt->bindparam(':password', $hashedPassword);
            $res = $stmt->execute();
            if ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
                session_start();
                $_SESSION['user'] = $user;
                http_response_code(200);
                echo json_encode([
                    "user" => $user,
                ]);
                exit();
            } else {
                $status = 401;
                $message = 'Usuario o contraseña incorrectos';
            }
        } else {
            $status = 400;
            $message = 'Faltan campos por rellenar: ' . implode(', ', array_keys(array_filter(['email' => $email, 'password' => $password], fn($val) => empty($val))));
        }
    } else {
        $status = 405;
        $message = 'El metodo tiene que ser POST';
    }

    http_response_code($status);
    echo json_encode([
        "message" => $message
    ]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        "message" => "Error al acceder a la base de datos: " . $e->getMessage()
    ]);
}
