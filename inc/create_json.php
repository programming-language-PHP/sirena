<?php
function createJson($query)
{
    $items = array();
    foreach ($query as $item) {
        $items[] = $item;
    }
    return json_encode($items, JSON_UNESCAPED_UNICODE);
}