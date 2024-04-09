<?php


// Подключение к базе данных
$host = "localhost"; // Имя хоста базы данных
$username = "root"; // Имя пользователя базы данных
$password = ""; // Пароль пользователя базы данных
$database = "dino"; // Имя базы данных

$conn = mysqli_connect($host, $username, $password, $database);


require_once 'config/main.php';

if (isset($_GET['code'])) {
    $activationCode = $_GET['code'];

    // Проверка наличия соединения с базой данных
    if (!$link) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Подготовленный запрос для предотвращения SQL-инъекций
    $query = "SELECT * FROM users WHERE activation_code=? AND is_active=0";

    // Подготовка и выполнение запроса
    $stmt = mysqli_prepare($link, $query);
    mysqli_stmt_bind_param($stmt, "s", $activationCode);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Проверка наличия ошибок
    if (!$result) {
        die("Query failed: " . mysqli_error($link));
    }

    // Проверка найденных записей
    if (mysqli_num_rows($result) > 0) {
        // Извлечение данных
        $row = mysqli_fetch_assoc($result);
        $userId = $row['id'];

        // Обновление статуса активации
        $updateQuery = "UPDATE users SET is_active='1' WHERE id=?";
        $stmt = mysqli_prepare($link, $updateQuery);
        mysqli_stmt_bind_param($stmt, "i", $userId);
        mysqli_stmt_execute($stmt);

        echo "Аккаунт успешно активирован. Теперь вы можете войти.";
    } else {
        echo "Ошибка активации: неверный код активации или аккаунт уже активирован.";
    }

    // Закрытие соединения
    mysqli_close($link);
}
?>
