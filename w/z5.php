<?php
echo "Задание 5:<br>";

$S1 = "Я люблю Беларусь";
$S2 = "Я учусь в Политехническом колледже.";

// длина строки
$length2 = mb_strlen($S2, "UTF-8");

$n = 3;
$char = mb_substr($S1, $n - 1, 1, "UTF-8");

// ASCII-код символа
$ascii = unpack('C', mb_convert_encoding($char, 'CP1251', 'UTF-8'))[1];

// замена слова 
$S1_replaced = str_replace("Беларусь", "Минск", $S1);

echo "Строка S1: $S1<br>";
echo "Строка S2: $S2<br>";
echo "Длина строки S2: $length2<br>";
echo "Символ №$n: $char<br>";
echo "ASCII-код символа: $ascii<br>";
echo "Строка после замены: $S1_replaced<br>";
?>
