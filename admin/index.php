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
        <title>Административная панель</title>
        <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
        <link rel="stylesheet" type="text/css" href="../assets/css/admin.css"/>
    </head>

    <body>
    <div class="wrapper">
        <?php
        include 'inc/__header.php';
        ?>
    </div>

    </body>

    </html>
<?php } ?>