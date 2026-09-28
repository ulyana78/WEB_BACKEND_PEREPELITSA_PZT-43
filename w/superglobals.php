<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Superglobals</title>
    </style>
</head>
<body>


<?php
// Теперь вывод внутри body — кнопка НЕ перекрывает
echo "<h2>Предопределённые переменные (Superglobals)</h2>";

echo "<pre>";
print_r($_SERVER);
echo "</pre>";
?>

</body>
</html>
