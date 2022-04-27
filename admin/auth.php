<?php
session_start();
include('connect_db.php');
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = $connection->prepare("SELECT * FROM user WHERE user=:username");
    $query->bindParam("username", $username, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    if (!$result) {
        echo '<p class="error">Неверные пароль или имя пользователя!</p>';
    } else {
        if (password_verify($password, $result['password'])) {
            $_SESSION['user_id'] = $result['id'];
            echo '<p class="success">Поздравляем, вы прошли авторизацию!</p>';
        } else {
            echo '<p class="error"> Неверные пароль или имя пользователя!</p>';
        }
    }
}
