<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Подключаем базу данных для вывода названий товаров
include 'db.php';

// Инициализируем корзину, если её ещё нет
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// 1. ЛОВИМ НАЖАТИЕ КНОПКИ "В КОРЗИНУ" ИЗ CATALOG.PHP
if (isset($_POST['add_to_cart']) && !empty($_POST['product_id'])) {
    $product_id = (int)$_POST['product_id'];
    
    // Если товар уже есть в корзине, увеличиваем количество, если нет — добавляем 1 шт.
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]++;
    } else {
        $_SESSION['cart'][$product_id] = 1;
    }
    
    // Перенаправляем обратно в корзину, чтобы избежать повторной отправки формы при обновлении
    header("Location: cart.php");
    exit();
}

// 2. ОБРАБОТКА ДЕЙСТВИЙ ВНУТРИ КОРЗИНЫ (Удаление и обновление)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Удаление товара
    if (isset($_POST['delete_item'])) {
        $product_id = (int)$_POST['product_id'];
        unset($_SESSION['cart'][$product_id]);
        header("Location: cart.php");
        exit();
    }
    // Обновление количества
    if (isset($_POST['refresh_cart']) && isset($_POST['quantity'])) {
        foreach ($_POST['quantity'] as $product_id => $qty) {
            $qty = (int)$qty;
            if ($qty <= 0) {
                unset($_SESSION['cart'][$product_id]);
            } else {
                $_SESSION['cart'][$product_id] = $qty;
            }
        }
        header("Location: cart.php");
        exit();
    }
}

// 3. ПОЛУЧАЕМ ДАННЫЕ О ТОВАРАХ ИЗ БД ДЛЯ ВЫВОДА В ТАБЛИЦУ
$cart_products = [];
$total_sum = 0;

if (!empty($_SESSION['cart'])) {
    $ids = array_keys($_SESSION['cart']);
    // Создаем строку из знаков вопросов для безопасного SQL-запроса (IN (?, ?, ?))
    $placeholders = implode(',', array_fill(0, count($ids), '?'));
    
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id IN ($placeholders)");
    $stmt->execute($ids);
    $cart_products = $stmt->fetchAll();
}

include 'Includes/header.php';
?>

<main style="padding: 160px 20px 80px 20px; font-family: 'Montserrat', sans-serif; background-color: #f4f4f4; min-height: 100vh;">
    <div style="max-width: 800px; margin: 0 auto; background: #fff; padding: 30px; border-radius: 4px; box-shadow: 0 4px 10px rgba(0,0,0,0.05);">
        <h2 style="color: #00205b; text-align: center; margin-bottom: 30px;">ВАША КОРЗИНА</h2>

        <?php if (!empty($cart_products)): ?>
            <form action="cart.php" method="POST">
                <table style="width: 100%; border-collapse: collapse; margin-bottom: 20px;">
                    <thead>
                        <tr style="background: #00205b; color: #fff; text-align: left;">
                            <th style="padding: 10px;">Товар</th>
                            <th style="padding: 10px;">Цена</th>
                            <th style="padding: 10px;">Кол-во</th>
                            <th style="padding: 10px;">Сумма</th>
                            <th style="padding: 10px;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cart_products as $product): 
                            $qty = $_SESSION['cart'][$product['id']];
                            $item_sum = $product['price'] * $qty;
                            $total_sum += $item_sum;
                        ?>
                            <tr style="border-bottom: 1px solid #ddd;">
                                <td style="padding: 10px;"><?= htmlspecialchars($product['name']); ?></td>
                                <td style="padding: 10px;"><?= number_format($product['price'], 2, '.', ' '); ?> ₽</td>
                                <td style="padding: 10px;">
                                    <input type="number" name="quantity[<?= $product['id']; ?>]" value="<?= $qty; ?>" min="1" style="width: 60px; padding: 5px; text-align: center;">
                                </td>
                                <td style="padding: 10px; font-weight: bold;"><?= number_format($item_sum, 2, '.', ' '); ?> ₽</td>
                                <td style="padding: 10px;">
                                    <button type="submit" name="delete_item" onclick="document.getElementsByName('product_id')[0].value = '<?= $product['id']; ?>';" style="background: none; border: none; color: red; cursor: pointer; font-size: 18px;">&times;</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                
                <input type="hidden" name="product_id" value="">

                <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px; padding-top: 20px; border-top: 2px solid #00205b;">
                    <button type="submit" name="refresh_cart" style="background: #333; color: #fff; border: none; padding: 12px 20px; cursor: pointer; font-weight: bold; border-radius: 4px;">ОБНОВИТЬ КОРЗИНУ</button>
                    <div style="font-size: 22px; font-weight: bold; color: #00205b;">Итого: <?= number_format($total_sum, 2, '.', ' '); ?> ₽</div>
                </div>
            </form>

            <div style="text-align: right; margin-top: 30px;">
                <a href="order.php" style="display: inline-block; background: #ff6b00; color: #fff; text-decoration: none; padding: 15px 30px; font-weight: bold; border-radius: 4px; font-size: 16px; box-shadow: 0 4px 10px rgba(255,107,0,0.3);">
                    ОФОРМИТЬ ЗАКАЗ &rarr;
                </a>
            </div>

        <?php else: ?>
            <div style="text-align: center; padding: 40px 0;">
                <p style="font-size: 18px; color: #666; font-style: italic; margin-bottom: 20px;">Ваша корзина пуста.</p>
                <a href="catalog.php" style="background: #00205b; color: #fff; text-decoration: none; padding: 12px 25px; font-weight: bold; border-radius: 4px;">Вернуться в каталог</a>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php include 'Includes/footer.php'; ?>