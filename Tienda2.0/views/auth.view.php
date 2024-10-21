<?php
$vista = $_GET['view'] ?? 'login';
?>

<div class="w-full h-fit flex items-center justify-center mt-8">
    <a href="<?php echo $baseRoute ?>" class="<?php echo $logo_style ?>">Tienda</a>
</div>
<div class="w-full h-full flex flex-col items-center justify-center gap-8 -mt-20">
    <?php
    if ($vista === 'login') {
        require './components/auth/login.php';
    } elseif ($vista === 'register') {
        require './components/auth/register.php';
    }
    ?>
    <p>
        <?php if ($vista === 'login'): ?>
            ¿No tienes una cuenta?
            <a href="?view=register" class="font-bold text-md hover:underline hover:underline-offset-4">Regístrate</a>
        <?php else: ?>
            ¿Ya tienes una cuenta?
            <a href="?view=login" class="font-bold text-md hover:underline hover:underline-offset-4">Inicia sesión</a>
        <?php endif; ?>
    </p>
</div>