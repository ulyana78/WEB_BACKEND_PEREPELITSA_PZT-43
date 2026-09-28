<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация — Вариант 5</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: inline-block;
            width: 120px;
        }
        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="password"] {
            width: 250px;
            padding: 5px;
        }
        .checkbox-group {
            margin-bottom: 15px;
        }
        button {
            padding: 5px 15px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <h2>Регистрация</h2>
    
    <form action="handler.php" method="POST">
        <div class="form-group">
            <label for="fio">Ф.И.О.</label>
            <input type="text" id="fio" name="fio" placeholder="Сергей" required>
        </div>

        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" placeholder="mail@mail.ru" required>
        </div>

        <div class="form-group">
            <label for="password">Пароль</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div class="form-group">
            <label for="password_confirm">Повтор пароля</label>
            <input type="password" id="password_confirm" name="password_confirm" required>
        </div>

        <div class="checkbox-group">
            <input type="checkbox" id="agreement" name="agreement" value="yes" required>
            <label for="agreement">Я принимаю пользовательское соглашение</label>
        </div>

        <button type="submit">Зарегистрироваться</button>
    </form>

</body>
</html>