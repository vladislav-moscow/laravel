<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/png">
    <!--=============== REMIXICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!--=============== SWIPER CSS ===============-->
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>Website Blog-Travel</title>
</head>

<body>
<header class="header" id="header">
    <nav class="nav container">
        <a href="/" class="nav__logo">Travel</a>

        <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
                <li class="nav__item">
                    <a href="/" class="nav__link active-link">Главная</a>
                </li>
                <li class="nav__item">
                    <a href="/about" class="nav__link">О нас</a>
                </li>
                <li class="nav__item">
                    <a href="/discover" class="nav__link">Описание</a>
                </li>
                <li class="nav__item">
                    <a href="/category" class="nav__link">Статьи</a>
                </li>
            </ul>

            <div class="nav__dark">
                <!-- Theme change button -->
                <span class="change-theme-name">Темная тема</span>
                <i class="ri-moon-line change-theme" id="theme-button"></i>
            </div>

            <i class="ri-close-line nav__close" id="nav-close"></i>
        </div>

        <div class="nav__toggle" id="nav-toggle">
            <i class="ri-function-line"></i>
        </div>
    </nav>
</header>

<main class="main">
    <!--==================== HOME ====================-->
    <section class="home" id="home">
        <img src="assets/img/home1.jpg" alt="" class="home__img">

        <div class="home__container container grid">
            <div class="home__data">
                <span class="home__data-subtitle">Информация о нас!</span>
                <h1 class="home__data-title">Если не интересно <br> <b>Переходи и  читай сразу</b></h1>
                <a href="/category" class="button">Читать</a>
            </div>

            <div class="home__social">
                <a href="https://www.facebook.com/" target="_blank" class="home__social-link">
                    <i class="ri-facebook-box-fill"></i>
                </a>
                <a href="https://www.instagram.com/" target="_blank" class="home__social-link">
                    <i class="ri-instagram-fill"></i>
                </a>
                <a href="https://twitter.com/" target="_blank" class="home__social-link">
                    <i class="ri-twitter-fill"></i>
                </a>
            </div>
        </div>
    </section>

    <section class="about section" id="about">
        <div class="about__container container grid">
            <div class="about__data">
                <h2 class="section__title about__title">Дополнительная Информация <br> О Лучших Пляжах</h2>
                <p class="about__description">Вы можете найти самые красивые и приятные места по нашим статьям, вы выбираете место,
                    в котором мы будем сопровождать вас всю дорогу,
                    найдите свое место прямо сейчас.
                </p>
                <p class="about__description">Мы поможем вам найти, ваш кусочек рая!
                    Читайте наши статьи и вы будете знать все, что обходима для отдыха!
                </p>
                <a href="/category" class="button">Найти место</a>
            </div>
            <div class="about__img">
                <div class="about__img-overlay">
                    <img src="assets/img/about1.jpg" alt="" class="about__img-one">
                </div>

                <div class="about__img-overlay">
                    <img src="assets/img/about2.jpg" alt="" class="about__img-two">
                </div>
            </div>
        </div>
    </section>
</main>
<footer class="footer section">
    <div class="footer__container container grid">
        <div class="footer__content grid">
            <div class="footer__data">
                <h3 class="footer__title">Travel</h3>
                <p class="footer__description">Travel you choose the <br> destination,
                    we offer you the <br> experience.
                </p>
                <div>
                    <a href="https://www.facebook.com/" target="_blank" class="footer__social">
                        <i class="ri-facebook-box-fill"></i>
                    </a>
                    <a href="https://twitter.com/" target="_blank" class="footer__social">
                        <i class="ri-twitter-fill"></i>
                    </a>
                    <a href="https://www.instagram.com/" target="_blank" class="footer__social">
                        <i class="ri-instagram-fill"></i>
                    </a>
                    <a href="https://www.youtube.com/" target="_blank" class="footer__social">
                        <i class="ri-youtube-fill"></i>
                    </a>
                </div>
            </div>

            <div class="footer__data">
                <h3 class="footer__subtitle">About</h3>
                <ul>
                    <li class="footer__item">
                        <a href="/about" class="footer__link">About Us</a>
                    </li>
                    <li class="footer__item">
                        <a href="#" class="footer__link">Features</a>
                    </li>
                    <li class="footer__item">
                        <a href="/category" class="footer__link">New & Blog</a>
                    </li>
                </ul>
            </div>

            <div class="footer__data">
                <h3 class="footer__subtitle">Company</h3>
                <ul>
                    <li class="footer__item">
                        <a href="#" class="footer__link">Team</a>
                    </li>
                    <li class="footer__item">
                        <a href="#" class="footer__link">Plan y Pricing</a>
                    </li>
                    <li class="footer__item">
                        <a href="#" class="footer__link">Become a member</a>
                    </li>
                </ul>
            </div>

            <div class="footer__data">
                <h3 class="footer__subtitle">Support</h3>
                <ul>
                    <li class="footer__item">
                        <a href="#" class="footer__link">FAQs</a>
                    </li>
                    <li class="footer__item">
                        <a href="#" class="footer__link">Support Center</a>
                    </li>
                    <li class="footer__item">
                        <a href="#" class="footer__link">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="footer__rights">
            <p class="footer__copy">&#169; 2021 Vladislav. All rigths reserved.</p>
            <div class="footer__terms">
                <a href="#" class="footer__terms-link">Terms & Agreements</a>
                <a href="#" class="footer__terms-link">Privacy Policy</a>
            </div>
        </div>
    </div>
</footer>
<a href="#" class="scrollup" id="scroll-up">
    <i class="ri-arrow-up-line scrollup__icon"></i>
</a>

<!--=============== SCROLL REVEAL===============-->
<script src="assets/js/scrollreveal.min.js"></script>

<!--=============== SWIPER JS ===============-->
<script src="assets/js/swiper-bundle.min.js"></script>

<!--=============== MAIN JS ===============-->
<script src="assets/js/main.js"></script>
