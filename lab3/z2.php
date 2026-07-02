
<!-- Форма отправляет логин и пароль методом POST -->
<form method="post">
    <label>Логин:</label>
    <input type="text" name="login" required><br>

    <label>Пароль:</label>
    <input type="password" name="password" required><br>

    <button type="submit" name="auth_btn">Войти</button>
</form>

<?php
// Проверяем, нажата ли кнопка авторизации
if (isset($_POST['auth_btn'])) {

    echo "<p><b>Авторизация:</b><br>";
    echo "Логин: " . htmlentities($_POST['login']) . "<br>";
    echo "Пароль: " . htmlentities($_POST['password']) . "</p>";
}
?>