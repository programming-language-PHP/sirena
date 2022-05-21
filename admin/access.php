<?php
session_start();
include('../inc/connect_db.php');

// Проверка авторизации
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($link, $_POST['username']);
    $password = mysqli_real_escape_string($link, $_POST['password']);
    $query = "SELECT * FROM user WHERE user='$username'";
    $result = mysqli_query($link, $query);
    $isAccess = mysqli_num_rows($result) != 0;
    if ($isAccess) {
        $data_user = mysqli_fetch_array($result);
        if (password_verify($password, $data_user['password'])) {
            $_SESSION['user_id'] = $data_user['id'];
            header('Location: index.php');
            exit;
        } else {
            $_SESSION['error'] = 'Неверные пароль или имя пользователя!';
        }
    } else {
        $_SESSION['error'] = 'Неверные пароль или имя пользователя!';
    }
}

// Проверка регистрации
if (isset($_POST['reg'])) {
    $username = mysqli_real_escape_string($link, $_POST['username']);
    $password = mysqli_real_escape_string($link, $_POST['password']);
    $repeat_password = $_POST['repeat_password'];
    if ($password === $repeat_password) {
        $query = "SELECT * FROM user WHERE user='$username'";
        $result = mysqli_query($link, $query);
        $is_user_name = mysqli_num_rows($result) != 0;
        if (!$is_user_name) {
            $hash_password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO user (user, password)
                    VALUES ('$username', '$hash_password')";
            mysqli_query($link, $sql);
            $last_id = mysqli_insert_id($link);
            mysqli_close($link);
        } else {
            $_SESSION['error'] = 'Пользователь с таким именем существует.';
        }
    } else {
        $_SESSION['error'] = 'Пароли не совпали.';
    }
}

// Смена пароля
if (isset($_POST['change_password'])) {
    $user_id = $_SESSION['user_id'];
    $old_password = mysqli_real_escape_string($link, $_POST['old_password']);

    $query = "SELECT * FROM user WHERE id = $user_id";
    $result = mysqli_query($link, $query);
    $data_user = mysqli_fetch_array($result);
    echo $old_password . '<br/>';
    echo $data_user['password'];
    if (password_verify($old_password, $data_user['password'])) {
        $new_password = mysqli_real_escape_string($link, $_POST['new_password']);
        $repeat_new_password = mysqli_real_escape_string($link, $_POST['repeat_new_password']);
        if ($new_password === $repeat_new_password) {
            $hash_new_password = password_hash($new_password, PASSWORD_DEFAULT);
            $sql = "UPDATE user SET password = '$hash_new_password' WHERE id = $user_id";
            mysqli_query($link, $sql);
            $_SESSION['error'] = 'Всё прошло успешно :)';
        } else {
            $_SESSION['error'] = 'Новые пароли не совпали.';
        }
    } else {
        $_SESSION['error'] = 'Неверный старый пароль.';
    }
}
header("Location: " . $_SERVER['HTTP_REFERER']);
