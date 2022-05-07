<?php
$url = mysqli_real_escape_string($link, $_POST['url']);
$file_path = '../../' . $url;
unlink($file_path);

include '../../inc/connect_db.php';
$sql = "DELETE FROM photo WHERE url='$url'";
mysqli_query($link, $sql);
mysqli_close($link);
header("Location: " . $_SERVER['HTTP_REFERER']);