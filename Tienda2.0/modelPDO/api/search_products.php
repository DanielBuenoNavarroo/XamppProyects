<?php
require_once "./modelPDO/db_conex.php";
$query = isset($_GET['search']) ? ('%' . $_GET['search'] . '%') : "";
if ($query != "") {
    $stm = $conexion->prepare("SELECT * FROM productos WHERE nombre LIKE :search OR descripcion LIKE :search");
    $stm->bindParam(":search", $query);
    $stm->execute();
    $products = $stm->fetchAll(PDO::FETCH_ASSOC);
    header('Content-Type: application/json');
    echo json_encode($products);
} else {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'No search query provided']);
}
