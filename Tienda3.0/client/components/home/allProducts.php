<div id="home" class="w-full flex items-center justify-center flex-wrap gap-12 p-8 relative"></div>
<script>
    const home = document.getElementById('home');
    let products = []

    const displayProducts = async () => {
        products = await getProducts()
        products.map(({
            id,
            nombre,
            descripcion,
            imagen,
            precio,
            categoria_id,
            stock
        }, i) => {
            home.innerHTML +=
                `<a href="<?php BASE_ROUTE ?>?id=${id}" class="w-full max-w-96 h-[32rem] border border-white/10 p-4 shadow-xl space-y-6 rounded-md hover:scale-105 transition-all duration-200 cursor-pointer" id="${id}">
                        <div class="w-full max-w-96 h-44 aspect-video">
                            <img src="url("${imagen}")"></img>
                        </div>
                        <h1 class="font-bold text-3xl">${nombre}</h1>
                        <p>${descripcion}</p>
                        <p>$${precio}</p>
                        <p>${stock}</p>
                    </a>`
        })
    }

    const getProducts = async () => {
        const response = await fetch('<?php echo API_ROUTE ?>products?limit=20')
        return response.ok ? await response.json() : null;
    }

    displayProducts();
</script>