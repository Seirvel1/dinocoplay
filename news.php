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
    <link rel="stylesheet" href="..\css\news.css">
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
<div id="overlay" class="overlay"></div>
<div id="myModal" class="modal">
    <span class="close" onclick="closeModal()">&times;</span>

    <div id="registrationForm" class="reg-block">
        <form class="reg-form" action="reg.php" method="POST" onsubmit="return onRegistrationSubmit()">

            <h3 class="event-title-reg">Регистрация</h3>

            <div class="info-text-block">
                <label class="label-text">Логин </label>
                <input class="input-items" name="username" type="text" required>
            </div>

            <div class="info-text-block">
                <label class="label-text">Пароль </label>
                <input class="input-items" name="password" type="password" required>
            </div>

            <div class="info-text-block">
                <label class="label-text">Почта </label>
                <input class="input-items" name="email" type="email" required>
            </div>

            <div class="info-text-block">
                <label class="label-text">Телефон </label>
                <input class="input-items" name="phone" type="number" required>
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
                <button class="reg-btn">Войти</button>
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


    <div class="events">
        <hr class="events-line">
        <div class="headliner-block">
            <div class="title-block">
                <h3 class="event-title">Киберновости</h3>
            </div>
        </div>
    </div>

    <div class="kiber-news-block">
        <div class="text-container">
            <div class="card-block">
                <?php
                // Подключение к базе данных MySQL
                $mysqli = new mysqli("localhost", "root", "", "dino");

                // Проверка соединения
                if ($mysqli->connect_error) {
                    die("Ошибка подключения: " . $mysqli->connect_error);
                }

                // SQL-запрос для выборки данных из базы данных
                $sql = "SELECT Title, CreationDate, ImageURL FROM news";
                $result = $mysqli->query($sql);

                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $title = $row["Title"];
                        $creationDate = date("d F", strtotime($row["CreationDate"]));
                        $imageURL = $row["ImageURL"];
                ?>

                        <div class="card-item">
                            <div class="card-title-block">
                                <h1 class="card-title"><?php echo $title; ?></h1>
                                <p class="card-text"><?php echo $creationDate; ?></p>
                            </div>
                            <div class="card-img-block">
                                <img src="<?php echo $imageURL; ?>" alt="">
                            </div>
                        </div>

                <?php
                    }
                } else {
                    echo '<h1 class="nonews">Нет доступных новостей.</h1>';
                }

                // Закрытие соединения с базой данных
                $mysqli->close();
                ?>
            </div>
        </div>

        <div class="neon-block">
            <img src="..\images\Neon_Artwork1.png" alt="" class="neon-img">
        </div>

        <div class="fotter">
            <img src="../images/DINOKOPLAY.png" class="fotter-img">
            <p class="fotter-text">© 2023 DINOCOPLAY - Все права защищены</p>
        </div>

</body>

</html>

<script src="../js/main.js"></script>
<script src="../js/modalreg.js"></script>
<script>
    function logout() {
        // Очистите сессию или выполните другие необходимые действия для выхода
        // Перенаправьте пользователя на страницу выхода
        window.location.href = "logout.php"; // Замените на URL страницы выхода
    }
</script>
<?php
require_once 'vendor/autoload.php';

// Ваши настройки SMTP
$smtpHost = 'smtp.mail.ru';
$smtpPort = 587;
$smtpUsername = 'seirvel@mail.ru';
$smtpPassword = '1234';

// Адрес, на который отправляется активационное письмо
$recipientEmail = 'seirvel@mail.ru';

// Генерация уникального кода активации
$activationCode = md5(uniqid(rand(), true));

// Создание транспорта Swift Mailer
$transport = (new Swift_SmtpTransport($smtpHost, $smtpPort))
    ->setUsername($smtpUsername)
    ->setPassword($smtpPassword);

// Создание объекта Mailer
$mailer = new Swift_Mailer($transport);

// Создание сообщения
$message = (new Swift_Message('Активация аккаунта'))
    ->setFrom([$smtpUsername => 'asas'])
    ->setTo($recipientEmail)
    ->setBody("Для активации вашего аккаунта перейдите по ссылке: http://ваш_сайт/activate.php?code=$activationCode");

// Отправка сообщения
$result = $mailer->send($message);

if ($result) {
    echo 'Письмо активации отправлено успешно. Пожалуйста, проверьте вашу почту.';
} else {
    echo 'Ошибка при отправке письма активации.';
}
?>

