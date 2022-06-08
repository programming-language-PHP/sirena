<?php
require_once('category_to_file.php');

include '../../inc/connect_db.php';

if (isset($_POST['category'])) {
    $category = mysqli_real_escape_string($link, $_POST["category"]);
    $sql = "DELETE FROM repertoire WHERE category = '$category'";

    deleteCategoryToFile($category);
}
if (isset($_POST['sub_category'])) {
    $pieces = explode(",", $_POST['sub_category']);
    $category = mysqli_real_escape_string($link, $pieces[0]);
    $sub_category = mysqli_real_escape_string($link, $pieces[1]);
    $sql = "DELETE FROM repertoire WHERE category = '$category' and sub_category = '$sub_category'";
}
if (isset($_POST['music'])) {
    $music = mysqli_real_escape_string($link, $_POST["music"]);
    $sql = "DELETE FROM repertoire WHERE id = '$music'";
}
mysqli_query($link, $sql);
mysqli_close($link);
$_SESSION['success'] = 'Удаление прошло успешно :)';
header("Location: " . $_SERVER['HTTP_REFERER']);
