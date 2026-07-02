CREATE DATABASE IF NOT EXISTS `stroystal_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `stroystal_db`;

-- Таблица для Задания №1 (Регистрация и Вход)
CREATE TABLE IF NOT EXISTS `users` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `login` VARCHAR(100) NOT NULL UNIQUE,
  `password` VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Таблица для Задания №5 (Новости)
CREATE TABLE IF NOT EXISTS `news` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(255) NOT NULL,
  `content` TEXT NOT NULL,
  `date_created` DATE NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Заполняем тестовые новости
INSERT INTO `news` (`title`, `content`, `date_created`) VALUES
('Запуск нового цеха', 'Мы рады сообщить об открытии нового цеха по производству легких металлоконструкций в Ленинградской области. Это позволит ускорить отгрузку заказов в 2 раза!', '2026-06-15'),
('Обновление прайс-листа', 'В связи со снижением закупочной стоимости сырья, мы снизили цены на изготовление строительных балок и ферм на 7%. Подробности у менеджеров.', '2026-06-28');

CREATE DATABASE IF NOT EXISTS `stroystal_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `stroystal_db`;

CREATE TABLE IF NOT EXISTS `products` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `category` VARCHAR(100) NOT NULL,
  `price` DECIMAL(10, 2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `products` (`name`, `category`, `price`) VALUES
('Балка двутавровая 20Б1', 'Балки', 45000.00),
('Балка двутавровая 25Ш1', 'Балки', 48500.00),
('Труба профильная 40х40х2', 'Трубы', 1200.00),
('Труба профильная 80х80х4', 'Трубы', 3100.00),
('Лист горячекатаный 4мм', 'Листы', 8500.00),
('Лист оцинкованный 1.5мм', 'Листы', 4200.00),
('Швеллер 10П', 'Швеллеры', 22000.00);