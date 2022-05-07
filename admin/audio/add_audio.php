<?php
session_start();
$audio_dir = '../../audio/';
$file_data = array_combine($_FILES['files']['name'], $_FILES['files']['tmp_name']);
$passage = 1;
$count_file = count($file_data);
if ($count_file === 0 or $count_file === 1) {
    $_SESSION['error'] = 'Ошибка: недостаточное количество файлов. Должно быть два файла обложка и аудио.';
} else {
    $number_file = 0;
    foreach ($file_data as $file => $file_tmp_name) {
        $number_file++;
        if ($passage === 1) {
            if ($number_file === $count_file) {
                $_SESSION['error'] = 'Ошибка файл ' . $file . ' не был загружен: вы не загрузили аудио или обложку для композиции.';
            }
            // видео или изображение
            $file1 = $file;
            $file1_name = pathinfo(basename($file1))['filename'];
            $file1_tmp_name = $file_tmp_name;
            $passage++;
        } else {
            // видео или изображение
            $file2 = $file;
            $file2_name = pathinfo(basename($file))['filename'];
            $file2_tmp_name = $file_tmp_name;
            if ($file1_name === $file2_name) {
                $upload_dir = $audio_dir . $file1_name;
                mkdir($upload_dir);

                $upload_file1 = $upload_dir . '/' . $file1;
                move_uploaded_file($file1_tmp_name, $upload_file1);

                $upload_file2 = $upload_dir . '/' . $file2;
                move_uploaded_file($file2_tmp_name, $upload_file2);
            } else {
                $_SESSION['error'] = 'Ошибка: файл ' . $file . ' не был загружен . Наименование обложки не совпадает с наименованием композиции.';
                break;
            }
            $passage = 1;
        }
    }
}
header("Location: " . $_SERVER['HTTP_REFERER']);