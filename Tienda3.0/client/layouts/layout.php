<!DOCTYPE html>
<html lang="en" class="h-full bg-zinc-900">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }

        @supports (-moz-appearance: none) {
            * {
                scrollbar-width: thin;
                scrollbar-color: #52525b transparent;
            }
        }

        *::-webkit-scrollbar {
            width: 16px;
            border: solid 1px rgba(255, 255, 255, .05);
        }

        *::-webkit-scrollbar-thumb {
            border-radius: 8px;
            border: 6px solid transparent;
            background-clip: content-box;
            background-color: #52525b;
        }
    </style>
</head>

<body class="w-full h-full flex flex-col text-white">
    <?php require_once $view; ?>
</body>

</html>