<h1 class="text-3xl font-bold">Registrarse</h1>
<form action="" method="post" class="<?php echo $form_style ?>">
    <?php require_once "./model/controllers/register.php" ?>
    <label for="nombre" class="<?php echo $label_style ?>">Nombre</label>
    <input
        type="text"
        name="nombre"
        class="<?php echo $input_style ?>"
        placeholder="Nombre">
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
        placeholder="Password">
    <label for="roles" class="<?php echo $label_style ?>">Rol</label>
    <select
        name="id_rol"
        class="<?php echo $input_style ?>"
        placeholder="Rol">
        <?php require_once "./model/db/get_roles.php" ?>
    </select>
    <div class="px-16 mt-8">
        <input
            type="submit"
            value="Enviar"
            class="<?php echo $submit_style ?>" />
    </div>
</form>