<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 3rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 16px;
            text-align: left;

            a {
                width: 6rem;
                text-align: center;
                display: inline-block;
                color: white;
                text-decoration: none;
                border: solid 1px black;
                border-radius: 1rem;
                padding: .3rem 1rem;
                cursor: pointer;
                transition-duration: 300ms;
            }

            .editar {
                background-color: lightgreen;

                &:hover {
                    background-color: green;
                }
            }

            .eliminar {
                background-color: lightcoral;

                &:hover {
                    background-color: red;
                }
            }
        }

        thead tr {
            background-color: #4CAF50;
            color: white;
            text-align: left;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
        }

        tbody tr {
            transition-duration: 500ms;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tbody tr:hover {
            background-color: #ddd;
        }

        th {
            padding-top: 10px;
            padding-bottom: 10px;
        }

        td {
            vertical-align: top;
        }

        .actions {
            min-width: 10rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1rem;
        }

        .nueva_tarea {
            font-weight: bold;
            width: 10rem;
            color: black;
            text-align: center;
            display: inline-block;
            text-decoration: none;
            padding: 1rem 1.5rem;
            cursor: pointer;
            border: solid 1px transparent;
            transition-duration: 500ms;

            &:hover {
                border-color: black;
                border-radius: 1rem;
            }
        }
    </style>
</head>

<body>
    <?php
    require_once "./config.php";
    try {
        $con = conex();
        $stm = $con->prepare('SELECT * FROM tareas');
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        if ($result) { ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titulo</th>
                        <th>Descripción</th>
                        <th>Estado</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($result as $item) {
                        echo "<tr>
                                <td>{$item['id']}</td>
                                <td>{$item['titulo']}</td>
                                <td>{$item['descripcion']}</td>
                                <td>{$item['estado']}</td>
                                <td class='actions'>
                                    <a class='editar' href='./editar_tarea.php?id=" . $item['id'] . "'>Editar</a>
                                    <a class='eliminar' href='./eliminar_tarea.php?id=" . $item['id'] . "'>Eliminar</a>
                                </td>
                            </tr>";
                    }
                    ?>
                </tbody>
            </table>
        <?php } else { ?>
            <h1 style="margin-top: 1rem;">No hay datos para mostrar</h1>
        <?php } ?>
        <a class="nueva_tarea" href="./insertar_tarea.php">Nueva tarea</a>
    <?php } catch (PDOException $ex) {
        echo "<script>
            alert('Error en la bbdd: " . $ex->getMessage() . "');
        </script>";
    } catch (Exception $ex) {
        echo "<script>
            alert('Error no controlado: " . $ex->getMessage() . "');
        </script>";
    }
    ?>
</body>

</html>