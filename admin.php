<?php


// Определите, является ли пользователь авторизованным
$loggedIn = isset($_SESSION['username']);
?>
<?php
session_start();

// Проверяем, авторизован ли пользователь
if (!isset($_SESSION['username'])) {
    // Если не авторизован, перенаправляем на страницу входа или главную
    header('Location: index.php'); // Замените на фактический URL
    exit();
}

// Подключение к базе данных (замените на ваши данные)
$conn = mysqli_connect("localhost", "root", "", "dino");
if (!$conn) {
    die("Ошибка подключения к базе данных: " . mysqli_connect_error());
}

// Получение роли пользователя из базы данных
$username = $_SESSION['username'];
$query = "SELECT role FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $role = $row['role'];

    // Проверяем роль пользователя
    if ($role != 1) {
        // Если роль не равна 1, то пользователь не является администратором, перенаправляем на главную
        header('Location: index.php'); // Замените на фактический URL
        exit();
    }
} else {
    // Если не удалось получить роль из базы данных, перенаправляем на главную
    header('Location: index.php'); // Замените на фактический URL
    exit();
}

// Если пользователь с ролью 1, продолжаем отображение административной страницы
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Административная панель</title>
    <link rel="stylesheet" href="..\css\admin.css">
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
                        <li class="menu-link"><a href="clubs.php" class="menu-text underline-one">Клубы</a></li>
                        <li class="menu-link"><a href="#" class="menu-text underline-one">Ивенты</a></li>
                        <li class="menu-link"><a href="#" class="menu-text underline-one">Партнеры</a></li>
                        <li class="menu-link"><a href="#" class="menu-text underline-one">Контакты</a></li>
                        <li class="login-link"><a class="menu-image da"><img src="../images/account.png" alt="#"></a>
                        </li>
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
    <div class="con">
        <div class="admin-block">
            <h1 class="a-title">Админ панель</h1>

            <div class="block">
                <button class="edit-news">Управление новостями</button>
                <br>
                <div class="btnadd-block" id="add-news">
                    <img class="addnewsbtn" src="../images/more.png" alt="">

                </div>

                <!-- Форма для добавления новости -->
                <div class="label"  id="add-news-form" style="display: none;">
                    <h2>Добавить новость</h2>
                    <form class="label1" action="addnews.php" method="post" enctype="multipart/form-data">
                    <div class="label1">
                        <label class="label-text" for="title">Заголовок:</label>
                        <input type="text" id="title" name="title" required><br>
                    </div>
                    <div class="label1">
                        <label class="label-text" for="creation_date">Дата создания:</label>
                        <input type="date" id="creation_date" name="creation_date" required><br>
                    </div>
                    <div class="label1">
                    <label class="label-text" for="image">Изображение:</label>
                    <input type="file" id="image" name="image" accept="image/*" required><br>
                    </div>
                        <input class="add-btn" type="submit" value="Добавить">
                    </form>
                </div>
                
                <table class="table-block">
                    <div class="table-item">
                        <thead>
                            <tr>
                                <th class="th-text">Заголовок</th>
                                <th class="th-text">Дата создания</th>
                                <th class="th-text">Изображение</th>
                                <th class="th-text">Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php
                            // Подключение к базе данных MySQL
                            $mysqli = new mysqli("localhost", "root", "", "dino");

                            // Проверка соединения
                            if ($mysqli->connect_error) {
                                die("Ошибка подключения: " . $mysqli->connect_error);
                            }

                            // SQL-запрос для выборки новостей из базы данных
                            $sql = "SELECT * FROM news";
                            $result = $mysqli->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    // $NewsId = $row['NewsID'];
                                    ?>
                                    <tr>
                                        <td class="td-text">
                                            <?= $row["Title"] ?>
                                        </td>
                                        <td class="td-text">
                                            <?= $row["CreationDate"] ?>
                                        </td>
                                        <td class="td-text"><img src="<?= $row["ImageURL"] ?>" width="200" height="120"></td>
                                        <td class="td-text">
                                        <div class="modal" id="myModal2">
                                        <div class="modal-content">
                                            <form id="edit-news-form" action="edit_news.php?news_id=<?= $row['NewsID'] ?>" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="news_id" value="<?= $row['NewsID'] ?>">
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


                                    
                                    <a class="edit-news-btn" onclick="openModal(<?= $row['NewsID'] ?>); return false;">
                                        <img src="../images/edit.png" alt="">
                                    </a>






                                            <button class="delete-news-btn" data-id="<?= $row["NewsID"] ?>"><img src="../images/delete.png" alt=""></button>
                                    </tr>
                                    <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="4">Нет доступных новостей.</td>
                                </tr>
                                <?php
                            }

                            // Закрытие соединения с базой данных
                            $mysqli->close();
                            ?>
                        </tbody>
                    </div>

                </table>
            </div>
        </div>
    </div>

</body>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var addNewsButton = document.getElementById("add-news");
        var addNewsForm = document.getElementById("add-news-form");

        addNewsButton.addEventListener("click", function () {
            // Переключаем отображение формы при клике на кнопку или изображение
            if (addNewsForm.style.display === "none" || addNewsForm.style.display === "") {
                addNewsForm.style.display = "block";
            } else {
                addNewsForm.style.display = "none";
            }
        });
    });

</script>
<script>
const showModalButton = document.getElementById('show-modal-button');
const editNewsModal = document.getElementById('edit-news-modal');
const closeModelButton = document.getElementById('close-modal-button');

showModalButton.addEventListener('click', () => {
    editNewsModal.style.display = 'block';
});

closeModelButton.addEventListener('click', () => {
    editNewsModal.style.display = 'none';
});

window.addEventListener('click', (event) => {
    if (event.target === editNewsModal) {
        editNewsModal.style.display = 'none';
    }
});


</script>


<script>
    // JavaScript для обработки нажатия на кнопку "Удалить"
    document.addEventListener("click", function (event) {
        if (event.target.classList.contains("delete-news-btn")) {
            var newsID = event.target.getAttribute("data-id");

            // Запрос на сервер для удаления новости
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "delete_news.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Обработка успешного удаления, например, обновление списка новостей
                    console.log(xhr.responseText);
                }
            };
            xhr.send("news_id=" + newsID);
        }
    });

</script>


<script>
function openModal(newsId) {
    event.preventDefault(); // Отменяем стандартное действие ссылки

    // Получаем URL, который должен быть открыт
    var url = "admin.php?news_id=" + newsId;

    // Изменяем URL адрес
    window.history.pushState({}, '', url);

    // Открываем модальное окно
    document.getElementById('myModal2').style.display = "block";
    window.onload = function() {
        // Получаем 'news_id' из URL
        var urlParams = new URLSearchParams(window.location.search);
        var newsID = urlParams.get('news_id');
    };
}
</script>

<script src="../js/delnews.js"></script>
</html>