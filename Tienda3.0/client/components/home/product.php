<div id="home" class="w-full h-full max-w-screen-md border-x border-white/10 mx-auto flex flex-col items-center justify-start gap-12 p-8 relative"></div>
<script>
    const home = document.getElementById('home');
    let product = []

    const displayProduct = async () => {
        products = await getProduct()
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
                `<div>${nombre}</div>`
        })
    }

    const getProduct = async () => {
        const response = await fetch('<?php echo API_ROUTE ?>products?id=<?php echo $id ?>')
        return response.ok ? await response.json() : null;
    }

    displayProduct();
</script>