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
        <link rel="stylesheet" type="text/css" href="../assets/css/admin-audios.css"/>
    </head>

    <body>
    <div class="wrapper">
        <?php
        include 'inc/__header.php';
        ?>
        <main class="main">
            <section class="content">
                <section class="form">
                    <form enctype="multipart/form-data" action="./audio/add_audio.php" method="POST">
                        <?php
                        if (isset($_SESSION['error'])) { ?>
                            <p><?= $_SESSION['error'] ?></p>
                            <?php
                            unset($_SESSION['error']);
                        } ?>
                        <input type="file" name="files[]" accept="audio/*,.jpg,.jpeg,.png" id="form__file"
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
                <div class="content__players players">
                    <?php
                    include "../inc/solo creativity/__player.php";
                    ?>
                </div>
            </section>
        </main>
    </div>
    </body>
    <script src='../assets/js/admin/script.js'></script>
    <script src="../assets/js/audio.js"></script>
    </html>
<?php } ?>