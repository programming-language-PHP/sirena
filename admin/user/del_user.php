<?php
include '../../inc/connect_db.php';

$user_id = mysqli_real_escape_string($link, $_POST["user_id"]);
if ($user_id != 1) {
    $sql = "DELETE FROM user WHERE id = '$user_id'";
    mysqli_query($link, $sql);
}
mysqli_close($link);
header("Location: " . $_SERVER['HTTP_REFERER']);
