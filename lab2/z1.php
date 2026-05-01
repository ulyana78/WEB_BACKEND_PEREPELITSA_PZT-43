<?php 
echo "<h2>Типы данных</h2>";

$int = 18;                 // целое
$float = 2.31;             // вещественное
$string = "Привет";        // строка
$bool = true;              // логическое значение (true/false)
$array = [1, 2, 3];        // массив
$nullVar = null;           // null

echo "int = $int<br>"; // выводим значение переменной $int
echo "float = $float<br>"; // выводим число с дробью
echo "string = $string<br>"; // выводим строку
echo "bool = " . ($bool ? "true" : "false") . "<br>"; // выводим 
echo "array[0] = {$array[0]}<br>"; // выводим первый элемент массива
echo "null = "; //  var_dump() показывает тип и значение переменной
var_dump($nullVar);
?>
