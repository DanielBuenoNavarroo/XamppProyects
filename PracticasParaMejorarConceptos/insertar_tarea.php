<?php
require_once "./config.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ESTADOS = ["Pendiente", "En Progreso", "Completada"];

    $titulo = $_POST['titulo'] ?? null;
    $description = $_POST['descripcion'] ?? "";
    $estado = $_POST['estado'] ?? null;

    if (!$titulo || !$estado) {
        echo "<script>
            alert('Error en la bbdd: " . $ex->getMessage() . "');
            window.location.href = './mostrar_tareas.php';
        </script>";
        exit();
    }
    try {
        if (!in_array($estado, $ESTADOS)) {
            echo "<script>
                alert('Error en la bbdd: " . $ex->getMessage() . "');
                window.location.href = './mostrar_tareas.php';
            </script>";
            exit();
        }

        $titulo = htmlspecialchars($titulo, ENT_QUOTES, 'UTF-8');
        $description = htmlspecialchars($description, ENT_QUOTES, 'UTF-8');
        $estado = htmlspecialchars($estado, ENT_QUOTES, 'UTF-8');

        $con = conex();
        $stm = $con->prepare('INSERT INTO tareas (titulo, descripcion, estado) VALUES (:titulo , :descripcion , :estado);');
        $stm->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $stm->bindParam(':descripcion', $description, PDO::PARAM_STR);
        $stm->bindParam(':estado', $estado, PDO::PARAM_STR);
        $stm->execute();
        if ($stm->rowCount() > 0) {
            echo "<script>
                alert('Todo OK');
                window.location.href = './mostrar_tareas.php';
            </script>";
        } else {
            echo "<script>
                alert('No se ha podido añadir la tarea');
                window.location.href = './mostrar_tareas.php';
            </script>";
        }
    } catch (PDOException $ex) {
        echo "<script>
            alert('Error en la bbdd: " . $ex->getMessage() . "');
            window.location.href = './mostrar_tareas.php';
        </script>";
    } catch (Exception $ex) {
        echo "<script>
            alert('Error no controlado: " . $ex->getMessage() . "');
            window.location.href = './mostrar_tareas.php';
        </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="./insertar_tarea.php" method="post">
        <label for="titulo">Título</label>
        <input type="text" id="titulo" name="titulo">
        <label for="descripcion">Descripción</label>
        <input type="text" id="descripcion" name="descripcion">
        <select name="estado" id="estado">
            <option value="Pendiente">Pendiente</option>
            <option value="En Progreso">En Progreso</option>
            <option value="Completada">Completada</option>
        </select>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>