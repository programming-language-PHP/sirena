<?php
require_once('category_to_file.php');

include '../../inc/connect_db.php';
session_start();
if (
    empty($_FILES['file']['name'])
    & (empty($_POST['category'])
        | empty($_POST['executor'])
        | empty($_POST['music_name'])
    )
) {
    $_SESSION['error'] = 'Не выбран файл или не заполнены поля категория, автор, наименование музыки!';
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}

if (
    !empty($_POST['category'])
    & !empty($_POST['executor'])
    & !empty($_POST['music_name'])
) {
    // Добавление в БД
    // Экранизация символов в строке
    $category = mysqli_real_escape_string($link, $_POST['category']);
    $sub_category = mysqli_real_escape_string($link, $_POST['sub_category']);
    $executor = mysqli_real_escape_string($link, $_POST['executor']);
    $music_name = mysqli_real_escape_string($link, $_POST['music_name']);

    $sql = "INSERT INTO repertoire (category, sub_category, executor, music_name)
            VALUES ('$category', '$sub_category', '$executor', '$music_name')";
    mysqli_query($link, $sql);

    addingCategoryToFile($category);
}

if (!empty($_FILES['file']['name'])) {
    $file = file_get_contents($_FILES['file']['tmp_name']);

    $taskList = json_decode($file, TRUE);

    foreach ($taskList as $category => $values) {
        $category_sql = mysqli_real_escape_string($link, $category);
        addingCategoryToFile($category_sql);
        foreach ($values as $sub_category  => $sub_values) {
            if (gettype($sub_values) === 'array') {
                if ($sub_category === 'Популярные') {
                    foreach ($sub_values as $value) {
                        // explode — Разбивает строку с помощью разделителя
                        $pieces = explode("+", $value);
                        $executor = mysqli_real_escape_string($link, $pieces[0]);
                        $music_name = mysqli_real_escape_string($link, $pieces[1]);
                        $sql = "INSERT INTO repertoire (category, sub_category, executor, music_name)
                        VALUES ('$category_sql', 'Популярные', '$executor', '$music_name');";
                        mysqli_query($link, $sql);
                    }
                } else {
                    foreach ($sub_values as $value) {
                        // explode — Разбивает строку с помощью разделителя
                        $pieces = explode("+", $value);
                        $sub_category_sql = mysqli_real_escape_string($link, $sub_category);
                        $executor = mysqli_real_escape_string($link, $pieces[0]);
                        $music_name = mysqli_real_escape_string($link, $pieces[1]);
                        $sql = "INSERT INTO repertoire (category, sub_category, executor, music_name)
                        VALUES ('$category_sql', '$sub_category_sql', '$executor', '$music_name');";
                        mysqli_query($link, $sql);
                    }
                }
            } else {
                // explode — Разбивает строку с помощью разделителя
                $pieces = explode("+", $sub_values);
                $executor = mysqli_real_escape_string($link, $pieces[0]);
                $music_name = mysqli_real_escape_string($link, $pieces[1]);
                $sql = "INSERT INTO repertoire (category, sub_category, executor, music_name)
                VALUES ('$category_sql', '', '$executor', '$music_name');";
                mysqli_query($link, $sql);
            }
        }
    }
}
mysqli_close($link);
$_SESSION['success'] = 'Добавление прошло успешно :)';
header("Location: " . $_SERVER['HTTP_REFERER']);
