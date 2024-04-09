<?php


// Подключение к базе данных
$host = "localhost"; // Имя хоста базы данных
$username = "root"; // Имя пользователя базы данных
$password = ""; // Пароль пользователя базы данных
$database = "dino"; // Имя базы данных

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Ошибка подключения: " . mysqli_connect_error());
}

// Получение данных из формы регистрации
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$role = 0;
// Вставка данных в таблицу пользователей
$sql = "INSERT INTO users (username, password, email, phone, role) VALUES ('$username', '$password', '$email', '$phone', $role)";
if (mysqli_query($conn, $sql)) {
    // Уведомление о успешной регистрации с использованием JavaScript
    echo '<script>alert("Регистрация прошла успешно!");</script>';

    // Перенаправление пользователя на главную страницу (замените URL на свой)
    echo '<script>window.location.href = "index.php";</script>';
} else {
    // Уведомление о ошибке с использованием JavaScript
    echo '<script>alert("Ошибка при регистрации: ' . mysqli_error($conn) . '");</script>';

    // Вернуть пользователя на предыдущую страницу
    echo '<script>window.history.back();</script>';
}

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

mysqli_close($conn);

?>