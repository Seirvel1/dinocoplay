<?php
// Подключение к базе данных MySQL
$mysqli = new mysqli("localhost", "root", "", "dino");

// Проверка соединения
if ($mysqli->connect_error) {
    die("Ошибка подключения: " . $mysqli->connect_error);
}

// Получение данных из формы
$title = $_POST["title"];
$creation_date = $_POST["creation_date"];

// Обработка загруженного изображения
$upload_directory = "../uploads/"; // Директория, в которую будут загружены изображения

// Проверка, было ли загружено изображение
if (isset($_FILES["image"])) {
    $image_name = $_FILES["image"]["name"];
    $image_tmp_name = $_FILES["image"]["tmp_name"];

    // Генерируем уникальное имя файла, чтобы избежать конфликтов
    $unique_image_name = uniqid() . '_' . $image_name;

    // Полный путь к сохраненному изображению
    $target_path = $upload_directory . $unique_image_name;

    // Перемещаем загруженное изображение в указанную директорию
    if (move_uploaded_file($image_tmp_name, $target_path)) {
        // Изображение успешно загружено, и его путь ($target_path) можно сохранить в базу данных
        $image_url = $target_path;

        // SQL-запрос для добавления новости в базу данных
        $sql = "INSERT INTO News (Title, CreationDate, ImageURL) VALUES (?, ?, ?)";
        $stmt = $mysqli->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("sss", $title, $creation_date, $image_url);
            $stmt->execute();
            $stmt->close();
            // После успешного добавления новости, вы можете перенаправить пользователя на страницу со списком новостей или выполнить другие действия
            header("Location: admin.php");
        } else {
            echo "Ошибка при подготовке запроса: " . $mysqli->error;
        }
    } else {
        echo "Ошибка при загрузке изображения.";
    }
} else {
    echo "Изображение не было загружено.";
}

// Закрытие соединения с базой данных
$mysqli->close();
?>
