<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width">
    <?php include "./inc/head.php" ?>
    <link rel="stylesheet" type="text/css" href="assets/css/swiper@7.0.8/swiper-bundle.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css"/>
</head>

<body>
<!--    <div class="preloader">-->
<!--        <div class="preloader__row">-->
<!--            <div class="preloader__item"></div>-->
<!--            <div class="preloader__item"></div>-->
<!--        </div>-->
<!--    </div>-->
<div class="wrapper">
    <?php
    include "./inc/header.php";
    ?>
    <main class="main">
        <section class="content">

            <?php include './inc/gallery/__photos.php'; ?>

            <section class="content__video video">
                <h1 class="video__title title">Видео</h1>
                <div class="video__items">
                    <div class="video__item">
                        <iframe src="https://www.youtube.com/embed/9qnivjfZOgU" title="YouTube video player"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                    </div>
                    <div class="video__item">
                        <iframe src="https://www.youtube.com/embed/eDxkCCtS1HU" title="YouTube video player"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                    </div>
                    <div class="video__item">
                        <iframe src="https://www.youtube.com/embed/gdvC2FktjlU" title="YouTube video player"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                    </div>
                    <div class="video__item">
                        <iframe src="https://www.youtube.com/embed/Bh6J0vZYxMw" title="YouTube video player"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                    </div>
                    <div class="video__item">
                        <iframe src="https://www.youtube.com/embed/jQDn345xlHk" title="YouTube video player"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                    </div>
                    <div class="video__item">
                        <iframe src="https://www.youtube.com/embed/1K7igGN09_U" title="YouTube video player"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                    </div>
                </div>
            </section>
        </section>
    </main>
    <?php
    include './inc/footer.html';
    ?>
</div>
<script src="./assets/js/preload.js"></script>
<script src="./assets/js/swiper@7.0.8/swiper-bundle.min.js"></script>
<script src="./assets/js/swiper@7.0.8/script.js"></script>
<?php
include "./inc/Yandex Metrika.html";
?>
</body>

</html>