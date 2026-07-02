<?php
session_start();
include 'Includes/db.php';

$message = '';

if (isset($_POST['do_login'])) {
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);

    if (!empty($login) && !empty($password)) {
        $sql = "SELECT * FROM users WHERE login = :login";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['login' => $login]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            // МЕХАНИЗМ СЕССИЙ
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_login'] = $user['login'];

            // МЕХАНИЗМ COOKIE (Запоминаем логин на 30 дней)
            if (isset($_POST['remember'])) {
                setcookie('remember_user', $user['login'], time() + (30 * 24 * 60 * 60), "/");
            } else {
                setcookie('remember_user', '', time() - 3600, "/");
            }

            header("Location: index.php");
            exit;
        } else {
            $message = "<p style='color: red; font-weight: bold; text-align: center;'>Неверный логин или пароль!</p>";
        }
    }
}

$cookie_login = isset($_COOKIE['remember_user']) ? htmlspecialchars($_COOKIE['remember_user']) : '';
include 'includes/header.php';
?>

<main style="padding: 160px 20px 80px 20px; background-color: #f0f0f0; min-height: 80vh; display: flex; justify-content: center; align-items: center;">
    <div style="background: #ffffff; width: 100%; max-width: 450px; padding: 40px; border-radius: 4px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); border-top: 5px solid #00205b;">
        <h2 style="font-family: 'Roboto Condensed', sans-serif; color: #00205b; margin-bottom: 25px; text-align: center;">ВХОД</h2>
        
        <?= $message; ?>

        <form action="login.php" method="POST" style="font-family: 'Montserrat', sans-serif;">
            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px;">Логин:</label>
                <input type="text" name="login" value="<?= $cookie_login; ?>" required style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 8px;">Пароль:</label>
                <input type="password" name="password" required style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div style="margin-bottom: 25px; display: flex; align-items: center;">
                <input type="checkbox" name="remember" id="remember" <?= !empty($cookie_login) ? 'checked' : ''; ?> style="margin-right: 10px;">
                <label for="remember" style="font-size: 14px; color: #555;">Запомнить меня (COOKIE)</label>
            </div>
            <button type="submit" name="do_login" style="width: 100%; background-color: #00205b; color: #fff; border: none; padding: 14px; font-weight: bold; cursor: pointer; border-radius: 4px;">ВОЙТИ</button>
        </form>
    </div>
</main>

<?php include 'includes/footer.php'; ?>