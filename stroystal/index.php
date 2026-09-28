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
        <a href="#" class="logo">
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

      <nav class="header-nav">
        <ul class="nav-list">
          <li><a href="#" class="nav-link">Каталог услуг</a></li>
          <li><a href="catalog.php" class="nav-link">КАТАЛОГ ПРОДУКЦИИ</a></li>
          <li class="nav-item-has-dropdown">
            <a href="#" class="nav-link nav-dropdown">
              О компании <div class="arrow-icon"></div>
            </a>
            <ul class="dropdown-menu">
              <li><a href="#">О нас</a></li>
              <li><a href="#">Сертификаты и лицензии</a></li>
              <li><a href="#">Сотрудники</a></li>
              <li><a href="#">Реквизиты</a></li>
            </ul>
          </li>
          <li><a href="#" class="nav-link">Наши проекты</a></li>
          <li><a href="#" class="nav-link">Блог</a></li>
          <!-- ИСПРАВЛЕНО: заменили menu-link на nav-link, теперь контакты белые и не выделяются -->
          <li><a href="feedback.php" class="nav-link">КОНТАКТЫ</a></li>
        </ul>
       
        <button class="search-btn" aria-label="Поиск">
          <img src="icon/search.svg" alt="Поиск" class="search-icon-img">
        </button>
      </nav>

    </div>
  </header>

  <section class="hero-section">
    <div class="hero-container">
      
      <button class="slider-arrow arrow-left" aria-label="Назад">&lt;</button>
      <button class="slider-arrow arrow-right" aria-label="Вперед">&gt;</button>

      <div class="hero-content">
        <h1 class="hero-title">
          СТРОЙКА
          <span class="hero-subtitle">В ТРУДНОДОСТУПНЫХ МЕСТАХ</span>
        </h1>
        <a href="#" class="hero-btn">Подробнее</a>
      </div>

      <div class="features-grid">
        <div class="feature-item">
          <div class="feature-icon">
            <img src="icon/mobilnost.svg" alt="Мобильность" class="feature-icon-img">
          </div> 
          <div class="feature-text">
            <h3>Мобильность</h3>
            <p>Строим жилые и промышленные объекты по всему миру</p>
          </div>
        </div>

        <div class="feature-item">
          <div class="feature-icon">
            <img src="icon/kompleks uslug.svg" alt="Полный комплекс услуг" class="feature-icon-img">
          </div> 
          <div class="feature-text">
            <h3>Полный комплекс услуг</h3>
            <p>И это одно из наших главных преимуществ</p>
          </div>
        </div>

        <div class="feature-item">
          <div class="feature-icon">
            <img src="icon/spetstehnika.svg" alt="Парк спецтехники" class="feature-icon-img">
          </div> 
          <div class="feature-text">
            <h3>Парк спецтехники</h3>
            <p>В нашем парке новейшие транспорт под любые задачи</p>
          </div>
        </div>

        <div class="feature-item">
          <div class="feature-icon">
            <img src="icon/krainii sever.svg" alt="Работаем в районах Крайнего Севера" class="feature-icon-img">
          </div> 
          <div class="feature-text">
            <h3>Работаем в районах Крайнего Севера</h3>
            <p>И это одно из наших главных преимуществ</p>
          </div>
        </div>
      </div>

    </div>
  </section>

  <section class="services-section">
    <div class="services-container">
      
      <div class="services-header">
        <h2>
          Услуги 
          <img src="icon/stripes.svg" alt="" class="header-slashes">
        </h2>
        <p class="services-intro">Предлагаем вам широкий спектр услуг в сфере строительства, в том числе в условиях крайнего севера</p>
      </div>

      <div class="services-grid">
        <div class="service-card">
          <div class="card-thumb">
            <img src="image/service1.jpg" alt="Технический заказчик">
          </div>
          <div class="card-content">
            <h3>Технический заказчик генерального подрядчика</h3>
            <p>Небольшое описание услуги в несколько строчек. Интересный текст об услуге и почему вам стоит обратиться именно в нашу компанию. Небольшое описание проекта в несколько строчек.</p>
            <a href="#" class="card-more">Подробнее</a>
          </div>
        </div>

        <div class="service-card">
          <div class="card-thumb">
            <img src="image/service2.jpg" alt="Строительство">
          </div>
          <div class="card-content">
            <h3>Строительство</h3>
            <p>Небольшое описание услуги в несколько строчек. Интересный текст об услуге и почему вам стоит обратиться именно в нашу компанию. Небольшое описание проекта в несколько строчек.</p>
            <a href="#" class="card-more">Подробнее</a>
          </div>
        </div>

        <div class="service-card">
          <div class="card-thumb">
            <img src="image/service3.jpg" alt="Проектирование">
          </div>
          <div class="card-content">
            <h3>Проектирование</h3>
            <p>Небольшое описание услуги в несколько строчек. Интересный текст об услуге и почему вам стоит обратиться именно в нашу компанию. Небольшое описание проекта в несколько строчек.</p>
            <a href="#" class="card-more">Подробнее</a>
          </div>
        </div>
      </div>

    </div>
  </section>

  <section class="tech-section">
    <div class="tech-container">
      
      <div class="tech-header">
        <h2>
          Технологии 
          <img src="icon/stripes.svg" alt="" class="header-slashes">
        </h2>
        <p class="tech-intro">В своей работе мы используем только лучшее и современное оборудование</p>
      </div>

      <div class="tech-grid">
        
        <div class="tech-left-col">
          <div class="tech-card main-card">
            <div class="tech-card-img">
              <img src="image/technologies1.jpg" alt="Главная технология">
            </div>
            <div class="tech-card-title">
              <h3>Название главной технологии, используемой компанией</h3>
            </div>
          </div>

          <div class="tech-info-block">
            <div class="tech-info-icon">
              <img src="icon/computer.svg" alt="" class="tech-icon-img">
            </div>
            <div class="tech-info-text">
              <p>В своей работе мы используем только современное оборудование. В своей работе мы используем только лучшее оборудование. В своей работе мы используем только современное оборудование.</p>
              <a href="#" class="card-more">Подробнее</a>
            </div>
          </div>
        </div>

        <div class="tech-right-col">
          <div class="tech-card">
            <div class="tech-card-img">
              <img src="image/technologies2.jpg" alt="Технология 2">
            </div>
            <div class="tech-card-title">
              <h3>Название технологии, используемой компанией</h3>
            </div>
          </div>

          <div class="tech-card">
            <div class="tech-card-img">
              <img src="image/technologies3.jpg" alt="Технология 3">
            </div>
            <div class="tech-card-title">
              <h3>Еще одна технология</h3>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <section class="projects-section">
    <div class="projects-container">

      <div class="projects-header">
        <div class="projects-title-wrap">
          <h2>
            Проекты
            <img src="icon/services-slashes.svg" alt="" class="header-slashes">
          </h2>
        </div>
        
        <div class="projects-tabs">
          <button class="tab-btn active">Все</button>
          <button class="tab-btn">Образовательные учреждения</button>
          <button class="tab-btn">Офисы</button>
          <button class="tab-btn">Ангары</button>
        </div>
      </div>

      <div class="projects-slider-wrapper">
        
        <button class="project-arrow arrow-left" aria-label="Назад">
          <img src="image/left.png" alt="Назад" class="project-arrow-img">
        </button>

        <div class="projects-grid">
          
          <div class="project-card">
            <div class="project-thumb">
              <img src="image/project1.jpg" alt="Многофункциональный спортивный комплекс">
            </div>
            <div class="project-info">
              <h3>Многофункциональный спортивный комплекс</h3>
              <div class="project-geo">
                <img src="icon/place.svg" alt="Локация" class="geo-icon">
                <span>Норильск, Россия</span>
              </div>
            </div>
          </div>

          <div class="project-card">
            <div class="project-thumb">
              <img src="image/project2.jpg" alt="Торговый центр">
            </div>
            <div class="project-info">
              <h3>Торговый центр</h3>
              <div class="project-geo">
                <img src="icon/place.svg" alt="Локация" class="geo-icon">
                <span>Челябинск, Россия</span>
              </div>
            </div>
          </div>

          <div class="project-card">
            <div class="project-thumb">
              <img src="image/project3.jpg" alt="Образовательное учреждение">
            </div>
            <div class="project-info">
              <h3>Образовательное учреждение</h3>
              <div class="project-geo">
                <img src="icon/place.svg" alt="Локация" class="geo-icon">
                <span>Москва, Россия</span>
              </div>
            </div>
          </div>

        </div>

        <button class="project-arrow arrow-right" aria-label="Вперед">
          <img src="image/right.png" alt="Вперед" class="project-arrow-img">
        </button>
      </div>

    </div>
  </section>


  <section class="about-section">
    <div class="about-container">

      <div class="about-header">
        <h2>
          О компании
          <img src="icon/services-slashes.svg" alt="" class="header-slashes">
        </h2>
        <p class="about-intro">Работаем для вас уже более 10 лет</p>
      </div>

      <div class="about-content">
        
        <div class="about-image-col">
          <img src="image/companyy.png" alt="Чертежи и каска СтройСтальПроект" class="about-main-img">
        </div>

        <div class="about-text-col">
          <div class="about-card">
            <p>Небольшое описание компании в несколько строчек текста. Описание компании в несколько строчек текста. Небольшое описание компании в несколько строчек текста. Небольшое описание компании в несколько строчек текста.</p>
            <p>Небольшое описание компании в несколько строчек текста. Описание компании в несколько строчек текста.</p>
            <p>Небольшое описание компании в несколько строчек текста. Небольшое описание компании в несколько строчек текста. О компании в несколько строчек текста. Небольшое описание компании в несколько строчек текста.</p>
            
            <a href="#" class="card-more">
              <span class="card-more-text">Подробнее</span>
              
            </a>
          </div>
        </div>
      </div>

    </div>
  </section>

  <footer class="main-footer">
    <div class="footer-container">
      
      <!-- 1. ВЕРХНИЙ УРОВЕНЬ: Навигационное меню -->
      <nav class="footer-nav">
        <ul class="footer-menu">
          <li><a href="#">Каталог услуг</a></li>
          <li><a href="catalog.php">Каталог продукции</a></li>
          <li><a href="#" class="menu-dropdown">О компании</a></li>
          <li><a href="#">Наши проекты</a></li>
          <li><a href="#">Блог</a></li>
          <li><a href="feedback.php">Контакты</a></li>
        </ul>
      </nav>

      <!-- 2. СРЕДНИЙ УРОВЕНЬ: Основная информация -->
      <div class="footer-main-row">
        
        <!-- Блок логотипа и копирайта -->
        <div class="footer-col footer-logo-col">
          <a href="#" class="footer-logo">
            <img src="image/LogoFooter1.png" alt="СтройСтальПроект">
          </a>
          <div class="footer-copyright-text">
            <p>© 2021 «СтройСтальПроект»</p>
            <a href="#">Политика обработки персональных данных</a>
            <a href="#">Политика конфиденциальности</a>
          </div>
        </div>

        <!-- Блок адреса -->
        <div class="footer-col footer-info-block">
          <div class="footer-icon-wrap">
            <img src="icon/place.svg" alt="Адрес" class="footer-info-icon">
          </div>
          <div class="footer-info-content">
            <span class="info-label">Адрес</span>
            <p>г. Санкт-Петербург,<br>Ленинский пр., д.140А</p>
          </div>
        </div>

        <!-- Блок режима работы -->
        <div class="footer-col footer-info-block">
          <div class="footer-icon-wrap">
            <img src="icon/time.svg" alt="Режим работы" class="footer-info-icon">
          </div>
          <div class="footer-info-content">
            <span class="info-label">Режим работы</span>
            <p>Ежедневно<br>с 10:00 до 18:00</p>
          </div>
        </div>

        <!-- Блок контактов -->
        <div class="footer-col footer-contacts-col">
          <a href="tel:+78124261046" class="footer-phone">+7 (812) 426-1046</a>
          <a href="mailto:info@lstk-home.com" class="footer-email">
            <img src="icon/letter.svg" alt="Email" class="email-icon">
            <span>info@lstk-home.com</span>
          </a>
        </div>

      </div>
    </div>

    <!-- 3. НИЖНИЙ УРОВЕНЬ: Юридические данные и разработчик -->
    <div class="footer-bottom-bar">
      <div class="footer-container footer-bottom-container">
        
        <div class="footer-legal-info">
          <p>Юр. адрес: 198216, г. Санкт-Петербург, Ленинский пр., д. 140, литера А, помещение 5-Н, офис 209А</p>
          <p>ИНН: 7805747616</p>
          <p>КПП: 780501001</p>
          <p>ОГРН: 1197847072620</p>
          <p>БИК: 044525999</p>
        </div>

        <div class="footer-developer">
          <span>Разработка сайта</span>
          <a href="#" target="_blank">
            <img src="image/logoFooter.png" alt="PROFITKIT">
          </a>
        </div>

      </div>
    </div>
  </footer>

  <script>
    (function () {
      var header = document.querySelector('.header');
      var SCROLL_THRESHOLD = 40;

      function updateHeader() {
        if (window.scrollY > SCROLL_THRESHOLD) {
          header.classList.add('header--scrolled');
        } else {
          header.classList.remove('header--scrolled');
        }
      }

      window.addEventListener('scroll', updateHeader, { passive: true });
      updateHeader();
    })();
  </script>

</body>
</html>