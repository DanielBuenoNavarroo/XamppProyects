<?php
require_once "./model/db_conex.php";

try {
    $conexion = getConexion();

    $LIMIT = ($_GET["limit"] ?? 10);
    $OFFSET = ($_GET["page"] ?? 0) * $LIMIT;
    
    $country_id = $_GET["country_id"] ?? null;
    $name = $_GET["name"] ?? null;
    $country_code = $_GET["country_code"] ?? null;
    $id = $_GET["id"] ?? null;

    $query = "SELECT * FROM states";
    $params = [];
    $conditions = [];

    if ($id) {
        $query .= " WHERE id = :id";
        $params[":id"] = $id;
    } else {
        if ($country_id) {
            $conditions[] = "country_id = :country_id";
            $params[":country_id"] = $country_id;
        }
        if ($name) {
            $conditions[] = "name LIKE :name";
            $params[":name"] = "%$name%";
        }
        if ($country_code) {
            $conditions[] = "country_code = :country_code";
            $params[":country_code"] = $country_code;
        }

        if (!empty($conditions)) {
            $query .= " WHERE " . implode(" AND ", $conditions);
        }
    }

    $query .= " ORDER BY id ASC LIMIT :limit OFFSET :offset";

    $stm = $conexion->prepare($query);

    foreach ($params as $key => $value) {
        $stm->bindValue($key, $value);
    }

    $stm->bindValue(":limit", $LIMIT, PDO::PARAM_INT);
    $stm->bindValue(":offset", $OFFSET, PDO::PARAM_INT);

    $stm->execute();
    $data = $stm->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: application/json');
    echo json_encode([
        "success" => (bool)$data,
        "data" => $data ?: null,
        "message" => $data ? "Datos obtenidos correctamente" : "No se han encontrado datos"
    ]);
} catch (PDOException $e) {
    header('Content-Type: application/json');
    echo json_encode([
        "success" => false,
        "data" => null,
        "message" => "Error al acceder a la base de datos: " . $e->getMessage()
    ]);
}
