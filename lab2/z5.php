<?php
echo "<h2>Работа с массивами в PHP</h2>";

/* Индексный массив — простой список значений */
echo "<h3>Индексный массив</h3>";

$colors = ["красный", "жёлтый", "фиолетовый", "оранжевый"]; // создаём массив цветов

echo "Количество элементов: " . count($colors) . "<br>"; // выводим размер массива

echo "Перебор через for:<br>";
for ($i = 0; $i < count($colors); $i++) { // перебираем массив по индексам
    echo "$i: $colors[$i]<br>";
}

echo "<br>Перебор через foreach:<br>";
foreach ($colors as $c) echo "- $c<br>"; // перебор значений массива

echo "<br>print_r:<br>";
print_r($colors); // вывод массива целиком


/* Ассоциативный массив — ключи задаём вручную */
echo "<h3>Ассоциативный массив</h3>";

$person = [
    "name" => "Ульяна",
    "age" => 18,
    "city" => "Гродно",
    "hobby" => "рисование"
];

foreach ($person as $key => $value) { // выводим ключ и значение
    echo "$key → $value<br>";
}

echo "<br>Изменим значение:<br>";
$person["hobby"] = "фотография"; // меняем элемент массива
echo "Новое хобби: " . $person["hobby"] . "<br>";


/* Создание массива через array() — альтернативный способ */
echo "<h3>Создание массива через array()</h3>";

$animals = array("кот", "собака", "лиса", "енот"); // массив животных
echo "Второй элемент: " . $animals[1] . "<br>";

$prices = array(
    "яблоко" => 1.2,
    "банан" => 1.5,
    "киви" => 2.0
); // массив цен

echo "Цена банана: " . $prices["банан"] . "<br>";


/* Перебор массивов разными способами */
echo "<h3>Перебор массивов</h3>";

echo "foreach (ключ + значение):<br>";
foreach ($prices as $fruit => $price) { // перебор ассоциативного массива
    echo "$fruit стоит $price €<br>";
}

echo "<br>Перебор через list() и each():<br>";
reset($prices); // сбрасываем указатель массива
while (list($fruit, $price) = each($prices)) { // старый способ перебора
    echo "$fruit — $price<br>";
}


/* Многомерные массивы — массивы внутри массива */
echo "<h3>Многомерные массивы</h3>";

$library = [
    "fantasy" => ["Гарри Поттер", "Ведьмак", "Хоббит"],
    "sci-fi" => ["Дюна", "Марсианин"],
    "detective" => ["Шерлок Холмс", "Десять негритят"]
];

foreach ($library as $genre => $books) { // перебор жанров
    echo "<b>$genre</b><br>";
    foreach ($books as $b) echo "- $b<br>"; // перебор книг внутри жанра
    echo "<br>";
}

echo "Первый фантастический роман: " . $library["fantasy"][0] . "<br>";


/* Встроенные функции для работы с массивами */
echo "<h3>Встроенные функции</h3>";

echo "is_array: ";
echo is_array($library) ? "да, это массив<br>" : "нет<br>"; // проверка типа

echo "count жанров: " . count($library) . "<br>"; // количество элементов

echo "<br>shuffle:<br>";
$nums = [1, 2, 3, 4, 5, 6];
shuffle($nums); // перемешиваем массив
print_r($nums);

echo "<br><br>compact:<br>";
$brand = "Apple";
$model = "iPhone 15";
$year = 2023;
$info = compact('brand', 'model', 'year'); // создаём массив из переменных
print_r($info);


/* Сортировка массивов разными способами */
echo "<h3>Сортировка массивов</h3>";

$students = [
    "yana" => "Яна",
    "andrey" => "Андрей",
    "kirill" => "Кирилл"
];

echo "asort (по значениям):<br>";
asort($students); // сортировка по значениям
print_r($students);

echo "<br><br>arsort (обратная сортировка):<br>";
arsort($students); // сортировка по значениям в обратном порядке
print_r($students);

echo "<br><br>ksort (по ключам):<br>";
ksort($students); // сортировка по ключам
print_r($students);

echo "<br><br>krsort (по ключам обратно):<br>";
krsort($students); // сортировка по ключам в обратном порядке
print_r($students);

echo "<br><br>natsort (естественная сортировка):<br>";
$versions = ["v1", "v10", "v2"];
natsort($versions); // сортировка с учётом чисел
print_r($versions);

echo "<br><br>natcasesort (без учета регистра):<br>";
$mix = ["apple", "Banana", "cherry", "Apricot"];
natcasesort($mix); // сортировка без учета регистра
print_r($mix);


/* Сортировка по ключам — отдельный пример */
echo "<h3>Сортировка по ключам</h3>";

$products = [
    "b03" => "Хлеб",
    "a01" => "Молоко",
    "c12" => "Сыр",
    "a15" => "Йогурт"
]; // массив с ключами-кодами

echo "Исходный массив:<br>";
print_r($products);
echo "<br><br>";

echo "ksort — сортировка по ключам по возрастанию:<br>";
ksort($products); // сортировка по ключам
print_r($products);
echo "<br><br>";

echo "krsort — сортировка по ключам по убыванию:<br>";
krsort($products); // сортировка по ключам в обратном порядке
print_r($products);
echo "<br><br>";


/* Естественная сортировка — пример с номерами комнат */
echo "<h3>Естественная сортировка</h3>";

$rooms = ["Room 2", "Room 15", "Room 3", "room 10"]; // строки с числами внутри

echo "Обычная сортировка (sort):<br>";
$copy1 = $rooms;
sort($copy1); // сортировка как строк
print_r($copy1);
echo "<br><br>";

echo "natsort — естественная сортировка:<br>";
$copy2 = $rooms;
natsort($copy2); // сортировка с учётом чисел
print_r($copy2);
echo "<br><br>";

echo "natcasesort — естественная сортировка без учета регистра:<br>";
$copy3 = $rooms;
natcasesort($copy3); // сортировка без учета регистра
print_r($copy3);
echo "<br><br>";

?>
