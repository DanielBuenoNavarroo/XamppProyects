<?php
require_once './funciones.php';

$data = null;

// Se ejecuta si el metodo de acceso al archivo es post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // comprueba que dentro se haya enviado la variable search si no existe se pone en null
    $search = $_POST['search'] ?? null; 
    // Si $search es nula o está vacia muestra el siguiente mensaje
    if (!$search || empty($search)) {
        echo 'Ingrese un valor valido';
    } else {
        $data = searchContact($search);
    }
} else {
    $data = getAll();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            *+* {
                margin-bottom: 1rem;
            }
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0;
            font-size: 16px;
            font-family: Arial, sans-serif;
            text-align: left;
        }

        thead tr {
            background-color: #27272a;
            color: white;
            text-align: left;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
        }

        .add {
            font-size: 1.5rem;
            font-weight: 600;
            border: 1px solid #00000050;
            border-radius: 1rem;
            transition: all 500ms;
            padding: 1rem;

            &:hover {
                border-color: black;
            }
        }

        a {
            display: inline-block;
            text-decoration: none;
            color: black;
        }
    </style>
</head>

<body>
    <form action="./index.php" method="post">
        <input type="text" name="search" id="search" placeholder="Search...">
        <input type="submit" value="Buscar">
    </form>
    <a class="add" href="./agregar.php">Añadir</a>
    <!-- Confirma si hay datos de lo contrario muestra un mensaje de "no hay datos" -->
    <?php if ($data) { ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Direccion</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Muestra todos los datos obtenidos -->
                <?php foreach ($data as $contacto) { ?>
                    <tr>
                        <td><?= $contacto['id'] ?></td>
                        <td><?= $contacto['nombre'] ?></td>
                        <td><?= $contacto['telefono'] ?></td>
                        <td><?= $contacto['email'] ?></td>
                        <td><?= $contacto['direccion'] ?></td>
                        <td>
                            <a href="./editar.php?id=<?= $contacto['id'] ?>">Editar</a>
                            <a href="./eliminar.php?id=<?= $contacto['id'] ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <h1>No hay datos para mostrar</h1>
    <?php } ?>
</body>

</html>