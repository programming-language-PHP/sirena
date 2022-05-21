<?php
session_start();
?>
<header class="header">
    <a href="/" class="header__logo">
        <img src="../assets/svg/sirena_icon.svg" alt="logo">
    </a>
    <div class="header__burger">
        <span></span>
    </div>
    <nav class="header__menu">
        <ul class="header__list">
            <li>
                <a href="/" class="header__link header__link_hover">Главная</a>
            </li>
            <li>
                <a href="./repertoire.php" class="header__link header__link_hover">Репертуар</a>
            </li>
            <li>
                <a href="./audios.php" class="header__link header__link_hover">Сольное творчество</a>
            </li>
            <li>
                <a href="./photos.php" class="header__link header__link_hover">Фотографии</a>
            </li>
            <?php
            if ($_SESSION['user_id'] == 1) { ?>
                <li>
                    <a href="./reg.php" class="header__link header__link_hover">Регистрация</a>
                </li>
                <li>
                    <a href="./users.php" class="header__link header__link_hover">Пользователи</a>
                </li>
            <?php
            }
            ?>
            <li>
                <a href="./change_password.php" class="header__link header__link_hover">Сменить пароль</a>
            </li>
            <li>
                <a href="./exit.php" class="header__link header__link_hover">Выйти</a>
            </li>
        </ul>
    </nav>
</header>