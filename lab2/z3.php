<?php
echo "<h2>Операторы PHP</h2>";

$x = 10;
$y = 5;

echo "<h3>Условный оператор if / else</h3>";
if ($x > $y) {
    echo "x больше y<br>";
} else {
    echo "x меньше или равно y<br>";
}

echo "<h3>Оператор множественного выбора switch / case</h3>";
$day = 3;
switch ($day) {
    case 1: echo "Понедельник<br>"; break;
    case 2: echo "Вторник<br>"; break;
    case 3: echo "Среда<br>"; break;
    default: echo "Неизвестный день<br>";
}

echo "<h3>Циклы while, do..while, for</h3>";

echo "Цикл while: ";
$i = 1;
while ($i <= 3) {
    echo $i . " ";
    $i++;
}
echo "<br>";

echo "Цикл do..while: ";
$j = 1;
do {
    echo $j . " ";
    $j++;
} while ($j <= 3);
echo "<br>";

echo "Цикл for: ";
for ($k = 1; $k <= 3; $k++) {
    echo $k . " ";
}
echo "<br>";

echo "<h3>Операторы break и continue</h3>";

echo "Пример continue: ";
for ($n = 1; $n <= 5; $n++) {
    if ($n == 3) continue; // пропускаем 3
    echo $n . " ";
}
echo "<br>";

echo "Пример break: ";
for ($m = 1; $m <= 5; $m++) {
    if ($m == 4) break; // останавливаем цикл
    echo $m . " ";
}
echo "<br>";

echo "<h3>Операторы include / require</h3>";
echo "Эти операторы подключают файлы:<br>";
echo "include 'file.php';<br>";
echo "require 'config.php';<br>";
echo "include_once 'header.php';<br>";
echo "require_once 'init.php';<br>";
?>
