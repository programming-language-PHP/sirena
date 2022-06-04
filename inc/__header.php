<header class="header">
    <a href="/" class="header__logo">
        <img src="./assets/svg/sirena_icon.svg" alt="logo">
    </a>
    <?php
    $is_page_home = basename($_SERVER['SCRIPT_NAME']) === 'index.php';
    ?>
    <div class="header__burger">
        <span></span>
    </div>
    <nav class="header__menu">
        <ul class="header__list">
            <?php
            if ($is_page_home) {
            ?>
                <li>
                    <a href="#about-me" class="header__link header__link_hover">О певице Sirena</a>
                </li>
                <li>
                    <a href="#cards" class="header__link header__link_hover">Услуги</a>
                </li>
                <li>
                    <a href="#composition" class="header__link header__link_hover">Варианты составов</a>
                </li>
                <li>
                    <a href="#photos" class="header__link header__link_hover">Фотографии</a>
                </li>
                <li>
                    <a href="#video" class="header__link header__link_hover">Видео</a>
                </li>
                <li>
                    <a href="#repertoire" class="header__link header__link_hover">Репертуар</a>
                </li>
                <li>
                    <a href="solo_creativity.php" class="header__link header__link_hover">Сольное творчество певицы</a>
                </li>
            <?php
            } else { ?>
                <li>
                    <a href="/" class="header__link header__link_hover">Главная</a>
                </li>
            <?php
            }
            ?>
            <li class="header__telephone">
                <a href="tel:+79778511554" class="header__link header__link_hover">+7 (977) 851-15-54</a>
            </li>
            <li>
                <a href="https://wa.clck.bar/79778511554" target="_blank" class="header__whatsapp"></a>
            </li>
            <li>
                <a href="mailto:svetlana.levkina@gmail.com" target="_blank" class="header__gmail"></a>
            </li>
        </ul>
    </nav>
</header>