<?php
// Начинаем сессию, чтобы знать, залогинен ли пользователь
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Путь к файлу, где будут храниться отзывы
$file_path = 'includes/reviews_data.txt'; 
$message = '';

// 1. ОБРАБОТКА ФОРМЫ (Запись в файл)
if (isset($_POST['do_review'])) {
    $name = trim($_POST['review_name']);
    $text = trim($_POST['review_text']);
    $date = date('d.m.Y H:i');

    if (!empty($name) && !empty($text)) {
        // Очищаем текст от опасных тегов и заменяем переносы на <br>
        $name = htmlspecialchars($name);
        $text = str_replace("\n", "<br>", htmlspecialchars($text));
        
        // Формируем строчку для файла. Разделим данные знаками |||
        $review_line = "{$date}|||{$name}|||{$text}\n";

        // РАБОТА С ФАЙЛАМИ: Дописываем строчку в конец файла
        file_put_contents($file_path, $review_line, FILE_APPEND | LOCK_EX);
        
        $message = "<p style='color: green; font-weight: bold; text-align: center;'>Отзыв успешно добавлен!</p>";
    } else {
        $message = "<p style='color: red; font-weight: bold; text-align: center;'>Заполните все поля!</p>";
    }
}

// Подключаем шапку сайта
include 'includes/header.php';
?>

<main style="padding: 160px 20px 80px 20px; background-color: #f9f9f9; min-height: 80vh; font-family: 'Montserrat', sans-serif;">
    <div style="max-width: 600px; margin: 0 auto; background: #fff; padding: 30px; border-radius: 4px; box-shadow: 0 4px 10px rgba(0,0,0,0.05);">
        
        <h2 style="font-family: 'Roboto Condensed', sans-serif; color: #00205b; text-align: center; margin-bottom: 20px;">
            ОТЗЫВЫ О КОМПАНИИ
        </h2>

        <?= $message; ?>

        <form action="reviews.php" method="POST" style="margin-bottom: 40px; border-bottom: 2px solid #f0f0f0; padding-bottom: 30px;">
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: bold;">Ваше имя:</label>
                <input type="text" name="review_name" value="<?= isset($_SESSION['user_login']) ? htmlspecialchars($_SESSION['user_login']) : ''; ?>" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: bold;">Отзыв:</label>
                <textarea name="review_text" rows="4" required style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; resize: none;"></textarea>
            </div>
            <button type="submit" name="do_review" style="background-color: #ff6b00; color: #fff; border: none; padding: 12px 20px; font-weight: bold; cursor: pointer; border-radius: 4px;">
                ОСТАВИТЬ ОТЗЫВ
            </button>
        </form>

        <h3 style="font-family: 'Roboto Condensed', sans-serif; color: #00205b; margin-bottom: 15px;">Последние отзывы:</h3>

        <?php
        if (file_exists($file_path)) {
            // Читаем файл построчно в массив
            $reviews = file($file_path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            
            // Разворачиваем, чтобы новые отзывы были вверху
            $reviews = array_reverse($reviews);

            if (!empty($reviews)) {
                foreach ($reviews as $review) {
                    // Разбираем строку по нашему разделителю |||
                    $parts = explode('|||', $review);
                    if (count($parts) == 3) {
                        list($date, $name, $text) = $parts;
                        echo "<div style='background: #f0f4f8; padding: 15px; border-radius: 4px; margin-bottom: 15px; border-left: 4px solid #00205b;'>";
                        echo "<div style='display: flex; justify-content: space-between; font-size: 12px; color: #666; margin-bottom: 5px;'>";
                        echo "<strong>" . htmlspecialchars($name) . "</strong>";
                        echo "<span>" . htmlspecialchars($date) . "</span>";
                        echo "</div>";
                        echo "<p style='margin: 0; font-size: 14px; color: #333;'>" . $text . "</p>";
                        echo "</div>";
                    }
                }
            } else {
                echo "<p style='color: #999; italic;'>Отзывов пока нет.</p>";
            }
        } else {
            echo "<p style='color: #999; italic;'>Отзывов пока нет.</p>";
        }
        ?>

    </div>
</main>

<?php 
// Подключаем подвал сайта
include 'includes/footer.php'; 
?>