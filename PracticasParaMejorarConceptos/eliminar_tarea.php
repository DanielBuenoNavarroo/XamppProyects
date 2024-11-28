<?php
require_once "./config.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ESTADOS = ["Pendiente", "En Progreso", "Completada"];

    $id = ($_POST['id'] ?? null) + 0;

    try {
        if (!$id) {
            echo "<script>
                alert('Falta el ID');
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

        $con = conex();
        $stm = $con->prepare('DELETE from tareas WHERE id = :id;');
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
            if ($stm->rowCount() == 0) {
                echo "<script>
                    alert('No hay tareas con el id " . $id . "');
                    window.location.href = './mostrar_tareas.php';
                </script>";
            }
        } else {
            echo "<script>
                alert('Falta el id');
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
    <style>
        body{
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
        }
        a{
            display: inline-block;
            color: white;
            text-decoration: none;
            border: solid 1px;
            border-radius: 1rem;
            padding: .5rem 1rem;
            cursor: pointer;
            background-color: lightcoral;

            &:hover{
                background-color: red;
            }
        }

        input{
            color: white;
            text-decoration: none;
            border: solid 1px;
            border-radius: 1rem;
            padding: .5rem 1rem;
            cursor: pointer;
            background-color: lightgreen;

            &:hover{
                background-color: green;
            }
        }
    </style>
</head>

<body>
    <h1>Seguro que quieres eliminar la tarea <?php echo $id ?>?</h1>
    <form action="./eliminar_tarea.php" method="POST">
        <input type="number" id="id" name="id" hidden value="<?php echo $id ?>">
        <input type="submit" value="Eliminar">
    </form>
    <a href="./mostrar_tareas.php">Cancelar</a>
</body>

</html>