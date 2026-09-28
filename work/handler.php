<?php
// Инициализируем сессию
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Получаем данные из POST-запроса (Задание 1)
    $fio = isset($_POST['fio']) ? htmlspecialchars(trim($_POST['fio'])) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';
    $password_confirm = isset($_POST['password_confirm']) ? trim($_POST['password_confirm']) : '';

    // Базовая проверка совпадения паролей перед сохранением
    if ($password !== $password_confirm) {
        die("Ошибка: Пароли не совпадают! <a href='index.php'>Вернуться назад</a>");
    }

    // Сохраняем ФИО и ПАРОЛЬ в сессионные переменные (Задание 2.1)
    $_SESSION['user_fio'] = $fio;
    $_SESSION['user_password'] = $password;

    // Перенаправляем пользователя на СТРАНИЧКУ 2.php (Задание 2.2)
    header("Location: 2.php");
    exit();

} else {
    echo "Ошибка: Доступ ограничен. Пожалуйста, отправьте форму.";
}
?>