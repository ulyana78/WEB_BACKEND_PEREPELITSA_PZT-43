<?php
// Параметры подключения к вашей БД из MySQL Workbench
$host = '127.0.0.1'; 
$port = '3306';       
$db   = 'stroystal_db';
$user = 'root';       

//  пароль от Workbench!
$pass = '12345'; 

$charset = 'utf8mb4';

$dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    die("Ошибка подключения к MySQL Workbench: " . $e->getMessage());
}

// Задание 4.2: Выполните запрос на удаление данных в БД
try {
    $delete_sql = "DELETE FROM employees WHERE position = :pos";
    $stmt = $pdo->prepare($delete_sql);
    $stmt->execute(['pos' => 'Техник-программист']);
    $deleted_rows = $stmt->rowCount();
} catch (\PDOException $e) {
    die("Ошибка при удалении: " . $e->getMessage());
}

// --- ЗАДАНИЕ 4.3: Отобразите содержимое БД после удаления данных ---
try {
    $select_sql = "SELECT * FROM employees";
    $result = $pdo->query($select_sql)->fetchAll();
} catch (\PDOException $e) {
    die("Ошибка при выборке данных: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 4 — Работа с базами данных</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .alert { background-color: #d9edf7; color: #31708f; padding: 10px; border: 1px solid #bce8f1; border-radius: 4px; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        tr:nth-child(even) { background-color: #f9f9f9; }
    </style>
</head>
<body>

    <h2>Результат </h2>

    <div class="alert">
        <strong>Удаление завершено!</strong> Удалено сотрудников с должностью «Техник-программист»: <?php echo $deleted_rows; ?>.
    </div>

    <h3>Текущее содержимое таблицы «Сотрудники» (после удаления):</h3>

    <?php if (count($result) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Фамилия</th>
                    <th>Имя</th>
                    <th>Отчество</th>
                    <th>Пол</th>
                    <th>Дата рождения</th>
                    <th>Адрес прописки</th>
                    <th>Должность</th>
                    <th>Подразделение</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $row): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['id']); ?></td>
                        <td><?php echo htmlspecialchars($row['last_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['first_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['middle_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['gender']); ?></td>
                        <td><?php echo htmlspecialchars($row['birth_date']); ?></td>
                        <td><?php echo htmlspecialchars($row['registration_address']); ?></td>
                        <td><strong><?php echo htmlspecialchars($row['position']); ?></strong></td>
                        <td><?php echo htmlspecialchars($row['department']); ?></td>
                    </tr>
                <?php endforeach; ?> </tbody>
        </table>
    <?php else: ?>
        <p>В базе данных нет записей.</p>
    <?php endif; ?>

</body>
</html>