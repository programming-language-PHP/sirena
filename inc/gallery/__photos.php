<?php
if (basename($_SERVER['SCRIPT_NAME']) == 'gallery.php') {
    require_once('./inc/create_json.php');
    include './inc/connect_db.php';
} else {
    require_once('../inc/create_json.php');
    include '../inc/connect_db.php';
}
$sql = "SELECT url FROM photo";
$result = mysqli_query($link, $sql);
mysqli_close($link);

$path_to_assets = 'assets/';
while (!is_dir($path_to_assets)) {
    $path_to_assets = '../' . $path_to_assets;
}

$swiper_button = $path_to_assets . 'svg/slider/__button.svg';
?>
<section data-name='images' data-images='<?= createJson($result) ?>'
         class="content__slider slider">
    <h1 class="slider__title title">Фотографии</h1>
    <!-- Слайдер -->
    <div class="image-slider swiper">
        <!-- Хэш навигация -->
        <!-- Слайдер + Lazy Loading + Zoom -->
        <div class="image-slider__wrapper swiper-wrapper">
            <!-- тут слайды -->
        </div>
        <!-- Добавляем если нам нужны стрелки управления -->
        <div class="swiper-button-prev">
            <img src="<?= $swiper_button; ?>" alt="" srcset="">
        </div>
        <div class="swiper-button-next">
            <img src="<?= $swiper_button; ?>" alt="" srcset="">
        </div>
        <!-- Добавляем, если нам нужна пагинация -->
        <div class="swiper-pagination"></div>
    </div>
</section>