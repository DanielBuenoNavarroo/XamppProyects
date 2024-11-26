<?php
require_once "./config.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'] ?? null;
    $description = $_POST['descripcion'] ?? null;
    $estado = $_POST['estado'] ?? null;

    if(!$titulo || !$estado){
        header("location: ");
    }
    try{
        $con = getConexion();
        $stm = $con->prepare('INSERT INTO tareas (titulo, descripcion, estado) VALUES (:titulo , :descripcion , :estado);');
        $stm->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $stm->bindParam(':descripcion', $description, PDO::PARAM_STR);
        $stm->bindParam(':estado', $estado, PDO::PARAM_STR);
    } catch(PDOException $ex) {

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
    <form action="/XamppProyects/PracticasParaMejorarConceptos/insertar_tarea.php" method="post">
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
