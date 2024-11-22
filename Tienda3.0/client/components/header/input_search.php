<div class="w-full flex items-center justify-center relative">
    <div class="w-full xl:w-[600px] lg:w-[400px] md:w-[250px] sm:w-[200px] rounded-xl border border-gray-700 bg-gray-900 flex items-center focus-within:border-blue-500 focus-within:ring-1 focus-within:ring-blue-500">
        <input
            type="text" id="search_products"
            class="w-full h-12 px-4 py-3 rounded-xl bg-gray-900 focus:border-none focus:outline-none"
            placeholder="Search"
            oninput="search()"
            onfocus="showResultsContainer()">
        <div class="h-full py-3 pr-4">
            <i class="bi bi-search"></i>
        </div>
    </div>
    <div id="results_container" class="hidden w-full xl:w-[600px] lg:w-[400px] md:w-[250px] sm:w-[200px] absolute top-16 left-0 z-10 justify-center">
        <div class="w-full xl:w-[550px] lg:w-[360px] md:w-[200px] sm:w-[200px] bg-gray-900 rounded-md border-blue-500 ring-4 ring-blue-500">
            <ul class="w-full h-full flex flex-col" id="results"></ul>
        </div>
    </div>
</div>

<script>
    const resultsContainer = document.getElementById('results_container');
    const results = document.getElementById('results');
    const inputSearch = document.getElementById("search_products");

    const showResultsContainer = () => {
        const query = inputSearch.value.trim();
        if (query && query.length >= 2) {
            resultsContainer.classList.remove('hidden');
            resultsContainer.classList.add('flex');
        }
    };

    document.addEventListener('click', (event) => {
        if (!resultsContainer.contains(event.target) && !inputSearch.contains(event.target)) {
            resultsContainer.classList.remove('flex');
            resultsContainer.classList.add('hidden');
        }
    });

    const debounce = (fn, delay) => {
        let searchTimeout;
        return () => {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => fn(), delay);
        };
    };

    const searchProducts = () => {
        const query = inputSearch.value.trim();

        if (query && query.length >= 2) {
            fetch(`<?php echo API_ROUTE ?>products?search=${query}`)
                .then(response => response.json())
                .then((data) => {
                    if (data.length) {
                        results.innerHTML = data.map((product, i) =>
                            `<li class="w-full px-4 py-2 cursor-pointer hover:bg-gray-950 rounded-md">${product.nombre}</li>
                            ${i !== data.length - 1 ? '<hr class="border-b border-blue-500">' : ''}
                        `).join('');
                    } else {
                        results.innerHTML = '<li class="px-4 py-2">No hay productos para mostrar</li>';
                    }
                    showResultsContainer();
                })
                .catch(error => console.error('Error en la búsqueda:', error));
        } else {
            resultsContainer.classList.add('hidden');
        }
    };

    const search = debounce(searchProducts, 500);
</script>