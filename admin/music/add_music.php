<?php
include '../../inc/connect_db.php';

// Экранизация символов в строке
$category = mysqli_real_escape_string($link, $_POST['category']);
$sub_category = mysqli_real_escape_string($link, $_POST['sub_category']);
$executor = mysqli_real_escape_string($link, $_POST['executor']);
$music_name = mysqli_real_escape_string($link, $_POST['music_name']);

$sql = "INSERT INTO repertoire (category, sub_category, executor, music_name)
        VALUES ('$category', '$sub_category', '$executor', '$music_name')";
mysqli_query($link, $sql);
mysqli_close($link);
header("Location: " . $_SERVER['HTTP_REFERER']);