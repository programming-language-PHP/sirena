<?php
/* Включить отчёт об ошибках для mysqli, прежде чем пытаться установить соединение */
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$link = mysqli_connect('localhost', 'root', '', 'sirena');

/* Установка кодировки после установления соединения */
mysqli_set_charset($link, 'utf8mb4');
