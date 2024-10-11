<?php



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        div {
            width: 100%;
            display: flex;
            justify-content: space-between;

            li {
                list-style: none;
            }
        }
    </style>
    <script>
        const handleClick = () => {
            window.location = 'login.php'
        }
    </script>
</head>

<body>
    <div>
        <img src="" alt="">
        <nav>
            <ul>
                <li><a href="#">Productos</a></li>
            </ul>
        </nav>
        <?php
        if (!isset($_SESSION["usuario"]))
            echo '<button onclick="handleClick()">Iniciar Sesion</button>';
        else echo '<div>Logueado</div>'
        ?>
    </div>
</body>

</html>