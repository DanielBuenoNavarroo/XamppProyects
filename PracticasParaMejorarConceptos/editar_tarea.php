<?php
require_once "./config.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ESTADOS = ["Pendiente", "En Progreso", "Completada"];

    $id = ($_POST['id'] ?? null) + 0;
    $titulo = $_POST['titulo'] ?? null;
    $description = $_POST['descripcion'] ?? "";
    $estado = $_POST['estado'] ?? null;

    if (!$titulo || !$estado || !$id) {
        echo "<script>
            alert('Faltan datos: " . $titulo ?: 'falta titulo, ' . $description ?: 'falta description, ' . $id ?: 'falta id'  .  "'');
            window.location.href = './mostrar_tareas.php';
        </script>";
        exit();
    }
    try {
        if (!in_array($estado, $ESTADOS)) {
            echo "<script>
                alert('Valor del estado incorrecto: Pendiente | En Progreso | Completada');
                window.location.href = './mostrar_tareas.php';
            </script>";
            exit();
        }
        if (!is_int($id)) {
            echo "<script>
                alert('El id tiene que ser un numero entero');
                window.location.href = './mostrar_tareas.php';
            </script>";
            exit();
        }

        $titulo = htmlspecialchars($titulo, ENT_QUOTES, 'UTF-8');
        $description = htmlspecialchars($description, ENT_QUOTES, 'UTF-8');
        $estado = htmlspecialchars($estado, ENT_QUOTES, 'UTF-8');

        $con = conex();
        $stm = $con->prepare('UPDATE tareas SET titulo = :titulo, descripcion = :descripcion, estado = :estado WHERE id = :id;');
        $stm->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $stm->bindParam(':descripcion', $description, PDO::PARAM_STR);
        $stm->bindParam(':estado', $estado, PDO::PARAM_STR);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        $stm->execute();
        if ($stm->rowCount() > 0) {
            echo "<script>
                alert('Todo OK');
                window.location.href = './mostrar_tareas.php';
            </script>";
        } else {
            echo "<script>
                alert('No se ha podido actualizar la tarea');
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
    exit();
} else {
    try {
        $id = ($_GET['id'] ?? null) + 0;

        if ($id) {
            if (!is_int($id)) {
                echo "<script>
                    alert('El id tiene que ser un numero entero');
                    window.location.href = './mostrar_tareas.php';
                </script>";
                exit();
            }
            $con = conex();
            $stm = $con->prepare('SELECT * FROM tareas WHERE id = :id');
            $stm->bindParam(':id', $id, PDO::PARAM_INT);
            $stm->execute();
            $result = $stm->fetch(PDO::FETCH_ASSOC);
            if (!$result) {
                echo "<script>
                    alert('No hay tareas con el id " . $id . "');
                    window.location.href = './mostrar_tareas.php';
                </script>";
            }
        } else {
            echo "<script>
                alert('Faltan datos');
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
    <h1>Editar</h1>
    <form action="./editar_tarea.php" method="POST">
        <input type="number" id="id" name="id" hidden value="<?php echo $result["id"] ?>">
        <label for="titulo">Título</label>
        <input type="text" id="titulo" name="titulo" value="<?php echo $result["titulo"] ?>">
        <label for="descripcion">Descripción</label>
        <input type="text" id="descripcion" name="descripcion" value="<?php echo $result["descripcion"] ?>">
        <select name="estado" id="estado">
            <option value="Pendiente" <?php if ($result["estado"] == "Pendiente") echo 'selected' ?>>Pendiente</option>
            <option value="En Progreso" <?php if ($result["estado"] == "En Progreso") echo 'selected' ?>>En Progreso</option>
            <option value="Completada" <?php if ($result["estado"] == "Completada") echo 'selected' ?>>Completada</option>
        </select>
        <input type="submit" value="Enviar">
    </form>
</body>

</html>