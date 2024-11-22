<?php
require_once "./src/db.php";

try {
    $conexion = getConexion();

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $LIMIT = $_GET["limit"] ?? 10;
        $OFFSET = ($_GET["page"] ?? 0) * $LIMIT;

        $state_id = $_GET["state_id"] ?? null;
        $name = $_GET["name"] ?? null;
        $country_id = $_GET["country_id"] ?? null;
        $id = $_GET["id"] ?? null;

        $query = "SELECT * FROM cities";
        $params = [];
        $conditions = [];

        if ($id) {
            $query .= " WHERE id = :id";
            $params[":id"] = $id;
        } else {
            if ($state_id) {
                $conditions[] = "state_id = :state_id";
                $params[":state_id"] = $state_id;
            }
            if ($name) {
                $conditions[] = "name LIKE :name";
                $params[":name"] = "%$name%";
            }
            if ($country_id) {
                $conditions[] = "country_id = :country_id";
                $params[":country_id"] = $country_id;
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

        echo json_encode([
            "success" => (bool)$data,
            "data" => $data ?: null,
            "message" => $data ? "Datos obtenidos correctamente" : "No se han encontrado datos"
        ]);
    } else {
        echo json_encode([
            "success" => false,
            "data" => null,
            "message" => "El metodo tiene que ser get"
        ]);
    }
} catch (PDOException $e) {
    echo json_encode([
        "success" => false,
        "data" => null,
        "message" => "Error al acceder a la base de datos: " . $e->getMessage()
    ]);
}
