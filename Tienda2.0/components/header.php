<header class="w-full h-[72px] bg-neutral-900 shadow-lg border-b border-zinc-800">
    <nav class="w-full h-full  text-white flex justify-between items-center gap-4 py-4 px-2 xl:px-8 lg:px-6 md:px-4">
        <div class="w-full">
            <input
                oninput="search()"
                type="text" id="search_products"
                placeholder="Search"
                class="rounded-md px-4 py-3 border border-gray-700 bg-gray-900">
            <div id="results_container" class="hidden w-64 absolute top-20 left-2 xl:left-8 lg:left-6 md:left-4 bg-gray-900 p-2 rounded-md border-2">
                <ul class="flex flex-col gap-y-4" id="results"></ul>
            </div>
        </div>
        <div class="w-full flex items-center justify-center gap-4">
            <a
                href="<?php echo $baseRoute; ?>"
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
        </div>
        <?php
        echo (isset($user) ?
            <<<HTML
                <div class="w-44 h-[72px] flex items-center justify-end gap-4 px-2">
                    <p class="cursor-pointer font-bold" onclick="handleDropdown()">{$user['nombre']}</p>
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
                            href="{$baseRoute}logout"
                            class="w-full bg-red-500 rounded-md text-center py-2 px-1 font-semibold hover:bg-red-400 active:bg-red-600 active:scale-95">
                            Cerrar Sesion
                        </a>
                    </div>
                </div>
            HTML
            :
            <<<HTML
                <div class="w-full flex justify-end">
                    <a 
                        href="{$baseRoute}auth"
                        class="w-32 bg-blue-500 rounded-md text-center py-2 px-2 active:bg-blue-600 active:scale-95">
                        Iniciar sesión
                    </a>
                </div>
            HTML
        );
        ?>
    </nav>
    <script>
        let searchTimeout;

        const debounce = (fn, delay) => {
            return () => {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(() => fn(), delay);
            };
            // en caso de querer pasar parametros a la funcion (fn) hay que destructurar los argumentos (...args) tanto en el return como en el calback
            /**
             * return (...args) => {
             *  clearTimeout(searchTimeout);
             *  searchTimeout = setTimeout(() => fn(...args), delay)
             * }
             */
        }

        const searchProducts = () => {
            const query = document.getElementById("search_products").value.trim();
            const resultsContainer = document.getElementById("results_container");
            const results = document.getElementById('results')

            if (query && query.length >= 2) {
                fetch(`<?php echo $baseRoute ?>search_product?search=${query}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.length) {
                            results.innerHTML = data
                                .map(product => `<li>${product.nombre}</li>`)
                                .join('');
                            resultsContainer.classList.remove('hidden');
                        } else {
                            results.innerHTML = '<li>No hay productos para mostrar</li>'
                            resultsContainer.classList.remove('hidden');
                        }
                    })
                    .catch(error => console.error('Error en la búsqueda:', error));
            } else resultsContainer.classList.add('hidden');
        }

        const search = debounce(searchProducts, 500);

        const dropdown = document.getElementById("dropdown");
        const handleDropdown = () => {
            dropdown.classList.toggle("hidden");
            dropdown.classList.toggle("flex");
        };
    </script>
</header>