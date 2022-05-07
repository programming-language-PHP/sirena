<?php
session_start();
?>
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
    <main class="main">
        <section class="content">
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
                    <input id="password" name="password" type="password" name="password" required/>

                    <button type="submit" name="login" value="login">Войти</button>
                </form>
            </section>
        </section>
    </main>
</div>
</body>

</html>