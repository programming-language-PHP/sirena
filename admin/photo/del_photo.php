<?php
session_start();
include '../../inc/connect_db.php';
$url = mysqli_real_escape_string($link, $_POST['url']);
$is_url = filter_var($url, FILTER_VALIDATE_URL);
if (!$is_url) {
    $file_path = '../../' . $url;
    unlink($file_path);
}
$sql = "DELETE FROM photo WHERE url='$url'";
mysqli_query($link, $sql);
mysqli_close($link);
$_SESSION['success'] = 'Удаление прошло успешно :)';
header("Location: " . $_SERVER['HTTP_REFERER']);
