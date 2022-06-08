<?php
include './connect_db.php';

$taskList = json_decode($_POST['repertoire'][0], TRUE);
$repertoire = '';
$category = '';
$sub_category = '';
$i = 0;
foreach ($taskList as $values) {
    if ($category !== $values['category']) {
        if ($i) {
            $repertoire .= "\n";
        }
        $repertoire .= $values['category'];
        $i++;
    }
    if ($sub_category !== $values['sub_category'] & $values['sub_category'] !== '' & $values['sub_category'] !== 'Популярные') {
        $repertoire .= "\n\t" . $values['sub_category'];
    }

    if ($values['sub_category'] === 'Популярные' | $values['sub_category'] === '') {
        $repertoire .= "\n\t";
    } else {
        $repertoire .= "\n\t\t";
    }

    $repertoire .= $values['executor'] . '-' . $values['music_name'];

    $category = $values['category'];
    $sub_category = $values['sub_category'];
}

header("Content-type: text/plain");
// Content-Disposition является индикатором того, что предполагается содержание ответа на веб-сайте,
// как веб-страница или часть веб-страницы, или же как вложение, которое может быть скачано и изменено.
// attachment - указывает на загружаемый контент
header("Content-Disposition: attachment; filename=Репертуар Siren.txt");

print "Репертуар Siren\n\n";
print $repertoire;
