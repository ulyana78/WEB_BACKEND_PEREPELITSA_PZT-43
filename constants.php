<?php
// Пользовательская константа
define("SITE_NAME", "Лабораторная работа 1 BackEnd");

// Предопределённые константы
$file = __FILE__;
$line = __LINE__;
$php_version = PHP_VERSION;

echo "<h2>Константы</h2>";
echo "Название сайта: " . SITE_NAME . "<br>";

echo "<h2>Предопределённые константы</h2>";
echo "Текущий файл: $file<br>";
echo "Строка: $line<br>";
echo "Версия PHP: $php_version<br>";

