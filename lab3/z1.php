
<!-- Форма отправляет данные через метод GET -->
<form method="get">
    <label>Имя:</label>
    <input type="text" name="get_name" required><br>

    <label>Возраст:</label>
    <input type="number" name="get_age" required><br>

    <button type="submit">Отправить</button>
</form>


<?php
// Проверяем, были ли переданы параметры через GET
if (isset($_GET['get_name'], $_GET['get_age'])) {

    // htmlentities() — защита от XSS
    echo "<p><b>Результат:</b><br>";
    echo "Имя: " . htmlentities($_GET['get_name']) . "<br>";
    echo "Возраст: " . htmlentities($_GET['get_age']) . "</p>";
}
?>
