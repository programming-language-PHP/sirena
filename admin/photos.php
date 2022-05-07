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
        <link rel="stylesheet" type="text/css" href="../assets/css/admin-photos.css"/>
    </head>

    <body>
    <div class="wrapper">
        <?php
        include 'inc/__header.php';
        ?>
        <main class="main">
            <section class="content">
                <section class="form">
                    <form enctype="multipart/form-data" action="./photo/add_photo.php" method="POST">
                        <input type="file" name="files[]" accept=".jpg,.jpeg,.png" id="form__file"
                               class="form form__file" multiple>
                        <label for="form__file" class="form__file-button">
                            <span class="form__file-icon-wrapper">
                                <img class="form__file-icon" src="../assets/svg/admin/photos/add.svg"
                                     alt="Выбрать файл" width="25">
                            </span>
                            <span class="form__file-button-text">Выберите файл</span>
                        </label>
                        <button type="submit">Отправить файл</button>
                    </form>
                </section>
                <?php include '../inc/gallery/__photos.php' ?>
            </section>
        </main>
    </div>
    <script src="../assets/js/swiper@7.0.8/swiper-bundle.min.js"></script>
    <script src="../assets/js/swiper@7.0.8/script.js"></script>
    <script src='../assets/js/admin/script.js'></script>
    </body>

    </html>
<?php } ?>