<?php
session_start();
$r_category_output_order = str_replace(' ', '', $_POST['category_output_order']);
$file = '../../inc/category_output_order.txt';
$file_content = file_get_contents($file);
if ($r_category_output_order === $file_content) {
    $_SESSION['error'] = 'Введённый порядок категорий существует';
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}

$file_content = $r_category_output_order;
// Пишем содержимое обратно в файл
file_put_contents($file, $file_content);
header("Location: " . $_SERVER['HTTP_REFERER']);
