USE `stroystal_db`;

CREATE TABLE IF NOT EXISTS `orders` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `customer_name` VARCHAR(255) NOT NULL,
  `phone` VARCHAR(50) NOT NULL,
  `total_price` DECIMAL(10, 2) NOT NULL,
  `date_created` DATETIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;