<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: auth.php');
    exit;
} else { ?>
    <!DOCTYPE html>
    <html lang="ru">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width">
        <?php include "../inc/head.php" ?>
        <link rel="stylesheet" type="text/css" href="../assets/css/admin-repertoire.css"/>
    </head>

    <body>
    <div class="wrapper">
        <?php
        include 'inc/__header.php';
        ?>
        <main class="main">
            <section class="content">
                <h1 class="title">Репертуар</h1>
                <section class="form">
                    <form action="./music/add_music.php" method="POST">
                        <label for="category">Категория</label>
                        <input id="category" name="category" type="text" required>

                        <label for="sub_category">Под категория</label>
                        <input id="sub_category" name="sub_category" type="text" required>

                        <label for="executor">Автор</label>
                        <input id="executor" name="executor" type="text" required>

                        <label for="music_name">Наименование музыки</label>
                        <input id="music_name" name="music_name" type="text" required>

                        <button type="submit" name="btn_add_music">Добавить</button>
                    </form>
                </section>
                <?php
                include '../inc/repertoire.php';
                ?>
            </section>
        </main>
    </div>
    <script src="../assets/js/repertoire.js"></script>
    </body>

    </html>
<?php } ?>