<?php
$links = [
    '' => 'Home',
    'shop' => 'Shop',
];
?>

<header class="w-full bg-zinc-950">
    <nav class="w-full h-full text-white flex justify-center items-center gap-4 py-4">
        <?php foreach ($links as $key => $label): ?>
            <a
                href="<?php echo $baseRoute . $key; ?>"
                class="<?php echo 'px-3 py-2 w-24 text-center rounded-md ' . ($selected == $key ? 'bg-blue-500' : 'hover:bg-zinc-800'); ?>">
                <?php echo $label; ?>
            </a>
        <?php endforeach; ?>
    </nav>
    <?php
    echo (isset($user) ?
        "<a
            href=" . $baseRoute . "logout" . "
            class='w-32 bg-red-500 rounded-md text-center py-2 px-2 absolute right-4 top-4'>
            Cerrar sesión
        </a>"
        :
        "<a 
            href=" . $baseRoute . "auth" . "
            class='w-32 bg-blue-500 rounded-md text-center py-2 px-2 absolute right-4 top-4 active:bg-blue-600 active:scale-95'>
            Iniciar sesión
        </a>");
    ?>
    <a href=""></a>
</header>