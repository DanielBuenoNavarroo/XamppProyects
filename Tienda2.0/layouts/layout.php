<?php
require_once "helpers/helpers.php";
require_once "styles/styles.php";
?>

<!DOCTYPE html>
<html lang="en" class="h-full bg-zinc-900">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "$title" ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="./scripts/main.js"></script>
    <link rel="stylesheet" href="./global.css">
</head>

<body class="w-screen h-screen overflow-hidden text-white">
    <?php
    require $view
    ?>
</body>

</html>