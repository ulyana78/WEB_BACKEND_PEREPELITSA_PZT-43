<?php
echo "<h2>Пользовательские функции</h2>";

// простая функция
function hello($name) {
    return "Привет, $name!";
}

echo hello("друг") . "<br>";


// функция с вычислением
function sum($a, $b) {
    return $a + $b;
}

echo "Сумма 5 и 3 = " . sum(5, 3) . "<br>";


// функция без параметров
function showDate() {
    echo "Сегодня: " . date("Y-m-d") . "<br>";
}

showDate();
?>
