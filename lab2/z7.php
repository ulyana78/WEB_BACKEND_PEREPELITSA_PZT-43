<?php
echo "<h2>Матем. функции, дата/время, календарь, массивы, строки</h2>";

/* математические функции */
echo "<h3>Математические функции</h3>";

echo "Квадратный корень из 49: " . sqrt(49) . "<br>";
echo "Округление 3.14159: " . round(3.14159, 2) . "<br>";
echo "Абсолютное значение -15: " . abs(-15) . "<br>";
echo "Случайное число 1–100: " . rand(1, 100) . "<br>";
echo "Число Пи: " . pi() . "<br>";


/* дата и время */
echo "<h3>Дата и время</h3>";

echo "Текущая дата: " . date("Y-m-d") . "<br>";
echo "Текущее время: " . date("H:i:s") . "<br>";
echo "День недели: " . date("l") . "<br>";
echo "Полная дата: " . date("d.m.Y H:i") . "<br>";

$timestamp = strtotime("2026-01-01");
echo "Timestamp 01.01.2026: " . $timestamp . "<br>";

echo "Дата через 10 дней: " . date("Y-m-d", strtotime("+10 days")) . "<br>";


/* календарь */
echo "<h3>Календарные функции</h3>";

echo "Количество дней в феврале 2026: " . cal_days_in_month(CAL_GREGORIAN, 2, 2026) . "<br>";


/* функции массивов */
echo "<h3>Функции массивов</h3>";

$nums = [10, 3, 7, 1];

echo "Исходный массив: ";
print_r($nums);
echo "<br>";

sort($nums);
echo "Отсортированный: ";
print_r($nums);
echo "<br>";

echo "Максимум: " . max($nums) . "<br>";
echo "Минимум: " . min($nums) . "<br>";

array_push($nums, 100);
echo "После добавления 100: ";
print_r($nums);
echo "<br>";

array_pop($nums);
echo "После удаления последнего: ";
print_r($nums);
echo "<br>";


/* строковые функции */
echo "<h3>Строковые функции</h3>";

$str = "Hello, PHP World!";

echo "Строка: $str<br>";
echo "Длина строки: " . strlen($str) . "<br>";
echo "В верхнем регистре: " . strtoupper($str) . "<br>";
echo "В нижнем регистре: " . strtolower($str) . "<br>";
echo "Замена 'World' на 'User': " . str_replace("World", "User", $str) . "<br>";
echo "Первые 5 символов: " . substr($str, 0, 5) . "<br>";
echo "Позиция 'PHP': " . strpos($str, "PHP") . "<br>";
?>
