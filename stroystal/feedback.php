<?php
// Запускаем сессию
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Подключаем файлы PHPMailer, которые вы скачали в папку libs
require '../libs/PHPMailer/Exception.php';
require '../libs/PHPMailer/PHPMailer.php';
require '../libs/PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$message = '';
if (isset($_SESSION['mail_message'])) {
    $message = $_SESSION['mail_message'];
    unset($_SESSION['mail_message']); 
}

// ОБРАБОТКА ФОРМЫ
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

        // Текст письма, которое придет на почту
        $email_body = "<h3>Новая анкета обратной связи</h3><br>" .
                      "<b>Имя:</b> $name <br>" .
                      "<b>Email:</b> $email <br>" .
                      "<b>Телефон:</b> $phone <br>" .
                      "<b>Сообщение:</b><br>$text";

        $mail = new PHPMailer(true);
try {
            // НАСТРОЙКИ GMAIL SMTP
            $mail->isSMTP();                                            
            $mail->Host       = 'smtp.gmail.com';                       
            $mail->SMTPAuth   = true;                                   
            
            // 1. Впишите сюда вашу почту Gmail (perepelicaulana10@gmail.com)
            $mail->Username   = 'perepelicaulana10@gmail.com'; 
            
            // 2. Сюда вставляем ваш свежесгенерированный код без пробелов
            $mail->Password   = 'exrwtvpbgntwrizn';     

            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
            $mail->Port       = 465;                                    
            $mail->CharSet    = 'UTF-8';                                

            // 3. Здесь снова ваша почта Gmail
            $mail->setFrom('perepelicaulana10@gmail.com', 'СтройСтальПроект');
            
            // 4. И сюда тоже ваша почта (чтобы письмо пришло вам же на проверку)
            $mail->addAddress('perepelicaulana10@gmail.com');

            // Контент письма
            $mail->isHTML(true);                                        
            $mail->Subject = 'Новая анкета обратной связи СтройСтальПроект';
            $mail->Body    = $email_body;

            $mail->send();
            $_SESSION['mail_message'] = "<p style='color: green; font-weight: bold; text-align: center;'>Анкета успешно отправлена на почту!</p>";
        } catch (Exception $e) {
            $_SESSION['mail_message'] = "<p style='color: red; font-weight: bold; text-align: center;'>Ошибка отправки: {$mail->ErrorInfo}</p>";
        }

        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        $message = "<p style='color: red; font-weight: bold; text-align: center;'>Заполните обязательные поля!</p>";
    }
}

// Подключаем шапку сайта
include 'includes/header.php';
?>

<main style="padding: 160px 20px 80px 20px; background-color: #f9f9f9; min-height: 80vh; font-family: 'Montserrat', sans-serif;">
    <div style="max-width: 600px; margin: 0 auto; background: #fff; padding: 30px; border-radius: 4px; box-shadow: 0 4px 10px rgba(0,0,0,0.05);">
        
        <h2 style="font-family: 'Roboto Condensed', sans-serif; color: #00205b; text-align: center; margin-bottom: 20px;">
            ОБРАТНАЯ СВЯЗЬ / РАССЧИТАТЬ СТОИМОСТЬ
        </h2>

        <?= $message; ?>

        <form action="" method="POST">
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 6px; font-weight: 600; font-size: 14px;">Ваше имя *</label>
                <input type="text" name="fb_name" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 6px; font-weight: 600; font-size: 14px;">Ваш Email *</label>
                <input type="email" name="fb_email" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>

           <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 6px; font-weight: 600; font-size: 14px;">Контактный телефон *</label>
                <input type="text" name="fb_phone" required placeholder="+7 (___) ___--" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <div style="margin-bottom: 25px;">
                <label style="display: block; margin-bottom: 6px; font-weight: 600; font-size: 14px;">Что необходимо рассчитать? *</label>
                <textarea name="fb_text" rows="5" required placeholder="Опишите ваш проект или укажите размеры..." style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; resize: none; font-family: 'Montserrat', sans-serif;"></textarea>
            </div>

            <button type="submit" name="do_feedback" style="width: 100%; background-color: #00205b; color: #fff; border: none; padding: 12px; font-weight: bold; cursor: pointer; border-radius: 4px;">
                ОТПРАВИТЬ ЗАЯВКУ
            </button>
        </form>

    </div>
</main>

<?php 
include 'includes/footer.php'; 
?>