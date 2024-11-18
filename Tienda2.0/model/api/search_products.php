<?php
require_once "./model/db_conex.php";
$conexion = getConnection();
$query = isset($_GET['search']) ? ('%' . $_GET['search'] . '%') : "";
if ($query != "") {
    $stm = $conexion->prepare("SELECT * FROM productos WHERE nombre LIKE :search OR descripcion LIKE :search");
    $stm->bindParam(":search", var: $query);
    $stm->execute();
    $products = $stm->fetchAll(PDO::FETCH_ASSOC);
    header('Content-Type: application/json');
    echo json_encode($products);
} else {
    header('Content-Type: application/json');
    echo json_encode(['error' => 'No search query provided']);
}
