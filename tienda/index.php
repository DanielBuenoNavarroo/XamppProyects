<?php
// https://www.freecodecamp.org/news/how-to-build-a-routing-system-in-php/
$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case "":
    case '/':
        require __DIR__ . '/views/home.php';
        break;

    case 'views/login':
        require __DIR__ . '/views/login.php';
        break;

    case 'views/register':
        require __DIR__ . '/views/registro.php';
        break;

    case 'views/products':
        break;
}

// session_start();
// if (!isset($_SESSION["usuario"]))
//     header("Location: login.php");

// echo "<h1> Hola soy " . $_SESSION["usuario"]->nombre . "</h1>";
// echo "<a href='cerrar_session.php'>Cerrar Sesión</a>";

$index = 1
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            width: 100vw;
            height: 100vh;
            background: #202020;

            nav {
                width: 100%;
                display: flex;
                justify-content: center;
                gap: 1rem;
                padding: 1rem;

                button {
                    padding: .5rem 4rem;
                }
            }
        }
    </style>
</head>

<body>
    <div style="background-color: white;">
        <?php
        echo
        '<nav>
            <button onclick="">1</button>
            <button onclick="">2</button>
            <button onclick="">3</button>
            <button onclick="">4</button>
        </nav>';
        ?>
    </div>
    <div>
        <?php require('home.php') ?>
    </div>
</body>

</html>