<?php 
echo "<h2>Типы данных в PHP</h2>";

/* Скалярные типы */
$int = 18;                 // целое число (integer)
$float = 2.31;             // вещественное число (float)
$string = "Привет";        // строка (string)
$bool = true;              // логический тип (boolean)

/* Составные типы */
$array = [1, 2, 3];        // массив (array)

class Person {}            // создаём простой класс
$object = new Person();    // объект (object)

/* Специальные типы */
$nullVar = null;           // null
$resource = fopen(__FILE__, "r"); // ресурс (resource)

echo "<h3>Скалярные типы</h3>";
echo "integer = $int<br>";
echo "float = $float<br>";
echo "string = $string<br>";
echo "boolean = " . ($bool ? "true" : "false") . "<br><br>";

echo "<h3>Составные типы</h3>";
echo "array[0] = {$array[0]}<br>";
echo "object = ";
var_dump($object);
echo "<br><br>";

echo "<h3>Специальные типы</h3>";
echo "null = ";
var_dump($nullVar);
echo "<br>";

echo "resource = ";
var_dump($resource);
echo "<br>";

// закрываем ресурс
fclose($resource);
?>
