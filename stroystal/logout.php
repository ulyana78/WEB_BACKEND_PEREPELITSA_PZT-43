<?php
session_start();
// Полностью уничтожаем сессию
$_SESSION = array();
session_destroy();

// Удаляем куки "Запомнить меня", если они были установлены
if (isset($_COOKIE['remember_user'])) {
    setcookie('remember_user', '', time() - 3600, "/");
}

// Возвращаем пользователя на главную страницу
header("Location: index.php");
exit;
?>