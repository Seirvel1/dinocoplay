<?php
// Подключение к базе данных MySQL
$mysqli = new mysqli("localhost", "root", "", "dino");

// Проверка соединения
if ($mysqli->connect_error) {
    die("Ошибка подключения: " . $mysqli->connect_error);
}

// Проверяем наличие 'news_id' в URL
if (isset($_GET["news_id"]) && is_numeric($_GET["news_id"])) {
    $newsID = $_GET["news_id"];

    // Проверка метода запроса
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Обработка отправки формы

        // Проверка наличия и корректности входных данных
        $newTitle = $_POST["new_title"] ?? '';
        $newCreationDate = $_POST["new_creation_date"] ?? '';
        
        // Проверяем, было ли загружено новое изображение
        $newImagePath = '';
        if (isset($_FILES["new_image"]) && $_FILES["new_image"]["error"] === UPLOAD_ERR_OK) {
            $newImageName = basename($_FILES["new_image"]["name"]);
            $uploadDirectory = "../uploads/"; // Замените на реальный путь
            $newImagePath = $uploadDirectory . $newImageName;
            
            // Перемещаем загруженное изображение в папку на сервере
            if (!move_uploaded_file($_FILES["new_image"]["tmp_name"], $newImagePath)) {
                die("Ошибка при загрузке изображения.");
            }
        }

        // Подготавливаем SQL-запрос для обновления данных новости
        $sql = "UPDATE news SET Title = ?, CreationDate = ?, ImageURL = ? WHERE NewsID = ?";
        $stmt = $mysqli->prepare($sql);

        if ($stmt) {
            // Привязываем параметры к подготовленному запросу
            $stmt->bind_param("sssi", $newTitle, $newCreationDate, $newImagePath, $newsID);
            // Выполняем запрос
            $stmt->execute();
            // Закрываем подготовленное выражение
            $stmt->close();

            // Перенаправляем обратно на страницу администратора
            header("Location: admin.php");
            exit();
        } else {
            die("Ошибка при подготовке запроса: " . $mysqli->error);
        }
    }
} else {
    echo $_GET["news_id"];
    die("Ошибка: 'news_id' не найден в URL или имеет некорректное значение.");
}

// Закрытие соединения с базой данных
$mysqli->close();
?>

<div class="modal" id="myModal2">
 <div class="modal-content">
    <form id="edit-news-form" action="edit_news.php?news_id=<?= isset($_GET["news_id"]) ? $_GET["news_id"] : '' ?>" method="post" enctype="multipart/form-data">
     <input type="hidden" name="news_id" value="<?= isset($_GET["news_id"]) ? $_GET["news_id"] : '' ?>">
     <label for="edit-title">Заголовок:</label>
     <input type="text" id="edit-title" name="new_title" required><br>
     <label for="edit-creation-date">Дата создания:</label>
     <input type="date" id="edit-creation-date" name="new_creation_date" required><br>
     <label for="edit-image">Изображение:</label>
     <input type="file" id="edit-image" name="new_image" accept="image/*"><br>
     <input type="submit" value="Сохранить изменения">
    </form>
  </div>
</div>

<a class="edit-news-btn" href="admin.php?news_id=<?= $row["NewsID"] ?>" onclick="openModal(<?= $row["NewsID"] ?>); return false;">
    <img src="../images/edit.png" alt="">
</a>

