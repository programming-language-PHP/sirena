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
        <link rel="stylesheet" type="text/css" href="../assets/css/admin-repertoire.css" />
    </head>

    <body>
        <div class="wrapper">
            <?php
            include 'inc/__header.php';
            ?>
            <main class="main">
                <section class="content">
                    <section class="form">
                        <form enctype="multipart/form-data" action="./music/add_music.php" method="POST">
                            <?php
                            if (isset($_SESSION['error'])) { ?>
                                <p class="error"><?= $_SESSION['error'] ?></p>
                            <?php
                                unset($_SESSION['error']);
                            } ?>
                            <input type="file" name="file" accept=".json" id="form__file" class="form__file">
                            <label for="form__file" class="form__file-button">
                                <span class="form__file-icon-wrapper">
                                    <img class="form__file-icon" src="../assets/svg/admin/photos/add.svg" alt="Выбрать файл" width="25">
                                </span>
                                <span class="form__file-button-text">Выберите файл</span>
                            </label>

                            <label for="category">Категория</label>
                            <input id="category" name="category" type="text">

                            <label for="sub_category">Под категория</label>
                            <input id="sub_category" name="sub_category" type="text">

                            <label for="executor">Автор</label>
                            <input id="executor" name="executor" type="text">

                            <label for="music_name">Наименование музыки</label>
                            <input id="music_name" name="music_name" type="text">

                            <button type="submit" name="btn_add_music">Добавить</button>
                        </form>

                        <form enctype="multipart/form-data" action="./music/update_category_output_order.php" method="POST">
                            <label for="category_output_order">Порядок вывода категорий</label>
                            <textarea name="category_output_order" class="form__links" id="category_output_order" >
                            <?= file_get_contents('../inc/category_output_order.txt') ?>
                            </textarea>

                            <button type="submit">Изменить порядок</button>
                        </form>
                    </section>
                    <?php
                    include '../inc/repertoire.php';
                    ?>
                </section>
            </main>
        </div>
        <script src="../assets/js/admin/script.js"></script>
        <script src="../assets/js/repertoire.js"></script>
        <script src="../assets/js/burger_menu.js"></script>
    </body>

    </html>
<?php } ?>