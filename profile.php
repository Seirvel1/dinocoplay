<?php
session_start();

// Определите, является ли пользователь авторизованным
$loggedIn = isset($_SESSION['username']);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Профиль пользователя</title>
    <link rel="stylesheet" href="..\css\profile.css">
    <style>
        /* Стили для уведомления */
        .notification {
            background-color: #f2f2f2;
            color: #333;
            text-align: center;
            padding: 10px;
        }
    </style>
</head>

<body>
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
                        <li class="menu-link"><a href="#" class="menu-text underline-one">Клубы</a></li>
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

    <div class="profile_block">
        <hr class="green-line">
        <div class="profile_imageblock">
            <h1 class="profile_text">Профиль</h1>
        </div>
    </div>
    <section>
        <?php
        if (isset($_SESSION['username'])) {
            // Пользователь авторизован, отображаем информацию о профиле
            echo '<h2>Добро пожаловать, ' . $_SESSION['username'] . '!</h2>';
        } else {
            // Пользователь не авторизован, выводим уведомление и переходим на главную
            echo '<div class="notification">Сначала авторизуйтесь, чтобы просмотреть профиль.</div>';
            echo '<script>setTimeout(function(){ window.location.href = "index.php"; }, 3000);</script>';
        }
        ?>
    </section>

    <div class="conteiner">
        
        <nav>
            <!-- Меню навигации, если необходимо -->
            <ul>
                <?php
                if (isset($_SESSION['username'])) {
                    // Проверяем роль пользователя в базе данных
                    // Замените 'your_db_connection' на код подключения к базе данных
                    $conn = mysqli_connect("localhost", "root", "", "dino");
                    if (!$conn) {
                        die("Ошибка подключения к базе данных: " . mysqli_connect_error());
                    }

                    $username = $_SESSION['username'];
                    $query = "SELECT role FROM users WHERE username = '$username'";
                    $result = mysqli_query($conn, $query);

                    if ($result && mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        $role = $row['role'];

                        // Если роль пользователя - администратор (role=1), показываем ссылку на админ-панель
                        if ($role == 1) {
                            echo '<li class="panel"><a href="admin.php" class="text-panel">Админ-панель</a></li>';
                        }
                    }
                    // Пользователь авторизован, показать ссылку на профиль и выход
                    echo '<li class="panel"><a href="logout.php" class="text-panel">Выход</a></li>';
                } else {
                    // Пользователь не авторизован, выводим уведомление и переходим на главную
                    echo '<li class="panel"><a href="index.php" class="text-panel">Главная</a></li>';
                }
                ?>
            </ul>
        </nav>
    </div>
    


</body>

</html>

<script>
    function logout() {
        // Очистите сессию или выполните другие необходимые действия для выхода
        // Перенаправьте пользователя на страницу выхода
        window.location.href = "logout.php"; // Замените на URL страницы выхода
    }
</script>