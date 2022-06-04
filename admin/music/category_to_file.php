<?php
function addingCategoryToFile($category)
{
    // Дообавление категории в файл
    $file = '../../inc/category_output_order.txt';
    $file_content = file_get_contents($file);

    $file_content .= ',' . $category;
    // Пишем содержимое обратно в файл
    file_put_contents($file, $file_content);
}

function deleteCategoryToFile($category)
{
    // Дообавление категории в файл
    $file = '../../inc/category_output_order.txt';
    $file_content = file_get_contents($file);

    $file_content = str_replace(',' . $category, '', $file_content);
    // Пишем содержимое обратно в файл
    file_put_contents($file, $file_content);
}
