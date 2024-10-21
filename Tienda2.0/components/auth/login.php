<?php
$message = '';
require_once "./model/controllers/auth/login.php";
?>
<h1 class="text-3xl font-bold">Iniciar Sesión</h1>
<form action="" method="post" class="<?php echo $form_style ?>">
    <?php if ($message) { ?>
        <div class="<?php echo $error_style ?>"><?php echo $message ?></div>
    <?php } ?>
    <label for="email" class="<?php echo $label_style ?>">Email</label>
    <input
        type="email"
        name="email"
        class="<?php echo $input_style ?>"
        placeholder="Email">
    <label for="password" class="<?php echo $label_style ?>">Password</label>
    <input
        type="password"
        name="password"
        class="<?php echo $input_style ?>"
        placeholder="Password" />
    <div class="px-16 mt-8">
        <input
            type="submit"
            value="Enviar"
            class="<?php echo $submit_style ?>" />
    </div>
</form>