<?php
$host = "localhost";
$nombre_bd = "tienda";
$usuario_bd = "root";
$pass_bd = "";

$base_datos = new mysqli($host, $usuario_bd, $pass_bd, $nombre_bd);
if ($base_datos->connect_error)
    die("Error en la conexión: " . $mysqli->connect_error);

$result = $base_datos->query("SELECT * FROM `tienda`.`usuarios`");
if ($result) {
    $productos = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $productos = false;
}

$base_datos->close();

foreach ($result as $userData) {
    echo '<table><tbody>
        <tr>
            <th scope="row">' . $userData['id'] . '</th>
            <td>' . $userData['nombre'] . '</td>
            <td>' . $userData['email'] . '</td>
            <td>' . $userData['rol_id'] . '</td>
            <td>' . $userData['fecha_registro'] . '</td>
            <td>
                <a href="?id=' . $userData['id'] . '" >
                    Edit
                </a>
            </td>
        </tr>
    </tbody>
    </table>';
}
echo '<div>

</div>';
