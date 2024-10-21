<?php
$selected = 'admin';
$ofset = 0;
$display_user = [
    'ID',
    'Nombre',
    'Email',
    'Rol',
    'Fecha de registro',
    'Edit'
];
?>
<div class="w-full h-full flex flex-col items-center justify-start gap-8 py-4">
    <?php require "./components/admin/users.php"; ?>
    <h1 class="text-3xl font-bold">Products</h1>
</div>