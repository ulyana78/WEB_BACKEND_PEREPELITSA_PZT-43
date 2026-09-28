<?php
ob_start(); // Включаем буферизацию вывода (это спасет от ошибки headers already sent)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Подключаем базу данных
include 'db.php';

// 1. НАСТРОЙКИ ПАГИНАЦИИ (Постраничный вывод)
$limit = 3; // Показываем по 3 товара на странице
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;
$offset = ($page - 1) * $limit; // Смещение для SQL-запроса

// 2. ФИЛЬТРЫ, ПОИСК И СОРТИРОВКА
$where = ["1=1"]; 
$params = [];

// Поиск по названию продукции
if (!empty($_GET['search'])) {
    $where[] = "name LIKE :search";
    $params['search'] = '%' . trim($_GET['search']) . '%';
}

// Фильтрация по категориям металлопроката
if (!empty($_GET['category'])) {
    $where[] = "category = :category";
    $params['category'] = $_GET['category'];
}

// Сортировка по цене
$order_by = "id DESC"; 
if (!empty($_GET['sort'])) {
    if ($_GET['sort'] == 'price_asc') $order_by = "price ASC";
    if ($_GET['sort'] == 'price_desc') $order_by = "price DESC";
}

$where_str = implode(" AND ", $where);

// 3. ЗАПРОСЫ К БАЗЕ ДАННЫХ
// Считаем общее количество товаров для пагинации
$count_stmt = $pdo->prepare("SELECT COUNT(*) FROM products WHERE $where_str");
$count_stmt->execute($params);
$total_products = $count_stmt->fetchColumn();
$total_pages = ceil($total_products / $limit);

// Получаем товары с учетом фильтров, сортировки и пагинации
$sql = "SELECT * FROM products WHERE $where_str ORDER BY $order_by LIMIT $limit OFFSET $offset";
$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$products = $stmt->fetchAll();

// Подключаем шапку сайта
include 'Includes/header.php';
?>

<main style="padding: 160px 20px 80px 20px; font-family: 'Montserrat', sans-serif; background-color: #f4f4f4; min-height: 100vh;">
    <div style="max-width: 1200px; margin: 0 auto;">
        
        <h2 style="font-family: 'Roboto Condensed', sans-serif; color: #00205b; text-align: center; font-size: 32px; margin-bottom: 40px;">
            КАТАЛОГ ПРОДУКЦИИ
        </h2>

        <form method="GET" action="catalog.php" style="background: #fff; padding: 20px; border-radius: 4px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); margin-bottom: 30px; display: flex; flex-wrap: wrap; gap: 15px; align-items: flex-end;">
            
            <div style="flex: 1; min-width: 200px;">
                <label style="display:block; margin-bottom:5px; font-size:12px; font-weight:bold;">Поиск:</label>
                <input type="text" name="search" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>" placeholder="Название детали..." style="width:100%; padding:10px; border:1px solid #ccc; border-radius:4px;">
            </div>

            <div style="width: 200px;">
                <label style="display:block; margin-bottom:5px; font-size:12px; font-weight:bold;">Категория:</label>
                <select name="category" style="width:100%; padding:10px; border:1px solid #ccc; border-radius:4px;">
                    <option value="">Все категории</option>
                    <option value="Балки" <?= (isset($_GET['category']) && $_GET['category'] == 'Балки') ? 'selected' : ''; ?>>Балки</option>
                    <option value="Трубы" <?= (isset($_GET['category']) && $_GET['category'] == 'Трубы') ? 'selected' : ''; ?>>Трубы</option>
                    <option value="Листы" <?= (isset($_GET['category']) && $_GET['category'] == 'Листы') ? 'selected' : ''; ?>>Листы</option>
                    <option value="Швеллеры" <?= (isset($_GET['category']) && $_GET['category'] == 'Швеллеры') ? 'selected' : ''; ?>>Швеллеры</option>
                </select>
            </div>

            <div style="width: 200px;">
                <label style="display:block; margin-bottom:5px; font-size:12px; font-weight:bold;">Сортировка:</label>
                <select name="sort" style="width:100%; padding:10px; border:1px solid #ccc; border-radius:4px;">
                    <option value="">По умолчанию</option>
                    <option value="price_asc" <?= (isset($_GET['sort']) && $_GET['sort'] == 'price_asc') ? 'selected' : ''; ?>>Сначала дешевые</option>
                    <option value="price_desc" <?= (isset($_GET['sort']) && $_GET['sort'] == 'price_desc') ? 'selected' : ''; ?>>Сначала дорогие</option>
                </select>
            </div>

            <div style="display:flex; gap:10px;">
                <button type="submit" style="background:#00205b; color:#fff; border:none; padding:11px 20px; font-weight:bold; cursor:pointer; border-radius:4px;">Применить</button>
                <a href="catalog.php" style="background:#ccc; color:#333; text-decoration:none; padding:11px 20px; font-weight:bold; border-radius:4px; text-align:center;">Сбросить</a>
            </div>
        </form>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 25px; margin-bottom: 40px;">
            <?php if (!empty($products)): ?>
                <?php foreach ($products as $product): ?>
                    <div style="background: #fff; padding: 20px; border-radius: 4px; box-shadow: 0 4px 10px rgba(0,0,0,0.05); display: flex; flex-direction: column; justify-content: space-between; text-align: center;">
                        <div style="height: 120px; background: #e0e0e0; display: flex; align-items: center; justify-content: center; margin-bottom: 15px; border-radius: 4px; color: #666; font-weight: bold; font-size: 14px;">
                            [ Металлопрокат ]
                        </div>
                        <span style="font-size: 11px; color: #ff6b00; font-weight: bold; text-transform: uppercase;"><?= htmlspecialchars($product['category']); ?></span>
                        <h3 style="font-family: 'Roboto Condensed', sans-serif; color: #00205b; margin: 10px 0; font-size: 18px;">
                            <?= htmlspecialchars($product['name']); ?>
                        </h3>
                        <div style="font-size: 20px; font-weight: bold; color: #333; margin-bottom: 15px;">
                            <?= number_format($product['price'], 2, '.', ' '); ?> ₽
                        </div>
                        
                        <form action="cart.php" method="POST">
                            <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
                            <button type="submit" name="add_to_cart" style="width:100%; background:#ff6b00; color:#fff; border:none; padding:10px; font-weight:bold; cursor:pointer; border-radius:4px;">
                                В КОРЗИНУ
                            </button>
                        </form>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p style="grid-column: 1/-1; text-align: center; color: #777; font-style: italic;">Товары не найдены.</p>
            <?php endif; ?>
        </div>

        <?php if ($total_pages > 1): ?>
            <div style="display: flex; justify-content: center; gap: 10px;">
                <?php for ($i = 1; $i <= $total_pages; $i++): 
                    $query_params = $_GET;
                    $query_params['page'] = $i;
                    $link = "catalog.php?" . http_build_query($query_params);
                    $is_active = ($i == $page);
                ?>
                    <a href="<?= $link; ?>" style="padding: 10px 15px; text-decoration: none; border-radius: 4px; font-weight: bold; 
                        background: <?= $is_active ? '#00205b' : '#fff'; ?>; 
                        color: <?= $is_active ? '#fff' : '#333'; ?>; 
                        border: 1px solid #ccc;">
                        <?= $i; ?>
                    </a>
                <?php endfor; ?>
            </div>
        <?php endif; ?>

    </div>
</main>

<?php include 'Includes/footer.php'; ?>