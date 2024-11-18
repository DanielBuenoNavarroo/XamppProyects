<?php
require_once "./model/db_conex.php";
$conexion = getConnection();
$LIMIT = 10;
$OFFSET = ($_GET["page"] ?? 0) * $LIMIT;

$name = $_GET["name"] ?? "";
$iso2 = $_GET["iso2"] ?? "";
$iso3 = $_GET["iso3"] ?? "";

$count = count(array_filter([$name, $iso2, $iso3]));

header('Content-Type: application/json');
if ($count == 0) {
    $stm = $conexion->prepare("SELECT * FROM countries LIMIT $LIMIT OFFSET :offset");
    $stm->bindParam(":offset", $OFFSET, PDO::PARAM_INT);
    $stm->execute();
    $countries = $stm->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode(["success" => (bool)$countries, "data" => $countries, "message" => $countries ? "Datos obtenidos correctamente" : "Fallo al obtener los datos"]);
} elseif ($count >= 2) {
    echo json_encode(["success" => false, "data" => null, "message" => "Solo puedes pasar un parametro: name | iso2 | iso3"]);
} else {
    if ($name) {
        $name = "%$name%";
        $stm = $conexion->prepare("SELECT * FROM countries WHERE LOWER(name) LIKE :name ORDER BY id ASC LIMIT $LIMIT OFFSET :offset");
        $stm->bindParam(":name", $name);
        $stm->bindParam(":offset", $OFFSET, PDO::PARAM_INT);
        $stm->execute();
        $countries = $stm->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode(["success" => (bool)$countries, "data" => $countries, "message" => $countries ? "Datos obtenidos correctamente" : "No se han encontrado datos"]);
    } elseif ($iso2) {
        $stm = $conexion->prepare("SELECT * FROM countries WHERE iso2 = :iso2");
        $stm->bindParam(":iso2", $iso2);
        $stm->execute();
        $country = $stm->fetch(PDO::FETCH_ASSOC);
        echo json_encode(["success" => (bool)$country, "data" => $country ? $country : null, "message" => $country ? "Datos obtenidos correctamente" : "No se han encontrado datos"]);
    } else echo json_encode(["success" => false, "message" => "Faltan parámetros."]);
}
