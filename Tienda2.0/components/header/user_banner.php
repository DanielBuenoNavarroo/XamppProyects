<?php
if ($sessionUser != null) {
?>
    <div class="w-full h-[72px] flex items-center justify-end gap-4 px-2">
        <p class="cursor-pointer font-bold" onclick="handleDropdown()"><?php echo $_SESSION["user"]['nombre'] ?></p>
        <div
            onmouseenter="handleDropdown()"
            class="rounded-full w-16 h-16 relative flex items-center justify-center p-1 bg-gradient-to-b from-blue-500 to-blue-800">
            <img src="./assets/img/avatar2.jpeg" alt="Avatar" class="rounded-full w-full h-full object-cover">
            <div class="w-4 h-4 rounded-full bg-slate-900 absolute bottom-1 right-0 flex items-center justify-center border border-gray-600">
                <img src="./assets/svg/chevron-down-solid.svg" alt="" width="10px" height="10px">
            </div>
        </div>
        <div
            id="dropdown"
            onmouseleave="handleDropdown()"
            class="hidden absolute top-20 right-4 border border-slate-900 bg-slate-800 flex-col items-start justify-start w-64 px-3 py-2 gap-4 rounded-md z-50">
            <?php if ($roles[$_SESSION["user"]['rol_id']] == 'admin') { ?>
                <a
                    href="<?php echo $baseRoute ?>admin"
                    class="w-full text-center py-2 px-1 font-semibold hover:text-blue-500">
                    Admin
                </a>
                <hr class="w-full">
            <?php } ?>
            <a
                href="<?php echo $baseRoute ?>profile"
                class="w-full text-center py-2 px-1 font-semibold hover:text-blue-500">
                Perfil
            </a>
            <a
                href="<?php echo $baseRoute ?>logout"
                class="w-full bg-red-500 rounded-md text-center py-2 px-1 font-semibold hover:bg-red-400 active:bg-red-600 active:scale-95">
                Cerrar Sesión
            </a>
        </div>
    </div>
<?php } else { ?>
    <div class="w-full flex justify-end">
        <a
            href="<?php echo $baseRoute ?>auth"
            class="w-32 bg-blue-500 rounded-md text-center py-2 px-2 active:bg-blue-600 active:scale-95">
            Iniciar sesión
        </a>
    </div>
<?php } ?>
<script>
    const dropdown = document.getElementById("dropdown");
    const handleDropdown = () => {
        dropdown.classList.toggle("hidden");
        dropdown.classList.toggle("flex");
    };
</script>