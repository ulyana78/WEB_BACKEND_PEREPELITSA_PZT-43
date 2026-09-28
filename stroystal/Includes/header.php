<?php
ob_start();
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>СтройСтальПроект</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

  <header class="header">
    <div class="header-container">
      
      <div class="header-top">
        <a href="index.php" class="logo">
          <img src="image/logo.png" alt="Логин СтройСтальПроект" class="logo-img">
          <img src="image/logo2.png" alt="Логин СтройСтальПроект" class="logo-img-text">
        </a>

        <div class="contacts-grid">
          <div class="contact-item">
            <div class="contact-icon">
              <img src="icon/place.svg" alt="Адрес" class="contact-icon-img">
            </div>
            <div class="contact-info">
              <span class="contact-label">Адрес</span>
              <span class="contact-value">г. Санкт-Петербург, Ленинский пр., д. 140А</span>
            </div>
          </div>

          <div class="contact-item">
            <div class="contact-icon">
              <img src="icon/letter.svg" alt="E-mail" class="contact-icon-img">
            </div>
            <div class="contact-info">
              <span class="contact-label">E-mail</span>
              <a href="mailto:info@lstk-home.com" class="contact-value link">info@lstk-home.com</a>
            </div>
          </div>

          <div class="contact-item">
            <div class="contact-icon">
              <img src="icon/phone.svg" alt="Телефон" class="contact-icon-img">
            </div>
            <div class="contact-info">
              <span class="contact-label">Главный офис</span>
              <a href="tel:+78124261046" class="contact-value link font-bold">+7 (812) 426-1046</a>
            </div>
          </div>
        </div>
      </div>

      <nav class="header-nav" style="background-color: #00205b !important; padding: 0px 20px !important; border-radius: 4px; margin-top: -15px !important; display: flex; align-items: center; justify-content: space-between;">
        
        <ul class="nav-list" style="list-style: none !important; display: flex; align-items: center; margin: 0; padding: 0; min-height: 45px;">
          <li><a href="index.php" class="nav-link">ГЛАВНАЯ</a></li>
          <li><a href="#" class="nav-link">Каталог услуг</a></li>
          <li><a href="catalog.php" class="nav-link">KАТАЛОГ ПРОДУКЦИИ</a></li>
          
          <li class="nav-item-has-dropdown">
            <a href="reviews.php" class="nav-link">ОТЗЫВЫ</a>
            <ul class="dropdown-menu">
              <li><a href="#">О нас</a></li>
              <li><a href="#">Сертификаты и лицензии</a></li>
              <li><a href="employees.php" class="nav-link">Сотрудники</a></li> <li><a href="#">Реквизиты</a></li>
            </ul>
          </li>
          
          <li><a href="#" class="nav-link">Наши проекты</a></li>
          <li><a href="#" class="nav-link">Блог</a></li>
          <li><a href="feedback.php" class="nav-link">КОНТАКТЫ</a></li>
          <li><a href="cart.php" class="nav-link" style="color: #ff6b00 !important; font-weight: bold;">КОРЗИНА</a></li>
        </ul>
        
        <div style="display: flex; align-items: center; gap: 20px;">
          
          <div class="auth-zone" style="font-family: 'Montserrat', sans-serif; font-size: 13px;">
            <?php if (isset($_SESSION['user_login'])): ?>
              <span style="color: #ffffff; margin-right: 10px;">
                Привет, <strong style="color: #ff6b00;"><?= htmlspecialchars($_SESSION['user_login']); ?></strong>!
              </span>
              <a href="logout.php" style="color: #ffffff; text-decoration: none; border-bottom: 1px dashed #fff; padding-bottom: 2px;">Выйти</a>
            <?php else: ?>
              <a href="login.php" style="color: #ffffff; text-decoration: none; margin-right: 15px; font-weight: 600;">Войти</a>
              <a href="register.php" style="color: #ff6b00; text-decoration: none; font-weight: 600;">Регистрация</a>
            <?php endif; ?>
          </div>

          <button class="search-btn" aria-label="Поиск" style="background: none; border: none; cursor: pointer; padding: 0;">
            <img src="icon/search.svg" alt="Поиск" class="search-icon-img">
          </button>
          
        </div>
      </nav>

    </div>
  </header>

  <main style="padding-top: 26px; min-height: 80vh;">