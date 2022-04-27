<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width">
    <?php include "./inc/head.php" ?>
    <link rel="stylesheet" type="text/css" href="assets/css/swiper@7.0.8/swiper-bundle.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
</head>

<body>
    <div class="preloader">
        <div class="preloader__row">
            <div class="preloader__item"></div>
            <div class="preloader__item"></div>
        </div>
    </div>
    <div class="wrapper">
        <?php
        include "./inc/header.php";
        ?>
        <main class="main">
            <section class="content">
                <section class="content__slider slider">
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
                            <img src="assets/svg/slider/__button.svg" alt="" srcset="">
                        </div>
                        <div class="swiper-button-next">
                            <img src="assets/svg/slider/__button.svg" alt="" srcset="">
                        </div>
                        <!-- Добавляем, если нам нужна пагинация -->
                        <div class="swiper-pagination"></div>
                    </div>
                </section>
                <section class="content__video video">
                    <h1 class="video__title title">Видео</h1>
                    <div class="video__items">
                        <div class="video__item">
                            <iframe src="https://www.youtube.com/embed/9qnivjfZOgU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <div class="video__item">
                            <iframe src="https://www.youtube.com/embed/eDxkCCtS1HU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <div class="video__item">
                            <iframe src="https://www.youtube.com/embed/gdvC2FktjlU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <div class="video__item">
                            <iframe src="https://www.youtube.com/embed/Bh6J0vZYxMw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <div class="video__item">
                            <iframe src="https://www.youtube.com/embed/jQDn345xlHk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                        <div class="video__item">
                            <iframe src="https://www.youtube.com/embed/1K7igGN09_U" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                </section>
            </section>
        </main>
        <?php
        include './inc/footer.html';
        ?>
    </div>
    <?php
    $dir_image = './img/gallery';
    $images = array_diff(scandir($dir_image, 1), array('..', '.'));
    $js_images = json_encode($images);
    ?>
    <div class='hidden' data-name='images' data-address='' data-array='<?= $js_images ?>' data-lng=''></div>
    <script src="assets/js/preload.js"></script>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="assets/js/swiper@7.0.8/script.js"></script>
    <?php
    // include "./inc/Yandex Metrika.html";
    ?>
</body>

</html>