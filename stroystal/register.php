<?php 
include 'Includes/db.php'; 

$message = ''; 

// Проверяем отправку формы методом GET (как в задании)
if (isset($_GET['do_register'])) {
    $login = trim($_GET['login']);
    $password = trim($_GET['password']);

    if (!empty($login) && !empty($password)) {
        // Хешируем пароль для безопасности
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        try {
            // Запрос на добавление данных в БД
            $sql = "INSERT INTO users (login, password) VALUES (:login, :password)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['login' => $login, 'password' => $hashed_password]);

            $message = "<p style='color: green; font-weight: bold; text-align: center;'>Регистрация успешна!</p>";
        } catch (\PDOException $e) {
            $message = "<p style='color: red; font-weight: bold; text-align: center;'>Логин уже занят!</p>";
        }
    }
}

include 'includes/header.php'; 
?>

<main style="padding: 160px 20px 80px 20px; background-color: #f0f0f0; min-height: 80vh; display: flex; justify-content: center; align-items: center;">
    <div style="background: #ffffff; width: 100%; max-width: 450px; padding: 40px; border-radius: 4px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); border-top: 5px solid #00205b;">
        <h2 style="font-family: 'Roboto Condensed', sans-serif; color: #00205b; margin-bottom: 25px; text-align: center;">РЕГИСТРАЦИЯ</h2>
        
        <?= $message; ?>

        <form action="register.php" method="GET" style="font-family: 'Montserrat', sans-serif;">
            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px;">Логин:</label>
                <input type="text" name="login" required style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div style="margin-bottom: 25px;">
                <label style="display: block; margin-bottom: 8px;">Пароль:</label>
                <input type="password" name="password" required style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <button type="submit" name="do_register" style="width: 100%; background-color: #ff6b00; color: #fff; border: none; padding: 14px; font-weight: bold; cursor: pointer; border-radius: 4px;">ЗАРЕГИСТРИРОВАТЬСЯ</button>
        </form>
    </div>
</main>

<?php include 'includes/footer.php'; ?>