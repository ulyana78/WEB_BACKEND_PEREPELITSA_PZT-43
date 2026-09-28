
<!--Регистрация -->

<h3>Задание 3 — Простая регистрация (POST)</h3>

<!-- Форма регистрации -->
<form method="post">
    <label>Имя:</label>
    <input type="text" name="reg_name" required><br>

    <label>Email:</label>
    <input type="email" name="reg_email" required><br>

    <label>Пароль:</label>
    <input type="password" name="reg_pass" required><br>

    <button type="submit" name="reg_btn">Зарегистрироваться</button>
</form>

<?php
// Проверяем отправку формы регистрации
if (isset($_POST['reg_btn'])) {

    echo "<p><b>Регистрация успешна:</b><br>";
    echo "Имя: " . htmlentities($_POST['reg_name']) . "<br>";
    echo "Email: " . htmlentities($_POST['reg_email']) . "<br>";
    echo "Пароль: " . htmlentities($_POST['reg_pass']) . "</p>";
}
?>