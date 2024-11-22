<?php
require_once "./src/db.php";

try {
    $conexion = getConexion();
    $message = "";
    $status = 0;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $input = json_decode(file_get_contents("php://input"));

        $nombre = $input->nombre ?? "";
        $email = $input->email ?? "";
        $password = $input->password ?? "";

        if (!empty($nombre) && !empty($email) && !empty($password)) {
            $hashedPassword = hash("sha256", $password);

            $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            if (!$stmt->rowCount()) {
                $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, email, password, rol_id) VALUES (:nombre, :email, :password, 3)");
                $stmt->bindParam(':nombre', $nombre);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $hashedPassword);

                if ($stmt->execute()) {
                    http_response_code(201);
                    echo json_encode([
                        "message" => "Correo registrado correctamente"
                    ]);
                    exit();
                } else {
                    $status = 500;
                    $message = 'Error al registrar al usuario';
                }
            } else {
                $status = 401;
                $message = 'El correo ya existe';
            }
        } else {
            $status = 400;
            $message = 'Faltan campos por rellenar: ' . implode(', ', array_keys(array_filter(['nombre' => $nombre, 'email' => $email, 'password' => $password], fn($val) => empty($val))));
        }
    } else {
        $status = 405;
        $message = "El metodo tiene que ser POST";
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
