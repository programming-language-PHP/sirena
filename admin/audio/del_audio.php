<?php
$filename = $_POST['filename'];
$folder_path = '../../audio/' . $filename;
delete($folder_path);
function delete($path): bool
{
    if (is_dir($path) === true) {
        $files = array_diff(scandir($path), array('.', '..'));

        foreach ($files as $file) {
            delete(realpath($path) . '/' . $file);
        }

        return rmdir($path);
    } else if (is_file($path) === true) {
        return unlink($path);
    }

    return false;
}

header("Location: " . $_SERVER['HTTP_REFERER']);