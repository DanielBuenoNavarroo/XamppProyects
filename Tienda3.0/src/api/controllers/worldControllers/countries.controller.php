<?php
require_once "./src/db.php";

try {
    $conexion = getConexion();

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $LIMIT = $_GET["limit"] ?? 10;
        $OFFSET = ($_GET["page"] ?? 0) * $LIMIT;

        $name = $_GET["name"] ?? null;
        $iso2 = $_GET["iso2"] ?? null;
        $iso3 = $_GET["iso3"] ?? null;
        $id = $_GET["id"] ?? null;

        $query = "SELECT * FROM countries";
        $params = [];

        if ($id) {
            $query .= " WHERE id = :id";
            $params[":id"] = $id;
        } else {
            $conditions = [];

            if ($name) {
                $conditions[] = "name LIKE :name";
                $params[":name"] = "%$name%";
            }
            if ($iso2) {
                $conditions[] = "iso2 = :iso2";
                $params[":iso2"] = $iso2;
            }
            if ($iso3) {
                $conditions[] = "iso3 = :iso3";
                $params[":iso3"] = $iso3;
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
