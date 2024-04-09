<?php
if(isset($_POST['news_id'])) {
    // Подключаемся к базе данных (замените параметры подключения на свои)
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'dino';

    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    // Проверяем подключение
    if (!$conn) {
        die("Ошибка подключения: " . mysqli_connect_error());
    }

    // Получаем ID новости для удаления
    $news_id = $_POST['news_id'];

    // Выполняем SQL-запрос для удаления новости по ID
    $query = "DELETE FROM news WHERE NewsID = $news_id";

    if (mysqli_query($conn, $query)) {
        echo '<script>alert("Новость удалена!");</script>';
        echo '<script>window.location.href = "admin.php";</script>';
    } else {
        echo "Ошибка при удалении новости: " . mysqli_error($conn);
    }

    // Закрываем соединение с базой данных
    mysqli_close($conn);
} else {
    echo "ID новости не был передан.";
}
?>
