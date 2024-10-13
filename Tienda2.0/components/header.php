<header class="w-full h-[72px] bg-neutral-900 shadow-lg border-b border-zinc-800">
    <nav class="w-full h-full  text-white flex justify-center items-center gap-4 py-4">
        <a
            href="<?php echo $baseRoute . ''; ?>"
            class="<?php echo 'px-3 py-2 w-24 text-center rounded-md ' . ($selected == '' ? 'bg-blue-500' : 'hover:bg-zinc-800'); ?>">
            Home
        </a>
        <a
            href="<?php echo $baseRoute . "shop"; ?>"
            class="<?php echo "px-3 py-2 w-24 text-center rounded-md " . ($selected == "shop" ? "bg-blue-500" : "hover:bg-zinc-800"); ?>">
            Shop
        </a>
        <?php
        if (isset($user) && $roles[$user['rol_id']] == 'admin') {
            echo '<a 
                href="' . $baseRoute . 'admin" 
                class="px-3 py-2 w-24 text-center rounded-md ' . ($selected == 'admin' ? 'bg-blue-500' : 'hover:bg-zinc-800') . '">
                Admin
            </a>';
        }
        ?>
        <?php
        echo (isset($user) ?
            '<div class="w-44 h-[72px] absolute right-0 top-0 flex items-center justify-end gap-4 px-2">
                <p class="cursor-pointer font-bold" onclick="handleDropdown()">' . ($user['nombre']) . '</p>
                <div
                    onmouseenter="handleDropdown()"
                    class="rounded-full w-16 h-16 relative flex items-center justify-center p-1 bg-gradient-to-b from-blue-500 to-blue-800">
                    <img src="./assets/img/avatar2.jpeg" alt="Avatar" class="rounded-full w-full h-full object-cover">
                    <div class="w-4 h-4 rounded-full bg-slate-900 absolute bottom-1 right-0 flex items-center justify-center border border-gray-600">
                        <img src="./assets/svg/chevron-down-solid.svg" alt="" width="10px" height="10px" text-white">
                    </div>
                </div>
                <div
                    id="dropdown"
                    onmouseleave="handleDropdown()"
                    class="hidden absolute top-20 right-0 bg-slate-800 flex-col items-start justify-start w-64 px-3 py-2 gap-4 rounded-md z-50">
                    <a
                        href="#"
                        class="w-full text-center py-2 px-1 font-semibold hover:text-blue-500">
                        Perfil
                    </a>
                    <a
                        href="' . $baseRoute . 'logout"
                        class="w-full bg-red-500 rounded-md text-center py-2 px-1 font-semibold hover:bg-red-400 active:bg-red-600 active:scale-95">
                        Cerrar Sesion
                    </a>
                </div>
            </div>'
            :
            '<a 
                href="' . $baseRoute . 'auth"
                class="w-32 bg-blue-500 rounded-md text-center py-2 px-2 absolute right-4 top-4 active:bg-blue-600 active:scale-95">
                Iniciar sesión
            </a>'
        );
        ?>
    </nav>
    <script>
        const dropdown = document.getElementById('dropdown');
        const handleDropdown = () => {
            dropdown.classList.toggle('hidden');
            dropdown.classList.toggle('flex');
        }
    </script>
</header>