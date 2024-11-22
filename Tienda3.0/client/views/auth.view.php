<div class="w-full h-full flex flex-col items-center justify-center gap-8">
    <div class="w-full flex items-center justify-center pt-8">
        <a href="<?php echo BASE_ROUTE ?>" class="<?php echo $logo_style ?>">Tienda</a>
    </div>
    <?php
    if ($vista === 'login') {
        require './client/components/auth/login.php';
    } elseif ($vista === 'register') {
        require './client/components/auth/register.php';
    } elseif ($vista === 'logout') {
        require './client/components/auth/logout.php';
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