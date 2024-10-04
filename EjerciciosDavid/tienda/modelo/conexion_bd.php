<?php
    require_once("variables_entorno.php");
    $base_datos = new mysqli($host, $usuario_bd, $pass_bd, $nombre_bd);
    
    // Verificar conexión
    if ($base_datos->connect_error) {
        die("Error en la conexión: " . $mysqli->connect_error);
    }else{
        echo "Hola estoy conectado";
    }
?>