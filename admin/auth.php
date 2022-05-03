<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width">
    <?php include ".././inc/head.php" ?>
    <!-- <link rel="stylesheet" type="text/css" href="../assets/css/authorization.css" /> -->
    <link rel="stylesheet" type="text/css" href="../assets/css/form.css" />
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css" />

</head>

<body>
    <div class="wrapper">
        <main class="main">
            <section class="content">
                <section class="form">
                    <form method="post" action="" name="signin-form">
                        <?php
                        session_start();
                        include('../inc/connect_db.php');
                        if (isset($_POST['login'])) {
                            $username = $_POST['username'];
                            $password = $_POST['password'];
                            $query = "SELECT * FROM user WHERE user='$username'";
                            $result = mysqli_query($link, $query);
                            $isAccess = mysqli_num_rows($result) != 0;
                            if ($isAccess) {
                                $data_user = mysqli_fetch_array($result);
                                if (password_verify($password, $data_user['password'])) {
                                    $_SESSION['user_id'] = $data_user['id'];
                                    header('Location: index.php');
                                    exit;
                                } else { ?>
                                    <p class="error">Неверные пароль или имя пользователя!</p>
                                <?php
                                }
                            } else { ?>
                                <p class="error">Неверные пароль или имя пользователя!</p>
                        <?php
                            }
                        }
                        ?>
                        <label for="username">Имя</label>
                        <input id="username" name="username" type="text" pattern="[a-zA-Z0-9]+" required />

                        <label for="password">Пароль</label>
                        <input id="password" name="password" type="password" name="password" required />

                        <button type="submit" name="login" value="login">Войти</button>
                    </form>
                </section>
            </section>
        </main>
    </div>
</body>

</html>