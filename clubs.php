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
    <link rel="stylesheet" href="..\css\clubs.css">
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
                <?php if ($loggedIn): ?>
                    <!-- Кнопка "Выйти", если пользователь авторизован -->
                    <button class="aut-button" onclick="logout()">Выйти</button>
                <?php else: ?>
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
        <form class="reg-form" action="reg.php" method="POST">

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

            <div class="info-text-block-btn">
                <button class="reg-btn" type="submit">Зарегистрироваться</button>
            </div>

            <div class="info-text-block">
                <a class="trans-link" href="#" onclick="toggleForm('login')">Уже есть аккаунт?</a>
            </div>

        </form>
    </div>

    <div class="reg-block">
        <form id="loginForm" class="reg-form" action="login.php" method="POST">

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
                <button class="reg-btn" type="submit">Авторизироваться</button>
            </div>

            <div class="info-text-block">
                <a class="trans-link" href="#" onclick="toggleForm('registration')">Ещё нет аккаунта?</a>
            </div>

        </form>
    </div>

</div>



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


    <div class="events">
        <hr class="events-line">
        <div class="headliner-block">
            <div class="title-block">
                <h3 class="event-title">Наши клубы</h3>
            </div>
        </div>
    </div>
    <div class="clubs">
        <div class="text-conteiner">
            <div class="club-block">
                <div class="club1">
                    <div class="text-logo">
                        <img src="../images/DINOKOPLAY.png" class="club-img">
                        <h1 class="club-city">Москва</h1>
                    </div>
                    <p class="club-metro">м. Щукинская </p>
                    <p class="club-addres">ул. Космонавтов д.11</p>
                </div>
            </div>
        </div>
        <div class="text-conteiner2">
            <div class="club2">
                <div class="text-logo">
                    <img src="../images/DINOKOPLAY.png" class="club-img">
                    <h1 class="club-city">Москва</h1>
                </div>
                <p class="club-metro">м. Щукинская </p>
                <p class="club-addres">ул. Космонавтов д.11</p>
            </div>
        </div>
    </div>
    <div class="map">
        <hr class="map-line">
        <div class="headliner-map-block">
            <div class="title-block">
                <h3 class="map-title">Мы на карте</h3>
            </div>
            <div class="map-block">
            <div style="position:relative;overflow:hidden;"><a href="https://yandex.ru/maps?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Яндекс Карты</a><a href="https://yandex.ru/maps/?ll=38.231461%2C55.342953&utm_medium=mapframe&utm_source=maps&z=15" style="color:#eee;font-size:12px;position:absolute;top:14px;">Яндекс Карты — транспорт, навигация, поиск мест</a><iframe src="https://yandex.ru/map-widget/v1/?ll=38.231461%2C55.342953&z=15" width="1000" height="350" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe></div>
            </div>
        </div>
    </div>
    <div class="equipment">
        <hr class="equipment-line">
        <div class="headliner-equipment-block">
            <div class="title-block">
                <h3 class="equipment-title">Оборудование</h3>
            </div>
        </div>
        <div class="equipment-block">
            <div class="equipment-conteiner">
                <div class="equipment-zal">
                    <div class="equipment-text">
                        <h4 class="spec-text">Обычный зал</h4>
                    </div>
                    <div class="equipment-spec">
                    <li>Процессор AMD Ryzen 5 5600x (4.3 ГГц)</li>
                    <li>Оперативная память 32 ГБ</li>
                    <li>Общий объем SSD, ГБ 1000</li>
                    <li>Общий объем HDD, ГБ 1000</li>
                    <li>Видеокарта NVIDIA GeForce RTX 3080 Ti (12Гб)</li>
                    <li>ОС (краткое название) Windows</li>
                    <li>Тип памяти DDR4</li>
                    <li>Число ядер процессора 4</li>
                    </div>
                </div>
                <div class="equipment-img">
                    <img src="../images/pk1.png" alt="#">
                </div>
            </div>
            <hr class="equipment-line2">
            <div class="equipment-conteiner2">
            <div class="equipment-img2">
                    <img src="../images/pk2.png" alt="#">
                </div>
                <div class="equipment-zal2">
                    <div class="equipment-text">
                        <h4 class="spec-text2">Обычный зал</h4>
                    </div>
                    <div class="equipment-spec2">
                    <li>Процессор AMD Ryzen 5 5600x (4.3 ГГц)</li>
                    <li>Оперативная память 32 ГБ</li>
                    <li>Общий объем SSD, ГБ 1000</li>
                    <li>Общий объем HDD, ГБ 1000</li>
                    <li>Видеокарта NVIDIA GeForce RTX 3080 Ti (12Гб)</li>
                    <li>ОС (краткое название) Windows</li>
                    <li>Тип памяти DDR4</li>
                    <li>Число ядер процессора 4</li>
                    </div>
                </div>
            </div>
            <hr class="equipment-line2">
        </div>
    </div>
    <div class="fotter">
        <img src="../images/DINOKOPLAY.png" class="fotter-img">
        <p class="fotter-text">© 2023 DINOCOPLAY - Все права защищены</p>
    </div>

</body>

</html>
<script src="main.js"></script>
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