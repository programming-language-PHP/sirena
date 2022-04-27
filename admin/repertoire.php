<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width">
    <?php include "../inc/head.php" ?>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="../assets/css/form.css"/>
</head>

<body>
<?php
include './connect_db.php';
$repertoire = mysqli_query($link, "SELECT * FROM repertoire ORDER BY category, sub_category");
mysqli_close($link);
$new_repertoire = array();
foreach ($repertoire as $music_data) {
    $new_repertoire[] = $music_data;
}
$json = json_encode($new_repertoire, JSON_UNESCAPED_UNICODE);
?>
<div class="wrapper">
    <main class="main">
        <section class="content">
            <section class="form">
                <form action="add_music.php" method="POST">
                    <label for="category">Категория</label>
                    <input name="category" type="text" required>

                    <label for="sub_category">Под категория</label>
                    <input name="sub_category" type="text" required>

                    <label for="executor">Автор</label>
                    <input name="executor" type="text" required>

                    <label for="music_name">Наименование музыки</label>
                    <input name="music_name" type="text" required>

                    <button type="submit" name="btn_add_music">Добавить</button>
                </form>
            </section>
            <section data-repertoires='<?= $json ?>' class="content__repertoire repertoire" id="repertoire">
                <h2 class="hidden">Репертуар</h2>
                <ul class="repertoire__items" id="repertoire__items">
                    <!-- Здесь отображается музыка -->
                </ul>
            </section>
        </section>
    </main>
</div>
<script src="script.js"></script>
<script src="../assets/js/repertoire.js"></script>
</body>

</html>