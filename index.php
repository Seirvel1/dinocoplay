<?php
session_start();

// Определите, является ли пользователь авторизованным
$loggedIn = isset($_SESSION['username']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DINOCOPLAY</title>
    <link rel="stylesheet" href="..\css\style.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<div class="container">
    <header>
        <div class="main-menu">
            <nav class="nav-bar">
                <ul class="logo">
                    <li class="menu-link-image"><a><img src="../images/logo1.png" alt="#"></a></li>
                </ul>
                <ul class="menu">
                    <li class="menu-link"><a href="index.php" class="menu-text underline-one">Главная</a></li>
                    <li class="menu-link"><a href="news.php" class="menu-text underline-one">Новости</a></li>
                    <li class="menu-link"><a href="clubs.php" class="menu-text underline-one">Клубы</a></li>
                    <li class="menu-link"><a href="#" class="menu-text underline-one">Ивенты</a></li>
                    <li class="menu-link"><a href="#" class="menu-text underline-one">Партнеры</a></li>
                    <li class="menu-link"><a href="#" class="menu-text underline-one">Контакты</a></li>
                    <li class="login-link"><a href="profile.php" class="menu-image da"><img src="../images/account.png" alt="#"></a></li>
                    <li class="language-link"><a class="menu-image net">RU</a></li>
                </ul>
            </nav>

            <div class="digital" id="authButtonContainer">
                <?php if ($loggedIn) : ?>
                    <!-- Кнопка "Выйти", если пользователь авторизован -->
                    <button class="aut-button" onclick="logout()">Выйти</button>
                <?php else : ?>
                    <!-- Кнопка "Авторизироваться", если пользователь не авторизован -->
                    <button class="aut-button" onclick="openModal()">Авторизироваться</button>
                <?php endif; ?>
                <img class="digital-image" src="../images/lines.png">

            </div>
        </div>





</div>
</header>
</div>
<div id="overlay" class="overlay"></div> <!-- Элемент overlay -->
<div id="myModal" class="modal">
    <span class="close" onclick="closeModal()">&times;</span>
    <!-- Здесь поместите содержимое модального окна, например, вашу форму регистрации -->

    <div id="registrationForm" class="reg-block">
        <form class="reg-form" action="reg.php" method="POST" onsubmit="return onRegistrationSubmit()">

            <h3 class="event-title-reg">Регистрация</h3>

            <div class="info-text-block">
                <label class="label-text">Логин </label>
                <input class="input-items" name="username" type="text">
            </div>

            <div class="info-text-block">
                <label class="label-text">Пароль </label>
                <input class="input-items" name="password" type="password">
            </div>

            <div class="info-text-block">
                <label class="label-text">Почта </label>
                <input class="input-items" name="email" type="email">
            </div>

            <div class="info-text-block">
                <label class="label-text">Телефон </label>
                <input class="input-items" name="phone" type="number">
            </div>

            <div style="width: 304px;height: 78px;margin-left: 300px;margin-top: 40px;" class="g-recaptcha" data-sitekey="6LcdXDUpAAAAALG2WIzm6a7twz1ERFr9-AcA6QiY"></div>
            <input type="submit" name="submit" class="autorization-btn" value="Зарегистрироваться">

            <div class="info-text-block">
                <a class="trans-link" href="#" onclick="toggleForm('login')">Уже есть аккаунт?</a>
            </div>

            </form>
    </div>

    <div id="loginForm" class="reg-block">
        <form class="reg-form" action="login.php" method="POST" onsubmit="return onLoginSubmit()">

            <h3 class="event-title-reg">Авторизация</h3>

            <div class="info-text-block">
                <label class="label-text">Логин </label>
                <input class="input-items" name="username" type="text">
            </div>

            <div class="info-text-block">
                <label class="label-text">Пароль </label>
                <input class="input-items" name="password" type="password">
            </div>


            <div class="info-text-block-btn">
                <button class="reg-btn" type="submit">Войти</button>
            </div>

            <div class="info-text-block">
                <a class="trans-link" href="#" onclick="toggleForm('registration')">Ещё нет аккаунта?</a>
            </div>

        </form>
    </div>

</div>

<script>
    // Функция для обработки формы регистрации перед отправкой на сервер
    function onRegistrationSubmit() {
        var response = grecaptcha.getResponse();

        if (response.length === 0) {
            alert('Пожалуйста, пройдите проверку reCAPTCHA для регистрации.');
            return false;
        }

        return true;
    }

</script>



<body>
    <div class="intro">
        <h1>DINOCOPLAY</h1>
        <div class="any-form3">
            <img src="../images/h1.png">
            <div class="h2-form">
                <h2>Наши партнеры</h2>
            </div>
        </div>
    </div>
    <div class="conteiner">
        <div class="any-form">
            <div class="any-form2">
                <img src="../images/line.png" alt="" class="any-form-img2">
                <ul class="any-form-slider">
                    <li class="any-form-slider-item active">
                        <img src="../images/amd.png" alt="" class="any-form-img">
                        <!-- <img src="images/line.png" alt="" class="any-form-img2"> -->
                        <div class="any-form-wrapper">
                            <h5 class="any-form-title">Лучший процессор для игр</h5>
                            <p class="any-form-text">Играйте в самые требовательные игры благодаря мощному приросту
                                производительности,
                                обеспечиваемому процессорами AMD Ryzen серии 7000X3D с технологией AMD 3D V-Cache.</p>
                        </div>
                    </li>
                    <li class="any-form-slider-item">
                        <img src="../images/ea.png" alt="" class="any-form-img">
                        <!-- <img src="images/line.png" alt="" class="any-form-img2"> -->
                        <div class="any-form-wrapper">
                            <h5 class="any-form-title">Лучший процессор для игр</h5>
                            <p class="any-form-text">Играйте в самые требовательные игры благодаря мощному приросту
                                производительности,
                                обеспечиваемому процессорами AMD Ryzen серии 7000X3D с технологией AMD 3D V-Cache.</p>
                        </div>
                    </li>
                    <li class="any-form-slider-item">
                        <img src="../images/nvidia 3.png" alt="" class="any-form-img">
                        <!-- <img src="images/line.png" alt="" class="any-form-img2"> -->
                        <div class="any-form-wrapper">
                            <h5 class="any-form-title">Лучший процессор для игр</h5>
                            <p class="any-form-text">Играйте в самые требовательные игры благодаря мощному приросту
                                производительности,
                                обеспечиваемому процессорами AMD Ryzen серии 7000X3D с технологией AMD 3D V-Cache.</p>
                        </div>
                    </li>
                    <li class="any-form-slider-item">
                        <img src="../images/e.png" alt="" class="any-form-img">
                        <!-- <img src="images/line.png" alt="" class="any-form-img2"> -->
                        <div class="any-form-wrapper">
                            <h5 class="any-form-title">Лучший процессор для игр</h5>
                            <p class="any-form-text">Играйте в самые требовательные игры благодаря мощному приросту
                                производительности,
                                обеспечиваемому процессорами AMD Ryzen серии 7000X3D с технологией AMD 3D V-Cache.</p>
                        </div>
                    </li>
                </ul>

                <div class="any-form-arrows">
                    <img class="any-form-arrow-left disable" src="../images/arrows-let.png" alt="">
                    <img class="any-form-arrow-right" src="../images/arrows-right.png" alt="">
                </div>
            </div>
        </div>
    </div>

    </div>

    <div class="event-images1">
        <img src="../images/viper.png">
    </div>
    <conteiner>
        <div class="cibernew">
            <hr class="events-line3">
            <img src="../images/h1.png">
            <div class="h2-form">
                <h2>Киберновости</h2>
            </div>
            <hr class="news-line1">

            <div class="cyber-news">
                <div class="cyber-news2">
                    <div class="cyber-new-slider">
                        <div class="cyber-news-row active">
                            <div class="cyber-news-box">
                                <h3 class="cyber-news-title">Обновление оборудования
                                    в клубе</h2>
                                    <p class="cyber-news-text">13 июля</p>
                                    <img src="../images/cyber1.png" alt="" class="cyber-news-img">
                            </div>
                            <div class="cyber-news-box">
                                <h3 class="cyber-news-title">Турнир по
                                    CS:GO напарники</h2>
                                    <p class="cyber-news-text">13 июля</p>
                                    <img src="../images/cyber2.png" alt="" class="cyber-news-img">
                            </div>
                            <div class="cyber-news-box">
                                <h3 class="cyber-news-title">Появилось первое сюжетное дополнение для Saints Row</h2>
                                    <p class="cyber-news-text">13 июля</p>
                                    <img src="../images/cyber3.png" alt="" class="cyber-news-img2">
                            </div>
                        </div>

                        <div class="cyber-news-row">
                            <div class="cyber-news-box">
                                <h3 class="cyber-news-title">Обновление оборудования
                                    в клубе</h2>
                                    <p class="cyber-news-text">13 июля</p>
                                    <img src="../images/cyber1.png" alt="" class="cyber-news-img">
                            </div>
                            <div class="cyber-news-box">
                                <h3 class="cyber-news-title">Турнир по
                                    CS:GO напарники</h2>
                                    <p class="cyber-news-text">13 июля</p>
                                    <img src="../images/cyber2.png" alt="" class="cyber-news-img">
                            </div>
                            <div class="cyber-news-box">
                                <h3 class="cyber-news-title">Появилось первое сюжетное дополнение для Saints Row</h2>
                                    <p class="cyber-news-text">13 июля</p>
                                    <img src="../images/cyber3.png" alt="" class="cyber-news-img2">
                            </div>
                        </div>

                        <div class="cyber-news-row">
                            <div class="cyber-news-box">
                                <h3 class="cyber-news-title">Обновление оборудования
                                    в клубе</h2>
                                    <p class="cyber-news-text">13 июля</p>
                                    <img src="../images/cyber1.png" alt="" class="cyber-news-img">
                            </div>
                            <div class="cyber-news-box">
                                <h3 class="cyber-news-title">Турнир по
                                    CS:GO напарники</h2>
                                    <p class="cyber-news-text">13 июля</p>
                                    <img src="../images/cyber2.png" alt="" class="cyber-news-img">
                            </div>
                            <div class="cyber-news-box">
                                <h3 class="cyber-news-title">Появилось первое сюжетное дополнение для Saints Row</h2>
                                    <p class="cyber-news-text">13 июля</p>
                                    <img src="../images/cyber3.png" alt="" class="cyber-news-img2">
                            </div>
                        </div>
                    </div>

                    <div class="cyber-news-arrows">
                        <img class="cyber-news-arrows-left disable" src="../images/arrows-let.png" alt="">
                        <img class="cyber-news-arrows-right" src="../images/arrows-right.png" alt="">
                    </div>
                </div>
            </div>

            <hr class="news-line2">
        </div>
    </conteiner>
    <conteiner>
        <div class="price-list">
            <hr class="events-line3">
            <img src="../images/h1.png" class="price-img">
            <div class="h2-form">
                <h2>Прайс-лист</h2>
            </div>
            <div class="tablitsa">
                <p>Компы</p>
                <table>
                    <tr>
                        <th>Продолжительность</th>
                        <th>Общий зал</th>
                        <th>Общий зал VIP</th>
                        <th>Буткем</th>
                    </tr>
                    <tr>
                        <td>1 час</td>
                        <td>150 руб</td>
                        <td>200 руб</td>
                        <td>1000 руб</td>
                    </tr>
                    <tr>
                        <td>3 часа</td>
                        <td>350 руб</td>
                        <td>450 руб</td>
                        <td>2500 руб</td>
                    </tr>
                    <tr>
                        <td>6 часов</td>
                        <td>550 руб</td>
                        <td>700 руб</td>
                        <td>4000 руб</td>
                    </tr>
                    <tr>
                        <td>Ночной пакет</td>
                        <td>750 руб</td>
                        <td>950 руб</td>
                        <td>6500 руб</td>
                    </tr>
                </table>
            </div>
            <!-- <button class="stol">Забронировать стол</button> -->
            <img src="../images/xozain.png" class="xozain">
        </div>
    </conteiner>
    <div class="fotter">
        <img src="../images/DINOKOPLAY.png" class="fotter-img">
        <p class="fotter-text">© 2023 DINOCOPLAY - Все права защищены</p>
    </div>
</body>

</html>

<script src="main.js"></script>
<script src="../js/maska.js"></script>
<script src="../js/modalreg.js"></script>
<script>
    function logout() {
        // Очистите сессию или выполните другие необходимые действия для выхода
        // Перенаправьте пользователя на страницу выхода
        window.location.href = "logout.php"; // Замените на URL страницы выхода
    }
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const accountImage = document.querySelector(".menu-image.da");

    accountImage.addEventListener("click", function (event) {
        event.preventDefault(); // Предотвратить переход по ссылке

        // Перенаправить пользователя на страницу профиля
        window.location.href = "profile.php"; // Замените на фактический URL вашей страницы профиля
    });
});
</script>
