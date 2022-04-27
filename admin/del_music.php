<?php
include 'connect_db.php';

$item = mysqli_real_escape_string($link, $_POST["item"]);
$sql = "DELETE FROM repertoire WHERE id = '$item' or category = '$item' or sub_category = '$item'";
mysqli_query($link, $sql);
mysqli_close($link);
header("Location: " . $_SERVER['HTTP_REFERER']);
