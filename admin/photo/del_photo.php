<?php
$url = $_POST['url'];
$delete_file = '../' . $url;
unlink($delete_file);

include '../inc/connect_db.php';
$sql = "DELETE FROM photo WHERE url='$url'";
mysqli_query($link, $sql);
mysqli_close($link);
header("Location: " . $_SERVER['HTTP_REFERER']);