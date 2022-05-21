<?php
session_start();
if (!isset($_SESSION['user_id']) or $_SESSION['user_id'] != 1) {
    header('Location: auth.php');
    exit;
} else {
    include '../inc/connect_db.php';
    $sql = "SELECT id, user FROM user WHERE id != 1";
    $users = mysqli_query($link, $sql);
?>
    <!DOCTYPE html>
    <html lang="ru">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width">
        <?php include ".././inc/head.php" ?>
        <link rel="stylesheet" type="text/css" href="../assets/css/admin-users.css" />

    </head>

    <body>
        <div class="wrapper">
            <?php
            include 'inc/__header.php';
            ?>
            <main class="main">
                <section class="content">
                    <h1 class="content__title">Пользователи</h1>
                    <section class="content__users users">
                        <?php
                        foreach ($users as $user) {
                        ?>
                            <div class="users__user">
                                <?= $user['user'] ?>
                                <form class="delete" action='./user/del_user.php' method='POST'>
                                    <input type='hidden' name='user_id' value='<?= $user['id'] ?>' />
                                    <button class="btn-delete" type='submit'>&#10006;</button>
                                </form>
                            </div>
                        <?php
                        }
                        ?>
                    </section>
                </section>
            </main>
        </div>
        <script src="../assets/js/burger_menu.js"></script>
    </body>

    </html>
<?php } ?>