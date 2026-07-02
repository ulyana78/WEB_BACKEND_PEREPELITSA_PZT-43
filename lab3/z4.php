<h3>Задание 4 — Форма заказа кофе</h3>

<!-- Форма заказа кофе -->
<form method="post">

    <label>Ваше имя:</label>
    <input type="text" name="coffee_name" required>

    <p>Размер кофе:</p>
    <label><input type="radio" name="size" value="Маленький" required> Маленький</label>
    <label><input type="radio" name="size" value="Средний"> Средний</label>
    <label><input type="radio" name="size" value="Большой"> Большой</label>

    <p>Добавки:</p>
    <label><input type="checkbox" name="addons[]" value="Молоко"> Молоко</label>
    <label><input type="checkbox" name="addons[]" value="Карамель"> Карамель</label>
    <label><input type="checkbox" name="addons[]" value="Шоколад"> Шоколад</label>
    <label><input type="checkbox" name="addons[]" value="Ваниль"> Ваниль</label>

    <p>Тип кофе:</p>
    <select name="type">
        <option value="Американо">Американо</option>
        <option value="Капучино">Капучино</option>
        <option value="Латте">Латте</option>
        <option value="Эспрессо">Эспрессо</option>
    </select>

    <br><br>
    <button type="submit" name="coffee_btn">Оформить заказ</button>
</form>

<?php
// Проверяем отправку формы
if (isset($_POST['coffee_btn'])) {

    echo "<p><b>Ваш заказ:</b><br>";
    echo "Имя: " . htmlentities($_POST['coffee_name']) . "<br>";
    echo "Размер: " . htmlentities($_POST['size']) . "<br>";
    echo "Тип кофе: " . htmlentities($_POST['type']) . "<br>";

    // Проверяем добавки
    if (!empty($_POST['addons'])) {
        echo "Добавки:<br>";
        foreach ($_POST['addons'] as $a) {
            echo "- " . htmlentities($a) . "<br>";
        }
    } else {
        echo "Без добавок<br>";
    }

    echo "</p>";
}
?>
