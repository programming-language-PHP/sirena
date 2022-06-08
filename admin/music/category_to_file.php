<?php
function addingCategoryToFile($category)
{
    // Дообавление категории в файл
    $file = '../../inc/category_output_order.txt';
    $file_content = file_get_contents($file);
    // str_contains — Определяет, содержит ли строка заданную подстроку
    $is_category_in_file = str_contains($file_content, $category);
    if (!$is_category_in_file) {
        if (empty($file_content)) {
            $file_content .= $category;
        } else {
            $file_content .= ',' . $category;
        }
        // Пишем содержимое обратно в файл
        file_put_contents($file, $file_content);
    }
}

function deleteCategoryToFile($category)
{
    // Дообавление категории в файл
    $file = '../../inc/category_output_order.txt';
    $file_content = file_get_contents($file);

    $arr_file_content = explode(',', $file_content);;
    $delete_category = array_diff($arr_file_content, array($category));
    $file_content = implode(',', $delete_category);
    // Пишем содержимое обратно в файл
    file_put_contents($file, $file_content);
}
