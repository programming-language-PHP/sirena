<header class="header">
    <a href="index.php" class="header__logo">
        <img src="./assets/svg/sirena_icon.svg" alt="logo">
    </a>
    <?php
    if (basename($_SERVER['SCRIPT_NAME']) === 'index.php') {
    ?>
        <div class="header__burger">
            <span></span>
        </div>
    <?php
    }
    ?>
    <nav class="header__menu">
        <ul class="header__list">
            <?php
            if (basename($_SERVER['SCRIPT_NAME']) === 'index.php') {
            ?>
                <li>
                    <a href="#pros" class="header__link header__link_hover">Плюсы работы с певицы Sirena</a>
                </li>
                <li>
                    <a href="#about-me" class="header__link header__link_hover">О певице Sirena</a>
                </li>
                <li>
                    <a href="#cards" class="header__link header__link_hover">Услуги</a>
                </li>
                <li>
                    <a href="#composition" class="header__link header__link_hover">Варианты составов музыкантов</a>
                </li>
                <li>
                    <a href="#repertoire" class="header__link header__link_hover">Репертуар</a>
                </li>
            <?php
            }
            ?>
            <li>
                <a href="solo_creativity.php" class="header__link header__link_hover">Сольное творчество певицы</a>
            </li>
            <li>
                <a href="gallery.php" class="header__link header__link_hover">Галерея</a>
            </li>
        </ul>
    </nav>
</header>