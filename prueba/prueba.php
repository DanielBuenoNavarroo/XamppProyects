<?php

$titulo = "Titulo xd";
$nombre = "Daniel Bueno Navarro";
$edad = 20;
$ciudad = 'Madrid';
$lenguajes_de_programacion = array('javascript', 'java', 'kotlin');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo ?></title>
</head>

<body>
    <h1><?php echo $nombre ?></h1>
    <p>Edad: <?php echo $edad ?></p>
    <p>Ciudad: <?php $ciudad ?></p>
    <?php
    foreach ($lenguajes_de_programacion as $lenguaje) {
        echo "<li>$lenguaje</li>";
    }
    ?>
</body>

</html>