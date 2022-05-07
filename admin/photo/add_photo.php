<?php
include '../../inc/connect_db.php';
$url = 'assets/img/gallery/';
$file_data = array_combine($_FILES['files']['name'], $_FILES['files']['tmp_name']);
foreach ($file_data as $filename => $file_tmp_name) {
    $sql = "INSERT INTO photo (date_added, url) VALUES (now(), '$url')";
    mysqli_query($link, $sql);
    $last_id = mysqli_insert_id($link);

    $ext = pathinfo(basename($filename), PATHINFO_EXTENSION);
    $upload_file = $url . $last_id . '.' . $ext;
    $sql = "UPDATE photo SET url = '$upload_file' WHERE id = $last_id";
    mysqli_query($link, $sql);

    $upload_file = '../../' . $upload_file;
    move_uploaded_file($file_tmp_name, $upload_file);
}
mysqli_close($link);
header("Location: " . $_SERVER['HTTP_REFERER']);