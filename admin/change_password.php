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
        <?php include ".././inc/head.php" ?>
        <link rel="stylesheet" type="text/css" href="../assets/css/auth.css" />

    </head>

    <body>
        <div class="wrapper">
            <?php
            include 'inc/__header.php';
            ?>
            <main class="main">
                <section class="content">
                    <h1 class="content__title">Смена пароля</h1>
                    <section class="form">
                        <form method="post" action="access.php" name="signin-form">
                            <?php
                            if (isset($_SESSION['error'])) { ?>
                                <p class="error"><?= $_SESSION['error'] ?></p>
                            <?php
                                unset($_SESSION['error']);
                            }
                            if (isset($_SESSION['success'])) { ?>
                                <p class="success">
                                    <?= $_SESSION['success'] ?>
                                </p>
                            <?php
                                unset($_SESSION['success']);
                            }
                            ?>
                            <label for="old_password">Введите старый пароль</label>
                            <input id="old_password" name="old_password" type="password" required />

                            <label for="new_password">Введите новый пароль</label>
                            <input id="new_password" name="new_password" type="password" required />

                            <label for="repeat_new_password">Повторите новый пароль</label>
                            <input id="repeat_new_password" name="repeat_new_password" type="password" required />

                            <button type="submit" name="change_password">Сменить пароль</button>
                        </form>
                    </section>
                </section>
            </main>
        </div>
        <script src="../assets/js/burger_menu.js"></script>
    </body>

    </html>
<?php } ?>