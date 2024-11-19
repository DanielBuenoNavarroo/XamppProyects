<div class="w-full h-full flex flex-col items-center">
    <div class="w-28 h-28 overflow-hidden relative cursor-pointer p-1 rounded-full bg-gradient-to-b from-blue-500 to-blue-800">
        <img src="./assets/img/avatar.avif" alt="" class="rounded-full">
        <div id="profileImg" class="hidden w-full h-10 bg-black/40 absolute bottom-0 items-center justify-center">
            <img src="./assets/svg/camera.svg" alt="">
        </div>
    </div>
    <h1>Welcome <?php echo $sessionUser['nombre']; ?></h1>
</div>

<script>
    let isVisible = false;
    const profileImgDiv = document.getElementById('profileImg');

    const setIsVisible = (visible) => {
        isVisible = visible;
        profileImgDiv.classList.toggle('hidden', !isVisible);
        profileImgDiv.classList.toggle('flex', isVisible);
    };

    profileImgDiv.parentElement.addEventListener('mouseenter', () => setIsVisible(true));
    profileImgDiv.parentElement.addEventListener('mouseleave', () => setIsVisible(false));
</script>