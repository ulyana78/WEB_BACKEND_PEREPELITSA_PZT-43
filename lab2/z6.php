<?php
echo "<h2>6. Строковый тип данных</h2>";

mb_internal_encoding("UTF-8");

// исходные строки
$text = "Привет, мир!";
$comment = "<b>Классный сайт!</b> <script>alert('XSS');</script>";
$price = " 2 345,90 руб. ";
$csv = "Петров;Ульяна;test@mail.com;18;Минск";
$name = "Ульяна";
$slug = "как дела сегодня";


/* 1. Способы записи строк */
echo "<h3>1. Способы записи строк</h3>";

echo 'Одинарные кавычки: Привет, $name!<br>'; // переменные не обрабатываются
echo "Двойные кавычки: Привет, $name!<br>";   // переменные обрабатываются

echo <<<TXT
HEREDOC пример:<br>
Привет, $name!<br>
Как проходит день?<br>
TXT;


/* 2. Доступ к символам */
echo "<h3>2. Доступ к символам</h3>";

echo "Первый символ (индекс): " . $text[0] . "<br>";
echo "Первый символ (mb_substr): " . mb_substr($text, 0, 1) . "<br>";

$chars = mb_str_split($slug);
$chars[0] = mb_strtoupper($chars[0]);
echo "Замена первой буквы: " . implode("", $chars) . "<br>";


/* 3. Операции со строками */
echo "<h3>3. Операции со строками</h3>";

$str = "Имя пользователя: ";
$str .= $name; // конкатенация
echo $str . "<br>";

echo "123 == '123'? ";
var_dump(123 == "123"); // сравнение по значению

echo "123 === '123'? ";
var_dump(123 === "123"); // строгое сравнение


/* 4. Длина строки */
echo "<h3>4. Длина строки</h3>";

echo "strlen: " . strlen($text) . "<br>";     // байты
echo "mb_strlen: " . mb_strlen($text) . "<br>"; // символы


/* 5. Поиск подстроки */
echo "<h3>5. Поиск подстроки</h3>";

echo "Позиция 'мир': " . mb_strpos($text, "мир") . "<br>";

echo "str_contains 'PHP': ";
var_dump(str_contains($text, "PHP"));

echo "Количество 'и': ";
var_dump(substr_count(mb_strtolower($text), "и"));


/* 6. Извлечение части строки */
echo "<h3>6. Извлечение части строки</h3>";

echo "Первые 6 символов: " . mb_substr($text, 0, 6) . "<br>";
echo "Последние 5 символов: " . mb_substr($text, -5) . "<br>";


/* 7. Замена */
echo "<h3>7. Замена</h3>";

echo str_replace("мир", "PHP", $text) . "<br>";
echo str_replace(" ", "_", $text) . "<br>";


/* 8. Работа с ценой */
echo "<h3>8. Работа с ценой</h3>";

$clean = trim($price); // удаляем пробелы
echo "trim: '$clean'<br>";

$clean = str_replace(["руб.", " ", ","], ["", "", "."], $clean);
echo "float: " . (float)$clean . "<br>";


/* 9. Изменение регистра */
echo "<h3>9. Изменение регистра</h3>";

echo mb_strtolower($slug) . "<br>";
echo mb_strtoupper($slug) . "<br>";
echo mb_convert_case($slug, MB_CASE_TITLE) . "<br>";


/* 10. Разбиение и объединение */
echo "<h3>10. Разбиение и объединение</h3>";

$parts = explode(";", $csv);
echo "Фамилия: {$parts[0]}<br>";
echo "Имя: {$parts[1]}<br>";
echo "Email: {$parts[2]}<br>";

echo implode("|", $parts) . "<br>";
echo implode(", ", mb_str_split($name)) . "<br>";


/* 11. Безопасный вывод */
echo "<h3>11. Безопасный вывод</h3>";

echo htmlspecialchars($comment) . "<br>"; // защита от XSS
echo strip_tags($comment) . "<br>";       // удаление HTML


/* 12. Форматирование */
echo "<h3>12. Форматирование</h3>";

$student = ['name' => 'Анастасия', 'age' => 18, 'grade' => 854.3];

echo sprintf(
    "Студент %s, возраст %d, оценка %.1f<br>",
    $student['name'], $student['age'], $student['grade']
);

echo number_format(98765.4321, 2, ',', ' ') . "<br>";
?>
