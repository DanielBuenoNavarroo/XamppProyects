<h1 class="text-3xl font-semibold mb-12">Iniciar Sesión</h1>
<form class="<?php echo $form_style ?>">
    <label for="email" class="<?php echo $label_style ?>">Email</label>
    <input
        type="email"
        name="email"
        id="email"
        class="<?php echo $input_style ?>"
        placeholder="Email" />
    <label for="password" class="<?php echo $label_style ?>">Password</label>
    <input
        type="password"
        name="password"
        id="password"
        class="<?php echo $input_style ?>"
        placeholder="Password" />
    <div class="px-16 mt-8">
        <input
            type="submit"
            id="submit"
            value="Enviar"
            class="<?php echo $submit_style ?>" />
    </div>
</form>
<script>
    const submit = document.getElementById('submit')
    submit.addEventListener('click', async (event) => {
        event.preventDefault();
        const email = document.getElementById('email').value
        const password = document.getElementById('password').value
        const data = {
            email: email,
            password: password
        }
        await login(data)
    })

    const login = async (user) => {
        const options = {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(user),
        }
        const response = await fetch("<?php echo API_ROUTE . "login" ?>", options);
        const data = await response.json()
        if (!response.ok) {
            Swal.fire({
                title: 'Error!',
                text: data.message,
                icon: 'error',
                confirmButtonText: 'Continuar',
                didOpen: () => {
                    document.body.classList.remove('swal2-shown', 'swal2-height-auto');
                }
            })
        } else {
            Swal.fire({
                title: 'Success!',
                text: "Registro exitoso! Logueate!",
                icon: 'success',
                confirmButtonText: 'Continuar',
                didOpen: () => {
                    document.body.classList.remove('swal2-shown', 'swal2-height-auto');
                },
                didDestroy: () => {
                    location.href = "<?php BASE_ROUTE ?>"
                }
            })
        }
        return null
    }
</script>