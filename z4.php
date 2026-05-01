<?php
echo "Задание 4:<br>";

$arr = [5, 12, -3, 8, 20, 7, 1];

// сохранение копии для вывода
$original = $arr;

$max = max($arr);

$temp = $arr[0];
$arr[0] = $arr[count($arr) - 1];
$arr[count($arr) - 1] = $temp;

echo "Исходный массив: " . implode(", ", $original) . "<br>";
echo "Максимальный элемент: $max<br>";
echo "Изменённый массив: " . implode(", ", $arr) . "<br>";
?>