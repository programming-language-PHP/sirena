<?php
function createJson($query)
{
    $items = array();
    foreach ($query as $item) {
        $items[] = $item;
    }
    // JSON_UNESCAPED_UNICODE - не кодировать многобайтовые символы Unicode
    return json_encode($items, JSON_UNESCAPED_UNICODE);
}