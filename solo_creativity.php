<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width">
    <?php include "./inc/head.php" ?>
    <link rel="stylesheet" type="text/css" href="assets/css/solo_creativity.css" />
</head>

<body>
    <div class="wrapper">
        <?php
        include "./inc/__header.php";
        ?>
        <main class="main">
            <section class="content">
                <h1 class="content__title">Сольное творчество</h1>
                <?php
                include "./inc/solo creativity/__player.php";
                ?>
            </section>
        </main>
        <?php
        include './inc/__footer.html';
        ?>
    </div>
    <script src="assets/js/burger_menu.js"></script>
    <script src="assets/js/audio.js"></script>
    <?php
    include "./inc/Yandex Metrika.html";
    ?>
</body>

</html>