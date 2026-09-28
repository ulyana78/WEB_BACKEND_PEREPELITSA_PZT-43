<?php 
// Запускаем сессию, если она еще не запущена
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include '../stroystal/db.php'; 

$message = ''; 

// 1. Исправили проверку на метод POST для безопасности паролей
if (isset($_POST['do_register'])) {
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);

    if (!empty($login) && !empty($password)) {
        // Хешируем пароль для безопасности (так его поймет login.php)
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        try {
            // Запрос на добавление данных в БД otdel_kadrov в таблицу users
            $sql = "INSERT INTO users (login, password) VALUES (:login, :password)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['login' => $login, 'password' => $hashed_password]);

            // Добавили ссылку на вход для удобства
            $message = "<p style='color: green; font-weight: bold; text-align: center;'>Регистрация успешна! </p>";
        } catch (\PDOException $e) {
            $message = "<p style='color: red; font-weight: bold; text-align: center;'>Логин уже занят!</p>";
        }
    }
}

// 2. Сделали регистр буквы «I» в названии папки одинаковым
include 'Includes/header.php'; 
?>

<main style="padding: 160px 20px 80px 20px; background-color: #f0f0f0; min-height: 80vh; display: flex; justify-content: center; align-items: center;">
    <div style="background: #ffffff; width: 100%; max-width: 450px; padding: 40px; border-radius: 4px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); border-top: 5px solid #00205b;">
        <h2 style="font-family: 'Roboto Condensed', sans-serif; color: #00205b; margin-bottom: 25px; text-align: center;">РЕГИСТРАЦИЯ</h2>
        
        <?= $message; ?>

        <form action="register.php" method="POST" style="font-family: 'Montserrat', sans-serif;">
            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px;">Логин:</label>
                <input type="text" name="login" required style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
            </div>
            <div style="margin-bottom: 25px;">
                <label style="display: block; margin-bottom: 8px;">Пароль:</label>
                <input type="password" name="password" required style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
            </div>
            
            <button type="submit" name="do_register" style="width: 100%; padding: 14px; background-color: #00205b; color: white; border: none; border-radius: 4px; font-weight: bold; cursor: pointer; font-size: 16px;">
                ЗАРЕГИСТРИРОВАТЬСЯ
            </button>
            
            <p style="text-align: center; margin-top: 20px; font-size: 14px; color: #555;">
                Уже есть аккаунт? <a href="login.php" style="color: #00205b; font-weight: 600; text-decoration: none;">Войти</a>
            </p>
        </form>
    </div>
</main>

<?php 
// Если у вас есть подвал сайта, можно раскомментировать строчку ниже:
// include 'Includes/footer.php'; 
?>