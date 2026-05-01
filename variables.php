<?php
// Примеры переменных разных типов

$name = "Перепелица Ульяна";      // string
$age = 18;              // integer
$height = 1.73;         // float
$is_student = true;     // boolean

echo "<h2>Переменные разных типов</h2>";

echo "Имя: $name<br>";
echo "Возраст: $age<br>";
echo "Рост: $height<br>";
print "Студент: " . ($is_student ? "Да" : "Нет") . "<br>";
