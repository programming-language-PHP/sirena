<?php
session_start();
if (!isset($_SESSION['user_id']) or $_SESSION['user_id'] != 1) {
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
        <link rel="stylesheet" type="text/css" href="../assets/css/auth.css"/>

    </head>

    <body>
    <div class="wrapper">
        <?php
        include 'inc/__header.php';
        ?>
        <main class="main">
            <section class="content">
                <h1 class="content__title">Регистрация</h1>
                <section class="form">
                    <form method="post" action="access.php" name="signin-form">
                        <?php
                        if (isset($_SESSION['error'])) { ?>
                            <p class="error"><?= $_SESSION['error'] ?></p>
                            <?php
                            unset($_SESSION['error']);
                        }
                        ?>
                        <label for="username">Имя</label>
                        <input id="username" name="username" type="text" pattern="[a-zA-Z0-9]+" required/>

                        <label for="password">Пароль</label>
                        <input id="password" name="password" type="password" required/>

                        <label for="repeat_password">Повторите пароль</label>
                        <input id="repeat_password" name="repeat_password" type="password" required/>

                        <button type="submit" name="reg" value="reg">Зарегистрировать</button>
                    </form>
                </section>
            </section>
        </main>
    </div>
    <script src="../assets/js/burger_menu.js"></script>
    </body>

    </html>
<?php } ?>