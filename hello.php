<?php
// Скрипт выводит приветствие и информацию о разработчике

$developer = "Перепелица Ульяна"; // Имя разработчика
$group = "ПЗТ-43";        // Группа (если нужно)
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Приветствие</title>
</head>
<body>
    <h1>Привет!!!</h1>
    <p>Скрипт разработала: <strong><?php echo $developer; ?></strong></p>
    <p>Группа: <?php echo $group; ?></p>
</body>
</html>
