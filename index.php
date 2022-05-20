<!DOCTYPE html>
<html lang="ru">

<head>
    <meta name="yandex-verification" content="93203ce5843e9d47" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width">
    <?php include "./inc/head.php" ?>
    <link rel="stylesheet" type="text/css" href="assets/css/index.css" />
</head>

<body>
    <div class="wrapper">
        <?php
        include "./inc/__header.php";
        include "./inc/index/__full-screen.html";
        ?>
        <main class="main">
            <section class="content">
                <?php
                // Плюсы работы с певицы Sirena
                include './inc/index/__pros.html';
                // О певице Sirena
                include './inc/index/__about-me.html';
                // Услуги
                include './inc/index/__cards.html';
                // Варианты составов музыкантов
                include './inc/index/__composition.html';
                // Фотографии
                include './inc/__photos.php';
                // Видео
                // include './inc/index/__video.html';
                // Репертуар
                include './inc/repertoire.php';
                ?>
            </section>
        </main>
        <?php
        include './inc/__footer.html';
        ?>
    </div>

    <script src="./assets/js/burger_menu.js"></script>
    <script src="./assets/js/fullscreen.js"></script>
    <script src="./assets/js/swiper@7.0.8/swiper-bundle.min.js"></script>
    <script src="./assets/js/swiper@7.0.8/script.js"></script>
    <script src="./assets/js/repertoire.js"></script>
    <?php
    include "./inc/Yandex Metrika.html";
    ?>
</body>

</html>