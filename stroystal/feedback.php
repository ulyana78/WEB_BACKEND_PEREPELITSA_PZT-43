<?php
// Запускаем сессию
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Проверяем, есть ли сохраненное сообщение в сессии (чтобы показать его ОДИН раз после перезагрузки)
$message = '';
if (isset($_SESSION['mail_message'])) {
    $message = $_SESSION['mail_message'];
    unset($_SESSION['mail_message']); // Сразу удаляем, чтобы оно не появилось снова при следующем входе!
}

// ОБРАБОТКА ФОРМЫ (Только когда реально нажата кнопка)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['do_feedback'])) {
    $name = trim($_POST['fb_name']);
    $email = trim($_POST['fb_email']);
    $phone = trim($_POST['fb_phone']);
    $text = trim($_POST['fb_text']);

    if (!empty($name) && !empty($email) && !empty($text)) {
        $name = htmlspecialchars($name);
        $email = htmlspecialchars($email);
        $phone = htmlspecialchars($phone);
        $text = htmlspecialchars($text);

        $to = "admin@stroystal-proekt.ru"; 
        $subject = "Новая анкета обратной связи с сайта СтройСтальПроект";
        
        $email_body = "========================================\n" .
                      "          АНКЕТА ОБРАТНОЙ СВЯЗИ         \n" .
                      "========================================\n\n" .
                      "Имя отправителя:  $name\n" .
                      "Email для связи:  $email\n" .
                      "Телефон:          " . ($phone ? $phone : 'Не указан') . "\n\n" .
                      "Текст запроса:\n$text\n\n" .
                      "----------------------------------------\n" .
                      "Дата отправки анкеты: " . date('d.m.Y H:i:s') . "\n";

        $headers = "From: no-reply@stroystal-proekt.ru\r\n" .
                   "Reply-To: $email\r\n" .
                   "Content-Type: text/plain; charset=utf-8\r\n" .
                   "X-Mailer: PHP/" . phpversion();

        if (@mail($to, $subject, $email_body, $headers)) {
            $_SESSION['mail_message'] = "<div style='background: #e2f0d9; color: #385723; padding: 15px; border-radius: 4px; margin-bottom: 20px; font-weight: bold; text-align: center; border: 1px solid #385723;'> Анкета успешно отправлена на email $to!</div>";
        } else {
            $_SESSION['mail_message'] = "<div style='background: #fce4d6; color: #c65911; padding: 15px; border-radius: 4px; margin-bottom: 20px; font-weight: bold; text-align: center; border: 1px solid #c65911;'>❌ Ошибка локального сервера: функция mail() отключена или не настроена.<br><span style='font-weight: normal; font-size: 13px; color: #666;'>Если вы используете OpenServer, ищите отправленную анкету в папке: <br><b>userdata/logs/temp/mail/</b></span></div>";
        }
        
        // КРИТИЧЕСКИ ВАЖНО: Перенаправляем на эту же страницу «в чистую», чтобы сбросить POST-данные
        header("Location: feedback.php");
        exit();
        
    } else {
        $message = "<p style='color: red; font-weight: bold; text-align: center;'>Пожалуйста, заполните обязательные поля!</p>";
    }
}

// Подключаем шапку сайта
include 'Includes/header.php';
?>

<main style="padding: 160px 20px 80px 20px; background-color: #f0f0f0; min-height: 80vh; display: flex; justify-content: center; align-items: center; font-family: 'Montserrat', sans-serif;">
    
    <div style="background: #ffffff; width: 100%; max-width: 550px; padding: 40px; border-radius: 4px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); border-top: 5px solid #ff6b00;">
        
        <h2 style="font-family: 'Roboto Condensed', sans-serif; color: #00205b; margin-bottom: 10px; text-align: center; font-size: 26px;">
            ОБРАТНАЯ СВЯЗЬ
        </h2>
        <p style="text-align: center; color: #666; font-size: 14px; margin-bottom: 25px;">
            Оставьте заявку на расчёт стоимости металлоконструкций
        </p>

        <?= $message; ?>

        <form action="feedback.php" method="POST">
            
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 6px; font-weight: 600; font-size: 14px;">Ваше имя *</label>
                <input type="text" name="fb_name" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 6px; font-weight: 600; font-size: 14px;">Ваш Email *</label>
                <input type="email" name="fb_email" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 6px; font-weight: 600; font-size: 14px;">Контактный телефон</label>
                <input type="text" name="fb_phone" placeholder="+7 (___) ___-__-__" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <div style="margin-bottom: 25px;">
                <label style="display: block; margin-bottom: 6px; font-weight: 600; font-size: 14px;">Что необходимо рассчитать? *</label>
                <textarea name="fb_text" rows="5" required placeholder="Опишите ваш проект или укажите размеры..." style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; resize: none; font-family: 'Montserrat', sans-serif;"></textarea>
            </div>

            <button type="submit" name="do_feedback" style="width: 100%; background-color: #00205b; color: #fff; border: none; padding: 14px; font-family: 'Roboto Condensed', sans-serif; font-size: 16px; font-weight: bold; cursor: pointer; border-radius: 4px; transition: background 0.3s;">
                ОТПРАВИТЬ ЗАЯВКУ
            </button>

        </form>

    </div>
</main>

<?php 
// Подключаем подвал сайта
include 'Includes/footer.php'; 
?>