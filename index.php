<?php
// Главная страница со ссылками на задания
// Лабораторная работа 1
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Работы</title>
</head>
<body>
    
    <h1>Лабораторная работа №1</h1>
    <ul>
        <li><a href="phpinfo.php">Информация phpinfo()</a></li>
        <li><a href="hello.php">Привет всем + информация о разработчике</a></li>
        <li><a href="variables.php">Переменные разных типов</a></li>
        <li><a href="constants.php">Константы и предопределённые константы</a></li>
        <li><a href="superglobals.php">Предопределённые переменные (superglobals)</a></li>
    </ul>
    <hr>
    <?php
    // тем контроль
    ?>
    <?php include "lab2.php"; ?> 
    <?php include "z2.php"; ?> 
    <br>
    <br>
    <?php include "z3.php"; ?> 
    <br>
    <br>
    <?php include "z4.php"; ?> 
    <br>
    <br>
    <?php include "z5.php"; ?> 
    <hr>
    
    <?php
    // Лабораторная работа 2
    ?>
    <h1>Лабораторная работа №2</h1>
    <a href="lab2/z1.php">Типы данных</a><br>
    <a href="lab2/z2.php">Операции php</a><br>
    <a href="lab2/z3.php">Операторы php</a><br>
    <a href="lab2/z4.php">Пользовательские функции</a><br>
    <a href="lab2/z5.php">Массивы</a><br>
    <a href="lab2/z6.php">Строковый тип данных</a><br>
    <a href="lab2/z7.php">Использование встроенных мат. функц. и т.д.</a><br>

    <hr>
    <?php
    // Лабораторная работа 3
    ?>
    <h1>Лабораторная работа №3</h1>
    <a href="lab3/z1.php">Задание 1 GET</a><br>
    <a href="lab3/z2.php">Задание 2</a><br>
    <a href="lab3/z3.php">Задание 3</a><br>
    <a href="lab3/z4.php">Задание 4</a><br>
</html>
