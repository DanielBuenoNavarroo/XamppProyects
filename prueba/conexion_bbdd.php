<?php

//Establecer conexión
$conexion = new mysqli('localhost', 'root', '', 'bd_coches');

// Verificar si hay errores
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}


// Borrar datos
// $resultado = $conexion->query('DELETE FROM t_coches WHERE id_coches = 1');
// if ($resultado) {
//     print "Se han borrado $conexion->affected_rows registros.";
// } else {
//     print "Error al borrar los registros";
// }

// Realizar consultas
$resultado = $conexion->query('SELECT * FROM t_coches', MYSQLI_USE_RESULT);
// while ($fila = $resultado->fetch_assoc()) {
// echo $fila['id_coches'] . "----" . $fila['color']
// }
print_r($fila);

// cerrar la conexion
$conexion->close();
