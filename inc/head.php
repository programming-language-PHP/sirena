<?php
$first_dir = '';
$last_dir = basename(dirname($_SERVER['REQUEST_URI']));
if ($last_dir === 'admin') {
    $first_dir = '../';
}
?>
<title>Пой певица Sirena</title>
<meta name="description" content="Sirena - это современная муза музыки и кавера, певица Москвы на мероприятие">
<meta name="keywords"
      content="пой, певица, девушка фото, cover, кавер песни, музыкальные группы, песни дуэтом, кавер группа, репертуар, певица биография, слушать певицу, муза музыки, слушать песни певицы, заказать песню, русские каверы">
<link rel="shortcut icon" href="<?= $first_dir ?>favicon.ico" type="image/x-icon">