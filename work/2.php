<?php
// Обязательно запускаем сессию, чтобы получить доступ к переменным из прошлых заданий
session_start();

// --- ЗАДАНИЕ №3: РАБОТА С ФАЙЛАМИ ---
// Проверяем, есть ли данные в сессии, чтобы было что записывать
$login_val = isset($_SESSION['user_fio']) ? $_SESSION['user_fio'] : 'DefaultLogin';
$password_val = isset($_SESSION['user_password']) ? $_SESSION['user_password'] : 'DefaultPassword';

// 3.1. Создаем переменные $a и $b и сохраняем в них ЛОГИН и ПАРОЛЬ
$a = $login_val;
$b = $password_val;

// Формируем строку для записи (например, через двоеточие или с новой строки)
$text_to_write = "Логин: " . $a . " | Пароль: " . $b . "\n";

// 3.2. Записываем значения переменных $a и $b в файл с именем fio.txt
// Флаг FILE_APPEND позволяет дописывать данные, не затирая старые. 
// Если нужно каждый раз перезаписывать файл с нуля, удалите FILE_APPEND.
file_put_contents('fio.txt', $text_to_write, FILE_APPEND);
// ------------------------------------
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Страничка 2 — Сессии и Файлы</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; line-height: 1.6; }
        .info-block { background: #f4f4f4; padding: 15px; border-radius: 5px; max-width: 500px; margin-bottom: 20px; }
        .success-box { background: #e2f0d9; border: 1px solid #385723; padding: 10px; color: #385723; border-radius: 5px; max-width: 500px; }
        ul { padding-left: 20px; }
    </style>
</head>
<body>

    <h2>Страничка 2.php (Результаты заданий 2 и 3)</h2>

    <div class="info-block">
        <h3>Задание 2.3: Идентификатор сессии</h3>
        <p><strong>Имя идентификатора сессии:</strong> <?php echo session_name(); ?></p>
        <p><strong>Значение идентификатора (Session ID):</strong> <?php echo session_id(); ?></p>
    </div>

    <div class="info-block">
        <h3>Задания 2.1 и 2.2: Полученные данные из сессии</h3>
        <?php if (isset($_SESSION['user_fio']) && isset($_SESSION['user_password'])): ?>
            <ul>
                <li><strong>Ф.И.О. пользователя:</strong> <?php echo htmlspecialchars($_SESSION['user_fio']); ?></li>
                <li><strong>Пароль пользователя:</strong> <?php echo htmlspecialchars($_SESSION['user_password']); ?></li>
            </ul>
        <?php else: ?>
            <p style="color: red;">Данные в сессии не найдены.</p>
        <?php endif; ?>
    </div>

    <div class="success-box">
        <h3>Задание 3: Работа с файлами</h3>
        <p>Переменные <code>$a</code> и <code>$b</code> успешно созданы!</p>
        <p>Значения записаны в файл <strong>fio.txt</strong> в папке со скриптом.</p>
    </div>

    <br>
    <p><a href="index.php">Вернуться к форме регистрации</a></p>

</body>
</html>