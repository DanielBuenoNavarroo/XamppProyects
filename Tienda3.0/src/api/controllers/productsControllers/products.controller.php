<?php
require_once "./src/db.php";

try {
    $conexion = getConexion();
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $LIMIT = $_GET["limit"] ?? 10;
        $OFFSET = ($_GET["page"] ?? 0) * $LIMIT;
        $name = $_GET['search'] ?? null;
        $category = $_GET['category'] ?? null;
        $id = $_GET['id'] ?? null;

        $products;
        $stm;

        if ($id) {
            $stm = $conexion->prepare("SELECT * FROM productos WHERE id = :id");
            $stm->bindParam(":id", var: $id);
        } elseif ($name || $category) {
            $stm = $conexion->prepare("SELECT * FROM productos WHERE nombre LIKE :search OR descripcion LIKE :search LIMIT :limit OFFSET :offset");
            $name = "%$name%";
            $stm->bindParam(":search", var: $name);
            $stm->bindParam(":limit", $LIMIT, PDO::PARAM_INT);
            $stm->bindParam(":offset", $OFFSET, PDO::PARAM_INT);
        } else {
            $stm = $conexion->prepare("SELECT * FROM productos LIMIT :limit OFFSET :offset");
            $stm->bindParam(":limit", $LIMIT, PDO::PARAM_INT);
            $stm->bindParam(":offset", $OFFSET, PDO::PARAM_INT);
        }
        $stm->execute();
        $products = $stm->fetchAll(PDO::FETCH_ASSOC);
        http_response_code(200);
        header('Content-Type: application/json');
        echo json_encode($products);
    } else {
        http_response_code(200);
    }
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        "message" => "Error al acceder a la base de datos: " . $e->getMessage()
    ]);
}
