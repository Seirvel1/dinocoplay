<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Подключение к базе данных
    $host = "localhost"; // Имя хоста базы данных
    $username = "root"; // Имя пользователя базы данных
    $password = ""; // Пароль пользователя базы данных
    $database = "dino"; // Имя базы данных

    $conn = mysqli_connect($host, $username, $password, $database);

    if (!$conn) {
        die("Ошибка подключения: " . mysqli_connect_error());
    }

    // Получение данных из формы авторизации
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Поиск пользователя в базе данных по логину
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Сравнение введенного пароля с паролем из базы данных
        if ($password === $row['password']) {
            // Если авторизация успешна, установка сессии
            session_start();
            $_SESSION['username'] = $row['username'];
            echo '<script>alert("Авторизация прошла успешно!");</script>';

            // Скрыть кнопку "Авторизироваться" с помощью JavaScript
            echo '<script>document.getElementById("authButton").style.display = "none";</script>';
            echo '<script>document.getElementById("logoutButton").style.display = "block";</script>';
            // Перенаправление пользователя на личную страницу (замените на свой URL)
            echo '<script>window.location.href = "index.php";</script>';

        } else {
            echo "Неправильный пароль.";
        }
    } else {
        echo "Пользователь с таким логином не найден.";
    }
}

?>
